<?php

if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];

require_once($rootDir . "/DB/DB.php");
require_once($rootDir . "/Modelo/AlertaGanaderia.php");

class AlertDAO {
    
    public static function ultimoId(){
        $cc = DB::getInstancia();
        $stSql = "SELECT * FROM alerta_ganaderia order by id_alerta desc  limit 1";
        $rs = $cc->db->prepare($stSql);
        $rs->execute();
        $ba = $rs->fetch();
        $nuevo = new AlertaGanaderia($ba['id_alerta'],
                            $ba['asunto'],
                            $ba['comentario'],
                            $ba['fecha'], 
                            $ba['activo']);
        if(empty($nuevo)){
           $num= 0;
        }else{
            $num = $nuevo->getId_alerta();
        }
        return $num;        
    }
    
    public static function agregar($nuevo) {
        $cc=DB::getInstancia();
        $stSql = "INSERT INTO alerta_ganaderia VALUES ";
        $stSql .= "(:id_alerta,:asunto,:comentario,:fecha,:activo)";
        $rs = $cc->db->prepare($stSql);
        $params = self::getParams($nuevo);
        return $rs->execute($params);
    }

    public static function actualizar($nuevo) {
        $cc=DB::getInstancia();

        $stSql = "UPDATE alerta SET "
                . " asunto=:asunto"
                . ",comentario=:comentario"
                . ",fecha=:fecha"
                . ",activo=:activo"
                . " WHERE id_alerta=:id_alerta";
        $rs = $cc->db->prepare($stSql);
        $params = self::getParams($nuevo);      
        return $rs->execute($params);        
    }

    public static function getParams($nuevo){
        $params = array();
        $params['id_alerta'] = $nuevo->getId_alerta();
        $params['asunto'] = $nuevo->getAsunto();
        $params['comentario'] = $nuevo->getComentario();
        $params['fecha'] = $nuevo->getFecha();
        $params['activo'] = $nuevo->getActivo();
        return $params;
    }

    public static function readAll() { 
        $cc = DB::getInstancia();
        $stSql = "SELECT * FROM alerta";
        $rs = $cc->db->prepare($stSql);
        $rs->execute();
        $ba = $rs->fetchAll();
        
        $pila = array();
        foreach ($ba as $c) {
            $nuevo = new AlertaGanaderia($c['id_alerta'],
                                $c['asunto'],
                                $c['comentario'],
                                $c['fecha'],
                                $c['activo']);
            array_push($pila, $nuevo);
        }
        return $pila;
    }
}
