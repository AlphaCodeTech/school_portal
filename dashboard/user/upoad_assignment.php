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
                            <h5 class="card-title mb-4">Assignment | Upload Assignment <i class="menu-icon mdi mdi-setting"></i></h5>
                            <div class="fluid-container">
<?php
    if(isset($_POST['submit'])){

        $date            = date("d/m/Y");
        $admno           = $_SESSION['sd']['admno'];
        $file_name       = uniqid().($_FILES['file']['name']);
        $subject         = $_POST['subject'];
        $term            = $_POST['term'];        
        $class           = $_POST['class'];

        $sql = "SELECT * FROM assignment WHERE subject = '$subject' AND term = '$term' AND class = '$class' ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo '
                <div class="alert alert-warning">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Waning!</strong> '.$subject.' Assignment  for '.$class.' in respect to '.$term.' already Exist
                </div>
            ';
        }else{
            $sql1 = "INSERT INTO assignment(subject, class, term, file, uploaded_by, date) VALUES('$subject', '$class', '$term', '$file_name', '$admno', '$date')";
            if($conn->query($sql1)){

                $destination     = "file/assignment/".$file_name;
                $filename        = $_FILES['file']['tmp_name'];
                move_uploaded_file($filename, $destination);

                echo '
                    <div class="alert alert-success">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Success!</strong>
                    </div>
                ';
            }
        }


    }
?>
                                <form action="" method="post" enctype="multipart/form-data" role="form" id="lessonnote_form">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="employee_email">Subject</label>
                                                <select name="subject" class="form-control" id="subject" required="required">
                                                    <option value="">Please Select</option>
                                                    <?php 
                                                        echo load_subject($conn);
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="employee_email">Term</label>
                                                <select name="term" class="form-control" id="term" required="required">
                                                    <option value="">Please Select</option>
                                                    <?php 
                                                        echo load_term($conn);
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="employee_email">Class</label>
                                                <select name="class" class="form-control" id="class" required="required">
                                                    <option value="">Please Select</option>
                                                    <?php 
                                                        echo load_class($conn);
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="pwd">Upload Assignment</label>
                                                <input type="file" accept="application/pdf, application/msword, application/vnd.ms-powerpoint, application/vnd.ms-excel" name="file" class="form-control" id="file" required="required">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <br>
                                          <button type="submit" name="submit" class="btn btn-primary">Submit &nbsp; <i class="fa fa-upload"></i></button>
                                        </div>
                                    </div>
                                </form>
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


    <?php include "../partials/user/bottom.php" ?>
    
</body>
</html>