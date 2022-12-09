<?php 

if(isset($_POST["user_id"]))
{
	include "../connect/db.php";

	$id = $_POST['user_id'];

	$output = array();

	$sql = "SELECT * FROM term WHERE id = '$id' ";
	$result = $conn->query($sql);

	foreach($result as $row)
	{
		$output["termtype"] = $row["termtype"];
		$output["session"] = $row["session"];
		$output["id"] = $row["id"];
	}
	echo json_encode($output);
}
