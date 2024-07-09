<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<style>
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
<script type="text/javascript">
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
} 
}
</script>
</head>
<body>
	
<form action="View Teachers.php" method="post" enctype="multipart/form-data" id="myForm" >
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
	<p>
	  <input type="text" name="valueToSearch" placeholder="Value To Search">
	  <br><br>
	  <input type="submit" name="Searchbtn" value="Filter"><br><br>
</p>
	<table>
                <tr>
                    <th width="8%">ID</th>
                    <th width="12%">Name</th>
                    <th width="15%">Mail_ID</th>
                    <th width="14%">Gender</th>
                    <th width="14%">Edit</th>
                    <th width="14%">Delete</th>
				
				 
      </tr>
		<?php

if(isset($_POST['Searchbtn']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `tbl_staff` WHERE CONCAT(`ID`, `Name`, `Email_ID`, `Gender`, `Mobile`, `City`, `State`, `Country`, `Department`, `Password`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `tbl_staff`";
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
		
                <tr>
                    <td><?php echo $row['ID'];?></td>
                    <td><?php echo $row['Name'];?></td>
                    <td><?php echo $row['Email_ID'];?></td>
                    <td><?php echo $row['Gender'];?></td>
					<td><a href="#">View Full Profile</a></td>
					<td><a href="#">Delete Profile</a></td>
	  </tr>
                <?php endwhile;?>
		
</table>

</head>

<body>
 
</table>
</body>
</html>