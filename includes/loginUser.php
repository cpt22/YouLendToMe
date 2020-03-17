<?php
define('__ROOT__', dirname(dirname(dirname(__FILE__))));
require_once __ROOT__ . '/includes/session.php';
require_once __ROOT__ . '/includes/verify.php';

$username = $password = $rememberMe = "";
$path = $redirectURL = "";

$errors = array();

if (isset($_GET['ret'])) {
    $path = cleanData($_GET['ret']);
    if (isset($_GET['item'])) {
        $item = cleanData($_GET['item']);
        $path = getRet($path, $item);
    } else {
        $path = getRet($path);
    }
    
    $redirectURL = "http://localhost/" . $path;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username'])) {
        $username = cleanData($_POST['username']);
    } else {
        $errors['username'] = "Missing username";
    }

    if (isset($_POST['password'])) {
        $password = cleanData($_POST['password']);
    } else {
        $errors['password'] = "Missing password";
    }

    if (isset($_POST['remember-me'])) {
        $rememberMe = cleanData($_POST['remember-me']);
    } else {
        
    }

    if (empty($errors)) {
        doLogin($username, $password, $rememberMe);
    } else {
        var_dump($errors);
    }
}

function doLogin($username, $password, $rememberMe)
{
    global $con, $redirectURL;
    $sql = "SELECT username,password FROM users WHERE username=?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result - num_rows == 1) {
        $result = $result->fetch_assoc();

        $username = $result['username'];
        $passwordHash = $result['password'];
               
        if (password_verify($password, $passwordHash)) {
            initializeSession($username, $redirectURL);
        } else {
            echo "USER NOT FOUND";
        }
    } else {
        echo "USER NOT FOUND";
    }
}
?>