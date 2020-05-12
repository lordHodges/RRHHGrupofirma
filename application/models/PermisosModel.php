<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PermisosModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function getExistenciasPorModulo($modulo){
        $this->db->select(" ep.cp_existencia_permiso, ep.cf_modulo, ep.cf_permiso, p.atr_descripcion ");
        $this->db->from("fa_existencia_permiso ep");
        $this->db->join("fa_permiso p"," p.cp_permiso = ep.cf_permiso");
        $this->db->where("ep.cf_modulo",$modulo);
        $resultado =  $this->db->get()->result();
        return $resultado;
    }

    function getModulos(){

      $this->db->select(" m.atr_nombre, m.cp_modulo ");
      $this->db->from("fa_modulo m");
      $arrayModulos =  $this->db->get()->result();


      $this->db->select(" ep.cp_existencia_permiso, ep.cf_modulo, ep.cf_permiso, p.atr_descripcion ");
      $this->db->from("fa_existencia_permiso ep");
      $this->db->join("fa_permiso p"," p.cp_permiso = ep.cf_permiso");
      $this->db->group_by("ep.cf_modulo");
      $arrayExistencias =  $this->db->get()->result();


      $data = array(
          "arrayModulos" => $arrayModulos,
          "arrayExistencias" => $arrayExistencias
      );

      return $data;

    }




































}
