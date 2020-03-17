<?php
$retMap = array(
    'azOfQW' => '/create.php',
);

function getRet($ret, $options) {
    global $retMap;
    $link = $retMap[$ret];
    if (!empty($link) && $link != "") {
        if ($options != "") {
            $link . "?" . $options;
        }
        return $link;
    }
}

function getRet($ret) {
    return getRet($ret, "");
}

?>