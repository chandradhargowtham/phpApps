<?php
session_start();

if($_SESSION['loggedIn']==true) 
{
	echo "Login Successfull";
}else
{
	echo "NO Session exists";
}

?>