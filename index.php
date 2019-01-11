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
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<script src="./assets/js/m.js?v=<?php echo date( "U" );?>"></script>
		<script src="./assets/js/v.js?v=<?php echo date( "U" );?>"></script>
		<script src="./assets/js/c.js?v=<?php echo date( "U" );?>"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	</head>
	<body class="grey lighten-4">
		<div>
			<nav class="light-blue lighten-1" role="navigation">
				<div class="nav-wrapper container">
					<ul class="right hide-on-med-and-down">
						<li><a href="#">Navbar Link</a></li>
					</ul>
					<ul id="nav-mobile" class="sidenav">
						<li><a href="#">Navbar Link</a></li>
					</ul>
					<a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
				</div>
			</nav>
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
			</div>
			<ul class="sidenav sidenav-fixed">
			    <a id="logo-container" href="/" class="brand-logo">
			    	<img src="assets/images/capstoneLogoPlaceholder.jpg">
			    </a>
			</ul>
		</div>
		<script src="./assets/js/materialize.js?v=<?php echo date( "U" );?>"></script>
	</body>
</html>