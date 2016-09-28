<?php
	session_start();

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		setcookie("Submit", "yes");
	}
	// the file that will store the data
	$fileName = "data/results.txt";

	$republican = 0;
	$democratic = 0;
	$libertarian = 0;
	$right = 0;
	$wrong = 0;
	$undecided = 0;
	$trump = 0;
	$hilary = 0;
	$mucmullin = 0;
	$otherVote = 0;
	$wontVote = 0;
	$debateYes = 0;
	$debateNo = 0;
	$changeYes = 0;
	$changeNo = 0;
	$age1829 = 0;
	$age3044 = 0;
	$age4559 = 0;
	$age60 = 0;
	$cauc = 0;
	$afAm = 0;
	$his = 0;
	$natAm = 0;
	$other = 0;
	$male = 0;
	$female = 0;


	//Check to see if we got here from POST
	if (!empty($_POST))
	{
		echo "hello";
		// Get the content from the text file
		$results = file_get_contents($fileName);
		// Don't include the | in the text file
		$results = explode("|", $results);

		$arrlength = count($results);
		for ($x = 0; $x < $arrlength; $x++) {
			 echo $results[$x];
			 echo "<br/>";
		}
		// check all radio buttons and see if the it was selected,
		// if so then ++ the variable we got from text file.

		// save data to the text file

		//display results
		// $formPost = TRUE;
	} else { /* This will only excute if the user did not submit the form */

		// Get the content from the text file
		$results = file_get_contents($fileName);
		// Don't include the | in the text file
	  $results = explode("|", $results);

		// For testing Purposes to ensure it is displaying correctly
		/*$arrlength = count($results);
		for ($x = 0; $x < $arrlength; $x++) {
			 echo $results[$x];
			 echo "<br/>";
		}*/

	}

 /*********************************************
  * READ TEXT FILE FUNCTION
  * This section will get data from from the file.
  * It will simply read it, and won't be able to edit
  * the file at all. It will store the contents,
	* of the file into an array, and then close the
	* file.
  *********************************************/
	function readTextFile($fileName) {
		// declaring local array
		$str;
		// open file
		//$file = fopen($fileName, "r");

		// read the file

			 //$str = file_get_contents($fileName);
			// $str = explode("|", $str);


		// I wasn't born in a barn
		//fclose($file);

		// make like a leaf
		return $str;
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Hunter J Marshall</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="stylesheets/survey.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<!-- Navbar -->
	<nav class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="http://hunterjmarshall.com/">Hunter J Marshall</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">WHAT</a>
						<ul class="dropdown-menu">
							<li><a href="http://hunterjmarshall.com/html/portfolio.html">Portfolio</a></li>
							<li><a href="http://hunterjmarshall.com/documents/HunterMarshallResume.pdf">Resume</a></li>
							<li><a href="http://hunterjmarshall.com/html/testimonials.html">Testimonials</a></li>
							<li><a href="http://hunterjmarshall.com/html/contactMe.html">Contact Me</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">WHO</a>
						<ul class="dropdown-menu">
							<li><a href="http://hunterjmarshall.com/html/hobbies.html">Hobbies</a></li>
							<li><a href="http://hunterjmarshall.com/html/pictures.html">Pictures</a></li>
							<li><a href="http://hunterjmarshall.com/html/blog.html">Blog</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- First Container -->
	<div class="container-fluid backgd">
		<div class="row">
			<div class="col-sm-12">
			<?php
			echo"<label>What Political Party do you associate yourself with?</label><br/>";
				echo "Republican "; echo $results[0];
				echo "<br/>";
				echo "Democratic "; echo $results[1];
				echo "<br/>";
				echo "Libertarian "; echo $results[2];
				echo "<br/>";
				echo "Other "; echo $results[3];
				echo "<br/>";
			echo"<label>Generally speaking, do you think this country is headed in the right direction or on the wrong track?</label><br/>";
				echo "Right direction "; echo $results[4];
				echo "<br/>";
				echo "Wrong direction "; echo $results[5];
				echo "<br/>";
				echo "Undecided "; echo $results[6];
				echo "<br/>";
			echo"<label>If the election was held today, who would you vote for?</label><br/>";
				echo "Donald J Trump (Republican Party) "; echo $results[7];
				echo "<br/>";
				echo "Hillary Clinton (Democratic Party) "; echo $results[8];
				echo "<br/>";
				echo "Gary Johnson (Libertarian) "; echo $results[9];
				echo "<br/>";
				echo "Evan McMullin (Independent) "; echo $results[10];
				echo "<br/>";
				echo "Other "; echo $results[11];
				echo "<br/>";
				echo "Won't Vote "; echo $results[12];
				echo "<br/>";
			echo"<label>Did you watch the Presidential debates?</label><br/>";
				echo "Yes "; echo $results[13];
				echo "<br/>";
				echo "No "; echo $results[14];
				echo "<br/>";
			echo"<label>If you watched the debate, did the debate change your mind on who you were voting for?</label><br/>";
				echo "Yes "; echo $results[15];
				echo "<br/>";
				echo "No "; echo $results[16];
				echo "<br/>";
				echo "Didn't watch debate "; echo $results[17];
				echo "<br/>";
			echo"<label>What age group are you in?</label><br/>";
				echo "18-29 "; echo $results[18];
				echo "<br/>";
				echo "30-44 "; echo $results[19];
				echo "<br/>";
				echo "45-59 "; echo $results[20];
				echo "<br/>";
				echo "60+ "; echo $results[21];
				echo "<br/>";
			echo"<label>What racial heritage are you?</label><br/>";
				echo "Caucasian "; echo $results[22];
				echo "<br/>";
				echo "African American "; echo $results[23];
				echo "<br/>";
				echo "Hispanic/Latino "; echo $results[24];
				echo "<br/>";
				echo "Native American "; echo $results[25];
				echo "<br/>";
				echo "Other "; echo $results[26];
				echo "<br/>";
			echo"<label>Gender:</label><br/>";
				echo "Male "; echo $results[27];
				echo "<br/>";
				echo "Female "; echo $results[28];
				echo "<br/>";
			?>
			</div>
		</div>
	</div>

	<!-- Footer -->
	<footer class="footer-default">
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-2">
				<ul style="list-style:none;">
					<li><h4 class="foot">What I Am</h4></li>
					<li><a href="http://hunterjmarshall.com/html/portfolio.html">Portfolio</a></li>
					<li><a href="http://hunterjmarshall.com/documents/HunterMarshallResume.pdf">Resume</a></li>
					<li><a href="http://hunterjmarshall.com/html/testimonials.html">Testimonials</a></li>
					<li><a href="http://hunterjmarshall.com/html/contactMe.html">Contact Me</a></li>
				</ul>
			</div>
			<div class="col-sm-2">
				<ul style="list-style:none;">
					<li><h4 class="foot">Who I Am</h4></li>
					<li><a href="http://hunterjmarshall.com/html/hobbies.html">Hobbies</a></li>
					<li><a href="http://hunterjmarshall.com/html/pictures.html">Pictures</a></li>
					<li><a href="http://hunterjmarshall.com/html/blog.html">Blog</a></li>
				</ul>
			</div>
			<div class="col-sm-2">
				<ul style="list-style:none;">
					<li><h4 class="foot">Contact Me</h4></li>
					<li>Rexburg, ID</li>
					<li>618.514.8390</li>
					<li>hjmarshall18@gmail.com</li>
					<li><a href="https://www.linkedin.com/in/hjmarshall18">My LinkedIn</a></li>
					<li><a href="https://github.com/hjcoder18">My Github</a></li>
				</ul>
			</div>
		</div>
		<p style="text-align:center; padding-top:20px;">Copyright &copy; 2016 Hunter Marshall - made by Hunter.</p>
	</footer>
</body>
</html>
