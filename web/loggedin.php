<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="stylesheets/home.css">
</head>
<body>
    <h1 class="headerText">Welcome page</h1>        
    <div class="answerBox">
        <?php 

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

                echo '<p>Welcome '.$row['username'].'!</p>';
            }
            catch (PDOException $ex) {
                print "<p>error: $ex->getMessage() </p>\n\n";
                die();
            }
        }

        ?>
    </div>
</body>
</html>