-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-08-2022 a las 08:48:05
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.28

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
-- Estructura de tabla para la tabla `tbempleado`
--

CREATE TABLE `tbempleado` (
  `tbempleadoid` int(11) NOT NULL,
  `tbempleadonombre` text NOT NULL,
  `tbempleadoapellidos` text NOT NULL,
  `tbempleadocedula` text NOT NULL,
  `tbempleadotelefono` text NOT NULL,
  `tbempleadocanthoras` int(11) NOT NULL,
  `tbempleadotipoempleado` text NOT NULL,
  `tbempleadoidconstruccion` int(11) NOT NULL,
  `tbempleadoactivo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbempleado`
--

INSERT INTO `tbempleado` (`tbempleadoid`, `tbempleadonombre`, `tbempleadoapellidos`, `tbempleadocedula`, `tbempleadotelefono`, `tbempleadocanthoras`, `tbempleadotipoempleado`, `tbempleadoidconstruccion`, `tbempleadoactivo`) VALUES
(1, 'Derrek', 'Urena Solis', '402320535', '64122646', 8, 'Cargador', 1, 0),
(2, 'Marvin', 'Urena Sanchez', '700850888', '50027899', 15, 'Electricista', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbempleadocostohora`
--

CREATE TABLE `tbempleadocostohora` (
  `tbempleadoid` int(11) NOT NULL,
  `tbempleadonombre` text CHARACTER SET latin1 NOT NULL,
  `tbempleadocanthoras` int(11) NOT NULL,
  `tbempleadofechainicio` int(11) NOT NULL,
  `tbempleadofechafin` int(11) DEFAULT NULL,
  `tbempleadosalario` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbempleadocostohora`
--

INSERT INTO `tbempleadocostohora` (`tbempleadoid`, `tbempleadonombre`, `tbempleadocanthoras`, `tbempleadofechainicio`, `tbempleadofechafin`, `tbempleadosalario`) VALUES
(1, 'Ever', 0, 0, NULL, NULL);

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
