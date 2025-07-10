<?php
$servername = "192.168.0.100";
$username = "fernando";
$password = 'practicas25$';
$dbname = "temperatura";

$conn = new mysqli ($servername, $username, $password, $dbname);

if ($conn->connect_error){
	die ("conexion fallida:" . $conn->connect_error);
}


?>
