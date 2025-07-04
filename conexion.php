<?php
$servername = "";
$username = "root";
$password = '';
$dbname = "";

$conn = new mysqli ($servername, $username, $password, $dbname);

if ($conn->connect_error){
	die ("conexion fallida:" . $conn->connect_error);
}


?>
