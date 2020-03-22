<?php
require_once ROOT . 'Michelf/MarkdownExtra.inc.php';
require_once SRC . 'verify.php';
require_once SRC . 'classes/Item.php';

$item = null;
if (isset($_GET['i'])) {
    $itemID = cleanAlphanumeric(cleanData($_GET['i']));
    $item = new Item($itemID);
    //var_dump($item);
} else {
    header("Location: " . __HOST__);
}
?>
<!doctype html>
<html lang="en">
<head>
<?php require_once SRC . 'components/header.php'; ?>
<title>You Lend To Me</title>
</head>
<body>
	<?php require_once SRC . 'components/navbar.php'; ?>
	
	<?php
	   $res = $con->query("SELECT description FROM items LIMIT 1");
	   $res = $res->fetch_assoc();
	   $my_html = MarkdownExtra::defaultTransform($res['description']);
	   echo $my_html;
	   
	   
	?>
	
	<img src="<?php echo $item->getImages()[0]->getFile(); ?>">
	
	<?php require_once SRC . 'components/footer.php'; ?>
</body>
</html>

