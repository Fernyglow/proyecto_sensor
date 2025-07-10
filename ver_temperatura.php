
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Historial de Temperaturas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .scroll-box {
      max-height: 280px;
      overflow-y: auto;
      scrollbar-width: thin;
      scrollbar-color: #888 transparent;
    }
    .scroll-box::-webkit-scrollbar {
      width: 6px;
    }
    .scroll-box::-webkit-scrollbar-thumb {
      background-color: #888;
      border-radius: 4px;
    }
    .fecha-item:hover {
      background-color: #0d6efd;
      color: white;
    }
  </style>
</head>
<body class="">
<?php include 'index.php' ?>

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">sensor</a></li>
                <li class="breadcrumb-item"><a href="">tabla</a></li>
                <li class="breadcrumb-item active"><a href="">detalles sensor</a></li>
            </ol>
        </div>s

        <div class="row">
            <div class="col-xl-4">    
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-intro-title">lista de fechas</h4>
                    </div>
                    <div class="card">
                        <ul id="lista-fechas" class="list-group list-group-flush scroll-box"></ul>
                    </div>
                </div>
            </div>

            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-intro-title">datos</h4>
                        <small id="fecha-titulo" text-light></small>
                    </div>
                    <div class="card-body scroll-box">
                        <ul id="lista-temperaturas" class="list-group list-group-flush">
                            <li class="list-group-item">Seleccione una fecha para ver los datos</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="script.js"></script>

</body>
</html>
<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>