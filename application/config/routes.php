<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Welcome/index';
$route['login'] = 'Welcome/index';
$route['miPerfil'] = 'SesionesController/miPerfil';
$route['iniciarSesion'] = 'SesionesController/iniciarSesion';
$route['cerrarSesion'] = 'SesionesController/cerrarSesion';


$route['editarMiPerfil'] = 'SesionesController/editarMiPerfil';

$route['getPermisosUsuario'] = 'SesionesController/getPermisosUsuario';
$route['getListadoPermisosExistentes'] = 'SesionesController/getListadoPermisosExistentes';
$route['cargarUsuariosConPerfil'] = 'SesionesController/cargarUsuariosConPerfil';
$route['detallePermisosUsuario'] = 'SesionesController/detallePermisosUsuario';

// PERMISOS
$route['getExistenciasPorModulo'] = 'PermisosController/getExistenciasPorModulo';
$route['getModulos'] = 'PermisosController/getModulos';


//  PLANILLA DE PAGOS
$route['inicioPlanillaPagos'] = 'PagosController/inicioPlanillaPagos';
$route['getListadoPagosFinDeMes'] = 'PagosController/getListadoPagosFinDeMes';
$route['getDetallePagoTrabajador'] = 'PagosController/getDetallePagoTrabajador';
$route['addHistorialPagosMensuales'] = 'PagosController/addHistorialPagosMensuales';
$route['getListadoPlanillaPagoMes'] = 'PagosController/getListadoPlanillaPagoMes';
$route['getEmpresas'] = 'PagosController/cargarEmpresas';



// ADELANTOS
$route['inicioAdelantos'] = 'AdelantosController/inicioAdelantos';
$route['getListadoAdelantos'] = 'AdelantosController/getListadoAdelantos';
$route['getDetalleAdelanto'] = 'AdelantosController/getDetalleAdelanto';
$route['updateAdelanto'] = 'AdelantosController/updateAdelanto';
$route['buscarBanco'] = 'AdelantosController/buscarBanco';
$route['addHistorialAdelanto'] = 'AdelantosController/addHistorialAdelanto';
$route['getTrabajadoresSinAdelanto'] = 'AdelantosController/getTrabajadoresSinAdelanto';
$route['addAdelanto'] = 'AdelantosController/addAdelanto';

// ASISTENCIA
$route['inicioGestorAsistencia'] = 'AsistenciaController/inicioAsistencia';
$route['addInasistencia'] = 'AsistenciaController/addInasistencia';
$route['getInasistencias'] = 'AsistenciaController/getInasistencias';



// PRÉSTAMOS
$route['inicioPrestamos'] = 'PrestamosController/inicioPrestamos';
$route['getListadoPrestamosTrabajador'] = 'PrestamosController/getListadoPrestamosTrabajador';
$route['obtenerRutTrabajador'] = 'PrestamosController/obtenerRutTrabajador';
$route['addPrestamo'] = 'PrestamosController/addPrestamo';
$route['addDetallePrestamo'] = 'PrestamosController/addDetallePrestamo';
$route['getDetallePrestamo'] = 'PrestamosController/getDetallePrestamo';
$route['editarDetalleDePrestamo'] = 'PrestamosController/editarDetalleDePrestamo';








// FINIQUITOS
$route['inicioFiniquitos'] = 'FiniquitosController/inicioFiniquitos';
$route['getFiniquitosTrabajador'] = 'FiniquitosController/getFiniquitosTrabajador';
$route['descargarFiniquito'] = 'FiniquitosController/descargarFiniquito';
$route['cargar_finiquito'] = 'FiniquitosController/cargar_finiquito';


// LIQUIDACIONES
$route['inicioLiquidaciones'] = 'LiquidacionesController/inicioLiquidaciones';
$route['getLiquidacionesTrabajador'] = 'LiquidacionesController/getLiquidacionesTrabajador';
$route['descargarLiquidacion'] = 'LiquidacionesController/descargarLiquidacion';
$route['cargar_liquidacion'] = 'LiquidacionesController/cargar_liquidacion';

// PERMISOS
$route['permisos'] = 'SesionesController/inicioPermisos';
$route['getPerfilesTabla'] = 'SesionesController/getPerfilesTabla';
$route['inicioPermisosPerfil'] = 'SesionesController/inicioPermisosPerfil';
$route['inicioPermisosUsuario'] = 'SesionesController/inicioPermisosUsuario';
$route['cambiarPass'] = 'SesionesController/cambiarPass';
$route['editarUsuario'] = 'SesionesController/editarUsuario';


// DASHBOARD
$route['dashboard'] = 'DashboardController/index';
$route['buscarContratosPorVencer'] = 'DashboardController/buscarContratosPorVencer';
$route['transferenciasPorEmpresaHoy'] = 'DashboardController/transferenciasPorEmpresaHoy';
$route['transferenciasPorEmpresaMes'] = 'DashboardController/transferenciasPorEmpresaMes';
$route['transferenciasPorEmpresaAno'] = 'DashboardController/transferenciasPorEmpresaAno';
$route['transferenciasPorEmpresaPrimerSemestre'] = 'DashboardController/transferenciasPorEmpresaPrimerSemestre';
$route['transferenciasPorEmpresaSegundoSemestre'] = 'DashboardController/transferenciasPorEmpresaSegundoSemestre';
$route['totalContratosPlazo'] = 'DashboardController/totalContratosPlazo';
$route['totalContratosIndefinidos'] = 'DashboardController/totalContratosIndefinidos';
$route['totalContratosPorProyecto'] = 'DashboardController/totalContratosPorProyecto';

// HISTORIAL
$route['inicioHistorial'] = 'HistorialController/index';
$route['vistaCronologica'] = 'HistorialController/vistaCronologica';
$route['vistaContratos'] = 'HistorialController/vistaContratos';
$route['vistaAnexos'] = 'HistorialController/vistaAnexos';
$route['vistaTransferencias'] = 'HistorialController/vistaTransferencias';
$route['vistaCartasAmonestacion'] = 'HistorialController/vistaCartasAmonestacion';


// TRABAJADORES
$route['inicioTrabajadores'] = 'TrabajadorController/index';
$route['addTrabajador'] = 'TrabajadorController/addTrabajador';
$route['getListadoTrabajadores'] = 'TrabajadorController/getListadoTrabajadores';
$route['getDetalleTrabajador'] = 'TrabajadorController/getDetalleTrabajador';

$route['updateTrabajador'] = 'TrabajadorController/updateTrabajador';
$route['getDetalleTrabajadorViewEdit'] = 'TrabajadorController/getDetalleTrabajadorViewEdit';

$route['getTrabajadores'] = 'TrabajadorController/getTrabajadores';
$route['getDetalleTrabajadorContrato'] = 'ContratosController/getDetalleTrabajadorContrato';


    //Lo necesario para ingresar trabajadores
    $route['getCiudades'] = 'TrabajadorController/getCiudades';
    $route['getCargos'] = 'TrabajadorController/getCargos';
    $route['getSucursales'] = 'TrabajadorController/getSucursales';

    $route['getEmpresas'] = 'TrabajadorController/getEmpresas';
    $route['getAFP'] = 'TrabajadorController/getAFP';
    $route['getPrevisiones'] = 'TrabajadorController/getPrevisiones';
    $route['getEstadosContrato'] = 'TrabajadorController/getEstadosContrato';
    $route['getEstadosCiviles'] = 'TrabajadorController/getEstadosCiviles';
    $route['getNacionalidades'] = 'TrabajadorController/getNacionalidades';

//CONTRATOS
$route['inicioContratos'] = 'ContratosController/index';
$route['inicioGestorContratos'] = 'ContratosController/indexGestorContratos';
$route['getListadoTrabajadoresContrato'] = 'ContratosController/getListadoTrabajadoresContrato';
$route['getContratosTrabajador'] = 'ContratosController/getContratosTrabajador';
$route['cargar_archivo'] = 'ContratosController/cargar_archivo';
$route['descargarContrato'] = 'ContratosController/descargarContrato';
$route['getItemsContrato'] = 'ContratosController/getItemsContrato';
$route['getInfoCargoTrabajador'] = 'ContratosController/getInfoCargoTrabajador';

//ANEXOS
$route['inicioGestorAnexos'] = 'ContratosController/indexGestorAnexos';
$route['docAnexoConFechaTermino'] = 'PDFController/view_anexoConFechaTermino';
$route['docAnexoPasarIndefinido'] = 'PDFController/view_anexoPasarIndefinido';
$route['docAnexoSujetoLicitacion'] = 'PDFController/view_anexoSujetoLicitacion';
$route['docAnexoModificacionClausula'] = 'PDFController/view_anexoModificacionClausula';
$route['docAnexoHorasExtras'] = 'PDFController/view_anexoHorasExtras';
$route['getManipularContrato'] = 'PDFController/getManipularContrato';
$route['getListadoTareasViewContrato'] = 'FuncionesController/getListadoTareasViewContrato';
$route['limpiarManipularContrato'] = 'PDFController/limpiarManipularContrato';


$route['transformarFechaLetras'] = 'PDFController/transformarFechaAJAX';
$route['getInfoTrabajadorEmpresa'] = 'ContratosController/getInfoTrabajadorEmpresa';

//DOCUMENTOS
$route['perfilOcupacionalVista'] = 'PDFController/cargarPerfilesOcupacionales';
$route['docPerfilesOcupacionales'] = 'PDFController/view_perfilesOcupacionales';
$route['docContratoEstandar'] = 'PDFController/view_contratoEstandar';
$route['docContratoPersonalizado'] = 'PDFController/view_contratoPersonalizado';



//PERFILES OCUPACIONALES
  //funciones
  $route['inicioFunciones'] = 'FuncionesController/index';
  $route['getListadoTareas'] = 'FuncionesController/getListadoTareas';
  $route['addTarea'] = 'FuncionesController/addTarea';
  $route['getListadoTareasDataTable'] = 'FuncionesController/getListadoTareasDataTable';
  $route['deleteTarea'] = 'FuncionesController/deleteTarea';

  //requisitos mínimos
  $route['inicioRequisitosMinimos'] = 'RequisitosMinimosController/index';
  $route['getListadoRequisitosMinimos'] = 'RequisitosMinimosController/getListadoRequisitosMinimos';
  $route['addRequisitoMinimo'] = 'RequisitosMinimosController/addRequisitoMinimo';
  $route['getListadoRequisitosMinimosDataTable'] = 'RequisitosMinimosController/getListadoRequisitosMinimosDataTable';
  $route['deleteRequisitoMinimo'] = 'RequisitosMinimosController/deleteRequisitoMinimo';

  //competencias
  $route['inicioCompetencias'] = 'CompetenciasController/index';
  $route['getListadoCompetencias'] = 'CompetenciasController/getListadoCompetencias';
  $route['addCompetencia'] = 'CompetenciasController/addCompetencia';
  $route['getListadoCompetenciasDataTable'] = 'CompetenciasController/getListadoCompetenciasDataTable';
  $route['deleteCompetencia'] = 'CompetenciasController/deleteCompetencia';

  //conocimientos
  $route['inicioConocimientos'] = 'ConocimientosController/index';
  $route['getListadoConocimientos'] = 'ConocimientosController/getListadoConocimientos';
  $route['addConocimiento'] = 'ConocimientosController/addConocimiento';
  $route['getListadoConocimientosDataTable'] = 'ConocimientosController/getListadoConocimientosDataTable';
  $route['deleteConocimiento'] = 'ConocimientosController/deleteConocimiento';
  //otros
  $route['inicioOtros'] = 'OtrosController/index';
  $route['getListadoOtros'] = 'OtrosController/getListadoOtros';
  $route['addAntecedente'] = 'OtrosController/addAntecedente';
  $route['getListadoOtrosAntecedentesDataTable'] = 'OtrosController/getListadoOtrosAntecedentesDataTable';
  $route['deleteOtroAntecedente'] = 'OtrosController/deleteOtroAntecedente';


//MANTENEDORES
    //inicios menu
    $route['inicioCiudades'] = 'CiudadController/index';
    $route['inicioSucursales'] = 'SucursalController/index';
    $route['inicioCargos'] = 'CargoController/index';
    $route['inicioPerfiles'] = 'PerfilController/index';
    $route['inicioEstadosCiviles'] = 'EstadoCivilController/index';
    $route['inicioPrevision'] = 'AFPController/index';
    $route['inicioNacionalidades'] = 'NacionalidadController/index';
    $route['inicioEstadoContrato'] = 'EstadoContratoController/index';
    $route['inicioSalud'] = 'PrevisionesController/index';
    $route['inicioEmpresa'] = 'EmpresaController/index';
    $route['inicioUsuarios'] = 'SesionesController/inicioUsuarios';
    $route['inicioVehiculos'] = 'VehiculosController/inicioVehiculos';
    $route['inicioMarcas'] = 'MarcasController/inicioMarcas';
    $route['inicioModelos'] = 'ModelosController/inicioModelos';



    //ciudades
    $route['getListadoCiudades'] = 'CiudadController/getListadoCiudades';
    $route['addCiudad'] = 'CiudadController/addCiudad';

    //sucursales
    $route['getListadoSucursales'] = 'SucursalController/getListadoSucursales';
    $route['addSucursal'] = 'SucursalController/addSucursal';
    $route['buscarSucursal'] = 'CargoController/buscarSucursal';

    //cargos
    $route['getlistadecargos'] = 'CargoController/getListadoCargos';
    $route['addCargo'] = 'CargoController/addCargo';
    $route['addResponsabilidades'] = 'CargoController/addResponsabilidades';
    $route['addResponsabilidadesPorIDCargo'] = 'CargoController/addResponsabilidadesPorIDCargo';
    $route['getDetalleCargo'] = 'CargoController/getDetalleCargo';
    $route['getDetalleResponsabilidades'] = 'CargoController/getDetalleResponsablidades';
    $route['updateCargo'] = 'CargoController/updateCargo';
    $route['updateResponsabilidad'] = 'CargoController/updateResponsabilidad';
    $route['deleteResponsabilidad'] = 'CargoController/deleteResponsabilidad';
        //remuneracion de cargo
    $route['getDetalleRemuneracion'] = 'RemuneracionController/getDetalleRemuneracion';
    $route['updateRemuneracion'] = 'RemuneracionController/updateRemuneracion';
    $route['updateRemuneracionExtra'] = 'RemuneracionController/updateRemuneracionExtra';
    $route['addRemuneracionPorIDCargo'] = 'RemuneracionController/addRemuneracionPorIDCargo';
    $route['deleteRemuneracionExtra'] = 'RemuneracionController/deleteRemuneracionExtra';


    //estados civiles
    $route['getListadoEstadosCiviles'] = 'EstadoCivilController/getListadoEstadosCiviles';
    $route['addEstadoCivil'] = 'EstadoCivilController/addEstadoCivil';

    //AFP
    $route['getListadoAFP'] = 'AFPController/getListadoAFP';
    $route['addAFP'] = 'AFPController/addAFP';
    $route['getDetalleAFP'] = 'AFPController/getDetalleAFP';
    $route['updateAFP'] = 'AFPController/updateAFP';


    //nacionalidades
    $route['getListadoNacionalidades'] = 'NacionalidadController/getListadoNacionalidades';
    $route['addNacionalidad'] = 'NacionalidadController/addNacionalidad';
    $route['updateNacionalidad'] = 'NacionalidadController/updateNacionalidad';
    $route['getDetalleNacionalidad'] = 'NacionalidadController/getDetalleNacionalidad';


    //estado contrato
    $route['getEstadoContrato'] = 'EstadoContratoController/getEstadoContrato';
    $route['addEstadoContrato'] = 'EstadoContratoController/addEstadoContrato';
    $route['updateEstadoContrato'] = 'EstadoContratoController/updateEstadoContrato';
    $route['getDetalleEstadosContrato'] = 'EstadoContratoController/getDetalleEstadosContrato';


    //previsiones
    $route['getListadoPrevisiones'] = 'PrevisionesController/getListadoPrevisiones';
    $route['addPrevision'] = 'PrevisionesController/addPrevision';
    $route['updatePrevision'] = 'PrevisionesController/updatePrevision';
    $route['getDetallePrevision'] = 'PrevisionesController/getDetallePrevision';


    //empresa
    $route['getListadoEmpresa'] = 'EmpresaController/getListadoEmpresas';
    $route['addEmpresa'] = 'EmpresaController/addEmpresa';
    $route['updateEmpresa'] = 'EmpresaController/updateEmpresa';
    $route['getDetalleEmpresa'] = 'EmpresaController/getDetalleEmpresa';

    //titulo
    $route['getTitulos'] = 'TitulosController/getTitulos';
    $route['addTitulo'] = 'TitulosController/addTitulo';

    // usuario
    $route['getDetalleUsuario'] = 'SesionesController/getDetalleUsuario';
    $route['getListadoUsuarios'] = 'SesionesController/getListadoUsuarios';
    $route['getPerfiles'] = 'SesionesController/getSelectPerfiles';
    $route['addUsuario'] = 'SesionesController/agregarUsuario';
    $route['cambiarEstado'] = 'SesionesController/cambiarEstado';


    //Vehículos

    //Modelos de Vehículos
    $route['getListadoModelos'] = 'ModelosController/getListadoModelos';
    $route['addModelo'] = 'ModelosController/addModelo';
    $route['editarModelo'] = 'ModelosController/editarModelo';
    $route['getDetalleModelo'] = 'ModelosController/getDetalleModelo';

    //Marcas de Vehículos
    $route['getListadoMarcas'] = 'MarcasController/getListadoMarcas';
    $route['addMarca'] = 'MarcasController/addMarca';
    $route['editarMarca'] = 'MarcasController/editarMarca';
    $route['getDetalleMarca'] = 'MarcasController/getDetalleMarca';
    $route['getMarcas'] = 'MarcasController/getMarcas';





// TRANSFERENCIAS
$route['inicioTransferencias'] = 'TransferenciasController/index';
$route['getListadoTransferencias'] = 'TransferenciasController/getListadoTransferencias';
$route['getTransferenciasTrabajador'] = 'TransferenciasController/getTransferenciasTrabajador';
$route['cargar_comprobante'] = 'TransferenciasController/cargar_comprobante';
$route['descargarComprobante'] = 'TransferenciasController/descargarComprobante';
$route['getBancos'] = 'TransferenciasController/getBancos';


// CARTAS DE AMONESTACIÓN
$route['inicioCartasAmonestacion'] = 'CartaAmonestacionController/index';
$route['cargar_carta_amonestacion'] = 'CartaAmonestacionController/cargar_carta_amonestacion';
$route['getURLCartaAmonestacion'] = 'CartaAmonestacionController/getURLCartaAmonestacion';
$route['getCartasAmonestacionTrabajador'] = 'CartaAmonestacionController/getCartasAmonestacionTrabajador';
$route['descargarCartaAmonestacion'] = 'CartaAmonestacionController/descargarCartaAmonestacion';





























$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
