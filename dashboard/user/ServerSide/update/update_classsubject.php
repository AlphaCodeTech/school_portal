<?php
	
	if (isset($_POST['class'])) {
		
		include "../connect/db.php";

		$class = $_POST['class'];
		$subject = $_POST['subject'];
		$tech = $_POST['tech'];
		$id = $_POST['id'];

		$sql = "SELECT * FROM classsubject WHERE class = '$class' AND subject = '$subject' ";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			echo '
				<div class="alert alert-warning">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Warning!</strong> '.$subject. ' Already Assigned to '.$class .'.
                </div>
			';
		}else{

			$sql = "UPDATE classsubject SET class = '$class', subject = '$subject', subjectTeacher = '$tech' WHERE id = '$id' ";

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