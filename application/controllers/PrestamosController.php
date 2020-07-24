<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PrestamosController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("PrestamosModel");
	}

	public function inicioPrestamos()
	{
		$this->load->view('template/menu');
		$this->load->view('prestamos');
	}


	public function getListadoPrestamosTrabajador()
	{
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$books = $this->PrestamosModel->getListadoPrestamosTrabajador();
		$data = array();
		foreach ($books->result() as $r) {
			$montoTotal = $r->atr_montoTotal;
			$montoTotal = "$" . $montoTotal;
			$data[] = array(
				$r->cp_prestamo,
				$r->atr_rut,
				$r->atr_nombres . " " . $r->atr_apellidos,
				$r->atr_fechaPrestamo,
				$r->atr_cantidadCuotas,
				$montoTotal
			);
		}
		$output = array(
			"draw" => $draw,
			"recordsTotal" => $books->num_rows(),
			"recordsFiltered" => $books->num_rows(),
			"data" => $data
		);
		echo json_encode($output);
		exit();
	}


	public function obtenerRutTrabajador()
	{

		$idTrabajador = $this->input->post("idTrabajador");

		$resultado = $this->PrestamosModel->obtenerRutTrabajador($idTrabajador);
		echo json_encode($resultado);
	}


	public function addPrestamo()
	{
		$montoTotal = $this->input->post("montoTotal");
		$totalCuotas = $this->input->post("totalCuotas");
		$idTrabajador = $this->input->post("idTrabajador");
		$autoriza = $this->input->post("autoriza");
		$observacion = $this->input->post("observacion");

		$resultado = $this->PrestamosModel->addPrestamo($montoTotal, $totalCuotas, $idTrabajador, $autoriza, $observacion);
		echo json_encode($resultado);
	}

	public function addDetallePrestamo()
	{
		$idTrabajador = $this->input->post("idTrabajador");
		$numCuota = $this->input->post("numCuota");
		$montoDetalle = $this->input->post("montoDetalle");
		$fechaDetalle = $this->input->post("fechaDetalle");
		$cfPrestamo = $this->input->post("cfPrestamo");

		/* 	$montoDetalle = str_replace ( "." , "" , $montoDetalle  ); */
		$montoDetalle = str_replace("$", "", $montoDetalle);

		$resultado = $this->PrestamosModel->addDetallePrestamo($idTrabajador, $numCuota, $montoDetalle, $fechaDetalle, $cfPrestamo);
		echo json_encode($resultado);
	}


	public function getDetallePrestamo()
	{
		$idPrestamo = $this->input->post("idPrestamo");

		$resultado = $this->PrestamosModel->getDetallePrestamo($idPrestamo);
		echo json_encode($resultado);
	}


	public function editarDetalleDePrestamo()
	{
		$idPrestamo = $this->input->post("idPrestamo");
		$numCuota = $this->input->post("numCuota");
		$montoCuota = $this->input->post("montoCuota");
		$fechaPago = $this->input->post("fechaPago");

		/* $montoCuota = str_replace ( "." , "" , $montoCuota  ); */
		$montoCuota = str_replace("$", "", $montoCuota);

		$resultado = $this->PrestamosModel->editarDetalleDePrestamo($idPrestamo, $numCuota, $montoCuota, $fechaPago);
		echo json_encode($resultado);
	}


	public function descargarComprobante($idPrestamo)
	{
		// importo libreria helper download
		$this->load->helper('download');

		// Solicito al modelo registro de la transferencia
		$prestamos = $this->PrestamosModel->getURLPrestamo($idPrestamo);

		foreach ($prestamos as $key => $value) {
			$nombre = $value->atr_nombreDoc;
			$nombreReal = $value->atr_nombreReal;
		}

		// uploads/transferencias = ruta de la carpeta que contiene los documentos
		// $nombre = nombre asignado al documento en bd
		$file = 'uploads/prestamos/' . $nombre;

		//si quiero el nombre por defecto al descargar -->  force_download($file, NULL);
		force_download($file, NULL);
	}


	public function cargar_prestamo()
	{
		$config['upload_path'] = "./uploads/prestamos/";
		$config['allowed_types'] = 'pdf';
		$config['encrypt_name'] = TRUE;
		$config['max_size'] = "200000";
		$config['max_width'] = "2000";
		$config['max_height'] = "2000";

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('file')) {
			$out = array('error' => $this->upload->display_errors());
			exit();
		} else {
			$out = array('upload_data' => $this->upload->data());
			$cargaExitosa = true;

			//CAPTURA DE DATOS

			$nombreReal  =  	$out['upload_data']['orig_name'];
			$nombreFinal =   $out['upload_data']['file_name'];
			$ruta        =  	$out['upload_data']['file_path'];


			date_default_timezone_set("America/Santiago");
			$fechaActual = date("d-m-Y G:i:s");


			//este valor esta insertado de forma oculta en el formulario
			$fecha = $this->input->post('labelFechaPrestamo');
			$idTrabajador = $this->input->post('labelTrabajador');

			//AQUI COMIENZO ENVIO DE DATOS PARA EL MODELO Y PROCEDER EL INGRESO A BASE DE DATOS
			$resultado = $this->PrestamosModel->cargar_prestamo($nombreReal, $nombreFinal, $ruta, $fecha, $fechaActual, $idTrabajador);

			//REGRESO RESULTADO POSITIVO PARA DESPLEGAR MENSAJE DE EXITO
			echo json_encode($resultado);
			exit();
		}
	}
}
