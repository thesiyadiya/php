<?php
	$age=array("peter"=>"35","ben"=>"37","joe"=>"43");
	asort($age);
	foreach($age as $x=>$x_value)
	{
		echo"key=".$x.",value=".$x_value;
		echo"<br>";
	}
?>