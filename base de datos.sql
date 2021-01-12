drop database fa_rrhh;
create database fa_rrhh;
use fa_rrhh;


create table fa_tipovehiculo(
  cp_tipovehiculo int auto_increment,
  atr_descripcion varchar (200),
  constraint pk_tipovehiculo primary key(cp_tipovehiculo)
);

create table fa_marca(
  cp_marca int auto_increment,
  atr_descripcion varchar (200),
  constraint pk_marca primary key(cp_marca)
);

create table fa_modelo(
  cp_modelo int auto_increment,
  atr_descripcion varchar(100),
  cf_marca int,
  constraint pk_modelo primary key(cp_modelo),
  constraint fk_modelo_marca foreign key(cf_marca) references fa_marca(cp_marca)
);

create table fa_vehiculos(
  cp_vehiculo int auto_increment,
  atr_patente varchar(100) unique,
  atr_ano int,
  atr_color varchar(100),
  cf_tipo int,
  cf_marca int,
  cf_modelo int,
  constraint pk_vehiculo primary key(cp_vehiculo),
  constraint fk_vehiculo_tipo foreign key(cf_tipo) references fa_tipovehiculo(cp_tipovehiculo),
  constraint fk_vehiculo_marca foreign key(cf_marca) references fa_marca(cp_marca),
  constraint fk_vehiculo_modelo foreign key(cf_modelo) references fa_modelo(cp_modelo)
);

create table fa_banco(
    cp_banco int auto_increment,
    atr_nombre varchar (200),
    atr_sitio varchar(200),
    constraint pk_banco primary key(cp_banco)
);

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
    atr_jefeDirecto varchar(200),
    atr_lugarTrabajo varchar(5000) not null,
    atr_jornadaTrabajo varchar(5000) not null,
    atr_diasTrabajo varchar(2000),
    cf_sucursal int,
    constraint pk_cargo primary key(cp_cargo),
    constraint fk_cargo_sucursal foreign key(cf_sucursal) references fa_sucursal(cp_sucursal)
);

create table fa_remuneracion(
    cp_remuneracion int auto_increment,
    atr_sueldoMensual varchar(100) not null,
    atr_cotizaciones varchar(100) not null,
    atr_colacion varchar(100) not null,
    atr_movilizacion varchar(100) not null,
    atr_asistencia varchar(100) not null,
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


create table fa_hdescuentos(
	cp_hdescuentos int auto_increment,
	atr_dhdescuentos varchar(200) not null,
	atr_tipo varchar(50),
	atr_imponible varchar(50),
	atr_tributable varchar(50),
	atr_gratificable varchar(50),
	atr_fijo varchar(50),
	atr_variable varchar(50),
	atr_semcorrida varchar(50),
  cf_remuneracion int,
	constraint pk_hdescuentos primary key(cp_hdescuentos),
	constraint fk_hdescuentos_remuneracion foreign key(cf_remuneracion) references fa_remuneracion(cp_remuneracion)
);

create table fa_tarea(
    cp_tarea int auto_increment,
    atr_descripcion varchar(200) unique not null,
    constraint pk_tarea primary key(cp_tarea)
);



create table fa_requisitominimo(
    cp_requisitominimo int auto_increment,
    atr_descripcion varchar(200) unique not null,
    constraint pk_requisitominimo primary key(cp_requisitominimo)
);



create table fa_competencia(
    cp_competencia int auto_increment,
    atr_descripcion varchar(200) unique not null,
    constraint pk_competencia primary key(cp_competencia)
);

create table fa_conocimiento(
    cp_conocimiento int auto_increment,
    atr_descripcion varchar(200) unique not null,
    constraint pk_conocimiento primary key(cp_conocimiento)
);

create table fa_titulo(
    cp_titulo int auto_increment,
    atr_descripcion varchar(200) unique not null,
    cf_cargo int,
    constraint pk_titulo primary key(cp_titulo),
    constraint fk_titulo_cargo foreign key(cf_cargo) references fa_cargo(cp_cargo)
);

create table fa_otrosantecedentes(
    cp_otrosantecedentes int auto_increment,
    atr_descripcion varchar(200) unique not null,
    cf_titulo int,
    cf_cargo int,
    constraint pk_titulo primary key(cp_otrosantecedentes),
    constraint fk_otrosantecedentes_titulo  foreign key(cf_titulo) references fa_titulo(cp_titulo),
    constraint fk_otrosantecedentes_cargo  foreign key(cf_cargo) references fa_cargo(cp_cargo)
);

create table fa_responsabilidad(
    cp_responsabilidad int auto_increment,
    atr_descripcion varchar(200) not null,
    cf_cargo int not null,
    constraint pk_responsabilidad primary key(cp_responsabilidad),
    constraint fk_responsabilidad_cargo foreign key(cf_cargo) references fa_cargo(cp_cargo)
);

create table fa_proyecto(
    cp_proyecto int auto_increment,
    atr_descripcion varchar(200) not null,
    atr_fechaInicio varchar(100) not null,
    atr_fechaTermino varchar(100) not null,
    constraint pk_proyecto primary key(cp_proyecto)
);

create table fa_trabajador(
    cp_trabajador int auto_increment,
    atr_rut varchar(20) not null unique,
    atr_nombres varchar(50) not null,
    atr_apellidos varchar(50) not null,
    atr_direccion varchar(100),
    atr_fechaNacimiento varchar(10),
    atr_sueldo int,
    cf_proyecto int,
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
    constraint fk_trabajador_empresa foreign key(cf_empresa) references fa_empresa(cp_empresa),
    constraint fk_trabajador_proyecto foreign key(cf_proyecto) references fa_proyecto(cp_proyecto)
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

create table fa_transferencia (
	cp_transferencia varchar(200) unique,
  atr_fecha varchar(200),
  atr_monto varchar(200),
  cf_trabajador int,
  cf_banco int,
  constraint pk_transferencia PRIMARY KEY (cp_transferencia),
  constraint fk_transferencia_trabajador foreign key(cf_trabajador) references fa_trabajador(cp_trabajador),
  constraint fk_transferencia_banco foreign key(cf_banco) references fa_banco(cp_banco)
);

create table fa_cartaamonestacion(
    cp_cartaAmonestacion varchar(200) unique,
    atr_motivo varchar(200),
    atr_grado varchar(200),
    atr_fecha varchar(200),
    cf_trabajador int,
    constraint pk_cartaAmonestacion primary key(cp_cartaAmonestacion),
    constraint fk_cartaAmonestacion_trabajador foreign key(cf_trabajador) references fa_trabajador(cp_trabajador)
);


create table fa_anexo (
	cp_anexo varchar(200) unique,
  atr_fechaDesde varchar(200),
  atr_fechaHasta varchar(200),
  atr_motivo varchar(200),
  cf_trabajador int,
  constraint pk_anexo PRIMARY KEY (cp_anexo),
  constraint fk_anexo_trabajador foreign key(cf_trabajador) references fa_trabajador(cp_trabajador)
);


create table fa_liquidacion (
  cp_liquidacion varchar(200) unique,
  atr_fecha varchar(200),
  atr_totalHaberes int,
  atr_totalDescuentos int,
  atr_alcanceLiquido int,
  cf_trabajador int,
  constraint pk_liquidacion PRIMARY KEY (cp_liquidacion),
  constraint fk_liquidacion_trabajador foreign key(cf_trabajador) references fa_trabajador(cp_trabajador)
);

create table fa_cartaAviso (
  cp_cartaAviso varchar(200) unique,
  atr_fecha varchar(200),
  atr_motivo int,
  cf_trabajador int,
  constraint pk_cartaAviso PRIMARY KEY (cp_cartaAviso),
  constraint fk_cartaAviso_trabajador foreign key(cf_trabajador) references fa_trabajador(cp_trabajador)
);

create table fa_finiquito (
  cp_finiquito varchar(200) unique,
  atr_fecha varchar(200),
  atr_total int,
  cf_trabajador int,
  constraint pk_finiquito PRIMARY KEY (cp_finiquito),
  constraint fk_finiquito_trabajador foreign key(cf_trabajador) references fa_trabajador(cp_trabajador)
);

create table fa_documento(
    cp_documento int auto_increment,
    atr_nombreDoc varchar(200),
    atr_nombreReal varchar(200) not null,
    atr_ruta varchar(200) not null,
    atr_fechaCarga varchar(20) not null,
    atr_tipo varchar(200) not null,
    atr_fechacronologica varchar(200),
    cf_contrato varchar(200),
    cf_anexo varchar(200),
    cf_transferencia varchar(200),
    cf_cartaamonestacion varchar(200),
    cf_liquidacion varchar(200),
    cf_finiquito varchar(200),
    cf_cartaAviso varchar(200),
    cf_trabajador int,
    constraint cp_documento primary key(cp_documento),
    constraint fk_documento_contrato foreign key(cf_contrato) references fa_contrato(cp_contrato),
    constraint fk_documento_anexo foreign key(cf_anexo) references fa_anexo(cp_anexo),
    constraint fk_documento_trabajador foreign key(cf_trabajador) references fa_trabajador(cp_trabajador),
    constraint fk_documento_transferencia foreign key(cf_transferencia) references fa_transferencia(cp_transferencia),
    constraint fk_documento_cartaamonestacion foreign key(cf_cartaamonestacion) references fa_cartaamonestacion(cp_cartaAmonestacion),
    constraint fk_documento_finiquito foreign key(cf_finiquito) references fa_finiquito(cp_finiquito),
    constraint fk_documento_liquidacion foreign key(cf_liquidacion) references fa_liquidacion(cp_liquidacion),
    constraint fk_documento_cartaAviso foreign key(cf_cartaAviso) references fa_cartaAviso(cp_cartaAviso)
);



create table fa_manipularAnexos(
    cp_manipular int auto_increment,
    atr_numRomano varchar(10),
    atr_item varchar(100),
    atr_descripcion varchar(2000),
    atr_fecha varchar(100),
    cf_trabajador int,
    constraint pk_manipularAnexos primary key(cp_manipular),
    constraint fk_manipularAnexos_trabajador foreign key(cf_trabajador) references fa_trabajador(cp_trabajador)
);



create table fa_prestamo(
  cp_prestamo int auto_increment,
  atr_montoTotal int,
  atr_fechaPrestamo varchar(100),
  atr_cantidadCuotas int,
  atr_autoriza varchar(200),
  atr_observacion varchar(200),
  cf_trabajador int,
  constraint pk_prestamo primary key(cp_prestamo),
  constraint fk_prestamo_trabajador foreign key(cf_trabajador) references fa_trabajador(cp_trabajador)
);


create table fa_detalle_prestamo(
  cp_detale_prestamo int auto_increment,
  atr_numCuota int,
  atr_montoDescontar int,
  atr_fechaDescuento varchar(100),
  atr_estado int,
  cf_prestamo int,
  constraint pk_detalle_prestamo primary key(cp_detale_prestamo),
  constraint fk_detalleprestamo_prestamo foreign key(cf_prestamo) references fa_prestamo(cp_prestamo)
);

create table fa_adelanto(
  cp_adelanto int auto_increment,
  atr_tipoCuenta varchar(200),
  atr_numCuenta varchar(200),
  atr_monto int,
  cf_banco int,
  cf_trabajador int unique,
  constraint pk_adelanto primary key(cp_adelanto),
  constraint fk_adelanto_banco foreign key(cf_banco) references fa_banco(cp_banco),
  constraint fk_adelanto_trabajador foreign key(cf_trabajador) references fa_trabajador(cp_trabajador)
);

create table fa_inasistencia(
  cp_inasistencia int auto_increment,
  atr_motivo varchar(100),
  atr_title varchar(100),
  atr_start varchar(100),
  cf_trabajador int,
  constraint pk_inasistencia primary key(cp_inasistencia),
  constraint fk_inasistencia_trabajador foreign key(cf_trabajador) references fa_trabajador(cp_trabajador)
);


create table fa_historial_adelantos(
  cp_historial_adelantos int auto_increment,
  atr_mes varchar(50),
  atr_ano int,
  atr_monto int,
  cf_transferencia varchar(200),
  cf_documento int,
  cf_trabajador int,
  constraint pk_historial_adelantos primary key(cp_historial_adelantos),
  constraint fk_historialAdelantos_transferencia foreign key(cf_transferencia) references fa_transferencia(cp_transferencia),
  constraint fk_historialAdelantos_documento foreign key(cf_documento) references fa_documento(cp_documento),
  constraint fk_historialAdelantos_trabajador foreign key(cf_trabajador) references fa_trabajador(cp_trabajador)
);

create table fa_historial_pagos_mensuales(
  cp_historial_pagos_mensuales int auto_increment,
  atr_mes varchar(50),
  atr_ano int,
  atr_monto int,
  cf_transferencia varchar(200),
  cf_documento int,
  cf_trabajador int,
  constraint pk_historial_pagos_mensuales primary key(cp_historial_pagos_mensuales),
  constraint fk_historialPagosMensuales_transferencia foreign key(cf_transferencia) references fa_transferencia(cp_transferencia),
  constraint fk_historialPagosMensuales_documento foreign key(cf_documento) references fa_documento(cp_documento),
  constraint fk_historialPagosMensuales_trabajador foreign key(cf_trabajador) references fa_trabajador(cp_trabajador)
);






















































create table fa_perfil(
  cp_perfil int auto_increment,
  atr_nombre varchar(100),
  constraint pk_perfil primary key(cp_perfil)
);

create table fa_modulo(
  cp_modulo int auto_increment,
  atr_nombre varchar(100),
  constraint pk_modulo primary key(cp_modulo)
);

create table fa_permiso(
  cp_permiso int auto_increment,
  atr_nombre varchar(100),
  atr_descripcion varchar(100),
  constraint pk_permiso primary key(cp_permiso)
);

create table fa_usuario(
  cp_usuario int auto_increment,
  atr_nombre varchar(100),
  atr_correo varchar(100) unique,
  atr_clave varchar(100),
  atr_activo char(1),
  cf_perfil int,
  constraint pk_usuario primary key(cp_usuario),
  constraint fk_usuario_perfil foreign key(cf_perfil) references fa_perfil(cp_perfil)
);

create table fa_existencia_permiso(
  cp_existencia_permiso int auto_increment,
  cf_modulo int,
  cf_permiso int,
  constraint pk_existencia_permiso primary key(cp_existencia_permiso),
  constraint fk_existencia_permiso_modulo foreign key(cf_modulo) references fa_modulo(cp_modulo),
  constraint fk_existencia_permiso_permiso foreign key(cf_permiso) references fa_permiso(cp_permiso)
);

create table fa_permiso_usuario(
  cp_permiso_usuario int auto_increment,
  cf_existencia_permiso int,
  cf_usuario int,
  constraint pk_permiso_usuario primary key(cp_permiso_usuario),
  constraint fk_permiso_usuario_existencia_permiso foreign key(cf_existencia_permiso) references fa_existencia_permiso(cp_existencia_permiso),
  constraint fk_permiso_usuario_usuario foreign key(cf_usuario) references fa_usuario(cp_usuario)
);

create table fa_permiso_perfil(
  cp_permiso_perfil int auto_increment,
  cf_existencia_permiso int,
  cf_perfil int,
  constraint pk_permiso_perfil primary key(cp_permiso_perfil),
  constraint fk_permiso_perfil_existencia_permiso foreign key(cf_existencia_permiso) references fa_existencia_permiso(cp_existencia_permiso),
  constraint fk_permiso_perfil_perfil foreign key(cf_perfil) references fa_perfil(cp_perfil)
);

create table fa_menu(
  cp_menu int auto_increment,
  atr_nombre varchar(100),
  constraint pk_menu primary key(cp_menu)
);

create table fa_menu_perfil(
  cp_menu_perfil int auto_increment,
  cf_perfil int,
  cf_menu int,
  constraint pk_perfil_menu primary key(cp_menu_perfil),
  constraint fk_perfil_perfil foreign key(cf_perfil) references fa_perfil(cp_perfil),
  constraint fk_perfil_menu foreign key(cf_menu) references fa_menu(cp_menu)
);

create table fa_menu_usuario(
  cp_menu_usuario int auto_increment,
  cf_menu int,
  cf_usuario int,
  constraint pk_mu_menu primary key(cp_menu_usuario),
  constraint fk_mu_menu foreign key(cf_menu) references fa_menu(cp_menu),
  constraint fk_mu_usuario foreign key(cf_usuario) references fa_usuario(cp_usuario)
);
