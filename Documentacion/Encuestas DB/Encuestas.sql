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
(1, 1, 4, 1, 'Daniel', 'Coyoacan', '2018-12-04 11:55:26', '20 - 30 años', 'Licenciatura', 'Masculino', '2,000-7,999', 'Ninguna'),
(3, 1, 5, 2, 'Bibiana González', 'Guaymas, Sonora', '2018-12-05 19:11:22', '20 - 30 años', 'Licenciatura', 'Femenino', '2,000-7,999', 'Licenciada en computación'),
(5, 2, 6, 4, 'Susana Hernández', 'Ciudad de México', '2018-12-05 20:52:25', '20 - 30 años', 'Licenciatura', 'Femenino', '2,000-7,999', 'Licenciada en Educación'),
(6, 3, 6, 5, 'Salvador Pérez', 'Ensenada, Baja California', '2018-12-05 20:57:22', '30 - 40 años', 'Licenciatura', 'Masculino', '8,000-15,999', 'Ingeniero en Computación'),
(8, 3, 6, 6, 'Esteban Sepúlveda', 'Jalapa, Veracruz', '2018-12-05 21:09:06', '40 - 50 años', 'Preparatoria', 'Masculino', '25,000-34,999', 'Empresario'),
(10, 4, 8, 7, 'Daniel Durán', 'Mexicali, Baja California', '2018-12-05 21:25:54', '50 - 60 años', 'Maestría', 'Masculino', '8,000-15,999', 'Maestro en Ciencias'),
(11, 1, 8, 3, 'Daniel Durán', 'Mexicali, Baja California', '2018-12-05 21:26:23', '50 - 60 años', 'Maestría', 'Masculino', '8,000-15,999', 'Maestro en Ciencias'),
(12, 2, 6, 4, 'Gustavo Talamantes', 'Monterrey, Nuevo León', '2018-12-05 22:06:26', '60 - 70 años', 'Licenciatura', 'Masculino', '8,000-15,999', 'Licenciado en Administración'),
(13, 4, 4, 7, 'Pedro Isaac García Crespo', 'Iztacalco, Ciudad de México', '2018-12-05 22:23:00', '30 - 40 años', 'Preparatoria', 'Masculino', '8,000-15,999', 'Mecánico'),
(14, 4, 4, 8, 'Berenice Velazquez Acuña', 'Morelia, Michoacán', '2018-12-05 22:38:24', '40 - 50 años', 'Licenciatura', 'Femenino', '8,000-15,999', 'Licenciada en Psicología');

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
(18, '¿Cuales son las Características de un niño con TDA?', 8, 'Abierta'),
(19, '¿qué es una organización empresarial?', 4, 'Abierta'),
(20, '¿cuáles son los dos tipos de organización empresarial?', 4, 'Abierta'),
(21, '¿quién es la clave para la organización empresarial?', 4, 'Abierta'),
(22, '¿Cuáles son las principales funciones de quien ejerza el liderazgo?', 4, 'Abierta'),
(23, '¿qué es el pensamiento concreto?', 7, 'Abierta'),
(24, '¿a qué edad se desarrolla el pensamiento concreto?', 7, 'Abierta'),
(25, '¿Cuáles son las diferencias entre pensamiento concreto y pensamiento abstracto?', 7, 'Abierta'),
(26, '¿qué es el TDA?', 8, 'Abierta'),
(27, '¿Quién puede desarrollar TDA?', 8, 'Abierta'),
(28, '¿Qué causa el TDA?', 8, 'Abierta'),
(29, '¿Cuáles son los síntomas del TDA?', 8, 'Abierta'),
(30, '¿Cómo sé si mi hijo tiene TDA?', 8, 'Abierta'),
(31, '¿Cómo mejoran los niños que tienen TDA?', 8, 'Abierta'),
(32, '¿Cómo puedo ayudar a mi hijo?', 8, 'Abierta'),
(33, '¿Cómo afecta el TDA a los adolescentes?', 8, 'Abierta'),
(34, '¿Qué puedo hacer por mi hijo adolescente que tiene TDA?', 8, 'Abierta'),
(35, '¿Los adultos también pueden tener TDA?', 8, 'Abierta');

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
(3, 'es quien proporciona los stories', 3),
(4, 'Las organizaciones son estructuras administrativas y sistemas administrativos creadas para lograr metas u objetivos con apoyo de los propios seres humanos.', 11),
(5, 'Los circuitos CI TTL y CMOS.', 12),
(6, 'Un circuito integrado (CI), también conocido como chip o microchip, es una estructura de pequeñas dimensiones de material semiconductor', 13),
(7, 'Es correcto de una tabla de verdad se puede obtener un circuito', 15),
(8, 'No, se obtendría A', 14),
(9, 'Asi es, sí se puede obtener la tabla de verdad del circuito ya creado', 16),
(10, 'Estrategia, cuantas pruebas, cuando hacerse, quien hace las pruebas, que se prueba, de que tipo las pruebas, Casos de prrueba', 8),
(11, 'la prueba unitaria el desarrollador, la prueba de integración el equipo de desarrollo, las pruebas de aceptación los usuarios', 9),
(12, 'desempeño, disponibilidad y seguridad', 10),
(13, 'Una organización es un sistema definido para conseguir ciertos objetivos.', 11),
(14, 'Las empresas no nacen ni se estructuran por sí mismas.Antes de ponerlas en marcha, sus directivos deben tener clara la forma en que ésta se organizará de cara a las tareas propias de su actividad comercial.', 19),
(15, 'formal e informal', 20),
(16, 'El lider', 21),
(17, 'Asignación de deberes a los integrantes de la compañía. Delegación de autoridad en jefes o encargados. Gestión del factor humano y de la capacidad de los equipos de trabajo. Supervisión de las actividades corporativas. Intervención en aquellos casos ', 22),
(18, 'El pensamiento concreto es un proceso cognitivo que se caracteriza por la descripción de los hechos y los objetos tangibles', 23),
(19, ' entre los 7 y los 12 años', 24),
(20, 'Mientras el pensamiento concreto es el que nos permite procesar y describir los objetos del mundo físico, el pensamiento abstracto ocurre mediante procesos puramente mentales', 25),
(21, 'El TDA es un trastorno común de la infancia y puede afectar a los niños de distintas maneras. El TDA hace que a un niño le sea difícil concentrarse y prestar atención. Algunos niños pueden ser hiperactivos o tener problemas para tener paciencia. El T', 17),
(22, 'Distraerse fácilmente y olvidarse las cosas con frecuencia Cambiar rápidamente de una actividad a otra Tener problemas para seguir instrucciones Soñar despiertos/fantasear demasiado Tener problemas para terminar cosas como la tarea y los quehaceres d', 18),
(23, 'El TDAH es un trastorno común de la infancia y puede afectar a los niños de distintas maneras. El TDA hace que a un niño le sea difícil concentrarse y prestar atención. Algunos niños pueden ser hiperactivos o tener problemas para tener paciencia. El ', 26),
(24, 'Los niños de todos los orígenes pueden tener TDA.  Los adolescentes y adultos también pueden tener TDA.', 27),
(25, 'Los genes, porque a veces el trastorno es hereditario El plomo que se encuentra en pinturas viejas y repuestos de plomería El fumar y beber alcohol durante el embarazo Algunos daños cerebrales Los aditivos alimentarios como, por ejemplo, los colorant', 28),
(26, 'El TDA tiene muchos síntomas. Al principio algunos síntomas pueden parecer comportamientos normales de un niño, pero el TDA los empeora y hace que ocurran con mayor frecuencia. Los niños con TDA tienen al menos seis síntomas que comienzan en los prim', 29),
(27, 'El médico de su hijo puede hacer un diagnóstico. O a veces, puede mandarlo a ver a un especialista en salud mental que tenga más experiencia con el TDA para que el haga un diagnóstico. No existe una sola prueba que pueda indicar si su hijo tiene TDA.', 30),
(28, 'Medicamentos, Terapia y Combinación de terapia y medicamentos', 31),
(29, 'Brinde orientación y comprensión a su hijo. Un especialista puede indicarle a usted cómo ayudar a su hijo hacer cambios positivos. Al apoyar a su hijo, usted ayuda a todos los miembros de la familia, no solo a su hijo. También, hable con los maestros', 32),
(30, 'Ser adolescente no siempre es fácil. Los adolescentes que tienen TDA pueden pasar malos momentos. La escuela puede ser difícil y algunos adolescentes pueden tomar demasiados riesgos o romper reglas. Pero, al igual que los niños que tienen TDA, los ad', 33),
(31, 'Apoye a su hijo. Establezca reglas claras para que él o ella pueda seguirlas. Trate de no castigar a su hijo cada vez que rompa las reglas. Hágale saber que usted lo/la puede ayudar.', 34),
(32, 'Muchos adultos tienen TDA y no lo saben. Al igual que el TDA en los niños y adolescentes, el TDA en los adultos puede dificultarles la vida. El TDA puede hacer que a los adultos les sea difícil sentirse organizados, conservar un empleo, o llegar al t', 35);

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
(3, 3, 1),
(4, 4, 5),
(5, 5, 6),
(6, 6, 6),
(7, 7, 6),
(8, 8, 8),
(9, 9, 8),
(10, 10, 11),
(11, 11, 11),
(12, 12, 11),
(13, 13, 12),
(14, 14, 12),
(15, 15, 12),
(16, 16, 12),
(17, 17, 12),
(18, 18, 13),
(19, 19, 13),
(20, 20, 13),
(21, 21, 14),
(22, 22, 14),
(23, 23, 14),
(24, 24, 14),
(25, 25, 14),
(26, 26, 14),
(27, 27, 14),
(28, 28, 14),
(29, 29, 14),
(30, 30, 14),
(31, 31, 14),
(32, 32, 14);

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
