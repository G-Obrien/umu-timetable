<script>
	function deleteData(id)
	{
		if(confirm("Do you want to remove the class..?"))
		{
		window.location.href="deleteclass.php?class_id="+id;
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
echo "<tr class='danger'><th colspan='54'> <center><h4>Bachelor Classes at Uganda Martyrs University</h4></center></th></tr>";
echo "<tr class='danger'><th colspan='6'><a href='admindashboard.php?info=add_class'>Add New class</a></th></tr>";

echo "<Tr><th>#Id</th>
<th>Class Name</th>
<th>Update</th><th>Delete</th></tr>";

	$que=mysqli_query($con,"select *  from class");
	while($res=mysqli_fetch_array($que))
	{
	echo "<Tr>";
	echo "<td>".$res['class_id']."</td>" ;
	echo "<td>".$res['class_name']."</td>" ;
	
	/*display department name
	$que2=mysqli_query($con,"select *  from department where department_id='".$res['department_id']."'");
	$res2=mysqli_fetch_array($que2);

	echo "<td>".$res2['department_name']."</td>" ;
		*/
	echo "<td><a href='admindashboard.php?info=updateclass&class_id=$res[class_id]'>Update</a></td>";
	?> 
	<td><a href='javascript:deleteData("<?php echo  $res[class_id];?>")'>Delete</a></td>
	<?php 
	echo "</tr>";
	}
	
echo "</table>";	

?>
