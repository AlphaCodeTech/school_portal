<?php

function fetchGuardian($database)
{
    $number = $_POST['phoneno'];
    $student_data = " SELECT * FROM student_data where g_phone = '$number'";
    $result_student = $database->query($student_data);

    echo json_encode($result_student->fetch_assoc());
}

function fetchLevels($database)
{
    $sql = "SELECT * FROM categories";
    $result = $database->query($sql);
    if ($result->num_rows > 0) {
        $output = '<option value="">Please Select Level</option>';
        while ($row = $result->fetch_assoc()) {
            $output .= '<option value="' . $row['id'] . '">' . ucfirst($row['name']) . '</option>';
        }
        echo $output;
    }
}

function fetchAmount($database)
{
    $id = $_POST['id'];
    $sql = "SELECT * FROM categories WHERE id = '$id'";
    $result = $database->query($sql);
    if ($result->num_rows > 0) {
        $output = '<option value="">Please Select Select Available Amount</option>';
        while ($row = $result->fetch_assoc()) {
            $output .= '<option value="' . $row['full_fees'] . '">' . 'Full payment -' . $row['full_fees'] . '</option>';
            $output .= '<option value="' . $row['part_fees'] . '">' . 'Part Payment -' . $row['part_fees'] . '</option>';
        }
        echo $output;
    }
}
function computeFees($database)
{
    $id = $_POST['id'];
    $sql = "SELECT * FROM categories WHERE id = '$id'";
    $result = $database->query($sql);
    if ($result->num_rows > 0) {
        $output = '';
        while ($row = $result->fetch_assoc()) {
            $output .= $row['full_fees'];
        }
        echo $output;
    }
}

function saveTransaction($database)
{
    $term        = $_POST['term'];
    $transaction_ref        = $_POST['transaction_ref'];
    $surname        = $_POST['surname'];
    $middlename    = $_POST['middlename'];
    $lastname      = $_POST['lastname'];
    $guardian_name  = $_POST['guardian_name'];
    $guardians_phoneno = $_POST['guardians_phoneno'];
    $total_fees     = $_POST['total_fees'];
    $amount_paid    = $_POST['amount_paid'];
    $amount_unpaid  = $_POST['amount_unpaid'];
    $transaction_date = date('Y-m-d');

    $sql = "INSERT INTO finance(surname, lastname, middlename, guardians_name, guardians_phoneno, total_fees, amount_paid,amount_unpaid,term,transaction_ref,transaction_date) 
                    VALUES('$surname', '$lastname', '$middlename', '$guardian_name', '$guardians_phoneno', '$total_fees', '$amount_paid', '$amount_unpaid', '$term', '$transaction_ref', '$transaction_date')";
    if ($database->query($sql)) {
        echo 'success';
    } else {
        echo 'error';
    }
}

function fetchTerms($database)
{
    $sql = "SELECT * FROM term";
    $result = $database->query($sql);
    if ($result->num_rows > 0) {
        $output = '<option value="">Please Select Term</option>';
        while ($row = $result->fetch_assoc()) {
            $output .= '<option value="' . $row['id'] . '">' . $row['termtype'] . ' - ' . $row['session'] . '</option>';
        }
        echo $output;
    }
}

function verifyPayment($database)
{
    $transaction_ref = $_POST['reference'];
    $sql = "SELECT transaction_ref FROM finance WHERE transaction_ref = '$transaction_ref' AND verified = '0'";
    $result = $database->query($sql);
    $output = '';
    if ($result->num_rows > 0) {
        $update = "UPDATE finance SET verified = '1' WHERE transaction_ref = '$transaction_ref'";
        if ($database->query($update)) {
            $output = 'success';
        } else {
            $output =  'error';
        }
    }else{
        $output =  'Already Verified or Invalid Reference';
    }
    echo $output;
}

if (isset($_POST['action'])) {
    require_once('config/configSec.php');
    require_once('database.php');

    switch ($_POST['action']) {
        case 'getGuardian':
            fetchGuardian($database);
            break;
        case 'getTerms':
            fetchTerms($database);
            break;
        case 'getLevel':
            fetchLevels($database);
            break;
        case 'getAmount':
            fetchAmount($database);
            computeFees($database);
            break;
        case 'computeFees':
            computeFees($database);
            break;
        case 'saveTransaction':
            saveTransaction($database);
            break;
        case 'verify':
            verifyPayment($database);
            break;
    }
}
