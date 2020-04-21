<?php
require_once ROOT . 'Michelf/MarkdownExtra.inc.php';
require_once SRC . 'classes/Item.php';

$item = null;
if (isset($_GET['i'])) {
    $itemID = cleanAlphanumeric(cleanData($_GET['i']));
    $item = new Item($itemID);

    if ($item->getTitle() == null) {
        http_response_code(404);
        include ROOT . 'html/404.php';
        die();
    }

    $desc_data = MarkdownExtra::defaultTransform($item->getDescription());

  
    $rent = isUserLoggedIn() ? "openRent()" : "window.location.assign('" . __HOST__ . "user/login.php?redir=tkj59g&i=" . $item->getID() . "')";

    if (isUserLoggedIn()) {
        require_once SRC . 'itemProc/doRent.php';
    }
} else {
    http_response_code(404);
    include ROOT . 'html/404.php';
    die();
}
?>
<!doctype html>
<html lang="en">
<head>
<?php require_once SRC . 'components/header.php'; ?>
<link rel="stylesheet" type="text/css"
	href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />


<style>
.blackBorder {
	border: 1px solid black
}

.redBorder {
	border: 1px solid red
}

.greenBorder {
	border: 1px solid green
}
</style>

<title>You Lend To Me</title>
</head>
<body>
	<?php require_once SRC . 'components/navbar.php'; ?>

  	<div class="container border-dark border-right border-left">
		<div class="col p-3">
			<div class="row">
				<div class="col">
					<img src="<?php echo $item->getImages()[0]->getURL(); ?>"
						class="rounded float-left" alt="image alternate text here"
						width="400" height="400">
				</div>

				<div class="col">
					<div class="row p-2">
						<h1 class="itemName"><?php echo $item->getTitle(); ?></h1>
					</div>
					<!-- <div class="row p-2">Available: <?php echo date("m-d-Y", strtotime($item->getStartDate())) . " to " . date("m-d-Y", strtotime($item->getEndDate())); ?></div>-->
					<div class="row p-2">$<?php echo $item->getRate(); ?> per day</div>

					<?php 
					if (!$item->isDeleted() && $item->isListed()) {
					 echo '<div class="row p-2">
						<button type="button" id="rentButton" class="btn btn-primary"
							onclick="' . $rent .'";
							>Rent</button>
					       </div>';
					}
					?>
										
					<?php if(isUserLoggedIn()) require_once SRC . 'components/rent.php'; ?>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col"><?php echo $desc_data; ?></div>
			</div>
		</div>
	</div>

	<?php require_once SRC . 'components/footer.php'; ?>
	<script type="text/javascript"
		src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
	<!--<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>-->
	<script type="text/javascript"
		src="<?php echo __HOST__; ?>js/daterangepicker.min.js"></script>
	<script type="text/javascript"
		src="<?php echo __HOST__; ?>js/rentitem.js"></script>
</body>
</html>
