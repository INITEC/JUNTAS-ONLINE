-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 17-11-2013 a las 00:35:12
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
  `cod_cliente` int(11) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `num_tarjeta` int(11) DEFAULT NULL,
  `user` varchar(20) DEFAULT NULL,
  `pass` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`cod_cliente`, `nombre`, `correo`, `num_tarjeta`, `user`, `pass`) VALUES
(1, 'juan', 'jibf@gmail.com', 2015151515, 'JOTA', '123'),
(2, 'Alex', 'alex@gmail.com', 2147483647, 'Alex', '123'),
(3, 'milton', 'm@gmail.cmo', 2147483647, 'Milton', '123'),
(4, 'erick', 'eum_6@gmail.com', 2147483647, 'Erick', '123'),
(5, 'David', 'dav7d@gmail.com', 2147483647, 'Davichon', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `junta`
--

CREATE TABLE IF NOT EXISTS `junta` (
  `cod_junta` int(11) DEFAULT NULL,
  `monto_t` int(11) DEFAULT NULL,
  `tiempo_t` int(11) DEFAULT NULL,
  `frec_pago` int(11) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `fecha_ini` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `junta`
--

INSERT INTO `junta` (`cod_junta`, `monto_t`, `tiempo_t`, `frec_pago`, `estado`, `fecha_ini`) VALUES
(1, 1200, 12, 1, 'activo', '2013-11-08'),
(2, 2400, 12, 1, 'activo', '2013-11-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_x`
--

CREATE TABLE IF NOT EXISTS `tabla_x` (
  `cod_cliente` int(11) DEFAULT NULL,
  `cod_junta` int(11) DEFAULT NULL,
  `puesto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tabla_x`
--

INSERT INTO `tabla_x` (`cod_cliente`, `cod_junta`, `puesto`) VALUES
(1, 1, 1),
(2, 1, 2),
(1, 1, 1),
(3, 1, 7),
(4, 1, 6),
(1, 2, 3),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_y`
--

CREATE TABLE IF NOT EXISTS `tabla_y` (
  `cod_junta` int(11) DEFAULT NULL,
  `cod_cliente1` int(11) DEFAULT NULL,
  `cod_cliente2` int(11) DEFAULT NULL,
  `transacciones` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tabla_y`
--

INSERT INTO `tabla_y` (`cod_junta`, `cod_cliente1`, `cod_cliente2`, `transacciones`) VALUES
(1, 1, 2, 50),
(1, 5, 3, 120);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_z`
--

CREATE TABLE IF NOT EXISTS `tabla_z` (
  `cod_junta` int(11) DEFAULT NULL,
  `utilidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
