-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 30-01-2024 a las 00:51:28
-- Versión del servidor: 8.0.34
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `attendance`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `ID_CARGO` int NOT NULL,
  `NOMBRE_CARGO` varchar(100) NOT NULL,
  `DEPARTAMENTO` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`ID_CARGO`, `NOMBRE_CARGO`, `DEPARTAMENTO`) VALUES
(1, 'Gerente de Recursos Humanos', 1),
(2, 'Especialista en Selección y Contratación', 1),
(3, 'Analista de Recursos Humanos', 1),
(4, 'Especialista en Desarrollo Organizacional', 1),
(5, 'Asesor Legal Laboral', 1),
(6, 'Asistente de Recursos Humanos', 1),
(7, 'Director Financiero (CFO)', 2),
(8, 'Contador Jefe (Controller)', 2),
(9, 'Contador Senior', 2),
(10, 'Analista Financiero', 2),
(11, 'Especialista en Impuestos', 2),
(12, 'Tesorero', 2),
(13, 'Auxiliar Administrativo Financiero', 2),
(14, 'Director de Tecnologías de la Información (CTO)', 3),
(15, 'Administrador de Sistemas', 3),
(16, 'Ingeniero de Redes', 3),
(17, 'Desarrollador de Software', 3),
(18, 'Especialista en Seguridad Informática', 3),
(19, 'Jefe de Seguridad de la Información', 4),
(20, 'Oficial de Seguridad de la Información', 4),
(21, 'Especialista en Monitoreo de Alarmas', 4),
(22, 'Investigador de Seguridad de la Información', 4),
(23, 'Especialista en Tecnología de Seguridad de la Información', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `ID_DEPARTAMENTO` int NOT NULL,
  `NOMBRE_DEPARTAMENTO` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`ID_DEPARTAMENTO`, `NOMBRE_DEPARTAMENTO`) VALUES
(1, 'Recursos Humanos (RRHH)'),
(2, 'Finanzas y Contabilidad'),
(3, 'Operaciones de TI'),
(4, 'Seguridad de la Información');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `ID_EMPLEADO` int NOT NULL,
  `DNI` int NOT NULL,
  `NOMBRE` varchar(150) NOT NULL,
  `DEPARTAMENTO` int NOT NULL,
  `CARGO` int NOT NULL,
  `ACTIVO` bit(1) NOT NULL DEFAULT b'1',
  `FECHA_REGISTRO` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`ID_EMPLEADO`, `DNI`, `NOMBRE`, `DEPARTAMENTO`, `CARGO`, `ACTIVO`, `FECHA_REGISTRO`) VALUES
(1, 19663197, 'Josué Varau Valderrama', 1, 2, b'1', '2024-01-26 16:45:46'),
(2, 19662447, 'Luis Paredes Monzon', 1, 1, b'1', '2024-01-27 13:10:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_asistencia`
--

CREATE TABLE `estado_asistencia` (
  `ID` int NOT NULL,
  `ESTADO` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `estado_asistencia`
--

INSERT INTO `estado_asistencia` (`ID`, `ESTADO`) VALUES
(1, 'PRESENTE'),
(2, 'FALTA'),
(3, 'TARDANZA'),
(4, 'DE PERMISO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_asistencia`
--

CREATE TABLE `registro_asistencia` (
  `ID_ASISTENCIA` int NOT NULL,
  `ID_EMPLEADO` int NOT NULL,
  `FECHA` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ID_ESTADO` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `registro_asistencia`
--

INSERT INTO `registro_asistencia` (`ID_ASISTENCIA`, `ID_EMPLEADO`, `FECHA`, `ID_ESTADO`) VALUES
(1, 1, '2024-01-27 20:29:51', 1),
(2, 1, '2024-01-29 17:35:19', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`ID_CARGO`),
  ADD KEY `DEPARTAMENTO` (`DEPARTAMENTO`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`ID_DEPARTAMENTO`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`ID_EMPLEADO`),
  ADD KEY `DEPARTAMENTO` (`DEPARTAMENTO`),
  ADD KEY `CARGO` (`CARGO`);

--
-- Indices de la tabla `estado_asistencia`
--
ALTER TABLE `estado_asistencia`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `registro_asistencia`
--
ALTER TABLE `registro_asistencia`
  ADD PRIMARY KEY (`ID_ASISTENCIA`),
  ADD KEY `ID_EMPLEADO` (`ID_EMPLEADO`),
  ADD KEY `ID_ESTADO` (`ID_ESTADO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `ID_CARGO` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `ID_DEPARTAMENTO` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `ID_EMPLEADO` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estado_asistencia`
--
ALTER TABLE `estado_asistencia`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `registro_asistencia`
--
ALTER TABLE `registro_asistencia`
  MODIFY `ID_ASISTENCIA` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD CONSTRAINT `cargo_ibfk_1` FOREIGN KEY (`DEPARTAMENTO`) REFERENCES `departamento` (`ID_DEPARTAMENTO`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`DEPARTAMENTO`) REFERENCES `departamento` (`ID_DEPARTAMENTO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `empleado_ibfk_2` FOREIGN KEY (`CARGO`) REFERENCES `cargo` (`ID_CARGO`);

--
-- Filtros para la tabla `registro_asistencia`
--
ALTER TABLE `registro_asistencia`
  ADD CONSTRAINT `registro_asistencia_ibfk_1` FOREIGN KEY (`ID_EMPLEADO`) REFERENCES `empleado` (`ID_EMPLEADO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `registro_asistencia_ibfk_2` FOREIGN KEY (`ID_ESTADO`) REFERENCES `estado_asistencia` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
