<?php

/*
CREATE TABLE agenda
  (
    id_agenda         INTEGER NOT NULL AUTO_INCREMENT,
    fecha_creacion    DATETIME ,
    fecha_programada  DATETIME ,
    descripcion       VARCHAR (100) ,
    id_estado_a       INTEGER NOT NULL ,
    id_tipo_monitoreo INTEGER NOT NULL ,
    id_usuario        INTEGER NOT NULL,
    PRIMARY KEY(id_agenda)
  ) ;
 */
class Agenda {
   private $id_agenda;
   private $fecha_creacion;
   private $fecha_programada;
   private $descripcion;
   private $id_estado_a;
   private $id_tipo_monitoreo;
   private $id_usuario;
   
   function __construct($id_agenda=0, $fecha_creacion=null, $fecha_programada=null, $descripcion="", $id_estado_a=0, $id_tipo_monitoreo=0, $id_usuario=0) {
       $this->id_agenda = $id_agenda;
       $this->fecha_creacion = $fecha_creacion;
       $this->fecha_programada = $fecha_programada;
       $this->descripcion = $descripcion;
       $this->id_estado_a = $id_estado_a;
       $this->id_tipo_monitoreo = $id_tipo_monitoreo;
       $this->id_usuario = $id_usuario;
   }

   function getId_agenda() {
       return $this->id_agenda;
   }

   function getFecha_creacion() {
       return $this->fecha_creacion;
   }

   function getFecha_programada() {
       return $this->fecha_programada;
   }

   function getDescripcion() {
       return $this->descripcion;
   }

   function getId_estado_a() {
       return $this->id_estado_a;
   }

   function getId_tipo_monitoreo() {
       return $this->id_tipo_monitoreo;
   }

   function getId_usuario() {
       return $this->id_usuario;
   }

   function setId_agenda($id_agenda) {
       $this->id_agenda = $id_agenda;
   }

   function setFecha_creacion($fecha_creacion) {
       $this->fecha_creacion = $fecha_creacion;
   }

   function setFecha_programada($fecha_programada) {
       $this->fecha_programada = $fecha_programada;
   }

   function setDescripcion($descripcion) {
       $this->descripcion = $descripcion;
   }

   function setId_estado_a($id_estado_a) {
       $this->id_estado_a = $id_estado_a;
   }

   function setId_tipo_monitoreo($id_tipo_monitoreo) {
       $this->id_tipo_monitoreo = $id_tipo_monitoreo;
   }

   function setId_usuario($id_usuario) {
       $this->id_usuario = $id_usuario;
   }

   function __toString(){
        return print_r($this,true);
    }

}
