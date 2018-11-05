<?php


if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];

require_once($rootDir . "/DB/DB.php");
require_once($rootDir . "/Modelo/Agenda.php");

class AgendaDAO {
    public static function lastValue(){
        $cc = DB::getInstancia();
        $stSql = "SELECT * FROM agenda order by id_agenda desc  limit 1";
        $rs = $cc->db->prepare($stSql);
        $rs->execute();
        $ba = $rs->fetch();
        $nuevo = new Agenda($ba['id_agenda'],
                            $ba['fecha_creacion'],
                            $ba['fecha_programada'],
                            $ba['descripcion'], 
                            $ba['id_estado_a'],
                            $ba['id_tipo_monitoreo'],
                            $ba['id_usuario']);
        return $nuevo;        
    }
    
    public static function buscar($id){
        $cc = DB::getInstancia();
        $stSql = "SELECT * FROM agenda WHERE id_agenda=:id_agenda";
        $rs = $cc->db->prepare($stSql);
        $rs->execute(array('id_agenda' => $id));
        $ba = $rs->fetch();
          $nuevo = new Agenda($ba['id_agenda'],
                            $ba['fecha_creacion'],
                            $ba['fecha_programada'],
                            $ba['descripcion'], 
                            $ba['id_estado_a'],
                            $ba['id_tipo_monitoreo'],
                            $ba['id_usuario']);
        return $nuevo;         
    }
    
    public static function agregar($nuevo) {
        $cc=DB::getInstancia();
        $stSql = "INSERT INTO agenda VALUES ";
        $stSql .= "(:id_agenda,:fecha_creacion,:fecha_programada,:descripcion,:id_estado_a,:id_tipo_monitoreo,:id_usuario)";
        $rs = $cc->db->prepare($stSql);
        $params = self::getParams($nuevo);
        return $rs->execute($params);
    }

    public static function actualizar($nuevo) {
        $cc=DB::getInstancia();

        $stSql = "UPDATE agenda SET "
                . " fecha_creacion=:fecha_creacion"
                . ",fecha_programada=:fecha_programada"
                . ",descripcion=:descripcion"
                . ",id_estado_a=:id_estado_a"
                . ",id_tipo_monitoreo=:id_tipo_monitoreo"
                . ",id_usuario=:id_usuario"
                . " WHERE id_agenda=:id_agenda";
        $rs = $cc->db->prepare($stSql);
        $params = self::getParams($nuevo);
      
        return $rs->execute($params);
    }

    public static function eliminar($agenda) {
        $cc=DB::getInstancia();
        $stSql = "DELETE FROM agenda WHERE id_agenda=:id_agenda";
        $rs = $cc->db->prepare($stSql);
        $rs->execute(array("id_agenda"=>$agenda->getId_agenda()));
    }

    public static function getParams($nuevo){
        $params = array();
        $params['id_agenda'] = $nuevo->getId_agenda();
        $params['fecha_creacion'] = $nuevo->getFecha_creacion();
        $params['fecha_programada'] = $nuevo->getFecha_programada();
        $params['descripcion'] = $nuevo->getDescripcion();
        $params['id_estado_a'] = $nuevo->getId_estado_a();
        $params['id_tipo_monitoreo'] = $nuevo->getId_tipo_monitoreo();
        $params['id_usuario'] = $nuevo->getId_usuario();
        return $params;
    }

    public static function readAll() { 
        $cc =DB::getInstancia();
        $stSql = "SELECT * FROM agenda";
        $rs = $cc->db->prepare($stSql);
        $rs->execute();
        $ba = $rs->fetchAll();
        
        $pila = array();
        foreach ($ba as $c) {
               $nuevo = new Agenda($c['id_agenda'],
                            $c['fecha_creacion'],
                            $c['fecha_programada'],
                            $c['descripcion'], 
                            $c['id_estado_a'],
                            $c['id_tipo_monitoreo'],
                            $c['id_usuario']);     
            array_push($pila, $nuevo);
        }
        return $pila;
    }
}
