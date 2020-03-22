<?php
require_once SRC . 'connect.php';
require_once SRC . 'verify.php';

$email = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email']) && $_POST['email'] != "") {
        $email = cleanData($_POST['email']);
        
        if (verifyEmail($email)) {
            if (checkRecordNotExists("users", "email", $email)) {
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