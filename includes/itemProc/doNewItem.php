<?php
require_once SRC . 'session.php';

if (!isUserLoggedIn()) {
    header('Location: https://youlendto.me/user/login.php?ret=azOfQW');
}
?>