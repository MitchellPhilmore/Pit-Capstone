<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once( './assets/php/class.db.php' );

?>
<!DOCTYPE HTML>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="./assets/css/materialize.css?v=<?php echo date( "U" );?>">
		<link rel="stylesheet" type="text/css" href="./assets/css/styles.css?v=<?php echo date( "U" );?>">
		<link href="https://fonts.googleapis.com/css?family=Faster+One" rel="stylesheet">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<script src="./assets/js/L.js"></script>
		<script src="./assets/js/m.js?v=<?php echo date( "U" );?>"></script>
		<script src="./assets/js/v.js?v=<?php echo date( "U" );?>"></script>
		<script src="./assets/js/c.js?v=<?php echo date( "U" );?>"></script>
		<script src="./assets/js/materialize.js?v=<?php echo date( "U" );?>"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>PIT Swap</title>
	</head>
	<body class="grey lighten-4">
		<nav class="nav-wrapper pit-blue" role="navigation">
			<a id="logo-container" href="index.php" class="brand-logo">
				<img src="assets/images/capstoneLogoPlaceholder.jpg" class="hide-on-med-and-down">
			</a>
			<a href="#" class="sidenav-trigger hide-on-large-and-up" data-target="mobile-links">
			<i class="material-icons" id="menuIcon">menu</i>
			</a>
			<div class="container" id="navContainer">
				<a href="index.php" class="brand-logo pit-blue" id="pitSwapTitle">Pit Swap</a>
				<ul class="right hide-on-med-and-down">
					<li><a href="#">Products</a></li>
					<li><a href="#">Sellers</a></li>
					<li><a href="#">About Us</a></li>
					<li><a href="#">Sign Out</a></li>
				</ul>
			</div>
		</nav>
		<ul class="sidenav" id="mobile-links">
			<li><a href="#">Products</a></li>
			<li><a href="#">Sellers</a></li>
			<li><a href="#">About Us</a></li>
			<li><a href="#">Sign Out</a></li>
			<hr>
		</ul>
		<div id="content" class="container">
			<ul class="sidenavLargeScreen sidenav-fixed hide-on-med-and-down">
				<li>
					<!--<label id="" for="searchBar"></label>-->
					<input type="search" id="searchBar" placeholder="🔍">
				</li>
				<li>
					<h5 id="filtersHeader">Filters</h5>
				</li>
			</ul>
			<h1 id="header" class="pit-blue-text">Recent Products</h1>
			<div class="row scrolling-wrapper">
				<div class="col l4">
					<div class="card pit-blue">
						<div class="productNameAndPrice row">
							<span class="card-title pit-gold-text col l8 m8 s8">Product Name</span>
							<span class="card-title pit-gold-text col l4 m4 s4 right-align">$10.00</span>
						</div>
						<a href="#"><img src="assets/images/green_planet2.jpg" class="responsive-img card-image"></a>
					</div>
				</div>
			</div>
			<p>
				<?php $db = new db();
				$mongo = $db->connect();
				//$mongo->;
				?>
			</p>
		</div>
		<script>/*global c*/ window.onload = c.initialize</script>
		<div class="sidenav-overlay"></div>
		<div class="drag-target"></div>
	</body>
</html>