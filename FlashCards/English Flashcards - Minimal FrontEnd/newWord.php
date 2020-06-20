<?php
session_start();
if($_SESSION['loggedIn']!=true)
{
    header("Location: login.php");
}

?>
<?php include "header.php" ?>

<!DOCTYPE html>
<html>
<head>
	<title>Insert New Word</title>
</head>
<body>
<form action="" method="POST">
	<p>Word : <input type="text" name="word"></p>
	<p>Meaning: <input type="text" name="meaning"></p>
	<input type="submit" name="submit" value= "Add Word">
</form>
</body>
</html>
<style type="text/css">
	form
	{
		width:50%;
		margin: 10%;
		border:2px dotted black;
		display: inline-block;
		padding:2%;
	}
</style>
<?php
if(isset($_POST['submit']))
{
	$name=$_POST['word'];
	$meaning=$_POST['meaning'];
	$finalValue=$name."-".$meaning.PHP_EOL;
	$file=fopen("db.txt", "a");
	fwrite($file, $finalValue);
	fclose($file);
	echo "New Word Added";

}


?>