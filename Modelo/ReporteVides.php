<?php

/*

CREATE TABLE reporte_vides
  (
    id_reporte          INTEGER NOT NULL AUTO_INCREMENT ,
    fecha_realizada     DATETIME NOT NULL ,
    hora_inicial        DATETIME ,
    hora_final          DATETIME ,
    temperatura         INTEGER ,
    humedad             INTEGER ,
    velocidad_viento    INTEGER ,
    id_agenda           INTEGER NOT NULL ,
    id_usuario          INTEGER NOT NULL ,
    nombre_carpeta      VARCHAR (100) ,
    URL                 VARCHAR (200) ,
    id_vehiculo_volador INTEGER NOT NULL,
    PRIMARY KEY(id_reporte)
  ) ;
 */
class ReporteVides {
   private $id_reporte;
   private $fecha_realizada;
   private $hora_inicial;
   private $hora_final;
   private $temperatura;
   private $humedad;
   private $velocidad_viento;
   private $id_agenda;
   private $id_usuario;
   private $nombre_carpeta;
   private $URL;
   private $id_vehiculo_volador;
   function __construct($id_reporte, $fecha_realizada, $hora_inicial, $hora_final, $temperatura, $humedad, $velocidad_viento, $id_agenda, $id_usuario, $nombre_carpeta, $URL, $id_vehiculo_volador) {
       $this->id_reporte = $id_reporte;
       $this->fecha_realizada = $fecha_realizada;
       $this->hora_inicial = $hora_inicial;
       $this->hora_final = $hora_final;
       $this->temperatura = $temperatura;
       $this->humedad = $humedad;
       $this->velocidad_viento = $velocidad_viento;
       $this->id_agenda = $id_agenda;
       $this->id_usuario = $id_usuario;
       $this->nombre_carpeta = $nombre_carpeta;
       $this->URL = $URL;
       $this->id_vehiculo_volador = $id_vehiculo_volador;
   }
   function getId_reporte() {
       return $this->id_reporte;
   }

   function getFecha_realizada() {
       return $this->fecha_realizada;
   }

   function getHora_inicial() {
       return $this->hora_inicial;
   }

   function getHora_final() {
       return $this->hora_final;
   }

   function getTemperatura() {
       return $this->temperatura;
   }

   function getHumedad() {
       return $this->humedad;
   }

   function getVelocidad_viento() {
       return $this->velocidad_viento;
   }

   function getId_agenda() {
       return $this->id_agenda;
   }

   function getId_usuario() {
       return $this->id_usuario;
   }

   function getNombre_carpeta() {
       return $this->nombre_carpeta;
   }

   function getURL() {
       return $this->URL;
   }

   function getId_vehiculo_volador() {
       return $this->id_vehiculo_volador;
   }

   function setId_reporte($id_reporte) {
       $this->id_reporte = $id_reporte;
   }

   function setFecha_realizada($fecha_realizada) {
       $this->fecha_realizada = $fecha_realizada;
   }

   function setHora_inicial($hora_inicial) {
       $this->hora_inicial = $hora_inicial;
   }

   function setHora_final($hora_final) {
       $this->hora_final = $hora_final;
   }

   function setTemperatura($temperatura) {
       $this->temperatura = $temperatura;
   }

   function setHumedad($humedad) {
       $this->humedad = $humedad;
   }

   function setVelocidad_viento($velocidad_viento) {
       $this->velocidad_viento = $velocidad_viento;
   }

   function setId_agenda($id_agenda) {
       $this->id_agenda = $id_agenda;
   }

   function setId_usuario($id_usuario) {
       $this->id_usuario = $id_usuario;
   }

   function setNombre_carpeta($nombre_carpeta) {
       $this->nombre_carpeta = $nombre_carpeta;
   }

   function setURL($URL) {
       $this->URL = $URL;
   }

   function setId_vehiculo_volador($id_vehiculo_volador) {
       $this->id_vehiculo_volador = $id_vehiculo_volador;
   }

   function __toString(){
        return print_r($this,true);
    }
}
