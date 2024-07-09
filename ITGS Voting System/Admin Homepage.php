<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style type="text/css">

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
	
body,td,th {
    font-size: 24px;
}
</style>

</style>
</head>

<body>
	<div class="header">
  <h1>Attendance Record</h1>
  <p>Making your everyday task much more easier!</p>
</div>
	<div class="navbar">
<a href="Admin Homepage.php" class="active">Home</a>
  <a href="View Students(Admin).php">View Students</a>
  <a href="View Teachers.php">View Teachers</a>
  <a href="Admin Login Page.php" class="right">Logout</a>
	<a href="View Student Attendance(Admin).php" class="right">View Student Attendance</a>
	</div>
	<div class="row">
  <div class="side">
    <h2><center>About This Program </center>   </h2>
    <table width="200" border="1" align="center">
      <tbody>
        <tr>
          <td><img src="../.jpg" width="100" height="370" alt=""/><img src="logo.jpg"</td>
        </tr>
      </tbody>
    </table>
    <p>This is an Attendance Record Program for the Students and Teachers. It aims to be an efficient and smart program for teachers to keep track of the attendance of the students.</p>
    <p>It also enables the teacher to input whether the students are present or not in the class into the database and the database will calculate whether the student has a perfect attendance record or a poor one. Thank You Very Much!
  </p>
    </p>
    <p>&nbsp;</p> 
</body>
</html>