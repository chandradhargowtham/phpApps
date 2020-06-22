<?php
session_start();
if($_SESSION['loggedIn']!=true)
{
    header("Location: login.php");
}

?>
<?php include "header.php" ?>
<?php include "pageGenerator.php"?>
<?php

$list = scandir("videos/");
for($i=2;$i<count($list);$i++)
{
echo 'Download : <a href="videos/'.$list[$i].'">'.$list[$i]."<br>".'</a>';
pageGenerator($list[$i]);

}
?>