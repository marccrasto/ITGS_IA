<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
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
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
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
</head>
<body>

	<?php
	
	
	
	include('conn.php');
	function getPosts()
	  {
		  $posts = array();
		  $posts[1] = $_POST['txtid'];
		  $posts[2] = $_POST['txtfirstname'];
		  $posts[3] = $_POST['txtlastname'];
		  $posts[4] = $_POST['txtgender'];
		  $posts[5] = $_POST['txtmailid'];
		  $posts[6] = $_POST['txtdate'];
		  $posts[7] = $_POST['txtpassword'];
		  $posts[8] = $_POST['txtconfirm'];
	return $posts;
	}
  
		if(isset($_POST['registerbtn']))	
		{
			$data = getPosts();
			
			if($data[7]==$data[8])
			{

 
  
 $insert_Query = "insert into `tbl_staff` (Teacher_ID,First_Name,Last_Name,Gender,Email_ID,Date_Of_Birth,Password) VALUES ('$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]')";	
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

			else {
				
				echo('Passwords Do Not Match. Please Try Again');
			}
		}
		?>
	<form action="Staff REG.php" method="post" >
	<div class="header">
  <h1>Poll Voting System  </h1>
  <p>Voting Just Became Easier</p>
</div>
	<div class="navbar">
  <a href="Index.php" class="active">Home</a>
  <a href="Student REG.php">Student Register</a>
  <a href="Staff REG.php">Staff Register</a>
  <a href="Admin Login.php" class="right">Admin Login</a>
	<a href="Staff Login.php" class="right">Staff Login</a>
	<a href="Student Login ITGS.php" class="right">Student Login</a>
	</div>

  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <table width="366" height="329" border="1" align="center">
      <tbody>
        <tr style="text-align: center">
          <td height="49"><strong>Profile Picture Here</strong></td>
        </tr>
        <tr style="text-align: center">
          <td height="197">&nbsp;</td>
        </tr>
      </tbody>
    </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p><b>Teacher_ID</b>
      <input type="text" placeholder="Enter First Name" name="txtid" required>
	  <b>First_Name</b>
      <input type="text" placeholder="Enter First Name" name="txtfirstname" required>
      <b>Last_Name</b>
      <input type="text" placeholder="Enter Last Name" name="txtlastname" required>
      <b>Gender</b>
      <input type="text" placeholder="Enter Gender" name="txtgender" required>
      <b>Mail_ID</b>
      <input type="text" placeholder="Enter Mail ID" name="txtmailid" required>
      <b>Date_Of_Birth</b>
      <input type="text" placeholder="Enter Date Of Birth" name="txtdate" required>
      <b>Password</b>
      <input type="text" placeholder="Enter Password" name="txtpassword" required>
      <b>Confirm Password</b>
      <input type="text" placeholder="Confirm Password" name="txtconfirm" required>
    </p>
    <hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <button type="submit" class="registerbtn" name="registerbtn">Register</button>
  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="#">Sign in</a>.</p>
  </div>
</form>

</body>
</html>

</head>

<body>
</body>
</html>