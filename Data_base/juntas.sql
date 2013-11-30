-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 30-11-2013 a las 21:34:50
-- Versión del servidor: 5.5.34-0ubuntu0.13.10.1
-- Versión de PHP: 5.5.3-1ubuntu2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `juntas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `cod_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) DEFAULT NULL,
  `num_tarjeta` varchar(20) DEFAULT NULL,
  `user` varchar(20) DEFAULT NULL,
  `pass` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`cod_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`cod_cliente`, `nombre`, `num_tarjeta`, `user`, `pass`) VALUES
(1, 'Juan Basilio', '2147483647', 'JOTA', '123'),
(2, 'Alex', '7845681452', 'ALEX', '123'),
(3, 'Milton', '784512365', 'MILTON', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `junta`
--

CREATE TABLE IF NOT EXISTS `junta` (
  `cod_junta` int(11) NOT NULL AUTO_INCREMENT,
  `monto_t` int(11) DEFAULT NULL,
  `tiempo_t` int(11) DEFAULT NULL,
  `frec_pago` int(11) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `fecha_ini` date DEFAULT NULL,
  `cod_cliente` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod_junta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `junta`
--

INSERT INTO `junta` (`cod_junta`, `monto_t`, `tiempo_t`, `frec_pago`, `estado`, `fecha_ini`, `cod_cliente`) VALUES
(1, 1200, 3, 1, 'activo', '2013-11-08', 1),
(2, 2400, 12, 1, 'activo', '2013-11-08', 2),
(3, 900, 9, 1, 'activo', '2013-11-26', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_x`
--

CREATE TABLE IF NOT EXISTS `tabla_x` (
  `id_tabla_x` int(11) NOT NULL AUTO_INCREMENT,
  `cod_cliente` int(11) DEFAULT NULL,
  `cod_junta` int(11) DEFAULT NULL,
  `puesto` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_tabla_x`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tabla_x`
--

INSERT INTO `tabla_x` (`id_tabla_x`, `cod_cliente`, `cod_junta`, `puesto`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 3),
(3, 3, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_y`
--

CREATE TABLE IF NOT EXISTS `tabla_y` (
  `id_tabla_y` int(11) NOT NULL AUTO_INCREMENT,
  `cod_junta` int(11) DEFAULT NULL,
  `cod_cliente1` int(11) DEFAULT NULL,
  `cod_cliente2` int(11) DEFAULT NULL,
  `transacciones` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_tabla_y`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_z`
--

CREATE TABLE IF NOT EXISTS `tabla_z` (
  `id_tabla_z` int(11) NOT NULL AUTO_INCREMENT,
  `cod_junta` int(11) DEFAULT NULL,
  `utilidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_tabla_z`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
