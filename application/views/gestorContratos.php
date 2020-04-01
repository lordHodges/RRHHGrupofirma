<div class="right_col" role="main">
    <!-- Contenedor principal -->
    <div class="x_content">
      <h3 class="text-center">GESTOR DE CONTRATOS</h3>

      <div class="col-md-12">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="" id="estandar" onclick="seleccionTabs('estandar')" data-toggle="tab" href="#estandarContent" role="tab" aria-controls="home" aria-selected="true">Formato estándar</a>
          </li>
          <li class="nav-item">
            <a class="" id="personalizado" data-toggle="tab" href="#estandarPersonalizado" role="tab" onclick="seleccionTabs('personalizado')" aria-controls="profile" aria-selected="false">Formato personalizado</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">









          <!-- TAB : FORMATO ESTÁNDAR -->
          <div class="tab-pane fade show active" id="estandarContent" role="tabpanel" aria-labelledby="estandar">
            <br>
            <div id="informacionTrabajador">
              <div class="col-md-12">
                <h4 style="color:#2a3f54"><b>I ) INFORMACIÓN DE TRABAJADOR</b></h4>
              </div>
            </div>

              <div class="col-md-6 col-sm-12">
                <br><label for="selectTrabajador1">TRABAJADOR</label><br>
                <select class="custom-select" id="selectTrabajador1">
                  <!-- se cargan los trabajadores -->
                </select>
              </div>
              <div class="col-md-6 col-sm-12">
                <br><label for="getSelectCiudad">CIUDAD EN QUE SE FIRMA CONTRATO</label><br>
                <select class="custom-select" id="getSelectCiudad">
                  <!-- se cargan las ciudades -->
                </select>
              </div>

              <div id="datosTrabajador" style="display:none">
                <div class="col-md-6 col-sm-12">
                  <br><label for="rut">RUT</label>
                  <input type="text" class="form-control" id="rut" disabled>
                </div>
                <div class="col-md-6 col-sm-12">
                  <br><label for="direccion">Direccion</label>
                  <input type="text" class="form-control" id="direccion" disabled>
                </div>
                <div class="col-md-6 col-sm-12">
                  <br><label for="afp">AFP</label>
                  <input type="text" class="form-control" id="afp" disabled>
                </div>
                <div class="col-md-6 col-sm-12">
                  <br><label for="ciudad">Ciudad</label>
                  <input type="text" class="form-control" id="ciudad" disabled>
                </div>
                <div class="col-md-6 col-sm-12">
                  <br><label for="prevision">Previsión</label>
                  <input type="text" class="form-control" id="prevision" disabled>
                </div>
                <div class="col-md-6 col-sm-12">
                  <br><label for="nacionalidad">Nacionalidad</label>
                  <input type="text" class="form-control" id="nacionalidad" disabled>
                </div>
                <div class="col-md-6 col-sm-12">
                  <br><label for="fechaNacimiento">Fecha de nacimiento</label>
                  <input type="text" class="form-control" id="fechaNacimiento" disabled>
                </div>
                <div class="col-md-6 col-sm-12">
                  <br><label for="estadoCivil">Estado civil</label>
                  <input type="text" class="form-control" id="estadoCivil" disabled>
                </div>
              </div>
            <!-- FIN INFORMACION DE TRABAJADOR -->


            <!-- EMPRESA -->
            <div id="detalleEmpresa" style="display:none">
              <div class="col-md-12">
                <br><h4 style="color:#2a3f54"><b>II ) EMPRESA</b></h4>
              </div>
              <div class="col-md-12 col-sm-12">
                <br><label for="empresa">Empresa</label>
                <input type="text" class="form-control" id="empresa" disabled>
              </div>
              <div class="col-md-6 col-sm-12">
                <br><label for="cargo">Cargo</label>
                <input type="text" class="form-control" id="cargo" disabled>
              </div>
              <div class="col-md-6 col-sm-12">
                <br><label for="jefeDirecto">Jefe(s) directo(s)</label>
                <input type="text" class="form-control" id="jefeDirecto" disabled>
              </div>
              <div class="col-md-6 col-sm-12">
                <br><label for="repre_legal">Representante legal</label>
                <input type="text" class="form-control" id="repre_legal" disabled>
              </div>
              <div class="col-md-6 col-sm-12">
                <br><label for="repre_rut">RUT de representante legal</label>
                <input type="text" class="form-control" id="repre_rut" disabled>
              </div>
            </div>
            <!-- FIN EMPRESA -->

            <!-- REMUNERACION -->
            <div id="remuneración" style="display:none">
              <div class="col-md-12">
                <br><h4 style="color:#2a3f54"><b>III ) REMUNERACIÓN</b></h4>
              </div>
              <div id="getDetalleRemuneracion">

              </div>
            </div>
            <!-- FIN REMUNERACION -->

            <!-- VIGENCIA -->
            <div id="vigencia" style="display:none">
              <div class="col-md-12">
                <br><h4 style="color:#2a3f54"><b>IV ) VIGENCIA</b></h4>
              </div>
              <div class="col-md-6">
                  <br>
                  <label for="fechaInicio">Inicio de contrato</label>
                  <input type="date" class="form-control" id="fechaInicio" required>
              </div>
              <div class="col-md-6">
                  <br>
                  <label for="terminoContrato">Termino de contrato</label>
                  <input type="date" class="form-control" id="terminoContrato" required>
              </div>
            </div>
            <!-- FIN VIGENCIA -->

            <!-- CONTRATO -->
            <div id="itemsContrato" style="display:none">
              <div class="col-md-12">
                <br><h4 style="color:#2a3f54"><b>V ) ITEMS DEL CONTRATO</b></h4>
              </div>
              <ul style="list-style:none">
                <li><h6 style="color:#49505c;">I. Partes</h6></li>
                <li><h6 style="color:#49505c;">II. Naturaleza de los servicios</h6></li>
                <li><h6 style="color:#49505c;">III. Lugar de la prestación de servicios</h6></li>
                <li><h6 style="color:#49505c;">IV. Jornada de trabajo</h6></li>
                <li><h6 style="color:#49505c;">V. Remuneraciones</h6></li>
                <li><h6 style="color:#49505c;">VI. Duración de la relación jurídica laboral</h6></li>
                <li><h6 style="color:#49505c;">VII. Cláusula de la vigencia</h6></li>
                <li><h6 style="color:#49505c;">VIII. A tener en cuenta</h6></li>
              </ul>
            </div>
            <!-- FIN CONTRATO -->

            <br>
            <button type="submit" id="btnGenerarContrato" class="btn btn-success botonLargo" style="display:none" id="btnAgregarTrabajador">GENERAR CONTRATO</button>

          </div>
































          <!-- TAB : FORMATO PERSONALIZADO -->
          <div class="tab-pane fade" id="estandarPersonalizado" role="tabpanel" aria-labelledby="personalizado">

            <br>
            <div id="informacionTrabajador2">
              <div class="col-md-12">
                <h4 style="color:#2a3f54"><b>I ) INFORMACIÓN DE TRABAJADOR</b></h4>
              </div>
            </div>

              <div class="col-md-6 col-sm-12">
                <br><label for="selectTrabajador2">TRABAJADOR</label><br>
                <select class="custom-select" id="selectTrabajador2">
                  <!-- se cargan los trabajadores -->
                </select>
              </div>
              <div class="col-md-6 col-sm-12">
                <br><label for="getSelectCiudad">CIUDAD EN QUE SE FIRMA CONTRATO</label><br>
                <select class="custom-select" id="getSelectCiudad2">
                  <!-- se cargan las ciudades -->
                </select>
              </div>

              <div id="datosTrabajador2" style="display:none">
                <div class="col-md-6 col-sm-12">
                  <br><label for="rut">RUT</label>
                  <input type="text" class="form-control" id="rut2" disabled>
                </div>
                <div class="col-md-6 col-sm-12">
                  <br><label for="direccion">Direccion</label>
                  <input type="text" class="form-control" id="direccion2" disabled>
                </div>
                <div class="col-md-6 col-sm-12">
                  <br><label for="afp">AFP</label>
                  <input type="text" class="form-control" id="afp2" disabled>
                </div>
                <div class="col-md-6 col-sm-12">
                  <br><label for="ciudad">Ciudad</label>
                  <input type="text" class="form-control" id="ciudad2" disabled>
                </div>
                <div class="col-md-6 col-sm-12">
                  <br><label for="prevision">Previsión</label>
                  <input type="text" class="form-control" id="prevision2" disabled>
                </div>
                <div class="col-md-6 col-sm-12">
                  <br><label for="nacionalidad">Nacionalidad</label>
                  <input type="text" class="form-control" id="nacionalidad2" disabled>
                </div>
                <div class="col-md-6 col-sm-12">
                  <br><label for="fechaNacimiento">Fecha de nacimiento</label>
                  <input type="text" class="form-control" id="fechaNacimiento2" disabled>
                </div>
                <div class="col-md-6 col-sm-12">
                  <br><label for="estadoCivil">Estado civil</label>
                  <input type="text" class="form-control" id="estadoCivil2" disabled>
                </div>
              </div>
            <!-- FIN INFORMACION DE TRABAJADOR -->


            <!-- EMPRESA -->
            <div id="detalleEmpresa2" style="display:none">
              <div class="col-md-12">
                <br><h4 style="color:#2a3f54"><b>II ) EMPRESA</b></h4>
              </div>
              <div class="col-md-12 col-sm-12">
                <br><label for="empresa">Empresa</label>
                <input type="text" class="form-control" id="empresa2" disabled>
              </div>
              <div class="col-md-6 col-sm-12">
                <br><label for="cargo">Cargo</label>
                <input type="text" class="form-control" id="cargo2" disabled>
              </div>
              <div class="col-md-6 col-sm-12">
                <br><label for="jefeDirecto">Jefe(s) directo(s)</label>
                <input type="text" class="form-control" id="jefeDirecto2" disabled>
              </div>
              <div class="col-md-6 col-sm-12">
                <br><label for="repre_legal">Representante legal</label>
                <input type="text" class="form-control" id="repre_legal2" disabled>
              </div>
              <div class="col-md-6 col-sm-12">
                <br><label for="repre_rut">RUT de representante legal</label>
                <input type="text" class="form-control" id="repre_rut2" disabled>
              </div>
            </div>
            <!-- FIN EMPRESA -->

            <!-- REMUNERACION -->
            <div id="remuneración2" style="display:none">
              <div class="col-md-12">
                <br><h4 style="color:#2a3f54"><b>III ) REMUNERACIÓN</b></h4>
              </div>
              <div id="getDetalleRemuneracion2">

              </div>
            </div>


            <!-- FIN REMUNERACION -->

            <!-- VIGENCIA -->
            <div id="vigencia2" style="display:none">
              <div class="col-md-12">
                <br><h4 style="color:#2a3f54"><b>IV ) VIGENCIA</b></h4>
              </div>
              <div class="col-md-6">
                  <br>
                  <label for="fechaInicio">Inicio de contrato</label>
                  <input type="date" class="form-control" id="fechaInicio2" required>
              </div>
              <div class="col-md-6">
                  <br>
                  <label for="terminoContrato">Termino de contrato</label>
                  <input type="date" class="form-control" id="terminoContrato2" required>
              </div>
            </div>
            <!-- FIN VIGENCIA -->

            <!-- CONTRATO -->
            <div id="itemsContrato2" style="display:none">
              <div class="col-md-12">
                <br><h4 style="color:#2a3f54"><b>V ) ITEMS DEL CONTRATO</b></h4>
              </div>
              <div class="row">
                <div class="col-md-12" style="margin-top:10px;">
                  <ul id="ordenable" style="list-style-type:none">

                  </ul>
                </div>
              </div>
              <button type="submit" id="boton" class="btn btn-success botonLargo" style="display:none">TESTING</button>
            </div>
            <!-- FIN CONTRATO -->

            <br>
            <button type="submit" id="btnGenerarContrato2" class="btn btn-success botonLargo" style="display:none" id="btnAgregarTrabajador">GENERAR CONTRATO</button>


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
    <script src="<?php echo base_url() ?>assets/js/contratos.js"></script>
    <!-- Toast -->
    <script src="<?php echo base_url() ?>assets/js/toastr.min.js" type="text/javascript"></script>
    <!-- SweetAlert -->
    <script src="<?php echo base_url() ?>assets/js/sweetalert2@9.js" type="text/javascript"></script>




    <script>
      $(document).ready(function() {
        cargarElementosDeContrato();
        getSelectCiudad();
        getSelectCiudad2();
        getItemsContrato();
        var elemento = document.getElementById('estandar');
        elemento.style.color = "#fafafa";
        elemento.style.backgroundColor  = "#2a3f54";

        $("#ordenable").sortable();

        $("#boton").click(function(){
  	       $("#ordenable").each(function(){
        	   alert($(this).text())
        	 });
    	  });


      });






      // SECCION DE TAB 1
      $("#selectTrabajador1").change(function (e){
          e.preventDefault();
          document.getElementById("datosTrabajador").style = "";
          document.getElementById("detalleEmpresa").style = "";
          document.getElementById("remuneración").style = "";
          document.getElementById("vigencia").style = "";
          document.getElementById("itemsContrato").style = "";
          document.getElementById("btnGenerarContrato").style = "";

          var idTrabajador = $("#selectTrabajador1").val();
          cargarDatosEsenciales(idTrabajador);
      });

      $("#selectTrabajador1").change(function (e){
          e.preventDefault();
          var idTrabajador = $("#selectTrabajador2").val();
          cargarDatosEsenciales(idTrabajador);
      });

      $("body").on("click", "#btnGenerarContrato", function(e) {
          e.preventDefault();
          var idTrabajador = $("#selectTrabajador1").val();
          var fechaInicio = $("#fechaInicio").val();
          var fechaTermino = $("#terminoContrato").val();
          var ciudadFirma = $("#ciudad").val();
          if(fechaInicio == "" || fechaInicio == null || fechaTermino == "" || fechaTermino == null){
            toastr.error("Debe llenar los campos de fecha");
          }else{
            var url = 'http://localhost/RRHH-FIRMA/index.php/docContratoEstandar?trabajador='+idTrabajador+'&&fechaInicio='+fechaInicio+'&&fechaTermino='+fechaTermino+'&&ciudadFirma='+ciudadFirma;
            window.open(url, '_blank');
          }

      });
      // FIN SECCION TAB 1










      // SECCION DE TAB 2
      $("#selectTrabajador2").change(function (e){
          e.preventDefault();
          document.getElementById("datosTrabajador2").style = "";
          document.getElementById("detalleEmpresa2").style = "";
          document.getElementById("remuneración2").style = "";
          document.getElementById("vigencia2").style = "";
          document.getElementById("itemsContrato2").style = "";
          document.getElementById("btnGenerarContrato2").style = "";

          var idTrabajador = $("#selectTrabajador2").val();
          cargarDatosEsenciales2(idTrabajador);
      });

      $("#selectTrabajador2").change(function (e){
          e.preventDefault();
          var idTrabajador = $("#selectTrabajador2").val();
          cargarDatosEsenciales2(idTrabajador);
      });

      $("body").on("click", "#btnGenerarContrato2", function(e) {
          e.preventDefault();
          var idTrabajador = $("#selectTrabajador2").val();
          var fechaInicio = $("#fechaInicio2").val();
          var fechaTermino = $("#terminoContrato2").val();
          var ciudadFirma = $("#ciudad2").val();
          if(fechaInicio == "" || fechaInicio == null || fechaTermino == "" || fechaTermino == null){
            toastr.error("Debe llenar los campos de fecha");
          }else{
            var url = 'http://localhost/RRHH-FIRMA/index.php/docContratoPersonalizado?trabajador='+idTrabajador+'&&fechaInicio='+fechaInicio+'&&fechaTermino='+fechaTermino+'&&ciudadFirma='+ciudadFirma;
            window.open(url, '_blank');
        }

      });
      // FIN SECCION TAB 2






    </script>


  </body>
</html>