<?php @include '../controllers/session.php'; ?>
<?php   
        include('../models/dbcon.php');
        $query_student= mysqli_query($conn,"select * from students where student_id = '$session_id'")or die(mysqli_error());
        $row_student = mysqli_fetch_array($query_student);
        $status = $row_student['status'];
        $student = $row_student['name'];

        $subjectID = $_GET['subjectID']; 
        $assignID = $_GET['id']; 

        $query_subject= mysqli_query($conn,"select * from subjects where subject_id = '$subjectID'")or die(mysqli_error());
        $row_subject = mysqli_fetch_array($query_subject);

        $query_assign= mysqli_query($conn,"select * from assignments where assignment_id = '$assignID'")or die(mysqli_error());
        $row_assign = mysqli_fetch_array($query_assign);

        $subject = $row_subject["subject_name"];

        $assign = $row_assign['title'];

     				
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
      <h1>Assignment / <?php echo $subject; ?> / <?php echo $row_student['section']; ?> </h1>
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
  

          <!-- Customers Card -->
          <div class="col-xxl-3 col-xl-12">
          <?php @include '../controllers/upload_assignment.php'; ?>

            <div class="card info-card customers-card">

              <div class="card-body">
               <h5 class="card-title">Upload Your Assignment For <u><?php echo $assign; ?></u> Here</h5>

                  <div class="d-flex align-items-center">
                 
                  <form method="post" enctype="multipart/form-data">
                 
              
                
                  <div class="col-sm-16">
                    <input class="form-control" type="file" name="document" id="formFile" required>
                    <input type="hidden" name="student_file" value="<?php echo $student.'_'.$assign; ?>" required>
                    <input type="hidden" name="assignment_id" value="<?php echo $assignID; ?>" required>
                    <input type="hidden" name="subject_id" value="<?php echo $subjectID; ?>" required>
                    <input type="hidden" name="student_id" value="<?php echo $session_id; ?>" required>
                  </div>
        
                  
                </div>
                <br>
                <div class="text-center">
                  <button type="submit" name="upload" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
                </form>
              </div>
            </div>

          </div>
          <!-- End Bañaga Card -->


          <!-- Assignment Table -->
          <div class="col-xxl-9 col-xl-12">
      

            <div class="card info-card customers-card" style=" overflow-x: auto;">

              <div class="card-body">
               <h5 class="card-title">List of Assignments</h5>

               <table class="table datatable">
                
                <thead>
                  <tr>
                    <th>
                     Title
                    </th>
                    <th>
                     File Name
                    </th>
                    <th>
                     Points
                    </th>
                     <th>
                      Status
                    </th>
                 
                   
                  </tr>
                </thead>
                <tbody>
                <?php
            @include '../models/dbcon.php';
	          $query = mysqli_query($conn,"select * from student_assignments where student_id = '$session_id' and subject_id = '$subjectID' ") or die(mysqli_error());
	          while ($row = mysqli_fetch_array($query)) {
              $assign_id = $row['assignment_id'];
           
		          ?>
                  <tr>
                    <td>
                    <?php $query2 = mysqli_query($conn,"select * from assignments where assignment_id = '$assign_id'") or die(mysqli_error());
                          $row2 = mysqli_fetch_array($query2);
                          echo $row2['title'];
                      ?>
                    </td>

                    <td>
                      <?php if($row['file_name'] == ''){
                        echo "You didn't submit yet!";
                      } else{ ?>

                      <a href="../controllers/download.php?path=../uploads/<?php echo $row['file_name']; ?>" ><i class="ri-arrow-down-circle-line"></i> <?php echo $row['file_name']; ?></a></td>

                    <?php } ?>

                    </td>
                  
                  
                    <td><?php echo $row['grade']; ?> pts</td>
                    <td>
                     <?php 
                    if ($row['status'] == 0){?>
                     Not Yet Checked
                     
                    <?php 
                    }else{ ?>
                      Already Graded
                  <?php  } ?> 
                 
                   </td>

        


           
                  </tr>
      
      
      <?php } ?>   
                  </tbody>
              </table>

               
              </div>
            </div>

          </div>
          <!-- End Assignment Table -->
    































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