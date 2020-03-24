<?php
require_once SRC . 'classes/Item.php';

$items = array();

if (isset($_GET['s'])) {
    $search = cleanData($_GET['s']);
    $sql = "SELECT ID FROM items WHERE MATCH(title, description)
    AGAINST(? IN NATURAL LANGUAGE MODE) LIMIT 50";
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
			<div class="row border-bottom">
				<div class="col py-3">
					<div class="image-holder">
						<img src="../images/meyer.jpg" class="square" />
					</div>
				</div>
			</div>
			<div class="row">Hi2</div>
			<div class="row">Hi3</div>
		</div>
	</div>
	<?php require_once SRC . 'components/footer.php'; ?>
</body>
</html>

 
