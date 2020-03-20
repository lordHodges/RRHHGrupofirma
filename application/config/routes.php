<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Welcome/index';
$route['dashboard'] = 'welcome/index';


$route['testDoc'] = 'welcome/testDoc';




// TRABAJADORES
$route['inicioTrabajadores'] = 'TrabajadorController/index';
$route['addTrabajador'] = 'TrabajadorController/addTrabajador';
$route['getListadoTrabajadores'] = 'TrabajadorController/getListadoTrabajadores';
$route['getDetalleTrabajador'] = 'TrabajadorController/getDetalleTrabajador';

$route['updateTrabajador'] = 'TrabajadorController/updateTrabajador';
$route['getDetalleTrabajadorViewEdit'] = 'TrabajadorController/getDetalleTrabajadorViewEdit';


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
  //contratos
  $route['inicioMenuContratos'] = 'ContratosController/index';

//DOCUMENTOS
$route['perfilOcupacionalVista'] = 'PDFController/cargarPerfilesOcupacionales';
$route['docPerfilesOcupacionales'] = 'PDFController/view_perfilesOcupacionales';



//PERFILES OCUPACIONALES
  //funciones
  $route['inicioFunciones'] = 'FuncionesController/index';
  $route['getListadoTareas'] = 'FuncionesController/getListadoTareas';
  $route['addTarea'] = 'FuncionesController/addTarea';
  //requisitos mínimos
  $route['inicioRequisitosMinimos'] = 'RequisitosMinimosController/index';
  $route['getListadoRequisitosMinimos'] = 'RequisitosMinimosController/getListadoRequisitosMinimos';
  $route['addRequisitoMinimo'] = 'RequisitosMinimosController/addRequisitoMinimo';
  //competencias
  $route['inicioCompetencias'] = 'CompetenciasController/index';
  $route['getListadoCompetencias'] = 'CompetenciasController/getListadoCompetencias';
  $route['addCompetencia'] = 'CompetenciasController/addCompetencia';
  //conocimientos
  $route['inicioConocimientos'] = 'ConocimientosController/index';
  $route['getListadoConocimientos'] = 'ConocimientosController/getListadoConocimientos';
  $route['addConocimiento'] = 'ConocimientosController/addConocimiento';
  //otros
  $route['inicioOtros'] = 'OtrosController/index';
  $route['getListadoOtros'] = 'OtrosController/getListadoOtros';
  $route['addAntecedente'] = 'OtrosController/addAntecedente';



//MANTENEDORES
    //inicios menu
$route['inicioCiudades'] = 'CiudadController/index';
$route['inicioSucursales'] = 'SucursalController/index';
$route['inicioCargos'] = 'CargoController/index';
$route['inicioPerfiles'] = 'PerfilController/index';
$route['inicioEstadosCiviles'] = 'EstadoCivilController/index';
$route['inicioAFP'] = 'AFPController/index';
$route['inicioNacionalidades'] = 'NacionalidadController/index';
$route['inicioEstadoContrato'] = 'EstadoContratoController/index';
$route['inicioPrevisiones'] = 'PrevisionesController/index';
$route['inicioEmpresa'] = 'EmpresaController/index';



    //ciudades
$route['getListadoCiudades'] = 'CiudadController/getListadoCiudades';
$route['addCiudad'] = 'CiudadController/addCiudad';

    //sucursales
$route['getListadoSucursales'] = 'SucursalController/getListadoSucursales';
$route['addSucursal'] = 'SucursalController/addSucursal';

    //cargos
$route['getlistadecargos'] = 'CargoController/getListadoCargos';
$route['addCargo'] = 'CargoController/addCargo';
$route['addResponsabilidades'] = 'CargoController/addResponsabilidades';
$route['addResponsabilidadesPorIDCargo'] = 'CargoController/addResponsabilidadesPorIDCargo';
$route['getDetalleCargo'] = 'CargoController/getDetalleCargo';
$route['getDetalleResponsabilidades'] = 'CargoController/getDetalleResponsablidades';
$route['updateCargo'] = 'CargoController/updateCargo';
$route['updateResponsabilidad'] = 'CargoController/updateResponsabilidad';
    //remuneracion de cargo
$route['getDetalleRemuneracion'] = 'RemuneracionController/getDetalleRemuneracion';
$route['updateRemuneracion'] = 'RemuneracionController/updateRemuneracion';
$route['updateRemuneracionExtra'] = 'RemuneracionController/updateRemuneracionExtra';
$route['addRemuneracionPorIDCargo'] = 'RemuneracionController/addRemuneracionPorIDCargo';

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

    //getTitulos
$route['getTitulos'] = 'TitulosController/getTitulos';











// LABORES
$route['inicioCiruela'] = 'CiruelaController/index';
$route['inicioPoda'] = 'PodaController/index';
$route['inicioDeshoje'] = 'DeshojeController/index';
























$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
