<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    http_response_code(401);
    header("Location: index.php");
    exit;
}

include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $area = trim($_POST['area']);
    $estado = $_POST['estado']; // ahora es texto: 'Activo' o 'No activo'

    // Verificar si el área ya existe
    $sql = "SELECT id FROM areas WHERE nombre_area = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $area);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $area_id = $resultado->fetch_assoc()['id'];
    } else {
        $stmt_insert = $conn->prepare("INSERT INTO areas (nombre_area) VALUES (?)");
        $stmt_insert->bind_param("s", $area);
        if ($stmt_insert->execute()) {
            $area_id = $conn->insert_id;
        } else {
            die("Error al insertar área: " . $stmt_insert->error);
        }
    }

    // Insertar el sensor con estado como texto
    $stmt_user = $conn->prepare("INSERT INTO sensores (nombre_sensor, tipo_sensor, area_id, estado) VALUES (?, ?, ?, ?)");
    $stmt_user->bind_param("ssis", $nombre, $tipo, $area_id, $estado);

    if ($stmt_user->execute()) {
        header("Location: tabla_area.php");
        exit();
    } else {
        echo "Error al insertar sensor: " . $stmt_user->error;
    }
}
?>

<?php include 'index.php'; ?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Sensor</a></li>
                <li class="breadcrumb-item active"><a href="#">Agregar</a></li>
            </ol>
        </div>

        <div class="col-12 d-flex justify-content-center">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Nuevo Sensor</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="" method="post">
                            <div class="row">
                                <div class="mb-3 ">
                                    <label class="form-label">Nombre del sensor</label>
                                    <input type="text" name="nombre" class="form-control" placeholder="Nombre del sensor" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tipo de sensor</label>
                                    <input type="text" name="tipo" class="form-control" placeholder="Tipo de sensor">
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3">
                                    <label class="form-label">Área asignada</label>
                                    <input type="text" name="area" class="form-control" placeholder="Área" required>
                                </div>
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
                                <a href="tabla_area.php" class="btn btn-light">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
