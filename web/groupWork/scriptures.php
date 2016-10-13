<html>
<body>

<?php

// default Heroku Postgres configuration URL
$dbUrl = getenv('DATABASE_URL');

if (empty($dbUrl)) {
 // example localhost configuration URL with postgres username and a database called cs313db
 $dbUrl = "postgres://postgres:password@localhost:5432/cs313db";
}

$dbopts = parse_url($dbUrl);

print "<p class="answerBox">$dbUrl</p>\n\n";

$dbHost = $dbopts["host"]; 
$dbPort = $dbopts["port"]; 
$dbUser = $dbopts["user"]; 
$dbPassword = $dbopts["pass"];
$dbName = ltrim($dbopts["path"],'/');

print "<p class="answerBox">pgsql:host=$dbHost;port=$dbPort;dbname=$dbName</p>\n\n";

try {
 $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
}
catch (PDOException $ex) {
 print "<p class="answerBox">error: $ex->getMessage() </p>\n\n";
 die();
}

foreach ($db->query('SELECT now()') as $row)
{
 print "<p class="answerBox">$row[0]</p>\n\n";
}

?>

<?php
$title = 'Week 5 Prep';
$description = "Week 5 Prep for CS 313.";
include $_SERVER['DOCUMENT_ROOT'] . '/cs313/views/addins/header.php'; 
?>
<h1 class="answerBox">Week 5: Team Readiness - Scriptures</h1>
<main class="answerBox">
    <br>
    <hr>
    <h2 class="answerBox">SCRIPTURE RESOURCES</h2>
    <?php 
    foreach($stmt->fetchAll() as $row){
        echo '<b>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</b>';
        echo ' - "' . $row['content'] . '"';
        echo '<br/><br/>';
    }
    ?>
    <hr>
</main>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/cs313/views/addins/footer.php'; ?>

</body>
</html>