<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];

require_once($rootDir . "/DB/DB.php");
require_once($rootDir . "/Modelo/VehiculoVolador.php");

class VehiculoVoladorDAO {
    public static function buscar($id){
        $cc = DB::getInstancia();
        $stSql = "SELECT * FROM vehiculo_volador WHERE id_vehiculo_volador=:id_vehiculo_volador";
        $rs = $cc->db->prepare($stSql);
        $rs->execute(array('id_vehiculo_volador' => $id));
        $ba = $rs->fetch();
        $nuevo = new VehiculoVolador($ba['id_vehiculo_volador'],
                                   $ba['modelo'],
                                   $ba['activo']);
        return $nuevo;        
    }
    
    public static function readAll() { 
        $cc = DB::getInstancia();
        $stSql = "SELECT * FROM vehiculo_volador";
        $rs = $cc->db->prepare($stSql);
        $rs->execute();
        $ba = $rs->fetchAll();
        
        $pila = array();
        foreach ($ba as $c) {
            $nuevo = new VehiculoVolador($c['id_vehiculo_volador'],
                                $c['modelo'],
                                $c['activo']);
            array_push($pila, $nuevo);
        }
        return $pila;
    }
}
