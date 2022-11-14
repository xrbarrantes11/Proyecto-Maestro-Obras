-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-09-2022 a las 06:22:39
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
(7, 'Karla', 'Miranda', '701360537', '88589330', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbempleadocostohora`
--

CREATE TABLE `tbempleadocostohora` (
  `tbempleadoid` int(11) NOT NULL,
  `tbempleadonombre` text CHARACTER SET latin1 NOT NULL,
  `tbempleadofechainicio` datetime NOT NULL,
  `tbempleadofechafin` datetime DEFAULT NULL,
  `tbempleadocanthoras` decimal(7,2) DEFAULT NULL,
  `tbempleadoestado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbempleadocostohora`
--

INSERT INTO `tbempleadocostohora` (`tbempleadoid`, `tbempleadonombre`, `tbempleadofechainicio`, `tbempleadofechafin`, `tbempleadocanthoras`, `tbempleadoestado`) VALUES
(1, 'Derrek', '2022-09-02 05:33:00', '2022-09-02 18:39:00', '13.10', 0),
(1, 'Derrek', '2022-09-04 12:34:00', '2022-09-04 17:34:00', '5.00', 0),
(1, 'Derrek', '2022-09-19 10:04:00', '2022-09-19 16:04:00', '6.00', 0),
(1, 'Derrek', '2022-09-08 11:52:00', '2022-09-08 17:52:00', '6.00', 0);

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
(9, 7, 1);

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
