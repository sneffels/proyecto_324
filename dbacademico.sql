-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 24-04-2016 a las 23:44:59
-- Versión del servidor: 5.5.42-1
-- Versión de PHP: 5.6.7-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `dbacademico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flujo`
--

CREATE TABLE IF NOT EXISTS `flujo` (
  `flujo` varchar(4) NOT NULL,
  `proceso` varchar(4) NOT NULL,
  `tipo` varchar(3) NOT NULL,
  `rol` varchar(8) NOT NULL,
  `proceso_sgt` varchar(4) NOT NULL,
  `formulario` varchar(19) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `flujo`
--

INSERT INTO `flujo` (`flujo`, `proceso`, `tipo`, `rol`, `proceso_sgt`, `formulario`) VALUES
('f1', 'P1', 'I', 'alumno', 'P2', 'index.php'),
('f1', 'P2', 'P', 'alumno', 'P3', 'inscripcion.php'),
('f1', 'P3', 'P', 'maquina', 'P4', 'codigo.php'),
('f1', 'P4', 'PR', 'maquina', '-', 'pregunta1'),
('f1', 'P5', 'P', 'alumno', 'P6', 'solicita_mat.php'),
('f1', 'P6', 'P', 'maquina', 'P7', 'verifica_max.php'),
('f1', 'P7', 'PR', 'maquina', '-', 'pregunta2'),
('f1', 'P8', 'P', 'maquina', 'P9', 'verifica_cupo.php'),
('f1', 'P9', 'PR', 'maquina', '-', 'pregunta3'),
('f1', 'P10', 'P', 'maquina', 'P11', 'agrega_mat.php'),
('f1', 'P11', 'PR', 'maquina', '-', 'pregunta4'),
('f1', 'P12', 'P', 'maquina', 'P13', 'imprime_boleta.php'),
('f1', 'P13', 'F', 'maquina', '-', '-');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `iduser` varchar(10) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `pwd` varchar(10) NOT NULL,
  `carnet` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`iduser`, `nombre`, `pwd`, `carnet`) VALUES
('AG9102122', 'ana garcia', '123456', '9102122'),
('JV9102020', 'juan vargas', '123456', '9102020'),
('RV9104020', 'raul velasco', '123456', '9104020');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE TABLE IF NOT EXISTS `materia` (
  `nombre` varchar(10) NOT NULL,
  `maxcupo` INT NOT NULL,
  `cupoactual` INT NOT NULL,

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `materia` (`nombre`, `maxcupo`, `cupoactual`) VALUES
('INF-161', 40, 0),
('INF-272', 50, 0),
('INF-121', 100, 0);

CREATE TABLE IF NOT EXISTS `materia_alumno` (
  `nombre` varchar(4) NOT NULL,
  `materia` INT NOT NULL,

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

