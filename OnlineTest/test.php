<?php
if(true)
	{
		$file=fopen("users/c@c.com.json", "r");
		echo "found file <br>";
		$line = fgets($file);
		echo "Line is ".$line."<br>";
		$obj=json_decode($line);
		echo "obj is ".$obj->email."<br>";
		$d =strtotime("now");
		$timeStamp= date("Y-m-d H:i", $d);
		echo "Old : ".$obj->timeStamp;
		echo "<br>";
		echo "Now : ".$timeStamp;
		echo "<hr>";
		$x= strtotime($timeStamp)-strtotime($obj->timeStamp);
		echo $x;
		echo "<br>Difference is : ".$x/60;
	}

?>