<?php
if (!isUserLoggedIn()) {
    sendToLogin(null);
}

require_once SRC . 'itemProc/doNewItem.php';
?>
<!doctype html>
<html lang="en">
<head>
<?php require_once SRC . 'components/header.php'; ?>
<link href="<?php echo __HOST__ ?>styles/loginregister.css" rel="stylesheet">
<title>You Lend To Me</title>
<style>
.image-preview {
	width: 300px;
	min-height: 100px;
	border: 2px solid #dddddd;
	margin-top: 15px;
	display: flex;
	align-items: center;
	justify-content: center;
	font-weight: bold;
	color: #cccccc
}

.image-preview__image {
	width: 100%;
}
</style>
</head>
<body>
	<?php require_once SRC . 'components/navbar.php'; ?>

            <div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1 class="display-12">New Item Listing</h1>
			<p class="lead">Fill out the form below, upload images, and click
				submit to create a new item listing.</p>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-9 col-sm-6">
				<div class="form-signin">
					<div class="col">
						<form class="" action="" method="post"
							enctype="multipart/form-data">
							<div class="form-group">
								<label for="itemTitle">Item Name</label> <input type="text"
									class="<?php echo isset($errors['itemTitle']) ? "is-invalid" : ""; ?> form-control"
									id="itemTitle" placeholder="Title" name="itemTitle"
									<?php echo isset($vals['itemTitle']) ? 'value="'.$vals['itemTitle'].'"' : ""; ?>
									required autofocus>
							</div>

							<div class="form-group">
								<label for="itemDescription">Description</label>
								<textarea
									class="<?php echo isset($errors['description']) ? "is-invalid" : ""; ?> form-control"
									id="itemDescription" placeholder="Item Description here"
									rows="5" name="itemDescription" required><?php echo isset($vals['description']) ? $vals['description'] : ""; ?> </textarea>
							</div>

							<div class="form-group">
								<small id="dailyRateHelpBlock" class="form-text text-muted">
									enter dollar amount using numerical values. </small> <input
									type="text" id="dailyRate"
									class="<?php echo isset($errors['dailyRate']) ? "is-invalid" : ""; ?> form-control"
									aria-describedby="dailyRateHelpBlock"
									placeholder="Daily Rate (dollars per day)" name="dailyRate"
									<?php echo isset($vals['dailyRate']) ? 'value="'.$vals['dailyRate'].'"' : ""; ?>
									required>
							</div>
							<div class="form-group">
								<small id="startDateHelpBlock" class="form-text text-muted">
									start date </small> <input type="text"
									class="<?php echo isset($errors['startDate']) ? "is-invalid" : ""; ?> form-control"
									id="startDate" placeholder="Start Date (MM/DD/XXXX)"
									name="startDate"
									<?php echo isset($vals['startDate']) ? 'value="'.$vals['startDate'].'"' : ""; ?>
									required>
							</div>

							<div class="form-group">
								<small id="endDateHelpBlock" class="form-text text-muted"> end
									date </small> <input type="text"
									class="<?php echo isset($errors['endDate']) ? "is-invalid" : ""; ?> form-control"
									id="endDate" placeholder="End Date (MM/DD/XXXX)" name="endDate"
									<?php echo isset($vals['endDate']) ? 'value="'.$vals['endDate'].'"' : ""; ?>
									required>
							</div>

							<div class="form-group">
								<small id="locationHelpBlock" class="form-text text-muted"> zip
									code </small> <input type="text"
									class="<?php echo isset($errors['zipcode']) ? "is-invalid" : ""; ?> form-control"
									id="location" placeholder="Zip Code" name="zipcode"
									<?php echo isset($vals['zipcode']) ? 'value="'.$vals['zipcode'].'"' : ""; ?>
									required>
							</div>

							<div class="form-group">
									<select id="inputCategory" class="<?php echo isset($errors['category']) ? "is-invalid" : ""; ?> form-control" name="category"
										<?php echo isset($vals['category']) ? 'value="'.$vals['category'].'"' : ""; ?> required>
										<option value="-1">--Category--</option>
										<?php
										global $con;
										$result = $con->query("SELECT * FROM categories");
										while ($row = $result->fetch_assoc()) {
										    echo ($vals['category']);
										    $toSelect = ($row['ID'] == $vals['category']) ? " selected" : "";
										    echo '<option value="'. $row['ID'] . '"' . $toSelect . '>' . $row['name'] . '</option>';
										}
										?>
									</select>
									<span class="error_form" id="inputState_error"></span>
								</div>

							<input type="file" id="inpFile" name="itemImg">
							<div class="image-preview" style="display: none"
								id="imagePreview">
								<img src="" alt="Image Preview" id="preview-image"
									class="image-preview__image" />
							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-lg">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php require_once SRC . 'components/footer.php'; ?>
	<script src="<?php echo __HOST__ ?>js/newlisting.js"></script>
</body>
</html>
