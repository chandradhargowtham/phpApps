<!DOCTYPE html>
<html>
<head>
	<title>Search</title>

</head>
<body>
	<h3 style="margin-left: 10%; color:green;">Search:</h3>
	<form action="" method="POST">
		<input type="text" name="search">
		<input type="submit" name="submit" value="Search">
	</form>
	<br>
</body>
</html>
<?php
if (isset($_POST['submit']))
{
	$searchQuery=$_POST['search'];

	if (strlen($searchQuery)>1) 
	{
	

	$file=fopen("bookmarks/bookmarksList.txt", "r");
		while(($line = fgets($file)) !== false)
		{
		
			if(preg_match("/{$searchQuery}/i", $line))
			{			
				$array = explode("$*$", $line);
				
			$bName = $array[0];
			$bLink = $array[1];
			$bCat = $array[2];

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
}
?>
