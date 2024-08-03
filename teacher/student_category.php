<?php @include '../controllers/session.php'; ?>
<?php   
        include('../models/dbcon.php');
        $query_teacher= mysqli_query($conn,"select * from teachers where teacher_id = '$session_id'")or die(mysqli_error());
        $row_teacher = mysqli_fetch_array($query_teacher);
        $status = $row_teacher['status'];	
        
        $subjectID = $_GET['subject_id'];  //get the assignment id
        $studentID = $_GET['student_id'];

        $query_subject= mysqli_query($conn,"select * from subjects where subject_id = '$subjectID'")or die(mysqli_error());
        $row_subject = mysqli_fetch_array($query_subject);

        $query_student= mysqli_query($conn,"select * from students where student_id = '$studentID'")or die(mysqli_error());
        $row_student = mysqli_fetch_array($query_student);
        $student = $row_student['name'];	

        $subject = $row_subject["subject_name"];


?>
<?php @include 'head.php'; ?>


</head>

<body>


<!-- ======= Header ======= -->
<?php @include 'header.php'; ?>
<!-- End Header -->

<?php 

if($status == 0){ ?>


<?php }else{ ?>

  <!-- ======= Sidebar ======= -->
  <?php @include 'sidebar.php'; ?>
  <!-- End Sidebar-->


<?php } ?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1><?php echo $subject. " / " .$student; ?></h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">


          <?php 

if($status == 0){ ?>

        <!-- Calara Card -->
        <div class="col-xxl-12 col-md-6">
              <div class="card info-card sales-card">

          

                <div class="card-body">
                  <h5 class="card-title">Notice!</h5>

                  <div class="d-flex align-items-center">
                   
                    <div class="ps-3">
                      <h6>Sorry</h6>
                      <span class="text-muted small pt-2 ps-1">You are not yet Activated </span>

                    </div>
                  </div>
                </div>

              </div>
            </div>
          <!-- End Calara Card -->

<?php }else{ ?>
  

          


          <!-- Categories -->

          <?php
            @include '../models/dbcon.php';
	          $query = mysqli_query($conn,"select * from subjects ") or die(mysqli_error());
	          $row = mysqli_fetch_array($query)
		          ?>

         
          <!-- Profile Card -->

          <div class="col-xl-3">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="../assets/img/books.jpg" alt="Profile" style="width: 100%;" ><br>
              <center><h3>Assignment</h3>
              <a href="student_record.php?subjectID=<?php echo $subjectID; ?>&studentID=<?php echo $studentID; ?>&category=assignment"><i class="ri-file-word-2-line"></i> View</a></center>
            </div>
          </div>

        </div>
        <!-- End Profile Card -->

        <!-- Profile Card -->

        <div class="col-xl-3">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="../assets/img/books.jpg" alt="Profile" style="width: 100%;" ><br>
              <center><h3>Quiz</h3>
              <a href="student_record.php?subjectID=<?php echo $subjectID; ?>&studentID=<?php echo $studentID; ?>&category=quiz"><i class="ri-file-word-2-line"></i> View</a></center>
            </div>
          </div>

          </div>
          <!-- End Profile Card -->

          <!-- Profile Card -->

        <div class="col-xl-3">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="../assets/img/books.jpg" alt="Profile" style="width: 100%;" ><br>
            <center><h3>Written Works</h3>
            <a href="student_record.php?subjectID=<?php echo $subjectID; ?>&studentID=<?php echo $studentID; ?>&category=written"><i class="ri-file-word-2-line"></i> View</a></center>
          </div>
        </div>

        </div>
        <!-- End Profile Card -->

        <!-- Profile Card -->

        <div class="col-xl-3">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="../assets/img/books.jpg" alt="Profile" style="width: 100%;" ><br>
            <center><h3>Performance Task</h3>
            <a href="student_record.php?subjectID=<?php echo $subjectID; ?>&studentID=<?php echo $studentID; ?>&category=performance"><i class="ri-file-word-2-line"></i> View</a></center>
          </div>
        </div>

        </div>
        <!-- End Profile Card -->

    
      
      
       
       































<?php }


?>

        

          </div>


        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          

              

          

        
          

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php @include 'footer.php'; ?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <?php @include 'script.php'; ?>

</body>

</html>