<?php
	$cars=array("volvo","bmw","toyota");
	unset($cars[0],$cars[1]);
	var_dump($cars);
?>