<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-1">
	<form action="registerpage2.php" method="POST">
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
		$sql="INSERT INTO `registerpage2`( `fullname`, `moblienumber`, `username`, `password`) VALUES ('$fnm','$mb','$unm','$pwd')";
		$res=mysqli_query($con,$sql);
	}
?>
