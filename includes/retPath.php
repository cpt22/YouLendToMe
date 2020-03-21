<?php
$retMap = array(
    'azOfQW' => '/create.php',
);

function getRet($ret, $options) {
    global $retMap;
    $link = $retMap[$ret];
    if (!empty($link) && $link != "") {
        if ($options != null && $options != "") {
            $link . "?" . $options;
        }
        return $link;
    }
}

//TODO: REMOVE
/*
function getRet($ret) {
    return getRet($ret, "");
}*/

?>