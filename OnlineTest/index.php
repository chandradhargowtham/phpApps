<!DOCTYPE html>
<html>

<body>
	<!-- Nav bar Code -->
	<nav class="navbar navbar-inverse ">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Reinvision Test Portal</a>
    </div>
    <ul class="nav navbar-nav ">
      <li class="active"><a href="index.php">Assessment</a></li>
      <li><a href="admin.php">Admin</a></li>
    </ul>
  </div>
</nav>
</body>
</html>
<?php
// Set Session

session_start();

if(isset($_POST["submit"]))
{
	if(file_exists("users/".$_POST["email"].".json"))
	{
		$file=fopen("users/".$_POST["email"].".json", "r");
		$line = fgets($file);
		$obj=json_decode($line);
		$d =strtotime("now");
		$timeStamp= date("Y-m-d H:i:s", $d);
		$x= strtotime($timeStamp)-strtotime($obj->timeStamp);
		if($x/60<1440)
		{
			$_SESSION['email']=$_POST["email"];
			$_SESSION["active"]=true;
			$_SESSION["difficulty"]=$obj->difficulty;

			if($obj->score=="-1")
			{
				header('Location: questions.php');	
			}else
			{
				echo "<div class='alert alert-danger'>Test already Taken</div>";
			}
			
		}else
		{
			echo "<div class='alert alert-danger'>Test Expired. Test only lasts for 24 hours.</div>";
		}
	}else
	{
		echo "<div class='alert alert-danger'>You are not assigned this test.</div>";
	}
	
	
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Reinvision Labs</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	
</head>


<body class="bg-info">
	<form method="POST" class="container bg-info"><br>
		<h3>Enter Your Email : </h3>
		<input type="text" name="email">
		<input type="submit" name="submit" value="Begin the Test"><br><br>
	</form>
	<div class="container">
		<h3>Instructions :</h3>
		<p>1. Enter the email Id to which you have received this link.</p>
		<p>2. After the test starts, do not press back,forward or the refresh button.</p>
		<p>3. This is a Timed Test - 5 minutes/300 seconds.</p>
		<p>4. The test will be auto submitted and your score will be evaluated if the timer runs out.</p>
		<p>5. All questions will have only <b>ONE</b> answer.</p>
		<p>6. This link is only valid for 24 hours from the time you have received the email.</p>
		<p>7.<b> Pressing back,forward or the refresh button forfeits/cancels the Test.</b></p>
		<p>8. If there are more than one correct answers, choose the <b>closest correct</b> option.</p>
	</div>
</body>
</html>
