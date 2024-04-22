<?php
	$con=mysqli_connect("localhost","root","","hjex");
	$sql="Select * from `login`";
	$res=mysqli_query($con,$sql);
	while($row=mysqli_fetch_assoc($res))
	{
		echo $row['email'];
	}
?>