<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<a class="navbar-brand" href="#">You Lend To Me</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse"
		data-target="#navbarSupportedContent"
		aria-controls="navbarSupportedContent" aria-expanded="false"
		aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active"><a class="nav-link" href="#">Home</a></li>
			<li class="nav-item"><a class="nav-link" href="#">Search</a></li>
			<li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
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
