<?php

defined('BASEPATH') or exit('No direct script access allowed');

class FuncionesModel extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  function deleteTarea($idTarea)
  {
    $resultado = $this->db->delete('fa_tareas_cargo', array('cp_tareas_cargo' => $idTarea));

    if ($resultado) {
      registrarActividad();
      return "ok";
    } else {
      return "error";
    }
  }

  function getListadoTareas($id)
  {
    $this->db->select("ta.atr_descripcion");
    $this->db->from("fa_tareas_cargo tc");
    $this->db->join("fa_tarea ta", "ta.cp_tarea = tc.cf_tarea");
    $this->db->where("tc.cf_cargo", $id);
    return $this->db->get()->result();
  }

  function getListadoTareasDataTable($id)
  {
    $this->db->select("tc.cp_tareas_cargo ,ta.atr_descripcion");
    $this->db->from("fa_tareas_cargo tc");
    $this->db->join("fa_tarea ta", "ta.cp_tarea = tc.cf_tarea");
    $this->db->where("tc.cf_cargo", $id);
    return $this->db->get();
  }

  function getListadoTareasViewContrato($id)
  {
    $this->db->select("ta.atr_descripcion");
    $this->db->from("fa_tareas_cargo tc");
    $this->db->join("fa_tarea ta", "ta.cp_tarea = tc.cf_tarea");
    $this->db->where("tc.cf_cargo", $id);
    return $this->db->get()->result();
  }

  function addTarea($tarea, $cargo)
  {
    //Obtengo la cantidad de registros con la misma descripción
    $this->db->select('count(*)');
    $this->db->from("fa_tarea t");
    $this->db->where("t.atr_descripcion", $tarea);
    $resultTarea = $this->db->count_all_results();

    //Obtengo la cantidad de registros con igual tarea y cargo
    $this->db->select('count(*)');
    $this->db->from("fa_tareas_cargo tc");
    $this->db->join("fa_tarea ta", "ta.cp_tarea = tc.cf_tarea");
    $this->db->where("tc.cf_cargo", $cargo);
    $this->db->where("ta.atr_descripcion", $tarea);
    $resultIntermedia = $this->db->count_all_results();


    if ($resultIntermedia ==  0) {
      if ($resultTarea == 0) {
        //INSERTO EN FA_TAREA
        //inserta la tarea en fa_tarea
        $data = array("atr_descripcion" => $tarea);
        $this->db->insert("fa_tarea", $data);

        $id_tarea = $this->FuncionesModel->getUltimaTarea();


        //INSERTO EN FA_TAREAS_CARGO
        $dataIntermedia = array(
          "cf_cargo" => $cargo,
          "cf_tarea" => $id_tarea
        );

        $this->db->insert("fa_tareas_cargo", $dataIntermedia);
        registrarActividad();
        return "ok";
      } else {
        $this->db->select("t.cp_tarea");
        $this->db->from("fa_tarea t");
        $this->db->where("t.atr_descripcion", $tarea);
        $algo = $this->db->get()->result();
        $id_tarea = ($algo[0]->cp_tarea);


        //INSERTO EN FA_TAREAS_CARGO
        $dataIntermedia = array(
          "cf_cargo" => $cargo,
          "cf_tarea" => $id_tarea
        );
        $this->db->insert("fa_tareas_cargo", $dataIntermedia);
        registrarActividad();
        return "ok";
      }
    }
    return "error";
  }


  function getUltimaTarea()
  {
    $this->db->select_max("t.cp_tarea");
    $this->db->from("fa_tarea t");
    $algo = $this->db->get()->result();
    $ultimo = "";

    foreach ($algo as $row) {
      $ultimo =  $row->cp_tarea;
    }

    return $ultimo;
  }
}
