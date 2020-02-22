
<!doctype html>
<html lang="en">
<head>
<?php require_once '../includes/header.php'; ?>
<link href="styles/loginregister.css" rel="stylesheet">
<title>You Lend To Me</title>
</head>


<body>
	<?php require_once '../includes/navbar.php'; ?>


  <div class="container">
    <div class="row">

      <!-- first col-->
      <div class="col">
        <form>
          <div class="form-group">
            <label for="ItemTitle">Item Name</label>
              <input type="text" class="form-control" id="ItemTitle" placeholder="Item Name"required autofocus>
          </div>
          <div class="form-group">
        <label for="ItemDescription">Description</label>
          <textarea class="form-control" id="ItemDescription"placeholder="Item Description here" rows="5"required></textarea>
          </div>

          <div class="form-group">
              <input type="text" class="form-control" id="DailyRate" placeholder="Daily Rate (in dollars per day)"required>
          </div>
          <div class="form-group">
             <input type="text" class="form-control" id="StartDate" placeholder="Start Date (MM/DD/XXXX)"required>
          </div>

          <div class="form-group">
              <input type="text" class="form-control" id="EndDate" placeholder="End Date (MM/DD/XXXX)"required>
          </div>

          <div class="form-group">
              <input type="text" class="form-control" id="Location" placeholder="Zip Code"required>
          </div>




        </form>
      </div>


      <div class="col"></div>

      <form>


      </form>


      <div class="w-100">

      </div>

      <div class="col">


      </div>

      <div class="col">


      </div>
    </div>
  </div>




	<?php require_once '../includes/footer.php'; ?>
</body>
</html>
