<?php
require_once SRC . 'classes/Item.php';

$items = array();

if (isset($_GET['s'])) {
    $search = cleanData($_GET['s']);
    $sql = "SELECT ID FROM items WHERE deleted=0 AND MATCH(title, description)
    AGAINST(? IN NATURAL LANGUAGE MODE) LIMIT 50";
    
    if (substr_count($search, ' ') <= 1) {
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
    }
    
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $search);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    
    while ($row = $result->fetch_assoc()) {
        array_push($items, new Item($row['ID']));
    }
}

?>
<!doctype html>
<html lang="en">
<head>
<?php require_once SRC . 'components/header.php'; ?>
<title>You Lend To Me</title>
<style>
.square {
    height: 200px;
    width: 200px;
}
</style>
</head>
<body>
	<?php require_once SRC . 'components/navbar.php'; ?>
	<div class="row justify-content-center">
		<div class="col-md-7">

			<?php
			foreach ($items as $item) {
			     echo '<div class="row border-bottom listing-row">
				            <div class="col py-3">
					           <div class="image-holder">
						          <img src="' . $item->getImages()[0]->getURL() . '" class="square" />
					           </div>
				            </div>
				            <div class="col-sm-9 py-3">
					           <div class="row title-text"><a href="' . __HOST__ . 'listing/item.php?i=' . $item->getID() . '" class="title-link">' . $item->getTitle() . '</a></div>
				                <div class="row">$' . $item->getRate() . ' per day</div>
                                <div class="row">Category: '. $item->getCategory()['name'] . '</div>
                                <div class="row">Location: ' . $item->getLocation() . '</div>
                                <div class="row">Available Until: '. date("m-d-Y", strtotime($item->getEndDate())) . '</div>
                                <div class="row"><br></div>
                            </div>
			             </div>';
			}
			?>
		</div>
	</div>
	<?php require_once SRC . 'components/footer.php'; ?>
</body>
</html>

 
