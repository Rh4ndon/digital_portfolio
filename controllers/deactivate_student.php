<?php  
    error_reporting(-1);
    include('../models/dbcon.php');

    $student_id= $_GET['id'];
    
    $query = mysqli_query($conn,"UPDATE students SET status=0 WHERE student_id = '$student_id'")or die(mysqli_error());
  
    
?>
    <script>
    alert('Student Successfully Deactivated');
    window.location.href = "../admin/student.php";
    </script>
    <?php



?>