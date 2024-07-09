<?php
	//Start session
	session_start();
 
	//Include database connection details
	require_once('conn.php');
 
	//Array to store validation errors
	$errmsg_arr = array();
 
	//Validation error flag
	$errflag = false;
 
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		echo "str: ".$str;
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysqli_real_escape_string($str);
	}
 
	//Sanitize the POST values
	$username = $_POST['ID_Number'];
	$password = $_POST['Password'];
 
	//Input Validations
	if($username == '') {
		$errmsg_arr[] = 'ID_Number missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
 
	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: Admin Login Page.php");
		exit();
	}
 
	//Create query
	$qry="SELECT * FROM tbl_admin WHERE ID='$username' AND Password='$password'";
	$result=mysqli_query($conn, $qry);
 
	//Check whether the query was successful or not
	if($result) {
		if(mysqli_num_rows($result) > 0) {
			//Login Successful
			session_regenerate_id();
			$member = mysqli_fetch_assoc($result);
			$_SESSION['SESS_MEMBER_ID'] = $member['U_ID'];
			$_SESSION['SESS_FIRST_NAME'] = $member['ID_Number'];
			$_SESSION['SESS_LAST_NAME'] = $member['Password'];
			session_write_close();
			header("location: Admin Homepage.php");
			exit();
		}else {
			//Login failed
			$errmsg_arr[] = 'ID_Number and Password not found. Please Try Again';
			$errflag = true;
			if($errflag) {
				$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
				session_write_close();
				header("location: Admin Login Page.php");
				exit();
			}
		}
	}else {
		die("Query failed");
	}
?>