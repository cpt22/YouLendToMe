<?php
require_once SRC . 'user/registerUser.php';
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
		<form class="" action="<?php $_SERVER['REQUEST_URI']; ?>" method="post">
			<div class="row justify-content-center">
				<div class="col-sm-9">
					<div class="row">
						<div class="text-center mb-4">
							<img class="mb-4"
								src="<?php echo __HOST__; ?>images/YLTM.png" alt=""
								width="80" height="80">
							<h1 class="h3 mb-3 font-weight-normal">Register Account with YLTM</h1>
							<p>
								Fill up the following fields with accurate information. Personal Information can be altered later. You will need to add your credit card detailsin settings after making an account.
							</p>
						</div>
						<div class="col-9 col-sm-6">
							<div class="form-signin">
								<div class="form-label-group">
									<input type="text" id="inputFirstName" class="<?php echo isset($errors['first-name']) ? "is-invalid" : ""; ?> form-control"
										placeholder="First name" name="first-name" <?php echo isset($vals['first-name']) ? 'value="'.$vals['first-name'].'"' : ""; ?> required autofocus>
									<span class="error_form" id="inputFirstName_error"></span>
									<label for="inputFirstName">First name</label>
								</div>
								<div class="form-label-group">
									<input type="text" id="inputLastName" class="<?php echo isset($errors['last-name']) ? "is-invalid" : ""; ?>  form-control"
										placeholder="Last name" name="last-name" <?php echo isset($vals['last-name']) ? 'value="'.$vals['last-name'].'"' : ""; ?> required> <label
										for="inputLastName">Last name</label>
									<span class="error_form" id="inputLastName_error"></span>
								</div>
								<div class="form-label-group">
									<input type="email" id="inputEmail" class="<?php echo isset($errors['email']) ? "is-invalid" : ""; ?>  form-control"
										placeholder="Email address" name="email" <?php echo isset($vals['email']) ? 'value="'.$vals['email'].'"' : ""; ?> required> <label
										for="inputEmail">Email address</label>
									<span class="error_form" id="inputEmail_error"></span>
								</div>
								<div class="form-label-group">
									<input type="text" id="inputUsername" class="<?php echo isset($errors['username']) ? "is-invalid" : ""; ?>  form-control"
										placeholder="Username" name="username" <?php echo isset($vals['username']) ? 'value="'.$vals['username'].'"' : ""; ?> required> <label
										for="inputUsername">Username</label>
									<span class="error_form" id="inputUsername_error"></span>
								</div>
								<div class="form-label-group">
									<input type="password" id="inputPassword" class="<?php echo isset($errors['password']) ? "is-invalid" : ""; ?> form-control"
										placeholder="Password" name="password" required> <label
										for="inputPassword">Password</label>
									<span class="error_form" id="inputPassword_error"></span>
								</div>
								<div class="form-label-group">
									<input type="password" id="inputConfirmPassword"
										class="<?php echo isset($errors['confirm-password']) ? "is-invalid" : ""; ?> form-control" placeholder="Confirm Password"
										name="confirm-password" required> <label
										for="inputConfirmPassword">Confirm Password</label>
										<span class="error_form" id="inputConfirmPassword_error"></span>
								</div>
							</div>
						</div>
						<div class="col-9 col-sm-6">
							<div class="form-signin">
								<div class="form-label-group">
									<input type="text" id="inputPhone" class="<?php echo isset($errors['phone']) ? "is-invalid" : ""; ?> form-control"
										placeholder="Phone Number" name="phone" <?php echo isset($vals['phone']) ? 'value="'.$vals['phone'].'"' : ""; ?> required> <label
										for="inputPhone">Phone Number</label>
									<span class="error_form" id="inputPhone_error"></span>
								</div>
								<div class="form-label-group">
									<input type="text" id="inputAddress1" class="<?php echo isset($errors['address-1']) ? "is-invalid" : ""; ?> form-control"
										placeholder="Address line 1" name="address-1" <?php echo isset($vals['address-1']) ? 'value="'.$vals['address-1'].'"' : ""; ?> required> <label
										for="inputAddress1">Address line 1</label>
										<span class="error_form" id="inputAddress1_error"></span>
								</div>
								<div class="form-label-group">
									<input type="text" id="inputAddress2" class="<?php echo isset($errors['address-2']) ? "is-invalid" : ""; ?> form-control"
										placeholder="Address line 2" name="address-2" <?php echo isset($vals['address-2']) ? 'value="'.$vals['address-2'].'"' : ""; ?> > <label
										for="inputAddress2">Address line 2</label>
									<span class="error_form" id="inputAddress2_error"></span>
								</div>
								<div class="form-label-group">
									<input type="text" id="inputCity" class="<?php echo isset($errors['city']) ? "is-invalid" : ""; ?> form-control"
										placeholder="City" name="city" <?php echo isset($vals['city']) ? 'value="'.$vals['city'].'"' : ""; ?> required> <label
										for="inputCity">City</label>
										<span class="error_form" id="inputCity_error"></span>
								</div>
								<div class="form-label-group">
									<select id="inputState" class="<?php echo isset($errors['state']) ? "is-invalid" : ""; ?> form-control form-control-lg" name="state"
										<?php echo isset($vals['state']) ? 'value="'.$vals['state'].'"' : ""; ?> required>
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
								<div class="form-label-group">
									<input type="text" id="inputZip" class="<?php echo isset($errors['zipcode']) ? "is-invalid" : ""; ?> form-control"
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
						<button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Sign
							up</button>
					</div>
				</div>
			</div>
		</form>
		<form class="form-signin" method="post" action="<?php echo __HOST__; ?>user/login.php? . <?php echo parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY); ?>" style="padding-top:0px;">
        <button class="btn btn-lg btn-secondary btn-block" type="submit">Sign
            up</button>
        </form>
	</div>
	<?php require_once SRC . 'components/footer.php'; ?>
	<script src="<?php echo __HOST__; ?>js/register.js" type="text/javascript"></script>
</body>
</html>
