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
                            <h5 class="card-title mb-4">File | Upload Lesson Note <i class="menu-icon mdi mdi-setting"></i></h5>
                            <div class="fluid-container">
<?php
    if(isset($_POST['submit'])){

        $admno           = $_SESSION['sd']['admno'];
        $date            = date("d/m/Y");
        $file_name       = uniqid().($_FILES['file']['name']);
        $subject         = $_POST['subject'];
        $term            = $_POST['term'];
        $month           = $_POST['month'];
        $class           = $_POST['class'];
        $week            = $_POST['week'];
        $topic           = $_POST['topic'];

        $sql = "SELECT * FROM lesson_note WHERE subject = '$subject' AND term = '$term' AND month = '$month' AND class = '$class' AND week = '$week' AND topic = '$topic'  ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo '
                <div class="alert alert-warning">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Waning!</strong> '.$subject.' Lesson Note for '.$class.' in respect to '.$term.' month '.$month.' week '.$week.'
                </div>
            ';
        }else{
            $sql1 = "INSERT INTO lesson_note(admno, subject, term, month, class, date_submitted, week, topic, file, status, comment) VALUES('$admno', '$subject', '$term', '$month', '$class', '$date', '$week', '$topic', '$file_name', 'pending', '')";
            if($conn->query($sql1)){

                $destination     = "file/lessonNote/".$file_name;
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
                                            <div class="form-group">
                                                <label for="pwd">Month</label>
                                                <input type="month" name="month" class="form-control" id="month" required="required">
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
                                                <label for="pwd">Lesson Note Week</label>
                                                <input type="week" name="week" class="form-control" id="week" required="required">
                                            </div>
                                            <div class="form-group">
                                                <label for="pwd">Topic</label>
                                                <input type="topic" name="topic" class="form-control" id="topic" required="required" placeholder="Type Your Topic Here">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="pwd">Upload Lesson Note</label>
                                                <input type="file" accept="application/pdf, application/msword, application/vnd.ms-powerpoint, application/vnd.ms-excel" name="file" class="form-control" id="file" required="required">
                                            </div>
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
    
    <script>
        $(document).on('submit', '#promote_form', function(event){
        event.preventDefault();
            var old_class = $('#old_class').val();
            var new_class = $('#new_class').val();
            $.ajax({
                url:"ServerSide/update/promote_student.php",
                method:"POST",
                data:{old_class:old_class, new_class:new_class},
                success:function(data){
                    $('#myalert').html(data);
                }
            });
        });
    </script>
</body>
</html>