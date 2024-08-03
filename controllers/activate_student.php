<?php  
    error_reporting(-1);
    include('../models/dbcon.php');

    $student_id= $_GET['id'];
    
    $query = mysqli_query($conn,"UPDATE students SET status=1 WHERE student_id = '$student_id'")or die(mysqli_error());
  
    
?>
    <script>
    alert('Student Successfully Activated');
    window.location.href = "../admin/student.php";
    </script>
    <?php



?>