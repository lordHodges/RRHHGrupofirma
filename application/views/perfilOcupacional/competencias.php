<?php
$data = $this->session->userdata("datos");
$usuario =  $data['usuario'];
$permisos =  $data['permisos'];
?>

<?php
$view_verCompetencia = 0; $view_crearCompetencia = 0;  $view_eliminarCompetencia = 0;
foreach ($permisos as $key => $value) {
  if ($value->cf_existencia_permiso == "45") { $view_verCompetencia = "1"; } else
  if ($value->cf_existencia_permiso == "46") { $view_crearCompetencia = "1"; } else
  if ($value->cf_existencia_permiso == "47") { $view_eliminarCompetencia = "1"; }
}

if($usuario[0]->atr_activo == "1" ) { ?>
<div class="right_col" role="main">
    <!-- Contenedor principal -->
    <div class="x_content">
      <h3 class="text-center">COMPETENCIAS Y CARACTERÍSTICAS</h3>
      <div class="col-md-6">
          <br>
          <label for="getSelectCargo">CARGO</label><br>
          <select class="custom-select" id="getSelectCargo">

          </select>
      </div>

      <div class="col-md-12">
        <label style="margin-top:20px">LISTADO DE COMPETENCIAS Y CARACTERÍSTICAS</label>
      </div>

      <!-- boton de agregar nuev input -->
      <?php if ( $view_crearCompetencia == 1 ) {  ?>
      <div class="container">
        <div class="col-md-12" visible="false" >
          <div class="col-md-1">
            <button type="button" class="btn modidev-btn btn-sm center" style="display:none" id="btnAgregarCompetencia" >
              <i class="glyphicon glyphicon-plus"></i>
            </button>
          </div>
        </div>


        <div class="col-md-12" visible="false" >
          <div class="col-md-3" >
              <button type="button" class="btn modidev-btn btn-sm" id="btnAgregarListaDeCompetencias">GUARDAR</button>
          </div>
        </div>
      </div>
      <?php } ?>


      <!-- Listado de tareas para llenar -->
      <div id="competencias">

      </div>
      <br>

      <br>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12" id="ocultarTabla">

            <?php if ($view_verCompetencia == "1") {  ?>
            <table id="tabla_competencias"
                   class="table table-striped table-bordered table-hover dataTables-competencias"
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
    <script src="<?php echo base_url() ?>assets/js/perfilesOcupacionales/competencias.js"></script>
    <!-- Toast -->
    <script src="<?php echo base_url() ?>assets/js/toastr.min.js" type="text/javascript"></script>
    <!-- Autocompletado -->
    <script src="<?php echo base_url() ?>assets/js/jquery-ui.js" type="text/javascript"></script>
    <!-- SweetAlert -->
    <script src="<?php echo base_url() ?>assets/js/sweetalert2@9.js" type="text/javascript"></script>

    <script src="<?php echo base_url() ?>assets/js/dashboard.js"></script>


    <script>
      $(document).ready(function() {
          getSelectCargos();
          autocompleteCompetencias();
          cargarNotificaciones();
          document.getElementById('btnAgregarListaDeCompetencias').style.display = 'none';
          document.getElementById('ocultarTabla').style.display = 'none';

          var permisoExportar = "no";
          <?php if( $view_eliminarCompetencia == 1 ){  ?>
              permisoExportar = "si";
              $("#permisoEliminar").text("si");
          <?php } ?>
      });

      $("#btnAgregarCompetencia").click(function (e){
          e.preventDefault();
          agregarCompetencia();
      });

      $("#getSelectCargo").change(function (e){
          e.preventDefault();
          //limpio campos
          $("#competencias").empty();
          //oculto el boton de guardar
          document.getElementById('btnAgregarListaDeCompetencias').style.display = 'none';
          document.getElementById('btnAgregarCompetencia').removeAttribute("style");
          document.getElementById('ocultarTabla').removeAttribute("style");

          var cargo = $("#getSelectCargo").val();

          var permisoEliminar = $("#permisoEliminar").text("si");
          cargarTabla(cargo, permisoEliminar);
      });

      $("#btnAgregarListaDeCompetencias").click(function (e){
          e.preventDefault();
          agregarListaDeCompetencias();
      });

      $("body").on("click", "#btnEliminarCompetencias", function(e) {

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
              var idCompetencia = $(id).text();
              eliminarCompetencia(idCompetencia);
            }
          })

         });
  </script>



<?php } else{ header("Location: http://10.10.11.240/GRUPOFIRMA/"); } ?>

</body>
</html>
