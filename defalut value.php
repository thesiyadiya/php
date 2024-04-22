<?php
	function myfunction(...$n)
	{
		$num=0;
		$len=count($n);
		for($i=0;$i<$len;$i++)
		{
			$num += $n[$i];
		}
		return $num;
	}
	echo myfunction(1,2,3,4,5,6,7,8,9);
?>
