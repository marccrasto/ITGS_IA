<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
	
	
	
	include('conn.php');
	require_once 'config.php';
	function getPosts()
	  {
		  $posts = array();
		  $posts[0] = $_POST['txtname'];
		  $posts[1] = $_POST['txtmailid'];
		  $posts[2] = $_POST['gender'];
		  $posts[3] = $_POST['txtmobile'];
		  $posts[4] = $_POST['txtcity'];
		  $posts[5] = $_POST['txtstate'];
		  $posts[6] = $_POST['txtcountry'];
		  $posts[7] = $_POST['txtdepartment'];
		  $posts[8] = $_POST['txtselect'];
		  $posts[9] = $_POST['txtyear'];
		  $posts[10] = $_POST['txtpassword'];
		  $posts[11] = $_POST['txtconfirm'];
		  $posts[12] = $_POST['Profile_Picture'];
		  return $posts;
	}
  
		if(isset($_POST['btn_insert']))		
			
{
    
		$imgFile = $_FILES['Profile_Picture']['name'];
        $tmp_dir = $_FILES['Profile_Picture']['tmp_name'];
		}
	
			
			
			
			$data = getPosts();
			
			if($data[10]==$data[11])
			{

 
  
 $insert_Query = "insert into `tbl_registration` (Name,Mail_ID,Gender,Mobile,City,State,Country,Department,Course,Year,Password) VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]','$data[10]')";			
		
   $upload_dir = 'Pics/'; // upload directory
 
   $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
    // valid image extensions
   $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
  
   // rename uploading image
   $userpic = rand(1000,1000000).".".$imgExt;
				
   move_uploaded_file($tmp_dir,$upload_dir.$userpic);
					
  $stmt = $DB_con->prepare("INSERT INTO `tbl_registration`(Profile_Picture) VALUES($userpic)");
  $stmt->bindParam('Profile_Picture',$userpic);
			
			
			
			
			
			
			
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
	
	?>
	

	
<form action="Student REG.php" method="post">
<table width="1298" height="257" border="1">
  <tbody>
    <tr>
      <td colspan="3"><strong><em style="font-size: 36px; text-align: center;">Student Registration</em></strong></td>
    </tr>
    <tr>
      <td width="179" style="font-size: 18px">Name</td>
      <td width="638"><input type="text" name="txtname" id="textfield2"></td>
      <td width="510" rowspan="12"><p>Profile_Picture
          <input class="input-group" type="file" name="Profile_Picture" accept="image/*" />
      <td>&nbsp;</td>
      </p>
      <p>&nbsp; </p></td>
    </tr>
    <tr>
      <td style="font-size: 18px">Mail_ID</td>
      <td><input type="text" name="txtmailid" id="textfield3"></td>
    </tr>
    <tr>
      <td style="font-size: 18px">Gender</td>
      <td><input type="radio" name="gender" id="radio" value="Male">
        Male
          <input type="radio" name="gender" id="radio2" value="Female">
      Female</td>
    </tr>
    <tr>
      <td style="font-size: 18px">Mobile</td>
      <td><input type="text" name="txtmobile" id="textfield4"></td>
    </tr>
    <tr>
      <td style="font-size: 18px">City</td>
      <td><input type="text" name="txtcity" id="textfield5"></td>
    </tr>
    <tr>
      <td style="font-size: 18px">State</td>
      <td><input type="text" name="txtstate" id="textfield6"></td>
    </tr>
    <tr>
      <td style="font-size: 18px">Country</td>
      <td><input type="text" name="txtcountry" id="textfield7"></td>
    </tr>
    <tr>
      <td style="font-size: 18px">Department</td>
      <td><input type="text" name="txtdepartment" id="textfield8"></td>
    </tr>
    <tr>
      <td style="font-size: 18px">Course</td>
      <td><select name="txtselect" id="select">
        <option value="Engineering">Engineering</option>
        <option value="Commerce">Commerce</option>
        <option value="Medical">Medical</option>
      </select></td>
    </tr>
    <tr>
      <td style="font-size: 18px">Year</td>
      <td><input type="text" name="txtyear" id="textfield"></td>
    </tr>
    <tr>
      <td style="font-size: 18px">Password</td>
      <td><input type="text" name="txtpassword" id="textfield9"></td>
    </tr>
    <tr>
      <td style="font-size: 18px">Confirm_Password</td>
      <td><input type="text" name="txtconfirm" id="textfield10"></td>
    </tr>
    <tr>
      <td colspan="3" style="font-size: 18px"><p>
<input type="submit" name="btn_insert" id="submit" value="Submit">
      </p></td>
    </tr>
  </tbody>
</table>
	</form>
</body>
</html>