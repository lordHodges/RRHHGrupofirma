<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CompetenciasModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function deleteCompetencia($idCompetencia){
        $resultado = $this->db->delete('fa_competencia_cargo', array('cp_competencia_cargo' => $idCompetencia));

        if($resultado){
          return "ok";
        }else{
          return "error";
        }
    }

    function getListadoCompetencias($id){
        $this->db->select("co.atr_descripcion");
        $this->db->from("fa_competencia_cargo cc");
        $this->db->join("fa_competencia co", "co.cp_competencia = cc.cf_competencia");
        $this->db->where("cc.cf_cargo", $id);
        return $this->db->get()->result();
    }

    function getListadoCompetenciasDataTable($id){
        $this->db->select("cc.cp_competencia_cargo ,co.atr_descripcion");
        $this->db->from("fa_competencia_cargo cc");
        $this->db->join("fa_competencia co", "co.cp_competencia = cc.cf_competencia");
        $this->db->where("cc.cf_cargo", $id);
        return $this->db->get();
    }


    function addCompetencia($competencia, $cargo){
        $this->db->select('count(*)');
        $this->db->from("fa_competencia c");
        $this->db->where("c.atr_descripcion", $competencia);
        $resultCompetencia = $this->db->count_all_results();

        $this->db->select('count(*)');
        $this->db->from("fa_competencia_cargo cc");
        $this->db->join("fa_competencia c", "c.cp_competencia = cc.cf_competencia");
        $this->db->where("cc.cf_cargo", $cargo);
        $this->db->where("c.atr_descripcion", $competencia);
        $resultIntermedia = $this->db->count_all_results();


        if($resultIntermedia ==  0){
            if($resultCompetencia == 0){
              //INSERTO EN FA_COMPETENCIA
              //inserta la competencia en fa_competencia
              $data = array( "atr_descripcion" => $competencia );
              $this->db->insert("fa_competencia", $data);

              $id_competencia = $this->CompetenciasModel->getUltimaCompetencia();

              //recupero el id del registro ingresado

              //INSERTO EN FA_COMPETENCIA_CARGO
              $dataIntermedia = array(
                  "cf_cargo" => $cargo,
                  "cf_competencia" => $id_competencia
              );
              $this->db->insert("fa_competencia_cargo", $dataIntermedia);
              return "ok";
            }else{

              $this->db->select("c.cp_competencia");
              $this->db->from("fa_competencia c");
              $this->db->where("c.atr_descripcion",$competencia);
              $algo = $this->db->get()->result();
              $id_competencia = ($algo[0]->cp_competencia);


              //INSERTO EN FA_COMPETENCIA_CARGO
              $dataIntermedia = array(
                  "cf_cargo" => $cargo,
                  "cf_competencia" => $id_competencia
              );
              $this->db->insert("fa_competencia_cargo", $dataIntermedia);
              return "ok";
            }
        }
        return "error";
    }


    function getUltimaCompetencia(){
      $this->db->select_max("c.cp_competencia");
      $this->db->from("fa_competencia c");
      $algo = $this->db->get()->result();
      $ultimo = "";

      foreach ( $algo as $row)
      {
        $ultimo =  $row->cp_competencia;
      }
      return $ultimo;
    }









}
