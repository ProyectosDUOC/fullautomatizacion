<?php

if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];

require_once($rootDir . "/DB/DB.php");
require_once($rootDir . "/Modelo/EstadoAgenda.php");


class EstadoAgendaDAO {
   
    public static function buscar($id){
        $cc = DB::getInstancia();
        $stSql = "SELECT * FROM estado_agenda WHERE id_estado_a=:id_estado_a";
        $rs = $cc->db->prepare($stSql);
        $rs->execute(array('id_estado_a' => $id));
        $ba = $rs->fetch();
        $nuevo = new EstadoAgenda($ba['id_estado_a'],
                            $ba['nombre_estado']);
        return $nuevo;         
    }
    
    public static function getParams($nuevo){
        $params = array();
        $params['id_estado_a'] = $nuevo->getId_estado_a();
        $params['nombre_estado'] = $nuevo->getNombre_estado();
        return $params;
    }

    public static function readAll() { 
        $cc =DB::getInstancia();
        $stSql = "SELECT * FROM estado_agenda";
        $rs = $cc->db->prepare($stSql);
        $rs->execute();
        $ba = $rs->fetchAll();
        
        $pila = array();
        foreach ($ba as $c) {
                 $nuevo = new EstadoAgenda($c['id_estado_a'],
                                           $c['nombre_estado']);
            array_push($pila, $nuevo);
        }
        return $pila;
    }
}
