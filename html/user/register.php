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
		<form class="" action="" method="post">
			<div class="row justify-content-center">
				<div class="col-sm-9">
					<div class="row">
						<div class="text-center mb-4">
							<img class="mb-4"
								src="/docs/4.3/assets/brand/bootstrap-solid.svg" alt=""
								width="72" height="72">
							<h1 class="h3 mb-3 font-weight-normal">Floating labels</h1>
							<p>
								Build form controls with floating labels via the
								<code>:placeholder-shown</code>
								pseudo-element. <a
									href="https://caniuse.com/#feat=css-placeholder-shown">Works in
									latest Chrome, Safari, and Firefox.</a>
							</p>
						</div>
						<div class="col-9 col-sm-6">
							<div class="form-signin">
								<div class="form-label-group">
									<input type="text" id="inputFirstName" class="form-control"
										placeholder="First name" name="firstName" required autofocus>
									<label for="inputFirstName">First name</label>
								</div>
								<div class="form-label-group">
									<input type="text" id="inputLastName" class="form-control"
										placeholder="Last name" name="lastName" required> <label
										for="inputLastName">Last name</label>
								</div>
								<div class="form-label-group">
									<input type="email" id="inputEmail" class="form-control"
										placeholder="Email address" name="email" required> <label
										for="inputEmail">Email address</label>
								</div>
								<div class="form-label-group">
									<input type="password" id="inputPassword" class="form-control"
										placeholder="Password" name="password" required> <label
										for="inputPassword">Password</label>
								</div>
								<div class="form-label-group">
									<input type="password" id="inputConfirmPassword"
										class="form-control" placeholder="Confirm Password"
										name="confirmPassword" required> <label
										for="inputConfirmPassword">Confirm Password</label>
								</div>
							</div>
						</div>
						<div class="col-9 col-sm-6">
							<div class="form-signin">
								<div class="form-label-group">
									<input type="text" id="inputAddress1" class="form-control"
										placeholder="Address line 1" name="address1" required> <label
										for="inputAddress1">Address line 1</label>
								</div>
								<div class="form-label-group">
									<input type="text" id="inputAddress2" class="form-control"
										placeholder="Address line 2" name="address2" required> <label
										for="inputAddress2">Address line 2</label>
								</div>
								<div class="form-label-group">
									<input type="text" id="inputCity" class="form-control"
										placeholder="City" name="city" required> <label
										for="inputCity">City</label>
								</div>
								<!-- STATE CODE HERE -->
								<div class="form-label-group">
									<input type="text" id="inputZip" class="form-control"
										placeholder="Zip code" name="zipcode" required> <label
										for="inputZip">Zip code</label>
								</div>
							</div>
						</div>
						<div class="checkbox mb-3">
							<label> <input type="checkbox" value="remember-me"> Remember me
							</label>
						</div>
						<button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
					</div>
				</div>
			</div>
		</form>
	</div>
	<?php require_once('../../includes/footer.php'); ?>
</body>
</html>