<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ConocimientosModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function getListadoConocimientos($id){
        $this->db->select("c.atr_descripcion");
        $this->db->from("fa_conocimiento_cargo cc");
        $this->db->join("fa_conocimiento c", "c.cp_conocimiento = cc.cf_conocimiento");
        $this->db->where("cc.cf_cargo", $id);
        return $this->db->get()->result();
    }




    function addConocimiento($conocimiento, $cargo){
        $this->db->select('count(*)');
        $this->db->from("fa_conocimiento c");
        $this->db->where("c.atr_descripcion", $conocimiento);
        $resultConocimiento = $this->db->count_all_results();

        $this->db->select('count(*)');
        $this->db->from("fa_conocimiento_cargo cc");
        $this->db->join("fa_conocimiento c", "c.cp_conocimiento = cc.cf_conocimiento");
        $this->db->where("cc.cf_cargo", $cargo);
        $this->db->where("c.atr_descripcion", $conocimiento);
        $resultIntermedia = $this->db->count_all_results();


        if($resultIntermedia ==  0){
            if($resultConocimiento == 0){
              //INSERTO EN FA_CONOCIMIENTO
              //inserta conocimiento  en fa_conocimiento
              $data = array( "atr_descripcion" => $conocimiento );
              $this->db->insert("fa_conocimiento", $data);

              $id_conocimiento = $this->ConocimientosModel->getUltimoConocimiento();

              //recupero el id del registro ingresado

              //INSERTO EN FA_CONOCIMIENTO_CARGO
              $dataIntermedia = array(
                  "cf_cargo" => $cargo,
                  "cf_conocimiento" => $id_conocimiento
              );
              $this->db->insert("fa_conocimiento_cargo", $dataIntermedia);
              return "ok";
            }else{

              $this->db->select("c.cp_conocimiento");
              $this->db->from("fa_conocimiento c");
              $this->db->where("c.atr_descripcion",$conocimiento);
              $algo = $this->db->get()->result();
              $id_conocimiento = ($algo[0]->cp_conocimiento);


              //INSERTO EN FA_CONOCIMIENTO_CARGO
              $dataIntermedia = array(
                  "cf_cargo" => $cargo,
                  "cf_conocimiento" => $id_conocimiento
              );
              $this->db->insert("fa_conocimiento_cargo", $dataIntermedia);
              return "ok";
            }
        }
        return "error";
    }


    function getUltimoConocimiento(){
      $this->db->select_max("c.cp_conocimiento");
      $this->db->from("fa_conocimiento c");
      $algo = $this->db->get()->result();
      $ultimo = "";

      foreach ( $algo as $row)
      {
        $ultimo =  $row->cp_conocimiento;
      }

      return $ultimo;
    }






}
