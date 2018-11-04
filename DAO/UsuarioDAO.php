<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];

require_once($rootDir . "/DB/DB.php");
require_once($rootDir . "/Modelo/Usuario.php");

class UsuarioDAO {
    public static function lastValue(){
        $cc = DB::getInstancia();
        $stSql = "SELECT * FROM usuario order by id_usuario desc  limit 1";
        $rs = $cc->db->prepare($stSql);
        $rs->execute();
        $ba = $rs->fetch();
        $nuevo = new Usuario($ba['id_usuario'],
                            $ba['rut'],
                            $ba['nombre'],
                            $ba['apellido'],                 
                            $ba['celular'],
                            $ba['domicilio'],
                            $ba['email'], 
                            $ba['activo'],
                            $ba['id_tipo_u']);
        return $nuevo;        
    }
    
    public static function buscar($id){
        $cc = DB::getInstancia();
        $stSql = "SELECT * FROM usuario WHERE id_usuario=:id_usuario";
        $rs = $cc->db->prepare($stSql);
        $rs->execute(array('id_usuario' => $id));
        $ba = $rs->fetch();
        $nuevo = new Usuario($ba['id_usuario'],
                            $ba['rut'],
                            $ba['nombre'],
                            $ba['apellido'],                 
                            $ba['celular'],
                            $ba['domicilio'],
                            $ba['email'], 
                            $ba['activo'],
                            $ba['id_tipo_u']);
        return $nuevo;        
    }
    
    public static function agregar($nuevo) {
        $cc=DB::getInstancia();
        $stSql = "INSERT INTO usuario VALUES ";
        $stSql .= "(:id_usuario,:rut,:nombre,:apellido,:celular,:domicilio,:email,:activo,:id_tipo_u)";
        $rs = $cc->db->prepare($stSql);
        $params = self::getParams($nuevo);
        return $rs->execute($params);
    }

    
    public static function eliminar($nuevo) {
        $cc=DB::getInstancia();
        $stSql = "DELETE FROM usuario WHERE id_usuario=:id_usuario";
        $rs = $cc->db->prepare($stSql);
        $rs->execute(array("id_usuario"=>$nuevo->getId_usuario()));
    }

    public static function getParams($nuevo){
        $params = array();
        $params['id_usuario'] = $nuevo->getId_usuario();
        $params['rut'] = $nuevo->getRut();
        $params['nombre'] = $nuevo->getNombre();
        $params['apellido'] = $nuevo->getApellido();        
        $params['celular'] = $nuevo->getCelular();
        $params['domicilio'] = $nuevo->getDomicilio();
        $params['email'] = $nuevo->getEmail();        
        $params['activo'] = $nuevo->getActivo();
        $params['id_tipo_u'] = $nuevo->getId_tipo_u();
        return $params;
    }

    public static function readAll() { 
        $cc = DB::getInstancia();
        $stSql = "SELECT * FROM usuario";
        $rs = $cc->db->prepare($stSql);
        $rs->execute();
        $ba = $rs->fetchAll();
        
        $pila = array();
        foreach ($ba as $c) {
                 $nuevo = new Usuario($c['id_usuario'],
                            $c['rut'],
                            $c['nombre'],
                            $c['apellido'],                 
                            $c['celular'],
                            $c['domicilio'],
                            $c['email'], 
                            $c['activo'],
                            $c['id_tipo_u']);
            array_push($pila, $nuevo);
        }
        return $pila;
    }
}
