-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-05-2023 a las 20:30:29
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
-- Estructura de tabla para la tabla `amistades`
--

CREATE TABLE `amistades` (
  `id_usuario` int(11) NOT NULL,
  `id_amigo` int(11) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `amistades`
--

INSERT INTO `amistades` (`id_usuario`, `id_amigo`, `estado`) VALUES
(19, 21, 0),
(19, 20, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `user_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `birth_date` date NOT NULL,
  `mailing_list` tinyint(1) NOT NULL,
  `profile_picture` varchar(50) NOT NULL,
  `user_code` int(11) NOT NULL,
  `activity` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`user_id`, `email`, `username`, `password`, `birth_date`, `mailing_list`, `profile_picture`, `user_code`, `activity`) VALUES
(19, 'guille@clase.es', 'guille', '1234', '2002-05-19', 1, './default_pp/5.png', 0, 0),
(20, 'discord@jaja.com', 'g1we', 'asdadad', '2009-06-16', 0, './default_pp/3.png', 0, 0),
(21, 'funciona@porafavor.com', 'holaa', '1234', '2008-03-19', 0, './default_pp/7.png', 4988, 0),
(22, 'hola3434@asf.coams', 'asdasd', '2231321', '2011-06-16', 1, './default_pp/1.png', 2213, 0),
(23, 'juasdasd@gmail.com', 'guille', 'sdfsdf', '2002-06-18', 1, './default_pp/4.png', 7383, 0),
(24, 'jeje@gmail.es', 'pedro123', 'a3asd', '2006-03-17', 0, './default_pp/3.png', 1661, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
