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
                            <h5 class="card-title mb-4">Employees > Add New Employee <i class="menu-icon mdi mdi-setting"></i></h5>
                            <div class="fluid-container">
                                <div id="myalert"></div>
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
                                <form class="form-horizontal" role="form" action="">
                                    <div class="form-title">Employee Information</div><hr>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label class="required" for="employee_last_name">Surname</label>
                                                <input class="form-control" type="text" name="employee_last_name" id="employee_last_name" required/>
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="required" for="employee_first_name">First name</label>
                                                <input class="form-control" type="text" name="employee_first_name" id="employee_first_name" required/>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="employee_middle_name">Middle name</label>
                                                <input class="form-control" type="text" name="employee_middle_name" id="employee_middle_name" />
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="employee_no">Employee No</label>
                                                <input class="form-control" type="text" name="employee_no" id="employee_no" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label for="employee_gender">Gender</label>
                                                <select class="form-control" name="employee_gender" id="employee_gender" required>
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
                                                    <input class="form-control" type="date" name="employee_date_of_birth" id="employee_date_of_birth" />
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="employee_gender">Date Joined</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                    <input class="form-control" type="date" name="employee_date_joined" id="employee_date_joined" />
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="employee_photo">Photo</label>
                                                <input class="form-control" type="file" name="employee_photo" id="employee_photo" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label for="employee_mobile_phone">Mobile phone</label>
                                                <input class="form-control" type="number" name="employee_mobile_phone" id="employee_mobile_phone" placeholder="07066345857" required="true" />
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="employee_email">Email</label>
                                                <input class="form-control" type="email" name="employee_email" id="employee_email" placeholder="mailaddress@provider.com" />
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="employee_employee_category_id">Employee Category</label>
                                                <select class="form-control" name="employee_category" id="employee_category" required>
                                                    <option value="">Please select</option>
                                                    <option value="Teaching Staff">Teaching Staff</option>
                                                    <option value="System Admin">System Admin</option>
                                                    <option value="Non-Teaching Staff">Non-Teaching Staff</option>
                                                    <option value="Administrative Staff">Administrative Staff</option>
                                                    <option value="Accounts">Accounts</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="employee_department">Employee Department</label>
                                                <select class="form-control" name="employee_department" id="employee_department" required>
                                                    <option value="">Please select</option>
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
                                                <select class="form-control" name="employee_position" id="employee_position" required>
                                                    <option value="">Please select</option>
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
                                                    <option value="">Please Select</option>
                                                    <option value="christianity">Christianity</option>
                                                    <option value="islam">Islam</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="employee_marital_status">Marital status</label>
                                                <select class="form-control" name="employee_marital_status" id="employee_marital_status">
                                                    <option value="">Please Select</option>
                                                    <option value="single">Single</option>
                                                    <option value="married">Married</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="employee_blood_group">Blood group</label>
                                                <select class="form-control" name="employee_blood_group" id="employee_blood_group">
                                                    <option value="">Please Select</option>
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
                                                <option value="">Please select</option>
                                                <option value="Nigerian">Nigerian</option>
                                                <option value="Others">Others</option>
                                            </select>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="employee_qualification">Qualification</label>
                                                <select class="form-control" name="employee_qualification" id="employee_qualification" required>
                                                    <option value="">Please Select</option>
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
                                        </div>
                                    </div>
                                    <div class="form-title">Employee Address</div><hr>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label for="employee_address">Address</label>
                                                <textarea class="form-control" name="employee_address" id="employee_address" style="border: 1px dotted skyblue;">
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
                                                    <option value="">Please Select</option>
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
                                                <input class="form-control" type="text" name="employee__account_name" id="employee_account_name" placeholder="Nze Halford Nnanna" />
                                            </div>
                                            <div class="col-sm-4">
                                                <label hide_required="true" for="employee_bank_account_attributes_account_number">Account number</label>
                                                <input class="form-control" type="text" name="employee_account_number" id="employee_account_number" placeholder="2072860735" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 30px;">
                                        <div class="col-sm-offset-4 col-xs-12">
                                          <span class="">
                                            <button name="button" type="submit" class="btn btn-primary" value="save">Save employee &nbsp; <i class="fa fa-download"></i></button>
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