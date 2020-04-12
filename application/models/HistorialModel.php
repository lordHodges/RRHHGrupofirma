<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class HistorialModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function vistaCronologica($idTrabajador){
      $this->db->select('doc.atr_nombreDoc, doc.atr_tipo, doc.atr_fechacronologica, cf_contrato, cf_transferencia, cf_cartaamonestacion');
      $this->db->from('fa_documento doc');
      // $this->db->join('fa_transferencia tr','tr.cp_transferencia = doc.cf_transferencia');
      // $this->db->join('fa_contrato con','con.cp_contrato = doc.cf_contrato');
      // $this->db->join('fa_cartaamonestacion ca','ca.cp_cartaAmonestacion = doc.cf_cartaamonestacion ');
      $this->db->where('doc.cf_trabajador',$idTrabajador);
      $this->db->order_by('doc.atr_fechacronologica', 'DESC');
      return $this->db->get()->result();
    }


}
