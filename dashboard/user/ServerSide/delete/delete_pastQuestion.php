<?php
	
	if (isset($_POST['user_id'])) {
		
		include "../connect/db.php";

		$user_id = $_POST['user_id'];

		$sql = "DELETE FROM past_question WHERE id = $user_id ";
		if($result = $conn->query($sql)){
			echo '
				<div class="alert alert-success">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Success!</strong> Delete Successful.
                </div>
			';
		}
	}

