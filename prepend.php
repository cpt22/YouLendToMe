<?php
define('ROOT', dirname(__FILE__) . "/");
define('SRC', ROOT . 'includes/');
require_once ROOT . 'env.php' ;
require_once SRC . 'connect.php';
require_once SRC . 'session.php';
require_once SRC . 'misc/verify.php';
require_once SRC . 'classes/Item.php';
?>