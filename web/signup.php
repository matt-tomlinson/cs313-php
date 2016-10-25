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
				alert("Registered new user");
			}
		}
	</script>
</head>
<body>
	<div class="signupbox">
		<h1 class="headerText">Sign-up</h1>
		<div>
			<form onsubmit="return check_empty()" action="signup.php" id="form" method="post" name="form">
				<input class="login" id="username" name="username" placeholder="Username" type="text">
				<input class="login" id="password" name="password" placeholder="Password" type="text">
				<input class="login" type="submit" name="login" value="Submit" />
				<input type="hidden" name="adduser" value="true">
			</form>
			<a href="login.php" target="targetframe">Back to login page</a>
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

	if (isset($_POST['adduser'])) {
		header("Location: login.php");
    	exit;
	}

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		try {
			$conn = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

			$username = $_POST['username'];
			$password = $_POST['password'];

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$hash = password_hash($password, PASSWORD_DEFAULT);

			$query = "INSERT INTO users (username, password) VALUES('" . $username . "', '" . $hash . "')";

			$conn->exec($query);
		}
		catch(PDOException $e){
			echo $query . "<br>" . $e->getMessage();
		}

		$conn = null;
	}
	?>
</body>
</html>