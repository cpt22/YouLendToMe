<?php
require_once SRC . 'connect.php';
require_once SRC . 'verify.php';

$username = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username']) && $_POST['username'] != "") {
        $username = cleanData($_POST['username']);
        
        if (verifyUsername($username)) {
            if (checkRecordNotExists("users", "username", $username)) {
                echo "available";
            } else {
                echo "unavailable";
            }
            return;
        }
    }
}
echo "error";

?>