<?php
	
	if (isset($_POST['myclass'])) {
		
		include "../connect/db.php";

		$class = $_POST['myclass'];
		$admno = $_POST['admno'];
		$amount = $_POST['amount'];

		$sql = "SELECT * FROM student_debt WHERE class = '$class' AND admno = '$admno' ";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			echo '
				<div class="alert alert-warning">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Warning!</strong> '.$admno. ' Already owing in '.$class .'.
                </div>
			';
		}else{

			$sql = "INSERT INTO student_debt(admno,class,debt) VALUES ('$admno', '$class', '$amount')";
			if($result = $conn->query($sql)){
				echo '
					<div class="alert alert-success">
	                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	                  <strong>Success!</strong> Successfully
	                </div>
				';
			}else{
				echo '
					<div class="alert alert-danger">
	                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	                  <strong>Error!</strong> failed.
	                </div>
				';
			}
		}
	}

