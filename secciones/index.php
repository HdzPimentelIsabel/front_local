<?php
session_start();
if(!isset($_SESSION["id"])) {
    header("Location: https://siaweb.com.mx/login");
    die;
}
// Errores en PHP
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);
// fecha actual en español
setlocale(LC_TIME, 'es_ES.UTF-8');
setlocale(LC_TIME, 'spanish');
// Obtener la URL actual 
$url_actual = $_SERVER["REDIRECT_URL"];
$url_actual = explode("/", $url_actual);
$seccion = $url_actual[2];
// Contener la informacion de configuracion de la seccion
$datos = file_get_contents($_SERVER["DOCUMENT_ROOT"]."/secciones/config/".$seccion.".json");
$config = json_decode($datos);
// Llamar a la seccion
$show_seccion = $_SERVER["DOCUMENT_ROOT"].$_SERVER["REDIRECT_URL"].'.php';
?>
<html>
    <head>
        <title>Universidad Alva Edison | Siaweb</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="en">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="robots" content="index,follow">
        <meta name="msapplication-tap-highlight" content="no">
        <!-- Favicon -->
        <link rel="shortcut icon" href="../assets/images/favicon.png" />
        <!-- Library / Plugin Css Build -->
        <link rel="stylesheet" href="../assets/css/core/libs.min.css" />
        <!-- Hope Ui Design System Css -->
        <link rel="stylesheet" href="../assets/css/hope-ui.min.css?v=2.0.0" />
        <!-- Custom Css -->
        <link rel="stylesheet" href="../assets/css/custom.min.css?v=2.0.0" />
        <!-- Dark Css -->
        <link rel="stylesheet" href="../assets/css/dark.min.css"/>
        <!-- Customizer Css -->
        <link rel="stylesheet" href="../assets/css/customizer.min.css" />
        <!-- RTL Css -->
        <link rel="stylesheet" href="../assets/css/rtl.min.css"/>
        <!-- Tipografia  -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
        <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&amp;display=swap" rel="stylesheet">
        <!-- Font  Icono  -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <!-- Boostrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- CSS -->
        <link href="css/main.css?v<?= time() ?>" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
        <!-- JS -->
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script> 
    </head>     
    <body>
        <!-- loader Start -->
        <div id="loading">
            <div class="loader simple-loader">
                <div class="loader-body"></div>
            </div>    
        </div>
        <!-- loader END -->
        <aside class="sidebar sidebar-default sidebar-white sidebar-base navs-rounded-all">
            <div class="sidebar-header d-flex align-items-center justify-content-start">
                <a href="dashboard/index.html" class="navbar-brand">
                    <!--Logo start-->
                    <div class="logo-main">
                        <div class="logo-normal">
                            <img src="https://siaweb.com.mx/images/logo.png" style="width: 35px;"/>
                        </div>
                        <div class="logo-mini">
                            <img src="https://siaweb.com.mx/images/logo.png" style="width: 35px;"/>
                        </div>
                    </div>
                    <!--logo End-->
                </a>
            </div>
            <div class="sidebar-body pt-0 data-scrollbar">
                <div class="sidebar-list">
                    <!-- Sidebar Menu Start -->
                    <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="https://siaweb.com.mx/inicio/">
                                <i class="icon">
                                    <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-20">
                                        <path opacity="0.4" d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z" fill="currentColor"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z" fill="currentColor"></path>
                                    </svg>
                                </i>
                                <span class="item-name">Inicio</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="https://siaweb.com.mx/personas/">
                                <i class="icon">
                                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.9488 14.54C8.49884 14.54 5.58789 15.1038 5.58789 17.2795C5.58789 19.4562 8.51765 20.0001 11.9488 20.0001C15.3988 20.0001 18.3098 19.4364 18.3098 17.2606C18.3098 15.084 15.38 14.54 11.9488 14.54Z" fill="currentColor"></path>
                                        <path opacity="0.4" d="M11.949 12.467C14.2851 12.467 16.1583 10.5831 16.1583 8.23351C16.1583 5.88306 14.2851 4 11.949 4C9.61293 4 7.73975 5.88306 7.73975 8.23351C7.73975 10.5831 9.61293 12.467 11.949 12.467Z" fill="currentColor"></path>
                                        <path opacity="0.4" d="M21.0881 9.21923C21.6925 6.84176 19.9205 4.70654 17.664 4.70654C17.4187 4.70654 17.1841 4.73356 16.9549 4.77949C16.9244 4.78669 16.8904 4.802 16.8725 4.82902C16.8519 4.86324 16.8671 4.90917 16.8895 4.93889C17.5673 5.89528 17.9568 7.0597 17.9568 8.30967C17.9568 9.50741 17.5996 10.6241 16.9728 11.5508C16.9083 11.6462 16.9656 11.775 17.0793 11.7948C17.2369 11.8227 17.3981 11.8371 17.5629 11.8416C19.2059 11.8849 20.6807 10.8213 21.0881 9.21923Z" fill="currentColor"></path>
                                        <path d="M22.8094 14.817C22.5086 14.1722 21.7824 13.73 20.6783 13.513C20.1572 13.3851 18.747 13.205 17.4352 13.2293C17.4155 13.232 17.4048 13.2455 17.403 13.2545C17.4003 13.2671 17.4057 13.2887 17.4316 13.3022C18.0378 13.6039 20.3811 14.916 20.0865 17.6834C20.074 17.8032 20.1698 17.9068 20.2888 17.8888C20.8655 17.8059 22.3492 17.4853 22.8094 16.4866C23.0637 15.9589 23.0637 15.3456 22.8094 14.817Z" fill="currentColor"></path>
                                        <path opacity="0.4" d="M7.04459 4.77973C6.81626 4.7329 6.58077 4.70679 6.33543 4.70679C4.07901 4.70679 2.30701 6.84201 2.9123 9.21947C3.31882 10.8216 4.79355 11.8851 6.43661 11.8419C6.60136 11.8374 6.76343 11.8221 6.92013 11.7951C7.03384 11.7753 7.09115 11.6465 7.02668 11.551C6.3999 10.6234 6.04263 9.50765 6.04263 8.30991C6.04263 7.05904 6.43303 5.89462 7.11085 4.93913C7.13234 4.90941 7.14845 4.86348 7.12696 4.82926C7.10906 4.80135 7.07593 4.78694 7.04459 4.77973Z" fill="currentColor"></path>
                                        <path d="M3.32156 13.5127C2.21752 13.7297 1.49225 14.1719 1.19139 14.8167C0.936203 15.3453 0.936203 15.9586 1.19139 16.4872C1.65163 17.4851 3.13531 17.8066 3.71195 17.8885C3.83104 17.9065 3.92595 17.8038 3.91342 17.6832C3.61883 14.9167 5.9621 13.6046 6.56918 13.3029C6.59425 13.2885 6.59962 13.2677 6.59694 13.2542C6.59515 13.2452 6.5853 13.2317 6.5656 13.2299C5.25294 13.2047 3.84358 13.3848 3.32156 13.5127Z" fill="currentColor"></path>
                                    </svg>
                                </i>
                                <span class="item-name">Personas</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#horizontal-menu" role="button" aria-expanded="false" aria-controls="horizontal-menu">
                                <i class="icon">
                                    
                                    <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-20">
                                        <path opacity="0.4" d="M10.0833 15.958H3.50777C2.67555 15.958 2 16.6217 2 17.4393C2 18.2559 2.67555 18.9207 3.50777 18.9207H10.0833C10.9155 18.9207 11.5911 18.2559 11.5911 17.4393C11.5911 16.6217 10.9155 15.958 10.0833 15.958Z" fill="currentColor"></path>
                                        <path opacity="0.4" d="M22.0001 6.37867C22.0001 5.56214 21.3246 4.89844 20.4934 4.89844H13.9179C13.0857 4.89844 12.4102 5.56214 12.4102 6.37867C12.4102 7.1963 13.0857 7.86 13.9179 7.86H20.4934C21.3246 7.86 22.0001 7.1963 22.0001 6.37867Z" fill="currentColor"></path>
                                        <path d="M8.87774 6.37856C8.87774 8.24523 7.33886 9.75821 5.43887 9.75821C3.53999 9.75821 2 8.24523 2 6.37856C2 4.51298 3.53999 3 5.43887 3C7.33886 3 8.87774 4.51298 8.87774 6.37856Z" fill="currentColor"></path>
                                        <path d="M21.9998 17.3992C21.9998 19.2648 20.4609 20.7777 18.5609 20.7777C16.6621 20.7777 15.1221 19.2648 15.1221 17.3992C15.1221 15.5325 16.6621 14.0195 18.5609 14.0195C20.4609 14.0195 21.9998 15.5325 21.9998 17.3992Z" fill="currentColor"></path>
                                    </svg>
                                </i>
                                <span class="item-name">Seguridad</span>
                                <i class="right-icon">
                                    <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </i>
                            </a>
                            <ul class="sub-nav collapse" id="horizontal-menu" data-bs-parent="#sidebar-menu">
                                <li class="nav-item">
                                    <a class="nav-link " href="https://siaweb.com.mx/secciones/modulos">
                                    <i class="icon">
                                            <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                                <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                </g>
                                            </svg>
                                        </i>
                                    <i class="sidenav-mini-icon"> H </i>
                                    <span class="item-name"> Modulos </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="https://siaweb.com.mx/secciones/aplicaciones">
                                        <i class="icon">
                                            <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                                <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> D </i>
                                        <span class="item-name">Aplicaciones</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="https://siaweb.com.mx/secciones/rol">
                                        <i class="icon">
                                            <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                                <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> D </i>
                                        <span class="item-name">Rol</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="https://siaweb.com.mx/secciones/perfiles">
                                        <i class="icon">
                                            <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                                <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> D </i>
                                        <span class="item-name">Perfiles</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="https://siaweb.com.mx/secciones/permisorol">
                                        <i class="icon">
                                            <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                                <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> D </i>
                                        <span class="item-name">Permiso Rol</span>
                                    </a>
                                </li>
                            </ul>
                        </li>  
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#horizontal-menu2" role="button" aria-expanded="false" aria-controls="horizontal-menu2">
                            <i class="icon" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="File Manager" data-bs-original-title="File Manager"><svg width="20" class="icon-20" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path opacity="0.4" d="M18.8088 9.021C18.3573 9.021 17.7592 9.011 17.0146 9.011C15.1987 9.011 13.7055 7.508 13.7055 5.675V2.459C13.7055 2.206 13.5036 2 13.253 2H7.96363C5.49517 2 3.5 4.026 3.5 6.509V17.284C3.5 19.889 5.59022 22 8.16958 22H16.0463C18.5058 22 20.5 19.987 20.5 17.502V9.471C20.5 9.217 20.299 9.012 20.0475 9.013C19.6247 9.016 19.1177 9.021 18.8088 9.021Z" fill="currentColor"></path><path opacity="0.4" d="M16.084 2.56729C15.785 2.25629 15.263 2.47029 15.263 2.90129V5.53829C15.263 6.64429 16.174 7.55429 17.28 7.55429C17.977 7.56229 18.945 7.56429 19.767 7.56229C20.188 7.56129 20.402 7.05829 20.11 6.75429C19.055 5.65729 17.166 3.69129 16.084 2.56729Z" fill="currentColor"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M8.9739 11.3876H12.3589C12.7699 11.3876 13.1039 11.0546 13.1039 10.6436C13.1039 10.2326 12.7699 9.89861 12.3589 9.89861H8.9739C8.5629 9.89861 8.2299 10.2326 8.2299 10.6436C8.2299 11.0546 8.5629 11.3876 8.9739 11.3876ZM8.974 16.3818H14.418C14.829 16.3818 15.163 16.0488 15.163 15.6378C15.163 15.2268 14.829 14.8928 14.418 14.8928H8.974C8.563 14.8928 8.23 15.2268 8.23 15.6378C8.23 16.0488 8.563 16.3818 8.974 16.3818Z" fill="currentColor"></path></svg></i>
                                <span class="item-name">Escolar</span>
                                <i class="right-icon">
                                    <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </i>
                            </a>
                            <ul class="sub-nav collapse" id="horizontal-menu2" data-bs-parent="#sidebar-menu">
                                <li class="nav-item">
                                    <a class="nav-link " href="https://siaweb.com.mx/secciones/carreras">
                                    <i class="icon">
                                            <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                                <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                </g>
                                            </svg>
                                        </i>
                                    <i class="sidenav-mini-icon"> H </i>
                                    <span class="item-name"> Carreras </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="https://siaweb.com.mx/secciones/niveles">
                                        <i class="icon">
                                            <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                                <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> D </i>
                                        <span class="item-name">Niveles</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="https://siaweb.com.mx/secciones/modalidades">
                                        <i class="icon">
                                            <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                                <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> D </i>
                                        <span class="item-name">Modalidades</span>
                                    </a>
                                </li>
                            </ul>
                        </li>         
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#horizontal-menu3" role="button" aria-expanded="false" aria-controls="horizontal-menu3">
                            <i class="icon" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Blog" data-bs-original-title="Blog"><svg width="20" class="icon-20" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path opacity="0.4" d="M16.191 2H7.81C4.77 2 3 3.78 3 6.83V17.16C3 20.26 4.77 22 7.81 22H16.191C19.28 22 21 20.26 21 17.16V6.83C21 3.78 19.28 2 16.191 2" fill="currentColor"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M8.07999 6.64999V6.65999C7.64899 6.65999 7.29999 7.00999 7.29999 7.43999C7.29999 7.86999 7.64899 8.21999 8.07999 8.21999H11.069C11.5 8.21999 11.85 7.86999 11.85 7.42899C11.85 6.99999 11.5 6.64999 11.069 6.64999H8.07999ZM15.92 12.74H8.07999C7.64899 12.74 7.29999 12.39 7.29999 11.96C7.29999 11.53 7.64899 11.179 8.07999 11.179H15.92C16.35 11.179 16.7 11.53 16.7 11.96C16.7 12.39 16.35 12.74 15.92 12.74ZM15.92 17.31H8.07999C7.77999 17.35 7.48999 17.2 7.32999 16.95C7.16999 16.69 7.16999 16.36 7.32999 16.11C7.48999 15.85 7.77999 15.71 8.07999 15.74H15.92C16.319 15.78 16.62 16.12 16.62 16.53C16.62 16.929 16.319 17.27 15.92 17.31Z" fill="currentColor"></path></svg></i>
                                <span class="item-name">General</span>
                                <i class="right-icon">
                                    <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </i>
                            </a>
                            <ul class="sub-nav collapse" id="horizontal-menu3" data-bs-parent="#sidebar-menu">
                                <li class="nav-item">
                                    <a class="nav-link " href="https://siaweb.com.mx/secciones/parentesco">
                                    <i class="icon">
                                            <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                                <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                </g>
                                            </svg>
                                        </i>
                                    <i class="sidenav-mini-icon"> H </i>
                                    <span class="item-name"> Parentesco </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="https://siaweb.com.mx/secciones/edocivil">
                                        <i class="icon">
                                            <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                                <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> D </i>
                                        <span class="item-name">Estado civil</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="https://siaweb.com.mx/secciones/asentamientos">
                                        <i class="icon">
                                            <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                                <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> D </i>
                                        <span class="item-name">Asentamientos</span>
                                    </a>
                                </li>
                            </ul>
                        </li>              
                    </ul>
                    <!-- Sidebar Menu End -->        
                </div>
            </div>
            <div class="sidebar-footer"></div>
        </aside>    
        <main class="main-content">
            <div class="position-relative iq-banner">
                <!--Nav Start-->
                <nav class="nav navbar navbar-expand-lg navbar-light iq-navbar">
                    <div class="container-fluid navbar-inner">
                        <a href="dashboard/index.html" class="navbar-brand">
                            <!--Logo start-->
                            <div class="logo-main">
                                <div class="logo-normal">
                                    <svg class="text-primary icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor"/>
                                        <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor"/>
                                        <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor"/>
                                        <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor"/>
                                    </svg>
                                </div>
                                <div class="logo-mini">
                                    <svg class="text-primary icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor"/>
                                        <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor"/>
                                        <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor"/>
                                        <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor"/>
                                    </svg>
                                </div>
                            </div>
                            <!--logo End-->
                            <h4 class="logo-title">Hope UI</h4>
                        </a>
                        <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                            <i class="icon">
                                <svg  width="20px" class="icon-20" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" />
                                </svg>
                            </i>
                        </div>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon">
                            <span class="mt-2 navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                            </span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <h4 class="logo-title">Universidad Alva Edison</h4>
                            <ul class="mb-2 navbar-nav ms-auto align-items-center navbar-list mb-lg-0">
                                
                                <li class="nav-item dropdown">
                                <a class="py-0 nav-link d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php
                                    if($_SESSION["id"] == 999999){ 
                                        $url = '../inicio/images/999999.jpg';
                                        $nombre = 'GUILLERMO FUENTES MONTIEL';
                                    }elseif($_SESSION["id"] == 1008243){
                                        $url = '../inicio/images/1008243.jpg'; 
                                        $nombre = 'JORGE ALAN LEON VAZQUEZ';
                                    }else{
                                        $url = '../inicio/images/999999.jpg';
                                        $nombre = 'GUILLERMO FUENTES MONTIEL';
                                    }
                                    ?>
                                    <img   src="../assets/images/avatars/01.png" alt="User-Profile" class="theme-color-default-img img-fluid avatar avatar-50 avatar-rounded">
                                    <img style="display: block;object-fit: cover;" src="<?= $url ?>" alt="User-Profile" class="theme-color-purple-img img-fluid avatar avatar-50 avatar-rounded">
                                    <img src="../assets/images/avatars/avtar_2.png" alt="User-Profile" class="theme-color-blue-img img-fluid avatar avatar-50 avatar-rounded">
                                    <img src="../assets/images/avatars/avtar_4.png" alt="User-Profile" class="theme-color-green-img img-fluid avatar avatar-50 avatar-rounded">
                                    <img src="../assets/images/avatars/avtar_5.png" alt="User-Profile" class="theme-color-yellow-img img-fluid avatar avatar-50 avatar-rounded">
                                    <img src="../assets/images/avatars/avtar_3.png" alt="User-Profile" class="theme-color-pink-img img-fluid avatar avatar-50 avatar-rounded">
                                    <div class="caption ms-3 d-none d-md-block ">
                                        <h6 class="mb-0 caption-title"><?= $nombre ?></h6>
                                    </div>

                                    <div id="button_cerrar"><i class="fas fa-sign-out-alt"></i></div>
                                </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav> 
                <!-- Nav Header Component Start -->
                <div class="iq-navbar-header" style="height: 215px;">
                    <div class="container-fluid iq-container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="flex-wrap d-flex justify-content-between align-items-center">
                                    <div>
                                        <h1><?= $config->titulo ?></h1>
                                        <p></p>
                                    </div>
                                    <div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="iq-header-img">
                        <img src="../assets/images/dashboard/top-header.png" alt="header" class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX">
                        <img src="../assets/images/dashboard/top-header1.png" alt="header" class="theme-color-purple-img img-fluid w-100 h-100 animated-scaleX">
                        <img src="../assets/images/dashboard/top-header2.png" alt="header" class="theme-color-blue-img img-fluid w-100 h-100 animated-scaleX">
                        <img src="../assets/images/dashboard/top-header3.png" alt="header" class="theme-color-green-img img-fluid w-100 h-100 animated-scaleX">
                        <img src="../assets/images/dashboard/top-header4.png" alt="header" class="theme-color-yellow-img img-fluid w-100 h-100 animated-scaleX">
                        <img src="../assets/images/dashboard/top-header5.png" alt="header" class="theme-color-pink-img img-fluid w-100 h-100 animated-scaleX">
                    </div>
                </div>          
                <!-- Nav Header Component End -->
                <!--Nav End-->
            </div>
            <div class="conatiner-fluid content-inner mt-n5 py-0">
                <div>
                    <div class="row">
                        <div class="col-sm-12 col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <p><?= $config->descripcion ?></p>
                                    <!-- Conenido de la seccion -->
                                    <?php include $show_seccion; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="footer-body">
                    <div class="right-panel">
                        ©<script>document.write(new Date().getFullYear())</script>  de <a href="">SIAWEB</a>.
                    </div>
                </div>
            </footer> 
        </main>
        <!-- Modal -->
        <div class="modal" id="Modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div id="contenido_modal"></div>
                    </div>
                </div>
            </div>
        </div>
        <script>
        if (!localStorage.getItem("usuario_siaweb")){
            window.location.replace("https://siaweb.com.mx/login");
        }
        </script>
        <!-- Library Bundle Script -->
        <script src="../assets/js/core/libs.min.js"></script>
        <!-- External Library Bundle Script -->
        <script src="../assets/js/core/external.min.js"></script>
        <!-- Widgetchart Script -->
        <script src="../assets/js/charts/widgetcharts.js"></script>
        <!-- mapchart Script -->
        <script src="../assets/js/charts/vectore-chart.js"></script>
        <script src="../assets/js/charts/dashboard.js" ></script>
        <!-- fslightbox Script -->
        <script src="../assets/js/plugins/fslightbox.js"></script>
        <!-- Settings Script -->
        <script src="../assets/js/plugins/setting.js"></script>
        <!-- Slider-tab Script -->
        <script src="../assets/js/plugins/slider-tabs.js"></script>
        <!-- Form Wizard Script -->
        <script src="../assets/js/plugins/form-wizard.js"></script>
        <!-- AOS Animation Plugin-->
        <!-- App Script -->
        <script src="../assets/js/hope-ui.js" defer></script>
  	</body>
</html>
