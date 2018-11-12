<?php

/*
CREATE TABLE detalle_reunion
  (
    id_detalle_reunion INTEGER NOT NULL AUTO_INCREMENT,
    id_reunion         INTEGER NOT NULL ,
    id_usuario         INTEGER NOT NULL ,
    PRIMARY KEY(id_detalle_reunion)
  ) ;
 */
class DetalleReunion {
    private $id_detalle_reunion;
    private $id_reunion;
    private $id_usuario;
    
    function __construct($id_detalle_reunion, $id_reunion, $id_usuario) {
        $this->id_detalle_reunion = $id_detalle_reunion;
        $this->id_reunion = $id_reunion;
        $this->id_usuario = $id_usuario;
    }

    function getId_detalle_reunion() {
        return $this->id_detalle_reunion;
    }

    function getId_reunion() {
        return $this->id_reunion;
    }

    function getId_usuario() {
        return $this->id_usuario;
    }

    function setId_detalle_reunion($id_detalle_reunion) {
        $this->id_detalle_reunion = $id_detalle_reunion;
    }

    function setId_reunion($id_reunion) {
        $this->id_reunion = $id_reunion;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function __toString(){
        return print_r($this,true);
    }
}
