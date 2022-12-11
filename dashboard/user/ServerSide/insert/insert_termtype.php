<?php
	
	if (isset($_POST['termtype'])) {
		
		include "../connect/db.php";

		$termtype = $_POST['termtype'];

		$sql = "SELECT * FROM termtype WHERE termtype = '$termtype' ";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			echo '
				<div class="alert alert-warning">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Warning!</strong> '.$termtype.' Already Exist.
                </div>
			';
		}else{

			$sql = "INSERT INTO termtype(termtype) VALUES ('$termtype')";
			if($result = $conn->query($sql)){
				echo '
					<div class="alert alert-success">
	                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	                  <strong>Success!</strong> "'.$termtype.'" has been Added Successfuly.
	                </div>
				';
			}else{
				echo '
					<div class="alert alert-danger">
	                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	                  <strong>Error!</strong> Adding '.$termtype.' failed.
	                </div>
				';
			}
		}
	}

