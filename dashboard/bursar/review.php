<!DOCTYPE html>
<html lang="en">
<head>
	<?php include "../partials/user/head.php" ?>
</head>
<?php
    $id=intval($_GET['id']);
?>
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
                            <h5 class="card-title mb-4">Lesson Note Review <i class="menu-icon mdi mdi-setting"></i></h5>
                            <div class="fluid-container">
                                <style type="text/css">
                                    input[type=text], input[type=file], input[type=date], input[type=number], input[type=email]{
                                        border: 1px dotted skyblue;
                                    }
                                    select:not([multiple]) {
                                        border: 1px dotted skyblue;
                                    }
                                    textarea{
                                        border: 1px dotted skyblue;
                                    }
                                </style>

                                <?php
                                        $sql = "SELECT * FROM lesson_note WHERE id = '$id' ";
                                        $result = $conn->query($sql);
                                        $row = $result->fetch_assoc();

            if(isset($_POST['approved'])){
                $sql = "UPDATE lesson_note SET status = 'approved' WHERE id = '$id' ";
                if($result = $conn->query($sql)){
                    echo '<script type="text/javascript">location.href = "lesson_note.php";</script>';
                }else{
                    echo '<script type="text/javascript">location.href = "lesson_note.php";</script>';
                }
            }elseif(isset($_POST['not_approved'])){
                $sql = "UPDATE lesson_note SET status = 'notapproved' WHERE id = '$id' ";
                if($result = $conn->query($sql)){
                    echo '<script type="text/javascript">location.href = "lesson_note.php";</script>';
                }else{
                    echo '<script type="text/javascript">location.href = "lesson_note.php";</script>';
                }
            }
                                ?>

                                <form action="" method="post" enctype="multipart/form-data" role="form" id="lessonnote_form">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="employee_email">Subject</label>
                                                <select name="subject" class="form-control" id="subject" required="required">
                                                    <option value="<?php echo $row['subject'] ?>"><?php echo $row['subject'] ?></option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="employee_email">Term</label>
                                                <select name="term" class="form-control" id="term" required="required">
                                                    <option value="<?php echo $row['term'] ?>"><?php echo $row['term'] ?></option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="pwd">Month</label>
                                                <input type="month" name="month" class="form-control" id="month" required="required" value="<?php echo $row['month'] ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="employee_email">Class</label>
                                                <select name="class" class="form-control" id="class" required="required">
                                                    <option value="<?php echo $row['class'] ?>"><?php echo $row['class'] ?></option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="pwd">Lesson Note Week</label>
                                                <input type="week" name="week" value="<?php echo $row['week'] ?>" class="form-control" id="week" required="required" readonly="">
                                            </div>
                                            <div class="form-group">
                                                <label for="pwd">Topic</label>
                                                <input type="topic" name="topic" class="form-control" id="topic" required="required" value="<?php echo $row['topic'] ?>" placeholder="Type Your Topic Here" readonly="">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="pwd">Lesson Note</label><br>
                                                <a href="file/lessonNote/<?php echo $row['file'] ?>" class="btn btn-warning download">Download Lesson Note For review &nbsp;<i class="fa fa-download"></i></a>
                                            </div>
                                          <button type="submit" name="approved" class="btn btn-success" style="margin: 5px;">Approved &nbsp; <i class="fa fa-thumbs-up"></i></button>
                                          <button type="submit" name="not_approved" class="btn btn-danger">Not Approved &nbsp; <i class="fa fa-thumbs-down"></i></button>
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