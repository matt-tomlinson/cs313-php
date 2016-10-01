
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/home.css">
</head>

<body>
    <h2 class="headerText">CS 313 - Web Engineering II</h2> 
    <h1 class="headerText">Student Survey</h1>        
    <div class="answerBox">
        <?php
        $fileName = "data/results.txt";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $day = test_input($_POST["day"]);
            $season = test_input($_POST["season"]);

            $results = file_get_contents($fileName);
            $results = explode("|", $results);

            $arrlength = count($results);
            for ($x = 0; $x < $arrlength; $x++) 
            {
                echo $results[$x];
                echo "<br/>";
            }
        }  else { 
            $results = file_get_contents($fileName);
            $results = explode("|", $results);
        }
        
        else { echo "Please submit the form."; }

        function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
      }

      echo "Sunday: "; echo $results[0];
      echo "<br/>";
      echo "Monday: "; echo $results[1];
      ?>
      <?php echo $_POST["day"]; ?>
  </div>
</body>
</html>