<?php

	include "../connect/db.php";

	$sql = "SELECT * FROM level";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		echo '
			<thead>
	            <th>S/N</th>
	            <th>Level</th>
	            <th>Action</th>
	        </thead>
	        <tbody>
	    ';
		
		$cnt=1;
		while ($row = $result->fetch_assoc()) {
			echo '
				<tr>
					<td>'.$cnt++.'</td>
	                <td>'.$row["level_name"].'</td>
	                <td>
	                	<button type="button" class="btn btn-default btn-xs delete" id="'.$row["id"].'"><i class="fa fa-eye-slash"></i></button>
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