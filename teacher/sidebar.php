<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      
    <!-- Dashboard -->
      <li class="nav-item">
        <a class="nav-link " href="home.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <!-- Sections Nav --> 
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Sections</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          
            <?php @include '../models/dbcon.php';
	          $query = mysqli_query($conn,"select * from sections") or die(mysqli_error());
	          while ($row = mysqli_fetch_array($query)) {
		          ?>
          <li>
            <a href="section.php?sec_id=<?php echo $row['section_id']; ?>">
              <i class="bi bi-circle"></i><span><?php echo $row['section_name']; ?></span>
            </a>
          </li>

          <?php } ?> 
  
 
         
        </ul>
      </li>
      <!-- End Sections Nav -->

      


      

  
      <li class="nav-item">
        <a class="nav-link collapsed" href="../../../projects.html">
          <i class="bi bi-person"></i>
          <span>Go Back to Rhandon.tech</span>
        </a>
      </li><!-- End Profile Page Nav -->


      

      

      

      

    </ul>

  </aside>