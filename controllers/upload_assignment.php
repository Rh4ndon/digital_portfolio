<?php
include '../models/dbcon.php';

if (isset($_POST['upload'])) {

    $assign_id = $_POST['assignment_id'];
    $subject_id = $_POST['subject_id'];
    $student_id = $_POST['student_id'];
    $student_file = $_POST['student_file'];


$allowedExtensions = ['pdf', 'docx', 'xlsx', 'xls', 'png', 'jpg', 'jpeg'];
$targetDirectory = '../uploads/'; // Specify your desired directory

$uploadedFile = $_FILES['document']['tmp_name'];
$fileName = $_FILES['document']['name'];
$fileExtension = strtolower(pathinfo($_FILES['document']['name'], PATHINFO_EXTENSION));

// Verify that the uploaded file is valid and owned by the current user
if (is_uploaded_file($uploadedFile)) {
    if (in_array($fileExtension, $allowedExtensions)) {

        // Rename the file here
        $renamedFileName = $student_file . '.' . $fileExtension;

        move_uploaded_file($_FILES["document"]["tmp_name"], "../uploads/" . $renamedFileName);

        $query = mysqli_query($conn,"UPDATE student_assignments SET file_name='$renamedFileName' WHERE student_id = '$student_id' and assignment_id = '$assign_id' and subject_id = '$subject_id' ")or die(mysqli_error()); 


            echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                    File uploaded successfully!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Sorry, only IMAGE, PDF, and DOCX files are allowed.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                An error occurred while uploading the file.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
        
       ';
    }
}
?>