<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<a class="navbar-brand" href="#"><img src="../../html/images/YLTM.png" width="40" height="40"></a>
	<a class="navbar-brand" href="#">You Lend To Me</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse"
		data-target="#navbarSupportedContent"
		aria-controls="navbarSupportedContent" aria-expanded="false"
		aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active"><a class="nav-link" href="<?php echo __HOST__; ?>">Home</a></li>
			<li class="nav-item"><a class="nav-link" href="<?php echo __HOST__ . 'listing/search.php'; ?>">Search</a></li>
			<?php
			if (isUserLoggedIn()) {
				echo '<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navAccountDropdwn" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Account
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="' . __HOST__ . 'listing/new.php">New Listing</a>
				<a class="dropdown-item" href="' . __HOST__ . 'user/mylistings.php">My Listings</a>
                <a class="dropdown-item" href="' . __HOST__ . 'user/myrentals.php">My Rentals</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="' . __HOST__ . 'user/settings.php">Settings</a>
				</div>
				</li>';
			}
			?>
		</ul>

		<?php
		if (isset($user)) {
		    echo '<button class="btn btn-outline-danger my-2 my-sm-0" type="submit" onclick="window.location.href=' . "'" . __HOST__ . "user/logout.php'" . ';">Logout</button>';
		} else {
		    echo '<button class="btn btn-outline-light my-2 my-sm-0" type="submit" onclick="window.location.href=' . "'" . __HOST__ . "user/login.php'" . ';">Sign
			in</button>';
		}

		?>
	</div>
</nav>
