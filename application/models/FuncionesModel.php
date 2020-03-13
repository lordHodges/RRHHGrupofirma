<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FuncionesModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function getListadoTareas($id){
        $this->db->select("ta.atr_descripcion");
        $this->db->from("fa_tareas_cargo tc");
        $this->db->join("fa_tarea ta", "ta.cp_tarea = tc.cf_tarea");
        $this->db->where("tc.cf_cargo", $id);
        return $this->db->get()->result();
    }




    function addTarea($tarea, $cargo){
        var_dump("PARAM_TAREA: ",$tarea);
        var_dump("PARAM_CARGO: ",$cargo);
        $this->db->select('count(*)');
        $this->db->from("fa_tarea t");
        $this->db->where("t.atr_descripcion", $tarea);
        $resultTarea = $this->db->count_all_results();

        $this->db->select('count(*)');
        $this->db->from("fa_tareas_cargo tc");
        $this->db->join("fa_tarea ta", "ta.cp_tarea = tc.cf_tarea");
        $this->db->where("tc.cf_cargo", $cargo);
        $this->db->where("ta.atr_descripcion", $tarea);
        $resultIntermedia = $this->db->count_all_results();



        var_dump("result tarea",$resultTarea);
        var_dump("result intermedia: ",$resultIntermedia);

        if($resultIntermedia ==  0){
            if($resultTarea == 0){
              //INSERTO EN FA_TAREA
              //inserta la tarea en fa_tarea
              $data = array( "atr_descripcion" => $tarea );
              $this->db->insert("fa_tarea", $data);

              $id_tarea = $this->FuncionesModel->getUltimaTarea();
              var_dump("id_tarea: ",$id_tarea);

              //recupero el id del registro ingresado

              //INSERTO EN FA_TAREAS_CARGO
              $dataIntermedia = array(
                  "cf_cargo" => $cargo,
                  "cf_tarea" => $id_tarea
              );
              $this->db->insert("fa_tareas_cargo", $dataIntermedia);
              return "ok";
            }else{

              $this->db->select("t.cp_tarea");
              $this->db->from("fa_tarea t");
              $this->db->where("t.atr_descripcion",$tarea);
              $algo = $this->db->get()->result();
              $id_tarea = ($algo[0]->cp_tarea);
              var_dump("valor de tarea ya existente con metodo nuevo",$id_tarea);


              //INSERTO EN FA_TAREAS_CARGO
              $dataIntermedia = array(
                  "cf_cargo" => $cargo,
                  "cf_tarea" => $id_tarea
              );
              $this->db->insert("fa_tareas_cargo", $dataIntermedia);
              return "ok";
            }
        }
        return "error";
    }


    function getUltimaTarea(){
      $this->db->select_max("t.cp_tarea");
      $this->db->from("fa_tarea t");
      $algo = $this->db->get()->result();
      $ultimo = "";

      foreach ( $algo as $row)
      {
        $ultimo =  $row->cp_tarea;
      }

      return $ultimo;
    }





}
