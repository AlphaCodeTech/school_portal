<!DOCTYPE html>
<html lang="en">
<head>
	<?php include "../partials/user/head.php" ?>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <header>
        <?php include "../partials/user/header.php" ?>
    </header>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
        <?php include "../partials/user/sidebar.php" ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-4">User | Change Password &nbsp; <i class="menu-icon mdi mdi-key"></i></h5>
                            <div class="fluid-container">
<?php
    if (isset($_POST['submit'])) {

        $newp = md5($_POST['newp']);
        $cnewp = md5($_POST['cnewp']);

        if($newp == $cnewp){
            $id = $_SESSION['sd']['id'];
            $role = $_SESSION['sd']['role'];

            if($role == 'student'){
                $sql = "UPDATE student_data SET password = '$cnewp' WHERE id = '$id' ";
            }else{
                $sql = "UPDATE employee_data SET password = '$cnewp' WHERE id = '$id' ";
            }

            if($result = $conn->query($sql)){
                echo '
                    <div class="alert alert-success">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Success!</strong> Updated Successfuly
                    </div>
                ';
            }else{
                echo '
                    <div class="alert alert-danger">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Error!</strong> failed to Update.
                    </div>
                ';
            }
        }else{
            echo '
                <div class="alert alert-danger">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Error!</strong> New Password and Confirm New Password Does not Match
                </div>
            ';
        }

    }

?>
                                <div id="myalert"></div>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-4">
                                        <form action="" method="post">
                                          <div class="form-group">
                                            <input type="password" name="newp" class="form-control" id="newp" placeholder="Enter New password" minlength="5" required>
                                          </div>
                                          <div class="form-group">
                                            <input type="password" name="cnewp" class="form-control" id="cnewp" placeholder="Confirm New password" required>
                                          </div>
                                            <button type="submit" name="submit" class="btn btn-primary add"><i class="fa fa-download"></i>Apply Changes</button>
                                        </form>
                                    </div>
                                    <div class="col-sm-3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
            <?php include "../partials/user/footer.php" ?>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

    <!--  cdns  -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <?php include "../partials/user/bottom.php" ?>
</body>
</html>