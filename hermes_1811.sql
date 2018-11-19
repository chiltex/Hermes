-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2018 a las 03:10:18
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `descripcion` longtext COLLATE utf8_spanish2_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre`, `descripcion`) VALUES
(1, 'Agricola', 'Se dedica al area agricola'),
(2, 'Educacion', 'Se dedica al área de educacion'),
(5, 'Construccion', 'se dedica a la Construccion'),
(6, 'Construccion', 'se dedica gg'),
(7, 'Automotor', 'Mecanica general');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `direccion` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `id_tip_cli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `direccion`, `id_categoria`, `id_tip_cli`) VALUES
(12, 'Karla Gomez', 'san miguel', 1, 1),
(13, 'Emmanuel Garcias', 'apopa', 5, 2),
(14, 'Josue Garcia', 'Santa tecla', 2, 2),
(15, 'Norma Garcia', 'apopa', 2, 2),
(16, 'Claudia Perez', 'Santa elena', 2, 1),
(17, 'Mario PanameÃ±o', 'San Salvador', 5, 1),
(18, 'Luis Gomez', 'asd', 2, 1),
(19, 'DNA', 'escalon', 5, 2),
(20, 'Rosita', 'san jacinto', 7, 2),
(21, 'Ricaldone', 'San salvador\r\n', 2, 1),
(22, 'Prueba', 'as', 1, 1),
(35, 'Habitar', 'Soyapango', 5, 2),
(36, 'Construmarket', 'Santa Tecla', 5, 2),
(37, 'CalulatorAgr', 'san miguel', 1, 1),
(38, 'Habitar2', 'San Salvador', 5, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_producto`
--

CREATE TABLE `cliente_producto` (
  `id_cliente_producto` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cliente_producto`
--

INSERT INTO `cliente_producto` (`id_cliente_producto`, `id_cliente`, `id_producto`) VALUES
(2, 14, 1),
(3, 14, 1),
(4, 12, 2),
(5, 18, 2),
(6, 18, 7),
(7, 18, 1),
(10, 21, 2),
(15, 19, 1),
(16, 19, 2),
(18, 17, 7),
(19, 37, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consumibles`
--

CREATE TABLE `consumibles` (
  `id_consumible` int(11) NOT NULL,
  `nombre` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `codigo_serie` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `descripcion` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `estado` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `consumibles`
--

INSERT INTO `consumibles` (`id_consumible`, `nombre`, `codigo_serie`, `descripcion`, `estado`) VALUES
(1, 'Tirro', 'TR001', '', 'Activo'),
(2, 'Tinta', 'TT00125', '', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id_contacto` int(11) NOT NULL,
  `nombre` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `correo` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `telefono` decimal(12,0) DEFAULT NULL,
  `extension` decimal(9,0) DEFAULT NULL,
  `movil` decimal(12,0) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `puesto` varchar(150) COLLATE utf8_spanish2_ci DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id_contacto`, `nombre`, `correo`, `telefono`, `extension`, `movil`, `id_cliente`, `puesto`) VALUES
(2, 'Emmanuel Garcias', 'emmanuel.garcia@gmail.com', '22145820', '23', '75899847', 13, 'N/A'),
(5, 'DNA', 'dna@gmail.com', '24536789', '134', '76458909', 19, ''),
(6, 'Josue Garcia', 'josuegarcia@gmail.com', '23145820', '12', '73670806', 14, 'N/A'),
(19, 'Herberth', 'administrador@gmail.com', '22145820', '23', '73670806', 35, 'N/A'),
(20, 'Gerardo', 'gerardo@gmail.com', '22145820', '23', '73670806', 36, 'N/A'),
(21, 'Ernesto', 'ernesto@gmail.com', '22156890', '23', '73670806', 37, 'N/A'),
(22, 'Josue Garcia', 'josuegarcia@gmail.com', '22145820', '23', '73670806', 37, 'N/A'),
(23, 'Claudia', 'claudia@gmail.com', '22145820', '123', '73670806', 16, 'N/A'),
(24, 'Eduardo', 'eduardo@gmail.com', '22167890', '23', '76895634', 38, 'N/A'),
(25, 'Josue Garcia', 'josuegarcia@gmail.com', '22145820', '23', '73670806', 19, ''),
(26, 'Eduardo Josue ', 'eduard@gmail.com', '22156890', '23', '73670806', 19, 'N/A'),
(27, 'Nathaly Berenice', 'nathaly@gmail.com', '22145820', '23', '73670806', 19, 'N/A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_consumible`
--

CREATE TABLE `detalle_consumible` (
  `id_detalle_consumible` int(11) NOT NULL,
  `id_ficha_tecnica` int(11) DEFAULT NULL,
  `id_consumible` int(11) DEFAULT NULL,
  `cantidad` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_consumible`
--

INSERT INTO `detalle_consumible` (`id_detalle_consumible`, `id_ficha_tecnica`, `id_consumible`, `cantidad`) VALUES
(1, 2, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_repuestos`
--

CREATE TABLE `detalle_repuestos` (
  `id_detalle_repuestos` int(11) NOT NULL,
  `id_ficha_tecnica` int(11) DEFAULT NULL,
  `id_repuesto` int(11) DEFAULT NULL,
  `cantidad` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_repuestos`
--

INSERT INTO `detalle_repuestos` (`id_detalle_repuestos`, `id_ficha_tecnica`, `id_repuesto`, `cantidad`) VALUES
(6, 48, 1, 1),
(7, 48, 2, 1),
(8, 52, 1, 3),
(13, 52, 2, 4),
(16, 53, 1, 2),
(17, 54, 1, 1),
(18, 55, 1, 1),
(19, 55, 1, 1),
(20, 57, 1, 1),
(21, 58, 1, 1),
(22, 58, 1, 1),
(23, 58, 1, 1),
(24, 61, 1, 1),
(25, 61, 2, 2),
(26, 61, 1, 1),
(27, 63, 1, 1),
(28, 64, 1, 1),
(29, 1, 2, 0),
(30, 2, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_retorno`
--

CREATE TABLE `detalle_retorno` (
  `id_detalle_retorno` int(11) NOT NULL,
  `id_form_retorno` int(11) NOT NULL,
  `part_number_description` varchar(150) COLLATE utf8mb4_bin DEFAULT NULL,
  `marsh_authotization_level` longtext COLLATE utf8mb4_bin,
  `equipment_serial_number` varchar(150) COLLATE utf8mb4_bin DEFAULT NULL,
  `codigo_serie` varchar(150) COLLATE utf8mb4_bin DEFAULT NULL,
  `cantidad` varchar(150) COLLATE utf8mb4_bin DEFAULT NULL,
  `id_part_fail` int(11) DEFAULT NULL,
  `invoice` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `detalle_retorno`
--

INSERT INTO `detalle_retorno` (`id_detalle_retorno`, `id_form_retorno`, `part_number_description`, `marsh_authotization_level`, `equipment_serial_number`, `codigo_serie`, `cantidad`, `id_part_fail`, `invoice`) VALUES
(38, 5, '1', '2', '2', '2', '2', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `events`
--

INSERT INTO `events` (`id`, `title`, `color`, `start`, `end`, `descripcion`, `id_usuario`) VALUES
(1, 'qwe', '#0071c5', '2018-08-29 00:00:00', '2018-08-30 00:00:00', 'Mecanica', 2),
(2, 'Prueba 2', '', '2018-09-05 00:00:00', '2018-09-06 00:00:00', 'as', 4),
(3, 'Prueba 1', '#008000', '2018-08-31 00:00:00', '2018-09-01 00:00:00', 'Se dedica al deporte', 2),
(4, 'Prueba 4', '', '2018-08-29 00:00:00', '2018-08-30 00:00:00', 'Se dedica al deporte', 4),
(5, 'Prueba 5', '#FFD700', '2018-08-29 00:00:00', '2018-08-30 00:00:00', 'Se dedica al deporte', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha_tecnica`
--

CREATE TABLE `ficha_tecnica` (
  `id_ficha_tecnica` int(11) NOT NULL,
  `latitud` float(9,9) DEFAULT NULL,
  `longitud` float(9,9) DEFAULT NULL,
  `equipo_queda` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `id_contacto` int(11) DEFAULT NULL,
  `firma_cliente` varchar(231) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `firma_tecnico` varchar(231) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `falla` varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `trabajo` varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `id_tipo_ma` int(11) DEFAULT NULL,
  `linea_produccion` varchar(150) COLLATE utf8mb4_bin DEFAULT NULL,
  `hora_ingreso` time DEFAULT NULL,
  `hora_egreso` time DEFAULT NULL,
  `datos_generales` varchar(250) COLLATE utf8mb4_bin DEFAULT NULL,
  `recibe` varchar(250) COLLATE utf8mb4_bin DEFAULT NULL,
  `foto_uno` varchar(150) COLLATE utf8mb4_bin DEFAULT NULL,
  `foto_dos` varchar(150) COLLATE utf8mb4_bin DEFAULT NULL,
  `foto_tres` varchar(150) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario_retorno`
--

CREATE TABLE `formulario_retorno` (
  `id_form_retorno` int(11) NOT NULL,
  `sales_order` varchar(150) COLLATE utf8mb4_bin DEFAULT NULL,
  `PO` longtext COLLATE utf8mb4_bin,
  `ship_method_via` varchar(150) COLLATE utf8mb4_bin DEFAULT NULL,
  `customer_phone` varchar(150) COLLATE utf8mb4_bin DEFAULT NULL,
  `customer_fax` varchar(150) COLLATE utf8mb4_bin DEFAULT NULL,
  `warranty_status` varchar(150) COLLATE utf8mb4_bin DEFAULT NULL,
  `cliente_nombre` varchar(150) COLLATE utf8mb4_bin DEFAULT NULL,
  `cliente_phone` varchar(150) COLLATE utf8mb4_bin DEFAULT NULL,
  `accion` varchar(150) COLLATE utf8mb4_bin DEFAULT NULL,
  `bill_to` varchar(150) COLLATE utf8mb4_bin DEFAULT NULL,
  `ship_to` varchar(150) COLLATE utf8mb4_bin DEFAULT NULL,
  `customer_address` varchar(150) COLLATE utf8mb4_bin DEFAULT NULL,
  `city` varchar(150) COLLATE utf8mb4_bin DEFAULT NULL,
  `aplicacion` varchar(150) COLLATE utf8mb4_bin DEFAULT NULL,
  `enviroment` varchar(150) COLLATE utf8mb4_bin DEFAULT NULL,
  `operating_conditions` varchar(150) COLLATE utf8mb4_bin DEFAULT NULL,
  `temperature` varchar(150) COLLATE utf8mb4_bin DEFAULT NULL,
  `comentarios` varchar(150) COLLATE utf8mb4_bin DEFAULT NULL,
  `estado` varchar(150) COLLATE utf8mb4_bin DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `formulario_retorno`
--

INSERT INTO `formulario_retorno` (`id_form_retorno`, `sales_order`, `PO`, `ship_method_via`, `customer_phone`, `customer_fax`, `warranty_status`, `cliente_nombre`, `cliente_phone`, `accion`, `bill_to`, `ship_to`, `customer_address`, `city`, `aplicacion`, `enviroment`, `operating_conditions`, `temperature`, `comentarios`, `estado`, `fecha`) VALUES
(1, 'fg982496', '489as56', 'dhl', '22145896', '54298852', 'Warranty Failure', 'Eduardo', '73670806', 'Haber', 'Mario', 'Maria', 'apopa', '', 'alpha-numeric', 'fg982496', 'Humid', 'Cold', 'prueba', 'Iniciado', '2018-11-03'),
(4, 'PG141513', 'gp1566325', 'mail', '2214582', '22145820', 'Warranty Failure', 'Eduardo', '73670806', 'Out of Box Failure', 'mARIA', 'CARLOS', 'APOOPA', 'san salvadfor', 'alpha-numeric', 'Food', 'Wash Down', 'Hot', 'prueba', 'Iniciado', '2018-11-14'),
(5, 'FP145889', 'AS145478', 'MAIL', '22145820', '25252525', 'Non Warranty', 'Josue', '73670862', 'Returbish/Exchange', 'Mario', 'Karen', 'Apopa', 'Mejicanos', 'alpha-numeric', 'Textile', 'Humid', 'Hot', ' prueba                                                                                                                                               ', 'Iniciado', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion`
--

CREATE TABLE `gestion` (
  `id_gestion` int(11) NOT NULL,
  `nombre` varchar(150) COLLATE utf8mb4_bin DEFAULT NULL,
  `descripcion` longtext COLLATE utf8mb4_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `gestion`
--

INSERT INTO `gestion` (`id_gestion`, `nombre`, `descripcion`) VALUES
(1, 'Transferencia', 'nueva construccion'),
(2, 'Falla', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_producto`
--

CREATE TABLE `grupo_producto` (
  `id_grupo_producto` int(11) NOT NULL,
  `nombre` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `descripcion` longtext COLLATE utf8_spanish2_ci,
  `estado` varchar(25) COLLATE utf8_spanish2_ci NOT NULL DEFAULT '"Activo"'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `grupo_producto`
--

INSERT INTO `grupo_producto` (`id_grupo_producto`, `nombre`, `descripcion`, `estado`) VALUES
(1, 'Repuestos', 'Mecanicos', 'Desactivado'),
(2, 'Libreria', 'Material relacionado al papel', 'Activo'),
(3, 'Belleza', 'Articulos de belleza', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `part_failure`
--

CREATE TABLE `part_failure` (
  `id_part_fail` int(11) NOT NULL,
  `nombre` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `part_failure`
--

INSERT INTO `part_failure` (`id_part_fail`, `nombre`, `descripcion`) VALUES
(1, 'Bent', ''),
(2, 'Brocked', ''),
(3, 'PRUEBA', ''),
(4, 'humedad', ''),
(5, 'electrico', ''),
(6, 'incendiado', ''),
(7, 'corto circuito', ''),
(8, 'inundado', ''),
(9, 'obsoleto', ''),
(10, 'defasado', ''),
(11, 'desgaste', ''),
(12, 'roto', ''),
(13, 'desactualizado', '');

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
(1, 1, '../listas/Usuarios.php', '../listas/TipoUsuario.php', '../listas/clientes.php', '../listas/lista_categorias.php', '../listas/contactos.php?id=0&nombre=Seleccione un Cliente', '../listas/lista_grupo_producto.php', '../listas/Productos.php', '../listas/Cliente_Producto.php?cliente=0&nombre=nada&producto=0', '../listas/Repuestos.php', '../listas/Tickets.php?cliente=0&nombre=N/A&codigo_serie=0000&producto=N/A&id_producto=0', '../listas/Gestion.php', '../listas/TipoGestion.php', '../listas/FichaTecnca.php', 'indexAdmin.php', '../listas/Permisos.php', '../listas/Permisos.php'),
(2, 2, '', '', '', '', '', '', '', '', '', '<li><a href=', '', '', '<li><a href=', '', '', ''),
(3, 3, '', '', '', '', '', '<li><a href=', '<li><a href=', '<li><a href=', '<li><a href=', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `codigo_serie` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `id_grupo_producto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `codigo_serie`, `estado`, `id_grupo_producto`) VALUES
(1, 'Bujilla', '12345', 'Activo', 1),
(2, 'Resma de papel', '', 'Activo', 2),
(7, 'Shampoo', '123124', 'Activo', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repuestos`
--

CREATE TABLE `repuestos` (
  `id_repuesto` int(11) NOT NULL,
  `nombre` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `codigo_serie` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `descripcion` longtext COLLATE utf8_spanish2_ci,
  `estado` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `repuestos`
--

INSERT INTO `repuestos` (`id_repuesto`, `nombre`, `codigo_serie`, `descripcion`, `estado`) VALUES
(1, 'Banda elastica', 'BE001', 'banda para bandas transportadoras', 'Activo'),
(2, 'Pernos 2/3', 'PE340', 'pernos de hierro', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE `ticket` (
  `id_ticket` int(11) NOT NULL,
  `descripcion` longtext COLLATE utf8mb4_bin,
  `estado` varchar(150) COLLATE utf8mb4_bin DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_contacto` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_tipo_gestion` int(11) DEFAULT NULL,
  `id_ficha_tecnica` int(11) DEFAULT NULL,
  `Solucion` varchar(150) COLLATE utf8mb4_bin DEFAULT 'N/A',
  `urgente` varchar(15) COLLATE utf8mb4_bin NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_cliente`
--

CREATE TABLE `tipo_cliente` (
  `id_tip_cli` int(11) NOT NULL,
  `tipo_cliente` varchar(75) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tipo_cliente`
--

INSERT INTO `tipo_cliente` (`id_tip_cli`, `tipo_cliente`) VALUES
(1, 'Persona Natural'),
(2, 'Persona Juridica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_gestion`
--

CREATE TABLE `tipo_gestion` (
  `id_tipo_gestion` int(11) NOT NULL,
  `nombre` varchar(150) COLLATE utf8mb4_bin DEFAULT NULL,
  `descripcion` longtext COLLATE utf8mb4_bin,
  `id_gestion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `tipo_gestion`
--

INSERT INTO `tipo_gestion` (`id_tipo_gestion`, `nombre`, `descripcion`, `id_gestion`) VALUES
(1, 'Gestion Comuns', 'gestion comun de pagos', 1),
(2, 'Fallida', 'fallidaa', 1),
(3, 'por uso', 'ss', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_maquina`
--

CREATE TABLE `tipo_maquina` (
  `id_tipo_ma` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_maquina`
--

INSERT INTO `tipo_maquina` (`id_tipo_ma`, `nombre`, `descripcion`) VALUES
(1, 'Dispensadora', 'maquina dispensadora'),
(2, 'Empaquetadora', 'Maquina Empaquetadora');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL,
  `nombre` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `descripcion` longtext COLLATE utf8_spanish2_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `nombre`, `descripcion`) VALUES
(1, 'Administrador', 'Encargado total del sistema'),
(2, 'Operador', 'Solo realiza ticket y hojas tecnicas'),
(3, 'Vendedor', 'Distribuye');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apellido` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `correo` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `pass` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `id_tipo_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `correo`, `pass`, `id_tipo_usuario`) VALUES
(1, 'Eduardo Josue', 'Garcia Perez', 'josuegarcia@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 1),
(2, 'Construccion', 'Garcia Perez', 'dna@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 2),
(3, 'Administrador', 'Principal', 'administrador@gmail.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 1),
(4, 'Operador', 'Uno', 'operador1@gmail.com', 'e257b110509437aaceddbd342bc63d05e74221d6bac056ed279d752ff8d3afcb', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calidad`
--
ALTER TABLE `calidad`
  ADD PRIMARY KEY (`id_reporte_calidad`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_tip_cli` (`id_tip_cli`);

--
-- Indices de la tabla `cliente_producto`
--
ALTER TABLE `cliente_producto`
  ADD PRIMARY KEY (`id_cliente_producto`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `consumibles`
--
ALTER TABLE `consumibles`
  ADD PRIMARY KEY (`id_consumible`);

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id_contacto`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `detalle_consumible`
--
ALTER TABLE `detalle_consumible`
  ADD PRIMARY KEY (`id_detalle_consumible`),
  ADD KEY `FK_consumibles` (`id_consumible`),
  ADD KEY `FK_consumibles2` (`id_ficha_tecnica`);

--
-- Indices de la tabla `detalle_repuestos`
--
ALTER TABLE `detalle_repuestos`
  ADD PRIMARY KEY (`id_detalle_repuestos`),
  ADD KEY `fk_r` (`id_repuesto`),
  ADD KEY `fk_ft` (`id_ficha_tecnica`);

--
-- Indices de la tabla `detalle_retorno`
--
ALTER TABLE `detalle_retorno`
  ADD PRIMARY KEY (`id_detalle_retorno`),
  ADD KEY `DETALLE_RETORNO_ibfk_1` (`id_form_retorno`),
  ADD KEY `DETALLE_RETORNO_ibfk_2` (`id_part_fail`);

--
-- Indices de la tabla `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ficha_tecnica`
--
ALTER TABLE `ficha_tecnica`
  ADD PRIMARY KEY (`id_ficha_tecnica`),
  ADD KEY `ficha_tecnica_ibfk_1` (`id_cliente`),
  ADD KEY `ficha_tecnica_ibfk_2` (`id_producto`),
  ADD KEY `ficha_tecnica_ibfk_3` (`id_contacto`),
  ADD KEY `ft_ma7` (`id_tipo_ma`);

--
-- Indices de la tabla `formulario_retorno`
--
ALTER TABLE `formulario_retorno`
  ADD PRIMARY KEY (`id_form_retorno`);

--
-- Indices de la tabla `gestion`
--
ALTER TABLE `gestion`
  ADD PRIMARY KEY (`id_gestion`);

--
-- Indices de la tabla `grupo_producto`
--
ALTER TABLE `grupo_producto`
  ADD PRIMARY KEY (`id_grupo_producto`);

--
-- Indices de la tabla `part_failure`
--
ALTER TABLE `part_failure`
  ADD PRIMARY KEY (`id_part_fail`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_permiso`),
  ADD KEY `id_tipo_usuario` (`id_tipo_usuario`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_grupo_producto` (`id_grupo_producto`);

--
-- Indices de la tabla `repuestos`
--
ALTER TABLE `repuestos`
  ADD PRIMARY KEY (`id_repuesto`);

--
-- Indices de la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id_ticket`),
  ADD KEY `ticket_ibfk_1` (`id_cliente`),
  ADD KEY `ticket_ibfk_2` (`id_contacto`),
  ADD KEY `ticket_ibfk_3` (`id_producto`),
  ADD KEY `ticket_ibfk_4` (`id_usuario`),
  ADD KEY `ticket_ibfk_6` (`id_tipo_gestion`),
  ADD KEY `ticket_ibfk_7` (`id_ficha_tecnica`);

--
-- Indices de la tabla `tipo_cliente`
--
ALTER TABLE `tipo_cliente`
  ADD PRIMARY KEY (`id_tip_cli`);

--
-- Indices de la tabla `tipo_gestion`
--
ALTER TABLE `tipo_gestion`
  ADD PRIMARY KEY (`id_tipo_gestion`);

--
-- Indices de la tabla `tipo_maquina`
--
ALTER TABLE `tipo_maquina`
  ADD PRIMARY KEY (`id_tipo_ma`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_tipo_usuario` (`id_tipo_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calidad`
--
ALTER TABLE `calidad`
  MODIFY `id_reporte_calidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT de la tabla `cliente_producto`
--
ALTER TABLE `cliente_producto`
  MODIFY `id_cliente_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `consumibles`
--
ALTER TABLE `consumibles`
  MODIFY `id_consumible` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id_contacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `detalle_consumible`
--
ALTER TABLE `detalle_consumible`
  MODIFY `id_detalle_consumible` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `detalle_repuestos`
--
ALTER TABLE `detalle_repuestos`
  MODIFY `id_detalle_repuestos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de la tabla `detalle_retorno`
--
ALTER TABLE `detalle_retorno`
  MODIFY `id_detalle_retorno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT de la tabla `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `ficha_tecnica`
--
ALTER TABLE `ficha_tecnica`
  MODIFY `id_ficha_tecnica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `formulario_retorno`
--
ALTER TABLE `formulario_retorno`
  MODIFY `id_form_retorno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `gestion`
--
ALTER TABLE `gestion`
  MODIFY `id_gestion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `grupo_producto`
--
ALTER TABLE `grupo_producto`
  MODIFY `id_grupo_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `part_failure`
--
ALTER TABLE `part_failure`
  MODIFY `id_part_fail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `repuestos`
--
ALTER TABLE `repuestos`
  MODIFY `id_repuesto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id_ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_cliente`
--
ALTER TABLE `tipo_cliente`
  MODIFY `id_tip_cli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_gestion`
--
ALTER TABLE `tipo_gestion`
  MODIFY `id_tipo_gestion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tipo_maquina`
--
ALTER TABLE `tipo_maquina`
  MODIFY `id_tipo_ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`),
  ADD CONSTRAINT `cliente_ibfk_2` FOREIGN KEY (`id_tip_cli`) REFERENCES `tipo_cliente` (`id_tip_cli`);

--
-- Filtros para la tabla `cliente_producto`
--
ALTER TABLE `cliente_producto`
  ADD CONSTRAINT `cliente_producto_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `cliente_producto_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

--
-- Filtros para la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD CONSTRAINT `contactos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Filtros para la tabla `detalle_consumible`
--
ALTER TABLE `detalle_consumible`
  ADD CONSTRAINT `FK_consumibles` FOREIGN KEY (`id_consumible`) REFERENCES `consumibles` (`id_consumible`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_consumibles2` FOREIGN KEY (`id_ficha_tecnica`) REFERENCES `ficha_tecnica` (`id_ficha_tecnica`) ON DELETE CASCADE;

--
-- Filtros para la tabla `detalle_retorno`
--
ALTER TABLE `detalle_retorno`
  ADD CONSTRAINT `DETALLE_RETORNO_ibfk_1` FOREIGN KEY (`id_form_retorno`) REFERENCES `formulario_retorno` (`id_form_retorno`),
  ADD CONSTRAINT `DETALLE_RETORNO_ibfk_2` FOREIGN KEY (`id_part_fail`) REFERENCES `part_failure` (`id_part_fail`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
