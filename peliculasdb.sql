-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-05-2023 a las 04:17:36
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `peliculas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directores`
--

CREATE TABLE `directores` (
  `id_dir` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `directores`
--

INSERT INTO `directores` (`id_dir`, `nombre`) VALUES
(4, 'J. J. Abrams'),
(5, 'Robert Aldrich'),
(6, 'Woody Allen'),
(7, 'Robert Altman'),
(8, 'Wes Anderson'),
(9, 'David Cronenberg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `id_gen` int(11) NOT NULL,
  `genero` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`id_gen`, `genero`) VALUES
(8, 'Acción'),
(9, 'Ciencia ficción'),
(10, 'Comedia'),
(11, 'Documental'),
(12, 'Drama'),
(13, 'Fantasía'),
(14, 'Melodrama'),
(15, 'Musical'),
(16, 'Romance'),
(17, 'Suspenso'),
(18, 'Terror');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id_peli` int(11) NOT NULL,
  `peli_nombre` varchar(255) NOT NULL,
  `url_poster` varchar(255) NOT NULL,
  `gen_id` int(11) NOT NULL,
  `dir_id` int(11) NOT NULL,
  `duracion` int(11) NOT NULL,
  `estreno` int(11) NOT NULL,
  `sinopsis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id_peli`, `peli_nombre`, `url_poster`, `gen_id`, `dir_id`, `duracion`, `estreno`, `sinopsis`) VALUES
(1, 'asfd', 'https://medios.lamarmota.es/senor-de-los-anillos.jpeg', 10, 7, 23, 43, 'dafasdfadfdadaf'),
(2, 'super mario', 'https://nintendoeverything.com/wp-content/uploads/The-Super-Mario-Bros.-Movie-poster.jpg', 8, 7, 95, 2023, 'fdasadadaffdafdsfdfdasadadaffdafdsfdfdasadadaffdafdsfdfdasadadaffdafdsfdfdasadadaffdafdsfdfdasadadaffdafdsfdfdasadadaffdafdsfdfdasadadaffdafdsfd'),
(3, 'asddasa', 'https://m.media-amazon.com/images/M/MV5BNTc4MTc3NTQ5OF5BMl5BanBnXkFtZTcwOTg0NjI4NA@@._V1_FMjpg_UX1000_.jpg', 10, 9, 121, 205, 'asdfadsf');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `directores`
--
ALTER TABLE `directores`
  ADD PRIMARY KEY (`id_dir`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id_gen`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id_peli`),
  ADD KEY `dir_id` (`dir_id`),
  ADD KEY `gen_id` (`gen_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `directores`
--
ALTER TABLE `directores`
  MODIFY `id_dir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `id_gen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id_peli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `peliculas_ibfk_1` FOREIGN KEY (`dir_id`) REFERENCES `directores` (`id_dir`),
  ADD CONSTRAINT `peliculas_ibfk_2` FOREIGN KEY (`gen_id`) REFERENCES `generos` (`id_gen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
