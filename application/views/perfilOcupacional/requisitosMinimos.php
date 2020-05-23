<?php
$data = $this->session->userdata("datos");
$usuario =  $data['usuario'];
$permisos =  $data['permisos'];
?>

<?php
$view_verRM = 0; $view_crearRM = 0;  $view_eliminarRM = 0;
foreach ($permisos as $key => $value) {
  if ($value->cf_existencia_permiso == "39") { $view_verRM = "1"; } else
  if ($value->cf_existencia_permiso == "40") { $view_crearRM = "1"; } else
  if ($value->cf_existencia_permiso == "41") { $view_eliminarRM = "1"; }
}

if($usuario[0]->atr_activo == "1" ) { ?>
<div class="right_col" role="main">
    <!-- Contenedor principal -->
    <div class="x_content">
      <h3 class="text-center">REQUISITOS MÍNIMOS</h3>
      <div class="col-md-6">
          <br>
          <label for="getSelectCargo">CARGO</label><br>
          <select class="custom-select" id="getSelectCargo">

          </select>
      </div>

      <div class="col-md-12">
        <label style="margin-top:20px">LISTADO DE REQUISITOS MÍNIMOS</label>
      </div>

      <!-- boton de agregar nuev input -->
      <?php if ( $view_crearRM == 1 ) {  ?>
        <div class="container">
          <div class="col-md-12" visible="false" >
            <div class="col-md-2" style="margin-bottom:10px;">
              <button type="button" class="btn modidev-btn btn-sm center" style="display:none" id="btnAgregarRequisitoMinimo" >
                <i class="glyphicon glyphicon-plus"></i>
              </button>
            </div>
          </div>


            <div class="col-md-12" visible="false" style="margin-bottom:10px;">
              <div class="col-md-3" >
                  <button type="button" class="btn modidev-btn btn-sm" id="btnAgregarListaDeRequisitosMinimos">GUARDAR</button>
              </div>
            </div>

        </div>
      <?php } ?>



      <!-- Listado de tareas para llenar -->
      <div id="requisitosMinimos">

      </div>
      <br>

      <br>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12" id="ocultarTabla">

            <?php if ($view_verRM == "1") {  ?>
              <table id="tabla_requerimientosMinimos"
                     class="table table-striped table-bordered table-hover dataTables-requerimientosMinimos"
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
    <!-- Autocompletado -->
    <script src="<?php echo base_url() ?>assets/js/jquery-ui.js" type="text/javascript"></script>
    <!-- Datatables -->
    <script src="<?php echo base_url() ?>assets/js/datatables.min.js" type="text/javascript"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url() ?>assets/build/js/custom.min.js"></script>
    <!-- JS PROPIOS -->
    <script src="<?php echo base_url() ?>assets/js/modidev.js"></script>
    <script src="<?php echo base_url() ?>assets/js/perfilesOcupacionales/requisitosMinimos.js"></script>
    <!-- Toast -->
    <script src="<?php echo base_url() ?>assets/js/toastr.min.js" type="text/javascript"></script>
    <!-- SweetAlert -->
    <script src="<?php echo base_url() ?>assets/js/sweetalert2@9.js" type="text/javascript"></script>

    <script src="<?php echo base_url() ?>assets/js/dashboard.js"></script>



    <script>
      $(document).ready(function() {
          getSelectCargos();
          autocompleteTareas();
          cargarNotificaciones();
          document.getElementById('btnAgregarListaDeRequisitosMinimos').style.display = 'none';
          document.getElementById('ocultarTabla').style.display = 'none';
          document.getElementById('btnAgregarRequisitoMinimo').removeAttribute("style");  //ESTE SIRVE PARA MOSTRAR EL BOTON

          var permisoExportar = "no";
          <?php if( $view_eliminarRM== 1 ){  ?>
              permisoExportar = "si";
              $("#permisoEliminar").text("si");
          <?php } ?>

        });

        $("#getSelectCargo").change(function (e){
            e.preventDefault();
            //limpio campos
            $("#requisitosMinimos").empty();
            //oculto el boton de guardar
            document.getElementById('btnAgregarListaDeRequisitosMinimos').style.display = 'none';
            document.getElementById('ocultarTabla').removeAttribute("style");

            var cargo = $("#getSelectCargo").val();
            var permisoEliminar = $("#permisoEliminar").text("si");
            cargarTabla(cargo, permisoEliminar);
        });

        $("#btnAgregarListaDeRequisitosMinimos").click(function (e){
            e.preventDefault();
            agregarListaDeRequisitosMinimos();
        });

        $("body").on("click", "#btnEliminarRequisitoMínimo", function(e) {

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
              var idRequisitoMinimo = $(id).text();
              eliminarRequisitoMinimo(idRequisitoMinimo);
            }
          })

         });


        $("#btnAgregarRequisitoMinimo").click(function (e){
            e.preventDefault();
            agregarRequisitoMinimo();
        });

  </script>



<<<<<<< HEAD
<?php } else{ header("Location: http://localhost/GRUPOFIRMA/"); } ?>
=======
<?php } else{ header("Location: http://10.10.10.1/grupofirma/"); } ?>
>>>>>>> 6d452e33e03ff9b08367071c515f6627be833f1a

</body>
</html>
