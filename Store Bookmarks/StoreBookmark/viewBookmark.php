<?php
include "databaseConnectConfig.php";


$sqlquery = "SELECT * FROM bookmarks;";
	$res= mysqli_query($link,$sqlquery);
	while($row = mysqli_fetch_array($res)) {
	    
	    echo print_r($row); 
	    echo "<br>";      // Print the entire row data
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>View Bookmarks</title>
</head>
<body>

</body>
</html>