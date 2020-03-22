<?php
//require_once SRC . 'session.php' 
require_once ROOT . 'Michelf/MarkdownExtra.inc.php';
?>
<!doctype html>
<html lang="en">
<head>
<?php require_once SRC . 'components/header.php'; ?>
<title>You Lend To Me</title>
</head>
<body>
	<?php
	   $res = $con->query("SELECT description FROM items LIMIT 1");
	   $res = $res->fetch_assoc();
	   $my_html = MarkdownExtra::defaultTransform($res['description']);
	   echo $my_html;
	?>
	<?php require_once SRC . 'components/navbar.php'; ?>
	<?php require_once SRC . 'components/footer.php'; ?>
</body>
</html>

