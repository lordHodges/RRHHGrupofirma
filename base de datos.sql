drop database fa_rrhh;
create database fa_rrhh;
use fa_rrhh;

create table fa_estado(
    cp_estado int auto_increment,
    atr_nombre varchar(100) not null,
    constraint pk_estado primary key(cp_estado)
);

create table fa_nacionalidad(
    cp_nacionalidad int auto_increment,
    atr_nombre varchar(100) not null,
    constraint pk_nacionalidad primary key(cp_nacionalidad)
);

create table fa_estadoCivil(
    cp_estadoCivil int auto_increment,
    atr_nombre varchar(100) not null,
    constraint pk_estadoCivil primary key(cp_estadoCivil)
);

create table fa_afp(
    cp_afp int auto_increment,
    atr_nombre varchar(100) not null,
    constraint pk_afp primary key(cp_afp)
);

create table fa_prevision(
    cp_prevision int auto_increment,
    atr_nombre varchar(100) not null,
    constraint pk_prevision primary key(cp_prevision)
);

create table fa_ciudad(
    cp_ciudad int auto_increment,
    atr_nombre varchar(100) not null,
    constraint pk_ciudad primary key(cp_ciudad)
);

create table fa_empresa(
    cp_empresa int auto_increment,
    atr_nombre varchar(100) not null,
    atr_run varchar(50) not null unique,
    atr_representante varchar(100) not null,
    atr_cedula_representante varchar(50) not null,
    atr_domicilio varchar(100) not null,
    cf_ciudad int,
    constraint pk_empresa primary key(cp_empresa),
    constraint fk_empresa_ciudad foreign key(cf_ciudad) references fa_ciudad(cp_ciudad)
);


create table fa_sucursal(
    cp_sucursal int auto_increment,
    atr_nombre varchar(100) not null,
    cf_ciudad int,
    constraint pk_sucursal primary key(cp_sucursal),
    constraint fk_sucursal_ciudad foreign key(cf_ciudad) references fa_ciudad(cp_ciudad)
);

create table fa_cargo(
    cp_cargo int auto_increment,
    atr_nombre varchar(100) not null unique,
    atr_jefeDirecto varchar(200) not null,
    atr_lugarTrabajo varchar(200),
    atr_jornadaTrabajo varchar(200),
    atr_diasTrabajo varchar(200),
    constraint pk_cargo primary key(cp_cargo)
);

create table fa_remuneracion(
    cp_remuneracion int auto_increment,
    atr_sueldoMensual varchar(100) not null,
    atr_cotizaciones varchar(100) not null,
    atr_colacion varchar(100) not null,
    atr_movilizacion varchar(100) not null,
    cf_cargo int,
    constraint pk_remuneracion primary key(cp_remuneracion),
    constraint fk_remuneracion_cargo foreign key(cf_cargo) references fa_cargo(cp_cargo)
);

create table fa_remuneracion_extra(
    cp_remuneracionExtra int auto_increment,
    atr_descripcion varchar(200) not null,
    cf_remuneracion int,
    cf_cargo int,
    constraint pk_remuneracionExtra primary key(cp_remuneracionExtra),
    constraint fk_remunercionExtra_remuneracion foreign key(cf_remuneracion) references fa_remuneracion(cp_remuneracion),
    constraint fk_remunercionExtra_cargo foreign key(cf_cargo) references fa_cargo(cp_cargo)
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

create table fa_trabajador(
    cp_trabajador int auto_increment,
    atr_rut varchar(20) not null unique,
    atr_nombres varchar(50) not null,
    atr_apellidos varchar(50) not null,
    atr_direccion varchar(100),
    atr_fechaNacimiento varchar(10),
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






create table fa_items_contrato(
    cp_itemContrato int auto_increment,
    atr_nombre varchar(100),
    constraint cp_itemContrato primary key(cp_itemContrato)
);

create table fa_descripcion_item(
    cp_descripcionItem int auto_increment,
    atr_descripcion varchar(1000),
    atr_posicionItem int,
    cf_itemContrato int,
    cf_cargo int,
    constraint cp_descripcionItem primary key(cp_descripcionItem),
    constraint fk_descripcionItem_cargo foreign key(cf_cargo) references fa_cargo(cp_cargo),
    constraint fk_descripcionItem_itemContrato foreign key(cf_itemContrato) references fa_items_contrato(cp_itemContrato)
);






create table fa_contrato(
    cp_contrato varchar(200),
    atr_fechaInicio varchar(10),
    atr_fechaTermino varchar(10),
    cf_cargo int,
    cf_trabajador int,
    constraint cp_contrato primary key(cp_contrato),
    constraint fk_contrato_cargo foreign key(cf_cargo) references fa_cargo(cp_cargo),
    constraint fk_contrato_trabajador foreign key(cf_trabajador) references fa_trabajador(cp_trabajador)
);

create table fa_documento(
    cp_documento int auto_increment,
    atr_nombreDoc varchar(200),
    atr_nombreReal varchar(200) not null,
    atr_ruta varchar(200) not null,
    atr_fechaCarga varchar(20) not null,
    cf_contrato varchar(200),
    constraint cp_documento primary key(cp_documento),
    constraint fk_documento_contrato foreign key(cf_contrato) references fa_contrato(cp_contrato)
);
