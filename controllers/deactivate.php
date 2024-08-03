<?php  
    error_reporting(-1);
    include('../models/dbcon.php');

    $teacher_id= $_GET['id'];
    
    $query = mysqli_query($conn,"UPDATE teachers SET status=0 WHERE teacher_id = '$teacher_id'")or die(mysqli_error());
  
    
?>
    <script>
    alert('Teacher Successfully Deactivated');
    window.location.href = "../admin/teacher.php";
    </script>
    <?php



?>