<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <!-- <link rel="icon" href="images/#" type="image/ico" /> -->

    <title>FIRMA DE ABOGADOS - RRHH</title>

    <!-- <style media="screen">
        #sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
        #sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; }
        #sortable li span { position: absolute; margin-left: -1.3em; }
    </style> -->

    <!-- Bootstrap -->
    <link href="<?php echo base_url() ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url() ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url() ?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url() ?>assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo base_url() ?>assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url() ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>assets/css/toastr.min.css" rel="stylesheet" type="text/css" />

    <!-- MODIDEV -->
    <link href="<?php echo base_url() ?>assets/css/modidev.css" rel="stylesheet">

    <!-- Autocompletado -->
    <link href="<?php echo base_url() ?>assets/css/jquery-ui.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url() ?>assets/build/css/custom.min.css" rel="stylesheet">


  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">

        <!-- aqui comienza menu lateral -->
        <div style="">
          <div class="col-md-3 left_col">
            <div class="left_col scroll-view">

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
              <div id="sidebar-menu" class="main_menu_side hidden-print main_menu" style="">
                <div class="menu_section">
                  <!-- <h3>General</h3> -->
                  <ul class="nav side-menu">
                    <li>
                      <a href="<?php echo base_url() ?>dashboard">
                        <i class="fa fa-home"></i> Inicio
                      </a>
                    </li>
                    <li>
                      <a href="<?php echo base_url() ?>inicioTrabajadores">
                        <i class="fa fa-users"></i> Trabajadores
                      </a>
                    </li>
                    <li>
                      <a href="<?php echo base_url() ?>inicioHistorial">
                        <i class="fa fa-archive"></i> Historial de trabajadores
                      </a>
                    </li>
                    <li>
                      <a href="<?php echo base_url() ?>inicioGestorContratos">
                        <i class="fa fa-file"></i> Generar contrato
                      </a>
                    </li>
                    <li><a><i class="fa fa-folder-open"></i> Documentos <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="<?php echo base_url() ?>inicioContratos">Contratos</a></li>
                        <li><a href="<?php echo base_url() ?>inicioTransferencias">Transferencias</a></li>
                        <li><a href="<?php echo base_url() ?>inicioCartasAmonestacion">Cartas de amonestación</a></li>
                        <li><a href="<?php echo base_url() ?>perfilOcupacionalVista">Perfiles Ocupacionales</a></li>
                      </ul>
                    </li>
                    <li><a><i class="fa fa-user"></i> Perfiles Ocupacionales <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="<?php echo base_url() ?>inicioRequisitosMinimos">Requisitos Mínimos</a></li>
                        <li><a href="<?php echo base_url() ?>inicioFunciones">Funciones</a></li>
                        <li><a href="<?php echo base_url() ?>inicioCompetencias">Competencias y Características</a></li>
                        <li><a href="<?php echo base_url() ?>inicioConocimientos">Conocimientos Básicos</a></li>
                        <li><a href="<?php echo base_url() ?>inicioOtros">Otros Antecedentes</a></li>
                      </ul>
                    </li>
                    <li><a><i class="fa fa-building"></i> Mantenedores <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                      <li><a href="<?php echo base_url() ?>inicioCargos">Cargos</a></li>
                        <li><a href="<?php echo base_url() ?>inicioCiudades">Ciudades</a></li>
                        <li><a href="<?php echo base_url() ?>inicioEmpresa">Empresas</a></li>
                        <li><a href="<?php echo base_url() ?>inicioEstadosCiviles">Estado Civil</a></li>
                        <li><a href="<?php echo base_url() ?>inicioEstadoContrato">Estados de contrato</a></li>
                        <li><a href="<?php echo base_url() ?>inicioNacionalidades">Nacionalidades</a></li>
                        <li><a href="<?php echo base_url() ?>inicioSalud">Previsión de salud</a></li>
                        <li><a href="<?php echo base_url() ?>inicioPrevision">Previsión</a></li>
                        <li><a href="<?php echo base_url() ?>inicioSucursales">Sucursales</a></li>
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
        </div>
        <!-- fin menu lateral -->

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
                    <a class="dropdown-item"  href="javascript:;"> <i class="fa fa-user pull-right"></i>Mi perfil</a>

                    <a class="dropdown-item"  href="login.html"><i class="fa fa-sign-out pull-right"></i> Cerrar Sesión</a>
                  </div>
                </li>

              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
