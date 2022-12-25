<?php
	include "ServerSide/connect/db.php";

	function load_level($conn){
		$sql = "SELECT * FROM level";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$output = '';
			while ($row = $result->fetch_assoc()) {
				$output .= '<option value="'.$row["level_name"].'">'.$row["level_name"].'</option>';
		}
		return $output;
		}

	}

	function load_tech($conn){
		$sql = "SELECT * FROM employee_data WHERE role = 'teacher'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$output = '';
			while ($row = $result->fetch_assoc()) {
				$output .= '<option value="'.$row["admno"].'">'.$row["admno"].'</option>';
		}
		return $output;
		}
	}

	function load_student_spec($conn){
		$row1 = array('SSS 1A', 'SSS 2A', 'SSS 3A' );
		$sql = "SELECT * FROM student_data WHERE class IN ('" . implode("','", $row1) . "') ";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$output = '';
			while ($row = $result->fetch_assoc()) {
				$output .= '<option value="'.$row["admno"].'">'.$row["admno"].'</option>';
		}
		return $output;
		}
	}

	function load_class($conn){
		$sql = "SELECT * FROM class";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$output = '';
			while ($row = $result->fetch_assoc()) {
				$output .= '<option value="'.$row["level"].$row["name"].'">'.$row["level"].$row["name"].'</option>';
		}
		return $output;
		}
	}

	function load_class_spec($conn, $admno){
		$sql = "SELECT * FROM classsubject WHERE subjectTeacher = '$admno' ";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$output = '';
			while ($row = $result->fetch_assoc()) {
				$output .= '<option value="'.$row["class"].'">'.$row["class"].'</option>';
			}
		return $output;
		}
	}

	function load_subject_spec1($conn, $admno){
		$sql = "SELECT * FROM classsubject WHERE subjectTeacher = '$admno' ";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$output = '';
			while ($row = $result->fetch_assoc()) {
				$output .= '<option value="'.$row["subject"].'">'.$row["subject"].'</option>';
			}
		return $output;
		}
	}

	function load_subject($conn){
		$sql = "SELECT * FROM subject";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$output = '';
			while ($row = $result->fetch_assoc()) {
				$output .= '<option value="'.$row["subject"].'">'.$row["subject"].'</option>';
		}
		return $output;
		}
	}

	function load_subject_spec($conn){
		$row1 = array('SSS 1A', 'SSS 2A', 'SSS 3A' );
		$sql = "SELECT * FROM classsubject WHERE class IN ('" . implode("','", $row1) . "') ";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$output = '';
			while ($row = $result->fetch_assoc()) {
				$output .= '<option value="'.$row["subject"].'">'.$row["subject"].'</option>';
		}
		return $output;
		}
	}

	function load_session($conn){
		$sql = "SELECT * FROM session";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$output = '';
			while ($row = $result->fetch_assoc()) {
				$output .= '<option value="'.$row["session"].'">'.$row["session"].'</option>';
		}
		return $output;
		}
	}

	function load_termtype($conn){
		$sql = "SELECT * FROM termtype";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$output = '';
			while ($row = $result->fetch_assoc()) {
				$output .= '<option value="'.$row["termtype"].'">'.$row["termtype"].'</option>';
		}
		return $output;
		}
	}

	function load_term($conn){
		$sql = "SELECT * FROM term";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$output = '';
			while ($row = $result->fetch_assoc()) {
				$output .= '<option value="'.$row["termtype"].' '.$row["session"].'">'.$row["termtype"].' '.$row["session"].'</option>';
		}
		return $output;
		}
	}
	
