
<?php 
session_start();
if (!isset($_SESSION['usuario'])) {
	header("location: page-login.php");
	exit;
}
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="admin, dashboard">
	<meta name="author" content="DexignZone">
	<meta name="robots" content="index, follow">
    <title>linea digital </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/lds1.png">
	<link href="vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">

</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.php" class="brand-logo">
                <img src="images/lds1.png" class="img-fluid" alt="">
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
      
		<!--**********************************
            Chat box End
        ***********************************-->
		
		<!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
                                panel
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
							<li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell dz-theme-mode active" href="javascript:void(0);">
									<i id="icon-light" class="far fa-sun"></i>
                                    <i id="icon-dark" class="far fa-moon"></i>
                                </a>
							</li>
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link"  href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
									<img src="" width="20" alt="">
									<div class="header-info">
										<span><?= $_SESSION['usuario'] ?><i class="fa fa-caret-down ms-3" aria-hidden="true"></i></span>
									</div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="app-profile.html" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="ms-2">perfil </span>
                                    </a>
                                   <!--- <a href="email-inbox.html" class="dropdown-item ai-icon">
                                        <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                        <span class="ms-2">Inbox </span>
                                    </a> -->
                                    <a href="logout.php" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ms-2">cerrar session </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
				<ul class="metismenu" id="menu">
                    <li>
						<a class="has-arrow ai-icon"  href="javascript:void(0);" aria-expanded="false">
							<i class="flaticon-layout"></i>
							<span class="nav-text">Inicio</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="index.php">Inicio</a></li>
						</ul>
                    </li>
					<li>
						<a class="has-arrow ai-icon"  href="javascript:void(0);" aria-expanded="false">
							<i class="flaticon-381-diploma"></i>
							<span class="nav-text">usuarios</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="agregar_usuario.php">agregar usuarios</a></li>
							<li><a href="tabla_usuario.php">usuarios</a></li>
						</ul>
                    </li>

					<li>
						<a class="has-arrow ai-icon" href="javascript:void(0);" aria-expanded="false">
							<i class="flaticon-381-id-card-4"></i>
							<span class="nav-text">sensores</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="agregar_sensor.php">agregar sensores</a></li>
							<li><a href="tabla_sensores.php">tabla sensores</a></li>
						</ul>
                    </li>
                
                    <li>
						<a class="has-arrow ai-icon"  href="javascript:void(0);" aria-expanded="false">
							<i class="flaticon-381-diploma"></i>
							<span class="nav-text">areas</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="agregar_areas.php">agregar area</a></li>
							<li><a href="tabla_usuario.php">areas</a></li>
						</ul>
                    </li>

                    <li>
						<a class="has-arrow ai-icon"  href="javascript:void(0);" aria-expanded="false">
						<i class="flaticon-monitor"></i>
							<span class="nav-text">Estado</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="grafica_temperatura.php">grafica en tiempo real</a></li>
							 <li><a href="ver_temperatura.php">historial de hoy</a></li>
                            <li><a href="nose.php">temperatura actual</a></li>
                        </ul>
                    </li>
                </ul>
			</div>
        </div>
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
	
	<script src="vendor/chart.js/Chart.bundle.min.js"></script>
	<script src="vendor/owl-carousel/owl.carousel.js"></script>
	<!-- Apex Chart -->
	<script src="vendor/apexchart/apexchart.js"></script>
	<!-- Dashboard 1 -->
	<script src="js/deznav-init.js"></script>
	<script src="js/custom.min.js"></script>
	<script src="js/dashboard/dashboard-1.js"></script>
	
    
	
</body>
</html>