<?php @include '../controllers/session.php'; ?>
<?php   
        include('../models/dbcon.php');
        $query_teacher= mysqli_query($conn,"select * from teachers where teacher_id = '$session_id'")or die(mysqli_error());
        $row_teacher = mysqli_fetch_array($query_teacher);
        $status = $row_teacher['status'];
        $subject = $row_teacher['subject'];					
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
      <h1>Dashboard / <?php echo $subject; ?></h1>
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
          <?php @include '../controllers/upload.php'; ?>

            <div class="card info-card customers-card">

              <div class="card-body">
               <h5 class="card-title">Upload Assignment</h5>

                  <div class="d-flex align-items-center">
                 
                  <form method="post" enctype="multipart/form-data">
                  <div class="col-sm-16">
                    <label>Title</label>
                    <input class="form-control" type="text" name="title"  placeholder="Assignment Title" required>
                    <input type="hidden" name="subject" value="<?php echo $row_teacher['subject'];	?>" required>
                  </div>
                  <br>
                  <div class="col-sm-16">
                    <label>Category</label>
                    <select class="form-control" type="text" name="category"  placeholder="Category" required>
                      <option value="Assignment">Assignment</option>
                      <option value="Quiz">Quiz</option>
                      <option value="Written Works">Written Works</option>
                      <option value="Performance Task">Performance Task</option>
                    </select>                    
                  </div>
                  <br>
                  <div class="col-sm-16">
                    <label>Total Points</label>
                    <input class="form-control" type="number" min="1" name="total_points"  placeholder="Assignment Points" required>
                  </div>
                  <br>
                  <div class="col-sm-16">
                    <label>Deadline</label>
                    <input class="form-control" type="date" name="deadline"  placeholder="Deadline" required>

                  </div>
                  <br>
                  <div class="col-sm-16">
                    <input class="form-control" type="file" name="document" id="formFile" required>
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
               <h5 class="card-title">List of <?php echo $subject; ?> Assignments</h5>

               <table class="table datatable">
                
                <thead>
                  <tr>
                    <th>
                     Category
                    </th>
                    <th>
                     Title
                    </th>
                    <th>
                     File Name
                    </th>
                    <th>
                     Subject
                    </th>
                    <th>
                     Total Points
                    </th>
                    <th>
                      Deadline
                    </th>
                    <th>
                      Status
                    </th>
                    <th>
                      Action
                    </th>
                   
                  </tr>
                </thead>
                <tbody>
                <?php
            @include '../models/dbcon.php';
	          $query = mysqli_query($conn,"select * from assignments where subject = '$subject'") or die(mysqli_error());
	          while ($row = mysqli_fetch_array($query)) {
            $dateStringFromDB =  $row['deadline']; // replace this with the actual date string from your database
            $date = DateTime::createFromFormat('Y-m-d', $dateStringFromDB);
            $formattedDate = $date->format('m/d/Y');
		          ?>
                  <tr>
                    <td><?php echo $row['category']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><a href="../controllers/download.php?path=../uploads/<?php echo $row['file_name']; ?>" ><i class="ri-arrow-down-circle-line"></i> <?php echo $row['file_name']; ?></a></td>
                    <td><?php echo $row['subject']; ?></td>
                    <td><?php echo $row['total_points']; ?> pts</td>
                    <td><?php echo $formattedDate; ?></td>
                    <td>
                     <?php 
                    if ($row['status'] == 0){?>
                     Already done
                     
                    <?php 
                    }else{ ?>
                      On going
                  <?php  } ?> 
                 
                   </td>

                   <td>
                   
                     
                 
                     <a href="../controllers/delete_assignment.php?id=<?php echo $row['assignment_id']; ?>"class="btn btn-danger"><i class="bx bx-message-square-check"></i> Delete</a>
                   
                   
                     <?php 
                    if ($row['status'] == 0){?>
                    
                     
                    <?php 
                    }else{ ?>
                       <a href="../controllers/done.php?id=<?php echo $row['assignment_id']; ?>"class="btn btn-info"><i class="bx bx-message-square-check"></i> Done</a>
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