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
	

</head>
<body>
	<?php
		if(isset($_POST['login'])){
		
		session_start();
		//include('Loginconn.php');
	
		$email=$_POST['Emailid'];
		$password=$_POST['Password'];
	
		$query=mysqli_query($conn,"select * from `tbl_registration` where Mail_ID='$email' && Password='$password'");
	
		if (mysqli_num_rows($query) == 0){
			$_SESSION['message']="Login Failed. User not Found!";
			header('location:Student Login 2.php');
		}
		else{
			$row=mysqli_fetch_array($query);
			
			if (isset($_POST['remember'])){
				//set up cookie
				setcookie("user", $row['username'], time() + (86400 * 30)); 
				setcookie("pass", $row['password'], time() + (86400 * 30)); 
			}
			
			$_SESSION['ID']=$row['ID'];
			header('location:CSsuccess.php');
		}
	}
	else{
		header('location: Student Login 2.php');
		$_SESSION['message']="Please Login!";
	}
	?>
<div class="header">
  <h1>Assignment Management</h1>
  <p>Making The Handling of Assignments much more simple and secure</p>
</div>
	<div class="navbar">
  <a href="Normal Homepage.php" class="active">Home</a>
  <a href="Student Registration.php">Register Now</a>
  <a href="Admin Login Page.php" class="right">Admin Login</a>
	<a href="Student Login.php" class="right">Login</a>
	</div>
	
<div id="bg"></div>
<form action="Student Login.php">
  <label for=""></label>
  <input type="text" value="<?php if (isset($_COOKIE["Email"])){echo $_COOKIE["Email"];}?>" name="Emailid" id="" placeholder="email" class="email">
    
  <label for=""></label>
  <input type="password" value="<?php if (isset($_COOKIE["pass"])){echo $_COOKIE["pass"];}?>" name="Password" id="" placeholder="password" class="pass">
    
  <button type="submit" value="Login" name="login">login to your Account
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  </button>
	
		<div class="bg-image"></div>
</form>
</body>
</html>