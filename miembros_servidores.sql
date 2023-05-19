-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-05-2023 a las 20:31:10
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `discord`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `miembros_servidores`
--

CREATE TABLE `miembros_servidores` (
  `servidor_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `operacion_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `miembros_servidores`
--

INSERT INTO `miembros_servidores` (`servidor_id`, `usuario_id`, `operacion_id`) VALUES
(1, 22, 1),
(2, 22, 2),
(3, 22, 8),
(11, 22, 9),
(12, 22, 10),
(13, 0, 11),
(14, 22, 12),
(15, 22, 13),
(16, 22, 14),
(17, 22, 15);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `miembros_servidores`
--
ALTER TABLE `miembros_servidores`
  ADD PRIMARY KEY (`operacion_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `miembros_servidores`
--
ALTER TABLE `miembros_servidores`
  MODIFY `operacion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
