<?php

	include "../connect/db.php";

	$sql = "SELECT * FROM term";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		echo '
			<thead>
	            <th>S/N</th>
	            <th>Term Type</th>
	            <th>Session</th>
	            <th>Action</th>
	        </thead>
	        <tbody>
	    ';
		
		$cnt=1;
		while ($row = $result->fetch_assoc()) {
			echo '
				<tr>
					<td>'.$cnt++.'</td>
	                <td>'.$row["termtype"].'</td>
	                <td>'.$row["session"].'</td>
	                <td>
	                	<button type="button" class="btn btn-warning btn-xs edit" id="'.$row["id"].'"><i class="fa fa-edit"></i></button>
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