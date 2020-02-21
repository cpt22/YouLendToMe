<?php
require_once 'connect.php';
require_once 'USStates.php';

function cleanData($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function cleanPhone($data) {
    $data = cleanData($data);
    $data = preg_replace("/[^0-9]+/", "", $data);
    return $data;
}

/*function cleanAlphabetical($data) {
    $data = cleanData($data);
    $data = preg_replace("/[^a-zA-Z]+/", "", $data);
    return $data;
}

function cleanAlphabeticalWWS($data) {
    $data = cleanData($data);
    $data = preg_replace("/[^a-zA-Z ]+/", "", $data);
    return $data;
}

function cleanAlphanumeric($data) {
    $data = cleanData($data);
    $data = preg_replace("/[^a-zA-Z0-9]+/", "", $data);
    return $data;
}*/

/**
 * Verifies validity of name
 * @param String $name
 * @return true if valid name
 */
function verifyName($name) {
    return preg_match("/^[a-zA-Z.\-' ]*$/",$name);
}

/**
 * Verifies validity of email
 * @param String $email
 * @return mixed
 */
function verifyEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function verifyUsername($username) {
    return preg_match("/^[a-zA-Z0-9]*$/", $username);
}

function verifyPhone($phone) {
    /*
     * ADD MORE LOGIC TO VERIFY PHONES HERE
     */
    return preg_match("/^[0-9]*$/", $phone);
}

function verifyAddress($addr) {
    return preg_match("/^[a-zA-Z0-9. ]*$/", $addr);
}

function verifyState($state) {
    global $USStates;
    return in_array($state, $USStates);
}

function verifyZipcode($zip) {
    return (preg_match("/^[0-9]*$/", $zip) && strlen($zip) == 5);
}


/**
 * Returns true if specified record does not exist
 * @param String $tblName
 * @param String $attrName
 * @param String $value
 * @return boolean
 */
function checkRecordNotExists($tblName, $attrName, $value) {
    return !checkRecordExists($tblName, $attrName, $value);
}

/**
 * Returns true if specified record exists
 * @param String $tblName
 * @param String $attrName
 * @param String $value
 * @return boolean
 */
function checkRecordExists($tblName, $attrName, $value) {
    global $con;
    $sql = "SELECT ID FROM users WHERE " . $attrName . "=?;";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $value);
    $stmt->execute();
    $result = $stmt->get_result(); // get the mysqli result
    
    if ($result->num_rows > 0) {
        return true;
    }
    return false;
}
?>