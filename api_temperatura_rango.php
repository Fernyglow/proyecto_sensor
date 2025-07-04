<?php
include 'conexion.php';

$sensor_id = isset($_GET['sensor_id']) ? intval($_GET['sensor_id']) : 1;
$rango = $_GET['rango'] ?? 'todo';

$condicion = "sensor_id = $sensor_id AND DATE(fecha_hora) = CURDATE()";

switch ($rango) {
    case 'ultimos5':
        $sql = "SELECT fecha_hora, valor FROM temperatura WHERE $condicion ORDER BY fecha_hora DESC LIMIT 5";
        break;
    case '1hora':
        $sql = "SELECT fecha_hora, valor FROM temperatura 
                WHERE $condicion AND fecha_hora >= NOW() - INTERVAL 1 HOUR 
                ORDER BY fecha_hora ASC";
        break;
    case 'todo':
    default:
        $sql = "SELECT fecha_hora, valor FROM temperatura WHERE $condicion ORDER BY fecha_hora ASC";
        break;
}

$result = $conn->query($sql);
$data = [];

while ($row = $result->fetch_assoc()) {
    $data[] = [
        'fecha' => $row['fecha_hora'],
        'valor' => round($row['valor'], 1)
    ];
}

header('Content-Type: application/json');
echo json_encode($data);
