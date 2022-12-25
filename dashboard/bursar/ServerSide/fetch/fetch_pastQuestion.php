<?php
session_start();
	include "../connect/db.php";

	$sql = "SELECT * FROM past_question";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		echo '
			<thead>
	            <th>S/N</th>
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
	                <td>'.$row["subject"].'</td>
	                <td>'.$row["class"].'</td>
	                <td>'.$row["term"].'</td>
	                <td>
	                	<a href="file/pastQuestion/'.$row['file'].'" class="btn btn-warning btn-xs download"><i class="fa fa-download"></i></a>
	                ';
	             	if ($_SESSION['sd']['role'] == 'System Admin') { 
	             	echo '
	                	<button type="button" class="btn btn-danger btn-xs delete" id="'.$row["id"].'"><i class="fa fa-trash"></i></button>
	                ';
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