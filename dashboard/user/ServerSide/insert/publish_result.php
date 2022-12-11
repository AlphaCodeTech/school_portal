<?php

	include "../connect/db.php";
	
	$sql = "SELECT * FROM generated_result WHERE exam != '0' ";
		$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$id		 		= $row['id'];
			$admno	 		= $row['admno'];
			$myclass	 	= $row['class'];
			$term		 	= $row['term'];
			$subject	 	= $row['subject'];
			$firstTest	 	= $row['firstTest'];
			$secondTest	 	= $row['secondTest'];
			$assignment	 	= $row['assignment'];
			$project	 	= $row['project'];
			$exam		 	= $row['exam'];

			$sql1 = "INSERT INTO published_result(admno, class, term, subject, firstTest, secondTest, assignment, project, exam) VALUES('$admno', '$myclass', '$term', '$subject', '$firstTest','$secondTest','$assignment','$project','$exam')";
			if($result1 = $conn->query($sql1)){
				
				$sql2 = "DELETE FROM generated_result WHERE id = $id ";
				if($result2 = $conn->query($sql2)){
					echo '
						<div class="alert alert-success">
		                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		                  <strong>Success!</strong> Publishing Completed.
		                </div>
					';
				}

			}else{
				echo '
					<div class="alert alert-danger">
	                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	                  <strong>Error!</strong> Publishing Results.
	                </div>
				';
			}
		}
	}else{
		echo '
			<div class="alert alert-danger">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Error!</strong> No Result is ready for Publishing.
            </div>
		';
	}