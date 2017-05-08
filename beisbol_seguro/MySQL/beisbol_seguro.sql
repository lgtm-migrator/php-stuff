-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-05-2017 a las 04:57:03
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `beisbol_seguro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `Identificador` int(11) NOT NULL,
  `Nombre` text NOT NULL,
  `Division` int(11) NOT NULL,
  `N_Partidos_Jugados` int(11) NOT NULL,
  `N_Partidos_Ganados` int(11) NOT NULL,
  `N_Partidos_Perdidos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`Identificador`, `Nombre`, `Division`, `N_Partidos_Jugados`, `N_Partidos_Ganados`, `N_Partidos_Perdidos`) VALUES
(4, 'Israel', 1, 3, 4, 0),
(5, 'Países Bajos', 1, 3, 2, 1),
(6, 'Corea del Sur', 1, 3, 1, 2),
(7, 'China Taipei', 1, 3, 0, 3),
(8, 'Japón', 2, 3, 3, 0),
(9, 'Cuba', 2, 3, 2, 1),
(10, 'Australia', 2, 3, 1, 2),
(11, 'China', 2, 3, 0, 3),
(12, 'República Dominicana', 3, 3, 3, 0),
(13, 'Estados Unidos', 3, 3, 2, 1),
(14, 'Colombia', 3, 3, 1, 2),
(15, 'Canadá', 3, 3, 0, 3),
(16, 'Puerto Rico', 4, 3, 3, 0),
(17, 'Venezuela', 4, 3, 1, 2),
(18, 'Italia', 4, 3, 1, 2),
(19, 'México', 4, 3, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadios`
--

CREATE TABLE `estadios` (
  `Identificador` int(11) NOT NULL,
  `Nombre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estadios`
--

INSERT INTO `estadios` (`Identificador`, `Nombre`) VALUES
(1, 'Gocheok Sky Dome, Seúl, Corea del Sur'),
(2, 'Tokyo Dome, Tokio, Japón'),
(3, 'Marlins Park, Miami, Estados Unidos'),
(4, 'Estadio Panamericano, Jalisco, México');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE `jugadores` (
  `Identificador` int(11) NOT NULL,
  `Nombre` text NOT NULL,
  `Posicion` text NOT NULL,
  `N_hits` int(11) NOT NULL DEFAULT '0',
  `Veces_plato` int(11) NOT NULL DEFAULT '0',
  `Lanzador` tinyint(1) NOT NULL DEFAULT '0',
  `Carreras_limpias` int(11) DEFAULT NULL,
  `N_Innings` int(11) DEFAULT NULL,
  `Promedio_bateo` float DEFAULT NULL,
  `Efectividad` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`Identificador`, `Nombre`, `Posicion`, `N_hits`, `Veces_plato`, `Lanzador`, `Carreras_limpias`, `N_Innings`, `Promedio_bateo`, `Efectividad`) VALUES
(31, 'Hildred Pettengill', 'JARDINERO IZQUIERDO', 14, 6, 1, 12, 11, NULL, 9.82),
(32, 'Joe Mccrady', 'PRIMERA BASE', 5, 11, 0, NULL, NULL, 0.45, NULL),
(33, 'Debroah Cheshire', 'TERCERA BASE', 16, 10, 0, NULL, NULL, 1.6, NULL),
(34, 'Kasie Abshire', 'JARDINERO CENTRAL', 15, 17, 0, NULL, NULL, 0.88, NULL),
(35, 'Lovie Larmon', 'LANZADOR', 6, 1, 0, NULL, NULL, 6, NULL),
(36, 'Treena Ghoston', 'PRIMERA BASE', 19, 6, 0, NULL, NULL, 3.17, NULL),
(37, 'Mariam Harwell', 'PRIMERA BASE', 16, 12, 1, 1, 10, NULL, 0.9),
(38, 'Izetta Zaldivar', 'RECEPTOR', 11, 17, 1, 4, 2, NULL, 18),
(39, 'Alene Portillo', 'JARDINERO CENTRAL', 5, 19, 0, NULL, NULL, 0.26, NULL),
(40, 'Jolyn Christen', 'LANZADOR', 20, 17, 0, NULL, NULL, 1.18, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidos`
--

CREATE TABLE `partidos` (
  `Identificador` int(11) NOT NULL,
  `Equipo1` text NOT NULL,
  `Equipo2` text NOT NULL,
  `Puntos_Equipo1` int(11) NOT NULL,
  `Puntos_Equipo2` int(11) NOT NULL,
  `Estadio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `partidos`
--

INSERT INTO `partidos` (`Identificador`, `Equipo1`, `Equipo2`, `Puntos_Equipo1`, `Puntos_Equipo2`, `Estadio`) VALUES
(2, 'Israel', 'Corea del Sur', 2, 1, 'Estadio Panamericano, Jalisco, México'),
(3, 'Israel', 'China Taipéi', 15, 7, 'Gocheok Sky Dome, Seúl, Corea del Sur'),
(4, 'Corea del Sur', 'Países Bajos', 0, 5, 'Estadio Panamericano, Jalisco, México'),
(5, 'China Taipéi', 'Países Bajos', 5, 6, 'Tokyo Dome, Tokio, Japón'),
(6, 'Países Bajos', 'Israel', 2, 4, 'Tokyo Dome, Tokio, Japón'),
(7, 'Corea del Sur', 'China Taipéi', 11, 8, 'Tokyo Dome, Tokio, Japón'),
(8, 'Cuba', 'Japón', 6, 11, 'Gocheok Sky Dome, Seúl, Corea del Sur'),
(9, 'China', 'Cuba', 0, 6, 'Marlins Park, Miami, Estados Unidos'),
(10, 'Japón', 'Australia', 4, 1, 'Gocheok Sky Dome, Seúl, Corea del Sur'),
(11, 'Australia', 'China', 11, 0, 'Estadio Panamericano, Jalisco, México'),
(12, 'Australia', 'Cuba', 3, 4, 'Estadio Panamericano, Jalisco, México'),
(13, 'China', 'Japón', 1, 7, 'Tokyo Dome, Tokio, Japón'),
(14, 'Canadá', 'República Dominicana', 2, 9, 'Gocheok Sky Dome, Seúl, Corea del Sur'),
(15, 'Colombia', 'Estados Unidos', 2, 3, 'Estadio Panamericano, Jalisco, México'),
(16, 'Colombia', 'Canadá', 4, 1, 'Gocheok Sky Dome, Seúl, Corea del Sur'),
(17, 'Estados Unidos', 'República Dominicana', 5, 7, 'Marlins Park, Miami, Estados Unidos'),
(18, 'República Dominicana', 'Colombia', 10, 3, 'Tokyo Dome, Tokio, Japón'),
(19, 'Canadá', 'Estados Unidos', 0, 8, 'Marlins Park, Miami, Estados Unidos'),
(20, 'México', 'Italia', 9, 10, 'Marlins Park, Miami, Estados Unidos'),
(21, 'Venezuela', 'Puerto Rico', 0, 11, 'Gocheok Sky Dome, Seúl, Corea del Sur'),
(22, 'Venezuela', 'Italia', 11, 10, 'Marlins Park, Miami, Estados Unidos'),
(23, 'Puerto Rico', 'México', 9, 4, 'Gocheok Sky Dome, Seúl, Corea del Sur'),
(24, 'Italia', 'Puerto Rico', 3, 9, 'Gocheok Sky Dome, Seúl, Corea del Sur'),
(25, 'México', 'Venezuela', 11, 9, 'Gocheok Sky Dome, Seúl, Corea del Sur');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Identificador` int(11) NOT NULL,
  `Correo` text NOT NULL,
  `Contra` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Identificador`, `Correo`, `Contra`) VALUES
(1, 'beisbol@seguro.com', '4d24200a7ba369d7cdd9904836394323faed4ac8');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`Identificador`);

--
-- Indices de la tabla `estadios`
--
ALTER TABLE `estadios`
  ADD PRIMARY KEY (`Identificador`);

--
-- Indices de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`Identificador`);

--
-- Indices de la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD PRIMARY KEY (`Identificador`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Identificador`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `Identificador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `estadios`
--
ALTER TABLE `estadios`
  MODIFY `Identificador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `Identificador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT de la tabla `partidos`
--
ALTER TABLE `partidos`
  MODIFY `Identificador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Identificador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
