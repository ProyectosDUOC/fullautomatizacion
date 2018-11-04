<?php

if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];

require_once($rootDir . "/DB/DB.php");
require_once($rootDir . "/Modelo/Reunion.php");


class ReunionDAO {
     public static function lastValue(){
        $cc = DB::getInstancia();
        $stSql = "SELECT * FROM reunion order by id_reunion desc  limit 1";
        $rs = $cc->db->prepare($stSql);
        $rs->execute();
        $ba = $rs->fetch();
        $nuevo = new Reunion($ba['id_reunion'],
                            $ba['fecha_creada'],
                            $ba['fecha_reunion'],
                            $ba['hora'], 
                            $ba['minuto']);
        return $nuevo;        
    }
    
    public static function buscar($id){
        $cc = DB::getInstancia();
        $stSql = "SELECT * FROM reunion WHERE id_reunion=:id_reunion";
        $rs = $cc->db->prepare($stSql);
        $rs->execute(array('id_reunion' => $id));
        $ba = $rs->fetch();
        $nuevo = new Reunion($ba['id_reunion'],
                            $ba['fecha_creada'],
                            $ba['fecha_reunion'],
                            $ba['hora'], 
                            $ba['minuto']);
        return $nuevo;        
    }
    
    public static function agregar($nuevo) {
        $cc=DB::getInstancia();
        $stSql = "INSERT INTO reunion VALUES ";
        $stSql .= "(:id_reunion,:fecha_creada,:fecha_reunion,:hora,:minuto)";
        $rs = $cc->db->prepare($stSql);
        $params = self::getParams($nuevo);
        return $rs->execute($params);
    }

    public static function actualizar($nuevo) {
        $cc=BD::getInstancia();

        $stSql = "UPDATE reunion SET "
                . " fecha_creada=:fecha_creada"
                . ",fecha_reunion=:fecha_reunion"
                . ",hora=:hora"
                . ",minuto=:minuto"
                . " WHERE id_reunion=:id_reunion";
        $rs = $cc->db->prepare($stSql);
        $params = self::getParams($nuevo);
      
        return $rs->execute($params);
    }

    public static function eliminar($nuevo) {
        $cc=DB::getInstancia();
        $stSql = "DELETE FROM reunion WHERE id_reunion=:id_reunion";
        $rs = $cc->db->prepare($stSql);
        $rs->execute(array("id_reunion"=>$nuevo->getId_reunion()));
    }

    public static function getParams($nuevo){
        $params = array();
        $params['id_reunion'] = $nuevo->getId_reunion();
        $params['fecha_creada'] = $nuevo->getFecha_creada();
        $params['fecha_reunion'] = $nuevo->getFecha_reunion();
        $params['hora'] = $nuevo->getHora();
        $params['minuto'] = $nuevo->getMinuto();
        return $params;
    }

    public static function readAll() { 
        $cc = DB::getInstancia();
        $stSql = "SELECT * FROM reunion";
        $rs = $cc->db->prepare($stSql);
        $rs->execute();
        $ba = $rs->fetchAll();
        
        $pila = array();
        foreach ($ba as $c) {
            $nuevo = new Acceso($c['id_reunion'],
                                $c['fecha_creada'],
                                $c['fecha_reunion'],
                                $c['hora'],
                                $c['minuto']);
            array_push($pila, $nuevo);
        }
        return $pila;
    }
}
