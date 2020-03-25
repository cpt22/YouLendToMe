<?php
require_once ROOT . 'Michelf/MarkdownExtra.inc.php';
require_once SRC . 'classes/Item.php';

$item = null;
if (isset($_GET['i'])) {
    $itemID = cleanAlphanumeric(cleanData($_GET['i']));
    $item = new Item($itemID);

    $desc_data = MarkdownExtra::defaultTransform($item->getDescription());
} else {
    header("Location: " . __HOST__);
}
?>
<!doctype html>
<html lang="en">
<head>
<?php require_once SRC . 'components/header.php'; ?>



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
					<img src="<?php echo $item->getImages()[0]->getFile(); ?>"
						class="rounded float-left" alt="image alternate text here"
						width="400" height="400">
				</div>

				<div class="col">
					<div class="row p-2">
						<h1 class="itemName"><?php echo $item->getTitle(); ?></h1>
					</div>
					<div class="row p-2">Available: <?php echo $item->getStartDate() . "-" . $item->getEndDate(); ?></div>
					<div class="row p-2">$<?php echo $item->getRate(); ?> per day</div>
					<div class="row p-2"><button type="button" class="btn btn-primary">Rent</button></div>
          <!-- Need to add actual renting functionality to this button above-->
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
</body>
</html>
