-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-05-2023 a las 20:31:34
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
-- Estructura de tabla para la tabla `servidores`
--

CREATE TABLE `servidores` (
  `server_id` int(11) NOT NULL,
  `server_name` varchar(50) NOT NULL,
  `server_icon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servidores`
--

INSERT INTO `servidores` (`server_id`, `server_name`, `server_icon`) VALUES
(1, 'El servidor de asdasd', ''),
(2, 'El servidor de asdasd', 'img/server_icons/kitty-cat-sandwich.png'),
(3, 'El servidor de asdasd', 'img/server_icons/crosshair.png'),
(4, 'Viva la tortilla', 'img/server_icons/tortilla-española.jpg'),
(5, 'Viva la rotilla', 'img/server_icons/tortilla-española.jpg'),
(6, 'Mi servidor real', 'img/server_icons/kitty-cat-sandwich.gif'),
(7, 'Mi servidor real', 'img/server_icons/kitty-cat-sandwich.gif'),
(8, 'Mi servidor real', 'img/server_icons/kitty-cat-sandwich.gif'),
(9, 'otro servidor', 'img/server_icons/Imagen1.png'),
(10, 'EJAasdasd', 'img/server_icons/crosshair.png'),
(11, 'insert funciona', 'img/server_icons/valorant-phantom-profile-icon.png'),
(12, 'Aaaaa', ''),
(13, 'Servidor3', ''),
(14, 'Aaaaa', ''),
(15, 'Servidor final?', 'img/server_icons/31622-200.png'),
(16, 'Servidor final?', 'img/server_icons/31622-200.png'),
(17, 'El', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `servidores`
--
ALTER TABLE `servidores`
  ADD PRIMARY KEY (`server_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `servidores`
--
ALTER TABLE `servidores`
  MODIFY `server_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
