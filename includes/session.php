<?php
// Begin user session
session_start();

require_once SRC . 'classes/User.php';
require_once SRC . "misc/tokenizer.php";

$user = null;

if (isset($_SESSION['username']) && isset($_SESSION['userID'])) {
    initializeUser();
} else if (isset($_COOKIE['remember'])) {
    logUserInWithToken($_COOKIE['remember']);
} else {
    unset($_SESSION['username']);
    unset($_SESSION['userID']);
}

/**
 * Initializes the session with variables from the database
 *
 * @param Int $userID
 */
function initializeSession($username, $rememberMe, $url)
{
    global $con;

    loadUserInfo($username, null);

    if ($rememberMe != null && $rememberMe) {
        $token = storeTokenForUser($_SESSION['userID'], time() + (86400 * 30), 0);
        setcookie('remember', $token, time() + (86400 * 30), "/");
    }

    redirectUser($url);
}

function redirectUser($url) {
    if ($url != null && ! empty($url)) {
        header("Location: " . $url);
    } else {
        header("Location: " . __HOST__ . "user/index.php");
    }
    exit();
}

function initializeUser()
{
    global $user;
    $user = new User($_SESSION['username']);
}

function loadUserInfo($username, $userID)
{
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

function logUserInWithToken($token)
{
    global $con;
    $result = getRowFromToken($token);

    if ($result->num_rows == 1) {
        $result = $result->fetch_assoc();
        if ($result['expires'] < time()) {
            removeToken($token);
            setCookie('remember', '', time() - 3600, '/');
            return;
        }

        if ($result['type'] != 0)
            return;

        loadUserInfo(null, $result['ID']);
    }

    initializeUser();
}

/**
 * Returns if user is logged in or not
 *
 * @return boolean
 */
function isUserLoggedIn()
{
    return isset($_SESSION['username']) && isset($_SESSION['userID']);
}

function sendToLoginParam($param)
{
    header("Location: " . __HOST__ . "user/login.php?" . $param);
}

function sendToLogin()
{
    error_log("sent to login");
    header("Location: " . __HOST__ . "user/login.php");
}

?>