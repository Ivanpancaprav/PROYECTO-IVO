-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: mysql
-- Tiempo de generación: 22-02-2023 a las 07:17:26
-- Versión del servidor: 8.0.32
-- Versión de PHP: 8.0.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ivo_backend`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id_cita` int UNSIGNED NOT NULL,
  `fecha_creacion` date NOT NULL,
  `fecha_fin` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `especialidad` enum('radiografia','analitica','oncologia') COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni_paciente` varchar(9) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dni_medico` varchar(9) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contiene_medicamentos`
--

CREATE TABLE `contiene_medicamentos` (
  `id_contiene_medicamentos` bigint UNSIGNED NOT NULL,
  `n_historia` int UNSIGNED NOT NULL,
  `id_medicamento` int UNSIGNED NOT NULL,
  `dosis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_receta` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `comentario` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `contiene_medicamentos`
--

INSERT INTO `contiene_medicamentos` (`id_contiene_medicamentos`, `n_historia`, `id_medicamento`, `dosis`, `fecha_receta`, `fecha_fin`, `comentario`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2 pastillas', '2023-02-21', '2024-02-21', NULL, NULL, NULL),
(2, 1, 1, '2 pastillas', '2023-02-21', '2024-02-21', 'las pastillas es 1 cada 8 hora', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion_historias`
--

CREATE TABLE `gestion_historias` (
  `n_gestion_historias` bigint UNSIGNED NOT NULL,
  `dni_medico` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `n_historia` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `gestion_historias`
--

INSERT INTO `gestion_historias` (`n_gestion_historias`, `dni_medico`, `n_historia`, `created_at`, `updated_at`) VALUES
(1, 'medicos', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historias_clinicas`
--

CREATE TABLE `historias_clinicas` (
  `n_historia` int UNSIGNED NOT NULL,
  `tratamiento` enum('emergencia','consulta','hospitalizacion','medicina','oncologia','cirugia','traumatologia') COLLATE utf8mb4_unicode_ci NOT NULL,
  `progreso` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_fin` date DEFAULT NULL,
  `fecha_inicio` date NOT NULL,
  `dni_paciente` varchar(9) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `historias_clinicas`
--

INSERT INTO `historias_clinicas` (`n_historia`, `tratamiento`, `progreso`, `fecha_fin`, `fecha_inicio`, `dni_paciente`, `created_at`, `updated_at`) VALUES
(1, 'consulta', 'a morido', NULL, '2023-02-15', 'pacientes', '2023-02-21 12:20:57', '2023-02-21 12:20:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informes`
--

CREATE TABLE `informes` (
  `id_informe` int UNSIGNED NOT NULL,
  `observaciones` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_creacion` date NOT NULL,
  `tipo_informe` enum('radiografia','analitica') COLLATE utf8mb4_unicode_ci NOT NULL,
  `n_historia` int UNSIGNED NOT NULL,
  `dni_medico` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentos`
--

CREATE TABLE `medicamentos` (
  `id_medicamento` int UNSIGNED NOT NULL,
  `nombre` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad` int NOT NULL,
  `fecha_creacion` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `medicamentos`
--

INSERT INTO `medicamentos` (`id_medicamento`, `nombre`, `cantidad`, `fecha_creacion`, `created_at`, `updated_at`) VALUES
(1, 'diazpeman', 10, '1999-11-19', '2023-02-21 12:19:54', '2023-02-21 12:19:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentos_recetados`
--

CREATE TABLE `medicamentos_recetados` (
  `id_receta` bigint UNSIGNED NOT NULL,
  `dni_medico` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_medicamento` int UNSIGNED NOT NULL,
  `fecha_receta` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `dni_medico` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `especialidad` enum('radiologo','medico') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `n_colegiado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`dni_medico`, `especialidad`, `created_at`, `updated_at`, `n_colegiado`) VALUES
('medico', 'medico', '2023-02-21 12:38:16', '2023-02-21 12:38:16', '1411'),
('medicos', 'medico', '2023-02-21 12:20:18', '2023-02-21 12:20:18', '21313');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0_01_18_092454_create_users_table', 1),
(2, '0_01_18_092521_create_medicos_table', 1),
(3, '0_01_18_092536_create_paciente_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(6, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(7, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(8, '2016_06_01_000004_create_oauth_clients_table', 1),
(9, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(10, '2019_08_19_000000_create_failed_jobs_table', 1),
(11, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(12, '2023_01_16_082108_create__citas_table', 1),
(13, '2023_01_16_082134_create__historias_clinicas_table', 1),
(14, '2023_01_16_082201_create__medicamentos_table', 1),
(15, '2023_01_16_082220_create__informes_table', 1),
(16, '2023_01_16_082550_create__gestion__historias_table', 1),
(17, '2023_01_16_082633_create__conteniene__medicamento__table', 1),
(18, '2023_01_16_082739_creat__medicamentos_recetados_table', 1),
(19, '2023_02_15_082603_create_pertenece_informe', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('18360abf10259f619c166b3f9549d970902bb739e728dcdddbb257ac888e12ede6bf8b7b304dafb6', 'medico', 1, 'MyApp', '[]', 0, '2023-02-21 12:52:03', '2023-02-21 12:52:03', '2024-02-21 12:52:03'),
('8ced1afe45dd9981fd95a026a59fbe208bb7519ef0ff9c7f1f08f172a42b7f7cbf84983e41337cb6', 'medico', 1, 'MyApp', '[]', 0, '2023-02-22 07:13:54', '2023-02-22 07:13:54', '2024-02-22 07:13:54'),
('a3c715e4e17e364711182650dd494f56a64d787480e4db0e70f5ec12d727b4f40de63eb8be2b3e0c', 'medico', 1, 'MyApp', '[]', 0, '2023-02-21 12:40:06', '2023-02-21 12:40:06', '2024-02-21 12:40:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'ejl26KpHtJIOYO4fekLqLyx9vyon9XbmIgU0NUKo', NULL, 'http://localhost', 1, 0, 0, '2023-02-21 12:40:03', '2023-02-21 12:40:03'),
(2, NULL, 'Laravel Password Grant Client', 'XLpIOTlfO7o6ymSLwihT1QcE4Jyxh17j6yJAlu7L', 'users', 'http://localhost', 0, 1, 0, '2023-02-21 12:40:03', '2023-02-21 12:40:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-02-21 12:40:03', '2023-02-21 12:40:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `dni_paciente` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `n_seguridad_social` int NOT NULL,
  `n_historial_clinico` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`dni_paciente`, `n_seguridad_social`, `n_historial_clinico`, `created_at`, `updated_at`) VALUES
('pacientes', 123123, 12312, '2023-02-21 12:19:38', '2023-02-21 12:19:38');

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
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pertenece_informe`
--

CREATE TABLE `pertenece_informe` (
  `fecha` date NOT NULL,
  `id_informe` int UNSIGNED NOT NULL,
  `n_historia` int UNSIGNED NOT NULL,
  `id_pertenece_informe` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `dni` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido1` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellido2` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `sexo` enum('femenino','masculino') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('user','paciente','radiologo','medico','administrador') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `fecha_nacimiento` date DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`dni`, `nombre`, `apellido1`, `apellido2`, `direccion`, `foto`, `email`, `email_verified_at`, `sexo`, `role`, `fecha_nacimiento`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
('medico', 'medico', 'medico', NULL, 'medico', '21_02_2023_12_38_16_descarga.png', 'medico@medico.com', NULL, 'masculino', 'medico', '2023-02-22', '$2y$10$dbyAbizn/6v/yzjYZyR9Ze9GQE.CO7O3DFceAM/cz0U49i2A5LLyq', NULL, '2023-02-21 12:38:16', '2023-02-21 12:38:16'),
('medicos', 'medicos', 'medicos', NULL, 'medicos', '21_02_2023_12_20_18_descarga.png', 'medicosmedicos', NULL, 'masculino', 'medico', '2023-02-25', '$2y$10$shLdxw7A8Hk7xFNhrNTUDeZC1/1WeYaXTx6umemaO.OHOPmF16ErO', NULL, '2023-02-21 12:20:18', '2023-02-21 12:20:18'),
('pacientes', 'pacientes', 'pacientes', 'pacientes', 'pacientes', '21_02_2023_12_19_38_descarga.png', 'pacientespacientes', NULL, 'masculino', 'paciente', '2023-03-09', '$2y$10$W2ftKX3Pezllfxefb86Dd.E9TRdHr2VxAasiC7tdn8k.5TH9ncnxG', NULL, '2023-02-21 12:19:38', '2023-02-21 12:19:38');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id_cita`),
  ADD KEY `citas_dni_paciente_foreign` (`dni_paciente`),
  ADD KEY `citas_dni_medico_foreign` (`dni_medico`);

--
-- Indices de la tabla `contiene_medicamentos`
--
ALTER TABLE `contiene_medicamentos`
  ADD PRIMARY KEY (`id_contiene_medicamentos`),
  ADD KEY `contiene_medicamentos_n_historia_foreign` (`n_historia`),
  ADD KEY `contiene_medicamentos_id_medicamento_foreign` (`id_medicamento`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `gestion_historias`
--
ALTER TABLE `gestion_historias`
  ADD PRIMARY KEY (`n_gestion_historias`),
  ADD KEY `gestion_historias_dni_medico_foreign` (`dni_medico`),
  ADD KEY `gestion_historias_n_historia_foreign` (`n_historia`);

--
-- Indices de la tabla `historias_clinicas`
--
ALTER TABLE `historias_clinicas`
  ADD PRIMARY KEY (`n_historia`),
  ADD KEY `historias_clinicas_dni_paciente_foreign` (`dni_paciente`);

--
-- Indices de la tabla `informes`
--
ALTER TABLE `informes`
  ADD PRIMARY KEY (`id_informe`),
  ADD KEY `informes_dni_medico_foreign` (`dni_medico`),
  ADD KEY `informes_n_historia_foreign` (`n_historia`);

--
-- Indices de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  ADD PRIMARY KEY (`id_medicamento`);

--
-- Indices de la tabla `medicamentos_recetados`
--
ALTER TABLE `medicamentos_recetados`
  ADD PRIMARY KEY (`id_receta`),
  ADD KEY `medicamentos_recetados_id_medicamento_foreign` (`id_medicamento`),
  ADD KEY `medicamentos_recetados_dni_medico_foreign` (`dni_medico`);

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`dni_medico`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indices de la tabla `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indices de la tabla `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indices de la tabla `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`dni_paciente`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `pertenece_informe`
--
ALTER TABLE `pertenece_informe`
  ADD PRIMARY KEY (`id_pertenece_informe`),
  ADD KEY `pertenece_informe_n_historia_foreign` (`n_historia`),
  ADD KEY `pertenece_informe_id_informe_foreign` (`id_informe`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`dni`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id_cita` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contiene_medicamentos`
--
ALTER TABLE `contiene_medicamentos`
  MODIFY `id_contiene_medicamentos` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `gestion_historias`
--
ALTER TABLE `gestion_historias`
  MODIFY `n_gestion_historias` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `historias_clinicas`
--
ALTER TABLE `historias_clinicas`
  MODIFY `n_historia` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `informes`
--
ALTER TABLE `informes`
  MODIFY `id_informe` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  MODIFY `id_medicamento` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `medicamentos_recetados`
--
ALTER TABLE `medicamentos_recetados`
  MODIFY `id_receta` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pertenece_informe`
--
ALTER TABLE `pertenece_informe`
  MODIFY `id_pertenece_informe` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_dni_medico_foreign` FOREIGN KEY (`dni_medico`) REFERENCES `medicos` (`dni_medico`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `citas_dni_paciente_foreign` FOREIGN KEY (`dni_paciente`) REFERENCES `pacientes` (`dni_paciente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `contiene_medicamentos`
--
ALTER TABLE `contiene_medicamentos`
  ADD CONSTRAINT `contiene_medicamentos_id_medicamento_foreign` FOREIGN KEY (`id_medicamento`) REFERENCES `medicamentos` (`id_medicamento`),
  ADD CONSTRAINT `contiene_medicamentos_n_historia_foreign` FOREIGN KEY (`n_historia`) REFERENCES `historias_clinicas` (`n_historia`);

--
-- Filtros para la tabla `gestion_historias`
--
ALTER TABLE `gestion_historias`
  ADD CONSTRAINT `gestion_historias_dni_medico_foreign` FOREIGN KEY (`dni_medico`) REFERENCES `medicos` (`dni_medico`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gestion_historias_n_historia_foreign` FOREIGN KEY (`n_historia`) REFERENCES `historias_clinicas` (`n_historia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `historias_clinicas`
--
ALTER TABLE `historias_clinicas`
  ADD CONSTRAINT `historias_clinicas_dni_paciente_foreign` FOREIGN KEY (`dni_paciente`) REFERENCES `pacientes` (`dni_paciente`);

--
-- Filtros para la tabla `informes`
--
ALTER TABLE `informes`
  ADD CONSTRAINT `informes_dni_medico_foreign` FOREIGN KEY (`dni_medico`) REFERENCES `medicos` (`dni_medico`),
  ADD CONSTRAINT `informes_n_historia_foreign` FOREIGN KEY (`n_historia`) REFERENCES `historias_clinicas` (`n_historia`);

--
-- Filtros para la tabla `medicamentos_recetados`
--
ALTER TABLE `medicamentos_recetados`
  ADD CONSTRAINT `medicamentos_recetados_dni_medico_foreign` FOREIGN KEY (`dni_medico`) REFERENCES `medicos` (`dni_medico`),
  ADD CONSTRAINT `medicamentos_recetados_id_medicamento_foreign` FOREIGN KEY (`id_medicamento`) REFERENCES `medicamentos` (`id_medicamento`);

--
-- Filtros para la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD CONSTRAINT `medicos_dni_medico_foreign` FOREIGN KEY (`dni_medico`) REFERENCES `users` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `pacientes_dni_paciente_foreign` FOREIGN KEY (`dni_paciente`) REFERENCES `users` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pertenece_informe`
--
ALTER TABLE `pertenece_informe`
  ADD CONSTRAINT `pertenece_informe_id_informe_foreign` FOREIGN KEY (`id_informe`) REFERENCES `informes` (`id_informe`),
  ADD CONSTRAINT `pertenece_informe_n_historia_foreign` FOREIGN KEY (`n_historia`) REFERENCES `historias_clinicas` (`n_historia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
