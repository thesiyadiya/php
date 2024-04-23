<?php
	$con=mysqli_connect("localhost","root","","diya");
	$sql="insert into `test`(`s_name`,`result`)values('NAME','PASS')";
	$res=mysqli_query($con,$sql);
	$num=mysqli_insert_id($con);
	echo $num;
?>