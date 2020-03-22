<?php
//Begin user session
session_start();

require_once SRC . 'connect.php';
require_once SRC . 'classes/User.php';
require_once SRC . "spec/tokenizer.php";

$user = null;

if (isset($_SESSION['username']) && isset($_SESSION['userID'])) {
    $user = new User($_SESSION['username'], $_SESSION['userID']);
    $user->initialize($_SESSION['email'], $_SESSION['firstName'], $_SESSION['lastName']);
} else if (isset($_COOKIE['remember'])) {
    logUserInWithToken($_COOKIE['remember']);
} else {
    unset($_SESSION['username']);
    unset($_SESSION['userID']);
}

/**
 * Initializes the session with variables from the database
 * @param Int $userID
 */
function initializeSession($username, $rememberMe, $url) {
    global $con;
    
    loadUserInfo($username, null);
    
    if ($rememberMe != null && $rememberMe) {
        $token = storeTokenForUser($_SESSION['userID'], time() + (86400 * 30), 0);
        setcookie('remember', $token, time() + (86400 * 30), "/");
    }
    
    if ($url != null && $url != "") {
       header("Location: " . $url);
    } else {
       header ("Location: " . __HOST__ . "user/index.php");
    }
}

//TODO: REMOVE
/*function initializeSession($username) {
    intializeSession($username, "index.php");
}*/

function loadUserInfo($username, $userID) {
    global $con;
    if ($username != null) {
        $sql = "SELECT * FROM users WHERE username='$username'";
    } else if ($userID != null) {
        $sql = "SELECT * FROM users WHERE ID='$userID'";
    } else {
        return;
    }
    
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
}

function logUserInWithToken($token) {
    global $con;
    $result = getRowFromToken($token);
    
    if ($result->num_rows == 1) {
        $result = $result->fetch_assoc();
        if ($result['expires'] < time())
            return;
        
        if ($result['type'] != 0)
            return;
        
        loadUserInfo(null, $result['ID']);
    }   
}

/**
 * Returns if user is logged in or not
 * @return boolean
 */
function isUserLoggedIn() {
    return isset($_SESSION['username']) && isset($_SESSION['userID']);
}
?>