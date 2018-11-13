<?php

class ComentarioS{
    private $id_c;
    private $id_usuario;
    private $fecha_comentario;
    private $comentario;
    private $activo;
    private $id_solucion;
    
    function __construct($id_c=0, $id_usuario=0, $fecha_comentario=null, $comentario="", $activo=0, $id_solucion=0) {
        $this->id_c = $id_c;
        $this->id_usuario = $id_usuario;
        $this->fecha_comentario = $fecha_comentario;
        $this->comentario = $comentario;
        $this->activo = $activo;
        $this->id_solucion = $id_solucion;
    }
    function getId_c() {
        return $this->id_c;
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

    function getId_solucion() {
        return $this->id_solucion;
    }

    function setId_c($id_c) {
        $this->id_c = $id_c;
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

    function setId_solucion($id_solucion) {
        $this->id_solucion = $id_solucion;
    }

    function __toString(){
        return print_r($this,true);
    }

}

class ComentarioSAdapter{
    private $comentarioS;

    function __construct(ComentarioS $co){
        $this->comentarioS = $co;
    }

    function getHora(){
        $fecha =new DateTime($this->comentarioS->getFecha_comentario());
        return $fecha->format('H:i:s');
    }
    function getFecha(){
        $fecha =new DateTime($this->comentarioS->getFecha_comentario());
        return $fecha->format('d-m-Y');
        
    }
    function getComentario(){
        return $this->comentario->getComentario();
    }

}
