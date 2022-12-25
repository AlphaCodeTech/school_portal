<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <div class="nav-link">
        <div class="user-wrapper">
          <div class="profile-image">
            <img class="img-xs rounded-circle" src="file/profile/<?php echo $_SESSION['sd']['photo'] ?>" alt="profile image">
          </div>
          <div class="text-wrapper">
            <p class="profile-name"><?php echo $_SESSION['sd']['surname'] ?> <?php echo $_SESSION['sd']['lastname'] ?> <?php echo $_SESSION['sd']['middlename'] ?></p>
            <div>
              <small class="designation text-muted"><?php echo $_SESSION['sd']['role'] ?></small>
              <span class="status-indicator online"></span>
            </div>
          </div>
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="dashboard.php">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>


    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#student" aria-expanded="false" aria-controls="ui-basic">
        <i class="menu-icon fa fa-user-graduate"></i>
        <span class="menu-title">School Fees</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="student">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="fees.php">Search</a>
          </li>
          <?php if ($_SESSION['sd']['role'] == 'Bursar') { ?>
            <li class="nav-item">
              <a class="nav-link" href="add_student.php">Add Student</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="promote_student.php">Promote Student</a>
            </li>
          <?php } ?>
          <li class="nav-item">
            <a class="nav-link" href="print_student_data.php">Print Student Data</a>
          </li>
          <?php if ($_SESSION['sd']['role'] == 'System Admin') { ?>
            <li class="nav-item">
              <a class="nav-link" href="subject_reg.php">Subject Registration</a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </li>


  </ul>
</nav>