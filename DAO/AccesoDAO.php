<?php

if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];

require_once($rootDir . "/DB/DB.php");
require_once($rootDir . "/Modelo/Acceso.php");

class AccesoDAO {
    
    public static function lastValue(){
        $cc = DB::getInstancia();
        $stSql = "SELECT * FROM acceso order by id_acceso desc  limit 1";
        $rs = $cc->db->prepare($stSql);
        $rs->execute();
        $ba = $rs->fetch();
        $nuevo = new Acceso($ba['id_acceso'],
                            $ba['id_usuario'],
                            $ba['username'],
                            $ba['password'], 
                            $ba['activo']);
        return $nuevo;        
    }
    
    public static function buscarName($username){
        $cc = DB::getInstancia();
        $stSql = "SELECT * FROM acceso WHERE username=:username";
        $rs = $cc->db->prepare($stSql);
        $rs->execute(array('username' => $username));
        $ba = $rs->fetch();
        $nuevo = new Acceso($ba['id_acceso'],
                            $ba['id_usuario'],
                            $ba['username'],
                            $ba['password'], 
                            $ba['activo']);
        return $nuevo;        
    }

    public static function buscar($id){
        $cc = DB::getInstancia();
        $stSql = "SELECT * FROM acceso WHERE id_acceso=:id_acceso";
        $rs = $cc->db->prepare($stSql);
        $rs->execute(array('id_acceso' => $id));
        $ba = $rs->fetch();
        $nuevo = new Acceso($ba['id_acceso'],
                            $ba['id_usuario'],
                            $ba['username'],
                            $ba['password'], 
                            $ba['activo']);
        return $nuevo;        
    }

    public static function ingreso($username,$password){
        $cc = DB::getInstancia();
        $stSql = "SELECT * FROM acceso WHERE username=:username";
        $rs = $cc->db->prepare($stSql);
        $rs->execute(array('username' => $username));
        $ba = $rs->fetch();
        return $ba['password'] == $password;
    }
    
    public static function agregar($nuevo) {
        $cc=DB::getInstancia();
        $stSql = "INSERT INTO acceso VALUES ";
        $stSql .= "(:id_acceso,:id_usuario,:username,:password,:activo)";
        $rs = $cc->db->prepare($stSql);
        $params = self::getParams($nuevo);
        return $rs->execute($params);
    }

    public static function actualizar($nuevo) {
        $cc=DB::getInstancia();

        $stSql = "UPDATE acceso SET "
                . " username=:username"
                . ",password=:password"
                . ",activo=:activo"
                . " WHERE id_acceso=:id_acceso";
        $rs = $cc->db->prepare($stSql);
        $params = self::getParams($nuevo);      
        return $rs->execute($params);        
    }

    public static function eliminar($nuevo) {
        $cc=DB::getInstancia();
        $stSql = "DELETE FROM acceso WHERE id_acceso=:id_acceso";
        $rs = $cc->db->prepare($stSql);
        $rs->execute(array("id_acceso"=>$nuevo->getId_acceso()));
    }

    public static function getParams($nuevo){
        $params = array();
        $params['id_acceso'] = $nuevo->getId_acceso();
        $params['id_usuario'] = $nuevo->getId_usuario();
        $params['username'] = $nuevo->getUsername();
        $params['password'] = $nuevo->getPassword();
        $params['activo'] = $nuevo->getActivo();
        return $params;
    }

    public static function readAll() { 
        $cc = DB::getInstancia();
        $stSql = "SELECT * FROM acceso";
        $rs = $cc->db->prepare($stSql);
        $rs->execute();
        $ba = $rs->fetchAll();
        
        $pila = array();
        foreach ($ba as $c) {
            $nuevo = new Acceso($c['id_acceso'],
                                $c['id_usuario'],
                                $c['username'],
                                $c['password'],
                                $c['activo']);
            array_push($pila, $nuevo);
        }
        return $pila;
    }
}
