<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MantenedoresModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // CIUDADES
    function getListadoCiudades(){
      $this->db->select("c.cp_ciudad, c.atr_nombre");
      $this->db->from("fa_ciudad c");
      return $this->db->get();
    }

    function addCiudad($nombre){
        $data = array(
            "atr_nombre" => $nombre
        );
        $this->db->insert("fa_ciudad", $data);
        return "ok";
    }


    // SUCURSALES
    function getListadoSucursales(){
      $this->db->select("s.cp_sucursal, s.atr_nombre");
      $this->db->from("fa_sucursal s");
      return $this->db->get();
    }

    function addSucursal($nombre){
        $data = array(
            "atr_nombre" => $nombre
        );
        $this->db->insert("fa_sucursal", $data);
        return "ok";
    }

    // CARGOS
    function getListadoCargos(){
      $this->db->select("c.cp_cargo, c.atr_nombre, c.atr_jefeDirecto, c.atr_lugarTrabajo, c.atr_jornadaTrabajo, c.atr_sueldo");
      $this->db->from("fa_cargo c");
      return $this->db->get();
    }

    function buscarCargo($cargo){
      $this->db->select("c.cp_cargo, c.atr_nombre, c.atr_jefeDirecto, c.atr_lugarTrabajo, c.atr_jornadaTrabajo, c.atr_sueldo");
      $this->db->from("fa_cargo c");
      $this->db->where("c.cp_cargo",$cargo);
      // var_dump( $this->db->get()->result());
      return $this->db->get()->result();
    }

    function addCargo($nombre, $jefeDirecto,$lugarTrabajo,$jornadaTrabajo,$diasTrabajo,$sueldo){
        $data = array(
            "atr_nombre" => $nombre,
            "atr_jefeDirecto" => $jefeDirecto,
            "atr_lugarTrabajo" => $lugarTrabajo,
            "atr_jornadaTrabajo" => $jornadaTrabajo,
            "atr_sueldo" => $sueldo,
            "atr_diasTrabajo" => $diasTrabajo
        );
        $this->db->insert("fa_cargo", $data);
        return "ok";
    }

    // ESTADO CIVIL
    function getListadoEstadosCiviles(){
      $this->db->select("ec.cp_estadoCivil, ec.atr_nombre");
      $this->db->from("fa_estadocivil ec");
      return $this->db->get();
    }

    function addEstadoCivil($nombre){
        $data = array(
            "atr_nombre" => $nombre
        );
        $this->db->insert("fa_estadocivil", $data);
        return "ok";
    }

    // AFP
    function getListadoAFP(){
      $this->db->select("a.cp_afp, a.atr_nombre");
      $this->db->from("fa_afp a");
      return $this->db->get();
    }

    function addAFP($nombre){
        $data = array(
            "atr_nombre" => $nombre
        );
        $this->db->insert("fa_afp", $data);
        return "ok";
    }

    // NACIONALIDAD
    function getListadoNacionalidades(){
      $this->db->select("n.cp_nacionalidad, n.atr_nombre");
      $this->db->from("fa_nacionalidad n");
      return $this->db->get();
    }

    function addNacionalidad($nombre){
        $data = array(
            "atr_nombre" => $nombre
        );
        $this->db->insert("fa_nacionalidad", $data);
        return "ok";
    }

    // ESTADO CONTRATO
    function getEstadoContrato(){
      $this->db->select("e.cp_estado, e.atr_nombre");
      $this->db->from("fa_estado e");
      return $this->db->get();
    }

    function addEstadoContrato($nombre){
        $data = array(
            "atr_nombre" => $nombre
        );
        $this->db->insert("fa_estado", $data);
        return "ok";
    }


    // PREVISION
    function getListadoPrevisiones(){
      $this->db->select("f.cp_prevision, f.atr_nombre");
      $this->db->from("fa_prevision f");
      return $this->db->get();
    }



    function addPrevision($nombre){
        $data = array(
            "atr_nombre" => $nombre
        );
        $this->db->insert("fa_prevision", $data);
        return "ok";
    }

    // TITULO
    function getListadoTitulos($cargo){
      $this->db->select("ti.cp_titulo, ti.atr_descripcion");
      $this->db->from("fa_titulo ti");
      $this->db->where("ti.cf_cargo",$cargo);
      return $this->db->get()->result();
    }

    

    function addTitulo($nombre, $cargo){
        $data = array(
            "atr_nombre" => $nombre,
            "cf_cargo"   => $cargo
        );
        $this->db->insert("fa_titulo", $data);
        return "ok";
    }

    // EMPRESA
    function getListadoEmpresas(){
      $this->db->select("e.cp_empresa, e.atr_nombre, e.atr_run, e.atr_representante, e.atr_cedula_representante, e.atr_domicilio, ci.atr_nombre as ciudad");
      $this->db->from("fa_empresa e");
      $this->db->join("fa_ciudad ci ", "ci.cp_ciudad = e.cf_ciudad");
      return $this->db->get();
    }

    function addEmpresa($nombre, $rut, $representante, $cedula_representante, $domicilio, $ciudad){
        $data = array(
            "nombre" => $nombre,
            "rut " => $rut,
            "representante " => $representante,
            "cedula_representante" => $cedula_representante,
            "domicilio" => $domicilio,
            "ciudad" => $ciudad
        );
        $this->db->insert("fa_prevision", $data);
        return "ok";
    }


}
