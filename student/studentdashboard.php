<?php 
session_start();
$email= $_SESSION['e_id'];
include('../config.php');

if($_SESSION['stu_id']=="" && $_SESSION['name']=="")
{
	header('location:index.php?Please-Login');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
<link rel="shortcut icon" href="img/Logo.png" type="image/x-icon">
    <title>UMU-TMS: Student Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

 <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/739d1d2ac7.js" crossorigin="anonymous"></script>

   
   

</head>

<body>
<style>
.navbar-collapse ul li a{
    color:white;
}
.navbar-collapse ul li{
    border-bottom:2px pink solid;
}
h1 b{
       color:red;
   }
  
.glyphicon-glyphicon{
    float:right;
}
.img-content{
    background: brown;
    width:100px;
    padding:10px;
    height:90px;
    text-align:center;
}
.img-content img{
   width:90%;
   border-radius:50%;

}
.img-content2{
    width:90%;
    background:grey;
    border-radius:50%;
}
.pen{
    color:white;
    text-align:center;
}

.page-wrapper {
    color:black;
}
.container-fluid{
    
}
.navbar-fixed-top{
    display:flex;
}
.side-nav{
    margin-top:2%;
}
span button:hover{
    background:red;
}

</style>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                <p class="pens" > 
                   <h1 class="pen" style="font-family:stonehenge;"> <img src="img/Logo.png" alt="logo" width="50px" srcset="">
                    <b>U</b>ganda <b>M</b>artyrs <b>U</b>niversity <b style="font-family:calibri; color:white;"> Timetable Management System</b></h1>
                </p>
                </div>
            
                <!-- Top Menu Items  student's image -->
                <?php
                    $arr=scandir("image/$email");
                    $img=$arr[2];
                    $path="image/".$email."/".$img;
                ?>     
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

        <nav>        
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav" style="background:brown;">
               <center> <h4 style="color:#FFF" > Welcome,</h4></center>
                <li padding-left="30px" style="display:flex">
                <div class="img-content" width="100px" height="100px">
                    <div class="img-content2">
                        <a href="studentdashboard.php?info=updateprofile&img=<?php echo $img;?>">
                        <img src="<?php  echo $path;?>" alt="No Profile pic found"/></a>
                    </div>
                </div>
                <div style="padding:1px">
                    <span style="color:#FFF" >
                    <?php echo $_SESSION['name'];?> 
                    </span><br><br>
                    <span style="font-weight: 600px"  class="glyphicon-glyphicon-off" aria-hidden="true">
                    <a href="logout.php">
                    <font color="#FFFFFF"><button style="background:rgba(151, 10, 10, 0.89)">Logout</button></font></a>
                    </span>
                </div> 
                </li>
                <li>
                    <a href="studentdashboard.php?page=Home"><i class="fa fa-fw fa-home"></i>Home</a>
                </li>
                <li>
                    <a href="studentdashboard.php?info=timetable"><i class="fa fa-fw fa-table"></i> Lecture Time Table</a>
                </li>
                <li>
                    <a href="studentdashboard.php?info=examtimetable"><i class="fa fa-fw fa-dashboard"></i> Examination Time Table</a>
                </li>
                <li>
                    <a href="studentdashboard.php?info=persontimetable"><i class="fa fa-fw fa-tools"></i> Personal Time Table</a>
                </li>

                <li>
                    <a href="studentdashboard.php?info=updateprofile&img=<?php echo $img;?>"><i class="fa fa-fw fa-user"></i> Update Profile</a>
                </li>
                <li>
                    <a href="studentdashboard.php?info=updatepassword"><i class="fa fa-fw fa-user"></i> Update Password</a>
                </li>
            </ul>
        </div>
         
        </nav>  
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
              
                <div class="col-lg-12" style="background:rgba(253, 224, 224, 0.884);" height="1000px;" align="center" margin-top="20px">
                   
                   
                <?php 
				@$info=$_REQUEST['info'];
				if($info!="")
				{
				if($info=="updatepassword")
				{
					include('updatepassword.php');
					}
				elseif($info=="updateprofile")
				{
					include('updateprofile.php');
					}
					
				elseif($info=="timetable")
				{
					include('timetable.php');
				}
                elseif($info=="examtimetable")
				{
					include('examtimetable.php');
				}
                elseif($info=="persontimetable")
				{
					include('persontimetable.php');
				}
				
					}
				else
				{
				?>
                  
                  
                <img src="img/header.jpg" class="img-responsive" alt="Background image" width="100%" height="500" style="margin-top: 12px; margin-left: 23px;">
                    <p>Students at Virtual Graduation on the 21st May 2021</p>

                <img src="img/umu.jpg" class="img-responsive" alt="Background image" width="100%" height="100" style=" margin-left: 23px;">
                <?php }?>
                
                
                
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->



    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
<!--footer container-->
 
<footer class="container-fluid">
  <h6 align="center">
  <i>Uganda Martyrs University Timetable Management System <br> Since 2021 - Copyright @<a href="http://www.umu.ac.ug">www.umu.ac.ug</a></i><br><br>
  Developed By: Obita Godfrey, Abwoli Michael, Kirabo Tisha & John Bosco oceng
  </h6>
  <br><br>
</footer>
</body>

</html>
