<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-3">
	<form action="student.php" method="POST">
		<input type="text" name="txtfnm" placeholder="Enter fristname" class="form-control mt-3" required>
		<input type="text" name="txtlnm" placeholder="Enter lastname" class="form-control mt-3" required>
		<select class="from-select mt-3" name="cs" placeholder="select course">Course:
			<option>BCA</option>
			<option>BSC IT</option>
			<option>BPT</option>
		</select>
		<input type="submit" value="Register" class="btn btn-warning w-100 mt-3">
		<input type="submit" value="clear" class="btn btn-success w-100 mt-3">
	</form>
</div>
<?php 
	$con=mysqli_connect("localhost","root","","geetanjali_college");
	if(isset($_POST['txtfnm']))
	{
			$fnm=$_POST['txtfnm'];
			
			$lnm=$_POST['txtlnm'];
			$cs=$_POST['cs'];
			$sql="INSERT INTO `student`( `first name`, `last name`, `course`) VALUES ('$fnm','$lnm','$cs')";
			$res=mysqli_query($con,$sql);
	}
?>