<?php
	
	if (isset($_POST['class'])) {
		
		include "../connect/db.php";

		$class = $_POST['class'];
		$admno = $_POST['admno'];
		$amount = $_POST['amount'];
		$id = $_POST['id'];

		$sql = "SELECT * FROM student_debt WHERE class = '$class' AND admno = '$admno' AND debt = '$amount' ";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			echo '
				<div class="alert alert-warning">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Warning!</strong> '.$admno. ' Already owing in '.$amount .'.
                </div>
			';
		}else{

			$sql = "UPDATE student_debt SET class = '$class', admno = '$admno', debt = '$amount' WHERE id = '$id' ";

			if($result = $conn->query($sql)){
				echo '
					<div class="alert alert-success">
	                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	                  <strong>Success!</strong> Updated Successfuly
	                </div>
				';
			}else{
				echo '
					<div class="alert alert-danger">
	                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	                  <strong>Error!</strong> failed to Update.
	                </div>
				';
			}
		}
	}