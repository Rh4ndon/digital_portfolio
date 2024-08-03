  <?php  
    error_reporting(-1);
    include('../models/dbcon.php');

    $subject_id= $_GET['id'];
    
    $query = mysqli_query($conn,"DELETE FROM subjects WHERE subject_id = '$subject_id'")or die(mysqli_error());
  
    
?>
    <script>
    alert('Subject successfully Deleted');
    window.location.href = "../admin/subject.php";
    </script>
    <?php



?>
