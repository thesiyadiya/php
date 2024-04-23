<?php
	$con=mysqli_connect("localhost","root","","diya");
	$sql="select * from `test`";
	$res=mysqli_query($con,$sql);
	while($obj=mysqli_fetch_row($res))
	{
		printf("%s",$obj[0]);
	}
?>