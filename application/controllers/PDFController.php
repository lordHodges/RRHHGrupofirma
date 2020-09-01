<?php
defined('BASEPATH') or exit('No direct script access allowed');

class  PDFController extends CI_Controller
{

	private static $UNIDADES = [
		'',
		'UN ',
		'DOS ',
		'TRES ',
		'CUATRO ',
		'CINCO ',
		'SEIS ',
		'SIETE ',
		'OCHO ',
		'NUEVE ',
		'DIEZ ',
		'ONCE ',
		'DOCE ',
		'TRECE ',
		'CATORCE ',
		'QUINCE ',
		'DIECISEIS ',
		'DIECISIETE ',
		'DIECIOCHO ',
		'DIECINUEVE ',
		'VEINTE '
	];

	private static $DECENAS = [
		'VENTI',
		'TREINTA ',
		'CUARENTA ',
		'CINCUENTA ',
		'SESENTA ',
		'SETENTA ',
		'OCHENTA ',
		'NOVENTA ',
		'CIEN '
	];

	private static $CENTENAS = [
		'CIENTO ',
		'DOSCIENTOS ',
		'TRESCIENTOS ',
		'CUATROCIENTOS ',
		'QUINIENTOS ',
		'SEISCIENTOS ',
		'SETECIENTOS ',
		'OCHOCIENTOS ',
		'NOVECIENTOS '
	];

	public function __construct()
	{
		parent::__construct();
		$this->load->model("CompetenciasModel");
		$this->load->model("MantenedoresModel");
		$this->load->model("ConocimientosModel");
		$this->load->model("RequisitosMinimosModel");
		$this->load->model("FuncionesModel");
		$this->load->model("OtrosModel");
		$this->load->model("RemuneracionesModel");
		$this->load->model("ContratosModel");
		$this->load->model("PDFModel");
		$this->load->model("PrestamosModel");
	}

	public function index()
	{
	}


	function view_prestamo()
	{
		$prestamo = $this->input->get("id");
		$titulo = "COMPROBANTE PRÉSTAMO EMPRESARIAL";



		$infoPrestamo = $this->PrestamosModel->getPrestamo($prestamo);
		$detallePrestamo = $this->PrestamosModel->getDetallePrestamo($prestamo);

		// echo json_encode($detallePrestamo);
		// exit();

		$fechaDeHoy = date("d-m-Y");
		$fechaDeHoy = $this->transformarFecha($fechaDeHoy);

		foreach ($infoPrestamo as $key => $p) {
			$nombreTrabajador 			= $p->atr_nombres . " " . $p->atr_apellidos;
			$rut 										= $p->atr_rut;
			$cargo									= $p->cargo;
			$rutEmpresa							= $p->rut_empresa;
			$empresa								= $p->empresa;

			$ArrayfechaPrestamo = explode("-", $p->atr_fechaPrestamo);
			$fecha_prestamo					= $ArrayfechaPrestamo[2] . "-" . $ArrayfechaPrestamo[1] . "-" . $ArrayfechaPrestamo[0];

			$monto_solicitado				= number_format($p->atr_montoTotal, 0, ",", ".");
			$cant_cuotas						= $p->atr_cantidadCuotas;
		}

		$monto = str_replace(".", "", $monto_solicitado);
		$letrasMontoSolicitado = strtolower($this->convertir($monto));


		//datos que se enviaran a la Vista
		$data = array(
			'titulo'								=> $titulo,
			'cargo'									=> $cargo,
			'nombre_trabajador'			=> $nombreTrabajador,
			'rut'										=> $rut,
			'rut_empresa'						=> $rutEmpresa,
			'empresa'								=> $empresa,
			'fecha_prestamo'				=> $fecha_prestamo,
			'monto_solicitado'			=> "$" . $monto_solicitado,
			'cant_cuotas'						=> $cant_cuotas,
			'fecha_hoy'							=> $fechaDeHoy,
			'letras_monto'					=> $letrasMontoSolicitado,
			'detalle_prestamo'			=> $detallePrestamo
		);


		$html = $this->load->view('pdf/prestamo', $data, TRUE);
		// Cargamos la librería
		$this->load->library('Pdfgenerator');
		// definamos un nombre para el archivo. No es necesario agregar la extension .pdf
		$filename = 'prestamo_' . $nombreTrabajador . '';
		// generamos el PDF. Pasemos por encima de la configuración general y definamos otro tipo de papel
		$this->pdfgenerator->generate($html, $filename, TRUE, 'Letter', 'portrait', 1);
	}



	function cargarPerfilesOcupacionales()
	{
		$this->load->view('template/menu');
		$this->load->view('perfilOcupacional/perfilOcupacionalCargos');
	}

	function view_perfilesOcupacionales()
	{
		$cargo = $this->input->get("cargo");
		$titulo = "PERFIL OCUPACIONAL DEL PUESTO O VACANTE";

		// $cargo = 2;

		$infoCargo = $this->MantenedoresModel->buscarCargo($cargo);

		//datos que se enviaran a la Vista
		$data = array(
			'titulo'								=> $titulo,
			'cargo'									=> $infoCargo,
			'competencias'					=> $this->CompetenciasModel->getListadoCompetencias($cargo),
			'conocimientos'					=> $this->ConocimientosModel->getListadoConocimientos($cargo),
			'requisitosMinimos'			=> $this->RequisitosMinimosModel->getListadoRequisitosMinimos($cargo),
			'funciones'							=> $this->FuncionesModel->getListadoTareas($cargo),
			'titulos'								=> $this->MantenedoresModel->getListadoTitulos($cargo),
			'antecedentes'					=> $this->OtrosModel->getAntecedentes(),
			'responsablidades'			=> $this->MantenedoresModel->getListadoResponsabilidades($cargo),
			'remuneracion'					=> $this->RemuneracionesModel->getDetalleRemuneracionPDF($cargo),
			'remuneracionesExtras'	=> $this->RemuneracionesModel->getDetalleRemuneracionExtraPDF($cargo)
		);
		$atr_nombre = '';
		foreach ($infoCargo as $key => $value) {
			$nombreCargo = $key->$atr_nombre;
		}

		$html = $this->load->view('pdf/perfilOcupacional', $data, TRUE);
		// Cargamos la librería
		$this->load->library('Pdfgenerator');
		// definamos un nombre para el archivo. No es necesario agregar la extension .pdf
		$filename = 'perfilOcupacional_' . $nombreCargo . '';
		// generamos el PDF. Pasemos por encima de la configuración general y definamos otro tipo de papel
		$this->pdfgenerator->generate($html, $filename, TRUE, 'Letter', 'portrait', 0);
	}

	function view_contratoEstandar()
	{
		$trabajador = $this->input->get("trabajador");
		$ciudadFirma = $this->input->get("ciudadFirma");
		$fechaInicioContrato = $this->input->get("fechaInicio");
		$fechaTerminoContrato = $this->input->get("fechaTermino");
		$titulo = "CONTRATO DE TRABAJO A PLAZO";



		$informacion = $this->ContratosModel->getDetalleTrabajadorContrato($trabajador);


		$contador = 0;
		foreach ($informacion as $key => $i) {
			if ($contador == 0) {
				$arrayTrabajador = $i;
			}
			if ($contador == 1) {
				$arrayRemuneracion = $i;
			}
			if ($contador == 2) {
				$arrayRemuneracionExtra = $i;
			}
			$contador = $contador + 1;
		}

		// Tranformación de fecha actual
		$fechaDeHoy = date("d-m-Y");
		$fechaDeHoy = $this->transformarFecha($fechaDeHoy);

		// Tranformación de fecha de inicio del contrato
		$fechaInicioContrato = explode("-", $fechaInicioContrato);
		$fechaInicioContrato = $this->transformarFecha($fechaInicioContrato[2] . "-" . $fechaInicioContrato[1] . "-" . $fechaInicioContrato[0]);

		// Tranformación de fecha de termino del contrato
		$fechaTerminoContrato = explode("-", $fechaTerminoContrato);
		$fechaTerminoContrato = $this->transformarFecha($fechaTerminoContrato[2] . "-" . $fechaTerminoContrato[1] . "-" . $fechaTerminoContrato[0]);



		// Tranformación de fecha de nacimiento
		foreach ($arrayTrabajador as $key => $t) {
			$idCargo = $t->idCargo;
			$fecha = $this->transformarFecha($t->atr_fechaNacimiento);
			$t->atr_fechaNacimiento = $fecha;
			$t->prevision = strtoupper($t->prevision);
			$t->cargo = strtoupper($t->cargo);
		}
		$funciones = $this->FuncionesModel->getListadoTareasViewContrato($idCargo);


		foreach ($arrayRemuneracion as $key => $r) {
			$sueldo = $r->atr_sueldoMensual;
			$colacion = $r->atr_colacion;
			$movilizacion = $r->atr_movilizacion;
			$asistencia = $r->atr_asistencia;
		}


		$sueldo = str_replace(".", "", $sueldo);
		$letras = strtolower($this->convertir($sueldo));

		$colacion = str_replace(".", "", $colacion);
		$letrasColacion = strtolower($this->convertir($colacion));

		$movilizacion = str_replace(".", "", $movilizacion);
		$letrasMovilizacion = strtolower($this->convertir($movilizacion));

		$asistencia = str_replace(".", "", $asistencia);
		$letrasAsistencia = strtolower($this->convertir($asistencia));




		$data = array(
			'titulo'										=> $titulo,
			'ciudadFirma'								=> $ciudadFirma,
			'fechaDeHoy'								=> $fechaDeHoy,
			'fechaInicioContrato'				=> $fechaInicioContrato,
			'fechaTerminoContrato'			=> $fechaTerminoContrato,
			'arrayTrabajador'						=> $arrayTrabajador,
			'arrayRemuneracion'					=> $arrayRemuneracion,
			'arrayRemuneracionExtra'		=> $arrayRemuneracionExtra,
			'arrayFunciones'						=> $funciones,
			'letrasSueldo'							=> $letras,
			'letrasColacion'						=> $letrasColacion,
			'letrasMovilizacion'				=> $letrasMovilizacion,
			'letrasAsistencia'					=> $letrasAsistencia,
			'sueldo'										=> $sueldo
		);


		$html = $this->load->view('pdf/contratos/contratoEstandar', $data, TRUE);
		// Cargamos la librería
		$this->load->library('Pdfgenerator');
		// definamos un nombre para el archivo. No es necesario agregar la extension .pdf
		$filename = 'contrato';
		// generamos el PDF. Pasemos por encima de la configuración general y definamos otro tipo de papel
		$this->pdfgenerator->generate($html, $filename, TRUE, 'Letter', 'portrait', 0);
	}

	function view_contratoPersonalizado()
	{
		$trabajador = $this->input->get("trabajador");
		$ciudadFirma = $this->input->get("ciudadFirma");
		$fechaInicioContrato = $this->input->get("fechaInicio");
		$fechaTerminoContrato = $this->input->get("fechaTermino");
		$items = $this->input->get("items");
		$itemsContrato = $_GET["arrayItems"];
		$itemsContrato = explode(",", $itemsContrato);
		$titulo = "CONTRATO DE TRABAJO A PLAZO";

		$arrayNumerosRomanos = ["I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII", "XIII", "XIV", "XV", "XVI", "XVII", "XVIII", "XIX", "XX"];





		$informacion = $this->ContratosModel->getDetalleTrabajadorContrato($trabajador);


		$contador = 0;
		foreach ($informacion as $key => $i) {
			if ($contador == 0) {
				$arrayTrabajador = $i;
			}
			if ($contador == 1) {
				$arrayRemuneracion = $i;
			}
			if ($contador == 2) {
				$arrayRemuneracionExtra = $i;
			}
			$contador = $contador + 1;
		}

		// Tranformación de fecha actual
		$fechaDeHoy = date("d-m-Y");
		$fechaDeHoy = $this->transformarFecha($fechaDeHoy);

		// Tranformación de fecha de inicio del contrato
		$fechaInicioContrato = explode("-", $fechaInicioContrato);
		$fechaInicioContrato = $this->transformarFecha($fechaInicioContrato[2] . "-" . $fechaInicioContrato[1] . "-" . $fechaInicioContrato[0]);

		// Tranformación de fecha de termino del contrato
		$fechaTerminoContrato = explode("-", $fechaTerminoContrato);
		$fechaTerminoContrato = $this->transformarFecha($fechaTerminoContrato[2] . "-" . $fechaTerminoContrato[1] . "-" . $fechaTerminoContrato[0]);



		// Tranformación de fecha de nacimiento
		foreach ($arrayTrabajador as $key => $t) {
			$idCargo = $t->idCargo;
			$fecha = $this->transformarFecha($t->atr_fechaNacimiento);
			$t->atr_fechaNacimiento = $fecha;
			$t->prevision = strtoupper($t->prevision);
			$t->cargo = strtoupper($t->cargo);
		}
		$funciones = $this->FuncionesModel->getListadoTareasViewContrato($idCargo);


		foreach ($arrayRemuneracion as $key => $r) {
			$sueldo = $r->atr_sueldoMensual;
			$colacion = $r->atr_colacion;
			$movilizacion = $r->atr_movilizacion;
			$asistencia = $r->atr_asistencia;
		}


		$sueldo = str_replace(".", "", $sueldo);
		$letras = strtolower($this->convertir($sueldo));

		$colacion = str_replace(".", "", $colacion);
		$letrasColacion = strtolower($this->convertir($colacion));

		$movilizacion = str_replace(".", "", $movilizacion);
		$letrasMovilizacion = strtolower($this->convertir($movilizacion));

		$asistencia = str_replace(".", "", $asistencia);
		$letrasAsistencia = strtolower($this->convertir($asistencia));



		$data = array(
			'titulo'										=> $titulo,
			'items'											=> $items,
			'ciudadFirma'								=> $ciudadFirma,
			'fechaDeHoy'								=> $fechaDeHoy,
			'fechaInicioContrato'				=> $fechaInicioContrato,
			'fechaTerminoContrato'			=> $fechaTerminoContrato,
			'arrayTrabajador'						=> $arrayTrabajador,
			'arrayRemuneracion'					=> $arrayRemuneracion,
			'arrayRemuneracionExtra'		=> $arrayRemuneracionExtra,
			'arrayFunciones'						=> $funciones,
			'letrasSueldo'							=> $letras,
			'letrasColacion'						=> $letrasColacion,
			'letrasMovilizacion'				=> $letrasMovilizacion,
			'letrasAsistencia'					=> $letrasAsistencia,
			'itemsContrato'							=> $itemsContrato,
			'numeroRomano'							=> $arrayNumerosRomanos,
		);


		$html = $this->load->view('pdf/contratos/contratoPersonalizado', $data, TRUE);
		// Cargamos la librería
		$this->load->library('Pdfgenerator');
		// definamos un nombre para el archivo. No es necesario agregar la extension .pdf
		$filename = 'contrato';
		// generamos el PDF. Pasemos por encima de la configuración general y definamos otro tipo de papel
		$this->pdfgenerator->generate($html, $filename, TRUE, 'Letter', 'portrait', 0);
	}
	function view_generarLiquidacion()
	{
		/* llenar con valores desde planilladepago.php */
		/* $trabajador = $this->input->get("trabajador");
		$ciudadFirma = $this->input->get("ciudadFirma");
		$fechaInicioContrato = $this->input->get("fechaInicio");
		$fechaTerminoContrato = $this->input->get("fechaTermino"); */
		//

		//
		$mesCorriente = $this->input->get("mesCorriente");
		$razonSocial = $this->input->get("razonSocial");
		$rutEmpresa = $this->input->get("rutEmpresa");
		$nombreTrabajador = $this->input->get("nombreTrabajador");
		$rutTrabajador = $this->input->get("rutTrabajador");
		$centralCosto = $this->input->get("centralCosto");
		$afpTrabajador = $this->input->get("afpTrabajador");
		$saludTrabajador = $this->input->get("saludTrabajador");
		$diasTrabajados = $this->input->get("diasTrabajados");
		$horasExtras = $this->input->get("horasExtras");
		$cargas = $this->input->get("cargas");
		$cargasFamiliaresMonto = $this->input->get("cargasFamiliaresMonto");
		$sueldoBase = $this->input->get("sueldoBase");
		$gratificacionLegal = $this->input->get("gratificacionLegal");
		$totalImponible = $this->input->get("totalImponible");

		$totalNoImponible = $this->input->get("totalNoImponible");
		$valorPrevision = $this->input->get("valorPrevision");
		$valorSalud = $this->input->get("valorSalud");
		$valorCesantia = $this->input->get("valorCesantia");
		$valorImpuestoUnico = $this->input->get("valorImpuestoUnico");
		$totalDescuentosLegales = $this->input->get("totalDescuentosLegales");

		$atr_monto = $this->input->get("atr_monto");
		$totalPrestamo = $this->input->get("totalPrestamo");
		$cantidadCuotas = $this->input->get("cantidadCuotas");
		$montoDescuento = $this->input->get("montoDescuento");
		$totalOtrosDescuentos = $this->input->get("totalOtrosDescuentos");
		$totalDescuentos = $this->input->get("totalDescuentos");
		$totalHaberes = $this->input->get("totalHaberes");
		$valorAlcanceLiquido = $this->input->get("valorAlcanceLiquido");
		$montoPrestamo =  $this->input->get("montoPrestamo");
		$bonoAsistenciaAPagar =  $this->input->get("bonoAsistenciaAPagar");
		$bonoMovilizacion = $this->input->get("bonoMovilizacion");
		$bonoColacion = $this->input->get("bonoColacion");;
		$valorUF = $this->input->get("valorUF");
		$valorUTM = $this->input->get("valorUTM");
		$fechaTermino = $this->input->get("fechaTermino");
		$totalTributable = $this->input->get("totalTributable");
		$valorSaludAdicional = $this->input->get("valorSaludAdicional");
		$valorImponible = $this->input->get("valorImponible");
		$plan = $this->input->get("plan");
		$valorConvertido = str_replace(".", "", $valorAlcanceLiquido);
		$letrasValorAlcanceLiquido = strtolower($this->convertir($valorConvertido));
		/* fin datos calculados */
		/* valores para el documento */
		$tituloCabecera = "LIQUIDACION DE SUELDO";
		$data = array(
			'valorUF'	=> $valorUF,
			'valorUTM' => $valorUTM,
			'mesCorriente'	=> $mesCorriente,
			'fechaTermino'  => $fechaTermino,
			'razonSocial'	=> $razonSocial,
			'rutEmpresa'	=> $rutEmpresa,
			'nombreTrabajador'	=> $nombreTrabajador,
			'rutTrabajador'	=> $rutTrabajador,
			'centralCosto'	=> $centralCosto,
			'afpTrabajador'	=> $afpTrabajador,
			'saludTrabajador'	=> $saludTrabajador,
			'diasTrabajados'	=> $diasTrabajados,
			'horasExtras'	=> $horasExtras,
			'cargas'	=> $cargas,
			'cargasFamiliaresMonto'	=> $cargasFamiliaresMonto,
			'sueldoBase'	=> $sueldoBase,
			'gratificacionLegal'	=> $gratificacionLegal,
			'totalImponible'	=> $totalImponible,
			'bonoAsistenciaAPagar' => $bonoAsistenciaAPagar,
			'totalNoImponible'	=> $totalNoImponible,
			'valorPrevision'	=> $valorPrevision,
			'valorSalud'	=> $valorSalud,
			'valorCesantia'	=> $valorCesantia,
			'valorImpuestoUnico'	=> $valorImpuestoUnico,
			'totalTributable'		=> $totalTributable,
			'totalDescuentosLegales'	=> $totalDescuentosLegales,
			'atr_monto'	=> $atr_monto,
			'totalPrestamo'	=> $totalPrestamo,
			'cantidadCuotas'	=> $cantidadCuotas,
			'montoDescuento'	=> $montoDescuento,
			'totalOtrosDescuentos'	=> $totalOtrosDescuentos,
			'totalDescuentos'	=> $totalDescuentos,
			'totalHaberes'	=> $totalHaberes,
			'valorAlcanceLiquido'	=> $valorAlcanceLiquido,
			'tituloCabecera'	=> $tituloCabecera,
			'montoPrestamo' => $montoPrestamo,
			'bonoMovilizacion'	=> $bonoMovilizacion,
			'bonoColacion'	=> $bonoColacion,
			'valorSaludAdicional' => $valorSaludAdicional,
			'plan' => $plan,
			'valorImponible' => $valorImponible,
			'letrasValorAlcanceLiquido' => $letrasValorAlcanceLiquido

		);
		$html = $this->load->view('pdf/liquidacionGenerada', $data, TRUE);
		$this->load->library('Pdfgenerator');
		$filename = 'liquidacionGenerada';
		$this->pdfgenerator->generate($html, $filename, TRUE, 'Letter', 'portrait', 0);
	}

	function obtenerInformacion()
	{
		$trabajador = $this->input->get("trabajador");
		var_dump($this->ContratosModel->getDetalleTrabajadorContrato($trabajador));
	}

	function view_anexoConFechaTermino()
	{
		$trabajador = $this->input->get("trabajador");
		$fechaTermino = $this->input->get("fechaTermino");
		$ciudadFirma = $this->input->get("ciudadFirma");
		$titulo = "ANEXO DE CONTRATO";

		// Tranformación de fecha actual
		$fechaDeHoy = date("d-m-Y");
		$fechaDeHoy = $this->transformarFecha($fechaDeHoy);

		$fechaTermino = explode('-', $fechaTermino);
		$fechaTermino = $fechaTermino[2] . "-" . $fechaTermino[1] . "-" . $fechaTermino[0];
		$fechaTermino = $this->transformarFecha($fechaTermino);

		$informacion = $this->ContratosModel->getDetalleTrabajadorContrato($trabajador);

		$contador = 0;
		foreach ($informacion as $key => $i) {
			if ($contador == 0) {
				$arrayTrabajador = $i;
			}
			if ($contador == 1) {
				$arrayRemuneracion = $i;
			}
			if ($contador == 2) {
				$arrayRemuneracionExtra = $i;
			}
			$contador = $contador + 1;
		}




		$data = array(
			'titulo'										=> $titulo,
			'ciudadFirma'								=> $ciudadFirma,
			'fechaDeHoy'								=> $fechaDeHoy,
			'fechaTerminoProrroga'			=> $fechaTermino,
			'arrayTrabajador'						=> $arrayTrabajador,
		);


		$html = $this->load->view('pdf/anexos/anexoConFechaTermino', $data, TRUE);
		// Cargamos la librería
		$this->load->library('Pdfgenerator');
		// definamos un nombre para el archivo. No es necesario agregar la extension .pdf
		$filename = 'contrato';
		// generamos el PDF. Pasemos por encima de la configuración general y definamos otro tipo de papel
		$this->pdfgenerator->generate($html, $filename, TRUE, 'Letter', 'portrait', 0);
	}


	function view_anexoPasarIndefinido()
	{
		$trabajador = $this->input->get("trabajador");
		$fechaComienzo = $this->input->get("fechaComienzo");
		$ciudadFirma = $this->input->get("ciudadFirma");
		$clausulas = $this->input->get("clausula");

		$clausulas = explode(',', $clausulas);

		$cantClausulas = count($clausulas);

		// var_dump($clausulas);
		// exit();

		$titulo = "ANEXO DE CONTRATO";

		// Tranformación de fecha actual
		$fechaDeHoy = date("d-m-Y");
		$fechaDeHoy = $this->transformarFecha($fechaDeHoy);

		$fechaComienzo = explode('-', $fechaComienzo);
		$fechaComienzo = $fechaComienzo[2] . "-" . $fechaComienzo[1] . "-" . $fechaComienzo[0];
		$fechaComienzo = $this->transformarFecha($fechaComienzo);

		$manipularContrato = $this->PDFModel->manipulaciones($trabajador, date("Y-m-d"));
		// var_dump($manipularContrato);
		// exit();

		$informacion = $this->ContratosModel->getDetalleTrabajadorContrato($trabajador);

		$contador = 0;
		foreach ($informacion as $key => $i) {
			if ($contador == 0) {
				$arrayTrabajador = $i;
			}
			if ($contador == 1) {
				$arrayRemuneracion = $i;
			}
			if ($contador == 2) {
				$arrayRemuneracionExtra = $i;
			}
			$contador = $contador + 1;
		}




		$data = array(
			'titulo'										=> $titulo,
			'ciudadFirma'								=> $ciudadFirma,
			'clausulas'									=> $manipularContrato,
			'fechaDeHoy'								=> $fechaDeHoy,
			'fechaComienzo'							=> $fechaComienzo,
			'arrayTrabajador'						=> $arrayTrabajador,
		);


		$html = $this->load->view('pdf/anexos/anexoPasarIndefinido', $data, TRUE);
		// Cargamos la librería
		$this->load->library('Pdfgenerator');
		// definamos un nombre para el archivo. No es necesario agregar la extension .pdf
		$filename = 'anexo';
		// generamos el PDF. Pasemos por encima de la configuración general y definamos otro tipo de papel
		$this->pdfgenerator->generate($html, $filename, TRUE, 'Letter', 'portrait', 0);
	}


	function view_anexoSujetoLicitacion()
	{
		$trabajador = $this->input->get("trabajador");
		$fechaComienzo = $this->input->get("fechaComienzo");
		$ciudadFirma = $this->input->get("ciudadFirma");

		$titulo = "ANEXO DE CONTRATO";

		// Tranformación de fecha actual
		$fechaDeHoy = date("d-m-Y");
		$fechaDeHoy = $this->transformarFecha($fechaDeHoy);

		$fechaComienzo = explode('-', $fechaComienzo);
		$fechaComienzo = $fechaComienzo[2] . "-" . $fechaComienzo[1] . "-" . $fechaComienzo[0];
		$fechaComienzo = $this->transformarFecha($fechaComienzo);

		$manipularContrato = $this->PDFModel->manipulaciones($trabajador, date("Y-m-d"));
		// var_dump($manipularContrato);
		// exit();

		$informacion = $this->ContratosModel->getDetalleTrabajadorContrato($trabajador);

		$contador = 0;
		foreach ($informacion as $key => $i) {
			if ($contador == 0) {
				$arrayTrabajador = $i;
			}
			if ($contador == 1) {
				$arrayRemuneracion = $i;
			}
			if ($contador == 2) {
				$arrayRemuneracionExtra = $i;
			}
			$contador = $contador + 1;
		}

		$data = array(
			'titulo'										=> $titulo,
			'ciudadFirma'								=> $ciudadFirma,
			'clausulas'									=> $manipularContrato,
			'fechaDeHoy'								=> $fechaDeHoy,
			'fechaComienzo'							=> $fechaComienzo,
			'arrayTrabajador'						=> $arrayTrabajador,
		);


		$html = $this->load->view('pdf/anexos/anexoSujetoLicitacion', $data, TRUE);
		// Cargamos la librería
		$this->load->library('Pdfgenerator');
		// definamos un nombre para el archivo. No es necesario agregar la extension .pdf
		$filename = 'anexo';
		// generamos el PDF. Pasemos por encima de la configuración general y definamos otro tipo de papel
		$this->pdfgenerator->generate($html, $filename, TRUE, 'Letter', 'portrait', 0);
	}

	function view_anexoModificacionClausula()
	{
		$trabajador = $this->input->get("trabajador");
		$fechaComienzo = $this->input->get("fechaComienzo");
		$ciudadFirma = $this->input->get("ciudadFirma");

		$titulo = "ANEXO DE CONTRATO";

		// Tranformación de fecha actual
		$fechaDeHoy = date("d-m-Y");
		$fechaDeHoy = $this->transformarFecha($fechaDeHoy);

		$fechaComienzo = explode('-', $fechaComienzo);
		$fechaComienzo = $fechaComienzo[2] . "-" . $fechaComienzo[1] . "-" . $fechaComienzo[0];
		$fechaComienzo = $this->transformarFecha($fechaComienzo);

		$manipularContrato = $this->PDFModel->manipulaciones($trabajador, date("Y-m-d"));

		$informacion = $this->ContratosModel->getDetalleTrabajadorContrato($trabajador);

		$contador = 0;
		foreach ($informacion as $key => $i) {
			if ($contador == 0) {
				$arrayTrabajador = $i;
			}
			if ($contador == 1) {
				$arrayRemuneracion = $i;
			}
			if ($contador == 2) {
				$arrayRemuneracionExtra = $i;
			}
			$contador = $contador + 1;
		}




		$data = array(
			'titulo'										=> $titulo,
			'ciudadFirma'								=> $ciudadFirma,
			'clausulas'									=> $manipularContrato,
			'fechaDeHoy'								=> $fechaDeHoy,
			'fechaComienzo'							=> $fechaComienzo,
			'arrayTrabajador'						=> $arrayTrabajador,
		);


		$html = $this->load->view('pdf/anexos/anexoModificacionClausula', $data, TRUE);
		// Cargamos la librería
		$this->load->library('Pdfgenerator');
		// definamos un nombre para el archivo. No es necesario agregar la extension .pdf
		$filename = 'anexo';
		// generamos el PDF. Pasemos por encima de la configuración general y definamos otro tipo de papel
		$this->pdfgenerator->generate($html, $filename, TRUE, 'Letter', 'portrait', 0);
	}



	function view_anexoHorasExtras()
	{
		$trabajador = $this->input->get("trabajador");
		$motivo = $this->input->get("motivo");
		$ciudadFirma = $this->input->get("ciudadFirma");
		$horasextras = $this->input->get("horas");
		$fechaTermino = $this->input->get("fechaLimite");

		$fechaTermino = explode('-', $fechaTermino);
		$fechaTermino = $fechaTermino[2] . "-" . $fechaTermino[1] . "-" . $fechaTermino[0];
		$fechaTermino = $this->transformarFecha($fechaTermino);

		$titulo = "PACTO TEMPORAL DE HORAS EXTRAS";

		// Tranformación de fecha actual
		$fechaDeHoy = date("d-m-Y");
		$fechaDeHoy = $this->transformarFecha($fechaDeHoy);

		// $fechaComienzo = explode( '-', $fechaComienzo );
		// $fechaComienzo = $fechaComienzo[2]."-".$fechaComienzo[1]."-".$fechaComienzo[0];
		// $fechaComienzo = $this->transformarFecha( $fechaComienzo );

		// $manipularContrato = $this->PDFModel->manipulaciones($trabajador, date("Y-m-d") );

		$informacion = $this->ContratosModel->getDetalleTrabajadorContrato($trabajador);

		$contador = 0;
		foreach ($informacion as $key => $i) {
			if ($contador == 0) {
				$arrayTrabajador = $i;
			}
			if ($contador == 1) {
				$arrayRemuneracion = $i;
			}
			if ($contador == 2) {
				$arrayRemuneracionExtra = $i;
			}
			$contador = $contador + 1;
		}




		$data = array(
			'titulo'										=> $titulo,
			'ciudadFirma'								=> $ciudadFirma,
			'motivo'										=> $motivo,
			'horasextras'								=> $horasextras,
			'fechaDeHoy'								=> $fechaDeHoy,
			'arrayTrabajador'						=> $arrayTrabajador,
			'fechaTermino'							=> $fechaTermino,
			// 'clausulas'									=> $manipularContrato,
			// 'fechaComienzo'							=> $fechaComienzo,
		);


		$html = $this->load->view('pdf/anexos/anexoHorasExtras', $data, TRUE);
		// Cargamos la librería
		$this->load->library('Pdfgenerator');
		// definamos un nombre para el archivo. No es necesario agregar la extension .pdf
		$filename = 'anexo';
		// generamos el PDF. Pasemos por encima de la configuración general y definamos otro tipo de papel
		$this->pdfgenerator->generate($html, $filename, TRUE, 'Letter', 'portrait', 0);
	}


	function transformarFecha($fecha)
	{
		// Convertir fecha guardada en bd al formato 14 enero 2001
		$partesFecha = explode("-", $fecha);

		switch ($partesFecha[1]) {
			case "01":
				$nombreMes = "enero";
				break;
			case "02":
				$nombreMes = "febrero";
				break;
			case "03":
				$nombreMes = "marzo";
				break;
			case "04":
				$nombreMes = "abril";
				break;
			case "05":
				$nombreMes = "mayo";
				break;
			case "06":
				$nombreMes = "junio";
				break;
			case "07":
				$nombreMes = "julio";
				break;
			case "08":
				$nombreMes = "agosto";
				break;
			case "09":
				$nombreMes = "septiembre";
				break;
			case "10":
				$nombreMes = "octubre";
				break;
			case "11":
				$nombreMes = "noviembre";
				break;
			case "12":
				$nombreMes = "diciembre";
				break;
		}
		return $fecha = $partesFecha[0] . " de " . $nombreMes . " de " . $partesFecha[2];
	}


	function transformarFechaAJAX()
	{
		// Convertir fecha guardada en bd al formato 14 enero 2001
		$fecha = $this->input->post('fecha');
		$partesFecha = explode("-", $fecha);

		switch ($partesFecha[1]) {
			case "01":
				$nombreMes = "enero";
				break;
			case "02":
				$nombreMes = "febrero";
				break;
			case "03":
				$nombreMes = "marzo";
				break;
			case "04":
				$nombreMes = "abril";
				break;
			case "05":
				$nombreMes = "mayo";
				break;
			case "06":
				$nombreMes = "junio";
				break;
			case "07":
				$nombreMes = "julio";
				break;
			case "08":
				$nombreMes = "agosto";
				break;
			case "09":
				$nombreMes = "septiembre";
				break;
			case "10":
				$nombreMes = "octubre";
				break;
			case "11":
				$nombreMes = "noviembre";
				break;
			case "12":
				$nombreMes = "diciembre";
				break;
		}
		$fecha = $partesFecha[0] . " de " . $nombreMes . " de " . $partesFecha[2];
		echo json_encode($fecha);
	}


	public function convertir($number, $moneda = '', $centimos = '', $forzarCentimos = false)
	{
		$converted = '';
		$decimales = '';

		if (($number < 0) || ($number > 999999999)) {
			return 'No es posible convertir el numero a letras';
		}

		$div_decimales = explode('.', $number);

		if (count($div_decimales) > 1) {
			$number = $div_decimales[0];
			$decNumberStr = (string) $div_decimales[1];
			if (strlen($decNumberStr) == 2) {
				$decNumberStrFill = str_pad($decNumberStr, 9, '0', STR_PAD_LEFT);
				$decCientos = substr($decNumberStrFill, 6);
				$decimales = self::convertGroup($decCientos);
			}
		} else if (count($div_decimales) == 1 && $forzarCentimos) {
			$decimales = 'CERO ';
		}

		$numberStr = (string) $number;
		$numberStrFill = str_pad($numberStr, 9, '0', STR_PAD_LEFT);
		$millones = substr($numberStrFill, 0, 3);
		$miles = substr($numberStrFill, 3, 3);
		$cientos = substr($numberStrFill, 6);

		if (intval($millones) > 0) {
			if ($millones == '001') {
				$converted .= 'UN MILLON ';
			} else if (intval($millones) > 0) {
				$converted .= sprintf('%sMILLONES ', self::convertGroup($millones));
			}
		}

		if (intval($miles) > 0) {
			if ($miles == '001') {
				$converted .= 'MIL ';
			} else if (intval($miles) > 0) {
				$converted .= sprintf('%sMIL ', self::convertGroup($miles));
			}
		}

		if (intval($cientos) > 0) {
			if ($cientos == '001') {
				$converted .= 'UN ';
			} else if (intval($cientos) > 0) {
				$converted .= sprintf('%s ', self::convertGroup($cientos));
			}
		}

		if (empty($decimales)) {
			$valor_convertido = $converted . strtoupper($moneda);
		} else {
			$valor_convertido = $converted . strtoupper($moneda) . ' CON ' . $decimales . ' ' . strtoupper($centimos);
		}

		return $valor_convertido;
	}

	private static function convertGroup($n)
	{
		$output = '';

		if ($n == '100') {
			$output = "CIEN ";
		} else if ($n[0] !== '0') {
			$output = self::$CENTENAS[$n[0] - 1];
		}

		$k = intval(substr($n, 1));

		if ($k <= 20) {
			$output .= self::$UNIDADES[$k];
		} else {
			if (($k > 30) && ($n[2] !== '0')) {
				$output .= sprintf('%sY %s', self::$DECENAS[intval($n[1]) - 2], self::$UNIDADES[intval($n[2])]);
			} else {
				$output .= sprintf('%s%s', self::$DECENAS[intval($n[1]) - 2], self::$UNIDADES[intval($n[2])]);
			}
		}

		return $output;
	}


	function getManipularContrato()
	{
		$idTrabajador 					= $this->input->post("idTrabajador");
		$numRomano 							= $this->input->post("numRomano");
		$item 									= $this->input->post("item");
		$modificacion						= $this->input->post("modificacion");
		$fecha 									= date("Y-m-d");

		$str1 = str_replace(array("\r\n", "\n\r", "\r", "\n"), "<br />", $modificacion);
		var_dump($str1);

		$resultado = $this->PDFModel->getManipularContrato($numRomano, $item, $modificacion, $fecha, $idTrabajador);
		echo json_encode($resultado);
	}

	function limpiarManipularContrato()
	{
		$fecha 									= date("Y-m-d");

		$resultado = $this->PDFModel->limpiarManipularContrato($fecha);
		echo json_encode($resultado);
	}
}
