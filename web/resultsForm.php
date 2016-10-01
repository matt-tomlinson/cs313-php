
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
        if (isset($_POST['submit'])) { /* Do Something Here */ 
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
              $day = test_input($_POST["day"]);
              $season = test_input($_POST["season"]);
          }
      }
      else { echo "Please submit the form."; }

      function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
      }
      
      echo "Day: "; echo $day;
      echo "Season: "; echo $season;
      ?>
      <?php echo $_POST["day"]; ?>
  </div>
</body>
</html>