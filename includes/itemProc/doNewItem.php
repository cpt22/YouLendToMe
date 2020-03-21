<?php
define('__ROOT__', dirname(dirname(dirname(__FILE__))));
require_once __ROOT__ . '/includes/session.php';

if (!isUserLoggedIn()) {
    header('Location: https://youlendto.me/user/login.php?ret=azOfQW');
}
?>