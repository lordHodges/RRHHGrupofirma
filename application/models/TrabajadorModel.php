<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class TrabajadorModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function getTrabajadores(){
        $this->db->select("t.cp_trabajador, t.atr_nombres, t.atr_apellidos, t.cf_cargo");
        $this->db->from("fa_trabajador t");
        $this->db->order_by('t.atr_nombres', 'ASC');
        return $this->db->get()->result();
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
            "cf_estado" => $estadoContrato,
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
        $this->db->from("fa_estadoCivil");
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
      $this->db->select("t.cp_trabajador, t.atr_rut, t.atr_nombres, t.atr_apellidos, t.atr_direccion, t.atr_fechaNacimiento, e.atr_nombre as estado, ci.atr_nombre as ciudad, ca.atr_nombre as cargo, su.atr_nombre as sucursal, n.atr_nombre as nacionalidad, ec.atr_nombre as estadocivil, a.atr_nombre as afp, p.atr_nombre as prevision, em.atr_nombre as empresa");
      $this->db->from("fa_trabajador t");
      $this->db->join("fa_estado e", "t.cf_estado = e.cp_estado");
      $this->db->join("fa_ciudad ci","t.cf_ciudad = ci.cp_ciudad");
      $this->db->join("fa_cargo ca", "t.cf_cargo = ca.cp_cargo");
      $this->db->join("fa_sucursal su","t.cf_sucursal = su.cp_sucursal");
      $this->db->join("fa_nacionalidad n", "t.cf_nacionalidad = n.cp_nacionalidad");
      $this->db->join("fa_estadoCivil ec", "t.cf_estadoCivil = ec.cp_estadoCivil");
      $this->db->join("fa_afp a", "t.cf_afp = a.cp_afp");
      $this->db->join("fa_prevision p", "t.cf_prevision = p.cp_prevision");
      $this->db->join("fa_empresa em ", "t.cf_empresa = em.cp_empresa");
      $this->db->where("t.cp_trabajador", $id);
      return $this->db->get()->result();
    }

    function updateTrabajador( $idTrabajador,$rut, $nombres,$apellidos,$direccion,$ciudad,$sucursal,$cargo,$empresa,$afp,$prevision,$estadoContrato,$estadoCivil,$nacionalidad,$fechaNacimiento ){

      if( !is_numeric($ciudad) ){
        //Buscar la ID de la ciudad ingresada
        $this->db->select("c.cp_ciudad");
        $this->db->where("c.atr_nombre",$ciudad);
        $this->db->from("fa_ciudad c");
        $Result = $this->db->get()->result();
        // obtener la id de la ciudad desde el resultado en la consulta anterior
        foreach ($Result as $key=>$c){
          $ciudad = $c->cp_ciudad;
        }
      }

      if( !is_numeric($sucursal) ){
        //Buscar la ID de la sucursal ingresada
        $this->db->select("s.cp_sucursal");
        $this->db->where("s.atr_nombre",$sucursal);
        $this->db->from("fa_sucursal s");
        $Result = $this->db->get()->result();
        // obtener la id de la ciudad desde el resultado en la consulta anterior
        foreach ($Result as $key=>$s){
          $sucursal = $s->cp_sucursal;
        }
      }

      if( !is_numeric($cargo) ){
        //Buscar la ID del cargo ingresado
        $this->db->select("c.cp_cargo");
        $this->db->where("c.atr_nombre",$cargo);
        $this->db->from("fa_cargo c");
        $Result = $this->db->get()->result();
        // obtener la id del cargo desde el resultado en la consulta anterior
        foreach ($Result as $key=>$c){
          $cargo = $c->cp_cargo;
        }
      }

      if( !is_numeric($empresa) ){
        //Buscar la ID de la empresa ingresada
        $this->db->select("e.cp_empresa");
        $this->db->where("e.atr_nombre",$empresa);
        $this->db->from("fa_empresa e");
        $Result = $this->db->get()->result();
        // obtener la id de la empresa desde el resultado en la consulta anterior
        foreach ($Result as $key=>$e){
          $empresa = $c->cp_empresa;
        }
      }

      if( !is_numeric($afp) ){
        //Buscar la ID de la afp ingresada
        $this->db->select("afp.cp_afp");
        $this->db->where("afp.atr_nombre",$afp);
        $this->db->from("fa_afp afp");
        $Result = $this->db->get()->result();
        // obtener la id de la afp desde el resultado en la consulta anterior
        foreach ($Result as $key=>$afp){
          $afp = $afp->cp_afp;
        }
      }

      if( !is_numeric($prevision) ){
        //Buscar la ID de la afp ingresada
        $this->db->select("p.cp_prevision");
        $this->db->where("p.atr_nombre",$prevision);
        $this->db->from("fa_prevision p");
        $Result = $this->db->get()->result();
        // obtener la id de la afp desde el resultado en la consulta anterior
        foreach ($Result as $key=>$p){
          $prevision = $p->cp_prevision;
        }
      }

        //
        // $data = array(
        //     "atr_nombre"                => $empresa,
        //     "atr_run"                   => $run,
        //     "atr_representante"         => $representante,
        //     "atr_cedula_representante"  => $cedula_representante,
        //     "atr_domicilio"             => $domicilio,
        //     "cf_ciudad"                 => $idCiudad
        // );
        // $this->db->where('e.cp_empresa', $idEmpresa);
        // $resultado =  $this->db->update("fa_empresa e", $data);



        $dataTrabajador = array(
          "atr_nombres"               => $nombres,
          "atr_apellidos"             => $apellidos,
          "atr_direccion"             => $direccion,
          "atr_fechaNacimiento"       => $fechaNacimiento,
          "cf_prevision"              => $prevision,
          "cf_estado"                 => $estadoContrato,
          "cf_cargo"                  => $cargo,
          "cf_sucursal"               => $sucursal,
          "cf_nacionalidad"           => $nacionalidad,
          "cf_estadoCivil"            => $estadoCivil,
          "cf_afp"                    => $afp
        );
        $this->db->where('t.cp_trabajador', $idTrabajador);
        $resultado =  $this->db->update("fa_trabajador t", $dataTrabajador);


        if($resultado){
          return "ok";
        }else{
          return "error";
        }
    }



}
