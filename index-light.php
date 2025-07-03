
<?php 
session_start();
if (!isset($_SESSION['usuario'])) {
	header("location: page-login.php");
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
    <title>KARCIZ - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
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
            <a href="index.html" class="brand-logo">   
				<svg class="logo-abbr" width="58" height="58" viewBox="0 0 58 58" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
					<g filter="url(#filter0_d_2_3)">
					<rect x="4" width="50" height="50" fill="url(#pattern0)" shape-rendering="crispEdges"/>
					</g>
					<rect class="inner-svg" x="20.816" y="6.30162" width="30.9845" height="22.1987" rx="5" transform="rotate(28.9493 20.816 6.30162)" fill="var(--primary)"/>
					<defs>
					<filter id="filter0_d_2_3" x="0" y="0" width="58" height="58" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
					<feFlood flood-opacity="0" result="BackgroundImageFix"/>
					<feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
					<feOffset dy="4"/>
					<feGaussianBlur stdDeviation="2"/>
					<feComposite in2="hardAlpha" operator="out"/>
					<feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
					<feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_2_3"/>
					<feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2_3" result="shape"/>
					</filter>
					<pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
					<use xlink:href="#image0_2_3" transform="scale(0.02)"/>
					</pattern>
					<image id="image0_2_3" width="50" height="50" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAMAAAAp4XiDAAAAn1BMVEUAAABoeIcvMztoeI9leY0vNT0vNj4vNj0uNT0yNz4uNj0wMEAvNT0vNj0vNj1leY4vNj1leI4uNDswNDwyOkJmeY5OXWsuNz0wNTwtMz1wcI8TtJcvNj1leY0WpIwrRkgsRUhfcoQhdWodhXUehHVIVmMkZV81PkclZV8uPUIYnIZRYG9DT1spTU4nWlcalYFabH4bjXoibWQffXA5QkzhcDVDAAAAG3RSTlMAICAg35/f32AwfxDvv8/Pr4hwQO/f37CQUBBu7tyQAAABkElEQVRIx8WU3XqCMAyGHU5FQN3c/0qroIioOHW7/2vbiJJW+hN2sr1HCnmf9AuQzn/h/a48nI6iOB732mvDfnwhCFsaUYwM/FYhoIeUPFrpxUCBEhnJg7Jyw0RaO1HgVkZV0VywH8S6VSQfSj7ZmeO8lu7sp+tDE4Ys51SkAO4u0SBOh9nX7AqxR+nNNmDBAPJ0ssmJ6aQoBabssokx0jjUBgzZTVJZz1saYXPAtkgPjQF/MAcplIxcA9YbQVGoDdjFrCoaXpRx9SdlBHs1TKsmIoYuSpSCEazgvanjRzgvqknv6tsq3Scrr7fB9PzJuwawgBJfffjAbOGe8MC0v/bC9ex985ZcCSI74sEbYDvdCu542pf8gtKxYWzg8qtpK9lOB9kfPfOWQSkVzQE/21b/To8koEl+a1G6PPlCaaMO+GBXON/mMhJm33G7UpHFKC1OBfxICIUnEEkh404FOOSqkXNagUjSSGgFSC6RiizhlCKlbbbLtiAQisYfKpOOhYlVubcp3SfS0Lkx8q5UfAP40JjB1o/rdgAAAABJRU5ErkJggg=="/>
					</defs>
				</svg>
				<svg width="53" height="42" class="brand-title" viewBox="0 0 53 42" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M1 7.5C1 14.833 1.056 15 3.5 15C5.4 15 6 14.478 6 12.826V10.651L8.314 12.826C9.717 14.143 11.918 15 13.898 15H17.168L13.998 10.997L10.827 6.994L13.569 3.747L16.311 0.5L13.119 0.184C10.757 -0.05 9.426 0.47 7.997 2.184L6.067 4.5L6.033 2.25C6.008 0.526 5.416 0 3.5 0C1.056 0 1 0.167 1 7.5ZM20.197 6.821C17.482 15.25 17.473 15 20.5 15C21.875 15 23 14.55 23 14C23 13.45 24.35 13 26 13C27.65 13 29 13.45 29 14C29 14.55 30.319 15 31.931 15H34.863L32.341 7.5L29.819 0H26.106C22.4 0 22.39 0.0120001 20.197 6.821ZM37 7.5V15H40C42.533 15 43 14.611 43 12.5C43 9.295 44.358 9.295 45.818 12.5C46.671 14.373 47.724 15 50.014 15C52.795 15 52.971 14.814 51.962 12.929C51.181 11.47 51.158 9.984 51.885 7.901C53.854 2.252 51.198 0 42.566 0H37V7.5ZM46.5 5C46.84 5.55 46.191 6 45.059 6C43.927 6 43 5.55 43 5C43 4.45 43.648 4 44.441 4C45.234 4 46.16 4.45 46.5 5ZM26.588 8.745C25.496 9.837 24.747 8.1 25.531 6.293C26.275 4.58 26.329 4.581 26.743 6.328C26.982 7.334 26.912 8.421 26.588 8.745ZM5 26.709C1.632 27.948 0 30.378 0 34.155C0 39.324 2.729 42 8 42C11.883 42 16 39.427 16 37C16 35.639 10.671 35.729 9.287 37.113C7.6 38.8 6 37.239 6 33.907V30.931L11 31.594C15.825 32.234 16.792 31.733 15.235 29.4C13.419 26.68 8.556 25.402 5 26.709ZM19 28.456C19 30.333 19.524 31 21 31C22.556 31 23 31.667 23 34C23 36.333 22.556 37 21 37C19.524 37 19 37.667 19 39.544C19 42.062 19.073 42.085 26.25 41.794C32.735 41.531 33.5 41.289 33.5 39.5C33.5 38.187 32.727 37.39 31.25 37.18C29.515 36.934 29 36.206 29 34C29 31.794 29.515 31.066 31.25 30.82C32.727 30.61 33.5 29.813 33.5 28.5C33.5 26.711 32.735 26.469 26.25 26.206C19.073 25.915 19 25.938 19 28.456ZM37.708 26.626C37.318 27.015 37 28.158 37 29.167C37 30.562 37.764 31 40.196 31H43.392L40.196 34.298C38.438 36.111 37 38.586 37 39.798C37 41.872 37.437 42 44.5 42C51.833 42 52 41.944 52 39.5C52 37.3 51.571 37 48.429 37H44.858L48.512 33.553C53.966 28.41 53.073 26.571 44.947 26.209C41.355 26.049 38.097 26.237 37.708 26.626Z" fill="black"/>
				</svg>
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>

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
							<li class="nav-item">
								<div class="input-group search-area ms-auto d-inline-flex">
									<input type="text" class="form-control" placeholder="Search here">
									<div class="input-group-append">
										<button type="button" class="input-group-text"><i class="flaticon-381-search-2"></i></button>
									</div>
								</div>
							</li>
							<li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell dz-theme-mode" href="javascript:void(0);">
									<i id="icon-light" class="far fa-sun"></i>
                                    <i id="icon-dark" class="far fa-moon"></i>
                                </a>
							</li>
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link  ai-icon"  href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                    <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M21.75 14.8385V12.0463C21.7471 9.88552 20.9385 7.80353 19.4821 6.20735C18.0258 4.61116 16.0264 3.61555 13.875 3.41516V1.625C13.875 1.39294 13.7828 1.17038 13.6187 1.00628C13.4546 0.842187 13.2321 0.75 13 0.75C12.7679 0.75 12.5454 0.842187 12.3813 1.00628C12.2172 1.17038 12.125 1.39294 12.125 1.625V3.41534C9.97361 3.61572 7.97429 4.61131 6.51794 6.20746C5.06159 7.80361 4.25291 9.88555 4.25 12.0463V14.8383C3.26257 15.0412 2.37529 15.5784 1.73774 16.3593C1.10019 17.1401 0.751339 18.1169 0.75 19.125C0.750764 19.821 1.02757 20.4882 1.51969 20.9803C2.01181 21.4724 2.67904 21.7492 3.375 21.75H8.71346C8.91521 22.738 9.45205 23.6259 10.2331 24.2636C11.0142 24.9013 11.9916 25.2497 13 25.2497C14.0084 25.2497 14.9858 24.9013 15.7669 24.2636C16.548 23.6259 17.0848 22.738 17.2865 21.75H22.625C23.321 21.7492 23.9882 21.4724 24.4803 20.9803C24.9724 20.4882 25.2492 19.821 25.25 19.125C25.2486 18.117 24.8998 17.1402 24.2622 16.3594C23.6247 15.5786 22.7374 15.0414 21.75 14.8385ZM6 12.0463C6.00232 10.2113 6.73226 8.45223 8.02974 7.15474C9.32723 5.85726 11.0863 5.12732 12.9212 5.125H13.0788C14.9137 5.12732 16.6728 5.85726 17.9703 7.15474C19.2677 8.45223 19.9977 10.2113 20 12.0463V14.75H6V12.0463ZM13 23.5C12.4589 23.4983 11.9316 23.3292 11.4905 23.0159C11.0493 22.7026 10.716 22.2604 10.5363 21.75H15.4637C15.284 22.2604 14.9507 22.7026 14.5095 23.0159C14.0684 23.3292 13.5411 23.4983 13 23.5ZM22.625 20H3.375C3.14298 19.9999 2.9205 19.9076 2.75644 19.7436C2.59237 19.5795 2.50014 19.357 2.5 19.125C2.50076 18.429 2.77757 17.7618 3.26969 17.2697C3.76181 16.7776 4.42904 16.5008 5.125 16.5H20.875C21.571 16.5008 22.2382 16.7776 22.7303 17.2697C23.2224 17.7618 23.4992 18.429 23.5 19.125C23.4999 19.357 23.4076 19.5795 23.2436 19.7436C23.0795 19.9076 22.857 19.9999 22.625 20Z" fill="#13B499"/>
									</svg>
                                </a>
                            </li>

                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link"  href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                    <img src="images/profile/12.png" width="20" alt="">
									<div class="header-info">
										<span><?= $_SESSION['usuario'] ?><i class="fa fa-caret-down ms-3" aria-hidden="true"></i></span>
									</div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="app-profile.html" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="ms-2">perfil </span>
                                    </a>
                                    <!--<a href="email-inbox.html" class="dropdown-item ai-icon">
                                        <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                        <span class="ms-2">Inbox </span>
                                    </a>-->
                                    <a href="logout.php" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ms-2">cerrar sesion </span>
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
							<span class="nav-text">panel</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="">Inicio</a></li>
							<li><a href="index.php">talero oscuro</a></li>
							<li><a href="index-light.php">tablero ligero</a></li>
						</ul>
                    </li>
					<li>
						<a class="has-arrow ai-icon"  href="javascript:void(0);" aria-expanded="false">
							<i class="flaticon-381-diploma"></i>
							<span class="nav-text">CMS <span class="badge badge-xs badge-danger ms-2">New</span></span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="content.html">Content</a></li>
							<li><a href="menu-1.html">Menu</a></li>
							<li><a href="email-template.html">Email Template</a></li>
							<li><a href="blog.html">Blog</a></li>
						</ul>
                    </li>
					<li>
						<a class="has-arrow ai-icon" href="javascript:void(0);" aria-expanded="false">
							<i class="flaticon-381-id-card"></i>
							<span class="nav-text">Ticket<span class="badge badge-xs badge-danger ms-2">New</span></span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="create-ticket.html">Create Ticket</a></li>
							<li><a href="all-ticket.html">All Ticket</a></li>
						</ul>
                    </li>
					<li>
						<a class="has-arrow ai-icon" href="javascript:void(0);" aria-expanded="false">
							<i class="flaticon-381-id-card-4"></i>
							<span class="nav-text">Customers <span class="badge badge-xs badge-danger ms-2">New</span></span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="customers-list.html">Customers List</a></li>
							<li><a href="chat.html">Chat</a></li>
						</ul>
                    </li>
                    <li>
						<a class="has-arrow ai-icon"  href="javascript:void(0);" aria-expanded="false">
						<i class="flaticon-monitor"></i>
							<span class="nav-text">Apps</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="app-profile.html">Profile</a></li>
							 <li><a href="edit-profile.html">Edit Profile</a></li>
                            <li><a class="has-arrow"  href="javascript:void(0);" aria-expanded="false">Email</a>
                                <ul aria-expanded="false">
                                    <li><a href="email-compose.html">Compose</a></li>
                                    <li><a href="email-inbox.html">Inbox</a></li>
                                    <li><a href="email-read.html">Read</a></li>
                                </ul>
                            </li>
                            <li><a href="app-calender.html">Calendar</a></li>
							<li><a class="has-arrow"  href="javascript:void(0);" aria-expanded="false">Shop</a>
                                <ul aria-expanded="false">
                                    <li><a href="ecom-product-grid.html">Product Grid</a></li>
									<li><a href="ecom-product-list.html">Product List</a></li>
									<li><a href="ecom-product-detail.html">Product Details</a></li>
									<li><a href="ecom-product-order.html">Order</a></li>
									<li><a href="ecom-checkout.html">Checkout</a></li>
									<li><a href="ecom-invoice.html">Invoice</a></li>
									<li><a href="ecom-customers.html">Customers</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon"  href="javascript:void(0);" aria-expanded="false">
							<i class="flaticon-bar-chart-1"></i>
							<span class="nav-text">Charts</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="chart-flot.html">Flot</a></li>
                            <li><a href="chart-morris.html">Morris</a></li>
                            <li><a href="chart-chartjs.html">Chartjs</a></li>
                            <li><a href="chart-chartist.html">Chartist</a></li>
                            <li><a href="chart-sparkline.html">Sparkline</a></li>
                            <li><a href="chart-peity.html">Peity</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon"  href="javascript:void(0);" aria-expanded="false">
							<i class="flaticon-web"></i>
							<span class="nav-text">Bootstrap</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="ui-accordion.html">Accordion</a></li>
                            <li><a href="ui-alert.html">Alert</a></li>
                            <li><a href="ui-badge.html">Badge</a></li>
                            <li><a href="ui-button.html">Button</a></li>
                            <li><a href="ui-modal.html">Modal</a></li>
                            <li><a href="ui-button-group.html">Button Group</a></li>
                            <li><a href="ui-list-group.html">List Group</a></li>
                            <li><a href="ui-media-object.html">Media Object</a></li>
                            <li><a href="ui-card.html">Cards</a></li>
                            <li><a href="ui-carousel.html">Carousel</a></li>
                            <li><a href="ui-dropdown.html">Dropdown</a></li>
                            <li><a href="ui-popover.html">Popover</a></li>
                            <li><a href="ui-progressbar.html">Progressbar</a></li>
                            <li><a href="ui-tab.html">Tab</a></li>
                            <li><a href="ui-typography.html">Typography</a></li>
                            <li><a href="ui-pagination.html">Pagination</a></li>
                            <li><a href="ui-grid.html">Grid</a></li>

                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon"  href="javascript:void(0);" aria-expanded="false">
							<i class="flaticon-plugin"></i>
							<span class="nav-text">Plugins</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="uc-select2.html">Select 2</a></li>
                            <li><a href="uc-nestable.html">Nestedable</a></li>
                            <li><a href="uc-noui-slider.html">Noui Slider</a></li>
                            <li><a href="uc-sweetalert.html">Sweet Alert</a></li>
                            <li><a href="uc-toastr.html">Toastr</a></li>
                            <li><a href="map-jqvmap.html">Jqv Map</a></li>
                            <li><a href="uc-lightgallery.html">Light Gallery</a></li>
                        </ul>
                    </li>
                    <li><a href="widget-basic.html" class="ai-icon" aria-expanded="false">
							<i class="flaticon-admin"></i>
							<span class="nav-text">Widget</span>
						</a>
					</li>
                    <li><a class="has-arrow ai-icon"  href="javascript:void(0);" aria-expanded="false">
							<i class="flaticon-contract"></i>
							<span class="nav-text">Forms</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="form-element.html">Form Elements</a></li>
                            <li><a href="form-wizard.html">Wizard</a></li>
                            <li><a href="ck-editor.html">CkEditor</a></li>
                            <li><a href="form-pickers.html">Pickers</a></li>
                            <li><a href="form-validation-jquery.html">Jquery Validate</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon"  href="javascript:void(0);" aria-expanded="false">
							<i class="flaticon-table"></i>
							<span class="nav-text">Table</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="table-bootstrap-basic.html">Bootstrap</a></li>
                            <li><a href="table-datatable-basic.html">Datatable</a></li>
                        </ul>
                    </li>
					<li><a href="reports.html" class="ai-icon" aria-expanded="false">
							<i class="flaticon-381-list"></i>
							<span class="nav-text">Report <span class="badge badge-xs badge-danger ms-2">New</span></span>
						</a>
					</li>
                    <li><a class="has-arrow ai-icon"  href="javascript:void(0);" aria-expanded="false">
							<i class="flaticon-newsletter"></i>
							<span class="nav-text">Pages</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="page-register.html">Register</a></li>
                            <li><a href="page-login.html">Login</a></li>
                            <li><a class="has-arrow"  href="javascript:void(0);" aria-expanded="false">Error</a>
                                <ul aria-expanded="false">
                                    <li><a href="page-error-400.html">Error 400</a></li>
                                    <li><a href="page-error-403.html">Error 403</a></li>
                                    <li><a href="page-error-404.html">Error 404</a></li>
                                    <li><a href="page-error-500.html">Error 500</a></li>
                                    <li><a href="page-error-503.html">Error 503</a></li>
                                </ul>
                            </li>
                            <li><a href="page-lock-screen.html">Lock Screen</a></li>
                        </ul>
                    </li>
                </ul>
            

			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
		
		<!--**********************************
            Content body start
        ***********************************-->



    </div>

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="vendor/chart.js/Chart.bundle.min.js"></script>
	<script src="vendor/owl-carousel/owl.carousel.js"></script>
	<!-- Apex Chart -->
	<script src="vendor/apexchart/apexchart.js"></script>
	<!-- Dashboard 1 -->
    <script src="js/custom.min.js"></script>
	<script src="js/dashboard/dashboard-1.js"></script>
	<script src="js/deznav-init.js"></script>
	
    
	<script>
		jQuery(document).ready(function(){
			jQuery('.dz-theme-mode').removeClass('active');
			jQuery('.nav-header .brand-title').attr('src','images/logo-text2.png');
			setTimeout(function() {
				dezSettingsOptions.version = 'light';
				new dezSettings(dezSettingsOptions);
			},0)
			jQuery(window).on('resize',function(){
				new dezSettings(dezSettingsOptions); 
			});

		});
	</script>
</body>
</html>