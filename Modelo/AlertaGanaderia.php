<?php


class AlertaGanaderia{
    private $id_alerta;
    private $asunto;
    private $comentario;
    private $fecha;
    private $activo;


    function __construct($id_alerta=0, $asunto="", $comentario="", $fecha=null, $activo=0) {

        $this->id_alerta = $id_alerta;
        $this->asunto = $asunto;
        $this->fecha = $fecha;
        $this->comentario = $comentario;
        $this->activo = $activo;
    }
    function getId_alerta() {
        return $this->id_alerta;
    }

    function getFecha() {
        return $this->fecha;
    }
    function getAsunto() {
        return $this->asunto;
    }

    function getComentario() {
        return $this->comentario;
    }

    function getActivo() {
        return $this->activo;
    }

    function setId_alerta($id_alerta) {
        $this->id_alerta = $id_alerta;
    }
    function setAsunto($asunto) {
        $this->asunto = $asunto;
    }
    function setFecha($fecha) {
        $this->fecha = $fecha;
    }
    function setComentario($comentario) {
        $this->comentario = $comentario;
    }
    function setActivo($activo) {
        $this->activo = $activo;
    }    

    function __toString(){
        return print_r($this,true);
    }

}


class AlertaAdapter{
    private $alerta;

    function __construct(AlertaGanaderia $ale){
        $this->alerta = $ale;
    }

    function getHora(){
        $fecha =new DateTime($this->alerta->getFecha());
        return $fecha->format('H:i:s');
    }
    function getFecha(){
        $fecha =new DateTime($this->alerta->getFecha());
        return $fecha->format('d-m-Y');
        
    }
}