<?php
include 'conexion.php';

$area_id = isset($_GET['area_id']) ? intval($_GET['area_id']) : 1;

$sql = "SELECT DISTINCT DATE(t.fecha_hora) AS fecha
        FROM temperatura t
        JOIN sensores s ON t.sensor_id = s.id
        WHERE s.area_id = ?
        ORDER BY fecha DESC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $area_id);
$stmt->execute();
$result = $stmt->get_result();

$fechas = [];
while ($row = $result->fetch_assoc()) {
    $fechas[] = $row['fecha'];
}

header('Content-Type: application/json');
echo json_encode($fechas);
?>
