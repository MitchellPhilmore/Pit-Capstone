<?php

require_once( "./assets/php/includes.php" );

?>
<!DOCTYPE HTML>
<html>
	<?php require_once( "./includes/head.php" );?>
	<body class="grey lighten-4">
		<?php require_once( "./includes/menu.php" );?>
		<div id="content" class="container">
			<!--<ul class="sidenavLargeScreen sidenav-fixed hide-on-med-and-down">
				<li>
					<h5 id="categoriesHeader">Categories</h5>
				</li>
				<li>
					<p>
						<label>
							<input type="checkbox" class="filled-in"/>
							<span>Clothes</span>
						</label>
					</p>
				</li>
				<li>
					<p>
						<label>
							<input type="checkbox" class="filled-in"/>
							<span>Casual Books</span>
						</label>
					</p>
				</li>
				<li>
					<p>
						<label>
							<input type="checkbox" class="filled-in"/>
							<span>Textbooks</span>
						</label>
					</p>
				</li>
				<li>
					<p>
						<label>
							<input type="checkbox" class="filled-in"/>
							<span>School Supplies</span>
						</label>
					</p>
				</li>
			</ul> -->
			<!--------------------------------------------------------------->
			<h1 class="myHeader pit-blue-text">Thank You!</h1>
			<!--------------------------------------------------------------->
			<br>
			<p class="flow-text">Thank you for posting your product!</p>
			<p class="flow-text">Your product has been sent to our database, where it can be viewed
			by any other member of this site. When a customer is interested
			and they would like to purchase the product, an email will be sent
			to both users so that a location and time can be arranged for the purchase.</p>
			<p class="flow-text">This system is in place of the eventual inclusion of credit card
			payments</p>
			<div id="" class="center-align">
				<a id="logo-container" href="index.php" class="brand-logo hide-on-med-and-down">
					<img id="thankYouPageLogo" src="assets/images/resized_tire_logo.png">
				</a>
			</div>
		</div>
		<script>/*Global c*/window.onload = c.thankYouPageInitialize</script>
	</body>
</html>