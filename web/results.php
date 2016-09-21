<?php
	// the file that will store the data
	$fileName = "data/results.txt";

	//Check to see if we get here from POST
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$formPost = TRUE;

		// Set Session Variables
		$_SESSION["takenSurvey"] = "True";
	}

	/*********************************************
	 * READ FORM
	 * This section will get data from from the file.
	 * It will simply read it, and won't be able to edit
	 * the file at all. Once the file is read, it will
	 * close the file.
	 *********************************************/
	$surveyFile = fopen($fileName, "r");

	if (isset($surveyFile)){
		// Read the data from the file
		$dataBuffer = fread($surveyFile, filesize(filename));
	}else {
		// File is empty
		die("Unable to read file.");
	}

	// I wasn't born in a barn
	fclose($surveyFile)


	/************************************************
	 * CLEAN FORM
	 * Once we are able to get something form the file,
	 * clean up the information.
	 *
	 ************************************************/
	// Let's check just in case
	if (isset($dataBuffer)) {
		// clean whitespace
		$dataBuffer=trim($dataBuffer);
	}else {
		// File is empty
		die("Unable to read file.");
	}


	/***************************************************
	 * INSERT INTO FORM
	 * If the form was submitted, then we need to record 
	 * the results by inputting them into the text file
	 * that is storing our data (surveyFile.txt)
	 ***************************************************/
	if ($formPost) {
		$surveyQuestions = getAnswers();

		addResults($dataBuffer, $surveyQuestions[0]);
		addResults($dataBuffer, $surveyQuestions[1]);
		addResults($dataBuffer, $surveyQuestions[2]);
		addResults($dataBuffer, $surveyQuestions[3]);
		addResults($dataBuffer, $surveyQuestions[4]);
		addResults($dataBuffer, $surveyQuestions[5]);
		addResults($dataBuffer, $surveyQuestions[6]);
		addResults($dataBuffer, $surveyQuestions[7]);

		// Open the file to write to it
		$surveyFile = fopen($fileName, "w");

		if (empty($surveyFile)) {
			die("Unable to open file.")
		}

		// Write the file back out
		fwrite($surveyFile, $dataBuffer);

		// I wasn't born in a barn
		fclose();

	}

	// Display the results
	displayResults($dataBuffer);

	/**************************************************
	 * FUNCTION GET ANSWERS
	 * This function gets all the answers from the form 
	 * and puts them into a variable array. We will then
	 * use that array to add results to the file storing 
	 * our data (this will be done in the addResults
	 * function). 
	 **************************************************/
	function getAnswers() {
		// Declare array and ensure it is empty
		$questions = array(NULL, NULL, NULL);

		$questions[0] = $_POST["Political-Party"];
		$questions[1] = $_POST["Direction"];
		$questions[2] = $_POST["Candidate"];
		$questions[3] = $_POST["Watch-Debate"];
		$questions[4] = $_POST["Changed-Vote"];
		$questions[5] = $_POST["Age"];
		$questions[6] = $_POST["Race"];
		$questions[7] = $_Post["Gender"];

		// Make like a leaf
		return $questions;
	}

	/**************************************************
	 * FUNCTION ADD RESULTS
	 * This function will add results from the form to
	 * text file storing our data. 
	 **************************************************/
	// add results
	function addResults(&$buffer, $surveyQuestions) {

		// Make sure that the answer has a value
		if ($surveyQuestions) {
			// find the first and last occurrence 
			$firstPos = strpos($buffer, $surveyQuestions);
			$lastPos = strpos($buffer, ",", $firstPos);

			// Get the length
			$lenght = $lastPos - $firstPos;

			$questionInfo = substr($buffer, $firstPos, $length);
			$questionParts = explode(":", .$questionInfo);
			$questionParts[1]++;
			$questionNew = $questionParts[0] .":" .$questionParts[1];
			$buffer = str_replace($questionInfo, $questionNew, $buffer);
		}
	}

	// displayResults
	function displayResults($dataBuffer) {
		$order = array("#", ";", "~", "@", ":");
		$replace = array('<p/><p>','<br>','</h4>',"<h4>","= ");

		$newstr = str_replace($order, $replace, $dataBuffer);

		echo $newstr;
	}
?>