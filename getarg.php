<?php
function name()
	{
		$num_arg=func_get_arg(1);
		echo"selected arg:".$num_arg;
	}
	name(10,12,13);
?>
