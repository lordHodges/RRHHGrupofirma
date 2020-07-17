<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class OtrosModel extends CI_Model {

    public function __construct() {
        parent::__construct();

    }

    function deleteOtroAntecedente($idOtroAntecedente){
        $resultado = $this->db->delete('fa_otrosantecedentes', array('cp_otrosantecedentes' => $idOtroAntecedente));

        if($resultado){
          return "ok";
        }else{
          return "error";
        }
    }

    function getListadoOtrosAntecedentes($cargo, $titulo){
      $this->db->select("oa.atr_descripcion", "oa.cp_otrosantecedentes");
      $this->db->from("fa_otrosantecedentes oa");
      $this->db->where("oa.cf_titulo", $titulo);
      $this->db->where("oa.cf_cargo", $cargo);
      return $this->db->get()->result();
    }

    function getListadoOtrosAntecedentesDataTable($idCargo, $idAntecedente){
      $this->db->select("oa.cp_otrosantecedentes, oa.atr_descripcion ");
      $this->db->from("fa_otrosantecedentes oa");
      $this->db->where("oa.cf_titulo", $idAntecedente);
      $this->db->where("oa.cf_cargo", $idCargo);
      return $this->db->get();
    }


    function addAntecedente($cargo, $titulo,$antecedente){
      $this->db->select('count(*)');
      $this->db->from("fa_otrosantecedentes o");
      $this->db->where("o.atr_descripcion", $antecedente);
      $this->db->where("o.cf_cargo", $cargo);
      $this->db->where("o.cf_titulo", $titulo);
      $cantidad = $this->db->count_all_results();

      if( $cantidad == 0){
        $data = array(
            "atr_descripcion" => $antecedente,
            "cf_cargo"        => $cargo,
            "cf_titulo"       => $titulo
        );
        $this->db->insert("fa_otrosantecedentes", $data);
        return "ok";
      }else{
        return "error";
      }
    }

    function getAntecedentes(){
      $this->db->select("oa.atr_descripcion, oa.cf_titulo");
      $this->db->from("fa_otrosantecedentes oa");
      return $this->db->get()->result();
    }





}
