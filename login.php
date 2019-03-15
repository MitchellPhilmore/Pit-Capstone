<?php

require_once('./assets/php/includes.php');

$common->login();
$common->signup();

?>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<!-- Compiled and minified CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
		<!-- Compiled and minified JavaScript -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
		<link rel="stylesheet" type="text/css" href="./assets/css/styles.css?v=<?php echo date( "U" );?>">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Faster+One" rel="stylesheet">
		<title>PIT Swap - Login</title>
	</head>
	<style type="text/css">
		html,body{
			background:url('./assets/siteImages/loginBackground.jpg');
		}
		
		label {
			
			padding: 0 15px !important;
		}
		
		label.active {
			
			color: #9e9e9e !important;
			top: -10px !important;
		}
		
		/* Change the white to any color ;) */
		input:-webkit-autofill,
		input:-webkit-autofill:hover, 
		input:-webkit-autofill:focus, 
		input:-webkit-autofill:active  {
			-webkit-box-shadow: 0 0 0px 1000px /*#b7daff*/ #dbf4fc inset !important;
			border-radius: 25px;
			padding: 0 15px;
			box-sizing: border-box;
		}
		
		input {
			
			border-radius: 25px !important;
			padding: 0 15px !important;
			box-sizing: border-box !important;
		}
		
		.login {
			
			background:rgba( 255, 255, 255, 0.75 );
			height:400px;
			left:35%;
			position:absolute;
			text-align:center;
			padding: 20px;
			top:20%;
			width:500px;
			border-radius: 10px;
		}
		
		.logo {
			
			border-radius:50%;
			border: 5px solid #f7cc07;
			color:white;
			font-family: 'Faster One', cursive;
			font-size:300%;
			height:100px;
			line-height: 80px;
			opacity:0.8;
			width:100px;
		}
		
		.signup {
			
			background:rgba( 255, 255, 255, 0.75 );
			display: none;
			left:35%;
			padding: 20px;
			position:absolute;
			text-align:center;
			top:5%;
			width:500px;
			border-radius: 10px;
		}
		
		.loginInputs{
			border-bottom: 1px solid #f7cc07 !important;
		}
		
		.input-field .prefix.active{
			
			color: #3161ac !important;
		}
		
	</style>
	<body>
		<div>
			<div class="row">
				<div id="login_container" class="login">
					<div class="col s4"></div>
					<div class="logo col s4 pit-blue">PS</div>
					<div class=" col s4"></div>
					<form class="col s12" method="POST" action="">
						<div class="row">
							<div class="input-field col s12">
								<i class="material-icons pit-blue-text  prefix">account_circle</i>
								<input id="icon_prefix" name="username" type="text" class="validate loginInputs">
								<label for="icon_prefix">Username</label>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<i class="material-icons pit-blue-text  prefix">lock_outline</i>
									<input id="password" name="password" type="password" class="validate loginInputs">
									<label for="password">Password</label>
								</div>
							</div>
							<button class="btn waves-effect waves-light pit-blue darken-2 btn-large z-depth-5 " type="submit" name="action">Login</button>
							<a id="signup" class="btn waves-effect waves-light pit-blue darken-2 btn-large z-depth-5">Sign Up</a>
						</div>
						<input name="login" type="hidden" value="true" class="loginInputs">
					</form>
				</div>
				<div id="signup_container" class="signup">
					<div class="col s4"></div>
					<div class="logo col s4 pit-blue">PS</div>
					<div class=" col s4"></div>
					<form class="col s12" method="POST" action="">
						<div class="row">
							<div class="input-field col s12">
								<i class="material-icons prefix pit-blue-text">account_circle</i>
								<input id="firstName" name="firstName" type="text" required="required" class="validate loginInputs">
								<label for="firstName">First Name</label>
							</div>
							<div class="input-field col s12">
								<i class="material-icons prefix pit-blue-text">account_circle</i>
								<input id="lastName" name="lastName" type="text" required="required" class="validate loginInputs">
								<label for="lastName">Last Name</label>
							</div>
							<div class="input-field col s12">
								<i class="material-icons prefix pit-blue-text">account_circle</i>
								<input id="username" name="username" type="text" required="required" class="validate loginInputs">
								<label for="username">Username</label>
							</div>
							<div class="input-field col s12">
								<i class="material-icons prefix pit-blue-text">account_circle</i>
								<input id="email" name="email" type="text" required="required" class="validate loginInputs">
								<label for="email">Email</label>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<i class="material-icons prefix pit-blue-text">lock_outline</i>
									<input id="signUpPassword" name="password" type="password" required="required" class="validate loginInputs">
									<label for="signUpPassword">Password</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<i class="material-icons prefix pit-blue-text">lock_outline</i>
									<input id="verifyPassword" name="verifyPassword" type="password" class="validate loginInputs">
									<label for="verifyPassword">Retype Password</label>
								</div>
							</div>
							<input name="signup" type="hidden" value="true" class="loginInputs">
							<button class="btn waves-effect waves-light pit-blue darken-2 btn-large z-depth-5 " type="submit" name="action">Sign Up</button>
							<a id="login" class="btn waves-effect waves-light pit-blue darken-2 btn-large z-depth-5">Login</a>
						</div>
					</form>
				</div>
			</div>
		</div>
		<script>
			let login_button = document.getElementById( 'login' );
			let login_container = document.getElementById( 'login_container' );
			let signup_button = document.getElementById( 'signup' );
			let signup_container = document.getElementById( 'signup_container' );
			
			signup_button.addEventListener( 'click', signup );
			login_button.addEventListener( 'click', login );
			
			function login( e ) {
				
				e.preventDefault();
				signup_container.style.display = "none";
				login_container.style.display = "block";
			}
			
			function signup( e ) {
				
				e.preventDefault();
				login_container.style.display = "none";
				signup_container.style.display = "block";
			}
		</script>
	</body>
</html>