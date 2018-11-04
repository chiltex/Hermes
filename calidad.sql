-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-11-2018 a las 08:51:00
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hermes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calidad`
--

CREATE TABLE `calidad` (
  `id_reporte_calidad` int(11) NOT NULL,
  `cliente` varchar(150) COLLATE utf8mb4_bin DEFAULT NULL,
  `pais` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `anio` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `mes` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `instalado_por` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `tecnologia` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `modelo` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `codigo_serie` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `error_instalar` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `calidad`
--

INSERT INTO `calidad` (`id_reporte_calidad`, `cliente`, `pais`, `anio`, `mes`, `instalado_por`, `tecnologia`, `modelo`, `codigo_serie`, `error_instalar`) VALUES
(1, 'Josue', 'El Salvador', '2018', 'Diciembre', 'Eduardo', 'otro', 'HP', 'MU001', 'Si'),
(2, 'Carlos', 'Mexico', '2018', 'Marzo', 'Josuue', 'Prueba', 'HP', '469852', 'No');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calidad`
--
ALTER TABLE `calidad`
  ADD PRIMARY KEY (`id_reporte_calidad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calidad`
--
ALTER TABLE `calidad`
  MODIFY `id_reporte_calidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
