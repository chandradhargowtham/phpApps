<?php
session_start();
?>
<?php include "header/header.php" ?>
<!DOCTYPE html>
<html>
<head>
	<title>Bookmarker</title>
</head>
<body>
	<h3 style="margin-left: 10%; color:green;">Create:</h3>
<form action="" method="GET">
	<p>Bookmark Name : <input type="text" name="bName"></p>
	<p>Bookmark Link  : <input type="text" name="bLink"></p>
	<p>Category : <select name="bCategory">
    <option>Misc</option>
    <option>Music</option>
    <option>Movies</option>
    <option>GeneralTech</option>
    <option>Programming</option>
    <option>Web</option>
    <option>Science</option>
    <option>Medicine</option>
    <option>Entertainment</option>
    <option>Utilities</option>
  </select></p><br>
	<p><input type="submit" name="submit" value="Create Bookmark"></p>

</form>
</body>
</html>

<?php 
if(isset($_GET['submit']))
{
	$bName=$_GET['bName'];
	$bLink=$_GET['bLink'];
	$bCategory=$_GET['bCategory'];
	$content = PHP_EOL.$bName."$*$".$bLink."$*$".$bCategory."$*$";
	$file=fopen("bookmarks/bookmarksList.txt", "a");
	fwrite($file, $content);
	fclose($file);
	echo "Created Bookmark";
}

?>
<hr>
<?php include "bookmarks/searchBookmarks.php" ?>
<hr>
<?php include "bookmarks/displayBookmarks.php" ?>
<hr>
<?php include "footer/footer.html" ?>
