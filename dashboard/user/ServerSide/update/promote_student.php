<?php
	
	if (isset($_POST['old_class'])) {
		
		include "../connect/db.php";

		$old_class  = $_POST['old_class'];
		$new_class 	= $_POST['new_class'];

		$sql = "SELECT * FROM student_data WHERE class = '$old_class' ";
		
		if($result = $conn->query($sql)){

			/*if ($new_class == 'Archive') {
				$cnt = 0;
				while ($row = $result->fetch_assoc()) {
					$id = $row['id'];
					$sql1 = "INSERT INTO archive SELECT * FROM student_data WHERE id = '$id' ";
                    $conn->query($sql1);
					$cnt++;
					if($conn->query($sql1)){
						$sql2 = "DELETE FROM student_data WHERE id = '$id' ";
						if($conn->query($sql2)){
							$cnt++;
						}
					}
				}
				if ($result->num_rows == $cnt) {
					echo '
						<div class="alert alert-success">
		                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		                  <strong>Success!</strong> Student has been Archived Successfuly
		                </div>
					';
				}else{
					echo '
						<div class="alert alert-danger">
		                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		                  <strong>Error!</strong>
		                </div>
					';
				}
				
			}else{*/
				$cnt = 0;
				while ($row = $result->fetch_assoc()) {
					$id = $row['id'];
					$sql1 = "UPDATE student_data SET class = '$new_class' WHERE id = '$id' ";
					$conn->query($sql1);
					$cnt++;
				}
				if ($result->num_rows == $cnt) {
					echo '
						<div class="alert alert-success">
		                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		                  <strong>Success!</strong> Student has been Promoted Successfuly
		                </div>
					';
				}else{
					echo '
						<div class="alert alert-danger">
		                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		                  <strong>Error!</strong>
		                </div>
					';
				}
			/*}*/

		}else{
			echo "Error Fetching Data";
		}

	}