<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class HistorialModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function vistaCronologica($idTrabajador){
      $this->db->select('doc.atr_nombreDoc, doc.atr_tipo, doc.atr_fechacronologica, cf_contrato, cf_transferencia, cf_cartaamonestacion');
      $this->db->from('fa_documento doc');
      $this->db->where('doc.cf_trabajador',$idTrabajador);
      $this->db->order_by('doc.atr_fechacronologica', 'DESC');
      return $this->db->get()->result();
    }

    function vistaContratos($idTrabajador){
      $this->db->select('con.cp_contrato ,con.atr_fechaInicio, con.atr_fechaTermino, con.cf_cargo, ca.atr_nombre as cargo, doc.atr_nombreDoc');
      $this->db->from('fa_contrato con');
      $this->db->join('fa_cargo ca','ca.cp_cargo = con.cf_cargo');
      $this->db->join('fa_documento doc', 'con.cp_contrato = doc.cf_contrato');
      $this->db->where('con.cf_trabajador', $idTrabajador);
      $this->db->order_by('con.atr_fechaInicio', 'DESC');
      return $this->db->get()->result();
    }

    function vistaTransferencias($idTrabajador){
      $this->db->select('tr.cp_transferencia, tr.atr_fecha, tr.atr_monto, b.atr_nombre, doc.atr_tipo as tipo');
      $this->db->from('fa_transferencia tr');
      $this->db->join('fa_banco b','b.cp_banco = tr.cf_banco');
      $this->db->join('fa_documento doc', 'tr.cp_transferencia = doc.cf_transferencia');
      $this->db->where('tr.cf_trabajador',$idTrabajador);
      $this->db->order_by('tr.atr_fecha', 'DESC');
      return $this->db->get()->result();
    }

    function vistaCartasAmonestacion($idTrabajador){
      $this->db->select('ca.cp_cartaAmonestacion, ca.atr_motivo, ca.atr_grado, ca.atr_fecha');
      $this->db->from('fa_cartaamonestacion ca');
      $this->db->where('ca.cf_trabajador',$idTrabajador);
      $this->db->order_by('ca.atr_fecha', 'DESC');
      return $this->db->get()->result();
    }


}
