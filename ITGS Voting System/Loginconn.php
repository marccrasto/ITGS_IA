<?php
$conn = mysqli_connect("localhost","root","","db_cs");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>