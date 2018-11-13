<?php

if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];

require_once($rootDir . "/DB/DB.php");
require_once($rootDir . "/Modelo/Solucion.php");


class SolucionDAO {
    public static function lastValue(){
        $cc = DB::getInstancia();
        $stSql = "SELECT * FROM solucion order by id_solucion desc  limit 1";
        $rs = $cc->db->prepare($stSql);
        $rs->execute();
        $ba = $rs->fetch();
        $nuevo = new Solucion($ba['id_solucion'],
                            $ba['id_usuario'],
                            $ba['fecha_solucion'],
                            $ba['nombre_carpeta'], 
                            $ba['URL'],
                            $ba['descripcion']);
        return $nuevo;        
    }

    public static function ultimoId(){
        $cc = DB::getInstancia();
        $stSql = "SELECT * FROM solucion order by id_solucion desc  limit 1";
        $rs = $cc->db->prepare($stSql);
        $rs->execute();
        $ba = $rs->fetch();
        $nuevo = new Solucion($ba['id_solucion'],
                            $ba['id_usuario'],
                            $ba['fecha_solucion'],
                            $ba['nombre_carpeta'],
                            $ba['URL'], 
                            $ba['descripcion']);
        if(empty($nuevo)){
           $num= 0;
        }else{
            $num = $nuevo->getId_solucion();
        }
        return $num;     
    }
      
    public static function agregar($nuevo) {
        $cc=DB::getInstancia();
        $stSql = "INSERT INTO solucion VALUES ";
        $stSql .= "(:id_solucion,:id_usuario,:fecha_solucion,:nombre_carpeta,:URL,:descripcion)";
        $rs = $cc->db->prepare($stSql);
        $params = self::getParams($nuevo);
        return $rs->execute($params);
    }

    public static function getParams($nuevo){
        $params = array();
        $params['id_solucion'] = $nuevo->getId_solucion();
        $params['id_usuario'] = $nuevo->getId_usuario();
        $params['fecha_solucion'] = $nuevo->getFecha_solucion();
        $params['nombre_carpeta'] = $nuevo->getNombre_carpeta();
        $params['URL'] = $nuevo->getURL();
        $params['descripcion'] = $nuevo->getDescripcion();
        return $params;
    }

    public static function readAll() { 
        $cc =DB::getInstancia();
        $stSql = "SELECT * FROM solucion";
        $rs = $cc->db->prepare($stSql);
        $rs->execute();
        $ba = $rs->fetchAll();
        
        $pila = array();
        foreach ($ba as $c) {
               $nuevo = new Solucion($c['id_solucion'],
                            $c['id_usuario'],
                            $c['fecha_solucion'],
                            $c['nombre_carpeta'], 
                            $c['URL'],
                            $c['descripcion']);      
            array_push($pila, $nuevo);
        }
        return $pila;
    }

   
   public static function buscar($id){
            $cc = DB::getInstancia();
            $stSql = "SELECT * FROM solucion WHERE id_solucion=:id_solucion";
            $rs = $cc->db->prepare($stSql);
            $rs->execute(array('id_solucion' => $id));
            $c = $rs->fetch();
            $nuevo = new Solucion($c['id_solucion'],
                                    $c['id_usuario'],
                                    $c['fecha_solucion'],
                                    $c['nombre_carpeta'], 
                                    $c['URL'],
                                    $c['descripcion']);     
            return $nuevo;        
    }
    
}
