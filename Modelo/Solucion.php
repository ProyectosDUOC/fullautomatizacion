<?php

/*

CREATE TABLE solucion
  (
    id_solucion  INTEGER NOT NULL AUTO_INCREMENT,
    id_usuario  INTEGER NOT NULL ,
    fecha_solucion   DATETIME (30) NOT NULL ,
    nombre_carpeta      VARCHAR (100) ,
    URL                 VARCHAR (200) ,
    descripcion   VARCHAR(300),    
    PRIMARY KEY(id_solucion)
  ) ;
*/
class Solucion {
    private $id_solucion;
    private $id_usuario;
    private $fecha_solucion;
    private $nombre_carpeta;
    private $URL;
    private $descripcion;
    
    function __construct($id_solucion=0, $id_usuario=0, $fecha_solucion=null, $nombre_carpeta="", $URL="", $descripcion="") {
        $this->id_solucion = $id_solucion;
        $this->id_usuario = $id_usuario;
        $this->fecha_solucion = $fecha_solucion;
        $this->nombre_carpeta = $nombre_carpeta;
        $this->URL = $URL;
        $this->descripcion = $descripcion;
    }
    function getId_solucion() {
        return $this->id_solucion;
    }

    function getId_usuario() {
        return $this->id_usuario;
    }

    function getFecha_solucion() {
        return $this->fecha_solucion;
    }

    function getNombre_carpeta() {
        return $this->nombre_carpeta;
    }

    function getURL() {
        return $this->URL;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setId_solucion($id_solucion) {
        $this->id_solucion = $id_solucion;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function setFecha_solucion($fecha_solucion) {
        $this->fecha_solucion = $fecha_solucion;
    }

    function setNombre_carpeta($nombre_carpeta) {
        $this->nombre_carpeta = $nombre_carpeta;
    }

    function setURL($URL) {
        $this->URL = $URL;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    function __toString(){
        return print_r($this,true);
    }  
}
