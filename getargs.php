<?php
function name()
{
	$num_arg=func_get_args();
	var_dump($num_arg);
}
name(1,2,3);
?>