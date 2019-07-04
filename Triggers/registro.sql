-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-07-2019 a las 18:37:19
-- Versión del servidor: 10.1.40-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `partyshake`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `id_registro` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_bin NOT NULL,
  `apellido_paterno` varchar(30) COLLATE utf8_bin NOT NULL,
  `apellido_materno` varchar(30) COLLATE utf8_bin NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `correo` text COLLATE utf8_bin NOT NULL,
  `contraseña` varchar(10) COLLATE utf8_bin NOT NULL,
  `tipo_registro_id` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`id_registro`, `nombre`, `apellido_paterno`, `apellido_materno`, `telefono`, `correo`, `contraseña`, `tipo_registro_id`) VALUES
(1, 'Alejandro', 'Hernández ', 'Zepeda', 7226619787, 'alejandro.hernandez981112@gmail.com', '315023264', 1),
(2, 'Ismael', 'Ortiz', 'Pulido', 7222476037, 'SzitroD@hotmail.com', '315023264', 2),
(3, 'Melissa', 'Benítez', 'Caballero', 7227961023, 'melissa.benitez15@hotmail.com', '315023264', 3),
(4, 'Fernanda', 'Flores', 'Toledo', 722356748, 'fernanda.flores@gmail.com', '12345', 2);

--
-- Disparadores `registro`
--
DELIMITER $$
CREATE TRIGGER `registro_AI` AFTER INSERT ON `registro` FOR EACH ROW insert into copy_registro set id_copy_registro=new.id_registro, nombre=new.nombre, apellido_paterno=new.apellido_paterno, apellido_materno=new.apellido_materno,
							  correo=new.correo, contraseña=new.contraseña
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `registro_BU` BEFORE UPDATE ON `registro` FOR EACH ROW update copy_registro set id_copy_registro=new.id_registro, nombre=new.nombre, apellido_paterno=new.apellido_paterno, apellido_materno=new.apellido_materno,
							  correo=new.correo, contraseña=new.contraseña where id_copy_registro=old.id_registro
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id_registro`),
  ADD KEY `tipo_registro_id` (`tipo_registro_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `registro`
--
ALTER TABLE `registro`
  ADD CONSTRAINT `registro_ibfk_1` FOREIGN KEY (`tipo_registro_id`) REFERENCES `tipo_registro` (`id_tipo_registro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
