<?php
session_start();




if (isset($_POST['submit'])) 
{
	$userName=$_POST['userId'];
	$UserPassword=$_POST['pwde'];
		if($UserPassword=="pwd" && $userName=="chan")
		{
			
			$_SESSION['loggedIn']=true;
			header("Location: showFiles.php");
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
	<p>Enter Password :  <input type="password" name="pwde"></p>
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