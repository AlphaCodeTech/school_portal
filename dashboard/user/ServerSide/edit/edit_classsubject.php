<?php 

if(isset($_POST["user_id"]))
{
	include "../connect/db.php";

	$id = $_POST['user_id'];

	$output = array();

	$sql = "SELECT * FROM classsubject WHERE id = '$id' ";
	$result = $conn->query($sql);

	foreach($result as $row)
	{
		$output["class"] = $row["class"];
		$output["subject"] = $row["subject"];
		$output["subjectTeacher"] = $row["subjectTeacher"];
		$output["id"] = $row["id"];
	}
	echo json_encode($output);
}
