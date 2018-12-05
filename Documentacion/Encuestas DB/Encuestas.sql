-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 05-12-2018 a las 17:14:41
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Encuestas`
--
CREATE DATABASE IF NOT EXISTS `Encuestas` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `Encuestas`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ASIGNADOS`
--

DROP TABLE IF EXISTS `ASIGNADOS`;
CREATE TABLE `ASIGNADOS` (
  `IdEstudio` int(11) NOT NULL,
  `IdUsuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `ASIGNADOS`
--

INSERT INTO `ASIGNADOS` (`IdEstudio`, `IdUsuarios`) VALUES
(1, 4),
(1, 5),
(1, 7),
(1, 8),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 9),
(3, 4),
(3, 5),
(3, 6),
(3, 7),
(3, 8),
(4, 4),
(4, 6),
(4, 8),
(4, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CUESTIONARIOS`
--

DROP TABLE IF EXISTS `CUESTIONARIOS`;
CREATE TABLE `CUESTIONARIOS` (
  `IdCuestionario` int(11) NOT NULL,
  `Nombre_Cuestionario` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Descripcion` varchar(250) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `IdEstudio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `CUESTIONARIOS`
--

INSERT INTO `CUESTIONARIOS` (`IdCuestionario`, `Nombre_Cuestionario`, `Descripcion`, `IdEstudio`) VALUES
(1, 'Plan de Scrum', 'Se determinará los conocimientos que se tiene de Scrum referente al Plan que se realiza ', 1),
(2, 'Repositorios de Git', 'Se evaluará los conocimientos obtenidos sobre los repositorios que ofrece git vía comandos de terminal preferentemente con el shell de bash', 1),
(3, 'Plan de Pruebas', 'Obtendremos datos sobre los aprendizajes obtenidos del tema', 1),
(4, 'Organizaciones Empresariales', 'Evaluará los Conceptos que se tengan sobre las organizaciones industriales de la tecnología', 2),
(5, 'Circuitos Integrados', 'Se evaluará los conocimientos adquiridos sobre los distintos usos de los circuitos integrados', 3),
(6, 'Tablas de Verdad', 'Se evaluará el manejo de las tablas de verdad', 3),
(7, 'Pensamiento Concreto', 'Analizar el pensamiento concreto en niños de 3 a 6 años', 4),
(8, 'Síndrome de TDA', 'Se constatará las características de comportamiento existen en niños con trastorno de déficit de atención', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CUESTIONARIO_CONTESTADO`
--

DROP TABLE IF EXISTS `CUESTIONARIO_CONTESTADO`;
CREATE TABLE `CUESTIONARIO_CONTESTADO` (
  `IdCuestionarioContestado` int(11) NOT NULL,
  `IdEstudio` int(11) NOT NULL,
  `IdUsuarios` int(11) NOT NULL,
  `IdCuestionario` int(11) NOT NULL,
  `Nombre_Encuestado` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `Localidad` varchar(150) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Fecha_Relizado` datetime NOT NULL,
  `Rango_Edad` enum('1 - 3 años','3 - 5 años','5 - 10 años','10 - 15 años','15 - 20 años','20 - 30 años','30 - 40 años','40 - 50 años','50 - 60 años','60 - 70 años','70 - 80 años','Mas de 80 años') COLLATE utf8mb4_spanish_ci NOT NULL,
  `Escolaridad` enum('Primaria','Secundaria','Preparatoria','Licenciatura','Maestría','Doctorado','Posgrado','Ingeniería') COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `Genero` enum('Femenino','Masculino','Indefinido') COLLATE utf8mb4_spanish_ci NOT NULL,
  `Rango_Ingresos` enum('Menos de 2,000','2,000-7,999','8,000-15,999','16,000-24,999','25,000-34,999','35,000-49,999','Mas de 50,000') COLLATE utf8mb4_spanish_ci NOT NULL,
  `Info_Adicional` varchar(250) COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `CUESTIONARIO_CONTESTADO`
--

INSERT INTO `CUESTIONARIO_CONTESTADO` (`IdCuestionarioContestado`, `IdEstudio`, `IdUsuarios`, `IdCuestionario`, `Nombre_Encuestado`, `Localidad`, `Fecha_Relizado`, `Rango_Edad`, `Escolaridad`, `Genero`, `Rango_Ingresos`, `Info_Adicional`) VALUES
(1, 1, 4, 1, 'Daniel', 'Coyoacan', '2018-12-04 11:55:26', '20 - 30 años', 'Licenciatura', 'Masculino', '2,000-7,999', 'Ninguna');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ESTUDIOS`
--

DROP TABLE IF EXISTS `ESTUDIOS`;
CREATE TABLE `ESTUDIOS` (
  `idEstudio` int(11) NOT NULL,
  `Estudio` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Tipo` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Encuestador` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Analista` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `ESTUDIOS`
--

INSERT INTO `ESTUDIOS` (`idEstudio`, `Estudio`, `Tipo`, `Encuestador`, `Analista`) VALUES
(1, 'Ingeniería de Software', 'Computación', 'Blanca, Abraham', 'Rodrigo, Ivan'),
(2, 'Administración', 'Administración', 'Blanca, Luis', 'Rodrigo, Ivan, Adriana'),
(3, 'Electrónica Digital', 'Electrónica', 'Blanca, Luis, Abraham', 'Rodrigo, Ivan'),
(4, 'Psicología Infantil', 'Psicología', 'Blanca, Luis, Abraham', 'Adriana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `INFO_USUARIOS`
--

DROP TABLE IF EXISTS `INFO_USUARIOS`;
CREATE TABLE `INFO_USUARIOS` (
  `Id` int(11) NOT NULL,
  `Nombres` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Apellidos` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Edad` int(11) NOT NULL,
  `Matricula` int(11) NOT NULL,
  `Direccion` varchar(250) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `Telefono` int(11) DEFAULT NULL,
  `Id_Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `INFO_USUARIOS`
--

INSERT INTO `INFO_USUARIOS` (`Id`, `Nombres`, `Apellidos`, `Edad`, `Matricula`, `Direccion`, `Telefono`, `Id_Usuario`) VALUES
(1, 'Miguel', 'Mercado', 32, 2147483647, 'Fancisco villa, No 130, Del Iztapalapa, Col Presidentes, CP 0905412', 2147483647, 2),
(2, 'David', 'Carrillo', 30, 2113045879, '', 0, 3),
(3, 'Blanca', 'Perez', 28, 2113065987, '', 0, 4),
(4, 'Rodrigo', 'Moreno', 29, 2113065984, '', 0, 5),
(5, 'Luis', 'Roblez', 25, 2113065478, '', 0, 6),
(6, 'Ivan', 'Cruz', 24, 2113056987, '', 0, 7),
(7, 'Abraham', 'Martinez', 26, 2113054698, '', 0, 8),
(8, 'Adriana', 'Peralta', 28, 2113065487, '', 0, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `REACTIVOS`
--

DROP TABLE IF EXISTS `REACTIVOS`;
CREATE TABLE `REACTIVOS` (
  `IdReactivo` int(11) NOT NULL,
  `Nombre_Reactivo` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `IdCuestionario` int(11) NOT NULL,
  `TipoReactivo` enum('Abierta','Multiple') COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `REACTIVOS`
--

INSERT INTO `REACTIVOS` (`IdReactivo`, `Nombre_Reactivo`, `IdCuestionario`, `TipoReactivo`) VALUES
(1, '¿Que es Scrum Master?', 1, 'Abierta'),
(2, '¿Que es un stories?', 1, 'Abierta'),
(3, '¿Que es Usuario Experto?', 1, 'Abierta'),
(4, '¿Que comando de git indica que se va a usar como repositorio local? ', 2, 'Abierta'),
(5, '¿Que comando de git añade elementos a la foto(snapshot)?', 2, 'Abierta'),
(6, '¿Que comando de git genera la foto(snapshot) para obtener la nueva versión del proyecto?', 2, 'Abierta'),
(7, '¿Que comando de git envía los cambios que se han hecho al repositorio remoto?', 2, 'Abierta'),
(8, '¿Que es un plan de Pruebas?', 3, 'Abierta'),
(9, '¿Quien realiza el plan de pruebas?', 3, 'Abierta'),
(10, '¿Cuales son los elementos mas comunes del Plan de Pruebas (menciona 3)?', 3, 'Abierta'),
(11, '¿Que es una organización?', 4, 'Abierta'),
(12, '¿Que circuito tiene las compuertas NAND?', 5, 'Abierta'),
(13, '¿Que es un Circuito integrado?', 5, 'Abierta'),
(14, 'Si tienes A negada y niegas de nuevo la misma ¿Se obtiene A negada?', 6, 'Abierta'),
(15, '¿De una tabla de verdad ya creada se puede obtener el circuito?', 5, 'Abierta'),
(16, '¿Se puede obtener la tabla de verdad del circuito ya creado?', 6, 'Abierta'),
(17, '¿que es el síndrome del TDA?', 8, 'Abierta'),
(18, '¿Cuales son las Características de un niño con TDA?', 8, 'Abierta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `RESPUESTAS`
--

DROP TABLE IF EXISTS `RESPUESTAS`;
CREATE TABLE `RESPUESTAS` (
  `IdRespuesta` int(11) NOT NULL,
  `Respuesta` varchar(250) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `IdReactivo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `RESPUESTAS`
--

INSERT INTO `RESPUESTAS` (`IdRespuesta`, `Respuesta`, `IdReactivo`) VALUES
(1, 'Es el lider de un proyecto scrum', 1),
(2, 'cada uno de los casos de uso que tendra el programa', 2),
(3, 'es quien proporciona los stories', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `RESPUESTA_CAMPO`
--

DROP TABLE IF EXISTS `RESPUESTA_CAMPO`;
CREATE TABLE `RESPUESTA_CAMPO` (
  `idRespuestaCampo` int(11) NOT NULL,
  `IdRespuesta` int(11) NOT NULL,
  `IdCuestionarioContestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `RESPUESTA_CAMPO`
--

INSERT INTO `RESPUESTA_CAMPO` (`idRespuestaCampo`, `IdRespuesta`, `IdCuestionarioContestado`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TIPO_REACTIVO`
--

DROP TABLE IF EXISTS `TIPO_REACTIVO`;
CREATE TABLE `TIPO_REACTIVO` (
  `TipoReactivo` enum('Abierta','Multiple') COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `TIPO_REACTIVO`
--

INSERT INTO `TIPO_REACTIVO` (`TipoReactivo`) VALUES
('Abierta'),
('Multiple');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TIPO_USUARIO`
--

DROP TABLE IF EXISTS `TIPO_USUARIO`;
CREATE TABLE `TIPO_USUARIO` (
  `Rol` enum('Administrador de Sistema','Administrador de Estudio','Encuestador','Analista') COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `TIPO_USUARIO`
--

INSERT INTO `TIPO_USUARIO` (`Rol`) VALUES
('Administrador de Sistema'),
('Administrador de Estudio'),
('Encuestador'),
('Analista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `USUARIOS`
--

DROP TABLE IF EXISTS `USUARIOS`;
CREATE TABLE `USUARIOS` (
  `Id` int(11) NOT NULL,
  `Nombre_Usuario` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Correo` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Contrasena` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Rol` enum('Administrador de Sistema','Administrador de Estudio','Encuestador','Analista') COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `USUARIOS`
--

INSERT INTO `USUARIOS` (`Id`, `Nombre_Usuario`, `Correo`, `Contrasena`, `Rol`) VALUES
(1, 'admin', 'admin@aleph.com', 'admin', 'Administrador de Sistema'),
(2, 'Miguel', 'miguel@aleph.com', '1234', 'Administrador de Sistema'),
(3, 'David', 'david@aleph.com', '1234', 'Administrador de Estudio'),
(4, 'Blanca', 'blanca@aleph.com', '1234', 'Encuestador'),
(5, 'Rodrigo', 'rodrigo@aleph.com', '1234', 'Analista'),
(6, 'Luis', 'luis@aleph.com', '1234', 'Encuestador'),
(7, 'Ivan', 'ivan@aleph.com', '92BdDp9f', 'Analista'),
(8, 'Abraham', 'abraham@aleph.com', '96ByMcK5', 'Encuestador'),
(9, 'Adriana', 'adriana@aleph.com', '1234', 'Analista');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ASIGNADOS`
--
ALTER TABLE `ASIGNADOS`
  ADD PRIMARY KEY (`IdEstudio`,`IdUsuarios`),
  ADD KEY `fk_Estudio_has_Usuarios_Usuarios1_idx` (`IdUsuarios`),
  ADD KEY `fk_Estudio_has_Usuarios_Estudio1_idx` (`IdEstudio`);

--
-- Indices de la tabla `CUESTIONARIOS`
--
ALTER TABLE `CUESTIONARIOS`
  ADD PRIMARY KEY (`IdCuestionario`),
  ADD UNIQUE KEY `IdCuestionario_UNIQUE` (`IdCuestionario`),
  ADD UNIQUE KEY `Nombre_Cuestionario_UNIQUE` (`Nombre_Cuestionario`),
  ADD KEY `fk_Cuestionario_Estudio1_idx` (`IdEstudio`);

--
-- Indices de la tabla `CUESTIONARIO_CONTESTADO`
--
ALTER TABLE `CUESTIONARIO_CONTESTADO`
  ADD PRIMARY KEY (`IdCuestionarioContestado`),
  ADD UNIQUE KEY `IdCuestionarioContestado_UNIQUE` (`IdCuestionarioContestado`),
  ADD KEY `fk_Cuestionario_Contestado_Asignados1_idx` (`IdEstudio`,`IdUsuarios`),
  ADD KEY `fk_Cuestionario_Contestado_Cuestionario1_idx` (`IdCuestionario`);

--
-- Indices de la tabla `ESTUDIOS`
--
ALTER TABLE `ESTUDIOS`
  ADD PRIMARY KEY (`idEstudio`),
  ADD UNIQUE KEY `idEstudio_UNIQUE` (`idEstudio`),
  ADD UNIQUE KEY `Estudio_UNIQUE` (`Estudio`);

--
-- Indices de la tabla `INFO_USUARIOS`
--
ALTER TABLE `INFO_USUARIOS`
  ADD PRIMARY KEY (`Id`,`Id_Usuario`),
  ADD UNIQUE KEY `Id_UNIQUE` (`Id`),
  ADD UNIQUE KEY `IdUsuarios_UNIQUE` (`Id_Usuario`),
  ADD KEY `fk_Info_Usuarios_Usuarios1_idx` (`Id_Usuario`);

--
-- Indices de la tabla `REACTIVOS`
--
ALTER TABLE `REACTIVOS`
  ADD PRIMARY KEY (`IdReactivo`),
  ADD UNIQUE KEY `IdCuestionario_UNIQUE` (`IdReactivo`),
  ADD UNIQUE KEY `Nombre_Reactivo_UNIQUE` (`Nombre_Reactivo`),
  ADD KEY `fk_Reactivo_Cuestionario1_idx` (`IdCuestionario`),
  ADD KEY `fk_REACTIVOS_TIPO_REACTIVO1_idx` (`TipoReactivo`);

--
-- Indices de la tabla `RESPUESTAS`
--
ALTER TABLE `RESPUESTAS`
  ADD PRIMARY KEY (`IdRespuesta`),
  ADD UNIQUE KEY `IdCuestionario_UNIQUE` (`IdRespuesta`),
  ADD KEY `fk_Respuestas_Reactivo1_idx` (`IdReactivo`);

--
-- Indices de la tabla `RESPUESTA_CAMPO`
--
ALTER TABLE `RESPUESTA_CAMPO`
  ADD PRIMARY KEY (`idRespuestaCampo`),
  ADD KEY `fk_Respuesta_Campo_Respuestas1_idx` (`IdRespuesta`),
  ADD KEY `fk_Respuesta_Campo_Cuestionario_Contestado1_idx` (`IdCuestionarioContestado`);

--
-- Indices de la tabla `TIPO_REACTIVO`
--
ALTER TABLE `TIPO_REACTIVO`
  ADD PRIMARY KEY (`TipoReactivo`);

--
-- Indices de la tabla `TIPO_USUARIO`
--
ALTER TABLE `TIPO_USUARIO`
  ADD PRIMARY KEY (`Rol`),
  ADD UNIQUE KEY `Rol_UNIQUE` (`Rol`);

--
-- Indices de la tabla `USUARIOS`
--
ALTER TABLE `USUARIOS`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `id_UNIQUE` (`Id`) USING BTREE,
  ADD UNIQUE KEY `Nombre_Usuario_UNIQUE` (`Nombre_Usuario`),
  ADD KEY `fk_USUARIOS_TIPOUSUARIO1_idx` (`Rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `CUESTIONARIOS`
--
ALTER TABLE `CUESTIONARIOS`
  MODIFY `IdCuestionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `CUESTIONARIO_CONTESTADO`
--
ALTER TABLE `CUESTIONARIO_CONTESTADO`
  MODIFY `IdCuestionarioContestado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ESTUDIOS`
--
ALTER TABLE `ESTUDIOS`
  MODIFY `idEstudio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `INFO_USUARIOS`
--
ALTER TABLE `INFO_USUARIOS`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `REACTIVOS`
--
ALTER TABLE `REACTIVOS`
  MODIFY `IdReactivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `RESPUESTAS`
--
ALTER TABLE `RESPUESTAS`
  MODIFY `IdRespuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `RESPUESTA_CAMPO`
--
ALTER TABLE `RESPUESTA_CAMPO`
  MODIFY `idRespuestaCampo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `USUARIOS`
--
ALTER TABLE `USUARIOS`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ASIGNADOS`
--
ALTER TABLE `ASIGNADOS`
  ADD CONSTRAINT `fk_Estudio_has_Usuarios_Estudio1` FOREIGN KEY (`IdEstudio`) REFERENCES `ESTUDIOS` (`idEstudio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Estudio_has_Usuarios_Usuarios1` FOREIGN KEY (`IdUsuarios`) REFERENCES `USUARIOS` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `CUESTIONARIOS`
--
ALTER TABLE `CUESTIONARIOS`
  ADD CONSTRAINT `fk_Cuestionario_Estudio1` FOREIGN KEY (`IdEstudio`) REFERENCES `ESTUDIOS` (`idEstudio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `CUESTIONARIO_CONTESTADO`
--
ALTER TABLE `CUESTIONARIO_CONTESTADO`
  ADD CONSTRAINT `fk_Cuestionario_Contestado_Asignados1` FOREIGN KEY (`IdEstudio`,`IdUsuarios`) REFERENCES `ASIGNADOS` (`IdEstudio`, `IdUsuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Cuestionario_Contestado_Cuestionario1` FOREIGN KEY (`IdCuestionario`) REFERENCES `CUESTIONARIOS` (`IdCuestionario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `INFO_USUARIOS`
--
ALTER TABLE `INFO_USUARIOS`
  ADD CONSTRAINT `fk_Info_Usuarios_Usuarios1` FOREIGN KEY (`Id_Usuario`) REFERENCES `USUARIOS` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `REACTIVOS`
--
ALTER TABLE `REACTIVOS`
  ADD CONSTRAINT `fk_REACTIVOS_TIPO_REACTIVO1` FOREIGN KEY (`TipoReactivo`) REFERENCES `TIPO_REACTIVO` (`TipoReactivo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Reactivo_Cuestionario1` FOREIGN KEY (`IdCuestionario`) REFERENCES `CUESTIONARIOS` (`IdCuestionario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `RESPUESTAS`
--
ALTER TABLE `RESPUESTAS`
  ADD CONSTRAINT `fk_Respuestas_Reactivo1` FOREIGN KEY (`IdReactivo`) REFERENCES `REACTIVOS` (`IdReactivo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `RESPUESTA_CAMPO`
--
ALTER TABLE `RESPUESTA_CAMPO`
  ADD CONSTRAINT `fk_Respuesta_Campo_Cuestionario_Contestado1` FOREIGN KEY (`IdCuestionarioContestado`) REFERENCES `CUESTIONARIO_CONTESTADO` (`IdCuestionarioContestado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Respuesta_Campo_Respuestas1` FOREIGN KEY (`IdRespuesta`) REFERENCES `RESPUESTAS` (`IdRespuesta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `USUARIOS`
--
ALTER TABLE `USUARIOS`
  ADD CONSTRAINT `fk_USUARIOS_TIPOUSUARIO1` FOREIGN KEY (`Rol`) REFERENCES `TIPO_USUARIO` (`Rol`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
