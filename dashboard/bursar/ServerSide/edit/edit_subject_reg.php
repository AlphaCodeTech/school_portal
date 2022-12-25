<?php 

if(isset($_POST["user_id"]))
{
	include "../connect/db.php";

	$id = $_POST['user_id'];

	$output = array();

	$sql = "SELECT * FROM subject_registration WHERE id = '$id' ";
	$result = $conn->query($sql);

	foreach($result as $row)
	{
		$output["session"] = $row["session"];
		$output["subject"] = $row["subject"];
		$output["admno"] = $row["admno"];
		$output["id"] = $row["id"];
	}
	echo json_encode($output);
}
