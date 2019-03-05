<?php

require_once( "./assets/php/includes.php" );

if( isset( $_GET["product"] ) ) {
	
	$product = $_GET["product"];
} else {
	
	$product = "";
}


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
			<h1 id="productPageTitle" class="myHeader pit-blue-text"><!-- Product title goes here -->Green Planet</h1>
			<div id="oneProductRow" class="row">
				<div id="placeHolderCard" class="col s12 m6 l6 xl6">
					<!-- insert product card here -->
					<div class="card pit-blue">
								
						<div class="productNameAndPrice">
							<span class="card-title pit-gold-text flow-text">Green Planet</span>
						</div>
						<div class="productImage" id="greenPlanet"></div>
						<div class="productNameAndPrice">
							<span class="card-title pit-gold-text flow-text">$45,000,000,000,000.00</span>
						</div>
						
					</div>
				</div>
				<div id="productDescDiv" class="flow-text col s12 m6 l6 xl6">
					<!-- insert product description here -->
					This here green planet is one of a kind! located 3 billion light years from our own solar system, this bad boi isnt even in our own galaxy.
					Flaunting an impressive slew of resources, this one is also covered in lush forests and greenery, making for quite the spectacle, even from space.
					The resources spoken of include enormous deposits of topaz, sapphires, and coal, as well as the forests that are teeming with wildife like deer.
					<br>This planet is for anyone who is a sucker for paradise, buy now for only $45 Trillion! Tax not included.
				</div>
			</div>
			<br><hr><br>
			<div class="center">
				<button class="btn waves-effect waves-light pit-gold pit-blue-text">Proceed to checkout
					<!-- Dont forget to send data to checkout.php of what product is being sold -->
					<a data-json="{}" href="checkout.php"></a>
					<i class="material-icons right">shopping_cart</i>
				</button>
			</div>
		</div>
		<script>
			/*Global c*/
			window.onload = function( event ) {
				
				m.productId = `<?php echo $product;?>`;
				c.productInitialize();
			}
		</script>
	</body>
</html>