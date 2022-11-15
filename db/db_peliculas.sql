-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2022 a las 01:45:07
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
-- Base de datos: `db_peliculas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `id` int(11) NOT NULL,
  `genero` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`id`, `genero`) VALUES
(2, 'Animacion'),
(5, 'Accion'),
(6, 'Aventura'),
(44, 'Romance'),
(45, 'Terror'),
(46, 'Drama'),
(50, 'Terror'),
(51, 'Suspenso'),
(52, 'inventado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `sinopsis` varchar(250) NOT NULL,
  `fecha` int(11) NOT NULL,
  `pais` varchar(150) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `id_genero_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id`, `nombre`, `sinopsis`, `fecha`, `pais`, `direccion`, `id_genero_fk`) VALUES
(23, 'El angel de la muerte', 'La enfermera Amy Loughren queda estupefacta cuando Charlie Cullen, un compañero de trabajo en el que confiaba plenamente, es acusado de haber asesinado a decenas de pacientes durante los últimos 16 años en dos estados y nueve hospitales distintos.', 2022, 'EEUU', 'Tobias Lindholm', 51),
(24, 'Viernes 13', 'El campamento de verano del lago Cristal reabre sus puertas tras permanecer varios años cerrado a raíz de un accidente. A partir de ese momento, comienza a aparecer gente muerta en extrañas circunstancias.', 1980, 'EEUU', 'Sean S. Cunningham', 45),
(25, 'Argentina, 1985', 'Juicio a las juntas', 2022, 'Argentina', 'Santiago Mitre', 46),
(37, 'El hombre invisible', 'Un científico loco finge su suicidio y luego utiliza su invisibilidad para aterrorizar a su expareja, quien decide enfrentar al hombre invisible ella misma luego de que la policía no creyera su historia.', 2011, 'EEUU', 'Leigh Whannell', 45),
(39, 'Cherry', 'Un exmédico del ejército sufre un trastorno postraumático después de regresar de Irak. Al tratar de lidiar con la enfermedad, termina convirtiéndose en un ladrón de bancos para apoyar su adicción a las drogas', 2021, 'EEUU', 'Anthony Russo', 46),
(40, 'Los increibles', 'Un superhéroe retirado lucha contra el aburrimiento y, junto a su familia, tiene la oportunidad de salvar al mundo.', 2004, 'EEUU', 'Brad Bird', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `comentario` varchar(300) NOT NULL,
  `id_pelicula_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reviews`
--

INSERT INTO `reviews` (`id`, `comentario`, `id_pelicula_fk`) VALUES
(1, 'szfdxgchjk', 23),
(3, 'Un film excelente, un libro electrizante, con giros permanentes que no se pueden creer la originalidad del libro. Actuación protagónica al nivel de la película, o sea excelente y un Director que es un Maestro del suspenso.\r\nUn verdadero placer !!', 37),
(4, 'Viernes 13 es una película que vi de niño y me gusta desde siempre.\r\nQuizá no tenga la calidad de ¨La noche de Halloween¨ de John Carpenter, pero tiene algunos puntos que lo compensan y que hace que no me parezca inferior.', 24),
(5, 'Un gusto desde el principio hasta el final disfrutar de ese campamento tan terrorífico y como van cayendo tod@s uno a uno, el final es atemporal e historia del cine.', 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`) VALUES
(2, 'admin', '$2y$10$fBsY3Gc14q/zm3JPBnq28ORbsv33IT5KiIAu6QaLAPzVxMHn1Mnmi');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_generos_fk` (`id_genero_fk`);

--
-- Indices de la tabla `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pelicula_fk` (`id_pelicula_fk`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `peliculas_ibfk_1` FOREIGN KEY (`id_genero_fk`) REFERENCES `generos` (`id`);

--
-- Filtros para la tabla `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`id_pelicula_fk`) REFERENCES `peliculas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
