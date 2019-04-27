-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2018 a las 20:05:23
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lacasadelarbol`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iva`
--

CREATE TABLE `iva` (
  `id` int(10) NOT NULL,
  `iva` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `iva`
--

INSERT INTO `iva` (`id`, `iva`) VALUES
(0, '16.50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesas`
--

CREATE TABLE `mesas` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mesas`
--

INSERT INTO `mesas` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_cafe`
--

CREATE TABLE `tb_cafe` (
  `id` int(11) NOT NULL,
  `id_comanda` int(12) NOT NULL,
  `h_entrada` time NOT NULL,
  `h_salida` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_clientes`
--

CREATE TABLE `tb_clientes` (
  `id` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telf1` varchar(20) NOT NULL,
  `facebook` varchar(50) NOT NULL,
  `twitter` varchar(50) NOT NULL,
  `instagram` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Clientes';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_cocina`
--

CREATE TABLE `tb_cocina` (
  `id` int(11) NOT NULL,
  `id_comanda` int(12) NOT NULL,
  `h_entrada` time NOT NULL,
  `h_salida` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='recepcion y despacho de comandas';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_comandas`
--

CREATE TABLE `tb_comandas` (
  `id` int(11) NOT NULL,
  `id_productos` varchar(50) NOT NULL,
  `ctd` varchar(50) NOT NULL,
  `id_usuario` int(4) NOT NULL,
  `id_mesa` int(4) NOT NULL,
  `id_cliente` int(4) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `status_cafe` int(1) NOT NULL,
  `status_cocina` int(1) NOT NULL,
  `obs_clasicos` varchar(125) DEFAULT NULL,
  `obs_alinados` varchar(125) NOT NULL,
  `obs_especiales` varchar(125) DEFAULT NULL,
  `obs_autor` varchar(125) DEFAULT NULL,
  `obs_metodos` varchar(125) DEFAULT NULL,
  `obs_frappuchinos` varchar(125) DEFAULT NULL,
  `obs_frullatos` varchar(125) DEFAULT NULL,
  `obs_sandwish` varchar(125) DEFAULT NULL,
  `obs_tequenos` varchar(125) DEFAULT NULL,
  `obs_panquecas` varchar(125) DEFAULT NULL,
  `obs_waffles` varchar(125) DEFAULT NULL,
  `obs_adicionales` varchar(125) DEFAULT NULL,
  `obs_croissants` varchar(125) NOT NULL,
  `obs_postres` varchar(125) NOT NULL,
  `h_pedido` time NOT NULL,
  `h_entrega` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Pedidos de cada mesa';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_facturacion`
--

CREATE TABLE `tb_facturacion` (
  `id` int(11) NOT NULL,
  `id_comanda` int(12) NOT NULL,
  `fecha` date NOT NULL,
  `sub_total` int(12) NOT NULL,
  `iva` int(2) NOT NULL,
  `total` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Facturación';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_mesas`
--

CREATE TABLE `tb_mesas` (
  `id` int(11) NOT NULL,
  `id_comanda` int(12) NOT NULL,
  `h_entrada` time NOT NULL,
  `h_salida` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_productos`
--

CREATE TABLE `tb_productos` (
  `id` int(11) NOT NULL,
  `grupo` varchar(10) NOT NULL,
  `area` varchar(10) NOT NULL,
  `id_iva` int(12) NOT NULL DEFAULT '1',
  `producto` varchar(50) NOT NULL,
  `base_imponible` decimal(12,2) NOT NULL,
  `iva` decimal(12,2) NOT NULL,
  `total` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_productos`
--

INSERT INTO `tb_productos` (`id`, `grupo`, `area`, `id_iva`, `producto`, `base_imponible`, `iva`, `total`) VALUES
(1, 'alinados ', 'cafe', 1, 'ESPRESSO ROMANO', '0.00', '0.00', '0.00'),
(2, 'alinados ', 'cafe', 1, 'ESPRESSO 1900', '0.00', '0.00', '0.00'),
(3, 'alinados ', 'cafe', 1, 'ESPRESSO PANNA', '0.00', '0.00', '0.00'),
(4, 'alinados ', 'cafe', 1, 'ESPRESSO BOMBÓN', '0.00', '0.00', '0.00'),
(5, 'alinados ', 'cafe', 1, 'ESPRESSO 1954', '0.00', '0.00', '0.00'),
(6, 'autor', 'cafe', 1, 'CAPPUCCINO CREMA REAL', '0.00', '0.00', '0.00'),
(7, 'autor', 'cafe', 1, 'CAPPUCCINO MENTA GELATO', '0.00', '0.00', '0.00'),
(8, 'autor', 'cafe', 1, 'CAPPUCCINO HIERBABUENA', '0.00', '0.00', '0.00'),
(9, 'autor', 'cafe', 1, 'ESPRESSO PIE DE LIMÓN', '0.00', '0.00', '0.00'),
(10, 'autor', 'cafe', 1, 'CAPPUCCINO CASCANUECES', '0.00', '0.00', '0.00'),
(11, 'autor', 'cafe', 1, 'LATTE HAWAIANO', '0.00', '0.00', '0.00'),
(12, 'autor', 'cafe', 1, 'COLD BREW 1900', '0.00', '0.00', '0.00'),
(13, 'autor', 'cafe', 1, 'ESPRESSO JAMAICANO', '0.00', '0.00', '0.00'),
(14, 'clasicos ', 'cafe', 1, 'ESPRESSO', '0.00', '0.00', '0.00'),
(15, 'clasicos ', 'cafe', 1, 'AMERICANO', '0.00', '0.00', '0.00'),
(16, 'clasicos ', 'cafe', 1, 'MACCHIATO', '0.00', '0.00', '0.00'),
(17, 'clasicos ', 'cafe', 1, 'CAPPUCCINO', '0.00', '0.00', '0.00'),
(18, 'clasicos ', 'cafe', 1, 'MOKACCINO', '0.00', '0.00', '0.00'),
(19, 'clasicos ', 'cafe', 1, 'LATTE', '0.00', '0.00', '0.00'),
(20, 'especiales', 'cafe', 1, 'LATTE MACCHIATO', '0.00', '0.00', '0.00'),
(21, 'especiales', 'cafe', 1, 'LATTE MOKA', '0.00', '0.00', '0.00'),
(22, 'especiales', 'cafe', 1, 'DOLCE LATTE', '0.00', '0.00', '0.00'),
(23, 'especiales', 'cafe', 1, 'LATTE VAINILLA', '0.00', '0.00', '0.00'),
(24, 'especiales', 'cafe', 1, 'MOKAMALLOWS', '0.00', '0.00', '0.00'),
(25, 'especiales', 'cafe', 1, 'AFOGATO', '0.00', '0.00', '0.00'),
(26, 'metodos', 'cafe', 1, 'PRENSA FRANCESA', '0.00', '0.00', '0.00'),
(27, 'metodos', 'cafe', 1, 'CHEMEX', '0.00', '0.00', '0.00'),
(28, 'metodos', 'cafe', 1, 'POUR OVER (V60)', '0.00', '0.00', '0.00'),
(29, 'metodos', 'cafe', 1, 'AEROPRESS', '0.00', '0.00', '0.00'),
(30, 'metodos', 'cafe', 1, 'SYPHON', '0.00', '0.00', '0.00'),
(31, 'metodos', 'cafe', 1, 'GRECA', '0.00', '0.00', '0.00'),
(32, 'metodos', 'cafe', 1, 'COLD BREW', '0.00', '0.00', '0.00'),
(33, 'adicionale', 'cocina', 1, 'MASMALLOWS', '0.00', '0.00', '0.00'),
(34, 'adicionale', 'cocina', 1, 'HELADO', '0.00', '0.00', '0.00'),
(35, 'adicionale', 'cocina', 1, 'GALLETA PIRULIN', '0.00', '0.00', '0.00'),
(36, 'adicionale', 'cocina', 1, 'GALLETAS GOYA', '0.00', '0.00', '0.00'),
(37, 'adicionale', 'cocina', 1, 'CHANTILLY', '0.00', '0.00', '0.00'),
(38, 'croissants', 'cocina', 1, 'CROISSANT', '0.00', '0.00', '0.00'),
(39, 'croissants', 'cocina', 1, 'CROISSANT CON MERMELADA(FRESA, MORA, PIÑA) Y QUESO', '0.00', '0.00', '0.00'),
(40, 'croissants', 'cocina', 1, 'CROISSANT CON NUTELLA', '0.00', '0.00', '0.00'),
(41, 'croissants', 'cocina', 1, 'CROISSANT CON MANTEQUILLA DE MANÍ', '0.00', '0.00', '0.00'),
(42, 'croissants', 'cocina', 1, 'CROISSANT CON JAMÓN Y QUESO', '0.00', '0.00', '0.00'),
(43, 'frappuchin', 'cocina', 1, 'FRAPPUCCINO CLÁSICO', '0.00', '0.00', '0.00'),
(44, 'frappuchin', 'cocina', 1, 'FRAPPUCCINO 1954', '0.00', '0.00', '0.00'),
(45, 'frappuchin', 'cocina', 1, 'DOLCE FRAPPUCCINO', '0.00', '0.00', '0.00'),
(46, 'frappuchin', 'cocina', 1, 'FRAPPUCCINO OREO', '0.00', '0.00', '0.00'),
(47, 'frappuchin', 'cocina', 1, 'FRAPPUCCINO CHOCMALOWS', '0.00', '0.00', '0.00'),
(48, 'frappuchin', 'cocina', 1, 'FRAPPUCCINO NUTELLA', '0.00', '0.00', '0.00'),
(49, 'frullatos', 'cocina', 1, 'FRULLATO MANGO FRESA', '0.00', '0.00', '0.00'),
(50, 'frullatos', 'cocina', 1, 'FRULLATO MORANGO', '0.00', '0.00', '0.00'),
(51, 'frullatos', 'cocina', 1, 'FRULLATO DE MORA', '0.00', '0.00', '0.00'),
(52, 'frullatos', 'cocina', 1, 'FRULLATO DE FRESA', '0.00', '0.00', '0.00'),
(53, 'frullatos', 'cocina', 1, 'FRULLATO DE MANGO', '0.00', '0.00', '0.00'),
(54, 'frullatos', 'cocina', 1, 'FRULLATO BANANA NUTELLA', '0.00', '0.00', '0.00'),
(55, 'frullatos', 'cocina', 1, 'FRULLATO BANANÍ', '0.00', '0.00', '0.00'),
(56, 'frullatos', 'cocina', 1, 'INFUSION DE JAMAICA', '0.00', '0.00', '0.00'),
(57, 'panquecas', 'cocina', 1, 'FRUTELLA', '0.00', '0.00', '0.00'),
(58, 'panquecas', 'cocina', 1, 'SWEETSALTY', '0.00', '0.00', '0.00'),
(59, 'postres', 'cocina', 1, 'GALLETA CHOCOCHIPS', '0.00', '0.00', '0.00'),
(60, 'postres', 'cocina', 1, 'MELOSA DE CHOCOLATE', '0.00', '0.00', '0.00'),
(61, 'postres', 'cocina', 1, 'RED VELVET', '0.00', '0.00', '0.00'),
(62, 'postres', 'cocina', 1, 'TORTA DE ZANAHORIA', '0.00', '0.00', '0.00'),
(63, 'postres', 'cocina', 1, 'TORTA BRIGADEIRO', '0.00', '0.00', '0.00'),
(64, 'postres', 'cocina', 1, 'CHEESCAKE DE OREO', '0.00', '0.00', '0.00'),
(65, 'postres', 'cocina', 1, 'PIE DE LIMÓN', '0.00', '0.00', '0.00'),
(66, 'postres', 'cocina', 1, 'BROWNIE CON HELADO', '0.00', '0.00', '0.00'),
(67, 'postres', 'cocina', 1, 'TORTA TRES SABORES', '0.00', '0.00', '0.00'),
(68, 'postres', 'cocina', 1, 'CHOCO RED', '0.00', '0.00', '0.00'),
(69, 'sandwiches', 'cocina', 1, 'CAPRESSA', '0.00', '0.00', '0.00'),
(70, 'sandwiches', 'cocina', 1, 'SELVA NEGRA', '0.00', '0.00', '0.00'),
(71, 'tequenos ', 'cocina', 1, 'TEQUEÑOS', '0.00', '0.00', '0.00'),
(72, 'tequenos ', 'cocina', 1, 'CON SALSA DE TOMATE', '0.00', '0.00', '0.00'),
(73, 'waffles', 'cocina', 1, 'BANANA CHEESCAKE', '0.00', '0.00', '0.00'),
(74, 'waffles', 'cocina', 1, 'PIZZA', '0.00', '0.00', '0.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_rol`
--

CREATE TABLE `tb_rol` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_rol`
--

INSERT INTO `tb_rol` (`id`, `descripcion`) VALUES
(1, 'Admin'),
(2, 'Caja'),
(3, 'Mesa'),
(4, 'Cafe'),
(5, 'Cocina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id` int(11) NOT NULL,
  `id_rol` int(2) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(125) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `direccion` varchar(125) NOT NULL,
  `telf1` varchar(20) NOT NULL,
  `telf2` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `facebook` varchar(50) NOT NULL,
  `twitter` varchar(50) NOT NULL,
  `instagram` varchar(50) NOT NULL,
  `f_ingreso` date NOT NULL,
  `f_egreso` date DEFAULT NULL,
  `authKey` varchar(50) NOT NULL,
  `accessToken` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Usuarios y empleados';

--
-- Volcado de datos para la tabla `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id`, `id_rol`, `username`, `password`, `nombres`, `apellidos`, `cedula`, `direccion`, `telf1`, `telf2`, `email`, `facebook`, `twitter`, `instagram`, `f_ingreso`, `f_egreso`, `authKey`, `accessToken`) VALUES
(1, 1, 'Admin', '123456', 'Admin', 'Administrador@', '9412468', 'carr 22, cale 16 # 22-85', '+58123123467', '+58123123467', 'contreras.camilo@gmail.com', 'fff', 'ttt', 'iii', '2018-09-05', '2018-09-05', '', ''),
(2, 3, 'Mesas', '123456', 'Mesa', 'Meserer@', '94124682', 'carr 22, cale 16 # 22-85, Barrio Obrero2', '+581231234672', '+581231234672', 'contreras.camilo@gmail.com2', 'fff2', 'ttt2', 'iii2', '2018-09-06', '2018-09-06', '', ''),
(3, 4, 'Cafe', '123456', 'Cafe', 'Lattes@', '94124683', 'carr 22, cale 16 # 22-85', '+58123123467', '+581231234672', 'pielcuidada@gmail.com', 'fff', 'ttt', 'iii', '2018-09-15', '2018-09-15', '', ''),
(4, 5, 'Cocina', '123456', 'Cocina', 'Paninis@', '123456789', 'MCO:85316 2250NW 114th Ave', '+58123123467', '', '', '', '', '', '2018-09-18', NULL, '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `iva`
--
ALTER TABLE `iva`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mesas`
--
ALTER TABLE `mesas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tb_cafe`
--
ALTER TABLE `tb_cafe`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_comanda` (`id_comanda`);

--
-- Indices de la tabla `tb_clientes`
--
ALTER TABLE `tb_clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tb_cocina`
--
ALTER TABLE `tb_cocina`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_comanda` (`id_comanda`);

--
-- Indices de la tabla `tb_comandas`
--
ALTER TABLE `tb_comandas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tb_facturacion`
--
ALTER TABLE `tb_facturacion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_comanda` (`id_comanda`);

--
-- Indices de la tabla `tb_mesas`
--
ALTER TABLE `tb_mesas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_comanda` (`id_comanda`);

--
-- Indices de la tabla `tb_productos`
--
ALTER TABLE `tb_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_iva` (`id_iva`),
  ADD KEY `id` (`id`),
  ADD KEY `id_iva_2` (`id_iva`);

--
-- Indices de la tabla `tb_rol`
--
ALTER TABLE `tb_rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mesas`
--
ALTER TABLE `mesas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tb_cafe`
--
ALTER TABLE `tb_cafe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_clientes`
--
ALTER TABLE `tb_clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_cocina`
--
ALTER TABLE `tb_cocina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_comandas`
--
ALTER TABLE `tb_comandas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_facturacion`
--
ALTER TABLE `tb_facturacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_mesas`
--
ALTER TABLE `tb_mesas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_productos`
--
ALTER TABLE `tb_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de la tabla `tb_rol`
--
ALTER TABLE `tb_rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_cafe`
--
ALTER TABLE `tb_cafe`
  ADD CONSTRAINT `tb_cafe_ibfk_1` FOREIGN KEY (`id_comanda`) REFERENCES `tb_comandas` (`id`);

--
-- Filtros para la tabla `tb_cocina`
--
ALTER TABLE `tb_cocina`
  ADD CONSTRAINT `tb_cocina_ibfk_1` FOREIGN KEY (`id_comanda`) REFERENCES `tb_comandas` (`id`);

--
-- Filtros para la tabla `tb_mesas`
--
ALTER TABLE `tb_mesas`
  ADD CONSTRAINT `tb_mesas_ibfk_1` FOREIGN KEY (`id_comanda`) REFERENCES `tb_comandas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
