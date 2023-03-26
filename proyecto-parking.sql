-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 25-11-2021 a las 02:28:05
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto-parking`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `espacios`
--

CREATE TABLE `espacios` (
  `idespacio` int(11) NOT NULL,
  `nomespacio` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `espacios`
--

INSERT INTO `espacios` (`idespacio`, `nomespacio`, `descripcion`, `estado`) VALUES
(1, 'E1', 'Primer espacio', '1'),
(2, 'E2', 'Segundo espacio', '0'),
(3, 'E3', 'Tercer espacio', '0'),
(4, 'E4', 'Cuarto espacio', '0'),
(5, 'E5', 'Quinto espacio', '0'),
(6, 'E6', 'Sexto espacio', '0'),
(7, 'E7', 'Setimo espacio', '0'),
(8, 'E8', 'Octavo espacio', '0'),
(9, 'E9', 'Noveno espacio', '0'),
(10, 'E10', 'Decimo espacio', '0'),
(11, 'E11', 'Onceavo espacio', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `idreserva` int(11) NOT NULL,
  `idespacio` int(11) NOT NULL,
  `idusuario` int(11) UNSIGNED NOT NULL,
  `fecha_reserva` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_ingreso` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_salida` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idvehiculo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`idreserva`, `idespacio`, `idusuario`, `fecha_reserva`, `fecha_ingreso`, `fecha_salida`, `estado`, `idvehiculo`) VALUES
(1, 2, 4, '2021-10-26', '16:07:24', '17:04:36', '0', 2),
(2, 3, 6, '2021-10-26', '16:11:30', '17:04:32', '0', 4),
(3, 4, 7, '2021-10-26', '16:18:06', '16:44:39', '0', 6),
(4, 5, 5, '2021-10-26', '16:35:19', '17:32:12', '0', 3),
(5, 5, 4, '2021-10-26', '17:34:41', '19:20:09', '0', 2),
(6, 8, 9, '2021-10-26', '17:34:48', '18:04:39', '0', 8),
(7, 10, 10, '2021-10-26', '17:36:46', '18:04:56', '0', 9),
(8, 7, 12, '2021-10-26', '18:04:51', '21:31:48', '0', 10),
(9, 3, 7, '2021-10-26', '18:48:17', '20:29:18', '0', 6),
(10, 4, 5, '2021-10-26', '18:48:24', '19:21:13', '0', 3),
(11, 9, 9, '2021-10-26', '19:20:04', '19:22:08', '0', 8),
(12, 2, 8, '2021-10-26', '19:21:03', '21:31:45', '0', 7),
(13, 10, 9, '2021-10-26', '19:22:14', '20:29:23', '0', 8),
(14, 9, 10, '2021-10-26', '21:04:50', '21:31:51', '0', 9),
(15, 4, 3, '2021-10-26', '21:04:58', '21:31:55', '0', 1),
(16, 10, 6, '2021-10-26', '21:05:07', '21:31:58', '0', 4),
(17, 11, 5, '2021-10-26', '21:05:14', '21:32:01', '0', 3),
(18, 2, 12, '2021-10-27', '19:41:33', '18:43:14', '0', 10),
(19, 1, 3, '2021-11-24', '18:50:04', NULL, '1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idrole` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `descripcion` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idrole`, `role`, `descripcion`) VALUES
(1, 0, 'Administrador'),
(2, 1, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `img` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `lastname`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `img`) VALUES
(1, 0, 'Luis', 'Merino Marce', 'lamerinom@unac.edu.pe', NULL, '$2y$10$YLITX7M5dET8/qhOHVqBX.AgELhPeDnOQlPyT.8xXuTSzHxH2h9by', 'vt5Khx4JtlyTNGyyBHJU6roFB93ipJ1rJrdtGUD6hy6jX9QoYy6DXpiYmoCT', '2021-06-10 04:57:55', '2021-10-07 00:20:38', '1633548038.jpg'),
(2, 1, 'Juan', 'Vega', 'juanvega@gmail.com', NULL, '$2y$10$xDNjPeExE.2Zy3tzqpqPuOvvJ3pwBovxDAtJSoMlTvptbKNF6AyUi', NULL, '2021-06-10 05:02:02', '2021-10-07 04:47:43', '1633564063.jpg'),
(3, 1, 'Luis Augusto', 'Agúero Martinez', 'laaguerom@unac.edu.pe', NULL, '$2y$10$wHSwEjFO5oDudzVTy/fwiedwsElv4c/vrn21My8K9YMWaujXDUngC', NULL, '2021-10-27 00:46:10', '2021-10-27 00:46:10', NULL),
(4, 1, 'Rolando', 'Alva Chacon', 'ralvac@unac.edu.pe', NULL, '$2y$10$QD4eosC7psxj88dAter17O2n4eMcPxktxXKyPtC3E7hUR3FQWD17K', NULL, '2021-10-27 00:48:00', '2021-10-27 00:48:00', NULL),
(5, 1, 'Luis Alexander', 'Angulo Barrena', 'laangulob@unac.edu.pe', NULL, '$2y$10$SkJnE6G8fOHDQTvmOqwPfu3pmE1fZvuhSCswsL7/2CUeZfSER98KK', NULL, '2021-10-27 00:50:15', '2021-10-27 00:50:15', NULL),
(6, 1, 'Manuel Nicolaz', 'Baltazar Watson', 'mnbaltazarw@unac.edu.pe', NULL, '$2y$10$sDzsKGc8v.jWmZK04V5.pecnjvSEuRabkJ/c0jhIUJYWec4GXnE2C', NULL, '2021-10-27 00:51:17', '2021-10-27 00:51:17', NULL),
(7, 1, 'Jose Francisco', 'Basurto Milla', 'jfbasurtom@unac.edu.pe', NULL, '$2y$10$ItQC4Oy6dx7O/.lkGCHGw.9eIMVqzlxQ.8ZNhiTH6ib7nPFRerIH6', NULL, '2021-10-27 00:52:12', '2021-10-27 00:52:12', NULL),
(8, 1, 'Jhon Gustavo', 'Bello Cruz', 'jgbelloc@unac.edu.pe', NULL, '$2y$10$9l2KzuLflx24QdeJBb61Ku66XaklSu1TlU8NDoPP6dEE9y9.rIKP6', NULL, '2021-10-27 03:11:53', '2021-10-27 03:11:53', NULL),
(9, 1, 'Carlos Alberto', 'Benites Garcia', 'cabenitesg@unac.edu.pe', NULL, '$2y$10$ckQALdyhidJHYZZgYHuf8eW8Eotg8W5m.GQwUKQvGZEWnsZl9TK9q', NULL, '2021-10-27 03:16:49', '2021-10-27 03:16:49', NULL),
(10, 1, 'Maria del Carmen', 'Boza Polo Leon', 'mcbozapl@unac.edu.pe', NULL, '$2y$10$v5jz33a5jWQhkXNzPxYKFOqwjf5AChzDLvz/X8zh1UJUZRw8.Be5S', NULL, '2021-10-27 03:22:20', '2021-10-27 03:22:20', NULL),
(11, 1, 'Jhan Carlos', 'Bran Reyes', 'jcbranr@unac.edu.pe', NULL, '$2y$10$XPXtO9TxmIIJF9fTF8dkkei8U3WCqjI6EmplGa1VJfTmrdmGNjwxi', NULL, '2021-10-27 03:29:04', '2021-10-27 03:29:04', NULL),
(12, 1, 'Gerson Luis', 'Cabrejos Ibañez', 'glcabrejosi@unac.edu.pe', NULL, '$2y$10$C6L8YU42fVKoGDr6fl/9q.ZT0X5gaP8ALJR1FvRQXMj0hdUtuEpIC', NULL, '2021-10-27 03:31:45', '2021-10-27 03:31:45', NULL),
(13, 1, 'Carlos Daniel', 'Aguilar Herrera', 'cdaguillarh@unac.edu.pe', NULL, '$2y$10$FDNXikaTMzVltTGzditYBu5FcXv0yxa.3PUTdl6Bm7MxebLdh7qfC', NULL, '2021-11-18 03:59:14', '2021-11-18 03:59:14', NULL),
(14, 1, 'Junior Anderson', 'Aguilar Rodriguez', 'jaaguilarr@unac.edu.pe', NULL, '$2y$10$.CRM1bsuPBqOZWCRo8NbyOzSK2vFQAKE4VZW7N/vfRGUKSaTlg7gS', NULL, '2021-11-18 04:00:01', '2021-11-18 04:00:01', NULL),
(15, 1, 'Luighy Edison', 'Aguilara Chavez', 'leaguilarac@unac.edu.pe', NULL, '$2y$10$ITF7gCU5oEjnSd/00uxd3uT6qdlC7lc497SbLOvdfLFGfymCtmf12', NULL, '2021-11-18 04:00:58', '2021-11-18 04:00:58', NULL),
(16, 1, 'Martin Junior', 'Aime Laura', 'mjaimel@unac.edu.pe', NULL, '$2y$10$GIO.yCkJZD15BsF87r.aBeabrGEIkTLkN8JAxhGn4VSNf9lWAd8Eu', NULL, '2021-11-18 04:01:40', '2021-11-18 04:01:40', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id_veh` int(11) NOT NULL,
  `placa_veh` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `propietario_veh` int(11) UNSIGNED NOT NULL,
  `marca_veh` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_veh` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_veh` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id_veh`, `placa_veh`, `propietario_veh`, `marca_veh`, `color_veh`, `img_veh`) VALUES
(1, '9457-KA', 3, 'Zongshen', 'Negro', '1635280130.jpg'),
(2, 'A3R-417', 4, 'Volswagen', 'Plata', '1635280294.jpg'),
(3, 'A6A-080', 5, 'Fiat', 'Verde Savage', '1635280386.jpg'),
(4, 'CIF-555', 6, 'Toyota', 'Blanco', '1635280460.jpg'),
(5, 'IQ-2122', 6, 'Mazda', 'Rojo', '1635280502.jpg'),
(6, 'F8D-495', 7, 'Toyota-Avanza', 'Gris metalico', '1635280561.png'),
(7, 'A8Q-594', 8, 'Peugeot', 'Rojo metalico', '1635286730.jpg'),
(8, 'AMO-633', 9, 'Hyundai', 'Plata metalizado', '1635286805.jpg'),
(9, 'ACS-040', 10, 'Volskwagen Gol', 'Gris', '1635287299.jpg'),
(10, 'ASF-611', 12, 'Toyota', 'Negro mica', '1635287601.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `espacios`
--
ALTER TABLE `espacios`
  ADD PRIMARY KEY (`idespacio`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`idreserva`),
  ADD KEY `fk_reservas_espacios` (`idespacio`),
  ADD KEY `fk_reservas_users` (`idusuario`),
  ADD KEY `fk_reservas_vehiculos` (`idvehiculo`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idrole`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id_veh`),
  ADD KEY `fk_vehiculos_users` (`propietario_veh`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `espacios`
--
ALTER TABLE `espacios`
  MODIFY `idespacio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `idreserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idrole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id_veh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `fk_reservas_espacios` FOREIGN KEY (`idespacio`) REFERENCES `espacios` (`idespacio`),
  ADD CONSTRAINT `fk_reservas_users` FOREIGN KEY (`idusuario`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_reservas_vehiculos` FOREIGN KEY (`idvehiculo`) REFERENCES `vehiculos` (`id_veh`);

--
-- Filtros para la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `fk_vehiculos_users` FOREIGN KEY (`propietario_veh`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
