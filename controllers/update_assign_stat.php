<?php
include '../models/dbcon.php';

$assign_notification_id = $_GET['id'];


$query_notif = mysqli_query($conn,"select * from assignment_notification where notification_id = '$assign_notification_id' and notification_status = '1'")or die(mysqli_error());            
$row_notif = mysqli_fetch_array($query_notif);

$subject_name = $row_notif['subject'];

$query_subject = mysqli_query($conn,"select * from subjects where subject_name = '$subject_name'")or die(mysqli_error());            
$row_subject = mysqli_fetch_array($query_subject);

$subjectID = $row_subject['subject_id'];

mysqli_query($conn,"UPDATE assignment_notification SET notification_status = '0' WHERE notification_id = '$assign_notification_id'")or die(mysqli_error()); 

echo '<script>window.location.href = "../student/assignment.php?subjectID='.$subjectID.'";</script>';


?>