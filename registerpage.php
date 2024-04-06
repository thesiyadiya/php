<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-1">
	<form action="registerpage.php" method="POST">
		<input type="text" name="txtfnm" placeholder="Enter fullname" class="form-control mt-1" required></br>
		<input type="text" name="mb" placeholder="Enter Mobilenumber" class="form-control mt-1" required></br>
		<input type="text" name="txtunm" placeholder="Enter Username" class="form-control mt-1" required></br>
		<input type="password" name="txtpwd" placeholder="Enter password" class="form-control mt-1" reqruired></br>
		<input type="submit" value="Log In" class="btn btn-primary w-100">
	</form>
</div>
<?php
	$con=mysqli_connect("localhost","root","","diya");
	if(isset($_POST['txtfnm']))
	{
		$fnm=$_POST['txtfnm'];
		$unm=$_POST['txtunm'];
		$pwd=$_POST['txtpwd'];
		$mb=$_POST['mb'];
		$sql="INSERT INTO `registerpage`( `Full name`, `Mobile number`, `User name`, `Password`) VALUES ('[$fnm]','[$unm]','[$pwd]','[$mb]')";
		$res=mysqli_query($con,$sql);
		
	}
?>
<?php
$servername="localhost";
$username="root";
$password="";
$database="diya";
$conn=mysqli_connect($servername,$username,$password,$database );
if(!$conn){
	die("sorry we failed to connect: ".mysqli_connect_error());
}
else{
	echo "connection was succesfull<br>";
}

$sql="SELECT * FROM `registerpage` ";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
echo $num;
if($num>0){
	while($row=mysqli_fetch_assoc($result)){
		echo var_dump($row);
		echo "<br>";
	}
}
?>