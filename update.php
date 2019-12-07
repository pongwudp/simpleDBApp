<?php
try {
	include("config.php");
	
	$act = isset($_GET['act']) ? $_GET['act'] : "";
	if($act === "update"){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		$birthdate = $_POST['birthdate'];
		
		$sql = "UPDATE $table SET 
			name = :name,
			email = :email,
			birthdate = :birthdate,
			address = :address WHERE id = :id";
		$query = $conn->prepare($sql);
		$query->execute(array(
			'id' => $id,
			'name' => $name,
			'email' => $email,
			'birthdate' => $birthdate,
			'address' => $address));
			
		header("Location: ./read.php");
		die();	
	}
}
catch(PDOException $err){
	echo $err->getMessage();
}

$conn = null;
?>