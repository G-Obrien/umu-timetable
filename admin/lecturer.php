<script>
	function deleteData(id)
	{
		if(confirm("You want to delete ?"))
		{
		window.location.href="deletelecturer.php?lecturer_id="+id;
		}
	
	}
</script>
<style>
table tr td{
	width:fit-content;
	font-size:12px;
	padding-right:1px;
}
table{
	width:fit-content;
	font-size:12px;
}

</style>
<?php 
include('../config.php');


echo "<table border='1' class='table'>";
echo "<tr class='danger'><th colspan='54'> <center><h4>Registered Lecturers</h4></center></th></tr>";

echo "<tr class='danger'><th colspan='11'><a href='admindashboard.php?info=add_lecturer'>Add New Lecturer</a></th></tr>";

echo "<Tr><th>Lecturer Id</th><th>Lecturer Name</th><th>Email</th><th>Password</th><th>Mobile</th>
<th>Address</th><th>Department</th><th>Semester</th><th>Status</th><th>Update</th><th>Delete</th></tr>";

	$que=mysqli_query($con,"select *  from lecturer");
	while($res=mysqli_fetch_array($que))
	{
	echo "<Tr>";
	echo "<td>".$res['lecturer_id']."</td>" ;
	echo "<td>".$res['name']."</td>" ;
	echo "<td>".$res['eid']."</td>" ;
	echo "<td>".$res['password']."</td>" ;
	echo "<td>".$res['mob']."</td>" ;
	echo "<td>".$res['address']."</td>" ;
	
	//display department name
	$que2=mysqli_query($con,"select *  from department where department_id='".$res['department_id']."'");
	$res2=mysqli_fetch_array($que2);
	
	echo "<td>".$res2['department_name']."</td>" ;
	
	//display semester name
	$que1=mysqli_query($con,"select *  from semester where sem_id='".$res['sem_id']."'");
	$res1=mysqli_fetch_array($que1);
	
	
	echo "<td>".$res1['semester_name']."</td>" ;
	
	
	echo "<td>".$res['status']."</td>" ;
	echo "<td><a href='admindashboard.php?info=updatelecturer&lecturer_id=$res[lecturer_id]'>Update</a></td>";
	?>
    
<td><a href='javascript:deleteData("<?php echo  $res[lecturer_id];?>")'>Delete</a></td>
	<?php 
	echo "</tr>";
	}
	
echo "</table>";	

?>
