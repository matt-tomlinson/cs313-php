<html>
<head>
	<title>Matt Tomlinson's Home Page</title>
	<link rel="stylesheet" type="text/css" href="stylesheets/home.css"></link>
	<link rel='icon' type='image/x-icon' href='favicon.ico'/>
	<script>
		function check_empty() {
			if (document.getElementById('username').value == "" || document.getElementById('password').value == "" ) {
				alert("Please fill out all fields.");
				return false;
			} else {
				document.getElementById('form').submit();
			}
		}
		function loginFailed(){
			alert("Invalid Credentials");
		}
	</script>
</head>
<body>
	<div class="loginbox">
		<h1 class="headerText">Login</h1>
		<div>
			<form onsubmit="return check_empty()" action="login.php" id="form" method="post" name="form">
				<input class="login" id="username" name="username" placeholder="Username" type="text">
				<input class="login" id="password" name="password" placeholder="Password" type="password">
				<input class="login" type="submit" name="login" value="Login" />
			</form>
			<a href="signup.php" target="targetframe">Sign-up</a>
		</div>
	</div>
	<hr>
	<?php
	// default Heroku Postgres configuration URL
	$dbUrl = getenv('DATABASE_URL');
	if (empty($dbUrl)) {
	// example localhost configuration URL with postgres username and a database called cs313db
		$dbUrl = "postgres://postgres:password@localhost:5432/cs313db";
	}
	$dbopts = parse_url($dbUrl);
	$dbHost = $dbopts["host"];
	$dbPort = $dbopts["port"];
	$dbUser = $dbopts["user"];
	$dbPassword = $dbopts["pass"];
	$dbName = ltrim($dbopts["path"],'/');

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		try {
			$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

			$username = $_POST['username'];
			$password = $_POST['password'];

			$hash = password_hash($password, PASSWORD_DEFAULT);

			$q = "SELECT * FROM users WHERE username='".$username."'";
			foreach ($db->query($q) as $row) {

				if (password_verify($row['password'], $hash)) {
    				header("Location: loggedin.php");
    				exit;
				}
				else {
    				echo '<script type="text/javascript">';
    				echo 'loginFailed();';
    				echo '</script>';
				}
			}
		}
		catch (PDOException $ex) {
			print "<p>error: $ex->getMessage() </p>\n\n";
			die();
		}
	}
	
	?>
</body>
</html>