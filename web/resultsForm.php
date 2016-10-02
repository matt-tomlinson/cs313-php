<?php 
if (!isset($_SESSION['submit'])) {
    $_SESSION["submit"] = "true";
}

if (isset($_POST['day'])) {
    $file = fopen("results.txt", "a") or die("Unable to open file!");

    $answer  = $_POST['day'] .= "  ";
    $answer .= $_POST['season'] .= "  ";
    $answer .= $_POST['meal'] .= "  ";
    $answer .= $_POST['pet'] .= "  ";
    $answer .= "<br/>";

    fwrite($file, $answer);
    fclose($file);

    header("Location: results.php");
    exit();
}

?>
