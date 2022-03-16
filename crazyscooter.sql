-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-02-2022 a las 03:54:05
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crazyscooter`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_alquiler`
--

CREATE TABLE `cliente_alquiler` (
  `ID_Cliente` int(11) NOT NULL,
  `Nombre` varchar(15) NOT NULL,
  `Apellido` varchar(15) NOT NULL,
  `Cedula` varchar(20) NOT NULL,
  `Correo` varchar(20) NOT NULL,
  `Celular` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_reservacion`
--

CREATE TABLE `estado_reservacion` (
  `ID_Estado` int(11) NOT NULL,
  `Estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `ID_Preguntas` int(11) NOT NULL,
  `Preguntas` varchar(1000) NOT NULL,
  `Respuestas` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promociones`
--

CREATE TABLE `promociones` (
  `ID_Promociones` int(11) NOT NULL,
  `Promociones` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservaciones`
--

CREATE TABLE `reservaciones` (
  `ID_Reservaciones` int(11) NOT NULL,
  `ID_Cliente` int(11) NOT NULL,
  `Total_Pagar` int(11) NOT NULL,
  `Fecha_Reservacion` datetime NOT NULL,
  `Codigo_Reservacion` int(11) NOT NULL,
  `Estado_Reservacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `scooter`
--

CREATE TABLE `scooter` (
  `ID_Scooter` int(11) NOT NULL,
  `Nombre` varchar(15) NOT NULL,
  `Imagen` varchar(256) NOT NULL,
  `Descripcion` varchar(250) NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `scooterxreservaciones`
--

CREATE TABLE `scooterxreservaciones` (
  `ID_Scooter` int(11) NOT NULL,
  `ID_Reserva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `Tipo_Usuario` int(11) NOT NULL,
  `tipo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_Usuario` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Apellido` varchar(100) NOT NULL,
  `Cedula` varchar(100) NOT NULL,
  `Contraseña` varchar(100) NOT NULL,
  `Tipo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente_alquiler`
--
ALTER TABLE `cliente_alquiler`
  ADD PRIMARY KEY (`ID_Cliente`);

--
-- Indices de la tabla `estado_reservacion`
--
ALTER TABLE `estado_reservacion`
  ADD PRIMARY KEY (`ID_Estado`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`ID_Preguntas`);

--
-- Indices de la tabla `promociones`
--
ALTER TABLE `promociones`
  ADD PRIMARY KEY (`ID_Promociones`);

--
-- Indices de la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  ADD PRIMARY KEY (`ID_Reservaciones`),
  ADD KEY `ID_Cliente` (`ID_Cliente`),
  ADD KEY `Estado_Reservacion` (`Estado_Reservacion`);

--
-- Indices de la tabla `scooter`
--
ALTER TABLE `scooter`
  ADD PRIMARY KEY (`ID_Scooter`);

--
-- Indices de la tabla `scooterxreservaciones`
--
ALTER TABLE `scooterxreservaciones`
  ADD KEY `ID_Scooter` (`ID_Scooter`),
  ADD KEY `ID_Reserva` (`ID_Reserva`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`Tipo_Usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_Usuario`),
  ADD KEY `Tipo_usuario` (`Tipo_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente_alquiler`
--
ALTER TABLE `cliente_alquiler`
  MODIFY `ID_Cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estado_reservacion`
--
ALTER TABLE `estado_reservacion`
  MODIFY `ID_Estado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `ID_Preguntas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `promociones`
--
ALTER TABLE `promociones`
  MODIFY `ID_Promociones` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  MODIFY `ID_Reservaciones` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `scooter`
--
ALTER TABLE `scooter`
  MODIFY `ID_Scooter` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `Tipo_Usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  ADD CONSTRAINT `reservaciones_ibfk_1` FOREIGN KEY (`ID_Cliente`) REFERENCES `cliente_alquiler` (`ID_Cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservaciones_ibfk_2` FOREIGN KEY (`Estado_Reservacion`) REFERENCES `estado_reservacion` (`ID_Estado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `scooterxreservaciones`
--
ALTER TABLE `scooterxreservaciones`
  ADD CONSTRAINT `scooterxreservaciones_ibfk_1` FOREIGN KEY (`ID_Reserva`) REFERENCES `reservaciones` (`ID_Reservaciones`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `scooterxreservaciones_ibfk_2` FOREIGN KEY (`ID_Scooter`) REFERENCES `scooter` (`ID_Scooter`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`Tipo_usuario`) REFERENCES `tipo_usuario` (`Tipo_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
