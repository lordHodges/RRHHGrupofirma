<!DOCTYPE html>
<?php
$data = $this->session->userdata("datos");
$usuario =  $data['usuario'];
$permisos =  $data['permisos'];
$menu =  $data['menu'];
?>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <!-- <link rel="icon" href="images/#" type="image/ico" /> -->

    <title>FIRMA DE ABOGADOS</title>

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

    <!-- Switchery -->
    <link href="<?php echo base_url() ?>assets/vendors/switchery/dist/switchery.min.css" rel="stylesheet">

    <!-- MODIDEV -->
    <link href="<?php echo base_url() ?>assets/css/modidev.css" rel="stylesheet">

    <!-- Autocompletado -->
    <link href="<?php echo base_url() ?>assets/css/jquery-ui.css" rel="stylesheet">

    <!-- SELECT2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

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
              <!-- <div class="profile clearfix">
                <div class="profile_pic">
                  <img src="<?php echo base_url() ?>assets/production/images/img.jpg" alt="..." class="img-circle profile_img">
                </div>
                <div class="profile_info">
                  <span>FIRMA DE ABOGADOS CHILE</span>
                  <h2><?php echo $usuario[0]->atr_nombre ?></h2>
                </div>
              </div> -->
              <!-- /menu profile quick info -->

              <br />

              <div class="profile-info">
                <h2 class="text-center text-white">GRUPO FIRMA</h2>
              </div>

              <!-- sidebar menu -->
              <div id="sidebar-menu" class="main_menu_side hidden-print main_menu" style="">
                <div class="menu_section">
                  <!-- <h3>General</h3> -->
                  <ul class="nav side-menu">

                      <!-- Comienzo de menu individual -->
                      <?php foreach ($menu as $key => $valueModulo) {  ?>

                          <?php  if ( $valueModulo->cf_menu == "1" ) {  ?>
                            <li>
                              <a href="<?php echo base_url() ?>index.php/dashboard">
                                <i class="fa fa-home"></i> Inicio
                              </a>
                            </li>
                          <?php } ?>

                            <?php  if ( $valueModulo->cf_menu == "2" ) {  ?>
                            <li>
                              <a href="<?php echo base_url() ?>index.php/inicioTrabajadores">
                                <i class="fa fa-users"></i> Trabajadores
                              </a>
                            </li>
                          <?php } ?>

                            <?php  if ( $valueModulo->cf_menu == "3" ) {  ?>
                            <li>
                              <a href="<?php echo base_url() ?>index.php/inicioHistorial">
                                <i class="fa fa-archive"></i> Historial de trabajadores
                              </a>
                            </li>
                          <?php } ?>

                            <?php  if ( $valueModulo->cf_menu == "4" ) {  ?>
                            <li>
                              <a href="<?php echo base_url() ?>index.php/inicioGestorContratos">
                                <i class="fa fa-file"></i> Generar contrato
                              </a>
                            </li>
                          <?php } ?>


                          <?php  if ( $valueModulo->cf_menu == "5" ) {  ?>
                            <li>
                              <a href="<?php echo base_url() ?>index.php/inicioGestorAnexos">
                                <i class="fa fa-file"></i> Generar anexo
                              </a>
                            </li>
                          <?php } ?>

                          <?php  if ( $valueModulo->cf_menu == "6" ) {  ?>
                            <li><a><i class="fa fa-shield"></i> Permisos <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                              <li><a href="<?php echo base_url() ?>index.php/inicioPermisosPerfil">Perfiles</a></li>
                              <li><a href="<?php echo base_url() ?>index.php/inicioPermisosUsuario">Usuarios</a></li>
                            </ul>
                          <?php } ?>




                        <?php  if ( $valueModulo->cf_menu == "7") {  ?>
                          <li><a><i class="fa fa-folder-open"></i> Documentos <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                              <?php foreach ($permisos as $key => $valuePermiso) {  ?>

                                <?php  if ( $valuePermiso->cf_existencia_permiso == "84") {  ?>
                                  <li><a href="<?php echo base_url() ?>index.php/inicioLiquidaciones">Liquidaciones</a></li>
                                <?php } ?>

                                <?php  if ( $valuePermiso->cf_existencia_permiso == "55") {  ?>
                                  <li><a href="<?php echo base_url() ?>index.php/inicioContratos">Contratos</a></li>
                                <?php } ?>

                                <?php  if ( $valuePermiso->cf_existencia_permiso == "58") {  ?>
                                  <li><a href="<?php echo base_url() ?>index.php/inicioTransferencias">Transferencias</a></li>
                                <?php } ?>

                                <?php  if ( $valuePermiso->cf_existencia_permiso == "61") {  ?>
                                  <li><a href="<?php echo base_url() ?>index.php/inicioCartasAmonestacion">Cartas de amonestación</a></li>
                                <?php } ?>

                                <?php  if ( $valuePermiso->cf_existencia_permiso == "64") {  ?>
                                  <li><a href="<?php echo base_url() ?>index.php/perfilOcupacionalVista">Perfiles Ocupacionales</a></li>
                                <?php } ?>

                              <?php } ?>
                            </ul>
                          </li>
                        <?php } ?>


                        <?php  if ( $valueModulo->cf_menu == "8") {  ?>
                          <li><a><i class="fa fa-user"></i> Perfiles Ocupacionales <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">

                              <?php foreach ($permisos as $key => $valuePermiso) {  ?>

                                <?php  if ( $valuePermiso->cf_existencia_permiso == "39") {  ?>
                                  <li><a href="<?php echo base_url() ?>index.php/inicioRequisitosMinimos">Requisitos Mínimos</a></li>
                                <?php } ?>

                                <?php  if ( $valuePermiso->cf_existencia_permiso == "42") {  ?>
                                  <li><a href="<?php echo base_url() ?>index.php/inicioFunciones">Funciones</a></li>
                                <?php } ?>

                                <?php  if ( $valuePermiso->cf_existencia_permiso == "45") {  ?>
                                  <li><a href="<?php echo base_url() ?>index.php/inicioCompetencias">Competencias y Características</a></li>
                                <?php } ?>

                                <?php  if ( $valuePermiso->cf_existencia_permiso == "48") {  ?>
                                  <li><a href="<?php echo base_url() ?>index.php/inicioConocimientos">Conocimientos Básicos</a></li>
                                <?php } ?>

                                <?php  if ( $valuePermiso->cf_existencia_permiso == "51") {  ?>
                                  <li><a href="<?php echo base_url() ?>index.php/inicioOtros">Otros Antecedentes</a></li>
                                <?php } ?>

                              <?php } ?>

                            </ul>
                          </li>
                        <?php } ?>


                        <?php  if ( $valueModulo->cf_menu == "9") {  ?>
                          <li><a><i class="fa fa-building"></i> Mantenedores <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">

                              <?php foreach ($permisos as $key => $valuePermiso) {  ?>

                                <?php  if ( $valuePermiso->cf_existencia_permiso == "1") {  ?>
                                  <li><a href="<?php echo base_url() ?>index.php/inicioCargos">Cargos</a></li>
                                <?php } ?>

                                <?php  if ( $valuePermiso->cf_existencia_permiso == "6") {  ?>
                                  <li><a href="<?php echo base_url() ?>index.php/inicioCiudades">Ciudades</a></li>
                                <?php } ?>

                                <?php  if ( $valuePermiso->cf_existencia_permiso == "9") {  ?>
                                  <li><a href="<?php echo base_url() ?>index.php/inicioEmpresa">Empresas</a></li>
                                <?php } ?>

                                <?php  if ( $valuePermiso->cf_existencia_permiso == "13") {  ?>
                                  <li><a href="<?php echo base_url() ?>index.php/inicioEstadosCiviles">Estado Civil</a></li>
                                <?php } ?>

                                <?php  if ( $valuePermiso->cf_existencia_permiso == "16") {  ?>
                                  <li><a href="<?php echo base_url() ?>index.php/inicioEstadoContrato">Estados de contrato</a></li>
                                <?php } ?>

                                <?php  if ( $valuePermiso->cf_existencia_permiso == "20") {  ?>
                                  <li><a href="<?php echo base_url() ?>index.php/inicioNacionalidades">Nacionalidades</a></li>
                                <?php } ?>

                                <?php  if ( $valuePermiso->cf_existencia_permiso == "24") {  ?>
                                  <li><a href="<?php echo base_url() ?>index.php/inicioSalud">Previsión de salud</a></li>
                                <?php } ?>

                                <?php  if ( $valuePermiso->cf_existencia_permiso == "28") {  ?>
                                  <li><a href="<?php echo base_url() ?>index.php/inicioPrevision">Previsión</a></li>
                                <?php } ?>

                                <?php  if ( $valuePermiso->cf_existencia_permiso == "32") {  ?>
                                  <li><a href="<?php echo base_url() ?>index.php/inicioSucursales">Sucursales</a></li>
                                <?php } ?>

                                <?php  if ( $valuePermiso->cf_existencia_permiso == "79") {  ?>
                                  <li><a href="<?php echo base_url() ?>index.php/inicioUsuarios">Usuarios</a></li>
                                <?php } ?>

                              <?php } ?>


                            </ul>
                          </li>
                        <?php } ?>


                      <?php } ?>



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
                    <!-- <img src="<?php echo base_url() ?>assets/production/images/img.jpg" alt=""> -->
                    Bienvenido
                    <?php echo $usuario[0]->atr_nombre ?>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="<?php echo base_url() ?>index.php/miPerfil"><i class="fa fa-user pull-right"></i> Mi perfil</a>
                    <!-- <a class="dropdown-item"  href="javascript:;"> <i class="fa fa-user pull-right"></i>Mi perfil</a> -->
                    <a class="dropdown-item"  href="<?php echo base_url() ?>index.php/login"><i class="fa fa-sign-out pull-right"></i> Cerrar Sesión</a>
                  </div>
                </li>

              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
