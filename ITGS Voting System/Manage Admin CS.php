
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	  <form action="Manage Admin CS.php" method="post">
<table width="1414" height="1649" border="1">
  <tbody>
    <tr>
      <td width="1404" style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; font-size: 36px;">Manage Administrators</td>
    </tr>
    <tr>
      <td><table width="615" height="749" border="1">
        <tbody>
          <tr>
            <td colspan="2">Search Administrator</td>
            <td width="288"><label for="search"></label>
              <input type="search" name="search" id="search"></td>
          </tr>
          <tr>
            <td colspan="2" style="font-size: 36px">Update Account</td>
            <td rowspan="6"><input type="file" name="Profile_Picture" id="fileField"></td>
          </tr>
          <tr>
            <td width="135">First_Name</td>
            <td width="170"><input type="text" name="textfield6" id="textfield6"></td>
            </tr>
          <tr>
            <td>Last_Name</td>
            <td><input type="text" name="textfield7" id="textfield7"></td>
            </tr>
          <tr>
            <td>Email_ID</td>
            <td><input type="text" name="textfield8" id="textfield8"></td>
            </tr>
          <tr>
            <td>New Password</td>
            <td><input type="text" name="textfield9" id="textfield9"></td>
            </tr>
          <tr>
            <td>Confirm Password</td>
            <td><input type="text" name="textfield10" id="textfield10"></td>
            </tr>
          <tr>
            <td colspan="3"><input type="submit" name="btn_update" id="submit" value="Update Account"></td>
            </tr>
        </tbody>
      </table>
        <p>&nbsp;</p>
        <table width="617" height="771" border="1">
			
          <tbody>
			  	<?php
	include('conn.php');
	function getPosts()
		{
		  $posts = array();
		  $posts[1] = $_POST['txtfirstname'];
		  $posts[2] = $_POST['txtlastname'];
		  $posts[3] = $_POST['txtemail'];
		  $posts[4] = $_POST['txtpassword'];
		  $posts[5] = $_POST['Profile_Picture_2'];
		  $posts[6] = $_POST['txtconfirm'];

		  return $posts;
	  }
	
	
		if(isset($_POST['btn_create']))
{
    $data = getPosts();
			
			if($data[4]==$data[6]) 
{
			
	 $insert_Query = "insert into `tbl_admin` (First_Name, Last_Name, Email_ID, Password, Profile_Picture) VALUES ('$data[1]','$data[2]','$data[3]','$data[4]','$data[5]')";
   try{
       $insert_Result = mysqli_query($conn, $insert_Query);
        
        if($insert_Result)
        {
            if(mysqli_affected_rows($conn) > 0)
            {
                echo 'Account Created!';
            }else{
                echo 'Account Not Created';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Insert '.$ex->getMessage();
    }
				
}
			else{
					echo('Passwords Do Not Match. PLEASE TRY AGAIN');
				}
}
			  
		?>
            <tr>
              <td colspan="3" style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; font-size: 36px;">Create Account</td>
            </tr>
            <tr>
              <td width="192">First_Name</td>
              <td width="158"><input type="text" name="txtfirstname" id="textfield"></td>
              <td width="245" rowspan="5"><input type="file" name="Profile_Picture_2" id="fileField2"></td>
            </tr>
            <tr>
              <td>Last_Name</td>
              <td><input type="text" name="txtlastname" id="textfield2"></td>
            </tr>
            <tr>
              <td>Email_ID</td>
              <td><input type="text" name="txtemail" id="textfield3"></td>
            </tr>
            <tr>
              <td>Password</td>
              <td><input type="text" name="txtpassword" id="textfield4"></td>
            </tr>
            <tr>
              <td>Confirm_Password</td>
              <td><input type="text" name="txtconfirm" id="textfield5"></td>
            </tr>
            <tr>
              <td colspan="3"><input type="submit" name="btn_create" id="submit2" value="Create Account"></td>
            </tr>
          </tbody>
      </table></td>
    </tr>
  </tbody>
</table>
</body>
</html>