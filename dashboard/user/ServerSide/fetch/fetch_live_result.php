<?php

	include "../connect/db.php";

	$class 		= 	$_POST['myclass'];
	$subject 	= 	$_POST['subject'];
	$term 		= 	$_POST['term'];

	$sql = "SELECT * FROM generated_result WHERE class = '$class' AND subject = '$subject' AND term = '$term' ";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		echo '
			<thead>
	            <th>S/N</th>
	            <th>Name</th>
	            <th>Admission Number</th>
	            <th>First Test</th>
	            <th>Second Test</th>
	            <th>Assignment</th>
	            <th>Project</th>
	            <th>Exam</th>
	            <th>Action</th>
	        </thead>
	        <tbody>
	    ';
		
		$cnt=1;
		while ($row = $result->fetch_assoc()) {
			echo '
				<tr>
					<td>'.$cnt++.'</td>
	                <td>'.$row["firstname"].' '.$row["lastname"].' '.$row["middlename"].'</td>
	                <td>'.$row["admno"].'</td>
					<td><div contenteditable>'.$row["firstTest"].'</div></td>
					<td><div contenteditable>'.$row["secondTest"].'</div></td>
					<td><div contenteditable>'.$row["assignment"].'</div></td>
					<td><div contenteditable>'.$row["project"].'</div></td>
					<td><div contenteditable>'.$row["exam"].'</div></td>
	                <td>
	                	<button type="button" class="btn btn-danger btn-xs apply" id="'.$row["id"].'">Apply <i class="fa fa-edit"></i></button>
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