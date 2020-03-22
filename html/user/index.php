<?php 
if (!isUserLoggedIn()) {
    sendToLogin(null);
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
	<?php require_once SRC . 'components/footer.php'; ?>
</body>
</html>
