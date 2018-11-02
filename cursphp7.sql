-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: mysql:3306
-- Tiempo de generación: 02-11-2018 a las 19:13:51
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cursphp7`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asociados`
--

CREATE TABLE `asociados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `logo` varchar(60) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asociados`
--

INSERT INTO `asociados` (`id`, `nombre`, `logo`, `descripcion`) VALUES
(1, 'Asociado 1', '1539341010 logo6.jpg', 'Primer asociado'),
(2, 'Asociado 2', 'que-come-pinguino.jpg', 'Segundo asociado'),
(3, 'Asociado 3', 'pinguinoss.jpg', 'Tercer Asociado'),
(4, 'Asociado 4', '1541183708 pepebailando.gif', 'Cuarto Asociado'),
(5, 'Nuevo Asociado', 'pinguinisOKOK-1000x600.jpg', ''),
(6, 'Probando asociados', '1541185392 pinguinoss.jpg', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `numImagenes` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `numImagenes`) VALUES
(1, 'Categoria I', 6),
(2, 'Categoria II', 8),
(3, 'Categoria III', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `categoria` int(11) NOT NULL DEFAULT '1',
  `descripcion` varchar(255) NOT NULL,
  `numVisualizaciones` int(3) NOT NULL,
  `numLikes` int(3) NOT NULL,
  `numDownloads` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `nombre`, `categoria`, `descripcion`, `numVisualizaciones`, `numLikes`, `numDownloads`) VALUES
(1, 'pinguinisOKOK-1000x600.jpg', 1, '', 0, 0, 0),
(2, 'pinguinoss.jpg', 1, '', 0, 0, 0),
(3, 'que-come-pinguino.jpg', 1, '', 0, 0, 0),
(4, 'videos-de-pinguinos-770x430.jpg', 2, '', 0, 0, 0),
(5, 'pepebailando.gif', 1, '', 0, 0, 0),
(6, 'Cta3a_OXgAEOroQ.jpg', 3, '', 0, 0, 0),
(7, 'dorito.jpeg', 1, '', 0, 0, 0),
(8, '1541183708 pepebailando.gif', 2, '', 0, 0, 0),
(9, '1541183720 pinguinisOKOK-1000x600.jpg', 3, '', 0, 0, 0),
(10, '1541183984 pinguinoss.jpg', 2, '', 0, 0, 0),
(11, '4541496742708-Pinguino.jpg', 3, '', 0, 0, 0),
(12, '1541184509 4541496742708-Pinguino.jpg', 3, '', 0, 0, 0),
(13, 'log4.jpg', 2, '', 0, 0, 0),
(14, '1541184689 que-come-pinguino.jpg', 2, 'nueva imagen', 0, 0, 0),
(15, '1541184716 que-come-pinguino.jpg', 2, 'nueva imagen', 0, 0, 0),
(16, '1541184833 que-come-pinguino.jpg', 2, 'nueva imagen', 0, 0, 0),
(17, '1541184903 pinguinoss.jpg', 2, '', 0, 0, 0),
(18, '1541185367 pinguinisOKOK-1000x600.jpg', 1, '', 0, 0, 0),
(19, '1541185373 Cta3a_OXgAEOroQ.jpg', 3, '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `asunto` varchar(20) NOT NULL,
  `email` varchar(35) NOT NULL,
  `texto` varchar(50) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `role`) VALUES
(1, 'php', 'php', 'php');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asociados`
--
ALTER TABLE `asociados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_CATEGORIA_IMAGEN` (`categoria`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQUE_USERNAME` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asociados`
--
ALTER TABLE `asociados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `FK_CATEGORIA_IMAGEN` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
