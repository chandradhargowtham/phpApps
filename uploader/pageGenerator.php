<?php
session_start();
if($_SESSION['loggedIn']!=true)
{
    header("Location: login.php");
}

?>
<?php
function pageGenerator($fileName)
{
	$pageName = explode(".", $fileName);
	$phpString = '<?php include "header.php" ?>'.'<html><video controls preload = "auto" src="'.'videos/'.$fileName.'"'.' ></video></html>';
	$file=fopen("z"."$pageName[0]".".php", "w");
	fwrite($file, "$phpString");
	fclose($file);

	echo 'View : <a href="'.'z'.$pageName[0].'.php"'.'">'.$pageName[0].'<br>'.'</a>';
}

?>