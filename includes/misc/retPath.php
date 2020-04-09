<?php
$retMap = array(
    'azOfQW' => 'listing/new.php',
    'tkj59g' => 'listing/item.php'
);

function getRet($ret, $options) {
    global $retMap;
    $link = $retMap[$ret];
    if (!empty($link) && $link != "") {
        $link = __HOST__ . $link;
        
        if (!empty($options)) {
            $link = $link . "?" . $options;            
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