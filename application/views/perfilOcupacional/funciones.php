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
        <div class="col-md-12" visible="false" >
          <div class="col-md-1">
            <button type="button" class="btn modidev-btn btn-sm center" style="display:none" id="btnAgregarTarea" >
              <i class="glyphicon glyphicon-plus"></i>
            </button>
          </div>
        </div>

        <div class="col-md-12" visible="false" >
          <div class="col-md-3" >
              <button type="button" class="btn modidev-btn btn-sm" id="btnAgregarListaDeTareas">GUARDAR</button>
          </div>
        </div>
      </div>


      <!-- Listado de tareas para llenar -->
      <div id="tareas">

      </div>

      <!-- Listado de tareas para llenar -->
      <div id="tareasIngresadas">

      </div>





    </div>


</div>

    <!-- /Contenedor principal-->

    <!-- footer content -->
    <footer>
        <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->



    <!-- jQuery -->
    <script src="<?php echo base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url() ?>assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url() ?>assets/build/js/custom.min.js"></script>
    <!-- JS PROPIOS -->
    <script src="<?php echo base_url() ?>assets/js/modidev.js"></script>
    <script src="<?php echo base_url() ?>assets/js/perfilesOcupacionales/funciones.js"></script>
    <!-- Toast -->
    <script src="<?php echo base_url() ?>assets/js/toastr.min.js" type="text/javascript"></script>
    <!-- Autocompletado -->
    <script src="<?php echo base_url() ?>assets/js/jquery-ui.js" type="text/javascript"></script>


    <script>
      $(document).ready(function() {
          getSelectCargos();
          autocompleteTareas();
          document.getElementById('btnAgregarListaDeTareas').style.display = 'none';
          // cargarTareas();
          // bloquearBoton();
      });

      $("#btnAgregarTarea").click(function (e){
          e.preventDefault();
          agregarTarea();
      });

      $("#getSelectCargo").change(function (e){
          e.preventDefault();
          //limpio campos
          $("#tareasIngresadas").empty();
          $("#tareas").empty();
          //oculto el boton de guardar
          document.getElementById('btnAgregarListaDeTareas').style.display = 'none';
          cargarTareas();
      });

      $("#btnAgregarListaDeTareas").click(function (e){
          e.preventDefault();
          agregarListaDeTareas();
      });


  </script>




  </body>
</html>
