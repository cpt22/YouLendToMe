<?php 
require_once SRC . 'registerUser.php';
require_once SRC . 'USStates.php';
?>
<!doctype html>
<html lang="en">
<head>
<?php require_once SRC . 'components/header.php'; ?>
<?php echo '<link href="' . __HOST__ . 'styles/loginregister.css" rel="stylesheet">' ?>
<title>You Lend To Me</title>
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script type="text/javascript" src="../js/register.js"></script>
</head>
<body>
	<?php require_once SRC . 'components/navbar.php'; ?>
	<div class="container">
		<form class="" action="" method="post">
			<div class="row justify-content-center">
				<div class="col-sm-9">
					<div class="row">
						<div class="text-center mb-4">
							<img class="mb-4"
								src="/docs/4.3/assets/brand/bootstrap-solid.svg" alt=""
								width="72" height="72">
							<h1 class="h3 mb-3 font-weight-normal">Register</h1>
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
										placeholder="First name" name="first-name" required autofocus>
									<span class="error_form" id="inputFirstName_error"></span>
									<label for="inputFirstName">First name</label>
								</div>
								<div class="form-label-group">
									<input type="text" id="inputLastName" class="form-control"
										placeholder="Last name" name="last-name" required> <label
										for="inputLastName">Last name</label>
									<span class="error_form" id="inputLastName_error"></span>
								</div>
								<div class="form-label-group">
									<input type="email" id="inputEmail" class="form-control"
										placeholder="Email address" name="email" required> <label
										for="inputEmail">Email address</label>
									<span class="error_form" id="inputEmail_error"></span>
								</div>
								<div class="form-label-group">
									<input type="text" id="inputUsername" class="form-control"
										placeholder="Username" name="username" required> <label
										for="inputUsername">Username</label>
									<span class="error_form" id="inputUsername_error"></span>
								</div>
								<div class="form-label-group">
									<input type="password" id="inputPassword" class="form-control"
										placeholder="Password" name="password" required> <label
										for="inputPassword">Password</label>
									<span class="error_form" id="inputPassword_error"></span>
								</div>
								<div class="form-label-group">
									<input type="password" id="inputConfirmPassword"
										class="form-control" placeholder="Confirm Password"
										name="confirm-password" required> <label
										for="inputConfirmPassword">Confirm Password</label>
										<span class="error_form" id="inputConfirmPassword_error"></span>
								</div>
							</div>
						</div>
						<div class="col-9 col-sm-6">
							<div class="form-signin">
								<div class="form-label-group">
									<input type="text" id="inputPhone" class="form-control"
										placeholder="Phone Number" name="phone" required> <label
										for="inputPhone">Phone Number</label>
									<span class="error_form" id="inputPhone_error"></span>
								</div>
								<div class="form-label-group">
									<input type="text" id="inputAddress1" class="form-control"
										placeholder="Address line 1" name="address-1" required> <label
										for="inputAddress1">Address line 1</label>
										<span class="error_form" id="inputAddress1_error"></span>
								</div>
								<div class="form-label-group">
									<input type="text" id="inputAddress2" class="form-control"
										placeholder="Address line 2" name="address-2"> <label
										for="inputAddress2">Address line 2</label>
									<span class="error_form" id="inputAddress2_error"></span>
								</div>
								<div class="form-label-group">
									<input type="text" id="inputCity" class="form-control"
										placeholder="City" name="city" required> <label
										for="inputCity">City</label>
										<span class="error_form" id="inputCity_error"></span>
								</div>
								<div class="form-label-group">
									<select id="inputState" class="form-control form-control-lg" name="state"
										required>
										<option>State</option>
										<?php
										global $USStates;
										foreach ($USStates as $thisState) {
										    echo '<option value="' . $thisState . '">' . $thisState . '</option>';
										}
										?>
									</select>
									<span class="error_form" id="inputState_error"></span>
								</div>
								<!-- STATE CODE HERE -->
								<div class="form-label-group">
									<input type="text" id="inputZip" class="form-control"
										placeholder="Zip code" name="zipcode" required> <label
										for="inputZip">Zip code</label>
										<span class="error_form" id="inputZip_error"></span>
								</div>
							</div>
						</div>
						<div class="checkbox mb-3">
							<label> <input type="checkbox" name="remember-me"> Remember me
							</label>
						</div>
						<button class="btn btn-lg btn-primary btn-block" type="submit">Sign
							up</button>
					</div>
				</div>
			</div>
		</form>
	</div>
	<?php require_once SRC . 'components/footer.php'; ?>
</body>
</html>
