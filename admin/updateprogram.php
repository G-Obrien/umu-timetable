<?php 
/*
include('../config.php');
$q=mysqli_query($con,"select * from  program where program_id='".$_GET['id']."'");
while($res=mysqli_fetch_assoc($q))
{
echo "<option value='".$res['program_id']."'>".$res['program_name']."</option>";

}
*/
?>


<?php 
include('../config.php');
$program_id=$_REQUEST['program_id'];
$q=mysqli_query($con,"select * from program where program_id='$program_id'");
$res=mysqli_fetch_assoc($q);
extract($_POST);
if(isset('update'))
{	 

	mysqli_query($con,"update program set program_name='$c' where program_id='$program_id' ");
	
	$err= "Update was Successful..";
	
	}
	


?>

<div class="row">
<div class="col-md-5">
               <h2>Update Program</h2>
<form method="POST" enctype="multipart/form-data">
  <table border="0" cellspacing="5" cellpadding="5" class="table">
  <tr>
  <td colspan="2"><?php echo @$err; ?></td>
  </tr>
  
   <tr>
    <th width="237" scope="row">Program Name </th>
    <td width="213"><input type="text" name="c" class="form-control" value="<?php echo $res['program_name'];?>"/></td>
  </tr>
   <tr>
    <th colspan="2" scope="row" align="center">
<input type="submit" value="Update Records" name="update"/>
	</th>
  </tr>
</table>
</form>
</div>
</div>
               
                