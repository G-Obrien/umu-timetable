<?php
require_once('database/config-dbh.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<html lang="en">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="img/Logo.png" type="image/x-icon">
    <title>UMU Time Table System</title>
    
    <style>
	a{margin-left:15px;text-decoration:none; font-size:20px}
	a:hover{background:#FF0000;color:#FFFFFF;}
	.carousel-inner > .item > img,
	.carousel-inner > .item > a > 
	img { margin:auto;}
</style>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="css/animate.min.css" type="text/css">
    <script src="js/jquery-2.1.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>


    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/creative.css" type="text/css">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">
    <link href="css/owl.transitions.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    
    <![endif]-->

</head>
    <body>
    
      <!-- /.navbar -->
    
    <nav class="navbar navbar-inverse3 navbar-fixed-top" role="navigation">
    <div class="hedaer-line">
    <h1><b>U</b>ganda <b>M</b>artyrs <b>U</b>niversity</h1>
    </div>
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand"><font color="#FFf">Timetable Management System</font></a>
      
      <img src="img/menu.png" alt="menu-logo" class="menu-logo" onclick="menuToggle()">
    </div>
    
    <ul class="nav navbar-nav" id="nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a class="page-scroll" href="#about">About Us</a></li> 
      <li><a class="page-scroll" href="#contact">Contact Us</a></li>
      <li><a class="page-scroll" href="#registration">Registration</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Login
        <!---<span class="caret"></span>-->
        </a>
        <ul class="dropdown-menu">
          <li><a href="lecturer/index.php">Lecturer Login</a></li>
          <li><a href="student/index.php">Student Login</a></li> 
        </ul>
      </li> 
    </ul>
  </div>
</nav>
  <!-- /.Navigation menu hiding -->
<!---JS for menu toggle--->
<script>
/*
    var MenuItems = document.getElementById("nav");

    MenuItems.style.maxHeight = "0";
    function menuToggle(){
        if (MenuItems.style.maxHeight == "0%" ) {
            MenuItems.style.maxHeight = "100%";
            
        }
        else{
            MenuItems.style.maxHeight = "0%"; 
        }
    }
*/
</script>


   <!-- .navbar-end -->
   <style>
       .dropdown-menu li a{
           background:brown;
           font-size:14px;
       }
   .hedaer-line{
     height: 30px;
     background:black;
   }
   h1 b{
       color:red;
   }
    h1{
       font-family:stonehenge;
       color:white;
       text-align:center;
       margin-bottom: 20px;
        
   }
   .navbar-inverse3{
     background:black;
     height: 80px;
     margin:0%;
   }
   .container-fluid{
       background: brown;
       height: 40px;
   }
   ul {
       height: 30px;
   }
   .container-fluid ul li a{
       color:white;
       font-size:14px;
   }
   .container-fluid ul li a:hover{
       color:black;
       height:40px;
   }
   .menu-logo{
       display:none;
       padding-top:5px;
       width:30px;
       cursor: pointer;
       float:right;
       height: 26px;
   }
   ol li,p{
            font-size:13.5px;
        }
         .row h2{
font-size:16px;
    }
    .row div{
font-size:12px;
    }
        .row form{
font-size:12px;
    }
    .paw{
        width:100%;
    }
   @media(max-width:760px) {
       .menu-logo{
       display:block;
       padding-top:5px;
       width:30px;
       cursor: pointer;
       float:right;
       height: 26px;
   }
       .navbar-header a{
           font-size:12px;
       }
        h1{
            font-family:stonehenge;
            color:white;
            text-align:center;
            font: 1.3em stonehenge;
            margin-bottom: 12px;
                
        }
        .navbar-inverse3{
            height:fit-content;
            margin:0%;
        }
        .container-fluid{
            background: brown;
            height: fit-content;
        }
        ul {
            height: 30px;
        }
        .container-fluid ul{
            background: brown;
            color:white;
            justify-content:space-between;
            display:flex;
            width:100%;
            padding:0%;
        }
        .container-fluid ul li{
            color:white;
            font-size:6px;
            padding:0%;
            width:fit-content;
        }
        ol li,b, p{
            font-size:12px;
        }
         h1 b{
       font-size:18px;
         }
        .container-fluid ul li a{
            color:white;
            font-size:12px;
            padding:0%;
        }
        .container-fluid ul li a:hover{
            color:black;
            height:fit-content;
        }
        h2{
            font-size:12px;
        }
   
}
   </style>
        <!-- /.slider -->

<header>
        <div class="header-content">
            <div class="header-content-inner">
            <img src="img1/umu.png" alt="" width="70px">
                <h2>WELCOME TO NEW TIMETABLE MANAGEMENT SYSTEM</h2>
                <hr>
               
                <a href="#about" class="btn btn-primary btn-xl page-scroll">Find Out More</a>
            </div>
        </div>
    </header>

<!--container-->


  <section class="about" id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12 text-center">
                        <h2 class="section-heading">About UMU Timetable Management System</h2>
                        <hr class="primary">
                    </div>
                    
                    <div class="row mb90">
                        <div class="col-md-12 text-justify">
                        
                     <p>Uganda Martyrs University is a faith-based private University owned by Episcopal conference of the
                      Catholic Bishops of Uganda. Uganda Martyrs University was officially launched in 1993 by His Excellency
                       Yoweri Kaguta Museveni president of the Republic of Uganda. Uganda Martyrs University opened in 
                       October with 84 students and two academic departments that is, institute of Ethics and Development 
                       Studies and Faculty of Business Administration and Management. <br>
                UMU now has 7 Faculties/ academic departments. Each of these departments employs not less than 20 lecturers
                 who are lecturing at least one or more than one course units. Thus, these course units are registered by the
                  Head of Departments then submitted to the Timetable scheduling team/admin which constructs the final lecture
                   timetable for the whole campus/university. <br>
                Uganda Martyrs University currently has no computerized timetable management system running with the whole university’s 
                branches too. The proposed system catters for managing the university timetable from construction till viewing and making sure its fully functional. <br>
                <b>University Vision;</b><br>
                    >> To be a university that is nationally recognized for excellence in teaching, learning, research, advancement of knowledge and community engagement.
                <br>
                <b>University Mission;</b> <br>
                    >> To provide quality higher education, training and research for the betterment of society guided by ethical values.
                <br><b>University Core Values;</b>
                <ol>
                <li>Transparency</li>
                <li>Accountability</li>
                <li>Reliability</li>
                <li>Action based on institutional Ethos</li>
                <li>Quality </li>
                </ol>
                <b>University Motto;</b><br>
                <p>“Virtute et sapiential duc mundum”: In Virtue and Wisdom, Lead the World.</p> <br>
 </p>
                        </div>
<hr class="paw">
                    </div>
        </div>
                                
       <!--contact-->
             <section id="contact">
             <div class="row">
             <h2 class="section-heading" align="center">Contact Us</h2>
                        <hr class="primary">
                <div class="col-lg-offset-2 col-lg-8 text-center">
                     <h2 class="section-heading"> Let's Get In Touch</h2>
                  
                    </div>                   
            <div class="panel panel-warning bg-primary" style="padding:12px 25px;">
<?php 
include('config.php');
extract($_POST);
if(isset($save))
{
	
	mysqli_query($con,"insert into contactus values('','$name','$e','$s','$m')");
	

	$err="<font color='blue'>Congrats Your Data Saved!!!</font>";
	
}

?>
   <form method="POST">
 <div class="row" style="margin-bottom: 12px;">
 <?php echo @$err; ?>
  </div>       
    <div class="row" style="margin-bottom: 12px;">
        <input type="text" class="form-control" placeholder="Name" name="name"/>
    </div>
    <div class="row" style="margin-bottom: 12px;">
        <input type="email" class="form-control" placeholder="Email" name="e"/>
    </div>
    <div class="row" style="margin-bottom: 12px;">
        <input type="text" class="form-control" placeholder="Subject" name="s"/>
    </div>
    <div class="row" style="margin-bottom: 12px;">
        <textarea class="form-control" placeholder="Message" style="resize: vertical;max-height: 400px;" name="m"></textarea>
    </div>
    <div class="row" style="margin-bottom: 12px;">
        <input type="submit" value="SUBMIT" name="save" class="btn btn-success" />
    </div>
    </form>
    <div class="row" style="margin-bottom: 12px;">
    </div>
    </div>
    </div>
    
    <!-- REGISTRATION FORM-->
    
    <br/><br/>
<section id="registration">
<div class="row">
<h2 class="section-heading" align="center">Registration Form</h2>
        <hr class="primary">
<div class="col-lg-offset-2 col-lg-8 text-center">


<!--                    <i class="fa fa-phone fa-3x wow bounceIn"></i>
                    <p>123-456-6789</p>-->
<div class="panel panel-warning bg-primary" style="padding:12px 25px;">
   
<?php 
include('config.php');

extract($_POST);
$level = $_POST['level'];
$faculty = $_POST['departmenID'];
$courseid = $_POST['programID'];
$class = $_POST['year'];
$sem = $_POST['semester'];
$stname = $_POST['name'];
$eid = $_POST['email'];
$p = $_POST['password'];
$mobile = $_POST['pnone'];
$address = $_POST['address'];
$dob = $_POST['date'];
$image = $_FILES['pic']['name'];
$status = $_POST['status'];
$gender = $_POST['gen'];

if(isset($save))
{
$que=mysqli_query($con,"select * from student where eid='$eid' and mob='$mobile'");
$row=mysqli_num_rows($que);
	if($row)
	{
	$err="<font color='red'>Student already exist!</font>";
	}
	else
	{
    mysqli_query($con,"insert into student(stu_id, name, eid, password, mob, address, program_id, department_id, class_id, sem_id, dob, pic, gender,	status, lv_id, date) 
         values('','$stname','$eid','$p','$mobile','$address','$courseid', '$faculty','$class', '$sem','$dob','$image','$gender','$status', $level, now())");	

     mkdir("../student/image/$eid");
     move_uploaded_file($_FILES['pic']['tmp_name'],"../student/image/$eid/".$_FILES['pic']['name']);


	$err="<font color='blue'>Registration Details Saved!!!</font>";
	}
	
}

?>
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
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("semester").innerHTML=xmlhttp.responseText;
}
}
//alert(str);
xmlhttp.open("GET","semester_ajax.php?id="+str,true);
xmlhttp.send();
}
</script>

<script>
function showcourse(str)
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
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("department").innerHTML=xmlhttp.responseText;
}
}
//alert(str);
xmlhttp.open("GET","course_ajax.php?id="+str,true);
xmlhttp.send();
}
</script>






<div class="row">
<div class="col-md-12">

<h2>Student Registration Form</h2>
<form method="POST" enctype="multipart/form-data">
<div class="row" style="margin-bottom: 12px;">
<?php echo @$err; ?>
</div>
	<div class="row" style="margin-bottom: 12px;"> 
	<select name="departmenID" class="form-control" id="courseid"/>
    <option disabled selected >Select Department</option>
	<?php 
	$dep=mysqli_query($con,"select * from department");
	while($dp=mysqli_fetch_array($dep))
	{
	$dp_id=$dp[0];
	echo "<option value='$dp_id'>".$dp[1]."</option>";
	}
	?>
	
    </select>
	</div>

	<div class="row" style="margin-bottom: 12px;"> 
	<select name="programID" class="form-control" id="courseid"/>
    <option disabled selected >Choose Program/Course</option>
	<?php 
	$pro=mysqli_query($con,"select * from program");
	while($pr=mysqli_fetch_array($pro))
	{
	$prog_id=$pr[0];
	echo "<option value='$prog_id'>".$pr[2]."</option>";
	}
	?>
	
    </select>
	</div>
   <div class="row" style="margin-bottom: 12px;"> 
	<select name="level" class="form-control" id="LEVEL"/>
    <option disabled selected >Choose Academic Level</option>
	<?php 
	$lev=mysqli_query($con,"select * from levels");
	while($lv=mysqli_fetch_array($lev))
	{
	$lv_id=$lv[0];
	echo "<option value='$lv_id'>".$lv[1]."</option>";
	}
	?>
	
    </select>
	</div>
   <!---- Display year of study -->
    <div class="row" style="margin-bottom: 12px;">
	<select name="year" id="class" class="form-control"/>
    <option disabled selected >Select Year of Study/Class</option>
    
    <?php
	$sub=mysqli_query($con,"select * from class");
	while($c=mysqli_fetch_array($sub))
	{
		$c_id=$c[0];
		echo "<option value='$c_id'>".$c[1]."</option>";
	}
	
	?>
	
	</select>
	</div>
    <!---- Display semester of study -->
    <div class="row" style="margin-bottom: 12px;">
	<select name="semester" id="semester" onchange="showsemester(this.value)" class="form-control"/>
    <option disabled selected >Select Semester</option>
    
    <?php
	$sub=mysqli_query($con,"select * from semester");
	while($s=mysqli_fetch_array($sub))
	{
		$s_id=$s[0];
		echo "<option value='$s_id'>".$s[1]."</option>";
	}
	
	?>
	
	</select>
	</div>
   
   <div class="row" style="margin-bottom: 12px;">
        <input type="text" class="form-control" placeholder="Name" name="name"/>
    </div>
  
   <div class="row" style="margin-bottom: 12px;">
        <input type="email" class="form-control" placeholder="Email" name="email"/>
    </div>
  
   <div class="row" style="margin-bottom: 12px;">
        <input type="password" class="form-control" placeholder="Password" name="password"/>
    </div>
  
   <div class="row" style="margin-bottom: 12px;">
        <input type="number" class="form-control" placeholder="Mobile" name="pnone"/>
    </div>
  
   <div class="row" style="margin-bottom: 12px;">
        <input type="text" class="form-control" placeholder="Address" name="address"/>
    </div>
  
   <div class="row" style="margin-bottom: 12px;">
        <input type="date" class="form-control" placeholder="D.O.B" name="date"/>
    </div>
  
   <div class="row" style="margin-bottom: 12px;">
        <input type="file" class="form-control" placeholder="Profile Pic" name="pic"/>
    </div>
  
     <div class="row" style="margin-bottom: 12px;">
    <select name="status" class="form-control" placeholder="Status" name="status"/>
	<option value="" selected="selected" disabled="disabled">Select Study Program</option>
	<option value="Full-Time">Full-Time Program</option>
	<option value="Long-Distance">Long-Distance (Weekend Program)</option>
	</select>
	</div>
    
    <div class="row" style="margin-bottom: 12px;">
  MALE <input type="radio"value="m" id="gen" name="gen"/>
  FEMALE <input type="radio"value="f" id="gen" name="gen"/>
</div>
  
 <div class="row" style="margin-bottom: 12px;">
	<input type="submit" value="REGISTER" name="save" class="btn btn-success" />
	<input type="reset" value="Reset" class="btn btn-success"/>
</div>
</form>
</div>
</div>    </div>
</div>


</div>
</section>
<footer class="container-fluid">
 <h6 align="center">
  <i>Uganda Martyrs University Timetable Management System <br> Since 2021 - Copyright @ <a href="http://www.umu.ac.ug">www.umu.ac.ug</a></i><br><br>
  Developed By: Obita Godfrey, Abwoli Michael, Kirabo Tisha & John Bosco oceng
  </h6>
  <br><br>
</footer>
           </div>
        </div>
        	
        
       
        																		
    
    
    <!--end registration-->
    
    <!--slider-->
    
      <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugin JavaScript -->
    
    <script src="js/owl.carousel.js"></script>
                         

    </body>
</html>