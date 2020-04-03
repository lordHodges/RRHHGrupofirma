<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  PDFController extends CI_Controller {

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
	}

	public function index()
	{

	}



	function cargarPerfilesOcupacionales(){
		$this->load->view('template/menu');
		$this->load->view('perfilOcupacional/perfilOcupacionalCargos');
	}

  function view_perfilesOcupacionales(){
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

		foreach ($infoCargo as $key => $value) {
			 $nombreCargo = $key->$atr_nombre;
		}

		$html = $this->load->view('pdf/perfilOcupacional', $data, TRUE);
		// Cargamos la librería
		$this->load->library('Pdfgenerator');
		// definamos un nombre para el archivo. No es necesario agregar la extension .pdf
		$filename = 'perfilOcupacional_'.$nombreCargo.'';
		// generamos el PDF. Pasemos por encima de la configuración general y definamos otro tipo de papel
		$this->pdfgenerator->generate($html, $filename, TRUE, 'Letter', 'portrait', 0);
	}




	function view_contratoEstandar(){
		$trabajador = $this->input->get("trabajador");
		$ciudadFirma = $this->input->get("ciudadFirma");
		$fechaInicioContrato = $this->input->get("fechaInicio");
		$fechaTerminoContrato = $this->input->get("fechaTermino");
		$titulo = "CONTRATO DE TRABAJO A PLAZO";



		$informacion = $this->ContratosModel->getDetalleTrabajadorContrato($trabajador);


		$contador = 0;
		foreach ($informacion as $key => $i) {
			if($contador == 0){
				$arrayTrabajador = $i;
			}
			if($contador == 1){
				$arrayRemuneracion = $i;
			}
			if($contador == 2){
				$arrayRemuneracionExtra = $i;
			}
			$contador = $contador + 1;
		}

		// Tranformación de fecha actual
		$fechaDeHoy = date("d-m-Y");
		$fechaDeHoy = $this->transformarFecha( $fechaDeHoy );

		// Tranformación de fecha de inicio del contrato
		$fechaInicioContrato = explode("-", $fechaInicioContrato);
		$fechaInicioContrato = $this->transformarFecha( $fechaInicioContrato[2]."-".$fechaInicioContrato[1]."-".$fechaInicioContrato[0] );

		// Tranformación de fecha de termino del contrato
		$fechaTerminoContrato = explode("-", $fechaTerminoContrato);
		$fechaTerminoContrato = $this->transformarFecha( $fechaTerminoContrato[2]."-".$fechaTerminoContrato[1]."-".$fechaTerminoContrato[0] );



		// Tranformación de fecha de nacimiento
		foreach ($arrayTrabajador as $key => $t) {
			$idCargo = $t->idCargo;
			$fecha = $this->transformarFecha( $t->atr_fechaNacimiento );
			$t->atr_fechaNacimiento = $fecha;
			$t->prevision = strtoupper( $t->prevision );
			$t->cargo = strtoupper( $t->cargo );
		}
		$funciones = $this->FuncionesModel->getListadoTareasViewContrato($idCargo);


		foreach ($arrayRemuneracion as $key => $r) {
			$sueldo = $r->atr_sueldoMensual;
			$colacion = $r->atr_colacion;
			$movilizacion = $r->atr_movilizacion;
			$asistencia = $r->atr_asistencia;
		}


		$sueldo = str_replace ( "." , "" , $sueldo  );
		$letras = strtolower($this->convertir($sueldo));

		$colacion = str_replace ( "." , "" , $colacion  );
		$letrasColacion = strtolower($this->convertir($colacion));

		$movilizacion = str_replace ( "." , "" , $movilizacion  );
		$letrasMovilizacion = strtolower($this->convertir($movilizacion));

		$asistencia = str_replace ( "." , "" , $asistencia  );
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
			'letrasAsistencia'					=> $letrasAsistencia
		);


		$html = $this->load->view('pdf/contratoEstandar', $data, TRUE);
		// Cargamos la librería
		$this->load->library('Pdfgenerator');
		// definamos un nombre para el archivo. No es necesario agregar la extension .pdf
		$filename = 'contrato';
		// generamos el PDF. Pasemos por encima de la configuración general y definamos otro tipo de papel
		$this->pdfgenerator->generate($html, $filename, TRUE, 'Letter', 'portrait', 0);
	}















	function view_contratoPersonalizado(){
		$trabajador = $this->input->get("trabajador");
		$ciudadFirma = $this->input->get("ciudadFirma");
		$fechaInicioContrato = $this->input->get("fechaInicio");
		$fechaTerminoContrato = $this->input->get("fechaTermino");
		$items = $this->input->get("items");
		$itemsContrato = $_GET["arrayItems"];
		$itemsContrato = explode(",", $itemsContrato);
		$titulo = "CONTRATO DE TRABAJO A PLAZO";

		$arrayNumerosRomanos = ["I", "II","III","IV","V","VI","VII","VIII","IX","X","XI","XII","XIII", "XIV","XV","XVI","XVII","XVIII","XIX","XX"];





		$informacion = $this->ContratosModel->getDetalleTrabajadorContrato($trabajador);


		$contador = 0;
		foreach ($informacion as $key => $i) {
			if($contador == 0){
				$arrayTrabajador = $i;
			}
			if($contador == 1){
				$arrayRemuneracion = $i;
			}
			if($contador == 2){
				$arrayRemuneracionExtra = $i;
			}
			$contador = $contador + 1;
		}

		// Tranformación de fecha actual
		$fechaDeHoy = date("d-m-Y");
		$fechaDeHoy = $this->transformarFecha( $fechaDeHoy );

		// Tranformación de fecha de inicio del contrato
		$fechaInicioContrato = explode("-", $fechaInicioContrato);
		$fechaInicioContrato = $this->transformarFecha( $fechaInicioContrato[2]."-".$fechaInicioContrato[1]."-".$fechaInicioContrato[0] );

		// Tranformación de fecha de termino del contrato
		$fechaTerminoContrato = explode("-", $fechaTerminoContrato);
		$fechaTerminoContrato = $this->transformarFecha( $fechaTerminoContrato[2]."-".$fechaTerminoContrato[1]."-".$fechaTerminoContrato[0] );



		// Tranformación de fecha de nacimiento
		foreach ($arrayTrabajador as $key => $t) {
			$idCargo = $t->idCargo;
			$fecha = $this->transformarFecha( $t->atr_fechaNacimiento );
			$t->atr_fechaNacimiento = $fecha;
			$t->prevision = strtoupper( $t->prevision );
			$t->cargo = strtoupper( $t->cargo );
		}
		$funciones = $this->FuncionesModel->getListadoTareasViewContrato($idCargo);


		foreach ($arrayRemuneracion as $key => $r) {
			$sueldo = $r->atr_sueldoMensual;
			$colacion = $r->atr_colacion;
			$movilizacion = $r->atr_movilizacion;
			$asistencia = $r->atr_asistencia;
		}


		$sueldo = str_replace ( "." , "" , $sueldo  );
		$letras = strtolower($this->convertir($sueldo));

		$colacion = str_replace ( "." , "" , $colacion  );
		$letrasColacion = strtolower($this->convertir($colacion));

		$movilizacion = str_replace ( "." , "" , $movilizacion  );
		$letrasMovilizacion = strtolower($this->convertir($movilizacion));

		$asistencia = str_replace ( "." , "" , $asistencia  );
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


		$html = $this->load->view('pdf/contratoPersonalizado', $data, TRUE);
		// Cargamos la librería
		$this->load->library('Pdfgenerator');
		// definamos un nombre para el archivo. No es necesario agregar la extension .pdf
		$filename = 'contrato';
		// generamos el PDF. Pasemos por encima de la configuración general y definamos otro tipo de papel
		$this->pdfgenerator->generate($html, $filename, TRUE, 'Letter', 'portrait', 0);
	}





















	function transformarFecha( $fecha ){
		// Convertir fecha guardada en bd al formato 14 enero 2001
		$partesFecha = explode("-", $fecha);

		switch ( $partesFecha[1] ) {
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
		return $fecha = $partesFecha[0]." de ".$nombreMes." de ".$partesFecha[2];
	}






	public function convertir($number, $moneda = '', $centimos = '', $forzarCentimos = false)
	{
			$converted = '';
			$decimales = '';

			if (($number < 0) || ($number > 999999999)) {
					return 'No es posible convertir el numero a letras';
			}

			$div_decimales = explode('.',$number);

			if(count($div_decimales) > 1){
					$number = $div_decimales[0];
					$decNumberStr = (string) $div_decimales[1];
					if(strlen($decNumberStr) == 2){
							$decNumberStrFill = str_pad($decNumberStr, 9, '0', STR_PAD_LEFT);
							$decCientos = substr($decNumberStrFill, 6);
							$decimales = self::convertGroup($decCientos);
					}
			}
			else if (count($div_decimales) == 1 && $forzarCentimos){
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

			if(empty($decimales)){
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

			$k = intval(substr($n,1));

			if ($k <= 20) {
					$output .= self::$UNIDADES[$k];
			} else {
					if(($k > 30) && ($n[2] !== '0')) {
							$output .= sprintf('%sY %s', self::$DECENAS[intval($n[1]) - 2], self::$UNIDADES[intval($n[2])]);
					} else {
							$output .= sprintf('%s%s', self::$DECENAS[intval($n[1]) - 2], self::$UNIDADES[intval($n[2])]);
					}
			}

			return $output;
	}









}
