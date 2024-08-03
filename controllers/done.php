<?php  
    error_reporting(-1);
    include('../models/dbcon.php');

    $assignment_id= $_GET['id'];
    
    $query = mysqli_query($conn,"UPDATE assignments SET status=0 WHERE assignment_id = '$assignment_id'")or die(mysqli_error());
  
    
?>
    <script>
    window.location.href = "../teacher/home.php";
    </script>
    <?php



?>