<?php
	function name()
	{
		$num_arg=func_num_args();
		echo"number of args:",$num_arg;
	}
	name(11,12,13);
?>
