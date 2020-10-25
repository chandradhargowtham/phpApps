<?php
// Set Session

session_start();
if($_SESSION["active"]==true && $_SESSION["inProgress"]==false)
{
	$_SESSION["inProgress"]=true;
}
else
{
	header( "refresh:0;url=bye.php" );	
}


echo '<div class="h2">Welcome '.$_SESSION['email'].'<br><hr style="border-color:black;"></div>';
// Counters
$QNo=0;
global $arr;
$arr = Array();
global $questionList;
$questionList = Array();
// Load Questions from file
$file = fopen("db.json", "r");
while(!feof($file))
{
	$line=fgets($file);
	if(strlen($line)>0)
	{
		$QNo++;
		$obj = json_decode($line);
		//echo $obj->question."<br>";
		array_push($arr, $obj);
	}
}



function printQuestions()
{
	
	global $arr;
	global $questionList;
	for ($k=0; $k <sizeof($arr) ; $k++) 
	{ 
		if ($arr[$k]->questionType==$_SESSION["difficulty"]) 
		{
			array_push($questionList, $arr[$k]);
		}
		//echo sizeof($questionList)."xx";
		shuffle($questionList);
	}
	$temp=0;
	for ($i=0; $i < 10 ; $i++) 
	{
		//if ($arr[$i]->questionType == "Difficult") 
		if(true)
		{
		$temp++;
		$optionIndex = array(1,2,3,4);
		shuffle($optionIndex); 
			echo ($temp). ") ". $questionList[$i]->question."<br>";
			for ($j=0; $j <4 ; $j++) 
			{ 
				
				if($optionIndex[0]==1)
					{
						echo '<input type="radio" name="'.$i.'" value="correct">'.$questionList[$i]->answer."<br>";
						array_shift($optionIndex);
					}
				if($optionIndex[0]==2)
					{
						echo '<input type="radio" name="'.$i.'" value="wrong">'.$questionList[$i]->option1."<br>";
						array_shift($optionIndex);
					}
				if($optionIndex[0]==3)
					{
						echo '<input type="radio" name="'.$i.'" value="wrong">'.$questionList[$i]->option2."<br>";
						array_shift($optionIndex);
					}
				if($optionIndex[0]==4)
					{
						echo '<input type="radio" name="'.$i.'" value="wrong">'.$questionList[$i]->option3."<br>";
						array_shift($optionIndex);
					}
			}
		}
		echo '<hr style="border-color:black;">';
	
	}
}
// Evaluate Questions
if (isset($_POST["submit"])) 
{
	
	
	for ($i=0; $i < sizeof($arr) ; $i++) 
	{ 
		
		if($_POST["$i"]=="correct")
		{
			$score++;
		}
	}
	$_SESSION['score']=$score;
	echo "Now ".$score."as";
	if(file_exists("users/".$_SESSION['email'].".json"))
	{
		$file=fopen("users/".$_SESSION['email'].".json", "r");
		$line = fgets($file);
		$obj=json_decode($line);
		$obj->score=$score;
		fclose($file);
		$file2 = fopen("users/".$_SESSION['email'].".json", "w");
		$jsonLine= json_encode($obj);
		fwrite($file2, $jsonLine);
		fclose($file2);
	}else
	{
		echo "file not found";
	}
	mail("ch.chandradhar@reinvision.com,chandradhar93@pm.me","Test Results",$_SESSION['email']."'s result is ".$score."/10.");
	//echo $_SESSION['email']."'s result is ".$score;
	?>
	<script>
		window.location = "bye.php";
	</script>
	<?php

}

// Get Questions
?>
<!DOCTYPE html>
<html>
<head>
	<title>Reinvision Labs</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body class="container bg-success text-success">
	<div id= "time">TIME LEFT : 300</div>
	<hr style="border-color:black;">
	<form method="POST" action="">
		<?php  printQuestions(); ?>
		<input id = "submit" type="submit" name="submit" value="submit">

	</form>
</body>
</html>

<script>
	
var timer = setInterval(printText,1000);
var currentTime = 299;
function printText()
{
	if(currentTime==0)
	{
		var button = document.getElementById('submit').click();
    	
	}
	document.getElementById("time").innerHTML="TIME LEFT : " + currentTime--;
}

</script>
