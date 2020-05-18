<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdelantosModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function getListadoAdelantos(){
        $this->db->select(" a.cp_adelanto, a.atr_tipoCuenta, a.atr_numCuenta, a.atr_monto, b.atr_nombre as banco, t.atr_nombres as nombres, t.atr_apellidos as apellidos, t.atr_rut rutTrabajador, t.cp_trabajador ");
        $this->db->from("fa_adelanto a");
        $this->db->join("fa_banco b", "b.cp_banco = a.cf_banco");
        $this->db->join("fa_trabajador t", "t.cp_trabajador = a.cf_trabajador");
        $this->db->where("t.cf_estado <> 6");
        return $this->db->get();
    }

    function getDetalleAdelanto($idAdelanto){
        $this->db->select(" a.cp_adelanto, a.atr_tipoCuenta, a.atr_numCuenta, a.atr_monto, b.atr_nombre as banco, t.atr_nombres as nombres, t.atr_apellidos as apellidos, t.atr_rut rutTrabajador ");
        $this->db->from("fa_adelanto a");
        $this->db->join("fa_banco b", "b.cp_banco = a.cf_banco");
        $this->db->join("fa_trabajador t", "t.cp_trabajador = a.cf_trabajador");
        $this->db->where("a.cp_adelanto",$idAdelanto);
        return $this->db->get()->result();
    }


    function updateAdelanto( $idAdelanto, $banco, $tipoCuenta, $numeroCuenta, $monto ){

        if (!is_numeric($banco)) {
          $this->db->select(" b.cp_banco ");
          $this->db->from("fa_banco b");
          $this->db->where("b.atr_nombre",$banco);
          $arrayBanco = $this->db->get()->result();

          foreach ($arrayBanco as $key => $value) {
            $banco = $value->cp_banco;
          }
        }

        $data = array(
            "atr_tipoCuenta"       => $tipoCuenta,
            "atr_numCuenta"        => $numeroCuenta,
            "atr_monto"            => $monto,
            "cf_banco"             => $banco
        );

        $this->db->where('cp_adelanto', $idAdelanto);
        $resultado =  $this->db->update("fa_adelanto", $data);

        if ($resultado) {
          return "ok";
        }else{
          return "error";
        }
    }

    function buscarBanco($nombre){
        $this->db->select(" b.cp_banco");
        $this->db->from("fa_banco b");
        $this->db->where("b.atr_nombre",$nombre);
        return $this->db->get()->result();
    }

























    function addModelo($nombre, $marca){
        $data = array(
            "atr_descripcion" => $nombre,
            "cf_marca"        => $marca
        );
        $this->db->insert("fa_modelo", $data);
        return "ok";
    }

    function getDetalleModelo( $idModelo ){
        $this->db->select(" m.cp_modelo, m.atr_descripcion , m.cf_marca");
        $this->db->from("fa_modelo m");
        $this->db->where("m.cp_modelo",$idModelo);

        $resultado =  $this->db->get()->result();
        return $resultado;
    }

    function editarModelo($idModelo, $nombre, $marca){
        $data = array(
            "atr_descripcion" => $nombre,
            "cf_marca"        => $marca
        );

        $this->db->where('m.cp_modelo', $idModelo);
        $resultado =  $this->db->update("fa_modelo m", $data);
        if ($resultado) {
          return "ok";
        }else{
          return "error";
        }

    }




























}
