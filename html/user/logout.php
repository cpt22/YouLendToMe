<?php
$params = array();
$redirectURL = "";
parse_str(parse_url($_SERVER['HTTP_REFERER'], PHP_URL_QUERY), $params);
if (isset($params['redir'])) {
    $path = cleanData($_GET['redir']);
    if (isset($params['i'])) {
        $item = 'i=' . cleanData($params['i']);
        $redirectURL = getRet($path, $item);
    } else {
        $redirectURL = getRet($path, null);
    }
} else {
    $redirectURL = __HOST__ . "index.php";
}

if (isset($_SESSION['username']) || isset($_SESSION['userID'])) {
    // remove PHPSESSID from browser
    if (isset($_COOKIE[session_name()]))
        setcookie(session_name(), "", time() - 3600);
    
    // Remove remember me cookie
    if (isset($_COOKIE['remember'])) {
        removeToken($_COOKIE['remember']);
        setcookie('remember', "", time() - 3600, "/");
    }
    
    // clear session from globals
    $_SESSION = array();
    // clear session from disk
    session_destroy();
    
    //location("Header: ../index.php");
    //Begin new session
    //session_start();
}

header("Location: " . $redirectURL);
?>
