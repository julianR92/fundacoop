-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 11-08-2022 a las 13:37:35
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
-- Estructura de tabla para la tabla `programa_gestar`
--

CREATE TABLE `programa_gestar` (
  `id` int(11) NOT NULL,
  `registro_id` int(11) NOT NULL,
  `nombre_empresa` varchar(100) DEFAULT NULL,
  `empresa_formal` varchar(5) DEFAULT NULL,
  `vision` varchar(100) DEFAULT NULL,
  `producto_servicio` varchar(100) DEFAULT NULL,
  `estado_desarrollo` varchar(100) DEFAULT NULL,
  `producto_destaca` varchar(100) DEFAULT NULL,
  `anios_empresa` int(3) DEFAULT NULL,
  `personas_empresa` int(11) DEFAULT NULL,
  `ventas_empresa` varchar(15) DEFAULT NULL,
  `fuentes_financiacion` varchar(100) DEFAULT NULL,
  `sector` varchar(100) DEFAULT NULL,
  `departamento` varchar(100) DEFAULT NULL,
  `municipio` varchar(100) DEFAULT NULL,
  `estado` enum('ENVIADO','ACEPTADO','CANCELADO') DEFAULT NULL,
  `ace_ter` varchar(3) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `programa_gestar`
--
ALTER TABLE `programa_gestar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `registro_id` (`registro_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `programa_gestar`
--
ALTER TABLE `programa_gestar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `programa_gestar`
--
ALTER TABLE `programa_gestar`
  ADD CONSTRAINT `fk_users` FOREIGN KEY (`registro_id`) REFERENCES `registro` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
