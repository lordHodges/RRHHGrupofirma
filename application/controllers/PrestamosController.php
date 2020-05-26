<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PrestamosController extends CI_Controller {

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


	public function getListadoPrestamosTrabajador(){
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$books = $this->PrestamosModel->getListadoPrestamosTrabajador();
		$data = array();
		foreach ($books->result() as $r) {
			$montoTotal = number_format($r->atr_montoTotal, 0, ",", ".");
			$montoTotal = "$".$montoTotal;
				$data[] = array(
					$r->cp_prestamo,
					$r->atr_rut,
					$r->atr_nombres." ".$r->atr_apellidos,
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


	public function obtenerRutTrabajador(){

		$idTrabajador = $this->input->post("idTrabajador");

		$resultado = $this->PrestamosModel->obtenerRutTrabajador($idTrabajador);
		echo json_encode( $resultado) ;
	}


	public function addPrestamo(){
		$montoTotal = $this->input->post("montoTotal");
		$totalCuotas = $this->input->post("totalCuotas");
		$idTrabajador = $this->input->post("idTrabajador");
		$autoriza = $this->input->post("autoriza");
		$observacion = $this->input->post("observacion");

		$resultado = $this->PrestamosModel->addPrestamo($montoTotal,$totalCuotas,$idTrabajador,$autoriza, $observacion);
		echo json_encode( $resultado) ;
	}

	public function addDetallePrestamo(){
		$idTrabajador = $this->input->post("idTrabajador");
		$numCuota = $this->input->post("numCuota");
		$montoDetalle = $this->input->post("montoDetalle");
		$fechaDetalle = $this->input->post("fechaDetalle");
		$cfPrestamo = $this->input->post("cfPrestamo");

		$montoDetalle = str_replace ( "." , "" , $montoDetalle  );
		$montoDetalle = str_replace ( "$" , "" , $montoDetalle  );

		$resultado = $this->PrestamosModel->addDetallePrestamo($idTrabajador,$numCuota,$montoDetalle,$fechaDetalle,$cfPrestamo);
		echo json_encode( $resultado) ;
	}


	public function getDetallePrestamo(){
		$idPrestamo = $this->input->post("idPrestamo");

		$resultado = $this->PrestamosModel->getDetallePrestamo($idPrestamo);
		echo json_encode( $resultado) ;
	}


	public function editarDetalleDePrestamo(){
		$idPrestamo = $this->input->post("idPrestamo");
		$numCuota = $this->input->post("numCuota");
		$montoCuota = $this->input->post("montoCuota");
		$fechaPago = $this->input->post("fechaPago");

		$montoCuota = str_replace ( "." , "" , $montoCuota  );
		$montoCuota = str_replace ( "$" , "" , $montoCuota  );

		$resultado = $this->PrestamosModel->editarDetalleDePrestamo($idPrestamo,$numCuota,$montoCuota,$fechaPago);
		echo json_encode( $resultado) ;
	}


































}
