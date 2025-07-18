
<?php 
session_start();
if (!isset($_SESSION['usuario'])) {
	header("location: page-login.php");
	exit;
}
?>
<?php

include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre_user'];
    $apelido_user = $_POST ['apellido_user'];
    $telefono = $_POST['telefono'];
    $fecharegistro = $_POST['fechaRegistro'];
    $id_area = $_POST['id_area'];

    $conn->query("INSERT INTO usuarios (nombre_user, apellido_user, telefono, fechaRegistro, area_id) VALUES ('$nombre', '$apelido_user', '$telefono', '$fecharegistro', '$id_area')");
    header("Location: tabla_usuario.php");
    exit();
}

$areas = $conn->query("SELECT * FROM areas");
?>


<?php include 'index.php' ?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">inicio</a></li>
                <li class="breadcrumb-item active"><a href="#">agregar usuarios</a></li>
            </ol>
        </div>

        <!-- row -->
        <div class="col-12 d-flex justify-content-center">
            <div class="card container mt-4">
                <div class="card-header">
                    <h4 class="card-title">nuevo usuario</h4>

                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="" method="post" >
                            <div class="row ">
                                <div class="mb-3">
                                    <label class="form-label">nombre completo</label>
                                    <input type="text" name="nombre_user" class="form-control" placeholder="Nombre del usuario" required>
                                </div>
                                <div class="mb-3 ">
                                    <label class="form-label">apellidos</label>
                                    <input type="text" name="apellido_user" class="form-control" placeholder="apellidos">
                                </div> 
                            </div>

                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">telefono</label>
                                   <input type="text" name="telefono" class="form-control" placeholder="Teléfono"  pattern="\d{10}" minligth="10" maxligth="10" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">fecha registro</label>
                                    <input type="date" class="form-control" id="fechaRegistro" name="fechaRegistro" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Area asignada</label>
                                    <select id="id_area" name="id_area" class="default-select form-control wide" required>
                                        <?php while ($area = $areas->fetch_assoc()): ?>
                                            <option value="<?= $area['id'] ?>"><?= $area['nombre_area'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn me-2 btn-primary">Guardar</button>
                                <a href="tabla_usuario.php" class="btn btn-light">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <script>
        // Este script se ejecuta cuando el DOM está completamente cargado
        document.addEventListener('DOMContentLoaded', function() {
            // Obtenemos una referencia al campo de fecha
            const fechaRegistroInput = document.getElementById('fechaRegistro');

            // Obtenemos la fecha actual
            const today = new Date();

            // Extraemos el año, mes y día
            const year = today.getFullYear();
            // getMonth() devuelve 0 para Enero, 1 para Febrero, ..., 11 para Diciembre.
            // Por eso, sumamos 1 y usamos padStart para que siempre tenga 2 dígitos (ej., '07').
            const month = String(today.getMonth() + 1).padStart(2, '0');
            // getDate() devuelve el día del mes (1-31). Usamos padStart para 2 dígitos.
            const day = String(today.getDate()).padStart(2, '0');

            // Formateamos la fecha en el formato YYYY-MM-DD, que es lo que espera input type="date"
            const formattedDate = `${year}-${month}-${day}`;

            // Asignamos la fecha formateada al valor del campo de input
            fechaRegistroInput.value = formattedDate;
        });
    </script>

<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>