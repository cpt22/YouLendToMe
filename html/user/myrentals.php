<?php
if (! isUserLoggedIn()) {
    sendToLogin(null);
}
require_once SRC . 'classes/Item.php';

$items = array();

$sql = "SELECT ID
FROM items I, borrows B
WHERE B.user_ID=" . $user->getUserID() . "
    AND B.item_ID=I.ID";
$result = $con->query($sql);
while ($row = $result->fetch_assoc()) {
    array_push($items, new Item($row['ID']));
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
.title-text {
    font-size: 1.5em;
}

.title-link {
    color: black;
}

.title-link:hover {
    text-decoration: none;
}
</style>
</head>
<body>
	<?php require_once SRC . 'components/navbar.php'; ?>
  <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-12">My Listed Items</h1>
    <p class="lead">Displayed below are the items you have borrowed. You can view and return items</p>
  </div>
</div>
	<div class="row justify-content-center">
		<div class="col-md-7">

		<?php
			foreach ($items as $item) {
			     echo '<div class="row border-bottom">
				            <div class="col py-3">
					           <div class="image-holder">
						          <img src="' . $item->getImages()[0]->getFile() . '" class="square" />
					           </div>
				            </div>
				            <div class="col-sm-9 py-3">
					              <div class="row title-text"><a href="' . __HOST__ . 'listing/item.php?i=' . $item->getID() . '" class="title-link">' . $item->getTitle() . '</a></div>
				                  <div class="row">$' . $item->getRate() . ' per day</div>
                            </div>
			             </div>';
			}
			?>
			<!--<div class="row border-bottom">
				<div class="col py-3">
					<div class="image-holder">
						<img src="../images/meyer.jpg" class="square" />
					</div>
				</div>
				<div class="col-sm-8 py-3">
					<div class="row title-text"><a href="#" class="title-link">TITLE</a></div>
					<div class="row">$100.00 per day</div>
				</div>
			</div>-->

		</div>
	</div>
	<?php require_once SRC . 'components/footer.php'; ?>
</body>
</html>
