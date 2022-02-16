-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 16-02-2022 a las 18:40:27
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bsystems_nomina`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

DROP TABLE IF EXISTS `administrador`;
CREATE TABLE IF NOT EXISTS `administrador` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `correo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`ID`, `correo`, `contrasena`) VALUES
(1, 'corporativo@bsystems.com.mx', '$2y$10$ZiKbtioxriDPyHX1JZEMxOBaU78.VmI863lRQjJdhAv9ReVPqrbR2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nominas`
--

DROP TABLE IF EXISTS `nominas`;
CREATE TABLE IF NOT EXISTS `nominas` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_usuario` int(11) NOT NULL,
  `quincena` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `direccion` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_usuario` (`ID_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nominas`
--

INSERT INTO `nominas` (`ID`, `ID_usuario`, `quincena`, `fecha`, `direccion`) VALUES
(1, 20, 'Segunda quincena', '2021-12-15', 'documentos/nomina_01.pdf'),
(2, 1, 'Segunda Quincena', '2021-12-13', 'documentos/nomina_01.pdf'),
(4, 20, 'Segunda quincena', '2021-11-15', 'documentos/nomina_02.pdf'),
(5, 20, 'Primera Quincena', '2021-10-01', 'documentos/nomina_03.pdf'),
(6, 20, 'Segunda Quincena', '2021-10-15', 'documentos/nomina_04.pdf'),
(7, 20, 'Primera Quincena', '2021-09-01', 'documentos/nomina_05.pdf'),
(8, 20, 'Segunda Quincena', '2020-09-15', 'documentos/nomina_06.pdf'),
(9, 20, 'Primera Quincena', '2021-12-01', 'documentos/nomina_07.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `verificado` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `correo` (`correo`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `nombre`, `correo`, `contrasena`, `verificado`) VALUES
(1, 'jaime', 'a@bsystems.com.mx', '$2y$10$6R.4tRPtEtVUTEJp8BeT6OzR.ooQDfjNdstSgkr.D3AwFrDNI49iG', '1'),
(20, 'David Ramos Dias', 'corporativo@bsystems.com.mx', '$2y$10$QXx.irLvBtRLj/.TEu6Cte3nkN8Iuv4snd1g/1ooWLdZdAbLruWBi', '1');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `nominas`
--
ALTER TABLE `nominas`
  ADD CONSTRAINT `nominas_ibfk_1` FOREIGN KEY (`ID_usuario`) REFERENCES `usuarios` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
