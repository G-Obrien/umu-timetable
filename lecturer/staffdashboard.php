<?php 
session_start();
include('../config.php');
//$email= $_SESSION['lecturer_id'];
if($_SESSION['lecturer_id']=="" && $_SESSION['lname']=="")
{
	header('location:index.php');
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
    <title>UMU-TMS: Staff Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
     <script src="https://kit.fontawesome.com/739d1d2ac7.js" crossorigin="anonymous"></script>
   

</head>

<body>

    <div id="wrapper">
        <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
   <div class="navbar-header" width="100%" height="80px" padding-left="20px">
        <p><a href="admindashboard.php"><img src="img/Logo.png" alt="" width="50px">
         <span style="color:#FFF; font-family:stonehenge;"><b class="b">U</b>ganda <b class="b">M</b>artyrs <b class="b">U</b>niversity </b></a></span> <span><b>Timetable Management System</b></span>
           </p>
             
            </div>
            <!-- Top Menu Items -->
        
            <!-- Top Menu Items -->
             <!-- Top Menu Items  lecturer's image -->
                <?php
                    $arr=scandir("image/$email");
                    $img=$arr[2];
                    $path="image/".$email."/".$img;
                ?> 
                </nav>  

     <style>
           .foxy{
               padding-left:10%;
               display:flex;
               color:#FFFFFF;
               width:30%;
           }
                span{
                    font-size:35px;
                }
                span .b{
                    color:red;
                    
                }
                 span b{
                    font-size:25px;
                    color:white;
                }
    h1 b{
        color:red;
    }
    
    .navbar-collapse ul li a{
    color:white;
}
.navbar-collapse ul li{
    border-bottom:2px pink solid;
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
        width:85%;
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
   
    .navbar-fixed-top{
        display:flex;
    }
    .side-nav{
        margin-top:3%;
    }
    span button:hover{
        background:red;
    }

    </style>                     
      
    </nav>   

        <div id="page-wrapper">
        <nav>
             <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
               
               <?php
                $sql4 = mysqli_query($con,"select *  from lecturer where lecturer_id='".$_SESSION['lecturer_id']."'");
                $rview=mysqli_fetch_array($sql4);

                $sql5 = mysqli_query($con,"select *  from department where department_id ='".$rview['department_id']."'");
                $rview2=mysqli_fetch_array($sql5);
               ?>
                <ul class="nav navbar-nav side-nav" style="background:brown; display:block;">

                <center> <h4 style="color:#FFF" > Welcome Lecturer:</h4></center>
                <li padding-left="30px" style="display:flex">
                    <div class="img-content" width="140px" height="140px">
                    <div class="img-content2">
                        <a href="staffdashboard.php?info=updateprofile&img=<?php echo $img;?>">
                        <img src="<?php  echo $path;?>" alt="No Profile pic found"/></a>
                    </div>
                    </div>
                    <div style="padding:1px">
                        <span style="color:#FFF; font-size:12px;" >
                        Name: <?php echo $_SESSION['lname']; //echo $rview['name'];?> <br>
                        Faculty: <?php 
                        echo $rview2['department_name'];
                        ?> <br>
                       <span style="font-weight: 500px; font-size: 13px; width: 100px; text-align: center;"  class="glyphicon-glyphicon-off" aria-hidden="true">
                        <a href="logout.php">
                        <font color="#FFFFFF"><button style="background:rgba(151, 10, 10, 0.89)">Logout</button></font></a>
                        </span>
                        </span><br><br>
                       
                    </div> 
                </li>

                    <li>
                        <a href="staffdashboard.php?page=Home"><i class="fa fa-fw fa-home"></i> Home</a>
                    </li>
                   
                     <li>
                        <a href="staffdashboard.php?info=timetable"><i class="fa fa-fw fa-table"></i> General Lecture Timetable</a>
                    </li>
                    <li>
                        <a href="staffdashboard.php?info=examtimetable"><i class="fa fa-fw fa-table"></i> Examinations Timetable</a>
                    </li>
                     <li>
                        <a href="staffdashboard.php?info=mytimetable"><i class="fa fa-fw fa-table"></i> My Time Schedules</a>
                    </li>
                    <li>
                        <a href="staffdashboard.php?info=updateprofile"><i class="fa fa-fw fa-user"></i> Update Profile</a>
                    </li>
                    <li>
                        <a href="staffdashboard.php?info=updatepassword"><i class="fa fa-fw fa-user"></i> Update Password</a>
                    </li>
                   
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row" style="background:pimk">
                <div class="col-lg-12" style="background-image:url(../admin/img/Pink%20Blue%20Gradient%20Scratched%20Texture%20Free%20Wallpaper%20HD.jpg);" height="1000px;" align="center" margin-top="12px">
                
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
                elseif($info=="mytimetable")
				{
					include('mytimetable.php');
				}
                elseif($info=="add-info")
				{
					include('add-info.php');
				}
				elseif($info=="examtimetable")
				{
					include('examtimetable.php');
				}
					}
				else
				{
				?>
                  
                  
                        <img src="img/grad.jpg" class="img-responsive" alt="Cinque Terre" width="100%" height="500" style="margin-top: 12px; margin-left: 23px;">
                        <img src="img/umu.jpg" class="img-responsive" alt="Cinque Terre" width="100%" height="300" style=" margin-left: 23px;">
                <?php }?>
                
                
                
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->




    <section>
    <footer class="container-fluid">
        <h6 align="center">
            <i>Uganda Martyrs University Timetable Management System <br> Since 2021 - Copyright @ <a href="http://www.umu.ac.ug">www.umu.ac.ug</a></i><br><br>
            Developed By: Obita Godfrey, Abwoli Michael, Kirabo Tisha & John Bosco oceng
         </h6>
        <br><br>
    </section>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>
