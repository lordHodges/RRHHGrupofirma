drop database fa_rrhh;
create database fa_rrhh;
use fa_rrhh;

create table fa_estado(
    cp_estado int auto_increment,
    atr_nombre varchar(100),
    constraint pk_estado primary key(cp_estado)
);

create table fa_nacionalidad(
    cp_nacionalidad int auto_increment,
    atr_nombre varchar(100),
    constraint pk_nacionalidad primary key(cp_nacionalidad)
);

create table fa_estadoCivil(
    cp_estadoCivil int auto_increment,
    atr_nombre varchar(100),
    constraint pk_estadoCivil primary key(cp_estadoCivil)
);

create table fa_afp(
    cp_afp int auto_increment,
    atr_nombre varchar(100),
    constraint pk_afp primary key(cp_afp)
);

create table fa_prevision(
    cp_prevision int auto_increment,
    atr_nombre varchar(100),
    constraint pk_prevision primary key(cp_prevision)
);

create table fa_ciudad(
    cp_ciudad int auto_increment,
    atr_nombre varchar(100),
    constraint pk_ciudad primary key(cp_ciudad)
);

create table fa_remuneracion(
    cp_remuneracion int auto_increment,
    atr_sueldo varchar(100),
    atr_cotizaciones int,
    constraint pk_remuneracion primary key(cp_remuneracion)
);


create table fa_empresa(
    cp_empresa int auto_increment,
    atr_nombre varchar(100),
    atr_run varchar(50),
    atr_representante varchar(100),
    atr_cedula_representante varchar(50),
    atr_domicilio varchar(100),
    cf_ciudad int,
    constraint pk_empresa primary key(cp_empresa),
    constraint fk_empresa_ciudad foreign key(cf_ciudad) references fa_ciudad(cp_ciudad)
);


create table fa_sucursal(
    cp_sucursal int auto_increment,
    atr_nombre varchar(100),
    cf_ciudad int,
    constraint pk_sucursal primary key(cp_sucursal),
    constraint fk_sucursal_ciudad foreign key(cf_ciudad) references fa_ciudad(cp_ciudad)
);

create table fa_cargo(
    cp_cargo int auto_increment,
    atr_nombre varchar(100) unique,
    atr_jefeDirecto varchar(200),
    atr_lugarTrabajo varchar(200),
    atr_jornadaTrabajo varchar(200),
    atr_diasTrabajo varchar(200),
    constraint pk_cargo primary key(cp_cargo)
);

create table fa_tarea(
    cp_tarea int auto_increment,
    atr_descripcion varchar(500) unique not null,
    constraint pk_tarea primary key(cp_tarea)
);



create table fa_requisitominimo(
    cp_requisitominimo int auto_increment,
    atr_descripcion varchar(500) unique not null,
    constraint pk_requisitominimo primary key(cp_requisitominimo)
);



create table fa_competencia(
    cp_competencia int auto_increment,
    atr_descripcion varchar(500) unique not null,
    constraint pk_competencia primary key(cp_competencia)
);

create table fa_conocimiento(
    cp_conocimiento int auto_increment,
    atr_descripcion varchar(500) unique not null,
    constraint pk_conocimiento primary key(cp_conocimiento)
);

create table fa_titulo(
    cp_titulo int auto_increment,
    atr_descripcion varchar(500) unique not null,
    cf_cargo int,
    constraint pk_titulo primary key(cp_titulo),
    constraint fk_titulo_cargo foreign key(cf_cargo) references fa_cargo(cp_cargo)
);

create table fa_otrosantecedentes(
    cp_otrosantecedentes int auto_increment,
    atr_descripcion varchar(500) unique not null,
    cf_titulo int,
    cf_cargo int,
    constraint pk_titulo primary key(cp_otrosantecedentes),
    constraint fk_otrosantecedentes_titulo  foreign key(cf_titulo) references fa_titulo(cp_titulo),
    constraint fk_otrosantecedentes_cargo  foreign key(cf_cargo) references fa_cargo(cp_cargo)
);

create table fa_responsabilidad(
    cp_responsabilidad int auto_increment,
    atr_descripcion varchar(500) not null,
    cf_cargo int not null,
    constraint pk_responsabilidad primary key(cp_responsabilidad),
    constraint fk_responsabilidad_cargo foreign key(cf_cargo) references fa_cargo(cp_cargo)
);

-- create table fa_remuneraciones(
--     cp_remuneraciones int auto_increment,
--     atr_descripcion varchar(500) not null,
--     cf_cargo int not null,
--     constraint pk_responsabilidad primary key(cp_responsabilidad),
--     constraint fk_responsabilidad_cargo foreign key(cf_cargo) references fa_cargo(cp_cargo)
-- );


create table fa_trabajador(
    cp_trabajador int auto_increment,
    atr_rut varchar(20),
    atr_nombres varchar(50),
    atr_apellidos varchar(50),
    atr_direccion varchar(100),
    atr_fechaNacimiento varchar(20),
    cf_estado int,
    cf_ciudad int,
    cf_cargo int,
    cf_sucursal int,
    cf_nacionalidad int,
    cf_estadoCivil int,
    cf_afp int,
    cf_prevision int,
    cf_empresa int,
    constraint cp_trabajador primary key(cp_trabajador),
    constraint fk_trabajador_estado foreign key(cf_estado) references fa_estado(cp_estado),
    constraint fk_trabajador_ciudad foreign key(cf_ciudad) references fa_ciudad(cp_ciudad),
    constraint fk_trabajador_cargo foreign key(cf_cargo) references fa_cargo(cp_cargo),
    constraint fk_trabajador_sucursal foreign key(cf_sucursal) references fa_sucursal(cp_sucursal),
    constraint fk_trabajador_nacionalidad foreign key(cf_nacionalidad) references fa_nacionalidad(cp_nacionalidad),
    constraint fk_trabajador_estadoCivil foreign key(cf_estadoCivil) references fa_estadoCivil(cp_estadoCivil),
    constraint fk_trabajador_afp foreign key(cf_afp) references fa_afp(cp_afp),
    constraint fk_trabajador_prevision foreign key(cf_prevision) references fa_prevision(cp_prevision),
    constraint fk_trabajador_empresa foreign key(cf_empresa) references fa_empresa(cp_empresa)
);


create table fa_conocimiento_cargo(
    cp_conocimiento_cargo int auto_increment,
    cf_cargo int not null,
    cf_conocimiento int not null,
    constraint cp_conocimiento_cargo primary key(cp_conocimiento_cargo),
    constraint fk_conocimientocargo_cargo foreign key(cf_cargo) references fa_cargo(cp_cargo),
    constraint fk_conocimientocargo_conocimiento foreign key(cf_conocimiento) references fa_conocimiento(cp_conocimiento)
);

create table fa_tareas_cargo(
    cp_tareas_cargo int auto_increment,
    cf_cargo int not null,
    cf_tarea int not null,
    constraint cp_tareascargo primary key(cp_tareas_cargo),
    constraint fk_tareascargo_cargo foreign key(cf_cargo) references fa_cargo(cp_cargo),
    constraint fk_tareascargo_tarea foreign key(cf_tarea) references fa_tarea(cp_tarea)
);

create table fa_requisitominimo_cargo(
    cp_requisitominimo_cargo int auto_increment,
    cf_cargo int not null,
    cf_requisitominimo int not null,
    constraint cp_requisitominimo_cargo primary key(cp_requisitominimo_cargo),
    constraint fk_requsitominimo_cargo_cargo foreign key(cf_cargo) references fa_cargo(cp_cargo),
    constraint fk_requisitominimo_cargo_requisitominimo foreign key(cf_requisitominimo) references fa_requisitominimo(cp_requisitominimo)
);

create table fa_competencia_cargo(
    cp_competencia_cargo int auto_increment,
    cf_cargo int not null,
    cf_competencia int not null,
    constraint cp_competencia_cargo primary key(cp_competencia_cargo),
    constraint fk_competencia_cargo_cargo foreign key(cf_cargo) references fa_cargo(cp_cargo),
    constraint fk_competencia_cargo_competencia foreign key(cf_competencia) references fa_competencia(cp_competencia)
);


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


INSERT INTO `fa_cargo` (`cp_cargo`, `atr_nombre`, `atr_jefeDirecto`, `atr_lugarTrabajo`, `atr_jornadaTrabajo`) VALUES (NULL, 'Auxiliar de aseo, día domingo', 'Teresa Garrido, Miguel Vargas', '1 sur, 24 oriente #3155, Hostal Plaza Maule', '08:00 horas a 22:00 horas'), (NULL, 'Cartero', 'Evelyn Gallegos, Nelvis Vilalobos', NULL, '9 a 13:30 horas');
INSERT INTO `fa_cargo` (`cp_cargo`, `atr_nombre`, `atr_jefeDirecto`, `atr_lugarTrabajo`, `atr_jornadaTrabajo`) VALUES (NULL, 'Ejecutivo de licitaciones publicas y privadas', 'Solanch Tejos Carrasco', NULL, 'horario de mañana: 9 a 13:00 horas, horario de tarde: 14:00 a 19:00 horas');

INSERT INTO `fa_sucursal` (`cp_sucursal`, `atr_nombre`, `cf_ciudad`) VALUES (NULL, 'Sucursal 1', '97'), (NULL, 'Sucursal 2', '120');

INSERT INTO `fa_estadocivil` (`cp_estadoCivil`, `atr_nombre`) VALUES (NULL, 'Soltero'), (NULL, 'Casado');

INSERT INTO `fa_afp` (`cp_afp`, `atr_nombre`) VALUES (NULL, 'Capital'), (NULL, 'Plan Vital'), (NULL, 'Modelo');

INSERT INTO `fa_estado` (`cp_estado`, `atr_nombre`) VALUES (NULL, 'Contrato a plazo fijo'), (NULL, 'Contrato indefinido'), (NULL, 'Honorarios'), (NULL, 'Término de contrato'), (NULL, 'Despedido');

INSERT INTO `fa_prevision` (`cp_prevision`, `atr_nombre`) VALUES (NULL, 'Fonasa'), (NULL, 'Isapre');

INSERT INTO `fa_nacionalidad` (`cp_nacionalidad`, `atr_nombre`) VALUES (NULL, 'Chilena'), (NULL, 'Venezolana');

INSERT INTO `fa_empresa` (`cp_empresa`, `atr_nombre`, `atr_run`, `atr_representante`, `atr_cedula_representante`, `atr_domicilio`, `cf_ciudad`) VALUES (NULL, 'FIRMA ABOGADOS CHILE LIMITADA', '76.438.914-K', 'MIGUEL EDUARDO VARGAS GARRIDO', '17.886.328-2', '1 Poniente 4 y 5 Norte 1588', '177'), (NULL, 'MIGUEL VARGAS ESPINOSA E HIJOS LIMITADA,', '76.849.793-1', 'DIEGO ANTONIO VARGAS GARRIDO', '18.891.594-9,', '1 Sur 24 y media oriente 3183', '177');

INSERT INTO `fa_trabajador` (`cp_trabajador`, `atr_rut`, `atr_nombres`, `atr_apellidos`, `atr_direccion`, `atr_fechaNacimiento`, `cf_estado`, `cf_ciudad`, `cf_cargo`, `cf_sucursal`, `cf_nacionalidad`, `cf_estadoCivil`, `cf_afp`, `cf_prevision`, `cf_empresa`) VALUES (NULL, '19.105.191-2', 'CATERIN ALEXANDRA', 'MORALES DIAZ', '34 Y MEDIA ORIENTE CON 8 SUR', '18-05-1995', '1', '97', '2', '1', '1', '1', '3', '1','1'), (NULL, '11.060.070-4', 'ISABEL MARGARITA', 'DIAZ CASTRO', '34 Y MEDIA ORIENTE', '26-02-1966', '2', '68', '3', '1', '2', '2', '1', '2','2');

INSERT INTO `fa_tarea` (`cp_tarea`, `atr_descripcion`) VALUES (NULL, 'Agendar y recordar las citas de clientes y tareas de abogados en Case Tracking.'), (NULL, 'Actualizar los movimientos de las causas diariamente.');
INSERT INTO `fa_tarea` (`cp_tarea`, `atr_descripcion`) VALUES (NULL, 'Desarrollar software para la empresa o externos.'), (NULL, 'Realizar mantenimiento a sistemas funcionando en la empresa contratante.');

INSERT INTO `fa_tareas_cargo` (`cp_tareas_cargo`, `cf_cargo`, `cf_tarea`) VALUES (NULL, '3', '2'), (NULL, '3', '1');
INSERT INTO `fa_tareas_cargo` (`cp_tareas_cargo`, `cf_cargo`, `cf_tarea`) VALUES (NULL, '2', '3'), (NULL, '2', '4');

INSERT INTO `fa_requisitominimo` (`cp_requisitominimo`, `atr_descripcion`) VALUES (NULL, 'Bachillerato en educación media, concluido.'), (NULL, 'Manejo en GPS; aplicación de internet.');

INSERT INTO `fa_requisitominimo_cargo` (`cp_requisitominimo_cargo`, `cf_cargo`, `cf_requisitominimo`) VALUES (NULL, '2', '2'), (NULL, '1', '1');
INSERT INTO `fa_requisitominimo_cargo` (`cp_requisitominimo_cargo`, `cf_cargo`, `cf_requisitominimo`) VALUES (NULL, '2', '1');

INSERT INTO `fa_competencia` (`cp_competencia`, `atr_descripcion`) VALUES (NULL, 'Buen relacionamiento interpersonal'), (NULL, 'Puntual');
INSERT INTO `fa_competencia_cargo` (`cp_competencia_cargo`, `cf_cargo`, `cf_competencia`) VALUES (NULL, '2', '1'), (NULL, '2', '2');

INSERT INTO `fa_conocimiento` (`cp_conocimiento`, `atr_descripcion`) VALUES (NULL, 'Excelente redacción y ortografía pues deberá efectuar informes internos y propuestas para licitaciones.'), (NULL, 'Manejo de microsoft office nivel avanzado (dominio de tabla dinámicas).');
INSERT INTO `fa_conocimiento_cargo` (`cp_conocimiento_cargo`, `cf_cargo`, `cf_conocimiento`) VALUES (NULL, '2', '1'), (NULL, '2', '2');
INSERT INTO `fa_conocimiento_cargo` (`cp_conocimiento_cargo`, `cf_cargo`, `cf_conocimiento`) VALUES (NULL, '1', '2');


INSERT INTO `fa_titulo` (`cp_titulo`, `atr_descripcion`,`cf_cargo`) VALUES (NULL, 'Otros antecedentes','2'), (NULL, 'Tiempo de duración por licitación','3');
INSERT INTO `fa_otrosantecedentes` (`cp_otrosantecedentes`, `atr_descripcion`, `cf_titulo`, `cf_cargo`) VALUES (NULL, 'En doblar y sellar 50 cartas: 60 minutos.', '2', '3'), (NULL, 'Capacidad de orden, análisis y toma de desiciones en beneficio del correcto manejo y uso de los dineros de la empresa.', '1', '2');
