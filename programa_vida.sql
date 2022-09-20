-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 20-09-2022 a las 19:42:09
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
-- Estructura de tabla para la tabla `programa_vida`
--

CREATE TABLE `programa_vida` (
  `id` int(11) NOT NULL,
  `registro_id` int(11) NOT NULL,
  `ruta_documento` varchar(500) DEFAULT NULL,
  `estado` enum('ENVIADO','ACEPTADO','CANCELADO') DEFAULT NULL COMMENT 'ESTADO DE LA SOLICITUD',
  `ace_ter` varchar(3) DEFAULT NULL,
  `documento` varchar(20) DEFAULT NULL COMMENT 'Numero de documento',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `programa_vida`
--

INSERT INTO `programa_vida` (`id`, `registro_id`, `ruta_documento`, `estado`, `ace_ter`, `documento`, `created_at`, `updated_at`) VALUES
(1, 2075, 'documentos/1098719559/1098719559-formulario-vida.pdf', 'ENVIADO', 'SI', NULL, '2022-09-19 23:40:55', '2022-09-19 23:40:55'),
(2, 2075, 'documentos/1098719559/1098719559-formulario-vida.pdf', 'ENVIADO', 'SI', NULL, '2022-09-19 23:42:07', '2022-09-19 23:42:07'),
(3, 2075, 'documentos/1098719559/1098719559-formulario-vida.pdf', 'ENVIADO', 'SI', NULL, '2022-09-20 11:35:12', '2022-09-20 11:35:12'),
(4, 2075, 'documentos/1098719559/1098719559-formulario-vida.pdf', 'ENVIADO', 'SI', NULL, '2022-09-20 11:35:27', '2022-09-20 11:35:27'),
(5, 2075, 'documentos/1098719559/1098719559-formulario-vida.pdf', 'ENVIADO', 'SI', NULL, '2022-09-20 11:37:11', '2022-09-20 11:37:11'),
(6, 2075, 'documentos/1098719559/1098719559-formulario-vida.pdf', 'ENVIADO', 'SI', '1098719559', '2022-09-20 11:42:59', '2022-09-20 11:42:59');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `programa_vida`
--
ALTER TABLE `programa_vida`
  ADD PRIMARY KEY (`id`),
  ADD KEY `registro_id` (`registro_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `programa_vida`
--
ALTER TABLE `programa_vida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `programa_vida`
--
ALTER TABLE `programa_vida`
  ADD CONSTRAINT `fk_registro_vida` FOREIGN KEY (`registro_id`) REFERENCES `registro` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
