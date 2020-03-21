<?php
require_once SRC . 'itemProc/doNewItem.php';
?>
<!doctype html>
<html lang="en">
<head>
<<<<<<< HEAD
<?php require_once __ROOT__ . '/includes/components/header.php'; ?>
<link href="../styles/loginregister.css" rel="stylesheet">
=======
<?php require_once SRC . 'components/header.php'; ?>
<<<<<<< HEAD
<link href="styles/loginregister.css" rel="stylesheet">
>>>>>>> b7ba212ebc3c5eff949ddda78b429d0183766f63
=======
<?php echo '<link href="' . __HOST__ . 'styles/loginregister.css" rel="stylesheet">' ?>
>>>>>>> ce020df825a57867c8e2cf1a20774d949dc83d1b
<title>You Lend To Me</title>
<style>
		.image-preview{
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

		.image-preview__image{
				display: none;
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
						<form class="" action="" method="post">
							<div class="form-group">
								<label for="itemTitle">Item Name</label> <input type="text"
									class="form-control" id="itemTitle" placeholder="Item Name"
									required autofocus>
							</div>

							<div class="form-group">
								<label for="itemDescription">Description</label>
								<textarea class="form-control" id="itemDescription"
									placeholder="Item Description here" rows="5" required></textarea>
							</div>

							<div>
								<small id="dailyRateHelpBlock" class="form-text text-muted">
									enter dollar amount using numerical values. </small> <input
									type="text" id="dailyRate" class="form-control"
									aria-describedby="dailyRateHelpBlock"
									placeholder="Daily Rate (dollars per day)" required>
							</div>
							<div class="form-group">
								<small id="startDateHelpBlock" class="form-text text-muted">
									start date </small> <input type="text" class="form-control"
									id="startDate" placeholder="Start Date (MM/DD/XXXX)" required>
							</div>

							<div class="form-group">
								<small id="endDateHelpBlock" class="form-text text-muted"> end
									date </small> <input type="text" class="form-control"
									id="endDate" placeholder="End Date (MM/DD/XXXX)" required>
							</div>

							<div class="form-group">
								<small id="locationHelpBlock" class="form-text text-muted"> zip
									code </small> <input type="text" class="form-control"
									id="location" placeholder="Zip Code" required>
							</div>

							<input type="file" name="inpFile" id="inpFile">
							<div class="image-preview" id="imagePreview">
								<img src="" alt="Image Preview" class="image-preview__image"
								<span class="image-preview__default-text">Image Preview</span>
							</div>

							<div>
							<button type="submit" class="btn btn-primary btn-lg">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<<<<<<< HEAD
	<script>
	 const inpFile = document.getElementById("inpFile");
	 const previewContainer = document.getElementById("imagePreview");
	 const previewImage = previewContainer.querySelector(".image-preview__image");
	 const previewDefaultText = previewContainer.querySelector(".image-preview__default-text");

	 inpFile.addEventListener("change",function(){
		 const file = this.files[0];

		 if(file){
			 const reader = new FileReader();

			//previewDefaultText.style.display = "none";
			 previewImage.style.display = "block";

			 reader.addEventListener("load", function() {
				 console.log(this);
				 previewImage.setAttribute("src", this.result);
			 });

			 reader.readAsDataURL(file);
		 }
	 });
	</script>
	<?php require_once __ROOT__ . '/includes/components/footer.php'; ?>
=======
	<?php require_once SRC . 'components/footer.php'; ?>
>>>>>>> b7ba212ebc3c5eff949ddda78b429d0183766f63
</body>
</html>
