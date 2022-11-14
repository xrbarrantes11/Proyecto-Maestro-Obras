-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-08-2022 a las 03:21:31
-- Versión del servidor: 10.6.7-MariaDB
-- Versión de PHP: 7.4.29

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
-- Estructura de tabla para la tabla `tbtipoempleado`
--

CREATE TABLE `tbtipoempleado` (
  `tbtipoempleadoid` int(11) NOT NULL,
  `tbtipoempleadonombre` text NOT NULL,
  `tbtipoempleadodescripcion` text NOT NULL,
  `tbtipoempleadoactivo` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbtipoempleado`
--

INSERT INTO `tbtipoempleado` (`tbtipoempleadoid`, `tbtipoempleadonombre`, `tbtipoempleadodescripcion`, `tbtipoempleadoactivo`) VALUES
(3, 'Electricista', 'Encargado de el cableado eléctrico', 1),
(4, 'Cargueros', 'Encargado de descargar y cargar los materiales', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbtipoempleado`
--
ALTER TABLE `tbtipoempleado`
  ADD PRIMARY KEY (`tbtipoempleadoid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
