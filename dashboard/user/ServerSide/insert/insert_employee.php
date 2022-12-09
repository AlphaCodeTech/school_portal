<?php
	include "../connect/db.php";

	$file_name       = date("Y-m-d-H-i-s").sha1($_FILES['image']['name']);
	$file_name1       = uniqid().($_FILES['employee_cv']['name']);

	$employee_no                    = $_POST['employee_no'];
    $employee_sur_name              = $_POST['employee_sur_name'];
    $employee_first_name            = $_POST['employee_first_name'];
    $employee_middle_name           = $_POST['employee_middle_name'];
    $employee_no                    = $_POST['employee_no'];
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

   	$destination     = "../../file/profile/".$file_name;
   	$filename        = $_FILES['image']['tmp_name'];
   	move_uploaded_file($filename, $destination);

   	$destination1     = "../../file/cv/".$file_name1;
   	$filename1        = $_FILES['employee_cv']['tmp_name'];
   	move_uploaded_file($filename1, $destination1);

	$sql = "INSERT INTO employee_photo(employee_id,path,cv) VALUES ('$employee_no','$file_name', '$file_name1')";
	mysqli_query($conn,$sql);

	$sql1 = "SELECT * FROM employee_photo";
	$obj = mysqli_query($conn,$sql1);
	foreach ($obj as $key => $value) {
	   echo '<img style="width:150px;" src="../../file/profile/'.$value['path'].'">'; 

	   echo '<a href="../../file/cv/'.$value['cv'].'" download="cv" class="btn btn-danger">Download Excel Template</a>';
	}