<?php
require_once SRC . 'misc/retPath.php';
require_once SRC . 'user/loginUser.php';

if (isUserLoggedIn()) {
    header('location: index.php');
}
?>
<!doctype html>
<html lang="en">
<head>
<?php require_once SRC . 'components/header.php'; ?>
<link href="<?php echo __HOST__; ?>styles/loginregister.css" rel="stylesheet">
<title>You Lend To Me</title>
</head>
<body>
	<?php require_once SRC . 'components/navbar.php'; ?>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-4">
				<form class="form-signin" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
					<div class="text-center mb-4">
						<img class="mb-4" src="<?php echo __HOST__; ?>images/YLTM.png"
							alt="" width="80" height="80">
						<h1 class="h3 mb-3 font-weight-normal">Sign in to YLTM</h1>
					</div>
					<?php if(isset($errors['loginAttempt']) && $errors['loginAttempt'] == false) {
					   echo '<div class="text-center mb-4">
						<label class="text-danger">We\'re sorry, the username or password you entered is incorrect. Please try again or reset your password.</label>
					</div>';
					}
					?>


					<div class="form-label-group">
						<input type="text" id="inputUsername" class="<?php echo isset($errors['username']) ? "is-invalid" : ""; ?> form-control"
							placeholder="Username" name="username" <?php echo isset($vals['username']) ? 'value="'.$vals['username'].'"' : ""; ?> required autofocus> <label
							for="inputUsername">Username</label>
					</div>

					<div class="form-label-group">
						<input type="password" id="inputPassword" class="form-control"
							placeholder="Password" name="password" required> <label
							for="inputPassword">Password</label>
					</div>

					<div class="checkbox mb-3">
						<label> <input type="checkbox" name="remember-me"> Remember me
						</label>
					</div>

					<button class="btn btn-lg btn-primary btn-block" name='submit' type="submit">Sign
						in</button>
				</form>
        <form class="form-signin" method="post" action="<?php echo __HOST__; ?>user/register.php? . <?php echo parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY); ?>" style="padding-top:0px;">
        <button class="btn btn-lg btn-secondary btn-block" type="submit">Sign
            up</button>
        </form>
			</div>
		</div>
	</div>
	<?php require_once SRC . 'components/footer.php'; ?>
</body>
</html>
