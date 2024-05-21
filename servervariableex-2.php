<html>
<body>
	<form action="<?php echo $_SERVER['PHP_SELF']?>
		username:
		<input type="text" name="username"></br>
		Area of study:
		<input type="text" name="area"></br>
		<input type="submit" name="save">
	</form>
<?php
	if(isset($_POST['save']))
	{
		echo $_POST['username']."<br>";
		echo $_POST['fname']."<br>";
	}
?>