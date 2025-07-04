<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("location: page-login.php");
    exit;
}

include 'conexion.php';

if (!isset($_GET['id'])) {
    echo "ID no proporcionado.";
    exit;
}

$id = intval($_GET['id']);

$sql = "SELECT sensores.nombre_sensor, sensores.tipo_sensor, sensores.estado, areas.nombre_area
        FROM sensores
        INNER JOIN areas ON sensores.area_id = areas.id
        WHERE sensores.id = $id";

$resultado = $conn->query($sql);

if ($resultado->num_rows == 0) {
    echo "Sensor no encontrado.";
    exit;
}

$sensor = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Detalles del Sensor</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .label { font-weight: bold; }
    .detalle { padding: 10px 0; }
  </style>
</head>
<body class="bg-light">
  <div class="container mt-4">
    <h3 class="mb-4">👁️ Detalles del Sensor</h3>

    <div class="card p-4 shadow-sm">
      <div class="detalle"><span class="label">Nombre del Sensor:</span> <?= htmlspecialchars($sensor['nombre_sensor']) ?></div>
      <div class="detalle"><span class="label">Tipo de Sensor:</span> <?= htmlspecialchars($sensor['tipo_sensor']) ?></div>
      <div class="detalle"><span class="label">Área Asignada:</span> <?= htmlspecialchars($sensor['nombre_area']) ?></div>
      <div class="detalle"><span class="label">Estado:</span> <?= htmlspecialchars($sensor['estado']) ?></div>
    </div>

    <a href="javascript:history.back()" class="btn btn-secondary mt-4">⬅️ Volver</a>
  </div>
</body>
</html>
