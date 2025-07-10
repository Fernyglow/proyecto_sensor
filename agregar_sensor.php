<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    http_response_code(401);
    header("Location: index.php");
    exit;
}

include 'conexion.php';

$areas = $conn->query("SELECT * FROM areas");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre_sensor"];
    $tipo = $_POST["tipo_sensor"];
    $id_area = $_POST["id_area"];
    $estado = $_POST["estado"];
    $fecharegistro = $_POST["fechaRegistro"];

    $stmt = $conn->prepare("INSERT INTO sensores (nombre_sensor, tipo_sensor, area_id, estado, fechaRegistro) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiss", $nombre, $tipo, $id_area, $estado, $fecharegistro);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        header("Location: tabla_sensores.php");
        exit;
    } else {
        echo "Error al insertar el sensor.";
    }
}
?>

<?php include 'index.php'; ?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">inicio</a></li>
                <li class="breadcrumb-item active"><a href="#">agregar sensores</a></li>
            </ol>
        </div>

        <div class="col-12 d-flex justify-content-center">
            <div class="card container mt-4">
                <div class="card-header">
                    <h4 class="card-title">Nuevo Sensor</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="" method="post">
                            <div class="row">
                                <div class="mb-3 ">
                                    <label class="form-label">Nombre del sensor</label>
                                    <input type="text" name="nombre_sensor" class="form-control" placeholder="Nombre del sensor" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tipo de sensor</label>
                                    <input type="text" name="tipo_sensor" class="form-control" placeholder="Tipo de sensor">
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Área asignada</label>
                                    <select name="id_area" id="id_area" class="default-select form-control wide">
                                        <?php while ($area = $areas->fetch_assoc()): ?>
                                            <option value=" <?= $area['id'] ?>"><?= $area['nombre_area'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">fecha de registro</label>
                                    <input type="date" class="form-control" id="fechaRegistro" name="fechaRegistro" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Estado del sensor</label>
                                    <select name="estado" class="form-control" required>
                                        <option value="Activo" selected>Activo</option>
                                        <option value="No activo">No activo</option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn me-2 btn-primary">Guardar</button>
                                <a href="tabla_sensores.php" class="btn btn-light">Cancelar</a>
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