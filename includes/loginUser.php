<?php
sumbit();

function submit() {
    if ($_SERVER['method'] = "post") {
        if (isset($_POST['username'])) {} else {}

        if (isset($_POST['username'])) {} else {}

        if (isset($_POST['remember-me'])) {} else {}
    } else {
        header("Location: ../login.php");
        die();
    }
}

function doLogin($username, $password, $rememberMe) {
    
}
?>