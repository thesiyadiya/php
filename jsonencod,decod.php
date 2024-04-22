<?php
	$marks=array("Diya"=>33,"Drshti"=>31,"Rency"=>5);
	$encodedarray=json_encode($marks);
	echo $encodedarray;
	var_dump(json_decode($encodedarray))  ,                    ;
?>