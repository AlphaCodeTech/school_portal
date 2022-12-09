<?php 

if(isset($_POST["user_id"]))
{
	include "../connect/db.php";

	$id = $_POST['user_id'];

	$output = array();

	$sql = "SELECT * FROM class WHERE id = '$id' ";
	$result = $conn->query($sql);

	foreach($result as $row)
	{
		$output["level"] = $row["level"];
		$output["name"] = $row["name"];
		$output["formTeacher"] = $row["formTeacher"];
		$output["id"] = $row["id"];
	}
	echo json_encode($output);
}
