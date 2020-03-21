<?php
define('__ROOT__', dirname(dirname(dirname(__FILE__))));
require_once __ROOT__ . '/includes/session.php';

if (isset($_SESSION['username']) || isset($_SESSION['userID'])) {
    // remove PHPSESSID from browser
    if (isset($_COOKIE[session_name()]))
        setcookie(session_name(), "", time() - 3600);
    // clear session from globals
    $_SESSION = array();
    // clear session from disk
    session_destroy();
    
    //location("Header: ../index.php");
    //Begin new session
    session_start();
}
    header("location: http://localhost/index.php");
?>