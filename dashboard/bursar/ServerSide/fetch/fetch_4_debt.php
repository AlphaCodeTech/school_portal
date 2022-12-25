<?php

	include "../connect/db.php";

	$sql = "SELECT * FROM student_debt";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		echo '
			<thead>
	            <th>S/N</th>
	            <th>ADMNO</th>
	            <th>CLASS</th>
	            <th>DEBT</th>
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
	                <td>'.$row["class"].'</td>
	                <td>'.$row["debt"].'</td>
	                <td>
	                	<button type="button" class="btn btn-warning btn-xs edit" id="'.$row["id"].'">EDIT</button>
	                	<button type="button" class="btn btn-danger btn-xs delete" id="'.$row["id"].'">DELETE</button>
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