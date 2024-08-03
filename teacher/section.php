<?php @include '../controllers/session.php'; ?>
<?php   
        include('../models/dbcon.php');
        $query_teacher= mysqli_query($conn,"select * from teachers where teacher_id = '$session_id'")or die(mysqli_error());
        $row_teacher = mysqli_fetch_array($query_teacher);
        $status = $row_teacher['status'];
        $subject = $row_teacher['subject'];				
        
        $section_id= $_GET['sec_id'];

        $query_section= mysqli_query($conn,"select * from sections where section_id = '$section_id'")or die(mysqli_error());
        $row_section = mysqli_fetch_array($query_section);
        $section_name = $row_section['section_name'];

        $query_subject= mysqli_query($conn,"select * from subjects where subject_name = '$subject'")or die(mysqli_error());
        $row_subject = mysqli_fetch_array($query_subject);
        $subject_id = $row_subject['subject_id'];
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
      <h1><?php echo $section_name; ?> / <?php echo $subject; ?> </h1>
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
  

          
  <?php
            @include '../models/dbcon.php';
	          $query = mysqli_query($conn,"select * from students where section = '$section_name'") or die(mysqli_error());
	          $num_row = mysqli_num_rows($query);
            if( $num_row > 0 ) { 

            while ($row = mysqli_fetch_array($query)) {
            $student_id =  $row['student_id'];
		          ?>

         
          <!-- Profile Card -->

          <div class="col-xl-2">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="../assets/img/<?php echo $row['picture']; ?>" alt="Profile" style="width: 50%;" class="rounded-circle">
              <center><h5><?php echo $row['name']; ?></h5>
              <a href="student_category.php?student_id=<?php echo $student_id."&subject_id=".$subject_id; ?>"><i class="ri-file-user-fill"></i> Records</a></center>
            </div>
          </div>

        </div>
        <!-- End Profile Card -->
                   
            
    
      
      
      <?php }}else{
        echo '
        <div class="col-xl-2">
        <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            No Record Yet!
        </div>
        </div>
        </div>
        ';
      } ?>   
                 

            
    































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