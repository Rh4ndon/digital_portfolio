<?php @include '../controllers/session.php'; ?>
<?php   
        include('../models/dbcon.php');
        $query_teacher= mysqli_query($conn,"select * from teachers where teacher_id = '$session_id'")or die(mysqli_error());
        $row_teacher = mysqli_fetch_array($query_teacher);
        $status = $row_teacher['status'];	
        
        $subjectID = $_GET['subjectID'];  //get the assignment id
        $studentID = $_GET['studentID'];

        $query_subject= mysqli_query($conn,"select * from subjects where subject_id = '$subjectID'")or die(mysqli_error());
        $row_subject = mysqli_fetch_array($query_subject);

        $query_student= mysqli_query($conn,"select * from students where student_id = '$studentID'")or die(mysqli_error());
        $row_student = mysqli_fetch_array($query_student);
        $student = $row_student['name'];	

        $subject = $row_subject["subject_name"];

     

        if ($_GET['category'] == 'assignment'){
          $category = 'Assignment';
        }else if ($_GET['category'] == 'quiz'){
          $category = 'Quiz';
        }else if ($_GET['category'] == 'written'){
          $category = 'Written Works';
        }else if ($_GET['category'] == 'performance'){
          
          $category = 'Performance Task';
        }


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
      <h1><?php echo $category." / ". $subject. " / " .$student; ?></h1>
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
      

            <div class="card info-card customers-card" style=" overflow-x: auto;">

              <div class="card-body">
               <h5 class="card-title">List of <?= $category ?></h5>
               
               <table class="table datatable">
                
                <thead>
                  <tr>
                    <th>
                     Title
                    </th>
                
                    <th>
                     Subject
                    </th>
                    <th>
                      Deadline
                    </th>
                    <th>
                    Submitted Assignment
                    </th>
                    <th>
                    Grade
                    </th>
              
                   
                  </tr>
                </thead>
                <tbody>
                <?php
            @include '../models/dbcon.php';
	          $query = mysqli_query($conn,"select * from assignments where subject = '$subject' and category = '$category' ") or die(mysqli_error());
	          while ($row = mysqli_fetch_array($query)) {
            $category = $row['category'];
            $assign_id =  $row['assignment_id'];
            $total = $row['total_points'];
            $dateStringFromDB =  $row['deadline']; // replace this with the actual date string from your database
            $date = DateTime::createFromFormat('Y-m-d', $dateStringFromDB);
            $formattedDate = $date->format('m/d/Y');
		          ?>
             
                  <tr>
                
                    <td><?php echo $row['title']; ?></td>
                
                    <td><?php echo $row['subject']; ?></td>
                    <td><?php echo $formattedDate; ?></td>
                    <td>
                   

                     <?php 
                      $query_submitted = mysqli_query($conn,"select * from student_assignments where assignment_id = '$assign_id' and subject_id = '$subjectID' and student_id = '$studentID' and category = '$category'")or die(mysqli_error());
                      $count_submitted = mysqli_num_rows($query_submitted);
                      if($count_submitted >0 ){

                        $fetch_assign = mysqli_fetch_array($query_submitted);

                        if ($fetch_assign['file_name'] == ''){?>
                    
                          No Assignment Submitted Yet!
                          <?php 
                          }else{ ?>
                         
                          <a href="../controllers/download.php?path=../uploads/<?php echo $fetch_assign['file_name']; ?>" ><i class="ri-arrow-down-circle-line"></i> <?php echo $fetch_assign['file_name']; ?></a>
                          
  
                      <?php }


                    }else{
                        mysqli_query($conn,"insert into student_assignments (assignment_id,subject_id,student_id,file_name,category,grade,status)
                        values ('$assign_id','$subjectID','$studentID','','$category',0,0)") or die(mysqli_error());
                        echo '<script>location.reload(true);</script>';

                      }

                  ?> 
                 
                   </td>

                   <td>
                   
                     <?php 
                     if($count_submitted >0 ){


                      if($fetch_assign['grade'] == 0){ ?>
                 
                 <form method="POST" action="../controllers/update_grade.php">
                      <div class="input-group col-sm-2">
                          <input type="number" name="grade" min="1" step="1" max="<?php echo $total;	?>" required class="form-control">
                          <input type="hidden" name="student_id" value="<?php echo $studentID;	?>" required>
                          <input type="hidden" name="subject_id" value="<?php echo $subjectID;	?>" required>
                          <input type="hidden" name="assign_id" value="<?php echo $assign_id;	?>" required>
                          <button type="submit" name="record_grade" class="btn btn-outline-success float-right">
                              Save <i class="bx bx-send"></i>
                          </button>
                      </div>
                  </form>
    
                            <?php 
                           
                          }else{
                            echo $fetch_assign['grade']."/".$total;
                          }

                 } ?>
                  
                    
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