<?php
session_start();
	include "../connect/db.php";

	$sql = "SELECT * FROM lesson_note";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		echo '
			<thead>
	            <th>S/N</th>
	            <th>Teacher ID</th>
	            <th>Subject</th>
	            <th>Term</th>
	            <th>Month</th>
	            <th>Class</th>
	            <th>Week</th>
	            <th>Topic</th>
	            <th>Status</th>
	            <th>Action</th>
	        </thead>
	        <tbody>
	    ';
		
		$cnt=1;
		while ($row = $result->fetch_assoc()) {
			if ($row["status"] == 'pending') {
				$status ='<a href="#" class="btn btn-warning btn-xs status">Pending</a>';
			}elseif($row["status"] == 'approved'){
				$status ='<a href="#" class="btn btn-success btn-xs status">Approved</a>';
			}elseif($row["status"] == 'notapproved'){
				$status ='<a href="#" class="btn btn-danger btn-xs status">Not Approved</a>';
			}
			echo '
				<tr>
					<td>'.$cnt++.'</td>
	                <td>'.$row["admno"].'</td>
	                <td>'.$row["subject"].'</td>
	                <td>'.$row["term"].'</td>
	                <td>'.$row["month"].'</td>
	                <td>'.$row["class"].'</td>
	                <td>'.$row["week"].'</td>
	                <td>'.$row["topic"].'</td>
	                <td>'.$status.'</td>
	                <td>
	                	<a href="review.php?id='.$row["id"].'" class="btn btn-success btn-xs edit"><i class="fa fa-eye"></i></a>
	                	<a href="file/lessonNote/'.$row['file'].'" class="btn btn-warning btn-xs download"><i class="fa fa-download"></i></a>
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