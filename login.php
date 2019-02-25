<?php

require_once('./assets/php/includes.php');

$common->login();

?>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<!-- Compiled and minified CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
		<!-- Compiled and minified JavaScript -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Faster+One" rel="stylesheet">
		<title>PIT Swap - Login</title>
	</head>
	<style type="text/css">
		html,body{
			background:url('./assets/images/loginBackground.jpg');
		}
		.login {
			background:white;
			height:400px;
			left:35%;
			opacity:0.5;
			position:absolute;
			text-align:center;
			top:20%;
			width:500px;
		}
		.logo {
			background:black;
			border-radius:50%;
			border: 5px solid gray;
			color:white;
			font-family: 'Faster One', cursive;
			font-size:300%;
			height:100px;
			line-height: 100px;
			opacity:0.8;
			width:100px;
		}
		.register {
			background:white;
			display: none;
			height:400px;
			left:35%;
			opacity:0.5;
			position:absolute;
			text-align:center;
			top:20%;
			width:500px;
		}
	</style>
	<body>
		<div>
			<div class="row">
				<div id="login" class="login">
					<div class="col s4"></div>
					<div class="logo col s4">PS</div>
					<div class=" col s4"></div>
					<form class="col s12" method="POST" action="">
						<div class="row">
							<div class="input-field col s12">
								<i class="material-icons prefix">account_circle</i>
								<input id="icon_prefix" name="username" type="text" class="validate">
								<label for="icon_prefix">Username</label>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<i class="material-icons prefix">lock_outline</i>
									<input id="password" name="password" type="password" class="validate">
									<label for="password">Password</label>
								</div>
							</div>
							<button class="btn waves-effect waves-light red darken-2 btn-large z-depth-5 " type="submit" name="action">Login</button>
						</div>
					</form>
				</div>
				<div id="register" class="register">
					<div class="col s4"></div>
					<div class="logo col s4">PS</div>
					<div class=" col s4"></div>
					<form class="col s12" method="POST" action="">
						<div class="row">
							<div class="input-field col s12">
								<i class="material-icons prefix">account_circle</i>
								<input id="icon_prefix" name="firstName" type="text" class="validate">
								<label for="icon_prefix">First Name</label>
							</div>
							<div class="input-field col s12">
								<i class="material-icons prefix">account_circle</i>
								<input id="icon_prefix" name="lastName" type="text" class="validate">
								<label for="icon_prefix">Last Name</label>
							</div>
							<div class="input-field col s12">
								<i class="material-icons prefix">account_circle</i>
								<input id="icon_prefix" name="username" type="text" class="validate">
								<label for="icon_prefix">Username</label>
							</div>
							<div class="input-field col s12">
								<i class="material-icons prefix">account_circle</i>
								<input id="icon_prefix" name="email" type="text" class="validate">
								<label for="icon_prefix">EMail</label>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<i class="material-icons prefix">lock_outline</i>
									<input id="password" name="password" type="password" class="validate">
									<label for="password">Password</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<i class="material-icons prefix">lock_outline</i>
									<input id="password" name="verifyPassword" type="password" class="validate">
									<label for="password">Retype Password</label>
								</div>
							</div>
							<button class="btn waves-effect waves-light red darken-2 btn-large z-depth-5 " type="submit" name="action">Login</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>