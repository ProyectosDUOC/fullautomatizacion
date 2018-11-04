<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];

require_once($rootDir . "/DB/DB.php");
require_once($rootDir . "/Modelo/TipoMonitoreo.php");


class TipoMonitoreoDAO {
    public static function buscar($id){
        $cc = DB::getInstancia();
        $stSql = "SELECT * FROM tipo_monitoreo WHERE id_tipo_monitoreo=:id_tipo_monitoreo";
        $rs = $cc->db->prepare($stSql);
        $rs->execute(array('id_tipo_monitoreo' => $id));
        $ba = $rs->fetch();
        $nuevo = new TipoMonitoreo($ba['id_tipo_monitoreo'],
                            $ba['nombre_monitoreo']);
        return $nuevo;        
    }
    
    public static function readAll() { 
        $cc = DB::getInstancia();
        $stSql = "SELECT * FROM tipo_monitoreo";
        $rs = $cc->db->prepare($stSql);
        $rs->execute();
        $ba = $rs->fetchAll();
        
        $pila = array();
        foreach ($ba as $c) {
            $nuevo = new TipoMonitoreo($c['id_tipo_monitoreo'],
                                $c['nombre_monitoreo']);
            array_push($pila, $nuevo);
        }
        return $pila;
    }
}
