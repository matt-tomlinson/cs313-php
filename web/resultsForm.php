<?php 
if (!isset($_SESSION)) session_start() 

$file = fopen("results.txt", "a") or die("Unable to open file!");
$answer = $_POST['day'] .= $_POST['season']  .= $_POST['meal'] .= $_POST['pet'] .= "\n";
fwrite($file, $answer);
fclose($file);

$fileContents = file_get_contents('results.txt');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="stylesheets/home.css">
</head>
<body>
    <h1 class="headerText">Student Survey</h1>        
    <div class="answerBox">
        <div class="answerBox">
            <?php echo $fileContents?>
        </div>
    </div>
</body>
</html>