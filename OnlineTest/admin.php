<?php
if (isset($_POST["submit"]))
{
	if($_POST["passcode"]=="q1w2e3r4@")
	{
		$email= $_POST["email"];
		$difficulty = $_POST["questionType"];
		$d =strtotime("now");
		$timeStamp= date("Y-m-d H:i:s", $d);

		$obj = new user($email,$difficulty,$timeStamp);
		$jsonLine=json_encode($obj);
		$file=fopen("users/".$email.".json", "w");
		fwrite($file, $jsonLine);
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
	<title>Admin</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body class="bg-warning">
	<!-- Nav bar Code -->
	<nav class="navbar navbar-inverse ">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Reinvision Test Portal</a>
    </div>
    <ul class="nav navbar-nav ">
      <li><a href="index.php">Assessment</a></li>
      <li class="active"><a href="admin.php">Admin</a></li>
    </ul>
  </div>
</nav>
	<form action="" method="POST" class="container"><br><br>
		<p>Enter Email :</p>
		<input type="text" name="email">
		<br><br><p>Select Difficulty : </p>
		<select name="questionType">
			<option>Beginner</option>
			<option>Medium</option>
			<option>Difficult</option>
		</select><br><br>
		<p>Enter Passcode: </p>
		<input type="text" name="passcode">
		<input type="submit" name="submit">
	</form>
</body>
</html>
<?php
class user
{
	public $email;
	public $difficulty;
	public $timeStamp;
	public $score;

	public function __construct($email,$difficulty,$timeStamp)
	{
		$this->email=$email;
		$this->difficulty=$difficulty;
		$this->timeStamp=$timeStamp;
		$this->score= "-1";
	}
}

?>