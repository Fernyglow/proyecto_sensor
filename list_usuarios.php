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
                  OR usuarios.telefono LIKE '%$busqueda%' 
                  OR areas.nombre_area LIKE '%$busqueda%'";
}

$sql = "SELECT usuarios.id, usuarios.nombre_user, usuarios.telefono, areas.nombre_area
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
                    <td>{$fila['telefono']}</td>
                    <td>{$fila['nombre_area']}</td>
                    <td>
                        <a href='editar.php?id={$fila['id']}'><i class='bi bi-pencil-square me-2 '></i></a>
                        <a><i class='bi bi-trash ' title='eliminar' onclick='eliminarUsuario({$fila['id']})'></i></a>
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
<html>
<head>
  <meta charset="UTF-8">
  <title>Buscar y Administrar Usuarios</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>


<div class="container-fluid">
  <div class="row flex-nowrap">
  <?php include 'navbar.php' ?>
  
<div class="col py-3">
  <h4 >Listado de Usuarios</h4><br>
  <div class="mb-3 d-flex justify-content-between align-items-center">
    <form class="d-flex" method="get">
      <input type="text" id="busqueda" class="form-control me-2" placeholder="Buscar por nombre, teléfono o área..." autocomplete="off">
    </form>
  </div>
<br>
  <table class="table table-bordered table-hover">
    <thead class="">
      <tr>
        <th>Nombre</th>
        <th>Teléfono</th>
        <th>Área</th>
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
                      <td>{$fila['telefono']}</td>
                      <td>{$fila['nombre_area']}</td>
                      <td>
                          <a href='editar.php?id={$fila['id']}' title='editar'><i class='bi bi-pencil-square me-2  '></i></a>
                          <a href=''><i class='bi bi-trash  ' title='eliminar' onclick='eliminarUsuario({$fila['id']})'></i></a>
                      </td>
                    </tr>";
          }
      } else {
          echo "<tr><td colspan='4' class='text-center text-muted'>No hay usuarios registrados</td></tr>";
      }
      ?>
    </tbody>
  </table>


<script>
$(document).ready(function(){
  $('#busqueda').on("keyup", function(){
    let texto = $(this).val();
    $.post('', {query: texto}, function(data){
      $('#resultados').html(data);
    });
  });
});

// Eliminar usuario con confirmación
function eliminarUsuario(id) {
  if (confirm("¿Seguro que deseas eliminar este usuario?")) {
    $.post('', {eliminar_id: id}, function(){
      $('#busqueda').keyup(); // Recarga la búsqueda actual
    });
  }
}
</script>
</div>
</div>
</div>
  
</body>
</html>