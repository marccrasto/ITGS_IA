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
	.container {
  padding: 16px;
  background-color: white;
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

	th, td {
  text-align: left;
  padding: 16px;
}

tr:nth-child(even) {
  background-color: #f2f2f2
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
    text-align: center;
}
</style>

</style>
</head>

<body>
	<?php
	include('conn.php');
	$q2="select * from tbl_position";
	$r2=mysqli_query($conn,$q2);
	function getPosts()
	  {
		  $posts = array();
		  $posts[1] = $_POST['txtid'];
		  $posts[2] = $_POST['txtadmin'];
		  $posts[3] = $_POST['txtpassword'];
		return $posts;
	}
	if(isset($_POST['submitbtn']))	
		{
			$data = getPosts();
		
		$insert_Query = "insert into `tbl_admin` (ID,Name,Password) VALUES ('$data[1]','$data[2]','$data[3]')";	
				try{
       $insert_Result = mysqli_query($conn, $insert_Query);
        
        if($insert_Result)
        {
			
            if(mysqli_affected_rows($conn) > 0)
            {
                echo 'Data Inserted';
            }else{
                echo 'Data Not Inserted';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Insert '.$ex->getMessage();
    }
}
	

	?>
	<form action="Manage Admin.php" method="post">
  <div class="header">
  <h1>Poll Voting System </h1>
  <p>Voting Just Became Easier</p>
</div>
<div class="navbar">
  <a href="Index.php" class="active">Home</a>
  <a href="Manage Admin.php">Manage Admin</a>
  <a href="View Candidates.php">View Candidates</a>
  <a href="#">View Voters</a>
  <a href="Manage Positions.php">Manage Positions</a>
  <a href="Admin Login.php" class="right">Logout</a>
  <a href="Poll Results.php" class="right">Poll Results</a>
</div>
<p>&nbsp;</p>
		<table width="200" border="1">
	  <tbody>
	    <tr>
	      <td colspan="2">Add Administrator</td>
        </tr>
	    <tr>
	      <td width="52%">Admin_ID</td>
	      <td width="48%"><input type="text" name="txtid" id="textfield"></td>
        </tr>
	    <tr>
	      <td>Admin_Name</td>
	      <td><input type="text" name="txtadmin" id="textfield2"></td>
        </tr>
	    <tr>
	      <td>Admin_Password</td>
	      <td><input type="text" name="txtpassword" id="textfield3"></td>
        </tr>
	    <tr>
	      <td><input type="submit" name="submitbtn" id="submit" value="Submit"></td>
	      <td><input type="reset" name="reset" id="reset" value="Reset"></td>
        </tr>
      </tbody>
</table>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
<p>
	<table>
	  <input type="text" name="valueToSearch" placeholder="Value To Search">
	  <br><br>
	  <input type="submit" name="Searchbtn" value="Filter"><br><br>
  <tr>
             <th width="8%">U_ID</th>
             <th width="12%">ID</th>
             <th width="12%">Admin Name</th>
	         <th width="12%">Password</th>
				
				 
    </tr>
<?php

if(isset($_POST['Searchbtn']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `tbl_admin` WHERE CONCAT(`U_ID`,`ID`,`Name`,`Password`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `tbl_admin`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "db_itgs");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

                 while($row = mysqli_fetch_array($search_result)):
		?>
		
		<tr>
                    <td><?php echo $row['U_ID'];?></td>
                    <td><?php echo $row['ID'];?></td>
				    <td><?php echo $row['Name'];?></td>
			        <td><?php echo $row['Password'];?></td>
		      </tr>
              <?php endwhile;?>
		
</table>

</head>
</form>
<body>
 
</table>
</body>
</html>