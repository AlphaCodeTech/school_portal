<?php
	
	if (isset($_POST['level'])) {
		
		include "../connect/db.php";

		$level = $_POST['level'];
		$cat = $_POST['cat'];
		$tech = $_POST['tech'];
		$id = $_POST['id'];

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

			$sql = "UPDATE class SET level = '$level', name = '$cat', formTeacher = '$tech' WHERE id = '$id' ";

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