<?php 
function getResults($searchTerm) {
    global $con;
    $items = array();
    $search = $searchTerm;
    $sql = "SELECT ID FROM items WHERE MATCH(title, description)
    AGAINST(? IN NATURAL LANGUAGE MODE) LIMIT 50";
    
    /*if (substr_count($search, ' ') <= 1) {
        $sql = "SELECT ID
    FROM items
    WHERE name like '%{$search}%')
    ORDER BY
      name LIKE '{$search}%') DESC,
      ifnull(nullif(instr(name, ' {$search}'), 0), 99999),
      ifnull(nullif(instr(name, '{$search}'), 0), 99999),
      name
    LIMIT 10";
    } else {
        $search = '+' . str_replace(' ', ' +', $search) . '*';
        $sql = "SELECT ID MATCH(items.name) AGAINST('{$search}' IN BOOLEAN MODE) AS SCORE
        FROM items
    WHERE MATCH(items.name) AGAINST('{$search}' IN BOOLEAN MODE)
    ORDER BY `SCORE` DESC
    LIMIT 10";
    }*/
    
    $stmt = $con->prepare($sql) or die(mysqli_error($con));
    $stmt->bind_param("s", $search);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    
    while ($row = $result->fetch_assoc()) {
        array_push($items, new Item($row['ID']));
    }
    
    return $items;
}
?>