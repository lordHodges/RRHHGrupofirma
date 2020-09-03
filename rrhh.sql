-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 03-09-2020 a las 16:22:25
-- Versión del servidor: 10.3.22-MariaDB-0+deb10u1
-- Versión de PHP: 7.3.19-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rrhh`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_adelanto`
--

CREATE TABLE `fa_adelanto` (
  `cp_adelanto` int(11) NOT NULL,
  `atr_tipoCuenta` varchar(200) DEFAULT NULL,
  `atr_numCuenta` varchar(100) DEFAULT NULL,
  `atr_monto` int(11) DEFAULT NULL,
  `cf_banco` int(11) DEFAULT NULL,
  `cf_trabajador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_afp`
--

CREATE TABLE `fa_afp` (
  `cp_afp` int(11) NOT NULL,
  `atr_nombre` varchar(100) NOT NULL,
  `tasa` float DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_anexo`
--

CREATE TABLE `fa_anexo` (
  `cp_anexo` varchar(200) NOT NULL DEFAULT '',
  `atr_fechaDesde` varchar(200) DEFAULT NULL,
  `atr_fechaHasta` varchar(200) DEFAULT NULL,
  `atr_motivo` varchar(200) DEFAULT NULL,
  `cf_trabajador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_banco`
--

CREATE TABLE `fa_banco` (
  `cp_banco` int(11) NOT NULL,
  `atr_nombre` varchar(200) DEFAULT NULL,
  `atr_sitio` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_cargo`
--

CREATE TABLE `fa_cargo` (
  `cp_cargo` int(11) NOT NULL,
  `atr_nombre` varchar(100) NOT NULL,
  `atr_jefeDirecto` varchar(200) DEFAULT NULL,
  `atr_lugarTrabajo` varchar(5000) NOT NULL,
  `atr_jornadaTrabajo` varchar(5000) NOT NULL,
  `atr_diasTrabajo` varchar(2000) DEFAULT NULL,
  `cf_sucursal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_cartaamonestacion`
--

CREATE TABLE `fa_cartaamonestacion` (
  `cp_cartaAmonestacion` varchar(200) NOT NULL DEFAULT '',
  `atr_motivo` varchar(200) DEFAULT NULL,
  `atr_grado` varchar(200) DEFAULT NULL,
  `atr_fecha` varchar(200) DEFAULT NULL,
  `cf_trabajador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_cartaAviso`
--

CREATE TABLE `fa_cartaAviso` (
  `cp_cartaAviso` varchar(200) NOT NULL DEFAULT '',
  `atr_fecha` varchar(200) DEFAULT NULL,
  `atr_motivo` int(11) DEFAULT NULL,
  `cf_trabajador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_ciudad`
--

CREATE TABLE `fa_ciudad` (
  `cp_ciudad` int(11) NOT NULL,
  `atr_nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_competencia`
--

CREATE TABLE `fa_competencia` (
  `cp_competencia` int(11) NOT NULL,
  `atr_descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_competencia_cargo`
--

CREATE TABLE `fa_competencia_cargo` (
  `cp_competencia_cargo` int(11) NOT NULL,
  `cf_cargo` int(11) NOT NULL,
  `cf_competencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_conocimiento`
--

CREATE TABLE `fa_conocimiento` (
  `cp_conocimiento` int(11) NOT NULL,
  `atr_descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_conocimiento_cargo`
--

CREATE TABLE `fa_conocimiento_cargo` (
  `cp_conocimiento_cargo` int(11) NOT NULL,
  `cf_cargo` int(11) NOT NULL,
  `cf_conocimiento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_contrato`
--

CREATE TABLE `fa_contrato` (
  `cp_contrato` varchar(200) NOT NULL DEFAULT '',
  `atr_fechaInicio` varchar(10) DEFAULT NULL,
  `atr_fechaTermino` varchar(10) DEFAULT NULL,
  `cf_cargo` int(11) DEFAULT NULL,
  `cf_trabajador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_descripcion_item`
--

CREATE TABLE `fa_descripcion_item` (
  `cp_descripcionItem` int(11) NOT NULL,
  `atr_descripcion` varchar(1000) DEFAULT NULL,
  `atr_posicionItem` int(11) DEFAULT NULL,
  `cf_itemContrato` int(11) DEFAULT NULL,
  `cf_cargo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_detalle_prestamo`
--

CREATE TABLE `fa_detalle_prestamo` (
  `cp_detale_prestamo` int(11) NOT NULL,
  `atr_numCuota` int(11) DEFAULT NULL,
  `atr_montoDescontar` int(11) DEFAULT NULL,
  `atr_fechaDescuento` varchar(100) DEFAULT NULL,
  `atr_estado` int(11) DEFAULT NULL,
  `cf_prestamo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_documento`
--

CREATE TABLE `fa_documento` (
  `cp_documento` int(11) NOT NULL,
  `atr_nombreDoc` varchar(200) DEFAULT NULL,
  `atr_nombreReal` varchar(200) NOT NULL,
  `atr_ruta` varchar(200) NOT NULL,
  `atr_fechaCarga` varchar(20) NOT NULL,
  `atr_tipo` varchar(200) NOT NULL,
  `atr_fechacronologica` varchar(200) DEFAULT NULL,
  `cf_contrato` varchar(200) DEFAULT NULL,
  `cf_anexo` varchar(200) DEFAULT NULL,
  `cf_transferencia` varchar(200) DEFAULT NULL,
  `cf_cartaamonestacion` varchar(200) DEFAULT NULL,
  `cf_liquidacion` varchar(200) DEFAULT NULL,
  `cf_finiquito` varchar(200) DEFAULT NULL,
  `cf_cartaAviso` varchar(200) DEFAULT NULL,
  `cf_prestamo` int(11) DEFAULT NULL,
  `cf_trabajador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_empresa`
--

CREATE TABLE `fa_empresa` (
  `cp_empresa` int(11) NOT NULL,
  `atr_nombre` varchar(100) NOT NULL,
  `atr_run` varchar(50) NOT NULL,
  `atr_representante` varchar(100) NOT NULL,
  `atr_cedula_representante` varchar(50) NOT NULL,
  `atr_domicilio` varchar(100) NOT NULL,
  `cf_ciudad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_estado`
--

CREATE TABLE `fa_estado` (
  `cp_estado` int(11) NOT NULL,
  `atr_nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_estadoCivil`
--

CREATE TABLE `fa_estadoCivil` (
  `cp_estadoCivil` int(11) NOT NULL,
  `atr_nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_existencia_permiso`
--

CREATE TABLE `fa_existencia_permiso` (
  `cp_existencia_permiso` int(11) NOT NULL,
  `cf_modulo` int(11) DEFAULT NULL,
  `cf_permiso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_finiquito`
--

CREATE TABLE `fa_finiquito` (
  `cp_finiquito` varchar(200) NOT NULL DEFAULT '',
  `atr_fecha` varchar(200) DEFAULT NULL,
  `atr_total` int(11) DEFAULT NULL,
  `cf_trabajador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_historial_adelantos`
--

CREATE TABLE `fa_historial_adelantos` (
  `cp_historial_adelantos` int(11) NOT NULL,
  `atr_mes` varchar(50) DEFAULT NULL,
  `atr_ano` int(11) DEFAULT NULL,
  `atr_monto` int(11) DEFAULT NULL,
  `cf_transferencia` varchar(200) DEFAULT NULL,
  `cf_documento` int(11) DEFAULT NULL,
  `cf_trabajador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_historial_pagos_mensuales`
--

CREATE TABLE `fa_historial_pagos_mensuales` (
  `cp_historial_pagos_mensuales` int(11) NOT NULL,
  `atr_mes` varchar(50) DEFAULT NULL,
  `atr_ano` int(11) DEFAULT NULL,
  `atr_monto` int(11) DEFAULT NULL,
  `cf_transferencia` varchar(200) DEFAULT NULL,
  `cf_documento` int(11) DEFAULT NULL,
  `cf_trabajador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_inasistencia`
--

CREATE TABLE `fa_inasistencia` (
  `cp_inasistencia` int(11) NOT NULL,
  `atr_motivo` varchar(100) DEFAULT NULL,
  `atr_title` varchar(100) DEFAULT NULL,
  `atr_start` varchar(100) DEFAULT NULL,
  `cf_trabajador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_items_contrato`
--

CREATE TABLE `fa_items_contrato` (
  `cp_itemContrato` int(11) NOT NULL,
  `atr_nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_liquidacion`
--

CREATE TABLE `fa_liquidacion` (
  `cp_liquidacion` varchar(200) NOT NULL DEFAULT '',
  `atr_fecha` varchar(200) DEFAULT NULL,
  `atr_totalHaberes` int(11) DEFAULT NULL,
  `atr_totalDescuentos` int(11) DEFAULT NULL,
  `atr_alcanceLiquido` int(11) DEFAULT NULL,
  `cf_trabajador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_log_sesion`
--

CREATE TABLE `fa_log_sesion` (
  `cp_log_sesion` int(11) NOT NULL,
  `atr_usuario` varchar(30) DEFAULT NULL,
  `atr_sesion` varchar(300) DEFAULT NULL,
  `atr_time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_manipularAnexos`
--

CREATE TABLE `fa_manipularAnexos` (
  `cp_manipular` int(11) NOT NULL,
  `atr_numRomano` varchar(10) DEFAULT NULL,
  `atr_item` varchar(100) DEFAULT NULL,
  `atr_descripcion` varchar(2000) DEFAULT NULL,
  `atr_fecha` varchar(100) DEFAULT NULL,
  `cf_trabajador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_marca`
--

CREATE TABLE `fa_marca` (
  `cp_marca` int(11) NOT NULL,
  `atr_descripcion` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_menu`
--

CREATE TABLE `fa_menu` (
  `cp_menu` int(11) NOT NULL,
  `atr_nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_menu_perfil`
--

CREATE TABLE `fa_menu_perfil` (
  `cp_menu_perfil` int(11) NOT NULL,
  `cf_perfil` int(11) DEFAULT NULL,
  `cf_menu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_menu_usuario`
--

CREATE TABLE `fa_menu_usuario` (
  `cp_menu_usuario` int(11) NOT NULL,
  `cf_menu` int(11) DEFAULT NULL,
  `cf_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_modelo`
--

CREATE TABLE `fa_modelo` (
  `cp_modelo` int(11) NOT NULL,
  `atr_descripcion` varchar(100) DEFAULT NULL,
  `cf_marca` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_modulo`
--

CREATE TABLE `fa_modulo` (
  `cp_modulo` int(11) NOT NULL,
  `atr_nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_nacionalidad`
--

CREATE TABLE `fa_nacionalidad` (
  `cp_nacionalidad` int(11) NOT NULL,
  `atr_nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_otrosantecedentes`
--

CREATE TABLE `fa_otrosantecedentes` (
  `cp_otrosantecedentes` int(11) NOT NULL,
  `atr_descripcion` varchar(200) NOT NULL,
  `cf_titulo` int(11) DEFAULT NULL,
  `cf_cargo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_perfil`
--

CREATE TABLE `fa_perfil` (
  `cp_perfil` int(11) NOT NULL,
  `atr_nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_permiso`
--

CREATE TABLE `fa_permiso` (
  `cp_permiso` int(11) NOT NULL,
  `atr_nombre` varchar(100) DEFAULT NULL,
  `atr_descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_permiso_perfil`
--

CREATE TABLE `fa_permiso_perfil` (
  `cp_permiso_perfil` int(11) NOT NULL,
  `cf_existencia_permiso` int(11) DEFAULT NULL,
  `cf_perfil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_permiso_usuario`
--

CREATE TABLE `fa_permiso_usuario` (
  `cp_permiso_usuario` int(11) NOT NULL,
  `cf_existencia_permiso` int(11) DEFAULT NULL,
  `cf_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_prestamo`
--

CREATE TABLE `fa_prestamo` (
  `cp_prestamo` int(11) NOT NULL,
  `atr_montoTotal` int(11) DEFAULT NULL,
  `atr_fechaPrestamo` varchar(100) DEFAULT NULL,
  `atr_cantidadCuotas` int(11) DEFAULT NULL,
  `atr_autoriza` varchar(200) NOT NULL,
  `atr_observacion` varchar(200) NOT NULL,
  `cf_trabajador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_prevision`
--

CREATE TABLE `fa_prevision` (
  `cp_prevision` int(11) NOT NULL,
  `atr_nombre` varchar(100) NOT NULL,
  `tasa` float DEFAULT 0.07
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_proyecto`
--

CREATE TABLE `fa_proyecto` (
  `cp_proyecto` int(11) NOT NULL,
  `atr_descripcion` varchar(200) NOT NULL,
  `atr_fechaInicio` varchar(100) NOT NULL,
  `atr_fechaTermino` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_remuneracion`
--

CREATE TABLE `fa_remuneracion` (
  `cp_remuneracion` int(11) NOT NULL,
  `atr_sueldoMensual` varchar(100) DEFAULT '0',
  `atr_cotizaciones` varchar(100) DEFAULT NULL,
  `atr_colacion` varchar(100) DEFAULT '0',
  `atr_movilizacion` varchar(100) DEFAULT '0',
  `atr_asistencia` varchar(100) DEFAULT '0',
  `cf_trabajador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_remuneracion_extra`
--

CREATE TABLE `fa_remuneracion_extra` (
  `cp_remuneracionExtra` int(11) NOT NULL,
  `atr_descripcion` varchar(200) NOT NULL,
  `cf_remuneracion` int(11) DEFAULT NULL,
  `cf_cargo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_requisitominimo`
--

CREATE TABLE `fa_requisitominimo` (
  `cp_requisitominimo` int(11) NOT NULL,
  `atr_descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_requisitominimo_cargo`
--

CREATE TABLE `fa_requisitominimo_cargo` (
  `cp_requisitominimo_cargo` int(11) NOT NULL,
  `cf_cargo` int(11) NOT NULL,
  `cf_requisitominimo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_responsabilidad`
--

CREATE TABLE `fa_responsabilidad` (
  `cp_responsabilidad` int(11) NOT NULL,
  `atr_descripcion` varchar(200) NOT NULL,
  `cf_cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_sucursal`
--

CREATE TABLE `fa_sucursal` (
  `cp_sucursal` int(11) NOT NULL,
  `atr_nombre` varchar(100) NOT NULL,
  `cf_ciudad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_tarea`
--

CREATE TABLE `fa_tarea` (
  `cp_tarea` int(11) NOT NULL,
  `atr_descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_tareas_cargo`
--

CREATE TABLE `fa_tareas_cargo` (
  `cp_tareas_cargo` int(11) NOT NULL,
  `cf_cargo` int(11) NOT NULL,
  `cf_tarea` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_tipovehiculo`
--

CREATE TABLE `fa_tipovehiculo` (
  `cp_tipovehiculo` int(11) NOT NULL,
  `atr_descripcion` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_titulo`
--

CREATE TABLE `fa_titulo` (
  `cp_titulo` int(11) NOT NULL,
  `atr_descripcion` varchar(200) NOT NULL,
  `cf_cargo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_trabajador`
--

CREATE TABLE `fa_trabajador` (
  `cp_trabajador` int(11) NOT NULL,
  `atr_rut` varchar(20) NOT NULL,
  `atr_nombres` varchar(50) NOT NULL,
  `atr_apellidos` varchar(50) NOT NULL,
  `atr_direccion` varchar(100) DEFAULT NULL,
  `atr_fechaNacimiento` varchar(10) DEFAULT NULL,
  `atr_sueldo` int(11) DEFAULT NULL,
  `cf_proyecto` int(11) DEFAULT NULL,
  `cf_estado` int(11) DEFAULT NULL,
  `cf_ciudad` int(11) DEFAULT NULL,
  `cf_cargo` int(11) DEFAULT NULL,
  `cf_sucursal` int(11) DEFAULT NULL,
  `cf_nacionalidad` int(11) DEFAULT NULL,
  `cf_estadoCivil` int(11) DEFAULT NULL,
  `cf_afp` int(11) DEFAULT NULL,
  `cf_prevision` int(11) DEFAULT NULL,
  `cf_empresa` int(11) DEFAULT NULL,
  `atr_plan` float DEFAULT 0,
  `atr_cargas` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_transferencia`
--

CREATE TABLE `fa_transferencia` (
  `cp_transferencia` varchar(200) NOT NULL DEFAULT '',
  `atr_fecha` varchar(200) DEFAULT NULL,
  `atr_monto` varchar(200) DEFAULT NULL,
  `cf_trabajador` int(11) DEFAULT NULL,
  `cf_banco` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_usuario`
--

CREATE TABLE `fa_usuario` (
  `cp_usuario` int(11) NOT NULL,
  `atr_nombre` varchar(100) DEFAULT NULL,
  `atr_correo` varchar(100) DEFAULT NULL,
  `atr_clave` varchar(100) DEFAULT NULL,
  `atr_activo` char(1) DEFAULT NULL,
  `cf_perfil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_vehiculos`
--

CREATE TABLE `fa_vehiculos` (
  `cp_vehiculo` int(11) NOT NULL,
  `atr_patente` varchar(100) DEFAULT NULL,
  `atr_ano` int(11) DEFAULT NULL,
  `atr_color` varchar(100) DEFAULT NULL,
  `cf_tipo` int(11) DEFAULT NULL,
  `cf_marca` int(11) DEFAULT NULL,
  `cf_modelo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `fa_adelanto`
--
ALTER TABLE `fa_adelanto`
  ADD PRIMARY KEY (`cp_adelanto`),
  ADD UNIQUE KEY `cf_trabajador` (`cf_trabajador`),
  ADD KEY `fk_adelanto_banco` (`cf_banco`);

--
-- Indices de la tabla `fa_afp`
--
ALTER TABLE `fa_afp`
  ADD PRIMARY KEY (`cp_afp`);

--
-- Indices de la tabla `fa_anexo`
--
ALTER TABLE `fa_anexo`
  ADD PRIMARY KEY (`cp_anexo`),
  ADD UNIQUE KEY `cp_anexo` (`cp_anexo`),
  ADD KEY `fk_anexo_trabajador` (`cf_trabajador`);

--
-- Indices de la tabla `fa_banco`
--
ALTER TABLE `fa_banco`
  ADD PRIMARY KEY (`cp_banco`);

--
-- Indices de la tabla `fa_cargo`
--
ALTER TABLE `fa_cargo`
  ADD PRIMARY KEY (`cp_cargo`),
  ADD UNIQUE KEY `atr_nombre` (`atr_nombre`),
  ADD KEY `cf_cargo_sucursal` (`cf_sucursal`);

--
-- Indices de la tabla `fa_cartaamonestacion`
--
ALTER TABLE `fa_cartaamonestacion`
  ADD PRIMARY KEY (`cp_cartaAmonestacion`),
  ADD UNIQUE KEY `cp_cartaAmonestacion` (`cp_cartaAmonestacion`),
  ADD KEY `fk_cartaAmonestacion_trabajador` (`cf_trabajador`);

--
-- Indices de la tabla `fa_cartaAviso`
--
ALTER TABLE `fa_cartaAviso`
  ADD PRIMARY KEY (`cp_cartaAviso`),
  ADD UNIQUE KEY `cp_cartaAviso` (`cp_cartaAviso`),
  ADD KEY `fk_cartaAviso_trabajador` (`cf_trabajador`);

--
-- Indices de la tabla `fa_ciudad`
--
ALTER TABLE `fa_ciudad`
  ADD PRIMARY KEY (`cp_ciudad`);

--
-- Indices de la tabla `fa_competencia`
--
ALTER TABLE `fa_competencia`
  ADD PRIMARY KEY (`cp_competencia`),
  ADD UNIQUE KEY `atr_descripcion` (`atr_descripcion`);

--
-- Indices de la tabla `fa_competencia_cargo`
--
ALTER TABLE `fa_competencia_cargo`
  ADD PRIMARY KEY (`cp_competencia_cargo`),
  ADD KEY `fk_competencia_cargo_cargo` (`cf_cargo`),
  ADD KEY `fk_competencia_cargo_competencia` (`cf_competencia`);

--
-- Indices de la tabla `fa_conocimiento`
--
ALTER TABLE `fa_conocimiento`
  ADD PRIMARY KEY (`cp_conocimiento`),
  ADD UNIQUE KEY `atr_descripcion` (`atr_descripcion`);

--
-- Indices de la tabla `fa_conocimiento_cargo`
--
ALTER TABLE `fa_conocimiento_cargo`
  ADD PRIMARY KEY (`cp_conocimiento_cargo`),
  ADD KEY `fk_conocimientocargo_cargo` (`cf_cargo`),
  ADD KEY `fk_conocimientocargo_conocimiento` (`cf_conocimiento`);

--
-- Indices de la tabla `fa_contrato`
--
ALTER TABLE `fa_contrato`
  ADD PRIMARY KEY (`cp_contrato`),
  ADD KEY `fk_contrato_cargo` (`cf_cargo`),
  ADD KEY `fk_contrato_trabajador` (`cf_trabajador`);

--
-- Indices de la tabla `fa_descripcion_item`
--
ALTER TABLE `fa_descripcion_item`
  ADD PRIMARY KEY (`cp_descripcionItem`),
  ADD KEY `fk_descripcionItem_cargo` (`cf_cargo`),
  ADD KEY `fk_descripcionItem_itemContrato` (`cf_itemContrato`);

--
-- Indices de la tabla `fa_detalle_prestamo`
--
ALTER TABLE `fa_detalle_prestamo`
  ADD PRIMARY KEY (`cp_detale_prestamo`),
  ADD KEY `fk_detalleprestamo_prestamo` (`cf_prestamo`);

--
-- Indices de la tabla `fa_documento`
--
ALTER TABLE `fa_documento`
  ADD PRIMARY KEY (`cp_documento`),
  ADD KEY `fk_documento_contrato` (`cf_contrato`),
  ADD KEY `fk_documento_anexo` (`cf_anexo`),
  ADD KEY `fk_documento_trabajador` (`cf_trabajador`),
  ADD KEY `fk_documento_transferencia` (`cf_transferencia`),
  ADD KEY `fk_documento_cartaamonestacion` (`cf_cartaamonestacion`),
  ADD KEY `fk_documento_finiquito` (`cf_finiquito`),
  ADD KEY `fk_documento_liquidacion` (`cf_liquidacion`),
  ADD KEY `fk_documento_cartaAviso` (`cf_cartaAviso`),
  ADD KEY `fk_documento_prestamo` (`cf_prestamo`);

--
-- Indices de la tabla `fa_empresa`
--
ALTER TABLE `fa_empresa`
  ADD PRIMARY KEY (`cp_empresa`),
  ADD UNIQUE KEY `atr_run` (`atr_run`),
  ADD KEY `fk_empresa_ciudad` (`cf_ciudad`);

--
-- Indices de la tabla `fa_estado`
--
ALTER TABLE `fa_estado`
  ADD PRIMARY KEY (`cp_estado`);

--
-- Indices de la tabla `fa_estadoCivil`
--
ALTER TABLE `fa_estadoCivil`
  ADD PRIMARY KEY (`cp_estadoCivil`);

--
-- Indices de la tabla `fa_existencia_permiso`
--
ALTER TABLE `fa_existencia_permiso`
  ADD PRIMARY KEY (`cp_existencia_permiso`),
  ADD KEY `fk_existencia_permiso_modulo` (`cf_modulo`),
  ADD KEY `fk_existencia_permiso_permiso` (`cf_permiso`);

--
-- Indices de la tabla `fa_finiquito`
--
ALTER TABLE `fa_finiquito`
  ADD PRIMARY KEY (`cp_finiquito`),
  ADD UNIQUE KEY `cp_finiquito` (`cp_finiquito`),
  ADD KEY `fk_finiquito_trabajador` (`cf_trabajador`);

--
-- Indices de la tabla `fa_historial_adelantos`
--
ALTER TABLE `fa_historial_adelantos`
  ADD PRIMARY KEY (`cp_historial_adelantos`),
  ADD KEY `fk_historialAdelantos_transferencia` (`cf_transferencia`),
  ADD KEY `fk_historialAdelantos_documento` (`cf_documento`),
  ADD KEY `fk_historialAdelantos_trabajador` (`cf_trabajador`);

--
-- Indices de la tabla `fa_historial_pagos_mensuales`
--
ALTER TABLE `fa_historial_pagos_mensuales`
  ADD PRIMARY KEY (`cp_historial_pagos_mensuales`),
  ADD KEY `fk_historialPagosMensuales_transferencia` (`cf_transferencia`),
  ADD KEY `fk_historialPagosMensuales_documento` (`cf_documento`),
  ADD KEY `fk_historialPagosMensuales_trabajador` (`cf_trabajador`);

--
-- Indices de la tabla `fa_inasistencia`
--
ALTER TABLE `fa_inasistencia`
  ADD PRIMARY KEY (`cp_inasistencia`),
  ADD KEY `fk_inasistencia_trabajador` (`cf_trabajador`);

--
-- Indices de la tabla `fa_items_contrato`
--
ALTER TABLE `fa_items_contrato`
  ADD PRIMARY KEY (`cp_itemContrato`);

--
-- Indices de la tabla `fa_liquidacion`
--
ALTER TABLE `fa_liquidacion`
  ADD PRIMARY KEY (`cp_liquidacion`),
  ADD UNIQUE KEY `cp_liquidacion` (`cp_liquidacion`),
  ADD KEY `fk_liquidacion_trabajador` (`cf_trabajador`);

--
-- Indices de la tabla `fa_log_sesion`
--
ALTER TABLE `fa_log_sesion`
  ADD PRIMARY KEY (`cp_log_sesion`);

--
-- Indices de la tabla `fa_manipularAnexos`
--
ALTER TABLE `fa_manipularAnexos`
  ADD PRIMARY KEY (`cp_manipular`),
  ADD KEY `fk_manipularAnexos_trabajador` (`cf_trabajador`);

--
-- Indices de la tabla `fa_marca`
--
ALTER TABLE `fa_marca`
  ADD PRIMARY KEY (`cp_marca`);

--
-- Indices de la tabla `fa_menu`
--
ALTER TABLE `fa_menu`
  ADD PRIMARY KEY (`cp_menu`);

--
-- Indices de la tabla `fa_menu_perfil`
--
ALTER TABLE `fa_menu_perfil`
  ADD PRIMARY KEY (`cp_menu_perfil`),
  ADD KEY `fk_perfil_perfil` (`cf_perfil`),
  ADD KEY `fk_perfil_menu` (`cf_menu`);

--
-- Indices de la tabla `fa_menu_usuario`
--
ALTER TABLE `fa_menu_usuario`
  ADD PRIMARY KEY (`cp_menu_usuario`),
  ADD KEY `fk_mu_menu` (`cf_menu`),
  ADD KEY `fk_mu_usuario` (`cf_usuario`);

--
-- Indices de la tabla `fa_modelo`
--
ALTER TABLE `fa_modelo`
  ADD PRIMARY KEY (`cp_modelo`),
  ADD KEY `fk_modelo_marca` (`cf_marca`);

--
-- Indices de la tabla `fa_modulo`
--
ALTER TABLE `fa_modulo`
  ADD PRIMARY KEY (`cp_modulo`);

--
-- Indices de la tabla `fa_nacionalidad`
--
ALTER TABLE `fa_nacionalidad`
  ADD PRIMARY KEY (`cp_nacionalidad`);

--
-- Indices de la tabla `fa_otrosantecedentes`
--
ALTER TABLE `fa_otrosantecedentes`
  ADD PRIMARY KEY (`cp_otrosantecedentes`),
  ADD UNIQUE KEY `atr_descripcion` (`atr_descripcion`),
  ADD KEY `fk_otrosantecedentes_titulo` (`cf_titulo`),
  ADD KEY `fk_otrosantecedentes_cargo` (`cf_cargo`);

--
-- Indices de la tabla `fa_perfil`
--
ALTER TABLE `fa_perfil`
  ADD PRIMARY KEY (`cp_perfil`);

--
-- Indices de la tabla `fa_permiso`
--
ALTER TABLE `fa_permiso`
  ADD PRIMARY KEY (`cp_permiso`);

--
-- Indices de la tabla `fa_permiso_perfil`
--
ALTER TABLE `fa_permiso_perfil`
  ADD PRIMARY KEY (`cp_permiso_perfil`),
  ADD KEY `fk_permiso_perfil_existencia_permiso` (`cf_existencia_permiso`),
  ADD KEY `fk_permiso_perfil_perfil` (`cf_perfil`);

--
-- Indices de la tabla `fa_permiso_usuario`
--
ALTER TABLE `fa_permiso_usuario`
  ADD PRIMARY KEY (`cp_permiso_usuario`),
  ADD KEY `fk_permiso_usuario_existencia_permiso` (`cf_existencia_permiso`),
  ADD KEY `fk_permiso_usuario_usuario` (`cf_usuario`);

--
-- Indices de la tabla `fa_prestamo`
--
ALTER TABLE `fa_prestamo`
  ADD PRIMARY KEY (`cp_prestamo`),
  ADD KEY `fk_prestamo_trabajador` (`cf_trabajador`);

--
-- Indices de la tabla `fa_prevision`
--
ALTER TABLE `fa_prevision`
  ADD PRIMARY KEY (`cp_prevision`);

--
-- Indices de la tabla `fa_proyecto`
--
ALTER TABLE `fa_proyecto`
  ADD PRIMARY KEY (`cp_proyecto`);

--
-- Indices de la tabla `fa_remuneracion`
--
ALTER TABLE `fa_remuneracion`
  ADD PRIMARY KEY (`cp_remuneracion`),
  ADD KEY `fa_remuneracion_trabajador` (`cf_trabajador`);

--
-- Indices de la tabla `fa_remuneracion_extra`
--
ALTER TABLE `fa_remuneracion_extra`
  ADD PRIMARY KEY (`cp_remuneracionExtra`),
  ADD KEY `fk_remunercionExtra_remuneracion` (`cf_remuneracion`),
  ADD KEY `fk_remunercionExtra_cargo` (`cf_cargo`);

--
-- Indices de la tabla `fa_requisitominimo`
--
ALTER TABLE `fa_requisitominimo`
  ADD PRIMARY KEY (`cp_requisitominimo`),
  ADD UNIQUE KEY `atr_descripcion` (`atr_descripcion`);

--
-- Indices de la tabla `fa_requisitominimo_cargo`
--
ALTER TABLE `fa_requisitominimo_cargo`
  ADD PRIMARY KEY (`cp_requisitominimo_cargo`),
  ADD KEY `fk_requsitominimo_cargo_cargo` (`cf_cargo`),
  ADD KEY `fk_requisitominimo_cargo_requisitominimo` (`cf_requisitominimo`);

--
-- Indices de la tabla `fa_responsabilidad`
--
ALTER TABLE `fa_responsabilidad`
  ADD PRIMARY KEY (`cp_responsabilidad`),
  ADD KEY `fk_responsabilidad_cargo` (`cf_cargo`);

--
-- Indices de la tabla `fa_sucursal`
--
ALTER TABLE `fa_sucursal`
  ADD PRIMARY KEY (`cp_sucursal`),
  ADD KEY `fk_sucursal_ciudad` (`cf_ciudad`);

--
-- Indices de la tabla `fa_tarea`
--
ALTER TABLE `fa_tarea`
  ADD PRIMARY KEY (`cp_tarea`),
  ADD UNIQUE KEY `atr_descripcion` (`atr_descripcion`);

--
-- Indices de la tabla `fa_tareas_cargo`
--
ALTER TABLE `fa_tareas_cargo`
  ADD PRIMARY KEY (`cp_tareas_cargo`),
  ADD KEY `fk_tareascargo_cargo` (`cf_cargo`),
  ADD KEY `fk_tareascargo_tarea` (`cf_tarea`);

--
-- Indices de la tabla `fa_tipovehiculo`
--
ALTER TABLE `fa_tipovehiculo`
  ADD PRIMARY KEY (`cp_tipovehiculo`);

--
-- Indices de la tabla `fa_titulo`
--
ALTER TABLE `fa_titulo`
  ADD PRIMARY KEY (`cp_titulo`),
  ADD UNIQUE KEY `atr_descripcion` (`atr_descripcion`),
  ADD KEY `fk_titulo_cargo` (`cf_cargo`);

--
-- Indices de la tabla `fa_trabajador`
--
ALTER TABLE `fa_trabajador`
  ADD PRIMARY KEY (`cp_trabajador`),
  ADD UNIQUE KEY `atr_rut` (`atr_rut`),
  ADD KEY `fk_trabajador_estado` (`cf_estado`),
  ADD KEY `fk_trabajador_ciudad` (`cf_ciudad`),
  ADD KEY `fk_trabajador_cargo` (`cf_cargo`),
  ADD KEY `fk_trabajador_sucursal` (`cf_sucursal`),
  ADD KEY `fk_trabajador_nacionalidad` (`cf_nacionalidad`),
  ADD KEY `fk_trabajador_estadoCivil` (`cf_estadoCivil`),
  ADD KEY `fk_trabajador_afp` (`cf_afp`),
  ADD KEY `fk_trabajador_prevision` (`cf_prevision`),
  ADD KEY `fk_trabajador_empresa` (`cf_empresa`),
  ADD KEY `fk_trabajador_proyecto` (`cf_proyecto`);

--
-- Indices de la tabla `fa_transferencia`
--
ALTER TABLE `fa_transferencia`
  ADD PRIMARY KEY (`cp_transferencia`),
  ADD UNIQUE KEY `cp_transferencia` (`cp_transferencia`),
  ADD KEY `fk_transferencia_trabajador` (`cf_trabajador`),
  ADD KEY `fk_transferencia_banco` (`cf_banco`);

--
-- Indices de la tabla `fa_usuario`
--
ALTER TABLE `fa_usuario`
  ADD PRIMARY KEY (`cp_usuario`),
  ADD UNIQUE KEY `atr_correo` (`atr_correo`),
  ADD KEY `fk_usuario_perfil` (`cf_perfil`);

--
-- Indices de la tabla `fa_vehiculos`
--
ALTER TABLE `fa_vehiculos`
  ADD PRIMARY KEY (`cp_vehiculo`),
  ADD UNIQUE KEY `atr_patente` (`atr_patente`),
  ADD KEY `fk_vehiculo_tipo` (`cf_tipo`),
  ADD KEY `fk_vehiculo_marca` (`cf_marca`),
  ADD KEY `fk_vehiculo_modelo` (`cf_modelo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `fa_afp`
--
ALTER TABLE `fa_afp`
  MODIFY `cp_afp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_banco`
--
ALTER TABLE `fa_banco`
  MODIFY `cp_banco` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_cargo`
--
ALTER TABLE `fa_cargo`
  MODIFY `cp_cargo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_ciudad`
--
ALTER TABLE `fa_ciudad`
  MODIFY `cp_ciudad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_competencia`
--
ALTER TABLE `fa_competencia`
  MODIFY `cp_competencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_competencia_cargo`
--
ALTER TABLE `fa_competencia_cargo`
  MODIFY `cp_competencia_cargo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_conocimiento`
--
ALTER TABLE `fa_conocimiento`
  MODIFY `cp_conocimiento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_conocimiento_cargo`
--
ALTER TABLE `fa_conocimiento_cargo`
  MODIFY `cp_conocimiento_cargo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_descripcion_item`
--
ALTER TABLE `fa_descripcion_item`
  MODIFY `cp_descripcionItem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_detalle_prestamo`
--
ALTER TABLE `fa_detalle_prestamo`
  MODIFY `cp_detale_prestamo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_documento`
--
ALTER TABLE `fa_documento`
  MODIFY `cp_documento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_empresa`
--
ALTER TABLE `fa_empresa`
  MODIFY `cp_empresa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_estado`
--
ALTER TABLE `fa_estado`
  MODIFY `cp_estado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_estadoCivil`
--
ALTER TABLE `fa_estadoCivil`
  MODIFY `cp_estadoCivil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_existencia_permiso`
--
ALTER TABLE `fa_existencia_permiso`
  MODIFY `cp_existencia_permiso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_historial_adelantos`
--
ALTER TABLE `fa_historial_adelantos`
  MODIFY `cp_historial_adelantos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_historial_pagos_mensuales`
--
ALTER TABLE `fa_historial_pagos_mensuales`
  MODIFY `cp_historial_pagos_mensuales` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_inasistencia`
--
ALTER TABLE `fa_inasistencia`
  MODIFY `cp_inasistencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_items_contrato`
--
ALTER TABLE `fa_items_contrato`
  MODIFY `cp_itemContrato` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_log_sesion`
--
ALTER TABLE `fa_log_sesion`
  MODIFY `cp_log_sesion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_manipularAnexos`
--
ALTER TABLE `fa_manipularAnexos`
  MODIFY `cp_manipular` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_marca`
--
ALTER TABLE `fa_marca`
  MODIFY `cp_marca` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_menu`
--
ALTER TABLE `fa_menu`
  MODIFY `cp_menu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_menu_perfil`
--
ALTER TABLE `fa_menu_perfil`
  MODIFY `cp_menu_perfil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_menu_usuario`
--
ALTER TABLE `fa_menu_usuario`
  MODIFY `cp_menu_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_modelo`
--
ALTER TABLE `fa_modelo`
  MODIFY `cp_modelo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_modulo`
--
ALTER TABLE `fa_modulo`
  MODIFY `cp_modulo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_nacionalidad`
--
ALTER TABLE `fa_nacionalidad`
  MODIFY `cp_nacionalidad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_otrosantecedentes`
--
ALTER TABLE `fa_otrosantecedentes`
  MODIFY `cp_otrosantecedentes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_perfil`
--
ALTER TABLE `fa_perfil`
  MODIFY `cp_perfil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_permiso`
--
ALTER TABLE `fa_permiso`
  MODIFY `cp_permiso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_permiso_perfil`
--
ALTER TABLE `fa_permiso_perfil`
  MODIFY `cp_permiso_perfil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_permiso_usuario`
--
ALTER TABLE `fa_permiso_usuario`
  MODIFY `cp_permiso_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_prestamo`
--
ALTER TABLE `fa_prestamo`
  MODIFY `cp_prestamo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_prevision`
--
ALTER TABLE `fa_prevision`
  MODIFY `cp_prevision` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_proyecto`
--
ALTER TABLE `fa_proyecto`
  MODIFY `cp_proyecto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_remuneracion`
--
ALTER TABLE `fa_remuneracion`
  MODIFY `cp_remuneracion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_remuneracion_extra`
--
ALTER TABLE `fa_remuneracion_extra`
  MODIFY `cp_remuneracionExtra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_requisitominimo`
--
ALTER TABLE `fa_requisitominimo`
  MODIFY `cp_requisitominimo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_requisitominimo_cargo`
--
ALTER TABLE `fa_requisitominimo_cargo`
  MODIFY `cp_requisitominimo_cargo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_responsabilidad`
--
ALTER TABLE `fa_responsabilidad`
  MODIFY `cp_responsabilidad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_sucursal`
--
ALTER TABLE `fa_sucursal`
  MODIFY `cp_sucursal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_tarea`
--
ALTER TABLE `fa_tarea`
  MODIFY `cp_tarea` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_tareas_cargo`
--
ALTER TABLE `fa_tareas_cargo`
  MODIFY `cp_tareas_cargo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_tipovehiculo`
--
ALTER TABLE `fa_tipovehiculo`
  MODIFY `cp_tipovehiculo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_titulo`
--
ALTER TABLE `fa_titulo`
  MODIFY `cp_titulo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_trabajador`
--
ALTER TABLE `fa_trabajador`
  MODIFY `cp_trabajador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_usuario`
--
ALTER TABLE `fa_usuario`
  MODIFY `cp_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_vehiculos`
--
ALTER TABLE `fa_vehiculos`
  MODIFY `cp_vehiculo` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `fa_adelanto`
--
ALTER TABLE `fa_adelanto`
  ADD CONSTRAINT `fk_adelanto_banco` FOREIGN KEY (`cf_banco`) REFERENCES `fa_banco` (`cp_banco`),
  ADD CONSTRAINT `fk_adelanto_trabajador` FOREIGN KEY (`cf_trabajador`) REFERENCES `fa_trabajador` (`cp_trabajador`);

--
-- Filtros para la tabla `fa_anexo`
--
ALTER TABLE `fa_anexo`
  ADD CONSTRAINT `fk_anexo_trabajador` FOREIGN KEY (`cf_trabajador`) REFERENCES `fa_trabajador` (`cp_trabajador`);

--
-- Filtros para la tabla `fa_cargo`
--
ALTER TABLE `fa_cargo`
  ADD CONSTRAINT `cf_cargo_sucursal` FOREIGN KEY (`cf_sucursal`) REFERENCES `fa_sucursal` (`cp_sucursal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `fa_cartaamonestacion`
--
ALTER TABLE `fa_cartaamonestacion`
  ADD CONSTRAINT `fk_cartaAmonestacion_trabajador` FOREIGN KEY (`cf_trabajador`) REFERENCES `fa_trabajador` (`cp_trabajador`);

--
-- Filtros para la tabla `fa_cartaAviso`
--
ALTER TABLE `fa_cartaAviso`
  ADD CONSTRAINT `fk_cartaAviso_trabajador` FOREIGN KEY (`cf_trabajador`) REFERENCES `fa_trabajador` (`cp_trabajador`);

--
-- Filtros para la tabla `fa_competencia_cargo`
--
ALTER TABLE `fa_competencia_cargo`
  ADD CONSTRAINT `fk_competencia_cargo_cargo` FOREIGN KEY (`cf_cargo`) REFERENCES `fa_cargo` (`cp_cargo`),
  ADD CONSTRAINT `fk_competencia_cargo_competencia` FOREIGN KEY (`cf_competencia`) REFERENCES `fa_competencia` (`cp_competencia`);

--
-- Filtros para la tabla `fa_conocimiento_cargo`
--
ALTER TABLE `fa_conocimiento_cargo`
  ADD CONSTRAINT `fk_conocimientocargo_cargo` FOREIGN KEY (`cf_cargo`) REFERENCES `fa_cargo` (`cp_cargo`),
  ADD CONSTRAINT `fk_conocimientocargo_conocimiento` FOREIGN KEY (`cf_conocimiento`) REFERENCES `fa_conocimiento` (`cp_conocimiento`);

--
-- Filtros para la tabla `fa_contrato`
--
ALTER TABLE `fa_contrato`
  ADD CONSTRAINT `fk_contrato_cargo` FOREIGN KEY (`cf_cargo`) REFERENCES `fa_cargo` (`cp_cargo`),
  ADD CONSTRAINT `fk_contrato_trabajador` FOREIGN KEY (`cf_trabajador`) REFERENCES `fa_trabajador` (`cp_trabajador`);

--
-- Filtros para la tabla `fa_descripcion_item`
--
ALTER TABLE `fa_descripcion_item`
  ADD CONSTRAINT `fk_descripcionItem_cargo` FOREIGN KEY (`cf_cargo`) REFERENCES `fa_cargo` (`cp_cargo`),
  ADD CONSTRAINT `fk_descripcionItem_itemContrato` FOREIGN KEY (`cf_itemContrato`) REFERENCES `fa_items_contrato` (`cp_itemContrato`);

--
-- Filtros para la tabla `fa_detalle_prestamo`
--
ALTER TABLE `fa_detalle_prestamo`
  ADD CONSTRAINT `fk_detalleprestamo_prestamo` FOREIGN KEY (`cf_prestamo`) REFERENCES `fa_prestamo` (`cp_prestamo`);

--
-- Filtros para la tabla `fa_documento`
--
ALTER TABLE `fa_documento`
  ADD CONSTRAINT `fk_documento_anexo` FOREIGN KEY (`cf_anexo`) REFERENCES `fa_anexo` (`cp_anexo`),
  ADD CONSTRAINT `fk_documento_cartaAviso` FOREIGN KEY (`cf_cartaAviso`) REFERENCES `fa_cartaAviso` (`cp_cartaAviso`),
  ADD CONSTRAINT `fk_documento_cartaamonestacion` FOREIGN KEY (`cf_cartaamonestacion`) REFERENCES `fa_cartaamonestacion` (`cp_cartaAmonestacion`),
  ADD CONSTRAINT `fk_documento_contrato` FOREIGN KEY (`cf_contrato`) REFERENCES `fa_contrato` (`cp_contrato`),
  ADD CONSTRAINT `fk_documento_finiquito` FOREIGN KEY (`cf_finiquito`) REFERENCES `fa_finiquito` (`cp_finiquito`),
  ADD CONSTRAINT `fk_documento_liquidacion` FOREIGN KEY (`cf_liquidacion`) REFERENCES `fa_liquidacion` (`cp_liquidacion`),
  ADD CONSTRAINT `fk_documento_prestamo` FOREIGN KEY (`cf_prestamo`) REFERENCES `fa_prestamo` (`cp_prestamo`),
  ADD CONSTRAINT `fk_documento_trabajador` FOREIGN KEY (`cf_trabajador`) REFERENCES `fa_trabajador` (`cp_trabajador`),
  ADD CONSTRAINT `fk_documento_transferencia` FOREIGN KEY (`cf_transferencia`) REFERENCES `fa_transferencia` (`cp_transferencia`);

--
-- Filtros para la tabla `fa_empresa`
--
ALTER TABLE `fa_empresa`
  ADD CONSTRAINT `fk_empresa_ciudad` FOREIGN KEY (`cf_ciudad`) REFERENCES `fa_ciudad` (`cp_ciudad`);

--
-- Filtros para la tabla `fa_existencia_permiso`
--
ALTER TABLE `fa_existencia_permiso`
  ADD CONSTRAINT `fk_existencia_permiso_modulo` FOREIGN KEY (`cf_modulo`) REFERENCES `fa_modulo` (`cp_modulo`),
  ADD CONSTRAINT `fk_existencia_permiso_permiso` FOREIGN KEY (`cf_permiso`) REFERENCES `fa_permiso` (`cp_permiso`);

--
-- Filtros para la tabla `fa_finiquito`
--
ALTER TABLE `fa_finiquito`
  ADD CONSTRAINT `fk_finiquito_trabajador` FOREIGN KEY (`cf_trabajador`) REFERENCES `fa_trabajador` (`cp_trabajador`);

--
-- Filtros para la tabla `fa_historial_adelantos`
--
ALTER TABLE `fa_historial_adelantos`
  ADD CONSTRAINT `fk_historialAdelantos_documento` FOREIGN KEY (`cf_documento`) REFERENCES `fa_documento` (`cp_documento`),
  ADD CONSTRAINT `fk_historialAdelantos_trabajador` FOREIGN KEY (`cf_trabajador`) REFERENCES `fa_trabajador` (`cp_trabajador`),
  ADD CONSTRAINT `fk_historialAdelantos_transferencia` FOREIGN KEY (`cf_transferencia`) REFERENCES `fa_transferencia` (`cp_transferencia`);

--
-- Filtros para la tabla `fa_historial_pagos_mensuales`
--
ALTER TABLE `fa_historial_pagos_mensuales`
  ADD CONSTRAINT `fk_historialPagosMensuales_documento` FOREIGN KEY (`cf_documento`) REFERENCES `fa_documento` (`cp_documento`),
  ADD CONSTRAINT `fk_historialPagosMensuales_trabajador` FOREIGN KEY (`cf_trabajador`) REFERENCES `fa_trabajador` (`cp_trabajador`),
  ADD CONSTRAINT `fk_historialPagosMensuales_transferencia` FOREIGN KEY (`cf_transferencia`) REFERENCES `fa_transferencia` (`cp_transferencia`);

--
-- Filtros para la tabla `fa_inasistencia`
--
ALTER TABLE `fa_inasistencia`
  ADD CONSTRAINT `fk_inasistencia_trabajador` FOREIGN KEY (`cf_trabajador`) REFERENCES `fa_trabajador` (`cp_trabajador`);

--
-- Filtros para la tabla `fa_liquidacion`
--
ALTER TABLE `fa_liquidacion`
  ADD CONSTRAINT `fk_liquidacion_trabajador` FOREIGN KEY (`cf_trabajador`) REFERENCES `fa_trabajador` (`cp_trabajador`);

--
-- Filtros para la tabla `fa_manipularAnexos`
--
ALTER TABLE `fa_manipularAnexos`
  ADD CONSTRAINT `fk_manipularAnexos_trabajador` FOREIGN KEY (`cf_trabajador`) REFERENCES `fa_trabajador` (`cp_trabajador`);

--
-- Filtros para la tabla `fa_menu_perfil`
--
ALTER TABLE `fa_menu_perfil`
  ADD CONSTRAINT `fk_perfil_menu` FOREIGN KEY (`cf_menu`) REFERENCES `fa_menu` (`cp_menu`),
  ADD CONSTRAINT `fk_perfil_perfil` FOREIGN KEY (`cf_perfil`) REFERENCES `fa_perfil` (`cp_perfil`);

--
-- Filtros para la tabla `fa_menu_usuario`
--
ALTER TABLE `fa_menu_usuario`
  ADD CONSTRAINT `fk_mu_menu` FOREIGN KEY (`cf_menu`) REFERENCES `fa_menu` (`cp_menu`),
  ADD CONSTRAINT `fk_mu_usuario` FOREIGN KEY (`cf_usuario`) REFERENCES `fa_usuario` (`cp_usuario`);

--
-- Filtros para la tabla `fa_modelo`
--
ALTER TABLE `fa_modelo`
  ADD CONSTRAINT `fk_modelo_marca` FOREIGN KEY (`cf_marca`) REFERENCES `fa_marca` (`cp_marca`);

--
-- Filtros para la tabla `fa_otrosantecedentes`
--
ALTER TABLE `fa_otrosantecedentes`
  ADD CONSTRAINT `fk_otrosantecedentes_cargo` FOREIGN KEY (`cf_cargo`) REFERENCES `fa_cargo` (`cp_cargo`),
  ADD CONSTRAINT `fk_otrosantecedentes_titulo` FOREIGN KEY (`cf_titulo`) REFERENCES `fa_titulo` (`cp_titulo`);

--
-- Filtros para la tabla `fa_permiso_perfil`
--
ALTER TABLE `fa_permiso_perfil`
  ADD CONSTRAINT `fk_permiso_perfil_existencia_permiso` FOREIGN KEY (`cf_existencia_permiso`) REFERENCES `fa_existencia_permiso` (`cp_existencia_permiso`),
  ADD CONSTRAINT `fk_permiso_perfil_perfil` FOREIGN KEY (`cf_perfil`) REFERENCES `fa_perfil` (`cp_perfil`);

--
-- Filtros para la tabla `fa_permiso_usuario`
--
ALTER TABLE `fa_permiso_usuario`
  ADD CONSTRAINT `fk_permiso_usuario_existencia_permiso` FOREIGN KEY (`cf_existencia_permiso`) REFERENCES `fa_existencia_permiso` (`cp_existencia_permiso`),
  ADD CONSTRAINT `fk_permiso_usuario_usuario` FOREIGN KEY (`cf_usuario`) REFERENCES `fa_usuario` (`cp_usuario`);

--
-- Filtros para la tabla `fa_prestamo`
--
ALTER TABLE `fa_prestamo`
  ADD CONSTRAINT `fk_prestamo_trabajador` FOREIGN KEY (`cf_trabajador`) REFERENCES `fa_trabajador` (`cp_trabajador`);

--
-- Filtros para la tabla `fa_remuneracion`
--
ALTER TABLE `fa_remuneracion`
  ADD CONSTRAINT `fa_remuneracion_trabajador` FOREIGN KEY (`cf_trabajador`) REFERENCES `fa_trabajador` (`cp_trabajador`);

--
-- Filtros para la tabla `fa_remuneracion_extra`
--
ALTER TABLE `fa_remuneracion_extra`
  ADD CONSTRAINT `fk_remunercionExtra_cargo` FOREIGN KEY (`cf_cargo`) REFERENCES `fa_cargo` (`cp_cargo`),
  ADD CONSTRAINT `fk_remunercionExtra_remuneracion` FOREIGN KEY (`cf_remuneracion`) REFERENCES `fa_remuneracion` (`cp_remuneracion`);

--
-- Filtros para la tabla `fa_requisitominimo_cargo`
--
ALTER TABLE `fa_requisitominimo_cargo`
  ADD CONSTRAINT `fk_requisitominimo_cargo_requisitominimo` FOREIGN KEY (`cf_requisitominimo`) REFERENCES `fa_requisitominimo` (`cp_requisitominimo`),
  ADD CONSTRAINT `fk_requsitominimo_cargo_cargo` FOREIGN KEY (`cf_cargo`) REFERENCES `fa_cargo` (`cp_cargo`);

--
-- Filtros para la tabla `fa_responsabilidad`
--
ALTER TABLE `fa_responsabilidad`
  ADD CONSTRAINT `fk_responsabilidad_cargo` FOREIGN KEY (`cf_cargo`) REFERENCES `fa_cargo` (`cp_cargo`);

--
-- Filtros para la tabla `fa_sucursal`
--
ALTER TABLE `fa_sucursal`
  ADD CONSTRAINT `fk_sucursal_ciudad` FOREIGN KEY (`cf_ciudad`) REFERENCES `fa_ciudad` (`cp_ciudad`);

--
-- Filtros para la tabla `fa_tareas_cargo`
--
ALTER TABLE `fa_tareas_cargo`
  ADD CONSTRAINT `fk_tareascargo_cargo` FOREIGN KEY (`cf_cargo`) REFERENCES `fa_cargo` (`cp_cargo`),
  ADD CONSTRAINT `fk_tareascargo_tarea` FOREIGN KEY (`cf_tarea`) REFERENCES `fa_tarea` (`cp_tarea`);

--
-- Filtros para la tabla `fa_titulo`
--
ALTER TABLE `fa_titulo`
  ADD CONSTRAINT `fk_titulo_cargo` FOREIGN KEY (`cf_cargo`) REFERENCES `fa_cargo` (`cp_cargo`);

--
-- Filtros para la tabla `fa_trabajador`
--
ALTER TABLE `fa_trabajador`
  ADD CONSTRAINT `fk_trabajador_afp` FOREIGN KEY (`cf_afp`) REFERENCES `fa_afp` (`cp_afp`),
  ADD CONSTRAINT `fk_trabajador_cargo` FOREIGN KEY (`cf_cargo`) REFERENCES `fa_cargo` (`cp_cargo`),
  ADD CONSTRAINT `fk_trabajador_ciudad` FOREIGN KEY (`cf_ciudad`) REFERENCES `fa_ciudad` (`cp_ciudad`),
  ADD CONSTRAINT `fk_trabajador_empresa` FOREIGN KEY (`cf_empresa`) REFERENCES `fa_empresa` (`cp_empresa`),
  ADD CONSTRAINT `fk_trabajador_estado` FOREIGN KEY (`cf_estado`) REFERENCES `fa_estado` (`cp_estado`),
  ADD CONSTRAINT `fk_trabajador_estadoCivil` FOREIGN KEY (`cf_estadoCivil`) REFERENCES `fa_estadoCivil` (`cp_estadoCivil`),
  ADD CONSTRAINT `fk_trabajador_nacionalidad` FOREIGN KEY (`cf_nacionalidad`) REFERENCES `fa_nacionalidad` (`cp_nacionalidad`),
  ADD CONSTRAINT `fk_trabajador_prevision` FOREIGN KEY (`cf_prevision`) REFERENCES `fa_prevision` (`cp_prevision`),
  ADD CONSTRAINT `fk_trabajador_proyecto` FOREIGN KEY (`cf_proyecto`) REFERENCES `fa_proyecto` (`cp_proyecto`),
  ADD CONSTRAINT `fk_trabajador_sucursal` FOREIGN KEY (`cf_sucursal`) REFERENCES `fa_sucursal` (`cp_sucursal`);

--
-- Filtros para la tabla `fa_transferencia`
--
ALTER TABLE `fa_transferencia`
  ADD CONSTRAINT `fk_transferencia_banco` FOREIGN KEY (`cf_banco`) REFERENCES `fa_banco` (`cp_banco`),
  ADD CONSTRAINT `fk_transferencia_trabajador` FOREIGN KEY (`cf_trabajador`) REFERENCES `fa_trabajador` (`cp_trabajador`);

--
-- Filtros para la tabla `fa_usuario`
--
ALTER TABLE `fa_usuario`
  ADD CONSTRAINT `fk_usuario_perfil` FOREIGN KEY (`cf_perfil`) REFERENCES `fa_perfil` (`cp_perfil`);

--
-- Filtros para la tabla `fa_vehiculos`
--
ALTER TABLE `fa_vehiculos`
  ADD CONSTRAINT `fk_vehiculo_marca` FOREIGN KEY (`cf_marca`) REFERENCES `fa_marca` (`cp_marca`),
  ADD CONSTRAINT `fk_vehiculo_modelo` FOREIGN KEY (`cf_modelo`) REFERENCES `fa_modelo` (`cp_modelo`),
  ADD CONSTRAINT `fk_vehiculo_tipo` FOREIGN KEY (`cf_tipo`) REFERENCES `fa_tipovehiculo` (`cp_tipovehiculo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
