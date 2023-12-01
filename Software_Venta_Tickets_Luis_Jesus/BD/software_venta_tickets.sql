-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2023 a las 11:49:03
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `software_venta_tickets`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id_compra` int(20) NOT NULL,
  `id_usuario` int(20) NOT NULL,
  `id_ticket` int(20) NOT NULL,
  `fecha_compra` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id_compra`, `id_usuario`, `id_ticket`, `fecha_compra`) VALUES
(1, 2, 1, '2023-11-11'),
(2, 2, 2, '2023-11-11'),
(3, 3, 3, '2023-11-11'),
(5, 2, 5, '2023-11-27'),
(10, 2, 4, '2023-11-27'),
(11, 2, 3, '2023-11-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE `tickets` (
  `id_ticket` int(20) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `nombre_ticket` varchar(100) NOT NULL,
  `precio` float NOT NULL,
  `fecha_ven` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tickets`
--

INSERT INTO `tickets` (`id_ticket`, `tipo`, `nombre_ticket`, `precio`, `fecha_ven`) VALUES
(1, 'Concierto', 'Concierto de Ariana Grande', 40, '2023-12-15'),
(2, 'Partido de futbol', 'Partido del Real Madrid', 25.5, '2024-01-24'),
(3, 'Partido de futbol', 'Partido del Betis', 25, '2023-12-30'),
(4, 'Concierto', 'Concierto de Beyoncé', 30, '2024-01-14'),
(5, 'Carrera', 'Fórmula 1', 50, '2024-02-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(20) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `contraseña` varchar(200) NOT NULL,
  `rol` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `correo`, `nombre`, `contraseña`, `rol`) VALUES
(1, 'luisrisuenosilva@gmail.com', 'Luis', '05d71853e0f1b20f35a53141ce30bf2ec29bff5662a4ce8c96f6e76ab560e0dc', 1),
(2, 'tadeo@gmail.com', 'Tadeo', '1a835ebbb7503c21e642cc119282d091757d31bb22eb1f71b8540edf1010a04b', 0),
(3, 'chechu1904@gmail.com', 'Jesus', 'e722916300ef81f451d8705098b61a4307242262347fc9c5d3ddc577f4fc6789', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_ticket` (`id_ticket`);

--
-- Indices de la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id_ticket`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compra` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id_ticket` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`id_ticket`) REFERENCES `tickets` (`id_ticket`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
