-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-12-2021 a las 19:35:54
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dwes_tarde_itinerarios_formativos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(150) NOT NULL,
  `nota` int(11) NOT NULL,
  `curso_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombre`, `apellidos`, `nota`, `curso_id`) VALUES
(1, 'María', 'López Hernández', 7, 8),
(2, 'Mónica', 'Fernández Paniagua', 4, 8),
(3, 'Beatriz', 'Fernández León', 5, 8),
(4, 'Rosario', 'Pérez Alonso', 9, 8),
(5, 'Carmen', 'García Moran', 8, 8),
(6, 'Nuria', 'Pastor Meneses', 9, 8),
(7, 'Elena', 'Montaño Moreno', 4, 8),
(8, 'Daniel', 'Hernández Muñoz', 4, 8),
(9, 'Pedro', 'García Hidalgo', 6, 8),
(10, 'Francisco', 'Cabrera González', 6, 8),
(11, 'Ángel', 'Álvarez González', 6, 8),
(12, 'Francisca', 'López Barroso', 9, 8),
(13, 'Mireia', 'Alarcón Quero', 3, 8),
(14, 'María José', 'Fernández Moreno', 6, 8),
(15, 'Juan', 'Rodríguez García', 8, 8),
(16, 'Estibaliz', 'Mirón Márquez', 5, 8),
(17, 'Ana María', 'Tapia Valera', 8, 8),
(18, 'Vicente', 'Gutiérrez Fernández', 4, 8),
(19, 'Francisca', 'Linares Martí', 3, 8),
(20, 'María', 'López Afonso', 3, 7),
(21, 'María Carmen', 'Vázquez San Martin', 6, 7),
(22, 'Julia', 'Jiménez Fernández', 9, 7),
(23, 'Antonia', 'Andrade Fernández', 3, 7),
(24, 'Andrés', 'Cervantes Santos', 4, 7),
(25, 'Sergio', 'Rodríguez Ros', 8, 7),
(26, 'Iván', 'Aguilar Bermúdez', 3, 7),
(27, 'Juan', 'Aranda Riera', 5, 7),
(28, 'Francisca', 'Martin Castro', 4, 7),
(29, 'Antonio', 'Barrera Fernández', 4, 7),
(30, 'Maider', 'Pujol Yepes', 3, 7),
(31, 'Antonia', 'Fernández Castillo', 3, 7),
(32, 'Rosa María', 'Manrique Montero', 4, 7),
(33, 'Ricardo', 'Cañada Fernández', 5, 7),
(34, 'Manuel', 'Viñas Carrera', 4, 7),
(35, 'Juan José', 'Quesada García', 7, 7),
(36, 'Paula', 'Arredondo Carrasco', 3, 7),
(37, 'David', 'Sánchez Martin', 5, 7),
(38, 'Raúl', 'Martínez Uceda', 8, 7),
(39, 'Antonia', 'Rubio Hernández', 4, 7),
(40, 'Carlos', 'Carmona Garate', 4, 7),
(41, 'María Teresa', 'Lozano Ramón', 4, 7),
(42, 'Alberto', 'Alvarado Ruiz', 9, 7),
(43, 'Javier', 'Sánchez Mesas', 6, 7),
(44, 'Manuel', 'Álvarez Gallardo', 6, 7),
(45, 'Sergio', 'Valls Espinoza', 9, 6),
(46, 'Ramón', 'Muñoz Rodríguez', 9, 6),
(47, 'Joaquín', 'Maldonado Neira', 8, 6),
(48, 'Manuel', 'Fernández Rojo', 4, 6),
(49, 'Josefa', 'Rivas Fernández', 8, 6),
(50, 'María Carmen', 'Hernández Galán', 5, 6),
(51, 'David', 'Martínez García', 7, 6),
(52, 'María Ángeles', 'Alsina Martin', 4, 6),
(53, 'Antonio', 'Moreno Gómez', 8, 6),
(54, 'Francisco', 'Álvarez Viera', 6, 6),
(55, 'José Antonio', 'Ayala Delgado', 8, 6),
(56, 'Antonio', 'Quintero Martínez', 5, 6),
(57, 'Antonio', 'Cabrera Vera', 5, 6),
(58, 'Antonio', 'Esteban Catalán', 7, 6),
(59, 'Juan José', 'Gómez Montero', 3, 6),
(60, 'José María', 'Martínez Gutiérrez', 5, 6),
(61, 'María Dolores', 'Bautista Gómez', 6, 6),
(62, 'Dolores', 'Gutiérrez Amores', 6, 6),
(63, 'María Teresa', 'Conde Carracedo', 5, 6),
(64, 'Sara', 'Planells González', 3, 6),
(65, 'Elena', 'Parra Calvente', 8, 6),
(66, 'Joaquín', 'Díaz Romero', 4, 6),
(67, 'Josefa', 'Fernández Falcón', 5, 6),
(68, 'María', 'González Saura', 3, 6),
(69, 'Javier', 'Sevilla Blanco', 3, 6),
(70, 'Pablo', 'Matos Barrachina', 8, 6),
(71, 'María Carmen', 'Pérez Carbajo', 9, 6),
(72, 'Milagros', 'Fernández De Blas', 5, 6),
(73, 'Francisco', 'Hernández González', 8, 6),
(74, 'Ana María', 'Espina López', 7, 6),
(75, 'Carmen', 'Romero Alberola', 7, 6),
(76, 'José', 'Mendoza Carrasco', 6, 6),
(77, 'Raquel', 'Ibáñez Real', 3, 6),
(78, 'Daniel', 'Pérez Aguilar', 8, 6),
(79, 'Ana', 'Gallego Villarejo', 5, 6),
(80, 'Raquel', 'Macia Monge', 3, 6),
(81, 'Enrique', 'Mesa Pérez', 4, 6),
(82, 'María Carmen', 'Iglesias Millán', 5, 6),
(83, 'Beatriz', 'Cabrera García', 9, 6),
(84, 'José Luis', 'Jiménez Bueno', 4, 6),
(85, 'María Carmen', 'González Guzmán', 8, 5),
(86, 'María', 'Garrido Carpintero', 5, 5),
(87, 'Álvaro', 'Molero Hernández', 8, 5),
(88, 'Antonio', 'González Beltrán', 5, 5),
(89, 'Jorge', 'Brown Liñán', 6, 5),
(90, 'Antonio', 'Muñoz Revuelta', 4, 5),
(91, 'Andrea', 'Ruiz Alfonso', 3, 5),
(92, 'Francisca', 'Soria Pascual', 9, 5),
(93, 'Ana', 'Arias Del Campo', 7, 5),
(94, 'Isabel', 'Gutiérrez Rivera', 4, 5),
(95, 'Mercedes', 'Da Silva Alonso', 8, 5),
(96, 'María Josefa', 'Cubero Castañeda', 3, 5),
(97, 'María', 'Guerrero Melian', 3, 5),
(98, 'Diego', 'Rebollo Zamora', 8, 5),
(99, 'Francisco', 'Hernández Torre', 7, 5),
(100, 'María Luisa', 'Márquez Esteban', 8, 5),
(101, 'Josefa', 'Pérez García', 8, 5),
(102, 'José Luis', 'Ríos Molina', 5, 5),
(103, 'Pedro', 'González Serrano', 4, 5),
(104, 'Anna', 'Medina Sánchez', 4, 5),
(105, 'María Carmen', 'Murcia Muñoz', 8, 5),
(106, 'Marta', 'Gallardo Peña', 5, 5),
(107, 'Laura', 'Montesdeoca Fernández', 8, 5),
(108, 'Francisco', 'Rodríguez Ferrer', 3, 5),
(109, 'Ángel', 'Llorente Moreno', 5, 5),
(110, 'José', 'De los Santos Bernal', 8, 5),
(111, 'Laura', 'Castro López', 6, 5),
(112, 'José', 'Alonso Lucas', 4, 5),
(113, 'Miguel Ángel', 'Rodríguez Ávila', 5, 5),
(114, 'Antonio', 'Vásquez García', 3, 5),
(115, 'Manuela', 'Martínez Álvarez', 9, 5),
(116, 'María Luisa', 'Mendoza Suarez', 7, 5),
(117, 'José Manuel', 'Carretero García', 7, 5),
(118, 'María Begoña', 'Diéguez Flores', 10, 5),
(119, 'Sara', 'Rodríguez Suarez', 5, 5),
(120, 'Antonio', 'Castro González', 8, 5),
(121, 'Ana María', 'García Herrero', 5, 5),
(122, 'María Carmen', 'Muñoz Rodríguez', 5, 5),
(123, 'Ángel', 'Alemán Royo', 5, 5),
(124, 'María Teresa', 'Ruiz Aragón', 7, 5),
(125, 'Nuria', 'González Ramos', 3, 4),
(126, 'Jorge', 'Álvarez Rodríguez', 3, 4),
(127, 'José', 'García Alarcón', 7, 4),
(128, 'Encarnación', 'Carrión López', 5, 4),
(129, 'María Mar', 'De la Torre García', 4, 4),
(130, 'Jorge', 'Ramírez Sánchez', 9, 4),
(131, 'Ángel', 'Hernández Aranda', 4, 4),
(132, 'David', 'Martínez Vázquez', 8, 4),
(133, 'José', 'López Pérez', 6, 4),
(134, 'Daniel', 'Díaz Serrano', 3, 4),
(135, 'Fernando', 'Morales Saiz', 5, 4),
(136, 'José', 'Aguirre González', 8, 4),
(137, 'Javier', 'Fontán Fernández', 4, 4),
(138, 'Vicenta', 'Molina Martínez', 9, 4),
(139, 'Antonio', 'Ezquerra López', 4, 4),
(140, 'María Ángeles', 'Méndez García', 10, 4),
(141, 'Juan Antonio', 'Guardia Tome', 5, 4),
(142, 'Marta', 'Torres Blasco', 4, 4),
(143, 'Pedro', 'Castillo Bravo', 3, 4),
(144, 'Purificación', 'Valdés Hinojosa', 3, 4),
(145, 'Ángel', 'Barroso Tapia', 3, 4),
(146, 'Carmen', 'Herrera Paniagua', 8, 4),
(147, 'Francisco', 'Trejo Tornero', 3, 4),
(148, 'Francisco', 'Castro Serra', 8, 4),
(149, 'María', 'Vela González', 8, 4),
(150, 'Mario', 'Ortega Villanueva', 4, 4),
(151, 'Antonio', 'García Fernández', 5, 4),
(152, 'Antoni', 'López Sánchez', 6, 4),
(153, 'José María', 'Cano Madrid', 4, 4),
(154, 'Francisca', 'Álvarez Mayol', 4, 4),
(155, 'Antonio', 'Montañez Hidalgo', 6, 4),
(156, 'Diego', 'Fernández Morales', 4, 4),
(157, 'María', 'García Valdés', 3, 4),
(158, 'Javier', 'Zabala Prieto', 9, 4),
(159, 'Jesús', 'Montero Claros', 5, 4),
(160, 'Manuel', 'Díaz García', 5, 4),
(161, 'Francisco Javier', 'Núñez Domínguez', 5, 4),
(162, 'Diego', 'Domínguez Moya', 9, 4),
(163, 'Marta', 'Lorenzo Armero', 4, 4),
(164, 'José Ignacio', 'Espino Barrachina', 4, 4),
(165, 'Francisco', 'Garrote Murcia', 4, 4),
(166, 'Ángela', 'García Carrillo', 5, 4),
(167, 'Francisca', 'Esteban Aranda', 8, 4),
(168, 'María Dolores', 'Gutiérrez Guillen', 3, 4),
(169, 'María', 'Domenech Martínez', 5, 4),
(170, 'Pedro', 'Haro Martin', 3, 4),
(171, 'Manuel', 'López Ovejero', 5, 4),
(172, 'Manuel', 'Flores Aguilar', 5, 4),
(173, 'Juan', 'Rivas López', 6, 4),
(174, 'Rafael', 'Gómez Pérez', 6, 4),
(175, 'Ángel', 'Fuentes Jiménez', 8, 4),
(176, 'Miguel Ángel', 'Delgado De Miguel', 5, 4),
(177, 'Juan José', 'Romero Mir', 3, 4),
(178, 'José Luis', 'Vázquez Gascón', 8, 4),
(179, 'Juan Manuel', 'Huang González', 8, 4),
(180, 'Cristina', 'Márquez Gámez', 9, 4),
(181, 'María Luisa', 'Reina Fernández', 8, 4),
(182, 'Dolores', 'Martin García', 4, 4),
(183, 'Antonio', 'Villena López', 6, 4),
(184, 'Manuel', 'Rodríguez Zapata', 6, 4),
(185, 'María Teresa', 'Maza López', 3, 3),
(186, 'María Isabel', 'Paz García', 9, 3),
(187, 'Rosario', 'Sánchez Mateo', 4, 3),
(188, 'Iván', 'Bosch Guisado', 6, 3),
(189, 'Javier', 'Calvo Luengo', 7, 3),
(190, 'Lucia', 'Ortega Díaz', 5, 3),
(191, 'Elena', 'Antolín Maroto', 7, 3),
(192, 'Pedro', 'Romero Malagón', 3, 3),
(193, 'Juan Manuel', 'Pradas Gómez', 6, 3),
(194, 'Juan', 'Muñoz García', 5, 3),
(195, 'Isabel', 'Solera Jiménez', 5, 3),
(196, 'Rosario', 'Mancebo Saiz', 9, 3),
(197, 'Ángeles', 'Hernández Álvarez', 7, 3),
(198, 'José Luis', 'Izquierdo Jiménez', 8, 3),
(199, 'Ana', 'Bejarano Piña', 6, 3),
(200, 'Carmen', 'Sánchez Alba', 9, 3),
(201, 'Manuel', 'Martorell Martínez', 7, 3),
(202, 'Rosa', 'Fernández Alonso', 3, 3),
(203, 'Ana María', 'García Del Rio', 5, 3),
(204, 'Silvia', 'López López', 3, 3),
(205, 'José Luis', 'Jaén Fernández', 5, 3),
(206, 'Josefa', 'Valera Valle', 7, 3),
(207, 'Iván', 'Morales Sánchez', 6, 3),
(208, 'Montserrat', 'Diez Gutiérrez', 10, 3),
(209, 'Juan Antonio', 'Ruiz Suarez', 7, 3),
(210, 'Patricia', 'Hernández Pascual', 9, 3),
(211, 'María Isabel', 'Serra Ballesta', 5, 3),
(212, 'María Carmen', 'Fernández Gil', 7, 3),
(213, 'Pilar', 'Serra Muñoz', 6, 3),
(214, 'David', 'Vázquez Barranco', 8, 3),
(215, 'David', 'García Martínez', 7, 3),
(216, 'María Pilar', 'Candel García', 8, 3),
(217, 'José Luis', 'García Singh', 5, 3),
(218, 'Juan', 'Navarro Rodríguez', 9, 3),
(219, 'Enrique', 'Meléndez Jiménez', 9, 3),
(220, 'Ángeles', 'Díaz Pajares', 4, 3),
(221, 'Rosa', 'Rodríguez Abella', 4, 3),
(222, 'Manuel', 'Martin Sanz', 4, 3),
(223, 'Francisca', 'Martínez Morera', 5, 3),
(224, 'Juan', 'Hernández García', 8, 3),
(225, 'Antonio', 'Quesada Pallares', 8, 3),
(226, 'Marta', 'Mena Martínez', 8, 3),
(227, 'Elena', 'Esteban Ochoa', 9, 3),
(228, 'Antonio', 'García Bravo', 5, 3),
(229, 'José Antonio', 'Villar Rodríguez', 6, 3),
(230, 'Jesús', 'Zorrilla Sánchez', 4, 3),
(231, 'Francisco Javier', 'Pérez Garriga', 7, 3),
(232, 'María Teresa', 'García Casado', 9, 3),
(233, 'Elena', 'Soto Vílchez', 3, 3),
(234, 'Vicenta', 'Pérez Navarro', 8, 3),
(235, 'Joan', 'Fernández Dorado', 5, 3),
(236, 'Encarnación', 'Cobos Sánchez', 8, 3),
(237, 'José', 'Pina Luis', 4, 3),
(238, 'José Antonio', 'Silva Benavent', 9, 3),
(239, 'Jesús', 'Expósito González', 5, 3),
(240, 'Francisco Javier', 'Miralles Mendoza', 6, 3),
(241, 'Ángel', 'Medina Alba', 4, 3),
(242, 'Pedro', 'Marques Jiménez', 8, 3),
(243, 'José', 'Menéndez Burgos', 6, 3),
(244, 'Marta', 'González Zhu', 8, 3),
(245, 'Miguel', 'Castañeda Funes', 3, 3),
(246, 'Antonio', 'Amaya Roca', 8, 3),
(247, 'María Carmen', 'Martínez Toledo', 3, 3),
(248, 'Dolores', 'Tena González', 9, 2),
(249, 'Ana María', 'Rodríguez Comino', 5, 2),
(250, 'José', 'Gallego Varo', 9, 2),
(251, 'Silvia', 'Regalado Hernández', 9, 2),
(252, 'Javier', 'Arranz Cortes', 3, 2),
(253, 'David', 'Ruiz Gaspar', 4, 2),
(254, 'José', 'Moreno López', 6, 2),
(255, 'Jorge', 'Garrido Trujillo', 9, 2),
(256, 'Miguel Ángel', 'Pérez Álvarez', 9, 2),
(257, 'Manuel', 'Delgado Paz', 6, 2),
(258, 'Manuel', 'Serrano Aguilera', 5, 2),
(259, 'Juana', 'González Morillo', 9, 2),
(260, 'Luis', 'Hurtado Sánchez', 9, 2),
(261, 'María Carmen', 'Carrillo López', 4, 2),
(262, 'Manuel', 'Artiles Muñoz', 7, 2),
(263, 'Carmen', 'Villegas Gómez', 6, 2),
(264, 'Francisco', 'Gonzalo Herraiz', 4, 2),
(265, 'Manuel', 'García Martínez', 9, 2),
(266, 'María Carmen', 'Jiménez Gómez', 6, 2),
(267, 'Javier', 'Acosta Liébana', 8, 2),
(268, 'Francisco Javier', 'Miralles Hita', 6, 2),
(269, 'Sonia', 'Pérez Mora', 4, 2),
(270, 'Vicente', 'Sánchez Sánchez', 3, 2),
(271, 'Juan José', 'Delgado Asensio', 5, 2),
(272, 'Francisco', 'Torres López', 7, 2),
(273, 'María Josefa', 'Plaza García', 6, 2),
(274, 'Alejandro', 'Viñas Ayllón', 3, 2),
(275, 'Isabel', 'Martorell Maldonado', 7, 2),
(276, 'Ana María', 'Gómez Morales', 7, 2),
(277, 'Juan', 'Márquez Flores', 3, 2),
(278, 'Elena', 'Jorda Pablos', 9, 2),
(279, 'María Magdalena', 'Ros Gómez', 4, 2),
(280, 'María Luisa', 'Martínez Ballesteros', 3, 2),
(281, 'Ramón', 'Feijoo Cava', 8, 2),
(282, 'Juan', 'Stoica León', 4, 2),
(283, 'Antonio', 'Riba Luque', 9, 2),
(284, 'María Luisa', 'Losada Rodríguez', 8, 2),
(285, 'Rubén', 'Rodríguez Rodríguez', 4, 2),
(286, 'María Carmen', 'Zurita San José', 9, 2),
(287, 'Iker', 'Marín Ortiz', 5, 2),
(288, 'Julio', 'Sanz Galarza', 8, 2),
(289, 'Pedro', 'Martin Macías', 8, 2),
(290, 'Francisca', 'Bermejo García', 3, 2),
(291, 'Pedro', 'Rodríguez Crespo', 6, 2),
(292, 'Fernando', 'Castaño De la Torre', 3, 2),
(293, 'José', 'López Pérez', 8, 2),
(294, 'Raúl', 'Naranjo Rocha', 8, 2),
(295, 'Eva', 'Rueda Vera', 7, 2),
(296, 'Isabel', 'Villegas Labrador', 3, 2),
(297, 'Dolores', 'Carmona García', 9, 2),
(298, 'Carmen', 'Díaz Vargas', 9, 2),
(299, 'José Luis', 'Romero Montes', 4, 2),
(300, 'María Teresa', 'Flores Alonso', 4, 2),
(301, 'Irene', 'Cabañas Martí', 5, 2),
(302, 'Sara', 'Rodríguez García', 9, 2),
(303, 'José Luis', 'Sánchez García', 9, 2),
(304, 'Cristina', 'López Pérez', 5, 2),
(305, 'Teresa', 'Rivero Romero', 3, 2),
(306, 'Raúl', 'Gheorghe Rodrigo', 6, 2),
(307, 'Antonio', 'Romero Campos', 4, 2),
(308, 'Enrique', 'Triguero Fernández', 8, 2),
(309, 'Carmen', 'García De Castro', 9, 2),
(310, 'Mercedes', 'Pintor Catalán', 7, 2),
(311, 'Antonio', 'Sanz Diez', 3, 1),
(312, 'Cristina', 'Gómez Masip', 8, 1),
(313, 'Antonio', 'Trujillo Martínez', 9, 1),
(314, 'Eduardo', 'Muñoz Rubio', 9, 1),
(315, 'Julián', 'Gómez Muñoz', 9, 1),
(316, 'María Teresa', 'Contreras Moreno', 7, 1),
(317, 'Laura', 'Márquez Carrera', 9, 1),
(318, 'Raquel', 'Antelo González', 6, 1),
(319, 'Miguel', 'Vigil Calvo', 8, 1),
(320, 'Francisco Javier', 'Peñas Tabares', 9, 1),
(321, 'Manuel', 'Asencio Díaz', 9, 1),
(322, 'Elena', 'Sainz Ochoa', 8, 1),
(323, 'Antonio', 'Montenegro Sánchez', 9, 1),
(324, 'Alberto', 'Solé Diez', 3, 1),
(325, 'María', 'Espada García', 3, 1),
(326, 'Julia', 'Santos Romero', 9, 1),
(327, 'Juan', 'Pla Rodríguez', 8, 1),
(328, 'David', 'González Casas', 3, 1),
(329, 'José Luis', 'Giner Stoica', 5, 1),
(330, 'María Pilar', 'Pérez Reyes', 5, 1),
(331, 'Pedro', 'Gallego Márquez', 8, 1),
(332, 'Francisco', 'Ibáñez Millán', 5, 1),
(333, 'Álvaro', 'Fernández Villena', 4, 1),
(334, 'Jesús', 'Escudero Fernández', 4, 1),
(335, 'Juan José', 'Negrín Alfonso', 4, 1),
(336, 'David', 'De Diego Viñas', 4, 1),
(337, 'Manuela', 'Carnero Rico', 5, 1),
(338, 'Jesús', 'López Reig', 3, 1),
(339, 'José Antonio', 'Jurado Megias', 4, 1),
(340, 'Patricia', 'Alonso Rodrigo', 7, 1),
(341, 'Ignacio', 'Caballero Jaén', 7, 1),
(342, 'Jesús', 'Pujol Cruz', 5, 1),
(343, 'Albert', 'Pérez Flores', 3, 1),
(344, 'Diego', 'Arco Fernández', 7, 1),
(345, 'María', 'Llanos Pereira', 8, 1),
(346, 'Ana', 'Ruiz Andrés', 7, 1),
(347, 'Ángeles', 'Morales Hernández', 7, 1),
(348, 'Antonio', 'Guerrero Mena', 8, 1),
(349, 'Santiago', 'Artiles Moraga', 3, 1),
(350, 'Miguel', 'Lafuente Saborido', 8, 1),
(351, 'Isabel', 'Ruiz Grande', 5, 1),
(352, 'Pablo', 'García Solís', 8, 1),
(353, 'Adrián', 'Pérez Sanz', 4, 1),
(354, 'María', 'Fernández Romero', 5, 1),
(355, 'Pablo', 'Salvador Gómez', 6, 1),
(356, 'Pilar', 'Rodríguez Sastre', 8, 1),
(357, 'Marc', 'Luque Barrios', 7, 1),
(358, 'Elena', 'Ramírez Muñoz', 8, 1),
(359, 'Elena', 'Delgado González', 10, 1),
(360, 'Marc', 'Romero Jiménez', 9, 1),
(361, 'José Manuel', 'Palau González', 3, 1),
(362, 'Dolores', 'Moreno Nieves', 4, 1),
(363, 'María', 'Carreras Ruiz', 9, 1),
(364, 'María Carmen', 'Puertas Granero', 7, 1),
(365, 'Manuela', 'Alonso Cruz', 9, 1),
(366, 'Mercedes', 'Ruiz Romero', 9, 1),
(367, 'Miguel', 'Ramos Ortega', 4, 1),
(368, 'Emilio', 'Morales Martínez', 6, 1),
(369, 'Francisco José', 'García Antolín', 5, 1),
(370, 'María Jesús', 'Melian Villar', 8, 1),
(371, 'Francisco', 'Salgado Duran', 3, 1),
(372, 'Carmen', 'Álvarez Arce', 4, 1),
(373, 'José', 'Nicolau López', 7, 1),
(374, 'José', 'Lara Álvarez', 9, 1),
(375, 'Francisco', 'Vergara Bermúdez', 4, 1),
(376, 'Laura', 'Patiño Domínguez', 9, 1),
(377, 'Miguel Ángel', 'Palenzuela Giner', 6, 1),
(378, 'Juan José', 'González Carrero', 6, 1),
(379, 'Diego', 'Peral Vázquez', 6, 1),
(380, 'Antonio', 'Sevillano Frías', 3, 1),
(381, 'José', 'Rodríguez García', 4, 1),
(382, 'María Pilar', 'Bustamante Gaspar', 6, 1),
(383, 'Juan', 'Samper García', 4, 1),
(384, 'Isabel', 'Lorenzo Navas', 6, 1),
(385, 'Roberto', 'Aparicio Casado', 6, 1),
(386, 'María Isabel', 'Gago García', 9, 1),
(387, 'María Rosario', 'Mendizábal Huertas', 9, 1),
(388, 'Francisco', 'Martin Martínez', 4, 1),
(389, 'José Antonio', 'Martínez González', 7, 1),
(390, 'Vicente', 'Pastor Muñoz', 7, 1),
(391, 'Jesús', 'Rodríguez Martínez', 5, 1),
(392, 'Alejandro', 'Rodríguez Marco', 5, 1),
(393, 'José', 'Luna Corral', 7, 1),
(394, 'Encarnación', 'Pulido Martínez', 3, 1),
(395, 'Miguel', 'Rojas Rodríguez', 7, 1),
(396, 'María Isabel', 'Galindo Recio', 8, 1),
(397, 'Irene', 'Martínez Pérez', 9, 1),
(398, 'Lucia', 'García Cruz', 8, 1),
(399, 'Adrián', 'Gallego Diez', 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `plazas` int(11) NOT NULL,
  `grupos` int(11) NOT NULL,
  `itinerario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `nombre`, `plazas`, `grupos`, `itinerario_id`) VALUES
(1, 'Primero', 28, 4, 1),
(2, 'Segundo', 25, 4, 1),
(3, 'Tercero', 25, 3, 1),
(4, 'Cuarto', 24, 3, 1),
(5, 'Primero', 22, 2, 2),
(6, 'Segundo', 20, 2, 2),
(7, 'Primero', 25, 1, 3),
(8, 'Segundo', 20, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `itinerarios`
--

CREATE TABLE `itinerarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `itinerarios`
--

INSERT INTO `itinerarios` (`id`, `nombre`) VALUES
(1, 'Enseñanza Secundaria Obligatoria'),
(2, 'Bachillerato'),
(3, 'Ciclo Formativo Grado Superior');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `curso` (`curso_id`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `itinerario` (`itinerario_id`);

--
-- Indices de la tabla `itinerarios`
--
ALTER TABLE `itinerarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=400;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `itinerarios`
--
ALTER TABLE `itinerarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`);

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `cursos_ibfk_1` FOREIGN KEY (`itinerario_id`) REFERENCES `itinerarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
