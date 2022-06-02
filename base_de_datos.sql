-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-06-2022 a las 02:09:33
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tallerphp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `director` varchar(200) NOT NULL,
  `fechaEstreno` date NOT NULL,
  `portada` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`id`, `nombre`, `director`, `fechaEstreno`, `portada`) VALUES
(1, 'Suspiria', 'Dario Argento', '1977-02-01', 'default.jpg'),
(2, 'Viernes 13', 'Tom McLoughlin', '1980-10-23', 'img_62d9129ee3dba66eef5b8a56ee2cfa0f.jpg'),
(4, 'Scream', 'Wes Craven', '1996-12-20', 'img_c4c2628eb86b7d9a2720c0fb1ee1f682.jpg'),
(5, 'It', 'Tommy Lee Wallace', '1990-11-18', 'img_da48621b39d09a4d4f5ceb09e4a85f40.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `nombre` varchar(50) NOT NULL,
  `clave` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombre`, `clave`) VALUES
('admin', '$2y$10$XWoflzGhr10idVvmgMsoW.BJBvJXcL2eJB.iOO0Fp/7wJ/Plf/quy'),
('wen', '$2y$10$AwBoWY.TczuYeRzZrxurq.V0t8jyJhXWLzFt.0MqCk8AbJXzW9/QO');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
