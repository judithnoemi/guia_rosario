-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2023 a las 16:53:27
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tarea1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anticoncepcion`
--

CREATE TABLE `anticoncepcion` (
  `idanticoncepcion` int(11) NOT NULL,
  `codpaci` int(11) NOT NULL,
  `fechaantic` date NOT NULL,
  `registro` varchar(50) NOT NULL,
  `detalle` varchar(50) NOT NULL,
  `atencion` varchar(100) NOT NULL,
  `orientacion` varchar(100) NOT NULL,
  `metodosantimode` varchar(100) NOT NULL,
  `insumos` varchar(100) NOT NULL,
  `metodosnat` varchar(100) NOT NULL,
  `muestraspaptom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comunidad`
--

CREATE TABLE `comunidad` (
  `id_comunidad` int(11) NOT NULL,
  `nombre_comunidad` varchar(50) NOT NULL,
  `provincia` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `comunidad`
--

INSERT INTO `comunidad` (`id_comunidad`, `nombre_comunidad`, `provincia`) VALUES
(1, 'ENTRE RIOS y LAGOS', 'Rafael Bustillo'),
(2, 'PULLOQUERI', ''),
(3, 'CHOJÑUMA', ''),
(8, 'Kaasktan', 'Julian'),
(11, 'Amayapampa', 'Rafael Bustillo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallehistorial`
--

CREATE TABLE `detallehistorial` (
  `idhistoria` int(10) UNSIGNED ZEROFILL NOT NULL,
  `idhistoriain` int(11) NOT NULL,
  `edad` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `estado` char(1) NOT NULL,
  `talla` varchar(50) NOT NULL,
  `peso` varchar(50) NOT NULL,
  `imc` varchar(50) NOT NULL,
  `p_a` varchar(50) NOT NULL,
  `f_c` varchar(50) NOT NULL,
  `f_r` varchar(50) NOT NULL,
  `temp` varchar(50) NOT NULL,
  `subjetivo` varchar(100) NOT NULL,
  `objetivo` varchar(100) NOT NULL,
  `analisis` varchar(100) NOT NULL,
  `cie` varchar(50) NOT NULL,
  `tratamiento` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `detallehistorial`
--

INSERT INTO `detallehistorial` (`idhistoria`, `idhistoriain`, `edad`, `fecha`, `hora`, `estado`, `talla`, `peso`, `imc`, `p_a`, `f_c`, `f_r`, `temp`, `subjetivo`, `objetivo`, `analisis`, `cie`, `tratamiento`) VALUES
(0000000009, 1, 23, '2023-11-21', '17:31:24', '1', 'dd', 'dccfr', 'bgb', 'gbg', 'gbg', 'b gbgg', 'bgtbt', 'tbbtb', 'btybty', 'frgr', 'fvfv', 'vrvrgvvtgb');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctor`
--

CREATE TABLE `doctor` (
  `coddoc` int(11) NOT NULL,
  `dnidoc` char(8) NOT NULL,
  `nomdoc` varchar(50) NOT NULL,
  `apedoc` varchar(50) NOT NULL,
  `codespe` int(11) NOT NULL,
  `sexo` char(15) NOT NULL,
  `telefo` char(9) NOT NULL,
  `fechanaci` date NOT NULL,
  `correo` varchar(50) NOT NULL,
  `cargo` char(1) NOT NULL,
  `estado` char(15) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `clave` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `doctor`
--

INSERT INTO `doctor` (`coddoc`, `dnidoc`, `nomdoc`, `apedoc`, `codespe`, `sexo`, `telefo`, `fechanaci`, `correo`, `cargo`, `estado`, `usuario`, `clave`) VALUES
(2, '74747384', 'Manuel', 'Alban', 4, 'Masculino', '998766554', '1995-09-07', '', '', '1', '', ''),
(3, '78493949', 'Jose', 'Martinez ', 3, 'Masculino', '988833333', '1980-02-12', '', '', '1', '', ''),
(7, '965325', 'Jazmin', 'Chichinca Callata', 4, 'Femenino', '72303640', '2005-02-25', '@jazmin05gmail.com', '3', '1', 'jazmin', '852907c499555bd7ae0be46847bc3e37'),
(8, '9058857', 'Armando', 'Tarqui Chichinca', 1, 'Masculino', '97655457', '1999-09-21', 'armando@gmail.com', '3', '1', 'armando', 'ac17ccdc9791fbc5ba6d147175f4478c'),
(9, '00988', 'Tomy', 'Chichinca Callata', 4, 'Masculino', '76890055', '2021-12-25', 'tomy05@gamil,com', '3', '1', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `codespe` int(11) NOT NULL,
  `nombrees` varchar(50) NOT NULL,
  `fecha_create` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`codespe`, `nombrees`, `fecha_create`) VALUES
(1, 'Cirujíash', '2023-11-15 02:31:05'),
(3, 'Otorrino', '2023-10-12 14:30:46'),
(4, 'Odontologia', '2023-11-15 02:32:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `idhistoriain` int(11) NOT NULL,
  `codpac` int(11) NOT NULL,
  `coddoc` int(11) NOT NULL,
  `grado_instruccion` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `diagnostico` varchar(100) NOT NULL,
  `consulta` varchar(50) NOT NULL,
  `hospital` varchar(100) NOT NULL,
  `estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`idhistoriain`, `codpac`, `coddoc`, `grado_instruccion`, `fecha`, `diagnostico`, `consulta`, `hospital`, `estado`) VALUES
(1, 36, 2, 'gvgg', '2023-11-21', 'gvgvvghvhg', 'si', 'la vida', '1'),
(4, 34, 9, 'nada9', '2009-11-01', 'dolor de cabeza9', 'no9', 'yaya99', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `codhor` int(11) NOT NULL,
  `nomhor` varchar(30) NOT NULL,
  `coddoc` int(11) NOT NULL,
  `estado` char(1) NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`codhor`, `nomhor`, `coddoc`, `estado`, `fere`) VALUES
(2, 'solo martes', 3, '1', '2022-04-01 01:46:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `odontologia`
--

CREATE TABLE `odontologia` (
  `idodontologia` int(11) NOT NULL,
  `codpaci` int(11) NOT NULL,
  `coddocod` int(11) NOT NULL,
  `fechaod` date NOT NULL,
  `registrodon` varchar(50) NOT NULL,
  `detalleodon` varchar(50) NOT NULL,
  `atencionod` varchar(100) NOT NULL,
  `diagnosticood` varchar(100) NOT NULL,
  `primeraconod` varchar(100) NOT NULL,
  `piezadenod` varchar(100) NOT NULL,
  `mujeresemod` varchar(100) NOT NULL,
  `mujerespostod` varchar(100) NOT NULL,
  `medidasprevenod` varchar(100) NOT NULL,
  `restauracionesod` varchar(100) NOT NULL,
  `endodonciaod` varchar(100) NOT NULL,
  `periodonciaod` varchar(100) NOT NULL,
  `cir_bucalmenorod` varchar(100) NOT NULL,
  `otrasaccod` varchar(100) NOT NULL,
  `rxod` varchar(100) NOT NULL,
  `refycontrarefod` varchar(100) NOT NULL,
  `tratamientood` varchar(50) NOT NULL,
  `estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `odontologia`
--

INSERT INTO `odontologia` (`idodontologia`, `codpaci`, `coddocod`, `fechaod`, `registrodon`, `detalleodon`, `atencionod`, `diagnosticood`, `primeraconod`, `piezadenod`, `mujeresemod`, `mujerespostod`, `medidasprevenod`, `restauracionesod`, `endodonciaod`, `periodonciaod`, `cir_bucalmenorod`, `otrasaccod`, `rxod`, `refycontrarefod`, `tratamientood`, `estado`) VALUES
(2, 36, 3, '2003-02-01', 'no no no 36', 'ya36', 'nose36', 'sip36', 'yay36', 'num136', 'no hay36', 'tampoco36', 'menos36', 'si hay36', 'no creo que haya36', 'quizas36', 'no hay no hay amigo36', 'otras acciones36', 'al lado36', 'familiares36', 'paracetamol36', '1'),
(5, 39, 2, '2011-02-03', '11', '21', '31', '41', '51', '6', '7', '8', '9', '10', '11', '12', '133', '143', '153', '163', '173', '1'),
(6, 1, 7, '2001-02-03', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `codpaci` int(11) NOT NULL,
  `dnipa` char(8) NOT NULL,
  `nombrep` varchar(50) NOT NULL,
  `apellidop` varchar(50) NOT NULL,
  `seguro` char(10) NOT NULL,
  `tele` char(9) NOT NULL,
  `sexo` char(15) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `cargo` char(1) NOT NULL,
  `estado` varchar(15) NOT NULL,
  `comunidad_id` int(11) NOT NULL,
  `provinciap` varchar(150) NOT NULL,
  `estadociv` varchar(20) NOT NULL,
  `ocupacion` varchar(50) NOT NULL,
  `nacimiento` date DEFAULT NULL,
  `departamento` varchar(35) NOT NULL,
  `zona_barrio` varchar(60) NOT NULL,
  `domicilioac` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`codpaci`, `dnipa`, `nombrep`, `apellidop`, `seguro`, `tele`, `sexo`, `usuario`, `clave`, `cargo`, `estado`, `comunidad_id`, `provinciap`, `estadociv`, `ocupacion`, `nacimiento`, `departamento`, `zona_barrio`, `domicilioac`) VALUES
(1, '13056616', 'Gustavo', 'Rojas', 'Si', '75845755', 'Masculino', 'arman', '202cb962ac59075b964b07152d234b70', '2', '1', 1, 'Rafael Bustillo', 'Soltero', 'Profesor', '2023-11-02', 'La Paz', 'Kiswaras', 'Calle Santa Cruz'),
(34, '1875485', 'Raulcito', 'Murillo', 'Si', '6875985', 'Masculino', 'raulcito', '202cb962ac59075b964b07152d234b70', '2', '1', 2, '7', 'Divorciado', 'Operario', '2023-11-02', 'Cochabamba', 'Radio San', 'Tarija'),
(36, '1784404', 'Mario', 'Bustamante', 'Si', '9875645', 'Masculino', 'mario', '81dc9bdb52d04dc20036dbd8313ed055', '2', '1', 8, '1', 'Soltero', 'Albañil', '2023-11-03', 'La Paz', 'Irpavi', 'Centro'),
(39, '11103429', 'Judyth9', 'Chichinca9', 'No', '64587329', 'Femenino', 'judith9', '202cb962ac59075b964b07152d234b70', '2', '1', 11, '1', 'Soltero', 'Estudiante9', '2009-02-28', 'Chuquisaca', 'Kiswaras9', 'Radio9');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `cargo` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `email`, `clave`, `cargo`) VALUES
(1, 'ruby casillas', 'grace1804', 'rubi_casillaas31@hotmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anticoncepcion`
--
ALTER TABLE `anticoncepcion`
  ADD PRIMARY KEY (`idanticoncepcion`),
  ADD KEY `codpaci` (`codpaci`);

--
-- Indices de la tabla `comunidad`
--
ALTER TABLE `comunidad`
  ADD PRIMARY KEY (`id_comunidad`);

--
-- Indices de la tabla `detallehistorial`
--
ALTER TABLE `detallehistorial`
  ADD PRIMARY KEY (`idhistoria`),
  ADD KEY `idhistoriain` (`idhistoriain`);

--
-- Indices de la tabla `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`coddoc`),
  ADD KEY `codespe` (`codespe`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`codespe`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`idhistoriain`),
  ADD KEY `codpac` (`codpac`),
  ADD KEY `coddoc` (`coddoc`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`codhor`),
  ADD KEY `coddoc` (`coddoc`);

--
-- Indices de la tabla `odontologia`
--
ALTER TABLE `odontologia`
  ADD PRIMARY KEY (`idodontologia`),
  ADD KEY `codpaci` (`codpaci`),
  ADD KEY `coddoc` (`coddocod`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`codpaci`),
  ADD KEY `comunidad_id` (`comunidad_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anticoncepcion`
--
ALTER TABLE `anticoncepcion`
  MODIFY `idanticoncepcion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comunidad`
--
ALTER TABLE `comunidad`
  MODIFY `id_comunidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `detallehistorial`
--
ALTER TABLE `detallehistorial`
  MODIFY `idhistoria` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `doctor`
--
ALTER TABLE `doctor`
  MODIFY `coddoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `codespe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `idhistoriain` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `codhor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `odontologia`
--
ALTER TABLE `odontologia`
  MODIFY `idodontologia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `codpaci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `anticoncepcion`
--
ALTER TABLE `anticoncepcion`
  ADD CONSTRAINT `anticoncepcion_ibfk_1` FOREIGN KEY (`codpaci`) REFERENCES `pacientes` (`codpaci`);

--
-- Filtros para la tabla `detallehistorial`
--
ALTER TABLE `detallehistorial`
  ADD CONSTRAINT `detallehistorial_ibfk_1` FOREIGN KEY (`idhistoriain`) REFERENCES `historial` (`idhistoriain`);

--
-- Filtros para la tabla `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`codespe`) REFERENCES `especialidades` (`codespe`);

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `historial_ibfk_1` FOREIGN KEY (`codpac`) REFERENCES `pacientes` (`codpaci`),
  ADD CONSTRAINT `historial_ibfk_2` FOREIGN KEY (`coddoc`) REFERENCES `doctor` (`coddoc`);

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `horario_ibfk_1` FOREIGN KEY (`coddoc`) REFERENCES `doctor` (`coddoc`);

--
-- Filtros para la tabla `odontologia`
--
ALTER TABLE `odontologia`
  ADD CONSTRAINT `odontologia_ibfk_1` FOREIGN KEY (`codpaci`) REFERENCES `pacientes` (`codpaci`),
  ADD CONSTRAINT `odontologia_ibfk_2` FOREIGN KEY (`coddocod`) REFERENCES `doctor` (`coddoc`);

--
-- Filtros para la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `pacientes_ibfk_2` FOREIGN KEY (`comunidad_id`) REFERENCES `comunidad` (`id_comunidad`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
