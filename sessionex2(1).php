<?php
	session_start();
		$_SESSION['test']=5;
		session_destroy();
		print $_SESSION['test'];
?>