<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PagosModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function getListadoPagosFinDeMes(){

        $this->db->select(" t.atr_nombres, t.atr_apellidos, t.atr_rut, t.atr_sueldo");
        $this->db->from("fa_trabajador t");
        $this->db->join();
        $this->db->where('t.cf_estado != 6');
        $arrayTrabajadores = $this->db->get()->result();


        foreach ($arrayTrabajadores as $key => $t) {

        }



        //
        // $data = array(
        //     "atr_motivo"      => $motivo,
        //     "atr_title"       => $titulo,
        //     "atr_start"       => $fecha,
        //     "cf_trabajador"   => $idTrabajador
        // );
        // $resultado = $this->db->insert("fa_inasistencia", $data);
        //
        // if ($resultado) {
        //   return 'ok';
        // }else{
        //   return 'error';
        // }
    }

































    function addInasistencia($fecha, $motivo, $idTrabajador){

        $this->db->select(" t.atr_nombres, t.atr_apellidos");
        $this->db->from("fa_trabajador t");
        $this->db->where('t.cp_trabajador', $idTrabajador);
        $infoTrabajador = $this->db->get()->result();


        foreach ($infoTrabajador as $key => $value) {
          $titulo = $value->atr_nombres." ".$value->atr_apellidos;
        }

        $data = array(
            "atr_motivo"      => $motivo,
            "atr_title"       => $titulo,
            "atr_start"       => $fecha,
            "cf_trabajador"   => $idTrabajador
        );
        $resultado = $this->db->insert("fa_inasistencia", $data);

        if ($resultado) {
          return 'ok';
        }else{
          return 'error';
        }
    }



    function getInasistencias(){

      $this->db->select(" i.cp_inasistencia as id, i.atr_title as title, i.atr_start as start, i.atr_start as end");
      $this->db->from("fa_inasistencia i");
      return $this->db->get()->result_array();

  }































}
