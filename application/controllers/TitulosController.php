<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TitulosController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("MantenedoresModel");
	}

	public function index()
	{
		$this->load->view('template/menu');
		$this->load->view('mantenedores/titulos');
	}

	// function getTitulos($id){
	// 		$this->db->select("oa.atr_descripcion");
	// 		$this->db->from("fa_otrosantecedentes oa");
	// 		$this->db->join("fa_titulo ti", "ti.cp_titulo= oa.cf_titulo");
	// 		$this->db->where("ti.cf_cargo", $id);
	// 		return $this->db->get();
	//
	function getTitulos(){
		$cargo = $this->input->post("cargo");
		$resultado = $this->MantenedoresModel->getListadoTitulos($cargo);
		echo json_encode(array("msg" => $resultado));
	}


	public function addTitulo(){
		$nombre = $this->input->post("nombre");
		$resultado = $this->MantenedoresModel->addTitulo($nombre);
		echo json_encode(array("msg" => $resultado));
	}







}
