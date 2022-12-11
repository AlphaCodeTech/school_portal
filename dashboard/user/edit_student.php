<!DOCTYPE html>
<html lang="en">
<head>
	<?php include "../partials/user/head.php" ?>
</head>
<?php
    $id=intval($_GET['id']);

    $sql = "SELECT * FROM student_data WHERE id = '$id' ";
    $result = $conn->query($sql);

    foreach($result as $row)
    {
        $admno = $row['admno'];
        $photo = $row['photo'];
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
                            <h5 class="card-title mb-4">Student > Edit Student <i class="menu-icon mdi mdi-setting"></i></h5>
                            <div class="fluid-container">
                                <?php

    if(isset($_POST['submit'])){

        $student_no ='';
        $file_name = '';

        if ($_FILES['image']['name'] == '') {
            $file_name = '';
        }else{
            $file_name       = date("Y-m-d-H-i-s").uniqid().($_FILES['image']['name']);
            $file_name       = preg_replace('/\s+/', '', $file_name);
        }

        
        $admno                   = $_POST['student_no'];
        $surname                 = $_POST['student_sur_name'];
        $lastname                = $_POST['student_first_name'];
        $middlename              = $_POST['student_middle_name'];
        $gender                  = $_POST['student_gender'];
        $dob                     = $_POST['student_date_of_birth'];
        $adm_date                = $_POST['student_date_joined'];
        $phone                   = $_POST['student_mobile_phone'];
        $email                   = $_POST['student_email'];
        $address                 = $_POST['student_address'];
        $class                   = $_POST['student_class'];
        $g_surname               = $_POST['gurdian_sur_name'];
        $g_firstname             = $_POST['gurdian_first_name'];
        $g_middlename            = $_POST['gurdian_middle_name'];
        $g_relationship          = $_POST['gurdian_relationship'];
        $g_phone                 = $_POST['gurdian_phone'];
        $g_email                 = $_POST['gurdian_email'];
        $role                    = 'student';

        if( $file_name != ''){
            $sql1 = "UPDATE student_data SET surname = '$surname', lastname = '$lastname', middlename = '$middlename', admno = '$admno', gender = '$gender', dob = '$dob', admn_date = '$adm_date', photo = '$file_name', phone = '$phone', email = '$email', address = '$address', class = '$class', g_surname = '$g_surname', g_firstname = '$g_firstname', g_middlename = '$g_middlename', g_relationship = '$g_relationship', g_phone = '$g_phone', g_email = '$g_email', role = '$role' WHERE id = '$id'  ";
        }else{
            $sql1 = "UPDATE student_data SET surname = '$surname', lastname = '$lastname', middlename = '$middlename', admno = '$admno', gender = '$gender', dob = '$dob', admn_date = '$adm_date', phone = '$phone', email = '$email', address = '$address', class = '$class', g_surname = '$g_surname', g_firstname = '$g_firstname', g_middlename = '$g_middlename', g_relationship = '$g_relationship', g_phone = '$g_phone', g_email = '$g_email', role = '$role' WHERE id = '$id'  ";
        }
        
        if($conn->query($sql1)){

            if( $file_name != ''){

                $destination     = "file/profile/".$file_name;
                $filename        = $_FILES['image']['tmp_name'];
                unlink("file/profile".$photo);
                move_uploaded_file($filename, $destination);

            }

            echo '
                <div class="alert alert-success">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Success!</strong>
                </div>
            ';
        }else{
            echo '
                <div class="alert alert-danger">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Error!</strong>
                </div>
            ';
        }

    }
?>
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
                                <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
                                    <div class="form-title">Student Information</div><hr>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label class="required" for="employee_sur_name">Surname</label>
                                                <input class="form-control" type="text" name="student_sur_name" id="employee_sur_name" placeholder="Amadi" value="<?php echo $row['surname'] ?>" />
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="required" for="employee_first_name">Last name</label>
                                                <input class="form-control" type="text" name="student_first_name" id="employee_first_name" placeholder="Hassan" value="<?php echo $row['lastname'] ?>" />
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="employee_middle_name">Middle name</label>
                                                <input class="form-control" type="text" name="student_middle_name" id="employee_middle_name" placeholder="Adewale" value="<?php echo $row['middlename'] ?>" />
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="employee_no">Admission Number</label>
                                                <input class="form-control" type="text" name="student_no" id="employee_no" value="<?php echo $row['admno'] ?>" readonly />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label for="employee_gender">Gender</label>
                                                <select class="form-control" name="student_gender" id="employee_gender" >
                                                <option value="<?php echo $row['gender'] ?>"><?php echo $row['gender'] ?></option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option></select>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="employee_gender">Date of Birth</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                    <input class="form-control" type="date" name="student_date_of_birth" id="employee_date_of_birth" value="<?php echo $row['dob'] ?>" />
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="employee_gender">Admission Date</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                    <input class="form-control" type="date" name="student_date_joined" id="employee_date_joined" value="<?php echo $row['admn_date'] ?>" />
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="employee_photo">Photo</label>
                                                <input class="form-control" type="file" accept="image/*" name="image" id="employee_photo" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label for="employee_mobile_phone">Mobile phone</label>
                                                <input class="form-control" type="number" name="student_mobile_phone" id="student_mobile_phone" placeholder="07066345857" value="<?php echo $row['phone'] ?>" />
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="employee_email">Email</label>
                                                <input class="form-control" type="email" name="student_email" id="employee_email" placeholder="mailaddress@provider.com" value="<?php echo $row['email'] ?>" />
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="employee_email">Class</label>
                                                <select name="student_class" class="form-control" id="myclass" required="required">
                                                    <option value="<?php echo $row['class'] ?>"><?php echo $row['class'] ?></option>
                                                    <?php 
                                                        echo load_class($conn);
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="employee_address">Address</label>
                                                <textarea class="form-control" name="student_address" id="employee_address"  style="border: 1px dotted skyblue;"><?php echo $row['address'] ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-title">Guardian Information</div><hr>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="required" for="employee_sur_name">Surname</label>
                                                <input class="form-control" type="text" name="gurdian_sur_name" id="employee_sur_name" placeholder="Amadi" value="<?php echo $row['g_surname'] ?>" />
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="required" for="employee_first_name">First name</label>
                                                <input class="form-control" type="text" name="gurdian_first_name" id="employee_first_name" placeholder="Hassan" value="<?php echo $row['g_firstname'] ?>" />
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="employee_middle_name">Middle name</label>
                                                <input class="form-control" type="text" name="gurdian_middle_name" id="employee_middle_name" placeholder="Adewale" value="<?php echo $row['g_middlename'] ?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="required" for="employee_sur_name">Relationship</label>
                                                <select name="gurdian_relationship" class="form-control" id="myclass" required="required">
                                                    <option value="<?php echo $row['g_relationship'] ?>"><?php echo $row['g_relationship'] ?></option>
                                                    <option value="father">Father</option>
                                                    <option value="mother">Mother</option>
                                                    <option value="uncle">Uncle</option>
                                                    <option value="aunty">Aunty</option>
                                                    <option value="others">Others</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="required" for="employee_first_name">Phone</label>
                                                <input class="form-control" type="text" name="gurdian_phone" id="employee_first_name" placeholder="07066345857" value="<?php echo $row['g_phone'] ?>" />
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="employee_middle_name">Email</label>
                                                <input class="form-control" type="email" name="gurdian_email" id="employee_middle_name" placeholder="mailaddress@provider.com" value="<?php echo $row['g_email'] ?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 30px;">
                                        <div class="col-sm-offset-4 col-xs-12">
                                          <span class="">
                                            <button name="submit" type="submit" class="btn btn-primary" value="save">Apply Edit &nbsp; <i class="fa fa-download"></i></button>
                                          </span>
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
<?php
}
?>