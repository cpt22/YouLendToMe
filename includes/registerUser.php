<?php
require_once 'session.php';
require_once 'verify.php';

$firstName = $lastName = $email = $username = $password = $confirmPW = $phone = $address1 = $address2 = $city = $state = $zipcode = $rememberMe = "";
$errors = array();

if ($_SERVER['method']="post") {
    /*
     * Verify first and last names 
     */
    if (!empty($_POST['first-name'])) {
        $firstName = cleanData($_POST['first-name']);
        if (verifyName($firstName)) {
            
        } else {
            $errors['first-name'] = "Please enter a valid first name";
        }
    } else {
        $errors['first-name'] = "Please enter your first name";
    }
    
    if (!empty($_POST['last-name'])) {
        $lastName = cleanData($_POST['last-name']);
        if (verifyName($lastName)) {
            
        } else {
            $errors['last-name'] = "Please enter a valid last name";
        }
    } else {
        $errors['last-name'] = "Please enter your last name";
    }
    
    /*
     * Verify email and check that email is not already taken
     */
    if (!empty($_POST['email'])) {
        $email = cleanData($_POST['email']);
        if (verifyEmail($email)) {
            if (checkRecordNotExists('users', 'email', $email)) {
                
            } else {
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
    if (!empty($_POST['username'])) {
        $username = cleanData($_POST['username']);
        if (verifyUsername($username)) {
            if (checkRecordNotExists('users', 'username', $username)) {
                
            } else {
                $errors['username'] = "This username is already taken!";
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
    if (!empty($_POST['password'])) {
        $password = cleanData($_POST['password']);
    } else {
        $errors['password'] = "Please enter a password";
    }
    
    /*
     * Verify confirm-password and make sure that it and password match
     */
    if (!empty($_POST['confirm-password'])) {
        $confirmPW = cleanData($_POST['confirm-password']);
        if ($password == $confirmPW) {
            
        } else {
            $errors['confirm-password'] = "Passwords do not match";
        }
    } else {
        $errors['confirm-password'] = "Please confirm password";
    }
    
    /*
     * Verify phone number
     */
    if (!empty($_POST['phone'])) {
        $phone = cleanPhone($_POST['phone']);
        if (verifyPhone($phone)) {
            
        } else {
            $errors['phone'] = "Please enter a valid phone number";
        }
    } else {
        $errors['phone'] = "Please enter your phone number";
    }
    
    /*
     * Verify all parts of the user's address
     */
    if (!empty($_POST['address-1'])) {
        $address1 = cleanData($_POST['address-1']);
        if (verifyAddress($address1)) {
            
        } else {
            $errors['address-1'] = "Please enter a valid street address";
        }
    } else {
        $errors['address-1'] = "Please enter your street address";
    }
    
    if (!empty($_POST['address-2'])) {
        $address2 = cleanData($_POST['address-2']);
        if (verifyAddress($address2)) {
            
        } else {
            $errors['address-2'] = "Please enter a valid street address";
        }
    }
    
    if (!empty($_POST['city'])) {
        $city = cleanData($_POST['city']);
        if (verifyAddress($city)) {
            
        } else {
            $errors['city'] = "Please enter a valid city";
        }
    } else {
        $errors['city'] = "Please enter your city";
    }
    
    if (!empty($_POST['state'])) {
        $state = cleanData($_POST['state']);
        if (verifyState($state)) {
            
        } else {
            $errors['state'] = "Please choose a valid state";
        }
    } else {
        $errors['state'] = "Please select your state";
    }
    
    if (!empty($_POST['zipcode'])) {
        $zipcode = $_POST['zipcode'];
        if (verifyZipcode($zipcode)) {
           
        } else {
           $errors['zipcode'] = "Please enter a valid zipcode"; 
        }
    } else {
        $errors['zipcode'] = "Please enter your zipcode";
    }
    
    /*
     * Check if a user would like to stay logged in on this device
     */
    if (!empty($_POST['remember-me'])) {
        $rememberMe = cleanData($_POST['remember-me']);
        if ($rememberMe == "true") {
            $rememberMe = true;
        } else {
            $rememberMe = false;
        }
    } else {
        
    }
    
    
    if (empty($errors)) {
        doRegistration($firstName, $lastName, $email, $username, $password, $phone, $address1, $address2, $city, $state, $zipcode, $rememberMe);
    } else {
        var_dump($errors);
    }
}

/**
 * Carries out the registration using the provided variables
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
function doRegistration($firstName, $lastName, $email, $username, $password, $phone, $address1, $address2, $city, $state, $zipcode, $rememberMe) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    global $con;
    $sql = "INSERT INTO users (first_name, last_name, email, username, password, phone_number) VALUES (?, ?, ?, ?, ? ,?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssssss", $firstName, $lastName, $email, $username, $password, $phone);
    $stmt->execute();
    $stmt->close();
    
    $stmt = $con->prepare("SELECT ID FROM users WHERE email=?;");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $result = $result->fetch_assoc();
    $stmt->close();
    
    $userID = $result['ID'];
    $stmt = $con->prepare("INSERT INTO addresses (line1, line2, city, state, zipcode, user_ID) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssii", $address1, $address2, $city, $state, $zipcode, $userID);
    $stmt->execute();
    $stmt->close();
}


?>