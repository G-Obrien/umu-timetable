<?php 
include('../config.php');
$lecturerid=$_REQUEST['lecturer_id'];
if(isset($_REQUEST['lecturer_id']))
{

mysqli_query($con,"delete from lecturer where lecturer_id='$lecturerid'");


header('location:admindashboard.php?info=lecturer');
}
?>
