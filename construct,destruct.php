<?php
class Demo
{
	private $a;
	function print1()
	{
		echo $this->a."<br>";
	}
	function __construct($xyz=50)
	{
		echo "THIS IS DEMO<br>";
		$this->a=$xyz;
	}
	function __destruct()
	{
		echo"THIS IS END";
	}
}
$o=new Demo();
$o->print1();
?>