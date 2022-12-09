<!DOCTYPE html>
<html lang="en">
<head>
	<?php include "../partials/user/head.php" ?>
</head>
<?php
    $id=intval($_GET['id']);
    $role=($_GET['role']);
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
                            <h5 class="card-title mb-4">View Profile <i class="menu-icon mdi mdi-setting"></i></h5>
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
                                if ($role == 'student') {
                                    $sql = "SELECT * FROM student_data WHERE id = '$id' ";
                                    $result = $conn->query($sql);
                                    foreach($result as $row)
                                    {
                                        $admno = $row['admno'];
                            ?>
                                <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
                                    <div class="form-title">Student Information</div><hr>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4"></div>
                                            <div class="col-sm-4">
                                                <center>
                                                    <img src="file/profile/<?php echo $row['photo'] ?>" width="100px" height="100px" style="background-color: brown; border-radius: 100px;">
                                                </center>
                                            </div>
                                            <div class="col-sm-4"></div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label class="required" for="employee_sur_name">Surname</label>
                                                <input class="form-control" type="text" name="student_sur_name" id="employee_sur_name" placeholder="Amadi" value="<?php echo $row['surname'] ?>" readonly />
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="required" for="employee_first_name">First name</label>
                                                <input class="form-control" type="text" name="student_first_name" id="employee_first_name" placeholder="Hassan" value="<?php echo $row['lastname'] ?>" readonly />
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="employee_middle_name">Middle name</label>
                                                <input class="form-control" type="text" name="student_middle_name" id="employee_middle_name" placeholder="Adewale" value="<?php echo $row['middlename'] ?>" readonly />
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="employee_no">Admission Number</label>
                                                <input class="form-control" type="text" value="<?php echo $row['admno'] ?>" name="student_no" id="employee_no" readonly/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label for="employee_gender">Gender</label>
                                                <select class="form-control" name="student_gender" id="employee_gender" >
                                                    <option value="<?php echo $row['gender'] ?>"><?php echo $row['gender'] ?></option>
                                                </select>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="employee_gender">Date of Birth</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                    <input class="form-control" type="date" name="student_date_of_birth" id="employee_date_of_birth" value="<?php echo $row['dob'] ?>" readonly />
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="employee_gender">Admission Date</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                    <input class="form-control" type="date" name="student_date_joined" id="employee_date_joined" value="<?php echo $row['admn_date'] ?>" readonly />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label for="employee_mobile_phone">Mobile phone</label>
                                                <input class="form-control" type="number" name="student_mobile_phone" id="student_mobile_phone" placeholder="07066345857" value="<?php echo $row['phone'] ?>" readonly />
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="employee_email">Email</label>
                                                <input class="form-control" type="email" name="student_email" id="employee_email" placeholder="mailaddress@provider.com" value="<?php echo $row['email'] ?>" readonly />
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="employee_email">Class</label>
                                                <select name="student_class" class="form-control" id="myclass" required="required">
                                                    <option value=""><?php echo $row['class'] ?></option>
                                                </select>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="employee_address">Address</label>
                                                <textarea class="form-control" name="student_address" id="employee_address"  style="border: 1px dotted skyblue;" readonly><?php echo $row['address'] ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-title">Guardian Information</div><hr>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="required" for="employee_sur_name">Surname</label>
                                                <input class="form-control" type="text" name="gurdian_sur_name" id="employee_sur_name" placeholder="Amadi" value="<?php echo $row['g_surname'] ?>" readonly />
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="required" for="employee_first_name">First name</label>
                                                <input class="form-control" type="text" name="gurdian_first_name" id="employee_first_name" placeholder="Hassan" value="<?php echo $row['g_firstname'] ?>" readonly />
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="employee_middle_name">Middle name</label>
                                                <input class="form-control" type="text" name="gurdian_middle_name" id="employee_middle_name" placeholder="Adewale" value="<?php echo $row['g_middlename'] ?>" readonly />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="required" for="employee_sur_name">Relationship</label>
                                                <select name="gurdian_relationship" class="form-control" id="myclass" required="required">
                                                    <option value=""><?php echo $row['g_relationship'] ?></option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="required" for="employee_first_name">Phone</label>
                                                <input class="form-control" type="text" name="gurdian_phone" id="employee_first_name" placeholder="07066345857" value="<?php echo $row['g_phone'] ?>" readonly />
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="employee_middle_name">Email</label>
                                                <input class="form-control" type="email" name="gurdian_email" id="employee_middle_name" placeholder="mailaddress@provider.com" value="<?php echo $row['email'] ?>" readonly />
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            <?php
                                    }
                                }else{
                                    $sql = "SELECT * FROM employee_data WHERE id = '$id' ";
                                    $result = $conn->query($sql);
                                    foreach($result as $row)
                                    {
                                        $admno = $row['admno'];
                            ?>
                                    <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
                                        <div class="form-title">Employee Information</div><hr>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-4"></div>
                                                <div class="col-sm-4">
                                                    <center>
                                                        <img src="file/profile/<?php echo $row['photo'] ?>" width="100px" height="100px" style="background-color: brown; border-radius: 100px;">
                                                    </center>
                                                </div>
                                                <div class="col-sm-4"></div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <label class="required" for="employee_sur_name">Surname</label>
                                                    <input class="form-control" type="text" name="employee_sur_name" id="employee_sur_name" value="<?php echo $row['surname'] ?>" readonly/>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="required" for="employee_first_name">Last name</label>
                                                    <input class="form-control" type="text" value="<?php echo $row['lastname'] ?>" name="employee_first_name" id="employee_first_name" readonly/>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label for="employee_middle_name">Middle name</label>
                                                    <input class="form-control" type="text" value="<?php echo $row['middlename'] ?>" name="employee_middle_name" id="employee_middle_name" readonly/>
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
                                                    <option value="<?php echo $row['gender'] ?>"><?php echo $row['gender'] ?></option></select>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label for="employee_gender">Date of Birth</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                                                        </div>
                                                        <input class="form-control" type="date" name="employee_date_of_birth" value="<?php echo $row['dob'] ?>" id="employee_date_of_birth" readonly />
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label for="employee_gender">Date Joined</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                                                        </div>
                                                        <input class="form-control" type="date" name="employee_date_joined" value="<?php echo $row['datejoin'] ?>" id="employee_date_joined" readonly />
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
                                                    <input class="form-control" type="number" name="employee_mobile_phone" value="<?php echo $row['phone'] ?>" id="employee_mobile_phone" placeholder="07066345857" readonly />
                                                </div>
                                                <div class="col-sm-3">
                                                    <label for="employee_email">Email</label>
                                                    <input class="form-control" type="email" name="employee_email" id="employee_email" value="<?php echo $row['email'] ?>" placeholder="mailaddress@provider.com" readonly />
                                                </div>
                                                <div class="col-sm-3">
                                                    <label for="employee_employee_category_id">Employee Category</label>
                                                    <select class="form-control" name="employee_category" id="employee_category" >
                                                        <option value="<?php echo $row['ec'] ?>"><?php echo $row['ec'] ?></option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label for="employee_department">Employee Department</label>
                                                    <select class="form-control" name="employee_department" id="employee_department" >
                                                        <option value="<?php echo $row['ed'] ?>"><?php echo $row['ed'] ?></option>
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
                                                    </select>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label for="employee_religion">Religion</label>
                                                    <select class="form-control" name="employee_religion" id="employee_religion">
                                                        <option value="<?php echo $row['religion'] ?>"><?php echo $row['religion'] ?></option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label for="employee_marital_status">Marital status</label>
                                                    <select class="form-control" name="employee_marital_status" id="employee_marital_status">
                                                        <option value="<?php echo $row['marital'] ?>"><?php echo $row['marital'] ?></option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label for="employee_blood_group">Blood group</label>
                                                    <select class="form-control" name="employee_blood_group" id="employee_blood_group">
                                                        <option value="<?php echo $row['bg'] ?>"><?php echo $row['bg'] ?></option>
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
                                                </select>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label for="employee_qualification">Qualification</label>
                                                    <select class="form-control" name="employee_qualification" id="employee_qualification" >
                                                        <option value="<?php echo $row['qua'] ?>"><?php echo $row['qua'] ?></option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label for="employee_cv">CV</label><br>
                                                    <a href="file/cv/<?php echo $row['cv'] ?>" target="_blank" class="btn btn-danger">Download CV</a>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label for="employee_qualification">Role</label>
                                                    <select class="form-control" name="employee_qualification" id="employee_qualification" >
                                                        <option value="<?php echo $row['role'] ?>"><?php echo $row['role'] ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-title">Employee Address</div><hr>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <label for="employee_address">Address</label>
                                                    <textarea class="form-control" name="employee_address" id="employee_address" style="border: 1px dotted skyblue;" readonly>
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
                                                    </select>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label hide_required="true" for="employee_bank_account_attributes_account_name">Account name</label>
                                                    <input class="form-control" type="text" name="employee_account_name" id="employee_account_name" placeholder="Nze Halford Nnanna" value="<?php echo $row['acctname'] ?>" readonly />
                                                </div>
                                                <div class="col-sm-4">
                                                    <label hide_required="true" for="employee_bank_account_attributes_account_number">Account number</label>
                                                    <input class="form-control" type="text" name="employee_account_number" id="employee_account_number" placeholder="2072860735" value="<?php echo $row['acctno'] ?>" readonly />
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                            <?php
                                    }
                                }
                            ?>
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