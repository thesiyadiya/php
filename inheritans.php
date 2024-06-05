<?php
	class Demo
	{
		public $a;
		function print1($a)
		{
			$this->a=$a;
		}
	}
	class Test extends Demo
	{
		function demo()
		{
			echo $this->a;
		}
	}
	$obj=new Test();
	$obj->print1(20);
	$obj->demo();
?>