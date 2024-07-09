<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
} }
</script>
</head>
<body>

	<?php
	
	
	include('conn.php');
	$q2="select * from tbl_state";
	$r2=mysqli_query($conn,$q2);
	function getPosts()
	  {
		  $posts = array();
		  $posts[0] = $_POST['txtid'];
		  $posts[1] = $_POST['txtname'];
		  $posts[2] = $_POST['txtmailid'];
		  $posts[3] = $_POST['txtgender'];
		  $posts[4] = $_POST['txtmobile'];
		  $posts[5] = $_POST['txtcity'];
		  $posts[6] = $_POST['txtstate'];
		  $posts[7] = $_POST['txtcountry'];
		  $posts[8] = $_POST['txtdepartment'];
		  $posts[9] = $_POST['txtcourse'];
		  $posts[10] = $_POST['txtyear'];
		  $posts[11] = $_POST['txtpassword'];
		  $posts[12] = $_POST['txtconfirm'];
	return $posts;
	}
  
		if(isset($_POST['registerbtn']))	
		{
			$data = getPosts();
			$fileinfo=PATHINFO($_FILES["image"]["name"]);
	$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
	move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $newFilename);
	$location="upload/" . $newFilename;
	
			
			if($data[11]==$data[12])
			{
	
	  $insert_Query = "insert into `tbl_registration` (ID,Name,Mail_ID,Gender,Mobile,City,State,Country,Department,Course,Year,Password) VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]','$data[10]','$data[11]')";	
	
	
//	mysqli_query($conn,"insert into `image_tbl` (img_location) values ($location')");
    
				
	  $insert_Query1 = "insert into `image_tbl` (ID,Name,img_location) VALUES ('$data[0]','$data[1]','$location')";
				$insert_Result2 = mysqli_query($conn, $insert_Query1);
				
				
	   $insert_Query2 = "insert into `tbl_take_attendance` (ID,Name) VALUES ('$data[0]','$data[1]')";
				$insert_Result3 = mysqli_query($conn, $insert_Query2);
				
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
	

	<form action="Student Registration.php" method="post" enctype="multipart/form-data" id="myForm" >
	<div class="header">
  <h1>Attendance Record</h1>
  <p>Making your everyday task much more easier!</p>
    </div>
	<div class="navbar">
 <a href="Index.php" class="active">Home</a>
  <a href="Student Registration.php">Register Now</a>
  <a href="Staff Registration.php">Staff Register</a>
  <a href="Admin Login Page.php" class="right">Admin Login</a>
	<a href="Staff Login.php" class="right">Staff Login</a>
	</div>

  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <table width="366" height="348" border="1" align="center">
      <tbody>
        <tr style="text-align: center">
          <td height="49"><strong>Profile Picture Here</strong></td>
        </tr>
        <tr style="text-align: center">
          <td height="92" colspan="2"
			  style="font-size: large"><strong>Image</strong>
			  <input type="file" name="image">		  
			</td>
      </tr>
      </tbody>
    </table>
    <p>&nbsp;</p>
    <p><b>ID_Number</b></p>
    <p>
      <input name="txtid" type="text" required id="txtid" placeholder="Enter Your College ID Number">
    </p>
    <p><b>Name</b>
      <input name="txtname" type="text" required id="txtname" placeholder="Enter Name">
      <b>Email_ID</b>
      <input name="txtmailid" type="text" required id="txtmailid" placeholder="Enter Email-ID">
      <b>Gender</b>
      <input name="txtgender" type="text" required id="txtgender" placeholder="Enter Gender">
      <b>Mobile</b>
      <input name="txtmobile" type="text" required id="txtmobile" placeholder="Enter Mobile Number">
      <b>City</b>
      <input name="txtcity" type="text" required id="txtcity" placeholder="Enter City">
      <b>State</b></p>
      <select name="txtstate" size="3" id="select">
		  
        <option>SELECT</option>
        <?php while($row1=mysqli_fetch_array($r2)):;?>
        <option><?php echo  $row1[1];?></option>
        <?php endwhile;?>
      </select>
    </p>
    <p><b>Country</b>
      <input name="txtcountry" type="text" required id="txtcountry" placeholder="Enter Country">
      <b>Department</b>
      <input name="txtdepartment" type="text" required id="txtdepartment" placeholder="Enter Department">
      <b>Course</b>
      <input name="txtcourse" type="text" required id="txtcourse" placeholder="Enter Course">
      <b>Year</b>
      <input name="txtyear" type="text" required id="txtyear" placeholder="Enter Year">
      <b>Password</b>
      <input name="txtpassword" type="text" required id="txtpassword" placeholder="Enter Password">
      <b>Confirm Password</b>
      <input name="txtconfirm" type="text" required id="txtconfirm" placeholder="Confirm Password">
    </p>
    <hr>
    <button type="submit" class="registerbtn" name="registerbtn">Register</button>
  </div>
  
  </div>
</form>

</body>
</html>

</head>

<body>
</body>
</html>