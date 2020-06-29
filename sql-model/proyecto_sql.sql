-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-06-2020 a las 07:47:03
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `usuario` varchar(500) NOT NULL,
  `contrasena` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `usuario`, `contrasena`) VALUES
(1, 'Fer', '123'),
(2, 'Fer 2 xD', '1234'),
(3, 'Usuario 1', 'Password 1'),
(4, 'Usuario 2', 'Password 2'),
(5, 'Usuario 3', 'Password 3'),
(6, 'Usuario 4', 'Password 4'),
(7, 'Usuario 5', 'Password 5'),
(8, 'Usuario 6', 'Password 6'),
(9, 'Usuario 7', 'Password 7'),
(10, 'Usuario 8', 'Password 8'),
(11, 'Usuario 9', 'Password 9'),
(12, 'Usuario 10', 'Password 10'),
(13, 'Usuario 11', 'Password 11'),
(14, 'Usuario 12', 'Password 12'),
(15, 'Usuario 13', 'Password 13'),
(16, 'Usuario 14', 'Password 14'),
(17, 'Usuario 15', 'Password 15'),
(18, 'Usuario 16', 'Password 16'),
(19, 'Usuario 17', 'Password 17'),
(20, 'Usuario 18', 'Password 18'),
(21, 'Usuario 19', 'Password 19'),
(22, 'Usuario 20', 'Password 20'),
(23, 'Usuario 21', 'Password 21'),
(24, 'Usuario 22', 'Password 22'),
(25, 'Usuario 23', 'Password 23'),
(26, 'Usuario 24', 'Password 24'),
(27, 'Usuario 25', 'Password 25'),
(28, 'Usuario 26', 'Password 26'),
(29, 'Usuario 27', 'Password 27'),
(30, 'Usuario 28', 'Password 28'),
(31, 'Usuario 29', 'Password 29'),
(32, 'Usuario 30', 'Password 30'),
(33, 'Usuario 31', 'Password 31'),
(34, 'Usuario 32', 'Password 32'),
(35, 'Usuario 33', 'Password 33'),
(36, 'Usuario 34', 'Password 34'),
(37, 'Usuario 35', 'Password 35'),
(38, 'Usuario 36', 'Password 36'),
(39, 'Usuario 37', 'Password 37'),
(40, 'Usuario 38', 'Password 38'),
(41, 'Usuario 39', 'Password 39'),
(42, 'Usuario 40', 'Password 40'),
(43, 'Usuario 41', 'Password 41'),
(44, 'Usuario 42', 'Password 42'),
(45, 'Usuario 43', 'Password 43'),
(46, 'Usuario 44', 'Password 44'),
(47, 'Usuario 45', 'Password 45'),
(48, 'Usuario 46', 'Password 46'),
(49, 'Usuario 47', 'Password 47'),
(50, 'Usuario 48', 'Password 48'),
(51, 'Usuario 49', 'Password 49'),
(52, 'Usuario 50', 'Password 50'),
(53, 'Usuario 51', 'Password 51'),
(54, 'Usuario 52', 'Password 52'),
(55, 'Usuario 53', 'Password 53'),
(56, 'Usuario 54', 'Password 54'),
(57, 'Usuario 55', 'Password 55'),
(58, 'Usuario 56', 'Password 56'),
(59, 'Usuario 57', 'Password 57'),
(60, 'Usuario 58', 'Password 58'),
(61, 'Usuario 59', 'Password 59'),
(62, 'Usuario 60', 'Password 60'),
(63, 'Usuario 61', 'Password 61'),
(64, 'Usuario 62', 'Password 62'),
(65, 'Usuario 63', 'Password 63'),
(66, 'Usuario 64', 'Password 64'),
(67, 'Usuario 65', 'Password 65'),
(68, 'Usuario 66', 'Password 66'),
(69, 'Usuario 67', 'Password 67'),
(70, 'Usuario 68', 'Password 68'),
(71, 'Usuario 69', 'Password 69'),
(72, 'Usuario 70', 'Password 70'),
(73, 'Usuario 71', 'Password 71'),
(74, 'Usuario 72', 'Password 72'),
(75, 'Usuario 73', 'Password 73'),
(76, 'Usuario 74', 'Password 74'),
(77, 'Usuario 75', 'Password 75'),
(78, 'Usuario 76', 'Password 76'),
(79, 'Usuario 77', 'Password 77'),
(80, 'Usuario 78', 'Password 78'),
(81, 'Usuario 79', 'Password 79'),
(82, 'Usuario 80', 'Password 80'),
(83, 'Usuario 81', 'Password 81'),
(84, 'Usuario 82', 'Password 82'),
(85, 'Usuario 83', 'Password 83'),
(86, 'Usuario 84', 'Password 84'),
(87, 'Usuario 85', 'Password 85'),
(88, 'Usuario 86', 'Password 86'),
(89, 'Usuario 87', 'Password 87'),
(90, 'Usuario 88', 'Password 88'),
(91, 'Usuario 89', 'Password 89'),
(92, 'Usuario 90', 'Password 90'),
(93, 'Usuario 91', 'Password 91'),
(94, 'Usuario 92', 'Password 92'),
(95, 'Usuario 93', 'Password 93'),
(96, 'Usuario 94', 'Password 94'),
(97, 'Usuario 95', 'Password 95'),
(98, 'Usuario 96', 'Password 96'),
(99, 'Usuario 97', 'Password 97'),
(100, 'Usuario 98', 'Password 98'),
(101, 'Usuario 99', 'Password 99'),
(102, 'Usuario 100', 'Password 100'),
(103, 'Usuario 101', 'Password 101'),
(104, 'Usuario 102', 'Password 102'),
(105, 'Usuario 103', 'Password 103'),
(106, 'Usuario 104', 'Password 104'),
(107, 'Usuario 105', 'Password 105'),
(108, 'Usuario 106', 'Password 106'),
(109, 'Usuario 107', 'Password 107'),
(110, 'Usuario 108', 'Password 108'),
(111, 'Usuario 109', 'Password 109'),
(112, 'Usuario 110', 'Password 110'),
(113, 'Usuario 111', 'Password 111'),
(114, 'Usuario 112', 'Password 112'),
(115, 'Usuario 113', 'Password 113'),
(116, 'Usuario 114', 'Password 114'),
(117, 'Usuario 115', 'Password 115');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
