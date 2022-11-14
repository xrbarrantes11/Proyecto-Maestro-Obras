-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-09-2022 a las 23:34:26
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
  `tbempleadotipoempleado` int(11) NOT NULL,
  `tbempleadoidconstruccion` int(11) NOT NULL,
  `tbempleadoactivo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbempleado`
--

INSERT INTO `tbempleado` (`tbempleadoid`, `tbempleadonombre`, `tbempleadoapellidos`, `tbempleadocedula`, `tbempleadotelefono`, `tbempleadotipoempleado`, `tbempleadoidconstruccion`, `tbempleadoactivo`) VALUES
(1, 'Derrek', 'Urena Solis', '402320535', '64122646', 2, 1, 0),
(2, 'Marvin', 'Urena Sanchez', '700850888', '50027899', 1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbempleadocostohora`
--

CREATE TABLE `tbempleadocostohora` (
  `tbempleadoid` int(11) NOT NULL,
  `tbempleadonombre` text CHARACTER SET latin1 NOT NULL,
  `tbempleadofechainicio` datetime NOT NULL,
  `tbempleadofechafin` datetime DEFAULT NULL,
  `tbempleadocanthoras` decimal(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbempleadocostohora`
--

INSERT INTO `tbempleadocostohora` (`tbempleadoid`, `tbempleadonombre`, `tbempleadofechainicio`, `tbempleadofechafin`, `tbempleadocanthoras`) VALUES
(1, 'Derrek', '2022-09-04 16:00:00', '2022-09-04 17:00:00', '1.00'),
(2, 'Marvin', '2022-09-04 18:15:00', '2022-09-05 05:00:00', '10.75'),
(3, 'Marvin', '2022-09-04 20:10:00', '2022-09-10 20:10:00', '144.00');

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
(1, 'Electricista', 'Encargado del cableado electrico', 1, 15000),
(2, 'Carguero', 'Encargado de la carga de material', 1, 11000);

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbsalario`
--

CREATE TABLE `tbsalario` (
  `tbsalarioid` int(11) NOT NULL,
  `tbempleadoid` int(11) NOT NULL,
  `tbempleadotipoid` int(11) NOT NULL,
  `tbsalariofechainicio` date NOT NULL,
  `tbsalariofechafin` date NOT NULL,
  `tbsalariodiaslaborados` int(11) NOT NULL,
  `tbsalariohoraslaboradasextra` int(11) NOT NULL,
  `tbsalariobonificacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbsalario`
--

INSERT INTO `tbsalario` (`tbsalarioid`, `tbempleadoid`, `tbempleadotipoid`, `tbsalariofechainicio`, `tbsalariofechafin`, `tbsalariodiaslaborados`, `tbsalariohoraslaboradasextra`, `tbsalariobonificacion`) VALUES
(1, 2, 1, '2022-09-04', '2022-09-05', 1, 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbempleado`
--
ALTER TABLE `tbempleado`
  ADD PRIMARY KEY (`tbempleadoid`),
  ADD KEY `FK_TIPOEMPLEADO` (`tbempleadotipoempleado`);

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

--
-- Indices de la tabla `tbsalario`
--
ALTER TABLE `tbsalario`
  ADD PRIMARY KEY (`tbsalarioid`),
  ADD KEY `tbempleadoid` (`tbempleadoid`),
  ADD KEY `tbempleadotipoid` (`tbempleadotipoid`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbempleado`
--
ALTER TABLE `tbempleado`
  ADD CONSTRAINT `FK_TIPOEMPLEADO` FOREIGN KEY (`tbempleadotipoempleado`) REFERENCES `tbempleadotipo` (`tbempleadotipoid`);

--
-- Filtros para la tabla `tbsalario`
--
ALTER TABLE `tbsalario`
  ADD CONSTRAINT `tbsalario_ibfk_1` FOREIGN KEY (`tbempleadoid`) REFERENCES `tbempleado` (`tbempleadoid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbsalario_ibfk_2` FOREIGN KEY (`tbempleadotipoid`) REFERENCES `tbempleadotipo` (`tbempleadotipoid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
