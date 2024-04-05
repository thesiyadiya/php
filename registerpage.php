<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-1">
	<form action="registerpage.php" method="POST">
		<input type="text" name="txtfnm" placeholder="Enter fullname" class="form-contron mt-1" required></br>
		<input type="text" name="mb" placeholder="Enter Mobilenumber" class="form-contron mt-1" required></br>
		<input type="text" name="txtunm" placeholder="Enter Username" class="form-contron mt-1" required></br>
		<input type="password" name="txtpwd" placeholder="Enter password" class="form-control mt-1" reqruired></br>
		<input type="submit" value="Log In" class="btn btn-primary w-100">
	</form>
</div>
<?php
	$con=mysqli_connect("localhost","root","","diya");
	if(isset($_post(['txtfnm']))
	{
		$fnm=$_POST['txtfnm'];
		$unm=$_POST['txtunm'];
		$pwd=$_POST['txtpwd'];
		$mb=$_POST['txmb'];
		$sql="INSERT INTO `registerpage`(`id`, `Full name`, `Mobile number`, `User name`, `Password`) VALUES ('','[txtfnm]','[txtmb]','[textunm]','[txtpwd]')";
		$res=mysqli_query($con,$sql);
		
	}
?>