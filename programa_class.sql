-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 20-09-2022 a las 19:41:57
-- Versión del servidor: 5.7.33
-- Versión de PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fundacoop`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa_class`
--

CREATE TABLE `programa_class` (
  `id` int(11) NOT NULL,
  `registro_id` int(11) NOT NULL,
  `nombre_entidad` varchar(100) DEFAULT NULL,
  `cargo` varchar(100) DEFAULT NULL,
  `titulo_pregrado` varchar(100) DEFAULT NULL,
  `titulo_posgrado` varchar(100) DEFAULT NULL,
  `departamento` varchar(100) DEFAULT NULL,
  `municipio` varchar(100) DEFAULT NULL,
  `area_conocimiento` varchar(100) DEFAULT NULL,
  `estado` enum('ENVIADO','ACEPTADO','CANCELADO') DEFAULT NULL,
  `ace_ter` varchar(3) DEFAULT NULL,
  `documento` varchar(20) DEFAULT NULL COMMENT 'Numero de documento',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `programa_class`
--

INSERT INTO `programa_class` (`id`, `registro_id`, `nombre_entidad`, `cargo`, `titulo_pregrado`, `titulo_posgrado`, `departamento`, `municipio`, `area_conocimiento`, `estado`, `ace_ter`, `documento`, `created_at`, `updated_at`) VALUES
(1, 2077, 'hola mundo', 'docente', 'titulazo', 'titulo loco', '05', '05004', 'Agronomía, Veterinaria y Afines', 'ENVIADO', 'SI', NULL, '2022-08-14 15:38:14', '2022-08-14 15:38:14'),
(2, 1214, 'wwwwwwwwwwwwww', 'wwwwwwwwwwwww', 'wwwwwwwwwwwwww', 'wwwwwwwwwwwwwwwwwww', '05', '05004', 'Agronomía, Veterinaria y Afines', 'ENVIADO', 'SI', NULL, '2022-08-14 15:43:00', '2022-08-14 15:43:00'),
(3, 2078, 'Alcaldia de Bucaramanga', 'wwwwwwwwwwwww', 'wwwwwwwwwwwwww', 'wwwwwwwwwwwwwwwwwww', '08', '08141', 'Bellas Artes', 'ENVIADO', 'SI', NULL, '2022-09-19 14:35:38', '2022-09-19 14:35:38');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `programa_class`
--
ALTER TABLE `programa_class`
  ADD PRIMARY KEY (`id`),
  ADD KEY `registro_id` (`registro_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `programa_class`
--
ALTER TABLE `programa_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `programa_class`
--
ALTER TABLE `programa_class`
  ADD CONSTRAINT `fk_registro` FOREIGN KEY (`registro_id`) REFERENCES `registro` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
