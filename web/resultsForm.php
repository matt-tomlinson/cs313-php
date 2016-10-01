<?php 
if (!isset($_SESSION['start'])) {
    $_SESSION["start"] = "true";
}
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
            <?php echo get_form_request('day') ?>
            <?php echo get_form_request('season') ?>
            <?php echo get_form_request('meal') ?>
            <?php echo get_form_request('pet') ?>
            <?php echo "<br/>" ?>
        </div>
    </div>
</body>
</html>