<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class RequisitosMinimosModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function deleteRequisitoMinimo($idRequisitoMinimo){
        $resultado = $this->db->delete('fa_requisitominimo_cargo', array('cp_requisitominimo_cargo' => $idRequisitoMinimo));

        if($resultado){
          return "ok";
        }else{
          return "error";
        }
    }

    function getListadoRequisitosMinimos($id){
        $this->db->select("rc.cp_requisitominimo_cargo , r.atr_descripcion");
        $this->db->from("fa_requisitominimo_cargo rc");
        $this->db->join("fa_requisitominimo r", "r.cp_requisitominimo = rc.cf_requisitominimo");
        $this->db->where("rc.cf_cargo", $id);
        return $this->db->get()->result();
    }

    function getListadoRequisitosMinimosDataTable($id){
        $this->db->select("rc.cp_requisitominimo_cargo , r.atr_descripcion");
        $this->db->from("fa_requisitominimo_cargo rc");
        $this->db->join("fa_requisitominimo r", "r.cp_requisitominimo = rc.cf_requisitominimo");
        $this->db->where("rc.cf_cargo", $id);
        return $this->db->get();
    }


    function addRequisitoMinimo($requisitoMinimo, $cargo){

        $this->db->select('count(*)');
        $this->db->from("fa_requisitominimo r");
        $this->db->where("r.atr_descripcion", $requisitoMinimo);
        $resultRequisitoMinimo = $this->db->count_all_results();

        $this->db->select('count(*)');
        $this->db->from("fa_requisitominimo_cargo rc");
        $this->db->join("fa_requisitominimo r", "r.cp_requisitominimo = rc.cf_requisitominimo");
        $this->db->where("rc.cf_cargo", $cargo);
        $this->db->where("r.atr_descripcion", $requisitoMinimo);
        $resultIntermedia = $this->db->count_all_results();



        // var_dump("result tarea",$resultTarea);
        // var_dump("result intermedia: ",$resultIntermedia);

        if($resultIntermedia ==  0){
            if($resultRequisitoMinimo == 0){
              //INSERTO EN FA_TAREA
              //inserta la tarea en fa_tarea
              $data = array( "atr_descripcion" => $requisitoMinimo );
              $this->db->insert("fa_requisitominimo", $data);

              $id_requisitoMinimo = $this->RequisitosMinimosModel->getUltimoRequitioMinimo();



              //INSERTO EN FA_TAREAS_CARGO
              $dataIntermedia = array(
                  "cf_cargo" => $cargo,
                  "cf_requisitominimo" => $id_requisitoMinimo
              );
              $this->db->insert("fa_requisitominimo_cargo", $dataIntermedia);
              return "ok";
            }else{

              $this->db->select('r.cp_requisitominimo');
              $this->db->from("fa_requisitominimo r");
              $this->db->where("r.atr_descripcion",$requisitoMinimo);
              $algo = $this->db->get()->result();
              $id_requisitoMinimo = ($algo[0]->cp_requisitominimo);
              var_dump("valor de requisito minimo ya existente con metodo nuevo",$id_requisitoMinimo);


              //INSERTO EN FA_TAREAS_CARGO
              $dataIntermedia = array(
                  "cf_cargo" => $cargo,
                  "cf_requisitominimo" => $id_requisitoMinimo
              );
              $this->db->insert("fa_requisitominimo_cargo", $dataIntermedia);
              return "ok";
            }
        }
        return "error";
    }


    function getUltimoRequitioMinimo(){
      $this->db->select_max("r.cp_requisitominimo");
      $this->db->from("fa_requisitominimo r");
      $algo = $this->db->get()->result();
      $ultimo = "";

      foreach ( $algo as $row)
      {
        $ultimo =  $row->cp_requisitominimo;
      }
      return $ultimo;
    }





}
