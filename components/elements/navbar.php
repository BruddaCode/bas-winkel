<?php


?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
		aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<a class="navbar-brand" href="#">Bas</a>

	<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
		<ul class="navbar-nav mr-auto mt-2 mt-lg-0">


			<li class="nav-item <?php if ($page_manager->getRouteTitle() == "Home")	echo "active"; ?>">
				<a class="nav-link" href="./home">Home</a>
			</li>


			<li class="nav-item <?php if ($page_manager->getRouteTitle() == "Klanten") echo "active"; ?>">
				<a class="nav-link" href=".\klanten">Klanten</a>
			</li>


			<li class="nav-item <?php if ($page_manager->getRouteTitle() == "Orders") echo "active"; ?>">
				<a class="nav-link" href=".\orders">Orders</a>
			</li>




		</ul>
		<form class="form-inline my-2 my-lg-0">
			<input class="form-control mr-sm-2" type="search" placeholder="Zoek product" aria-label="Search">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i
					class="fa-solid fa-magnifying-glass"></i></button>
		</form>
	</div>
</nav>