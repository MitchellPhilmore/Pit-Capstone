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
				<!-- PRODUCT CARD -->
				<div class="productCol col l5 xl4 m6">
					<div class="card pit-blue">
						
						<div class="productNameAndPrice">
							<span class="card-title pit-gold-text flow-text">Green Planet</span>
						</div>
						<a data-productId="Green Planet" href="./product.php">
							<div class="productImage" id="greenPlanet"></div>
						</a>
						<div class="productNameAndPrice">
							<span class="card-title pit-gold-text flow-text">$45,000,000,000,000.00</span>
						</div>
						
					</div>
				</div>
				<!-- -->
				<!-- PRODUCT CARD -->
				<div class="productCol col l5 xl4 m6">
					<div class="card pit-blue">
						
						<div class="productNameAndPrice">
							<span class="card-title pit-gold-text flow-text">Psychiatry Textbook</span>
						</div>
						<div class="productImage" id="psychiatryTextbook"></div>
						<div class="productNameAndPrice">
							<span class="card-title pit-gold-text flow-text">$40.00</span>
						</div>
						
					</div>
				</div>
				<!-- -->
				<!-- PRODUCT CARD -->
				<div class="productCol col l5 xl4 m6">
					<div class="card pit-blue">
						
						<div class="productNameAndPrice">
							<span class="card-title pit-gold-text flow-text">Integrated Iridology Textbook</span>
						</div>
						<div class="productImage integratedIridologyTextbook"></div>
						<div class="productNameAndPrice">
							<span class="card-title pit-gold-text flow-text">$35.50</span>
						</div>
					</div>
				</div>
				<!-- -->
				<!-- PRODUCT CARD -->
				<div class="productCol col l5 xl4 m6">
					<div class="card pit-blue">
						
						<div class="productNameAndPrice">
							<span class="card-title pit-gold-text flow-text">Integrated Iridology Textbook</span>
						</div>
						<div class="productImage integratedIridologyTextbook"></div>
						<div class="productNameAndPrice">
							<span class="card-title pit-gold-text flow-text">$35.50</span>
						</div>
					</div>
				</div>
				<!-- -->
				<!-- PRODUCT CARD -->
				<div class="productCol col l5 xl4 m6">
					<div class="card pit-blue">
						
						<div class="productNameAndPrice">
							<span class="card-title pit-gold-text flow-text">Integrated Iridology Textbook</span>
						</div>
						<div class="productImage integratedIridologyTextbook"></div>
						<div class="productNameAndPrice">
							<span class="card-title pit-gold-text flow-text">$35.50</span>
						</div>
					</div>
				</div>
				<!-- -->
				<!-- PRODUCT CARD -->
				<div class="productCol col l5 xl4 m6">
					<div class="card pit-blue">
						
						<div class="productNameAndPrice">
							<span class="card-title pit-gold-text flow-text">Integrated Iridology Textbook</span>
						</div>
						<div class="productImage integratedIridologyTextbook"></div>
						<div class="productNameAndPrice">
							<span class="card-title pit-gold-text flow-text">$35.50</span>
						</div>
					</div>
				</div>
				<!-- -->
			</div>
			<!--------------------------------------------------------------->
			<h1 class="myHeader pit-blue-text">Recent Purchases</h1>
			<!--------------------------------------------------------------->
			<div class="row">
				<div class="productCol col l5 xl4 m6">
					
				</div>
			</div>
			<!--------------------------------------------------------------->
			<h1 class="myHeader pit-blue-text">New Sellers</h1>
			<!--------------------------------------------------------------->
			<div class="row">
				<div class="col l5 xl4 m6">
					<div class="card pit-blue">
						<div class="productNameAndPrice">
							<span class="card-title pit-gold-text flow-text">Frank Smith</span>
						</div>
						<a href="account-page.php"><img src="assets/images/frankSinatra.jpg" class="responsive-img seller-card-image card-image"></a>
					</div>
				</div>
			</div>
			<p>
				<?php //$db = new db();
				//$mongo = $db->connect();
				///$mongo->;
				?>
			</p>
		</div>
		<div class="sidenav-overlay"></div>
		<div class="drag-target"></div>
		<script>/*global c*/ window.onload = c.indexInitialize</script>
	</body>
</html>