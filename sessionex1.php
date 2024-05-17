<?php
	session_start();
?>
<html>
<head>
		<title>session</title>
</head>
<body>
<?php
	$_SESSION["favcolor"]="red";
	$_SESSION["favanimal"]="cat";
	echo"session variables are set.";
?>
</body>
</html>