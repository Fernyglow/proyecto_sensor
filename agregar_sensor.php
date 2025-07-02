<?php
include("conexion.php");


$nombre = $_POST['nombre'];
$tipo = $_POST['tipo'];
$area = trim($_POST['area']);

// Verificar si el área ya existe
$sql = "SELECT id FROM areas WHERE nombre_area = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $area);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    $area_id = $resultado->fetch_assoc()['id'];
} else {
    // Insertar nueva área
    $stmt_insert = $conn->prepare("INSERT INTO areas (nombre_area) VALUES (?)");
    $stmt_insert->bind_param("s", $area);
    $stmt_insert->execute();
    $area_id = $conn->insert_id;
}

// Insertar usuario con teléfono
$stmt_user = $conn->prepare("INSERT INTO sensores (nombre_sensor, tipo_sensor, area_id) VALUES (?, ?, ?)");
$stmt_user->bind_param("ssi", $nombre, $tipo, $area_id);

if ($stmt_user->execute()) {
    header("Location: list_usuarios.php");
    exit();
}

session_start();

if (!isset($_SESSION['usuario'])) {
    http_response_code(401);
    header("Location: index.php");
    exit;
}
?>

<?php include 'index.php' ?>

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">sensor</a></li>
                <li class="breadcrumb-item active"><a href="#">nuevo sensor</a></li>
            </ol>
        </div>

        <div class="col-xl-6 col-log-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">nuevo sensor</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="" method="POST">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">nombre del sensor</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">tipo de sensor</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">area en la que se asignada</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn me-2 btn-primary">Guardar</button>
                                <button type="submit" class="btn btn-light"><a href=""></a>Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>