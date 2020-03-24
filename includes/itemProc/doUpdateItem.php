<?php
require_once SRC . 'misc/tokenizer.php';

if (! isUserLoggedIn()) {
    header('Location: ' . __HOST__ . 'user/login.php?redir=azOfQW');
}

$itemID = $title = $description = $dailyRate = $startDate = $endDate = $zipcode = $category = $file_ext = $file_tmp = "";

$vals = $errors = array();
if (isset($_FILES['itemImg'])) {
    $image = $_FILES['itemImg'];
    $file_name = $image['name'];
    if (! empty($file_name)) {
        $file_size = $image['size'];
        $file_tmp = $image['tmp_name'];
        $file_type = $image['type'];
        $file_ext = strtolower(end(explode('.', $image['name'])));
        $extensions = array(
            "jpeg",
            "jpg",
            "png"
        );

        if (in_array($file_ext, $extensions) === false) {
            $errors['imageext'] = "extension not allowed, please choose a JPEG or PNG file.";
        }

        if ($file_size > 2097152) {
            $errors['imagesize'] = 'File size must be less than 2 MB';
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (! empty($_POST['itemID'])) {
        $vals['itemID'] = $itemID = cleanAlphanumeric(cleanData($_GET['i']));
    } else {
        $errors['itemID'] = "You messed with something you shouldn't have";
    }

    if (! empty($_POST['itemTitle'])) {
        $vals['itemTitle'] = $title = cleanData($_POST['itemTitle']);
        if (! verifyItemName($title)) {
            $errors['itemTitle'] = "Please enter a valid title";
        }
    } else {
        $errors['itemTitle'] = "Please enter a title";
    }

    if (! empty($_POST['itemDescription'])) {
        $vals['description'] = $description = $_POST['itemDescription']; // cleanDescriptionInput($_POST['itemDescription']);
        if (/**
         * !verifyDescription($description)*
         */
        false) {
            $errors['description'] = "Please enter a valid description";
        }
    } else {
        $errors['description'] = "Please enter a description";
    }

    if (! empty($_POST['dailyRate'])) {
        $vals['dailyRate'] = $dailyRate = cleanMoney($_POST['dailyRate']);
        if (! verifyMoney($dailyRate) || $dailyRate >= 10000.00) {
            $errors['dailyRate'] = "Please enter a valid daily rate less than $10,000.00 per day";
        }
    } else {
        $errors['dailyRate'] = "Please enter a daily rate";
    }

    if (! empty($_POST['startDate'])) {
        $vals['startDate'] = cleanData($_POST['startDate']);
        $startDate = reformatDate($vals['startDate']);
        if (! verifyDate($startDate)) {
            $errors['startDate'] = "Please enter a valid start date";
        }
    } else {
        $errors['startDate'] = "Please enter a start date";
    }

    if (! empty($_POST['endDate'])) {
        $vals['endDate'] = cleanData($_POST['endDate']);
        $endDate = reformatDate($vals['endDate']);
        if (! verifyDate($endDate)) {
            if ($startDate > $endDate) {
                $errors['endDate'] = "Please enter an end date that is after the start date";
            }
            $errors['endDate'] = "Please enter a valid end date";
        }
    } else {
        $errors['startDate'] = "Please enter a end date";
    }

    if (! empty($_POST['zipcode'])) {
        $vals['zipcode'] = $zipcode = cleanData($_POST['zipcode']);
        if (! verifyZipcode($zipcode)) {
            $errors['zipcode'] = "Please enter a valid 5-digit zip code";
        }
    } else {
        $errors['zipcode'] = "Please enter a zipcode";
    }
    
    if (!empty($_POST['category']) && $_POST['category'] != -1) {
        $vals['category'] = $category = cleanNumeric($_POST['zipcode']);
    } else {
        $errors['category'] = "Please select a category";
    }

    if (empty($errors)) {
        if (uploadItem($itemID, $title, $description, $dailyRate, $startDate, $endDate, $zipcode, $category)) {
            if (!empty($file_ext) && !empty($file_tmp)) {
                updateImage($itemID, $file_ext, $file_tmp);
            }

            header("Location: " . __HOST__ . "listing/item.php?i=" . $itemID);
        }
    } else {
        var_dump($errors);
    }
}

function uploadItem($itemID, $title, $description, $dailyRate, $startDate, $endDate, $zipcode, $category)
{
    global $con, $user;

    $sql = "SELECT owner_ID FROM items WHERE ID=?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $itemID);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows == 1) {
        $data = $result->fetch_assoc();
        if ($data['owner_ID'] != $user->getUserID()) {
            echo "You dont own this item";
            return false;
        }
    } else {
        echo "Item not found";
        return false;
    }

    // Insert new user
    $sql = "UPDATE items SET title=?, description=?, rate=?, location=?, start_date=?, end_date=?, category=? WHERE ID=?";
    $stmt = $con->prepare($sql) or DIE(mysqli_error($con));
    $stmt->bind_param("ssssssis", $title, $description, $dailyRate, $zipcode, $startDate, $endDate, $category, $itemID);
    $stmt->execute();
    $stmt->close();

    return true;
}

function updateImage($itemID, $file_ext, $file_tmp)
{
    global $con;
    $imgFilename = generateToken(64) . "." . $file_ext;
    $sql = "UPDATE images SET filename=? WHERE item_ID=?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ss", $imgFilename, $itemID);
    $stmt->execute();
    $stmt->close();
    move_uploaded_file($file_tmp, ROOT . "html/images/item/" . $imgFilename);
}

function reformatDate($date)
{
    $date = preg_replace("/[^0-9\/]/", "", $date);
    $parts = explode("/", $date);
    $date = $parts[2] . "-" . $parts[0] . "-" . $parts[1];
    return $date;
}
?>