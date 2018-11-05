<?php

/*
CREATE TABLE tipo_usuario
  (
    id_tipo_u     INTEGER NOT NULL ,
    nombre_tipo_u VARCHAR (60) NOT NULL,
    PRIMARY KEY(id_tipo_u)
  ) ;
 */
class TipoUsuario {
    private $id_tipo_u;
    private $nombre_tipo_u;
    
    function __construct($id_tipo_u, $nombre_tipo_u) {
        $this->id_tipo_u = $id_tipo_u;
        $this->nombre_tipo_u = $nombre_tipo_u;
    }
    function getId_tipo_u() {
        return $this->id_tipo_u;
    }

    function getNombre_tipo_u() {
        return $this->nombre_tipo_u;
    }

    function setId_tipo_u($id_tipo_u) {
        $this->id_tipo_u = $id_tipo_u;
    }

    function setNombre_tipo_u($nombre_tipo_u) {
        $this->nombre_tipo_u = $nombre_tipo_u;
    }

 function __toString(){
        return print_r($this,true);
    }
}
