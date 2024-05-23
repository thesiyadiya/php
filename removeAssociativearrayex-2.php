<?php
	$cars=array("brand"=>"ford","model"=>"mustang","year"=>1964);
	$newarray=array_diff($cars,["mustang",1964]);
	var_dump($newarray);
?>