<?php

/*
CREATE TABLE vehiculo_volador
  (
    id_vehiculo_volador INTEGER NOT NULL ,
    modelo              VARCHAR (60) NOT NULL ,
    activo              INTEGER NOT NULL,
    PRIMARY KEY(id_vehiculo_volador)
  ) ;
 */
class VehiculoVolador {
    private $id_vehiculo_volador;
    private $modelo;
    private $activo;
    
    function __construct($id_vehiculo_volador, $modelo, $activo) {
        $this->id_vehiculo_volador = $id_vehiculo_volador;
        $this->modelo = $modelo;
        $this->activo = $activo;
    }

    function getId_vehiculo_volador() {
        return $this->id_vehiculo_volador;
    }

    function getModelo() {
        return $this->modelo;
    }

    function getActivo() {
        return $this->activo;
    }

    function setId_vehiculo_volador($id_vehiculo_volador) {
        $this->id_vehiculo_volador = $id_vehiculo_volador;
    }

    function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    function setActivo($activo) {
        $this->activo = $activo;
    }

function __toString(){
        return print_r($this,true);
    }
}
