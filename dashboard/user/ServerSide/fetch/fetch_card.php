<?php

	include "../connect/db.php";

	$sql = "SELECT * FROM card";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		echo '
			<thead>
	            <th>S/N</th>
	            <th>Term</th>
	            <th>PIN</th>
	            <th>Serial</th>
	            <th>Match ID</th>
	            <th>Action</th>
	        </thead>
	        <tbody>
	    ';
		
		$cnt=1;
		while ($row = $result->fetch_assoc()) {
			echo '
				<tr>
					<td>'.$cnt++.'</td>
	                <td>'.$row["term"].'</td>
	                <td>'.$row["pin"].'</td>
	                <td>'.$row["serial_pin"].'</td>
	                <td>'.$row["matchid"].'</td>
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