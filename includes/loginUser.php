<?php
require_once SRC . 'session.php';
require_once SRC . 'verify.php';

$username = $password = $rememberMe = "";
$path = $redirectURL = "";

$errors = array();
$vals = array();

// TODO: Implement autoredirect when prompted to login from a specific page.
if (isset($_GET['redir'])) {
    $path = cleanData($_GET['redir']);
    if (isset($_GET['item'])) {
        $item = cleanData($_GET['item']);
        $path = getRet($path, $item);
    } else {
        $path = getRet($path, null);
    }
    
    $redirectURL = __HOST__ . $path;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    if (isset($_POST['username'])) {
        $vals['username'] = $username = cleanData($_POST['username']);
    } else {
        $errors['username'] = "Missing username";
    }

    if (isset($_POST['password'])) {
        $vals['password'] = $password = cleanData($_POST['password']);
    } else {
        $errors['password'] = "Missing password";
    }

    if (isset($_POST['remember-me'])) {
        $rememberMe = true;
    } else {
        $rememberMe = false;
    }

    if (empty($errors)) {
        doLogin($username, $password, $rememberMe);
    } else {
        var_dump($errors);
    }
}

function doLogin($username, $password, $rememberMe)
{
    global $con, $errors, $redirectURL;
    $sql = "SELECT username,password FROM users WHERE username=?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows == 1) {
        $result = $result->fetch_assoc();

        $username = $result['username'];
        $passwordHash = $result['password'];
               
        if (password_verify($password, $passwordHash)) {
            initializeSession($username, $rememberMe, $redirectURL);
            return;
        }
    }
    $errors['loginAttempt'] = false;
}
?>