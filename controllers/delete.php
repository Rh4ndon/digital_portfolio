  <?php  
    error_reporting(-1);
    include('../models/dbcon.php');

    $section_id= $_GET['id'];
    
    $query = mysqli_query($conn,"DELETE FROM sections WHERE section_id = '$section_id'")or die(mysqli_error());
  
    
?>
    <script>
    alert('Section successfully Deleted');
    window.location.href = "../admin/section.php";
    </script>
    <?php



?>
