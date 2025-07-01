
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


<div class="container-fluid">
    <div class="row flex-nowrap">
    <?php include 'index.php' ?>
<div class="col py-3">
<div class="d-flex justify-content-center align-items-center mt-5">
<div class="card shadow p-4" style="width: 50rem; height: 50%;">
<form method="post" class="container mt-4">
    <h2>Editar Usuario</h2>
    <div class="mb-3">
        <input type="text" name="nombre_user" class="form-control" value="<?= $usuario['nombre_user'] ?>" required>
    </div>
    <div class="mb-3">
        <input type="text" name="telefono" class="form-control" value="<?= $usuario['telefono'] ?>" pattern="\d{10}" minligth="10" maxligth="10" required>
    </div>
    <div class="mb-3">
        <select name="id_area" class="form-select" required>
            <?php while ($area = $areas->fetch_assoc()): ?>
                <option value="<?= $area['id'] ?>" <?= $area['id'] == $usuario['id_area'] ? 'selected' : '' ?>>
                    <?= $area['nombre_area'] ?>
                </option>
            <?php endwhile; ?>
        </select>
    </div>
    <br>
    <button class="btn btn-secondary">Guardar cambios</button>
    <a href="navbar.html" class="btn btn-outline-secondary">Cancelar</a>
</form>
</div>
</div>
</div>
</div>




