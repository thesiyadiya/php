<?php
	$con=mysqli_connect("localhost","root","","hjex");
	$sql="inserte from `login` where `result`='PASS'";
	$res=mysqli_query($con,$sql);
	echo mysqli_affected_rows($con);
	mysqli_close($con);
?>