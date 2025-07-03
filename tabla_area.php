
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
                                        <th>Nom. sensor</th>
                                        <th>tipo de sensor</th>
                                        <th>area asignada</th>
                                        <th>estado</th>
                                        <th>acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="resultados">
                                    
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
	

</body>
</html>