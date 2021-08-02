<div style="background:pink">
  
<?php 
include('../config.php');
$q=mysqli_query($con,"select * from lecturer where  lecturer_id='".$_SESSION['lecturer_id']."'");
$res=mysqli_fetch_assoc($q);

extract($_POST);
if(isset($update))
{	
$oldimg=$_GET['img'];
unlink("image/$email/$oldimg");
    $image=$_FILES['pic']['name'];	
$query="update lecturer set name='$n',eid='$e',password='$p',mob='$m',address='$a',department_id='$dep_id',sem_id='$semester', pic='$image'  where lecturer_id='".$_SESSION['lecturer_id']."'";
   
 mkdir("../lecturer/image/$eid");
     move_uploaded_file($_FILES['pic']['tmp_name'],"../lecturer/image/$eid/".$_FILES['pic']['name']);
	mysqli_query($con,$query);
	
	$err= "Profile Successfully updated..";
	
	}
	
?>
<div class="row" style="height:700px" >
<div class="col-md-5" > 
           
<h2><font color="black">Update Profile</font></h2>
<form method="POST" enctype="multipart/form-data">
  <table border="0" cellspacing="5" cellpadding="5" class="table">
  <tr>
  <td colspan="2"><?php echo @$err; ?></td>
  </tr>
  
   <tr>
   <th width="237" scope="row"><font color="black">Select Department</font></th>
    <td width="213">
	<select name="dep_id" id="courseid" onchange="showSemester(this.value)" class="form-control">
	<?php
	$sub=mysqli_query($con,"select * from department");
	while($s=mysqli_fetch_array($sub))
	{
		$s_id=$s[0];
		?>
		<option value='<?php echo $s_id; ?>' <?php if($s_id==$res['department_id']){echo "selected";} ?>><?php echo $s[1];?></option>
<?php 	}
	
	?>
    </select>
   
  </tr>
  
  </tr>
    <tr>
    <th width="237" scope="row"><font color="black">Semester Name</font> </th>
    <td width="213">
	
	<select name="semester" id="semester" class="form-control">
	<?php	
	$sem=mysqli_query($con,"select * from semester where department_id='".$res['department_id']."'");
	while($s=mysqli_fetch_array($sem))
	{
	$s_id=$s[0];
	?>
	<option value='<?php echo $s_id; ?>' <?php if($s_id==$res['sem_id']){echo "selected";} ?>>
	<?php echo $s[1]; ?>
	</option>
	<?php
	}
	?>
	
	
    </select>
	</td>
	
	</tr>

  
   <tr>
    <th width="237" scope="row"><font color="black">lecturer Name</font> </th>
    <td width="213"><input type="text" name="n" class="form-control" value="<?php echo $res['name'];?>"/></td>
  </tr>
  
   <tr>
    <th width="237" scope="row"><font color="black">Email</font> </th>
    <td width="213"><input type="text" name="e" class="form-control" value="<?php echo $res['eid'];?>"/></td>
  </tr>
  
   <tr>
    <th width="237" scope="row"><font color="black">Password</font> </th>
    <td width="213"><input type="text" name="p" class="form-control" value="<?php echo $res['password'];?>"/></td>
  </tr>
  
   <tr>
    <th width="237" scope="row"><font color="black">Mobile</font></th>
    <td width="213"><input type="text" name="m" class="form-control" value="<?php echo $res['mob'];?>"/></td>
  </tr>
  
   <tr>
    <th width="237" scope="row"><font color="black">Address</font></th>
    <td width="213"><input type="text" name="a" class="form-control" value="<?php echo $res['address'];?>"/></td>
  </tr>
  
   <tr>
    <th scope="row"><font color="black" size="3">Choose Profile Picture</font></th>
    <td><input type="file" name="pic" class="form-control" placeholder="enter your Pic" value="<?php echo $res['pic']; ?>"/></td>
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
               
                

</div>