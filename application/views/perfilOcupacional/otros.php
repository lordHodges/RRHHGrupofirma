<?php
$data = $this->session->userdata("datos");
$usuario =  $data['usuario'];
$permisos =  $data['permisos'];
?>

<?php
$view_verOtro = 0; $view_crearOtro = 0; $view_eliminarOtro = 0; $view_crearOtroTitulo = 0;
foreach ($permisos as $key => $value) {
  if ($value->cf_existencia_permiso == "51") { $view_verOtro = "1"; } else
  if ($value->cf_existencia_permiso == "52") { $view_crearOtro = "1"; } else
  if ($value->cf_existencia_permiso == "54") { $view_crearOtroTitulo = "1"; } else
  if ($value->cf_existencia_permiso == "53") { $view_eliminarOtro = "1"; }
}

if($usuario[0]->atr_activo == "1" ) { ?>
<div class="right_col" role="main">
    <!-- Contenedor principal -->
    <div class="x_content">
      <h3 class="text-center">OTROS</h3>
      <div class="col-md-6">
          <br>
          <label for="getSelectCargo">CARGO
            <!-- Este boton solo es para dejar en línea los inputs -->
            <?php if ( $view_crearOtroTitulo == 1 ) {  ?>
            <button type="button" class="btn modidev-btn btn-sm center"style="background:#f7f7f7" >
              <i class="glyphicon glyphicon-plus" style="color:#f7f7f7"></i>
            </button>
            <?php } ?>
          </label>
          <select class="custom-select" id="getSelectCargo">

          </select>
      </div>

      <div class="col-md-6">
          <br>
          <label for="getSelectTitulos">TITULO DE OTROS ANTECEDENTES

              <?php if ( $view_crearOtroTitulo == 1 ) {  ?>
              <button type="button" class="btn modidev-btn btn-sm center" id="btnAbrirModalCrear"  data-toggle="modal" data-target="#modalCrearTitulo">
                <i class="glyphicon glyphicon-plus"></i>
              </button>
              <?php } ?>

          </label>
          <select class="custom-select" id="getSelectTitulos">

          </select>

      </div>

      <div class="col-md-12">
        <label style="margin-top:20px">LISTADO</label>
      </div>

      <!-- boton de agregar nuev input -->

      <?php if ($view_crearOtro == "1") {  ?>
      <div class="container">
        <div class="col-md-12" visible="false" >
          <div class="col-md-1">
            <button type="button" class="btn modidev-btn btn-sm center" style="display:none" id="btnAgregarOtrosAntecedentes" >
              <i class="glyphicon glyphicon-plus"></i>
            </button>
          </div>
        </div>

        <div class="col-md-12" visible="false" >
          <div class="col-md-3" >
              <button type="button" class="btn modidev-btn btn-sm" id="btnAgregarListaDeOtrosAntecedentes">GUARDAR</button>
          </div>
        </div>
      </div>
    <?php } ?>




      <!-- Listado de tareas para llenar -->
      <div id="otros">

      </div>

      <br>

      <br>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12" id="ocultarTabla">

            <?php if ($view_verOtro == "1") {  ?>
            <table id="tabla_otrosAntecedentes"
                   class="table table-striped table-bordered table-hover dataTables-otrosAntecedentes"
                   style="margin-top:20px; width:100%">
                <thead >
                    <tr style="width:100%;">
                        <th class="text-center" style="width:10%;">ID</th>
                        <th class="text-center">DESCRIPCIÓN</th>
                        <th class="text-center" style="width:5%;">ACCIONES</th>
                    </tr>
                </thead>
                <tbody id="tbodyDetalle">

                </tbody>
            </table>
          <?php } ?>


          </div>
        </div>
      </div>





    </div>


</div>


<!-- Modal crear -->
<div id="modalCrearTitulo" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="padding:20px; background: #2a3f54" >
            <div class="form-row">
                <h5 class="modal-title mx-auto">INGRESAR NUEVO TÍTULO</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="col-md-12">
                    <br>
                    <label for="nombre">NOMBRE</label>
                    <input type="text" class="form-control custom-input-sm" id="nombre" >
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-success btn-sm" id="btnAgregarTitulo">Guardar</button>
        </div>
    </div>
</div>
<!-- /Modal de crear -->

<!-- /Contenedor principal-->

    <!-- footer content -->
    <footer>
        <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->


    <label id="permisoEliminar" style="display:none">no</label>



    <!-- jQuery -->
    <script src="<?php echo base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url() ?>assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Datatables -->
    <script src="<?php echo base_url() ?>assets/js/datatables.min.js" type="text/javascript"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url() ?>assets/build/js/custom.min.js"></script>
    <!-- JS PROPIOS -->
    <script src="<?php echo base_url() ?>assets/js/modidev.js"></script>
    <script src="<?php echo base_url() ?>assets/js/perfilesOcupacionales/otrosAntecedentes.js"></script>
    <!-- Toast -->
    <script src="<?php echo base_url() ?>assets/js/toastr.min.js" type="text/javascript"></script>
    <!-- Autocompletado -->
    <script src="<?php echo base_url() ?>assets/js/jquery-ui.js" type="text/javascript"></script>
    <!-- SweetAlert -->
    <script src="<?php echo base_url() ?>assets/js/sweetalert2@9.js" type="text/javascript"></script>

    <script src="<?php echo base_url() ?>assets/js/dashboard.js"></script>


    <script>
      $(document).ready(function() {
          document.getElementById('ocultarTabla').style.display = 'none';
          getSelectCargos();
          document.getElementById('btnAgregarListaDeOtrosAntecedentes').style.display = 'none';

          var permisoEliminar = "no";
          <?php if( $view_eliminarOtro == 1){  ?>
              permisoEliminar = "si";
              $("#permisoEliminar").text("si");
          <?php } ?>
      });

      $("#btnAgregarOtrosAntecedentes").click(function (e){
          e.preventDefault();
          agregarOtroAntecedente();
      });

      $("#getSelectCargo").change(function (e){
          e.preventDefault();
          getSelectTitulos();
          //limpio campos
          $("#otrosIngresados").empty();
          //oculto el boton de guardar
          document.getElementById('btnAgregarListaDeOtrosAntecedentes').style.display = 'none';
          document.getElementById('btnAgregarListaDeOtrosAntecedentes').style.display = 'none';
          // $('#btnAbrirModalCrear').attr("disabled", false);
      });

      $("#btnAgregarTitulo").click(function (e){
          e.preventDefault();
          agregarTitulo();

      });

      $("#getSelectTitulos").change(function (e){
          e.preventDefault();
          var permisoEliminar = $("#permisoEliminar").text();
          cargarTabla(permisoEliminar);
          //limpio campos
          $("#requisitosMinimos").empty();
          //oculto el boton de guardar
          document.getElementById('btnAgregarListaDeOtrosAntecedentes').style.display = 'none';
          document.getElementById('btnAgregarOtrosAntecedentes').removeAttribute("style");  //ESTE SIRVE PARA MOSTRAR EL BOTON
          document.getElementById('ocultarTabla').style.display = 'block';
      });

      $("#btnAgregarListaDeOtrosAntecedentes").click(function (e){
          e.preventDefault();
          agregarListaDeOtrosAntecedentes();
      });

      $("body").on("click", "#btnEliminarOtroAntecedente", function(e) {

          e.preventDefault();
          Swal.fire({
            title: '¿Estas seguro?',
            text: "El registro será eliminado permanentemente",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#1abb9c',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirmar',
            cancelButtonText: 'Cancelar',

          }).then((result) => {
            if (result.value) {
              var id = $(this).parent().parent().children()[0];
              var idOtroAntecedente = $(id).text();
              eliminarOtroAntecedente(idOtroAntecedente);
            }
          })
      });


  </script>





  <?php } else{ header("Location: http://10.10.11.240/RRHH-FIRMA/"); } ?>

  </body>
  </html>
