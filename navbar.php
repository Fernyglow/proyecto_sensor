
<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
}
?>


<body class="bg-muted">
  <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 sidebar">
  <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2"> 
    <a href="#" class="d-flex align-items-center pb-3 mb-3 link-body-emphasis text-decoration-none border-bottom">
      <img src="img/image.png" alt="lzgo" width="70" height="40">
    </a>
    <ul class="list-unstyled ps-0">
     
      <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapse" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">Home</button>
        <div class="collapse show" id="home-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="navbar.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded">regresar al Inicio</a></li>
          </ul>
        </div>
      </li>

      <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapse " data-bs-toggle="collapse" data-bs-target="#usuarios-collapse" aria-expanded="false">usuarios</button>
        <div class="collapse show" id="usuarios-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="list_usuarios.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded">visualizas tabla</a></li>
            <li><a href="nuevo_usuario.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded">agregar nuevo usuario</a></li>
          </ul>
        </div>
      </li>

      <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapse" data-bs-toggle="collapse" data-bs-target="#areas-collapse" aria-expanded="false">areas</button>
        <div class="collapse show" id="areas-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal ph-1 small">
            <li><a href="" class="link-body-emphasis d-inline-flex text-decoration-none rounded">visualizar tabla</a></li>
            <li><a href="nueva_area.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded">agregar nuevo area</a></li>
          </ul>
        </div>
      </li>

      <li class="border-top my-3"></li>
      <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapse" data-bs-toggle="collapse" data-bs-target="#cuenta-collapse" aria-expanded="false">cuenta</button>
        <div class="collapse show" id="cuenta-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal ph-1 small">
            <li><a href="" class="link-body-emphasis d-inline-flex text-decoration-none rounded">hola, <?= $_SESSION['usuario'] ?></a></li>
            <li><a href="logout.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded">cerrar session</a></li>
          </ul> 
        </div>
      </li>
    </ul>
  </div>
 
  
</div>
<script>
function cargar(seccion, push = true) {
    $.ajax({
        url: 'secciones/' + seccion + '.php',
        method: 'GET',
        success: function(data) {
            $('#contenido').html(data);
            if (push) {
                history.pushState({seccion: seccion}, null, seccion);
            }
        },
        error: function(xhr) {
            if (xhr.status === 401) {
                // Sesión no válida, redirigir a login
                window.location.href = 'index.php';
            } else {
                $('#contenido').html('<p>Error al cargar la sección.</p>');
            }
        }
    });
}

// Manejar botón atrás/adelante del navegador
window.onpopstate = function(event) {
    let seccion = location.pathname.substring(1);
    if (!seccion) seccion = 'inicio';
    cargar(seccion, false);
};

// Cargar sección inicial según URL o por defecto
$(document).ready(function() {
    let seccion = location.pathname.substring(1);
    if (!seccion || seccion === '') seccion = 'inicio';
    cargar(seccion, false);
});
</script>

</body>

<script src="js/sidebars.js" class="astro-vvvwv3sm"></script>
 
<script src="js/tema.js"></script> 
<link href="css/sidebars.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
