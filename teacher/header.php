  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Digifolio</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

    <li class="nav-item dropdown">
    <?php   
        include('../models/dbcon.php');
        $query_assignment= mysqli_query($conn,"select * from student_assignments where file_name != '' and grade = 0")or die(mysqli_error());
        $num_row_assignment = mysqli_num_rows($query_assignment);


?>


<a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
  <i class="bi bi-bell"></i>
  <span class="badge bg-primary badge-number"><?php echo $num_row_assignment; ?></span>
</a><!-- End Notification Icon -->



<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
  <li class="dropdown-header">
    You have <?php echo $num_row_assignment; ?> student who submitted there assignments
  </li>

  <?php
	          while ($row_assign = mysqli_fetch_array($query_assignment)) {
              $assign_id = $row_assign['assignment_id'];
              $student_id = $row_assign['student_id'];
              $subject_id = $row_assign['subject_id'];

              $query_assign = mysqli_query($conn,"select * from assignments where assignment_id = '$assign_id'")or die(mysqli_error());
              $row_assign2 = mysqli_fetch_array($query_assign);

              $query_student = mysqli_query($conn,"select * from students where student_id = '$student_id'")or die(mysqli_error());
              $row_student = mysqli_fetch_array($query_student);

              $query_subject = mysqli_query($conn,"select * from subjects where subject_id = '$subject_id'")or die(mysqli_error());
              $row_subject = mysqli_fetch_array($query_subject);



		          ?>
  <li>
    <hr class="dropdown-divider">
  </li>

  <li class="notification-item">
    <i class="bi bi-exclamation-circle text-warning"></i>
    <div>
      <h4><u><?php echo $row_student['name']; ?></u> submitted an assignment</h4>
      <p><?php echo $row_student['section']; ?> / <?php echo $row_subject['subject_name']; ?>, <?php echo $row_assign2['title']; ?></p>

    </div>
  </li>

  <li>
    <hr class="dropdown-divider">
  </li>

  <?php } ?>

</ul><!-- End Notification Dropdown Items -->

</li><!-- End Notification Nav -->



    
  

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="../assets/img/<?php echo $row_teacher['picture']; ?>" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $row_teacher['name']; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $row_teacher['name']; ?></h6>
              <span><?php echo $row_teacher['section']; ?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="teacher_profile.php">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="../controllers/logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>

      





    </nav><!-- End Icons Navigation -->




  </header>