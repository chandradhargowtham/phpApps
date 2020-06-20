<?php
session_start();



$userName=$_POST['userId'];
$password=$_POST['pwd'];
if (isset($_POST['submit'])) 
{
		if($userName=="chan" && $password="pwd")
		{
			$_SESSION['loggedIn']=true;
			header("Location: newWord.php");
			echo "Login Successful.";
		}else
		{
			//echo "failed";
			echo '<h2>Invalid Login</h2>';
			session_destroy();
		}
}
?>
<?php include "header.php" ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
<form method="POST" class="loginbox" >
	<br>
	<h2>Login</h2>
	<p>Enter Email: <input type="text" name="userId"></p>
	<p>Enter Password :  <input type="password" name="pwd"></p>
	<input type="submit" name="submit" value="Login">
	
</form>
</body>
</html>

<style type="text/css">
	.loginbox
	{
		border: 2px dotted black;
		display: inline-block;
		margin: 10px;
	}
	form
	{
		padding: 10px;
		margin-left: 10%;
		margin-right: 10%;
		width: 90%;
	}
	h2
	{
		background-color: black;
		padding: 20px;
		color: white;
	}
</style>