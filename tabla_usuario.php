<?php
include 'conexion.php';

// Eliminar usuario por AJAX
if (isset($_POST['eliminar_id'])) {
    $id = intval($_POST['eliminar_id']);
    $conn->query("DELETE FROM usuarios WHERE id = $id");
    exit;
}

// Consultar usuarios (todos o filtrados)
$condicion = "";
if (isset($_POST['query'])) {
    $busqueda = $conn->real_escape_string($_POST['query']);
    $condicion = "WHERE usuarios.nombre_user LIKE '%$busqueda%' 
                  OR usuarios.apellido_user LIKE '%$busqueda%' 
                  OR usuarios.telefono LIKE '%$busqueda%' 
                  OR areas.nombre_area LIKE '%$busqueda%'";
}

$sql = "SELECT usuarios.id, usuarios.nombre_user, usuarios.apellido_user, usuarios.telefono, areas.nombre_area
        FROM usuarios
        INNER JOIN areas ON usuarios.area_id = areas.id
        $condicion
        ORDER BY usuarios.nombre_user ASC";

$resultado = $conn->query($sql);

// Si es AJAX, solo regresamos las filas
if (isset($_POST['query'])) {
    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>
                    <td>{$fila['nombre_user']}</td>
                    <td>{$fila['apellido_user']}</td>
                    <td>{$fila['telefono']}</td>
                    <td>{$fila['nombre_area']}</td>
                    <td>
                        <a href='#' class='btn btn-success btn-sm content-icon'><i class='fa fa-fw fa-eye'></i></a>
                        <a href='editar_user.php?id={$fila['id']}' class='btn btn-secondary btn-sm content-icon'><i class='fa fa-edit'></i></a>
                        <a class='btn btn-danger btn-sm content-icon'  title='eliminar' onclick='eliminarUsuario({$fila['id']})'><i class='fa fa-times'></i></a>
                    </td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='4' class='text-center text-muted'>No se encontraron resultados</td></tr>";
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
                <li class="breadcrumb-item"><a href="javascript:void(0)">tabla</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">datos</a></li>
            </ol>
        </div>

        <!-- row -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">tabla de usuarios</h4>
                        <a href="agregar_usuario.php" class="btn btn-primary me-3 mt-2 mt-sm-0"><i class="feather feather-user-plis"></i>agrega nuevo</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px;">
                                <thead>
                                    <tr>
                                        <th>nombre</th>
                                        <th>apellido</th>
                                        <th>telefono</th>
                                        <th>area</th>
                                        <th>acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="resultados">
                                     <?php
                                     // Mostrar todos los usuarios al cargar
                                    if ($resultado->num_rows > 0) {
                                        while ($fila = $resultado->fetch_assoc()) {
                                            echo "<tr>
                                                <td>{$fila['nombre_user']}</td>
                                                <td>{$fila['apellido_user']}</td>
                                                <td>{$fila['telefono']}</td>
                                                <td>{$fila['nombre_area']}</td>
                                                <td>
                                                <a href='#' class='btn btn-success btn-sm content-icon'><i class='fa fa-fw fa-eye'></i></a>
                                                 <a href='editar_user.php?id={$fila['id']}' class='btn btn-secondary btn-sm content-icon'><i class='fa fa-edit'></i></a>
                                                <a class='btn btn-danger btn-sm content-icon'  title='eliminar' onclick='eliminarUsuario({$fila['id']})'><i class='fa fa-times' title='eliminar'></i></a>
                                                </td>
                                             
                                                </tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='4' class='text-center text-muted'>No hay usuarios registrados</td></tr>";
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

function eliminarUsuario(id) {
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