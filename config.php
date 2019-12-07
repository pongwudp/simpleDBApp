<?php
date_default_timezone_set('Asia/Bangkok');
$host = gethostname();
$db = "fintech";
$username = "fintech";
$passwd = "P@ssw0rd";
$dns = "mysql:host=$host;dbname=$db";
$options = [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION];

$table = "employee";
try {
	$con = new PDO("mysql:host=$host",$username,$passwd,$options);
	$sql = "CREATE DATABASE fintech";
	$con->exec($sql);
}
catch(PDOEXCEPTION $e) {
	echo $e->getMessage();
}

$conn = new PDO("$dns;charset=utf8",$username,$passwd);