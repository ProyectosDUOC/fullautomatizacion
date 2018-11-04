<?php

if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];

require_once($rootDir . "/DB/DB.php");
require_once($rootDir . "/Modelo/TipoUsuario.php");


class TipoUsuarioDAO {
    
    public static function buscar($id){
        $cc = DB::getInstancia();
        $stSql = "SELECT * FROM tipo_usuario WHERE id_tipo_u=:id_tipo_u";
        $rs = $cc->db->prepare($stSql);
        $rs->execute(array('id_tipo_u' => $id));
        $ba = $rs->fetch();
        $nuevo = new TipoUsuario($ba['id_tipo_u'],
                            $ba['nombre_tipo_u']);
        return $nuevo;        
    }
    
    public static function readAll() { 
        $cc = DB::getInstancia();
        $stSql = "SELECT * FROM tipo_usuario";
        $rs = $cc->db->prepare($stSql);
        $rs->execute();
        $ba = $rs->fetchAll();
        
        $pila = array();
        foreach ($ba as $c) {
            $nuevo = new TipoUsuario($c['id_tipo_u'],
                                $c['nombre_tipo_u']);
            array_push($pila, $nuevo);
        }
        return $pila;
    }
}
