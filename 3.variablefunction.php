<?php
	function sumMyNumber(...$x)
	{
		$n=0;
		$len=count($x);
		for($i=0;$i<$len;$i++)
		{
			$n += $x[$i];
		}
		return $n;
	}
	$a=sumMyNumber(5,2,6,7,7);
	echo $a;
?>