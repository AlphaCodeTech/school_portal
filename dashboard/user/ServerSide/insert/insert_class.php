<?php
	
	if (isset($_POST['level'])) {
		
		include "../connect/db.php";

		$level = $_POST['level'];
		$cat = $_POST['cat'];
		$tech = $_POST['tech'];

		$sql = "SELECT * FROM class WHERE level = '$level' AND name = '$cat' ";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			echo '
				<div class="alert alert-warning">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Warning!</strong> '.$level. $cat .' Already Exist.
                </div>
			';
		}else{

			$sql = "INSERT INTO class(level,name,formTeacher) VALUES ('$level', '$cat', '$tech')";
			if($result = $conn->query($sql)){
				echo '
					<div class="alert alert-success">
	                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	                  <strong>Success!</strong> "'.$level. $cat .'" has been Added Successfuly.
	                </div>
				';
			}else{
				echo '
					<div class="alert alert-danger">
	                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	                  <strong>Error!</strong> Adding '.$level. $cat .' failed.
	                </div>
				';
			}
		}
	}

