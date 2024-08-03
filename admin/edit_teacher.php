<?php @include '../controllers/session.php'; ?>
<?php   
        include('../models/dbcon.php');
        $query_admin= mysqli_query($conn,"select * from admin where admin_id = '$session_id'")or die(mysqli_error());
        $row_admin = mysqli_fetch_array($query_admin);				
?>
<?php @include 'head.php'; ?>

</head>

<body>
<!-- ======= Header ======= -->
<?php @include 'header.php'; ?>
<!-- End Header -->


  <!-- ======= Sidebar ======= -->
  <?php @include 'sidebar.php'; ?>
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

          



          <!-- Customers Card -->
          <div class="col-xxl-16 col-xl-12">
      

            <div class="card info-card customers-card" style=" overflow-x: auto;">

              <div class="card-body">
               <h5 class="card-title">Edit Teachers</h5>

               <!-- General Form Elements -->
               <?php
              @include '../models/dbcon.php';
              $id = $_GET['id'];
	            $query = mysqli_query($conn,"select * from teachers where teacher_id='$id'") or die(mysqli_error());
	            $row = mysqli_fetch_array($query)
	
		          ?>
              <form method="POST" action="../controllers/update_teacher.php">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $row['name']; ?>"class="form-control" disabled>
                    <input type="hidden" name="teacher_id" value="<?php echo $row['teacher_id']; ?>"class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                  <input type="text" value="<?php echo $row['email']; ?>"class="form-control" disabled>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Subject</label>
                  <div class="col-sm-10">
                  <select name="subject" class="form-control">
                  <?php
                  @include 'models/dbcon.php';
	                $query = mysqli_query($conn,"select * from subjects") or die(mysqli_error());
	                while ($row = mysqli_fetch_array($query)) {
		              $id = $row['subject_id'];
		              ?>
                        <option><?php echo $row['subject_name']; ?></option>
                  
                        <?php } ?>   
                    </select>
                   
                  </div>
                </div>
      
       

             

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Save Button</label>
                  <div class="col-sm-10">
                    <button type="submit" name="update_section"class="btn btn-primary">Save Changes</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->
              
        
               
              </div>
            </div>

          </div>
          <!-- End Bañaga Card -->
    
            
     

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