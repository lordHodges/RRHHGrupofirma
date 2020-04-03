<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function buscarContratosPorVencer(){
      $this->db->select(" c.atr_fechaTermino, c.atr_fechaInicio, t.atr_nombres, t.atr_apellidos, ca.atr_nombre as cargo");
      $this->db->from("fa_contrato c");
      $this->db->join("fa_trabajador t", " t.cp_trabajador = c.cf_trabajador");
      $this->db->join("fa_cargo ca", "ca.cp_cargo = c.cf_cargo");
      $this->db->order_by('c.atr_fechaTermino', 'ASC');
      return $this->db->get()->result();
    }
}
