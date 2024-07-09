<?php
include("conn.php");
$positionid = $_GET['txtid'];
$query = "DELETE  FROM tbl_position WHERE Position_ID = '$positionid'";
$data = mysqli_query($conn, $query);

            if($data)
            {
                echo 'Data Deleted';
            }else{
                echo 'Data Not Deleted';
            }
?>