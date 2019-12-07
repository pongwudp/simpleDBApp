<?php
try {
	require '../config.php';
	$sql = file_get_contents('emp.sql');
	$conn->exec($sql);
	//echo "Table create successfully.";
	header("Location: ../create.php");
	die();
}
catch(PDOException $err) {
    echo $sql . "<br>" . $err->getMessage();
}
