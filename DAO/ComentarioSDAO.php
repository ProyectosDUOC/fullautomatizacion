<?php

if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];

require_once($rootDir . "/DB/DB.php");
require_once($rootDir . "/Modelo/ComentarioS.php");


class ComentarioSDAO {
    public static function lastValue(){
        $cc = DB::getInstancia();
        $stSql = "SELECT * FROM comentario_s order by id_c desc  limit 1";
        $rs = $cc->db->prepare($stSql);
        $rs->execute();
        $ba = $rs->fetch();
        $nuevo = new ComentarioS($ba['id_c'],
                            $ba['id_usuario'],
                            $ba['fecha_comentario'],
                            $ba['comentario'], 
                            $ba['activo'],
                            $ba['id_solucion']);
        return $nuevo;        
    }

    public static function ultimoId(){
        $cc = DB::getInstancia();
        $stSql = "SELECT * FROM comentario_s order by id_c desc  limit 1";
        $rs = $cc->db->prepare($stSql);
        $rs->execute();
        $ba = $rs->fetch();
        $nuevo = new ComentarioS($ba['id_c'],
                            $ba['id_usuario'],
                            $ba['fecha_comentario'],
                            $ba['comentario'], 
                            $ba['activo'],
                            $ba['id_solucion']);
        if(empty($nuevo)){
           $num= 0;
        }else{
            $num = $nuevo->getId_c();
        }
        return $num;        
    }
      
    public static function agregar($nuevo) {
        $cc=DB::getInstancia();
        $stSql = "INSERT INTO comentario_s VALUES ";
        $stSql .= "(:id_c,:id_usuario,:fecha_comentario,:comentario,:activo,:id_solucion)";
        $rs = $cc->db->prepare($stSql);
        $params = self::getParams($nuevo);
        return $rs->execute($params);
    }

    public static function getParams($nuevo){
        $params = array();
        $params['id_c'] = $nuevo->getId_c();
        $params['id_usuario'] = $nuevo->getId_usuario();
        $params['fecha_comentario'] = $nuevo->getFecha_comentario();
        $params['comentario'] = $nuevo->getComentario();
        $params['activo'] = $nuevo->getActivo();
        $params['id_solucion'] = $nuevo->getId_solucion();
        return $params;
    }

    public static function readAll() { 
        $cc =DB::getInstancia();
        $stSql = "SELECT * FROM comentario_s";
        $rs = $cc->db->prepare($stSql);
        $rs->execute();
        $ba = $rs->fetchAll();
        
        $pila = array();
        foreach ($ba as $c) {
               $nuevo = new ComentarioS($c['id_c'],
                            $c['id_usuario'],
                            $c['fecha_comentario'],
                            $c['comentario'], 
                            $c['activo'],
                            $c['id_solucion']);      
            array_push($pila, $nuevo);
        }
        return $pila;
    }

    public static function buscarIdS($idS) { 
        $cc =DB::getInstancia();
        $stSql = "SELECT * FROM comentario_s order by fecha_comentario";
        $rs = $cc->db->prepare($stSql);
        $rs->execute();
        $ba = $rs->fetchAll();
        
        $pila = array();
        foreach ($ba as $c) {
               $nuevo = new ComentarioS($c['id_c'],
                            $c['id_usuario'],
                            $c['fecha_comentario'],
                            $c['comentario'], 
                            $c['activo'],
                            $c['id_solucion']);   
                if($nuevo->getId_solucion()==$idS){
                    array_push($pila, $nuevo);
                }               
        }
        return $pila;
    }
}
