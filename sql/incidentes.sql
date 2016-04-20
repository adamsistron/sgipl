-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 26-01-2014 a las 19:56:46
-- Versión del servidor: 5.5.34-0ubuntu0.13.04.1
-- Versión de PHP: 5.4.9-4ubuntu2.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `incidentes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aprobador`
--

CREATE TABLE IF NOT EXISTS `aprobador` (
  `id_aprobador` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_aprobador` varchar(30) NOT NULL,
  `indicador_aprobador` varchar(20) NOT NULL,
  PRIMARY KEY (`id_aprobador`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `aprobador`
--

INSERT INTO `aprobador` (`id_aprobador`, `nombre_aprobador`, `indicador_aprobador`) VALUES
(1, 'Adam Carrillo', 'carrilloaw'),
(2, 'Jose Montero', 'monterojl');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `filial`
--

CREATE TABLE IF NOT EXISTS `filial` (
  `id_filial` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_filial` varchar(30) NOT NULL,
  `descripcion_filial` text NOT NULL,
  `last_update_filial` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_filial`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `filial`
--

INSERT INTO `filial` (`id_filial`, `nombre_filial`, `descripcion_filial`, `last_update_filial`) VALUES
(1, 'BARIVEN', '<p>\n	-</p>\n', '2014-01-25 21:42:36'),
(2, 'CYS', '<p>\n	Comercio y Suministro</p>\n', '2014-01-25 22:00:39'),
(3, 'EYP', '<p>\n	<span style="background-color:#ffff00;">Exploraci&oacute;n y Producci&oacute;n</span></p>\n', '2014-01-29 16:30:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `herramienta_seguridad`
--

CREATE TABLE IF NOT EXISTS `herramienta_seguridad` (
  `id_herramienta_seguridad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_herramienta_seguridad` varchar(30) NOT NULL,
  `descripcion_herramienta_seguridad` text NOT NULL,
  `last_update_herramienta_seguridad` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_herramienta_seguridad`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `herramienta_seguridad`
--

INSERT INTO `herramienta_seguridad` (`id_herramienta_seguridad`, `nombre_herramienta_seguridad`, `descripcion_herramienta_seguridad`, `last_update_herramienta_seguridad`) VALUES
(1, 'CONSOLA SNORTBY', '', '2014-01-24 10:24:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `region`
--

CREATE TABLE IF NOT EXISTS `region` (
  `id_region` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_region` varchar(30) NOT NULL,
  `descripcion_region` text NOT NULL,
  `last_update_region` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_region`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Regiones en las cuales actúa STI' AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `region`
--

INSERT INTO `region` (`id_region`, `nombre_region`, `descripcion_region`, `last_update_region`) VALUES
(1, 'centro', '<p>\n	<span style="background-color:#ffff00;">-</span></p>\n', '2014-01-15 16:30:00'),
(2, 'OCCIDENTE', '<p>\n	-</p>\n', '2014-01-24 10:28:21'),
(3, 'ORIENTE', '<p>\n	<strike>-</strike></p>\n', '2014-01-24 10:28:11'),
(4, 'METROPOLITANA', '<p>\n	-</p>\n', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_incidente`
--

CREATE TABLE IF NOT EXISTS `registro_incidente` (
  `id_incidente` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_incidente` date NOT NULL,
  `id_region` int(11) NOT NULL,
  `id_filial` int(11) NOT NULL,
  `id_tipificacion_incidentes` int(11) NOT NULL,
  `id_tipificacion_hecho` int(11) NOT NULL,
  `codigo_caso` varchar(30) NOT NULL,
  `estatus_caso` enum('Abierto','Cerrado','Escalado') NOT NULL,
  `fecha_ultimo_estatus` date NOT NULL,
  `id_herramienta_seguridad` int(11) NOT NULL,
  `id_reportador` int(11) NOT NULL,
  `id_aprobador` int(11) NOT NULL,
  `descripcion_hecho` text NOT NULL,
  `tiempo_ocurrencia_hecho` datetime NOT NULL,
  `tiempo_finalizacion_hecho` datetime NOT NULL,
  `descripcion_causa` text NOT NULL COMMENT 'ORIGEN',
  `descripcion_acciones_tomadas` text NOT NULL COMMENT 'ACCIONES TOMADAS',
  `accion` enum('Solicitar Remediación','Entonar Herramienta de Protección Lógica','Informe de Recomendaciones','Informe de Análisis Forense') NOT NULL COMMENT 'ACCIONES TOMADAS',
  `destinado_a` varchar(30) NOT NULL COMMENT 'ACCIONES TOMADAS',
  `estatus_accion` enum('Por Gestionar','Pendiente por Grupo Solucionador','Ejecutada') NOT NULL COMMENT 'ACCIONES TOMADAS',
  `tipo_impacto` set('Integridad','Confidencialidad','Disponibilidad') NOT NULL COMMENT 'IMPACTO',
  `servicio_impacto` set('SAP','Correo','Internet','Computador Central','Aplicaciones Especializadas del Negocio') NOT NULL COMMENT 'IMPACTO',
  `valor_impacto` enum('Alto','Medio','Bajo') NOT NULL COMMENT 'IMPACTO',
  `descripcion_impacto` text NOT NULL COMMENT 'IMPACTO',
  `tipo_acta` enum('Acta de Negación de Equipos','Acta de Cadena de Custodia','Acta de Negación de Equipos') NOT NULL,
  `numero_acta` varchar(30) NOT NULL,
  `nombre_equipo` varchar(30) NOT NULL,
  `numero_activo_pdvsa` int(11) NOT NULL,
  `hash_imagen` varchar(60) NOT NULL,
  PRIMARY KEY (`id_incidente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `registro_incidente`
--

INSERT INTO `registro_incidente` (`id_incidente`, `fecha_incidente`, `id_region`, `id_filial`, `id_tipificacion_incidentes`, `id_tipificacion_hecho`, `codigo_caso`, `estatus_caso`, `fecha_ultimo_estatus`, `id_herramienta_seguridad`, `id_reportador`, `id_aprobador`, `descripcion_hecho`, `tiempo_ocurrencia_hecho`, `tiempo_finalizacion_hecho`, `descripcion_causa`, `descripcion_acciones_tomadas`, `accion`, `destinado_a`, `estatus_accion`, `tipo_impacto`, `servicio_impacto`, `valor_impacto`, `descripcion_impacto`, `tipo_acta`, `numero_acta`, `nombre_equipo`, `numero_activo_pdvsa`, `hash_imagen`) VALUES
(1, '2014-01-29', 4, 2, 1, 1, '34e', 'Cerrado', '2014-01-24', 1, 1, 2, '<p>\n	Hecho</p>\n', '2014-01-24 07:00:39', '2014-01-17 12:00:00', '<p>\n	Causa</p>\n', '<p>\n	Acciones Tomadas</p>\n', 'Informe de Recomendaciones', 'Todos', 'Pendiente por Grupo Solucionador', 'Integridad,Disponibilidad', 'Internet,Aplicaciones Especializadas del Negocio', 'Medio', '<p>\n	Impacto</p>\n', 'Acta de Cadena de Custodia', '232wsw', 'wqd3q', 54321, '3r4gwve3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportador`
--

CREATE TABLE IF NOT EXISTS `reportador` (
  `id_reportador` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_reportador` varchar(30) NOT NULL,
  `indicador_reportador` varchar(20) NOT NULL,
  PRIMARY KEY (`id_reportador`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `reportador`
--

INSERT INTO `reportador` (`id_reportador`, `nombre_reportador`, `indicador_reportador`) VALUES
(1, 'Amanda Olivo', 'olivoas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipificacion_hecho`
--

CREATE TABLE IF NOT EXISTS `tipificacion_hecho` (
  `id_tipificacion_hecho` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tipificacion_hecho` varchar(30) NOT NULL,
  `descripcion_tipificacion_hecho` text NOT NULL,
  `last_update_tipificacion_hecho` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_tipificacion_hecho`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tipificacion_hecho`
--

INSERT INTO `tipificacion_hecho` (`id_tipificacion_hecho`, `nombre_tipificacion_hecho`, `descripcion_tipificacion_hecho`, `last_update_tipificacion_hecho`) VALUES
(1, ' ANA:Acceso Indebido', '<p>\n	-</p>\n', '2014-01-26 10:43:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipificacion_incidentes`
--

CREATE TABLE IF NOT EXISTS `tipificacion_incidentes` (
  `id_tipificacion_incidentes` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tipificacion_incidentes` varchar(30) NOT NULL,
  `descripcion_tipificacion_incidentes` text NOT NULL,
  `last_update_tipificacion_incidentes` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_tipificacion_incidentes`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tipificacion_incidentes`
--

INSERT INTO `tipificacion_incidentes` (`id_tipificacion_incidentes`, `nombre_tipificacion_incidentes`, `descripcion_tipificacion_incidentes`, `last_update_tipificacion_incidentes`) VALUES
(1, 'Acceso No Autorizado-', '<p>\n	Por definir</p>\n', '2014-01-24 10:16:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(30) NOT NULL,
  `indicador_usuario` varchar(20) NOT NULL,
  `extesion_usuario` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `last_update_usuario` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `indicador_usuario`, `extesion_usuario`, `id_rol`, `last_update_usuario`) VALUES
(1, 'Adam Carrillo', 'carrilloaw', 0, 0, '2014-01-25 22:49:22');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
