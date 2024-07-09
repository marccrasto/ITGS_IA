<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style type="text/css">

table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 16px;
}

tr:nth-child(even) {
  background-color: #f2f2f2
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
    text-align: center;
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

</style>
</head>

<body>
	 <form action="View Students.php">
	 <div class="header">
  <h1>Attendance Record</h1>
  <p>Making your everyday task much more easier!</p>
</div>
	<div class="navbar">
  <a href="Staff Homepage.php" class="active">Home</a>
  <a href="View Students.php">View Students</a>
  <a href="Take Attendance.php">Take Attendance</a>
  <a href="Staff Login.php" class="right">Logout</a>
	<a href="View Student Attendance.php" class="right">View Student Attendance</a>
	</div>
	<div class="row">
  <div class="side">
  
<p><br>
</p>
<table width="84%" height="64" align="center">
  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Mail_ID</th>
					<th>Present</th>
	                <th>Absent</th>
  </tr>
		<?php

if(isset($_POST['Searchbtn']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `tbl_registration` WHERE CONCAT(`ID`, `Name`, `Mail_ID`, `Gender`, `Mobile`, `City`, `State`, `Country`, `Department`, `Course`, `Year`, `Password`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `tbl_registration`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "db_cs");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

                 while($row = mysqli_fetch_array($search_result)):
		?>
	<?php
require('conn.php');
 $present = $_REQUEST['Present'];
  $ID=$_REQUEST['ID'];
   $Name=$_REQUEST['Name'];
	if(isset($_POST['enterbtn']))
	{
    //insert data and check position
    mysqli_query($conn, "UPDATE tbl_take_attendance SET Days Present=Days Present+1 WHERE ID='$ID'");
		
		
	
    mysqli_close($conn);

}
		else
		{	
		}
		?>
	

                <tr>
                    <td><?php echo $row['ID'];?></td>
                    <td><?php echo $row['Name'];?></td>
                    <td><?php echo $row['Mail_ID'];?></td>
					<td><input type="checkbox" name='Present' id='Present'/></td>
					<td><input type="checkbox" name='Absent' id='Absent'/></td>
				</tr>
               <?php endwhile;?>
	  </table>
	  
<button type="submit" class="registerbtn" name="enterbtn">Enter Attendance</button>

<?php
	  $present = $_REQUEST['Present'];
	  $absent = $_REQUEST['Absent'];
	  
	  if(isset($_POST['enterbtn']))
	  {
    mysqli_query($conn, "UPDATE tbl_take_attendance SET Days_Present=Days_Present+1 WHERE Name='$present'");
	mysqli_query($conn, "UPDATE tbl_take_attendance SET Days_Absent=Days_Absent+1 WHERE Name='$absent'");
    mysqli_close($conn);
	  }
	  else
	  {
		 // do nothing
	  }
		  
	  
	  ?>
</button>
</body>
</html>