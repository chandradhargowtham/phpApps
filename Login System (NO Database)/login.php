<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

	<form action="" method="POST">
		<input type="text" name="user">
		<input type="password" name="password">
		<input type="submit" value= "Login">
	</form>
	<form action="logout.php" method="POST">
		
		<input type="submit" value= "Log out">
	</form>

</body>
</html>
<?php
$userName=$_POST['user'];
$password=$_POST['password'];
if ($password=="pwd" && $userName="chan") {
	$_SESSION['loggedIn']=true;
}
?>