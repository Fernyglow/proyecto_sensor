

<!DOCTYPE html>
<html lang="en" class="h-100">

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
    <title>KARCIZ - Ticketing Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
	<link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href="#">
											<img src="images/lds1.png" class="img-fluid d-block mx-auto" style="width: 250px;" alt="">
										</a>
									</div>
                                    <?php if (isset($_SESSION['error'])): ?>
                                        <div class="alert alert-danger"><?= $_SESSION['error'] ?></div>
                                        <?php unset($_SESSION['error']); ?>
                                    <?php endif; ?>
                                    <h4 class="text-center mt-4">Inicia session</h4>
                                    <form action="procesar_login.php" method="POST">
                                        <div class="form-group">
                                            <label class="mb-3" for="usuario"><strong>Usuario</strong></label>
                                            <input type="text" id="usuario" name="usuario" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-3" for="contrasena"><strong>contraseña</strong></label>
                                            <input type="password" id="contrasena" name="contrasena" class="form-control" required>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Sign Me In</button>
                                        </div>
                                    </form>
                                </div>
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
    <script src="vendor/global/global.min.js"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/deznav-init.js"></script>
	
    

</body>

</html>