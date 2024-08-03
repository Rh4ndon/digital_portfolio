<?php @include '../controllers/session.php'; ?>
<?php   
        include('../models/dbcon.php');
        $query_student= mysqli_query($conn,"select * from students where student_id = '$session_id'")or die(mysqli_error());
        $row_student = mysqli_fetch_array($query_student);
        $status = $row_student['status'];	
        
        $subjectID = $_GET['subjectID'];  //get the assignment id
        $query_subject= mysqli_query($conn,"select * from subjects where subject_id = '$subjectID'")or die(mysqli_error());
        $row_subject = mysqli_fetch_array($query_subject);

        $subject = $row_subject['subject_name'];


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
      <h1>Assignment / <?php echo $subject; ?> / <?php echo $row_student['section']; ?></h1>
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
  

          


          <!-- Assignment Table -->
          <div class="col-xxl-12 col-xl-12">
      

            <div class="card table-responsive">

              <div class="card-body">
               <h5 class="card-title">List of Assignments </h5>
              
               <table class="table datatable">
                
                <thead>
                  <tr>
                    <th scope="col">
                     Category
                    </th>
                    <th scope="col">
                     Title
                    </th>
                    <th scope="col">
                     File Name
                    </th>
                    <th scope="col">
                     Subject
                    </th>
                    <th scope="col">
                      Deadline
                    </th>
                    <th scope="col">
                      Grade
                    </th>
                    <th scope="col">
                      Action
                    </th>
                   
                  </tr>
                </thead>
                <tbody>
                <?php
            @include '../models/dbcon.php';
	          $query_ass = mysqli_query($conn,"select * from assignments where subject = '$subject' order by category desc ") or die(mysqli_error());
	          while ($row = mysqli_fetch_array($query_ass)) {
            $category = $row['category'];
            $assign_id =  $row['assignment_id'];
            $total = $row['total_points'];
            $dateStringFromDB =  $row['deadline']; // replace this with the actual date string from your database
            $date = DateTime::createFromFormat('Y-m-d', $dateStringFromDB);
            $formattedDate = $date->format('m/d/Y');
		          ?>
                  <tr>
                    <th scope="row"><?php echo $row['category']; ?></th>
                    <th scope="row"><?php echo $row['title']; ?></th>
                    <td><a href="../controllers/download.php?path=../uploads/<?php echo $row['file_name']; ?>" ><i class="ri-arrow-down-circle-line"></i> <?php echo $row['file_name']; ?></a></td>
                    <td><?php echo $row['subject']; ?></td>
                    <td><?php echo $formattedDate; ?></td>
                    <td>
                     <?php 
                      $query_submitted = mysqli_query($conn,"select * from student_assignments where assignment_id = '$assign_id' and subject_id = '$subjectID' and student_id = '$session_id' ")or die(mysqli_error());
                      $count_submitted = mysqli_num_rows($query_submitted);
                      if($count_submitted >0 ){

                        $fetch_assign = mysqli_fetch_array($query_submitted);
                        echo $fetch_assign['grade']."/".$total;
                      }else{
                        mysqli_query($conn,"insert into student_assignments (assignment_id,subject_id,student_id,file_name,category,grade,status)
                        values ('$assign_id','$subjectID','$session_id','','$category',0,0)") or die(mysqli_error());
                        echo '<script>location.reload(true);</script>';

                      }

                  ?> 
                 
                   </td>

                   <td>
                   
                     <?php 
                     if($count_submitted >0 ){

                      if ($fetch_assign['file_name'] == ''){?>
                    
                        <a href="submit_assignment.php?id=<?php echo $row['assignment_id']; ?>&subjectID=<?php echo $subjectID; ?>"class="btn btn-info"><i class="bx bx-send"></i> Submit</a>
                        <?php 
                        }else{ ?>
                        Download Your Submitted Assignment <br>
                        <a href="../controllers/download.php?path=../uploads/<?php echo $fetch_assign['file_name']; ?>" ><i class="ri-arrow-down-circle-line"></i> <?php echo $fetch_assign['file_name']; ?></a>
                        

                    <?php }} ?>
                  
                    
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