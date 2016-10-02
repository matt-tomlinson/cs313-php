<?php 

$file = fopen("results.txt", "a") or die("Unable to open file!");

$answer  = $_POST['day'] .= "  ";
$answer .= $_POST['season'] .= "  ";
$answer .= $_POST['meal'] .= "  ";
$answer .= $_POST['pet'] .= "  ";
$answer .= "<br/>";

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
    <h1 class="headerText">Student Survey Results</h1>        
    <div class="answerBox">
        <div class="answerBox">
            <?php echo $fileContents?>
        </div>
    </div>
</body>
</html>