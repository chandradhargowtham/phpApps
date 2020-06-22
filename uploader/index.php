<?php
session_start();
?>
<?php include "header.php" ?>
<!DOCTYPE html>
<html>
<head>
	<title>File Uploader</title>
</head>
<body>
	<form action="" method="POST" enctype="multipart/form-data">
		<input type="file" name="uploadFile">
		<select name="type">
			<option>Videos</option>
			<option>Files</option>
			<option>Docs</option>
		</select>
		<input type="submit" name="submit" value="Upload">
	</form>

</body>
</html>
<?php

if (isset($_POST['submit']))
{
	$file=$_FILES['uploadFile']['name'];
	$date=date("d-m-Y");
	$uploadType=$_POST['type'];
	if ($uploadType=="Videos")
	{
		$type="videos/";
	}else if ($uploadType=="Docs")
	{
		$type="docs/";
	}else
	{
		$type="uploads/";
	}
	if(move_uploaded_file($_FILES['uploadFile']['tmp_name'],$type.$date.$file))
	{
		echo "success<br>";
	}
	else
	{
		echo "failed<br>";
	}
}

?>