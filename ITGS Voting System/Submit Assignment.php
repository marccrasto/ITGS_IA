<!doctype html>
<html>
<head>
<meta charset="utf-8">
<style>
	select {
        width:100%;
    }
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
	{
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password], input[type=select] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus, input[type=select] {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
body,td,th {
    font-size: 24px;
}
</style>
<title>Untitled Document</title>
</head>

<body>
	<form action="Submit Assignment.php" method="post" enctype="multipart/form-data" id="myForm" >
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


<table width=100% height=100% border="1">
  <tbody>
    <tr>
      <td colspan="2" style="font-size: 36px; font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; text-align: center;">Submit Assignment</td>
    </tr>
    <tr>
      <td width="253">Assignment Title</td>
      <td width="667"><input type="text" name="textfield" id="textfield"></td>
    </tr>
    <tr>
      <td>Assignment Regarding</td>
      <td><input type="text" name="textfield2" id="textfield2"></td>
    </tr>
    <tr>
      <td>Subject</td>
      <td><label for="select"></label>
        <select name="select" id="select">
      </select></td>
    </tr>
    <tr>
      <td height="189">Description</td>
      <td width="667"><input type="text" name="textfield" id="textfield" height="189"></td>
    </tr>
    <tr>
      <td>Upload Assignment Document</td>
      <td><input type="file" name="btn_choosefile" id="fileField"></td>
    </tr>
    <tr>
      <td height="29">Select Staff</td>
      <td><input name="email" type="email" id="email" list=></td>
    </tr>
    <tr>
      <td colspan="2" style="text-align: center"><input type="reset" name="btn_reset" id="reset" value="Reset">
		  
      <input type="submit" name="btn_submit" id="submit" value="Submit">  </td>
    </tr>
  </tbody>
</table>
</body>
</html>