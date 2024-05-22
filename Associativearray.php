<?php
//one way to create an associative array
	$name_one=array("sem1"=>"15000","sem3"=>"14000","sem3"=>"15500","sem4"=>"15000","sem5"=>"16000");
//second way to create an ssociative array
	$name_two["sem1"]="15000";
	$name_two["sem2"]="14000";
	$name_two["sem3"]="15500";
	$name_two["sem4"]="15500";
	$name_two["sem5"]="16000";
	//Accesing the elements directly
	echo"accessing the elements directly:</br>";
	echo $name_two["sem1"],"</br>";
	echo $name_two["sem2"],"</br>";
	echo $name_two["sem3"],"</br>";
	echo $name_two["sem5"],"</br>";
	echo $name_two["sem4"],"</br>";
?>
	