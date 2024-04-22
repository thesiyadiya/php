<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-3">
	<form action="loginpage.php" method="POST">
		<input type="text" name="txtunm" placeholder="Enter username" class="form-control mt-3" required>
		<input type="password" name="txtpwd" placeholder="Enter password" class="form-control mt-1"required>
		<input type="submit" value="Log-In" class="btn btn-primary w-100">
	<center><a href="registerpage.php"> new User? Click Hera To Register</a></center>
	</form>
</div>
<?php 
	$con=mysqli_connect("localhost","root","","diya");
	if(isset($_POST['txtunm']))
	{
			$unm=$_POST['txtunm'];
			
			$pwd=$_POST['txtpwd'];
			$sql="INSERT INTO `loginpage`( `username`, `password`) VALUES ('$unm','$pwd')";
			$res=mysqli_query($con,$sql);
			
	}
?>
