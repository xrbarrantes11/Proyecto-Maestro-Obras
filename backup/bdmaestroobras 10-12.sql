-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-10-2022 a las 03:36:46
-- Versión del servidor: 10.4.24-MariaDB
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
  `tbclientecedula` varchar(12) CHARACTER SET latin1 NOT NULL,
  `tbclientenombre` text NOT NULL,
  `tbclienteapellidos` text NOT NULL,
  `tbclientetelefono` varchar(8) NOT NULL,
  `tbclientecorreo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbcliente`
--

INSERT INTO `tbcliente` (`tbclienteid`, `tbclientecedula`, `tbclientenombre`, `tbclienteapellidos`, `tbclientetelefono`, `tbclientecorreo`) VALUES
(1, '702880773', 'Kendall', 'Ortega', '85905028', 'kendallortega123@gmail.com'),
(3, '703490049', 'Yandel', 'Ortega', '87963214', 'yandellortega123@gmail.com'),
(5, '702670536', 'Kendal', 'Solano', '62892802', 'kendallsolano54@gmail.com'),
(6, '901030993', 'Enanias', 'Ortega', '87325889', 'enaniasortega@hotmail.com'),
(8, '702490212', 'Stephannie', 'Gutierrez', '83414355', 'stephanniegc96@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcotizacion`
--

CREATE TABLE `tbcotizacion` (
  `tbcotizacionid` int(11) NOT NULL,
  `tbcotizacionnumero` int(11) NOT NULL,
  `tbproveedorid` int(11) NOT NULL,
  `tbcotizacionmontobruto` int(11) NOT NULL,
  `tbcotizacionmontoneto` int(11) NOT NULL,
  `tbcotizaciondependiente` text NOT NULL,
  `tbcotizacionfechavigencia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbcotizacion`
--

INSERT INTO `tbcotizacion` (`tbcotizacionid`, `tbcotizacionnumero`, `tbproveedorid`, `tbcotizacionmontobruto`, `tbcotizacionmontoneto`, `tbcotizaciondependiente`, `tbcotizacionfechavigencia`) VALUES
(1, 1, 1, 4120, 8590, 'Fab', '2022-10-07'),
(2, 2, 2, 100001, 5000, 'Ken', '2020-01-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbempleado`
--

CREATE TABLE `tbempleado` (
  `tbempleadoid` int(11) NOT NULL,
  `tbempleadonombre` text NOT NULL,
  `tbempleadoapellidos` text NOT NULL,
  `tbempleadocedula` varchar(12) NOT NULL,
  `tbempleadotelefono` varchar(8) NOT NULL,
  `tbempleadoactivo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbempleado`
--

INSERT INTO `tbempleado` (`tbempleadoid`, `tbempleadonombre`, `tbempleadoapellidos`, `tbempleadocedula`, `tbempleadotelefono`, `tbempleadoactivo`) VALUES
(1, 'Derrek', 'Urena Solis', '402320535', '64122646', 1),
(2, 'Marvin', 'Urena Sanchez', '700850888', '50027899', 0),
(6, 'Kendall', 'Ortega', '702880773', '85905028', 0),
(7, 'Karla', 'Miranda', '701360537', '88589339', 1);

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
(2, 1, 'Derrek', '2022-09-27', '08:55:00', '12:56:00', 1),
(3, 1, 'Derrek', '2022-09-29', '14:35:00', '17:35:00', 1);

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
(2, 'Carguero', 'Encargado de la carga de material', 1, 11000),
(3, 'Peon', 'Encargado de ayudar', 1, 100000),
(4, 'Albanil', 'Encargado de ayudar', 1, 100000);

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
(10, 0, 1),
(13, 9, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbobra`
--

CREATE TABLE `tbobra` (
  `tbobraid` int(11) NOT NULL,
  `tbobranombre` text NOT NULL,
  `tbobradescripcion` text NOT NULL,
  `tbclienteid` int(11) NOT NULL,
  `tbobrafechainicio` date NOT NULL,
  `tbobrafechaentrega` date DEFAULT NULL,
  `tbobrafechaestimadafinalizacion` date DEFAULT NULL,
  `tbobracostoestimado` int(11) NOT NULL,
  `tbobracostofinalizado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbobra`
--

INSERT INTO `tbobra` (`tbobraid`, `tbobranombre`, `tbobradescripcion`, `tbclienteid`, `tbobrafechainicio`, `tbobrafechaentrega`, `tbobrafechaestimadafinalizacion`, `tbobracostoestimado`, `tbobracostofinalizado`) VALUES
(1, 'Remodelacion cocina', 'Remodelacion Completa de la cocina', 0, '2022-08-22', '2022-10-01', '2022-09-24', 0, 123456),
(2, 'Construccion Casa ', 'Construccion de una casa de dos plantas', 0, '2022-09-01', '2022-11-01', '2022-11-30', 1234, 12346),
(3, 'casa', 'asas', 3, '2022-10-06', '2022-10-06', '2022-10-06', 0, 121212),
(4, 'Remodelacion Cocina', 'asas', 2, '2022-10-21', '2022-10-28', '2022-10-26', 0, 1234),
(5, 'nmnm', 'nmnm', 9, '2022-10-20', '2022-09-27', '2022-09-26', 0, 1234);

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
(1, 'Departamento', 'Edificacion pequena de 50m cuadrados', 1),
(2, 'Casa Hogar', 'Edificación mediana 80m cuadrados', 1),
(3, 'cuarto', 'varios', 1),
(4, 'cocina', 'varios', 1);

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
-- Estructura de tabla para la tabla `tbproveedor`
--

CREATE TABLE `tbproveedor` (
  `tbproveedorid` int(11) NOT NULL,
  `tbproveedornombre` text CHARACTER SET latin1 NOT NULL,
  `tbproveedorapellido` text CHARACTER SET latin1 NOT NULL,
  `tbproveedortelefono` int(11) NOT NULL,
  `tbproveedorcorreo` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbproveedor`
--

INSERT INTO `tbproveedor` (`tbproveedorid`, `tbproveedornombre`, `tbproveedorapellido`, `tbproveedortelefono`, `tbproveedorcorreo`) VALUES
(1, 'Marvin', 'Arias', 85657543, 'marvinarias@gmail.com'),
(2, 'Randy', 'Barrantes', 50002194, 'randybarrantes@gmail.com'),
(3, 'Kendall', 'Ortega', 85905029, 'kendall@gmail.com');

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
-- Indices de la tabla `tbcotizacion`
--
ALTER TABLE `tbcotizacion`
  ADD PRIMARY KEY (`tbcotizacionid`);

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
  ADD PRIMARY KEY (`tbempleadotipoasignadoid`);

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
  ADD PRIMARY KEY (`tbplanillaid`);

--
-- Indices de la tabla `tbproveedor`
--
ALTER TABLE `tbproveedor`
  ADD PRIMARY KEY (`tbproveedorid`);

--
-- Indices de la tabla `tbsalario`
--
ALTER TABLE `tbsalario`
  ADD PRIMARY KEY (`tbsalarioid`);

--
-- Indices de la tabla `tbsalarioperiodo`
--
ALTER TABLE `tbsalarioperiodo`
  ADD PRIMARY KEY (`tbsalarioperiodoid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
