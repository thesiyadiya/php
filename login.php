<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-1">
	<form action="login.php" method="POST">
		<input type="text" name="txtfnm" placeholder="first username" class="form-control mt-1" required>
		<input type="text" name="txtlnm" placeholder="last username" class="form-control mt-1" required>
		<input type="text" name="email" placeholder="Enter email" class="form-control mt-1" required>
		<input type="number" name="cn" placeholder="Enter contact" class="from-control mt-1" required></br>
		<textarea name="ads" placeholder="Enter address" class="from-control mt-1"></textarea></br>
		<select class="form-control mt-1" name="txtcon">
			<option>Select country:</option>
			<option>India</option>
			<option>Usa</option>
			<option>Australia</option>
			<option>Canada</option>
		</select>
		<select class="form-control mt-1" name="txtst">
			<option>Select state:</option>
			<option>Gujrat</option>
			<option>Goa</option>
			<option>kerala</option>
			<option>Raajsthan</option>
		</select>
		<select class="form-control mt-1" name="txtcity">
			<option>Select city:</option>
			<option>Rajkot</option>
			<option>Ahemdabad</option>
			<option>Surat</option>
			<option>Delhi</option>
		</select>	
		select gender:-
		<input type="radio" name="gender" value="female">Female
		<input type="radio" name="gender" value="male">Male
		<input type="radio" name="gender" value="other">other
		<input type="submit" value="SUBMIT" class="btn btn-primary w-100 mt-3">
		<input type="button" value="CLEAR" class="btn btn-primary w-100 mt-3">
	</form>
</div>
<?php 
	$conn=mysqli_connect("localhost","root","","hjex");
	if(isset($_POST['txtfnm']))
	{
			$fnm=$_POST['txtfnm'];
			$lnm=$_POST['txtlnm'];
			$email=$_POST['email'];
			$cn=$_POST['cn'];
			$ads=$_POST['ads'];
			$con=$_POST['txtcon'];
			$st=$_POST['txtst'];
			$city=$_POST['txtcity'];
			$gender=$_POST['gender'];
			$i="INSERT INTO `login`(`firstname`, `lastname`, `email`, `concatct`, `address`, `country`, `state`, `city`, `gender`) VALUES ('$fnm','$lnm','$email','$cn','$ads','$con','$st','$city','$gender')";
			$res=mysqli_query($conn,$i);

	}
?>