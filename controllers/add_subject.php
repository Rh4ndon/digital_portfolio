<?php
include '../models/dbcon.php';

if (isset($_POST['add'])) {
                           

    $subject_name = $_POST['subject_name'];

    
    
    $query = mysqli_query($conn,"select * from subjects where subject_name = '$subject_name'")or die(mysqli_error());
    $count = mysqli_num_rows($query);
    
    if ($count > 0){ ?>
    <script>
    alert('Subject Already Exist');
    </script>
    <?php


    }else{

    mysqli_query($conn,"insert into subjects (subject_name)
    values ('$subject_name')") or die(mysqli_error()); 


    }}



?>