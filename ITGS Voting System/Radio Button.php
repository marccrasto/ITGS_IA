<!doctype html>

<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link href="url(http://fonts.googleapis.com/css?family=Droid+Serif);.css" rel="stylesheet" type="text/css">
<style type="text/css">
	div.container{
width: 960px;
height: 610px;
margin:50px auto;
font-family: 'Droid Serif', serif;
}
div.main{
width: 308px;
margin-top: 35px;
float:left;
border-radius: 5px;
Border:2px solid #999900;
padding:0px 50px 20px;
}
p{
margin-top: 5px;
margin-bottom: 5px;
color:green;
font-weight: bold;
}
h2{
background-color: #FEFFED;
padding: 25px;
margin: 0 -50px;
text-align: center;
border-radius: 5px 5px 0 0;
}
hr{
margin: 0 -50px;
border: 0;
border-bottom: 1px solid #ccc;
margin-bottom:25px;
}
span{
font-size:13.5px;
}
label{
color: #464646;
text-shadow: 0 1px 0 #fff;
font-size: 14px;
font-weight: bold;
}
.heading{
font-size: 17px;
}
b{
color:red;
}
input[type=checkbox]{
margin-bottom:10px;
margin-right: 10px;
}
input[type=submit]{
padding: 10px;
text-align: center;
font-size: 18px;
background: linear-gradient(#ffbc00 5%, #ffdd7f 100%);
border: 2px solid #e5a900;
color: #ffffff;
font-weight: bold;
cursor: pointer;
text-shadow: 0px 1px 0px #13506D;
width: 100%;
border-radius: 5px;
margin-bottom: 15px;
}
input[type=submit]:hover{
background: linear-gradient(#ffdd7f 5%, #ffbc00 100%);
}
</style>
</head>

<body>
	<?php
if(isset($_POST['submit'])){
if(!empty($_POST['check_list'])) {
// Counting number of checked checkboxes.
$checked_count = count($_POST['check_list']);
echo "You have selected following ".$checked_count." option(s): <br/>";
// Loop to store and display values of individual checked checkbox.
foreach($_POST['check_list'] as $selected) {
echo "<p>".$selected ."</p>";
}
echo "<br/><b>Note :</b> <span>Similarily, You Can Also Perform CRUD Operations using These Selected Values.</span>";
}
else{
echo "<b>Please Select Atleast One Option.</b>";
}
}
?>
	<div class="container">
<div class="main">
<h2>PHP: Get Values of Multiple Checked Checkboxes</h2>
<form action="Radio Button.php" method="post">
<label class="heading">Select Your Technical Exposure:</label>
<input type="checkbox" name="check_list[]" value="C/C++"><label>C/C++</label>
<input type="checkbox" name="check_list[]" value="Java"><label>Java</label>
<input type="checkbox" name="check_list[]" value="PHP"><label>PHP</label>
<input type="checkbox" name="check_list[]" value="HTML/CSS"><label>HTML/CSS</label>
<input type="checkbox" name="check_list[]" value="UNIX/LINUX"><label>UNIX/LINUX</label>
<input type="submit" name="submit" Value="Submit"/>
</body>
</html>