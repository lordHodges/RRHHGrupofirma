<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BancoController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("MantenedoresModel");
	}

	public function index()
	{
		$this->load->view('template/menu');
		$this->load->view('mantenedores/bancos');
	}

	public function getListadoBancos(){
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$books = $this->MantenedoresModel->getListadoBancos();
		$data = array();
		foreach ($books->result() as $r) {
				$data[] = array(
					$r->cp_banco,
					$r->atr_nombre,
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

	public function addBanco(){
	$nombre = $this->input->post("nombre");

	$resultado = $this->MantenedoresModel->addBanco($nombre);
	echo json_encode(array("msg" => $resultado));
	}







}
