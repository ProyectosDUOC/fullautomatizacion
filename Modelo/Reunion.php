<?php

/*
 CREATE TABLE reunion
  (
    id_reunion    INTEGER NOT NULL AUTO_INCREMENT,
    fecha_creada  DATETIME ,
    fecha_reunion DATETIME ,
    hora          INTEGER ,
    minuto        INTEGER ,
    PRIMARY KEY(id_reunion)
  ) ;
 */
class Reunion {
    private $id_reunion;
    private $fecha_creada;
    private $fehca_reunion;
    private $hora;
    private $minuto;
    
    function __construct($id_reunion, $fecha_creada, $fehca_reunion, $hora, $minuto) {
        $this->id_reunion = $id_reunion;
        $this->fecha_creada = $fecha_creada;
        $this->fehca_reunion = $fehca_reunion;
        $this->hora = $hora;
        $this->minuto = $minuto;
    }
    function getId_reunion() {
        return $this->id_reunion;
    }

    function getFecha_creada() {
        return $this->fecha_creada;
    }

    function getFehca_reunion() {
        return $this->fehca_reunion;
    }

    function getHora() {
        return $this->hora;
    }

    function getMinuto() {
        return $this->minuto;
    }

    function setId_reunion($id_reunion) {
        $this->id_reunion = $id_reunion;
    }

    function setFecha_creada($fecha_creada) {
        $this->fecha_creada = $fecha_creada;
    }

    function setFehca_reunion($fehca_reunion) {
        $this->fehca_reunion = $fehca_reunion;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }

    function setMinuto($minuto) {
        $this->minuto = $minuto;
    }

    function __toString(){
        return print_r($this,true);
    }
}
