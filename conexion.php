<?php
$servername = "";
$username = "";
<<<<<<< HEAD
$password = '';
=======
$password = '$';
>>>>>>> 658f208 (nuevos cambios)
$dbname = "";

$conn = new mysqli ($servername, $username, $password, $dbname);

if ($conn->connect_error){
	die ("conexion fallida:" . $conn->connect_error);
}


?>
