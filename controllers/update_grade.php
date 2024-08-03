<?php  
    error_reporting(-1);
    include('../models/dbcon.php');

    $assign_id= $_POST['assign_id'];
    $subject_id = $_POST['subject_id'];
    $student_id = $_POST['student_id'];
    $grade= $_POST['grade'];

    
    
    $query = mysqli_query($conn,"UPDATE student_assignments SET grade='$grade' WHERE assignment_id = '$assign_id' and subject_id = '$subject_id' and  student_id = '$student_id' ")or die(mysqli_error());
  
    header('Location: ../teacher/student_record.php?student_id='.$student_id.'&subject_id='.$subject_id); 
    exit();
?>