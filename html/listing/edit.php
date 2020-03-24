<?php
if (!isUserLoggedIn()) {
    sendToLogin(null);
}

require_once SRC . 'itemProc/doUpdateItem.php';
require_once SRC . 'classes/Item.php';

$item = null;
if (isset($_GET['i'])) {
    $itemID = cleanAlphanumeric(cleanData($_GET['i']));
    $item = new Item($itemID);

    if (empty($vals['itemTitle']))
        $vals['itemTitle'] = $item->getTitle();
    if (empty($vals['description']))
        $vals['description'] = $item->getDescription();
    if (empty($vals['dailyRate']))
        $vals['dailyRate'] = $item->getRate();
    if (empty($vals['startDate']))
        $vals['startDate'] = convertDate($item->getStartDate());
    if (empty($vals['endDate']))
        $vals['endDate'] = convertDate($item->getEndDate());
    if (empty($vals['zipcode']))
        $vals['zipcode'] = $item->getLocation();
    if (empty($vals['category']))
        $vals['category'] = $item->getCategory()['ID'];
    if (empty($vals['image']))
        $vals['image'] = $item->getImages()[0]->getFile();
    if (empty($vals['itemID']))
        $vals['itemID'] = $item->getID();

    if ($item->getOwner() != $user->getUserID()) {
        header("Location: " . __HOST__ . "listing/edit.php?i=" . $item->getID());
    }
} else {
    header("Location: " . __HOST__);
}

function convertDate($date) {
    $date = explode("-", $date);
    return $date[1] . "/" . $date[2] . "/" . $date[0];
}
?>
<!doctype html>
<html lang="en">
<head>
<?php require_once SRC . 'components/header.php'; ?>
<?php echo '<link href="' . __HOST__ . 'styles/loginregister.css" rel="stylesheet">'; ?>
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
display: block;
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
							<div class="image-preview" id="imagePreview">
								<img src="<?php echo $vals['image']; ?>" alt="Image Preview"
									id="preview-image" class="image-preview__image" /> 
							</div>

							<input type="text" name="itemID" value="<?php echo $vals['itemID']; ?>" hidden locked>

							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-lg">Update</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>	
	<?php require_once SRC . 'components/footer.php'; ?>
	<?php echo '<script src="' . __HOST__ . 'js/newlisting.js"></script>';?>
</body>
</html>
