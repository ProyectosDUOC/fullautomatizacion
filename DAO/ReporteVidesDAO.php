<?php

if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];

require_once($rootDir . "/DB/DB.php");
require_once($rootDir . "/Modelo/ReporteVides.php");


class ReporteVidesDAO {
      public static function lastValue(){
        $cc = DB::getInstancia();
        $stSql = "SELECT * FROM reporte_vides order by id_reporte limit 1";
        $rs = $cc->db->prepare($stSql);
        $rs->execute();
        $ba = $rs->fetch();
        $nuevo = new ReporteVides($ba['id_reporte'],
                            $ba['fecha_realizada'],
                            $ba['hora_inicial'],
                            $ba['hora_final'],                 
                            $ba['temperatura'],
                            $ba['humedad'],
                            $ba['velocidad_viento'],                 
                            $ba['id_agenda'],
                            $ba['id_usuario'],
                            $ba['nombre_carpeta'],
                            $ba['URL'],
                            $ba['id_vehiculo_volador']);
        return $nuevo;        
    }
    
    public static function buscar($id){
        $cc = DB::getInstancia();
        $stSql = "SELECT * FROM reporte_vides WHERE id_reporte=:id_reporte";
        $rs = $cc->db->prepare($stSql);
        $rs->execute(array('id_acceso' => $id));
        $ba = $rs->fetch();
          $nuevo = new ReporteVides($ba['id_reporte'],
                            $ba['fecha_realizada'],
                            $ba['hora_inicial'],
                            $ba['hora_final'],                 
                            $ba['temperatura'],
                            $ba['humedad'],
                            $ba['velocidad_viento'],                 
                            $ba['id_agenda'],
                            $ba['id_usuario'],
                            $ba['nombre_carpeta'],
                            $ba['URL'],
                            $ba['id_vehiculo_volador']);
        return $nuevo;        
    }
    
    public static function agregar($nuevo) {
        $cc=DB::getInstancia();
        $stSql = "INSERT INTO reporte_vides VALUES ";
        $stSql .= "(:id_reporte,:fecha_realizada,:hora_inicial,:hora_final,:temperatura,:humedad,:velocidad_viento,:id_agenda,:id_usuario,:nombre_carpeta,:URL,:id_vehiculo_volador)";
        $rs = $cc->db->prepare($stSql);
        $params = self::getParams($nuevo);
        return $rs->execute($params);
    }

    public static function actualizar($nuevo) {
        $cc=BD::getInstancia();

        $stSql = "UPDATE reporte_vides SET "
                . " fecha_realizada=:fecha_realizada"
                . ",hora_incial=:hora_inicial"
                . ",hora_final=:hora_final"                
                . ",temperatura=:temperatura"
                . ",humedad=:humedad"
                . ",velocidad_viento=:velocidad_viento"
                . ",id_agenda=:id_agenda"
                . ",id_usuario=:id_usuario"
                . ",nombre_carpeta=:nombre_carpeta"
                . ",URL=:URL"
                . ",id_vehiculo_volador=:id_vehiculo_volador"
                . " WHERE id_reporte=:id_reporte";
        $rs = $cc->db->prepare($stSql);
        $params = self::getParams($nuevo);
      
        return $rs->execute($params);
    }

    public static function eliminar($nuevo) {
        $cc=DB::getInstancia();
        $stSql = "DELETE FROM reporte_vides WHERE id_reporte=:id_reporte";
        $rs = $cc->db->prepare($stSql);
        $rs->execute(array("id_reporte"=>$nuevo->getId_reporte()));
    }

    public static function getParams($nuevo){
        $params = array();
        $params['id_reporte'] = $nuevo->getId_reporte();
        $params['fecha_realizada'] = $nuevo->getFecha_realizada();
        $params['hora_inicial'] = $nuevo->getHora_inicial();
        $params['hora_final'] = $nuevo->getHora_final();        
        $params['temperatura'] = $nuevo->getTemperatura();
        $params['humedad'] = $nuevo->getHumedad();
        $params['velocidad_viento'] = $nuevo->getVelocidad_viento();
        $params['id_agenda'] = $nuevo->getId_agenda();
        $params['id_usuario'] = $nuevo->getId_usuario();
        $params['nombre_carpeta'] = $nuevo->getNombre_carpeta();
        $params['URL'] = $nuevo->getURL();
        $params['id_vehiculo_volador'] = $nuevo->getId_vehiculo_volador();
        return $params;
    }

    public static function readAll() { 
        $cc = DB::getInstancia();
        $stSql = "SELECT * FROM reporte_vides";
        $rs = $cc->db->prepare($stSql);
        $rs->execute();
        $ba = $rs->fetchAll();
        
        $pila = array();
        foreach ($ba as $c) {
              $nuevo = new ReporteVides($c['id_reporte'],
                            $c['fecha_realizada'],
                            $c['hora_inicial'],
                            $c['hora_final'],                 
                            $c['temperatura'],
                            $c['humedad'],
                            $c['velocidad_viento'],                 
                            $c['id_agenda'],
                            $c['id_usuario'],
                            $c['nombre_carpeta'],
                            $c['URL'],
                            $c['id_vehiculo_volador']);
            array_push($pila, $nuevo);
        }
        return $pila;
    }
}
