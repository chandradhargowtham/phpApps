<?php
session_start();
if (isset($_SESSION['loggedIn'])) {
	echo "Logged out successfully";
	session_destroy();

}
?>