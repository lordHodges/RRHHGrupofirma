<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PDFModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getFechaUltimoContrato($idTrabajador){
        $this->db->select("c.atr_fechaInicio");
        $this->db->from("fa_contrato c");
        $this->db->where("c.cf_trabajador","1");
        $this->db->order_by('c.atr_fechaInicio',"desc");
        $this->db->limit(1);
        return $this->db->get()->result();
    }

    public function getManipularContrato( $numRomano, $item, $modificacion, $fecha, $idTrabajador ){

      $this->db->delete('fa_manipularanexos', array('atr_fecha' => $fecha));

      $data = array(
          "atr_numRomano" => $numRomano,
          "atr_item" => $item,
          "atr_descripcion" => $modificacion,
          "atr_fecha" => $fecha,
          "cf_trabajador" => $idTrabajador
      );
      if ($this->db->insert("fa_manipularanexos", $data)) {
        return $fecha;
      }else{
        return "error";
      }
    }

    public function manipulaciones($idTrabajador, $fecha){
        $this->db->select("ma.cp_manipular, ma.atr_numRomano, ma.atr_item, ma.atr_descripcion");
        $this->db->from("fa_manipularanexos ma");
        $this->db->where("ma.cf_trabajador",$idTrabajador);
        $this->db->where("ma.atr_fecha",$fecha);
        // $this->db->limit(1);
        return $this->db->get()->result();
    }








}
