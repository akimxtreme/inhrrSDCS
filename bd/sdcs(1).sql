-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 05-12-2012 a las 19:56:20
-- Versión del servidor: 5.5.8
-- Versión de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sdcs`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `analisis_muestras`
--

CREATE TABLE IF NOT EXISTS `analisis_muestras` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `analisis_muestras` varchar(300) NOT NULL,
  `detalles` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Volcar la base de datos para la tabla `analisis_muestras`
--

INSERT INTO `analisis_muestras` (`id`, `analisis_muestras`, `detalles`) VALUES
(1, 'Detección de Anticuerpos (IgM)', ''),
(2, 'Detección de Antigenos (AgsHB)', ''),
(3, 'Detección de Anticuerpos (Anti-HBs/Anti-HBc)', ''),
(4, 'Detección de Anticuerpos (IgG)', ''),
(5, 'Detección de Material Genético (PCR)', ''),
(6, 'Confirmatorio en caso de muestra positiva', ''),
(7, 'Detección de Anticuerpos (TR)', ''),
(8, 'Aislamiento', ''),
(9, 'Aislamiento viral en cultivo celular', ''),
(10, 'Identificación del parásito (frotis-gota gruesa)', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asociado`
--

CREATE TABLE IF NOT EXISTS `asociado` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `cod_sindrome` varchar(200) NOT NULL,
  `cod_tipo_muestras` varchar(200) NOT NULL,
  `tipo` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `asociado`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asoc_dp_s`
--

CREATE TABLE IF NOT EXISTS `asoc_dp_s` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `cod_maestro` varchar(300) NOT NULL,
  `cod_asociado` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcar la base de datos para la tabla `asoc_dp_s`
--

INSERT INTO `asoc_dp_s` (`id`, `cod_maestro`, `cod_asociado`) VALUES
(1, '3', '2'),
(2, '3', '3'),
(3, '3', '5'),
(4, '3', '1'),
(5, '3', '6'),
(6, '3', '7'),
(7, '3', '8');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asoc_tm_dp`
--

CREATE TABLE IF NOT EXISTS `asoc_tm_dp` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `cod_maestro` varchar(300) NOT NULL,
  `cod_asociado` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Volcar la base de datos para la tabla `asoc_tm_dp`
--

INSERT INTO `asoc_tm_dp` (`id`, `cod_maestro`, `cod_asociado`) VALUES
(1, '1', '5'),
(2, '2', '5'),
(3, '3', '5'),
(4, '5', '5'),
(5, '6', '5'),
(6, '6', '9'),
(7, '6', '7'),
(8, '7', '5'),
(9, '8', '10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conservacion_muestras`
--

CREATE TABLE IF NOT EXISTS `conservacion_muestras` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `conservacion_muestras` varchar(300) NOT NULL,
  `detalles` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `conservacion_muestras`
--

INSERT INTO `conservacion_muestras` (`id`, `conservacion_muestras`, `detalles`) VALUES
(1, 'A Temperatura Ambiente', ''),
(2, '4ºC', ''),
(3, 'Congelada -20ºC', ''),
(4, 'Congelada -80ºC, hielo seco', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnostico_presuntivo`
--

CREATE TABLE IF NOT EXISTS `diagnostico_presuntivo` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `diagnostico_presuntivo` varchar(300) NOT NULL,
  `detalles` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcar la base de datos para la tabla `diagnostico_presuntivo`
--

INSERT INTO `diagnostico_presuntivo` (`id`, `diagnostico_presuntivo`, `detalles`) VALUES
(1, 'Dengue', ''),
(2, 'Hepatitis A', ''),
(3, 'Hepatitis B', ''),
(5, 'Hepatitis C', ''),
(6, 'Leptospira', ''),
(7, 'Fiebre Amarilla', ''),
(8, 'Malaria', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `muestra`
--

CREATE TABLE IF NOT EXISTS `muestra` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `sindrome` varchar(300) NOT NULL,
  `diagnostico_presuntivo` varchar(300) NOT NULL,
  `tipo` varchar(300) NOT NULL,
  `tiempo` varchar(300) NOT NULL,
  `conservacion` varchar(300) NOT NULL,
  `transporte` varchar(300) NOT NULL,
  `observaciones` varchar(1500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Volcar la base de datos para la tabla `muestra`
--

INSERT INTO `muestra` (`id`, `sindrome`, `diagnostico_presuntivo`, `tipo`, `tiempo`, `conservacion`, `transporte`, `observaciones`) VALUES
(1, 'Febril Ictérico Agudo', 'Hepatitis A', 'Suero', '>= 5 (cinco) Días de inicio del Síntoma', '4ºC', '4ºC', ''),
(2, 'Febril Ictérico Agudo', 'Hepatitis B', 'Suero', '>= 5 (cinco) Días de inicio del Síntoma', '4ºC', '4ºC', ''),
(3, 'Febril Ictérico Agudo', 'Hepatitis C', 'Suero', '>= 7 (siete) Días de inicio del Síntoma', '4ºC', '4ºC', ''),
(4, 'Febril Ictérico Agudo', 'Leptospira', 'Suero', '<= 5 días', '4ºC', '4ºC', 'Para confirmación de caso se requiere otro suero en fase convaleciente.'),
(5, 'Febril Ictérico Agudo', 'Leptospira', 'Sangre con Heparina', '<= 10 días', 'A Temperatura Ambiente', 'Temperatura Ambiente', ''),
(6, 'Febril Ictérico Agudo', 'Leptospira', 'Orina', '<= 10 días', 'A Temperatura Ambiente', 'Temperatura Ambiente', ''),
(7, 'Febril Ictérico Agudo', 'Fiebre Amarilla', 'Suero', '<= 5 días', '4ºC', '4°C (si tarda más de 48 horas para el envío, preservar a -70°C y enviar en hielo seco)', 'Para estudio serológico se requiere de otro suero en fase convaleciente.'),
(8, 'Febril Ictérico Agudo', 'Fiebre Amarilla', 'Suero', '>= 5 (cinco) Días de inicio del Síntoma', '4ºC', '4ºC', ''),
(9, 'Febril Ictérico Agudo', 'Dengue', 'Suero', '<= 5 días', '4ºC', '4°C (si tarda más de 48 horas para el envío, preservar a -70°C y enviar en hielo seco)', 'Para estudio serológico se requiere de otro suero en fase convaleciente.'),
(10, 'Febril Ictérico Agudo', 'Dengue', 'Suero', '>= 5 (cinco) Días de inicio del Síntoma', '4ºC', '4°C (si tarda más de 48 horas para el envío, preservar a -70°C y enviar en hielo seco)', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opc_analisis_muestras`
--

CREATE TABLE IF NOT EXISTS `opc_analisis_muestras` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `cod_muestra` varchar(200) NOT NULL,
  `analisis_muestras` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Volcar la base de datos para la tabla `opc_analisis_muestras`
--

INSERT INTO `opc_analisis_muestras` (`id`, `cod_muestra`, `analisis_muestras`) VALUES
(1, '1', 'Detección de Anticuerpos (IgM)'),
(2, '2', 'Detección de Antigenos (AgsHB)'),
(3, '2', 'Detección de Anticuerpos (Anti-HBs/Anti-HBc)'),
(4, '3', 'Detección de Anticuerpos (IgG)'),
(5, '3', 'Confirmatorio en caso de muestra positiva'),
(6, '4', 'Detección de Anticuerpos (TR)'),
(7, '4', 'Detección de Material Genético (PCR)'),
(8, '5', 'Aislamiento'),
(9, '6', 'Aislamiento'),
(10, '7', 'Aislamiento viral en cultivo celular'),
(11, '7', 'Detección de Material Genético (PCR)'),
(12, '8', 'Detección de Anticuerpos (IgM)'),
(13, '9', 'Aislamiento viral en cultivo celular'),
(14, '9', 'Detección de Material Genético (PCR)'),
(15, '10', 'Detección de Anticuerpos (IgM)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opc_muestra`
--

CREATE TABLE IF NOT EXISTS `opc_muestra` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `cod_muestra` varchar(200) NOT NULL,
  `info_interes` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `opc_muestra`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sindrome`
--

CREATE TABLE IF NOT EXISTS `sindrome` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `sindrome` varchar(200) NOT NULL,
  `detalles` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcar la base de datos para la tabla `sindrome`
--

INSERT INTO `sindrome` (`id`, `sindrome`, `detalles`) VALUES
(1, 'Diarreico Agudo', ''),
(2, 'Febril Hemorrágico Agudo', ''),
(3, 'Febril Ictérico Agudo', ''),
(4, 'Neurológico Agudo', ''),
(5, 'Respiratorio Agudo', ''),
(6, 'Febril Eruptivo', ''),
(7, '333', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiempo_toma_muestras`
--

CREATE TABLE IF NOT EXISTS `tiempo_toma_muestras` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `tiempo_toma_muestras` varchar(300) NOT NULL,
  `detalles` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcar la base de datos para la tabla `tiempo_toma_muestras`
--

INSERT INTO `tiempo_toma_muestras` (`id`, `tiempo_toma_muestras`, `detalles`) VALUES
(1, '>= 5 (cinco) Días de inicio del Síntoma', ''),
(2, '>= 7 (siete) Días de inicio del Síntoma', ''),
(3, '<= 5 días', ''),
(4, '<= 10 días', ''),
(5, 'Gancho febril', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_muestras`
--

CREATE TABLE IF NOT EXISTS `tipo_muestras` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `tipo_muestras` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Volcar la base de datos para la tabla `tipo_muestras`
--

INSERT INTO `tipo_muestras` (`id`, `tipo_muestras`) VALUES
(1, 'Sangre'),
(2, 'LCR'),
(3, 'Conjuntiva-Cornea'),
(4, 'Heces'),
(5, 'Suero'),
(6, 'Piel'),
(7, 'Orina'),
(8, 'Víceras'),
(9, 'Sangre con Heparina'),
(10, 'Sangre con Anticoagulante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmp_analisis_muestras`
--

CREATE TABLE IF NOT EXISTS `tmp_analisis_muestras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(200) NOT NULL,
  `analisis_muestras` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Volcar la base de datos para la tabla `tmp_analisis_muestras`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transporte_muestras`
--

CREATE TABLE IF NOT EXISTS `transporte_muestras` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `transporte_muestras` varchar(300) NOT NULL,
  `detalles` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `transporte_muestras`
--

INSERT INTO `transporte_muestras` (`id`, `transporte_muestras`, `detalles`) VALUES
(1, '4ºC', ''),
(2, 'Temperatura Ambiente', ''),
(3, 'Hielo Seco', ''),
(5, '4°C (si tarda más de 48 horas para el envío, preservar a -70°C y enviar en hielo seco)', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(300) NOT NULL,
  `contrasenia` varchar(300) NOT NULL,
  `nombre_usuario` varchar(300) NOT NULL,
  `cedula` varchar(200) NOT NULL,
  `cod_unidad` varchar(300) NOT NULL,
  `unidad` varchar(300) NOT NULL,
  `privilegio` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Datos Usuario' AUTO_INCREMENT=7 ;

--
-- Volcar la base de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `contrasenia`, `nombre_usuario`, `cedula`, `cod_unidad`, `unidad`, `privilegio`) VALUES
(1, 'dilarreta', '5fb4f4369e82ec5d08ef3db404e32a30', 'DOMINGO JOSÉ ILARRETA HEYDRAS', '17588630', 'IF', 'AREA DE INFORMATICA', '0'),
(2, 'evivas', '99e3da71f54713c1d813899d474cd64f', 'EMILY Z. VIVAS LA C.', '15821695', 'IF', 'AREA DE INFORMATICA', '0'),
(3, 'vrodriguez', 'efe2952e6c5356845dc9fb00ab4e35b4', 'VICTOR RODRIGUEZ', '12140750', 'IF', 'AREA DE INFORMATICA', '0'),
(4, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'Diagnóstico y Vigilancia Epidemiológica', 'DE', 'DE', 'DE', '0'),
(5, 'mperticara', '2c2da8919b4abf1ac68b15123838cd39', 'MARLENE PERTICARA', '18249088', 'DE', 'DE', '0'),
(6, 'lguerrero', '8f7f09740f7cae85fe09e936a3c02874', 'LEONARDO GUERRERO', '11917913', 'DE', 'DE', '0');
