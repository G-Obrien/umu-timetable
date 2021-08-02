<?php 
session_start();
include('../config.php');
if($_SESSION['admin']=="")
{
    header("Location: index.php?Please Login");
$que=mysqli_query($con,"select * from admin where  user_name='".$_SESSION['admin']."'");
$res=mysqli_fetch_array($que);
$_SESSION=$res;
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
    <title>UMU-TMS: Admin Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/739d1d2ac7.js" crossorigin="anonymous"></script>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation"  height="80px">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header" width="100%" height="80px" padding-left="20px">
             <p><a href="admindashboard.php"><img src="img/Logo.png" alt="" width="50px">
             <span style="color:#FFF; font-family:stonehenge;"><b class="b">U</b>ganda <b class="b">M</b>artyrs <b class="b">U</b>niversity </b></a></span> <span><b>Timetable Management System</b></span>
              </p>
              <div class="foxy" >
                  <b >Hello Admin; </b>
                <a href="logout.php" class="glyphicon-glyphicon" >
                    <font color="#FFFFFF"><?php echo $_SESSION['admin'];?>, Logout</font>
                </a>
              </div> 
            </div>
            <!-- Top Menu Items -->
             <style>
           .foxy{
               padding-left:10%;
               display:flex;
               color:#FFFFFF;
               width:30%;
           }
                span{
                    font-size:30px;
                }
                span .b{
                    color:red;
                    
                }
                 span b{
                    font-size:25px;
                    color:white;
                }
            .navbar-header{
                display:flex;
                 padding:0.5%;
                padding-left:20px;
                width:100%;
                position:relative;
                
            }
            .navbar-header .glyphicon-glyphicon{
                padding:2%;
                background: brown;
                text-align:center;
                height: 50%;
                position:right;
                width:150px;
            }
            
            .navbar-collapse ul li a{
                color:white;
            }
            .navbar-collapse ul li{
                border-bottom:2px pink solid;
            }
            ul li a{
                color:white;
            }
            .navbar-ex1-collapse{
                margin-top:1px;
            }
            </style>
        
            <br><br>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse"><br><br>
                <ul class="nav navbar-nav side-nav" style="background-color:black">
                    <li>
                        <a href="admindashboard.php?Admin-Home"><i class="far fa-building"></i>ADMIN Dashboard</a>
                    </li>
                    <li>
                        <a href="admindashboard.php?info=faculty"><i class="far fa-building"></i>  Faculty / Department</a>
                    </li>
                    <li>
                        <a href="admindashboard.php?info=program"><i class="fas fa-user-graduate"></i>   Courses/Programs</a>
                    </li>
                    <li>
                        <a href="admindashboard.php?info=subject"><i class="fas fa-tasks"></i>   Course Units/Subjects</a>
                    </li>
                    <li>
                        <a href="admindashboard.php?info=student"><i class="far fa-address-card"></i>   Students</a>
                    </li>
                    <li>
                        <a href="admindashboard.php?info=lecturer"><i class="fas fa-chalkboard-teacher"></i>  Lecturers</a>
                    </li>
                     <li>
                        <a href="admindashboard.php?info=class"><i class="fas fa-chalkboard-teacher"></i>  Classes / Years</a>
                    </li>

                    <li>
                        <a href="admindashboard.php?info=room"><i class="fas fa-store-alt"></i>  Lecture Rooms</a>
                    </li>   
                    <li>
                        <a href="admindashboard.php?info=add_timetable" style="background:green;"><i class="far fa-calendar-alt"></i>  Schedule Timetable</a>
                    </li>                  
                    <li>
                        <a href="admindashboard.php?info=timetable" style="background:btn-primary;"><i class="far fa-calendar-alt"></i>  General Lecture Timetable</a>
                    </li>    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                   <div class="col-lg-12" style="background-color:rgba(253, 224, 224, 0.884); height:1000px; width:1100px;"  align="center" margin-top="20px">
                   
               
                
                <?php 
				@$info=$_REQUEST['info'];
				if($info!="")
				{
				if($info=="faculty")
				{
					include('faculty.php');
					}
				elseif($info=="semester")
				{
					include('semester.php');
					}
				elseif($info=="subject")
				{
					include('subject.php');
				     }
                elseif($info=="program")
                {
                    include('program.php');
                    }	 
			    elseif($info=="student")
				{
					include('student.php');
					}
				elseif($info=="lecturer")
				{
					include('lecturer.php');
					}
				elseif($info=="timetable")
				{
					include('timetable.php');
                    }
                  elseif($info=="week")
				{
					include('week.php');
                    }
                elseif($info=="class")
				{
					include('class.php');
					}
				elseif($info=="room")
				{
					include('room.php');
					}
				elseif($info=="time")
				{
					include('time.php');
                    }
                    
                    //actions pages start..
                    //add data ------==
				elseif($info=="add_faculty")
				{
					include('add_faculty.php');
					}
					
			    elseif($info=="add_subject")
				{
					include('add_subject.php');
					}
					
				elseif($info=="add_semester")
				{
					include('add_semester.php');
					}
					
				elseif($info=="add_lecturer")
				{
					include('add_lecturer.php');
					}
					
				elseif($info=="add_student")
				{
					include('add_student.php');
					}
						
				elseif($info=="add_timetable")
				{
					include('add_timetable.php');
                }
              
                elseif($info=="add_week")
				{
					include('add_week.php');
					}
					
				elseif($info=="add_room")
				{
					include('add_room.php');
					}
                elseif($info=="add_class")
				{
					include('add_class.php');
					}    
                    
				elseif($info=="add_time")
				{
					include('add_time.php');
				}

                    //update record ---====

                elseif($info=="updatecourse")
				{
					include('updatecourse.php');
				     }
              
                elseif($info=="updatesemester")
				{
					include('updatesemester.php');
				     }

                elseif($info=="updatesubject")
				{
					include('updatesubject.php');
				     }					 
					
				elseif($info=="updatestudent")
				{
					include('updatestudent.php');
				     }

                elseif($info=="updatelecturer")
				{
					include('updatelecturer.php');
				     }

                elseif($info=="updatetimetable")
				{
					include('update_timetable.php');
				     }
					                 
                elseif($info=="updateroom")
				{
					include('updateroom.php');
                     }
                elseif($info=="updateclass")
				{
					include('updateclass.php');
				     }

                elseif($info=="updateweek")
				{
					include('updateweek.php');
				     }

                elseif($info=="updatetime")
				{
					include('updatetime.php');
				     }
					 
                }
                    
				else
				{
				?>
                  
            <br/>
            <font color="#FF3333" size="+2" face="Lucida Console, Monaco, monospace">Admine Panel</font>
                <img src="img/bam.jpg" class="img-responsive" alt="Cinque Terre" width="850px" height="260px" 
                style="margin-top: 8px; margin-left: 3px; float:left;">
            
            <?php 
            
            } ?>
        
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
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
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
