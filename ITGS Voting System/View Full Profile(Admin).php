<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
th, td {
  text-align: left;
  padding: 16px;
}


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
    text-align: center;
}
</style>
</head>
<body>
	<?php
	include 'conn.php';
	$ret=mysqli_query($conn,"SELECT * FROM `tbl_registration` WHERE ID='".$_GET['uid']."'");
	  while($row=mysqli_fetch_array($ret))
	  {?>



<form action="View Full Profile.php" method="post" enctype="multipart/form-data" id="myForm" >
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
<p>&nbsp;</p>
<div class="container">
<div class="center wow fadeInDown">
                 <h1>Student Profile</h1>
                <!-- <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p> -->
            </div>
           <table width="375" height="277" border="1" align="center">
             <tbody>
               <tr>
                 <td height="64">Profile Picture</td>
               </tr>
               <tr>
                 <td><strong><img src="<?php echo $row['img_location']; ?>" width="374" height="262"></strong></td>
               </tr>
             </tbody>
           </table>
             <div class="table-responsive">
               <div class="col-md-8">
                 <h2>Student Information</h2>
               </div>
             </div>
           </form>
           <table width="100%" border="1">
             <tbody>
               <tr>
                 <td width="276">ID</td>
                 <td width="527"><input value="<?php echo $row['ID'];?>" name="txtid" type="text"  >
</td>
               </tr>
               <tr>
                 <td>Name</td>
                 <td><input value="<?php echo $row['Name'];?>" name="txtname" type="text"  >
</td>
               </tr>
               <tr>
                 <td>Mail_ID</td>
                 <td><input value="<?php echo $row['Mail_ID'];?>" name="txtreg" type="text"  >
</td>
               </tr>
               <tr>
                 <td>Gender</td>
                 <td><input value="<?php echo $row['Gender'];?>" name="txtgender" type="text"  >
</td>
               </tr>
               <tr>
                 <td>Mobile</td>
                 <td><input value="<?php echo $row['Mobile'];?>" name="txtmobile" type="text"  >
</td>
               </tr>
               <tr>
                 <td>City</td>
                 <td><input value="<?php echo $row['City'];?>" name="txtcity" type="text"  >
</td>
               </tr>
               <tr>
                 <td>State</td>
                 <td><input value="<?php echo $row['State'];?>" name="txtstate" type="text"  >
</td>
               </tr>
               <tr>
                 <td>Country</td>
                 <td><input value="<?php echo $row['Country'];?>" name="txtcountry" type="text"  >
</td>
               </tr>
               <tr>
                 <td>Department</td>
                 <td><input value="<?php echo $row['Department'];?>" name="txtdepartment" type="text"  ></td>
               </tr>
               <tr>
                 <td>Course</td>
               <td><input value="<?php echo $row['Course'];?>" name="txtcourse" type="text"  ></tr>
               <tr>
                 <td>Year</td>
                 <td><input value="<?php echo $row['Year'];?>" name="txtyear" type="text"  >
</td>
               </tr>
             </tbody>
           </table>
 <?php } ?>
	
	
	
	
</body>
</html>
