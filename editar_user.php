<?php

include 'conexion.php';
$id = $_GET['id'];

// Si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre_user'];
    $telefono = $_POST['telefono'];
    $id_area = $_POST['id_area'];
    
    $conn->query("UPDATE usuarios SET nombre_user='$nombre', telefono='$telefono', area_id='$id_area' WHERE id=$id");
    header("Location: list_usuario.php");
    exit();
}

// Obtener datos del usuario actual
$usuario = $conn->query("SELECT * FROM usuarios WHERE id=$id")->fetch_assoc();
$areas = $conn->query("SELECT * FROM areas");
?>

<?php include 'index.php' ?>

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">usuario</a></li>
                <li class="breadcrumb-item active"><a href="#">Editar</a></li>
            </ol>
        </div>

        <div class="col-xl-6 col-log-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">actualiza el usuario</h4>
                </div>

                <div class="card-body">
                    <div class="basic-form">
                        <form action="" method="POST">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">nombre</label>
                                    <input type="text" name="nombre_user" class="form-control" value="<?= $usuario['nombre_user'] ?>" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">apellido</label>
                                    <input type="text" name="apellido_user" class="form-control" value="<?= $apellido['apellido_user'] ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">telefono</label>
                                   <input type="text" name="telefono" class="form-control" value="<?= $usuario['telefono'] ?>" pattern="\d{10}" minligth="10" maxligth="10" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form label">area</label>
                                    <select name="id_area"  id="inputState" class="default-select form-control wide" required>
                                        <?php while ($area = $areas->fetch_assoc()): ?>
                                            <option value="<?= $area['id'] ?>" <?= $area['id'] == $usuario['id_area'] ? 'selected' : '' ?>>
                                                <?= $area['nombre_area'] ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn me-2 btn-primary">Guardar</button>
                                <button type="submit" class="btn btn-light">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>