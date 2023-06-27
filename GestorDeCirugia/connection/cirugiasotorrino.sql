-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 21-05-2023 a las 17:03:16
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cirugiasotorrino`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datoscirugias`
--

DROP TABLE IF EXISTS `datoscirugias`;
CREATE TABLE IF NOT EXISTS `datoscirugias` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `FechaRegistro` date NOT NULL,
  `Afiliacion` int(11) NOT NULL,
  `Nombre` text NOT NULL,
  `Telefono` varchar(9) NOT NULL,
  `Telefono2` varchar(9) DEFAULT NULL,
  `ProgramacionCX` date NOT NULL,
  `FechaCX` date NOT NULL,
  `Cirujano` text NOT NULL,
  `CirugiaProgramada` text NOT NULL,
  `Examenes` date DEFAULT NULL,
  `EVMI` date DEFAULT NULL,
  `EVAnestecia` date DEFAULT NULL,
  `DatosEspecialidad` text,
  `PruebaCovid` date DEFAULT NULL,
  `EnviadoGeneral` varchar(10) NOT NULL,
  `Detalles` text,
  `IdEstado` int(11) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `estado_fk` (`IdEstado`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `datoscirugias`
--

INSERT INTO `datoscirugias` (`codigo`, `FechaRegistro`, `Afiliacion`, `Nombre`, `Telefono`, `Telefono2`, `ProgramacionCX`, `FechaCX`, `Cirujano`, `CirugiaProgramada`, `Examenes`, `EVMI`, `EVAnestecia`, `DatosEspecialidad`, `PruebaCovid`, `EnviadoGeneral`, `Detalles`, `IdEstado`) VALUES
(1, '2023-05-19', 123456789, 'Romel Ernesto Tejada Pena', '1234-1234', '1299-1234', '2023-05-15', '2023-05-15', 'Dr. Jual Alberto', 'Amigdalas', '2023-05-09', '2023-05-10', '2023-05-09', 'Lorem Ipsum es simplemente el texto.4', NULL, 'Si', 'Lorem Ipsum es simplemente el texto.', 1),
(2, '2023-05-19', 929841298, 'Wilber Francisco Chacón Erroa', '1293-1233', '8920-2144', '2023-05-03', '2023-05-04', 'Dr. Alberto Montano', 'Amigdalas', '2023-05-03', '2023-05-03', '2023-05-10', 'Lorem Ipsum es simplemente el texto.', '2023-05-03', 'Si', 'Lorem Ipsum es simplemente el texto.', 2),
(3, '2023-05-19', 902841382, 'Kevin Armando Otero Henriquez', '9820-1276', '1331-1454', '2023-05-03', '2023-05-18', 'Dra. Monica Castillo', 'Estepocdotomia', '2023-05-17', '2023-05-31', '2023-05-17', 'Lorem Ipsum es simplemente el texto.', '2023-05-10', 'No', 'Lorem Ipsum es simplemente el texto.', 3),
(4, '2023-05-19', 920143298, 'Kenya Dominguez Lopez', '0814-1212', '2121-2222', '2023-05-03', '2023-05-06', 'Dr. Carlos Castro', 'Amigdalas', '2023-05-24', '2023-05-24', '2023-05-24', 'Lorem Ipsum es simplemente el texto.', '2023-05-25', 'Si', 'Lorem Ipsum es simplemente el texto.', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

DROP TABLE IF EXISTS `estado`;
CREATE TABLE IF NOT EXISTS `estado` (
  `IdEstado` int(11) NOT NULL AUTO_INCREMENT,
  `NombreEstado` varchar(50) NOT NULL,
  PRIMARY KEY (`IdEstado`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`IdEstado`, `NombreEstado`) VALUES
(1, 'Realizada'),
(2, 'En espera'),
(3, 'Suspendida'),
(4, 'Fecha cambiada');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `datoscirugias`
--
ALTER TABLE `datoscirugias`
  ADD CONSTRAINT `estado_fk` FOREIGN KEY (`IdEstado`) REFERENCES `estado` (`IdEstado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
