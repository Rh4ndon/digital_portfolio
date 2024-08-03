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
          <div class="col-xxl-3 col-xl-12">
          <?php @include '../controllers/add_subject.php'; ?>
      

            <div class="card info-card customers-card">

              <div class="card-body">
               <h5 class="card-title">Add Subject</h5>

                <div class="d-flex align-items-center">
                 
                  <form method="post" enctype="multipart/form-data" >

                  
                    <input class="form-control" type="text" name="subject_name" placeholder="Subject Name" required>
                 
                  
                </div>
                <br>
                <div class="align-items-center">
                  <button type="submit" name="add" class="btn btn-primary">Add</button>
                 
                </div>
                </form>
              </div>
            </div>

          </div>
          <!-- End Bañaga Card -->



          <!-- Customers Card -->
          <div class="col-xxl-9 col-xl-12">
      

            <div class="card info-card customers-card">

              <div class="card-body">
               <h5 class="card-title">List of Subjects</h5>

               <table class="table datatable">
                <thead>
                  <tr>
                    <th>
                      ID No.
                    </th>
                    <th>
                      Subject Name
                    </th>
                    <th>
                      Action
                    </th>
                   
                  </tr>
                </thead>
                <tbody>
                <?php
  @include '../models/dbcon.php';
	$query = mysqli_query($conn,"select * from subjects") or die(mysqli_error());
  $i =1;
	while ($row = mysqli_fetch_array($query)) {
		$id = $row['subject_id'];
		?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['subject_name']; ?></td>
                    <td><a href="../controllers/delete_subject.php?id=<?php echo $row['subject_id']; ?>"class="btn btn-danger"><i class="bi bi-trash-fill"></i> Delete</a></td>
           
                  </tr>
      
      
      <?php $i++; } ?>   
                  </tbody>
              </table>

               
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