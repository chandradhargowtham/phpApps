
<?php
include "databaseConnectConfig.php";

if(isset($_GET['Name']))
{
	
	$bookmarkName=$_GET['Name'];
	$bookmarkLink=$_GET['Link'];
	if(isset($_GET['bookmarktypeRadio']))
	{$bookmarkType=$_GET['bookmarktypeRadio'];}
	else
	{
		$bookmarkType="Default";
	}
}
if(isset($bookmarkLink))
{
	
	$sqlquery = "INSERT INTO db1.bookmarks VALUES ('$bookmarkName','$bookmarkLink',' $bookmarkType','test')";
	$res= mysqli_query($link,$sqlquery);
	/*while($row = mysqli_fetch_array($res)) {
	    
	    echo print_r($row);       // Print the entire row data
	}*/
	
	mysqli_close($link);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Bookmark</title>
	<h1></h1>
</head>
<body>
	<div class = "bookmarkClass">
	<form action="createBookmark.php" method = "GET">
		<p>Bookmark Name</p><input type="text" name="Name">
		<p>Bookmark Link</p><input type="text" name="Link">
		 <p><input type="radio" name="bookmarktypeRadio" value="cSharp">C#</input>
		 <input type="radio" name="bookmarktypeRadio" value="Unity">Unity</input>
		 <input type="radio" name="bookmarktypeRadio" value="php">php</input>
		 <input type="radio" name="bookmarktypeRadio" value="Java">Java</input></p>
		<input type="submit" value="Create Bookmark">
	</form>
	</div>
</body>
</html>