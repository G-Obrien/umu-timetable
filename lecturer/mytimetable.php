<script>
	/*function deleteData(id)
	{
		if(confirm("Do You want to delete ?"))
		{
		window.location.href="delete_timetable.php?timeschedule_id="+id;
		}
	
	}*/
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
td i{
	color:red;
	font-size:12px;
}

.addBtn{
	color:white;
	background: blue;
	padding:8px;
	border-radius:8px;
}
.addBtn a{
	color:white;
 decoration:none;
}

/* Faculty links/*/

button{
	color:white;
	font-weight: 600;
	padding:7px;
	border-radius:8px;
}
button:hover{
	background:rgba(151, 51, 51, 0.719);
	opacity: 80;
	transition:1s;
	color:white;
	font-weight: 590;
	padding:6px;
	border-radius:7px;
}
.agric{
 background:rgba(11, 131, 17, 0.575)5%;
	color:black;
}
.bam{
	background:rgba(170, 41, 245, 0.479)5%;
		color:black;
}
.fobe{
	background:rgba(31, 107, 221, 0.671)5%;
		color:black;
}
.educ{
	background:rgba(253, 147, 25, 0.808)5%;
		color:black;
}
.law{
	background:rgba(161, 78, 9, 0.685)5%;
	color:black;
}
.sci{
	background:rgba(255, 230, 6, 0.747)5%;
	color:black;
	
}
.lang{
	background:rgba(141, 241, 47, 0.795)5%;
			color:black;
}
.sass{
	background:rgba(106, 199, 236, 0.623)5%;
		color:black;
}
.dip{
	background:rgba(248, 241, 202, 0.719)5%;
		color:black;
}
.mas{
	background:rgba(255, 255, 255, 0.692)5%;
		color:black;
}
.form2{
	text-align:center;
	padding-top:5px;
	padding-bottom:5px;
	background: rgb(121, 41, 41);
}
.header-title{
	background: black;
	color:white;
}
button{
	background:rgb(25, 121, 54);
	color:white;
	padding:2%;
	border-radius:8px;
}
button:hover{
	background:rgba(130, 187, 56, 0.678);
	color:red;
	padding:2%;
	border-radius:5px;
	transition:1s;
}
</style>

<?php 
include('../config.php');
$units =1;
//echo general timetable
echo "<table border='1' class='table'>";
	echo "<tr class='danger'><th colspan='9'>
	<center>
	<a href='staffdashboard.php?info=mytimetable'>

	<h3>".$_SESSION['name']. "'s LECTURE TIMETABLE FOR ACCADEMIC YEAR 2020-2021, SEM II</h3> </a>

		</th></tr>";
	
	echo "<Tr class='header-title'>
	<th>#</th>
	<th>Day</th>
	<th>Time-Frame (Duration)</th>
	<th>Class/Year</th>
	<th>Course Units</th>
	<th>Room # Location</th>
	<th>Lecturer Name</th>
	<th>Action</th>
	</tr>";

	$que=mysqli_query($con,"select *  from timeschedule where lecturer_id = '".$_SESSION['lecturer_id']."' ORDER BY week_id");
		while($res=mysqli_fetch_array($que))
		{
		echo "<tr>";
		echo "<td>".$units++."</td>" ;
		
		//display days of the week
		$que2=mysqli_query($con,"select *  from week where week_id='".$res['week_id']."'  ");
		$res2=mysqli_fetch_array($que2);
		
		echo "<td>".$res2['day_lable']."</td>" ;
		
			//display time frame
		$quedd=mysqli_query($con,"select * from durations where due_id='".$res['duration']."'");
		$resp=mysqli_fetch_array($quedd);
		
	//echo "<td>".$resp['period']."</td>" ;
		
		//display time frame
		$que1=mysqli_query($con,"select * from timeschedule where star_time='".$res['star_time']."' && end_time='".$res['end_time']."' ");
		$res1=mysqli_fetch_array($que1);
	//	date_default_timezone_get('h:i:sa');
		echo "<td>".$res1['star_time']." - " .$res1['end_time']. " <br> [ <i> " .$resp['period']. " </i>]"."</td>" ;
		

		//display class/year of study 
		$que3=mysqli_query($con,"select *  from class where class_id='".$res['class_lable']."' ORDER BY department_id");
		$res3=mysqli_fetch_array($que3);
		echo "<td>".$res3['class_name']."</td>" ;

		//display course/program 
		$que3=mysqli_query($con,"select * from subject where program_id='".$res['program_id']."'");
		$res3=mysqli_fetch_array($que3);


		//display subject course unit 
		$que3=mysqli_query($con,"select * from subject where subject_id='".$res['subject_name']."'");
		$res3=mysqli_fetch_array($que3);
		echo "<td>".$res3['subject_name']."</td>" ;


		

		//display lecturer room label
		$que4=mysqli_query($con,"select * from room where room_id='".$res['room_lable']."'");
		$res4=mysqli_fetch_array($que4);
		
		$que41=mysqli_query($con,"select * from department where department_id='".$res4['department_id']."'");
		$res41=mysqli_fetch_array($que41);

		echo "<td>".$res4['room_lable']. "<br> [<i> ".$res41['department_name']." </i>]". "</td>" ;

		//display lecturer name
		$que5=mysqli_query($con,"select * from lecturer where lecturer_id='".$res['lecturer_id']."'");
		$res5=mysqli_fetch_array($que5);
		echo "<td>".$res5['name']."</td>" ;
	
		echo "<td> <a href='staffdashboard.php?info=add-info&timeschedule_id=$res[timeschedule_id]' method='post'><button name='AddInfo' type='submit'>Add Information</button></a> </td>";
		?>
			
		<?php
		echo "</tr>";
		}
		echo "</table>";	

?>

