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
			echo '<br><div class="card">'.$line."</div>";
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>English Flashcards</title>
</head>
<body>

</body>
</html>

<style type="text/css">
	.card
	{
		width:60%;
		display: inline;
		border: 5px solid red;
		margin: 20% ;
		
	}
</style>