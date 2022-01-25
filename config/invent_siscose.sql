-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-01-2022 a las 18:29:34
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `invent_siscose`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departaments`
--

CREATE TABLE `departaments` (
  `id_dep` int(11) NOT NULL,
  `name_dep` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `description_dep` varchar(3000) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `departaments`
--

INSERT INTO `departaments` (`id_dep`, `name_dep`, `description_dep`) VALUES
(1, 'Gerencia', 'Gerente general'),
(2, 'Informatica', 'Departamento de Informatica'),
(3, 'Recursos Humanos', 'Departamento de RRHH'),
(4, 'Deportes', 'Departamento de Deportes'),
(5, 'Contaduria', 'Departamento de Contaduria'),
(6, 'Marketing y ventas', 'Departamento de Marketing y ventas'),
(7, 'Diseño grafico', 'Departamento de Diseño grafico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipment_computer`
--

CREATE TABLE `equipment_computer` (
  `id_equipcomp` int(11) NOT NULL,
  `code_equipcomp` varchar(3000) COLLATE utf8mb4_spanish_ci NOT NULL,
  `model_equipcomp` varchar(3000) COLLATE utf8mb4_spanish_ci NOT NULL,
  `marca_equipcomp` varchar(3000) COLLATE utf8mb4_spanish_ci NOT NULL,
  `color_equipcomp` varchar(3000) COLLATE utf8mb4_spanish_ci NOT NULL,
  `qrcode_equipcomp` varchar(300) COLLATE utf8mb4_spanish_ci NOT NULL,
  `type_equipcomp` int(11) NOT NULL,
  `status_equipcomp` int(11) NOT NULL,
  `departament_equipcomp` int(11) DEFAULT NULL,
  `create_equipcomp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipment_type`
--

CREATE TABLE `equipment_type` (
  `id_equipmenttype` int(11) NOT NULL,
  `name_equipmenttype` varchar(3000) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `equipment_type`
--

INSERT INTO `equipment_type` (`id_equipmenttype`, `name_equipmenttype`) VALUES
(1, 'Monitor'),
(2, 'laptop'),
(3, 'CPU'),
(6, 'Tablet');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maintenance_equipment`
--

CREATE TABLE `maintenance_equipment` (
  `id_maintenance` int(11) NOT NULL,
  `equip_maintenance` int(11) NOT NULL,
  `descri_maintenance` varchar(3000) COLLATE utf8mb4_spanish_ci NOT NULL,
  `depart_maintenance` int(11) NOT NULL,
  `tecnico_maintenance` int(11) NOT NULL,
  `date_asignation` timestamp NULL DEFAULT NULL,
  `progress_maintenance` varchar(5) COLLATE utf8mb4_spanish_ci NOT NULL,
  `create_maintenance` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `request_equipment`
--

CREATE TABLE `request_equipment` (
  `id_request` int(11) NOT NULL,
  `descrip_request` varchar(3000) COLLATE utf8mb4_spanish_ci NOT NULL,
  `status_request` int(11) NOT NULL,
  `user_request` int(11) NOT NULL,
  `create_request` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rols`
--

CREATE TABLE `rols` (
  `id_rols` int(11) NOT NULL,
  `name_rols` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `type_rols` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `rols`
--

INSERT INTO `rols` (`id_rols`, `name_rols`, `type_rols`) VALUES
(1, 'administrador', 1),
(2, 'tecnico', 2),
(3, 'usuario', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status_equipment`
--

CREATE TABLE `status_equipment` (
  `id_statusequip` int(11) NOT NULL,
  `name_statusequip` varchar(3000) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `status_equipment`
--

INSERT INTO `status_equipment` (`id_statusequip`, `name_statusequip`) VALUES
(1, 'activo'),
(2, 'dañado'),
(4, 'mantenimiento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status_request`
--

CREATE TABLE `status_request` (
  `id_statusreques` int(11) NOT NULL,
  `name_statusreques` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `status_request`
--

INSERT INTO `status_request` (`id_statusreques`, `name_statusreques`) VALUES
(1, 'En espera'),
(2, 'Asignado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` varchar(300) COLLATE utf8mb4_spanish_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `rol_user` int(11) NOT NULL,
  `description_user` int(11) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `delete_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `name`, `lastname`, `email`, `password`, `phone`, `status`, `rol_user`, `description_user`, `create_at`, `delete_at`) VALUES
(1, 'admin', 'gerencia', 'admin@gerencia.com', 'admin', '041212345678', 1, 1, 1, '2021-11-24 22:30:29', '2021-11-25 03:28:59');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departaments`
--
ALTER TABLE `departaments`
  ADD PRIMARY KEY (`id_dep`);

--
-- Indices de la tabla `equipment_computer`
--
ALTER TABLE `equipment_computer`
  ADD PRIMARY KEY (`id_equipcomp`),
  ADD UNIQUE KEY `code_equipcomp` (`code_equipcomp`) USING HASH,
  ADD KEY `type_equipcomp` (`type_equipcomp`),
  ADD KEY `status_equipcomp` (`status_equipcomp`),
  ADD KEY `departament_equipcomp` (`departament_equipcomp`);

--
-- Indices de la tabla `equipment_type`
--
ALTER TABLE `equipment_type`
  ADD PRIMARY KEY (`id_equipmenttype`),
  ADD UNIQUE KEY `name_equipmenttype` (`name_equipmenttype`) USING HASH;

--
-- Indices de la tabla `maintenance_equipment`
--
ALTER TABLE `maintenance_equipment`
  ADD PRIMARY KEY (`id_maintenance`),
  ADD KEY `equip_maintenance` (`equip_maintenance`),
  ADD KEY `depart_maintenance` (`depart_maintenance`),
  ADD KEY `tecnico_maintenance` (`tecnico_maintenance`);

--
-- Indices de la tabla `request_equipment`
--
ALTER TABLE `request_equipment`
  ADD PRIMARY KEY (`id_request`),
  ADD KEY `user_request` (`user_request`),
  ADD KEY `status_request` (`status_request`);

--
-- Indices de la tabla `rols`
--
ALTER TABLE `rols`
  ADD PRIMARY KEY (`id_rols`);

--
-- Indices de la tabla `status_equipment`
--
ALTER TABLE `status_equipment`
  ADD PRIMARY KEY (`id_statusequip`);

--
-- Indices de la tabla `status_request`
--
ALTER TABLE `status_request`
  ADD PRIMARY KEY (`id_statusreques`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `rol_users` (`rol_user`),
  ADD KEY `description_user` (`description_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `departaments`
--
ALTER TABLE `departaments`
  MODIFY `id_dep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `equipment_computer`
--
ALTER TABLE `equipment_computer`
  MODIFY `id_equipcomp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `equipment_type`
--
ALTER TABLE `equipment_type`
  MODIFY `id_equipmenttype` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `maintenance_equipment`
--
ALTER TABLE `maintenance_equipment`
  MODIFY `id_maintenance` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `request_equipment`
--
ALTER TABLE `request_equipment`
  MODIFY `id_request` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `rols`
--
ALTER TABLE `rols`
  MODIFY `id_rols` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `status_equipment`
--
ALTER TABLE `status_equipment`
  MODIFY `id_statusequip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `status_request`
--
ALTER TABLE `status_request`
  MODIFY `id_statusreques` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `equipment_computer`
--
ALTER TABLE `equipment_computer`
  ADD CONSTRAINT `equipment_computer_ibfk_1` FOREIGN KEY (`status_equipcomp`) REFERENCES `status_equipment` (`id_statusequip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `equipment_computer_ibfk_2` FOREIGN KEY (`type_equipcomp`) REFERENCES `equipment_type` (`id_equipmenttype`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `equipment_computer_ibfk_3` FOREIGN KEY (`departament_equipcomp`) REFERENCES `departaments` (`id_dep`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `maintenance_equipment`
--
ALTER TABLE `maintenance_equipment`
  ADD CONSTRAINT `maintenance_equipment_ibfk_1` FOREIGN KEY (`equip_maintenance`) REFERENCES `equipment_computer` (`id_equipcomp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `maintenance_equipment_ibfk_2` FOREIGN KEY (`depart_maintenance`) REFERENCES `departaments` (`id_dep`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `maintenance_equipment_ibfk_3` FOREIGN KEY (`tecnico_maintenance`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `request_equipment`
--
ALTER TABLE `request_equipment`
  ADD CONSTRAINT `request_equipment_ibfk_1` FOREIGN KEY (`status_request`) REFERENCES `status_request` (`id_statusreques`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `request_equipment_ibfk_2` FOREIGN KEY (`user_request`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`rol_user`) REFERENCES `rols` (`id_rols`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`description_user`) REFERENCES `departaments` (`id_dep`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
