<?php

if(isset($_POST["submit"]))
{
	$q = $_POST["question"];
	$a = $_POST["answer"];
	$option1 = $_POST["option1"];
	$option2 = $_POST["option2"];
	$option3 = $_POST["option3"];
	$questionType=$_POST["questionType"];

	// A new object of question type is created - which will be written to the file and stored.
	if($_POST["passcode"]=="q1w2e3r4@")
	{
		$obj=new question($q,$a,$option1,$option2,$option3,$questionType);
		
		// The object will be converted to JSON format for easier retrieval.
		$jsonLine=json_encode($obj);

		// The db file is opened in append mode and the jsonObject is written to it.
		$file = fopen("db.json", "a");
		fwrite($file, $jsonLine);
		fwrite($file, "\n");
		fclose($file);
	}else
	{
		echo "Wrong Passcode";
	}

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Add a Question</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body class="bg-warning container">
	<form method="POST" action=""><br><br>
		<p>Question</p>
		<input type="text" name="question">
		<p>Correct Answer</p>
		<input type="text" name="answer">
		<p>Option 1</p>
		<input type="text" name="option1">
		<p>Option 2</p>
		<input type="text" name="option2">
		<p>Option 3</p>
		<input type="text" name="option3">
		<p>Question Difficulty : </p>
		<select name="questionType">
			<option>Beginner</option>
			<option>Medium</option>
			<option>Difficult</option>
		</select><br><br>
		<p>passcode</p>
		<input type="text" name="passcode">

		<br><br>
		<input type="submit" name="submit" value="Add Question to the database">
	</form>
</body>
</html>


<?php
// This is the question Object.
class question
{
	public $question;
	public $answer;
	public $option1;
	public $option2;
	public $option3;
	public $questionType;

	public function __construct($q,$a,$o1,$o2,$o3,$type)
	{
		$this->question = $q;
		$this->answer = $a;
		$this->option1=$o1;
		$this->option2=$o2;
		$this->option3=$o3;
		$this->questionType=$type;
	}
}

?>