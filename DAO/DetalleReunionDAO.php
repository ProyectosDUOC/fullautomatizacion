<?php

if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];

require_once($rootDir . "/DB/DB.php");
require_once($rootDir . "/Modelo/DetalleReunion.php");


class DetalleReunionDAO {
    
    public static function lastValue(){
        $cc = DB::getInstancia();
        $stSql = "SELECT * FROM detalle_reunion order by id_detalle_reunion desc  limit 1";
        $rs = $cc->db->prepare($stSql);
        $rs->execute();
        $ba = $rs->fetch();
        $nuevo = new DetalleReunion($ba['id_detalle_reunion'],
                            $ba['id_reunion'],
                            $ba['id_usuario']);
        return $nuevo;        
    }
    
    public static function buscar($id){
        $cc = DB::getInstancia();
        $stSql = "SELECT * FROM detalle_reunion WHERE id_detalle_reunion=:id_detalle_reunion";
        $rs = $cc->db->prepare($stSql);
        $rs->execute(array('id_detalle_reunion' => $id));
        $ba = $rs->fetch();
        $nuevo = new DetalleReunion($ba['id_detalle_reunion'],
                            $ba['id_reunion'],
                            $ba['id_usuario']);
        return $nuevo;         
    }
    
    public static function agregar($nuevo) {
        $cc=DB::getInstancia();
        $stSql = "INSERT INTO detalle_reunion VALUES ";
        $stSql .= "(:id_detalle_reunion,:id_reunion,:id_usuario)";
        $rs = $cc->db->prepare($stSql);
        $params = self::getParams($nuevo);
        return $rs->execute($params);
    }

    public static function actualizar($nuevo) {
        $cc=DB::getInstancia();

        $stSql = "UPDATE detalle_reunion SET "
                . " id_reunion=:id_reunion"
                . ",id_usuario=:id_usuario"
                . " WHERE id_detalle_reunion=:id_detalle_reunion";
        $rs = $cc->db->prepare($stSql);
        $params = self::getParams($nuevo);
      
        return $rs->execute($params);
    }

    public static function eliminar($agenda) {
        $cc=DB::getInstancia();
        $stSql = "DELETE FROM detalle_reunion WHERE id_detalle_reunion=:id_detalle_reunion";
        $rs = $cc->db->prepare($stSql);
        $rs->execute(array("id_detalle_reunion"=>$agenda->getId_detalle_reunion()));
    }

    public static function getParams($nuevo){
        $params = array();
        $params['id_detalle_reunion'] = $nuevo->getId_detalle_reunion();
        $params['id_reunion'] = $nuevo->getId_reunion();
        $params['id_usuario'] = $nuevo->getId_usuario();
        return $params;
    }

    public static function readAll() { 
        $cc =DB::getInstancia();
        $stSql = "SELECT * FROM detalle_reunion";
        $rs = $cc->db->prepare($stSql);
        $rs->execute();
        $ba = $rs->fetchAll();
        
        $pila = array();
        foreach ($ba as $c) {
                $nuevo = new DetalleReunion($c['id_detalle_reunion'],
                            $c['id_reunion'],
                            $c['id_usuario']);
            array_push($pila, $nuevo);
        }
        return $pila;
    }
}
