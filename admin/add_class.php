
<?php 
include('../config.php');
extract($_POST);
if(isset($save))
{
$que=mysqli_query($con,"select * from class where class_name='$classname'");	
$row=mysqli_num_rows($que);
	if($row)
	{
	$err="<font color='red'>This Class already exists</font>";
	}
	else
	{
mysqli_query($con,"insert into class values('', '$classname')");	

	$err="<font color='blue'>Class added Successfully..!!</font>";
	}
	
}

?>



<div class="row">
<div class="col-md-8">
<h2>Add Class</h2>
<form method="POST" enctype="multipart/form-data">
  <table border="0" cellspacing="5" cellpadding="5" class="table">
  <tr>
  <td colspan="2"><?php echo @$err; ?></td>
  </tr>


  <tr>
    <th width="237" scope="row">Class Name/Label </th>
    <td width="213"><input type="text" name="subname" class="form-control" placeholder="Year I" required/></td>
  </tr>
  <tr>
    <th colspan="1" scope="row"></th>
	<td>
	<input type="submit" value="Add class" name="save" class="btn btn-success" />
	
	<input type="reset" value="Reset" class="btn btn-success"/>
	</td>
  </tr>
  
  </table>
  </form>
  </div>
  </div>