<?php 
include('../config.php');
extract($_POST);
if(isset($save))
{
//declear variable container.... for scheduling values,,..
$AccadeYr = $_POST['acadeYr'];
$day = $_POST['day-ID'];
$program = $_POST['program'];
$dep = $_POST['department'];
$sem = $_POST['sem'];
$class = $_POST['class-name'];
$subject = $_POST['subject_name'];
$start = $_POST['starttime'];
$endtime = $_POST['endtime'];
$duration = $_POST['duration'];
$room = $_POST['room_name'];
$lecturer = $_POST['lecturer-name'];
$lvID = $_POST['level'];
$ClassM = $_POST['mode'];

//checking for required conditions that match with the schedule constraints 

$que=mysqli_query($con,"select * from timeschedule");	//where department_name='$courseid' and semester_name='$s' and subject_name='$subject_name' and lecturer_id='$lecturer'
$row=mysqli_num_rows($que);
	if(empty($AccadeYr)|| empty($day)|| empty($program)|| empty($dep)|| empty($sem)||
   empty($class)|| empty($subject)|| empty($duration)|| empty($room)|| empty($lecturer) || empty($lvID)|| empty($ClassM))
	{
	$err="<font ><b class='feed-d'><i class='fas fa-allergies'></i> - Please Wait;  All fields are Mandatory, Fill all..!</b></font>";
	}
  /*/************* if room is occupied *********** 
  elseif ($day = $row['week_id'] && $subject = $row['subject_name']) {
    # code...
    	$err="<font ><b class='feed-d'>".$subject." is already scheduled on ".$day.", Please choose another day!</b></font>";
      exit();
  }
  //************* if room is occupied *********** */
   /* elseif ($day = $row['week_id']) {
    # code...
    	$err="<font ><b class='feed-d'><i class='fas fa-allergies'></i> - Please Wait; All fields are Mandatory, Please fill all!</b></font>";
    
  }
  //************* if pass time lectures *********** 
    elseif (condition) {
    # code...
    	$err="<font ><b class='feed-d'> <i class='fas fa-allergies'></i> - Please Wait; All fields are Mandatory, Please fill all!</b></font>";
      
  }
  //************* if a schedule is for evening class *********** *
    elseif (condition) {
    # code...
    	$err="<font ><b class='feed-d'><i class='fas fa-allergies'></i> - Please Wait;  All fields are Mandatory, Please fill all!</b></font>";
   
  }
   //************* if the duraation is too much  *********** *
    elseif (condition) {
    # code...
    	$err="<font ><b class='feed-d'><i class='fas fa-allergies'></i> - Please Wait; All fields are Mandatory, Please fill all!</b></font>";
   
  }
   //************* if the duration is less *********** *
    elseif (condition) {
    # code...
    	$err="<font ><b class='feed-d'><i class='fas fa-allergies'></i> - Please Wait; All fields are Mandatory, Please fill all!</b></font>";
   
  }
   //************* if a day is occupied *********** *
   //check for start-time of schedule, end-time of curent class, of the same day, end-time for dailylecture
    elseif (condition) {
    # code...
    	$err="<font ><b class='feed-d'><i class='fas fa-allergies'></i> - Please Wait; All fields are Mandatory, Please fill all!</b></font>";
  
  }

  */
  //if no error, we insert our schedules
	else
	{
mysqli_query($con,"insert into timeschedule 
    values('','$AccadeYr','$day', '$program', '$dep', '$sem', '$class', '$subject', '$start', '$endtime' ,'$duration', '$room', '$lecturer', '$lvID', '$ClassM')");	

	$err="<font color='green'><b class='feed'><i class='fas fa-check-circle'></i>Thank You; Schedule Was Successfull..! <a href='admindashboard.php?info=timetable'> View </a> </b></font>";
	//$err=$courseid.",".$s.",".$subject_name;
	 // (timeschedule_id, yr_id, week_id, program_name, department_name,semester_name, class_lable, subject_name, star_time, end_time, duration, room_lable, lecturer_id, class_level, class_mode )
	}
	
}

?>
 
<script>
function showSubject(str)
{
if (str=="")
{
document.getElementById("txtHint").innerHTML="";
return;
}

if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}



xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==150)
{
document.getElementById("subject").innerHTML=xmlhttp.responseText;
}
}
//alert(str);
xmlhttp.open("GET","subject_ajax.php?id="+str,true);
xmlhttp.send();
}
</script>

<script>
function showSemester(str)
{
if (str=="")
{
document.getElementById("txtHint").innerHTML="";
return;
}

if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}



xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==150)
{
document.getElementById("semester").innerHTML=xmlhttp.responseText;
}
}
//alert(str);
xmlhttp.open("GET","semester_ajax.php?id="+str,true);
xmlhttp.send();
}
</script>

 <script type="text/javascript">
      //scripts for ajax to change dependent values
      
        $(document).ready(function(){
          $("#department").change(function(){
            var department_id=$(this).val();
            $.ajax({
              url:"admindashboard.php?info=add_timetable",
              method:"POST",
              data:{DepartID:department_id},
              success:function(data){
                $("#program").html(data);
              }
            });
          });
        });

 </script>

<div class="row">
<div class="col-sm-12">
<h2>Add New Schedule</h2>
<form method="POST" enctype="multipart/form-data">
  <table border="0" class="table" width="70%">
  <tr>
  <td colspan="9" padding="2px"><?php echo @$err; ?></td>
  </tr>

  <tr class="settings1">
    <td width="150">
    <h4><b>ACADEMIC or CLASS LEVEL:</b> </h4>
    <select name="level" class="form-control"  id="level" required>
      <option disabled selected >Select Academic Level</option>
    <?php 
    
    //selecting study levels 
    $lev=mysqli_query($con,"select * from levels ORDER BY lv_name");
    while($lv=mysqli_fetch_array($lev))
    {
    $lv_id=$lv[0];
    echo "<option value='$lv_id'>".$lv[1]."</option>";
    }
   
    ?>
    </select>

    </td>
    <td width="150">
   
    </td>
    <td width="150">
    <h4><b>CLASS CATEGORY:</b></h4>
    <select name="mode" id="class"  class="form-control" required>
      <option disabled selected >Select Class Mode</option>
      <option value=' FULL-TIME'>FULL TIME (DAY)</option>
      <option value=' LONG-DISTANT'>WEEK END (LONG DISTANT)</option>
     <!-- 
       <option value=' EVENING'><i color="red">TBC: EVENING</i></option>
      <option value=' ONLINE'><i color="red"> TBC : ONLINE</i></option>
     -->
    </select>
    </td>
  </tr>

 <tr class="settings">
    <td width="50" scope="row">
    <h4>Choose Academic Year:</h4>
    <select name="acadeYr" id="academicr" onchange="showSubject(this.value)" class="form-control" required>
      <option disabled selected >Select Academic Year</option>
      <?php 
        $sem=mysqli_query($con,"select * from 	acade_year");
        while($yr=mysqli_fetch_array($sem))
        {
        $sem_id=$yr[0];
        echo "<option value='$sem_id'>".$yr[1]."</option>";
        }
        ?>
    </select>
    </td>
    <td width="50">
      <h4>Choose Semester:</h4>
    <select name="sem" id="semester" onchange="showSubject(this.value)" class="form-control" required>
      <option disabled selected >Select Semester</option>
      <?php 
        $sem=mysqli_query($con,"select * from semester");
        while($s=mysqli_fetch_array($sem))
        {
        $sem_id=$s[0];
        echo "<option value='$sem_id'>".$s[1]."</option>";
        }
        ?>
    </select>
    <!-- sem, acedemic year--->
    </td>
    <td width="150">
    <h4>Select Department/Faculty: </h4>
    <select name="department" class="form-control" onchange="showSemester(this.value)" id="department" required>
      <option disabled selected >Select Department</option>
    <?php 
    
    $dep=mysqli_query($con,"select * from department ORDER BY department_name");
    while($dp=mysqli_fetch_array($dep))
    {
    //$dp_id=$dp[0];
    echo "<option value=".$dp['department_id'].">".$dp['department_name']."</option>";
    }
    ?>
    
      </select>
    </td>
  </tr>


  <tr class="settings1">
    <td width="150">
    <h4>Choose Programme/Course: </h4>
    <select name="program" class="form-control" onchange="showSemester(this.value)" id="program" required>
      <option disabled selected >Select Course</option>
    <?php 
    
    //selecting program from a specified faculty
    $prog=mysqli_query($con,"select * from program ORDER BY program_name");
    while($pro=mysqli_fetch_array($prog))
    {
    $pro_id=$pro[0];
    echo "<option value='$pro_id'>".$pro[2]."</option>";
    }
    //selecting program from a specified faculty/*
    /*
    $output ='';
    $prog=mysqli_query($con,"select * from program WHERE department_id =".$_POST['DepartID']."' ORDER BY program_name");
    $output .='<option value="" Disabled Selected> - Select Course/Program - </option>';
    while($pro=mysqli_fetch_array($prog))
    {
    //$pro_id=$pro[0]; 
    $output .='<option value="'.$pro["program_id"].'">'.$pro["program_name"]. '</option>'; 
    
    }
   echo $output;*/
    ?>
    </select>

    </td>
    <td width="150">
    <h4>Course Unit/Subject:</h4>
    <select name="subject_name" id="subject"  class="form-control" required>
      <option disabled selected >Select Course Units/Subject + Code</option>
      <?php 
            $sub=mysqli_query($con,"select * from subject ORDER BY department_id");
            while($sjc=mysqli_fetch_array($sub))
            {
            $sub_id=$sjc[0];
            echo "<option value='$sub_id'>". $sjc[2].  "<b> ( " . $sjc[1]. " )</b> </option>";
            }
        ?>
    </select>
    </td>
    <td width="150">
    <h4>Choose Class:</h4>
    <select name="class-name" id="class"  class="form-control" required>
      <option disabled selected >Select Class</option>
      <?php 
            $class=mysqli_query($con,"select * from class ORDER BY class_name");//where department_id =  $dp_id
            while($cla=mysqli_fetch_array($class))
            {
            $cla_id=$cla[0];
            echo "<option value=' $cla_id'>".$cla[1]."</option>";
            }
        ?>
    </select>
    </td>
  </tr>
  <tr class="settings">
    <td width="150">
        <h4>Lecturer:</h4>
    <select name="lecturer-name" id="lecturerid"  class="form-control" required>
    <!-- onchange="showlecturer(this.value)" = this will display name of lecturer in first field.. -->
    <option disabled selected >Select Lecturer</option>
      <?php
          $t=mysqli_query($con,"select * from lecturer ORDER BY name");
          while($s=mysqli_fetch_array($t))
          {
            $t_id=$s[0];
            echo "<option value='$t_id'>".$s[1]."</option>";
          }
          
      ?>
    </td>
    <td width="150">
        <h4>Choose Lecture Room:</h4>
      <select name="room_name" id="roomt"  class="form-control" required>
      <option disabled selected >Select Room</option>
      <?php 
            $room=mysqli_query($con,"select * from room ORDER BY room_lable");
            while($ro=mysqli_fetch_array($room))
            {
            $room_id=$ro[0];
            echo "<option value='$room_id'>".$ro[1] ."</option>";
            }
        ?>
    </select>
    
    </td>
      <td width="150">
            <h4>Select Week Day</h4>
          <select name="day-ID" id="week"  class="form-control" required>
          <option disabled selected >Select Day</option>
          <?php 
                $days=mysqli_query($con,"select * from week");
                while($dy=mysqli_fetch_array($days))
                {
                $day_id=$dy[0];
                echo "<option value='$day_id'>".$dy[1] ."</option>";
                }
            ?>
        </select>
      </td>
  </tr>

  <tr class="settings1">
    <td width="150">
          <h4>Select Class Duration</h4>
        <select name="duration" id="duration"  class="form-control" required>
        <option disabled selected >Select Class duration</option>
        <?php 
              $time=mysqli_query($con,"select * from durations");
              while($du=mysqli_fetch_array($time))
              {
              $dur_id=$du[0];
              echo "<option value='$dur_id'>".$du[1] ."</option>";
              }
          ?>
      </select>
      </td>
      <td width="150">
            <h4>Start-Time:</h4>
            <input type="text" name="starttime" class="form-control" placeholder="07:30 AM" required/>
          </td>

          <td width="150">
            <h4>End-Time:</h4>
          <input type="text" name="endtime" class="form-control" placeholder="07:30 AM" required/>
        </td>
      </tr>

      <tr>
        <th colspan="1" scope="row"></th>
      <td>
      <input type="submit" value="Add Timetable" name="save" class="btn btn-success" />
      
      <input type="reset" value="Reset" class="btn btn-primary"/>
      </td>
  </tr>
  
  </table>
  </form>
  </div>
  </div>
<hr class="guide">
  <h3>NOTICE:</h3>
<style>
  .guide{
background:brown;
height:2px;

  }
.row{
  width:80%;
  text-align:center;
  font-family:calibri;
  size:16px;
}
.settings{
  background:rgba(214, 214, 218, 0.808);
  text-align:left;
}
.settings .form-control{
  width:200px;
}
.settings1 .form-control{
  width:200px;);
  text-align:left;
}
.settings1{
  background:rgba(242, 255, 224, 0.808);
  text-align:left;
}
.settings .form-control{
  width:200px;
}
.settings, .settings1, h4{
font-weight:400;
}
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
.feed a{
  background: white;
  color:red;
  padding:5px;
  border-radius:8px;

}
</style>

<?php 