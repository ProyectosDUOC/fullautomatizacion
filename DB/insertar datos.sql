

--  tipo usuario

INSERT INTO  `tipo_usuario` (`id_tipo_u`, `nombre_tipo_u`) VALUES ('1', 'Cliente');
INSERT INTO  `tipo_usuario` (`id_tipo_u`, `nombre_tipo_u`) VALUES ('2', 'Piloto Dron');
INSERT INTO  `tipo_usuario` (`id_tipo_u`, `nombre_tipo_u`) VALUES ('3', 'Tecnico');

-- usuario

INSERT INTO `usuario` (`id_usuario`, `rut`, `nombre`, `apellido`, `celular`, `domicilio`, `email`, `activo`, `id_tipo_u`) VALUES ('1', '11', 'benjamin', 'mora', '82828', 'los crisantemos', 'b.morat@alumnos.duoc.cl', '1', '1');
INSERT INTO `usuario` (`id_usuario`, `rut`, `nombre`, `apellido`, `celular`, `domicilio`, `email`, `activo`, `id_tipo_u`) VALUES ('2', '12', 'sebastian', 'orrego', '123123', 'san bernardo', 'seba@gmail.com', '1', '2');
INSERT INTO `usuario` (`id_usuario`, `rut`, `nombre`, `apellido`, `celular`, `domicilio`, `email`, `activo`, `id_tipo_u`) VALUES ('3', '13', 'rodrigo', 'arranguiz', '123123', 'san bernardo', 'r@gmail.com', '1', '3');

-- acceso

INSERT INTO `acceso` (`id_acceso`, `id_usuario`, `username`, `password`, `activo`) VALUES ('1', '1', 'benjamin', '1234', '1');
INSERT INTO `acceso` (`id_acceso`, `id_usuario`, `username`, `password`, `activo`) VALUES ('2', '2', 'sebastian', '1234', '1');
INSERT INTO `acceso` (`id_acceso`, `id_usuario`, `username`, `password`, `activo`) VALUES ('3', '3', 'rodrigo', '1234', '1');

-- dron
INSERT INTO `vehiculo_volador` (`id_vehiculo_volador`, `modelo`, `activo`) VALUES ('1', 'No asignado', '1');
INSERT INTO `vehiculo_volador` (`id_vehiculo_volador`, `modelo`, `activo`) VALUES ('2', 'Dron modelo phanteon II', '1');
INSERT INTO `vehiculo_volador` (`id_vehiculo_volador`, `modelo`, `activo`) VALUES ('3', 'WaterProof ', '1');
INSERT INTO `vehiculo_volador` (`id_vehiculo_volador`, `modelo`, `activo`) VALUES ('4', 'Dron 300', '1');

-- tipo monitoreo

INSERT INTO `tipo_monitoreo` (`id_tipo_monitoreo`, `nombre_monitoreo`) VALUES ('1', 'Regadio');
INSERT INTO `tipo_monitoreo` (`id_tipo_monitoreo`, `nombre_monitoreo`) VALUES ('2', 'Reporte Dron');


-- estado agenda

INSERT INTO `estado_agenda` (`id_estado_a`, `nombre_estado`) VALUES ('1', 'Pendiente');
INSERT INTO `estado_agenda` (`id_estado_a`, `nombre_estado`) VALUES ('2', 'Cancelada');
INSERT INTO `estado_agenda` (`id_estado_a`, `nombre_estado`) VALUES ('3', 'Finalizada');

-- agendar

INSERT INTO `agenda` (`id_agenda`, `fecha_creacion`, `fecha_programada`, `descripcion`, `id_estado_a`, `id_tipo_monitoreo`, `id_usuario`) VALUES ('1', '2018-09-12', '2018-11-5', 'Realizar toma area', '1', '2', '1');
INSERT INTO `agenda` (`id_agenda`, `fecha_creacion`, `fecha_programada`, `descripcion`, `id_estado_a`, `id_tipo_monitoreo`, `id_usuario`) VALUES ('2', '2018-09-12', '2018-11-12', 'Realizar toma area 2', '1', '2', '1');
INSERT INTO `agenda` (`id_agenda`, `fecha_creacion`, `fecha_programada`, `descripcion`, `id_estado_a`, `id_tipo_monitoreo`, `id_usuario`) VALUES ('3', '2018-09-12', '2018-11-19', 'Realizar toma area 3', '1', '2', '1');
INSERT INTO `agenda` (`id_agenda`, `fecha_creacion`, `fecha_programada`, `descripcion`, `id_estado_a`, `id_tipo_monitoreo`, `id_usuario`) VALUES ('4', '2018-09-12', '2018-11-26', 'Realizar toma area 4', '1', '2', '1');
INSERT INTO `agenda` (`id_agenda`, `fecha_creacion`, `fecha_programada`, `descripcion`, `id_estado_a`, `id_tipo_monitoreo`, `id_usuario`) VALUES ('5', '2018-09-12', '2018-12-3', 'Realizar toma area 5', '1', '2', '1');
INSERT INTO `agenda` (`id_agenda`, `fecha_creacion`, `fecha_programada`, `descripcion`, `id_estado_a`, `id_tipo_monitoreo`, `id_usuario`) VALUES ('6', '2018-09-12', '2018-12-5', 'Realizar toma area 6', '1', '2', '1');
INSERT INTO `agenda` (`id_agenda`, `fecha_creacion`, `fecha_programada`, `descripcion`, `id_estado_a`, `id_tipo_monitoreo`, `id_usuario`) VALUES ('7', '2018-09-12', '2018-12-12', 'Realizar toma area 7', '1', '2', '1');
INSERT INTO `agenda` (`id_agenda`, `fecha_creacion`, `fecha_programada`, `descripcion`, `id_estado_a`, `id_tipo_monitoreo`, `id_usuario`) VALUES ('8', '2018-09-12', '2018-12-17', 'Realizar toma area 8', '1', '2', '1');
INSERT INTO `agenda` (`id_agenda`, `fecha_creacion`, `fecha_programada`, `descripcion`, `id_estado_a`, `id_tipo_monitoreo`, `id_usuario`) VALUES ('9', '2018-09-12', '2018-12-24', 'Fertilizar', '1', '1', '1');

