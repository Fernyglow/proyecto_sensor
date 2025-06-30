
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

<div class="container-fluid">
    <div class="row flex-nowrap">
    <?php include'navbar.php' ?>
<div class="col py-3">
<div class="d-flex justify-content-center align-items-center mt-5">
    <div class="card shadow p-4" style="width: 50rem; height: 50%;">
    <form method="post" class="container mt-4">
	<h4 style="text-align:center;">Registrar area con su sensor</h4><br><br>
	<div class="form-floating mb-3">
	    <input type="text" name="nombre" class="form-control" placeholder="Nombre del sensor" required>
	    <label for="floatingInput">Nombre del sensor</label>
	</div>
	<div class="form-floating mb-3">
	    <input type="text" name="tipo" class="form-control" placeholder="tipo de sensor" required>
	    <label for="floatingInput">tipo de sensor</label>
        </div>
	<div class="form-floating mb-3">
	    <input type="text" name="area" class="form-control" placeholder="nombre del area" required>
	    <label for="floatingInput">Nombre del area</label>
	</div><br>

     <button class="btn btn-secondary">Guardar</button>
     <a href="navbar.html" class="btn btn-outline-secondary">Cancelar</a>
</form>
</div>
</div>
</div>
</div>
</div>
