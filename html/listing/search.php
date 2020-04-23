<?php
require_once SRC . 'classes/Item.php';

$items = array();

if (!empty($_GET['s'])) {
    $search = cleanData($_GET['s']);
    $search = trim($search);
  
    $search = '+' . str_replace(' ', ' +', $search) . '*';
    $sql = "SELECT ID, MATCH(items.title, items.description) AGAINST(? IN BOOLEAN MODE) AS SCORE
        FROM items
    WHERE MATCH(items.title, items.description) AGAINST(? IN BOOLEAN MODE)
    ORDER BY `SCORE` DESC
    LIMIT 25";

    $stmt = $con->prepare($sql) or die(mysqli_error($con));
    $stmt->bind_param("ss", $search, $search) or die(mysqli_error($con));
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
  <div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1 class="display-12">Search for Item</h1>
			<p class="lead">Use the search bar to find your desired item</p>
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col-md-7">

			<form method="get" action="">
				<div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4">
					<div class="input-group">
						<input type="search" placeholder="What're you searching for?"
							aria-describedby="button-addon1"
							class="form-control border-0 bg-light" name="s" value="<?php echo $_GET['s']; ?>">
						<div class="input-group-append">
							<button id="button-addon1" type="submit"
								class="btn btn-link text-primary">
								Submit<i class="fa fa-search"></i>
							</button>
						</div>
					</div>
				</div>
			</form>

			<?php
			if (count($items) == 0) {
			    echo '<div class="row border-bottom">Your search returned no results!</div>';
			}
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
                                <div class="row">Category: ' . $item->getCategory()['name'] . '</div>
                                <div class="row">Location: ' . $item->getLocation() . '</div>
                                <div class="row">Available Until: ' . date("m-d-Y", strtotime($item->getEndDate())) . '</div>
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
