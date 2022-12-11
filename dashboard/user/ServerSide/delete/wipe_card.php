<?php
	
	if (isset($_POST['wipe'])) {
		
		include "../connect/db.php";

		$sql = "TRUNCATE card_print";
		if($result = $conn->query($sql)){
			echo '
				<div class="alert alert-success">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Success!</strong> Delete Successful.
                </div>
			';
		}
	}

