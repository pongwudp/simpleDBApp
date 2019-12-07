<?php
include("config.php");
	
$sql = "SELECT * FROM $table";
$query = $conn->prepare($sql);
if(!$query->execute()){
	header("Location: data/");
	die();
}

try {
	if($_POST){
		$name = $_POST['name'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		$birthdate = $_POST['birthdate'];
		$created = date('Y-m-d h:i:s');
		
		//var_dump($_POST);
		$sql = "INSERT INTO $table (name, email, birthdate, address, created) VALUES(:name,:email,:birthdate,:address, :created)";
		$query = $conn->prepare($sql);
		$query->execute(array(
			'name' => $name, 
			'email' => $email, 
			'birthdate' => $birthdate, 
			'address' => $address,
			'created' => $created
		));
		echo "<script>window.location='./read.php';</script>";
		
		echo "<div class='w3-center w3-green'><span onclick=\"this.parentElement.style.display='none'\" class=\"w3-button w3-display-topright\">&times;</span>เพิ่มข้อมูลเรียบร้อย<br>";
		echo "<a href='read.php'>ข้อมูลสมาชิก</a></div>";
		
	}
}
catch(PDOException $err){
	echo "<div align='center'>".$err->getMessage()."</div>";
}

$conn = null;
?>
	
