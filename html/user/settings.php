<?php
if (! isUserLoggedIn()) {
    sendToLogin(null);
}
require_once SRC . 'user/updateAccountInfo.php';
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
	</div>


	<div class="container">
		<div class="col-9 col-sm-6">
			<?php 
			foreach ($messages as $message) {
			    $color = $message['status'] ? "alert-success" : "alert-danger";
			    echo '<div class="alert ' . $color . '" role="alert">
			             ' . $message['message'] . '
			         </div>';
			}
			?>
			<div class="col">
				<form class="" action="" method="post">
					<div class="form-group">
						<label for="email">Email Address</label> <input type="text" class="form-control" id="email" placeholder="Email" name="email">
					</div>

					<div class="form-group">
						<label for="phone">Phone Number</label> <input type="text" class="form-control" id="phone" placeholder="Phone Number" name="phone">
					</div>

					<div class="form-group">
						<label>Add An Address</label> 
						<input type="text" class="form-control" id="street1" placeholder="Address Line 1" name="street1"> 
						<input type="text" class="form-control" id="street2" placeholder="Address Line 2" name="street2"> 
						<input type="text" class="form-control" id="city" placeholder="City" name="city">
						<select id="state" class="form-control form-control-lg" name="state">
								<option>State</option>
								<?php
                                global $USStates;
                                foreach ($USStates as $thisState) {
                                    echo '<option value="' . $thisState . '">' . $thisState . '</option>';
                                }
                                ?>
						</select>
						<input type="text" class="form-control" id="zipcode" placeholder="Zipcode" name="zipcode">
					</div>

					<div class="form-group">
						<label>Add a Credit Card</label>
						<input type="text" class="form-control" id="cardnumber" placeholder="Credit Card Number" name="cardnumber"> 
						<select id="expMonth" class="form-control form-control-lg" name="expMonth">
							<option>Expiration Month</option>
							<option value="1">January</option>
							<option value="2">February</option>
							<option value="3">March</option>
							<option value="4">April</option>
							<option value="5">May</option>
							<option value="6">June</option>
							<option value="7">July</option>
							<option value="8">August</option>
							<option value="9">September</option>
							<option value="10">October</option>
							<option value="11">November</option>
							<option value="12">December</option>	
						</select> 
						<input type="text" class="form-control" id="expYear" placeholder="Expiration Year" name="expYear"> 
						<input type="text" class="form-control" id="cvv" placeholder="CVV" name="cvv">
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-lg" name="submit">Save Information</button>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>
</html>
