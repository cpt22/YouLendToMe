<!doctype html>
<html lang="en">
<head>
<?php require_once('../../includes/header.php'); ?>
<link href="http://localhost/styles/loginregister.css" rel="stylesheet">
<title>You Lend To Me</title>
</head>
<body>
	<?php require_once('../../includes/navbar.php'); ?>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-4">
				<form class="form-signin" action="" method="post">
					<div class="text-center mb-4">
						<img class="mb-4" src="/docs/4.3/assets/brand/bootstrap-solid.svg"
							alt="" width="72" height="72">
						<h1 class="h3 mb-3 font-weight-normal">Floating labels</h1>
						<p>
							Build form controls with floating labels via the
							<code>:placeholder-shown</code>
							pseudo-element. <a
								href="https://caniuse.com/#feat=css-placeholder-shown">Works in
								latest Chrome, Safari, and Firefox.</a>
						</p>
					</div>
					<div class="form-label-group">
						<input type="email" id="inputEmail" class="form-control"
							placeholder="Email address" name="email" required autofocus> <label
							for="inputEmail">Email address</label>
					</div>
					<div class="form-label-group">
						<input type="password" id="inputPassword" class="form-control"
							placeholder="Password" name="password" required> 
						<label for="inputPassword">Password</label>
					</div>
					<div class="checkbox mb-3">
						<label> <input type="checkbox" value="remember-me"> Remember me
						</label>
					</div>
					<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
				</form>
			</div>
		</div>
	</div>
	<?php require_once('../../includes/footer.php'); ?>
</body>
</html>