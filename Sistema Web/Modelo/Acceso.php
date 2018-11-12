<?php

/*
CREATE TABLE acceso
  (
    id_acceso  INTEGER NOT NULL AUTO_INCREMENT,
    id_usuario INTEGER NOT NULL ,
    username   VARCHAR (30) NOT NULL ,
    password   VARCHAR (30) NOT NULL ,
    activo     INTEGER NOT NULL,
    PRIMARY KEY(id_acceso)
  ) ;
*/
class Acceso {
    private $id_acceso;
    private $id_usuario;
    private $username;
    private $password;
    private $activo;
    
    function __construct($id_acceso=0, $id_usuario=0, $username="", $password="", $activo=0) {
        $this->id_acceso = $id_acceso;
        $this->id_usuario = $id_usuario;
        $this->username = $username;
        $this->password = $password;
        $this->activo = $activo;
    }
    function getId_acceso() {
        return $this->id_acceso;
    }

    function getId_usuario() {
        return $this->id_usuario;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getActivo() {
        return $this->activo;
    }

    function setId_acceso($id_acceso) {
        $this->id_acceso = $id_acceso;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setActivo($activo) {
        $this->activo = $activo;
    }

    function __toString(){
        return print_r($this,true);
    }

    
}
