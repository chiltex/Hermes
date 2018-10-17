-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-10-2018 a las 06:01:35
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
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id_permiso` int(11) NOT NULL,
  `id_tipo_usuario` int(11) DEFAULT NULL,
  `campo_a` longtext COLLATE utf8_spanish2_ci,
  `campo_b` longtext COLLATE utf8_spanish2_ci,
  `campo_c` longtext COLLATE utf8_spanish2_ci,
  `campo_d` longtext COLLATE utf8_spanish2_ci,
  `campo_e` longtext COLLATE utf8_spanish2_ci,
  `campo_f` longtext COLLATE utf8_spanish2_ci,
  `campo_g` longtext COLLATE utf8_spanish2_ci,
  `campo_h` longtext COLLATE utf8_spanish2_ci,
  `campo_i` longtext COLLATE utf8_spanish2_ci,
  `campo_j` longtext COLLATE utf8_spanish2_ci,
  `campo_k` longtext COLLATE utf8_spanish2_ci,
  `campo_l` longtext COLLATE utf8_spanish2_ci,
  `campo_m` longtext COLLATE utf8_spanish2_ci,
  `campo_n` longtext COLLATE utf8_spanish2_ci,
  `campo_o` longtext COLLATE utf8_spanish2_ci,
  `campo_p` longtext COLLATE utf8_spanish2_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id_permiso`, `id_tipo_usuario`, `campo_a`, `campo_b`, `campo_c`, `campo_d`, `campo_e`, `campo_f`, `campo_g`, `campo_h`, `campo_i`, `campo_j`, `campo_k`, `campo_l`, `campo_m`, `campo_n`, `campo_o`, `campo_p`) VALUES
(1, 1, '../listas/Usuarios.php', '../listas/TipoUsuario.php', '../listas/clientes.php', '../listas/lista_categorias.php', '../listas/contactos.php?id=0&nombre=Seleccione un Cliente', '../listas/lista_grupo_producto.php', '../listas/Productos.php', '../listas/Cliente_Producto.php?cliente=0&nombre=nada&producto=0', '../listas/Repuestos.php', '../listas/Tickets.php?cliente=0&nombre=N/A&codigo_serie=0000&producto=N/A&id_producto=0', '../listas/Gestion.php', '../listas/TipoGestion.php', '../listas/FichaTecnca.php', 'indexAdmin.php', '../listas/Permisos.php', ''),
(2, 2, '', '', '', '', '', '', '', '', '', '../listas/Tickets.php?cliente=0&nombre=N/A&codigo_serie=0000&producto=N/A&id_producto=0', '', '', '../listas/FichaTecnca.php', '', '', ''),
(3, 3, '', '', '', '', '', '', '../listas/Productos.php', '../listas/Cliente_Producto.php?cliente=0&nombre=nada&producto=0', '../listas/Repuestos.php', '', '', '', '', '', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_permiso`),
  ADD KEY `id_tipo_usuario` (`id_tipo_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
