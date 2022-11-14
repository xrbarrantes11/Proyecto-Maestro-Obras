-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-09-2022 a las 16:57:04
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
-- Estructura de tabla para la tabla `tbcliente`
--

CREATE TABLE `tbcliente` (
  `tbclienteid` int(11) NOT NULL,
  `tbclientecedula` text CHARACTER SET latin1 NOT NULL,
  `tbclientenombre` text NOT NULL,
  `tbclienteapellidos` text NOT NULL,
  `tbclientetelefono` text NOT NULL,
  `tbclientecorreo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbcliente`
--

INSERT INTO `tbcliente` (`tbclienteid`, `tbclientecedula`, `tbclientenombre`, `tbclienteapellidos`, `tbclientetelefono`, `tbclientecorreo`) VALUES
(1, '702880773', 'Kendall', 'Ortega', '85905028', 'kendallortega123@gmail.com'),
(2, '701360537', 'Karla', 'Miranda', '88589330', 'karlamirandad997@gmail.com'),
(3, '703490049', 'Yandel', 'Ortega', '87963214', 'yandellortega123@gmail.com');

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
  `tbempleadoactivo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbempleado`
--

INSERT INTO `tbempleado` (`tbempleadoid`, `tbempleadonombre`, `tbempleadoapellidos`, `tbempleadocedula`, `tbempleadotelefono`, `tbempleadoactivo`) VALUES
(1, 'Derrek', 'Urena Solis', '402320535', '64122646', 1),
(2, 'Marvin', 'Urena Sanchez', '700850888', '50027899', 0),
(6, 'Kendall', 'Ortega', '702880773', '85905028', 0),
(7, 'Karla', 'Miranda', '701360537', '88589330', 1),
(8, 'Randy', 'Barrantes', '702870369', '697959759', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbempleadocostohora`
--

CREATE TABLE `tbempleadocostohora` (
  `tbcostohoraid` int(11) NOT NULL,
  `tbempleadoid` int(11) NOT NULL,
  `tbempleadonombre` text CHARACTER SET latin1 NOT NULL,
  `tbempleadofechaactual` date NOT NULL,
  `tbempleadohorainicio` time NOT NULL,
  `tbempleadohorafin` time DEFAULT NULL,
  `tbempleadoestado` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbempleadocostohora`
--

INSERT INTO `tbempleadocostohora` (`tbcostohoraid`, `tbempleadoid`, `tbempleadonombre`, `tbempleadofechaactual`, `tbempleadohorainicio`, `tbempleadohorafin`, `tbempleadoestado`) VALUES
(1, 1, 'Derrek', '2022-09-26', '01:46:00', '01:47:00', 1),
(2, 1, 'Derrek', '2022-09-27', '08:55:00', '12:56:00', 1);

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
-- Estructura de tabla para la tabla `tbempleadotipoasignado`
--

CREATE TABLE `tbempleadotipoasignado` (
  `tbempleadotipoasignadoid` int(11) NOT NULL,
  `tbempleadoid` int(11) NOT NULL,
  `tbempleadotipoid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbempleadotipoasignado`
--

INSERT INTO `tbempleadotipoasignado` (`tbempleadotipoasignadoid`, `tbempleadoid`, `tbempleadotipoid`) VALUES
(1, 1, 1),
(2, 2, 1),
(5, 2, 2),
(6, 1, 1),
(8, 6, 2),
(9, 7, 1),
(10, 8, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbobra`
--

CREATE TABLE `tbobra` (
  `tbobraid` int(11) NOT NULL,
  `tbobranombre` text NOT NULL,
  `tbobradescripcion` text NOT NULL,
  `tbobraclienteid` text NOT NULL,
  `tbobrafechainicio` date NOT NULL,
  `tbobrafechaentrega` date DEFAULT NULL,
  `tbobrafechaestimadafinalizacion` date DEFAULT NULL,
  `tbobracostoestimado` int(11) NOT NULL,
  `tbobracostofinalizado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbobra`
--

INSERT INTO `tbobra` (`tbobraid`, `tbobranombre`, `tbobradescripcion`, `tbobraclienteid`, `tbobrafechainicio`, `tbobrafechaentrega`, `tbobrafechaestimadafinalizacion`, `tbobracostoestimado`, `tbobracostofinalizado`) VALUES
(1, 'Remodelacion cocina', 'Remodelacion Completa de la cocina', 'Melany Azofeifa Urena', '2022-08-22', '2022-10-01', '2022-09-24', 1234, 123456),
(2, 'Construccion Casa ', 'Construccion de una casa de dos plantas', 'Veronica Esquivel', '2022-09-01', '2022-11-01', '2022-11-30', 1234, 12346);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbobratipo`
--

CREATE TABLE `tbobratipo` (
  `tbobratipoid` int(11) NOT NULL,
  `tbobratiponombre` text NOT NULL,
  `tbobratipodescripcion` text NOT NULL,
  `tbobratipoactivo` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbobratipo`
--

INSERT INTO `tbobratipo` (`tbobratipoid`, `tbobratiponombre`, `tbobratipodescripcion`, `tbobratipoactivo`) VALUES
(1, 'Departamento', 'Edificacion pequena de 50m cuadrados', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbplanilla`
--

CREATE TABLE `tbplanilla` (
  `tbplanillaid` int(11) NOT NULL,
  `tbempleadoid` int(11) NOT NULL,
  `tbplanillahorastrabajadas` int(11) NOT NULL,
  `tbplanillahorasextra` int(11) NOT NULL,
  `tbplanilladeducciones` int(11) NOT NULL,
  `tbplanillatotal` int(11) NOT NULL,
  `tbplanillafecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbplanilla`
--

INSERT INTO `tbplanilla` (`tbplanillaid`, `tbempleadoid`, `tbplanillahorastrabajadas`, `tbplanillahorasextra`, `tbplanilladeducciones`, `tbplanillatotal`, `tbplanillafecha`) VALUES
(1, 1, 5, 0, 0, 20000, '2022-09-16'),
(2, 2, 5, 0, 0, 17000, '2022-09-16'),
(3, 2, 0, 0, 0, 0, '2022-09-16'),
(4, 1, 0, 0, 0, 0, '2022-09-16'),
(5, 1, 0, 0, 0, 0, '2022-09-16'),
(6, 1, 18, 0, 0, 0, '2022-09-16'),
(7, 2, 0, 0, 0, 0, '2022-09-19');

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
(1, 2, 1, '2022-09-04', '2022-09-05', 1, 0, 0),
(2, 2, 1, '2022-09-01', '2022-09-09', 1, 0, 0),
(3, 2, 1, '2022-09-03', '2022-09-16', 0, 0, 0),
(4, 1, 2, '2022-09-01', '2022-09-16', 0, 0, 0),
(5, 1, 2, '2022-09-01', '2022-09-16', 2, 0, 0),
(6, 1, 2, '2022-09-02', '2022-09-16', 2, 0, 0),
(7, 2, 1, '2022-09-19', '2022-09-19', 0, 0, 0),
(8, 2, 1, '2022-09-08', '2022-09-20', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbsalarioperiodo`
--

CREATE TABLE `tbsalarioperiodo` (
  `tbsalarioperiodoid` int(11) NOT NULL,
  `tbsalarioperiodocategoria` text CHARACTER SET latin1 NOT NULL,
  `tbsalarioperiodotipo` text CHARACTER SET latin1 NOT NULL,
  `tbsalarioperiododescripcion` text CHARACTER SET latin1 NOT NULL,
  `tbsalarioperiodoactivo` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbsalarioperiodo`
--

INSERT INTO `tbsalarioperiodo` (`tbsalarioperiodoid`, `tbsalarioperiodocategoria`, `tbsalarioperiodotipo`, `tbsalarioperiododescripcion`, `tbsalarioperiodoactivo`) VALUES
(1, 'Semana', 'Periodo', 'Pago cada semana', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbcliente`
--
ALTER TABLE `tbcliente`
  ADD PRIMARY KEY (`tbclienteid`);

--
-- Indices de la tabla `tbempleado`
--
ALTER TABLE `tbempleado`
  ADD PRIMARY KEY (`tbempleadoid`);

--
-- Indices de la tabla `tbempleadocostohora`
--
ALTER TABLE `tbempleadocostohora`
  ADD PRIMARY KEY (`tbcostohoraid`);

--
-- Indices de la tabla `tbempleadotipo`
--
ALTER TABLE `tbempleadotipo`
  ADD PRIMARY KEY (`tbempleadotipoid`);

--
-- Indices de la tabla `tbempleadotipoasignado`
--
ALTER TABLE `tbempleadotipoasignado`
  ADD PRIMARY KEY (`tbempleadotipoasignadoid`),
  ADD KEY `tbempleadoid` (`tbempleadoid`),
  ADD KEY `tbempleadotipoid` (`tbempleadotipoid`);

--
-- Indices de la tabla `tbobra`
--
ALTER TABLE `tbobra`
  ADD PRIMARY KEY (`tbobraid`);

--
-- Indices de la tabla `tbobratipo`
--
ALTER TABLE `tbobratipo`
  ADD PRIMARY KEY (`tbobratipoid`);

--
-- Indices de la tabla `tbplanilla`
--
ALTER TABLE `tbplanilla`
  ADD PRIMARY KEY (`tbplanillaid`),
  ADD KEY `tbempleadoid` (`tbempleadoid`);

--
-- Indices de la tabla `tbsalario`
--
ALTER TABLE `tbsalario`
  ADD PRIMARY KEY (`tbsalarioid`),
  ADD KEY `tbempleadoid` (`tbempleadoid`),
  ADD KEY `tbempleadotipoid` (`tbempleadotipoid`);

--
-- Indices de la tabla `tbsalarioperiodo`
--
ALTER TABLE `tbsalarioperiodo`
  ADD PRIMARY KEY (`tbsalarioperiodoid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbobra`
--
ALTER TABLE `tbobra`
  MODIFY `tbobraid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbempleadotipoasignado`
--
ALTER TABLE `tbempleadotipoasignado`
  ADD CONSTRAINT `tbempleadotipoasignado_ibfk_1` FOREIGN KEY (`tbempleadoid`) REFERENCES `tbempleado` (`tbempleadoid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbempleadotipoasignado_ibfk_2` FOREIGN KEY (`tbempleadotipoid`) REFERENCES `tbempleadotipo` (`tbempleadotipoid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
