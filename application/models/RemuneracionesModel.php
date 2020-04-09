<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class RemuneracionesModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function deleteRemuneracionExtra($cargo, $descripcion){
      $resultado = $this->db->delete('fa_remuneracion_extra', array('cf_cargo' => $cargo, 'atr_descripcion' => $descripcion ));

      if($resultado){
        return "ok";
      }else{
        return "error";
      }
    }

    function getDetalleRemuneracion($idCargo){
        $this->db->select("r.cp_remuneracion,r.atr_sueldoMensual, r.atr_cotizaciones, r.atr_colacion, r.atr_movilizacion, r.atr_asistencia, c.cp_cargo, c.atr_nombre ");
        $this->db->from("fa_remuneracion r");
        $this->db->join("fa_cargo c", "r.cf_cargo = c.cp_cargo");
        $this->db->where("r.cf_cargo", $idCargo);
        $array_remuneracion = $this->db->get()->result();

        foreach ($array_remuneracion as $key=>$r){
          $idRemuneracion = $r->cp_remuneracion;
        }

        $this->db->select("re.cp_remuneracionExtra ,re.atr_descripcion");
        $this->db->from("fa_remuneracion_extra re");
        $this->db->join("fa_remuneracion r", "r.cp_remuneracion = re.cf_remuneracion");
        $this->db->where("re.cf_remuneracion", $idRemuneracion);
        $array_remuneracionExtra = $this->db->get()->result();

        $data = array(
            "array_remuneracion" => $array_remuneracion,
            "array_remuneracionExtra" => $array_remuneracionExtra,
        );

        return $data;
    }

    function getDetalleRemuneracionExtra($idRemuneracion){
        $this->db->select("re.atr_descripcion, r.atr_cotizaciones, r.atr_colacion, r.atr_movilizacion, ");
        $this->db->from("fa_remuneracionExtra re");
        $this->db->join("fa_remuneracion r", "r.cp_remuneracion = re.cp_remuneracionExtra");
        $this->db->where("re.cf_remuneracion_extra", $idRemuneracion);
        return $this->db->get()->result();
    }

    function getDetalleRemuneracionPDF($idCargo){
        $this->db->select("r.atr_sueldoMensual, r.atr_cotizaciones, r.atr_colacion, r.atr_movilizacion, r.atr_asistencia");
        $this->db->from("fa_remuneracion r");
        $this->db->where("r.cf_cargo",$idCargo);
        return $this->db->get()->result();
    }

    function getDetalleRemuneracionExtraPDF($idCargo){
        $this->db->select("re.atr_descripcion");
        $this->db->from("fa_remuneracion_extra re");
        $this->db->where("re.cf_cargo", $idCargo);
        return $this->db->get()->result();
    }


    function updateRemuneracion($idCargo,$sueldoMensual,$colacion,$movilizacion,$imposiciones, $asistencia){
      $data = array(
          "atr_sueldoMensual" => $sueldoMensual,
          "atr_colacion" => $colacion,
          "atr_movilizacion" => $movilizacion,
          "atr_cotizaciones" => $imposiciones,
          "atr_asistencia"   => $asistencia
      );

      $this->db->where('r.cf_cargo', $idCargo);
      $resultado =  $this->db->update("fa_remuneracion r", $data);
      if($resultado){
        return "ok";
      }else{
        return "error";
      }
    }

    function updateRemuneracionExtra($idCargo,$descripcionActual,$descripcionNueva){
      $data = array(
          "atr_descripcion" => $descripcionNueva
      );

      $this->db->join('fa_remuneracion r',"r.cp_remuneracion = re.cf_remuneracion");
      $this->db->where('re.cf_cargo', $idCargo);
      $this->db->where('re.atr_descripcion', $descripcionActual );
      $resultado =  $this->db->update("fa_remuneracion_extra re", $data);

      if($resultado){
        return "ok";
      }else{
        return "error";
      }
    }

    function addRemuneracionPorIDCargo($idCargo,$descripcion){

      $this->db->select("r.cp_remuneracion");
      $this->db->where("r.cf_cargo",$idCargo);
      $this->db->from("fa_remuneracion r");
      $registro = $this->db->get()->result();

      foreach ($registro as $key=>$c){
        $idRemuneracion = $c->cp_remuneracion;
      }

      $data = array(
        "cf_remuneracion" => $idRemuneracion,
        "cf_cargo" => $idCargo,
        "atr_descripcion" => $descripcion
      );

      $resultado = $this->db->insert("fa_remuneracion_extra", $data);

      if($resultado){
        return "ok";
      }else{
        return "error";
      }
    }






}
