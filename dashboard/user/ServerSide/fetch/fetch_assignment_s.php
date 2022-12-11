<?php

	include "../connect/db.php";

	$admno = $_POST['admno'];
	$role = $_POST['role'];

	if ($role == 'student') {
		
		$row1 = array($admno);
		$sql = "SELECT * FROM assignment_submit WHERE admno IN ('" . implode("','", $row1) . "') ";
		$result = $conn->query($sql);

	}else{

		$sql1 = "SELECT * FROM classsubject WHERE subjectTeacher = '$admno' ";
		$result1 = $conn->query($sql1);
		$row1 = $result1->fetch_assoc();

		if(!empty($row1)){     
	    	
		}else{
			$row1 = array();
		}

		$sql = "SELECT * FROM assignment_submit WHERE class IN ('" . implode("','", $row1) . "') ";
		$result = $conn->query($sql);

	}

	if ($result->num_rows > 0) {
		echo '
			<thead>
	            <th>S/N</th>
	            <th>Admission Number</th>
	            <th>Subject</th>
	            <th>Class</th>
	            <th>Term</th>
	            <th>Action</th>
	        </thead>
	        <tbody>
	    ';
		
		$cnt=1;
		while ($row = $result->fetch_assoc()) {
			echo '
				<tr>
					<td>'.$cnt++.'</td>
					<td>'.$row["admno"].'</td>
	                <td>'.$row["subject"].'</td>
	                <td>'.$row["class"].'</td>
	                <td>'.$row["term"].'</td>
	                <td>
	                	<a href="file/assignmnet_submitted/'.$row['file'].'" class="btn btn-warning btn-xs download"><i class="fa fa-download"></i></a>
	            ';

	            		if ($role == 'System Admin') {
	            				echo '
	                		<button type="button" class="btn btn-danger btn-xs delete" id="'.$row["id"].'"><i class="fa fa-trash"></i></button>
	            			';
	            		}else{
	            			
	            		}

	            echo '	                	
	                </td>
            	</tr>
            	';
		}
		echo '</tbody>';

	}else{
		echo "No Record Found in the Database";
	}
	
	$conn->close();
?>
<script type="text/javascript">
	$('#user_data').DataTable();
</script>