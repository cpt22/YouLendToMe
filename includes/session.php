<?php
//Begin user session
session_start();

require_once SRC . 'connect.php';
require_once SRC . 'classes/User.php';


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
function initializeSession($username, $url) {
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
    
    if ($url != null && $url != "") {
        header("Location: " . $url);
    } else {
        header ("Location: https://youlendto.me/user/index.php");
    }
}

//TODO: REMOVE
/*function initializeSession($username) {
    intializeSession($username, "index.php");
}*/

/**
 * Returns if user is logged in or not
 * @return boolean
 */
function isUserLoggedIn() {
    return isset($_SESSION['username']) && isset($_SESSION['userID']);
}
?>