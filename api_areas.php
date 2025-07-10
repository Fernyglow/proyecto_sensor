<?php
include 'conexion.php';

$sql = "SELECT id AS id_area, nombre_area AS nombre FROM areas ORDER BY nombre_area";
$result = $conn->query($sql);

$areas = [];
while ($row = $result->fetch_assoc()) {
    $areas[] = $row;
}

header('Content-Type: application/json');
echo json_encode($areas);
?>
