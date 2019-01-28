<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once( '../assets/php/class.db.php' );

?>
<!DOCTYPE HTML>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../assets/css/materialize.css?v=<?php echo date( "U" );?>">
		<link rel="stylesheet" type="text/css" href="../assets/css/styles.css?v=<?php echo date( "U" );?>">
		<link href="https://fonts.googleapis.com/css?family=Faster+One" rel="stylesheet">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<script src="../assets/js/L.js"></script>
		<script src="../assets/js/m.js?v=<?php echo date( "U" );?>"></script>
		<script src="../assets/js/v.js?v=<?php echo date( "U" );?>"></script>
		<script src="../assets/js/c.js?v=<?php echo date( "U" );?>"></script>
		<script src="../assets/js/materialize.js?v=<?php echo date( "U" );?>"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>About Us</title>
	</head>
	<body class="grey lighten-4">
		<nav class="nav-wrapper pit-blue" role="navigation">
			<a id="logo-container" href="index.php" class="brand-logo pit-blue hide-on-med-and-down">
				<img src="assets/images/capstoneLogoPlaceholder.jpg">
			</a>
			<a href="#" class="sidenav-trigger hide-on-large-and-up" data-target="mobile-links">
			<i class="material-icons" id="menuIcon">menu</i>
			</a>
			<div class="container" id="navContainer">
				<a href="../index.php" class="brand-logo pit-blue" id="pitSwapTitle">Pit Swap</a>
				<ul class="right hide-on-med-and-down">
					<li><a href="../pages/allProducts.php">Products</a></li>
					<li><a href="../pages/allSellers.php">Sellers</a></li>
					<li><a href="../pages/aboutUs.php">About Us</a></li>
					<li><a href="">Sign Out</a></li>
				</ul>
			</div>
		</nav>
		<ul class="sidenav" id="mobile-links">
			<li><a href="../pages/allProducts.php">Products</a></li>
			<li><a href="../pages/allSellers.php">Sellers</a></li>
			<li><a href="../pages/aboutUs.php">About Us</a></li>
			<li><a href="">Sign Out</a></li>
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
			<h1 id="header" class="pit-blue-text">About The PIT Swap Project</h1>
			<!--------------------------------------------------------------->
		</div>
		<script>/*Global c*/window.onload = c.aboutUsInitialize</script>
	</body>
</html>