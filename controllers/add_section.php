<?php
include '../models/dbcon.php';

if (isset($_POST['add'])) {
                           

    $section_name = $_POST['section_name'];

    
    
    $query = mysqli_query($conn,"select * from sections where section_name = '$section_name'")or die(mysqli_error());
    $count = mysqli_num_rows($query);
    
    if ($count > 0){ ?>
    <script>
    alert('Section Already Exist');
    </script>
    <?php


    }else{

    mysqli_query($conn,"insert into sections (section_name)
    values ('$section_name')") or die(mysqli_error()); 


    }}


?>