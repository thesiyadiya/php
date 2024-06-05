<?php
	$con=new mysqli("localhost","root","","diya");
	if($con->connect_error)
	{
		echo"ERROR";
	}
	else
	{
		$ins="select *from user";
		$res=$con->query($ins);
		while($row=$res->fetch_assoc())
		{
			echo"NAME:".$row['username']."<br>";
			echo"EMAIL:".$row['email']."<br>";
			echo"PASSWORD:".$row['password']."<br>";
			echo"<hr>";
		}
	}
?>