<?php
	
	if (isset($_POST['firstTest'])) {
		
		include "../connect/db.php";

		$id 			= $_POST['id'];
		$firstTest 		= $_POST['firstTest'];
		$secondTest 	= $_POST['secondTest'];
		$assignment 	= $_POST['assignment'];
		$project	 	= $_POST['project'];
		$exam 			= $_POST['exam'];

		$sql = "UPDATE generated_result SET firstTest = '$firstTest', secondTest = '$secondTest', assignment = '$assignment', project = '$project', exam = '$exam' WHERE id = '$id' ";

		if($result = $conn->query($sql)){
			echo '
				<div class="alert alert-success">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Success!</strong> Record Saved
                </div>
			';
		}else{
			echo '
				<div class="alert alert-danger">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Error!</strong> failed to Save Record.
                </div>
			';
		}
	}