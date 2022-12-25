<?php

	include "../connect/db.php";
    
    $myClass = $_POST['myClass'];

	$sql = "SELECT * FROM student_data WHERE class = '$myClass'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $output = '';
        while ($row = $result->fetch_assoc()) {
            $output .= '<option value="'.$row["admno"].'">'.$row["admno"].'</option>';
        }
        echo $output;
    }
	
	$conn->close();
?>
<script type="text/javascript">
	$('#user_data').DataTable();
</script>