<?php

/*
CREATE TABLE comentario_reporte
  (
    id_comentario    INTEGER NOT NULL AUTO_INCREMENT,
    id_usuario       INTEGER NOT NULL ,
    fecha_comentario DATETIME NOT NULL ,
    comentario NVARCHAR (300) NOT NULL ,
    activo     INTEGER NOT NULL ,
    id_reporte INTEGER NOT NULL,
    PRIMARY KEY(id_comentario)
  ) ;
 */
class ComentarioReporte {
    private $id_comentario;
    private $id_usuario;
    private $fecha_comentario;
    private $comentario;
    private $activo;
    private $id_reporte;
    
    function __construct($id_comentario=0, $id_usuario=0, $fecha_comentario=null, $comentario="", $activo=0, $id_reporte=0) {
        $this->id_comentario = $id_comentario;
        $this->id_usuario = $id_usuario;
        $this->fecha_comentario = $fecha_comentario;
        $this->comentario = $comentario;
        $this->activo = $activo;
        $this->id_reporte = $id_reporte;
    }
    function getId_comentario() {
        return $this->id_comentario;
    }

    function getId_usuario() {
        return $this->id_usuario;
    }

    function getFecha_comentario() {
        return $this->fecha_comentario;
    }

    function getComentario() {
        return $this->comentario;
    }

    function getActivo() {
        return $this->activo;
    }

    function getId_reporte() {
        return $this->id_reporte;
    }

    function setId_comentario($id_comentario) {
        $this->id_comentario = $id_comentario;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function setFecha_comentario($fecha_comentario) {
        $this->fecha_comentario = $fecha_comentario;
    }

    function setComentario($comentario) {
        $this->comentario = $comentario;
    }

    function setActivo($activo) {
        $this->activo = $activo;
    }

    function setId_reporte($id_reporte) {
        $this->id_reporte = $id_reporte;
    }

    function __toString(){
        return print_r($this,true);
    }

}
