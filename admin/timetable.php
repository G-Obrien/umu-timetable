<script>
	function deleteData(id)
	{
		if(confirm("Do You want to delete ?"))
		{
		window.location.href="delete_timetable.php?timeschedule_id="+id;
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
</style>

<?php 
include('../config.php');

 //<!--data display   SELECT * FROM `timeschedule` ORDER BY `timeschedule`.`department_name` ASC --> 

	echo "<table border='1' class='table'>";
	echo '<tr class="danger"><th colspan="9">
	<form action="admindashboard.php?info=timetable" method="post" class="form2">
	<button type="submit" name="agric" class="agric">FACULTY OF <br> AGRICULTURE</button>
	<button type="submit" name="bam" class="bam">FACULTY OF <br>  BAM </button>
	<button type="submit" name="fobe" class="fobe">FACULTY OF <br> BUILT ENV^T</button>
	<button type="submit" name="educ" class="educ">FACULTY OF <br> EDUCATION</button>
	<button type="submit" name="law" class="law">FACULTY OF <br> LAW</button>
	<button type="submit" name="lang" class="lang"> LANGUAGES & <br> COMM SKILLS</button>
	<button type="submit" name="science" class="sci">FACULTY OF <br> SCIENCE</button>
	<button type="submit" name="sass" class="sass">FACULTY OF <br> SASS</button>
	<button type="submit" name="diploma" class="dip">DIPLOMA <br> PROGRAM</button>
	<button type="submit" name="master" class="mas"> MASTER <br> PROGRAM</button>
	</form>

	</center>
	</th></tr>';
	?>
	<?php
	$units = 1; //this the results counts
		//echo languages and communication skills time schedules
if (isset($_POST['lang'])) {
				# code...
	echo "<table border='1' class='table'>";
	echo "<tr class='danger'><th colspan='9'>
	<center>
	<a href='admindashboard.php?info=timetable'>
	<h3>INSTITUTE OF LANGUAGE AND COMMUNICATION SKILLS LECTURE TIMETABLE FOR ACCADEMIC YEAR 2020-2021, SEM I</h3> </a>

	</th></tr>";

	echo "<Tr class='header-title'>
	<th>#</th>
	<th>Day</th>
	<th>Time-Frame (Duration)</th>
	<th>Class/Year</th>
	<th>Course Units</th>
	<th>Room # Location</th>
	<th>Lecturer Name</th>
	<th>Update</th>
	<th>Delete</th>
	</tr>";

  $que=mysqli_query($con,"select *  from timeschedule where department_name = 8 ORDER BY week_id");
	while($res=mysqli_fetch_array($que))
	{
	echo "<tr class='lang'>";
	echo "<td>".$units++."</td>" ;
	
	//display days of the week
	$que2=mysqli_query($con,"select *  from week where week_id='".$res['week_id']."'");
	$res2=mysqli_fetch_array($que2);
	
	echo "<td>".$res2['day_lable']."</td>" ;
	
		//display time frame
	$quedd=mysqli_query($con,"select * from durations where due_id='".$res['duration']."'");
	$resp=mysqli_fetch_array($quedd);
	
 //echo "<td>".$resp['period']."</td>" ;
	

	//display time frame
	$que1=mysqli_query($con,"select * from timeschedule where star_time='".$res['star_time']."' && end_time='".$res['end_time']."'");
	$res1=mysqli_fetch_array($que1);
 //	date_default_timezone_get('h:i:sa');
	echo "<td>".$res1['star_time']." - " .$res1['end_time']. " <br> [ <i> " .$resp['period']. " </i>]"."</td>" ;
	

	//display class/year of study 
	$que3=mysqli_query($con,"select *  from class where class_id='".$res['class_lable']."'");
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
	
	

	echo "<td><a href='admindashboard.php?info=updatetimetable&timeschedule_id=$res[timeschedule_id]'>Update</a></td>";
	?>
			
		<td>
		<a href='javascript:deleteData("<?php echo  $res['timeschedule_id'];?>")'>Delete</a></td>
		<?php
		echo "</tr>";
		}		
	echo "</table>";
}
?>
<?php 
		//echo bam faculty time schedules
if (isset($_POST['bam'])) {
				# code...
	echo "<table border='1' class='table'>";
	echo "<tr class='danger'><th colspan='9'>
	<center>
	<a href='admindashboard.php?info=timetable'>
	<h3>FACULTY OF BUSINESS ADMINISTRATION ADN MANAGEMENT LECTURE TIMETABLE FOR ACCADEMIC YEAR 2020-2021, SEM I</h3> </a>

	</th></tr>";

	echo "<Tr class='header-title'>
	<th>#</th>
	<th>Day</th>
	<th>Time-Frame (Duration)</th>
	<th>Class/Year</th>
	<th>Course Units</th>
	<th>Room # Location</th>
	<th>Lecturer Name</th>
	<th>Update</th>
	<th>Delete</th>
	</tr>";

 $que=mysqli_query($con,"select *  from timeschedule where department_name = 2 ORDER BY week_id");
	while($res=mysqli_fetch_array($que))
	{
	echo "<tr class='bam'>";
	echo "<td>".$units++."</td>" ;
	
	//display days of the week
	$que2=mysqli_query($con,"select *  from week where week_id='".$res['week_id']."'");
	$res2=mysqli_fetch_array($que2);
	
	echo "<td>".$res2['day_lable']."</td>" ;
	
		//display time frame
	$quedd=mysqli_query($con,"select * from durations where due_id='".$res['duration']."'");
	$resp=mysqli_fetch_array($quedd);
	
 //echo "<td>".$resp['period']."</td>" ;
	

	//display time frame
	$que1=mysqli_query($con,"select * from timeschedule where star_time='".$res['star_time']."' && end_time='".$res['end_time']."'");
	$res1=mysqli_fetch_array($que1);
 //	date_default_timezone_get('h:i:sa');
	echo "<td>".$res1['star_time']." - " .$res1['end_time']. " <br> [ <i> " .$resp['period']. " </i>]"."</td>" ;
	

	//display class/year of study 
	$que3=mysqli_query($con,"select *  from class where class_id='".$res['class_lable']."'");
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
	
	

	echo "<td><a href='admindashboard.php?info=updatetimetable&timeschedule_id=$res[timeschedule_id]'>Update</a></td>";
	?>
			
		<td>
		<a href='javascript:deleteData("<?php echo  $res['timeschedule_id'];?>")'>Delete</a></td>
		<?php
		echo "</tr>";
	
		}		
		echo "</table>";		
}
?>
<?php 
		//echo educ faculty time schedules
if (isset($_POST['educ'])) {
				# code...
	echo "<table border='1' class='table'>";
	echo "<tr class='danger'><th colspan='9'>
	<center>
	<a href='admindashboard.php?info=timetable'>
	<h3>FACULTY OF EDUCATION LECTURE TIMETABLE FOR ACCADEMIC YEAR 2020-2021, SEM I</h3> </a>

	</th></tr>";

	echo "<Tr class='header-title'>
	<th>#</th>
	<th>Day</th>
	<th>Time-Frame (Duration)</th>
	<th>Class/Year</th>
	<th>Course Units</th>
	<th>Room # Location</th>
	<th>Lecturer Name</th>
	<th>Update</th>
	<th>Delete</th>
	</tr>";

 $que=mysqli_query($con,"select *  from timeschedule where department_name = 4 ORDER BY week_id");
	while($res=mysqli_fetch_array($que))
	{
	echo "<tr class='educ'>";
	echo "<td>".$units++."</td>" ;
	
	//display days of the week
	$que2=mysqli_query($con,"select *  from week where week_id='".$res['week_id']."'");
	$res2=mysqli_fetch_array($que2);
	
	echo "<td>".$res2['day_lable']."</td>" ;
	
		//display time frame
	$quedd=mysqli_query($con,"select * from durations where due_id='".$res['duration']."'");
	$resp=mysqli_fetch_array($quedd);
	
 //echo "<td>".$resp['period']."</td>" ;
	

	//display time frame
	$que1=mysqli_query($con,"select * from timeschedule where star_time='".$res['star_time']."' && end_time='".$res['end_time']."'");
	$res1=mysqli_fetch_array($que1);
 //	date_default_timezone_get('h:i:sa');
	echo "<td>".$res1['star_time']." - " .$res1['end_time']. " <br> [ <i> " .$resp['period']. " </i>]"."</td>" ;
	

	//display class/year of study 
	$que3=mysqli_query($con,"select *  from class where class_id='".$res['class_lable']."'");
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
	
	

	echo "<td><a href='admindashboard.php?info=updatetimetable&timeschedule_id=$res[timeschedule_id]'>Update</a></td>";
	?>
			
		<td>
		<a href='javascript:deleteData("<?php echo  $res['timeschedule_id'];?>")'>Delete</a></td>
		<?php
		echo "</tr>";
	
		}	
			echo "</table>";	
}
?>
<?php 
		//echo FoBe time schedules
if (isset($_POST['fobe'])) {
				# code...
	echo "<table border='1' class='table'>";
	echo "<tr class='danger'><th colspan='9'>
	<center>
	<a href='admindashboard.php?info=timetable'>
	<h3>FACULTY OF BUILT ENVIRONMENT LECTURE TIMETABLE FOR ACCADEMIC YEAR 2020-2021, SEM I</h3> </a>

	</th></tr>";

	echo "<Tr class='header-title'>
	<th>#</th>
	<th>Day</th>
	<th>Time-Frame (Duration)</th>
	<th>Class/Year</th>
	<th>Course Units</th>
	<th>Room # Location</th>
	<th>Lecturer Name</th>
	<th>Update</th>
	<th>Delete</th>
	</tr>";

 $que=mysqli_query($con,"select *  from timeschedule where department_name = 3 ORDER BY week_id");
	while($res=mysqli_fetch_array($que))
	{
	echo "<tr class='fobe'>";
	echo "<td>".$units++."</td>" ;
	
	//display days of the week
	$que2=mysqli_query($con,"select *  from week where week_id='".$res['week_id']."'");
	$res2=mysqli_fetch_array($que2);
	
	echo "<td>".$res2['day_lable']."</td>" ;
	
		//display time frame
	$quedd=mysqli_query($con,"select * from durations where due_id='".$res['duration']."'");
	$resp=mysqli_fetch_array($quedd);
	
 //echo "<td>".$resp['period']."</td>" ;
	

	//display time frame
	$que1=mysqli_query($con,"select * from timeschedule where star_time='".$res['star_time']."' && end_time='".$res['end_time']."'");
	$res1=mysqli_fetch_array($que1);
 //	date_default_timezone_get('h:i:sa');
	echo "<td>".$res1['star_time']." - " .$res1['end_time']. " <br> [ <i> " .$resp['period']. " </i>]"."</td>" ;
	

	//display class/year of study 
	$que3=mysqli_query($con,"select *  from class where class_id='".$res['class_lable']."'");
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
	
	

	echo "<td><a href='admindashboard.php?info=updatetimetable&timeschedule_id=$res[timeschedule_id]'>Update</a></td>";
	?>
			
		<td>
		<a href='javascript:deleteData("<?php echo  $res['timeschedule_id'];?>")'>Delete</a></td>
		<?php
		echo "</tr>";
		
		}	
			echo "</table>";
}
?>
<?php 
		//echo law time schedules
if (isset($_POST['law'])) {
				# code...
	echo "<table border='1' class='table'>";
	echo "<tr class='danger'><th colspan='9'>
	<center>
	<a href='admindashboard.php?info=timetable'>
	<h3>FACULTY OF LAWS LECTURE TIMETABLE FOR ACCADEMIC YEAR 2020-2021, SEM I</h3> </a>

	</th></tr>";

	echo "<Tr class='header-title'>
	<th>#</th>
	<th>Day</th>
	<th>Time-Frame (Duration)</th>
	<th>Class/Year</th>
	<th>Course Units</th>
	<th>Room # Location</th>
	<th>Lecturer Name</th>
	<th>Update</th>
	<th>Delete</th>
	</tr>";

 $que=mysqli_query($con,"select *  from timeschedule where department_name = 1 ORDER BY week_id");
	while($res=mysqli_fetch_array($que))
	{
	echo "<tr class='law'>";
	echo "<td>".$units++."</td>" ;
	
	//display days of the week
	$que2=mysqli_query($con,"select *  from week where week_id='".$res['week_id']."'");
	$res2=mysqli_fetch_array($que2);
	
	echo "<td>".$res2['day_lable']."</td>" ;
	
		//display time frame
	$quedd=mysqli_query($con,"select * from durations where due_id='".$res['duration']."'");
	$resp=mysqli_fetch_array($quedd);
	
 //echo "<td>".$resp['period']."</td>" ;
	

	//display time frame
	$que1=mysqli_query($con,"select * from timeschedule where star_time='".$res['star_time']."' && end_time='".$res['end_time']."'");
	$res1=mysqli_fetch_array($que1);
 //	date_default_timezone_get('h:i:sa');
	echo "<td>".$res1['star_time']." - " .$res1['end_time']. " <br> [ <i> " .$resp['period']. " </i>]"."</td>" ;
	

	//display class/year of study 
	$que3=mysqli_query($con,"select *  from class where class_id='".$res['class_lable']."'");
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
	
	

	echo "<td><a href='admindashboard.php?info=updatetimetable&timeschedule_id=$res[timeschedule_id]'>Update</a></td>";
	?>
			
		<td>
		<a href='javascript:deleteData("<?php echo  $res['timeschedule_id'];?>")'>Delete</a></td>
		<?php
		echo "</tr>";
		
		}
			echo "</table>";
}
?>
<?php 
	//echo sass time schedules
if (isset($_POST['sass'])) {
				# code...
	echo "<table border='1' class='table'>";
	echo "<tr class='danger'><th colspan='9'>
	<center>
	<a href='admindashboard.php?info=timetable'>
	<h3>SCHOOL OF ARTS AND SOCIAL SCIENCES  LECTURE TIMETABLE FOR ACCADEMIC YEAR 2020-2021, SEM I</h3> </a>

	</th></tr>";

	echo "<Tr class='header-title'>
	<th>#</th>
	<th>Day</th>
	<th>Time-Frame (Duration)</th>
	<th>Class/Year</th>
	<th>Course Units</th>
	<th>Room # Location</th>
	<th>Lecturer Name</th>
	<th>Update</th>
	<th>Delete</th>
	</tr>";

 $que=mysqli_query($con,"select *  from timeschedule where department_name = 6");
	while($res=mysqli_fetch_array($que))
	{
	echo "<tr class='sass'>";
	echo "<td>".$units++."</td>" ;
	
	//display days of the week
	$que2=mysqli_query($con,"select *  from week where week_id='".$res['week_id']."'");
	$res2=mysqli_fetch_array($que2);
	
	echo "<td>".$res2['day_lable']."</td>" ;
	
		//display time frame
	$quedd=mysqli_query($con,"select * from durations where due_id='".$res['duration']."'");
	$resp=mysqli_fetch_array($quedd);
	
 //echo "<td>".$resp['period']."</td>" ;
	

	//display time frame
	$que1=mysqli_query($con,"select * from timeschedule where star_time='".$res['star_time']."' && end_time='".$res['end_time']."'");
	$res1=mysqli_fetch_array($que1);
 //	date_default_timezone_get('h:i:sa');
	echo "<td>".$res1['star_time']." - " .$res1['end_time']. " <br> [ <i> " .$resp['period']. " </i>]"."</td>" ;
	

	//display class/year of study 
	$que3=mysqli_query($con,"select *  from class where class_id='".$res['class_lable']."'");
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
	
	

	echo "<td><a href='admindashboard.php?info=updatetimetable&timeschedule_id=$res[timeschedule_id]'>Update</a></td>";
	?>
			
		<td>
		<a href='javascript:deleteData("<?php echo  $res['timeschedule_id'];?>")'>Delete</a></td>
		<?php
		echo "</tr>";
	
		}	
		echo "</table>";	
}
?>
<?php 
	//echo agric time schedules
if (isset($_POST['agric'])) {
				# code...
	echo "<table border='1' class='table'>";
	echo "<tr class='danger'><th colspan='9'>
	<center>
	<a href='admindashboard.php?info=timetable'>
	<h3>FACULTY OF AGRICULTURE LECTURE TIMETABLE FOR ACCADEMIC YEAR 2020-2021, SEM I</h3> </a>

	</th></tr>";

	echo "<Tr class='header-title'>
	<th>#</th>
	<th>Day</th>
	<th>Time-Frame (Duration)</th>
	<th>Class/Year</th>
	<th>Course Units</th>
	<th>Room # Location</th>
	<th>Lecturer Name</th>
	<th>Update</th>
	<th>Delete</th>
	</tr>";

 $que=mysqli_query($con,"select *  from timeschedule where department_name = 1 ORDER BY week_id");
	while($res=mysqli_fetch_array($que))
	{
	echo "<tr class='agric'>";
	echo "<td>".$units++."</td>" ;
	
	//display days of the week
	$que2=mysqli_query($con,"select *  from week where week_id='".$res['week_id']."'");
	$res2=mysqli_fetch_array($que2);
	
	echo "<td>".$res2['day_lable']."</td>" ;
	
		//display time frame
	$quedd=mysqli_query($con,"select * from durations where due_id='".$res['duration']."'");
	$resp=mysqli_fetch_array($quedd);
	
 //echo "<td>".$resp['period']."</td>" ;
	

	//display time frame
	$que1=mysqli_query($con,"select * from timeschedule where star_time='".$res['star_time']."' && end_time='".$res['end_time']."'");
	$res1=mysqli_fetch_array($que1);
 //	date_default_timezone_get('h:i:sa');
	echo "<td>".$res1['star_time']." - " .$res1['end_time']. " <br> [ <i> " .$resp['period']. " </i>]"."</td>" ;
	

	//display class/year of study 
	$que3=mysqli_query($con,"select *  from class where class_id='".$res['class_lable']."'");
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
	
	

	echo "<td><a href='admindashboard.php?info=updatetimetable&timeschedule_id=$res[timeschedule_id]'>Update</a></td>";
	?>
			
		<td>
		<a href='javascript:deleteData("<?php echo  $res['timeschedule_id'];?>")'>Delete</a></td>
		<?php
		echo "</tr>";
		
		}
		echo "</table>";
		
}
?>
<?php 
	//echo science time schedules
if (isset($_POST['science'])) {
				# code...
	echo "<table border='1' class='table'>";
	echo "<tr class='danger'><th colspan='9'>
	<center>
	<a href='admindashboard.php?info=timetable'>
	<h3>FACULTY OF SCIENCE LECTURE TIMETABLE FOR ACCADEMIC YEAR 2020-2021, SEM I</h3> </a>

	</th></tr>";

	echo "<Tr class='header-title'>
	<th>#</th>
	<th>Day</th>
	<th>Time-Frame (Duration)</th>
	<th>Class/Year</th>
	<th>Course Units</th>
	<th>Room # Location</th>
	<th>Lecturer Name</th>
	<th>Update</th>
	<th>Delete</th>
	</tr>";

 $que=mysqli_query($con,"select *  from timeschedule where department_name = 7 ORDER BY week_id");
	while($res=mysqli_fetch_array($que))
	{
	echo "<tr class='sci'>";
	echo "<td>".$units++."</td>" ;
	
	//display days of the week
	$que2=mysqli_query($con,"select *  from week where week_id='".$res['week_id']."'");
	$res2=mysqli_fetch_array($que2);
	
	echo "<td>".$res2['day_lable']."</td>" ;
	
		//display time frame
	$quedd=mysqli_query($con,"select * from durations where due_id='".$res['duration']."'");
	$resp=mysqli_fetch_array($quedd);
	
 //echo "<td>".$resp['period']."</td>" ;
	

	//display time frame
	$que1=mysqli_query($con,"select * from timeschedule where star_time='".$res['star_time']."' && end_time='".$res['end_time']."'");
	$res1=mysqli_fetch_array($que1);
 //	date_default_timezone_get('h:i:sa');
	echo "<td>".$res1['star_time']." - " .$res1['end_time']. " <br> [ <i> " .$resp['period']. " </i>]"."</td>" ;
	

	//display class/year of study 
	$que3=mysqli_query($con,"select *  from class where class_id='".$res['class_lable']."'");
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
	
	

	echo "<td><a href='admindashboard.php?info=updatetimetable&timeschedule_id=$res[timeschedule_id]'>Update</a></td>";
	?>
			
		<td>
		<a href='javascript:deleteData("<?php echo  $res['timeschedule_id'];?>")'>Delete</a></td>
		<?php
		echo "</tr>";
		}
		echo "</table>";	
	
}
?>
<?php 
	//echo All Deplomas time schedules
if (isset($_POST['diploma'])) {
				# code...
	echo "<table border='1' class='table'>";
	echo "<tr class='danger'><th colspan='9'>
	<center>
	<a href='admindashboard.php?info=timetable'>
	<h3>DIPLOMAS GENERAL LECTURE TIMETABLE FOR ACCADEMIC YEAR 2020-2021, SEM I</h3> </a>

	</th></tr>";

	echo "<Tr class='header-title'>
	<th>#</th>
	<th>Day</th>
	<th>Time-Frame (Duration)</th>
	<th>Class/Year</th>
	<th>Course Units</th>
	<th>Room # Location</th>
	<th>Lecturer Name</th>
	<th>Update</th>
	<th>Delete</th>
	</tr>";

 $que=mysqli_query($con,"select *  from timeschedule where lv_id = '1' ORDER BY week_id");
	while($res=mysqli_fetch_array($que))
	{
	echo "<tr class='sci'>";
	echo "<td>".$units++."</td>" ;
	
	//display days of the week
	$que2=mysqli_query($con,"select *  from week where week_id='".$res['week_id']."'");
	$res2=mysqli_fetch_array($que2);
	
	echo "<td>".$res2['day_lable']."</td>" ;
	
		//display time frame
	$quedd=mysqli_query($con,"select * from durations where due_id='".$res['duration']."'");
	$resp=mysqli_fetch_array($quedd);
	
 //echo "<td>".$resp['period']."</td>" ;
	

	//display time frame
	$que1=mysqli_query($con,"select * from timeschedule where star_time='".$res['star_time']."' && end_time='".$res['end_time']."'");
	$res1=mysqli_fetch_array($que1);
 //	date_default_timezone_get('h:i:sa');
	echo "<td>".$res1['star_time']." - " .$res1['end_time']. " <br> [ <i> " .$resp['period']. " </i>]"."</td>" ;
	

	//display class/year of study 
	$que3=mysqli_query($con,"select *  from class where class_id='".$res['class_lable']."'");
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
	
	

	echo "<td><a href='admindashboard.php?info=updatetimetable&timeschedule_id=$res[timeschedule_id]'>Update</a></td>";
	?>
			
		<td>
		<a href='javascript:deleteData("<?php echo  $res['timeschedule_id'];?>")'>Delete</a></td>
		<?php
		echo "</tr>";
		}
		echo "</table>";	
	
}
?>
<?php 
	//echo All Masters time schedules
if (isset($_POST['master'])) {
				# code...//display timetable for master class

	echo "<table border='1' class='table'>";
	echo "<tr class='danger'><th colspan='9'>
	<center>
	<a href='admindashboard.php?info=timetable'>
	<h3>MASTERS GENERAL LECTURE TIMETABLE FOR ACCADEMIC YEAR 2020-2021, SEM I</h3> </a>

	</th></tr>";

	echo "<Tr class='header-title'>
	<th>#</th>
	<th>Day</th>
	<th>Time-Frame (Duration)</th>
	<th>Class/Year</th>
	<th>Course Units</th>
	<th>Room # Location</th>
	<th>Lecturer Name</th>
	<th>Update</th>
	<th>Delete</th>
	</tr>";/*
	$findMasteClass = mysqli_query($con,"select * from levels");
		$find=mysqli_fetch_array($findMasteClass);
	//	echo "<td>".$find['lv_name']."</td>" ;*/

 $que=mysqli_query($con,"select *  from timeschedule where lv_id = '3' ORDER BY week_id");
	while($res=mysqli_fetch_array($que))
	{
	echo "<tr class='mas'>";
	echo "<td>".$units++."</td>" ;
	
	//display days of the week
	$que2=mysqli_query($con,"select *  from week where week_id='".$res['week_id']."'");
	$res2=mysqli_fetch_array($que2);
	
	echo "<td>".$res2['day_lable']."</td>" ;
	
		//display time frame
	$quedd=mysqli_query($con,"select * from durations where due_id='".$res['duration']."'");
	$resp=mysqli_fetch_array($quedd);
	
 //echo "<td>".$resp['period']."</td>" ;
	

	//display time frame
	$que1=mysqli_query($con,"select * from timeschedule where star_time='".$res['star_time']."' && end_time='".$res['end_time']."'");
	$res1=mysqli_fetch_array($que1);
 //	date_default_timezone_get('h:i:sa');
	echo "<td>".$res1['star_time']." - " .$res1['end_time']. " <br> [ <i> " .$resp['period']. " </i>]"."</td>" ;
	

	//display class/year of study 
	$que3=mysqli_query($con,"select *  from class where class_id='".$res['class_lable']."'");
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
	
	

	echo "<td><a href='admindashboard.php?info=updatetimetable&timeschedule_id=$res[timeschedule_id]'>Update</a></td>";
	?>
			
		<td>
		<a href='javascript:deleteData("<?php echo  $res['timeschedule_id'];?>")'>Delete</a></td>
		<?php
		echo "</tr>";
		}
		echo "</table>";	
	
}
?>

<?php 
//echo general timetable
echo "<table border='1' class='table'>";
echo "<tr class='danger'><th colspan='9'><b class='addBtn'><a href='admindashboard.php?info=add_timetable'>+ New Timetable </a></b></th></tr>";

	echo "<tr class='danger'><th colspan='9'>
	<center>
	<a href='admindashboard.php?info=timetable'>
	<h3>GENERAL LECTURE TIMETABLE FOR ACCADEMIC YEAR 2020-2021, SEM II</h3> </a>

		</th></tr>";
	
	echo "<Tr class='header-title'>
	<th>#</th>
	<th>Day</th>
	<th>Time-Frame (Duration)</th>
	<th>Class/Year</th>
	<th>Course Units</th>
	<th>Room # Location</th>
	<th>Lecturer Name</th>
	<th>Update</th>
	<th>Delete</th>
	</tr>";

	$que=mysqli_query($con,"select *  from timeschedule ORDER BY week_id");
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
		
		

		echo "<td><a href='admindashboard.php?info=updatetimetable&timeschedule_id=$res[timeschedule_id]'>Update</a></td>";
		?>
			
		<td>
		<a href='javascript:deleteData("<?php echo  $res['timeschedule_id'];?>")'>Delete</a></td>
		<?php
		echo "</tr>";
		}
		echo "</table>";	

?>