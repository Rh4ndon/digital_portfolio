<?php  
    error_reporting(-1);
    include('../models/dbcon.php');

    $teacher_id= $_POST['teacher_id'];
    $subject= $_POST['subject'];
    
    $query = mysqli_query($conn,"UPDATE teachers SET subject='$subject' WHERE teacher_id = '$teacher_id'")or die(mysqli_error());
  
    
?>
    <script>
    alert('Teacher Successfully Updated');
    window.location.href = "../admin/teacher.php";
    </script>
    <?php



?>