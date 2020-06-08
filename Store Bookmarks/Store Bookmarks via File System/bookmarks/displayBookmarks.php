<?php


?>

<!DOCTYPE html>
<html>
<head>
	<title>Display Bookmarks</title>
</head>
<body>
	<h3 style="margin-left: 10%; color:green;">Show:</h3>
<form action="" method="POST">
	<p>Category : <select name="bCategory">
    <option>All</option>
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
	<p><input type="submit" name="submit" value="Show Bookmarks"></p>
</form>
</body>
</html>
<?php
if (isset($_POST['submit'])) 
{
	$bCategory=$_POST['bCategory'];
	$file=fopen("bookmarks/bookmarksList.txt", "r");
	while(($line = fgets($file)) !== false)
	{
		
		$array = explode("$*$", $line);
		//echo count($array);
		
		$bName = $array[0];
		$bLink = $array[1];
		$bCat = $array[2];
		
		
		if($bCategory=="All")
		{
			$flag=true;

		}else
		{
			$flag=false;
		}
		if($bCat==$bCategory || $flag)
		{
		echo "<table style>";
		echo "<tr>";
		echo "<th>";
		echo $bName;
		echo "</th>";
		echo "<td>";
		echo '<a href="'.$bLink.'">'.$bLink.'</a>';
		echo "</td>";
		echo "<td>";
		echo $bCat;
		echo "</td>";
		echo "</tr>";
		echo "</table>";
		}
	}
}
?>
<style type="text/css">
	table{
    width: 80%;
    border-collapse:collapse;
    margin-left: 10%;
	margin-right: 10%;
}

td{
    width: 50%;
    text-align: left;
    border: 1px solid black;
}
th
{
    width: 30%;
    text-align: left;
    border: 1px solid black;
}
form
{
	width: 80%;
	margin-left: 10%;
	margin-right: 10%;
	margin-top: 2%;
}
</style>