<form action="form.php" method="POST">
	<input type="text" name="txtnm" placeholder="Enter Name" required>
	<input type="submit" value="save">
</form>
<?php
	if(isset($_POST['txtnm']))
	{
		$nm=$_POST['txtnm'];
		echo $nm;
	}
?>