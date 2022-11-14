-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2022 a las 22:39:55
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdmaestroobras`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcotizacionimagen`
--

CREATE TABLE `tbcotizacionimagen` (
  `tbcotizacionimagenid` int(11) NOT NULL,
  `tbcotizacionimagenruta` varchar(200) CHARACTER SET utf8 NOT NULL,
  `tbcotizacionimagenactivo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbcotizacionimagen`
--

INSERT INTO `tbcotizacionimagen` (`tbcotizacionimagenid`, `tbcotizacionimagenruta`, `tbcotizacionimagenactivo`) VALUES
(1, '../cotizacionimages/../cotizacionimages/1-1.jpeg', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbcotizacionimagen`
--
ALTER TABLE `tbcotizacionimagen`
  ADD PRIMARY KEY (`tbcotizacionimagenid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
