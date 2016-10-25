<html>
<head>
	<title>Matt Tomlinson's Home Page</title>
	<link rel="stylesheet" type="text/css" href="stylesheets/home.css"></link>
	<link rel='icon' type='image/x-icon' href='favicon.ico'/>
	<script>
		
	</script>
</head>
<body>
	<h1>Login</h1>
	
	<form action="login.php" id="form" method="post" name="form">
		
		<input id="username" name="username" placeholder="Username" type="text">
		<input id="password" name="password" placeholder="Password" type="text">
		<input type="submit"  name="login" value="Login" />
		
	</form>
	
	<a href="signup.php" target="_top">Sign-up</a>
	
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
//$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
	try {
		$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$q = "SELECT * FROM users "
			."WHERE `username`='".$_POST["username"]."' "
			."AND `password`=PASSWORD('".$_POST["password"]."') "
			."LIMIT 1";
			foreach ($db->query($q) as $row) {
				echo '<p>'.$row['username'].'</p>';
				echo '<p>'.$row['password'].'</p>';

				if ($_POST["username"] == $row['username']){
					echo '<p>Usernames match</p>';
				}
			}
		}
	}
	catch (PDOException $ex) {
		print "<p>error: $ex->getMessage() </p>\n\n";
		die();
	}
	?>
</body>
</html>