<?php
include 'conexion.php';
$id = intval($_GET['id']); // Seguridad

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre_sensor"]; 
    $tipo = $_POST["tipo_sensor"];
    $id_area = $_POST['id_area'];
    $estado = $_POST["estado"];

    $stmt = $conn->prepare("UPDATE sensores SET nombre_sensor=?, tipo_sensor=?, area_id=?, estado=? WHERE id=?");
    $stmt->bind_param("ssiii", $nombre, $tipo, $id_area, $estado, $id);
    $stmt->execute();

    header("location: tabla_sensores.php");
    exit();
}

$sensores = $conn->query("SELECT * FROM sensores WHERE id=$id")->fetch_assoc();
$areas = $conn->query("SELECT * FROM areas");
?>

<?php include 'index.php'; ?>

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-title mx-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item"><a href="#">Tabla Sensores</a></li>
                <li class="breadcrumb-item active"><a href="#">Actualizar Sensor</a></li>
            </ol>
        </div>

        <div class="col-12 d-flex justify-content-center">
            <div class="card container mt-4">
                <div class="card-header">
                    <h4 class="card-title">Actualizar Sensor</h4>
                </div>

                <div class="card-body">
                    <div class="basic-form">
                        <form method="POST">
                            <div class="row">
                                <div class="mb-3">
                                    <label class="form-label">Nombre del sensor</label>
                                    <input type="text" name="nombre_sensor" class="form-control" value="<?= htmlspecialchars($sensores['nombre_sensor']) ?>" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 ">
                                    <label class="form-label">Tipo de sensor</label>
                                    <input type="text" name="tipo_sensor" class="form-control" value="<?= htmlspecialchars($sensores['tipo_sensor']) ?>" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 ">
                                    <label class="form-label">Área</label>
                                    <select name="id_area" id="id_area" class="default-select form-control wide">
                                        <option value="" disabled>-- Selecciona un área --</option>
                                        <?php while ($area = $areas->fetch_assoc()): ?>
                                            <option value="<?= $area['id'] ?>" <?= $area['id'] == $sensores['area_id'] ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($area['nombre_area']) ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Estado</label>
                                    <select name="estado" class="default-select form-control wide">
                                        <option value="1" <?= $sensores['estado'] == 1 ? 'selected' : '' ?>>Activo</option>
                                        <option value="0" <?= $sensores['estado'] == 0 ? 'selected' : '' ?>>no activo</option>

                                    </select>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary mt-2">Guardar cambios</button>
                                <button type="submit" class="btn btn-light"><a href="tabla_sensores.php">Cancelar</a></button>
                            </div>
                        </form>
                    </div>
                </div>

            </div> 
        </div>
    </div>
</div>
