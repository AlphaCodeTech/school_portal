
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include "../partials/user/head.php" ?>
</head>
<?php
    $id=intval($_GET['id']);

    $sql = "SELECT * FROM employee_data WHERE id = '$id' ";
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
                            <h5 class="card-title mb-4">Employees > Edit Employee <i class="menu-icon mdi mdi-setting"></i></h5>
                            <div class="fluid-container">

        <?php 
            if(isset($_POST['submit'])){

                if ($_FILES['image']['size'] == '' &&  $_FILES['employee_cv']['size'] == '')
                {
                    $employee_sur_name              = $_POST['employee_sur_name'];
                    $employee_last_name            = $_POST['employee_first_name'];
                    $employee_middle_name           = $_POST['employee_middle_name'];
                    $employee_gender                = $_POST['employee_gender'];
                    $employee_date_of_birth         = $_POST['employee_date_of_birth'];
                    $employee_date_joined           = $_POST['employee_date_joined'];
                    $employee_mobile_phone          = $_POST['employee_mobile_phone'];
                    $employee_email                 = $_POST['employee_email'];
                    $employee_category              = $_POST['employee_category'];
                    $employee_department            = $_POST['employee_department'];
                    $employee_position              = $_POST['employee_position'];
                    $employee_religion              = $_POST['employee_religion'];
                    $employee_marital_status        = $_POST['employee_marital_status'];
                    $employee_blood_group           = $_POST['employee_blood_group'];
                    $employee_nationality           = $_POST['employee_nationality'];
                    $employee_qualification         = $_POST['employee_qualification'];
                    $employee_address               = $_POST['employee_address'];
                    $employee_bank                  = $_POST['employee_bank'];
                    $employee_account_name          = $_POST['employee_account_name'];
                    $employee_account_number        = $_POST['employee_account_number'];
                    $role                           = $_POST['role'];


                    $sql = "UPDATE employee_data SET surname = '$employee_sur_name', lastname = '$employee_last_name', middlename = '$employee_middle_name', gender = '$employee_gender', dob = '$employee_date_of_birth', datejoin = '$employee_date_joined', phone = '$employee_mobile_phone', email = '$employee_email', ec = '$employee_category', ed = '$employee_department', ep = '$employee_position', religion = '$employee_religion', marital = '$employee_marital_status', bg = '$employee_blood_group', nat = '$employee_nationality', qua = '$employee_qualification', address = '$employee_address', bank = '$employee_bank',  acctname = '$employee_account_name', acctno = '$employee_account_number', role = '$role' WHERE id = '$id' ";

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

                } 
                elseif ($_FILES['image']['size'] != '' &&  $_FILES['employee_cv']['size'] == '') 
                {
                    $file_name                      = date("Y-m-d-H-i-s").uniqid().($_FILES['image']['name']);
                    $file_name                       = preg_replace('/\s+/', '', $file_name);
                    $employee_sur_name              = $_POST['employee_sur_name'];
                    $employee_last_name             = $_POST['employee_first_name'];
                    $employee_middle_name           = $_POST['employee_middle_name'];
                    $employee_gender                = $_POST['employee_gender'];
                    $employee_date_of_birth         = $_POST['employee_date_of_birth'];
                    $employee_date_joined           = $_POST['employee_date_joined'];
                    $employee_mobile_phone          = $_POST['employee_mobile_phone'];
                    $employee_email                 = $_POST['employee_email'];
                    $employee_category              = $_POST['employee_category'];
                    $employee_department            = $_POST['employee_department'];
                    $employee_position              = $_POST['employee_position'];
                    $employee_religion              = $_POST['employee_religion'];
                    $employee_marital_status        = $_POST['employee_marital_status'];
                    $employee_blood_group           = $_POST['employee_blood_group'];
                    $employee_nationality           = $_POST['employee_nationality'];
                    $employee_qualification         = $_POST['employee_qualification'];
                    $employee_address               = $_POST['employee_address'];
                    $employee_bank                  = $_POST['employee_bank'];
                    $employee_account_name          = $_POST['employee_account_name'];
                    $employee_account_number        = $_POST['employee_account_number'];
                    $role                           = $_POST['role'];


                    $sql = "UPDATE employee_data SET surname = '$employee_sur_name', lastname = '$employee_last_name', middlename = '$employee_middle_name', gender = '$employee_gender', dob = '$employee_date_of_birth', datejoin = '$employee_date_joined', photo = '$file_name', phone = '$employee_mobile_phone', email = '$employee_email', ec = '$employee_category', ed = '$employee_department', ep = '$employee_position', religion = '$employee_religion', marital = '$employee_marital_status', bg = '$employee_blood_group', nat = '$employee_nationality', qua = '$employee_qualification', address = '$employee_address', bank = '$employee_bank',  acctname = '$employee_account_name', acctno = '$employee_account_number', role = '$role' WHERE id = '$id' ";

                    if($result = $conn->query($sql)){
                        $destination     = "file/profile/".$file_name;
                        $filename        = $_FILES['image']['tmp_name'];
                        unlink("file/profile".$photo);
                        move_uploaded_file($filename, $destination);
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
                } 
                elseif ($_FILES['image']['size'] == '' &&  $_FILES['employee_cv']['size'] != '') 
                {
                    $file_name1                     = uniqid().($_FILES['employee_cv']['name']);
                    $employee_sur_name              = $_POST['employee_sur_name'];
                    $employee_last_name             = $_POST['employee_first_name'];
                    $employee_middle_name           = $_POST['employee_middle_name'];
                    $employee_gender                = $_POST['employee_gender'];
                    $employee_date_of_birth         = $_POST['employee_date_of_birth'];
                    $employee_date_joined           = $_POST['employee_date_joined'];
                    $employee_mobile_phone          = $_POST['employee_mobile_phone'];
                    $employee_email                 = $_POST['employee_email'];
                    $employee_category              = $_POST['employee_category'];
                    $employee_department            = $_POST['employee_department'];
                    $employee_position              = $_POST['employee_position'];
                    $employee_religion              = $_POST['employee_religion'];
                    $employee_marital_status        = $_POST['employee_marital_status'];
                    $employee_blood_group           = $_POST['employee_blood_group'];
                    $employee_nationality           = $_POST['employee_nationality'];
                    $employee_qualification         = $_POST['employee_qualification'];
                    $employee_address               = $_POST['employee_address'];
                    $employee_bank                  = $_POST['employee_bank'];
                    $employee_account_name          = $_POST['employee_account_name'];
                    $employee_account_number        = $_POST['employee_account_number'];
                    $role                           = $_POST['role'];


                    $sql = "UPDATE employee_data SET surname = '$employee_sur_name', lastname = '$employee_last_name', middlename = '$employee_middle_name', gender = '$employee_gender', dob = '$employee_date_of_birth', datejoin = '$employee_date_joined', phone = '$employee_mobile_phone', email = '$employee_email', ec = '$employee_category', ed = '$employee_department', ep = '$employee_position', religion = '$employee_religion', marital = '$employee_marital_status', bg = '$employee_blood_group', nat = '$employee_nationality', qua = '$employee_qualification', cv = '$file_name1', address = '$employee_address', bank = '$employee_bank',  acctname = '$employee_account_name', acctno = '$employee_account_number', role = '$role' WHERE id = '$id' ";

                    if($result = $conn->query($sql)){
                        $destination1     = "file/cv/".$file_name1;
                        $filename1        = $_FILES['employee_cv']['tmp_name'];
                        move_uploaded_file($filename1, $destination1);
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
                } 
                elseif ($_FILES['image']['size'] != '' &&  $_FILES['employee_cv']['size'] != '') 
                {
                    $file_name                      = date("Y-m-d-H-i-s").uniqid().($_FILES['image']['name']);
                    $file_name                       = preg_replace('/\s+/', '', $file_name);
                    $file_name1                     = uniqid().($_FILES['employee_cv']['name']);
                    $employee_sur_name              = $_POST['employee_sur_name'];
                    $employee_last_name             = $_POST['employee_first_name'];
                    $employee_middle_name           = $_POST['employee_middle_name'];
                    $employee_gender                = $_POST['employee_gender'];
                    $employee_date_of_birth         = $_POST['employee_date_of_birth'];
                    $employee_date_joined           = $_POST['employee_date_joined'];
                    $employee_mobile_phone          = $_POST['employee_mobile_phone'];
                    $employee_email                 = $_POST['employee_email'];
                    $employee_category              = $_POST['employee_category'];
                    $employee_department            = $_POST['employee_department'];
                    $employee_position              = $_POST['employee_position'];
                    $employee_religion              = $_POST['employee_religion'];
                    $employee_marital_status        = $_POST['employee_marital_status'];
                    $employee_blood_group           = $_POST['employee_blood_group'];
                    $employee_nationality           = $_POST['employee_nationality'];
                    $employee_qualification         = $_POST['employee_qualification'];
                    $employee_address               = $_POST['employee_address'];
                    $employee_bank                  = $_POST['employee_bank'];
                    $employee_account_name          = $_POST['employee_account_name'];
                    $employee_account_number        = $_POST['employee_account_number'];
                    $role                           = $_POST['role'];


                    $sql = "UPDATE employee_data SET surname = '$employee_sur_name', lastname = '$employee_last_name', middlename = '$employee_middle_name', gender = '$employee_gender', dob = '$employee_date_of_birth', datejoin = '$employee_date_joined', photo = '$file_name', phone = '$employee_mobile_phone', email = '$employee_email', ec = '$employee_category', ed = '$employee_department', ep = '$employee_position', religion = '$employee_religion', marital = '$employee_marital_status', bg = '$employee_blood_group', nat = '$employee_nationality', qua = '$employee_qualification', cv = '$file_name1', address = '$employee_address', bank = '$employee_bank',  acctname = '$employee_account_name', acctno = '$employee_account_number', role = '$role' WHERE id = '$id' ";

                    if($result = $conn->query($sql)){
                        $destination     = "file/profile/".$file_name;
                        $filename        = $_FILES['image']['tmp_name'];
                        move_uploaded_file($filename, $destination);

                        $destination1     = "file/cv/".$file_name1;
                        $filename1        = $_FILES['employee_cv']['tmp_name'];
                        unlink("file/profile/".$photo);
                        move_uploaded_file($filename1, $destination1);
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
                                    <div class="form-title">Employee Information</div><hr>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label class="required" for="employee_sur_name">Surname</label>
                                                <input class="form-control" type="text" name="employee_sur_name" id="employee_sur_name" value="<?php echo $row['surname'] ?>" />
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="required" for="employee_first_name">Last name</label>
                                                <input class="form-control" type="text" value="<?php echo $row['lastname'] ?>" name="employee_first_name" id="employee_first_name" />
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="employee_middle_name">Middle name</label>
                                                <input class="form-control" type="text" value="<?php echo $row['middlename'] ?>" name="employee_middle_name" id="employee_middle_name" />
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="employee_no">Employee No</label>
                                                <input class="form-control" type="text" value="<?php echo $row['admno'] ?>" name="employee_no" id="employee_no" readonly/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label for="employee_gender">Gender</label>
                                                <select class="form-control" name="employee_gender" id="employee_gender" >
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
                                                    <input class="form-control" type="date" name="employee_date_of_birth" value="<?php echo $row['dob'] ?>" id="employee_date_of_birth" />
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="employee_gender">Date Joined</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                    <input class="form-control" type="date" name="employee_date_joined" value="<?php echo $row['datejoin'] ?>" id="employee_date_joined" />
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
                                                <input class="form-control" type="number" name="employee_mobile_phone" value="<?php echo $row['phone'] ?>" id="employee_mobile_phone" placeholder="07066345857" />
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="employee_email">Email</label>
                                                <input class="form-control" type="email" name="employee_email" id="employee_email" value="<?php echo $row['email'] ?>" placeholder="mailaddress@provider.com" />
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="employee_employee_category_id">Employee Category</label>
                                                <select class="form-control" name="employee_category" id="employee_category" >
                                                    <option value="<?php echo $row['ec'] ?>"><?php echo $row['ec'] ?></option>
                                                    <option value="Teaching Staff">Teaching Staff</option>
                                                    <option value="System Admin">System Admin</option>
                                                    <option value="Non-Teaching Staff">Non-Teaching Staff</option>
                                                    <option value="Administrative Staff">Administrative Staff</option>
                                                    <option value="Accounts">Accounts</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="employee_department">Employee Department</label>
                                                <select class="form-control" name="employee_department" id="employee_department" >
                                                    <option value="<?php echo $row['ed'] ?>"><?php echo $row['ed'] ?></option>
                                                    <option value="General">General</option>
                                                    <option value="Secondary">Secondary</option>
                                                    <option value="Primary">Primary</option>
                                                    <option value="Nursery">Nursery</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label for="employee_position">Employee Positions</label>
                                                <select class="form-control" name="employee_position" id="employee_position" >
                                                    <option value="<?php echo $row['ep'] ?>"><?php echo $row['ep'] ?></option>
                                                    <option value="Teacher">Teacher</option>
                                                    <option value="System Admin">System Admin</option>
                                                    <option value="Secretary">Secretary</option>
                                                    <option value="Principal">Principal</option>
                                                    <option value="Dean of Studies">Dean of Studies</option>
                                                    <option value="Chief Security Staff">Chief Security Staff</option>
                                                    <option value="Bursar">Bursar</option>
                                                    <option value="Accountant">Accountant</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="employee_religion">Religion</label>
                                                <select class="form-control" name="employee_religion" id="employee_religion">
                                                    <option value="<?php echo $row['religion'] ?>"><?php echo $row['religion'] ?></option>
                                                    <option value="christianity">Christianity</option>
                                                    <option value="islam">Islam</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="employee_marital_status">Marital status</label>
                                                <select class="form-control" name="employee_marital_status" id="employee_marital_status">
                                                    <option value="<?php echo $row['marital'] ?>"><?php echo $row['marital'] ?></option>
                                                    <option value="single">Single</option>
                                                    <option value="married">Married</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="employee_blood_group">Blood group</label>
                                                <select class="form-control" name="employee_blood_group" id="employee_blood_group">
                                                    <option value="<?php echo $row['bg'] ?>"><?php echo $row['bg'] ?></option>
                                                    <option value="A+">A+</option>
                                                    <option value="A-">A-</option>
                                                    <option value="AB+">AB+</option>
                                                    <option value="AB-">AB-</option>
                                                    <option value="B+">B+</option>
                                                    <option value="B-">B-</option>
                                                    <option value="O+">O+</option>
                                                    <option value="O-">O-</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-3">
                                            <label for="employee_nationality">Nationality</label>
                                            <select class="form-control" name="employee_nationality" id="employee_nationality">
                                                <option value="<?php echo $row['nat'] ?>"><?php echo $row['nat'] ?></option>
                                                <option value="Nigerian">Nigerian</option>
                                                <option value="Others">Others</option>
                                            </select>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="employee_qualification">Qualification</label>
                                                <select class="form-control" name="employee_qualification" id="employee_qualification" >
                                                    <option value="<?php echo $row['qua'] ?>"><?php echo $row['qua'] ?></option>
                                                    <option value="Bsc">Bsc</option>
                                                    <option value="Msc">Msc</option>
                                                    <option value="HND">Hnd</option>
                                                    <option value="OND">Ond</option>
                                                    <option value="NCE">Nce</option>
                                                    <option value="BA">Ba</option>
                                                    <option value="PGDE">Pgde</option>
                                                    <option value="PROF">Prof</option>
                                                    <option value="DR">Dr</option>
                                                    <option value="KCPE">Kcpe</option>
                                                    <option value="KCSE">Kcse</option>
                                                    <option value="UNDERGRADUATE">Undergraduate</option>
                                                    <option value="ECDE">Ecde</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="employee_cv">CV</label>
                                                <input class="form-control" type="file" name="employee_cv" id="employee_cv" />
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="employee_qualification">Role</label>
                                                <select class="form-control" name="role" id="employee_qualification" >
                                                    <option value="<?php echo $row['role'] ?>"><?php echo $row['role'] ?></option>
                                                    <option value="Teacher">Teacher</option>
                                                    <option value="System Admin">System Admin</option>
                                                    <option value="Secretary">Secretary</option>
                                                    <option value="Principal">Principal</option>
                                                    <option value="Dean of Studies">Dean of Studies</option>
                                                    <option value="Bursar">Bursar</option>
                                                    <option value="Accountant">Accountant</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-title">Employee Address</div><hr>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label for="employee_address">Address</label>
                                                <textarea class="form-control" name="employee_address" id="employee_address" style="border: 1px dotted skyblue;">
                                                    <?php echo $row['address'] ?>
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-title">Employee Bank Details</div><hr>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="employee_bank_account_attributes_bank_id">Bank</label>
                                                <select class="form-control" name="employee_bank" id="employee_bank">
                                                    <option value="<?php echo $row['bank'] ?>"><?php echo $row['bank'] ?></option>
                                                    <option value="Access Bank Plc">Access Bank Plc</option>
                                                    <option value="Citibank Nigeria Limited">Citibank Nigeria Limited</option>
                                                    <option value="Diamond Bank Plc">Diamond Bank Plc</option>
                                                    <option value="Ecobank Nigeria Plc">Ecobank Nigeria Plc</option>
                                                    <option value="Enterprise Bank">Enterprise Bank</option>
                                                    <option value="Fidelity Bank Plc">Fidelity Bank Plc</option>
                                                    <option value="First Bank of Nigeria Plc">First Bank of Nigeria Plc</option>
                                                    <option value="First City Monument Bank Plc">First City Monument Bank Plc</option>
                                                    <option value="Guaranty Trust Bank Plc">Guaranty Trust Bank Plc</option>
                                                    <option value="Heritage Banking Company Ltd">Heritage Banking Company Ltd.</option>
                                                    <option value="Key Stone Bank">Key Stone Bank</option>
                                                    <option value="MainStreet Bank">MainStreet Bank</option>
                                                    <option value="Skye Bank Plc">Skye Bank Plc</option>
                                                    <option value="Stanbic IBTC Bank Ltd">Stanbic IBTC Bank Ltd.</option>
                                                    <option value="Standard Chartered Bank Nigeria Ltd">Standard Chartered Bank Nigeria Ltd.</option>
                                                    <option value="Sterling Bank Plc">Sterling Bank Plc</option>
                                                    <option value="Union Bank of Nigeria Plc">Union Bank of Nigeria Plc</option>
                                                    <option value="United Bank For Africa Plc">United Bank For Africa Plc</option>
                                                    <option value="Unity Bank Plc">Unity Bank Plc</option>
                                                    <option value="Wema Bank Plc">Wema Bank Plc</option>
                                                    <option value="Zenith Bank Plc">Zenith Bank Plc</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <label hide_required="true" for="employee_bank_account_attributes_account_name">Account name</label>
                                                <input class="form-control" type="text" name="employee_account_name" id="employee_account_name" placeholder="Nze Halford Nnanna" value="<?php echo $row['acctname'] ?>" />
                                            </div>
                                            <div class="col-sm-4">
                                                <label hide_required="true" for="employee_bank_account_attributes_account_number">Account number</label>
                                                <input class="form-control" type="text" name="employee_account_number" id="employee_account_number" placeholder="2072860735" value="<?php echo $row['acctno'] ?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 30px;">
                                        <div class="col-sm-offset-4 col-xs-12">
                                          <span class="">
                                            <button name="submit" type="submit" class="btn btn-primary" value="save">update employee &nbsp; <i class="fa fa-download"></i></button>
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