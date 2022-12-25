<?php
	
	if (isset($_POST['session'])) {
		
		include "../connect/db.php";

		$termtype = $_POST['termtype'];
		$session = $_POST['session'];

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

			$sql = "INSERT INTO term(termtype,session) VALUES ('$termtype', '$session')";
			if($result = $conn->query($sql)){
				echo '
					<div class="alert alert-success">
	                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	                  <strong>Success!</strong> '.$termtype.' '.$session.' has been Added Successfuly.
	                </div>
				';
			}else{
				echo '
					<div class="alert alert-danger">
	                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	                  <strong>Error!</strong> Adding '.$termtype.' '.$session.' failed.
	                </div>
				';
			}
		}
	}

