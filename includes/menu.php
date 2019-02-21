<nav class="nav-wrapper pit-blue" role="navigation">
	<a id="logo-container" href="index.php" class="brand-logo pit-blue hide-on-med-and-down">
		<img id="logoPNG" src="assets/images/resized_tire_logo.png">
	</a>
	<a href="#" class="sidenav-trigger hide-on-large-and-up" data-target="mobile-links">
		<i class="material-icons" id="menuIcon">menu</i>
	</a>
	<div class="container" id="navContainer">
		<div class="row">
			<a href="index.php" class="brand-logo pit-blue" id="pitSwapTitle">Pit Swap</a>
			<ul class="right hide-on-med-and-down navLinks">
				<li><a href="./account-page.php">Account</a></li>
				<li><a href="./all-products.php">Products</a></li>
				<li><a href="./about-us.php">About Us</a></li>
				<li><a href="">Sign Out</a></li>
			</ul>
		</div>
		<div class="row">
			<form class="searchForm hide-on-med-and-down">
				<div class="input-field">
					<input id="search" type="search"  placeholder="Search" required>
				</div>
			</form>
		</div>
	</div>
</nav>
<ul class="sidenav" id="mobile-links">
	<li><a href="./account-page.php">Account</a></li>
	<li><a href="./all-products.php">Products</a></li>
	<li><a href="./about-us.php">About Us</a></li>
	<li><a href="">Sign Out</a></li>
	<hr>
</ul>
<div class="fixed-action-btn postProductHolder">
	<a id="postProductBtn" class="btn-floating btn-large pit-blue" href="./post-product.php">
		<i id="addProductIcon" class="large material-icons">add</i>
	</a>
</div>