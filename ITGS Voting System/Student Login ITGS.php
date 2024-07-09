<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
	body 
	
	.header {
  padding: 80px;
  text-align: center;
  background: #FF0000;
  color: white;
}

/* Increase the font size of the heading */
.header h1 {
  font-size: 40px;
}
.navbar {
    overflow: hidden;
    background-color: #333;
    position: sticky;
    position: -webkit-sticky;
    top: 0;
    text-align: center;
}

/* Style the navigation bar links */
.navbar a {
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 14px 20px;
  text-decoration: none;
}


/* Right-aligned link */
.navbar a.right {
  float: right;
}

/* Change color on hover */
.navbar a:hover {
    background-color: #ddd;
    color: black;
    text-align: right;
}

/* Active/current link */
.navbar a.active {
  background-color: #0EA014 ;
  color: white;
}
	.side {
  -ms-flex: 30%; /* IE10 */
  flex: 30%;
  background-color: #f1f1f1;
  padding: 20px;
}
	
</style>
<link href="style.css" rel="stylesheet" type="text/css">
<style type="text/css">
body,td,th {
    font-family: Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
    font-size: 24px;
}
</style>
<meta charset="utf-8">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>
	<?php
	//Start session
	session_start();	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);
?>
<body>
<div class="header">
  <h1>Attendance Record</h1>
  <p>Making your everyday task much more easier!</p>
</div>
	<div class="navbar">
  <a href="Index.php" class="active">Home</a>
  <a href="Student REG.php">Student Register</a>
  <a href="Staff REG.php">Staff Register</a>
  <a href="Admin Login.php" class="right">Admin Login</a>
  <a href="Staff Login.php" class="right">Staff Login</a>
  <a href="Student Login ITGS.php" class="right">Student Login</a>
	</div>
	
<p>&nbsp;</p>
<form name="loginform" action="login_exec.php" method="post">
	 <?php
			if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
			echo '<ul class="err">';
			foreach($_SESSION['ERRMSG_ARR'] as $msg) {
				echo '<li>',$msg,'</li>'; 
				}
			echo '</ul>';
			unset($_SESSION['ERRMSG_ARR']);
			}
		?>
  <label for=""></label>
  <input type="text" name="ID_Number" id="" placeholder="Enter Your ID Number" class="email">
    
  <label for=""></label>
  <input type="password" name="Password" id="" placeholder="password" class="pass">
    
  <button type="submit" value="Login" name="login">login to your Account
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  </button>
	
</form>
</body>
</html>