INSERT INTO `fa_banco` (`cp_banco`, `atr_nombre`, `atr_sitio`) VALUES (NULL, 'BANCO SANTANDER', ''), (NULL, 'CORPBANCA', NULL), (NULL, 'BCI-TBANC', NULL), (NULL, 'BANCO FALABELLA', NULL), (NULL, 'BANCO ITAU', NULL), (NULL, 'BANCO DE CHILE', NULL);
INSERT INTO `fa_banco` (`cp_banco`, `atr_nombre`, `atr_sitio`) VALUES (NULL, 'BANCO ESTADO', NULL), (NULL, 'BANCO BICE', NULL), (NULL, 'BANCO SECURITY', NULL), (NULL, 'BANCO CONSORCIO', NULL), (NULL, 'BANCO RIPLEY', NULL), (NULL, 'SCOTIABANK', NULL);
INSERT INTO `fa_banco` (`cp_banco`, `atr_nombre`, `atr_sitio`) VALUES (NULL, 'COOPEUCH', NULL);


UPDATE `fa_banco` SET `atr_sitio` = 'https://www.santander.cl/empresas/index.asp' WHERE `fa_banco`.`cp_banco` = 1;
UPDATE `fa_banco` SET `atr_sitio` = 'https://banco.itau.cl/wps/portal/newiol/web/login/!ut/p/z1/04_Sj9CPykssy0xPLMnMz0vMAfIjo8ziDVCAo4FTkJGTsYGBu7OJfjhYgb-BpauHYbCBn0WYhZmBo5-xoYungZe7QaCBfhQx-g1wAEey9KMoiMJvfLh-FFgJPh8QMqMgNzQ0wiDTEQCkdp5B/dz/d5/L2dBISEvZ0FBIS9nQSEh/' WHERE `fa_banco`.`cp_banco` = 2;
UPDATE `fa_banco` SET `atr_nombre` = 'BCI', `atr_sitio` = 'https://www.bci.cl/empresas/' WHERE `fa_banco`.`cp_banco` = 3;
UPDATE `fa_banco` SET `atr_sitio` = 'https://www.bancofalabella.cl/home' WHERE `fa_banco`.`cp_banco` = 4;
UPDATE `fa_banco` SET `atr_sitio` = 'https://banco.itau.cl/wps/portal/newiol/web/login/!ut/p/z1/04_Sj9CPykssy0xPLMnMz0vMAfIjo8ziDVCAo4FTkJGTsYGBu7OJfjhYgb-BpauHYbCBn0WYhZmBo5-xoYungZe7QaCBfhQx-g1wAEey9KMoiMJvfLh-FFgJPh8QMqMgNzQ0wiDTEQCkdp5B/dz/d5/L2dBISEvZ0FBIS9nQSEh/' WHERE `fa_banco`.`cp_banco` = 5;
UPDATE `fa_banco` SET `atr_sitio` = 'https://ww3.bancochile.cl/wps/wcm/connect/bch-empresas/bancodechile/empresas' WHERE `fa_banco`.`cp_banco` = 6;
UPDATE `fa_banco` SET `atr_sitio` = 'https://empresas.bancoestado.cl/bancoestado/process.asp' WHERE `fa_banco`.`cp_banco` = 7;
UPDATE `fa_banco` SET `atr_sitio` = 'https://login.bice.cl/loginempresa/index.html' WHERE `fa_banco`.`cp_banco` = 8;
UPDATE `fa_banco` SET `atr_sitio` = 'https://www.bancosecurity.cl/widgets/wEmpresasLogin/index.asp' WHERE `fa_banco`.`cp_banco` = 9;
UPDATE `fa_banco` SET `atr_sitio` = 'https://www.bancoconsorcio.cl/bancaempresas/Home/Login' WHERE `fa_banco`.`cp_banco` = 10;
UPDATE `fa_banco` SET `atr_sitio` = 'https://miportal.bancoripley.cl/home/login.handler#saldosConsolidados' WHERE `fa_banco`.`cp_banco` = 11;
UPDATE `fa_banco` SET `atr_sitio` = 'https://appservtrx.scotiabank.cl/portalempresas/login' WHERE `fa_banco`.`cp_banco` = 12;
UPDATE `fa_banco` SET `atr_sitio` = 'https://www.coopeuch.cl/tef/#/' WHERE `fa_banco`.`cp_banco` = 13;

INSERT INTO `fa_ciudad` (`atr_nombre`)
VALUES ('Arica'),('Camarones'),('General Lagos'),('Putre'),('Alto Hospicio'),('Iquique'),('Camiña'),('Colchane'),('Huara'),('Pica'),('Pozo Almonte'),('Tocopilla'),('María Elena'),
	('Calama'),('Ollague'),('San Pedro de Atacama'),('Antofagasta'),('Mejillones'),('Sierra Gorda'),('Taltal'),('Chañaral'),('Diego de Almagro'),('Copiapó'),
	('Caldera'),('Tierra Amarilla'),('Vallenar'),('Alto del Carmen'),('Freirina'),('Huasco'),('La Serena'),('Coquimbo'),('Andacollo'),('La Higuera'),
  ('Paihuano'),('Vicuña'),('Ovalle'),('Combarbalá'),('Monte Patria'),('Punitaqui'),('Río Hurtado'),('Illapel'),('Canela'),('Los Vilos'),('Salamanca'),
	('La Ligua'),('Cabildo'),('Zapallar'),('Papudo'),('Petorca'),('Los Andes'),('San Esteban'),('Calle Larga'),('Rinconada'),('San Felipe'),
  ('Llaillay'),('Putaendo'),('Santa María'),('Catemu'),('Panquehue'),('Quillota'),('La Cruz'),('La Calera'),('Nogales'),('Hijuelas'),('Valparaíso'),
  ('Viña del Mar'),('Concón'),('Quintero'),('Puchuncaví'),('Casablanca'),('Juan Fernández'),('San Antonio'),('Cartagena'),('El Tabo'),('El Quisco'),('Algarrobo'),
	('Santo Domingo'),('Isla de Pascua'),('Quilpué'),('Limache'),('Olmué'),('Villa Alemana'),('Colina'),('Lampa'),('Tiltil'),('Santiago'),('Vitacura'),
  ('San Ramón'),('San Miguel'),('San Joaquín'),('Renca'),('Recoleta'),('Quinta Normal'),('Quilicura'),('Pudahuel'),('Providencia'),('Peñalolén'),
  ('Pedro Aguirre Cerda'),('Ñuñoa'),('Maipú'),('Macul'),('Lo Prado'),('Lo Espejo'),('Lo Barnechea'),('Las Condes'),('La Reina'),('La Pintana'),
	('La Granja'),('La Florida'),('La Cisterna'),('Independencia'),('Huechuraba'),('Estación Central'),('El Bosque'),('Conchalí'),('Cerro Navia'),
  ('Cerrillos'),('Puente Alto'),('San José de Maipo'),('Pirque'),('San Bernardo'),('Buin'),('Paine'),('Calera de Tango'),('Melipilla'),('Alhué'),
	('Curacaví'),('María Pinto'),('San Pedro'),('Isla de Maipo'),('El Monte'),('Padre Hurtado'),('Peñaflor'),('Talagante'),('Codegua'),('Coínco'),('Coltauco'),
	('Doñihue'),('Graneros'),('Las Cabras'),('Machalí'),('Malloa'),('Mostazal'),('Olivar'),('Peumo'),('Pichidegua'),('Quinta de Tilcoco'),
	('Rancagua'),('Rengo'),('Requínoa'),('San Vicente de Tagua Tagua'),('Chépica'),('Chimbarongo'),('Lolol'),('Nancagua'),('Palmilla'),('Peralillo'),
	('Placilla'),('Pumanque'),('San Fernando'),('Santa Cruz'),('La Estrella'),('Litueche'),('Marchigüe'),('Navidad'),('Paredones'),('Pichilemu'),
	('Curicó'),('Hualañé'),('Licantén'),('Molina'),('Rauco'),('Romeral'),('Sagrada Familia'),('Teno'),('Vichuquén'),('Talca'),('San Clemente'),('Pelarco'),
	('Pencahue'),('Maule'),('San Rafael'),('Curepto'),('Constitución'),('Empedrado'),('Río Claro'),('Linares'),('San Javier'),('Parral'),('Villa Alegre'),
	('Longaví'),('Colbún'),('Retiro'),('Yerbas Buenas'),('Cauquenes'),('Chanco'),('Pelluhue'),('Bulnes'),('Chillán'),('Chillán Viejo'),('El Carmen'),
	('Pemuco'),('Pinto'),('Quillón'),('San Ignacio'),('Yungay'),('Cobquecura'),('Coelemu'),('Ninhue'),('Portezuelo'),('Quirihue'),('Ránquil'),('Treguaco'),
	('San Carlos'),('Coihueco'),('San Nicolás'),('Ñiquén'),('San Fabián'),('Alto Biobío'),('Antuco'),('Cabrero'),('Laja'),('Los Ángeles'),('Mulchén'),
	('Nacimiento'),('Negrete'),('Quilaco'),('Quilleco'),('San Rosendo'),('Santa Bárbara'),('Tucapel'),('Yumbel'),('Concepción'),('Coronel'),('Chiguayante'),
	('Florida'),('Hualpén'),('Hualqui'),('Lota'),('Penco'),('San Pedro de La Paz'),('Santa Juana'),('Talcahuano'),('Tomé'),
	('Arauco'),('Cañete'),('Contulmo'),('Curanilahue'),('Lebu'),('Los Álamos'),('Tirúa'),('Angol'),('Collipulli'),('Curacautín'),('Ercilla'),('Lonquimay'),
	('Los Sauces'),('Lumaco'),('Purén'),('Renaico'),('Traiguén'),('Victoria'),('Temuco'),('Carahue'),('Cholchol'),('Cunco'),('Curarrehue'),
	('Freire'),('Galvarino'),('Gorbea'),('Lautaro'),('Loncoche'),('Melipeuco'),('Nueva Imperial'),('Padre Las Casas'),('Perquenco'),
	('Pitrufquén'),('Pucón'),('Saavedra'),('Teodoro Schmidt'),('Toltén'),('Vilcún'),('Villarrica'),('Valdivia'),('Corral'),('Lanco'),('Los Lagos'),
	('Máfil'),('Mariquina'),('Paillaco'),('Panguipulli'),('La Unión'),('Futrono'),('Lago Ranco'),('Río Bueno'),('Osorno'),('Puerto Octay'),('Purranque'),
	('Puyehue'),('Río Negro'),('San Juan de la Costa'),('San Pablo'),('Calbuco'),('Cochamó'),('Fresia'),('Frutillar'),('Llanquihue'),('Los Muermos'),
	('Maullín'),('Puerto Montt'),('Puerto Varas'),('Ancud'),('Castro'),('Chonchi'),('Curaco de Vélez'),('Dalcahue'),('Puqueldón'),('Queilén'),('Quellón'),
	('Quemchi'),('Quinchao'),('Chaitén'),('Futaleufú'),('Hualaihué'),('Palena'),('Lago Verde'),('Coihaique'),('Aysén'),('Cisnes'),('Guaitecas'),
	('Río Ibáñez'),('Chile Chico'),('Cochrane'),('Higgins'),('Tortel'),('Natales'),('Torres del Paine'),('Laguna Blanca'),('Punta Arenas'),
  ('Río Verde'),('San Gregorio'),('Porvenir'),('Primavera'),('Timaukel'),('Cabo de Hornos'),('Antártica');


INSERT INTO `fa_afp` (`cp_afp`, `atr_nombre`) VALUES (NULL, 'Capital'), (NULL, 'Cuprum'), (NULL, 'Habitat'), (NULL, 'Modelo'), (NULL, 'Planvital'), (NULL, 'Provida');



INSERT INTO `fa_cargo` (`cp_cargo`, `atr_nombre`, `atr_jefeDirecto`, `atr_lugarTrabajo`, `atr_jornadaTrabajo`, `atr_diasTrabajo`) VALUES (NULL, 'Ejecutivo de licitaciones publicas y privadas', 'Solanch Tejos Carrasco', 'Los servicios se prestarán en las dos sucursales de Hostal Plaza Maule Limitada ubicadas en 1 Sir 24 y media oriente N°3183 y 1 Sur 24 oriente N°3155 de la ciudad de Talca.', 'La jornada de trabajo será de 45 horas semanales, las que serán distribuidas de lunes a viernes, de la siguiente manera: jornada de la mañana de 09:00 horas a 14:00 horas, y en la jornada de la tarde de 15:00 horas a 19:00 horas.', 'De lunes a viernes de 09:00 hasta las 19:00 horas. Sábados de 09:00 a 14:00 horas'), (NULL, 'Recepcionista administrativa Rent A Car Maule', 'Diego Vargas, Miguel Vargas, Solanch Tejos', 'Los servicios se prestarán en las dos sucursales de Hostal Plaza Maule Limitada ubicadas en 1 Sir 24 y media oriente N°3183 y 1 Sur 24 oriente N°3155 de la ciudad de Talca.\', \'La jornada de trabajo será de 45 horas semanales, las que serán distribuidas de lunes a viernes, de la siguiente manera: jornada de la mañana de 09:00 horas a 14:00 horas, y en la jornada de la tarde de 15:00 horas a 19:00 horas.', 'La jornada de trabajo será de 45 horas semanales, las que serán distribuidas de lunes a viernes, de la siguiente manera: jornada de la mañana de 09:00 horas a 14:00 horas, y en la jornada de la tarde de 15:00 horas a 19:00 horas.', 'De lunes a viernes de 09:00 hasta las 19:00 horas. Sábados de 09:00 a 14:00 horas');


INSERT INTO `fa_remuneracion` (`cp_remuneracion`, `atr_sueldoMensual`, `atr_cotizaciones`, `atr_colacion`, `atr_movilizacion`, `atr_asistencia`, `cf_cargo`) VALUES (NULL, '301.000', '1', '25.000', '0', '15.000', '1'), (NULL, '600.000', '1', '23.000', '0', '67.000', '2');






INSERT INTO `fa_competencia` (`cp_competencia`, `atr_descripcion`) VALUES (NULL, 'Capacidad para aprender a manejar sistemas informáticos'), (NULL, 'Organizada y metódica'), (NULL, 'Capadidad para trabajar en equipo'), (NULL, 'Vocación de servicio, compromiso con el trabajo y la institución.'), (NULL, 'Habilidades en el lenguaje oral y escrito, tanto en fluidez como en claridad.'), (NULL, 'Buen racionamiento interpersonal.'), (NULL, 'Autodidacta y proactiva');

INSERT INTO `fa_competencia_cargo` (`cp_competencia_cargo`, `cf_cargo`, `cf_competencia`) VALUES (NULL, '1', '7'), (NULL, '1', '6'), (NULL, '1', '1'), (NULL, '1', '3'), (NULL, '1', '5'), (NULL, '1', '2'), (NULL, '1', '4');

INSERT INTO `fa_requisitominimo` (`cp_requisitominimo`, `atr_descripcion`) VALUES (NULL, 'Bachillerato en educación media, concluido.'), (NULL, 'Título universitaro de Ingeniero Comercial, Civil industrial, Ingeniero de ejecución en administración o similar.'), (NULL, 'Estudiante de carreras técnicas como administración de empresas y carreras afines.'), (NULL, 'Experiencia mínima de 6 meses en labores de análisis.'), (NULL, 'Disponibilidad inmediata.'), (NULL, 'Mayor de 25 años, menor de 40 años.');

INSERT INTO `fa_requisitominimo_cargo` (`cp_requisitominimo_cargo`, `cf_cargo`, `cf_requisitominimo`) VALUES (NULL, '1', '1'), (NULL, '1', '2'), (NULL, '1', '3'), (NULL, '1', '4'), (NULL, '1', '5'), (NULL, '1', '6');

INSERT INTO `fa_tarea` (`cp_tarea`, `atr_descripcion`) VALUES (NULL, 'Efectuar cotizaciones y preparar constantemente propuestas económicas para licitaciones.'), (NULL, 'Realizar levantamiento de información, comercial, financiera y técnica para analizar y preparar contratos y licitaciones.'), (NULL, 'Calcular tarifas para cada tipo de contrato.'), (NULL, 'Realizar gestión administrativa correspondiente a documentos requeridos para cerrar propuestas y levantar nuevos negocios.'), (NULL, 'Evaluar y completar anexos de licitaciones que se subirán.');

INSERT INTO `fa_tareas_cargo` (`cp_tareas_cargo`, `cf_cargo`, `cf_tarea`) VALUES (NULL, '1', '1'), (NULL, '1', '2'), (NULL, '1', '3'), (NULL, '1', '4'), (NULL, '1', '5');

INSERT INTO `fa_conocimiento` (`cp_conocimiento`, `atr_descripcion`) VALUES (NULL, 'Excelente redacción y ortografía pues deberá efectuar informes internos y propuestas para licitaciones.'), (NULL, 'Manejo de Microsoft office nivel avanzado (dominio de tablas dinámicas).'), (NULL, 'Manejo de indicadores financieros, tales como: UF, UTM, entre otros.'), (NULL, 'Evaluación de proyectos y gestión de base de datos.');

INSERT INTO `fa_conocimiento_cargo` (`cp_conocimiento_cargo`, `cf_cargo`, `cf_conocimiento`) VALUES (NULL, '1', '1'), (NULL, '1', '2'), (NULL, '1', '3'), (NULL, '1', '4');

INSERT INTO `fa_titulo` (`cp_titulo`, `atr_descripcion`, `cf_cargo`) VALUES (NULL, 'Tiempo de duración por licitación', '1');

INSERT INTO `fa_otrosantecedentes` (`cp_otrosantecedentes`, `atr_descripcion`, `cf_titulo`, `cf_cargo`) VALUES (NULL, 'En leer, revisar si va la licitación: 5 minutos', '1', '1'), (NULL, 'En subir la licitación: puede demorar entre medio día y una hora.', '1', '1');

INSERT INTO `fa_responsabilidad` (`cp_responsabilidad`, `atr_descripcion`, `cf_cargo`) VALUES (NULL, 'Revisar licitaciones públicas y privadas, subir o generar oferta de las mismas.', '1');

INSERT INTO `fa_empresa` (`cp_empresa`, `atr_nombre`, `atr_run`, `atr_representante`, `atr_cedula_representante`, `atr_domicilio`, `cf_ciudad`) VALUES (NULL, 'FIRMA ABOGADOS CHILE LIMITADA', '76.438.914-K', 'MIGUEL EDUARDO VARGAS GARRIDO', '17.886.328-2', '1 poniente 4 y 5 norte N° 1588', '177'), (NULL, 'MIGUEL VARGAS ESPINOSA E HIJOS LIMITADA', '76.849.793-1', 'DIEGO ANTONIO VARGAS GARRIDO', '18.891.594-9', '1 sur 24 1⁄2 oriente N° 3183', '177');

INSERT INTO `fa_estadoCivil` (`cp_estadoCivil`, `atr_nombre`) VALUES (NULL, 'Soltero/a.'), (NULL, 'Comprometido/a'), (NULL, 'Casado/a.'), (NULL, 'Separado/a.'), (NULL, 'Divorciado/a.'), (NULL, 'Viudo/a.'), (NULL, 'Unión libre o unión de hecho.');

INSERT INTO `fa_nacionalidad` (`cp_nacionalidad`, `atr_nombre`) VALUES (NULL, 'Chilena'), (NULL, 'Venezolana');

INSERT INTO `fa_prevision` (`cp_prevision`, `atr_nombre`) VALUES (NULL, 'Fonasa'), (NULL, 'Banmedica'), (NULL, 'Consalud');

INSERT INTO `fa_remuneracion_extra` (`cp_remuneracionExtra`, `atr_descripcion`, `cf_remuneracion`, `cf_cargo`) VALUES (NULL, '5% de licitación de la utilidad que deja la licitación.', '1', '1'), (NULL, 'Horas extras semanales', '2', '2');

INSERT INTO `fa_responsabilidad` (`cp_responsabilidad`, `atr_descripcion`, `cf_cargo`) VALUES (NULL, 'Recepción de vehículos', '2');

INSERT INTO `fa_sucursal` (`cp_sucursal`, `atr_nombre`, `cf_ciudad`) VALUES (NULL, 'Linares', '187'), (NULL, 'Talca', '177'), (NULL, 'Curico', '168');




INSERT INTO `fa_estado` (`cp_estado`, `atr_nombre`) VALUES (NULL, 'Contrato a plazo fijo'), (NULL, 'Contrato indefinido'), (NULL, 'Contrato por proyecto'), (NULL, 'Honorarios'), (NULL, 'Freelance');




INSERT INTO `fa_trabajador` (`cp_trabajador`, `atr_rut`, `atr_nombres`, `atr_apellidos`, `atr_direccion`, `atr_fechaNacimiento`, `cf_estado`, `cf_ciudad`, `cf_cargo`, `cf_sucursal`, `cf_nacionalidad`, `cf_estadoCivil`, `cf_afp`, `cf_prevision`, `cf_empresa`) VALUES (NULL, '18.656.816-8', 'ESTEFANY NICOL', 'VALLEJOS FONSECA', 'Villa los portones calle las obras N° 594', '12-01-1994', '1', '177', '1', '2', '1', '1', '1', '2', '1'), (NULL, '19.105.559-4', 'IGNACIO ANDRÉS', 'CIFUENTES DÍAZ', 'Camino a Colín, los Maitenes casa N°6', '14-07-1995', '1', '177', '2', '2', '1', '1', '1', '2', '2');

INSERT INTO `fa_requisitominimo` (`cp_requisitominimo`, `atr_descripcion`) VALUES (NULL, 'Manejo de GPS; aplicación de internet.'), (NULL, 'Manejo en direcciones según comuna.'), (NULL, 'Estar domiciliado al menos por mas de 1 año en la localidad del puesto de trabajo a postular.'), (NULL, 'Nociones básicas de operaciones(suma, resta, multiplicación y división).'), (NULL, 'Manejo de aplicación whatsapp, tal como enviar dirección, fotografías, compartir información solicitada.'), (NULL, 'Poseer un teléfono celular con internet y aplicación whatsapp.');



INSERT INTO `fa_items_contrato` (`cp_itemContrato`, `atr_nombre`) VALUES (NULL, 'Partes'), (NULL, 'Naturaleza de los servicios'), (NULL, 'Lugar de prestación de servicios'), (NULL, 'Jornada de trabajo'), (NULL, 'Remuneraciones'), (NULL, 'Duración de la relación jurídica laboral'), (NULL, 'Cláusula de vigencia'), (NULL, 'A tener en cuenta ');
INSERT INTO `fa_items_contrato` (`cp_itemContrato`, `atr_nombre`) VALUES (NULL, 'Cláusula de confidencialidad'), (NULL, 'Propiedad intelectual');






























INSERT INTO `fa_perfil` (`cp_perfil`, `atr_nombre`) VALUES (NULL, 'Administrador'), (NULL, 'Finanzas'), (NULL, 'Recursos Humanos');


INSERT INTO `fa_modulo` (`cp_modulo`, `atr_nombre`) VALUES (NULL, 'Mantenedor de cargos'), (NULL, 'Mantenedor de ciudades'), (NULL, 'Mantenedor de empresas'), (NULL, 'Mantenedor de estados civiles'), (NULL, 'Mantenedor de estados de contrato');
INSERT INTO `fa_modulo` (`cp_modulo`, `atr_nombre`) VALUES (NULL, 'Mantenedor de sucursales'), (NULL, 'Gestor de trabajadores'), (NULL, 'Mantenedor de nacionalidades'), (NULL, 'Mantenedor de previsiones de salud'), (NULL, 'Mantenedor de previsiones');
INSERT INTO `fa_modulo` (`cp_modulo`, `atr_nombre`) VALUES (NULL, 'Requisitos mínimos de perfil ocupacional'), (NULL, 'Funciones de perfil ocupacional'), (NULL, 'Competencias y características de perfil ocupacional'), (NULL, 'Conocimientos básicos de perfil ocupacional'), (NULL, 'Otros antecedentes de perfil ocupacional');
INSERT INTO `fa_modulo` (`cp_modulo`, `atr_nombre`) VALUES (NULL, 'Documentos de contratos'), (NULL, 'Documentos de transferencias'), (NULL, 'Documentos de cartas de amonestación'), (NULL, 'Documentos de perfiles ocupacionales');
INSERT INTO `fa_modulo` (`cp_modulo`, `atr_nombre`) VALUES (NULL, 'Generar anexo'), (NULL, 'Generar contrato'), (NULL, 'Historial de trabajadores'), (NULL, 'Dashboard');
INSERT INTO `fa_modulo` (`cp_modulo`, `atr_nombre`) VALUES (NULL, 'Mantenedor de usuarios');


INSERT INTO `fa_permiso` (`cp_permiso`, `atr_nombre`, `atr_descripcion`) VALUES (NULL, 'Ver', 'Ver listado'), (NULL, 'Editar', 'Editar información'), (NULL, 'Editar remuneración', 'Editar datos de remuneración'), (NULL, 'Crear', 'Crear'), (NULL, 'Exportar', 'Exportar listado');
INSERT INTO `fa_permiso` (`cp_permiso`, `atr_nombre`, `atr_descripcion`) VALUES (NULL, 'Eliminar', 'Eliminar información');
INSERT INTO `fa_permiso` (`cp_permiso`, `atr_nombre`, `atr_descripcion`) VALUES (NULL, 'Subir', 'Subir documento'), (NULL, 'Descargar', 'Descargar documento'), (NULL, 'Generar PDF', 'Generar anexo por prórroga'), (NULL, 'Generar PDF', 'Generar anexo por modificación de cláusula'), (NULL, 'Generar PDF', 'Generar anexo por horas extras');
INSERT INTO `fa_permiso` (`cp_permiso`, `atr_nombre`, `atr_descripcion`) VALUES (NULL, 'Generar PDF', 'Generar contrato estándar'), (NULL, 'Generar PDF', 'Generar contrato personalizado'), (NULL, 'Ver', 'Historial cronológico'), (NULL, 'Ver', 'Historial de contratos'), (NULL, 'Ver', 'Historial de anexos');
INSERT INTO `fa_permiso` (`cp_permiso`, `atr_nombre`, `atr_descripcion`) VALUES (NULL, 'Ver', 'Historial de transferencias'), (NULL, 'Ver', 'Historial de cartas de amonestación');
INSERT INTO `fa_permiso` (`cp_permiso`, `atr_nombre`, `atr_descripcion`) VALUES (NULL, 'Dashboard', 'Cantidad de contratos por tipo'), (NULL, 'Dashboard', 'Cantidad de transferencias por empresa'), (NULL, 'Dashboard', 'Listado de contratos por vencer');
INSERT INTO `fa_permiso` (`cp_permiso`, `atr_nombre`, `atr_descripcion`) VALUES (NULL, 'Generar PDF', 'Generar documento de perfil ocupacional');
INSERT INTO `fa_permiso` (`cp_permiso`, `atr_nombre`, `atr_descripcion`) VALUES (NULL, 'Crear', 'Agregar título de antecedente');
INSERT INTO `fa_permiso` (`cp_permiso`, `atr_nombre`, `atr_descripcion`) VALUES (NULL, 'Cambiar estado', 'Cambiar estado de usuario');

INSERT INTO `fa_usuario` (`cp_usuario`, `atr_nombre`, `atr_correo`, `atr_clave`,`atr_activo`, `cf_perfil`) VALUES (NULL, 'Administrador', 'administrador@grupofirma.cl', '1588', '1', '1');


INSERT INTO `fa_existencia_permiso` (`cp_existencia_permiso`, `cf_modulo`, `cf_permiso`) VALUES (NULL, '1', '1'), (NULL, '1', '2'), (NULL, '1', '3'), (NULL, '1', '4'), (NULL, '1', '5');
INSERT INTO `fa_existencia_permiso` (`cp_existencia_permiso`, `cf_modulo`, `cf_permiso`) VALUES (NULL, '2', '1'), (NULL, '2', '4'), (NULL, '2', '5');
INSERT INTO `fa_existencia_permiso` (`cp_existencia_permiso`, `cf_modulo`, `cf_permiso`) VALUES (NULL, '3', '1'), (NULL, '3', '4'), (NULL, '3', '2'), (NULL, '3', '5');
INSERT INTO `fa_existencia_permiso` (`cp_existencia_permiso`, `cf_modulo`, `cf_permiso`) VALUES (NULL, '4', '1'), (NULL, '4', '4'), (NULL, '4', '5');
INSERT INTO `fa_existencia_permiso` (`cp_existencia_permiso`, `cf_modulo`, `cf_permiso`) VALUES (NULL, '5', '1'), (NULL, '5', '2'), (NULL, '5', '4'), (NULL, '5', '5');
INSERT INTO `fa_existencia_permiso` (`cp_existencia_permiso`, `cf_modulo`, `cf_permiso`) VALUES (NULL, '8', '1'), (NULL, '8', '2'), (NULL, '8', '4'), (NULL, '8', '5');
INSERT INTO `fa_existencia_permiso` (`cp_existencia_permiso`, `cf_modulo`, `cf_permiso`) VALUES (NULL, '9', '1'), (NULL, '9', '2'), (NULL, '9', '4'), (NULL, '9', '5');
INSERT INTO `fa_existencia_permiso` (`cp_existencia_permiso`, `cf_modulo`, `cf_permiso`) VALUES (NULL, '10', '1'), (NULL, '10', '2'), (NULL, '10', '4'), (NULL, '10', '5');
INSERT INTO `fa_existencia_permiso` (`cp_existencia_permiso`, `cf_modulo`, `cf_permiso`) VALUES (NULL, '6', '1'), (NULL, '6', '4'), (NULL, '6', '5');
INSERT INTO `fa_existencia_permiso` (`cp_existencia_permiso`, `cf_modulo`, `cf_permiso`) VALUES (NULL, '7', '1'), (NULL, '7', '2'), (NULL, '7', '4'), (NULL, '7', '5');
INSERT INTO `fa_existencia_permiso` (`cp_existencia_permiso`, `cf_modulo`, `cf_permiso`) VALUES (NULL, '11', '1'), (NULL, '11', '4'), (NULL, '11', '6');
INSERT INTO `fa_existencia_permiso` (`cp_existencia_permiso`, `cf_modulo`, `cf_permiso`) VALUES (NULL, '12', '1'), (NULL, '12', '4'), (NULL, '12', '6');
INSERT INTO `fa_existencia_permiso` (`cp_existencia_permiso`, `cf_modulo`, `cf_permiso`) VALUES (NULL, '13', '1'), (NULL, '13', '4'), (NULL, '13', '6');
INSERT INTO `fa_existencia_permiso` (`cp_existencia_permiso`, `cf_modulo`, `cf_permiso`) VALUES (NULL, '14', '1'), (NULL, '14', '4'), (NULL, '14', '6');
INSERT INTO `fa_existencia_permiso` (`cp_existencia_permiso`, `cf_modulo`, `cf_permiso`) VALUES (NULL, '15', '1'), (NULL, '15', '4'), (NULL, '15', '6'), (NULL, '15', '23');
INSERT INTO `fa_existencia_permiso` (`cp_existencia_permiso`, `cf_modulo`, `cf_permiso`) VALUES (NULL, '16', '1'), (NULL, '16', '7'), (NULL, '16', '8');
INSERT INTO `fa_existencia_permiso` (`cp_existencia_permiso`, `cf_modulo`, `cf_permiso`) VALUES (NULL, '17', '1'), (NULL, '17', '7'), (NULL, '17', '8');
INSERT INTO `fa_existencia_permiso` (`cp_existencia_permiso`, `cf_modulo`, `cf_permiso`) VALUES (NULL, '18', '1'), (NULL, '18', '7'), (NULL, '18', '8');
INSERT INTO `fa_existencia_permiso` (`cp_existencia_permiso`, `cf_modulo`, `cf_permiso`) VALUES (NULL, '19', '1'), (NULL, '19', '22');
INSERT INTO `fa_existencia_permiso` (`cp_existencia_permiso`, `cf_modulo`, `cf_permiso`) VALUES (NULL, '20', '9'), (NULL, '20', '10'), (NULL, '20', '11');
INSERT INTO `fa_existencia_permiso` (`cp_existencia_permiso`, `cf_modulo`, `cf_permiso`) VALUES (NULL, '21', '12'), (NULL, '21', '13');
INSERT INTO `fa_existencia_permiso` (`cp_existencia_permiso`, `cf_modulo`, `cf_permiso`) VALUES (NULL, '22', '14'), (NULL, '22', '15'), (NULL, '22', '16'), (NULL, '22', '17'), (NULL, '22', '18');
INSERT INTO `fa_existencia_permiso` (`cp_existencia_permiso`, `cf_modulo`, `cf_permiso`) VALUES (NULL, '23', '19'), (NULL, '23', '20'), (NULL, '23', '21');
INSERT INTO `fa_existencia_permiso` (`cp_existencia_permiso`, `cf_modulo`, `cf_permiso`) VALUES (NULL, '24', '1'), (NULL, '24', '4'), (NULL, '24', '24'), (NULL, '24', '2'), (NULL, '24', '5');
