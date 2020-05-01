<?php
$data = $this->session->userdata("datos");
$usuario =  $data['usuario'];
$perfil =  $data['perfil'];
?>

<?php if($usuario[0]->atr_activo == "1") { ?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h3 class="text-center"><?php echo $perfil[0]->atr_nombre ?></h3>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-12 col-sm-12  profile_left">
                      <!-- <div class="profile_img">
                        <div id="crop-avatar">
                          <img class="img-responsive avatar-view" src="images/picture.jpg" alt="Avatar" title="Change the avatar">
                        </div>
                      </div> -->

                      <div class="col-md-6">
                          <br>
                          <label for="nombre">NOMBRE DE USUARIO</label>
                          <input type="text" class="form-control custom-input-sm" id="name" value="<?php echo $usuario[0]->atr_nombre ?>">
                      </div>

                      <div class="col-md-6">
                          <br>
                          <label for="nombre">CORREO ELECTRÓNICO</label>
                          <input type="text" class="form-control custom-input-sm" id="email" disabled value="<?php echo $usuario[0]->atr_correo ?>">
                      </div>

                      <div class="col-md-6">
                          <br>
                          <label for="nombre">NUEVA CONTRASEÑA</label>
                          <input type="password" class="form-control custom-input-sm" id="pass1">
                      </div>

                      <div class="col-md-6">
                          <br>
                          <label for="nombre">CONFIRMAR CONTRASEÑA</label>
                          <input type="password" class="form-control custom-input-sm" id="pass2">
                      </div>

                      <br>


                      <div class="col-md-12" style="margin-top:30px;">
                          <button type="submit" class="btn btn-success btn-sm" style="width:100%" id="btnEditarPerfil">Guardar</button>
                      </div>

                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->



        <!-- jQuery -->
        <script src="<?php echo base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
       <script src="<?php echo base_url() ?>assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url() ?>assets/vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="<?php echo base_url() ?>assets/vendors/nprogress/nprogress.js"></script>
        <!-- morris.js -->
        <script src="<?php echo base_url() ?>assets/vendors/raphael/raphael.min.js"></script>
        <script src="<?php echo base_url() ?>assets/vendors/morris.js/morris.min.js"></script>
        <!-- bootstrap-progressbar -->
        <script src="<?php echo base_url() ?>assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="<?php echo base_url() ?>assets/vendors/moment/min/moment.min.js"></script>
        <script src="<?php echo base_url() ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

        <!-- Custom Theme Scripts -->
        <script src="<?php echo base_url() ?>assets/build/js/custom.min.js"></script>



    <?php } else{ header("Location: http://localhost/RRHH-FIRMA/"); } ?>


  </body>
  </html>
