
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
          
          <?php
                if ($_SESSION['sd']['role'] == 'Cashier'){
          ?>
                <li class="nav-item">
                    <a class="nav-link" href="debt.php">
                        <i class="menu-icon mdi mdi-credit-card-multiple"></i>
                        <span class="menu-title">Debt</span>
                    </a>
                </li>
          <?php
                }
          
           if ($_SESSION['sd']['role'] == 'System Admin'  OR $_SESSION['sd']['role'] == 'Administrative Staff') {
            if ($_SESSION['sd']['role'] == 'System Admin') { 
            ?>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-settings mdi-spin"></i>
              <span class="menu-title">Settings</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="scratchcard.php">Scratch Card</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="level.php">Level</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="class.php">Class</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="subject.php">Subject</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="classsubject.php">Class Subject</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="session.php">Session</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="termtype.php">Term Type</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="term.php">Term</a>
                </li>
              </ul>
            </div>
          </li>
          <?php } ?>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#employee" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon fa fa-users"></i>
              <span class="menu-title">Employees</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="employee">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="employee.php">Search</a>
                </li>
                <?php if ($_SESSION['sd']['role'] == 'System Admin') { ?>
                <li class="nav-item">
                  <a class="nav-link" href="add_employee.php">Add Employee</a>
                </li>
                <?php } ?>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#student" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon fa fa-user-graduate"></i>
              <span class="menu-title">Student</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="student">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="student.php">Search</a>
                </li>
                <?php if ($_SESSION['sd']['role'] == 'System Admin') { ?>
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
          <?php } 

           if ($_SESSION['sd']['role'] == 'System Admin' OR $_SESSION['sd']['role'] == 'Teacher'  OR $_SESSION['sd']['role'] == 'Administrative Staff') { ?>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#filebank" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-file"></i>
              <span class="menu-title">File Bank</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="filebank">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="lesson_note.php">Lesson note</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="past_question.php">Past Question</a>
                </li>
              <?php if ($_SESSION['sd']['role'] == 'System Admin' OR $_SESSION['sd']['role'] == 'Teacher') { ?>
                <li class="nav-item">
                  <a class="nav-link" href="upload_lesson_note.php">Upload Lesson Note</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="upload_past_question.php">Upload Past Question</a>
                </li>
              <?php } ?>
              </ul>
            </div>
          </li>
          <?php } ?>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#assignment" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-pen"></i>
              <span class="menu-title">Assignment</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="assignment">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="assignment.php">Assignment</a>
                </li>
                <?php
                    if ($_SESSION['sd']['role'] == 'System Admin' OR $_SESSION['sd']['role'] == 'Teacher') {
                 ?>
                <li class="nav-item">
                  <a class="nav-link" href="upoad_assignment.php">Upload Assignment</a>
                </li>
                <?php } ?>
                <li class="nav-item">
                  <a class="nav-link" href="assignment_submitted.php">Assignment Submitted</a>
                </li>
                <?php
                    if ($_SESSION['sd']['role'] == 'System Admin' OR $_SESSION['sd']['role'] == 'student') {
                 ?>
                <li class="nav-item">
                  <a class="nav-link" href="submit_assignment.php">Submit Assignment</a>
                </li>
                <?php } ?>
              </ul>
            </div>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#broadcast" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon fas fa-broadcast-tower"></i>
              <span class="menu-title">Broadcast</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="broadcast">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="search_notice">Search Notice</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="search_sms">Search SMS</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="send_notice">Send Notice</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="send_sms">Send SMS</a>
                </li>
              </ul>
            </div>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#result" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon fa fa-database"></i>
              <span class="menu-title">Result</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="result">
              <ul class="nav flex-column sub-menu">
                <?php if ($_SESSION['sd']['role'] == 'System Admin' OR $_SESSION['sd']['role'] == 'Teacher') { ?>
                <li class="nav-item">
                  <a class="nav-link" href="live_edit.php">Live Edit</a>
                </li>
                <?php } 
                 if ($_SESSION['sd']['role'] == 'System Admin') { ?>
                <li class="nav-item">
                  <a class="nav-link" href="generate_result.php">Generate Result</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="publish_result.php">Publish Result</a>
                </li>
                <?php } 
                 if ($_SESSION['sd']['role'] == 'System Admin' OR $_SESSION['sd']['role'] == 'student') { ?>
                <li class="nav-item">
                  <a class="nav-link" href="check_result.php">Check Result</a>
                </li>
                <?php } ?>
              </ul>
            </div>
          </li>
        </ul>
      </nav>