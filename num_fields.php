<?php
	$con=mysqli_connect("localhost","root","","diya");
	$sql="select * from `test`";
	$res=mysqli_query($con,$sql);
	$num=mysqli_num_fields($res);
	echo $num;
	
	mysqli_data_seek($res,0);
	$row=mysqli_fetch_row($res);
	echo $row[0];
	print_r($row);
?>