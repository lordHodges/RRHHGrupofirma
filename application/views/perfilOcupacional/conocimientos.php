<?php
$data = $this->session->userdata("datos");
$usuario =  $data['usuario'];
$permisos =  $data['permisos'];
?>

<?php
$view_verConocimiento = 0;
$view_crearConocimiento = 0;
$view_eliminarConocimiento = 0;
foreach ($permisos as $key => $value) {
  if ($value->cf_existencia_permiso == "48") {
    $view_verConocimiento = "1";
  } else
  if ($value->cf_existencia_permiso == "49") {
    $view_crearConocimiento = "1";
  } else
  if ($value->cf_existencia_permiso == "50") {
    $view_eliminarConocimiento = "1";
  }
}

if ($usuario[0]->atr_activo == "1") { ?>
  <div class="right_col" role="main">
    <!-- Contenedor principal -->
    <div class="x_content">
      <h3 class="text-center">CONOCIMIENTOS BÁSICOS</h3>
      <div class="col-md-6">
        <br>
        <label for="getSelectCargo">CARGO</label><br>
        <select class="custom-select" id="getSelectCargo">

        </select>
      </div>

      <div class="col-md-12">
        <label style="margin-top:20px">LISTADO DE CONOCIMIENTOS BÁSICOS</label>
      </div>

      <!-- boton de agregar nuev input -->
      <?php if ($view_crearConocimiento == 1) {  ?>
        <div class="container">
          <div class="col-md-12" visible="false">
            <div class="col-md-1">
              <button type="button" class="btn modidev-btn btn-sm center" id="btnAgregarConocimiento">
                <i class="glyphicon glyphicon-plus"></i>
              </button>
            </div>
          </div>

          <div class="col-md-12">
            <div class="col-md-3">
              <button type="button" class="btn modidev-btn btn-sm" id="btnAgregarListaDeConocimientos">GUARDAR</button>
            </div>
          </div>
        </div>
      <?php } ?>


      <!-- Listado de tareas para llenar -->
      <div id="conocimientos">

      </div>

      <br>

      <br>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12" id="ocultarTabla">

            <?php if ($view_verConocimiento == "1") {  ?>
              <table id="tabla_conocimientos" class="table table-striped table-bordered table-hover dataTables-conocimientos" style="margin-top:20px; width:100%">
                <thead>
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
  <script src="<?php echo base_url();   ?>assets/vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?php echo base_url();   ?>assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Datatables -->
  <script src="<?php echo base_url();   ?>assets/js/datatables.min.js" type="text/javascript"></script>
  <!-- Custom Theme Scripts -->
  <script src="<?php echo base_url();   ?>assets/build/js/custom.min.js"></script>
  <!-- JS PROPIOS -->
  <script src="<?php echo base_url();   ?>assets/js/modidev.js"></script>
  <script src="<?php echo base_url();   ?>assets/js/perfilesOcupacionales/conocimientos.js"></script>
  <!-- Toast -->
  <script src="<?php echo base_url();   ?>assets/js/toastr.min.js" type="text/javascript"></script>
  <!-- Autocompletado -->
  <script src="<?php echo base_url();   ?>assets/js/jquery-ui.js" type="text/javascript"></script>
  <!-- SweetAlert -->
  <script src="<?php echo base_url();   ?>assets/js/sweetalert2@9.js" type="text/javascript"></script>

  <script src="<?php echo base_url();   ?>assets/js/dashboard.js"></script>


  <script>
    $(document).ready(function() {
      getSelectCargos();
      document.getElementById('ocultarTabla').style.display = 'none';
      // cargarNotificaciones();
      document.getElementById('btnAgregarListaDeConocimientos').style.display = 'none';

      var permisoEliminar = "no";
      <?php if ($view_eliminarConocimiento == 1) {  ?>
        permisoEliminar = "si";
        $("#permisoEliminar").text("si");
      <?php } ?>
    });

    $("#btnAgregarConocimiento").click(function(e) {
      e.preventDefault();
      agregarConocimiento();
    });

    $("#getSelectCargo").change(function(e) {
      e.preventDefault();
      //limpio campos
      $("#conocimientos").empty();
      //oculto el boton de guardar
      document.getElementById('btnAgregarListaDeConocimientos').style.display = 'none';

      var cargo = $("#getSelectCargo").val();
      var permisoEliminar = $("#permisoEliminar").text();
      cargarTabla(cargo, permisoEliminar);
      document.getElementById('ocultarTabla').style.display = 'block';
    });

    $("#btnAgregarListaDeConocimientos").click(function(e) {
      e.preventDefault();
      agregarListaDeConocimientos();
    });

    $("body").on("click", "#btnEliminarConocimiento", function(e) {
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
          var id_conocimiento = $(id).text();
          eliminarConocimiento(id_conocimiento);
        }
      })

    });
  </script>


<?php } else {
  header("Location: http://www.imlchile.cl/dev_test/grupofirma");
} ?>


</body>

</html>