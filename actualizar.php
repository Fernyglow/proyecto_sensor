<?php
include 'conexion.php';

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$id_area = $_POST['id_area'];

$sql = "UPDATE usuarios 
        SET nombre_user='$nombre', telefono='$telefono', area_id='$id_area' 
        WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  echo "Usuario actualizado correctamente.<br>";
  echo "<a href='editar_user.php'>Volver</a>";
} else {
  echo "Error al actualizar: " . $conn->error;
}
?>
