<?php

	session_start();

	if (isset($_SESSION['loggedin'])) {
		header("Location: loggedin.php");
		exit;
	}
?>
<html>
<head>
	<title>Matt Tomlinson's Home Page</title>
	<link rel="stylesheet" type="text/css" href="stylesheets/home.css"></link>
	<link rel='icon' type='image/x-icon' href='favicon.ico'/>
	<script>
		function check_empty() {
			if (document.getElementById('username').value == "" || document.getElementById('password').value == "" ) {
				//alert("Please fill out all fields.");
				document.getElementById("error").textContent= "Invalid Credentials";
				return false;
			} else {
				document.getElementById('form').submit();
			}
		}
	</script>
</head>
<body>
	<div class="loginbox">
		<h1 class="headerText">Login</h1>
		<div>
			<form onsubmit="return check_empty()" action="loggedin.php" id="form" method="post" name="form">
				<input class="login" id="username" name="username" placeholder="Username" type="text">
				<input class="login" id="password" name="password" placeholder="Password" type="password">
				<input class="login" type="submit" name="login" value="Login" />
			</form>
			<a href="signup.php" target="targetframe">Sign-up</a>
			<span id="error" style="color:red; display: block;"></span>
		</div>
	</div>
	<hr>
</body>
</html>