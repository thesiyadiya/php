<?php
	$con=mysqli_connect("localhost","root","","diya");
	$sql="select * from `test`";
	$res=mysqli_query($con,$sql);
	while($fieldinfo=mysqli_fetch_field($res))
	{
		$currentfield=mysqli_field_tell($res);
		printf("result".$fieldinfo->result);
	}
?>