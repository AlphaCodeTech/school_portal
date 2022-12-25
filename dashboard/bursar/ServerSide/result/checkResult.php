<?php

	if (isset($_POST['card'])) {
		include "../connect/db.php";

		$card   = $_POST['card'];
		$admno 	= $_POST['admno'];
		$term 	= $_POST['term'];
		$class 	= $_POST['class'];

		$sql = 'SELECT * FROM published_result WHERE class = "'.$class.'" AND admno = "'.$admno.'" AND term = "'.$term.'" ';
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();

		if ($result->num_rows > 0) {
			echo "avaliable";
		}else{
			echo "not avaliable";
		}

	}