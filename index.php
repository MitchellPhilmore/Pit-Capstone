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
			<a id="logo-container" href="index.php" class="brand-logo pit-blue">
				<img src="assets/images/capstoneLogoPlaceholder.jpg" class="hide-on-med-and-down">
			</a>
			<a href="#" class="sidenav-trigger hide-on-large-and-up" data-target="mobile-links">
			<i class="material-icons" id="menuIcon">menu</i>
			</a>
			<div class="container" id="navContainer">
				<a href="index.php" class="brand-logo pit-blue" id="pitSwapTitle">Pit Swap</a>
				<ul class="right hide-on-med-and-down">
					<li><a href="./pages/allProducts.php">Products</a></li>
					<li><a href="./pages/allSellers.php">Sellers</a></li>
					<li><a href="./pages/aboutUs.php">About Us</a></li>
					<li><a href="">Sign Out</a></li>
				</ul>
			</div>
		</nav>
		<ul class="sidenav" id="mobile-links">
			<li><a href="./pages/allProducts.php">Products</a></li>
			<li><a href="./pages/allSellers.php">Sellers</a></li>
			<li><a href="./pages/aboutUs.php">About Us</a></li>
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
			<!--------------------------------------------------------------->
			<h1 id="header" class="pit-blue-text">Recent Products</h1>
			<!--------------------------------------------------------------->
			<div class="row">
				<!-- PRODUCT CARD -->
				<div class="col l5 xl4 m6">
					<div class="card pit-blue">
						
						<div class="productNameAndPrice">
							<span class="card-title pit-gold-text flow-text">Green Planet</span>
						</div>
						<a href="#"><img src="assets/images/green_planet2.jpg" class="responsive-img card-image"></a>
						<div class="productNameAndPrice">
							<span class="card-title pit-gold-text flow-text">$1,000,000.00</span>
						</div>
						
					</div>
				</div>
				<!-- -->
				<!-- PRODUCT CARD -->
				<div class="col l5 xl4 m6">
					<div class="card pit-blue">
						
						<div class="productNameAndPrice">
							<span class="card-title pit-gold-text flow-text">Psychiatry Textbook</span>
						</div>
						<a href="#"><img src="assets/images/verticalTextbookExample.jpg" class="responsive-img card-image"></a>
						<div class="productNameAndPrice">
							<span class="card-title pit-gold-text flow-text">$40.00</span>
						</div>
						
					</div>
				</div>
				<!-- -->
				<!-- PRODUCT CARD -->
				<div class="col l5 xl4 m6">
					<div class="card pit-blue">
						
						<div class="productNameAndPrice">
							<span class="card-title pit-gold-text flow-text">Integrated Iridology Textbook</span>
						</div>
						<a href="#"><img src="assets/images/textbookExample.jpg" class="responsive-img card-image"></a>
						<div class="productNameAndPrice">
							<span class="card-title pit-gold-text flow-text">$35.50</span>
						</div>
					</div>
				</div>
				<!-- -->
			
			</div>
			<!--------------------------------------------------------------->
			<h1 id="header" class="pit-blue-text">Recent Purchases</h1>
			<!--------------------------------------------------------------->
			<div class="row">
				<div class="col l5 xl4 m6">
					
				</div>
			</div>
			<!--------------------------------------------------------------->
			<h1 id="header" class="pit-blue-text">New Sellers</h1>
			<!--------------------------------------------------------------->
			<div class="row">
				<div class="col l5 xl4 m6">
					<div class="card pit-blue">
						<div class="productNameAndPrice">
							<span class="card-title pit-gold-text flow-text">Frank Smith</span>
						</div>
						<a href="#"><img src="assets/images/frankSinatra.jpg" class="responsive-img seller-card-image card-image"></a>
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