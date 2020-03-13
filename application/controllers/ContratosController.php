<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContratosController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("ContratosModel");
	}

	public function index()
	{
		$this->load->view('template/menu');
		$this->load->view('menuContratos');
	}






}
