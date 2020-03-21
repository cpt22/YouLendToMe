<?php
require_once SRC . 'session.php';

if (!isUserLoggedIn()) {
    header('Location: ' . __HOST__ . 'user/login.php?ret=azOfQW');
}
?>