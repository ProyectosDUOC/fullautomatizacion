<?php

/*
CREATE TABLE tipo_monitoreo
  (
    id_tipo_monitoreo INTEGER NOT NULL ,
    nombre_monitoreo  VARCHAR (60),
    PRIMARY KEY(id_tipo_monitoreo)
  ) ;

 */
class TipoMonitoreo {
   private $id_tipo_monitoreo;
   private $nombre_monitoreo;
   
   function __construct($id_tipo_monitoreo, $nombre_monitoreo) {
       $this->id_tipo_monitoreo = $id_tipo_monitoreo;
       $this->nombre_monitoreo = $nombre_monitoreo;
   }
   function getId_tipo_monitoreo() {
       return $this->id_tipo_monitoreo;
   }

   function getNombre_monitoreo() {
       return $this->nombre_monitoreo;
   }

   function setId_tipo_monitoreo($id_tipo_monitoreo) {
       $this->id_tipo_monitoreo = $id_tipo_monitoreo;
   }

   function setNombre_monitoreo($nombre_monitoreo) {
       $this->nombre_monitoreo = $nombre_monitoreo;
   }

    function __toString(){
        return print_r($this,true);
    }   
}
