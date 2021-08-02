<?php
include('../config.php');

$timeschedule_id=$_REQUEST['timeschedule_id'];
$q=mysqli_query($con,"select * from timeschedule where timeschedule_id='$timeschedule_id'");
$res=mysqli_fetch_array($q);
$qs=mysqli_query($con,"select * from subject where subject_id=".$res['subject_name']."");
$resub=mysqli_fetch_array($qs);

extract($_POST);
$messages = $_POST['lect-info'];
if(isset($_POST['lecturer-info']))
{
 if (empty($messages)) {
	 # code...
	 $err="<font ><b class='feed-d'><i class='fas fa-allergies'></i> - Please Wait;  Empty field, Fill in Something in the Message box..!</b></font>";
  
	}
	else {
		# code...
  mysqli_query($con,"update subject set inform_message ='$messages' where timeschedule_id='$timeschedule_id' ");
	
	$err="<font color='green'><b class='feed'><i class='fas fa-check-circle'></i>Thank You; Announcement added Successfully..!</b></font>";
	
	
	}
}
echo $err;
?>

<style>
.feed-d{
  background: rgba(255, 255, 255, 0.856);
  border:1px solid rgb(255, 40, 40);
  color:rgba(231, 9, 9, 0.918);
  padding:1.2%;
  border-radius:5px;
  width:60%;
  text-align:center;
}
.feed{
  background: rgba(193, 245, 232, 0.842);
  border:1px solid rgba(39, 233, 71, 0.918);
  color:rgba(7, 119, 26, 0.918);
  padding:1.2%;
  border-radius:5px;
  width:60%;
  text-align:center;
}
table{
  background: rgba(241, 232, 230, 0.63);
  width:90%;
  padding:2%;
  font-family: clibri;
  font-size:16px;
  
}
th{
	text-align:center;
	background: rgba(250, 133, 133, 0.801);
}
tr{
text-align:left;
}
tr td{
 width:250px;
padding:2%;
border-bottom:1px solid red;
}
.pix{
  width:100px;
	text-align:center;
}
textarea{
  float:center;
	text-align:center;
	padding:5%;
}
.TBheading{
	background:black;
	color:white;
}
.TBheading b{
	color:rgb(230, 160, 55);
	cursor: pointer;
}
button{
	background:rgb(25, 121, 54);
	color:white;
	padding:1%;
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

  $que2=mysqli_query($con,"select *  from week where week_id='".$res['week_id']."'  ");
		$res2=mysqli_fetch_array($que2);
   	//display subject course unit 
		$que3=mysqli_query($con,"select * from subject where subject_id='".$res['subject_name']."'");
		$res3=mysqli_fetch_array($que3);
    
    $que5=mysqli_query($con,"select * from lecturer where lecturer_id='".$res['lecturer_id']."'");
		$res5=mysqli_fetch_array($que5);
		echo '<form action="staffdashboard.php?info=add-info&timeschedule_id=Add-info" method="POST">';
		echo"<table>";
     echo "<tr class='TBheading'> <td colspan='3'> SCHEDULE INFORMATION OF CLASS: <b>'".$res3['subject_name']."'</b> LECTURER NAME:  <b>" .$res5['name']." </b>. </td></tr>" ;
    echo "<tr> <th> BASICS</th> <th>DETAILS </th><th> ADD INFORMATION </th></tr><br>" ;
		echo "<tr> <td> Day: </td> <td>".$res2['day_lable']."</td><td class='pix' rowspan='9'> 
  <b>Message</b>
  <textarea name='lect-info' id='lect-info' cols='30' rows='20' placeholder='Enter here message to inform your class'></textarea>
  </td></tr>" ;
				//display class/year of study 
		$que3=mysqli_query($con,"select *  from class where class_id='".$res['class_lable']."' ORDER BY department_id");
		$res3=mysqli_fetch_array($que3);

  echo "<tr> <td> <b>Class:</b> </td> <td>" .$res3['class_name']. "</td></tr>" ;

 // echo "<tr> <td> Course Unit/Subject: </td> <td>" .$res3['subject_name']. "</td><td> </td></tr>" ;

		//display lecturer room label
		$que4=mysqli_query($con,"select * from room where room_id='".$res['room_lable']."'");
		$res4=mysqli_fetch_array($que4);
		
		$que41=mysqli_query($con,"select * from department where department_id='".$res4['department_id']."'");
		$res41=mysqli_fetch_array($que41);

  echo "<tr> <td> Lecture Room Number/Name: </td> <td>" .$res4['room_lable']. "</td></tr>" ;
  echo "<tr> <td> Room Location: </td> <td>" .$res41['department_name']. "</td></tr>" ;
			//display time frame
		$quedd=mysqli_query($con,"select * from durations where due_id='".$res['duration']."'");
		$resp=mysqli_fetch_array($quedd);
		
	//echo "<td>".$resp['period']."</td>" ;
		
		//display time frame
		$que1=mysqli_query($con,"select * from timeschedule where star_time='".$res['star_time']."' && end_time='".$res['end_time']."' ");
		$res1=mysqli_fetch_array($que1);
	//	date_default_timezone_get('h:i:sa');
   echo "<tr> <td> Duration: </td> <td>" .$resp['period']."</td></tr>" ;
		echo "<tr> <td> Start Time (FROM): </td> <td>".$res1['star_time']."</td></tr>" ;
    echo "<tr> <td> End Time (TO): </td> <td>" .$res1['end_time']. "</td></tr>" ;
   

		//display lecturer name

    echo "<tr> <td> Your Name: </td> <td>" .$res5['name']."</td>  </tr>" ;
    echo "<tr> <td> Your Email: </td> <td>" .$res5['eid']."</td></tr>" ;

	  echo '<tr style="background:rgba(138, 245, 239, 0.644);"> <td>	<h4 style="text-align:center; size:14;color:green;"><i>Hopefully you are all set.</i></h4> </td><td> </td> <td class="pix">	<center><button name="lecturer-info" type="submit">Add Announcement</button></center> </td></tr>' ;



    echo"</table>";
		echo "</form>"

		?>
