<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PermisosModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function getExistenciasPorModulo($modulo){
        $this->db->select(" ep.cp_existencia_permiso, ep.cf_modulo, ep.cf_permiso, p.atr_descripcion ");
        $this->db->from("fa_existencia_permiso ep");
        $this->db->join("fa_permiso p"," p.cp_permiso = ep.cf_permiso");
        $this->db->where("ep.cf_modulo",$modulo);
        $resultado =  $this->db->get()->result();
        return $resultado;
    }

    function getModulos(){
        $this->db->select(" m.atr_nombre, m.cp_modulo ");
        $this->db->from("fa_modulo m");
        $resultado =  $this->db->get()->result();
        return $resultado;
    }



























    function getListadoPrestamosTrabajador(){
        $this->db->select(" p.cp_prestamo, p.atr_fechaPrestamo, p.atr_montoTotal, p.atr_cantidadCuotas, t.atr_rut, t.atr_nombres, t.atr_apellidos ");
        $this->db->from("fa_prestamo p");
        $this->db->join("fa_trabajador t","t.cp_trabajador = p.cf_trabajador ");
        $this->db->order_by('p.atr_fechaPrestamo', 'DESC');
        $resultado =  $this->db->get();
        return $resultado;
    }












    function getLiquidacionesTrabajador($idTrabajador){
        $this->db->select("l.cp_liquidacion, l.atr_fecha, l.atr_totalHaberes, l.atr_totalDescuentos, l.atr_alcanceLiquido  ");
        $this->db->from("fa_documento doc");
        $this->db->join("fa_liquidacion l","l.cp_liquidacion = doc.cf_liquidacion ");
        $this->db->order_by('l.atr_fecha', 'DESC');
        $this->db->where("doc.cf_trabajador", $idTrabajador);

        $resultado =  $this->db->get()->result();
        return $resultado;
    }

    function getURLLiquidacion($idLiquidación){
        $this->db->select("doc.atr_nombreDoc, doc.atr_nombreReal");
        $this->db->from("fa_documento doc");
        $this->db->where("doc.cf_liquidacion", $idLiquidación);
        $resultado =  $this->db->get()->result();
        return $resultado;
    }



    function cargar_liquidacion( $fecha, $fechaCarga, $haberes, $descuentos, $alcanceLiquido, $nombreReal, $nombreFinal, $ruta, $monto, $idTrabajador ){
        // 1: Buscar trabajador y obtener id del cargo
        $this->db->select("t.cf_cargo");
        $this->db->from("fa_trabajador t");
        $this->db->where("t.cp_trabajador", $idTrabajador);
        $resultado =  $this->db->get()->result();

        foreach ($resultado as $key=>$t){
          $cargo = $t->cf_cargo;
        }

        // 2: Obtener total de transferencias + 1
        $this->db->select('count(*)');
        $this->db->from("fa_liquidacion l");
        $cantidad_liquidaciones = $this->db->count_all_results();

        // 3: Generar clave de atr_documento
        $arraykey = array("NR70RG0", "LSL74T0", "42IIQW0", "VH6MPA0","Z_0RTN0","VF88JP00","WT96QF0", "E077ES0","IF72LE0","DG62XK0","VP59FY0","TJ12BX0","TD13MX0");
        $arrayN=rand(0,12);
        $key=rand(1,999999);
        $atr_documento = $arraykey[$arrayN]."".$key."".$cantidad_liquidaciones;

        // 3: Crear liquidacion con atr_documento = codigo generado
        $data = array(
            "cp_liquidacion" => $atr_documento,
            "atr_fecha" => $fecha,
            "atr_totalHaberes" => $haberes,
            "atr_totalDescuentos" => $descuentos,
            "atr_alcanceLiquido" => $alcanceLiquido,
            "cf_trabajador" => $idTrabajador
        );
        $insert = $this->db->insert("fa_liquidacion", $data);

        if($insert){
          // 4: Crear doumento con clave primeria = atr_documento descrito en contrato
          $this->db->select('count(*)');
          $this->db->from("fa_liquidacion l");
          $cantidad_liquidaciones = $this->db->count_all_results();

          $data = array(
              "atr_nombreReal" => $nombreReal,
              "atr_nombreDoc" => $nombreFinal,
              "cf_liquidacion" => $atr_documento,
              "atr_ruta" => $ruta,
              "atr_fechaCarga" => $fechaCarga,
              "atr_fechacronologica" => $fecha,
              "cf_trabajador" => $idTrabajador
          );
          $insert = $this->db->insert("fa_documento", $data);
          if($insert){
            return "ok";
          }else{
            return "error";
          }
        }else{
          return "error";
        }
    }







}
