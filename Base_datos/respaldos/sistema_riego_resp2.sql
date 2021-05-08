-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-01-2020 a las 06:18:54
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_riego`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compuesto`
--

CREATE TABLE `compuesto` (
  `id_comp` int(11) NOT NULL,
  `nom_comp` varchar(64) NOT NULL,
  `react1` varchar(64) DEFAULT NULL,
  `react2` varchar(64) DEFAULT NULL,
  `react3` varchar(64) DEFAULT NULL,
  `react4` varchar(64) DEFAULT NULL,
  `react5` varchar(64) DEFAULT NULL,
  `estado` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `compuesto`
--

INSERT INTO `compuesto` (`id_comp`, `nom_comp`, `react1`, `react2`, `react3`, `react4`, `react5`, `estado`) VALUES
(1, 'NUTRIENTE 1', 'CLORO', 'CALCIO', 'POTASIO', '-', '-', 1),
(2, 'NUTRIENTE 2', 'SODIO', 'LITIO', 'COBRE', '-', '-', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cultivo`
--

CREATE TABLE `cultivo` (
  `id_cultivo` int(11) NOT NULL,
  `desc_cultivo` varchar(32) NOT NULL,
  `duracion` varchar(32) NOT NULL,
  `estado` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cultivo`
--

INSERT INTO `cultivo` (`id_cultivo`, `desc_cultivo`, `duracion`, `estado`) VALUES
(1, 'TOMATE', '3 MESES', 1),
(2, 'FRESA', '4 MESES', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observacion`
--

CREATE TABLE `observacion` (
  `id_obs` int(11) NOT NULL,
  `id_zona` int(11) NOT NULL,
  `id_ubi` int(11) NOT NULL,
  `desc_obs` varchar(32) NOT NULL,
  `cultivo` varchar(32) NOT NULL,
  `foto_zona` varchar(64) NOT NULL,
  `usuario` varchar(64) NOT NULL,
  `fec_obs` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `observacion`
--

INSERT INTO `observacion` (`id_obs`, `id_zona`, `id_ubi`, `desc_obs`, `cultivo`, `foto_zona`, `usuario`, `fec_obs`) VALUES
(1, 2, 2, 'ESTA BUENO', 'TOMATE', 'IMG-20170810-WA0024.jpg', 'JUAN RO', '2020-01-20 04:42:05'),
(4, 1, 1, 'BUENA SUSTANCIAL', 'FRESA', 'IMG-20170921-WA0004.jpg', 'JUAN RO', '2020-01-22 16:58:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `id_reg` int(11) NOT NULL,
  `id_zona` int(11) NOT NULL,
  `id_ubi` int(11) NOT NULL,
  `cultivo` varchar(32) NOT NULL,
  `fechahora` timestamp NOT NULL DEFAULT current_timestamp(),
  `temp_amb` decimal(9,2) DEFAULT NULL,
  `hume_amb` decimal(9,2) DEFAULT NULL,
  `iluminacion` decimal(9,2) DEFAULT NULL,
  `temp_suelo` decimal(9,2) DEFAULT NULL,
  `hume_suelo` decimal(9,2) DEFAULT NULL,
  `ph` decimal(9,2) DEFAULT NULL,
  `co2` decimal(9,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`id_reg`, `id_zona`, `id_ubi`, `cultivo`, `fechahora`, `temp_amb`, `hume_amb`, `iluminacion`, `temp_suelo`, `hume_suelo`, `ph`, `co2`) VALUES
(1, 1, 1, 'TOMATE', '2020-01-30 04:28:43', '28.50', '80.73', '0.00', '0.00', '0.00', '0.00', '0.00'),
(2, 1, 1, 'TOMATE', '2020-01-30 04:30:23', '28.50', '80.73', '0.00', '0.00', '0.00', '0.00', '0.00'),
(3, 1, 1, 'TOMATE', '2020-01-30 04:32:03', '28.50', '80.73', '0.00', '0.00', '0.00', '0.00', '0.00'),
(4, 1, 1, 'TOMATE', '2020-01-30 04:33:43', '28.50', '80.73', '0.00', '0.00', '0.00', '0.00', '0.00'),
(5, 1, 1, 'TOMATE', '2020-01-30 04:35:23', '28.50', '80.73', '0.00', '0.00', '0.00', '0.00', '0.00'),
(6, 1, 1, 'TOMATE', '2020-01-30 04:37:03', '28.50', '80.73', '0.00', '0.00', '0.00', '0.00', '0.00'),
(7, 1, 1, 'TOMATE', '2020-01-30 04:38:43', '28.50', '80.73', '0.00', '0.00', '0.00', '0.00', '0.00'),
(8, 1, 1, 'TOMATE', '2020-01-30 04:40:23', '28.50', '80.73', '0.00', '0.00', '0.00', '0.00', '0.00'),
(9, 1, 1, 'TOMATE', '2020-01-30 04:42:03', '28.50', '80.73', '0.00', '0.00', '0.00', '0.00', '0.00'),
(10, 1, 1, 'TOMATE', '2020-01-30 04:43:43', '28.50', '80.73', '0.00', '0.00', '0.00', '0.00', '0.00'),
(11, 1, 1, 'TOMATE', '2020-01-30 04:45:23', '28.50', '80.73', '0.00', '0.00', '0.00', '0.00', '0.00'),
(12, 1, 1, 'TOMATE', '2020-01-30 04:47:03', '28.50', '80.73', '0.00', '0.00', '0.00', '0.00', '0.00'),
(13, 1, 1, 'TOMATE', '2020-01-30 04:48:43', '28.50', '80.73', '0.00', '0.00', '0.00', '0.00', '0.00'),
(14, 1, 1, 'TOMATE', '2020-01-30 04:50:38', '28.50', '80.73', '0.00', '0.00', '0.00', '0.00', '0.00'),
(15, 1, 1, 'TOMATE', '2020-01-30 04:52:03', '28.50', '80.73', '0.00', '0.00', '0.00', '0.00', '0.00'),
(16, 1, 1, 'TOMATE', '2020-01-30 04:53:43', '28.50', '80.73', '0.00', '0.00', '0.00', '0.00', '0.00'),
(17, 1, 1, 'TOMATE', '2020-01-30 04:55:23', '28.50', '80.73', '0.00', '0.00', '0.00', '0.00', '0.00'),
(18, 1, 1, 'TOMATE', '2020-01-30 04:57:03', '28.50', '80.73', '0.00', '0.00', '0.00', '0.00', '0.00'),
(19, 1, 1, 'TOMATE', '2020-01-30 04:58:43', '28.50', '80.73', '0.00', '0.00', '0.00', '0.00', '0.00'),
(20, 1, 1, 'TOMATE', '2020-01-30 05:00:23', '28.50', '80.73', '0.00', '0.00', '0.00', '0.00', '0.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `desc_rol` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `desc_rol`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'VISITANTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suelo`
--

CREATE TABLE `suelo` (
  `id_suelo` int(11) NOT NULL,
  `densidad` int(11) NOT NULL,
  `materia_org` int(11) NOT NULL,
  `arcilla` int(11) NOT NULL,
  `arena` int(11) NOT NULL,
  `limo` int(11) NOT NULL,
  `estado` int(11) DEFAULT 1,
  `desc_suelo` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `suelo`
--

INSERT INTO `suelo` (`id_suelo`, `densidad`, `materia_org`, `arcilla`, `arena`, `limo`, `estado`, `desc_suelo`) VALUES
(1, 30, 45, 20, 10, 15, 1, 'COMPOSTA'),
(2, 50, 35, 60, 20, 20, 1, 'TIERRA CAFE'),
(3, 0, 0, 0, 0, 0, 1, 'HIDROPONICO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE `ubicacion` (
  `id_ubi` int(11) NOT NULL,
  `desc_ubi` varchar(32) NOT NULL,
  `tipo_zona` varchar(32) NOT NULL,
  `estado` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ubicacion`
--

INSERT INTO `ubicacion` (`id_ubi`, `desc_ubi`, `tipo_zona`, `estado`) VALUES
(1, 'AZOTEA 1', 'VEGETALES', 1),
(2, 'AZOTEA 2', 'FRUTAS', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(11) NOT NULL,
  `nombres` varchar(64) NOT NULL,
  `apellidos` varchar(64) NOT NULL,
  `telefono` varchar(64) NOT NULL,
  `login` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `estado` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `nombres`, `apellidos`, `telefono`, `login`, `password`, `id_rol`, `estado`) VALUES
(1, 'JUAN RO', 'MALDONADO', '9621900297', 'juanro', 'riego1', 1, 1),
(2, 'JARBIN', 'BARRIOS', '96454169841', 'jarbin', 'riego2', 2, 1),
(3, 'DENISSE', 'LOPEZ', '96563164588', 'denue2', 'riego3', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona`
--

CREATE TABLE `zona` (
  `id_zona` int(11) NOT NULL,
  `nom_zona` varchar(32) NOT NULL,
  `id_ubi` int(11) NOT NULL,
  `id_cultivo` int(11) NOT NULL,
  `id_suelo` int(11) NOT NULL,
  `id_comp` int(11) NOT NULL,
  `fec_inicio` date NOT NULL,
  `fec_cosecha` date DEFAULT NULL,
  `estado` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `zona`
--

INSERT INTO `zona` (`id_zona`, `nom_zona`, `id_ubi`, `id_cultivo`, `id_suelo`, `id_comp`, `fec_inicio`, `fec_cosecha`, `estado`) VALUES
(1, 'ZONA ALTA', 1, 1, 1, 1, '2020-01-14', '0000-00-00', 1),
(2, 'ZONA BAJA', 2, 2, 2, 2, '2020-01-14', '0000-00-00', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compuesto`
--
ALTER TABLE `compuesto`
  ADD PRIMARY KEY (`id_comp`);

--
-- Indices de la tabla `cultivo`
--
ALTER TABLE `cultivo`
  ADD PRIMARY KEY (`id_cultivo`);

--
-- Indices de la tabla `observacion`
--
ALTER TABLE `observacion`
  ADD PRIMARY KEY (`id_obs`),
  ADD KEY `id_zona` (`id_zona`,`id_ubi`);

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id_reg`),
  ADD KEY `id_zona` (`id_zona`,`id_ubi`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `suelo`
--
ALTER TABLE `suelo`
  ADD PRIMARY KEY (`id_suelo`);

--
-- Indices de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD PRIMARY KEY (`id_ubi`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `zona`
--
ALTER TABLE `zona`
  ADD PRIMARY KEY (`id_zona`,`id_ubi`),
  ADD KEY `id_ubi` (`id_ubi`),
  ADD KEY `id_cultivo` (`id_cultivo`),
  ADD KEY `id_suelo` (`id_suelo`),
  ADD KEY `id_comp` (`id_comp`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `observacion`
--
ALTER TABLE `observacion`
  ADD CONSTRAINT `observacion_ibfk_1` FOREIGN KEY (`id_zona`,`id_ubi`) REFERENCES `zona` (`id_zona`, `id_ubi`);

--
-- Filtros para la tabla `registros`
--
ALTER TABLE `registros`
  ADD CONSTRAINT `registros_ibfk_1` FOREIGN KEY (`id_zona`,`id_ubi`) REFERENCES `zona` (`id_zona`, `id_ubi`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`);

--
-- Filtros para la tabla `zona`
--
ALTER TABLE `zona`
  ADD CONSTRAINT `zona_ibfk_2` FOREIGN KEY (`id_ubi`) REFERENCES `ubicacion` (`id_ubi`),
  ADD CONSTRAINT `zona_ibfk_3` FOREIGN KEY (`id_cultivo`) REFERENCES `cultivo` (`id_cultivo`),
  ADD CONSTRAINT `zona_ibfk_4` FOREIGN KEY (`id_suelo`) REFERENCES `suelo` (`id_suelo`),
  ADD CONSTRAINT `zona_ibfk_5` FOREIGN KEY (`id_comp`) REFERENCES `compuesto` (`id_comp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
