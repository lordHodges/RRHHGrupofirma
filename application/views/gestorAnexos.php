<?php
$data = $this->session->userdata("datos");
$usuario =  $data['usuario'];
$permisos =  $data['permisos'];
?>

<?php
$view_anexoProrroga = 0; $view_modificacion = 0; $view_horaExtra = 0;
foreach ($permisos as $key => $value) {
  if ($value->cf_existencia_permiso == "66") { $view_anexoProrroga = "1"; } else
  if ($value->cf_existencia_permiso == "67") { $view_modificacion = "1"; } else
  if ($value->cf_existencia_permiso == "68") { $view_horaExtra = "1" ; }
}

if($usuario[0]->atr_activo == "1") { ?>
<div class="right_col" role="main">
    <!-- Contenedor principal -->
    <div class="x_content">
      <h3 class="text-center">GESTOR DE ANEXOS</h3>

      <div class="col-md-12">
        <ul class="nav nav-tabs" id="myTab" role="tablist">

          <?php if ( $view_anexoProrroga == 1 ) {  ?>
            <li class="nav-item">
              <a class="" id="estandar" onclick="seleccionTabs('estandar')" data-toggle="tab" href="#estandarContent" role="tab" aria-controls="home" aria-selected="true">Prórroga</a>
            </li>
          <?php } ?>

          <?php if ( $view_modificacion == 1 ) {  ?>
            <li class="nav-item">
              <a class="" id="modificacionCualquierClausula" data-toggle="tab" href="#modificacionCualquierClausulaContent" role="tab" onclick="seleccionTabs('modificacionCualquierClausula')" aria-controls="profile" aria-selected="false">Modificación de cláusula</a>
            </li>
          <?php } ?>

          <?php if ( $view_horaExtra == 1 ) {  ?>
            <li class="nav-item">
              <a class="" id="horasExtras" data-toggle="tab" href="#horasExtrasContent" role="tab" onclick="seleccionTabs('horasExtras')" aria-controls="profile" aria-selected="false">Horas extras</a>
            </li>
          <?php } ?>

        </ul>
        <div class="tab-content" id="myTabContent">









          <!-- TAB : PRÓRROGA -->
          <div class="tab-pane fade show active" id="estandarContent" role="tabpanel" aria-labelledby="estandar">
            <br>
            <div id="informacionTrabajador">
              <div class="col-md-12">
                <h4 style="color:#2a3f54"><b>INFORMACIÓN DE TRABAJADOR</b></h4>
              </div>
            </div>

              <div class="col-md-12 col-sm-12">
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

              <div class="col-md-6 col-sm-12">
                <br><label for="selectTipoProrroga">TIPO DE PRÓRROGA</label><br>
                <select class="custom-select" id="selectTipoProrroga">
                  <option value="">Seleccionar opción</option>
                  <option value="fechaLimite">Con fecha límite</option>
                  <option value="indefinido">Pasar a indefinido</option>
                  <option value="sujetoLicitacion">Sujeto a término de licitación</option>
                </select>
              </div>

              <div id="datosTrabajador" style="display:none">
                <div class="col-md-6 col-sm-12">
                  <br><label for="rut">RUT</label>
                  <input type="text" class="form-control" id="rut" disabled>
                </div>
                <div class="col-md-6 col-sm-12">
                  <br><label for="ciudad">Ciudad</label>
                  <input type="text" class="form-control" id="ciudad" disabled>
                </div>
                <div class="col-md-12 col-sm-12">
                  <br><label for="direccion">Direccion</label>
                  <input type="text" class="form-control" id="direccion" disabled>
                </div>
              </div>
            <!-- FIN INFORMACION DE TRABAJADOR -->


            <!-- EMPRESA -->
            <div id="detalleEmpresa" style="display:none">
              <div class="col-md-12">
                <br><h4 style="color:#2a3f54"><b>EMPRESA</b></h4>
              </div>
              <div class="col-md-12 col-sm-12">
                <br><label for="empresa">Empresa</label>
                <input type="text" class="form-control" id="empresa" disabled>
              </div>
              <div class="col-md-6 col-sm-12">
                <br><label for="repre_legal">Representante legal</label>
                <input type="text" class="form-control" id="repre_legal" disabled>
              </div>
              <div class="col-md-6 col-sm-12">
                <br><label for="repre_rut">RUT de representante legal</label>
                <input type="text" class="form-control" id="repre_rut" disabled>
              </div>
              <div class="col-md-12 col-sm-12">
                <br><label for="jefeDirecto">Jefe(s) directo(s)</label>
                <input type="text" class="form-control" id="jefeDirecto" disabled>
              </div>

            </div>
            <!-- FIN EMPRESA -->


            <!-- VIGENCIA -->
            <div id="vigenciaFechaLimite" style="display:none">
              <div class="col-md-12">
                <br><h4 style="color:#2a3f54"><b>VIGENCIA</b></h4>
              </div>
              <div class="col-md-12 col-sm-12s">
                  <br>
                  <label for="fechaTerminoExtencion">Fecha de término</label>
                  <input type="date" class="form-control" id="fechaTerminoExtencion">
              </div>
            </div>

            <div id="vigenciaSujetoLicitacion" style="display:none">
              <div class="col-md-12">
                <br><h4 style="color:#2a3f54"><b>VIGENCIA</b></h4>
              </div>
              <div class="col-md-12">
                  <br>
                  <label for="sujetoLicitacion">Fecha de suscripción del contrato anterior</label>
                  <input type="date" class="form-control" id="sujetoLicitacion">
                  <!-- <textarea type="date" class="form-control" row="10" id="sujetoLicitacion" ></textarea> -->
              </div>
            </div>

            <div id="vigenciaIndefinido" style="display:none">
              <div class="col-md-12">
                <br><h4 style="color:#2a3f54"><b>VIGENCIA</b></h4>
              </div>
              <div class="col-md-12">
                  <br>
                  <label for="fechaComienzoIndefinido">Fecha de comienzo del contrato indefinido</label>
                  <input type="date" class="form-control" id="fechaComienzoIndefinido">
              </div>
            </div>
            <!-- FIN VIGENCIA -->




            <!-- CLÁUSULAS -->
            <div id="clausulasContainer" style="display:none;">

              <div class="col-md-12 col-sm-12">
                <br><h4 style="color:#2a3f54"><b>CLÁUSULAS A MODIFICAR</b></h4>
              </div>

              <div class="col-md-12 col-sm-12">
                <button type="button" class="btn modidev-btn btn-sm center" id="btnAgregarClausulaModificada" >
                  <i class="glyphicon glyphicon-plus"></i>
                </button>
              </div>

              <div id="contenedorNuevasClausulas" class="col-md-12" style="background-color:#f7f7f7;">

              </div>

            </div>
            <!-- FIN PRÓRROGA -->




            <br>
            <button type="submit" id="btnGenerarAnexoProrroga" class="btn btn-success btn-sm botonLargo" style="display:none">GENERAR ANEXO</button>

          </div>
































          <!-- TAB : MODIFICACIÓN DE CLÁUSULA -->
          <div class="tab-pane fade" id="modificacionCualquierClausulaContent" role="tabpanel" aria-labelledby="cualquierClausula">

            <br>
            <div id="informacionTrabajador2">
              <div class="col-md-12">
                <h4 style="color:#2a3f54"><b>INFORMACIÓN DE TRABAJADOR</b></h4>
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
                  <br><label for="ciudad">Ciudad</label>
                  <input type="text" class="form-control" id="ciudad2" disabled>
                </div>
                <div class="col-md-12 col-sm-12">
                  <br><label for="direccion">Direccion</label>
                  <input type="text" class="form-control" id="direccion2" disabled>
                </div>
              </div>
            <!-- FIN INFORMACION DE TRABAJADOR -->


            <!-- EMPRESA -->
            <div id="detalleEmpresa2" style="display:none">
              <div class="col-md-12">
                <br><h4 style="color:#2a3f54"><b>EMPRESA</b></h4>
              </div>
              <div class="col-md-12 col-sm-12">
                <br><label for="empresa">Empresa</label>
                <input type="text" class="form-control" id="empresa2" disabled>
              </div>
              <div class="col-md-6 col-sm-12">
                <br><label for="repre_legal">Representante legal</label>
                <input type="text" class="form-control" id="repre_legal2" disabled>
              </div>
              <div class="col-md-6 col-sm-12">
                <br><label for="repre_rut">RUT de representante legal</label>
                <input type="text" class="form-control" id="repre_rut2" disabled>
              </div>
              <div class="col-md-12 col-sm-12">
                <br><label for="jefeDirecto">Jefe(s) directo(s)</label>
                <input type="text" class="form-control" id="jefeDirecto2" disabled>
              </div>

            </div>
            <!-- FIN EMPRESA -->


            <!-- VIGENCIA -->
            <div id="vigenciaFechaLimite2" style="display:none">
              <div class="col-md-12">
                <br><h4 style="color:#2a3f54"><b>VIGENCIA</b></h4>
              </div>
              <div class="col-md-12 col-sm-12s">
                  <br>
                  <label for="fechaTerminoExtencion">Fecha de término</label>
                  <input type="date" class="form-control" id="fechaTerminoExtencion2">
              </div>
            </div>
            <!-- FIN VIGENCIA -->




            <!-- CLÁUSULAS -->
            <div id="clausulasContainer2" style="display:none;">

              <div class="col-md-12 col-sm-12">
                <br><h4 style="color:#2a3f54"><b>CLÁUSULAS A MODIFICAR</b></h4>
              </div>

              <div class="col-md-12 col-sm-12">
                <button type="button" class="btn modidev-btn btn-sm center" id="btnAgregarClausulaModificada2" >
                  <i class="glyphicon glyphicon-plus"></i>
                </button>
              </div>

              <div id="contenedorNuevasClausulas2" class="col-md-12" style="background-color:#f7f7f7;">

              </div>

            </div>
            <!-- FIN PRÓRROGA -->




            <br>
            <button type="submit" id="btnGenerarAnexoGeneral" class="btn btn-success btn-sm botonLargo" style="display:none">GENERAR ANEXO</button>


          </div>

          <!-- FIN TAB: MODIFICACIÓN DE CLÁUSULA -->

























          <!-- TAB : HORAS EXTRAS -->
          <div class="tab-pane fade" id="horasExtrasContent" role="tabpanel" aria-labelledby="horasExtras">

            <br>
            <div id="informacionTrabajador3">
              <div class="col-md-12">
                <h4 style="color:#2a3f54"><b>INFORMACIÓN DE TRABAJADOR</b></h4>
              </div>
            </div>

              <div class="col-md-6 col-sm-12">
                <br><label for="selectTrabajador3">TRABAJADOR</label><br>
                <select class="custom-select" id="selectTrabajador3">
                  <!-- se cargan los trabajadores -->
                </select>
              </div>
              <div class="col-md-6 col-sm-12">
                <br><label for="getSelectCiudad3">CIUDAD EN QUE SE FIRMA CONTRATO</label><br>
                <select class="custom-select" id="getSelectCiudad3">
                  <!-- se cargan las ciudades -->
                </select>
              </div>

              <div id="datosTrabajador3" style="display:none">
                <div class="col-md-6 col-sm-12">
                  <br><label for="rut">RUT</label>
                  <input type="text" class="form-control" id="rut3" disabled>
                </div>
                <div class="col-md-6 col-sm-12">
                  <br><label for="direccion">Direccion</label>
                  <input type="text" class="form-control" id="direccion3" disabled>
                </div>
                <div class="col-md-6 col-sm-12">
                  <br><label for="afp">AFP</label>
                  <input type="text" class="form-control" id="afp3" disabled>
                </div>
                <div class="col-md-6 col-sm-12">
                  <br><label for="ciudad">Ciudad</label>
                  <input type="text" class="form-control" id="ciudad3" disabled>
                </div>
                <div class="col-md-6 col-sm-12">
                  <br><label for="prevision">Previsión</label>
                  <input type="text" class="form-control" id="prevision3" disabled>
                </div>
                <div class="col-md-6 col-sm-12">
                  <br><label for="nacionalidad">Nacionalidad</label>
                  <input type="text" class="form-control" id="nacionalidad3" disabled>
                </div>
                <div class="col-md-6 col-sm-12">
                  <br><label for="fechaNacimiento">Fecha de nacimiento</label>
                  <input type="text" class="form-control" id="fechaNacimiento3" disabled>
                </div>
                <div class="col-md-6 col-sm-12">
                  <br><label for="estadoCivil">Estado civil</label>
                  <input type="text" class="form-control" id="estadoCivil3" disabled>
                </div>
              </div>
            <!-- FIN INFORMACION DE TRABAJADOR -->


            <!-- EMPRESA -->
            <div id="detalleEmpresa3" style="display:none">
              <div class="col-md-12">
                <br><h4 style="color:#2a3f54"><b>EMPRESA</b></h4>
              </div>
              <div class="col-md-12 col-sm-12">
                <br><label for="empresa">Empresa</label>
                <input type="text" class="form-control" id="empresa3" disabled>
              </div>
              <div class="col-md-6 col-sm-12">
                <br><label for="cargo">Cargo</label>
                <input type="text" class="form-control" id="cargo3" disabled>
              </div>
              <div class="col-md-6 col-sm-12">
                <br><label for="jefeDirecto">Jefe(s) directo(s)</label>
                <input type="text" class="form-control" id="jefeDirecto3" disabled>
              </div>
              <div class="col-md-6 col-sm-12">
                <br><label for="repre_legal">Representante legal</label>
                <input type="text" class="form-control" id="repre_legal3" disabled>
              </div>
              <div class="col-md-6 col-sm-12">
                <br><label for="repre_rut">RUT de representante legal</label>
                <input type="text" class="form-control" id="repre_rut3" disabled>
              </div>
            </div>
            <!-- FIN EMPRESA -->

            <!-- VIGENCIA -->
            <div id="vigenciaFechaLimite3" style="display:none">
              <div class="col-md-12">
                <br><h4 style="color:#2a3f54"><b>VIGENCIA</b></h4>
              </div>
              <div class="col-md-12 col-sm-12s">
                  <br>
                  <label for="fechaTermino3">Fecha de término</label>
                  <input type="date" class="form-control" id="fechaTermino3">
              </div>
            </div>
            <!-- FIN VIGENCIA -->



            <!-- CONTRATO -->
            <div id="otros3" style="display:none">
              <div class="col-md-12">
                <br><h4 style="color:#2a3f54"><b>INFORMACIÓN EXTRA</b></h4>
              </div>
              <div class="col-md-12 col-sm-12">
                <br><label for="motivo3">Motivo de la extensión</label>
                <textarea type="text" class="form-control" id="motivo3" placeholder="Ej: la contingencia nacional" rows="3"></textarea>
              </div>
              <div class="col-md-12 col-sm-12">
                <br><label for="horasextrasdiarias">Horas extras diarias</label>
                <input type="text" class="form-control" placeholder="Ej: 1 hora extra" id="horasextrasdiarias3">
              </div>

            </div>
            <!-- FIN CONTRATO -->


            <br>
            <button type="submit" id="btnGenerarAnexoHorasExtras" class="btn btn-success btn-sm botonLargo"  style="display:none">GENERAR ANEXO</button>


          </div>

          <!-- FIN TAB : HORAS EXTRAS -->








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
    <script src="<?php echo base_url() ?>assets/js/anexos.js"></script>
    <script src="<?php echo base_url() ?>assets/js/validaciones.js"></script>
    <!-- Toast -->
    <script src="<?php echo base_url() ?>assets/js/toastr.min.js" type="text/javascript"></script>
    <!-- SweetAlert -->
    <script src="<?php echo base_url() ?>assets/js/sweetalert2@9.js" type="text/javascript"></script>



    <script src="<?php echo base_url() ?>assets/js/dashboard.js"></script>




    <script>
      $(document).ready(function() {
        cargarElementosDeContrato();
        getSelectCiudad();
        getItemsContrato();

        var elemento = document.getElementById('estandar');
        elemento.style.color = "#fafafa";
        elemento.style.backgroundColor  = "#2a3f54";

        getSelectCiudad2();
        getSelectCiudad3();
      });








      // SECCION DE TAB 1
      $("#selectTrabajador1").change(function (e){
          e.preventDefault();
          document.getElementById("datosTrabajador").style = "";
          document.getElementById("detalleEmpresa").style = "";
          // document.getElementById("btnGenerarContrato").style = "";
          var idTrabajador = $("#selectTrabajador1").val();
          cargarDatosEsenciales(idTrabajador);
      });


      // este método controla lo que se ve y lo que no en la sección de vigencia
      $("#selectTipoProrroga").change(function (e){
          e.preventDefault();
          if( $("#selectTipoProrroga").val() == "fechaLimite"){
            document.getElementById("vigenciaFechaLimite").style = "";
            $("#vigenciaIndefinido").css("display","none");
            $("#vigenciaSujetoLicitacion").css("display","none");
            $("#clausulasContainer").css("display","none");
          }

          else if( $("#selectTipoProrroga").val() == "indefinido"){
            document.getElementById("vigenciaIndefinido").style = "";
            $("#vigenciaFechaLimite").css("display","none");
            $("#vigenciaSujetoLicitacion").css("display","none");
            document.getElementById("clausulasContainer").style = "";
          }

          else if( $("#selectTipoProrroga").val() == "sujetoLicitacion"){
            document.getElementById("vigenciaSujetoLicitacion").style = "";
            $("#vigenciaIndefinido").css("display","none");
            $("#vigenciaFechaLimite").css("display","none");
            document.getElementById("clausulasContainer").style = "";
          }
      });


      $("body").on("click", "#btnAgregarClausulaModificada", function(e) {
          e.preventDefault();
          var tipoAnexoProrroga = $("#selectTipoProrroga").val();
          if( tipoAnexoProrroga == "indefinido"){
            agregarNuevaClausulaParaModificarProrroga();
          }else{
            if( tipoAnexoProrroga == "sujetoLicitacion" ){
              agregarNuevaClausulaParaModificarProrrogaLicitación();
            }
          }

      });

      $("body").on("click", "#btnGenerarAnexoProrroga", function(e) {
          e.preventDefault();
          var idTrabajador = $("#selectTrabajador1").val();
          var ciudadFirma = $('#getSelectCiudad option:selected').html();
          var tipoAnexoProrroga = $("#selectTipoProrroga").val();

          if(ciudadFirma == "" || tipoAnexoProrroga == null ){
            toastr.error("Debe rellenar todos los campos");
          }else{
            if( tipoAnexoProrroga == "fechaLimite"){
              var fechaTerminoExtencion = $("#fechaTerminoExtencion").val();
              var url = 'https://imlchile.cl/grupofirma/index.php/docAnexoConFechaTermino?trabajador='+idTrabajador+'&&fechaTermino='+fechaTerminoExtencion+'&&ciudadFirma='+ciudadFirma;
              window.open(url, '_blank');
            }else{
              if( tipoAnexoProrroga == "indefinido" ){
                // eliminar desde la base de datos todos los elementos ingresados el día de hoy
                $.ajax({
                    url: 'limpiarManipularContrato',
                    type: 'GET',
                    dataType: 'json',
                    data: {}
                }).then(function (response) {

                });

                var fechaComienzoIndefinido = $("#fechaComienzoIndefinido").val();

                var contador = cntClausulasModificadas();
                var array = [];
                var fecha;

                for (var i = 0; i < contador; i++) {
                  // Armo un array solo con los datos de 1 clausula
                  var elementoRomano = $("#idNumeroRomano_"+i).val();
                  var elementoItem = $("#idClausula_"+i).val();
                  var elementoModificacion = $("#idTextoArea_"+i).val();

                  if(elementoRomano == "" || elementoItem == null || elementoModificacion == ""){
                      toastr.success('Debe rellenar todos los campos');
                  }


                  $.ajax({
                      url: 'getManipularContrato',
                      type: 'POST',
                      dataType: 'json',
                      data: {"idTrabajador": idTrabajador,
                              "numRomano" : elementoRomano,
                              "item" : elementoItem,
                              "modificacion" : elementoModificacion
                            }
                  }).then(function (response) {

                  });
                  var url = 'https://imlchile.cl/grupofirma/index.php/docAnexoPasarIndefinido?trabajador='+idTrabajador+'&&fechaComienzo='+fechaComienzoIndefinido+'&&ciudadFirma='+ciudadFirma;
                  window.open(url, '_blank');

                }

              }else{
                // sino significa que selecciono anexo de prorroga para sujeto a término de licitación
                var fechaComienzoSujetoLicitacion = $("#sujetoLicitacion").val();

                var contador = cntClausulasModificadas();
                var array = [];
                var fecha;

                for (var i = 0; i < contador; i++) {
                  // Armo un array solo con los datos de 1 clausula
                  var elementoRomano = $("#idNumeroRomano_"+i).val();
                  var elementoItem = $("#idClausula_"+i).val();
                  var elementoModificacion = $("#idTextoArea_"+i).val();

                  if(elementoRomano == "" || elementoItem == null || elementoModificacion == ""){
                      toastr.error('Debe rellenar todos los campos');
                  }

                  // eliminar desde la base de datos todos los elementos ingresados el día de hoy
                  $.ajax({
                      url: 'limpiarManipularContrato',
                      type: 'GET',
                      dataType: 'json',
                      data: {}
                  }).then(function (response) {

                  });

                  $.ajax({
                      url: 'getManipularContrato',
                      type: 'POST',
                      dataType: 'json',
                      data: {"idTrabajador": idTrabajador,
                              "numRomano" : elementoRomano,
                              "item" : elementoItem,
                              "modificacion" : elementoModificacion
                            }
                  }).then(function (response) {

                  });

                }
                var url = 'https://imlchile.cl/grupofirma/index.php/docAnexoSujetoLicitacion?trabajador='+idTrabajador+'&&fechaComienzo='+fechaComienzoSujetoLicitacion+'&&ciudadFirma='+ciudadFirma;
                window.open(url, '_blank');
              } //fin de sujeto a licitación


            }

          }

      });
      // FIN SECCION TAB 1










      // SECCION DE TAB 2
      $("#selectTrabajador2").change(function (e){
          e.preventDefault();
          var idTrabajador = $("#selectTrabajador2").val();
          cargarDatosEsenciales2(idTrabajador);
          // document.getElementById("informaciónTrabajador2").style = "";
          document.getElementById("datosTrabajador2").style = "";
          document.getElementById("detalleEmpresa2").style = "";
          document.getElementById("clausulasContainer2").style = "";
          document.getElementById("btnGenerarAnexoGeneral").style = "";
          document.getElementById("vigenciaFechaLimite2").style = "";
      });


      $("body").on("click", "#btnAgregarClausulaModificada2", function(e) {
          e.preventDefault();
          agregarNuevaClausulaParaModificarGeneral();
      });


      $("body").on("click", "#btnGenerarAnexoGeneral", function(e) {
          var idTrabajador = $("#selectTrabajador2").val();
          var ciudadFirma = $('#getSelectCiudad2 option:selected').html();
          var fecha = $("#fechaTerminoExtencion2").val();

          // eliminar desde la base de datos todos los elementos ingresados el día de hoy
          $.ajax({
              url: 'limpiarManipularContrato',
              type: 'GET',
              dataType: 'json',
              data: {}
          }).then(function (response) {

          });


          var contador = cntClausulasModificadas();
          // alert("cantidad de clausulas modificadas: "+contador);
          var array = [];
          var fecha;

          for (var i = 0; i < contador; i++) {
            // Armo un array solo con los datos de 1 clausula
            var elementoRomano = $("#idNumeroRomano_"+i).val();
            var elementoItem = $("#idClausula_"+i).val();
            var elementoModificacion = $("#idTextoArea_"+i).val();

            if(elementoRomano == "" || elementoItem == null || elementoModificacion == ""){
                toastr.success('Debe rellenar todos los campos');
            }


            $.ajax({
                url: 'getManipularContrato',
                type: 'POST',
                dataType: 'json',
                data: {"idTrabajador": idTrabajador,
                        "numRomano" : elementoRomano,
                        "item" : elementoItem,
                        "modificacion" : elementoModificacion
                      }
            }).then(function (response) {

            });
            var url = 'https://imlchile.cl/grupofirma/index.php/docAnexoModificacionClausula?trabajador='+idTrabajador+'&&fechaComienzo='+fecha+'&&ciudadFirma='+ciudadFirma;
            window.open(url, '_blank');
          }
      });
      // FIN SECCION TAB 2









      // SECCION DE TAB 3
      $("#selectTrabajador3").change(function (e){
          e.preventDefault();
          var idTrabajador = $("#selectTrabajador3").val();
          cargarDatosEsenciales3(idTrabajador);
          document.getElementById("datosTrabajador3").style = "";
          document.getElementById("detalleEmpresa3").style = "";
          document.getElementById("vigenciaFechaLimite3").style = "";
          document.getElementById("otros3").style = "";
          document.getElementById("btnGenerarAnexoHorasExtras").style = "";
      });


      $("body").on("click", "#btnGenerarAnexoHorasExtras", function(e) {
          var idTrabajador = $("#selectTrabajador3").val();
          var ciudadFirma = $('#getSelectCiudad3 option:selected').html();
          var motivo = $("#motivo3").val();
          var horasextras = $("#horasextrasdiarias3").val();
          var fechaLimite = $("#fechaTermino3").val();

          var url = 'https://imlchile.cl/grupofirma/index.php/docAnexoHorasExtras?trabajador='+idTrabajador+'&&motivo='+motivo+'&&ciudadFirma='+ciudadFirma+'&&horas='+horasextras+'&&fechaLimite='+fechaLimite;
          window.open(url, '_blank');
      });
      // FIN SECCION TAB 3





    </script>

  <?php } else{ header("Location: https://imlchile.cl/grupofirma/"); } ?>

  </body>
</html>
