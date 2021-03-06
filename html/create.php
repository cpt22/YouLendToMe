
<!doctype html>
<html lang="en">
<head>
<?php require_once '../includes/header.php'; ?>
<link href="styles/loginregister.css" rel="stylesheet">
<title>You Lend To Me</title>
</head>


<body>
	<?php require_once '../includes/navbar.php'; ?>

            <div class="jumbotron jumbotron-fluid">
            <div class="container">
              <h1 class="display-12">New Item Listing</h1>
              <p class="lead">Fill out the form below, upload images, and click submit to create a new item listing.</p>
            </div>
            </div>

  <div class="container">
    <div class="row">
      <div class="col-9 col-sm-6">
        <div class="form-signin">


          <div class="col">
            <form class="" action="" method="post">
              <div class="form-group">
                <label for="itemTitle">Item Name</label>
                <input type="text" class="form-control" id="itemTitle" placeholder="Item Name"required autofocus>
          </div>

          <div class="form-group">
            <label for="itemDescription">Description</label>
            <textarea  class="form-control" id="itemDescription"placeholder="Item Description here" rows="5"required></textarea>
          </div>

          <div>
            <small id="dailyRateHelpBlock" class="form-text text-muted">
            enter dollar amount using numerical values.
            </small>
            <input type="text" id="dailyRate" class="form-control" aria-describedby="dailyRateHelpBlock"placeholder="Daily Rate (dollars per day)"required>
          </div>

          <div>&nbsp</div>

          <div class="form-group">
            <small id="startDateHelpBlock" class="form-text text-muted">
            start date
            </small>
             <input type="text" class="form-control" id="startDate" placeholder="Start Date (MM/DD/XXXX)"required>
          </div>

          <div class="form-group">
            <small id="endDateHelpBlock" class="form-text text-muted">
            end date
            </small>
            <input type="text" class="form-control" id="endDate" placeholder="End Date (MM/DD/XXXX)"required>
          </div>

          <div class="form-group">
              <small id="locationHelpBlock" class="form-text text-muted">
              zip code
              </small>

              <input type="text" class="form-control" id="location" placeholder="Zip Code"required>
          </div>

          <button type="submitButton" class="btn btn-primary btn-lg">Submit</button>

        </form>
      </div>

      </div>
    </div>
  </div>


</div>



	<?php require_once '../includes/footer.php'; ?>
</body>
</html>
