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

			<li class="nav-item <?php if ($page_manager->getRouteTitle() == "Inkoop") echo "active"; ?>">
				<a class="nav-link" href=".\inkoop">Inkoop</a>
			</li>

			<li class="nav-item <?php if ($page_manager->getRouteTitle() == "Klanten") echo "active"; ?>">
				<a class="nav-link" href=".\klanten">Klanten</a>
			</li>


			<li class="nav-item <?php if ($page_manager->getRouteTitle() == "Orders") echo "active"; ?>">
				<a class="nav-link" href=".\orders">Orders</a>
			</li>

			<li class="nav-item <?php if ($page_manager->getRouteTitle() == "Leveranciers") echo "active"; ?>">
				<a class="nav-link" href=".\leveranciers">Leveranciers</a>
			</li>

		</ul>

	</div>
</nav>