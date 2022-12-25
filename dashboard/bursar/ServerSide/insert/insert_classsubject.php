<?php
	
	if (isset($_POST['myclass'])) {
		
		include "../connect/db.php";

		$class = $_POST['myclass'];
		$subject = $_POST['subject'];
		$tech = $_POST['tech'];

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

			$sql = "INSERT INTO classsubject(subject,class,subjectTeacher) VALUES ('$subject', '$class', '$tech')";
			if($result = $conn->query($sql)){
				echo '
					<div class="alert alert-success">
	                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	                  <strong>Success!</strong> '.$subject. ' Successfully Assigned to '.$class .'.
	                </div>
				';
			}else{
				echo '
					<div class="alert alert-danger">
	                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	                  <strong>Error!</strong> Assigning '.$subject. ' to ' .$class .' failed.
	                </div>
				';
			}
		}
	}

