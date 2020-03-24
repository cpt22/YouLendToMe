<?php
if (!isUserLoggedIn()) {
    die();
}

$to_return = array();

if (isset($_POST['id'])) {
    $id = cleanData($_POST['id']);

    $stmt = $con->prepare("SELECT owner_ID, listed FROM items WHERE ID=?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    
    if ($result->num_rows == 1) {
        $arr = $result->fetch_assoc();
        $ownerID = $arr['owner_ID'];
        $newListed = $arr['listed'] == "1" ? 0 : 1;
        if ($ownerID == $user->getUserID()) {
            $stmt = $con->prepare("UPDATE items SET listed='$newListed' WHERE ID=?");
            $stmt->bind_param("s", $id);
            $stmt->execute();
            $stmt->close();
            $to_return['result'] = "0";
            $to_return['newVal'] = $newListed;
        } else {
            $to_return['result'] = "3";
        }
    } else {
        $to_return['result'] = "2";
    }   
} else {
    $to_return['result'] = "1";
}

echo json_encode($to_return);
?>