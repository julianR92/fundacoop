-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 20-09-2022 a las 19:42:03
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
  `ventas_empresa` varchar(50) DEFAULT NULL,
  `fuentes_financiacion` varchar(100) DEFAULT NULL,
  `sector` varchar(100) DEFAULT NULL,
  `departamento` varchar(100) DEFAULT NULL,
  `municipio` varchar(100) DEFAULT NULL,
  `estado` enum('ENVIADO','ACEPTADO','CANCELADO') DEFAULT NULL,
  `ace_ter` varchar(3) DEFAULT NULL,
  `documento` varchar(20) DEFAULT NULL COMMENT 'Numero de documento',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `programa_gestar`
--

INSERT INTO `programa_gestar` (`id`, `registro_id`, `nombre_empresa`, `empresa_formal`, `vision`, `producto_servicio`, `estado_desarrollo`, `producto_destaca`, `anios_empresa`, `personas_empresa`, `ventas_empresa`, `fuentes_financiacion`, `sector`, `departamento`, `municipio`, `estado`, `ace_ter`, `documento`, `created_at`, `updated_at`) VALUES
(1, 2061, 'EMPRESA 1', 'SI', 'Que en corto tiempo cubra un mercado local', 'OBLEAS PLUS', 'Se encuentra en desarrollo', 'Calidad,Marca', 30, 200, '$ 40.000.000,00', 'Familia y/o amigos', 'Alimentación', '68', '68001', 'ENVIADO', 'SI', '1098719559', '2022-08-14 14:57:59', '2022-08-14 14:57:59'),
(2, 2073, 'empresa 2', 'NO', 'Que en corto tiempo cubra un mercado nacional', 'OBLEAS PLUS plus', 'Se encuentra en desarrollo', 'Precio,Marca', 12, 12, '$ 400.000,00', 'Familia y/o amigos', 'Transporte', '05', '05002', 'ENVIADO', 'SI', NULL, '2022-08-14 15:01:24', '2022-08-14 15:01:24'),
(3, 2075, 'DATINI', 'SI', 'Que en corto tiempo cubra un mercado nacional', 'TELAS', 'Se encuentra en desarrollo', 'Precio', 25, 25, '$ 400.000,00', 'Crédito bancario', 'Ingeniería', '11', '11001', 'ENVIADO', 'SI', NULL, '2022-08-14 15:12:48', '2022-08-14 15:12:48');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
