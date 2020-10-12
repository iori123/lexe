-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-10-2020 a las 01:52:58
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda-empresa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `nombre`, `email`, `foto`, `password`, `perfil`, `estado`, `fecha`) VALUES
(1, 'Tienda Virtual', 'admin@tienda.com', 'vistas/img/perfiles/499.png', '$2a$07$asxx54ahjppf45sd87a5aunxs9bkpyGmGE/.vekdjFg83yRec789S', 'administrador', 1, '2020-10-06 14:03:22'),
(2, 'Editor de la Tienda', 'editor@admin.com', 'vistas/img/perfiles/477.png', '$2a$07$asxx54ahjppf45sd87a5auBnK0T8g/TaNYrkZQmRmlyohJLox8X9S', 'editor', 1, '2020-10-06 14:03:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `id_subcategoria` int(11) NOT NULL,
  `ruta` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` int(11) NOT NULL,
  `titulo` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `portada` text COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id`, `id_categoria`, `id_subcategoria`, `ruta`, `estado`, `titulo`, `precio`, `portada`) VALUES
(559, 14, 33, 'boligrafos', 0, 'Boligrafos', 23, 'vistas/img/Articulos/boligrafos.jpg'),
(560, 14, 33, 'lapices', 0, 'Lapices', 12, 'vistas/img/Articulos/lapices.jpg'),
(561, 14, 33, 'correctores', 0, 'Correctores', 100, 'vistas/img/Articulos/correctores.jpg'),
(562, 14, 33, 'file-palanca', 0, 'file Palanca', 120, 'vistas/img/Articulos/file-palanca.jpg'),
(563, 14, 33, 'ligas', 0, 'Ligas', 240, 'vistas/img/Articulos/ligas.jpg'),
(564, 14, 33, 'goma-adhesiva', 0, 'Goma Adhesiva', 30, 'vistas/img/Articulos/goma-adhesiva.jpg'),
(565, 14, 34, 'lapiceros', 0, 'Lapiceros', 0, 'vistas/img/Articulos/lapiceros.jpg'),
(566, 14, 34, 'ligas-marca', 0, 'ligas marca', 4, 'vistas/img/Articulos/ligas-marca.jpg'),
(567, 14, 34, 'paquete-lapices', 0, 'paquete lapices', 5, 'vistas/img/Articulos/paquete-lapices.jpg'),
(568, 18, 40, 'quimico', 0, 'quimico', 4, 'vistas/img/Articulos/quimico.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `banner` text COLLATE utf8_spanish_ci NOT NULL,
  `ruta` text COLLATE utf8_spanish_ci NOT NULL,
  `imagen` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `banner`
--

INSERT INTO `banner` (`id`, `banner`, `ruta`, `imagen`, `estado`) VALUES
(20, 'KIMBERLY CLARK', 'kimberly-clark', 'vistas/img/banner/kimberly-clark.png', 1),
(21, 'ELITE', 'elite', 'vistas/img/banner/elite.png', 1),
(22, 'FABER CASTELL', 'faber-castell', 'vistas/img/banner/faber-castell.png', 1),
(23, 'EPSON', 'epson', 'vistas/img/banner/epson.jpg', 1),
(24, 'HP', 'hp', 'vistas/img/banner/hp.jpg', 1),
(25, 'SAPOLIO', 'sapolio', 'vistas/img/banner/sapolio.png', 0),
(26, 'LAYCONZA', 'layconza', 'vistas/img/banner/layconza.jpg', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` text COLLATE utf8_spanish_ci NOT NULL,
  `ruta` text COLLATE utf8_spanish_ci NOT NULL,
  `imagen` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `ruta`, `imagen`, `estado`, `fecha`) VALUES
(14, 'Libreria', 'libreria', 'vistas/img/cabeceras/libreria.jpg', 1, '2020-10-07 21:37:29'),
(15, 'Papeleria', 'papeleria', 'vistas/img/cabeceras/papeleria.jpg', 0, '2020-10-12 22:56:15'),
(16, 'Computo', 'computo', 'vistas/img/cabeceras/computacion.png', 0, '2020-10-12 22:56:14'),
(17, 'Aseo y Limpieza', 'aseo-y-limpieza', 'vistas/img/cabeceras/aseo-y-limpieza.jpg', 0, '2020-10-12 22:56:14'),
(18, 'ofertas movies', 'ofertas-movies', 'vistas/img/cabeceras/productos-quimicos-ac.jpg', 0, '2020-10-12 22:56:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comercio`
--

CREATE TABLE `comercio` (
  `id` int(11) NOT NULL,
  `telefono` text COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `distrito` text COLLATE utf8_spanish_ci NOT NULL,
  `correo` text COLLATE utf8_spanish_ci NOT NULL,
  `pais` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `comercio`
--

INSERT INTO `comercio` (`id`, `telefono`, `direccion`, `distrito`, `correo`, `pais`) VALUES
(1, '123 456 789', 'calle Electra lt 14 maz W la campiña', 'LA MOLINA', 'manager@shop.com', 'MX');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantilla`
--

CREATE TABLE `plantilla` (
  `id` int(11) NOT NULL,
  `logo` text COLLATE utf8_spanish_ci NOT NULL,
  `icono` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `plantilla`
--

INSERT INTO `plantilla` (`id`, `logo`, `icono`, `fecha`) VALUES
(1, 'vistas/img/plantilla/logo.png', 'vistas/img/plantilla/icono.png', '2020-10-11 04:55:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategorias`
--

CREATE TABLE `subcategorias` (
  `id` int(11) NOT NULL,
  `subcategoria` text COLLATE utf8_spanish_ci NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `ruta` text COLLATE utf8_spanish_ci NOT NULL,
  `imagen` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `subcategorias`
--

INSERT INTO `subcategorias` (`id`, `subcategoria`, `id_categoria`, `ruta`, `imagen`, `estado`, `fecha`) VALUES
(33, 'Arituclos de Libreria', 14, 'arituclos-de-libreria', 'vistas/img/cabeceras/arituclos-de-libreria.jpg', 0, '2020-10-12 22:55:29'),
(34, 'Productos Recomendados', 14, 'productos-recomendados', 'vistas/img/cabeceras/productos-recomendados.jpg', 0, '2020-10-12 22:55:28'),
(35, 'Articulos de Papeleria', 15, 'articulos-de-papeleria', 'vistas/img/cabeceras/articulos-de-papeleria.jpg', 0, '2020-10-12 22:55:27'),
(36, 'cartuchos de tinta y cintas de impresora', 16, 'cartuchos-de-tinta-y-cintas-de-impresora', 'vistas/img/cabeceras/cartuchos-de-tinta-y-cintas-de-impresora.jpg', 0, '2020-10-12 22:55:26'),
(37, 'Insumos de computación', 16, 'insumos-de-computacion', 'vistas/img/cabeceras/insumos-de-computacion.jpg', 0, '2020-10-12 22:55:23'),
(38, 'Productos de Aseo ', 17, 'productos-de-aseo-', 'vistas/img/cabeceras/productos-de-aseo-.jpg', 0, '2020-10-12 22:55:22'),
(39, 'Articulos de tocador', 17, 'articulos-de-tocador', 'vistas/img/cabeceras/articulos-de-tocador.jpg', 0, '2020-10-12 22:50:34'),
(40, 'productos quimicos', 18, 'productos-quimicos', 'vistas/img/cabeceras/productos-quimicos.jpg', 0, '2020-10-12 22:56:13');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comercio`
--
ALTER TABLE `comercio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `plantilla`
--
ALTER TABLE `plantilla`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=569;

--
-- AUTO_INCREMENT de la tabla `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `comercio`
--
ALTER TABLE `comercio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `plantilla`
--
ALTER TABLE `plantilla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
