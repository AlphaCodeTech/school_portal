<?php
	
	if (isset($_POST['myclass'])) {
		
		include "../connect/db.php";

		$class = $_POST['myclass'];
		$term = $_POST['term'];



		if ($class == "SENIOR SECONDARY" ){
			
			$sql = "SELECT * FROM subject_registration";
			$result = $conn->query($sql);
			while ($row = $result->fetch_assoc()) {
				$admno 		= $row['admno'];
				$mysubject 	= $row['subject'];

				$sql1 = "SELECT * FROM student_data WHERE admno = '$admno' ";
				$result1 = $conn->query($sql1);
				$row1 = $result1->fetch_assoc();

				$firstname 		= $row1['surname'];
				$lastname 		= $row1['lastname'];
				$middlename 	= $row1['middlename'];
				$myclass	 	= $row1['class'];

				$sql3 = "SELECT * FROM generated_result WHERE firstname = '$firstname' AND lastname = '$lastname' AND middlename = '$middlename' AND admno = '$admno' AND class = '$myclass' AND term = '$term' AND subject = '$mysubject' ";
				$result3 = $conn->query($sql3);
				if ($result3->num_rows > 0) {
					
				}else{

					$sql2 = "INSERT INTO generated_result(firstname, lastname, middlename, admno, class, term, subject, firstTest, secondTest, assignment, project, exam) VALUES('$firstname', '$lastname', '$middlename', '$admno', '$myclass', '$term', '$mysubject', 0,0,0,0,0)";
					if($result2 = $conn->query($sql2)){
					
					}else{
						echo '
							<div class="alert alert-danger">
			                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			                  <strong>Error!</strong>
			                </div>
						';
					}

				}
				
			}

			echo '
						<div class="alert alert-success">
		                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		                  <strong>Success!</strong> 
		                </div>
					';

		}elseif ($class == "JUNIOR SECONDARY") {

			$classes = array('JSS 1A', 'JSS 1B', 'JSS 1C', 'JSS 2A', 'JSS 2B', 'JSS 2C', 'JSS 3A', 'JSS 3B', 'JSS 3C');
			$sql1 = "SELECT * FROM student_data WHERE class IN ('" . implode("','", $classes) . "') ";
			$result1 = $conn->query($sql1);
			while ($row1 = $result1->fetch_assoc()) {

				$admno	 		= $row1['admno'];
				$firstname 		= $row1['surname'];
				$lastname 		= $row1['lastname'];
				$middlename 	= $row1['middlename'];
				$myclass	 	= $row1['class'];

				$sql2 = "SELECT * FROM classsubject WHERE class = '$myclass' ";
				$result2 = $conn->query($sql2);
				while ($row2 = $result2->fetch_assoc()) {
					$classsubject = $row2['subject'];


					$sql3 = "SELECT * FROM generated_result WHERE firstname = '$firstname' AND lastname = '$lastname' AND middlename = '$middlename' AND admno = '$admno' AND class = '$myclass' AND term = '$term' AND subject = '$classsubject' ";
					$result3 = $conn->query($sql3);
					if ($result3->num_rows > 0) {
						
					}else{

						$sql4 = "INSERT INTO generated_result(firstname, lastname, middlename, admno, class, term, subject, firstTest, secondTest, assignment, project, exam) VALUES('$firstname', '$lastname', '$middlename', '$admno', '$myclass', '$term', '$classsubject', 0,0,0,0,0)";
						if($conn->query($sql4)){
						
						}else{
							echo '
								<div class="alert alert-danger">
				                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				                  <strong>Error!</strong>
				                </div>
							';
						}

					}


				}

			}

			echo '
						<div class="alert alert-success">
		                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		                  <strong>Success!</strong> 
		                </div>
					';

		}

	}

