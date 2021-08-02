<?php 
include('../config.php');
$progid=$_REQUEST['program_id'];
if(isset($_REQUEST['program_id']))
{

mysqli_query($con,"delete from program where program_id='$progid'");


header('location:admindashboard.php?info=program');
}
?>
