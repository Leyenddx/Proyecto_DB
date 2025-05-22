-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-05-2025 a las 02:17:17
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_final`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacenista`
--

CREATE TABLE `almacenista` (
  `nombre` varchar(50) NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `almacenista`
--

INSERT INTO `almacenista` (`nombre`, `contrasena`, `id`) VALUES
('Gael', '1234', 1),
('Aron', '1234', 2),
('Cesar', '1234', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`) VALUES
(9, 'CocaCola'),
(10, 'Coppel'),
(12, 'Smart'),
(14, 'Empresa 1'),
(15, 'Telcel'),
(16, 'Soriana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id_move` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `tipo` varchar(25) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id_move`, `id_usuario`, `tipo`, `fecha_hora`, `id_producto`) VALUES
(1, 1, 'Insertar', '2025-05-12 09:34:23', 31),
(2, 1, 'Eliminar', '2025-05-12 10:50:58', 2),
(3, 1, 'Insertar', '2025-05-12 11:17:45', 9),
(4, 1, 'Insertar', '2025-05-12 11:18:11', 10),
(5, 1, 'Insertar', '2025-05-12 11:18:53', 11),
(6, 1, 'Eliminar', '2025-05-12 11:20:28', 3),
(7, 1, 'Eliminar', '2025-05-12 11:20:35', 1),
(8, 1, 'Eliminar', '2025-05-12 11:20:41', 9),
(9, 1, 'Eliminar', '2025-05-12 11:20:46', 10),
(10, 1, 'Insertar', '2025-05-12 12:20:42', 13),
(11, 1, 'Insertar', '2025-05-12 12:21:11', 14),
(12, 1, 'Insertar', '2025-05-12 12:31:01', 15),
(13, 1, 'Eliminar', '2025-05-12 12:31:08', 13),
(14, 1, 'Eliminar', '2025-05-21 17:39:38', 11),
(15, 1, 'Eliminar', '2025-05-21 17:39:45', 12),
(16, 1, 'Eliminar', '2025-05-21 17:39:50', 14),
(17, 1, 'Eliminar', '2025-05-21 17:39:56', 15),
(18, 2, 'Insertar', '2025-05-21 18:10:31', 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locacion`
--

CREATE TABLE `locacion` (
  `id_locacion` int(11) NOT NULL,
  `num_rack` int(11) NOT NULL,
  `nombre_locacion` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `locacion`
--

INSERT INTO `locacion` (`id_locacion`, `num_rack`, `nombre_locacion`) VALUES
(1, 1, 'A10'),
(2, 1, 'A11'),
(3, 1, 'A12'),
(4, 1, 'A13'),
(5, 2, 'A20'),
(6, 2, 'A21'),
(7, 2, 'A22'),
(8, 2, 'A23'),
(9, 3, 'A30'),
(10, 3, 'A31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parte`
--

CREATE TABLE `parte` (
  `id_parte` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `parte`
--

INSERT INTO `parte` (`id_parte`, `nombre`) VALUES
(2, 'X0001'),
(3, 'X0002'),
(4, 'X0003'),
(5, 'X01'),
(6, 'X16'),
(7, 'H615');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `id_parte` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_locacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `id_parte`, `id_cliente`, `cantidad`, `id_locacion`) VALUES
(16, 3, 16, 250, 7);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacenista`
--
ALTER TABLE `almacenista`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id_move`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `locacion`
--
ALTER TABLE `locacion`
  ADD PRIMARY KEY (`id_locacion`);

--
-- Indices de la tabla `parte`
--
ALTER TABLE `parte`
  ADD PRIMARY KEY (`id_parte`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_parte` (`id_parte`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_locacion` (`id_locacion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacenista`
--
ALTER TABLE `almacenista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id_move` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `locacion`
--
ALTER TABLE `locacion`
  MODIFY `id_locacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `parte`
--
ALTER TABLE `parte`
  MODIFY `id_parte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
