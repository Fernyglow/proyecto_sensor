<?php
session_start();
$conexion = new mysqli("localhost", "root", "fercho2005", "temperatura");

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$resultado = $conexion->query("SELECT * FROM users WHERE usuario = '$usuario'");

if ($resultado && $resultado->num_rows === 1) {
    $fila = $resultado->fetch_assoc();
    if (password_verify($contrasena, $fila['contrasena'])) {
        $_SESSION['usuario'] = $usuario;
        header("Location: index.php");
        exit;
    }
}

$_SESSION['error'] = "Usuario o contraseña incorrectos.";
header("Location: page-login.php");
?>
