<?php

/*
CREATE TABLE estado_agenda
  (
    id_estado_a   INTEGER NOT NULL,
    nombre_estado VARCHAR (30) NOT NULL,
    PRIMARY KEY(id_estado_a)
  ) ;

 */
class EstadoAgenda {
    private $id_estado_a;
    private $nombre_estado;
    
    function __construct($id_estado_a, $nombre_estado) {
        $this->id_estado_a = $id_estado_a;
        $this->nombre_estado = $nombre_estado;
    }
    function getId_estado_a() {
        return $this->id_estado_a;
    }

    function getNombre_estado() {
        return $this->nombre_estado;
    }

    function setId_estado_a($id_estado_a) {
        $this->id_estado_a = $id_estado_a;
    }

    function setNombre_estado($nombre_estado) {
        $this->nombre_estado = $nombre_estado;
    }

    function __toString(){
        return print_r($this,true);
    }
}
