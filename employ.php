<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-1">
	<form action="employ.php" method="POST">
		
		<input type="text" name="txtenm" placeholder="employname" class="form-control mt-1" required>
		<select class="form-control mt-1" name="txtdpt">
			<option>Select department:</option>
			<option>PRESIDENT</option>
			<option> MANAGER</option>
			<option> ANALYST </option>
			<option>SALESMAN</option>
		</select>	
		<input type="date" name="txtjond" placeholder="Joining Date" class="form-control mt-1" required>
		<input type="number" name="sry" placeholder="Enter salary" class="from-control mt-1" required></br>
		<input type="number" name="mon" placeholder="Enter mobile" class="from-control mt-1" required></br>
		
		
			<input type="submit" value="SAVE" class="btn btn-primary w-100 mt-3">
	</form>
</div>
   <table class="table" id="myTable">
        <tr>
          <th scope="col">employname</th>
          <th scope="col">department</th>
          <th scope="col">Joining Date</th>
          <th scope="col">salary</th>
          <th scope="col">mobailnumber</th>
        </tr>
      
<?php 
	$con=mysqli_connect("localhost","root","","employ");
	if(isset($_POST['txtenm']))
	{
			$enm=$_POST['txtenm'];
			$dpt=$_POST['txtdpt'];
			$jond=$_POST['txtjond'];
			$sry=$_POST['sry'];
			$mon=$_POST['mon'];
			$sqli="INSERT INTO `employdetali`( `employname`, `employdipartment`, `joining date`, `salary`, `mobailnumber`) VALUES ('$enm','$dpt','$jond','$sry','$mon')";
			$res=mysqli_query($con,$sqli);
			
	}
?>

   <?php 
          $sql = "SELECT * FROM `employdetali`";
        
         	$result=mysqli_query($con,$sql);
          while($row = mysqli_fetch_assoc($result)){
            
            echo "<tr>
            
            <td>". $row['employname'] . "</td>
            <td>". $row['employdipartment'] . "</td>
            <td>". $row['joining date'] . "</td>
            <td>". $row['salary'] . "</td>
            <td>". $row['mobailnumber'] . "</td>
           
          </tr>";
        } 
          ?>