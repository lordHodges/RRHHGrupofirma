<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class OtrosModel extends CI_Model {

    public function __construct() {
        parent::__construct();

    }

    function getListadoOtrosAntecedentes($cargo, $titulo){
      $this->db->select("oa.atr_descripcion", "oa.cp_otrosantecedentes");
      $this->db->from("fa_otrosantecedentes oa");
      $this->db->where("oa.cf_titulo", $titulo);
      $this->db->where("oa.cf_cargo", $cargo);
      return $this->db->get()->result();
    }

    function addAntecedente($cargo, $titulo,$antecedente){
      $data = array(
          "atr_descripcion" => $antecedente,
          "cf_cargo"        => $cargo,
          "cf_titulo"       => $titulo
      );
      $this->db->insert("fa_otrosantecedentes", $data);
      return "ok";
    }

    function getAntecedentes(){
      $this->db->select("oa.atr_descripcion, oa.cf_titulo");
      $this->db->from("fa_otrosantecedentes oa");
      return $this->db->get()->result();
    }





}
