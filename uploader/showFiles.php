<?php
session_start();
if($_SESSION['loggedIn']!=true)
{
    header("Location: login.php");
}

?>
<?php include "header.php" ?>
<?php

$list = scandir("uploads/");
for($i=2;$i<count($list);$i++)
{
echo '<a href="uploads/'.$list[$i].'">'.$list[$i]."<br>".'</a>';
}

$docsList = scandir("docs/");
for($i=2;$i<count($list);$i++)
{
echo '<a href="docs/'.$docsList[$i].'">'.$docsList[$i]."<br>".'</a>';
}
?>