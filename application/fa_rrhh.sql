-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-06-2020 a las 01:05:57
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fa_rrhh`
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

--
-- Volcado de datos para la tabla `fa_adelanto`
--

INSERT INTO `fa_adelanto` (`cp_adelanto`, `atr_tipoCuenta`, `atr_numCuenta`, `atr_monto`, `cf_banco`, `cf_trabajador`) VALUES
(0, 'cuenta vista', '153666644', 0, 7, 0),
(1, 'Cuenta Vista', '26731537', 150000, 7, 1),
(2, 'Cuenta Vista', '19105191', 150000, 7, 2),
(3, 'Cuenta Vista', '13454671', 230000, 7, 3),
(5, 'Cuenta Vista', '13787927', 50000, 7, 5),
(8, 'Cuenta Vista', '27075220', 50000, 7, 8),
(10, 'Cuenta Vista', '26950733', 150000, 7, 10),
(11, 'Cuenta Vista', '15609113', 0, 7, 11),
(12, 'Cuenta Vista', '25865954', 200000, 7, 12),
(13, 'Cuenta Vista', '26193388', 150000, 7, 13),
(14, 'Cuenta Vista', '1713350563', 100000, 1, 14),
(15, 'Cuenta Vista', '18474730', 0, 12, 15),
(16, 'Cuenta Vista', '7010870059', 0, 1, 16),
(17, 'Cuenta Vista', '18174791', 0, 7, 17),
(18, 'Cuenta Vista', '17886320', 0, 7, 18),
(19, 'Cuenta Vista', '17186383', 0, 7, 19),
(20, 'Cuenta Corriente', '68189500', 0, 1, 20),
(21, 'Cuenta Vista', '13786004', 50000, 7, 21),
(23, 'Cuenta Vista', '12519764', 100000, 7, 23),
(24, 'CHEQUERA ELECTRONICA', '1370700911', 150000, 7, 24),
(25, 'Cuenta Vista', '26191494', 30000, 7, 25),
(27, 'Cuenta Vista', '27104854', 135000, 7, 27),
(28, 'Cuenta Vista', '19472909', 150000, 7, 28),
(29, 'Cuenta Vista', '26882429', 0, 7, 29),
(30, 'Cuenta Vista', '25803368', 0, 7, 30),
(31, 'Cuenta Vista', '11707064', 0, 7, 31),
(32, 'Cuenta Vista', '18891594', 0, 7, 32),
(33, 'Cuenta Vista', '8570526', 0, 7, 33),
(34, 'Cuenta Vista', '8273690', 0, 7, 34),
(35, 'Cuenta Vista', '12131062', 0, 1, 35),
(36, 'Cuenta Vista', '12514238', 0, 7, 36),
(37, 'Cuenta Vista', '14390757', 0, 7, 37),
(38, 'Cuenta Vista', '17886328', 0, 7, 38),
(39, 'Cuenta Vista', '19105142', 0, 7, 39),
(40, 'Cuenta Vista', '10679177', 0, 7, 40),
(41, 'Cuenta Corriente', '52899411', 150000, 3, 41),
(42, 'Cuenta Vista', '7058116844', 150000, 1, 42),
(43, 'Cuenta Vista', '9004738', 100000, 7, 43),
(44, 'Cuenta Vista', '48190123807', 150000, 1, 44),
(45, 'Cuenta Vista', '16797625', 0, 7, 45),
(46, 'Cuenta Vista', '13463674', 150000, 7, 46),
(47, 'Cuenta Vista', '13040075', 150000, 7, 47),
(48, 'Cuenta Corriente', '62190526750', 0, 1, 48),
(49, 'Cuenta Vista', '18278123', 150000, 7, 49),
(50, 'Cuenta Vista', '10180526', 150000, 7, 50),
(51, 'Cuenta Vista', '19346281', 150000, 7, 51),
(52, 'Cuenta Vista', '13727467', 150000, 7, 52),
(53, 'Cuenta Vista', '188145353', 150000, 7, 53),
(54, 'Cuenta Vista', '8706194', 0, 7, 54),
(55, 'Cuenta Corriente', '53300032580', 0, 7, 55),
(56, 'Cuenta Vista', '13958811', 100000, 7, 56),
(57, 'Cuenta Vista', '9410495', 150000, 7, 57),
(58, 'Cuenta Vista', '15199305', 0, 7, 58),
(59, 'Cuenta Vista', '8294352', 0, 7, 59),
(60, 'Cuenta Vista', '16635404', 150000, 7, 60),
(61, 'Cuenta Vista', '9180197', 0, 7, 61),
(62, 'Cuenta Vista', '9892063', 0, 7, 62),
(63, 'Cuenta Vista', '10576317', 0, 7, 63),
(64, 'Cuenta Vista', '10981060', 0, 7, 64),
(65, 'Cuenta Vista', '13133671', 100000, 7, 65),
(66, 'Cuenta Vista', '17778767', 800000, 7, 66),
(67, '168718470', '16871847', 100000, 7, 67);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_afp`
--

CREATE TABLE `fa_afp` (
  `cp_afp` int(11) NOT NULL,
  `atr_nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fa_afp`
--

INSERT INTO `fa_afp` (`cp_afp`, `atr_nombre`) VALUES
(1, 'Capital'),
(2, 'Cuprum'),
(3, 'Habitat'),
(4, 'Modelo'),
(5, 'Planvital'),
(6, 'Provida'),
(7, 'UNO'),
(8, 'DIPRECA');

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

--
-- Volcado de datos para la tabla `fa_banco`
--

INSERT INTO `fa_banco` (`cp_banco`, `atr_nombre`, `atr_sitio`) VALUES
(1, 'SANTANDER', 'https://www.santander.cl/empresas/index.asp'),
(2, 'CORPBANCA', 'https://banco.itau.cl/wps/portal/newiol/web/login/!ut/p/z1/04_Sj9CPykssy0xPLMnMz0vMAfIjo8ziDVCAo4FTkJGTsYGBu7OJfjhYgb-BpauHYbCBn0WYhZmBo5-xoYungZe7QaCBfhQx-g1wAEey9KMoiMJvfLh-FFgJPh8QMqMgNzQ0wiDTEQCkd'),
(3, 'BCI', 'https://www.bci.cl/empresas/'),
(4, 'FALABELLA', 'https://www.bancofalabella.cl/home'),
(5, 'ITAU', 'https://banco.itau.cl/wps/portal/newiol/web/login/!ut/p/z1/04_Sj9CPykssy0xPLMnMz0vMAfIjo8ziDVCAo4FTkJGTsYGBu7OJfjhYgb-BpauHYbCBn0WYhZmBo5-xoYungZe7QaCBfhQx-g1wAEey9KMoiMJvfLh-FFgJPh8QMqMgNzQ0wiDTEQCkd'),
(6, 'BANCO DE CHILE', 'https://ww3.bancochile.cl/wps/wcm/connect/bch-empresas/bancodechile/empresas'),
(7, 'BANCOESTADO', 'https://empresas.bancoestado.cl/bancoestado/process.asp'),
(8, 'BANCO BICE', 'https://login.bice.cl/loginempresa/index.html'),
(9, 'SECURITY', 'https://www.bancosecurity.cl/widgets/wEmpresasLogin/index.asp'),
(10, 'CONSORCIO', 'https://www.bancoconsorcio.cl/bancaempresas/Home/Login'),
(11, 'RIPLEY', 'https://miportal.bancoripley.cl/home/login.handler#saldosConsolidados'),
(12, 'SCOTIABANK', 'https://appservtrx.scotiabank.cl/portalempresas/login'),
(13, 'COOPEUCH', 'https://www.coopeuch.cl/tef/#/'),
(14, 'EFECTIVO', NULL);

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

--
-- Volcado de datos para la tabla `fa_cargo`
--

INSERT INTO `fa_cargo` (`cp_cargo`, `atr_nombre`, `atr_jefeDirecto`, `atr_lugarTrabajo`, `atr_jornadaTrabajo`, `atr_diasTrabajo`, `cf_sucursal`) VALUES
(1, 'INFORMATICO', 'GONZALO ARAVENA', 'Los servicios se prestarán en la oficina ubicada en la 1 poniente, entre 4 y 5 norte N° 1588 de la ciudad de Talca. <br><br>Sin perjuicio de la facultad del empleador de alterar, por causa justificada, la naturaleza de los servicios o el sitio o recinto en que ellos han de prestarse, con la sola limitación de que se trate de labores similares y que el nuevo sitio o recinto que dentro de la misma localidad o ciudad.\n\n\n', 'La jornada de trabajo será de 45 horas semanales, las que serán distribuidas de lunes a viernes, de la siguiente manera: jornada de la mañana de 09:00 horas a 14:00 horas, y en la jornada de la tarde de 15:00 horas a 19:00 horas.', 'De lunes a viernes de 09:00 hasta las 19:00 horas.', 5),
(2, 'SECRETARIA ADMINISTRATIVA DE FIRMA ABOGADOS CHILE Y RENTA CAR MAULE', 'SOLANCH TEJOS CARRASCO', 'Los servicios se prestarán en la oficina ubicada en Calle Villota Nº 262  de la ciudad de Curico.\n<br><br>Sin perjuicio de la facultad del empleador de alterar, por causa justificada, la naturaleza de los servicios o el sitio o recinto en que ellos han de presentarse, especificamente el traslado de carácter temporal a las oficinas de Talca, ubicadada en 1 Poniente 4 y 5 Norte Nº 1588, o Linares, Ubicada en Calle Kurt Moller Nº 22, dependiendo de la carga de trabajo y necesidades propias del servicio debiendo el empleador en su caso solventar los gastos de viaje, bastando para dicha notificacion hacerlo llegar a saber por el medio mas idoneo posible con a lo menos 24 Hrs de  anticipacion, con la sola excepcion de que por la urgencia del traslado, no pueda operar con eficacia la comunicacion con la antelacion debida.\n', 'La jornada de trabajo será de 45 horas semanales, las que serán distribuidas de lunes a viernes, de la siguiente manera: jornada de la mañana de 09:00 horas a 14:00 horas, y en la jornada de la tarde de 15:00 horas a 19:00 horas.', 'De lunes a viernes de 09:00 hasta las 19:00 horas. ', 4),
(3, 'RECEPCIONISTA Y ADMINISTRATIVA HOSTAL PLAZA MAULE', 'DIEGO VARGAS, TERESA GARRIDO', 'Los servicios se prestarán en las dos sucursales de Hostal Plaza Maule Limitada ubicadas en 1 Sur 24 y media oriente N°3183 y 1 Sur 24 oriente N°3155 de la ciudad de Talca y en lugares establecido previamente por el empleador.\n<br><br>\nSin perjuicio de la facultad del empleador de alterar, por causa justificada, la naturaleza de los servicios o el sitio o recinto en que ellos han de prestarse, con la sola limitación de que se trate de labores similares y que el nuevo sitio o recinto que dentro de la misma localidad o ciudad.\n', 'La jornada de trabajo será de 45 horas semanales la que será distribuida de lunes a sábado, de 15:00 a 20:00 y de 21:00 a 23:30 horas.', 'lunes a sábado, de 15:00 a 20:00 y de 21:00 a 23:30 horas', 1),
(4, 'EJECUTIVO Y ENCARGADO DE FINANZAS', 'SOLANCH TEJOS, MIGUEL VARGAS', 'Los servicios se prestarán en la oficina ubicada en la 1 poniente, entre 4 y 5 norte N° 1588 de la ciudad de Talca.<br><br>\nSin perjuicio de la facultad del empleador de alterar, por causa justificada, la naturaleza de los servicios o el sitio o recinto en que ellos han de prestarse, con la sola limitación de que se trate de labores similares y que el nuevo sitio o recinto que dentro de la misma localidad o ciudad.\n\n', 'La jornada de trabajo será de 45 horas semanales, las que serán distribuidas de lunes a viernes, de la siguiente manera: jornada de la mañana de 09:00 horas a 14:00 horas, y en la jornada de la tarde de 15:00 horas a 19:00 horas.', 'De lunes a viernes de 09:00 hasta las 19:00 horas. ', 1),
(6, 'EJECUTIVO DE CAPTACIÓN DE CLIENTES Y ADMINISTRATIVO', 'NELVIS VILLALOBOS', 'Los servicios se prestarán en la oficina ubicada en la 1 poniente, entre 4 y 5 norte N° 1588 de la ciudad de Talca.<br><br>\nSin perjuicio de la facultad del empleador de alterar, por causa justificada, la naturaleza de los servicios o el sitio o recinto en que ellos han de prestarse, con la sola limitación de que se trate de labores similares y que el nuevo sitio o recinto que dentro de la misma localidad o ciudad.\n', 'La jornada de trabajo sera de 45 horas semanales, distribuidos de la siguiente manera: de lunes a viernes de  9:00 a 14:00 y de 15:00 a 19:00', 'lunes a viernes de  9:00 a 14:00 y de 15:00 a 19:00', 1),
(7, 'AUXILIAR DE ASEO HOSTAL PLAZA MAULE', 'DIEGO VARGAS ', 'Los servicios se prestarán en las dos sucursales de Hostal Plaza Maule Limitada ubicadas en 1 Sur 24 y media oriente N°3183 y 1 Sur 24 oriente N°3155 de la ciudad de Talca. ', 'La jornada de trabajo será de lunes a sábados de la siguiente manera:  de 07:30 horas a 16:00 horas ', 'Lunes a sábados de la siguiente manera:  de 07:30 horas a 16:00 horas, ', 1),
(8, 'CARTERO', 'EVELYN GALLEGOS', 'Los servicios se prestarán en la oficina ubicada en la 1 poniente, entre 4 y 5 norte N° 1588 de la ciudad de Talca.\n<br><br>\nSin perjuicio de la facultad del empleador de alterar, por causa justificada, la naturaleza de los servicios o el sitio o recinto en que ellos han de prestarse, con la sola limitación de que se trate de labores similares y que el nuevo sitio o recinto que dentro de la misma localidad o ciudad.\n', 'La jornada de trabajo será de 45 horas semanales la que será distribuida de lunes a viernes, de 09:00 a 14:00 y de 15:00 a 19:00 horas.', 'lunes a viernes, de 09:00 a 14:00 y de 15:00 a 19:00 horas.', 1),
(9, 'EJECUTIVO DE LICITACIONES PUBLICAS Y PRIVADAS', 'SOLANCH TEJOS CARRASCO', 'Los servicios se prestarán en la oficina ubicada en la 1 poniente, entre 4 y 5 norte N° 1588 de la ciudad de Talca.\n<br><br>\nSin perjuicio de la facultad del empleador de alterar, por causa justificada, la naturaleza de los servicios o el sitio o recinto en que ellos han de prestarse, con la sola limitación de que se trate de labores similares y que el nuevo sitio o recinto que dentro de la misma localidad o ciudad.\n\n', 'La jornada de trabajo será de 45 horas semanales la que será distribuida de lunes a viernes, de 09:00 a 14:00 y de 15:00 a 19:00 horas.', 'Lunes a viernes, de 09:00 a 14:00 y de 15:00 a 19:00 horas.', 1),
(10, 'RECEPCIONISTA ADMINISTRATIVA RENT A CAR MAULE', 'DIEGO VARGAS, MIGUEL VARGAS, SOLANCH TEJOS', 'Los servicios se prestarán en la oficina ubicada en la Calle 2 Norte 22 y 23 Oriente N°3030 de la ciudad de Talca.<br><br>\nSin perjuicio de la facultad del empleador de alterar, por causa justificada, la naturaleza de los servicios o el sitio o recinto en que ellos han de presentarse, específicamente el traslado de carácter temporal a las oficinas de Curico, ubicada en la Calle Villota N° 262 o Linares, Ubicada en Calle Kurt Moller Nº 22, dependiendo de la carga de trabajo y necesidades propias del servicio debiendo el empleador en su caso solventar los gastos de viaje, bastando para dicha notificación hacerlo llegar a saber por el medio más idóneo posible con a lo menos 24 Hrs de  anticipación, con la sola excepción de que por la urgencia del traslado, no pueda operar con eficacia la comunicación con la antelación debida.\n', 'La jornada de trabajo será de 45 horas semanales la que será distribuida de lunes a viernes, de 09:00 a 14:00 y de 15:00 a 18:00 horas y los días sábado desde las 9:00 horas hasta las 14:00 horas', 'Lunes a viernes, de 09:00 a 14:00 y de 15:00 a 18:00 horas y los días sábado desde las 9:00 horas hasta las 14:00 horas', 1),
(11, 'SECRETARIA ADMINISTRATIVA DE FIRMA ABOGADOS CHILE', 'DIRECTIVA EN GENERAL', 'Los servicios se prestarán en la oficina ubicada en la 1 poniente, entre 4 y 5 norte N° 1588 de la ciudad de Talca.\n<br><br>\nSin perjuicio de la facultad del empleador de alterar, por causa justificada, la naturaleza de los servicios o el sitio o recinto en que ellos han de prestarse, con la sola limitación de que se trate de labores similares y que el nuevo sitio o recinto que dentro de la misma localidad o ciudad.\n', 'La jornada de trabajo será de 45 horas semanales la que será distribuida de lunes a viernes, de 09:00 a 14:00 y de 15:00 a 19:00 horas.', 'Lunes a viernes, de 09:00 a 14:00 y de 15:00 a 19:00 horas.', 1),
(12, 'ENCARGADA DE ASEO Y MANTENIMIENTO GENERAL A LAS DEPDENCENCIAS DEL GRUPO FIRMA', 'MIGUEL  VARGAS, SOLANCH TEJOS', 'Los servicios se prestarán en la oficina ubicada en:\nI.	1 sur, 24 oriente #3155, Hostal Plaza Maule. \nII.	22 Norte #3030 Renta Car Maule.\nIII.	1 poniente 4 y 5 Norte #1588 Firma Abogados Chile . \nIV.	Calle Villota #262 – Firma Abogados Chile – Renta Car Maule. Curico\nV.	Calle Kurt Moller #22 – Firma Abogados Chile –Renta Car Maule. Linares \n\nSin perjuicio de la facultad del empleador de alterar, por causa justificada, la naturaleza de los servicios o el sitio o recinto en que ellos han de prestarse, con la sola limitación de que se trate de labores similares y que el nuevo sitio o recinto que dentro de la misma localidad o ciudad.\n', 'La jornada de trabajo será de 45 horas semanales la que será distribuida de lunes a viernes, de 09:00 a 14:00 y de 15:00 a 19:00 horas.', 'Lunes a viernes, de 09:00 a 14:00 y de 15:00 a 19:00 horas.', 4),
(13, 'AUXILIAR DE ASEO, DÍA DOMINGO HOSTAL PLAZA MAULE', 'TERESA GARRIDO, MIGUEL VARGAS, DIEGO VARGAS', 'Los servicios serán prestados en la 1 sur, 24 oriente #3155, Hostal Plaza Maule. ', 'Días domingo : desde las 08:00 horas a 22:00 horas  ', 'Domingo : desde las 08:00 horas a 22:00 horas ', 1),
(14, 'MAESTRO EN CONSTRUCCIÓN', 'DIEGO VARGAS, MIGUEL VARGAS', 'Los servicios se prestarán en la oficina ubicada en la 1 poniente, entre 4 y 5 norte N° 1588 de la ciudad de Talca.<br><br>\nSin perjuicio de la facultad del empleador de alterar, por causa justificada, la naturaleza de los servicios o el sitio o recinto en que ellos han de prestarse, con la sola limitación de que se trate de labores similares y que el nuevo sitio o recinto que dentro de la misma localidad o ciudad\n', 'La jornada de trabajo será de 45 horas semanales la que será distribuida de lunes a viernes, de 09:00 a 14:00 y de 15:00 a 19:00 horas.', 'Lunes a viernes, de 09:00 a 14:00 y de 15:00 a 19:00 horas.', 1),
(15, 'RECEPCIONISTA ADMINISTRATIVO HOSTAL PLAZA MAULE (NOCHE VIERNES Y SABADOS)', 'TERESA GARRIDO, DIEGO VARGAS', 'HOSTAL PLAZA MAULE, 1 SUR 24 ORIENTE #3155', 'Turno de Noche: desde las 23:30 hrs a 8:30 hrs.', 'Viernes y sabados', 1),
(16, 'JEFE DE OPERACIONES', 'DIEGO VARGAS, MIGUEL VARGAS', 'Los servicios se prestarán en la oficina ubicada en la 1 poniente, entre 4 y 5 norte N° 1588 de la ciudad de Talca.<br><br>\nSin perjuicio de la facultad del empleador de alterar, por causa justificada, la naturaleza de los servicios o el sitio o recinto en que ellos han de prestarse, con la sola limitación de que se trate de labores similares y que el nuevo sitio o recinto que dentro de la misma localidad o ciudad\n', 'La jornada de trabajo será de 45 horas semanales, las que serán distribuidas de lunes a viernes, de la siguiente manera: jornada de la mañana de 09:00 horas a 14:00 horas, y en la jornada de la tarde de 15:00 horas a 19:00 horas.', 'De lunes a viernes de 09:00 hasta las 19:00 horas. ', 1),
(17, 'CONDUCTOR', 'DIRECTIVA EN GENERAL', 'Los servicios se prestarán en la VII Región del Maule, ciudades, provincias y comunas; viajes que susciten salir fuera de la región.\n<br><br>\nSin perjuicio de la facultad del empleador de alterar, por causa justificada, la naturaleza de los servicios o el sitio o recinto en que ellos han de prestarse, con la sola limitación de que se trate de labores similares y que el nuevo sitio o recinto que dentro de la misma localidad o ciudad.\n', 'La jornada de trabajo será de 45 horas semanales la que será distribuida de lunes a viernes, distribuido de la siguiente manera: jornada de la mañana de 8:00 horas a 13:00 horas, en la jornada de la tarde de 14:00 a 18:00 horas  ', 'Lunes a viernes, distribuido de la siguiente manera: jornada de la mañana de 8:00 horas a 13:00 horas, en la jornada de la tarde de 14:00 a 18:00 horas  ', 1),
(18, 'MANIPULADORA DE ALIMENTOS/GARZONA', 'TERESA GARRIDO, DIEGO VARGAS', 'Los servicios deberán ser prestado en Hostal Plaza Maule, 1 Sur 24 Oriente #3183', 'Lunes a Viernes de 18:00 hrs a 22:00 hrs.', 'Lunes a Viernes de 18:00 hrs a 22:00 hrs.', 1),
(19, 'ABOGADO PROCURADOR', 'MIGUEL VARGAS', 'Los servicios se prestarán en la 1 poniente entre 4 y 5 norte N°1588 de la ciudad de Talca. La jornada de trabajo será de 45 horas semanales, las que serán distribuidas de lunes a viernes, de la siguiente manera: jornada de la mañana de 09:00 horas a 14:00 horas, y en la jornada de la tarde de 15:00 horas a 19:00 horas.', 'La jornada de trabajo será de 45 horas semanales, las que serán distribuidas de lunes a viernes, de la siguiente manera: jornada de la mañana de 09:00 horas a 14:00 horas, y en la jornada de la tarde de 15:00 horas a 19:00 horas.', 'De lunes a viernes de 09:00 hasta las 19:00 horas. Sábados de 09:00 a 14:00 horas', 5),
(20, 'ASISTENTE ADMINISTRATIVO', 'EVELYN GALLEGOS, NELVIS VILLALOBOS', '1 poniente entre 4 y 5 norte N°1588', 'Jornada de trabajo de 45 horas semanales, de Lunes a Viernes: jornada en la mañana: desde las 9:00 hrs a las 13:00 hrs, jornada en la tarde:  desde las  14:00 hrs a las 19:00 hrs', 'Lunes a Viernes: jornada en la mañana: desde las 9:00 hrs a las 13:00 hrs, jornada en la tarde:  desde las  14:00 hrs a las 19:00 hrs', 2),
(21, 'GERENTE', 'MIGUEL VARGAS', 'Los servicios se prestarán en la 1 poniente entre 4 y 5 norte N°1588, talca. La jornada de trabajo será de 45 horas semanales, las que serán distribuidas de lunes a viernes, de la siguiente manera: jornada de la mañana de 09:00 horas a 14:00 horas, y en la jornada de la tarde de 15:00 horas a 19:00 horas.', 'Por la naturaleza de los servicios prestados, se enmarcan dentro de los establecido en el inciso segundo del articulo 22 del Código de Trabajo.', 'Por la naturaleza de los servicios prestados, se enmarcan dentro de los establecido en el inciso segundo del articulo 22 del Código de Trabajo.', 5),
(22, 'CONTRALORA', 'MIGUEL VARGAS', 'Los servicios se prestaran en la 1 poniente entre 4 y 5 norte N° 1588, Talca', 'la jornada de trabajo sera de 45 horas semanales que seran distribuidas de lunes a viernes desde las 09:00 hrs a las 14:00 hrs y de 15: 00 hrs a las 19:00 hrs', ' lunes a viernes desde las 09:00 hrs a las 14:00 hrs y de 15: 00 hrs a las 19:00 hrs', 5),
(31, 'GUARDIA DE VIGILANCIA MOVIL ', 'DIEGO VARGAS ', 'Los servicios se prestarán en San Pedro de la paz y los cuadrantes asociados, estableciendo los canelos Nº60 como base de distribución de las unidades a los distintos cuadrantes de San Pedro de la Paz. ', 'La jornada de trabajo será de 12 horas diarias que sera distribuido en un sistema de turno 4x4 rotativo ,en 2 jornadas de trabajo que se enmarcaran de la siguiente manera. \nTurno Dia  08:00 horas a 20:00 horas \nTurno Noche 20:00 horas a 08:00 horas.', 'Turno 4x4 Rotativo.', 4),
(32, 'ASESORA JURIDICO Y ADMINISTRATIVO', 'MIGUEL VARGAS', 'Los servicios se prestarán en la siguiente sucursal: 2 norte, 22 y 23 oriente N°3030, Talca', 'La jornada de trabajo será de 45 horas semanales, las que serán distribuidas de lunes a viernes, de la siguiente manera: jornada de la mañana de 09:00 horas a 14:00 horas, y en la jornada de la tarde de 15:00 horas a 19:00 horas.', 'De lunes a viernes de 09:00 hasta las 19:00 horas. Sábados de 09:00 a 14:00 horas', 2),
(33, 'PROGRAMADORES ', 'MIGUEL VARGAS - GONZALO OLIVIER. ', 'Los servicios se prestarán en 1 Poniente 4 y 5 Norte . ', 'La jornada de trabajo será de 45 horas semanales, las que serán distribuidas de lunes a viernes, de la siguiente manera: jornada de la mañana de 09:00 horas a 14:00 horas, y en la jornada de la tarde de 15:00 horas a 19:00 horas.', ' Lunes a viernes ', 2),
(34, 'CONDUCTOR HOSDOM SANTIAGO', 'DIEGO VARGAS ', '', '', '', 11),
(35, 'GUARDIA DE SEGURIDAD MOVIL ', 'DIEGO VARGAS ', '', '', '', 12),
(36, 'CAPTADOR DE CLIENTES Y OPERACIONES ', 'NELVIS VILLALOVOS ', '', '', '', 5),
(37, 'EJECUTIVO CAPTADOR Y OPERACIONES ', 'NELVIS VILLALOBOS .', '', '', '', 5);

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

--
-- Volcado de datos para la tabla `fa_cartaamonestacion`
--

INSERT INTO `fa_cartaamonestacion` (`cp_cartaAmonestacion`, `atr_motivo`, `atr_grado`, `atr_fecha`, `cf_trabajador`) VALUES
('Z_0RTN04574650', ' 1.	No cumplió la labor encomendada consistente en la acreditación de la empresa en varias series como oferente para futuras licitaciones o proyecciones de negocios de sus empleadores, todas estas act', 'Menor', '2020-05-25', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_cartaaviso`
--

CREATE TABLE `fa_cartaaviso` (
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

--
-- Volcado de datos para la tabla `fa_ciudad`
--

INSERT INTO `fa_ciudad` (`cp_ciudad`, `atr_nombre`) VALUES
(1, 'Arica'),
(2, 'Camarones'),
(3, 'General Lagos'),
(4, 'Putre'),
(5, 'Alto Hospicio'),
(6, 'Iquique'),
(7, 'Camiña'),
(8, 'Colchane'),
(9, 'Huara'),
(10, 'Pica'),
(11, 'Pozo Almonte'),
(12, 'Tocopilla'),
(13, 'María Elena'),
(14, 'Calama'),
(15, 'Ollague'),
(16, 'San Pedro de Atacama'),
(17, 'Antofagasta'),
(18, 'Mejillones'),
(19, 'Sierra Gorda'),
(20, 'Taltal'),
(21, 'Chañaral'),
(22, 'Diego de Almagro'),
(23, 'Copiapó'),
(24, 'Caldera'),
(25, 'Tierra Amarilla'),
(26, 'Vallenar'),
(27, 'Alto del Carmen'),
(28, 'Freirina'),
(29, 'Huasco'),
(30, 'La Serena'),
(31, 'Coquimbo'),
(32, 'Andacollo'),
(33, 'La Higuera'),
(34, 'Paihuano'),
(35, 'Vicuña'),
(36, 'Ovalle'),
(37, 'Combarbalá'),
(38, 'Monte Patria'),
(39, 'Punitaqui'),
(40, 'Río Hurtado'),
(41, 'Illapel'),
(42, 'Canela'),
(43, 'Los Vilos'),
(44, 'Salamanca'),
(45, 'La Ligua'),
(46, 'Cabildo'),
(47, 'Zapallar'),
(48, 'Papudo'),
(49, 'Petorca'),
(50, 'Los Andes'),
(51, 'San Esteban'),
(52, 'Calle Larga'),
(53, 'Rinconada'),
(54, 'San Felipe'),
(55, 'Llaillay'),
(56, 'Putaendo'),
(57, 'Santa María'),
(58, 'Catemu'),
(59, 'Panquehue'),
(60, 'Quillota'),
(61, 'La Cruz'),
(62, 'La Calera'),
(63, 'Nogales'),
(64, 'Hijuelas'),
(65, 'Valparaíso'),
(66, 'Viña del Mar'),
(67, 'Concón'),
(68, 'Quintero'),
(69, 'Puchuncaví'),
(70, 'Casablanca'),
(71, 'Juan Fernández'),
(72, 'San Antonio'),
(73, 'Cartagena'),
(74, 'El Tabo'),
(75, 'El Quisco'),
(76, 'Algarrobo'),
(77, 'Santo Domingo'),
(78, 'Isla de Pascua'),
(79, 'Quilpué'),
(80, 'Limache'),
(81, 'Olmué'),
(82, 'Villa Alemana'),
(83, 'Colina'),
(84, 'Lampa'),
(85, 'Tiltil'),
(86, 'Santiago'),
(87, 'Vitacura'),
(88, 'San Ramón'),
(89, 'San Miguel'),
(90, 'San Joaquín'),
(91, 'Renca'),
(92, 'Recoleta'),
(93, 'Quinta Normal'),
(94, 'Quilicura'),
(95, 'Pudahuel'),
(96, 'Providencia'),
(97, 'Peñalolén'),
(98, 'Pedro Aguirre Cerda'),
(99, 'Ñuñoa'),
(100, 'Maipú'),
(101, 'Macul'),
(102, 'Lo Prado'),
(103, 'Lo Espejo'),
(104, 'Lo Barnechea'),
(105, 'Las Condes'),
(106, 'La Reina'),
(107, 'La Pintana'),
(108, 'La Granja'),
(109, 'La Florida'),
(110, 'La Cisterna'),
(111, 'Independencia'),
(112, 'Huechuraba'),
(113, 'Estación Central'),
(114, 'El Bosque'),
(115, 'Conchalí'),
(116, 'Cerro Navia'),
(117, 'Cerrillos'),
(118, 'Puente Alto'),
(119, 'San José de Maipo'),
(120, 'Pirque'),
(121, 'San Bernardo'),
(122, 'Buin'),
(123, 'Paine'),
(124, 'Calera de Tango'),
(125, 'Melipilla'),
(126, 'Alhué'),
(127, 'Curacaví'),
(128, 'María Pinto'),
(129, 'San Pedro'),
(130, 'Isla de Maipo'),
(131, 'El Monte'),
(132, 'Padre Hurtado'),
(133, 'Peñaflor'),
(134, 'Talagante'),
(135, 'Codegua'),
(136, 'Coínco'),
(137, 'Coltauco'),
(138, 'Doñihue'),
(139, 'Graneros'),
(140, 'Las Cabras'),
(141, 'Machalí'),
(142, 'Malloa'),
(143, 'Mostazal'),
(144, 'Olivar'),
(145, 'Peumo'),
(146, 'Pichidegua'),
(147, 'Quinta de Tilcoco'),
(148, 'Rancagua'),
(149, 'Rengo'),
(150, 'Requínoa'),
(151, 'San Vicente de Tagua Tagua'),
(152, 'Chépica'),
(153, 'Chimbarongo'),
(154, 'Lolol'),
(155, 'Nancagua'),
(156, 'Palmilla'),
(157, 'Peralillo'),
(158, 'Placilla'),
(159, 'Pumanque'),
(160, 'San Fernando'),
(161, 'Santa Cruz'),
(162, 'La Estrella'),
(163, 'Litueche'),
(164, 'Marchigüe'),
(165, 'Navidad'),
(166, 'Paredones'),
(167, 'Pichilemu'),
(168, 'Curicó'),
(169, 'Hualañé'),
(170, 'Licantén'),
(171, 'Molina'),
(172, 'Rauco'),
(173, 'Romeral'),
(174, 'Sagrada Familia'),
(175, 'Teno'),
(176, 'Vichuquén'),
(177, 'Talca'),
(178, 'San Clemente'),
(179, 'Pelarco'),
(180, 'Pencahue'),
(181, 'Maule'),
(182, 'San Rafael'),
(183, 'Curepto'),
(184, 'Constitución'),
(185, 'Empedrado'),
(186, 'Río Claro'),
(187, 'Linares'),
(188, 'San Javier'),
(189, 'Parral'),
(190, 'Villa Alegre'),
(191, 'Longaví'),
(192, 'Colbún'),
(193, 'Retiro'),
(194, 'Yerbas Buenas'),
(195, 'Cauquenes'),
(196, 'Chanco'),
(197, 'Pelluhue'),
(198, 'Bulnes'),
(199, 'Chillán'),
(200, 'Chillán Viejo'),
(201, 'El Carmen'),
(202, 'Pemuco'),
(203, 'Pinto'),
(204, 'Quillón'),
(205, 'San Ignacio'),
(206, 'Yungay'),
(207, 'Cobquecura'),
(208, 'Coelemu'),
(209, 'Ninhue'),
(210, 'Portezuelo'),
(211, 'Quirihue'),
(212, 'Ránquil'),
(213, 'Treguaco'),
(214, 'San Carlos'),
(215, 'Coihueco'),
(216, 'San Nicolás'),
(217, 'Ñiquén'),
(218, 'San Fabián'),
(219, 'Alto Biobío'),
(220, 'Antuco'),
(221, 'Cabrero'),
(222, 'Laja'),
(223, 'Los Ángeles'),
(224, 'Mulchén'),
(225, 'Nacimiento'),
(226, 'Negrete'),
(227, 'Quilaco'),
(228, 'Quilleco'),
(229, 'San Rosendo'),
(230, 'Santa Bárbara'),
(231, 'Tucapel'),
(232, 'Yumbel'),
(233, 'Concepción'),
(234, 'Coronel'),
(235, 'Chiguayante'),
(236, 'Florida'),
(237, 'Hualpén'),
(238, 'Hualqui'),
(239, 'Lota'),
(240, 'Penco'),
(241, 'San Pedro de La Paz'),
(242, 'Santa Juana'),
(243, 'Talcahuano'),
(244, 'Tomé'),
(245, 'Arauco'),
(246, 'Cañete'),
(247, 'Contulmo'),
(248, 'Curanilahue'),
(249, 'Lebu'),
(250, 'Los Álamos'),
(251, 'Tirúa'),
(252, 'Angol'),
(253, 'Collipulli'),
(254, 'Curacautín'),
(255, 'Ercilla'),
(256, 'Lonquimay'),
(257, 'Los Sauces'),
(258, 'Lumaco'),
(259, 'Purén'),
(260, 'Renaico'),
(261, 'Traiguén'),
(262, 'Victoria'),
(263, 'Temuco'),
(264, 'Carahue'),
(265, 'Cholchol'),
(266, 'Cunco'),
(267, 'Curarrehue'),
(268, 'Freire'),
(269, 'Galvarino'),
(270, 'Gorbea'),
(271, 'Lautaro'),
(272, 'Loncoche'),
(273, 'Melipeuco'),
(274, 'Nueva Imperial'),
(275, 'Padre Las Casas'),
(276, 'Perquenco'),
(277, 'Pitrufquén'),
(278, 'Pucón'),
(279, 'Saavedra'),
(280, 'Teodoro Schmidt'),
(281, 'Toltén'),
(282, 'Vilcún'),
(283, 'Villarrica'),
(284, 'Valdivia'),
(285, 'Corral'),
(286, 'Lanco'),
(287, 'Los Lagos'),
(288, 'Máfil'),
(289, 'Mariquina'),
(290, 'Paillaco'),
(291, 'Panguipulli'),
(292, 'La Unión'),
(293, 'Futrono'),
(294, 'Lago Ranco'),
(295, 'Río Bueno'),
(296, 'Osorno'),
(297, 'Puerto Octay'),
(298, 'Purranque'),
(299, 'Puyehue'),
(300, 'Río Negro'),
(301, 'San Juan de la Costa'),
(302, 'San Pablo'),
(303, 'Calbuco'),
(304, 'Cochamó'),
(305, 'Fresia'),
(306, 'Frutillar'),
(307, 'Llanquihue'),
(308, 'Los Muermos'),
(309, 'Maullín'),
(310, 'Puerto Montt'),
(311, 'Puerto Varas'),
(312, 'Ancud'),
(313, 'Castro'),
(314, 'Chonchi'),
(315, 'Curaco de Vélez'),
(316, 'Dalcahue'),
(317, 'Puqueldón'),
(318, 'Queilén'),
(319, 'Quellón'),
(320, 'Quemchi'),
(321, 'Quinchao'),
(322, 'Chaitén'),
(323, 'Futaleufú'),
(324, 'Hualaihué'),
(325, 'Palena'),
(326, 'Lago Verde'),
(327, 'Coihaique'),
(328, 'Aysén'),
(329, 'Cisnes'),
(330, 'Guaitecas'),
(331, 'Río Ibáñez'),
(332, 'Chile Chico'),
(333, 'Cochrane'),
(334, 'Higgins'),
(335, 'Tortel'),
(336, 'Natales'),
(337, 'Torres del Paine'),
(338, 'Laguna Blanca'),
(339, 'Punta Arenas'),
(340, 'Río Verde'),
(341, 'San Gregorio'),
(342, 'Porvenir'),
(343, 'Primavera'),
(344, 'Timaukel'),
(345, 'Cabo de Hornos'),
(346, 'Antártica');

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

--
-- Volcado de datos para la tabla `fa_contrato`
--

INSERT INTO `fa_contrato` (`cp_contrato`, `atr_fechaInicio`, `atr_fechaTermino`, `cf_cargo`, `cf_trabajador`) VALUES
('WT96QF9391070', '2020-05-18', '1969-12-31', 36, 72);

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

--
-- Volcado de datos para la tabla `fa_detalle_prestamo`
--

INSERT INTO `fa_detalle_prestamo` (`cp_detale_prestamo`, `atr_numCuota`, `atr_montoDescontar`, `atr_fechaDescuento`, `atr_estado`, `cf_prestamo`) VALUES
(42, 1, 20000, '2020-06-05', 0, 43),
(43, 1, 41500, '2020-06-05', 0, 44),
(44, 2, 41500, '2020-07-05', 0, 44),
(45, 1, 34500, '2020-06-05', 0, 45),
(46, 2, 34500, '2020-07-05', 0, 45),
(47, 1, 100, '2020-06-05', 0, 46),
(48, 2, 100, '2020-07-05', 0, 46),
(49, 5, 100, '2020-10-05', 0, 46),
(50, 3, 100, '2020-08-05', 0, 46),
(51, 4, 100, '2020-09-05', 0, 46),
(52, 7, 100, '2020-12-05', 0, 46),
(53, 6, 100, '2020-11-05', 0, 46),
(54, 10, 98, '2021-03-05', 0, 46),
(55, 8, 100, '2021-01-05', 0, 46),
(56, 9, 100, '2021-02-05', 0, 46),
(57, 1, 33333, '2020-04-05', 0, 47),
(58, 2, 33333, '2020-05-05', 0, 47),
(59, 3, 33333, '2020-06-05', 0, 47),
(60, 1, 42500, '2020-06-05', 0, 48),
(61, 2, 42500, '2020-07-05', 0, 48),
(62, 1, 23281, '2020-03-05', 0, 49),
(63, 3, 23281, '2020-05-05', 0, 49),
(64, 2, 23281, '2020-04-05', 0, 49),
(65, 4, 23281, '2020-06-05', 0, 49),
(66, 1, 19440, '2020-07-05', 0, 50),
(67, 1, 10000, '2020-06-05', 0, 51),
(68, 5, 10000, '2020-07-05', 0, 51),
(69, 2, 10000, '2020-08-05', 0, 51),
(70, 3, 10000, '2020-09-05', 0, 51),
(71, 4, 10000, '2020-10-05', 0, 51),
(72, 7, 10000, '2020-11-05', 0, 51),
(73, 9, 10000, '2020-12-05', 0, 51),
(74, 10, 10000, '2021-01-05', 0, 51),
(75, 6, 10000, '2021-02-05', 0, 51),
(76, 8, 10000, '2021-03-05', 0, 51);

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
  `cf_trabajador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fa_documento`
--

INSERT INTO `fa_documento` (`cp_documento`, `atr_nombreDoc`, `atr_nombreReal`, `atr_ruta`, `atr_fechaCarga`, `atr_tipo`, `atr_fechacronologica`, `cf_contrato`, `cf_anexo`, `cf_transferencia`, `cf_cartaamonestacion`, `cf_liquidacion`, `cf_finiquito`, `cf_cartaAviso`, `cf_trabajador`) VALUES
(1, '10a4c48445fb032efbb12b50879183ec.pdf', 'certificadoPago_(57).pdf', '/var/www/html/imlchile.cl/grupofirma/uploads/transferencias/', '25-05-2020 11:46:12', 'Adelanto', '2020-05-20', NULL, NULL, 'DG62XK09594660', NULL, NULL, NULL, NULL, 1),
(2, '4b87c9194e26a5b0a2317dbca4002838.pdf', 'certificadoPago_(58).pdf', '/var/www/html/imlchile.cl/grupofirma/uploads/transferencias/', '25-05-2020 11:50:30', 'Adelanto', '2020-05-20', NULL, NULL, 'Z_0RTN03340521', NULL, NULL, NULL, NULL, 5),
(6, '99094250adc610ce75860763e95b75aa.pdf', 'certificadoPago_(60).pdf', '/var/www/html/imlchile.cl/grupofirma/uploads/transferencias/', '25-05-2020 11:54:26', 'Adelanto', '2020-05-20', NULL, NULL, 'IF72LE0753655', NULL, NULL, NULL, NULL, 10),
(7, '7251d8263542289b9aee065b2ac57329.pdf', 'certificadoPago_(61).pdf', '/var/www/html/imlchile.cl/grupofirma/uploads/transferencias/', '25-05-2020 11:56:01', 'Adelanto', '2020-05-20', NULL, NULL, 'DG62XK0533056', NULL, NULL, NULL, NULL, 12),
(8, 'f49e80478abca48b60257fc2ee11f20a.pdf', 'certificadoPago_(62).pdf', '/var/www/html/imlchile.cl/grupofirma/uploads/transferencias/', '25-05-2020 11:57:22', 'Adelanto', '2020-05-20', NULL, NULL, 'DG62XK01057057', NULL, NULL, NULL, NULL, 13),
(9, 'd5c56ffdd283d0400b8bec383ff7fe09.pdf', 'certificadoPago_(63).pdf', '/var/www/html/imlchile.cl/grupofirma/uploads/transferencias/', '25-05-2020 12:04:44', 'Adelanto', '2020-05-20', NULL, NULL, 'Z_0RTN01394985', NULL, NULL, NULL, NULL, 14),
(10, '448b5963cdfcb075e9d86614000af718.pdf', 'certificadoPago_(64).pdf', '/var/www/html/imlchile.cl/grupofirma/uploads/transferencias/', '25-05-2020 12:09:18', 'Adelanto', '2020-05-20', NULL, NULL, 'NR70RG02958316', NULL, NULL, NULL, NULL, 2),
(11, '96edfe0ea3529969ae6145492ae6a28e.pdf', 'certificadoPago_(66).pdf', '/var/www/html/imlchile.cl/grupofirma/uploads/transferencias/', '25-05-2020 12:15:39', 'Adelanto', '2020-05-20', NULL, NULL, 'IF72LE07861467', NULL, NULL, NULL, NULL, 25),
(12, 'a09c470adf2a2d924a90f33e2a698cbe.pdf', 'certificadoPago_(67).pdf', '/var/www/html/imlchile.cl/grupofirma/uploads/transferencias/', '25-05-2020 12:18:08', 'Adelanto', '2020-05-20', NULL, NULL, 'IF72LE05827038', NULL, NULL, NULL, NULL, 66),
(13, 'ae9e9020c1cb6eee19101eca61aee3fb.pdf', 'certificadoPago_(68).pdf', '/var/www/html/imlchile.cl/grupofirma/uploads/transferencias/', '25-05-2020 12:19:53', 'Adelanto', '2020-05-20', NULL, NULL, 'VF88JP008362429', NULL, NULL, NULL, NULL, 21),
(14, '7bbdb2ca24d0622cd617ab63d59037cb.pdf', 'certificadoPago_(69).pdf', '/var/www/html/imlchile.cl/grupofirma/uploads/transferencias/', '25-05-2020 12:21:01', 'Adelanto', '2020-05-20', NULL, NULL, 'E077ES070418610', NULL, NULL, NULL, NULL, 23),
(15, '291834f6c24adcbf644f45313af23629.pdf', 'certificadoPago_(70).pdf', '/var/www/html/imlchile.cl/grupofirma/uploads/transferencias/', '25-05-2020 12:22:10', 'Adelanto', '2020-05-20', NULL, NULL, 'VP59FY096501511', NULL, NULL, NULL, NULL, 24),
(16, '91b3f0856bf51364fc7355f79b31ce7f.pdf', 'DetalleNominaCirculodePagos_(38).pdf', '/var/www/html/imlchile.cl/grupofirma/uploads/transferencias/', '25-05-2020 12:24:35', 'Adelanto', '2020-05-20', NULL, NULL, 'DG62XK026499812', NULL, NULL, NULL, NULL, 41),
(17, '905e2268563739cd93c023e2d3807997.pdf', 'DetalleNominaCirculodePagos_(39).pdf', '/var/www/html/imlchile.cl/grupofirma/uploads/transferencias/', '25-05-2020 12:26:05', 'Adelanto', '2020-05-20', NULL, NULL, 'IF72LE072118213', NULL, NULL, NULL, NULL, 42),
(18, 'f3d1e282820cda9b3fce81fedb4f4c7c.pdf', 'DetalleNominaCirculodePagos_(40).pdf', '/var/www/html/imlchile.cl/grupofirma/uploads/transferencias/', '25-05-2020 12:27:32', 'Adelanto', '2020-05-20', NULL, NULL, 'VF88JP0038758414', NULL, NULL, NULL, NULL, 43),
(19, 'effc04916a17475d4742cb3f77074abb.pdf', 'DetalleNominaCirculodePagos_(41).pdf', '/var/www/html/imlchile.cl/grupofirma/uploads/transferencias/', '25-05-2020 12:29:01', 'Adelanto', '2020-05-20', NULL, NULL, 'VP59FY014171015', NULL, NULL, NULL, NULL, 44),
(20, 'c1ad64250890dcf3f935ba29ee0fd786.pdf', 'DetalleNominaCirculodePagos_(42).pdf', '/var/www/html/imlchile.cl/grupofirma/uploads/transferencias/', '25-05-2020 12:30:29', 'Adelanto', '2020-05-20', NULL, NULL, 'TJ12BX099085616', NULL, NULL, NULL, NULL, 46),
(21, '678e89c486a8a96758cc7f2ed14997a8.pdf', 'DetalleNominaCirculodePagos_(43).pdf', '/var/www/html/imlchile.cl/grupofirma/uploads/transferencias/', '25-05-2020 12:31:30', 'Adelanto', '2020-05-20', NULL, NULL, 'IF72LE088017817', NULL, NULL, NULL, NULL, 47),
(22, '5be3e48a623c5fbca5d70cf49d208a60.pdf', 'DetalleNominaCirculodePagos_(44).pdf', '/var/www/html/imlchile.cl/grupofirma/uploads/transferencias/', '25-05-2020 12:32:47', 'Adelanto', '2020-05-20', NULL, NULL, 'NR70RG071086718', NULL, NULL, NULL, NULL, 49),
(23, '25d770cf7266429f7c7788618054e0e7.pdf', 'DetalleNominaCirculodePagos_(45).pdf', '/var/www/html/imlchile.cl/grupofirma/uploads/transferencias/', '25-05-2020 12:37:41', 'Adelanto', '2020-05-20', NULL, NULL, 'NR70RG027693019', NULL, NULL, NULL, NULL, 50),
(24, '900021340f9b6ec132c4cd9b8b835bff.pdf', 'DetalleNominaCirculodePagos_(46).pdf', '/var/www/html/imlchile.cl/grupofirma/uploads/transferencias/', '25-05-2020 12:38:40', 'Adelanto', '2020-05-20', NULL, NULL, 'DG62XK030156620', NULL, NULL, NULL, NULL, 51),
(25, '555925250005556b65d63c6f45045c70.pdf', 'DetalleNominaCirculodePagos_(47).pdf', '/var/www/html/imlchile.cl/grupofirma/uploads/transferencias/', '25-05-2020 12:40:03', 'Adelanto', '2020-05-20', NULL, NULL, 'TJ12BX032901421', NULL, NULL, NULL, NULL, 52),
(26, '2857f2d4fe329c6f9e5e8b60b959325b.pdf', 'DetalleNominaCirculodePagos_(48).pdf', '/var/www/html/imlchile.cl/grupofirma/uploads/transferencias/', '25-05-2020 12:41:22', 'Adelanto', '2020-05-20', NULL, NULL, 'TJ12BX066381222', NULL, NULL, NULL, NULL, 53),
(27, '121ef3d6a6336dd5d123844ce22ec836.pdf', 'DetalleNominaCirculodePagos_(50).pdf', '/var/www/html/imlchile.cl/grupofirma/uploads/transferencias/', '25-05-2020 12:43:16', 'Adelanto', '2020-05-20', NULL, NULL, 'VH6MPA068666323', NULL, NULL, NULL, NULL, 56),
(28, '434c020576f14d3393987089f151050f.pdf', 'DetalleNominaCirculodePagos_(51).pdf', '/var/www/html/imlchile.cl/grupofirma/uploads/transferencias/', '25-05-2020 12:44:13', 'Adelanto', '2020-05-20', NULL, NULL, 'E077ES017978824', NULL, NULL, NULL, NULL, 57),
(29, '43462ab8d39c109f34eeb7dc1591d75e.pdf', 'DetalleNominaCirculodePagos_(52).pdf', '/var/www/html/imlchile.cl/grupofirma/uploads/transferencias/', '25-05-2020 12:45:05', 'Adelanto', '2020-05-20', NULL, NULL, 'NR70RG035694625', NULL, NULL, NULL, NULL, 60),
(30, '4903babf9f303d3da755d69bb45b37ad.pdf', 'ConsultaTransferencia_-_2020-05-25T125212_539.pdf', '/var/www/html/imlchile.cl/grupofirma/uploads/transferencias/', '25-05-2020 12:52:54', 'Adelanto', '2020-05-20', NULL, NULL, 'WT96QF014453726', NULL, NULL, NULL, NULL, 27),
(31, '470d96d702daa5232d721110f7c73a9e.pdf', 'certificadoPago_(71).pdf', '/var/www/html/imlchile.cl/grupofirma/uploads/transferencias/', '25-05-2020 12:54:22', 'Adelanto', '2020-05-20', NULL, NULL, 'IF72LE01703127', NULL, NULL, NULL, NULL, 28),
(32, '47ca67426a6963e44e74015c23c6df6e.pdf', 'certificadoPago_(72).pdf', '/var/www/html/imlchile.cl/grupofirma/uploads/transferencias/', '25-05-2020 13:24:31', 'Adelanto', '2020-05-20', NULL, NULL, 'E077ES044593728', NULL, NULL, NULL, NULL, 8),
(33, '8f274497789510d0616669b7611dbc86.pdf', 'ConsultaTransferencia_-_2020-05-25T132747_162.pdf', '/var/www/html/imlchile.cl/grupofirma/uploads/transferencias/', '25-05-2020 13:27:56', 'Adelanto', '2020-05-22', NULL, NULL, 'DG62XK090115329', NULL, NULL, NULL, NULL, 65),
(34, '70eac0669ac3f9391fa81943c446c3ee.pdf', 'carta_de_amo.pdf', '/var/www/html/imlchile.cl/grupofirma/uploads/cartas_amonestacion/', '27-05-2020 11:43:16', 'Carta de amonestación', '2020-05-25', NULL, NULL, NULL, 'Z_0RTN04574650', NULL, NULL, NULL, 8),
(35, '44f143fd45cd73f6f8ca7cb916c8f4b7.pdf', 'CONTRATO_DAVIS.pdf', '/var/www/html/imlchile.cl/grupofirma/uploads/contratos/', '02-06-2020 11:44:26', 'Contrato', '2020-05-18', 'WT96QF9391070', NULL, NULL, NULL, NULL, NULL, NULL, 72),
(36, '935f29ce76db6c5490408a1363131eb6.pdf', '4b87c9194e26a5b0a2317dbca4002838.pdf', 'C:/xampp/htdocs/grupofirma/uploads/liquidaciones/', '23-06-2020 17:25:57', '', '2020-06-23', NULL, NULL, NULL, NULL, '42IIQW0986800', NULL, NULL, 0),
(37, '8b3e0417dc622f83603236fcf8f6c351.pdf', '4b87c9194e26a5b0a2317dbca4002838.pdf', 'C:/xampp/htdocs/grupofirma/uploads/transferencias/', '23-06-2020 17:44:47', 'Pago mensual', '2020-06-02', NULL, NULL, 'LSL74T094185330', NULL, NULL, NULL, NULL, 0),
(38, 'ea9ae9083ffebf8028714d2e109e551d.pdf', 'SolanchTejosLiquidacion.pdf', 'C:/xampp/htdocs/grupofirma/uploads/transferencias/', '24-06-2020 11:34:08', 'Pago mensual', '2020-06-25', NULL, NULL, 'TJ12BX083522031', NULL, NULL, NULL, NULL, 0),
(39, '3e058fa3ddcce23fc8d1077801f80300.pdf', 'SolanchTejosLiquidacion.pdf', 'C:/xampp/htdocs/grupofirma/uploads/transferencias/', '24-06-2020 11:39:58', 'Pago mensual', '2020-03-30', NULL, NULL, 'IF72LE082339732', NULL, NULL, NULL, NULL, 0),
(40, '0310cb4e605723f77b70e568d6c84140.pdf', 'SolanchTejosLiquidacion.pdf', 'C:/xampp/htdocs/grupofirma/uploads/liquidaciones/', '24-06-2020 11:41:49', '', '2020-03-24', NULL, NULL, NULL, NULL, 'VP59FY01277071', NULL, NULL, 0),
(41, 'f0d0729cc48611eb4eb98d8febd10313.pdf', 'SolanchTejosLiquidacion.pdf', 'C:/xampp/htdocs/grupofirma/uploads/transferencias/', '24-06-2020 11:46:15', 'Pago mensual', '2020-03-31', NULL, NULL, 'E077ES051410533', NULL, NULL, NULL, NULL, 0),
(42, 'fb6f1f6185469e67408c5e8829dea8c2.pdf', 'SolanchTejosLiquidacion.pdf', 'C:/xampp/htdocs/grupofirma/uploads/liquidaciones/', '24-06-2020 11:54:13', '', '2020-01-31', NULL, NULL, NULL, NULL, '42IIQW09722172', NULL, NULL, 0),
(43, '387a12c8e16cb1daa3f3acc4384f8e04.pdf', 'SolanchTejosLiquidacion.pdf', 'C:/xampp/htdocs/grupofirma/uploads/transferencias/', '24-06-2020 11:56:08', 'Pago mensual', '2020-01-31', NULL, NULL, 'NR70RG0282334', NULL, NULL, NULL, NULL, 0),
(44, '374f59d2c15c95fec3781c9cd6c92ef3.pdf', 'SolanchTejosLiquidacion.pdf', 'C:/xampp/htdocs/grupofirma/uploads/transferencias/', '25-06-2020 14:04:38', 'Adelanto', '2020-06-19', NULL, NULL, 'DG62XK073739735', NULL, NULL, NULL, NULL, 27),
(45, '83119b70f8daa2e764aad490ee7e51bd.pdf', 'SolanchTejosLiquidacion.pdf', 'C:/xampp/htdocs/grupofirma/uploads/transferencias/', '25-06-2020 14:06:25', 'Adelanto', '2020-06-19', NULL, NULL, 'IF72LE044312636', NULL, NULL, NULL, NULL, 0);

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

--
-- Volcado de datos para la tabla `fa_empresa`
--

INSERT INTO `fa_empresa` (`cp_empresa`, `atr_nombre`, `atr_run`, `atr_representante`, `atr_cedula_representante`, `atr_domicilio`, `cf_ciudad`) VALUES
(1, 'FIRMA ABOGADOS CHILE LIMITADA', '76.438.914-K', 'MIGUEL EDUARDO VARGAS GARRIDO', '17.886.328-2', '1 PONIENTE 4 Y 5 NORTE N° 1588', 177),
(2, 'MIGUEL VARGAS ESPINOSA E HIJOS LIMITADA', '76.849.793-1', 'DIEGO ANTONIO VARGAS GARRIDO', '18.891.594-9', '1 SUR 24 Y MEDIA  ORIENTE N° 3183 ', 177),
(3, 'TERESA DEL CARMEN GARRIDO ROJAS E HIJOS LIMITADA', '76971832-1', 'DIEGO ANTONIO GARRIDO VARGAS', '18.915.94-9', '1 PONIENTE ENTRE 4 Y 5 NORTE N° 1588', 177),
(4, 'SOCIEDAD GARRIDO VARGAS RESPONSABILIDAD LIMITADA', '76971509-6', 'DIEGO ANTONIO VARGAS GARRIDO', '18.891.594-9', 'CALLE 2 NORTE N°3030', 177),
(5, 'SOLANCH MACARENA TEJOS CARRASCO', '19.105.142-4', '', '', '2 NORTE  22 Y 23 ORIENTE N°3030', 177),
(6, 'SOCIEDAD VARGAS GARRIDO LIMITADA', '76.457.046-4', 'MIGUEL EDUARDO VARGAS GARRIDO', '17.886.328-2', '1 PONIENTE ENTRE 4 Y 5 NORTE N°1588', 177);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_estado`
--

CREATE TABLE `fa_estado` (
  `cp_estado` int(11) NOT NULL,
  `atr_nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fa_estado`
--

INSERT INTO `fa_estado` (`cp_estado`, `atr_nombre`) VALUES
(1, 'Contrato a plazo fijo'),
(2, 'Contrato indefinido'),
(3, 'Contrato por proyecto'),
(4, 'Honorarios'),
(5, 'Freelance'),
(6, 'Finiquitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_estadocivil`
--

CREATE TABLE `fa_estadocivil` (
  `cp_estadoCivil` int(11) NOT NULL,
  `atr_nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fa_estadocivil`
--

INSERT INTO `fa_estadocivil` (`cp_estadoCivil`, `atr_nombre`) VALUES
(1, 'Soltero/a.'),
(2, 'Comprometido/a'),
(3, 'Casado/a.'),
(4, 'Separado/a.'),
(5, 'Divorciado/a.'),
(6, 'Viudo/a.'),
(7, 'Unión libre o unión de hecho.'),
(8, 'Desconocido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_existencia_permiso`
--

CREATE TABLE `fa_existencia_permiso` (
  `cp_existencia_permiso` int(11) NOT NULL,
  `cf_modulo` int(11) DEFAULT NULL,
  `cf_permiso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fa_existencia_permiso`
--

INSERT INTO `fa_existencia_permiso` (`cp_existencia_permiso`, `cf_modulo`, `cf_permiso`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 2, 1),
(7, 2, 4),
(8, 2, 5),
(9, 3, 1),
(10, 3, 4),
(11, 3, 2),
(12, 3, 5),
(13, 4, 1),
(14, 4, 4),
(15, 4, 5),
(16, 5, 1),
(17, 5, 2),
(18, 5, 4),
(19, 5, 5),
(20, 8, 1),
(21, 8, 2),
(22, 8, 4),
(23, 8, 5),
(24, 9, 1),
(25, 9, 2),
(26, 9, 4),
(27, 9, 5),
(28, 10, 1),
(29, 10, 2),
(30, 10, 4),
(31, 10, 5),
(32, 6, 1),
(33, 6, 4),
(34, 6, 5),
(35, 7, 1),
(36, 7, 2),
(37, 7, 4),
(38, 7, 5),
(39, 11, 1),
(40, 11, 4),
(41, 11, 6),
(42, 12, 1),
(43, 12, 4),
(44, 12, 6),
(45, 13, 1),
(46, 13, 4),
(47, 13, 6),
(48, 14, 1),
(49, 14, 4),
(50, 14, 6),
(51, 15, 1),
(52, 15, 4),
(53, 15, 6),
(54, 15, 23),
(55, 16, 1),
(56, 16, 7),
(57, 16, 8),
(58, 17, 1),
(59, 17, 7),
(60, 17, 8),
(61, 18, 1),
(62, 18, 7),
(63, 18, 8),
(64, 19, 1),
(65, 19, 22),
(66, 20, 9),
(67, 20, 10),
(68, 20, 11),
(69, 21, 12),
(70, 21, 13),
(71, 22, 14),
(72, 22, 15),
(73, 22, 16),
(74, 22, 17),
(75, 22, 18),
(76, 23, 19),
(77, 23, 20),
(78, 23, 21),
(79, 24, 1),
(80, 24, 4),
(81, 24, 24),
(82, 24, 2),
(83, 24, 5),
(84, 26, 1),
(85, 26, 7),
(86, 26, 8),
(87, 27, 1),
(88, 27, 7),
(89, 27, 8),
(90, 28, 1),
(91, 28, 2),
(92, 28, 4),
(93, 28, 5),
(94, 29, 1),
(95, 29, 2),
(96, 29, 4),
(97, 29, 5),
(98, 30, 1),
(99, 30, 2),
(100, 30, 4),
(101, 30, 5),
(102, 32, 1),
(103, 32, 2),
(104, 32, 5),
(105, 32, 7),
(106, 31, 1),
(107, 31, 4),
(108, 31, 5),
(109, 31, 2),
(110, 33, 25),
(111, 34, 1);

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

--
-- Volcado de datos para la tabla `fa_historial_adelantos`
--

INSERT INTO `fa_historial_adelantos` (`cp_historial_adelantos`, `atr_mes`, `atr_ano`, `atr_monto`, `cf_transferencia`, `cf_documento`, `cf_trabajador`) VALUES
(1, '05', 2020, 150000, 'DG62XK09594660', 1, 1),
(2, '05', 2020, 50000, 'Z_0RTN03340521', 2, 5),
(6, '05', 2020, 50000, NULL, NULL, 10),
(7, '05', 2020, 200000, 'DG62XK0533056', 7, 12),
(8, '05', 2020, 150000, 'DG62XK01057057', 8, 13),
(9, '05', 2020, 100000, 'Z_0RTN01394985', 9, 14),
(10, '05', 2020, 150000, 'NR70RG02958316', 10, 2),
(11, '05', 2020, 230000, NULL, NULL, 3),
(12, '05', 2020, 30000, 'IF72LE07861467', 11, 25),
(13, '05', 2020, 800000, 'IF72LE05827038', 12, 66),
(14, '05', 2020, 50000, 'VF88JP008362429', 13, 21),
(15, '05', 2020, 100000, 'E077ES070418610', 14, 23),
(16, '05', 2020, 50000, 'VP59FY096501511', 15, 24),
(17, '05', 2020, 150000, 'DG62XK026499812', 16, 41),
(18, '05', 2020, 150000, 'IF72LE072118213', 17, 42),
(19, '05', 2020, 100000, 'VF88JP0038758414', 18, 43),
(20, '05', 2020, 150000, 'VP59FY014171015', 19, 44),
(21, '05', 2020, 150000, 'TJ12BX099085616', 20, 46),
(22, '05', 2020, 150000, 'IF72LE088017817', 21, 47),
(23, '05', 2020, 150000, 'NR70RG071086718', 22, 49),
(24, '05', 2020, 150000, 'NR70RG027693019', 23, 50),
(25, '05', 2020, 150000, 'DG62XK030156620', 24, 51),
(26, '05', 2020, 150000, 'TJ12BX032901421', 25, 52),
(27, '05', 2020, 150000, 'TJ12BX066381222', 26, 53),
(28, '05', 2020, 100000, 'VH6MPA068666323', 27, 56),
(29, '05', 2020, 150000, 'E077ES017978824', 28, 57),
(30, '05', 2020, 150000, 'NR70RG035694625', 29, 60),
(31, '05', 2020, 150000, 'WT96QF014453726', 30, 27),
(32, '05', 2020, 150000, 'IF72LE01703127', 31, 28),
(33, '05', 2020, 50000, 'E077ES044593728', 32, 8),
(34, '05', 2020, 100000, 'DG62XK090115329', 33, 65),
(35, '06', 2020, 0, NULL, 42, 27),
(36, '06', 2020, 0, NULL, 42, 0);

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

--
-- Volcado de datos para la tabla `fa_historial_pagos_mensuales`
--

INSERT INTO `fa_historial_pagos_mensuales` (`cp_historial_pagos_mensuales`, `atr_mes`, `atr_ano`, `atr_monto`, `cf_transferencia`, `cf_documento`, `cf_trabajador`) VALUES
(1, '06', 2020, 123456, 'LSL74T094185330', 37, 0),
(2, '06', 2020, 123456, 'TJ12BX083522031', 38, 0),
(3, '06', 2020, 123654, 'IF72LE082339732', 39, 0),
(4, '06', 2020, 123654, 'E077ES051410533', 41, 0),
(5, '06', 2020, 111, 'NR70RG0282334', 43, 0);

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

--
-- Volcado de datos para la tabla `fa_inasistencia`
--

INSERT INTO `fa_inasistencia` (`cp_inasistencia`, `atr_motivo`, `atr_title`, `atr_start`, `cf_trabajador`) VALUES
(5, 'FALTA ', 'DIEGO ANTONIO  VARGAS GARRIDO', '2020-05-18', 32),
(6, 'falta ', 'BRAULIO NICOLAS VARGAS GARRIDO', '2020-05-18', 20),
(7, 'PIDE PERMISO EN LA TARDE . ', 'PABLO ANDRES VARGAS VARGAS', '2020-05-13', 19),
(8, 'FALTA ,  DESDE EL 20 DE MAYO A LA FECHA. ', 'MARTIN VALERIO NICOLAS BRAVO SALINAS', '2020-05-20', 28),
(9, 'FALTA', 'MARTIN VALERIO NICOLAS BRAVO SALINAS', '2020-05-21', 28),
(10, 'FALTA', 'MARTIN VALERIO NICOLAS BRAVO SALINAS', '2020-05-22', 28),
(11, 'FALTA ', 'MARTIN VALERIO NICOLAS BRAVO SALINAS', '2020-05-25', 28),
(12, 'FALTA', 'MARTIN VALERIO NICOLAS BRAVO SALINAS', '2020-05-26', 28),
(13, 'FALTA ', 'MARTIN VALERIO NICOLAS BRAVO SALINAS', '2020-05-27', 28),
(14, 'FALTA', 'MARTIN VALERIO NICOLAS BRAVO SALINAS', '2020-05-28', 28),
(15, 'hola ', 'ALVARO DANIEL GUERRERO ILABEL ', '2020-06-02', 67),
(16, 'hola ', 'CAMILO HERNAN  PAREJA RETAMAL', '2020-06-02', 51),
(17, 'hola ', 'CRISTIAN MARCELO SALAZAR GARCIA', '2020-06-02', 47),
(18, 'dsa', 'ANDREA CELESTE PEÑAILILLO GAVILAN', '2020-06-03', 5),
(20, 'sin motivo\n', 'VICTOR ANDRES HODGES TRONCOSO', '2020-04-28', 0),
(21, 'sin motivo', 'VICTOR ANDRES HODGES TRONCOSO', '2020-04-29', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_items_contrato`
--

CREATE TABLE `fa_items_contrato` (
  `cp_itemContrato` int(11) NOT NULL,
  `atr_nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fa_items_contrato`
--

INSERT INTO `fa_items_contrato` (`cp_itemContrato`, `atr_nombre`) VALUES
(1, 'Partes'),
(2, 'Naturaleza de los servicios'),
(3, 'Lugar de prestación de servicios'),
(4, 'Jornada de trabajo'),
(5, 'Remuneraciones'),
(6, 'Duración de la relación jurídica laboral'),
(7, 'Cláusula de vigencia'),
(8, 'A tener en cuenta '),
(9, 'Cláusula de confidencialidad'),
(10, 'Propiedad intelectual');

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

--
-- Volcado de datos para la tabla `fa_liquidacion`
--

INSERT INTO `fa_liquidacion` (`cp_liquidacion`, `atr_fecha`, `atr_totalHaberes`, `atr_totalDescuentos`, `atr_alcanceLiquido`, `cf_trabajador`) VALUES
('42IIQW09722172', '2020-01-31', 111, 111, 111, 0),
('42IIQW0986800', '2020-06-23', 123456, 123456, 0, 0),
('VP59FY01277071', '2020-03-24', 123654, 123654, 123654, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_manipularanexos`
--

CREATE TABLE `fa_manipularanexos` (
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

--
-- Volcado de datos para la tabla `fa_menu`
--

INSERT INTO `fa_menu` (`cp_menu`, `atr_nombre`) VALUES
(1, 'Dashboard'),
(2, 'Trabajadores'),
(3, 'Historial de trabajadores'),
(4, 'Generar contrato'),
(5, 'Generar anexo'),
(6, 'Permisos'),
(7, 'Documentos'),
(8, 'Perfiles ocupacionales'),
(9, 'Mantenedores'),
(10, 'Pagos'),
(11, 'Gestor de asistencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_menu_perfil`
--

CREATE TABLE `fa_menu_perfil` (
  `cp_menu_perfil` int(11) NOT NULL,
  `cf_perfil` int(11) DEFAULT NULL,
  `cf_menu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fa_menu_perfil`
--

INSERT INTO `fa_menu_perfil` (`cp_menu_perfil`, `cf_perfil`, `cf_menu`) VALUES
(58, 1, 1),
(59, 1, 2),
(60, 1, 3),
(61, 1, 4),
(62, 1, 5),
(63, 1, 6),
(64, 1, 7),
(65, 1, 8),
(66, 1, 9),
(67, 1, 10),
(68, 1, 11),
(69, 4, 1),
(70, 4, 10),
(71, 2, 1),
(72, 2, 3),
(73, 2, 7),
(74, 2, 10),
(75, 3, 1),
(76, 3, 2),
(77, 3, 3),
(78, 3, 4),
(79, 3, 5),
(80, 3, 7),
(81, 3, 8),
(82, 3, 9),
(83, 3, 10),
(84, 3, 11),
(85, 5, 1),
(86, 5, 2),
(87, 5, 8),
(88, 5, 9),
(89, 5, 7),
(90, 4, 7),
(91, 4, 2),
(92, 4, 9),
(93, 4, 11);

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

--
-- Volcado de datos para la tabla `fa_modulo`
--

INSERT INTO `fa_modulo` (`cp_modulo`, `atr_nombre`) VALUES
(1, 'Mantenedor de cargos'),
(2, 'Mantenedor de ciudades'),
(3, 'Mantenedor de empresas'),
(4, 'Mantenedor de estados civiles'),
(5, 'Mantenedor de estados de contrato'),
(6, 'Mantenedor de sucursales'),
(7, 'Gestor de trabajadores'),
(8, 'Mantenedor de nacionalidades'),
(9, 'Mantenedor de previsiones de salud'),
(10, 'Mantenedor de previsiones'),
(11, 'Requisitos mínimos de perfil ocupacional'),
(12, 'Funciones de perfil ocupacional'),
(13, 'Competencias y características de perfil ocupacional'),
(14, 'Conocimientos básicos de perfil ocupacional'),
(15, 'Otros antecedentes de perfil ocupacional'),
(16, 'Documentos de contratos'),
(17, 'Documentos de transferencias'),
(18, 'Documentos de cartas de amonestación'),
(19, 'Documentos de perfiles ocupacionales'),
(20, 'Generar anexo'),
(21, 'Generar contrato'),
(22, 'Historial de trabajadores'),
(23, 'Dashboard'),
(24, 'Mantenedor de usuarios'),
(25, 'Permisos'),
(26, 'Documentos liquidaciones'),
(27, 'Documentos finiquitos'),
(28, 'Mantenedor de vehículos'),
(29, 'Mantenedor de marcas de vehícuos'),
(30, 'Mantenedor de modelos de vehículos'),
(31, 'Préstamos'),
(32, 'Adelantos'),
(33, 'Gestor de asistencia'),
(34, 'Planillas de pago');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_nacionalidad`
--

CREATE TABLE `fa_nacionalidad` (
  `cp_nacionalidad` int(11) NOT NULL,
  `atr_nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fa_nacionalidad`
--

INSERT INTO `fa_nacionalidad` (`cp_nacionalidad`, `atr_nombre`) VALUES
(1, 'Chilena'),
(2, 'Venezolana');

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

--
-- Volcado de datos para la tabla `fa_perfil`
--

INSERT INTO `fa_perfil` (`cp_perfil`, `atr_nombre`) VALUES
(1, 'Administrador'),
(2, 'Contador'),
(3, 'Recursos Humanos'),
(4, 'Encargado de finanzas'),
(5, 'Digitador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_permiso`
--

CREATE TABLE `fa_permiso` (
  `cp_permiso` int(11) NOT NULL,
  `atr_nombre` varchar(100) DEFAULT NULL,
  `atr_descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fa_permiso`
--

INSERT INTO `fa_permiso` (`cp_permiso`, `atr_nombre`, `atr_descripcion`) VALUES
(1, 'Ver', 'Ver listado'),
(2, 'Editar', 'Editar información'),
(3, 'Editar remuneración', 'Editar datos de remuneración'),
(4, 'Crear', 'Crear'),
(5, 'Exportar', 'Exportar listado'),
(6, 'Eliminar', 'Eliminar información'),
(7, 'Subir', 'Subir documento'),
(8, 'Descargar', 'Descargar documento'),
(9, 'Generar PDF', 'Generar anexo por prórroga'),
(10, 'Generar PDF', 'Generar anexo por modificación de cláusula'),
(11, 'Generar PDF', 'Generar anexo por horas extras'),
(12, 'Generar PDF', 'Generar contrato estándar'),
(13, 'Generar PDF', 'Generar contrato personalizado'),
(14, 'Ver', 'Historial cronológico'),
(15, 'Ver', 'Historial de contratos'),
(16, 'Ver', 'Historial de anexos'),
(17, 'Ver', 'Historial de transferencias'),
(18, 'Ver', 'Historial de cartas de amonestación'),
(19, 'Dashboard', 'Cantidad de contratos por tipo'),
(20, 'Dashboard', 'Cantidad de transferencias por empresa'),
(21, 'Dashboard', 'Listado de contratos por vencer'),
(22, 'Generar PDF', 'Generar documento de perfil ocupacional'),
(23, 'Crear', 'Agregar título de antecedente'),
(24, 'Cambiar estado', 'Cambiar estado de usuario'),
(25, 'Ver calendario', 'Ver calendario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_permiso_perfil`
--

CREATE TABLE `fa_permiso_perfil` (
  `cp_permiso_perfil` int(11) NOT NULL,
  `cf_existencia_permiso` int(11) DEFAULT NULL,
  `cf_perfil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fa_permiso_perfil`
--

INSERT INTO `fa_permiso_perfil` (`cp_permiso_perfil`, `cf_existencia_permiso`, `cf_perfil`) VALUES
(224, 1, 1),
(225, 2, 1),
(226, 3, 1),
(227, 4, 1),
(228, 5, 1),
(229, 6, 1),
(230, 7, 1),
(231, 8, 1),
(232, 9, 1),
(233, 10, 1),
(234, 11, 1),
(235, 12, 1),
(236, 13, 1),
(237, 14, 1),
(238, 15, 1),
(239, 16, 1),
(240, 17, 1),
(241, 18, 1),
(242, 19, 1),
(243, 20, 1),
(244, 21, 1),
(245, 22, 1),
(246, 23, 1),
(247, 24, 1),
(248, 25, 1),
(249, 26, 1),
(250, 27, 1),
(251, 28, 1),
(252, 29, 1),
(253, 30, 1),
(254, 31, 1),
(255, 32, 1),
(256, 33, 1),
(257, 34, 1),
(258, 35, 1),
(259, 36, 1),
(260, 37, 1),
(261, 38, 1),
(262, 39, 1),
(263, 40, 1),
(264, 41, 1),
(265, 42, 1),
(266, 43, 1),
(267, 44, 1),
(268, 45, 1),
(269, 46, 1),
(270, 47, 1),
(271, 48, 1),
(272, 49, 1),
(273, 50, 1),
(274, 51, 1),
(275, 52, 1),
(276, 53, 1),
(277, 54, 1),
(278, 55, 1),
(279, 56, 1),
(280, 57, 1),
(281, 58, 1),
(282, 59, 1),
(283, 60, 1),
(284, 61, 1),
(285, 62, 1),
(286, 63, 1),
(287, 64, 1),
(288, 65, 1),
(289, 66, 1),
(290, 67, 1),
(291, 68, 1),
(292, 69, 1),
(293, 70, 1),
(294, 71, 1),
(295, 72, 1),
(296, 73, 1),
(297, 74, 1),
(298, 75, 1),
(299, 76, 1),
(300, 77, 1),
(301, 78, 1),
(302, 79, 1),
(303, 80, 1),
(304, 81, 1),
(305, 82, 1),
(306, 83, 1),
(307, 84, 1),
(308, 85, 1),
(309, 86, 1),
(310, 87, 1),
(311, 88, 1),
(312, 89, 1),
(313, 90, 1),
(314, 91, 1),
(315, 92, 1),
(316, 93, 1),
(317, 94, 1),
(318, 95, 1),
(319, 96, 1),
(320, 97, 1),
(321, 98, 1),
(322, 99, 1),
(323, 100, 1),
(324, 101, 1),
(325, 102, 1),
(326, 103, 1),
(327, 104, 1),
(328, 105, 1),
(329, 106, 1),
(330, 107, 1),
(331, 108, 1),
(332, 109, 1),
(333, 110, 1),
(334, 111, 1),
(335, 58, 2),
(336, 59, 2),
(337, 60, 2),
(338, 74, 2),
(339, 102, 2),
(340, 103, 2),
(341, 104, 2),
(342, 105, 2),
(343, 106, 2),
(344, 107, 2),
(345, 108, 2),
(346, 109, 2),
(347, 111, 2),
(348, 35, 3),
(349, 36, 3),
(350, 37, 3),
(351, 38, 3),
(352, 110, 3),
(353, 66, 3),
(354, 67, 3),
(355, 68, 3),
(356, 69, 3),
(357, 70, 3),
(358, 72, 3),
(359, 73, 3),
(360, 74, 3),
(361, 75, 3),
(362, 55, 3),
(363, 57, 3),
(364, 61, 3),
(365, 62, 3),
(366, 63, 3),
(367, 84, 3),
(368, 85, 3),
(369, 86, 3),
(370, 87, 3),
(371, 88, 3),
(372, 89, 3),
(373, 39, 3),
(374, 40, 3),
(375, 41, 3),
(376, 42, 3),
(377, 43, 3),
(378, 44, 3),
(379, 45, 3),
(380, 46, 3),
(381, 47, 3),
(382, 48, 3),
(383, 49, 3),
(384, 50, 3),
(385, 51, 3),
(386, 52, 3),
(387, 53, 3),
(388, 54, 3),
(389, 1, 3),
(390, 2, 3),
(391, 3, 3),
(392, 4, 3),
(393, 5, 3),
(394, 9, 3),
(395, 10, 3),
(396, 11, 3),
(397, 12, 3),
(398, 32, 3),
(399, 33, 3),
(400, 34, 3),
(401, 28, 3),
(402, 29, 3),
(403, 30, 3),
(404, 31, 3),
(405, 24, 3),
(406, 25, 3),
(407, 26, 3),
(408, 27, 3),
(409, 56, 3),
(410, 65, 3),
(411, 66, 3),
(412, 67, 3),
(413, 68, 3),
(414, 69, 3),
(415, 70, 3),
(416, 102, 3),
(417, 106, 3),
(418, 111, 3),
(419, 107, 3),
(420, 108, 3),
(421, 109, 3),
(422, 35, 5),
(423, 36, 5),
(424, 37, 5),
(425, 38, 5),
(426, 1, 5),
(427, 2, 5),
(428, 3, 5),
(429, 4, 5),
(430, 5, 5),
(431, 9, 5),
(432, 10, 5),
(433, 11, 5),
(434, 12, 5),
(435, 32, 5),
(436, 33, 5),
(437, 34, 5),
(438, 28, 5),
(439, 29, 5),
(440, 30, 5),
(441, 31, 5),
(442, 24, 5),
(443, 25, 5),
(444, 26, 5),
(445, 27, 5),
(446, 39, 5),
(447, 40, 5),
(448, 41, 5),
(449, 42, 5),
(450, 43, 5),
(451, 44, 5),
(452, 45, 5),
(453, 46, 5),
(454, 47, 5),
(455, 48, 5),
(456, 49, 5),
(457, 50, 5),
(458, 51, 5),
(459, 52, 5),
(460, 53, 5),
(461, 54, 5),
(462, 58, 4),
(463, 59, 4),
(464, 60, 4),
(465, 74, 4),
(466, 102, 4),
(467, 103, 4),
(468, 104, 4),
(469, 105, 4),
(470, 106, 4),
(471, 107, 4),
(472, 108, 4),
(473, 109, 4),
(474, 111, 4),
(475, 55, 5),
(476, 56, 5),
(477, 57, 5),
(478, 58, 5),
(479, 59, 5),
(480, 60, 5),
(481, 61, 5),
(482, 61, 5),
(483, 63, 5),
(484, 64, 5),
(485, 65, 5),
(486, 35, 4),
(487, 36, 4),
(488, 37, 4),
(489, 38, 4),
(490, 1, 4),
(491, 2, 4),
(492, 3, 4),
(493, 4, 4),
(494, 5, 4),
(495, 110, 4);

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

--
-- Volcado de datos para la tabla `fa_prestamo`
--

INSERT INTO `fa_prestamo` (`cp_prestamo`, `atr_montoTotal`, `atr_fechaPrestamo`, `atr_cantidadCuotas`, `atr_autoriza`, `atr_observacion`, `cf_trabajador`) VALUES
(43, 20000, '2020-05-19', 1, '', '', 5),
(44, 83000, '2020-05-19', 2, '', '', 53),
(45, 69000, '2020-05-19', 2, '', '', 28),
(46, 980000, '2020-05-19', 10, '', '', 52),
(47, 100000, '2020-05-19', 3, '', '', 45),
(48, 85000, '2020-05-19', 2, '', '', 42),
(49, 93123, '2020-05-19', 4, '', '', 5),
(50, 19440, '2020-05-22', 1, '', '', 5),
(51, 100000, '2020-05-28', 10, 'diego vargas', 'Pago celular . ', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fa_prevision`
--

CREATE TABLE `fa_prevision` (
  `cp_prevision` int(11) NOT NULL,
  `atr_nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fa_prevision`
--

INSERT INTO `fa_prevision` (`cp_prevision`, `atr_nombre`) VALUES
(1, 'Fonasa'),
(2, 'Banmedica'),
(3, 'Consalud'),
(4, 'COLMENA'),
(5, 'DIPRECA');

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
  `atr_sueldoMensual` varchar(100) NOT NULL,
  `atr_cotizaciones` varchar(100) NOT NULL,
  `atr_colacion` varchar(100) NOT NULL,
  `atr_movilizacion` varchar(100) NOT NULL,
  `atr_asistencia` varchar(100) NOT NULL,
  `cf_cargo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fa_remuneracion`
--

INSERT INTO `fa_remuneracion` (`cp_remuneracion`, `atr_sueldoMensual`, `atr_cotizaciones`, `atr_colacion`, `atr_movilizacion`, `atr_asistencia`, `cf_cargo`) VALUES
(1, '320500', '1', '0', '0', '29500', 1),
(2, '320500', '1', '0', '0', '29500', 2),
(3, '0', '0', '0', '0', '0', 3),
(4, '0', '0', '0', '0', '0', 4),
(6, '320500', '', '0', '0', '29500', 6),
(7, '0', '0', '0', '0', '0', 7),
(8, '0', '0', '0', '0', '0', 8),
(9, '0', '0', '0', '0', '0', 9),
(10, '0', '', '0', '0', '0', 10),
(11, '320500', '', '0', '0', '0', 11),
(12, '0', '', '0', '0', '29500', 12),
(13, '0', '0', '0', '0', '0', 13),
(14, '0', '0', '0', '0', '0', 14),
(15, '0', '0', '0', '0', '0', 15),
(16, '0', '0', '0', '0', '0', 16),
(17, '0', '0', '0', '0', '0', 17),
(18, '0', '0', '0', '0', '0', 18),
(19, '0', '0', '0', '0', '0', 19),
(20, '0', '', '0', '0', '29500', 20),
(21, '0', '0', '0', '0', '0', 21),
(22, '320500', '1', '0', '0', '0', 22),
(31, '600000', '', '0', '0', '0', 31),
(32, '0', '0', '0', '0', '0', 32),
(33, '450000', '1', '0', '0', '0', 33),
(34, '800000', '', '0', '0', '0', 34),
(35, '0', '0', '0', '0', '0', 35),
(36, '100000', '', '0', '0', '0', 36),
(37, '0', '0', '0', '0', '0', 37);

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

--
-- Volcado de datos para la tabla `fa_sucursal`
--

INSERT INTO `fa_sucursal` (`cp_sucursal`, `atr_nombre`, `cf_ciudad`) VALUES
(1, 'Linares', 187),
(2, 'Talca', 177),
(3, 'Curico', 168),
(4, 'Todo Chile', NULL),
(5, 'Talca, Linares y Curicó', NULL),
(6, 'Rancagua', NULL),
(7, 'Los Angeles', NULL),
(8, 'Calama', NULL),
(9, 'Concepcion', NULL),
(10, 'IQUIQUE', NULL),
(11, 'SANTIAGO', NULL),
(12, 'SAN PEDRO DE LA PAZ', NULL);

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
  `cf_empresa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fa_trabajador`
--

INSERT INTO `fa_trabajador` (`cp_trabajador`, `atr_rut`, `atr_nombres`, `atr_apellidos`, `atr_direccion`, `atr_fechaNacimiento`, `atr_sueldo`, `cf_proyecto`, `cf_estado`, `cf_ciudad`, `cf_cargo`, `cf_sucursal`, `cf_nacionalidad`, `cf_estadoCivil`, `cf_afp`, `cf_prevision`, `cf_empresa`) VALUES
(0, '1.536.66644', 'VICTOR ANDRES', 'HODGES TRONCOSO', 'TEST', '07-10-1981', 320500, NULL, 1, 177, 1, 2, 1, 3, 6, 1, 1),
(1, '26.731.537-K', 'MARIANA', 'PARRA RODRIGUEZ', '26 SUR 2 PONIENTE A Nº 01060. ', '09-08-1990', 100000, NULL, 2, 177, 20, 2, 2, 1, 4, 1, 1),
(2, '19.105.191-2', 'CATERIN ALEXANDRA', 'MORALES DIAZ', '34 Y MEDIA ORIENTE CON 8 SUR #431', '18-05-1995', 500000, NULL, 1, 177, 1, 2, 1, 1, 4, 1, 5),
(3, '13.454.671-9', 'GONZALO ANDRES', 'ARAVENA OLIVIER', 'CURVA DE PUTAGAN S/N', '13-07-1978', 430000, NULL, 2, 177, 1, 2, 1, 1, 3, 1, 5),
(5, '13.787.927-1', 'ANDREA CELESTE', 'PEÑAILILLO GAVILAN', '24 ORIENTE 24 1/2 NORTE N°3163', '20-05-1980', 500000, NULL, 2, 177, 12, 2, 1, 1, 6, 1, 1),
(8, '27.075.220-9', 'ANDREA MARINA', 'GARCIA BAHAMON', 'CALLE VILLOTA N°262', '1995-12-03', 320500, NULL, 2, 168, 2, 3, 2, 1, 4, 1, 1),
(10, '26.950.733-0', 'EGARNAYBE JOSEFINA', 'TORRES GUARECUCO', '4 PONIENTE CON PASAJE 31 SUR N°558', '23-06-1979', 320500, NULL, 2, 177, 11, 2, 2, 1, 7, 1, 1),
(11, '15.609.113-8', 'RODRIGO ROBERTO JULIAN', 'MOYA RETAMALES', 'PASAJE SANTA TERESITA N° 2030', '12-08-1984', 320500, NULL, 2, 168, 6, 3, 1, 3, 1, 1, 1),
(12, '25.865.954-6', 'NELVIS JESUS', 'VILLALOBOS FABIAN', 'CHACARILLAS CON HORTENCIAS N°1713, FLORES DE PUCARA', '24-10-1991', 400000, NULL, 2, 177, 6, 2, 2, 3, 5, 1, 1),
(13, '26.193.388-8', 'KATHERIN DANIELA', 'SUNIAGA ARROYO', '4 NOTE 25 ORIENTE N°3264', '28-07-1994', 400000, NULL, 2, 177, 4, 2, 2, 1, 5, 1, 1),
(14, '17.757.610-7', 'PAMELA ISABEL', 'MARTINEZ PARRA', 'SAN VICTOR ALAMO, POBLACION LOS AROMOS N°33', '05-09-1990', 320500, NULL, 2, 187, 2, 1, 1, 1, 4, 1, 1),
(15, '18.474.730-8', 'NICOLAS IGNACIO', 'FELIX TORRES', '1 1/2 SUR 11 1/2 PONIENTE  N°282, VILLA LAS LILAS', '11-09-1992', 400000, NULL, 2, 177, 19, 2, 1, 1, 1, 1, 1),
(16, '18.253.633-4', 'MIGUEL HERNAN', 'FARIAS CORTES', 'CIRCUNVALACIÓN NORTE N° 080', '09-01-1993', 400000, NULL, 2, 168, 19, 3, 1, 1, 4, 1, 1),
(17, '18.174.791-9', 'KARINA PAZ', 'SOTO CIFUENTES', 'JUAN TAPIA N°1239 POBLACION JULIO MICHEA', '19-01-1992', 400000, NULL, 2, 188, 19, 1, 1, 1, 4, 1, 1),
(18, '17.886.320-7', 'JUAN DIONISIO', 'REBOLLEDO LARENAS', 'AV. LA PAZ S/N, VILLA ALEGRE', '05-08-1990', 0, NULL, 2, 187, 19, 1, 1, 1, 4, 1, 1),
(19, '17.186.383-K', 'PABLO ANDRES', 'VARGAS VARGAS', 'PASAJE SAN PABLO N°160, VILLA REMBRATLDT', '03-08-1989', 600000, NULL, 2, 177, 17, 5, 1, 1, 2, 4, 5),
(20, '18.228.581-1', 'BRAULIO NICOLAS', 'VARGAS GARRIDO', '1 SUR N°3183, VILLA FRANCISCO ENCINA', '15-04-1993', 900000, NULL, 2, 177, 17, 2, 1, 1, 6, 3, 5),
(21, '13.786.004-K', 'HUGO ANTONIO', 'ESPINOZA CABRERA', 'POBLACION EL FALUCHO, PASAJE 12 N°130', '23-04-1980', 0, NULL, 1, 184, 17, 2, 1, 1, 5, 1, 5),
(23, '12.519.764-7', 'JORGE WLADIMIR', 'GARCIA MENA', 'CALLE 12 1/2 ORIENTE, 13 1/2 SUR N°34 COOPERATIVA 2 DE ENERO', '02-02-1973', 440000, NULL, 1, 177, 17, 4, 1, 3, 1, 1, 5),
(24, '13.575.972-4', 'CESAR ANDRES', 'MOLINA VALDES', 'CALLE 26 1/2 SUR D, 14 1/2 PONIENTE N°158', '11-03-1979', 440000, NULL, 1, 177, 17, 4, 1, 1, 6, 1, 5),
(25, '26.191.494-8', 'YANIRIS BAHAMON', 'BAHAMON SANDOVAL', 'CALLE VILLOTA N°262', '21-12-1970', 160250, NULL, 2, 168, 12, 3, 2, 1, 5, 1, 5),
(27, '27.104.854-8', 'KARLA ALEJANDRA ', 'BARRETO RODRIGUEZ', '10 ORIENTE CON 8 NORTE N°1681', '30-08-1997', 320500, NULL, 1, 177, 10, 2, 2, 1, 7, 1, 3),
(28, '19.472.909-K', 'MARTIN VALERIO NICOLAS', 'BRAVO SALINAS', 'DOÑA IGNACIA III, CALLE 2 N°397', '05-11-1996', 350000, NULL, 2, 177, 17, 2, 1, 1, 5, 1, 4),
(29, '26.882.429-4', 'BERLITZ YOSELIM', 'HERNANDEZ ABREU', '25 ORIENTE N°23 NORTE A N°3235, PARQUE BICENTENARIO', '23-10-1985', 320500, NULL, 2, 177, 7, 2, 2, 1, 4, 1, 2),
(30, '25.803.368-K', 'WILLIAMS ANTONIO', 'DE SOUSA SANCHEZ', 'CALLE 4 SUR N°3370 DEPTO N° 102', '30-09-1975', 450000, NULL, 2, 177, 17, 2, 2, 1, 5, 1, 3),
(31, '11.707.064-6', 'ROXANA DE LA LUZ', 'RIVANO CARRASCO', '12 PONIENTE 4 SUR, CONJUNTO RESIDENCIAL LLAIMA N°2', '31-01-1971', 0, NULL, 2, 177, 7, 2, 2, 5, 5, 1, 2),
(32, '18.891.594-9', 'DIEGO ANTONIO ', 'VARGAS GARRIDO', '1 SUR N°3183', '20-07-1994', 0, NULL, 2, 177, 17, 2, 1, 1, 4, 3, 4),
(33, '8.570.526-1', 'LUIS ARTURO', 'TORRES VIANA', 'VILLA ALBORADA PASAJE 3 N°486', '08-10-1960', 0, NULL, 2, 148, 17, 6, 1, 1, 1, 1, 4),
(34, '8.273.690-5', 'EDUARDO SEGUNDO ', 'MOLINA DONOSO', 'VALLE NOCEDAL N°1246', '28-07-1960', 0, NULL, 2, 148, 17, 6, 1, 3, 1, 1, 4),
(35, '10.312.076-4', 'JUAN PABLO', 'CESPEDES ORELLANA', 'CALLE MARCONI N°0104 VILLA EL PARQUE NORTE', '15-07-1965', 320500, NULL, 2, 223, 17, 7, 1, 1, 6, 1, 4),
(36, '12.514.238-9', 'HUGO ORLANDO ', 'LAGOS VICENCIO', 'FINLANDIA N°2555 VILLA ALBORADA', '05-11-1973', 320500, NULL, 1, 14, 17, 8, 1, 1, 6, 1, 4),
(37, '14.390.757-0', 'MAURICIO ANTONIO', 'GUZMAN REYES', 'PASAJE 18 CASA N°4461, FLORESTA 4 HUALPEN', '1978-03-02', 320500, NULL, 1, 46, 17, 9, 1, 1, 6, 1, 4),
(38, '17.886.328-2', 'MIGUEL EDUARDO ', 'VARGAS GARRIDO', 'CALLE 1 PONIENTE ENTRE 4 Y 5 NORTE N°1588', '26-04-1991', 0, NULL, 2, 177, 21, 4, 1, 1, 4, 3, 1),
(39, '19.105.142-4', 'SOLANCH MACARENA ', 'TEJOS CARRASCO', '1 SUR 24 ORIENTE N°3183', '26-06-1995', 320500, NULL, 2, 177, 22, 5, 1, 1, 7, 1, 1),
(40, '10.679.177-5', 'JUAN LEONEL ', 'FIGUEROA GONZALEZ', 'BERNARDO OHIGGINS N°952 ', '21-07-1966', 320500, NULL, 1, 6, 17, 10, 1, 1, 1, 1, 5),
(41, '10.869.305-3', 'ROBERTO CARLOS ', 'OTEIZA MELLA', 'EMILIANO FIGUEROA N°8079', '17-02-1970', 800000, NULL, 1, 88, 17, 11, 1, 8, 6, 1, 5),
(42, '12.905.854-4', 'PABLO ALBERTO', 'MARILEO POLANCO', 'AV. AMERICO VESPUCIO N°9242, VILLA OHIGGINS', '22-12-1974', 800000, NULL, 1, 109, 17, 11, 1, 8, 1, 1, 5),
(43, '9.004.738-8', 'ERIK DEL KURT RUBEN', 'SEPULVEDA LAGOS', 'ALBERDI N°1756', '22-10-1960', 800000, NULL, 1, 93, 17, 11, 1, 8, 6, 1, 5),
(44, '16.091.672-9', 'LUIS ARMANDO ', 'AYALA GODOY', 'PRESIDENTE SALVADOR ALLENDE N°438', '24-04-1985', 800000, NULL, 1, 112, 17, 11, 1, 8, 6, 3, 5),
(45, '16.797.625-5', 'EXEQUIEL ANDRES ', 'CASTRO DEL PINO', 'PASAJE EL HOGAR N°481', '09-12-1987', 800000, NULL, 1, 92, 17, 11, 1, 8, 4, 1, 5),
(46, '13.463.674-2', 'ROBERTO ANDRES ', 'QUIROGA DUARTE', 'PASAJE HUELEN N°8548', '03-01-1978', 800000, NULL, 1, 109, 17, 11, 1, 8, 3, 1, 5),
(47, '13.040.075-2', 'CRISTIAN MARCELO', 'SALAZAR GARCIA', 'REAL MADRID N°1658 DEPTO N°11', '19-03-1976', 800000, NULL, 2, 109, 17, 11, 1, 8, 6, 1, 5),
(48, '10.831.039-1', 'MARIO ESTEBAN ', 'OTEIZA MELLA', 'PASAJE MERCURIO N°8636', '03-11-1967', 800000, NULL, 1, 110, 17, 11, 1, 8, 4, 1, 5),
(49, '18.278.123-1', 'FRANCISCO JAVIER', 'GUTIERREZ OLGUN', 'BALDOMERO LILLO N°5015', '09-12-1992', 800000, NULL, 1, 98, 17, 11, 1, 8, 4, 1, 5),
(50, '10.180.526-3', 'JAIME ALEXIE', 'RAMIREZ RODRIGUEZ', 'PASAJE ORESTE PLATH N°7933 VILLA EL ROSARIO', '02-11-1966', 600000, NULL, 1, 241, 17, 12, 1, 8, 8, 5, 5),
(51, '19.346.281-2', 'CAMILO HERNAN ', 'PAREJA RETAMAL', 'CALLE PABLO NERUDA N°187', '31-05-1996', 600000, NULL, 2, 187, 17, 12, 1, 1, 5, 1, 5),
(52, '13.727.467-1', 'HANS ALBERTO', 'CUEVAS CARVAJAL', 'VOLCAN CULLAILLACO N°1513, JORGE ALESSANDRI ', '16-03-1979', 600000, NULL, 1, 234, 17, 12, 1, 8, 4, 1, 5),
(53, '18.814.535-3', 'FELIPE ANDRES ', 'CASTRO MORA', 'ORFELIA GONZALEZ POBLACION LIBERTAD N°1', '20-07-1994', 600000, NULL, 6, 234, 17, 12, 1, 8, 1, 1, 5),
(54, '8.706.194-9', 'GONZALO ANTONIO ', 'CRUCES OYARCE', 'LOS GUINDOS N°1836', '04-01-1965', 600000, NULL, 1, 233, 17, 12, 1, 8, 8, 5, 5),
(55, '8.897.492-1', 'JORGE LUIS', 'GOMEZ MENDEZ', 'PASAJE 7 CASA N°2754 CONJUNTO PLAZAS DEL SOL DE CHIGUAYANTE', '12-05-1962', 600000, NULL, 1, 233, 17, 12, 1, 8, 8, 5, 5),
(56, '13.958.811-8', 'LUIS RODOLFO', 'MONSALVE ALARCON', 'PASAJE RIOS DE CHILE N°594 POBLACION SALVADOR ALLENDE', '02-12-1980', 600000, NULL, 1, 234, 17, 12, 1, 8, 4, 1, 5),
(57, '9.410.495-5', 'MANUEL ANTONIO', 'HUENCHUL MARTINEZ', 'JUAN FERNANDEZ N°8170 EL ROSARIO 2 ', '20-10-1965', 600000, NULL, 1, 241, 17, 12, 1, 8, 8, 5, 5),
(58, '15.199.305-2', 'HECTOR DANIEL ', 'SAEZ GARCIA', 'CALLE LARGUI N°8896 VILLA CONAVICOOP', '18-10-1982', 600000, NULL, 1, 241, 17, 12, 1, 8, 6, 1, 5),
(59, '8.294.352-8', 'JUAN CARLOS ', 'HERRERA ESPARZA', 'PASAJE AUSTRIAS N°1661 VALLE ALTO ', '08-11-1959', 600000, NULL, 1, 233, 17, 12, 1, 8, 8, 5, 5),
(60, '16.635.404-8', 'RODRIGO ALEXIS ', 'PEÑA DIAZ', 'LOS GUINDOS N°695, LOMA COLORADA', '31-12-1987', 600000, NULL, 1, 241, 17, 12, 1, 8, 4, 1, 5),
(61, '9.180.197-3', 'CARLOS PATRICIO', 'LARENAS  OSORIO', 'AVENIDA LAS CASAS N°19 CHIGUAYANTE', '24-03-1965', 600000, NULL, 1, 235, 17, 12, 1, 8, 8, 5, 5),
(62, '9.892.063-3', 'BERNARDO ENRIQUE', 'VIDAL MORALES', 'ONOFRE ROJAS N°462 VILLA ALEGRE', '17-09-1964', 600000, NULL, 1, 234, 17, 12, 1, 8, 8, 5, 5),
(63, '10.576.317-4', 'IVAN CLAUDIO ', 'MEDINA HERRERA', 'PASAJE ESTAMBUEL N°3890, CONJUNTO GRAN BRETAÑA', '12-07-1966', 600000, NULL, 2, 237, 17, 12, 1, 8, 6, 1, 5),
(64, '10.981.060-6', 'HECTOR EDUARDO ', 'ISLA RIVERO', 'CALLE 2 ORIENTE CON 357 CASA N°3 OBLACION EDUARDO MORENO', '03-06-1980', 600000, NULL, 2, 234, 17, 12, 1, 8, 6, 1, 5),
(65, '19.033.521-6', 'DAVID BRUCE', 'MOLINA CAMPOS', 'PEDRO PRADO N°368 VILLA LOS ESCRITORES', '03-11-1988', 0, NULL, 6, 241, 17, 12, 1, 8, 6, 1, 5),
(66, '17.778.767-1', 'EVELYN YAZMIN', ' GALLEGOS BARRIOS', 'CAMINO VIEJO A MAULE LOTEO SAN FRANCISCO N°40', '31-12-1990', 1331000, NULL, 2, 177, 32, 2, 1, 1, 3, 3, 5),
(67, '16.871.847-0', 'ALVARO DANIEL', 'GUERRERO ILABEL ', 'AVENIDA PIDUCO SUR Nº1000 BLOCK Ñ DEPTO 403', '19-08-1988', 450000, NULL, 1, 177, 33, 2, 1, 1, 7, 1, 4),
(68, '17.186.383-1', 'MARCK ', 'ANTONIO', '2 ORIENTE ', '20-04-1989', 320500, NULL, 2, 126, 2, 10, 1, 3, 2, 1, 1),
(69, '25.803.368-1', 'SUSANA KATIUSKA ', 'SAVALA', '1 PONIENTE ', '04-05-1980', 320500, NULL, 2, 168, 2, 3, 2, 1, 1, 1, 1),
(70, '12.073.424-5', 'VICTOR HUGO ', 'CERNA VEGA ', 'CALLE PADRE HURTADO NRO. 1819 LAGUNILLAS NORTE ', '14-05-1970', 600000, NULL, 1, 234, 31, 12, 1, 3, 8, 5, 5),
(72, '20.202.779-2', 'DAVID ALEXANDER ', 'CACERES FAUNDEZ', 'POBLACION VILLA SAN VICTOR Nº07 SAN VICTOR ALAMO', '03-03-1999', 100000, NULL, 2, 187, 36, 1, 1, 8, 5, 1, 5);

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

--
-- Volcado de datos para la tabla `fa_transferencia`
--

INSERT INTO `fa_transferencia` (`cp_transferencia`, `atr_fecha`, `atr_monto`, `cf_trabajador`, `cf_banco`) VALUES
('DG62XK01057057', '2020-05-20', '150000', 13, 5),
('DG62XK026499812', '2020-05-20', '150000', 41, 5),
('DG62XK030156620', '2020-05-20', '150000', 51, 5),
('DG62XK0533056', '2020-05-20', '200000', 12, 5),
('DG62XK073739735', '2020-06-19', '135000', 27, NULL),
('DG62XK090115329', '2020-05-22', '100000', 65, 5),
('DG62XK09594660', '2020-05-20', '150000', 1, 5),
('E077ES017978824', '2020-05-20', '150000', 57, 5),
('E077ES044593728', '2020-05-20', '50000', 8, 5),
('E077ES051410533', '2020-03-31', '123654', 0, 7),
('E077ES070418610', '2020-05-20', '100000', 23, 5),
('IF72LE01703127', '2020-05-20', '150000', 28, 5),
('IF72LE044312636', '2020-06-19', '150000', 0, NULL),
('IF72LE05827038', '2020-05-20', '800000', 66, 5),
('IF72LE072118213', '2020-05-20', '150000', 42, 5),
('IF72LE0753655', '2020-05-20', '150000', 10, 5),
('IF72LE07861467', '2020-05-20', '30000', 25, 5),
('IF72LE082339732', '2020-03-30', '123654', 0, 10),
('IF72LE088017817', '2020-05-20', '150000', 47, 5),
('LSL74T094185330', '2020-06-02', '123456', 0, 6),
('NR70RG027693019', '2020-05-20', '150000', 50, 5),
('NR70RG0282334', '2020-01-31', '111', 0, 12),
('NR70RG02958316', '2020-05-20', '150000', 2, 5),
('NR70RG035694625', '2020-05-20', '150000', 60, 5),
('NR70RG071086718', '2020-05-20', '150000', 49, 5),
('TJ12BX032901421', '2020-05-20', '150000', 52, 5),
('TJ12BX066381222', '2020-05-20', '150000', 53, 5),
('TJ12BX083522031', '2020-06-25', '123456', 0, 14),
('TJ12BX099085616', '2020-05-20', '150000', 46, 5),
('VF88JP0038758414', '2020-05-20', '100000', 43, 5),
('VF88JP008362429', '2020-05-20', '50000', 21, 5),
('VH6MPA068666323', '2020-05-20', '100000', 56, 5),
('VP59FY014171015', '2020-05-20', '150000', 44, 5),
('VP59FY096501511', '2020-05-20', '50000', 24, 5),
('WT96QF014453726', '2020-05-20', '150000', 27, 5),
('Z_0RTN01394985', '2020-05-20', '100000', 14, 5),
('Z_0RTN03340521', '2020-05-20', '50000', 5, 5);

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

--
-- Volcado de datos para la tabla `fa_usuario`
--

INSERT INTO `fa_usuario` (`cp_usuario`, `atr_nombre`, `atr_correo`, `atr_clave`, `atr_activo`, `cf_perfil`) VALUES
(0, 'HODGES-SAMA', 'dev@dev.cl', 'ff7f7e66f4c32465d3006f1118b59323', '1', 1),
(1, 'Administrador', 'administrador@grupofirma.cl', '83edf7c995d2b92cd4c0af3850c95678', '1', 1),
(3, 'Williams De Sousa', 'w.desousa@grupofirma.cl', 'e7d5282fe90a040ffe02ad41fd7474cb', '1', 4),
(4, 'Mariana Parra', 'm.parra@grupofirma.cl', 'fac11cb00246ab587ca1a11d489b1511', '1', 5),
(5, 'Dios', 'g.aravena@grupofirma.cl', '54affb7fe3673f335298e94ec9043029', '1', 1),
(6, 'Testing de perfiles', 'testing@grupofirma.cl', '54affb7fe3673f335298e94ec9043029', '1', 4),
(7, 'Daniela Suniaga', 'finanzas@grupofirma.cl', '54affb7fe3673f335298e94ec9043029', '1', 4),
(8, 'Caterin Morales', 'c.morales@grupofirma.cl', '222edfed65e7af832bf035390ef43c1e', '1', 1),
(9, 'Solanch Tejos', 's.tejos@grupofirma.cl', '54affb7fe3673f335298e94ec9043029', '1', 4);

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
-- Indices de la tabla `fa_cartaaviso`
--
ALTER TABLE `fa_cartaaviso`
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
  ADD KEY `fk_documento_cartaAviso` (`cf_cartaAviso`);

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
-- Indices de la tabla `fa_estadocivil`
--
ALTER TABLE `fa_estadocivil`
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
-- Indices de la tabla `fa_manipularanexos`
--
ALTER TABLE `fa_manipularanexos`
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
  ADD KEY `fk_remuneracion_cargo` (`cf_cargo`);

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
  MODIFY `cp_afp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `fa_banco`
--
ALTER TABLE `fa_banco`
  MODIFY `cp_banco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `fa_cargo`
--
ALTER TABLE `fa_cargo`
  MODIFY `cp_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `fa_ciudad`
--
ALTER TABLE `fa_ciudad`
  MODIFY `cp_ciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=347;

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
  MODIFY `cp_detale_prestamo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de la tabla `fa_documento`
--
ALTER TABLE `fa_documento`
  MODIFY `cp_documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `fa_empresa`
--
ALTER TABLE `fa_empresa`
  MODIFY `cp_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `fa_estado`
--
ALTER TABLE `fa_estado`
  MODIFY `cp_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `fa_estadocivil`
--
ALTER TABLE `fa_estadocivil`
  MODIFY `cp_estadoCivil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `fa_existencia_permiso`
--
ALTER TABLE `fa_existencia_permiso`
  MODIFY `cp_existencia_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT de la tabla `fa_historial_adelantos`
--
ALTER TABLE `fa_historial_adelantos`
  MODIFY `cp_historial_adelantos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `fa_historial_pagos_mensuales`
--
ALTER TABLE `fa_historial_pagos_mensuales`
  MODIFY `cp_historial_pagos_mensuales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `fa_inasistencia`
--
ALTER TABLE `fa_inasistencia`
  MODIFY `cp_inasistencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `fa_items_contrato`
--
ALTER TABLE `fa_items_contrato`
  MODIFY `cp_itemContrato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `fa_manipularanexos`
--
ALTER TABLE `fa_manipularanexos`
  MODIFY `cp_manipular` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `fa_marca`
--
ALTER TABLE `fa_marca`
  MODIFY `cp_marca` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_menu`
--
ALTER TABLE `fa_menu`
  MODIFY `cp_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `fa_menu_perfil`
--
ALTER TABLE `fa_menu_perfil`
  MODIFY `cp_menu_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

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
  MODIFY `cp_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `fa_nacionalidad`
--
ALTER TABLE `fa_nacionalidad`
  MODIFY `cp_nacionalidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `fa_otrosantecedentes`
--
ALTER TABLE `fa_otrosantecedentes`
  MODIFY `cp_otrosantecedentes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_perfil`
--
ALTER TABLE `fa_perfil`
  MODIFY `cp_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `fa_permiso`
--
ALTER TABLE `fa_permiso`
  MODIFY `cp_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `fa_permiso_perfil`
--
ALTER TABLE `fa_permiso_perfil`
  MODIFY `cp_permiso_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=496;

--
-- AUTO_INCREMENT de la tabla `fa_permiso_usuario`
--
ALTER TABLE `fa_permiso_usuario`
  MODIFY `cp_permiso_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_prestamo`
--
ALTER TABLE `fa_prestamo`
  MODIFY `cp_prestamo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `fa_prevision`
--
ALTER TABLE `fa_prevision`
  MODIFY `cp_prevision` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `fa_proyecto`
--
ALTER TABLE `fa_proyecto`
  MODIFY `cp_proyecto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fa_remuneracion`
--
ALTER TABLE `fa_remuneracion`
  MODIFY `cp_remuneracion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
