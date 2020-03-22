<?php

function storeTokenForUser($userID, $expires, $type){
    global $con;

    do {
        $token = generateToken(96);
    } while (isTokenUsed($token));
    
    $con->query("INSERT INTO tokens (token, expires, type, ID) VALUES ('$token', '$expires', '$type', '$userID')") or error_log(mysqli_error($con));
    return $token;
}

function generateToken($length) {
    $token = openssl_random_pseudo_bytes($length / 2);
    $token = bin2hex($token);
    return $token;
}

function isTokenUsed($token) {
    global $con;
    $res = $con->query("SELECT ID FROM tokens WHERE token='$token'");
    return !($res->num_rows == 0);
}

function removeToken($token) {
    global $con;
    $stmt = $con->prepare("DELETE FROM tokens WHERE token=?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $stmt->close();
}

function getRowFromToken($token) {
    global $con;
    $stmt = $con->prepare("SELECT * FROM tokens WHERE token=?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    return $result;
}

?>