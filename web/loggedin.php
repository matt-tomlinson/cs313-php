<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="stylesheets/home.css">
</head>
<body>
    <h1 class="headerText">Login Page</h1>        
    <div class="answerBox">
        <?php

        if (isset($_SESSION['loggedin'])) {
            header("Location: loggedin.php");
            exit;
        }

        $dbUrl = getenv('DATABASE_URL');

        if (empty($dbUrl)) {
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

                    if (password_verify($password, $hash)) {
                        //$message = "Invalid Credentials";
                        //echo "<script type='text/javascript'>alert('$message');</script>";
                        //echo "<span style='color:red'>Invalid Credentials</span>";
                    }
                    else {
                        $_SESSION["loggedin"] = $username;
                        header("Location: loggedin.php");
                        exit;

                    }
                }
            }
            catch (PDOException $ex) {
                print "<p>error: $ex->getMessage() </p>\n\n";
                die();
            }
        }

        echo '<p>Welcome '. $username. '!</p>';

        ?>
    </div>
</body>
</html>