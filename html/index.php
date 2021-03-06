<?php require_once ROOT . 'Michelf/MarkdownExtra.inc.php';?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<?php require_once SRC . 'components/header.php'; ?>
<title>You Lend To Me</title>
</head>
<body>
	<?php require_once SRC . 'components/navbar.php'; ?>

	<div class="container">

	<div class="row">

		<div class="col-lg-2">



		</div>
		<!-- /.col-lg-3 -->

		<div class="col-lg-9">

			<div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner" role="listbox">
					<div class="carousel-item active">
						<img class="d-block img-fluid" src="images/7steps.jpg" alt="First slide">
					</div>
					<div class="carousel-item">
						<img class="d-block img-fluid" src="images/secimg.jpg" alt="Second slide">
					</div>
					<div class="carousel-item">
						<img class="d-block img-fluid" src="images/huitar.png" alt="Third slide">
					</div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>

			<div class="row">
			
			<?php 
			$items = array();
			
			$sql = "SELECT * FROM items WHERE listed=1 AND deleted=0";
			$result = $con->query($sql);
			
			while ($row = mysqli_fetch_assoc($result)) {
			    array_push($items, new Item($row['ID']));
			}
			shuffle($items);
			$range = array_rand(range(0, count($items) - 1), ((count($items) > 15) ? 15 : count($items)));
			for ($i = 0; $i < count($range); $i++) {
			    $item = $items[$range[$i]];
			    echo '<div class="col-lg-4 col-md-6 mb-4">
			             <div class="card h-100">
			                 <a href="' . __HOST__ . 'listing/item.php?i=' . $item->getID() . '"><img class="card-img-top" src="' . $item->getImages()[0]->getURL() . '" alt=""></a>
			                 <div class="card-body">
			                     <h4 class="card-title">
			                         <a href="' . __HOST__ . 'listing/item.php?i=' . $item->getID() . '">' . $item->getTitle() . '</a>
			                     </h4>
			                     <h5>$' . $item->getRate() . ' per day</h5>
			                     <p class="card-text">' . MarkdownExtra::defaultTransform($item->getDescription()) . '</p>
			                 </div>
			                 <!--<div class="card-footer">
			                     <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
			                 </div>-->
			             </div>
			         </div> ';
			}
			?>

			</div>
			<!-- /.row -->

		</div>
		<!-- /.col-lg-9 -->

	</div>
	<!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->


<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<?php require_once SRC . 'components/footer.php'; ?>
</body>
</html>
