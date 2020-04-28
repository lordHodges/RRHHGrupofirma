<!DOCTYPE html>
<html class="no-js" lang="en">
	<head>

		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Medz - Medical Directory HTML Template">
		<meta name="author" content="Spruko Technologies Private Limited">
		<meta name="keywords" content="appointments, booking, bootstrap list template,  directory listing html template,  directory website template, doctor directory, doctor search, health template, healthcare directory, hospital,  html css templates, html directory listing, listing, medical bootstrap template, medical directory, medical html template , medical template,  medical web templates, medical website templates, pharma website templates, responsive html template,template html css, online directory website,  html5 template, themeforest html,  online directory, simple html templates ">

		<!-- Favicon -->
		<link rel="icon" href="<?php echo base_url() ?>assets/login/images/brand/favicon.ico" type="image/x-icon"/>
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() ?>assets/login/images/brand/favicon.ico" />

		<!-- Title -->
		<title>FIRMA DE ABOGADOS</title>

		<!-- Bootstrap Css -->
		<link href="<?php echo base_url() ?>assets/login/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

		<!-- Style Css -->
		<link href="<?php echo base_url() ?>assets/login/css/style.css" rel="stylesheet" />
		<link href="<?php echo base_url() ?>assets/login/css/admin-custom.css" rel="stylesheet" />

		<!-- Sidemenu Css -->
		<link href="<?php echo base_url() ?>assets/login/plugins/sidemenu/sidemenu.css" rel="stylesheet" />

		<!-- Custom scroll bar css-->
		<link href="<?php echo base_url() ?>assets/login/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet" />

		<!--Icons  Css -->
		<link href="<?php echo base_url() ?>assets/login/css/icons.css" rel="stylesheet">

		<!--Color-Skin Css -->
		<link href="<?php echo base_url() ?>assets/login/color-skins/color10.css" id="theme" media="all" rel="stylesheet">

		<!-- Toastr -->
		<link href="<?php echo base_url() ?>assets/css/toastr.min.css" rel="stylesheet" type="text/css" />

		<style media="screen">
			body{
				background-image: url(../assets/login/images/media/photos/construction.jpg);
				background-position: center;
				background-size: cover;
				background-attachment: fixed;
			}
		</style>
	</head>



	<body>

		<!--Loader-->
		<div id="global-loader">
			<img alt="" class="loader-img" src="<?php echo base_url() ?>assets/login/images/loader.svg">
		</div>
		<!--/Loader-->

		<!--Page-->
		<div class="page page-h">
			<div class="page-content z-index-10">
				<div class="container">
					<div class="row">
						<div class="col-xl-4 col-md-12 col-md-12 d-block mx-auto">
							<div class="card mb-0">
								<div class="card-header">
									<h3 class="card-title">Iniciar sesión</h3>
								</div>
								<div class="card-body">
									<div class="form-group">
										<label class="form-label text-dark">Correo electrónico</label>
										<input type="email" class="form-control" id="correoGrupoFirma" placeholder="ejemplo@grupofirma.cl">
									</div>
									<div class="form-group">
										<label class="form-label text-dark">Clave</label>
										<input type="password" class="form-control"  id="claveCuenta">
									</div>
									<!-- <div class="form-group">
										<label class="custom-control custom-checkbox">
											<a href="forgot-password.html" class="float-right small text-dark mt-1">I forgot password</a>
											<input type="checkbox" class="custom-control-input">
											<span class="custom-control-label text-dark">Remember me</span>
										</label>
									</div> -->
									<div class="form-footer mt-2">
										<button id="btnIniciarSesion" class="btn btn-primary btn-block" style="background:#1ab596; border:none">Ingresar</button>
									</div>
									<div class="text-center  mt-3 text-dark">
										Si no tienes una cuenta el administrador debe crearla.
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/Page-->

		<!-- JQuery js-->
		<script src="<?php echo base_url() ?>assets/login/js/jquery-3.2.1.min.js"></script>

		<!-- Bootstrap js -->
		<script src="<?php echo base_url() ?>assets/login/plugins/bootstrap/js/popper.min.js"></script>
		<script src="<?php echo base_url() ?>assets/login/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!--JQueryVehiclerkline Js-->
		<script src="<?php echo base_url() ?>assets/login/js/jquery.sparkline.min.js"></script>

		<!-- Circle Progress Js-->
		<script src="<?php echo base_url() ?>assets/login/js/circle-progress.min.js"></script>

		<!-- Star Rating Js-->
		<script src="<?php echo base_url() ?>assets/login/plugins/rating/jquery.rating-stars.js"></script>

		<!-- Custom scroll bar Js-->
		<script src="<?php echo base_url() ?>assets/login/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

		<!-- Fullside-menu Js-->
		<script src="<?php echo base_url() ?>assets/login/plugins/sidemenu/sidemenu.js"></script>

		<!--Counters -->
		<script src="<?php echo base_url() ?>assets/login/plugins/counters/counterup.min.js"></script>
		<script src="<?php echo base_url() ?>assets/login/plugins/counters/waypoints.min.js"></script>

		<!-- Toast -->
    <script src="<?php echo base_url() ?>assets/js/toastr.min.js" type="text/javascript"></script>

		<!-- Custom Js-->
		<script src="<?php echo base_url() ?>assets/login/js/admin-custom.js"></script>


		<script type="text/javascript">
				$("body").on("click", "#btnIniciarSesion", function(e) {
					var correo = $("#correoGrupoFirma").val();
					var clave = $("#claveCuenta").val();

					$.ajax({
							url: 'iniciarSesion',
							type: 'POST',
							dataType: 'json',
							data: { "correo":correo, "clave":clave }
					}).then(function (msg) {
						if (msg == 'ok') {
							toastr.success("Datos correctos");
							// setTimeout(function(){
									window.location="http://10.10.11.240/RRHH-FIRMA/index.php/dashboard";
							// },1500);
						}else {
							if (msg == 'inactivo') {
								toastr.error("Usuario bloqueado");
							}else{
									toastr.error("Datos incorrectos");
							}
						}
					});
				});
		</script>



	</body>
</html>
