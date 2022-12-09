<?php
	
	if (isset($_POST['session'])) {
		
		include "../connect/db.php";

		$session = $_POST['session'];
		$admno = $_POST['admno'];
		$subject = $_POST['subject'];

		$sql = "SELECT * FROM subject_registration WHERE session = '$session' AND subject = '$subject' AND admno = '$admno' ";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			echo '
				<div class="alert alert-warning">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Warning!</strong> '.$subject. ' has already been registered for '.$admno .'.
                </div>
			';
		}else{

			$sql = "INSERT INTO subject_registration(admno,subject,session) VALUES('$admno', '$subject', '$session')";
			if($result = $conn->query($sql)){
				echo '
					<div class="alert alert-success">
	                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	                  <strong>Success!</strong>'.$subject. ' has been Successfuly registered for '.$admno .'.
	                </div>
				';
			}else{
				echo '
					<div class="alert alert-danger">
	                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	                  <strong>Error!</strong> Adding '.$subject. ' Registration for ' .$admno .' failed.
	                </div>
				';
			}
		}
	}

