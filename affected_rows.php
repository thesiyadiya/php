<?php
	$con=mysqli_connect("localhost","root","","diya");
	$sql="insert into `test`(`s_name`,`reslut`)values('nm','ATKT')";
	$res=mysqli_query($con,$sql);
	$count=mysqli_affected_rows($con);
	if($count==1)
	{
		echo "inserted";
	}
?>