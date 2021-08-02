<script>
	function deleteData(id)
	{
		if(confirm("Do you want to delete this room..?"))
		{
		window.location.href="deleteroom.php?room_id="+id;
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
echo "<tr class='danger'><th colspan='54'> <center><h4>Lecture Rooms Available at Uganda Martyrs University</h4></center></th></tr>";
echo "<tr class='danger'><th colspan='6'><a href='admindashboard.php?info=add_room'>Add New Room lable</a></th></tr>";

echo "<Tr><th>Room Id</th>
<th>Room Name/Label</th>
<th>Department / Faculty (Room Location)</th>
<th>Update</th><th>Delete</th></tr>";

	$que=mysqli_query($con,"select *  from room");
	while($res=mysqli_fetch_array($que))
	{
	echo "<Tr>";
	echo "<td>".$res['room_id']."</td>" ;
	echo "<td>".$res['room_lable']."</td>" ;
	
	//display department name
	$que2=mysqli_query($con,"select *  from department where department_id='".$res['department_id']."'");
	$res2=mysqli_fetch_array($que2);
	
	echo "<td>".$res2['department_name']."</td>" ;
	echo "<td><a href='admindashboard.php?info=updateroom&room_id=$res[room_id]'>Update</a></td>";
	?> 
	<td><a href='javascript:deleteData("<?php echo  $res[room_id];?>")'>Delete</a></td>
	<?php 
	echo "</tr>";
	}
	
echo "</table>";	

?>
