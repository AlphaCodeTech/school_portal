<?php

	if (isset($_POST['card'])) {
		include "../connect/db.php";

		$card   = $_POST['card'];
		$admno 	= $_POST['admno'];
		$term 	= $_POST['term'];
		$class 	= $_POST['class'];

		$sql = "SELECT * FROM card WHERE pin = '$card' LIMIT 1 ";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();

		if ($result->num_rows == 1) {
			if ($row['term'] != '' || $row['matchid'] != '' || $row['class'] != '') {

				if ($row['matchid'] == $admno && $row['term'] == $term && $row['class'] == $class) {
					echo "used by me";
				}else{
					echo "used by another";
				}

			}elseif($row['term'] == '' && $row['matchid'] == ''){
				echo "used by none";
			}else{
				echo "invalid";
			}
		}else{
			echo "invalid card";
		}

	}