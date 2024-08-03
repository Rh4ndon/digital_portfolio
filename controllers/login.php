 <!-- Login API -->
<?php
		include('../models/dbcon.php');
		session_start();
		$email = $_POST['email'];
		$password = $_POST['password'];
		/* studentss */
			$query = "SELECT * FROM students WHERE email='$email' AND password='$password'";
			$result = mysqli_query($conn,$query)or die(mysqli_error());
			$row = mysqli_fetch_array($result);
			$num_row = mysqli_num_rows($result);
		
		/* teacher */
		$query_teacher = mysqli_query($conn,"SELECT * FROM teachers WHERE email='$email' AND password='$password'")or die(mysqli_error());
		$row_teacher = mysqli_fetch_array($query_teacher);
		$num_row_teacher = mysqli_num_rows($query_teacher);
		
		/* admin */
		$query_admin = mysqli_query($conn,"SELECT * FROM admin WHERE email='$email' AND password='$password'")or die(mysqli_error());
		$row_admin = mysqli_fetch_array($query_admin);
		$num_row_admin = mysqli_num_rows($query_admin);
		 
		if( $num_row > 0 ) { 
		$_SESSION['id']=$row['student_id'];
		echo "<script> location.href='../student/student_dashboard.php'; </script>";
        exit();	
		}else if ($num_row_teacher > 0){
		$_SESSION['id']=$row_teacher['teacher_id'];
		echo "<script> location.href='../teacher/home.php'; </script>";
        exit();	
		
		 }
		 else if ($num_row_admin > 0){
			$_SESSION['id']=$row_admin['admin_id'];
			echo "<script> location.href='../admin/section.php'; </script>";
			exit();	
			
			 }
		 else{ 
            echo "<script> location.href='../index.php?msg=failed'; </script>";
		}	
				
		?>