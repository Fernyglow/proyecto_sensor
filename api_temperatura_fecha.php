<?php
include 'conexion.php';

$area_id = isset($_GET['area_id']) ? intval($_GET['area_id']) : 1;
$fecha = $_GET['fecha'] ?? date('Y-m-d');

$sql = "SELECT DATE_FORMAT(t.fecha_hora, '%H:%i') as hora, t.valor
        FROM temperatura t
        JOIN sensores s ON t.sensor_id = s.id
        WHERE s.area_id = ? 
        AND t.fecha_hora BETWEEN ? AND DATE_ADD(?, INTERVAL 1 DAY)
        ORDER BY t.fecha_hora ASC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("iss", $area_id, $fecha, $fecha);
$stmt->execute();
$result = $stmt->get_result();

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

header('Content-Type: application/json');
echo json_encode($data);
?>
