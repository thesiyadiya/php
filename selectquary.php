<?php
	$con=mysqli_connect("localhost","root","","hjex");
	$sql="Select * from `login`";
	$res=mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($res))
	{
		echo $row[1]."<br>";
	}
	mysqli_select_db($con,"hjex2");
	$query="select * from `login`";
	$res1=mysqli_query($con,$query);
	while($row1=mysqli_fetch_array($res1))
	{
		echo $row1[2]."<br>";
	}
?>