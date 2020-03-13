<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class TrabajadorModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }


    function addTrabajador($rut,$nombres,$apellidos,$direccion,$fechaNacimiento,$ciudad,$sucursal,$cargo,$empresa,$afp, $prevision, $estadoContrato, $estadoCivil, $nacionalidad){
        $data = array(
            "atr_rut" => $rut,
            "atr_nombres" => $nombres,
            "atr_apellidos" => $apellidos,
            "atr_direccion" => $direccion,
            "atr_fechaNacimiento"=> $fechaNacimiento,
            "cf_ciudad" => $ciudad,
            "cf_sucursal" => $sucursal,
            "cf_cargo" => $cargo,
            "cf_empresa" => $empresa,
            "cf_prevision" => $prevision,
            "cf_afp" => $afp,
            "cf_estadoCivil" => $estadoCivil,
            "cf_nacionalidad" => $nacionalidad,
        );
        $this->db->insert("fa_trabajador", $data);
        return "ok";
    }

    function getCiudades(){
        $this->db->select("cp_ciudad, atr_nombre");
        $this->db->from("fa_ciudad");
        $this->db->order_by('atr_nombre', 'ASC');
        return $this->db->get()->result();
    }

    function getCargos(){
        $this->db->select("cp_cargo, atr_nombre");
        $this->db->from("fa_cargo");
        $this->db->order_by('atr_nombre', 'ASC');
        return $this->db->get()->result();
    }

    function getSucursales(){
        $this->db->select("cp_sucursal, atr_nombre");
        $this->db->from("fa_sucursal");
        $this->db->order_by('atr_nombre', 'ASC');
        return $this->db->get()->result();
    }

    function getEmpresas(){
        $this->db->select("cp_empresa, atr_nombre");
        $this->db->from("fa_empresa");
        $this->db->order_by('atr_nombre', 'ASC');
        return $this->db->get()->result();
    }

    function getAFP(){
        $this->db->select("cp_afp, atr_nombre");
        $this->db->from("fa_afp");
        $this->db->order_by('atr_nombre', 'ASC');
        return $this->db->get()->result();
    }

    function getPrevisiones(){
        $this->db->select("cp_prevision, atr_nombre");
        $this->db->from("fa_prevision");
        $this->db->order_by('atr_nombre', 'ASC');
        return $this->db->get()->result();
    }

    function getEstadosContrato(){
        $this->db->select("cp_estado, atr_nombre");
        $this->db->from("fa_estado");
        $this->db->order_by('atr_nombre', 'ASC');
        return $this->db->get()->result();
    }

    function getEstadosCiviles(){
        $this->db->select("cp_estadoCivil, atr_nombre");
        $this->db->from("fa_estadocivil");
        $this->db->order_by('atr_nombre', 'ASC');
        return $this->db->get()->result();
    }
    function getNacionalidades(){
        $this->db->select("cp_nacionalidad, atr_nombre");
        $this->db->from("fa_nacionalidad");
        $this->db->order_by('atr_nombre', 'ASC');
        return $this->db->get()->result();
    }


    function getListadoTrabajadores(){
      $this->db->select("t.cp_trabajador, t.atr_rut, t.atr_nombres, t.atr_apellidos, e.atr_nombre as empresa, e.atr_domicilio as direccion, ca.atr_nombre as cargo,
                        su.atr_nombre as sucursal");
      $this->db->from("fa_trabajador t");
      $this->db->join("fa_cargo ca", "t.cf_cargo = ca.cp_cargo");
      $this->db->join("fa_empresa e", "t.cf_empresa = e.cp_empresa");
      $this->db->join("fa_sucursal su","t.cf_sucursal = su.cp_sucursal");
      return $this->db->get();
    }

    function getDetalleTrabajador($id){
      $this->db->select("t.atr_rut, t.atr_nombres, t.atr_apellidos, t.atr_direccion, t.atr_fechaNacimiento, e.atr_nombre as estado, ci.atr_nombre as ciudad, ca.atr_nombre as cargo, su.atr_nombre as sucursal, n.atr_nombre as nacionalidad, ec.atr_nombre as estadocivil, a.atr_nombre as afp, p.atr_nombre as prevision, em.atr_nombre as empresa");
      $this->db->from("fa_trabajador t");
      $this->db->join("fa_estado e", "t.cf_estado = e.cp_estado");
      $this->db->join("fa_ciudad ci","t.cf_ciudad = ci.cp_ciudad");
      $this->db->join("fa_cargo ca", "t.cf_cargo = ca.cp_cargo");
      $this->db->join("fa_sucursal su","t.cf_sucursal = su.cp_sucursal");
      $this->db->join("fa_nacionalidad n", "t.cf_nacionalidad = n.cp_nacionalidad");
      $this->db->join("fa_estadocivil ec", "t.cf_estadoCivil = ec.cp_estadocivil");
      $this->db->join("fa_afp a", "t.cf_afp = a.cp_afp");
      $this->db->join("fa_prevision p", "t.cf_prevision = p.cp_prevision");
      $this->db->join("fa_empresa em ", "t.cf_empresa = em.cp_empresa");
      $this->db->where("t.cp_trabajador", $id);
      return $this->db->get()->result();
    }

}
