<?php

require_once '../verifyData.php';
$firstName = $lastName = $email = $username = $password = $confirmPW = $address1 = $address2 = $city = $state = $zipcode = $rememberMe = "";
$errors = array();

if ($_SERVER['method']="post") {
    if (!empty($_POST['first-name'])) {
        $firstName = cleanData($_POST['first-name']);
        if (verifyName($firstName)) {
            
        } else {
            
        }
    } else {
        
    }
    
    if (!empty($_POST['last-name'])) {
        $lastName = cleanData($_POST['last-name']);
        if (verifyName($firstName)) {
            
        } else {
            
        }
    } else {
        
    }
    
    if (!empty($_POST['email'])) {
        $email = cleanData($_POST['email']);
        if (verifyEmail($email)) {
            
        } else {
            
        }
    } else {
        
    }
    
    if (!empty($_POST['username'])) {
        $username = cleanData($_POST['username']);
        if (verifyUsername($username)) {
            if (checkRecordNotExists('users', 'username', $username)) {
                
            } else {
                
            }
        } else {
            
        }
    } else {
        
    }
    
    if (!empty($_POST['password'])) {
        $password = cleanData($_POST['password']);
    } else {
        
    }
    
    if (!empty($_POST['confirm-password'])) {
        $confirmPW = cleanData($_POST['confirm-password']);
        if ($password == $confirmPassword) {
            
        } else {
            
        }
    } else {
        
    }
    
    if (!empty($_POST['address-1'])) {
        $address1 = cleanData($_POST['address-1']);
        if (verifyAddress($address1)) {
            
        } else {
            
        }
    } else {
        
    }
    
    if (!empty($_POST['address-2'])) {
        $address2 = cleanData($_POST['address-2']);
        if (verifyAddress($address2)) {
            
        } else {
            
        }
    }
    
    if (!empty($_POST['city'])) {
        $city = cleanData($_POST['city']);
        if (verifyAddress($city)) {
            
        } else {
            
        }
    } else {
        
    }
    
    if (!empty($_POST['state'])) {
        $state = cleanData($_POST['state']);
        if (verifyState($state)) {
            
        } else {
            
        }
    } else {
        
    }
    
    if (!empty($_POST['zipcode'])) {
        $zipcode = $_POST['zipcode'];
        if (verifyZipcode($zipcode)) {
           
        } else {
            
        }
    } else {
        
    }
    
    if (!empty($_POST['remember-me'])) {
        $rememberMe = $_POST['remember-me'];
    } else {
        
    }
} 


?>