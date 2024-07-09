<?php
	session_start();
	session_destroy();
	
	if (isset($_COOKIE["Email"]) AND isset($_COOKIE["Pass"])){
		setcookie("user", '', time() - (3600));
		setcookie("pass", '', time() - (3600));
	}

	header('location:Student Login 2.php');

?>