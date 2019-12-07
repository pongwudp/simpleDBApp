<?php
try {
	require("config.php");

	$id = isset($_GET["id"]) ? $_GET["id"] : "";
	
	$sql = "DELETE FROM $table WHERE id = :id";
	$query = $conn->prepare($sql);
	$query->execute(array('id' => $id));
	header("Location: read.php");
	die();
}
catch(PDOException $err) {
	die($err->getMessage());
}

$conn = null;