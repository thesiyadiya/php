<?php
	$m1=20;
	$m2=20;
	$m3=30;
	$total=$m1+$m2+$m3;
	if($m1>=20 && $m2>=20 && $m3=20)
	{
		$per=$total/1.5;
		$res="PASS";
		if($per >=80)
		{
			$grade="A";
		}
		elseif($per >=70)
		{
			$grade="B";
		}
		elseif($per >=60)
		{
			$grade="C";
		}
		elseif($per >=50)
		{
			$grade="D";
		}
		else
		{
			$grade="E";
		}
	}
	else
	{
		$per="*****";
		$res="FAIL";
		$grade="*****";
	}
	echo"Total is:".$total."<br>";
	echo"Percentage is:".$per."<br>";
	echo"Result is:".$res."<br>";
	echo"Grade is:".$grade."<br>";			
?>