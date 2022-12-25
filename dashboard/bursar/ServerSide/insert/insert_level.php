<?php
	
	if (isset($_POST['level'])) {
		
		include "../connect/db.php";

		$level = $_POST['level'];

		$sql = "SELECT * FROM level WHERE level_name = '$level' ";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			echo '
				<div class="alert alert-warning">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Warning!</strong> '.$level.' Already Exist.
                </div>
			';
		}else{

			$sql = "INSERT INTO level(level_name) VALUES ('$level')";
			if($result = $conn->query($sql)){
				echo '
					<div class="alert alert-success">
	                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	                  <strong>Success!</strong> "'.$level.'" has been Added Successfuly.
	                </div>
				';
			}else{
				echo '
					<div class="alert alert-danger">
	                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	                  <strong>Error!</strong> Adding '.$level.' failed.
	                </div>
				';
			}
		}
	}

