<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-1">
	<form action="database conectivity.php" method="POST">
		<input type="text" name="txtunm" placeholder="Enter username" class="form-control mt-1" required>
		<input type="password" name="txtpwd" placeholder="Enter password" class="form-control mt-1" required>
		<input type="submit" value="Log-In" class="btn btn-primary w-100">
	</form>
</div>
<?php 
	$con=mysqli_connect("localhost","root","","facebook");
	if(isset($_POST['txtunm']))
	{
			$unm=$_POST['txtunm'];
			$pwd=$_POST['txtpwd'];
			$sql="select * from `login` where `username`='$unm' and `password`='$pwd'";
			$res=mysqli_query($con,$sql);
			$count=mysqli_num_rows($res);
			if($count == 1)
			{
				header("location:home1.php");
			}
			else
			{
				echo "Invalid";
			}
	}
?>