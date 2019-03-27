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
			<h1 id="nameHeader" class="myHeader pit-blue-text">Frank Sinatra<!-- Insert Person's name here --></h1>
			<div class="row">
				<div class="col s12 m12 l5 xl5">
					<h3 class="pit-gold-text">Username
					<h4 id="usernameHeader">FrankSinatra555
					<h3 class="pit-gold-text">Email
					<h4 id="emailHeader">FSinatra@fakeemail.com
				</div>
				<div id="userCardCol" class="col s12 m12 l5 xl5 right">
					<div class="card pit-blue">
						<div class="productNameAndPrice">
							<span class="card-title pit-gold-text flow-text">Frank Smith</span>
						</div>
						<div class="productImage"></div>
					</div>
				</div>
			</div>
			<h1 class="myHeader pit-blue-text">Recent Purchases</h1>
			<!--------------------------------------------------------------->
			<h1 class="myHeader pit-blue-text">Recently Posted</h1>
		</div>
		<script>
			/*Global c*/
			window.onload = ()=>{
				
				//this object will give m.userData all fields from db except for password
				//m.userData = phpcodeyay;
				c.accountPageInitialize()
			}
		</script>
	</body>
</html>
