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
			<h1 class="myHeader pit-blue-text">Recent Products</h1>
			<!--------------------------------------------------------------->
			<div class="productRow">
				
			</div>
			<!--------------------------------------------------------------->
			<h1 class="myHeader pit-blue-text">Recent Purchases</h1>
			<!--------------------------------------------------------------->
			<div class="row">
				<div class="productCol col l5 xl4 m6">
					
				</div>
			</div>
			<!--------------------------------------------------------------->
			<!--<h1 class="myHeader pit-blue-text">New Sellers</h1>-->
			<!--------------------------------------------------------------->
			<!--
			<div class="row">
				
			</div>-->
		</div>
		<div class="sidenav-overlay"></div>
		<div class="drag-target"></div>
		<script>/*global c*/ window.onload = c.indexInitialize</script>
	</body>
</html>