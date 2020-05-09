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
				$data[] = array(
					$r->cp_prestamo,
					$r->atr_rut,
					$r->atr_nombres." ".$r->atr_apellidos,
					$r->atr_fechaPrestamo,
					$r->atr_cantidadCuotas,
					$r->atr_montoTotal
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






























	public function addSucursal(){
	$nombre = $this->input->post("nombre");

	$resultado = $this->MantenedoresModel->addSucursal($nombre);
	echo json_encode(array("msg" => $resultado));

	}
























}
