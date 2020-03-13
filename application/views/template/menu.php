<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>FIRMA DE ABOGADOS - RRHH</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url() ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url() ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url() ?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url() ?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url() ?>assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo base_url() ?>assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url() ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url() ?>assets/build/css/custom.min.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>assets/css/toastr.min.css" rel="stylesheet" type="text/css" />

    <!-- MODIDEV -->
    <link href="<?php echo base_url() ?>assets/css/modidev.css" rel="stylesheet">

    <!-- Autocompletado -->
    <link href="<?php echo base_url() ?>assets/css/jquery-ui.css" rel="stylesheet">

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <!-- <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gestión agrícola</span></a>
            </div> -->

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo base_url() ?>assets/production/images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido</span>
                <h2>PATRICIO ORELLANA</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <!-- <h3>General</h3> -->
                <ul class="nav side-menu">
                  <li>
                    <a href="<?php echo base_url() ?>index.php/dashboard">
                      <i class="fa fa-home"></i> Inicio
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo base_url() ?>index.php/inicioTrabajadores">
                      <i class="fa fa-users"></i> Trabajadores
                    </a>
                  </li>
                  <li><a><i class="fa fa-folder-open"></i> Documentos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url() ?>index.php/dashboard">Cartas de amonestación</a></li>
                      <li><a href="<?php echo base_url() ?>index.php/inicioMenuContratos">Contratos</a></li>
                      <li><a href="<?php echo base_url() ?>index.php/dashboard">Finiquitos</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-user"></i> Perfiles Ocupacionales <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url() ?>index.php/inicioRequisitosMinimos">Requisitos Mínimos</a></li>
                      <li><a href="<?php echo base_url() ?>index.php/inicioFunciones">Funciones</a></li>
                      <li><a href="<?php echo base_url() ?>index.php/inicioCompetencias">Competencias y Características</a></li>
                      <li><a href="<?php echo base_url() ?>index.php/inicioConocimientos">Conocimientos Básicos</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-building"></i> Mantenedores <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url() ?>index.php/inicioAFP">AFP</a></li>
                      <li><a href="<?php echo base_url() ?>index.php/inicioCargos">Cargos</a></li>
                      <li><a href="<?php echo base_url() ?>index.php/inicioCiudades">Ciudades</a></li>
                      <li><a href="<?php echo base_url() ?>index.php/inicioEmpresa">Empresas</a></li>
                      <li><a href="<?php echo base_url() ?>index.php/inicioEstadosCiviles">Estado Civil</a></li>
                      <li><a href="<?php echo base_url() ?>index.php/inicioEstadoContrato">Estados de contrato</a></li>
                      <li><a href="<?php echo base_url() ?>index.php/inicioNacionalidades">Nacionalidades</a></li>
                      <li><a href="<?php echo base_url() ?>index.php/inicioPrevisiones">Previsiones</a></li>
                      <li><a href="<?php echo base_url() ?>index.php/inicioSucursales">Sucursales</a></li>
                    </ul>
                  </li>

                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <!-- <a>Desarrollador por >MODIDEV.CL</a> -->
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav" style="background-color: #2A3F54">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo base_url() ?>assets/production/images/img.jpg" alt="">ORELLANA MENESES SpA
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="javascript:;"> Perfil</a>
                      <a class="dropdown-item"  href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    <a class="dropdown-item"  href="login.html"><i class="fa fa-sign-out pull-right"></i> Cerrar Sesión</a>
                  </div>
                </li>

                <li role="presentation" class="nav-item dropdown open">
                  <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <div class="text-center">
                        <a class="dropdown-item">
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
