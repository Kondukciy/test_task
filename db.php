<?php
function connectDB(){
$servername = "localhost";
$username = "root";
$password = "";
$db = "test_task";
$opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
];

$conn = new PDO("mysql:host=$servername; dbname=$db;charset=utf8;", $username, $password, $opt);
return $conn;
}

$connect = connectDB();

function getCategory($connect){
	$sql = "SELECT * FROM category";
	$stmt = $connect->prepare($sql);
	$stmt->execute();
	$data = $stmt->fetchAll();
	return $data;
}