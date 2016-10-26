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
        session_start();

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

                $q = "SELECT password FROM users WHERE username='".$username."'";
                foreach ($db->query($q) as $row) {

                    $hash = password_hash($password, PASSWORD_DEFAULT);
                    echo '<h2 class="headerText">current hash: '. $hash. '!</h2>';
                    echo '<h2 class="headerText">password: '. $password. '!</h2>';
                    echo '<h2 class="headerText">row[password]: '. $row['password'] . '!</h2>';
                    echo '<h2 class="headerText">username: '. $username. '!</h2>';

                    if (password_verify($password, $row['password'])) {
                        $_SESSION['loggedin'] = "true";
                    } else {
                        header("Location: login.php");
                        exit;
                    }
                }
            }
            catch (PDOException $ex) {
                print "<p>error: $ex->getMessage() </p>\n\n";
                die();
            }
        }


        if (!isset($_SESSION['loggedin'])) {
            header("Location: login.php");
            exit;
        }

        ?>
    </div>
</body>
</html>