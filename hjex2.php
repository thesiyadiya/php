<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-1">
	<form action="hjex2.php" method="POST">
		<input type="text" name="txteno" placeholder="Enter enrollmentno" class="form-control mt-1" required>
		<input type="text" name="txtsnm" placeholder="studentname" class="form-control mt-1" required>
		<input type="text" name="email" placeholder="Enter email" class="form-control mt-1" required>
		<input type="number" name="cn" placeholder="Enter contact" class="from-control mt-1" required></br>
		<input type="date" name="bod" placeholder="Date of brith" class="form-control mt-1" required>
		<select class="form-control mt-1" name="txtcity">
			<option>Select city:</option>
			<option>Rajkot</option>
			<option>Ahemdabad</option>
			<option>Surat</option>
			<option>Delhi</option>
		</select>	
		<textarea name="ads" placeholder="Enter address" class="from-control mt-1"></textarea></br>
		select gender:-
		<input type="radio" name="gender" value="female">Female
		<input type="radio" name="gender" value="male">Male
		<input type="radio" name="gender" value="other">Other
		<input type="submit" value="SUBMIT" class="btn btn-primary w-100 mt-3">
		<input type="button" value="CLEAR" class="btn btn-primary w-100 mt-3">
	</form>
</div>
<?php 
	$con=mysqli_connect("localhost","root","","hjex2");
	if(isset($_POST['txteno']))
	{
			$eno=$_POST['txteno'];
			$snm=$_POST['txtsnm'];
			$email=$_POST['email'];
			$cn=$_POST['cn'];
			$bod=$_POST['bod'];
			$city=$_POST['txtcity'];
			$ads=$_POST['ads'];
			$gender=$_POST['gender'];
			$res="INSERT INTO `login`(`enrollment no`, `student name`, `email`, `contact`, `Date of brith`, `city`, `address`, `gender`) VALUES ('$eno','$snm','$email','$cn','$bod','$city','$ads','$gender')";
			mysqli_query($con,$res);
	}
?>






<?php 
	$con=mysqli_connect("localhost","root","","employ");
	if(isset($_POST['txtenm']))
	{
			$enm=$_POST['txtenm'];
			$dpt=$_POST['txtdpt'];
			$jond=$_POST['txtjond'];
			$sry=$_POST['sry'];
			$mon=$_POST['mon'];
			$sql="INSERT INTO `employdetali`( `employname`, `amploydipartment`, `joining date`, `salary`, `mobailnumber`) VALUES ('[$enm]','[$dpt]','[$jond]','[$sry]','[$mon]')";
			$res=mysqli_query($con,$sql);
	}
?>