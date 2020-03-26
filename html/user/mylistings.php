<?php
if (! isUserLoggedIn()) {
    sendToLogin(null);
}
require_once SRC . 'classes/Item.php';

$items = array();

$result = $con->query("SELECT ID FROM items WHERE deleted=0 AND owner_ID=" . $user->getUserID()) or die($con->error);
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
    <p class="lead">Displayed below are the items you have put up for lending. You can view and delete items</p>
  </div>
</div>
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
                                <div class="row">
                                    <div class="btn-toolbar">
                                        <div class="btn-group mr-2">
                                            <button type="button" class="btn' . ($item->isListed() ? " btn-danger" : " btn-success") .  ' is-listed" assoc-id="' . $item->getID() . '">' . ($item->isListed() ? 'Delist' : 'Relist') . '</button>
                                        </div>
                                        <div class="btn-group mr-2">
                                            <button type="button" class="btn btn-secondary del-listing" assoc-id="' . $item->getID() . '">Delete Listing</button>
                                        </div>
                                    </div>
                                </div>
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
	<script src="<?php echo __HOST__; ?>js/mylistings.js" type="text/javascript"></script>
</body>
</html>
