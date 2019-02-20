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
			<h1 class="myHeader pit-blue-text">Post a product</h1>
			<!--------------------------------------------------------------->
			<div class="row">
				<div class="col s12 m12 l5 xl5">
					<p>The product that you post must follow this set of guidelines:</p>
					<ul class="browser-default">
						<li>
							<p>Product must be appropriate, nothing too personal or explicit</p>
						</li>
						<li>
							<p>No weapons can be sold</p>
						</li>
						<li>
							<p>No drugs or alcohol can be sold</p>
						</li>
					</ul>
					<h3 class="pit-gold-text">Please fill out this form</h3>
					<form>
						<div class="input-field">
							<input id="productName" name="productName" type="text" class="validate" required>
							<label for="productName">Product Name</label>
						</div>
						<div class="input-field">
							<input id="productPrice" name="productPrice" type="text" class="validate" required>
							<label for="productPrice">Price</label>
						</div>
						<h5>Please select an image of your product</h5>
						<h6>One is sufficient</h6>
						<div class="file-field input-field">
							<div class="btn pit-blue">
								<span>Image</span>
								<input type="file" accept="image/*">
							</div>
							<div class="file-path-wrapper">
								<input class="file-path validate" type="text">
							</div>
						</div>
						<br>
						<h5>Please describe your product, detailing any information the buyer will need to know</h5>
						<div class="input-field">
							<textarea id="textarea1" class="materialize-textarea"></textarea>
							<label for="textarea1">Description</label>
						</div>
						<br><br>
						<button class="btn waves-effect waves-light pit-blue" type="submit" name="action">Submit Product
							<i id="postProductIcon" class="material-icons right">wb_iridescent</i>
						</button>
					</form>
				</div>
				<div class="col s12 m12 l5 xl5 right"><br>
					<h3 class="pit-gold-text">Example Product</h3>
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
			</div>
		</div>
		<script>/*Global c*/window.onload = c.postProductInitialize</script>
	</body>
</html>