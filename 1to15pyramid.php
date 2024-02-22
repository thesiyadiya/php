<?php
$rows=5;
$n=1;
$k=1;

for($i=1;$i<=$rows;$i++)
{
	for($K=$rows;$k>$i;$k--)
	{
		echo "&nbsp";
	}
	for($j=1;$j<=$i;$j++)
	{
		echo $n,"&nbsp";
		$n++;
	}
	echo"<br>";
}
?>