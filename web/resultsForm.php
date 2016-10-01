<?php if (!isset($_SESSION)) session_start() ?>
<?php 
function get_form_request($request) {
    if (isset($_POST[$request])) {
        if (!isset($_SESSION[$request]) ||
            $_SESSION[$request] !== $_POST[$request]) {
            $_SESSION[$request] = $_POST[$request];
    }
    return $_POST[$request];
} else if (isset($_SESSION[$request])) {
    return $_SESSION[$request];
}
return "";
}
function fullRequest() {
    if (isset($_POST) && count($_POST) > 0) {
        return $_POST;
    } else if (isset($_SESSION)) {
        return $_SESSION;
    }
    return false;
}
?>
<?php 
function writeFile(&$file_ptr, $request) {
    foreach ($request as $key => $val) {
        if (!is_array($val)) {
            if (substr($key, 0, 1) !== '_') {
                $file_ptr .= $key . ': ' . $val . "\n";
            }
        } else {
            writeFile($file_ptr, $val);
        }
    }
}

$file = 'results.txt';
$current = file_get_contents($file);
writeFile($current, fullRequest());
$current .= "\n";
file_put_contents($file, $current);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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