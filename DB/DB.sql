
DROP DATABASE IF EXISTS vides;

CREATE Database vides;

use vides;


CREATE TABLE acceso
  (
    id_acceso  INTEGER NOT NULL AUTO_INCREMENT,
    id_usuario INTEGER NOT NULL ,
    username   VARCHAR (30) NOT NULL ,
    password   VARCHAR (64) NOT NULL ,
    activo     INTEGER NOT NULL,
    PRIMARY KEY(id_acceso)
  ) ;

CREATE TABLE agenda
  (
    id_agenda         INTEGER NOT NULL,
    fecha_creacion    DATETIME ,
    fecha_programada  DATETIME ,
    descripcion       VARCHAR (100) ,
    id_estado_a       INTEGER NOT NULL ,
    id_tipo_monitoreo INTEGER NOT NULL ,
    id_usuario        INTEGER NOT NULL,
    PRIMARY KEY(id_agenda)
  ) ;

CREATE TABLE comentario_reporte
  (
    id_comentario    INTEGER NOT NULL,
    id_usuario       INTEGER NOT NULL ,
    fecha_comentario DATETIME NOT NULL ,
    comentario NVARCHAR (300) NOT NULL ,
    activo     INTEGER NOT NULL ,
    id_reporte INTEGER NOT NULL,
    PRIMARY KEY(id_comentario)
  ) ;

CREATE TABLE detalle_reunion
  (
    id_detalle_reunion INTEGER NOT NULL,
    id_reunion         INTEGER NOT NULL ,
    id_usuario         INTEGER NOT NULL ,
    PRIMARY KEY(id_detalle_reunion)
  ) ;

CREATE TABLE estado_agenda
  (
    id_estado_a   INTEGER NOT NULL,
    nombre_estado VARCHAR (30) NOT NULL,
    PRIMARY KEY(id_estado_a)
  ) ;

CREATE TABLE reporte_vides
  (
    id_reporte          INTEGER NOT NULL ,
    fecha_realizada     DATETIME NOT NULL ,
    hora_inicial        VARCHAR(40) ,
    hora_final          VARCHAR(40) ,
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

CREATE TABLE reunion
  (
    id_reunion    INTEGER NOT NULL,
    fecha_creada  DATETIME ,
    fecha_reunion DATETIME ,
    hora          INTEGER ,
    minuto        INTEGER ,
    PRIMARY KEY(id_reunion)
  ) ;

CREATE TABLE tipo_monitoreo
  (
    id_tipo_monitoreo INTEGER NOT NULL ,
    nombre_monitoreo  VARCHAR (60),
    PRIMARY KEY(id_tipo_monitoreo)
  ) ;

CREATE TABLE tipo_usuario
  (
    id_tipo_u     INTEGER NOT NULL ,
    nombre_tipo_u VARCHAR (60) NOT NULL,
    PRIMARY KEY(id_tipo_u)
  ) ;


CREATE TABLE usuario
  (
    id_usuario INTEGER NOT NULL ,
    rut        VARCHAR (11) NOT NULL ,
    nombre     VARCHAR (30) NOT NULL,
    apellido   VARCHAR (30) NOT NULL,
    celular    VARCHAR (15) NOT NULL,
    domicilio  VARCHAR (100) NOT NULL,
    email      VARCHAR (60) NOT NULL,
    activo     INTEGER NOT NULL,
    id_tipo_u  INTEGER NOT NULL,
    PRIMARY KEY(id_usuario)
  ) ;

CREATE TABLE vehiculo_volador
  (
    id_vehiculo_volador INTEGER NOT NULL ,
    modelo              VARCHAR (60) NOT NULL ,
    activo              INTEGER NOT NULL,
    PRIMARY KEY(id_vehiculo_volador)
  ) ;


ALTER TABLE acceso ADD CONSTRAINT acceso_usuario_FK FOREIGN KEY ( id_usuario ) REFERENCES usuario ( id_usuario ) ;

ALTER TABLE agenda ADD CONSTRAINT agen_estag_FK FOREIGN KEY ( id_estado_a ) REFERENCES estado_agenda ( id_estado_a ) ;

ALTER TABLE agenda ADD CONSTRAINT agen_tipo_FK FOREIGN KEY ( id_tipo_monitoreo ) REFERENCES tipo_monitoreo ( id_tipo_monitoreo ) ;

ALTER TABLE agenda ADD CONSTRAINT agenda_usuario_FK FOREIGN KEY ( id_usuario ) REFERENCES usuario ( id_usuario ) ;

ALTER TABLE comentario_reporte ADD CONSTRAINT comentario_reporte_usuario_FK FOREIGN KEY ( id_usuario ) REFERENCES usuario ( id_usuario ) ;

ALTER TABLE detalle_reunion ADD CONSTRAINT detalle_reunion_reunion_FK FOREIGN KEY ( id_reunion ) REFERENCES reunion ( id_reunion ) ;

ALTER TABLE detalle_reunion ADD CONSTRAINT detalle_reunion_usuario_FK FOREIGN KEY ( id_usuario ) REFERENCES usuario ( id_usuario ) ;

ALTER TABLE reporte_vides ADD CONSTRAINT repo_vides_usuario_FK FOREIGN KEY ( id_usuario ) REFERENCES usuario ( id_usuario ) ;

ALTER TABLE reporte_vides ADD CONSTRAINT reporte_agenda_FK FOREIGN KEY ( id_agenda ) REFERENCES agenda ( id_agenda ) ;

ALTER TABLE reporte_vides ADD CONSTRAINT reporte_v_volador_FK FOREIGN KEY ( id_vehiculo_volador ) REFERENCES vehiculo_volador ( id_vehiculo_volador ) ;

ALTER TABLE comentario_reporte ADD CONSTRAINT reporte_vides_FK FOREIGN KEY ( id_reporte ) REFERENCES reporte_vides ( id_reporte ) ;

ALTER TABLE usuario ADD CONSTRAINT usua_tiuso_FK FOREIGN KEY ( id_tipo_u ) REFERENCES tipo_usuario ( id_tipo_u ) ;


