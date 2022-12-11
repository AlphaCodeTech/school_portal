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
                            <h5 class="card-title mb-4">Student > Add New Student <i class="menu-icon mdi mdi-setting"></i></h5>
                            <div class="fluid-container">
                                <?php

    if(isset($_POST['submit'])){

        $student_no ='';
        $file_name = '';

        if ($_FILES['image']['name'] == '') {
            $file_name = '';
        }else{
            $file_name       = date("Y-m-d-H-i-s").uniqid().($_FILES['image']['name']);
            $file_name = preg_replace('/\s+/', '', $file_name);
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
        $password                = md5('password');


        $sql1 = "INSERT INTO student_data(surname, lastname, middlename, admno, gender, dob, admn_date, photo, phone, email, address, class, g_surname, g_firstname, g_middlename, g_relationship, g_phone, g_email, role, password) VALUES('$surname', '$lastname', '$middlename', '$admno', '$gender', '$dob', '$adm_date', '$file_name', '$phone', '$email', '$address', '$class', '$g_surname', '$g_firstname', '$g_middlename', '$g_relationship', '$g_phone', '$g_email', '$role', '$password')";
        if($conn->query($sql1)){

            $destination     = "file/profile/".$file_name;
            $filename        = $_FILES['image']['tmp_name'];
            move_uploaded_file($filename, $destination);

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
                                                <input class="form-control" type="text" name="student_sur_name" id="employee_sur_name" placeholder="Amadi" />
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="required" for="employee_first_name">First name</label>
                                                <input class="form-control" type="text" name="student_first_name" id="employee_first_name" placeholder="Hassan" />
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="employee_middle_name">Middle name</label>
                                                <input class="form-control" type="text" name="student_middle_name" id="employee_middle_name" placeholder="Adewale" />
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="employee_no">Admission Number</label>
                                                <input class="form-control" type="text" value="DFIS/SEC/<?php echo date('Y') .'/'. rand(10000, 99999); ?>" name="student_no" id="employee_no" readonly/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label for="employee_gender">Gender</label>
                                                <select class="form-control" name="student_gender" id="employee_gender" >
                                                <option value="">Please select</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option></select>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="employee_gender">Date of Birth</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                    <input class="form-control" type="date" name="student_date_of_birth" id="employee_date_of_birth" />
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="employee_gender">Admission Date</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                    <input class="form-control" type="date" name="student_date_joined" id="employee_date_joined" />
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
                                                <input class="form-control" type="number" name="student_mobile_phone" id="student_mobile_phone" placeholder="07066345857" />
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="employee_email">Email</label>
                                                <input class="form-control" type="email" name="student_email" id="employee_email" placeholder="mailaddress@provider.com" />
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="employee_email">Class</label>
                                                <select name="student_class" class="form-control" id="myclass" required="required">
                                                    <option value="">--- Select Class ---</option>
                                                    <?php 
                                                        echo load_class($conn);
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="employee_address">Address</label>
                                                <textarea class="form-control" name="student_address" id="employee_address"  style="border: 1px dotted skyblue;"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-title">Guardian Information</div><hr>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="required" for="employee_sur_name">Surname</label>
                                                <input class="form-control" type="text" name="gurdian_sur_name" id="employee_sur_name" placeholder="Amadi" />
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="required" for="employee_first_name">First name</label>
                                                <input class="form-control" type="text" name="gurdian_first_name" id="employee_first_name" placeholder="Hassan" />
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="employee_middle_name">Middle name</label>
                                                <input class="form-control" type="text" name="gurdian_middle_name" id="employee_middle_name" placeholder="Adewale" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="required" for="employee_sur_name">Relationship</label>
                                                <select name="gurdian_relationship" class="form-control" id="myclass" required="required">
                                                    <option value="">--- Select Relationship ---</option>
                                                    <option value="father">Father</option>
                                                    <option value="mother">Mother</option>
                                                    <option value="uncle">Uncle</option>
                                                    <option value="aunty">Aunty</option>
                                                    <option value="others">Others</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="required" for="employee_first_name">Phone</label>
                                                <input class="form-control" type="text" name="gurdian_phone" id="employee_first_name" placeholder="07066345857" />
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="employee_middle_name">Email</label>
                                                <input class="form-control" type="email" name="gurdian_email" id="employee_middle_name" placeholder="mailaddress@provider.com" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 30px;">
                                        <div class="col-sm-offset-4 col-xs-12">
                                          <span class="">
                                            <button name="submit" type="submit" class="btn btn-primary" value="save">Save Student &nbsp; <i class="fa fa-download"></i></button>
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
