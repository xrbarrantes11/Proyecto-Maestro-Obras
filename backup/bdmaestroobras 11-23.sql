-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2022 a las 08:19:03
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.4.21

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
(1, '603330546', 'Derrek', 'Urena', '89550093', 'derrek@gmail.com'),
(2, '508234711', 'Ever', 'Castro', '87336622', 'ever@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcotizacion`
--

CREATE TABLE `tbcotizacion` (
  `tbcotizacionid` int(11) NOT NULL,
  `tbobraid` int(11) NOT NULL,
  `tbproveedorid` int(11) NOT NULL,
  `tbcotizacionimagenid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbcotizacion`
--

INSERT INTO `tbcotizacion` (`tbcotizacionid`, `tbobraid`, `tbproveedorid`, `tbcotizacionimagenid`) VALUES
(1, 1, 2, 1);

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
(1, '../cotizacionimages/../cotizacionimages/1-2.jpeg', 1);

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
(2, 'Randy', 'Barrantes', '702870369', '50002194', 1),
(3, 'Kendall', 'Ortega Miranda', '799210092', '73546798', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbempleadocostohora`
--

CREATE TABLE `tbempleadocostohora` (
  `tbcostohoraid` int(11) NOT NULL,
  `tbempleadoid` int(11) NOT NULL,
  `tbempleadofechaactual` date NOT NULL,
  `tbempleadohorainicio` time NOT NULL,
  `tbempleadohorafin` time DEFAULT NULL,
  `tbempleadoestado` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbempleadocostohora`
--

INSERT INTO `tbempleadocostohora` (`tbcostohoraid`, `tbempleadoid`, `tbempleadofechaactual`, `tbempleadohorainicio`, `tbempleadohorafin`, `tbempleadoestado`) VALUES
(1, 2, '2022-11-10', '03:56:00', '15:56:00', 1),
(2, 3, '2022-11-11', '03:57:00', '15:57:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbempleadocostohorarango`
--

CREATE TABLE `tbempleadocostohorarango` (
  `tbempleadocostohorarangoid` int(11) NOT NULL,
  `tbempleadotipoid` int(11) NOT NULL,
  `tbempleadocostohorarangoinferior` decimal(10,0) NOT NULL,
  `tbempleadocostohorarangosuperior` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbempleadocostohorarango`
--

INSERT INTO `tbempleadocostohorarango` (`tbempleadocostohorarangoid`, `tbempleadotipoid`, `tbempleadocostohorarangoinferior`, `tbempleadocostohorarangosuperior`) VALUES
(1, 1, '1000', '5000'),
(2, 2, '1000', '10000');

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
(1, 'Cierrero', 'Corta madera con alta presicion', 1, 1000),
(2, 'Soldador', ' Unir piezas de metal', 1, 2000);

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
(2, 2, 2),
(3, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbempleadotipoempleadopago`
--

CREATE TABLE `tbempleadotipoempleadopago` (
  `tbempleadoid` int(11) NOT NULL,
  `tbtipoempleadoid` int(11) NOT NULL,
  `tbempleadotipoempleadopagohora` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbempleadotipoempleadopago`
--

INSERT INTO `tbempleadotipoempleadopago` (`tbempleadoid`, `tbtipoempleadoid`, `tbempleadotipoempleadopagohora`) VALUES
(3, 1, 1500),
(2, 2, 3000),
(2, 2, 15000),
(3, 1, 50000),
(3, 1, 25000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbjornadasemanal`
--

CREATE TABLE `tbjornadasemanal` (
  `tbjornadasemanalid` int(11) NOT NULL,
  `empleadoid` int(11) NOT NULL,
  `tbjornadasemanalfechainicio` date NOT NULL,
  `tbjornadasemanafechafin` date NOT NULL,
  `tbjornadasemanalsumatoriamontosactividades` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbjornadasemanal`
--

INSERT INTO `tbjornadasemanal` (`tbjornadasemanalid`, `empleadoid`, `tbjornadasemanalfechainicio`, `tbjornadasemanafechafin`, `tbjornadasemanalsumatoriamontosactividades`) VALUES
(1, 2, '2022-11-22', '2022-11-24', 90000),
(2, 3, '2022-11-22', '2022-11-23', 15000),
(3, 2, '2022-11-22', '2022-11-22', 15000),
(4, 3, '2022-11-22', '2022-11-29', 50000),
(5, 3, '2022-11-23', '2022-11-30', 25000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbjornadasemanaldetalle`
--

CREATE TABLE `tbjornadasemanaldetalle` (
  `tbjornadasemanaldetalleid` int(11) NOT NULL,
  `tbjornadasemanalid` int(11) NOT NULL,
  `tbjornadasemanaldetallefechainicio` date NOT NULL,
  `tbjornadasemanaldetallefechafin` date NOT NULL,
  `tbjornadasemanaldetallemontoganadoactividad` float NOT NULL,
  `tbjornadasemanaldetalletipoempleado` int(11) NOT NULL,
  `tbjornadasemanaldetallecantidadhoras` int(11) NOT NULL,
  `tbjornadasemanaldetallecantidaddias` int(11) NOT NULL,
  `tbjornadasemanaldetalleporsemana` tinyint(4) NOT NULL,
  `tbjornadasemanaldetalleportarea` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbjornadasemanaldetalle`
--

INSERT INTO `tbjornadasemanaldetalle` (`tbjornadasemanaldetalleid`, `tbjornadasemanalid`, `tbjornadasemanaldetallefechainicio`, `tbjornadasemanaldetallefechafin`, `tbjornadasemanaldetallemontoganadoactividad`, `tbjornadasemanaldetalletipoempleado`, `tbjornadasemanaldetallecantidadhoras`, `tbjornadasemanaldetallecantidaddias`, `tbjornadasemanaldetalleporsemana`, `tbjornadasemanaldetalleportarea`) VALUES
(1, 1, '2022-11-22', '2022-11-24', 90000, 2, 30, 0, 0, 0),
(2, 2, '2022-11-22', '2022-11-23', 15000, 1, 10, 0, 0, 0),
(3, 3, '2022-11-22', '2022-11-22', 15000, 2, 0, 1, 0, 0),
(4, 4, '2022-11-22', '2022-11-29', 50000, 1, 0, 0, 1, 0),
(5, 5, '2022-11-23', '2022-11-30', 25000, 1, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbobra`
--

CREATE TABLE `tbobra` (
  `tbobraid` int(11) NOT NULL,
  `tbobranombre` varchar(100) NOT NULL,
  `tbobradescripcion` text NOT NULL,
  `tbclienteid` int(11) NOT NULL,
  `tbobrafechainicio` date NOT NULL,
  `tbobrafechaentrega` date NOT NULL,
  `tbobrafechaestimadofinalizacion` date NOT NULL,
  `tbobracostoestimado` int(11) NOT NULL,
  `tbobracostofinalizado` int(11) NOT NULL,
  `tbobradiasfinalizacionanticipada` int(11) NOT NULL,
  `tbobradiasfinalizacionatrasado` int(11) NOT NULL,
  `tbobraganancia` int(11) NOT NULL,
  `tbobraperdida` int(11) NOT NULL,
  `tbobradiasestimadoobra` int(11) NOT NULL,
  `tbobrafinalizada` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbobra`
--

INSERT INTO `tbobra` (`tbobraid`, `tbobranombre`, `tbobradescripcion`, `tbclienteid`, `tbobrafechainicio`, `tbobrafechaentrega`, `tbobrafechaestimadofinalizacion`, `tbobracostoestimado`, `tbobracostofinalizado`, `tbobradiasfinalizacionanticipada`, `tbobradiasfinalizacionatrasado`, `tbobraganancia`, `tbobraperdida`, `tbobradiasestimadoobra`, `tbobrafinalizada`) VALUES
(1, 'Cochera', 'Agrandar para tres autos', 1, '2022-11-02', '2022-11-03', '2022-11-23', 1000000, 3000000, 0, 20, 1500000, 0, 29, 1),
(2, 'Corredor', 'Chorrear piso al corredor', 2, '2022-11-22', '2022-11-25', '2022-12-09', 2000000, 2500000, 0, 10, 2000000, 0, 15, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbobraetapa`
--

CREATE TABLE `tbobraetapa` (
  `tbobraetapaid` int(11) NOT NULL,
  `tbobraid` int(11) NOT NULL,
  `tbobraetapanombre` text NOT NULL,
  `tbobraetapadescricion` text NOT NULL,
  `tbobraetapaduracionaproximada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbobraetapa`
--

INSERT INTO `tbobraetapa` (`tbobraetapaid`, `tbobraid`, `tbobraetapanombre`, `tbobraetapadescricion`, `tbobraetapaduracionaproximada`) VALUES
(1, 1, 'chorrear', 'Hacer mezcla y chorrear piso', 30),
(2, 2, 'lujado', 'Lujar el piso', 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbobraetapaempleadotipoasignado`
--

CREATE TABLE `tbobraetapaempleadotipoasignado` (
  `tbobraetapaempleadotipoasignadoid` int(11) NOT NULL,
  `tbobraetapaid` int(11) NOT NULL,
  `tbempleadoid` int(11) NOT NULL,
  `tbempleadotipoid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbobraetapaempleadotipoasignado`
--

INSERT INTO `tbobraetapaempleadotipoasignado` (`tbobraetapaempleadotipoasignadoid`, `tbobraetapaid`, `tbempleadoid`, `tbempleadotipoid`) VALUES
(1, 1, 2, 2),
(2, 2, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbobraetapamateriales`
--

CREATE TABLE `tbobraetapamateriales` (
  `tbetapamaterialesid` int(11) NOT NULL,
  `tbetapaid` int(11) NOT NULL,
  `tbetapanombremateriales` varchar(1000) NOT NULL,
  `tbetapacantidad` int(11) NOT NULL,
  `tbetapacostoaproximado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbobraetapamateriales`
--

INSERT INTO `tbobraetapamateriales` (`tbetapamaterialesid`, `tbetapaid`, `tbetapanombremateriales`, `tbetapacantidad`, `tbetapacostoaproximado`) VALUES
(1, 1, 'Cemento, arena y piedra', 10, 4000),
(2, 2, 'Pala, martillo y cuerda', 12, 2000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbobraimagenes`
--

CREATE TABLE `tbobraimagenes` (
  `tbobraimagenesid` int(11) NOT NULL,
  `tbobraid` int(11) NOT NULL,
  `tbobraimagenesruta` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbobraimagenes`
--

INSERT INTO `tbobraimagenes` (`tbobraimagenesid`, `tbobraid`, `tbobraimagenesruta`) VALUES
(1, 1, '../obraimagenes/1-1.jpeg');

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
(1, 'Cochera', 'Chorrear piso de la cohcera', 1);

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
(1, 2, 0, 5, 0, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbproveedor`
--

CREATE TABLE `tbproveedor` (
  `tbproveedorid` int(11) NOT NULL,
  `tbproveedornombre` text CHARACTER SET latin1 NOT NULL,
  `tbproveedorapellido` text CHARACTER SET latin1 NOT NULL,
  `tbproveedorcomercio` text CHARACTER SET latin1 NOT NULL,
  `tbproveedorcedula` varchar(12) CHARACTER SET latin1 NOT NULL,
  `tbproveedortelefono` int(11) NOT NULL,
  `tbproveedorcorreo` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbproveedor`
--

INSERT INTO `tbproveedor` (`tbproveedorid`, `tbproveedornombre`, `tbproveedorapellido`, `tbproveedorcomercio`, `tbproveedorcedula`, `tbproveedortelefono`, `tbproveedorcorreo`) VALUES
(1, 'Juan', 'Gonzales', 'Ferreteria', '703478299', 58827232, 'juangonzales@gmail.com'),
(2, 'Steven', 'Aguilar', 'Almacen', '798233211', 83099112, 'steven@gmail.com');

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
(1, 2, 2, '2022-11-22', '2022-11-30', 0, 5, 10);

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
(1, 'Semana', 'Contrato', 'Pago por el contrato firmado', 1);

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
-- Indices de la tabla `tbcotizacionimagen`
--
ALTER TABLE `tbcotizacionimagen`
  ADD PRIMARY KEY (`tbcotizacionimagenid`);

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
-- Indices de la tabla `tbobraetapa`
--
ALTER TABLE `tbobraetapa`
  ADD PRIMARY KEY (`tbobraetapaid`);

--
-- Indices de la tabla `tbobraetapaempleadotipoasignado`
--
ALTER TABLE `tbobraetapaempleadotipoasignado`
  ADD PRIMARY KEY (`tbobraetapaempleadotipoasignadoid`);

--
-- Indices de la tabla `tbobraetapamateriales`
--
ALTER TABLE `tbobraetapamateriales`
  ADD PRIMARY KEY (`tbetapamaterialesid`);

--
-- Indices de la tabla `tbobraimagenes`
--
ALTER TABLE `tbobraimagenes`
  ADD PRIMARY KEY (`tbobraimagenesid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
