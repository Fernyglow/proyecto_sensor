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

$sql = "SELECT usuarios.nombre_user, usuarios.apellido_user, usuarios.telefono, usuarios.fechaRegistro, areas.nombre_area
        FROM usuarios
        INNER JOIN areas ON usuarios.area_id = areas.id
        WHERE usuarios.id = $id";

$resultado = $conn->query($sql);

if ($resultado->num_rows == 0) {
    echo "usuario no encontrado.";
    exit;
}

$usuarios = $resultado->fetch_assoc();
?>



<?php include 'index.php' ?>


<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">usuarios</a></li>
                <li class="breadcrumb-item"><a href="">tabla</a></li>
                <li class="breadcrumb-item active"><a href="">detalles usuarios</a></li>
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
                                    <div class="detalle"><span class="fw-bold">nombre del usuario:</span> <?= htmlspecialchars($usuarios['nombre_user']) ?></div>
                                </div>              
                            </div>
                            <div class="row">
                                <div class="mb-3">
                                    <div class="detalle"><span class="fw-bold">apellido completo:</span> <?= htmlspecialchars($usuarios['apellido_user']) ?></divdiv>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3">
                                    <div class="detalle"><span class="fw-bold">telefono:</span> <?= htmlspecialchars($usuarios['telefono']) ?></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3">
                                    <div class="detalle"><span class="fw-bold">fecha de registro:</span> <?= htmlspecialchars($usuarios['fechaRegistro']) ?></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3">
                                    <div class="detalle"><span class="fw-bold">area asignada:</span> <?= htmlspecialchars($usuarios['nombre_area']) ?></div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <button class=""><a href="tabla_area.php">volver</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>