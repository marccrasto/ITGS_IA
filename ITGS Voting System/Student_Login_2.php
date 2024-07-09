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
<body>
<div class="header">
  <h1>Attendance Record</h1>
  <p>Making your everyday task much more easier!</p>
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
  <input type="text" name="Emailid" id="" placeholder="email" class="email">
    
  <label for=""></label>
  <input type="password" name="Password" id="" placeholder="password" class="pass">
    
  <button type="submit" value="Login" name="login">login to your Account
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  </button>
	
		<div class="bg-image"></div>
</form>
</body>
</html>