<?php
$data = $this->session->userdata("datos");
$usuario =  $data['usuario'];
$permisos =  $data['permisos'];
?>

<?php
$view_verFuncion = 0; $view_crearFuncion = 0; $view_eliminarFuncion = 0;
foreach ($permisos as $key => $value) {
  if ($value->cf_existencia_permiso == "42") { $view_verFuncion = "1"; } else
  if ($value->cf_existencia_permiso == "43") { $view_crearFuncion = "1"; } else
  if ($value->cf_existencia_permiso == "44") { $view_eliminarFuncion = "1"; }
}

if($usuario[0]->atr_activo == "1" ) { ?>

<div class="right_col" role="main">
    <!-- Contenedor principal -->
    <div class="x_content">
      <h3 class="text-center">FUNCIONES</h3>
      <div class="col-md-6">
          <br>
          <label for="getSelectCargo">CARGO</label><br>
          <select class="custom-select" id="getSelectCargo">

          </select>
      </div>

      <div class="col-md-12">
        <label style="margin-top:20px">LISTADO DE FUNCIONES</label>
      </div>

      <!-- boton de agregar nuev input -->
      <div class="container">
        <?php if ( $view_crearFuncion == 1 ) {  ?>
        <div class="col-md-12" visible="false" >
          <div class="col-md-1">
            <button type="button" class="btn modidev-btn btn-sm center" style="display:none" id="btnAgregarTarea" >
              <i class="glyphicon glyphicon-plus"></i>
            </button>
          </div>
        </div>
       <?php } ?>

        <div class="col-md-12" visible="false" >
          <div class="col-md-3" >
              <button type="button" class="btn modidev-btn btn-sm" id="btnAgregarListaDeTareas">GUARDAR</button>
          </div>
        </div>
      </div>


      <!-- Listado de tareas para llenar -->
      <div id="tareas">

      </div>
      <br>

      <br>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12" id="ocultarTabla">

            <?php if ($view_verFuncion == "1") {  ?>
            <table id="tabla_funciones"
                   class="table table-striped table-bordered table-hover dataTables-funciones" style="margin-top:20px; width:100%">
                <thead >
                    <tr style="width:100%;">
                        <th class="text-center" style="width:5%;">ID</th>
                        <th class="text-center" style="width:100%;">DESCRIPCIÓN</th>
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
    <script src="<?php echo base_url() ?>assets/js/perfilesOcupacionales/funciones.js"></script>
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
          cargarNotificaciones();
          document.getElementById('btnAgregarListaDeTareas').style.display = 'none';
          document.getElementById('btnAgregarTarea').removeAttribute("style");  //ESTE SIRVE PARA MOSTRAR EL BOTON
          document.getElementById('ocultarTabla').style.display = 'none';

          var permisoEliminar = "no";
          <?php if( $view_eliminarFuncion == 1){  ?>
              permisoEliminar = "si";
              $("#permisoEliminar").text("si");
          <?php } ?>

      $("#btnAgregarTarea").click(function (e){
          e.preventDefault();
          agregarTarea();
      });

      $("#getSelectCargo").change(function (e){
          e.preventDefault();
          //limpio campos
          $("#tareas").empty();
          //oculto el boton de guardar
          document.getElementById('btnAgregarListaDeTareas').style.display = 'none';
          document.getElementById('ocultarTabla').removeAttribute("style");

          var cargo = $("#getSelectCargo").val();
          // var table = $('#tabla_funciones').DataTable();
          // table.destroy();
          var permisoEliminar = $("#permisoEliminar").text();
          ("resultado es:"+permisoEliminar);
          cargarTabla(cargo,permisoEliminar );
          });
      });

      $("#btnAgregarListaDeTareas").click(function (e){
          e.preventDefault();
          agregarListaDeTareas();

      });

      $("body").on("click", "#btnEliminarTarea", function(e) {

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
            var idTarea = $(id).text();
            eliminarTarea(idTarea);
          }
        })

       });
  </script>




<?php } else{ header("Location: http://localhost/RRHH-FIRMA/"); } ?>

</body>
</html>
