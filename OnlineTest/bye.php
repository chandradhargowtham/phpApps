<?php
session_start();
$_SESSION["active"]=false;
echo "<div class='container'><br><br>Thanks for taking the test. Results are submitted.</div>";
if ($_SESSION['score']=="-1") 
{
	$file=fopen("errors/error_".$_SESSION["email"].txt, "w");
	fwrite($file, "Refresh or other Invalid Action");
	fclose($file);

}
session_unset();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Thank You</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body class="bg-success">

</body>
</html>