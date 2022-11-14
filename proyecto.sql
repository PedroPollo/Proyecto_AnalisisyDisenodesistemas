-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2022 a las 04:48:57
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `administrador_id` int(11) NOT NULL,
  `administrador_nombre` varchar(45) NOT NULL,
  `administrador_usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `alumno_id` int(11) NOT NULL,
  `alumno_nombre` varchar(45) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`alumno_id`, `alumno_nombre`, `usuario_id`) VALUES
(1, 'Maximiliano Lugo Zavala', 4),
(2, 'Filomeno Segundo Lopez', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestro`
--

CREATE TABLE `maestro` (
  `maestro_id` int(11) NOT NULL,
  `maestro_nombre` varchar(45) NOT NULL,
  `maestro_usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `materia_id` int(11) NOT NULL,
  `materia_nombre` varchar(45) NOT NULL,
  `maestro_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padres_id`
--

CREATE TABLE `padres_id` (
  `padre_id` int(11) NOT NULL,
  `padre_nombre` varchar(45) NOT NULL,
  `padre_usuario_id` int(11) NOT NULL,
  `padre_hijo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `padres_id`
--

INSERT INTO `padres_id` (`padre_id`, `padre_nombre`, `padre_usuario_id`, `padre_hijo_id`) VALUES
(1, 'Baruc Manuel Torres Hernandez', 3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `rol_id` int(11) NOT NULL,
  `rol_nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`rol_id`, `rol_nombre`) VALUES
(1, 'Admin'),
(2, 'Maestro'),
(3, 'Alumno'),
(4, 'Padre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuarios_id` int(11) NOT NULL,
  `usuarios_nombre` varchar(15) NOT NULL,
  `usuarios_pass` varchar(30) NOT NULL,
  `usuarios_rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuarios_id`, `usuarios_nombre`, `usuarios_pass`, `usuarios_rol_id`) VALUES
(1, 'Pedro', '1234', 2),
(2, 'admin', 'admin', 1),
(3, 'Padre', '1234', 4),
(4, 'alumno1', '1234', 3),
(5, 'filomeno', '123', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vista_padre`
--

CREATE TABLE `vista_padre` (
  `padre_id` int(11) NOT NULL,
  `hijo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vista_padre`
--

INSERT INTO `vista_padre` (`padre_id`, `hijo_id`) VALUES
(1, 1),
(1, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`administrador_id`),
  ADD KEY `administrador_usuario_id` (`administrador_usuario_id`);

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`alumno_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `maestro`
--
ALTER TABLE `maestro`
  ADD PRIMARY KEY (`maestro_id`),
  ADD KEY `maestro_usuario_id` (`maestro_usuario_id`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`materia_id`),
  ADD KEY `maestro_id` (`maestro_id`);

--
-- Indices de la tabla `padres_id`
--
ALTER TABLE `padres_id`
  ADD PRIMARY KEY (`padre_id`),
  ADD KEY `padre_usuario_id` (`padre_usuario_id`),
  ADD KEY `padre_hijo_id` (`padre_hijo_id`),
  ADD KEY `padre_hijo_id_2` (`padre_hijo_id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`rol_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuarios_id`),
  ADD KEY `usuarios_rol_id` (`usuarios_rol_id`);

--
-- Indices de la tabla `vista_padre`
--
ALTER TABLE `vista_padre`
  ADD KEY `padre_id` (`padre_id`,`hijo_id`),
  ADD KEY `hijo_id` (`hijo_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `administrador_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `alumno_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `maestro`
--
ALTER TABLE `maestro`
  MODIFY `maestro_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `materia_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `padres_id`
--
ALTER TABLE `padres_id`
  MODIFY `padre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuarios_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD CONSTRAINT `administradores_ibfk_1` FOREIGN KEY (`administrador_usuario_id`) REFERENCES `usuarios` (`usuarios_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`usuarios_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `maestro`
--
ALTER TABLE `maestro`
  ADD CONSTRAINT `maestro_ibfk_1` FOREIGN KEY (`maestro_usuario_id`) REFERENCES `usuarios` (`usuarios_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `materia`
--
ALTER TABLE `materia`
  ADD CONSTRAINT `materia_ibfk_1` FOREIGN KEY (`maestro_id`) REFERENCES `maestro` (`maestro_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `padres_id`
--
ALTER TABLE `padres_id`
  ADD CONSTRAINT `padres_id_ibfk_1` FOREIGN KEY (`padre_usuario_id`) REFERENCES `usuarios` (`usuarios_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`usuarios_rol_id`) REFERENCES `rol` (`rol_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `vista_padre`
--
ALTER TABLE `vista_padre`
  ADD CONSTRAINT `vista_padre_ibfk_1` FOREIGN KEY (`hijo_id`) REFERENCES `alumno` (`alumno_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `vista_padre_ibfk_2` FOREIGN KEY (`padre_id`) REFERENCES `padres_id` (`padre_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
