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
        <?php 
        $fileContents = file_get_contents('results.txt'); 
        echo $fileContents;
        ?>
    </div>
</body>
</html>