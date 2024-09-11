<?php
$conn=mysqli_connect("localhost","root","","diya");
	$sql="SELECT  `name`, `password` FROM `insert` ";
	$res=mysqli_query($conn,$sql);
	$num=mysqli_num_rows($res);
	echo $num."<br>";
	if($num>0)
	{
		while($row=mysqli_fetch_assoc($res))
		{
			echo var_dump($row)."<br>";
		}
	}
?>
