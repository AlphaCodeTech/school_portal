<?php

	include "../connect/db.php";

	$sql = "SELECT * FROM generated_result";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		echo '
			<thead>
	            <th>S/N</th>
	            <th>Surname</th>
	            <th>Lastname</th>
	            <th>MiddleName</th>
	            <th>Admission Number</th>
	            <th>Class</th>
	            <th>Term</th>
	            <th>Subject</th>
	            <th>Action</th>
	        </thead>
	        <tbody>
	    ';
		
		$cnt=1;
		while ($row = $result->fetch_assoc()) {
			echo '
				<tr>
					<td>'.$cnt++.'</td>
	                <td>'.$row["firstname"].'</td>
	                <td>'.$row["lastname"].'</td>
	                <td>'.$row["middlename"].'</td>
	                <td>'.$row["admno"].'</td>
	                <td>'.$row["class"].'</td>
	                <td>'.$row["term"].'</td>
	                <td>'.$row["subject"].'</td>
	                <td>
	                	<button type="button" class="btn btn-danger btn-xs delete" id="'.$row["id"].'"><i class="fa fa-trash"></i></button>
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