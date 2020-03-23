<?php
require_once ROOT . 'Michelf/MarkdownExtra.inc.php';
require_once SRC . 'verify.php';
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

.testBorder{
bprder: 1px solid black

}

</style>

<title>You Lend To Me</title>
</head>
<body>
	<?php require_once SRC . 'components/navbar.php'; ?>

<!--
  <div class="container">
    <div class = "row">
      <div class = "col">
        Image here
        <img src="image link here" class="rounded float-left" alt="image alternate text here" width="500" height="600">
      </div>
      <div class = "col">
          <h1 class="itemName">Item Name PlaceHolder</h1>
      </div>
     </div>

      <div class = "row">
        <div class = "col"></div>
        <div class = "col">
            Available from MM/XX/YYY to MM/XX/YYYY
        </div>
      </div>
        <div class = "row">
          <div class = "col">
          </div>
          <div class = "col">

          </div>
      </div>
  </div>
-->

  <div class="container testBorder">
<div class="col">Image here <img src="image link here" class="rounded float-left" alt="image alternate text here" width="400" height="500"></div>
</div>

  <div class="container">
    <div class="row">
      <div class="col offset-md-3"><h1 class="itemName">Item Name PlaceHolder</h1></div>
      <div class="w-100"></div>

      <div class="col offset-md-3">Available from MM/XX/YYY to MM/XX/YYYY</div>
    </div>

    <div class="row">
      <div class="col offset-md-3">Daily Price: $10</div>
      <div class="w-100"></div>
      <div class="col offset-md-3">Item Category:</div>
    </div>


        <div class="row">
          <div class="col">DESCRIPTION</div>
        </div>

  </div>


<!--	<?php
	   $my_html = MarkdownExtra::defaultTransform($item->getDescription());
	   echo $my_html;


	?>

	<img src="<?php echo $item->getImages()[0]->getFile(); ?>">-->




	<?php require_once SRC . 'components/footer.php'; ?>
</body>
</html>
