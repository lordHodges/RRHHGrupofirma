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
      $this->db->select("c.cp_cargo, c.atr_nombre, c.atr_jefeDirecto, c.atr_lugarTrabajo, c.atr_jornadaTrabajo");
      $this->db->from("fa_cargo c");
      return $this->db->get();
    }

    function buscarCargo($cargo){
      $this->db->select("c.cp_cargo, c.atr_nombre, c.atr_jefeDirecto, c.atr_lugarTrabajo, c.atr_jornadaTrabajo, c.atr_diasTrabajo");
      $this->db->from("fa_cargo c");
      $this->db->where("c.cp_cargo",$cargo);
      return $this->db->get()->result();
    }

    function addCargo($nombre, $jefeDirecto,$lugarTrabajo,$jornadaTrabajo,$diasTrabajo){


        $data = array(
            "atr_nombre" => $nombre,
            "atr_jefeDirecto" => $jefeDirecto,
            "atr_lugarTrabajo" => $lugarTrabajo,
            "atr_jornadaTrabajo" => $jornadaTrabajo,
            "atr_diasTrabajo" => $diasTrabajo
        );
        $this->db->insert("fa_cargo", $data);
        $ultimoCargo = $this->db->insert_id();

        $dataRemuneracion = array(
            "atr_sueldoMensual" => "0",
            "atr_cotizaciones" => "0",
            "atr_colacion" => "0",
            "atr_movilizacion" => "0",
            "cf_cargo" => $ultimoCargo
        );
        $this->db->insert("fa_remuneracion", $dataRemuneracion);

        return "ok";
    }

    function addResponsabilidades($cargo, $responsabilidad){
        $this->db->select("c.cp_cargo");
        $this->db->from("fa_cargo c");
        $this->db->where("c.atr_nombre",$cargo);
        $cargo = $this->db->get()->result();

        foreach ($cargo as $key=>$c){
          $idCargo = $c->cp_cargo;
        }

        $data = array(
            "atr_descripcion" => $responsabilidad,
            "cf_cargo" => $idCargo
        );
        $this->db->insert("fa_responsabilidad", $data);
        return "ok";
    }

    function addResponsabilidadesPorIDCargo($cargo, $responsabilidad){
        $data = array(
            "atr_descripcion" => $responsabilidad,
            "cf_cargo" => $cargo
        );
        $this->db->insert("fa_responsabilidad", $data);
        return "ok";
    }

    function getListadoResponsabilidades($cargo){
      $this->db->select("r.atr_descripcion");
      $this->db->from("fa_responsabilidad r");
      $this->db->where("r.cf_cargo",$cargo);
      return $this->db->get()->result();
    }

    function getDetalleCargo($cargo){
        $this->db->select("c.cp_cargo, c.atr_nombre, c.atr_jefeDirecto, c.atr_lugarTrabajo, c.atr_jornadaTrabajo, c.atr_diasTrabajo");
        $this->db->from("fa_cargo c");
        // $this->db->join("fa_responsabilidad r", "r.cf_cargo == c.cp_cargo")
        $this->db->where("c.cp_cargo",$cargo);
        $arrayCargo = $this->db->get()->result();


        $this->db->select("r.cp_responsabilidad, r.atr_descripcion");
        $this->db->from("fa_responsabilidad r");
        // $this->db->join("fa_responsabilidad r", "r.cf_cargo == c.cp_cargo")
        $this->db->where("r.cf_cargo",$cargo);
        $arrayResponsabilidades = $this->db->get()->result();

        $data = array(
            "array_cargo" => $arrayCargo,
            "array_responsabilidades" => $arrayResponsabilidades,
        );

        return $data;
    }

    function updateCargo($id, $nombre, $jefeDirecto, $lugarTrabajo, $jornadaTrabajo, $diasTrabajo){
        $data = array(
            "atr_nombre" => $nombre,
            "atr_jefeDirecto" => $jefeDirecto,
            "atr_lugarTrabajo" => $lugarTrabajo,
            "atr_jornadaTrabajo" => $jornadaTrabajo,
            "atr_diasTrabajo" => $diasTrabajo
        );
        $this->db->where('cp_cargo', $id);
        $resultado =  $this->db->update("fa_cargo", $data);
        if($resultado){
          return "ok";
        }else{
          return "error";
        }
    }

    function updateResponsabilidad($descripcionActual,$descripcionNueva,$idCargo){
      $data = array(
          "atr_descripcion" => $descripcionNueva
      );

      $this->db->where('r.cf_cargo', $idCargo);
      $this->db->where('r.atr_descripcion', $descripcionActual);
      $resultado =  $this->db->update("fa_responsabilidad r", $data);

      var_dump("descripcion actual: ",$descripcionActual);
      var_dump("descripcion nueva: ",$descripcionNueva);
      if($resultado){
        return "ok";
      }else{
        return "error";
      }
    }

    // ESTADO CIVIL
    function getListadoEstadosCiviles(){
      $this->db->select("ec.cp_estadoCivil, ec.atr_nombre");
      $this->db->from("fa_estadoCivil ec");
      return $this->db->get();
    }

    function addEstadoCivil($nombre){
        $data = array(
            "atr_nombre" => $nombre
        );
        $this->db->insert("fa_estadoCivil", $data);
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

    function getDetalleAFP($afp){
        $this->db->select("a.cp_afp, a.atr_nombre");
        $this->db->from("fa_afp a");
        $this->db->where("a.cp_afp",$afp);
        return $this->db->get()->result();
    }

    function updateAFP($afpNuevo, $id){
        $data = array(
            "atr_nombre" => $afpNuevo
        );
        $this->db->where('cp_afp', $id);
        $this->db->update("fa_afp", $data);
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

    function getDetalleNacionalidad($idNacionalidad){
        $this->db->select("n.cp_nacionalidad, n.atr_nombre");
        $this->db->from("fa_nacionalidad n");
        $this->db->where("n.cp_nacionalidad",$idNacionalidad);

        return $this->db->get()->result();
    }

    function updateNacionalidad($idNacionalidad, $nombre){
        $data = array(
            "atr_nombre" => $nombre
        );
        $this->db->where("n.cp_nacionalidad",$idNacionalidad);
        $result = $this->db->update("fa_nacionalidad n", $data);

        if($result == true){
          return "ok";
        }else{
          return "error";
        }
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

    function getDetalleEstadosContrato($idEstadoContrato){
        $this->db->select("e.cp_estado, e.atr_nombre");
        $this->db->from("fa_estado e");
        $this->db->where("e.cp_estado",$idEstadoContrato);

        return $this->db->get()->result();
    }

    function updateEstadoContrato($idEstadoContrato, $nombre){
        $data = array(
            "atr_nombre" => $nombre
        );
        $this->db->where("e.cp_estado",$idEstadoContrato);
        $result = $this->db->update("fa_estado e", $data);

        if($result == true){
          return "ok";
        }else{
          return "error";
        }
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

    function getDetallePrevision($idPrevision){
        $this->db->select("p.cp_prevision, p.atr_nombre");
        $this->db->from("fa_prevision p");
        $this->db->where("p.cp_prevision",$idPrevision);

        return $this->db->get()->result();
    }

    function updatePrevision($idPrevision, $nombre){
        $data = array(
            "atr_nombre" => $nombre
        );
        $this->db->where("p.cp_prevision",$idPrevision);
        $result = $this->db->update("fa_prevision p", $data);

        if($result == true){
          return "ok";
        }else{
          return "error";
        }
    }

    // TITULO
    function getListadoTitulos($cargo){
      $this->db->select("ti.cp_titulo, ti.atr_descripcion");
      $this->db->from("fa_titulo ti");
      $this->db->where("ti.cf_cargo",$cargo);
      return $this->db->get()->result();
    }



    function addTitulo($descripcion, $cargo){
        $data = array(
            "atr_descripcion" => $descripcion,
            "cf_cargo"   => $cargo
        );
        $resultado = $this->db->insert("fa_titulo", $data);

        if($resultado){
          return "ok";
        }else{
          return "error";
        }
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
            "atr_nombre" => $nombre,
            "atr_run " => $rut,
            "atr_representante " => $representante,
            "atr_cedula_representante" => $cedula_representante,
            "atr_domicilio" => $domicilio,
            "cf_ciudad" => $ciudad
        );
        $this->db->insert("fa_empresa", $data);
        return "ok";
    }

    function updateEmpresa($esNuevo, $idEmpresa, $nombre, $run, $representante, $cedula_representante, $domicilio, $ciudad){

        if($esNuevo == false){
          // Buscar la ID de la ciudad ingresada
          $this->db->select("c.cp_ciudad");
          $this->db->where("c.atr_nombre",$ciudad);
          $this->db->from("fa_ciudad c");
          $ciudad = $this->db->get()->result();
          // obtener la id de la ciudad desde el resultado en la consulta anterior
          foreach ($ciudad as $key=>$c){
            $idCiudad = $c->cp_ciudad;
          }
        }else{
          $idCiudad = $ciudad;
        }


        $data = array(
            "atr_nombre" => $nombre,
            "atr_run" => $run,
            "atr_representante" => $representante,
            "atr_cedula_representante" => $cedula_representante,
            "atr_domicilio" => $domicilio,
            "cf_ciudad" => $idCiudad
        );
        $this->db->where('e.cp_empresa', $idEmpresa);
        $resultado =  $this->db->update("fa_empresa e", $data);

        if($resultado){
          return "ok";
        }else{
          return "error";
        }
    }

    function getDetalleEmpresa($idEmpresa){
        $this->db->select("e.cp_empresa,e.atr_nombre, e.atr_run, e.atr_domicilio, e.atr_representante, e.atr_cedula_representante, e.cf_ciudad as cf_ciudad_nombre, c.atr_nombre as nombreCiudad");
        $this->db->where('e.cp_empresa', $idEmpresa);
        $this->db->join("fa_ciudad c","c.cp_ciudad = e.cf_ciudad");
        $this->db->from("fa_empresa e", $idEmpresa);
        $resultado =  $this->db->get()->result();
        return $resultado;
    }

}
