<?php if (!isset($_SESSION)) session_start() ?>
<?php require_once('process-form.php') ?>
<?php require_once('survey-write-file.php') ?>

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