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


      <!-- Listado de tareas para llenar -->
      <div id="competencias">

      </div>

      <!-- Listado de tareas para llenar -->
      <div id="competenciasIngresadas">

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
    <script src="<?php echo base_url() ?>assets/js/perfilesOcupacionales/competencias.js"></script>
    <!-- Toast -->
    <script src="<?php echo base_url() ?>assets/js/toastr.min.js" type="text/javascript"></script>
    <!-- Autocompletado -->
    <script src="<?php echo base_url() ?>assets/js/jquery-ui.js" type="text/javascript"></script>


    <script>
      $(document).ready(function() {
          getSelectCargos();
          autocompleteCompetencias();
          document.getElementById('btnAgregarListaDeCompetencias').style.display = 'none';
      });

      $("#btnAgregarCompetencia").click(function (e){
          e.preventDefault();
          agregarCompetencia();
      });

      $("#getSelectCargo").change(function (e){
          e.preventDefault();
          //limpio campos
          $("#competenciasIngresadas").empty();
          $("#competencias").empty();
          //oculto el boton de guardar
          document.getElementById('btnAgregarListaDeCompetencias').style.display = 'none';
          cargarCompetencias();
      });

      $("#btnAgregarListaDeCompetencias").click(function (e){
          e.preventDefault();
          agregarListaDeCompetencias();
      });


  </script>




  </body>
</html>
