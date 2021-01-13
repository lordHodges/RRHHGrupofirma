<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HaberDescuentoController extends CI_Controller {

    public function __construct(){
        
        parent::__construct();
        $this->load->model("MantenedoresModel");
    }

    public function index(){

        $this->load->view('template/menu');
        $this->load->view('mantenedores/haberDescuento');
    }

    public function getListadoHaberDescuento(){
        $draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
        $books = $this->MantenedoresModel->getListadoHaberDescuento();
        $data = array();
		foreach ($books->result() as $r) {
				$data[] = array(
                    $r->cp_hdescuentos,
                    $r->atr_dhdescuentos,
                    $r->atr_tipo,
                    $r->atr_imponible,
                    $r->atr_tributable,
                    $r->atr_gratificable,
                    $r->atr_fijo,
                    $r->atr_variable,
                    $r->atr_semcorrida,
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

    public function addHaberDescuento(){
        $dhdescuentos = $this->input->post("dhdescuentos");
        $tipo = $this->input->post("tipo");
        $imponible = $this->input->post("imponible");
        $tributable = $this->input->post("tributable");
        $gratificable = $this->input->post("gratificable");
        $fijo = $this->input->post("fijo");
        $variable = $this->input->post("variable");
        $semcorrida = $this->input->post("semcorrida");

        $resultado = $this->MantenedoresModel->addHaberDescuento($dhdescuentos,$tipo,$imponible,$tributable,$gratificable,$fijo,$variable,$semcorrida);
        echo json_encode(array("msg" => $resultado));
    }

    public function getDetalleHaberDescuento(){
        $idhdescuento = $this->input->post("hdescuentos");

        $resultado = $this->MantenedoresModel->getDetalleHaberDescuento($idHaberDescuento);
        echo json_encode(array("msg" => $resultado));
    }

    public function updateHaberDescuento(){
        $hdescuentos = $this->input->post("hdescuentos");
        $dhdescuentos = $this->input->post("dhdescuentos");
        $tipo = $this->input->post("tipo");
        $imponible = $this->input->post("imponible");
        $tributable = $this->input->post("tributable");
        $gratificable = $this->input->post("gratificable");
        $fijo = $this->input->post("fijo");
        $variable = $this->input->post("variable");
        $semcorrida = $this->input->post("semcorrida");
        
        $resultado = $this->MantenedoresModel->updateHaberDescuento($dhdescuentos,$tipo,$imponible,$tributable,$gratificable,$fijo,$variable,$semcorrida);
        echo json_encode(array("msg" => $resultado));
    }

}