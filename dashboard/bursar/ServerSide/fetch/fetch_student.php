<?php
session_start();
	include "../connect/db.php";

	$sql = "SELECT * FROM student_data WHERE class != 'Archive' ";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		echo '
			<thead>
	            <th>S/N</th>
	            <th>Name</th>
	            <th>Admission Number</th>
	            <th>Class</th>
	            <th>Phone</th>
	            <th>Action</th>
	        </thead>
	        <tbody>
	    ';
		
		$cnt=1;
		while ($row = $result->fetch_assoc()) {
			echo '
				<tr>
					<td>'.$cnt++.'</td>
	                <td>'.$row["surname"].' '.$row["lastname"].' '.$row["middlename"].'</td>
	                <td>'.$row["admno"].'</td>
	                <td>'.$row["class"].'</td>
	                <td>'.$row["phone"].'</td>
	                <td>
	                	<a href="profile_view.php?id='.$row["id"].'&role='.$row["role"].'" class="btn btn-success btn-xs edit"><i class="fa fa-eye"></i></a>
	                ';
	             	if ($_SESSION['sd']['role'] == 'System Admin') { 
	             	echo '
	                	<a href="edit_student.php?id='.$row["id"].'" class="btn btn-warning btn-xs edit"><i class="fa fa-edit"></i></a>
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