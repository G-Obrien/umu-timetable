<?php

session_start();

$connect = mysqli_connect('localhost', 'root', '');

$Mydatabase = "CREATE DATABASE IF NOT EXISTS umu_time_table_management_system";
mysqli_query($connect, $Mydatabase);

$useDB = "USE umu_time_table_management_system";
mysqli_query($connect, $useDB);


//Table structure for table `admin`

$admin = "CREATE TABLE IF NOT EXISTS `admin` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `eid` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `eid` (`eid`),
  KEY `user_name` (`user_name`)
)";
mysqli_query($connect, $admin);

// Dumping data for table `admin`

$insert_admin = "INSERT INTO `admin` (`user_id`, `user_name`, `password`, `eid`) VALUES
(1, 'Obita', 'admin1', 'obita@gmail.com'),
(2, 'Abwoli', 'admin2', 'abwoli@gmail.com'),
(3, 'Tisha', 'admin3', 'tisha@gmail.com')";
mysqli_query($connect, $insert_admin);


$year = "CREATE TABLE IF NOT EXISTS `acade_year` (
  `yr_id` int(11) NOT NULL AUTO_INCREMENT,
  `acad_yr_name` varchar(50) NOT NULL,
  PRIMARY KEY (`yr_id`)
)";
mysqli_query($connect, $year);

 //Dumping data for table `acade_year` Academic year

$insert_year = "INSERT INTO `acade_year` (`yr_id`,  `acad_yr_name`) VALUES
(1, '2020-2021'),
(2, '2021-2022'),
(3, '2022-2023'),
(4, '2023-2024')";
mysqli_query($connect, $insert_year);

 //Creating levels table

$levels = "CREATE TABLE IF NOT EXISTS `levels` (
  `lv_id` int(11) NOT NULL AUTO_INCREMENT,
  `lv_name` varchar(100) NOT NULL,
  PRIMARY KEY (`lv_id`)
)";
mysqli_query($connect, $levels);

 //Dumping data for table `acade_levels` Academic levels

$insert_levels = "INSERT INTO `levels` (`lv_id`,  `lv_name`) VALUES
(1, 'DIPLOMA'),
(2, 'BACHELOR'),
(3, 'MASTER')";
mysqli_query($connect, $insert_levels);


//Table structure for table `contactus`
$contact = "CREATE TABLE IF NOT EXISTS `contactus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
)";
mysqli_query($connect, $contact); 


//Dumping data for table `contactus`

$insert_contact ="INSERT INTO `contactus` (`id`, `name`, `email`, `subject`, `message`) VALUES
(6, 'Moreen', 'moreen@gmail.com', 'Hello UMU', 'your timetable system works well'),
(7, 'Edmond', 'edmond@gmail.com', 'Hi Admin', 'I wanted to change my password but failled.')";
mysqli_query($connect, $insert_contact); 


//Table structure for table `department`

 $dep ="CREATE TABLE IF NOT EXISTS `department` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(200) NOT NULL,
  PRIMARY KEY (`department_id`),
  FULLTEXT KEY `course_name` (`department_name`)
)";
mysqli_query($connect,  $dep);


//Dumping data for table `department`

$insert_dep = "INSERT INTO `department` (`department_id`, `department_name`) VALUES
(1, 'Faculty of Agriculture'),
(2, 'Faculty of Business Administration and Management (BAM)'),
(3, 'Faculty of Built Environment'),
(4, 'Faculty of Education'),
(5, 'Faculty of LAW'),
(6, 'School of Arts and Social Sciences'),
(7, 'Faculty of Science'),
(8, 'Institute of Languages and Communication Skills')";
mysqli_query($connect,  $insert_dep);


//Table structure for table `program`

 $prog ="CREATE TABLE IF NOT EXISTS `program` (
  `program_id` int(11) NOT NULL AUTO_INCREMENT,
  `initials` varchar(50) NOT NULL,
  `program_name` varchar(200) NOT NULL,
  `department_id` varchar(10) NOT NULL,
  PRIMARY KEY (`program_id`),
  FULLTEXT KEY `course_name` (`program_name`)
)";
mysqli_query($connect,  $prog);


//Dumping data for table `program`

$insert_prog = "INSERT INTO `program` (`program_id`,`initials`, `program_name`, `department_id`) VALUES
(1, 'FoBE', 'ADVANCED DIPLOMA IN ENVIRONMENTAL DESIGN', 3),
(2, 'FoBE', 'BACHELOR OF ENVIRONMENTAL DESIGN', 3),
(3, 'FoBE', 'GRADUATE DIPLOMA IN ENVIRONMENTAL DESIGN MASTER OF ARCHITECTURE (PROFESSIONAL)', 3),
(4, 'BAGRIC', 'BACHELOR OF AGRICULTURE', 1),
(5, 'BAGRIC', 'BACHELOR OF SCIENCE IN AGRICULTURAL TECHNOLOGY', 1),
(6, 'BAGRIC', 'BACHELOR OF SCIENCE IN AGRICULTURE (GENERAL)', 1),

(7, 'BAMCD', 'BACHELOR OF ARTS IN MICROFINANCE AND COMMUNITY DEVELOPMENT', 2),
(8, 'BBAM', 'BACHELOR OF BUSINESS ADMINISTRATION AND MANAGEMENT', 2),
(9, 'BSc. ACC & FIN', 'BACHELOR OF SCIENCE IN ACCOUNTING AND FINANCE (PT)', 2),

(10, 'BA-ENGLL-EDUC', 'BACHELOR OF ARTS ENGLISH LANGUAGE AND LITERATURE WITH EDUCATION (FT)', 4),
(11, 'BA-EDUC', 'BACHELOR OF ARTS WITH EDUCATION', 4),
(12, 'BSC-EDUC', 'BACHELOR OF SCIENCE WITH EDUCATION', 4),

(13, 'BSC-GEN', 'BACHELOR OF SCIENCE (General)', 7),
(14, 'BSC-CS', 'BACHELOR OF SCIENCE IN COMPUTER SCIENCE', 7),
(15, 'BSC-ESTATS', 'BACHELOR OF SCIENCE IN ECONOMICS AND STATISTICS', 7),
(16, 'BSC-IT', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', 7),

(17, 'BLAW', 'BACHELOR OF LAWS', 5),
(18, 'BA-FASHION', 'BACHELOR OF ART IN FASHION AND TEXTILE DESIGN', 6),
(19, 'BA-DDS', 'BACHELOR OF ARTS DEMOCRACY AND DEVELOPMENT STUDIES', 6),
(20, 'SWASA', 'BACHELOR OF SOCIAL WORK AND SOCIAL ADMINISTRATION', 6),
(21, 'PSYCHOLOGY', 'BACHELOR OF ARTS IN COUNSELLING PSYCHOLOGY', 6) ";
mysqli_query($connect,  $insert_prog);


// Table structure for table `semester`


$sem = "CREATE TABLE IF NOT EXISTS `semester` (
  `sem_id` int(11) NOT NULL AUTO_INCREMENT,
  `semester_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`sem_id`)
)";
mysqli_query($connect,  $sem);


// Dumping data for table `semester`


$insert_sem = "INSERT INTO `semester` (`sem_id`, `semester_name`) VALUES
(1, 'SEM I'),
(2, 'SEM II')";
mysqli_query($connect,  $insert_sem);


// Table structure for table `student` remember we stii have to include changes like reg_num, number, (yr_id)
$student = "CREATE TABLE IF NOT EXISTS `student` (
  `stu_id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_num` varchar(15) NOT NULL,
  `number` int(15) NOT NULL,
  `name` char(50) NOT NULL,
  `eid` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `mob` bigint(20) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `program_id` varchar(100) NOT NULL,
  `department_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `sem_id` int(11) NOT NULL,
  `dob` date NOT NULL,
  `pic` varchar(255) NOT NULL,
  `gender` enum('f','m') NOT NULL,
  `status` varchar(50) NOT NULL,
  `lv_id` varchar(10) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`stu_id`),
  UNIQUE KEY `number` (`number`),
  FULLTEXT KEY `name` (`name`)
)";
mysqli_query($connect,  $student);

//Dumping data for table `student'
$insert_student = "INSERT INTO `student` (`stu_id`,`reg_num`, `number`, `name`, `eid`, `password`, `mob`, `address`, `program_id`, `department_id`, `class_id`, `sem_id`, `dob`, `pic`, `gender`, `status`,`lv_id`, `date`)
 VALUES
(1, '2018-B071-10029', 1800501585, 'obita godfrey', 'obita.godfrey@stud.umu.ac.ug', 'obita', 770656976, 'Nkozi', '16', 7, 3, 2, '1995-02-13', '/umu-timetable/student/profile/obita.jpg', 'm', 'Full-Time', '2', '2021-03-20'),
(2, '2018-B241-10002', 1800501575, 'Abwoli michael', 'abwoli.michael@stud.umu.ac.ug', 'mike', 774756425, 'Nkozi','14', 7, 3, 2, '1995-01-23', '/umu-timetable/student/profile/mike.jpg', 'm', 'Full-Time','2', '2021-03-20'),
(3, '2018-B071-10043', 1800501590, 'kirabo Tisha', 'kirabo.tisha@stud.umu.ac.ug', 'tisha', 775262383, 'Nkozi','16', 7, 3, 2, '1994-08-30', '/umu-timetable/student/profile/tish.jpg', 'f', 'Full-Time','2', '2021-03-20'),
(4, '2018-B241-10029', 1800501500, 'ronald', 'ronald.unisco@stud.umu.ac.ug', 'ronald', 756070348, 'Nkozi','12', 4, 2, 2, '1997-06-21', '/umu-timetable/student/profile/pro.jpg', 'm', 'Full-Time', '2', '2021-03-20'),
(5, '2018-B401-10129', 1800567900, 'mosses kido', 'kido.mosses@stud.umu.ac.ug', 'kido', 704576904, 'Nkozi','7', 3, 1, 2, '1999-08-03', '/umu-timetable/student/profile/gaby.jpg', 'm', 'Full-Time', '1', '2021-03-20'),
(6, '2018-B241-11020', 1800514585, 'patrick mkomo', 'mkomo.patrick@stud.umu.ac.ug', 'pato', 783456976, 'Nkozi','4', 1, 1, 2, '1991-10-03', '/umu-timetable/student/profile/naka.jpg', 'm', 'Full-Time', '1', '2021-03-20'),
(7, '2018-B022-12029', 1800502285, 'Samson Kalongo', 'kalo.sam@stud.umu.ac.ug', 'samson', 770672456, 'Nkozi','8', 2, 2, 2, '1994-11-03', '/umu-timetable/student/profile/obita.jpg', 'm', 'Full-Time', '1', '2021-04-10'),
(8, '2018-B211-10026', 1800500675, 'Amito Brenda', 'brenda.amito@stud.umu.ac.ug', 'amito', 770445576, 'Nkozi','10', 5, 3, 2, '1987-12-27', '/umu-timetable/student/profile/obita.jpg', 'f', 'Full-Time', '2', '2021-04-10'),
(9, '2018-B141-12022', 1800501595, 'Stella Birungi', 'birungi.stella@stud.umu.ac.ug', 'stella', 772020346, 'Nkozi','1', 4, 3, 2, '1995-04-28', '/umu-timetable/student/profile/tish.jpg', 'f', 'Long-Distance', '3', '2021-04-21'),
(10, '2018-B141-10021', 1800501485, 'fiona namusoke', 'namusoke.fiona@stud.umu.ac.ug', 'fiona', 777898985, 'Nkozi','2', 6, 1, 2, '1993-09-09', '/umu-timetable/student/profile/alen.jpg', 'f', 'Long-Distance', '3', '2021-05-06');";
mysqli_query($connect,  $insert_student);


// Table structure for table `class/year-level`


$class ="CREATE TABLE IF NOT EXISTS `class` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(50),
  `department_id` int(11) NOT NULL,
   /*`sem_id` int(11) NOT NULL,
  `subject_id` int(10) NOT NULL, */
  PRIMARY KEY (`class_id`)
)";
mysqli_query($connect,  $class);


// Dumping data for table `class`

$insert_class = "INSERT INTO `class` (`class_id`, `class_name`, `department_id`) VALUES
(1, 'B.AGRIC I', 1),
(2, 'B.AGRIC II', 1),
(3, 'B.AGRIC III', 1),

(4, 'BSc. ACC & FIN I', 2),
(5, 'BSc. ACC & FIN II', 2),
(6, 'BSc. ACC & FIN III',2 ),

(7, 'BSc CS I', 7),
(8, 'BSc CS II', 7),
(9, 'BSc CS III', 7),

(10, 'BA/BSC I (EDUC)', 4),
(11, 'BA/BSC II (EDUC)', 4),
(12, 'BA/BSC III (EDUC)', 4),

(13, 'BSC IT I', 7),
(14, 'BSC IT II', 7),
(15, 'BSC IT III', 7),

(16, 'BAM I', 2),
(17, 'BAM II', 2),
(18, 'BAM III', 2),

(19, 'BSc ECON & STAT I', 7),
(20, 'BSc ECON & STAT II', 7),
(21, 'BSc ECON & STAT III', 7),

(22, 'SWASA I', 6),
(23, 'SWASA II', 6),
(24, 'SWASA III', 6),

(25, 'Fobe I', 3),
(26, 'Fobe II', 3),
(27, 'Fobe III', 3),

(28, 'BSC GEN I', 7),
(29, 'BSC GEN II', 7),
(30, 'BSC GEN III', 7),

(31, 'BJMC I', 8),
(32, 'BJMC II', 8),
(33, 'BJMC III', 8),

(34, 'DIP IT 1', 7),
(35, 'DIP IT 2', 7),
(36, 'DIP CS 1', 7),

(37, 'BA I (GEO)', 4),
(38, 'BA II (GEO)', 4),
(39, 'BA III (GEO)', 4),

(40, 'BA I (RE)', 4),
(41, 'BA II (RE)', 4),
(42, 'BA III (RE)', 4),

(43, 'BAPAM I', 6),
(44, 'BAPAM II', 6),
(45, 'BAPAM III', 6),

(46, 'BAEM I', 1),
(47, 'BAEM II', 1),
(48, 'BAEM III', 1),
(49, 'LLB I', 5),
(50, 'LLB II', 5)";


mysqli_query($connect,  $insert_class);


// creating table `room`


$room = "CREATE TABLE IF NOT EXISTS `room` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_lable` varchar(50) NOT NULL,
  `department_id` int(10) NOT NULL,
  PRIMARY KEY (`room_id`),
  FULLTEXT KEY `room_lable` (`room_lable`)
)";
mysqli_query($connect,  $room);

//Dumping data for table `department`


$insert_room = "INSERT INTO `room` (`room_id`, `room_lable`, `department_id`) VALUES
(1, 'Room 1', 6),
(2, 'Room 2', 4),
(3, 'Room 3', 4),
(4, 'Room 4', 4),
(5, 'Room 8', 7),
(6, 'Room 9', 7),
(7, 'Room 10', 7),
(8, 'Room 11', 7),
(9, 'Room 12', 3),
(10, 'Room 13', 3),
(11, 'Room 1 Agric', 1),
(12, 'Room 2 Agric', 1),
(13, 'Room 3 Agric', 1),
(14, 'Room 4 Agric', 1),
(15, 'Resource center', 7),
(16, 'Auditorium', 6),
(17, 'BSc-Lab', 4),
(18, 'Computer Lab 1', 6),
(19, 'Computer Lab 2', 6),
(20, 'BSc-Lab', 4)";
mysqli_query($connect,  $insert_room);


// Table structure for table `subject`

$course = "CREATE TABLE IF NOT EXISTS `subject` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_code` varchar(20),
  `subject_name` varchar(200) DEFAULT NULL,
  `sem_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `inform_message` varchar(1000) NOT NULL,
  PRIMARY KEY (`subject_id`),
  KEY `course_id` (`department_id`)
)";
mysqli_query($connect,  $course);

//Dumping data for table `subject`

$insert_course = "INSERT INTO `subject` (`subject_id`, `subject_code`, `subject_name`, `sem_id`, `class_id`, `department_id`, `inform_message`) VALUES
(1, 'AGRIC101', 'Sustainable Environmental Management', 1, 1, 1, ' '),
(2, 'AGRIC102', 'Communication Skills And Advocacy', 1, 1, 1, ' '),
(3, 'AGRIC103', 'Agricultural Marketing', 1, 1, 1, ' '),
(4, 'AGRIC104', 'AGRICULTURAL ECONOMICS I',1, 1, 1, ' '),
(5, 'AGRIC105', 'AGRICULTURAL EXTENSION', 1, 1, 1, ' '),
(6, 'AGRIC106', 'AGRICULTURAL OUTREACH', 1, 1,1, ' '),

(7, 'BAM101', 'AUDIT AND INTERNAL INTERNAL CONTROLS IN MICROFINANCE INSTITUTIONS', 1, 4, 2, ' '),
(8, 'CAMC102', 'CREDIT APPRAISAL AND MONITORING', 1, 5, 2, ' '),
(9, 'BEIM103', 'BUSINESS EXCELLENCY & INTEGRITY IN MICROFINANCE', 1, 6, 2, ' '),
(10, 'PMP104', 'PROCUREMENT MANAGEMENT PRINCIPLES', 1, 5, 2, ' '),
(11, 'QMBAM105', 'Quantitative Methods II', 1, 16, 2, ' '),
(12, 'ABETH106', 'APPLIED BUSINESS ETHICS', 1, 17, 2, ' '),
(13, 'BENG107', 'BUSINESS ENGLISH', 1, 18, 2, ' '),

(14, 'EDLC1001', 'Literature and Composition', 1, 10, 4, ' '),
(15, 'EDED1002', 'ECONOMICS OF EDUCATION',1, 10, 4, ' '),
(16, 'EDELF1003', 'EDUCATIONAL LEGAL FRAME WORK', 1, 10, 4, ' '),
(17, 'EDEME1004', 'EDUCATIONAL MEASUREMENT AND EVALUATION', 1, 10,4, ' '),
(18, 'EDAD1005', 'ASPECTS OF DRAMA', 1, 11, 4, ' '),
(19, 'EDELTM1006', 'ENGLISH LANGUAGE TEACHING METHODS 2', 1, 11, 4, ' '),
(20, 'EDSCBS1007', 'BIOLOGICAL SCIENCES', 1, 11, 4, ' '),
(21, 'EDSCAP1008', 'ANIMAL PHYSIOLOGY', 1, 12, 4, ' '),
(22, 'EDSCAA1009', 'ABSTRACT ALGEBRA', 1, 12, 4, ' '),

(23, 'SCDS101', 'Data Structure', 1, 13, 7, ' '),
(24, 'SCPT102', 'Probability Theory', 1, 28, 7, ' '),
(25, 'SCOOP103', 'Object Oriented Programming', 1, 28, 7, ' '),
(26, 'SCFM104', 'Fundamentals of Mathematics', 1, 13, 7, ' '),
(27, 'SCSA105', 'System Adm inistration', 1, 13, 7, ' '),
(28, 'SCPP106', 'PRINCIPLES OF PROGRAMMING', 1, 13, 7, ' '),
(29, 'SCFN107', 'FUNDAMENTALS OF NETWORKING', 1, 13, 7, ' '),
(30, 'SCCAO108', 'COMPUTER ARCHITECTURE AND ORGANISATION',1, 7, 7, ' '),
(31, 'SCWEBT109', 'WEB DEVELOPMENT TECHNOLOGIES', 1, 7, 7, ' '),
(32, 'SCLP110', 'LOGIC PROGRAMMING', 1, 7, 7, ' '),
(33, 'SCDMS111', 'DATABASE MANAGEMENT SYSTEMS', 1, 28, 7, ' '),
(34, 'SCIT112', 'INTRODUCTION TO INFORMATION TECHNOLOGY', 1, 7, 7, ' '),

(35, 'SASSD101', 'CIVIL SOCIETY AND DEVELOPMENT', 1, 22, 6, ' '),
(36, 'SASGD102', 'GENDER AND DEVELOPMENT', 1, 22, 6, ' '),
(37, 'SASDE103', 'DEVELOPMENT ETHICS', 1, 22, 6, ' '),
(38, 'SASHRM104', 'HUMAN RESOURCE MANAGEMEN', 1, 22, 6, ' '),
(39, 'SASSSPS105', 'SOCIAL SECURITY AND SOCIAL PROTECTION SYSTEMS', 1, 22, 6, ' '),
(40, 'SASDLG', 'DECENTRALISATION AND LOCAL GOVERNANCE', 1, 22, 6, ' ')";

mysqli_query($connect,  $insert_course);


// Table structure for table `lecturer`

$lecturer = "CREATE TABLE IF NOT EXISTS `lecturer` (
  `lecturer_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `eid` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `mob` bigint(20) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `pic` varchar(1000),
  `department_id` int(11) NOT NULL,
  `sem_id` int(11) NOT NULL,/*needs be here!*/
  `class_id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`lecturer_id`),
  UNIQUE KEY `eid` (`eid`),
  FULLTEXT KEY `name` (`name`)
) ";
mysqli_query($connect,  $lecturer);

// Dumping data for table `lecturer` Lecturer numbers to be added;
$insert_lecturer = "INSERT INTO `lecturer` (`lecturer_id`, `name`, `eid`, `password`, `mob`, `address`,`pic`, `department_id`, `sem_id`, `class_id`, `status`, `date`) VALUES
(1, 'Kalema p', 'kalema@gmail.com', 'kalema', 0752176657, 'Nkozi', '/umu-timetable/lecturer/profile/alen.jpg', 7, 1, 2, 'Full-Time', '2021-03-22'),
(2, 'Mirembe', 'mirembe@umu.ac.ug', 'mirembe', 0705632159, 'Rubaga', '/umu-timetable/lecturer/profile/alen.jpg', 7, 2, 2, 'Full-Time', '2021-03-02'),
(3, 'Acero', 'acero@gmail.com', 'ace', 078903284, 'kayabwe', '/umu-timetable/lecturer/profile/alen.jpg', 1, 1, 3,'Full-Time', '2021-03-20'),
(4, 'John Bosco', 'johnbosco@yahoo.com', 'john', 0774123654, 'TC', '/umu-timetable/lecturer/profile/alen.jpg', 3, 4, 2,'Full-Time', '2020-09-22'),
(5, 'Ali', 'ali@gmail.com', 'ali', 7456981236, 'Buwama', '/umu-timetable/lecturer/profile/alen.jpg', 1, 2, 1, 'Full-Time', '2021-03-12'),
(6, 'Ketty', 'ketty@umu.ac.ug', 'ketty', 9874123658, 'Equator', '/umu-timetable/lecturer/profile/alen.jpg', 15, 7, 1, 'Full-Time', '2016-05-22'),
(7, 'Michael', 'abmichy@umu.ac.ug', 'abmichy', 6547893214, 'Nkozi', '/umu-timetable/lecturer/profile/stud3.jpg', 1, 3, 2, 'Part-Time', '2021-03-25'),
(8, 'Denish', 'denish@gmail.com', 'denish', 3214569878, 'Nkozi', '/umu-timetable/lecturer/profile/alen.jpg', 2, 2, 2,'Part-Time', '2021-01-29'),
(9, 'Jassy', 'jassy@gmail.com', 'jassy', 0776532145, 'kayabwe', '/umu-timetable/lecturer/profile/alen.jpg', 1, 1,1, 'Full-Time', '2021-02-28'),
(10, 'Sakwa Lidia', 'sakwa@gmail.com', 'sakwa', 0701239874, 'Rubaga', '/umu-timetable/lecturer/profile/tish.jpg', 4, 1, 2,'Full-Time', '2021-03-12')"; 
mysqli_query($connect,  $insert_lecturer);

// Table structure for table `timeschedule`
$timetable = "CREATE TABLE IF NOT EXISTS `timeschedule` (
  `timeschedule_id` int(10) NOT NULL AUTO_INCREMENT,
  `yr_id` varchar(200) DEFAULT NULL,
  `week_id` varchar(200) DEFAULT NULL,
  `program_name` varchar(200) DEFAULT NULL,
  `department_name` varchar(200) DEFAULT NULL,
  `semester_name` varchar(200) DEFAULT NULL,
  `class_lable` varchar(200) DEFAULT NULL,
  `subject_name` varchar(200) DEFAULT NULL,
  `star_time` varchar(200) DEFAULT NULL,
  `end_time` varchar(200) DEFAULT NULL,
  `duration` varchar(200) DEFAULT NULL,
  `room_lable` varchar(100) NOT NULL,
  `lecturer_id` varchar(200) NOT NULL,
  `lv_id` varchar(100) NOT NULL,
  `class_mode` varchar(200) NOT NULL,
  PRIMARY KEY (`timeschedule_id`),
  KEY `lecturer_id` (`lecturer_id`)
)";
mysqli_query($connect,  $timetable);

// Dumping data for table `timeschedule`

$insert_timetable = "INSERT INTO `timeschedule` (`timeschedule_id`, `yr_id`, `week_id`, `program_name`, `department_name`, `semester_name`, `class_lable`, `subject_name`, `star_time`, `end_time`,  `duration`, `room_lable`, `lecturer_id`,  `lv_id`, `class_mode` ) VALUES
(1, '4', '1', '-', '7', '1', '13', '25', '7:30am', '9:00am', '4', '2', '2', '2', 'FULL-TIME'),
(2, '4', '1', '-', '7', '1', '13', '27', '9:30am', '11:30am', '4', '2', '10', '2', 'FULL-TIME'),
(3, '4', '1', '-', '7', '1', '13', '28', '12:00pm', '1:00pm','2 ', '6', '5', '2', 'FULL-TIME'),
(4, '4', '1', '-', '7', '1', '13', '23', '2:00pm', '4:00pm', '6 ', '8', '1', '2', 'FULL-TIME'),
(5, '4', '2', '-', '7', '1', '13', '34', '8:00am', '9:20am', '3', '15', '2', '2', 'FULL-TIME')";

mysqli_query($connect,  $insert_timetable);

// creta table durations

$duration = "CREATE TABLE IF NOT EXISTS `durations` (
  `due_id` int(11) NOT NULL AUTO_INCREMENT,
  `period` varchar(20),
  PRIMARY KEY (`due_id`)
)";
mysqli_query($connect,  $duration);

// Dumping data for table `durations`

$insert_duration = "INSERT INTO `durations` (`due_id`, `period`) VALUES
(1, '40 Mins'),
(2, '1 hr'),
(3, '1 hrs 20 Mins'),
(4, '1 hr 30 Mins'),
(5, '1 hr 40 Mins'),
(6, '2 hrs'),
(7, '2 hrs 30 Mins'),
(8, '3 hrs')";
mysqli_query($connect,  $insert_duration);

// creta table week-days
$week = "CREATE TABLE IF NOT EXISTS `week` (
  `week_id` int(11) NOT NULL AUTO_INCREMENT,
  `day_lable` varchar(10),
  PRIMARY KEY (`week_id`)
)";
mysqli_query($connect,  $week);

// Dumping data for table `week`

$insert_week = "INSERT INTO `week` (`week_id`, `day_lable`) VALUES
(1, 'Monday'),
(2, 'Tuesday'),
(3, 'Wednesday'),
(4, 'Thursday'),
(5, 'Friday'),
(6, 'Saturday')";
mysqli_query($connect,  $insert_week);


 //Constraints for table `semester`

$sql_alterSem = "ALTER TABLE `semester`
  ADD CONSTRAINT `semester_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON DELETE CASCADE";
mysqli_query($connect,  $sql_alterSem);

//Constraints for table `subject`

$sql_alterCourse = "ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON DELETE CASCADE";
mysqli_query($connect,  $sql_alterCourse);

//Constraints for table `timeschedule`

$sql_alterTime = "ALTER TABLE `timeschedule`
  ADD CONSTRAINT `timeschedule_ibfk_1` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturer` (`lecturer_id`) ON DELETE CASCADE";
mysqli_query($connect,  $sql_alterTime);
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;











?>