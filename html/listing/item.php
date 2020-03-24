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


  <div class="container p-3">
		<div class="row">
			<div class="col redBorder">
				<img src="image link here" class="rounded float-left"
					alt="image alternate text here" width="400" height="400">
			</div>

			<div class="col">
				<div class="row p-2">
					<h1 class="itemName">Item Name PlaceHolder</h1>
				</div>
				<div class="row p-2">Dates</div>
				<div class="row p-2">Price</div>
				<div class="row p-2">Rent now</div>
			</div>
		</div>
	</div>


	<div class="container blackBorder">
		<div class="row">
			<div class="col">DESCRIPTION: Lorem ipsum dolor sit amet, consectetur
				adipiscing elit, sed do eiusmod tempor incididunt ut labore et
				dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
				exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit
				esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
				cupidatat non proident, sunt in culpa qui officia deserunt mollit
				anim id est laborum.</div>
		</div>
	</div>

	<?php require_once SRC . 'components/footer.php'; ?>
</body>
</html>
