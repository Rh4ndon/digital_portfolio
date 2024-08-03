<?php 
include '../models/dbcon.php';

if (isset($_POST['register'])) {
                           
    $email = $_POST['email'];
    $firstname = $_POST['name'];
    $lastname = $_POST['lname'];
    $password = $_POST['password'];
    $section = $_POST['section'];

    
    
    $query = mysqli_query($conn,"select * from students where email = '$email' && name = '$firstname $lastname'")or die(mysqli_error());
    $count = mysqli_num_rows($query);
    
    if ($count > 0){ ?>
    <script>
    alert('User Already Exist');
    </script>
    <?php
    }else{

    mysqli_query($conn,"insert into students (email,password,name,section,picture,status)
    values ('$email','$password','$firstname $lastname','$section','profile-img.jpg', 0)") or die(mysqli_error()); 

      /* student */
		$query_student = mysqli_query($conn,"SELECT * FROM students WHERE email='$email' AND password='$password'")or die(mysqli_error());
		$row_student = mysqli_fetch_array($query_student);
		$num_row_student = mysqli_num_rows($query_student);   
    session_start();
    $_SESSION['id']=$row_student['student_id'];
    
    header('Location: ../student/student_dashboard.php');
    exit();
    }}

    if (isset($_POST['register_teacher'])) {
                           
      $email = $_POST['email'];
      $firstname = $_POST['name'];
      $lastname = $_POST['lname'];
      $password = $_POST['password'];
  
      
      $query = mysqli_query($conn,"select * from teachers where email = '$email' && name = '$firstname $lastname'")or die(mysqli_error());
      $count = mysqli_num_rows($query);
      
      if ($count > 0){ ?>
      <script>
      alert('User Already Exist');
      window.location.href="../index.php";
      </script>
      <?php
      }else{
  
      mysqli_query($conn,"insert into teachers (email,password,name,subject,picture,status)
      values ('$email','$password','$firstname $lastname','0','profile-img.jpg', 0)") or die(mysqli_error()); 
  
        /* teacher */
      $query_teacher = mysqli_query($conn,"SELECT * FROM teachers WHERE email='$email' AND password='$password'")or die(mysqli_error());
      $row_teahcer = mysqli_fetch_array($query_teacher);
      $num_row_teacher = mysqli_num_rows($query_teacher);   
      session_start();
      $_SESSION['id']=$row_teahcer['teacher_id'];
      
      header('Location: ../teacher/home.php');
      exit();
      }}




?>