<?php
	$con=mysqli_connect("localhost","root","","diya");
	$sql="select *from `test`";
	$res=mysqli_query($con,$sql);
	while($obj=mysqli_fetch_object($res))
	{
		printf("%s", $obj->result);
	}
?>