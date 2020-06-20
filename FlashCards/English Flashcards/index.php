<?php
session_start();
?>
<?php include "header.php" ?>
<?php 
	$totalLines=0;
	$file=fopen("db.txt", "r");
	while (($line = fgets($file))!=false) 
	{
		$totalLines++;
	}
	fclose($file);
	$file=fopen("db.txt", "r");
	$randNum= mt_rand(1,$totalLines);
	
	while (($line = fgets($file))!=false) 
	{
		$currentLine++;
		if($currentLine==$randNum)
		{
			$onlyWord = explode("-", $line);
			break;
			//echo '<br><div class="card">'.$onlyWord[0]."</div>";
			//echo '<br><div class="answer">'.$onlyWord[1]."</div>";
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>English Flashcards</title>
</head>
<body>
	<div class=box>
<br><div class="card">
	<?php echo $onlyWord[0]; ?>
</div>
<br><div class="answer">
	<?php echo $onlyWord[1]; ?>
</div>
<h6>Word <?php echo $currentLine; ?> of <?php echo $totalLines; ?>.</h6>
<p><b>Hover over the black strip to see the meaning.</b></p>

</div>
</body>
</html>

<style type="text/css">
	.card
	{
		
		padding: 10px;
		margin-left: 10%;
		margin-right: 10%;
		width: 80%;
	}
	.answer
	{
		background-color: #1b1e2c;
		color:#1b1e2c;
		padding: 10px;
		margin-left: 10%;
		margin-right: 10%;
		width: 80%;
	}
	.answer:hover
	{
		background-color: white;
		color:red;
		padding: 10px;
		margin-left: 10%;
		margin-right: 10%;
		width: 80%;
	}
	.box
	{
		width: 80%;
		margin: 5%;
		border: 1px dotted black;
	}
	h6
	{
		
		margin-left: 10%;
	
	}
	p
	{
		width: 80%;
		margin-left: 10%;
		margin-top: 3%;
		animation-name: anim1; 
		animation-duration: 4s;
		animation-iteration-count: infinite; 
	}

	@keyframes anim1 {
  0%   {color: red;}
  25%  {color: black;}
  50%  {color: blue;}
  100% {color: green;}
}
	
		
	}
</style>