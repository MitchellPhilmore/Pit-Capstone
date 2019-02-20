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
	</head>
	<style type="text/css">
		html,body{
			background:url('http://www.goodwp.com/images/201504/goodwp.com_32366.jpg');
		}
		.login{
			position:absolute;
			top:20%;
			left:35%;
			background:white;
			width:500px;
			height:400px;
			text-align:center;
			opacity:0.5;
		}
		.logo{
			border: 5px solid gray;
			border-radius:50%;
			height:100px;
			width:100px;
			background:black;
			color:white;
			opacity:0.8;
			line-height: 100px;
			font-family: 'Faster One', cursive;
			font-size:300%;
		}
	</style>
	<body>
		<div>
			<div class="row">
				<div class="login">
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
			</div>
		</div>
	</body>
</html>