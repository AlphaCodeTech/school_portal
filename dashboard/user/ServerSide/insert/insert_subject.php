<?php
	
	if (isset($_POST['subject'])) {
		
		include "../connect/db.php";

		$subject = $_POST['subject'];

		$sql = "SELECT * FROM subject WHERE subject = '$subject' ";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			echo '
				<div class="alert alert-warning">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Warning!</strong> '.$subject.' Already Exist.
                </div>
			';
		}else{

			$sql = "INSERT INTO subject(subject) VALUES ('$subject')";
			if($result = $conn->query($sql)){
				echo '
					<div class="alert alert-success">
	                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	                  <strong>Success!</strong> "'.$subject.'" has been Added Successfuly.
	                </div>
				';
			}else{
				echo '
					<div class="alert alert-danger">
	                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	                  <strong>Error!</strong> Adding '.$subject.' failed.
	                </div>
				';
			}
		}
	}

