<?php 
session_start();
if (!isset($_SESSION['usuario'])) {
    header("location: page-login.php");
    exit;
}

include 'conexion.php';

if (isset($_POST['eliminar_id'])) {
    $id = intval($_POST['eliminar_id']);
    $conn->query("DELETE FROM sensores WHERE id = $id");
    exit;
}

if (isset($_POST['query'])) {
    $busqueda = $conn->real_escape_string($_POST['query']);
    $condicion = "WHERE sensores.nombre_sensor LIKE '%$busqueda%' 
                  OR sensores.tipo_sensor LIKE '%$busqueda%' 
                  OR sensores.fechaRegistro LIKE '%$busqueda%'
                  OR areas.nombre_area LIKE '%$busqueda%'
                  OR sensores.estado LIKE '%$busqueda%'";
} 

$sql = "SELECT sensores.id, sensores.nombre_sensor, sensores.tipo_sensor, sensores.fechaRegistro, areas.nombre_area, sensores.estado
        FROM sensores
        INNER JOIN areas ON sensores.area_id = areas.id
        $condicion
        ORDER BY sensores.nombre_sensor ASC";

        $resualtado = $conn->query($sql);

        if (isset($_POST['query'])) {
            if ($resualtado->num_rows > 0) {
                while ($fila = $resualtado->fetch_assoc()) {
                    echo "<tr>
                            <td>{$fila['nombre_sensor']}</td>
                            <td>{$fila['tipo_sensor']}</td>
                            <td>{$fila['fechaRegistro']}</td>
                            <td>{$fila['nombre_area']}</td>
                            <td>{$fila['estado']}</td>
                            <td>
                                <a href='ver_datos_sensor.php?id={$fila['id']}' class='btn btn-success btn-sm content-icon' title='ver'><i class='fa fa-fw fa-eye'></i></a>
                                <a href='actualizar_sensores.php?id={$fila['id']}' class='btn btn-secondary btn-sm content-icon'><i class='fa fa-edit'></i></a>
                                <a class='btn btn-danger btn-sm content-icon' title='eliminar' onclick='eliminarSensor({$fila['id']})'><i class='fa fa-times'></i></a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5' class='text-center text-muted'>No se encontraron resultados</td></tr>";
            }
            exit;
        }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="admin, dashboard">
	<meta name="author" content="DexignZone">
	<meta name="robots" content="index, follow">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Karciz : Ticketing Admin Dashboard Bootstrap 5 Template">
	<meta property="og:title" content="Karciz : Ticketing Admin Dashboard Bootstrap 5 Template">
	<meta property="og:description" content="Karciz : Ticketing Admin Dashboard Bootstrap 5 Template">
	<meta property="og:image" content="https://Karciz.dexignzone.com/xhtml/social-image.png">
    <title>tabla de usuarios</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Datatable -->
    <link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">

</head>

<body>

<?php include 'index.php' ?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">inicio</a></li>
                <li class="breadcrumb-item active"><a href="#">tabla sensores</a></li>
            </ol>
        </div>

        <!-- row -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">tabla de usuarios</h4>
                        <a href="agregar_sensor.php" class="btn btn-primary me-3 mt-2 mt-sm-0"><i class="feather feather-user-plis"></i>agrega nuevo</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px;">
                                <thead>
                                    <tr>
                                        <th>Nom. sensor</th>
                                        <th>tipo de sensor</th>
                                        <th>fecha de registro</th>
                                        <th>area asignada</th>
                                        <th>estado</th>
                                        <th>acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="resultados">
                                    <?php
                                    if ($resualtado->num_rows > 0) {
                                        while ($fila = $resualtado->fetch_assoc()) {
                                            echo "<tr>
                                                    <td>{$fila['nombre_sensor']}</td>
                                                    <td>{$fila['tipo_sensor']}</td>
                                                    <td>{$fila['fechaRegistro']}</td>
                                                    <td>{$fila['nombre_area']}</td>
                                                    <td>{$fila['estado']}</td>
                                                    <td>
                                                        <a href='ver_datos_sensor.php?id={$fila['id']}' class='btn btn-success btn-sm content-icon' title='ver'><i class='fa fa-fw fa-eye'></i></a>
                                                        <a href='actualizar_sensores.php?id={$fila['id']}' class='btn btn-secondary btn-sm content-icon'><i class='fa fa-edit'></i></a>
                                                        <a class='btn btn-danger btn-sm content-icon' title='eliminar' onclick='eliminarSensor({$fila['id']})'><i class='fa fa-times'></i></a>
                                                    </td> 
                                                    </tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='5' class='text-center text-muted'>No se encontraron resultados</td></tr>";
                                    }
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
	<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <!-- Datatable -->

    <script src="js/plugins-init/datatables.init.js"></script>
	<script>
let ultimoTextoBuscado = '';

$(document).ready(function(){
  $('input[type="text"]').on("keyup", function(){
    ultimoTextoBuscado = $(this).val(); // Guardamos el texto
    $.post('', {query: ultimoTextoBuscado}, function(data){
      $('#resultados').html(data);
    });
  });
});

function eliminarSensor(id) {
  if (confirm("¿Seguro que deseas eliminar este usuario?")) {
    $.post('', {eliminar_id: id}, function(){
      $.post('', {query: ultimoTextoBuscado}, function(data){
        $('#resultados').html(data);
      });
    });
  }
}

</script>

</body>
</html>