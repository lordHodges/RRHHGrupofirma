<?php
$data = $this->session->userdata("datos");
$usuario =  $data['usuario'];
$permisos =  $data['permisos'];
?>

<?php
$view_verCalendario = 0;
foreach ($permisos as $key => $value) {
  if ($value->cf_existencia_permiso == "110") { $view_verCalendario = "1"; }
}

if($usuario[0]->atr_activo == "1") { ?>
<div class="right_col" role="main">
    <!-- Contenedor principal -->
    <div class="x_content">

      <div class="row">
          <div class="x_panel">
              <div class="x_content">
                <h3 class="text-center">GESTOR DE ASISTENCIA</h3><br>



                  <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">

                      <li class="nav-item">
                        <a class="nav-link active" id="trabajadores-tab" onclick="seleccionTabs('trabajadores-tab')" data-toggle="tab" href="#TrabajadoresContent" role="tab" aria-controls="trabajadores" aria-selected="false">INASISTENCIAS</a>
                      </li>

                      <!-- <li class="nav-item">
                        <a class="nav-link" id="empresas-tab" onclick="seleccionTabs('empresas-tab')" data-toggle="tab" href="#empresasContent" role="tab" aria-controls="empresas" aria-selected="false">Entre empresas</a>
                      </li> -->

                  </ul>



                  <div class="tab-content" id="trabajadores">


                      <!-- INICIO TAB INASISTENCIAS -->
                      <div class="tab-panel fade show active" id="TrabajadoresContent" role="tabpanel" aria-labelledby="trabajadores-tab">



                        <div class="row">
                          <div class="col-md-12">
                            <div class="x_panel">

                              <div class="x_content">

                                <!-- <div id='loading'>loading...</div> -->

                                <div id='calendar'></div>

                              </div>
                            </div>
                          </div>
                        </div>



                      </div>
                      <!-- FIN TAB INASISTENCIASS -->




                  </div>


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


    <label id="permisoExportarTrabajadores" style="display:none">no</label>
    <label id="permisoEditarTrabajadores" style="display:none">no</label>








    <!-- jQuery -->
    <script src="<?php echo base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url() ?>assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/DateJS/build/date.js"></script>
     <!-- Datatables -->
    <script src="<?php echo base_url() ?>assets/js/datatables.min.js" type="text/javascript"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url() ?>assets/build/js/custom.min.js"></script>
    <!-- MODIDEV -->
    <script src="<?php echo base_url() ?>assets/js/asistencia.js"></script>
    <script src="<?php echo base_url() ?>assets/js/validaciones.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url() ?>assets/vendors/iCheck/icheck.min.js"></script>
    <!-- Switchery -->
    <script src="<?php echo base_url() ?>assets/vendors/switchery/dist/switchery.min.js"></script>
    <!-- Toast -->
    <script src="<?php echo base_url() ?>assets/js/toastr.min.js" type="text/javascript"></script>


    <!-- FullCalendar -->
    <script src="<?php echo base_url() ?>assets/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/fullcalendar/packages/core/main.js" rel="stylesheet"></script>
    <script src="<?php echo base_url() ?>assets/vendors/fullcalendar/packages/interaction/main.js" rel="stylesheet"></script>
    <script src="<?php echo base_url() ?>assets/vendors/fullcalendar/packages/daygrid/main.js" rel="stylesheet"></script>
    <script src="<?php echo base_url() ?>assets/vendors/fullcalendar/packages/list/main.js" rel="stylesheet"></script>
    <script src="<?php echo base_url() ?>assets/vendors/fullcalendar/packages/google-calendar/main.js" rel="stylesheet"></script>



    <script src="<?php echo base_url() ?>assets/js/dashboard.js"></script>


    <script>
        $(document).ready(function() {



        });
    </script>

    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var initialLocaleCode = 'es';
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {

          plugins: [ 'interaction', 'dayGrid','timeGrid' ],


          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,listMonth'
          },
          defaultDate: '2020-02-12',
          locale: initialLocaleCode,
          buttonIcons: true, // show the prev/next text
          weekNumbers: false,
          navLinks: false, // can click day/week names to navigate views
          selectable: true,
          selectMirror: true,
          select: function(arg) {
            alert(arg.start);
            alert(arg.end);
            alert(arg.allDay);
            var title = prompt('Event Title:');
            if (title) {
              calendar.addEvent({
                title: title,
                start: arg.start,
                end: arg.end,
                allDay: arg.allDay
              })
            }
            calendar.unselect()
          },
          editable: true,
          eventLimit: true, // allow "more" link when too many events
          events: [
            {
              title: 'All Day Event',
              start: '2020-02-01'
            },
            {
              title: 'TE AMO RICARDO',
              start: '2020-05-12',
              end: '2020-05-12'
            },
            {
              title: 'Long Event',
              start: '2020-02-03',
              end: '2020-02-10'
            },
            {
              groupId: 999,
              title: 'Repeating Event',
              start: '2020-02-09T16:00:00'
            },
            {
              groupId: 999,
              title: 'Repeating Event',
              start: '2020-02-16T16:00:00'
            },
            {
              title: 'Conference',
              start: '2020-02-11',
              end: '2020-02-13'
            },
            {
              title: 'Meeting',
              start: '2020-02-12T10:30:00',
              end: '2020-02-12T12:30:00'
            },
            {
              title: 'Lunch',
              start: '2020-02-12T12:00:00'
            },
            {
              title: 'Meeting',
              start: '2020-02-12T14:30:00'
            },
            {
              title: 'Happy Hour',
              start: '2020-02-12T17:30:00'
            },
            {
              title: 'Dinner',
              start: '2020-02-12T20:00:00'
            },
            {
              title: 'Birthday Party',
              start: '2020-02-13T07:00:00'
            },
            {
              title: 'Click for Google',
              url: 'http://google.com/',
              start: '2020-02-28'
            }
          ],
          // events: 'myfeed.php?start=2013-12-01T00:00:00-05:00&end=2014-01-12T00:00:00-05:00',
          eventTextColor: '#fff',  //color del texto
          eventBackgroundColor: '#1ABB9C', //color de fondo del evento
          eventBorderColor: '#1ABB9C', // color de borde del evento


        });
        calendar.render();

      });
    </script>

  <?php } else{ header("Location: http://10.10.11.240/GRUPOFIRMA/"); } ?>

    </body>
  </html>
