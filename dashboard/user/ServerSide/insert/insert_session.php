<?php
	
	if (isset($_POST['session'])) {
		
		include "../connect/db.php";

		$session = $_POST['session'];

		$sql = "SELECT * FROM session WHERE session = '$session' ";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			echo '
				<div class="alert alert-warning">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Warning!</strong> '.$session.' Already Exist.
                </div>
			';
		}else{

			$sql = "INSERT INTO session(session) VALUES ('$session')";
			if($result = $conn->query($sql)){
				echo '
					<div class="alert alert-success">
	                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	                  <strong>Success!</strong> "'.$session.'" has been Added Successfuly.
	                </div>
				';
			}else{
				echo '
					<div class="alert alert-danger">
	                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	                  <strong>Error!</strong> Adding '.$session.' failed.
	                </div>
				';
			}
		}
	}

