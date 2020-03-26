<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ContratosModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function getListadoTrabajadoresContrato(){
      $this->db->select("t.cp_trabajador,t.atr_rut, t.atr_nombres, t.atr_apellidos, e.atr_nombre as empresa, es.atr_nombre as estado ");
      $this->db->from("fa_trabajador t");
      $this->db->join("fa_empresa e", "t.cf_empresa = e.cp_empresa");
      $this->db->join("fa_estado es", "t.cf_estado = es.cp_estado");
      return $this->db->get();
    }

    function getContratosTrabajador($idTrabajador){
      $this->db->select(" c.atr_fechaInicio, c.atr_fechaTermino, ca.atr_nombre ");
      $this->db->from("fa_contrato c");
      $this->db->join("fa_cargo ca","ca.cp_cargo = c.cf_cargo");
      $this->db->where("c.cf_trabajador", $idTrabajador);
      $resultado =  $this->db->get()->result();
      return $resultado;
    }

}
