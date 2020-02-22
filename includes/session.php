<?php
//Begin user session
session_start();

define('__ROOT__', dirname(dirname(__FILE__))); 
require_once __ROOT__ . '/includes/connect.php';
require_once __ROOT__ . '/includes/classes/User.php';


$user = null;

if (isset($_SESSION['username']) && isset($_SESSION['userID'])) {
    $user = new User($_SESSION['username'], $_SESSION['userID']);
    $user->initialize($_SESSION['email'], $_SESSION['firstName'], $_SESSION['lastName']);
} else {
    unset($_SESSION['username']);
    unset($_SESSION['userID']);
}

/**
 * Initializes the session with variables from the database
 * @param Int $userID
 */
function initializeSession($username) {
    global $con;
    
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $con->query($sql);
    
    if ($result->num_rows == 1) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['userID'] = $row['ID'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['firstName'] = $row['first_name'];
            $_SESSION['lastName'] = $row['last_name'];
        }
    }
    
    header("Location: account.php");
}
?>