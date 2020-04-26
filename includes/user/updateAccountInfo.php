<?php
$messages = array();
var_dump($con);
if (isUserLoggedIn() && isset($_POST['submit'])) {

    /**
     * Update Email
     */
    if (! empty($_POST['email'])) {
        $messages['email'] = array();
        $email = cleanData($_POST['email']);
        if (verifyEmail($email)) {
            if (checkRecordNotExists('users', 'email', $email)) {
                $sql = "UPDATE USERS SET email=? WHERE username='" . $user->getUsername() . "'";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $stmt->close();
                $messages['email']['status'] = true;
                $messages['email']['message'] = "Email successfully updated!";
            } else {
                $messages['email']['status'] = false;
                $messages['email']['message'] = "Email already taken!";
            }
        } else {
            $messages['email']['status'] = false;
            $messages['email']['message'] = "Invalid email address!";
        }
    }

    /**
     * Update phone
     */
    if (! empty($_POST['phone'])) {
        $messages['phone'] = array();
        $phone = cleanData($_POST['phone']);
        if (verifyPhone($phone)) {
            $sql = "UPDATE USERS SET phone_number=? WHERE username='" . $user->getUsername() . "'";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->close();
            $messages['phone']['status'] = true;
            $messages['phone']['message'] = "Phone number successfully updated!";
        } else {
            $messages['phone']['status'] = false;
            $messages['phone']['message'] = "Invalid phone number!";
        }
    }
    
    /**
     * Add Address
     */
    if (!empty($_POST['street1']) && !empty($_POST['city']) && !empty($_POST['state']) && !empty($_POST['zipcode'])) {
        $street1 = cleanData($_POST['street1']);
        $street2 = cleanData($_POST['street2']);
        $city = cleanData($_POST['city']);
        $state = cleanAlphanumeric($_POST['state']);
        $zipcode = cleanNumeric($_POST['zipcode']);
        
        $messages['address'] = array();
        if (verifyAddress($street1) && verifyAddress($street2) && verifyAddress($city) && verifyState($state) && verifyZipcode($zipcode)) {
            $sql = "INSERT INTO addresses (line1, line2, city, state, zipcode, user_ID) VALUES (?,?,?,?,?,?)";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("ssssii", $street1, $street2, $city, $state, $zipcode, $user->getUserID());
            $stmt->execute();
            $stmt->close();
            $messages['address']['status'] = true;
            $messages['address']['message'] = "Added new address!";
        } else {
            $messages['address']['status'] = false;
            $messages['address']['message'] = "Invalid address!";
        }
    }
    
    /**
     * Add credit card
     */
    if (!empty($_POST['cardnumber']) && !empty($_POST['expMonth']) && !empty($_POST['expYear']) && !empty($_POST['cvv'])) {
        $number = cleanNumeric($_POST['cardnumber']);
        $month = cleanNumeric($_POST['expMonth']);
        $year = cleanNumeric($_POST['expYear']);
        $cvv = cleanNumeric($_POST['cvv']);
        
        $messages['card'] = array();
        if (verifyMonth($month) && verifyYear($year) && verifyCCNumber($number)) {
            $sql = "INSERT INTO credit_cards (number, exp_month, exp_year, cvv, user_ID) VALUES (?,?,?,?,?)";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("ssssi", $number, $month, $year, $cvv, $user->getUserID());
            $stmt->execute();
            $stmt->close();
            $messages['card']['status'] = true;
            $messages['card']['message'] = "Added new credit card!";
        } else {
            $messages['card']['status'] = false;
            $messages['card']['message'] = "Invalid credit card!";
        }
    }
}
?>
