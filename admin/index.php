<?php 
session_start(); 
require('../config.php');
?>
<?php
extract($_POST);
if(isset($save))
{
	if($e=="" || $p=="")
	{
	$err="<font color='red'>fill all the fields first</font>";
	}
	else
	{
	//check login crenditial
	$que=mysqli_query($con,"select * from admin where user_name='".$e."' and password='".$p."'");
	$r=mysqli_num_rows($que);
		if($r)
		{
			$_SESSION['admin']=$e;
			header('location:admindashboard.php');
		}
		else
		{
			$err="<font color='red'>Invalid login details</font>";
			
			}
	}
	
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<html lang="en">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
 <link rel="shortcut icon" href="img/Logo.png" type="image/x-icon">
    <title>UMU TimetableManagementSystem:Login=Admin</title>
    
    <style>
	a{margin-left:15px;text-decoration:none; font-size:20px}
	a:hover{background:#FF0000;color:#FFFFFF;}
	.carousel-inner > .item > img,
	.carousel-inner > .item > a > 
	img { margin:auto;}
</style>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">

    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100&family=Jura&family=Roboto+Mono:wght@100&display=swap" rel="stylesheet">
    <!--FONT awesome CDN-->
    <script src="https://kit.fontawesome.com/739d1d2ac7.js" crossorigin="anonymous"></script>

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="../css/animate.min.css" type="text/css">
    <script src="../js/jquery-2.1.3.min.js"></script>
<script src="../js/bootstrap.min.js"></script>


    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/creative.css" type="text/css">
    <link href="../css/owl.carousel.css" rel="stylesheet">
    <link href="../css/owl.theme.css" rel="stylesheet">
    <link href="../css/owl.transitions.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    
    <![endif]-->

</head>

 <body>
 
      <!-- /.slider -->
<style>
.cente{
    width:100%;
    height: 0 auto;
    padding:15%;

}
.form-signin{
    text-align:center;
  border: 12px solid rgba(238, 80, 80, 0.979);
  padding: 15%;
  border-radius:50%;
  width:65%;
  height:460px;
  background: rgba(230, 214, 214, 0.651);
  font:jura;
  font-size:11px;
}
.form-signin .form-control{
  text-align:center;
  padding: 1%;
  border-radius:12px;
  font:jura;
  font-size:11px;
}
.form-signin .btn-save{
  text-align:center;
  padding: 1%;
  border-radius:12px;
  font:jura;
  width:248px;
  height:35px;
  background-color:#09F;
  font-size:20px;
}
.form-signin .btn-save:hover{
  text-align:center;
  padding: 1%;
  border-radius:12px;
  font:jura;
  width:248px;
  height:35px;
  font-size:20px;
  color:red;
  background-color:rgba(253, 230, 22, 0.856);
}
header{
  background-image: url(img/Ronal.png);
  background-repeat: no-repeat;
  /*background: red;*/
}
</style>

<header>
 <div class="header-content">
  <div class="header-content-inner">
    <div class="row" align="center">
      <div class="col-md-5 cente" align="center" >
        <form class="form-signin" method="POST">
        <img src="img/Logo.png" alt="" width="70px">
	    <h1 class="form-signin-heading">
        <font color="#337ab7" size="4"><i class="fas fa-user-lock"  color="red"></i> Admin Login</font>
        </h1>
        <h5><?php echo $err; ?></h5>
        <label for="inputEmail" class="sr-only">User Email</label>
        <input type="text" id="inputEmail" class="form-control" placeholder="Email address" required autofocus 
        name="e" value="<?php echo @$e;?>"/>
        
        <br/><br/>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required 
        name="p" value="<?php echo @$p;?>"/>
        <div class="checkbox">
         
        </div><br/>
        <input type="submit" value="Login " class="btn-save" name="save" style=""/>
        
		</form>
      </div>
    </div>
  </div> 
 </div>
</header>

<!--container-->



  
<footer class="container-fluid">
   <h6 align="center">
  <i>Uganda Martyrs University Timetable Management System <br> Since 2021 - Copyright @ <a href="http://www.umu.ac.ug">www.umu.ac.ug</a></i><br><br>
  Developed By: Obita Godfrey, Abwoli Michael, Kirabo Tisha & John Bosco oceng
  </h6>
  <br><br>
</footer>
    
      <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- Plugin JavaScript -->
    
    <script src="../js/owl.carousel.js"></script>
                         

    </body>
</html>