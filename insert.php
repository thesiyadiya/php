<form action="insert.php" method="POST">
<input type="text" name="txtnm" placeholder="Enter name">
<input type="text" name="txtpw" placeholder="Enter password">
<input type="submit" value="submit" >
</form>
<?php
$conn=mysqli_connect("localhost","root","","diya");
if($conn->connect_error){
	die("sorry we failed to conncet:".$conn->connect_error);
}
else
{
	echo"connection  was succesfull<br>";
}
if(isset($_POST['txtnm']))
{
	$nm=$_POST['txtnm'];
	$pw=$_POST['txtpw'];
	$sql="INSERT INTO `insert`( `name`, `password`) VALUES ('$nm','$pw')";
	$res=mysqli_query($conn,$sql);
}
?>