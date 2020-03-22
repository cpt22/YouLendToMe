<?php
require_once SRC . 'session.php';
require_once SRC . 'verify.php';

$firstName = $lastName = $email = $username = $password = $confirmPW = $phone = $address1 = $address2 = $city = $state = $zipcode = $rememberMe = "";
$vals = $errors = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    /*
     * Verify first and last names
     */
    if (! empty($_POST['first-name'])) {
        $vals['first-name'] = $firstName = cleanData($_POST['first-name']);
        if (verifyName($firstName)) {} else {
            $errors['first-name'] = "Please enter a valid first name";
        }
    } else {
        $errors['first-name'] = "Please enter your first name";
    }

    if (! empty($_POST['last-name'])) {
        $vals['last-name'] = $lastName = cleanData($_POST['last-name']);
        if (verifyName($lastName)) {} else {
            $errors['last-name'] = "Please enter a valid last name";
        }
    } else {
        $errors['last-name'] = "Please enter your last name";
    }

    /*
     * Verify email and check that email is not already taken
     */
    if (! empty($_POST['email'])) {
        $vals['email'] = $email = cleanData($_POST['email']);
        if (verifyEmail($email)) {
            if (checkRecordNotExists('users', 'email', $email)) {} else {
                $errors['email'] = "This email has already been used, please login instead!";
            }
        } else {
            $errors['email'] = "Please enter a valid email";
        }
    } else {
        $errors['email'] = "Please enter your email";
    }

    /*
     * Verify username and check that username is not already taken
     */
    if (! empty($_POST['username'])) {
        $vals['username'] = $username = cleanData($_POST['username']);
        if (verifyUsername($username)) {
            if (strlen($username) >= 2 && strlen($username) <= 15) {
                if (checkRecordNotExists('users', 'username', $username)) {} else {
                    $errors['username'] = "This username is already taken!";
                }
            } else {
                $errors['username'] = "Username must be between 2 and 15 characters long";
            }
        } else {
            $errors['username'] = "Please enter a valid username";
        }
    } else {
        $errors['username'] = "Please enter a username";
    }

    /*
     * Verify password
     */
    
    // TODO: password length and requirement checking
    if (! empty($_POST['password'])) {
        $password = cleanData($_POST['password']);
    } else {
        $errors['password'] = "Please enter a password";
    }

    /*
     * Verify confirm-password and make sure that it and password match
     */
    if (! empty($_POST['confirm-password'])) {
        $confirmPW = cleanData($_POST['confirm-password']);
        if ($password == $confirmPW) {} else {
            $errors['confirm-password'] = "Passwords do not match";
        }
    } else {
        $errors['confirm-password'] = "Please confirm password";
    }

    /*
     * Verify phone number
     */
    if (! empty($_POST['phone'])) {
        $vals['phone'] = $phone = cleanPhone($_POST['phone']);
        if (!verifyPhone($phone)) {
            $errors['phone'] = "Please enter a valid phone number";
        }
    } else {
        $errors['phone'] = "Please enter your phone number";
    }

    /*
     * Verify all parts of the user's address
     */
    if (! empty($_POST['address-1'])) {
        $vals['address-1'] = $address1 = cleanData($_POST['address-1']);
        if (verifyAddress($address1)) {} else {
            $errors['address-1'] = "Please enter a valid street address";
        }
    } else {
        $errors['address-1'] = "Please enter your street address";
    }

    if (! empty($_POST['address-2'])) {
        $vals['address-2'] = $address2 = cleanData($_POST['address-2']);
        if (verifyAddress($address2)) {} else {
            $errors['address-2'] = "Please enter a valid street address";
        }
    }

    if (! empty($_POST['city'])) {
        $vals['city'] = $city = cleanData($_POST['city']);
        if (verifyAddress($city)) {} else {
            $errors['city'] = "Please enter a valid city";
        }
    } else {
        $errors['city'] = "Please enter your city";
    }

    if (! empty($_POST['state'])) {
        $vals['state'] = $state = cleanData($_POST['state']);
        if (verifyState($state)) {} else {
            $errors['state'] = "Please choose a valid state";
        }
    } else {
        $errors['state'] = "Please select your state";
    }

    if (! empty($_POST['zipcode'])) {
        $vals['zipcode'] = $zipcode = $_POST['zipcode'];
        if (verifyZipcode($zipcode)) {} else {
            $errors['zipcode'] = "Please enter a valid zipcode";
        }
    } else {
        $errors['zipcode'] = "Please enter your zipcode";
    }

    /*
     * Check if a user would like to stay logged in on this device
     */
    if (isset($_POST['remember-me'])) {
        $rememberMe = true;
    } else {
        $rememberMe = false;
    }

    /*
     * If errors arr is empty, register the user
     * Otherwise, return errors to the registration page
     */
    if (empty($errors)) {
        doRegistration($firstName, $lastName, $email, $username, $password, $phone, $address1, $address2, $city, $state, $zipcode, $rememberMe);
    } else {
        // For now just dump errors but in the future they will be handled
    }
}

/**
 * Carries out the registration using the provided variables
 *
 * @param String $firstName
 * @param String $lastName
 * @param String $email
 * @param String $username
 * @param String $password
 * @param String $confirmPW
 * @param String $address1
 * @param String $address2
 * @param String $city
 * @param String $state
 * @param Integer $zipcode
 * @param Boolean $rememberMe
 */
function doRegistration($firstName, $lastName, $email, $username, $password, $phone, $address1, $address2, $city, $state, $zipcode, $rememberMe)
{
    $password = password_hash($password, PASSWORD_DEFAULT);
    global $con, $user;

    // Insert new user
    $sql = "INSERT INTO users (first_name, last_name, email, username, password, phone_number) VALUES (?, ?, ?, ?, ? ,?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssssss", $firstName, $lastName, $email, $username, $password, $phone);
    $stmt->execute();
    $stmt->close();

    // Get ID of the user just created
    $stmt = $con->prepare("SELECT ID FROM users WHERE email=?;");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $result = $result->fetch_assoc();
    $stmt->close();

    // Add user's primary address
    $userID = $result['ID'];
    $stmt = $con->prepare("INSERT INTO addresses (line1, line2, city, state, zipcode, user_ID) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssii", $address1, $address2, $city, $state, $zipcode, $user->ID);
    $stmt->execute();
    $stmt->close();
    
    //TODO: Implement link redirection for login pages
    initializeSession($username, $rememberMe, null);
}

?>