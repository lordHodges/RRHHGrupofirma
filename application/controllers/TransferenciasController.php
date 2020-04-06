<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransferenciasController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("TransferenciasModel");
	}

	public function index()
	{
		$this->load->view('template/menu');
		$this->load->view('transferencias');
	}

	public function getListadoTransferencias(){
    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $books = $this->TransferenciasModel->getListadoTransferencias();
    $data = array();
    foreach ($books->result() as $r) {
        $data[] = array(
						$r->cp_trabajador,
            $r->atr_rut,
						// $r->atr_nombres.concat( $r->atr_apellidos ),
            $r->atr_nombres,
            $r->atr_apellidos,
						$r->empresa,
						$r->sucursal,
						$r->direccion,
  					$r->cargo,
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




}
