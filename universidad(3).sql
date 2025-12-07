-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-12-2025 a las 02:11:09
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `universidad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `semestre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `turno_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id`, `nombre`, `semestre`, `descripcion`, `turno_id`) VALUES
(1, 'Contaduria', '8 semestre', 'finales', 2),
(5, 'Gastronomia', '1 semestre', 'inicio ciclo escolra', 3),
(8, 'Derecho', '4', 'los abogados', 3),
(9, 'gvg', '87g', 'fdxd', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombres` varchar(25) NOT NULL,
  `apellidos` varchar(20) NOT NULL,
  `ci` int(11) NOT NULL,
  `carrera_id` bigint(30) NOT NULL,
  `turno_id` bigint(40) NOT NULL,
  `numero` int(11) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `celular` int(9) NOT NULL,
  `fecha` date NOT NULL,
  `procedencia` varchar(50) NOT NULL,
  `tipo_beca` varchar(50) NOT NULL,
  `descuento` varchar(50) NOT NULL,
  `porcentaje` varchar(40) NOT NULL,
  `n_resolucion` int(11) NOT NULL,
  `n_expediente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id`, `nombres`, `apellidos`, `ci`, `carrera_id`, `turno_id`, `numero`, `direccion`, `celular`, `fecha`, `procedencia`, `tipo_beca`, `descuento`, `porcentaje`, `n_resolucion`, `n_expediente`) VALUES
(3, 'Noemi', 'Calla', 11103421, 8, 4, 0, '', 0, '2025-12-02', '', '', '', '', 0, 0),
(4, 'Jazmin', 'Callata', 1234456, 1, 3, 234, 'kiswaras', 72303640, '2025-12-04', 'MQS', 'Completa', '100', '100', 234566, 2344567);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcions`
--

CREATE TABLE `inscripcions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `semestre_id` bigint(30) NOT NULL,
  `estudiante_id` bigint(50) NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `inscripcions`
--

INSERT INTO `inscripcions` (`id`, `semestre_id`, `estudiante_id`, `estado`) VALUES
(2, 8, 3, 'activo'),
(3, 5, 4, 'eedd'),
(6, 7, 3, 'erf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semestre`
--

CREATE TABLE `semestre` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `semestre`
--

INSERT INTO `semestre` (`id`, `nombre`) VALUES
(1, '1 semestre'),
(2, '2 semestre'),
(3, '3 semestre'),
(4, '4 semestre'),
(5, '5 semestre'),
(6, '6 semestre'),
(7, '7 semestre'),
(8, '8 semestre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE `turnos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `turnos`
--

INSERT INTO `turnos` (`id`, `nombre`, `descripcion`) VALUES
(2, 'Semipresencial', '1y2'),
(3, 'Presencial', 'todo el dia'),
(4, 'vitual', 'seolo noche');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `clave` varchar(60) NOT NULL,
  `cargo` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `email`, `clave`, `cargo`) VALUES
(7, 'mili', 'mili', 'crrrgtbgt', '827ccb0eea8a706c4c34a16891f84e7b', '1'),
(8, 'daysi', 'ysy', 'rerevr', 'e10adc3949ba59abbe56e057f20f883e', '1'),
(9, 'jazmin', 'jaz', 'dcdecc', '827ccb0eea8a706c4c34a16891f84e7b', '2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ci` (`ci`),
  ADD KEY `carrera_id` (`carrera_id`),
  ADD KEY `turno_id` (`turno_id`);

--
-- Indices de la tabla `inscripcions`
--
ALTER TABLE `inscripcions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `semestre_id` (`semestre_id`),
  ADD KEY `estudiane_id` (`estudiante_id`);

--
-- Indices de la tabla `semestre`
--
ALTER TABLE `semestre`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `inscripcions`
--
ALTER TABLE `inscripcions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `semestre`
--
ALTER TABLE `semestre`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `turnos`
--
ALTER TABLE `turnos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
