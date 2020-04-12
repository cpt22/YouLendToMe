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
  <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-12">Account Information</h1>
    <p class="lead">View/Change your account details</p>
  </div>


  <div class="container">
		<div class="row">
			<div class="col-9 col-sm-6">
				<div class="form-signin">
					<div class="col">
						<form class="" action="" method="post"
							enctype="multipart/form-data">
							<div class="form-group">
								<label for="itemTitle">Email Address</label> <input type="text"
									class="<?php echo isset($errors['itemTitle']) ? "is-invalid" : ""; ?> form-control"
									id="itemTitle" placeholder="Email" name="itemTitle"
									<?php echo isset($vals['itemTitle']) ? 'value="'.$vals['itemTitle'].'"' : ""; ?>
									required autofocus>
							</div>

              <div class="form-group">
								<label for="itemTitle">Phone Number</label> <input type="text"
									class="<?php echo isset($errors['itemTitle']) ? "is-invalid" : ""; ?> form-control"
									id="itemTitle" placeholder="Phone Number" name="itemTitle"
									<?php echo isset($vals['itemTitle']) ? 'value="'.$vals['itemTitle'].'"' : ""; ?>
									required autofocus>
							</div>

              <div class="form-group">
								<label for="itemTitle">Address</label>

                <input type="text"
									class="<?php echo isset($errors['itemTitle']) ? "is-invalid" : ""; ?> form-control"
									id="itemTitle" placeholder="Address Line 1" name="itemTitle"
									<?php echo isset($vals['itemTitle']) ? 'value="'.$vals['itemTitle'].'"' : ""; ?>
									required autofocus>
                <input type="text"
                    class="<?php echo isset($errors['itemTitle']) ? "is-invalid" : ""; ?> form-control"
                    id="itemTitle" placeholder="Address Line 2" name="itemTitle"
                    <?php echo isset($vals['itemTitle']) ? 'value="'.$vals['itemTitle'].'"' : ""; ?>
                    required autofocus>
                <input type="text"
                    class="<?php echo isset($errors['itemTitle']) ? "is-invalid" : ""; ?> form-control"
                    id="itemTitle" placeholder="City" name="itemTitle"
                    <?php echo isset($vals['itemTitle']) ? 'value="'.$vals['itemTitle'].'"' : ""; ?>
                    required autofocus>

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

                <input type="text"
                    class="<?php echo isset($errors['itemTitle']) ? "is-invalid" : ""; ?> form-control"
                    id="itemTitle" placeholder="Zipcode" name="itemTitle"
                    <?php echo isset($vals['itemTitle']) ? 'value="'.$vals['itemTitle'].'"' : ""; ?>
                    required autofocus>

                </div>

                <div class="form-group">
                  <label for="itemTitle">Credit Card Information</label>

                  <input type="text"
                    class="<?php echo isset($errors['itemTitle']) ? "is-invalid" : ""; ?> form-control"
                    id="itemTitle" placeholder="Credit Card Number" name="itemTitle"
                    <?php echo isset($vals['itemTitle']) ? 'value="'.$vals['itemTitle'].'"' : ""; ?>
                    required autofocus>

                    <div class="form-label-group">
    									<select id="inputState" class="<?php echo isset($errors['state']) ? "is-invalid" : ""; ?> form-control form-control-lg" name="state"
    										<?php echo isset($vals['state']) ? 'value="'.$vals['state'].'"' : ""; ?> required>
    										<option>Expiration Month</option>
    										<?php
    										global $Months;
    										foreach ($Months as $thisState) {
    										    echo '<option value="' . $thisState . '">' . $thisState . '</option>';
    										}
    										?>
    									</select>
    									<span class="error_form" id="inputState_error"></span>
    								</div>

                  <input type="text"
                    class="<?php echo isset($errors['itemTitle']) ? "is-invalid" : ""; ?> form-control"
                    id="itemTitle" placeholder="Expiration Year" name="itemTitle"
                    <?php echo isset($vals['itemTitle']) ? 'value="'.$vals['itemTitle'].'"' : ""; ?>
                    required autofocus>

                  <input type="text"
                    class="<?php echo isset($errors['itemTitle']) ? "is-invalid" : ""; ?> form-control"
                    id="itemTitle" placeholder="CVV" name="itemTitle"
                    <?php echo isset($vals['itemTitle']) ? 'value="'.$vals['itemTitle'].'"' : ""; ?>
                    required autofocus>


                </div>






							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-lg">Save Information</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>



</body>
</html>
