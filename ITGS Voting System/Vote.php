<?php
require('conn.php');

session_start();
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['SESS_MEMBER_ID'])){
 header("location:access-denied.php");
}
?>
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
	<script language="JavaScript" src="js/user.js">
</script>
<script type="text/javascript">
function getVote(int)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

	if(confirm("Your vote is for "+int))
	{
  var pos=document.getElementById("str").value;
  var id=document.getElementById("hidden").value;
  xmlhttp.open("GET","save.php?vote="+int+"&user_id="+id+"&position="+pos,true);
  xmlhttp.send();

  xmlhttp.onreadystatechange =function()
{
	if(xmlhttp.readyState ==4 && xmlhttp.status==200)
	{
  //  alert("dfdfd");
	document.getElementById("error").innerHTML=xmlhttp.responseText;
	}
}

  }
	else
	{
	alert("Choose another candidate ");
	}
	
}

function getPosition(String)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

xmlhttp.open("GET","Vote.php?position="+String,true);
xmlhttp.send();
}
</script>
</head>
<body>

	<?php
	include('conn.php');
	$q2="select * from tbl_position";
	$r2=mysqli_query($conn,$q2);
	?>
<?php
    // retrieval sql query
// check if Submit is set in POST
 if (isset($_POST['Submit']))
 {
 // get position value
  //prevents types of SQL injection
 $position = $_POST['position'] ;
 // retrieve based on position
 $result = mysqli_query($conn,"SELECT * FROM tbl_candidates WHERE Candidate_Position='$position'");
 // redirect back to vote
 //header("Location: vote.php");
 }
	?>
	
	<form action="Vote.php" method="post">
<div class="header">
  <h1>Poll Voting System  </h1>
  <p>Voting Just Became Easier</p>
</div>
	<div class="navbar">
   <a href="Staff Homepage.php" class="active">Home</a>
  <a href="View Candidates(Staff).php">View Candidates</a>
  <a href="View Voters(Staff).php">View Voters</a>
  <a href="Manage Positions(Staff).php">View Positions</a>
  <a href="Staff Login.php" class="right">Logout</a>
  <a href="Vote.php" class="right">Vote</a>
	</div>
		<p>&nbsp;</p>
	  <table width="437" height="166" border="1" align="center">
  <tbody>
    <tr>
      <td width="225" style="text-align: center">Choose Position</td>
      <td width="196" style="text-align: center"><select name="position" id="position"   onclick="getPosition(this.value)">
		   <option>SELECT</option>
        <?php while($row1=mysqli_fetch_array($r2)):;?>
        <option><?php echo  $row1[1];?></option>
        <?php endwhile;?>
        </select></td>
		<input type="hidden" id="hidden" value="<?php echo $_SESSION['Candidate_ID']; ?>" />
    <input type="hidden" id="str" value="<?php echo $_REQUEST['Candidate_Position']; ?>" />
    </tr>
    <tr>
      <td colspan="2" style="text-align: center"><input type="submit" name="Submit" id="submit" value="See Candidates"></td>
      </tr>
  </tbody>
</table>
		<th><p>&nbsp;</p>
	      <table width="270" align="center">
	        <tr>
	          <th>Candidates:</th>
            </tr>
	        <?php
			  include('save.php');
//loop through all table rows
//if (mysql_num_rows($result)>0){
  if (isset($_POST['Submit']))
  {
while ($row=mysqli_fetch_array($result)){
echo "<tr>";
echo "<td>" . $row['Candidate_Name']."</td>";
echo "<td><input type='radio' name='vote' id='vote' value='$row[Candidate_Name]' onclick='getVote(this.value)' /></td>";
echo "</tr>";
}
mysqli_free_result($result);
mysqli_close($conn);
//}
  }
else
// do nothing
?>
	        <tr>
	          <h3>NB: Click a circle under a respective candidate to cast your vote. You can't vote more than once in a respective position. This process can not be undone so think wisely before casting your vote.</h3>
	          <td>&nbsp;</td>
            </tr>
          </table>
        <p>&nbsp;</p></th>
		<tr>
    <h3>&nbsp;</h3>
    <td>&nbsp;</td>
	  <p>&nbsp;</p>

		
</form>

</body>
</html>

</head>

<body>
</body>
</html>