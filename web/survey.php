<?php
	if ($_SERVER['REQUEST_METHOD']== "POST") {
		$valid = true;
		$error = "";

		if (empty($_POST["Political-Party"])) {
			$error .= "<li>You forgot to pick a Political Party</li>"
			$valid = false; // false
		}
		if (empty($_POST["Direction"])) {
			$error .= "li>You forgot to pick whether you think this country is going in the right direction</li>";
			$valid = false; // false
		}
		if (empty($_POST["Candidate"])) {
			$error .= "li>You forgot to pick a candidate</li>";
			$valid = false; // false
		}
		if (empty($_POST["Watch-Debate"])) {
			$error .= "li>You forgot to pick whether you watched the debate.</li>";
			$valid = false; // false
		}
		if (empty($_POST["Changed-Vote"])) {
			$error .= "li>You forgot to pick if the debate changed your vote.</li>";
			$valid = false; // false
		}
		if (empty($_POST["Age"])) {
			$error .= "li>You forgot to pick age group.</li>";
			$valid = false; // false
		}
		if (empty($_POST["Race"])) {
			$error .= "li>You forgot to pick race.</li>";
			$valid = false; // false
		}
		if (empty($_POST["Gender"])) {
			$error .= "li>You forgot to pick gender.</li>"
			$valid = false; // false
		}
		if ($valid) {
			header('Location: https://tranquil-garden-61392.herokuapp.com/surveyResults.php');
			exit(); // for security use exit function after redirect
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Hunter J Marshall</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="stylesheets/homePage.css">
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
					if(!empty($error)) {
						echo("<p>There was an error with your survery submission:</p>\n");
						echo("<ul>" . $error . "</ul>\n");
					}
				?>
				<form method="post" id="survey" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
					What Political Party do you associate yourself with?<br/>
					<input type="radio" name="Political-Party" id="republican" value="Republican"> Republican<br/>
					<input type="radio" name="Political-Party" id="democratic" value="Democratic"> Democratic<br/>
					<input type="radio" name="Political-Party" id="libertarian" value="Libertarian"> Libertarian<br/>
					<input type="radio" name="Political-Party" id="libertarian" value="other"> Other<br/><br/>

					Generally speaking, do you think this country is headed in the right direction or on the wrong track?<br/>
					<input type="radio" name="Direction" id="direction" value="Right Direction"> Right direction<br/>
					<input type="radio" name="Direction" id="direction" value="Wrong Direction"> Wrong direction<br/>
					<input type="radio" name="Direction" id="direction" value="Undecided"> Undecided<br/><br/>

					If the election was held today, who would you vote for?<br/>
					<input type="radio" name="Candidate" id="candidate" value="Donald J Trump"> Donald J Trump (Republican Party)<br/>
					<input type="radio" name="Candidate" id="candidate" value="Hilary Clinton"> Hillary Clinton (Democratic Party)<br/>
					<input type="radio" name="Candidate" id="candidate" value="Evan McMullin"> Evan McMullin (Independent)<br/>
					<input type="radio" name="Candidate" id="candidate" value="Other"> Other<br/>
					<input type="radio" name="Candidate" id="candidate" value="Won't Vote"> Won't Vote<br/><br/>

					Have you watched or planning to watch the Presidential debates?<br/>
					<input type="radio" name="Watch-Debate" id="debate" value="Yes"> Yes<br/>
					<input type="radio" name="Watch-Debate" id="debate" value="No"> No<br/><br/>

					If you watched the debate, did the debate change your mind on who you were voting for?<br/>
					<input type="radio" name="Changed-Vote" id="changeVote" value="Yes"> Yes<br/>
					<input type="radio" name="Changed-Vote" id="changeVote" value="No"> No<br/><br/>

					What age group are you in?<br/>
					<input type="radio" name="Age" id="age" value="18-29"> 18-29<br/>
					<input type="radio" name="Age" id="age" value="30-44"> 30-44<br/>
					<input type="radio" name="Age" id="age" value="45-59"> 45-59<br/>
					<input type="radio" name="Age" id="age" value="60+"> 60+<br/><br/>

					What racial heritage are you?<br/>
					<input type="radio" name="Race" id="race" value="Caucasian"> Caucasian<br/>
					<input type="radio" name="Race" id="race" value="African American"> African American<br/>
					<input type="radio" name="Race" id="race" value="Hispanic/Latino"> Hispanic/Latino<br/>
					<input type="radio" name="Race" id="race" value="Native American"> Native American<br/>
					<input type="radio" name="Race" id="race" value="Other"> Other<br/><br/>

					Gender:<br/>
					<input type="radio" name="Gender" id="gender" value="Male"> Male<br/>
					<input type="radio" name="Gender" id="gender" value="Female">Female<br/>
					<input type="submit" name="formSubmit" value="Submit">
				</form>
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
