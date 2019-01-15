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
		<script src="./assets/js/m.js?v=<?php echo date( "U" );?>"></script>
		<script src="./assets/js/v.js?v=<?php echo date( "U" );?>"></script>
		<script src="./assets/js/c.js?v=<?php echo date( "U" );?>"></script>
		<script src="./assets/js/materialize.js?v=<?php echo date( "U" );?>"></script>
		<script src="./assets/js/L.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	</head>
		<body class="grey lighten-4">
			<nav class="light-blue lighten-1 nav-wrapper" role="navigation">
				<a id="logo-container" href="index.php" class="brand-logo">
			    	<img src="assets/images/capstoneLogoPlaceholder.jpg">
			    </a>
				<div class="container" id="navContainer">
					<a href="index.php" class="brand-logo" id="pitSwapTitle">Pit Swap</a>
					<a href="#" class="sidenav-trigger hide-on-large-and-up" data-target="mobile-links">
						<i class="material-icons">menu</i>
					</a>
					<ul class="right hide-on-med-and-down">
						<li><a href="#">Products</a></li>
						<li><a href="#">Sellers</a></li>
						<li><a href="#">About Us</a></li>
						<li><a href="#">Login/Sign Up</a></li>
					</ul>
				</div>
			</nav>
			<ul class="sidenav" id="mobile-links">
				<li><a href="#">Products</a></li>
				<li><a href="#">Sellers</a></li>
				<li><a href="#">About Us</a></li>
				<li><a href="#">Login/Sign Up</a></li>
				<hr>
			</ul>
			<div id="content" class="container">
				<h1 id="header" class="light-blue-text text-lighten-1">Recent Products</h1>
				<div class="row">
					<div class="col l4">
						<div class="card blue-grey darken-1">
							<div class="card-content white-text">
								<div class="productName">
									<span class="card-title">Product Name</span>
								</div>
								<img src="assets/images/green_planet2.jpg" class="responsive-img">
							</div>
							<div class="card-action">
								<div><a href="#">This is a link</a></div>
								<div><a href="#">This is a link</a></div>
							</div>
						</div>
					</div>
					<div class="col l4">
						<div class="card blue-grey darken-1">
							<div class="card-content white-text">
								<div class="productName">
									<span class="card-title">Product Name</span>
								</div>
								<img src="assets/images/green_planet2.jpg" class="responsive-img">
							</div>
							<div class="card-action">
								<div><a href="#">This is a link</a></div>
								<div><a href="#">This is a link</a></div>
							</div>
						</div>
					</div>
					<div class="col l4">
						<div class="card blue-grey darken-1">
							<div class="card-content white-text">
								<div class="productName">
									<span class="card-title">Product Name</span>
								</div>
								<img src="assets/images/green_planet2.jpg" class="responsive-img">
							</div>
							<div class="card-action">
								<div><a href="#">This is a link</a></div>
								<div><a href="#">This is a link</a></div>
							</div>
						</div>
					</div>
					<div class="col l4">
						<div class="card blue-grey darken-1">
							<div class="card-content white-text">
								<div class="productName">
									<span class="card-title">Product Name</span>
								</div>
								<img src="assets/images/green_planet2.jpg" class="responsive-img">
							</div>
							<div class="card-action">
								<div><a href="#">This is a link</a></div>
								<div><a href="#">This is a link</a></div>
							</div>
						</div>
					</div>
				</div>
				<p>
				<?php
					
					$db = new db();
					$mongo = $db->connect();
					//$mongo->;
				?>
				</p>
		<script>/*global c*/ window.onload = c.initialize</script>
	</body>
</html>