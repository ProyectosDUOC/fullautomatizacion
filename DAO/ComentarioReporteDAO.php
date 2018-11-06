<?php

if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];

require_once($rootDir . "/DB/DB.php");
require_once($rootDir . "/Modelo/ComentarioReporte.php");


class ComentarioReporteDAO {
    public static function lastValue(){
        $cc = DB::getInstancia();
        $stSql = "SELECT * FROM comentario_reporte order by id_comentario desc  limit 1";
        $rs = $cc->db->prepare($stSql);
        $rs->execute();
        $ba = $rs->fetch();
        $nuevo = new ComentarioReporte($ba['id_comentario'],
                            $ba['id_usuario'],
                            $ba['fecha_comentario'],
                            $ba['comentario'], 
                            $ba['activo'],
                            $ba['id_reporte']);
        return $nuevo;        
    }

    public static function ultimoId(){
        $cc = DB::getInstancia();
        $stSql = "SELECT * FROM comentario_reporte order by id_comentario desc  limit 1";
        $rs = $cc->db->prepare($stSql);
        $rs->execute();
        $ba = $rs->fetch();
        $nuevo = new ComentarioReporte($ba['id_comentario'],
                            $ba['id_usuario'],
                            $ba['fecha_comentario'],
                            $ba['comentario'], 
                            $ba['activo'],
                            $ba['id_reporte']);
        if(empty($nuevo)){
           $num= 0;
        }else{
            $num = $nuevo->getId_comentario();
        }
        return $num;        
    }
      
    public static function agregar($nuevo) {
        $cc=DB::getInstancia();
        $stSql = "INSERT INTO comentario_reporte VALUES ";
        $stSql .= "(:id_comentario,:id_usuario,:fecha_comentario,:comentario,:activo,:id_reporte)";
        $rs = $cc->db->prepare($stSql);
        $params = self::getParams($nuevo);
        return $rs->execute($params);
    }


    public static function getParams($nuevo){
        $params = array();
        $params['id_comentario'] = $nuevo->getId_comentario();
        $params['id_usuario'] = $nuevo->getId_usuario();
        $params['fecha_comentario'] = $nuevo->getFecha_comentario();
        $params['comentario'] = $nuevo->getComentario();
        $params['activo'] = $nuevo->getActivo();
        $params['id_reporte'] = $nuevo->getId_reporte();
        return $params;
    }

    public static function readAll() { 
        $cc =DB::getInstancia();
        $stSql = "SELECT * FROM comentario_reporte";
        $rs = $cc->db->prepare($stSql);
        $rs->execute();
        $ba = $rs->fetchAll();
        
        $pila = array();
        foreach ($ba as $c) {
               $nuevo = new ComentarioReporte($c['id_comentario'],
                            $c['id_usuario'],
                            $c['fecha_comentario'],
                            $c['comentario'], 
                            $c['activo'],
                            $c['id_reporte']);      
            array_push($pila, $nuevo);
        }
        return $pila;
    }

    public static function buscarIdReporte($idR) { 
        $cc =DB::getInstancia();
        $stSql = "SELECT * FROM comentario_reporte";
        $rs = $cc->db->prepare($stSql);
        $rs->execute();
        $ba = $rs->fetchAll();
        
        $pila = array();
        foreach ($ba as $c) {
               $nuevo = new ComentarioReporte($c['id_comentario'],
                            $c['id_usuario'],
                            $c['fecha_comentario'],
                            $c['comentario'], 
                            $c['activo'],
                            $c['id_reporte']);   
                if($nuevo->getId_reporte()==$idR){
                    array_push($pila, $nuevo);
                }               
        }
        return $pila;
    }
}
