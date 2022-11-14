-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-09-2022 a las 07:21:16
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
-- Estructura de tabla para la tabla `tbempleado`
--

CREATE TABLE `tbempleado` (
  `tbempleadoid` int(11) NOT NULL,
  `tbempleadonombre` text NOT NULL,
  `tbempleadoapellidos` text NOT NULL,
  `tbempleadocedula` text NOT NULL,
  `tbempleadotelefono` text NOT NULL,
  `tbempleadotipoempleado` text NOT NULL,
  `tbempleadoidconstruccion` int(11) NOT NULL,
  `tbempleadoactivo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbempleado`
--

INSERT INTO `tbempleado` (`tbempleadoid`, `tbempleadonombre`, `tbempleadoapellidos`, `tbempleadocedula`, `tbempleadotelefono`, `tbempleadotipoempleado`, `tbempleadoidconstruccion`, `tbempleadoactivo`) VALUES
(1, 'Derrek', 'Urena Solis', '402320535', '64122646', 'Cargador', 1, 0),
(2, 'Marvin', 'Urena Sanchez', '700850888', '50027899', 'Electricista', 1, 0);

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
-- Estructura de tabla para la tabla `tbempleadotipo`
--

CREATE TABLE `tbempleadotipo` (
  `tbempleadotipoid` int(11) NOT NULL,
  `tbempleadotiponombre` text NOT NULL,
  `tbempleadotipodescripcion` text NOT NULL,
  `tbempleadotipoactivo` tinyint(4) NOT NULL,
  `tbempleadotiposalariobase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbempleadotipo`
--

INSERT INTO `tbempleadotipo` (`tbempleadotipoid`, `tbempleadotiponombre`, `tbempleadotipodescripcion`, `tbempleadotipoactivo`, `tbempleadotiposalariobase`) VALUES
(1, 'Electricista', 'Encargado del cableado electrico', 0, 15000),
(2, 'Carguero', 'Encargado de la carga de material', 0, 11000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbobracatalogo`
--

CREATE TABLE `tbobracatalogo` (
  `tbobracatalogoid` int(11) NOT NULL,
  `tbobracatalogonombre` text NOT NULL,
  `tbobracatalogodescripcion` text NOT NULL,
  `tbobracatalogoactivo` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbobracatalogo`
--

INSERT INTO `tbobracatalogo` (`tbobracatalogoid`, `tbobracatalogonombre`, `tbobracatalogodescripcion`, `tbobracatalogoactivo`) VALUES
(1, 'Departamento', 'Edificacion pequena de 50m cuadrados', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbempleadotipo`
--
ALTER TABLE `tbempleadotipo`
  ADD PRIMARY KEY (`tbempleadotipoid`);

--
-- Indices de la tabla `tbobracatalogo`
--
ALTER TABLE `tbobracatalogo`
  ADD PRIMARY KEY (`tbobracatalogoid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
