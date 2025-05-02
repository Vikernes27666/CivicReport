-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-05-2025 a las 05:34:20
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
-- Base de datos: `denuncias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id_admin` int(11) NOT NULL,
  `nombre_completo` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `contraseña` varchar(255) DEFAULT NULL,
  `rol` varchar(50) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agraviados`
--

CREATE TABLE `agraviados` (
  `id_agraviado` int(11) NOT NULL,
  `id_denuncia` int(11) DEFAULT NULL,
  `tipo_agraviado` varchar(50) DEFAULT NULL,
  `nombres` varchar(255) DEFAULT NULL,
  `apellido_paterno` varchar(100) DEFAULT NULL,
  `apellido_materno` varchar(100) DEFAULT NULL,
  `institucion_nombre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `denunciantes`
--

CREATE TABLE `denunciantes` (
  `id_denunciante` int(11) NOT NULL,
  `id_tipo_denunciante` int(11) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `denunciantes`
--

INSERT INTO `denunciantes` (`id_denunciante`, `id_tipo_denunciante`, `nombre`) VALUES
(1, 1, 'Luis García'),
(2, 2, 'Corporación Lima SAC'),
(3, 3, 'Municipalidad de Lima'),
(4, 4, 'María Pérez'),
(5, 5, 'Transportes Perú S.R.L.'),
(6, 6, 'Juan López'),
(7, 7, 'Ministerio del Interior'),
(8, 8, 'Comercial El Sol EIRL'),
(9, 9, 'Ana Torres'),
(10, 10, 'SUNAT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `denuncias`
--

CREATE TABLE `denuncias` (
  `id_denuncia` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_denunciante` int(11) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  `fecha_hechos` date DEFAULT NULL,
  `departamento` varchar(100) DEFAULT NULL,
  `provincia` varchar(100) DEFAULT NULL,
  `distrito` varchar(100) DEFAULT NULL,
  `direccion_referencia` varchar(255) DEFAULT NULL,
  `latitud` decimal(10,6) DEFAULT NULL,
  `longitud` decimal(10,6) DEFAULT NULL,
  `es_anonimo` tinyint(1) DEFAULT NULL,
  `codigo_seguimiento` varchar(100) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `denuncias`
--

INSERT INTO `denuncias` (`id_denuncia`, `id_usuario`, `id_denunciante`, `titulo`, `descripcion`, `categoria`, `fecha_hechos`, `departamento`, `provincia`, `distrito`, `direccion_referencia`, `latitud`, `longitud`, `es_anonimo`, `codigo_seguimiento`, `estado`, `fecha_creacion`) VALUES
(21, 1, 1, 'Robo en la vía pública', 'Me asaltaron en la calle mientras caminaba.', 'Robo', '2025-04-20', 'Lima', 'Lima', 'Miraflores', 'Av. Larco con Calle Schell', -12.121084, -77.030092, 0, 'ABC123456', 'pendiente', '2025-05-01 21:24:18'),
(22, 2, 2, 'Violencia doméstica', 'Escuché gritos constantes en la casa vecina.', 'Violencia familiar', '2025-04-18', 'Lima', 'Lima', 'San Juan de Lurigancho', 'Mz B Lt 10, Urb. Las Flores', -12.015849, -76.986945, 1, 'DEF789654', 'pendiente', '2025-05-01 21:24:18'),
(23, 3, 3, 'Venta de drogas', 'Se observan actividades sospechosas a diario.', 'Narcotráfico', '2025-04-10', 'Lima', 'Lima', 'Comas', 'Cerca al Parque La Merced', -11.939867, -77.056935, 0, 'GHI456321', 'investigación', '2025-05-01 21:24:18'),
(24, 4, 4, 'Robo de auto', 'Se llevaron un auto estacionado frente a mi casa.', 'Robo', '2025-03-30', 'Lima', 'Lima', 'Surco', 'Calle Los Álamos', -12.150016, -76.975167, 0, 'JKL123789', 'pendiente', '2025-05-01 21:24:18'),
(25, 5, 5, 'Acoso callejero', 'Un sujeto me siguió durante varias cuadras.', 'Acoso', '2025-04-05', 'Lima', 'Lima', 'San Isidro', 'Av. Arequipa con Av. Javier Prado', -12.099550, -77.033073, 1, 'MNO456123', 'pendiente', '2025-05-01 21:24:18'),
(26, 6, 6, 'Pelea callejera', 'Dos personas se enfrentaron con violencia.', 'Agresiones físicas', '2025-04-22', 'Lima', 'Lima', 'La Victoria', 'Parque El Porvenir', -12.079234, -77.035617, 0, 'PQR987654', 'cerrado', '2025-05-01 21:24:18'),
(27, 7, 7, 'Tocamientos indebidos', 'Un hombre me tocó sin consentimiento en el bus.', 'Acoso', '2025-04-25', 'Lima', 'Lima', 'Callao', 'Cerca al Mall Aventura Plaza', -12.053345, -77.117588, 1, 'STU246810', 'pendiente', '2025-05-01 21:24:18'),
(28, 8, 8, 'Robo a negocio', 'Asaltaron una bodega del barrio.', 'Robo', '2025-04-12', 'Lima', 'Lima', 'Villa El Salvador', 'Av. Revolución', -12.210324, -76.939420, 0, 'VWX135790', 'investigación', '2025-05-01 21:24:18'),
(29, 9, 9, 'Tiroteo', 'Se escucharon disparos en la madrugada.', 'Armas de fuego', '2025-04-15', 'Lima', 'Lima', 'Rímac', 'Alameda de los Descalzos', -12.034764, -77.043429, 1, 'YZA112233', 'cerrado', '2025-05-01 21:24:18'),
(30, 10, 10, 'Intento de secuestro', 'Intentaron llevarse a una menor.', 'Secuestro', '2025-04-28', 'Lima', 'Lima', 'San Borja', 'Av. San Luis con Av. Javier Prado', -12.095110, -77.000431, 0, 'BCD334455', 'pendiente', '2025-05-01 21:24:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evidencias`
--

CREATE TABLE `evidencias` (
  `id_evidencia` int(11) NOT NULL,
  `id_denuncia` int(11) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `archivo_url` text DEFAULT NULL,
  `fecha_subida` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resoluciones`
--

CREATE TABLE `resoluciones` (
  `id_resolucion` int(11) NOT NULL,
  `id_denuncia` int(11) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `tipo_resolucion` varchar(100) DEFAULT NULL,
  `resuelto_por` varchar(255) DEFAULT NULL,
  `fecha_resolucion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimientos`
--

CREATE TABLE `seguimientos` (
  `id_seguimiento` int(11) NOT NULL,
  `id_denuncia` int(11) DEFAULT NULL,
  `comentario` text DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_denunciantes`
--

CREATE TABLE `tipo_denunciantes` (
  `id_tipo_denunciante` int(11) NOT NULL,
  `tipo` enum('persona','empresa','entidad') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_denunciantes`
--

INSERT INTO `tipo_denunciantes` (`id_tipo_denunciante`, `tipo`) VALUES
(1, 'persona'),
(2, 'empresa'),
(3, 'entidad'),
(4, 'persona'),
(5, 'empresa'),
(6, 'entidad'),
(7, 'persona'),
(8, 'empresa'),
(9, 'persona'),
(10, 'entidad'),
(11, 'empresa'),
(12, 'persona'),
(13, 'entidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombres` varchar(255) DEFAULT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `tipo_documento` varchar(50) DEFAULT NULL,
  `numero_documento` varchar(20) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `acepta_notificaciones` tinyint(1) DEFAULT NULL,
  `contraseña` varchar(255) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombres`, `apellidos`, `tipo_documento`, `numero_documento`, `correo`, `telefono`, `acepta_notificaciones`, `contraseña`, `fecha_registro`) VALUES
(1, 'Luis', 'García', 'DNI', '12345678', 'lgarcia@example.com', '987654321', 1, 'pass123', '2025-05-01 21:10:11'),
(2, 'María', 'Pérez', 'DNI', '23456789', 'mperez@example.com', '987654322', 0, 'pass123', '2025-05-01 21:10:11'),
(3, 'Juan', 'Lopez', 'DNI', '34567890', 'jlopez@example.com', '987654323', 1, 'pass123', '2025-05-01 21:10:11'),
(4, 'Ana', 'Torres', 'DNI', '45678901', 'atorres@example.com', '987654324', 1, 'pass123', '2025-05-01 21:10:11'),
(5, 'Carlos', 'Ramírez', 'DNI', '56789012', 'cramirez@example.com', '987654325', 0, 'pass123', '2025-05-01 21:10:11'),
(6, 'Elena', 'Castro', 'DNI', '67890123', 'ecastor@example.com', '987654326', 1, 'pass123', '2025-05-01 21:10:11'),
(7, 'José', 'Reyes', 'DNI', '78901234', 'jreyes@example.com', '987654327', 1, 'pass123', '2025-05-01 21:10:11'),
(8, 'Lucía', 'Flores', 'DNI', '89012345', 'lflores@example.com', '987654328', 0, 'pass123', '2025-05-01 21:10:11'),
(9, 'Diego', 'Mendoza', 'DNI', '90123456', 'dmendoza@example.com', '987654329', 1, 'pass123', '2025-05-01 21:10:11'),
(10, 'Rosa', 'Vargas', 'DNI', '01234567', 'rvargas@example.com', '987654330', 1, 'pass123', '2025-05-01 21:10:11');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `agraviados`
--
ALTER TABLE `agraviados`
  ADD PRIMARY KEY (`id_agraviado`),
  ADD KEY `id_denuncia` (`id_denuncia`);

--
-- Indices de la tabla `denunciantes`
--
ALTER TABLE `denunciantes`
  ADD PRIMARY KEY (`id_denunciante`),
  ADD KEY `id_tipo_denunciante` (`id_tipo_denunciante`);

--
-- Indices de la tabla `denuncias`
--
ALTER TABLE `denuncias`
  ADD PRIMARY KEY (`id_denuncia`),
  ADD UNIQUE KEY `codigo_seguimiento` (`codigo_seguimiento`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_denunciante` (`id_denunciante`);

--
-- Indices de la tabla `evidencias`
--
ALTER TABLE `evidencias`
  ADD PRIMARY KEY (`id_evidencia`),
  ADD KEY `id_denuncia` (`id_denuncia`);

--
-- Indices de la tabla `resoluciones`
--
ALTER TABLE `resoluciones`
  ADD PRIMARY KEY (`id_resolucion`),
  ADD KEY `id_denuncia` (`id_denuncia`);

--
-- Indices de la tabla `seguimientos`
--
ALTER TABLE `seguimientos`
  ADD PRIMARY KEY (`id_seguimiento`),
  ADD KEY `id_denuncia` (`id_denuncia`);

--
-- Indices de la tabla `tipo_denunciantes`
--
ALTER TABLE `tipo_denunciantes`
  ADD PRIMARY KEY (`id_tipo_denunciante`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `numero_documento` (`numero_documento`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `agraviados`
--
ALTER TABLE `agraviados`
  MODIFY `id_agraviado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `denunciantes`
--
ALTER TABLE `denunciantes`
  MODIFY `id_denunciante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `denuncias`
--
ALTER TABLE `denuncias`
  MODIFY `id_denuncia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `evidencias`
--
ALTER TABLE `evidencias`
  MODIFY `id_evidencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `resoluciones`
--
ALTER TABLE `resoluciones`
  MODIFY `id_resolucion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `seguimientos`
--
ALTER TABLE `seguimientos`
  MODIFY `id_seguimiento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_denunciantes`
--
ALTER TABLE `tipo_denunciantes`
  MODIFY `id_tipo_denunciante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `agraviados`
--
ALTER TABLE `agraviados`
  ADD CONSTRAINT `agraviados_ibfk_1` FOREIGN KEY (`id_denuncia`) REFERENCES `denuncias` (`id_denuncia`);

--
-- Filtros para la tabla `denunciantes`
--
ALTER TABLE `denunciantes`
  ADD CONSTRAINT `denunciantes_ibfk_1` FOREIGN KEY (`id_tipo_denunciante`) REFERENCES `tipo_denunciantes` (`id_tipo_denunciante`);

--
-- Filtros para la tabla `denuncias`
--
ALTER TABLE `denuncias`
  ADD CONSTRAINT `denuncias_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `denuncias_ibfk_2` FOREIGN KEY (`id_denunciante`) REFERENCES `denunciantes` (`id_denunciante`);

--
-- Filtros para la tabla `evidencias`
--
ALTER TABLE `evidencias`
  ADD CONSTRAINT `evidencias_ibfk_1` FOREIGN KEY (`id_denuncia`) REFERENCES `denuncias` (`id_denuncia`);

--
-- Filtros para la tabla `resoluciones`
--
ALTER TABLE `resoluciones`
  ADD CONSTRAINT `resoluciones_ibfk_1` FOREIGN KEY (`id_denuncia`) REFERENCES `denuncias` (`id_denuncia`);

--
-- Filtros para la tabla `seguimientos`
--
ALTER TABLE `seguimientos`
  ADD CONSTRAINT `seguimientos_ibfk_1` FOREIGN KEY (`id_denuncia`) REFERENCES `denuncias` (`id_denuncia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
