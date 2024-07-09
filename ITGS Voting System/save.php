<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
require('conn.php');
 $vote = $_REQUEST['vote'];
  $user_id=$_REQUEST['user_id'];
   $position=$_REQUEST['position'];

$sql=mysqli_query($conn, "SELECT Candidate_Position,Voter_ID FROM tbl_votes where Candidate_Position='$position' and Voter_ID='$user_id'");

if(mysqli_num_rows($sql))
{
    echo "<h3>You have already done your vote for this Position</h3>";
  //return "1";
 /* echo "<script>alert('already vote')</script>";*/ 
}
else
{
    //insert data and check position
    $ins=mysqli_query($conn,"INSERT INTO tbl_votes (Voter_ID, Candidate_Position, Candidate_Name) VALUES ('$user_id', '$position', '$vote')");
    mysqli_query($conn, "UPDATE tbl_polls SET Poll=Poll+1 WHERE Candidate_Name='$vote'");
    mysqli_close($conn);
 
echo "<h3 style='color:blue'>Congrats You have submitted your vote for canditate ".$vote."</h3>";

}

?> 