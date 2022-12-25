<?php
	
	if (isset($_POST['session'])) {
		
		include "../connect/db.php";

		$session = $_POST['session'];
		$termtype = $_POST['termtype'];
		$id = $_POST['id'];

		$sql = "SELECT * FROM term WHERE termtype = '$termtype' AND session ='$session' ";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			echo '
				<div class="alert alert-warning">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Warning!</strong> '.$termtype.' '.$session.' Already Exist.
                </div>
			';
		}else{
			$sql = "UPDATE term SET session = '$session', termtype = '$termtype' WHERE id = '$id' ";

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