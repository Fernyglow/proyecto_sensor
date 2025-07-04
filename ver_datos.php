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
<?php include 'index.php' ?>

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">sensor</a></li>
                <li class="breadcrumb-item"><a href="">tabla</a></li>
                <li class="breadcrumb-item active"><a href="">detalles sensor</a></li>
            </ol>
        </div>

        <div class="col-12 d-flex justify-content-center">
            <div class="card container mt-4">
                <div class="card-header">
                    <h4 class="card-title">detalles</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <div class="">
                            <div class="row">
                                <div class="mb-3">
                                    <div class="detalle"><span class="fw-bold">Nombre del Sensor:</span><?= htmlspecialchars($sensor['nombre_sensor']) ?></div>
                                </div>              
                            </div>
                            <div class="row">
                                <div class="mb-3">
                                    <div class="detalle"><span class="fw-bold">Tipo de Sensor:</span> <?= htmlspecialchars($sensor['tipo_sensor']) ?></divdiv>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3">
                                    <div class="detalle"><span class="fw-bold">Área Asignada:</span> <?= htmlspecialchars($sensor['nombre_area']) ?></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3">
                                    <div class="detalle"><span class="fw-bold">Estado:</span> <?= htmlspecialchars($sensor['estado']) ?></div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <button class=""><a href="tabla_usuario.php">volver</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>