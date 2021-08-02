<?php
include('../config.php');
    //selecting program from a specified faculty
    $output ='';
    $prog=mysqli_query($con,"select * from program WHERE department_id ='".$_POST['DepartID']."' ORDER BY program_name");
    $output .='<option value="" Disabled Selected> - Select Course/Program - </option>';
    while($pro=mysqli_fetch_array($prog))
    {
    //$pro_id=$pro[0]; 
    $output ='<option value="'.$pro["program_id"].'">'.$pro["initials"]. ' - '.$pro["program_name"]. '</option>';
    
    }
  echo $output;

?>