<?php
class ArrayValue implements JsonSerializable
{
	public function __construct(array $array)
	{
		$this->array=$array;
	}
	
	public function jsonSerialize()
	{
		return $this->array;
	}
}
	$array=[1,2,3];
	echo json_encode(new ArrayValue($array));
?>
