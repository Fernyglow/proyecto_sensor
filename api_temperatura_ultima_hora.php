<?php
include 'conexion.php';

$area_id = isset($_GET['area_id']) ? intval($_GET['area_id']) : 1;

$sql = "SELECT t.fecha_hora, t.valor
        FROM temperatura t
        INNER JOIN sensores s ON t.sensor_id = s.id
        WHERE s.area_id = ?
          AND DATE(t.fecha_hora) = CURDATE()
          AND t.fecha_hora >= NOW() - INTERVAL 1 HOUR
        ORDER BY t.fecha_hora ASC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $area_id);
$stmt->execute();
$result = $stmt->get_result();

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = [
        'fecha' => date('H:i', strtotime($row['fecha_hora'])),
        'valor' => round($row['valor'], 1)
    ];
}

header('Content-Type: application/json');
echo json_encode($data);
?>
