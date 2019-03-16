<?php

require_once( "./assets/php/includes.php" );

?>
<!DOCTYPE HTML>
<html>
	<?php require_once( "./includes/head.php" );?>
	<body class="grey lighten-4">
		<?php require_once( "./includes/menu.php" );?>
		<div id="content" class="container">
			<!--------------------------------------------------------------->
			<h1 class="myHeader pit-blue-text">Reserved</h1>
			<br>
			<p class="flow-text">Thank you for being interested in this product</p>
			<p class="flow-text">Until we allow online payments, our system sends you an email,
			as well as the seller of the product.</p>
			<p class="flow-text">From this point forth, we have no control over
			further negotiations of pricing, and cannot be held responsible for
			anything. Whatever happens is between the buyer and the seller.</p>
			<p class="flow-text">Thank you for swapping at Pit Swap!</p>
			<!--------------------------------------------------------------->
			<div id="" class="center-align">
				<a id="logo-container" href="index.php" class="brand-logo hide-on-med-and-down">
					<img id="thankYouPageLogo" src="assets/siteImages/resized_tire_logo.png">
				</a>
			</div>
		</div>
		<script>/*Global c*/window.onload = c.buyConfirmationInitialize</script>
	</body>
</html>