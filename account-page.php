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
			<h1 class="myHeader pit-blue-text">Frank Sinatra<!-- Insert Person's name here --></h1>
			<div class="row">
				<div class="col s12 m12 l5 xl5">
					<h3>Your Username: FrankSinatra555
					<h3>Your Email: frankSinatra@fakeEmail.com
				</div>
				<div class="col s12 m12 l5 xl5">
					<div class="card pit-blue">
						<div class="productNameAndPrice">
							<span class="card-title pit-gold-text flow-text">Frank Smith</span>
						</div>
						<a href="/account-page.php"><img src="assets/images/frankSinatra.jpg" class="responsive-img seller-card-image card-image"></a>
					</div>
				</div>
			</div>
			<!--------------------------------------------------------------->
		</div>
		<script>/*Global c*/window.onload = c.accountPageInitialize</script>
	</body>
</html>
