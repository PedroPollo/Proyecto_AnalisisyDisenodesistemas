-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 03-01-2023 a las 20:02:27
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

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
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `alumno_id` int(11) NOT NULL,
  `nombre_alumno` varchar(100) NOT NULL,
  `edad` int(11) NOT NULL,
  `cedula` varchar(20) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `fecha_registro` date NOT NULL,
  `clave` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`alumno_id`, `nombre_alumno`, `edad`, `cedula`, `correo`, `fecha_registro`, `clave`) VALUES
(5, 'Sergio', 16, '1', 'sergio@gmail.com', '2022-08-17', '123'),
(6, 'Joaquin', 16, '2', 'pedroaguila4322@gmail.com', '2020-08-03', '123'),
(9, 'Luis', 19, '123123', 'awdaodaoiwdjaowi@opaekfae.com', '2022-12-09', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aulas`
--

CREATE TABLE `aulas` (
  `aula_id` int(11) NOT NULL,
  `nombre_aula` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `aulas`
--

INSERT INTO `aulas` (`aula_id`, `nombre_aula`) VALUES
(6, 'Laboratorio de Computo 1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenidos`
--

CREATE TABLE `contenidos` (
  `contenido_id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `material` varchar(255) NOT NULL,
  `procesoprofesor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contenidos`
--

INSERT INTO `contenidos` (`contenido_id`, `titulo`, `descripcion`, `material`, `procesoprofesor_id`) VALUES
(1, 'Pimer Parcial', 'Aqui se asignaran las evaluaciones del primer parcial', '', 10),
(16, 'Primer Parcial', 'No Hay falla', '', 12),
(17, 'Segundo Parcial', 'No Hay falla', '', 12),
(18, 'Primer Parcial', 'Hola', 'Matematicas', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluaciones`
--

CREATE TABLE `evaluaciones` (
  `evaluacion_id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `porcentaje` varchar(100) NOT NULL,
  `contenido_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `evaluaciones`
--

INSERT INTO `evaluaciones` (`evaluacion_id`, `titulo`, `descripcion`, `fecha`, `porcentaje`, `contenido_id`) VALUES
(1, 'Esto', 'Es de ejemplo', '2022-12-22', '30%', 1),
(3, 'Esta es de', 'Matematicas', '2022-12-24', '50%', 16),
(4, 'Es de', 'matematicas para borrar', '2022-12-16', '30%', 17),
(6, 'Esto', 'Es de prueba', '2023-01-11', '30%', 18),
(7, 'Este es otro ejemplo', 'No Hay falla', '2023-01-11', '50%', 1),
(8, 'Otra prueba mas', 'No Hay falla', '2023-01-19', '20', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ev_entregadas`
--

CREATE TABLE `ev_entregadas` (
  `ev_entregadas_id` int(11) NOT NULL,
  `evaluacion_id` int(11) NOT NULL,
  `alumno_id` int(11) NOT NULL,
  `material` varchar(255) NOT NULL,
  `observacion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ev_entregadas`
--

INSERT INTO `ev_entregadas` (`ev_entregadas_id`, `evaluacion_id`, `alumno_id`, `material`, `observacion`) VALUES
(1, 1, 5, 'Esto es mi entrega', 'Aquib van mis conclusiones'),
(3, 1, 9, 'aefsfs', 'adwddess'),
(4, 7, 5, 'pokdpoawD', 'hhhhhh'),
(6, 6, 5, '', 'Esta es una entrega');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados`
--

CREATE TABLE `grados` (
  `grado_id` int(11) NOT NULL,
  `nombre_grado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grados`
--

INSERT INTO `grados` (`grado_id`, `nombre_grado`) VALUES
(9, 'Segundo'),
(10, 'Decimo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `materia_id` int(11) NOT NULL,
  `nombre_materia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`materia_id`, `nombre_materia`) VALUES
(6, 'Matematicas 1'),
(7, 'Matematicas 2'),
(8, 'Español 1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `nota_id` int(11) NOT NULL,
  `ev_entregadas_id` int(11) NOT NULL,
  `valor_nota` int(11) DEFAULT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`nota_id`, `ev_entregadas_id`, `valor_nota`, `fecha`) VALUES
(15, 1, 100, '2022-12-30 21:13:14'),
(18, 3, 90, '2023-01-01 13:10:34'),
(20, 4, 100, '2023-01-01 20:43:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padres`
--

CREATE TABLE `padres` (
  `padres_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `padres`
--

INSERT INTO `padres` (`padres_id`, `nombre`, `username`, `clave`) VALUES
(2, 'Soy el papa de prueba', 'papa', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodos`
--

CREATE TABLE `periodos` (
  `periodo_id` int(11) NOT NULL,
  `nombre_periodo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `periodos`
--

INSERT INTO `periodos` (`periodo_id`, `nombre_periodo`) VALUES
(5, '2021-1'),
(7, '2021-2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procesoalumno`
--

CREATE TABLE `procesoalumno` (
  `procesoa_id` int(11) NOT NULL,
  `alumno_id` int(11) NOT NULL,
  `proceso_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `procesoalumno`
--

INSERT INTO `procesoalumno` (`procesoa_id`, `alumno_id`, `proceso_id`) VALUES
(4, 5, 6),
(7, 9, 10),
(8, 6, 12),
(9, 5, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procesopadre`
--

CREATE TABLE `procesopadre` (
  `procesop_id` int(11) NOT NULL,
  `alumno_id` int(11) NOT NULL,
  `padres_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `procesopadre`
--

INSERT INTO `procesopadre` (`procesop_id`, `alumno_id`, `padres_id`) VALUES
(1, 5, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procesoprofesor`
--

CREATE TABLE `procesoprofesor` (
  `proceso_id` int(11) NOT NULL,
  `grado_id` int(11) NOT NULL,
  `aula_id` int(11) NOT NULL,
  `profesor_id` int(11) NOT NULL,
  `materia_id` int(11) NOT NULL,
  `periodo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `procesoprofesor`
--

INSERT INTO `procesoprofesor` (`proceso_id`, `grado_id`, `aula_id`, `profesor_id`, `materia_id`, `periodo_id`) VALUES
(6, 9, 6, 13, 6, 5),
(10, 9, 6, 5, 8, 5),
(12, 10, 6, 5, 6, 5),
(13, 10, 6, 13, 8, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `profesor_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `cedula` varchar(20) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `nivel_est` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`profesor_id`, `nombre`, `direccion`, `cedula`, `clave`, `telefono`, `correo`, `nivel_est`) VALUES
(5, 'Cecilio', 'Privada Ourisima #26', '123123', '123', '4991037180', 'pedroaguila4322@gmail.com', 'Licenciatura'),
(13, 'Baruc Manuel Torres Hernandez', 'La neta no se que poner', '13231231', '321311', '4123324321', 'dslf,s,fsdvdxvxpodvms', 'Licenciatura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `ap_paterno` varchar(45) NOT NULL,
  `ap_materno` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `nombre`, `ap_paterno`, `ap_materno`) VALUES
(1, 'admin', 'admin', 'Pedro Alejandro', 'Nuñez', 'Perez'),
(9, 'otrousuariomas', '123', 'Luis', 'Padriquez', 'eadf');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`alumno_id`);

--
-- Indices de la tabla `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`aula_id`);

--
-- Indices de la tabla `contenidos`
--
ALTER TABLE `contenidos`
  ADD PRIMARY KEY (`contenido_id`),
  ADD KEY `procesoprofesor_id` (`procesoprofesor_id`);

--
-- Indices de la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  ADD PRIMARY KEY (`evaluacion_id`),
  ADD KEY `contenido_id` (`contenido_id`);

--
-- Indices de la tabla `ev_entregadas`
--
ALTER TABLE `ev_entregadas`
  ADD PRIMARY KEY (`ev_entregadas_id`),
  ADD KEY `evaluacion_id` (`evaluacion_id`),
  ADD KEY `alumno_id` (`alumno_id`);

--
-- Indices de la tabla `grados`
--
ALTER TABLE `grados`
  ADD PRIMARY KEY (`grado_id`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`materia_id`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`nota_id`),
  ADD UNIQUE KEY `ev_entregadas_id_2` (`ev_entregadas_id`),
  ADD KEY `ev_entregadas_id` (`ev_entregadas_id`);

--
-- Indices de la tabla `padres`
--
ALTER TABLE `padres`
  ADD PRIMARY KEY (`padres_id`);

--
-- Indices de la tabla `periodos`
--
ALTER TABLE `periodos`
  ADD PRIMARY KEY (`periodo_id`);

--
-- Indices de la tabla `procesoalumno`
--
ALTER TABLE `procesoalumno`
  ADD PRIMARY KEY (`procesoa_id`),
  ADD KEY `alumno_id` (`alumno_id`),
  ADD KEY `proceso_id` (`proceso_id`);

--
-- Indices de la tabla `procesopadre`
--
ALTER TABLE `procesopadre`
  ADD PRIMARY KEY (`procesop_id`),
  ADD KEY `padres_id` (`padres_id`),
  ADD KEY `alumno_id` (`alumno_id`),
  ADD KEY `padres_id_2` (`padres_id`);

--
-- Indices de la tabla `procesoprofesor`
--
ALTER TABLE `procesoprofesor`
  ADD PRIMARY KEY (`proceso_id`),
  ADD KEY `grado_id` (`grado_id`),
  ADD KEY `aula_id` (`aula_id`),
  ADD KEY `profesor_id` (`profesor_id`),
  ADD KEY `materia_id` (`materia_id`),
  ADD KEY `periodo_id` (`periodo_id`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`profesor_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `alumno_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `aulas`
--
ALTER TABLE `aulas`
  MODIFY `aula_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `contenidos`
--
ALTER TABLE `contenidos`
  MODIFY `contenido_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  MODIFY `evaluacion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `ev_entregadas`
--
ALTER TABLE `ev_entregadas`
  MODIFY `ev_entregadas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `grados`
--
ALTER TABLE `grados`
  MODIFY `grado_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `materia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `nota_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `padres`
--
ALTER TABLE `padres`
  MODIFY `padres_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `periodos`
--
ALTER TABLE `periodos`
  MODIFY `periodo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `procesoalumno`
--
ALTER TABLE `procesoalumno`
  MODIFY `procesoa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `procesopadre`
--
ALTER TABLE `procesopadre`
  MODIFY `procesop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `procesoprofesor`
--
ALTER TABLE `procesoprofesor`
  MODIFY `proceso_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `profesor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contenidos`
--
ALTER TABLE `contenidos`
  ADD CONSTRAINT `contenidos_ibfk_1` FOREIGN KEY (`procesoprofesor_id`) REFERENCES `procesoprofesor` (`proceso_id`);

--
-- Filtros para la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  ADD CONSTRAINT `evaluaciones_ibfk_3` FOREIGN KEY (`contenido_id`) REFERENCES `contenidos` (`contenido_id`);

--
-- Filtros para la tabla `ev_entregadas`
--
ALTER TABLE `ev_entregadas`
  ADD CONSTRAINT `ev_entregadas_ibfk_1` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`alumno_id`),
  ADD CONSTRAINT `ev_entregadas_ibfk_2` FOREIGN KEY (`evaluacion_id`) REFERENCES `evaluaciones` (`evaluacion_id`);

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`ev_entregadas_id`) REFERENCES `ev_entregadas` (`ev_entregadas_id`);

--
-- Filtros para la tabla `procesoalumno`
--
ALTER TABLE `procesoalumno`
  ADD CONSTRAINT `procesoalumno_ibfk_1` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`alumno_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `procesoalumno_ibfk_2` FOREIGN KEY (`proceso_id`) REFERENCES `procesoprofesor` (`proceso_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `procesopadre`
--
ALTER TABLE `procesopadre`
  ADD CONSTRAINT `procesopadre_ibfk_1` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`alumno_id`),
  ADD CONSTRAINT `procesopadre_ibfk_2` FOREIGN KEY (`padres_id`) REFERENCES `padres` (`padres_id`);

--
-- Filtros para la tabla `procesoprofesor`
--
ALTER TABLE `procesoprofesor`
  ADD CONSTRAINT `procesoprofesor_ibfk_1` FOREIGN KEY (`aula_id`) REFERENCES `aulas` (`aula_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `procesoprofesor_ibfk_2` FOREIGN KEY (`grado_id`) REFERENCES `grados` (`grado_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `procesoprofesor_ibfk_3` FOREIGN KEY (`profesor_id`) REFERENCES `profesor` (`profesor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `procesoprofesor_ibfk_4` FOREIGN KEY (`materia_id`) REFERENCES `materias` (`materia_id`),
  ADD CONSTRAINT `procesoprofesor_ibfk_5` FOREIGN KEY (`periodo_id`) REFERENCES `periodos` (`periodo_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
