-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-05-2025 a las 20:22:45
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
-- Base de datos: `dbejemplo`
--

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
(15, 'Telcel');

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
(11, 1, 'Insertar', '2025-05-12 12:21:11', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id_producto` int(11) NOT NULL,
  `id_parte` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_locacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id_producto`, `id_parte`, `id_cliente`, `cantidad`, `id_locacion`) VALUES
(11, 2, 9, 1, 7),
(12, 3, 12, 25, 7),
(13, 2, 9, 7, 3),
(14, 4, 15, 5, 5);

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
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nombre` varchar(50) NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre`, `contrasena`, `id`) VALUES
('Gael', '1234', 1),
('Jorge', '1425', 2),
('Alan', '4321', 3),
('Gabriela', '1524', 4),
('Alan', 'pipipi', 5),
('El Pepe', 'pasw', 6),
('Elieser', '5678', 7),
('Gael', 'ROEG040414', 8),
('Villa', 'villa:v', 9),
('Alumno', '1234', 10),
('Vian', '1235', 11);

--
-- Índices para tablas volcadas
--

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
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_parte` (`id_parte`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_locacion` (`id_locacion`);

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
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id_move` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `historial_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`id_parte`) REFERENCES `parte` (`id_parte`),
  ADD CONSTRAINT `inventario_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `inventario_ibfk_3` FOREIGN KEY (`id_locacion`) REFERENCES `locacion` (`id_locacion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
