<?php
	session_start();
	
	if (!isset($_SESSION['ID']) ||(trim ($_SESSION['ID']) == '')) {
		header('Student Login 2.php');
		exit();
	}
	include('Loginconn.php');
	$query=mysqli_query($conn,"select * from tbl_registration where ID='".$_SESSION['ID']."'");
	$row=mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html>
<head>
<title>Setting Up Cookie on User Login</title>
</head>
<body>
	<h2>Login Success</h2>
	<?php echo $row['Name']; ?>
	<br>
	<a href="CSlogout.php">Logout</a>
</body>
</html>