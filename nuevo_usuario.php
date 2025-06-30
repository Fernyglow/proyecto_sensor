<?php

include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre_user'];
    $telefono = $_POST['telefono'];
    $id_area = $_POST['id_area'];

    $conn->query("INSERT INTO usuarios (nombre_user, telefono, area_id) VALUES ('$nombre', '$telefono', '$id_area')");
    header("Location: list_usuarios.php");
    exit();
}

$areas = $conn->query("SELECT * FROM areas");
?>


<div class="container-fluid">
    <div class="row flex-nowrap">
    <?php include'navbar.php' ?>

<div class="col py-3">
<div class="d-flex justify-content-center align-items-center mt-5">
<div class="card shadow p-4" style="width: 50rem; height: 50%;"> 
<form method="post" class="container mt-4">
    <h4 style="text-align: center;">Registrar Nuevo Usuario</h4><br><br>
    <div class="form-floating mb-3">
        <input type="text" name="nombre_user" class="form-control" placeholder="Nombre del usuario" required>
    	<label for="floatingInput">nombre del usuario</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" name="telefono" class="form-control" placeholder="Teléfono"  pattern="\d{10}" minligth="10" maxligth="10" required>
   	<label for"floatingInput">numero de telfono (10 digitos)</label>
    </div>
    <div class="mb-3">
        <select name="id_area" class="form-select" required>
            <option value="">Selecciona un área</option>
            <?php while ($area = $areas->fetch_assoc()): ?>
                <option value="<?= $area['id'] ?>"><?= $area['nombre_area'] ?></option>
            <?php endwhile; ?>
        </select>
    </div><br>
    <button class="btn btn-secondary">Guardar</button>
    <a href="navbar.html" class="btn btn-outline-secondary">Cancelar</a>
</form>
</div>
</div>
</div>
</div>
</div>

