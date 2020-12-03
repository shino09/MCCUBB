-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 23, 2017 at 06:29 
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MAGISTERUBB`
--
CREATE DATABASE IF NOT EXISTS `MAGISTERUBB` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `MAGISTERUBB`;

-- --------------------------------------------------------

--
-- Table structure for table `ALUMNO`
--

CREATE TABLE `ALUMNO` (
  `id` varchar(100) NOT NULL,
  `ALU_NOMBRES` varchar(100) DEFAULT NULL,
  `ALU_PATERNO` varchar(100) DEFAULT NULL,
  `ALU_MATERNO` varchar(100) DEFAULT NULL,
  `ALU_EMAIL` varchar(100) DEFAULT NULL,
  `ALU_TITULO` varchar(100) DEFAULT NULL,
  `ALU_GRADO` varchar(100) DEFAULT NULL,
  `ALU_TELEFONO` int(11) DEFAULT NULL,
  `ALU_PUNTAJE` int(11) DEFAULT NULL,
  `ALU_ESTADO` int(11) DEFAULT NULL,
  `UNIVERSIDAD_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ALU_ANOINGRESO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ASISTE`
--

CREATE TABLE `ASISTE` (
  `CONGRESO_id` int(11) NOT NULL,
  `id` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `BENEFICIO`
--

CREATE TABLE `BENEFICIO` (
  `id` int(11) NOT NULL,
  `BEN_NOMBRE` varchar(100) DEFAULT NULL,
  `BEN_DESCRIPCION` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `CODIRIGE`
--

CREATE TABLE `CODIRIGE` (
  `id` int(10) UNSIGNED NOT NULL,
  `PROFESOR_id` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `COLABORADOR`
--

CREATE TABLE `COLABORADOR` (
  `id` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `CONFORMAN`
--

CREATE TABLE `CONFORMAN` (
  `TRIBUNAL_id` int(11) NOT NULL,
  `id` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `CON_tipoprofesor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `CONGRESO`
--

CREATE TABLE `CONGRESO` (
  `id` int(11) NOT NULL,
  `CON_NOMBRE` varchar(100) DEFAULT NULL,
  `CON_CIUDAD` varchar(100) DEFAULT NULL,
  `CON_ANO` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `CONGRESO2`
--

CREATE TABLE `CONGRESO2` (
  `CON_NOMBRE` varchar(100) NOT NULL,
  `CON_CIUDAD` varchar(100) NOT NULL,
  `CON_ANO` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `DEPARTAMENTO`
--

CREATE TABLE `DEPARTAMENTO` (
  `id` int(11) NOT NULL,
  `DEP_NOMBRE` varchar(100) DEFAULT NULL,
  `DEP_FACULTAD` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `DIRECTOR`
--

CREATE TABLE `DIRECTOR` (
  `id` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `DIRIGE`
--

CREATE TABLE `DIRIGE` (
  `id` int(10) UNSIGNED NOT NULL,
  `NUCLEO_id` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `EVALUA`
--

CREATE TABLE `EVALUA` (
  `id` int(10) UNSIGNED NOT NULL,
  `TRIBUNAL_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `EVA_NOTADIRIGEINFORME` float NOT NULL,
  `EVA_NOTAPROFESOR1INFORME` float NOT NULL,
  `EVA_NOTAPROFESOR2INFORME` float NOT NULL,
  `EVA_NOTAPROFESOR3INFORME` float NOT NULL,
  `EVA_NOTADIRIGEEXPOSICION` float NOT NULL,
  `EVA_NOTAPROFESOR1EXPOSICION` float NOT NULL,
  `EVA_NOTAPROFESOR2EXPOSICION` float NOT NULL,
  `EVA_NOTAPROFESOR3EXPOSICION` float NOT NULL,
  `EVA_NOTAFINALINFORME` float NOT NULL,
  `EVA_NOTAFINALEXPOSICION` float NOT NULL,
  `EVA_NOTAFINAL` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `NUCLEO`
--

CREATE TABLE `NUCLEO` (
  `id` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ORIENTA`
--

CREATE TABLE `ORIENTA` (
  `id` varchar(100) NOT NULL,
  `ALUMNO_id` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `PARTICIPA`
--

CREATE TABLE `PARTICIPA` (
  `TALLER_id` int(11) NOT NULL,
  `id` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('bambasten9@gmail.com', '6594c140b621b06a9e96045806810d1bef5f69583e84c34f329af2454112db15', '2016-12-16 04:54:31');

-- --------------------------------------------------------

--
-- Table structure for table `POSEE`
--

CREATE TABLE `POSEE` (
  `BENEFICIO_id` int(11) NOT NULL,
  `id` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `PRESENTA`
--

CREATE TABLE `PRESENTA` (
  `SOLICITUD_id` int(11) NOT NULL,
  `id` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `PROFESOR`
--

CREATE TABLE `PROFESOR` (
  `id` varchar(100) NOT NULL,
  `PRO_NOMBRES` varchar(100) DEFAULT NULL,
  `PRO_PATERNO` varchar(100) DEFAULT NULL,
  `PRO_MATERNO` varchar(100) DEFAULT NULL,
  `PRO_EMAIL` varchar(100) DEFAULT NULL,
  `PRO_TITULO` varchar(100) DEFAULT NULL,
  `PRO_GRADO` varchar(100) DEFAULT NULL,
  `PRO_TELEFONO` int(11) DEFAULT NULL,
  `DEPARTAMENTO_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `PUBLICA`
--

CREATE TABLE `PUBLICA` (
  `REVISTA_id` int(11) NOT NULL,
  `id` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `REVISTA`
--

CREATE TABLE `REVISTA` (
  `id` int(11) NOT NULL,
  `REV_NOMBRE` varchar(100) DEFAULT NULL,
  `REV_ANO` int(11) DEFAULT NULL,
  `REV_DESCRIPCION` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `SOLICITUD`
--

CREATE TABLE `SOLICITUD` (
  `id` int(11) NOT NULL,
  `SOL_NOMBRE` varchar(100) DEFAULT NULL,
  `SOL_ANO` int(11) DEFAULT NULL,
  `SOL_DESCRIPCION` varchar(100) DEFAULT NULL,
  `SOL_SEMESTRE` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `TALLER`
--

CREATE TABLE `TALLER` (
  `id` int(11) NOT NULL,
  `TAL_NOMBRE` varchar(100) DEFAULT NULL,
  `TAL_ANO` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `TESIS`
--

CREATE TABLE `TESIS` (
  `id` int(10) UNSIGNED NOT NULL,
  `TES_NOMBRE` varchar(500) DEFAULT NULL,
  `TES_DESCRIPCION` varchar(1000) DEFAULT NULL,
  `TES_ANO` int(11) DEFAULT NULL,
  `TES_SEMESTRE` int(11) DEFAULT NULL,
  `TES_NOTA` float DEFAULT NULL,
  `TES_FECHAINICIO` date DEFAULT NULL,
  `TES_FECHAFINAL` date DEFAULT NULL,
  `TES_ESTADO` varchar(45) DEFAULT NULL,
  `ALUMNO_id` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `TIENE`
--

CREATE TABLE `TIENE` (
  `TRABAJO_id` int(11) NOT NULL,
  `id` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `TRABAJO`
--

CREATE TABLE `TRABAJO` (
  `id` int(11) NOT NULL,
  `TRA_NOMBRE` varchar(100) DEFAULT NULL,
  `TRA_CIUDAD` varchar(100) DEFAULT NULL,
  `TRA_EMPRESA` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `TRIBUNAL`
--

CREATE TABLE `TRIBUNAL` (
  `id` int(11) NOT NULL,
  `TRI_FECHACREACION` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `UNIVERSIDAD`
--

CREATE TABLE `UNIVERSIDAD` (
  `id` int(11) NOT NULL,
  `UNI_NOMBRE` varchar(100) DEFAULT NULL,
  `UNI_CIUDAD` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rut` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tipoUsuario` int(11) NOT NULL,
  `APELLIDOPATERNO` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `APELLIDOMATERNO` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `rut`, `password`, `email`, `remember_token`, `created_at`, `updated_at`, `tipoUsuario`, `APELLIDOPATERNO`, `APELLIDOMATERNO`, `deleted_at`) VALUES
(56, 'admin', '17.801.781-0', '$2y$10$GVLPv.e2kJiPWwj/GxHSxu9ev1MvC4qFd4tqP4FRnToKGQZK82Kma', 'magisterfaceubb@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'admin', 'admin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `USUARIO`
--

CREATE TABLE `USUARIO` (
  `USU_ID` int(11) NOT NULL,
  `USU_RUT` varchar(13) DEFAULT NULL,
  `USU_NOMBRE` varchar(100) DEFAULT NULL,
  `USU_EMAIL` varchar(100) DEFAULT NULL,
  `USU_PASSWORD` varchar(100) DEFAULT NULL,
  `USU_TIPOUSUARIO` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `VISITANTE`
--

CREATE TABLE `VISITANTE` (
  `VIS_UNIVERSIDAD` varchar(100) DEFAULT NULL,
  `VIS_PAIS` varchar(45) DEFAULT NULL,
  `id` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ALUMNO`
--
ALTER TABLE `ALUMNO`
  ADD PRIMARY KEY (`id`,`UNIVERSIDAD_id`),
  ADD UNIQUE KEY `PRO_RUT_UNIQUE` (`id`),
  ADD KEY `fk_ALUMNO_UNIVERSIDAD1_idx` (`UNIVERSIDAD_id`);

--
-- Indexes for table `ASISTE`
--
ALTER TABLE `ASISTE`
  ADD PRIMARY KEY (`CONGRESO_id`,`id`),
  ADD KEY `fk_ASISTE_CONGRESO1_idx` (`CONGRESO_id`),
  ADD KEY `fk_ASISTE_ALUMNO1_idx` (`id`);

--
-- Indexes for table `BENEFICIO`
--
ALTER TABLE `BENEFICIO`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `CON_ID_UNIQUE` (`id`);

--
-- Indexes for table `CODIRIGE`
--
ALTER TABLE `CODIRIGE`
  ADD PRIMARY KEY (`id`,`PROFESOR_id`),
  ADD KEY `fk_CO-DIRIGE_PROFESOR1_idx` (`PROFESOR_id`);

--
-- Indexes for table `COLABORADOR`
--
ALTER TABLE `COLABORADOR`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `CONFORMAN`
--
ALTER TABLE `CONFORMAN`
  ADD PRIMARY KEY (`TRIBUNAL_id`,`id`),
  ADD KEY `fk_CONFORMAN_PROFESOR1_idx` (`id`);

--
-- Indexes for table `CONGRESO`
--
ALTER TABLE `CONGRESO`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `CON_ID_UNIQUE` (`id`);

--
-- Indexes for table `CONGRESO2`
--
ALTER TABLE `CONGRESO2`
  ADD PRIMARY KEY (`CON_NOMBRE`,`CON_CIUDAD`,`CON_ANO`);

--
-- Indexes for table `DEPARTAMENTO`
--
ALTER TABLE `DEPARTAMENTO`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `DEP_ID_UNIQUE` (`id`);

--
-- Indexes for table `DIRECTOR`
--
ALTER TABLE `DIRECTOR`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `DIRIGE`
--
ALTER TABLE `DIRIGE`
  ADD PRIMARY KEY (`id`,`NUCLEO_id`),
  ADD KEY `fk_DIRIGE_TESIS1_idx` (`id`),
  ADD KEY `fk_DIRIGE_NUCLEO1_idx` (`NUCLEO_id`);

--
-- Indexes for table `EVALUA`
--
ALTER TABLE `EVALUA`
  ADD PRIMARY KEY (`id`,`TRIBUNAL_id`),
  ADD KEY `fk_EVALUA_TESIS1_idx` (`id`),
  ADD KEY `fk_EVALUA_TRIBUNAL1_idx` (`TRIBUNAL_id`);

--
-- Indexes for table `NUCLEO`
--
ALTER TABLE `NUCLEO`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ORIENTA`
--
ALTER TABLE `ORIENTA`
  ADD PRIMARY KEY (`id`,`ALUMNO_id`),
  ADD KEY `fk_ORIENTA_ALUMNO1_idx` (`ALUMNO_id`);

--
-- Indexes for table `PARTICIPA`
--
ALTER TABLE `PARTICIPA`
  ADD PRIMARY KEY (`TALLER_id`,`id`),
  ADD KEY `fk_PARTICIPA_TALLER1_idx` (`TALLER_id`),
  ADD KEY `fk_PARTICIPA_ALUMNO1_idx` (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_rut_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `POSEE`
--
ALTER TABLE `POSEE`
  ADD PRIMARY KEY (`BENEFICIO_id`,`id`),
  ADD KEY `fk_POSEE_BENEFICIO1_idx` (`BENEFICIO_id`),
  ADD KEY `fk_POSEE_ALUMNO1_idx` (`id`);

--
-- Indexes for table `PRESENTA`
--
ALTER TABLE `PRESENTA`
  ADD PRIMARY KEY (`SOLICITUD_id`,`id`),
  ADD KEY `fk_PRESENTA_SOLICITUD1_idx` (`SOLICITUD_id`),
  ADD KEY `fk_PRESENTA_ALUMNO1_idx` (`id`);

--
-- Indexes for table `PROFESOR`
--
ALTER TABLE `PROFESOR`
  ADD PRIMARY KEY (`id`,`DEPARTAMENTO_id`),
  ADD UNIQUE KEY `PRO_RUT_UNIQUE` (`id`),
  ADD KEY `fk_PROFESOR_DEPARTAMENTO1_idx` (`DEPARTAMENTO_id`);

--
-- Indexes for table `PUBLICA`
--
ALTER TABLE `PUBLICA`
  ADD PRIMARY KEY (`REVISTA_id`,`id`),
  ADD KEY `fk_PUBLICA_REVISTA1_idx` (`REVISTA_id`),
  ADD KEY `fk_PUBLICA_ALUMNO1_idx` (`id`);

--
-- Indexes for table `REVISTA`
--
ALTER TABLE `REVISTA`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `CON_ID_UNIQUE` (`id`);

--
-- Indexes for table `SOLICITUD`
--
ALTER TABLE `SOLICITUD`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `CON_ID_UNIQUE` (`id`);

--
-- Indexes for table `TALLER`
--
ALTER TABLE `TALLER`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `CON_ID_UNIQUE` (`id`);

--
-- Indexes for table `TESIS`
--
ALTER TABLE `TESIS`
  ADD PRIMARY KEY (`id`,`ALUMNO_id`),
  ADD KEY `fk_TESIS_ALUMNO1_idx` (`ALUMNO_id`);

--
-- Indexes for table `TIENE`
--
ALTER TABLE `TIENE`
  ADD PRIMARY KEY (`TRABAJO_id`,`id`),
  ADD KEY `fk_TIENE_TRABAJO1_idx` (`TRABAJO_id`),
  ADD KEY `fk_TIENE_ALUMNO1_idx` (`id`);

--
-- Indexes for table `TRABAJO`
--
ALTER TABLE `TRABAJO`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `CON_ID_UNIQUE` (`id`);

--
-- Indexes for table `TRIBUNAL`
--
ALTER TABLE `TRIBUNAL`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `PRO_RUT_UNIQUE` (`id`);

--
-- Indexes for table `UNIVERSIDAD`
--
ALTER TABLE `UNIVERSIDAD`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `CON_ID_UNIQUE` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_rut_unique` (`rut`);

--
-- Indexes for table `USUARIO`
--
ALTER TABLE `USUARIO`
  ADD PRIMARY KEY (`USU_ID`),
  ADD UNIQUE KEY `USU_ID_UNIQUE` (`USU_ID`);

--
-- Indexes for table `VISITANTE`
--
ALTER TABLE `VISITANTE`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `BENEFICIO`
--
ALTER TABLE `BENEFICIO`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `CONGRESO`
--
ALTER TABLE `CONGRESO`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `DEPARTAMENTO`
--
ALTER TABLE `DEPARTAMENTO`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `REVISTA`
--
ALTER TABLE `REVISTA`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `SOLICITUD`
--
ALTER TABLE `SOLICITUD`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `TALLER`
--
ALTER TABLE `TALLER`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `TESIS`
--
ALTER TABLE `TESIS`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `TRABAJO`
--
ALTER TABLE `TRABAJO`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `TRIBUNAL`
--
ALTER TABLE `TRIBUNAL`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
--
-- AUTO_INCREMENT for table `UNIVERSIDAD`
--
ALTER TABLE `UNIVERSIDAD`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `USUARIO`
--
ALTER TABLE `USUARIO`
  MODIFY `USU_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ALUMNO`
--
ALTER TABLE `ALUMNO`
  ADD CONSTRAINT `fk_ALUMNO_UNIVERSIDAD1` FOREIGN KEY (`UNIVERSIDAD_id`) REFERENCES `UNIVERSIDAD` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ASISTE`
--
ALTER TABLE `ASISTE`
  ADD CONSTRAINT `fk_ASISTE_ALUMNO1` FOREIGN KEY (`id`) REFERENCES `ALUMNO` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ASISTE_CONGRESO1` FOREIGN KEY (`CONGRESO_id`) REFERENCES `CONGRESO` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `CODIRIGE`
--
ALTER TABLE `CODIRIGE`
  ADD CONSTRAINT `fk_CO-DIRIGE_PROFESOR1` FOREIGN KEY (`PROFESOR_id`) REFERENCES `PROFESOR` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_COORDINA_TESIS1` FOREIGN KEY (`id`) REFERENCES `TESIS` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `COLABORADOR`
--
ALTER TABLE `COLABORADOR`
  ADD CONSTRAINT `fk_COLABORADOR_PROFESOR1` FOREIGN KEY (`id`) REFERENCES `PROFESOR` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `CONFORMAN`
--
ALTER TABLE `CONFORMAN`
  ADD CONSTRAINT `fk_CONFORMAN_PROFESOR1` FOREIGN KEY (`id`) REFERENCES `PROFESOR` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Conforman_TRIBUNAL1` FOREIGN KEY (`TRIBUNAL_id`) REFERENCES `TRIBUNAL` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `DIRECTOR`
--
ALTER TABLE `DIRECTOR`
  ADD CONSTRAINT `fk_DIRECTOR_PROFESOR1` FOREIGN KEY (`id`) REFERENCES `PROFESOR` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `DIRIGE`
--
ALTER TABLE `DIRIGE`
  ADD CONSTRAINT `fk_DIRIGE_NUCLEO1` FOREIGN KEY (`NUCLEO_id`) REFERENCES `NUCLEO` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_DIRIGE_TESIS1` FOREIGN KEY (`id`) REFERENCES `TESIS` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `EVALUA`
--
ALTER TABLE `EVALUA`
  ADD CONSTRAINT `fk_EVALUA_TESIS1` FOREIGN KEY (`id`) REFERENCES `TESIS` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_EVALUA_TRIBUNAL1` FOREIGN KEY (`TRIBUNAL_id`) REFERENCES `TRIBUNAL` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `NUCLEO`
--
ALTER TABLE `NUCLEO`
  ADD CONSTRAINT `fk_NUCLEO_PROFESOR1` FOREIGN KEY (`id`) REFERENCES `PROFESOR` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ORIENTA`
--
ALTER TABLE `ORIENTA`
  ADD CONSTRAINT `fk_ORIENTA_ALUMNO1` FOREIGN KEY (`ALUMNO_id`) REFERENCES `ALUMNO` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ORIENTA_PROFESOR1` FOREIGN KEY (`id`) REFERENCES `PROFESOR` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `PARTICIPA`
--
ALTER TABLE `PARTICIPA`
  ADD CONSTRAINT `fk_PARTICIPA_ALUMNO1` FOREIGN KEY (`id`) REFERENCES `ALUMNO` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_PARTICIPA_TALLER1` FOREIGN KEY (`TALLER_id`) REFERENCES `TALLER` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `POSEE`
--
ALTER TABLE `POSEE`
  ADD CONSTRAINT `fk_POSEE_ALUMNO1` FOREIGN KEY (`id`) REFERENCES `ALUMNO` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_POSEE_BENEFICIO1` FOREIGN KEY (`BENEFICIO_id`) REFERENCES `BENEFICIO` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `PRESENTA`
--
ALTER TABLE `PRESENTA`
  ADD CONSTRAINT `fk_PRESENTA_ALUMNO1` FOREIGN KEY (`id`) REFERENCES `ALUMNO` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_PRESENTA_SOLICITUD1` FOREIGN KEY (`SOLICITUD_id`) REFERENCES `SOLICITUD` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `PROFESOR`
--
ALTER TABLE `PROFESOR`
  ADD CONSTRAINT `fk_PROFESOR_DEPARTAMENTO1` FOREIGN KEY (`DEPARTAMENTO_id`) REFERENCES `DEPARTAMENTO` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `PUBLICA`
--
ALTER TABLE `PUBLICA`
  ADD CONSTRAINT `fk_PUBLICA_ALUMNO1` FOREIGN KEY (`id`) REFERENCES `ALUMNO` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_PUBLICA_REVISTA1` FOREIGN KEY (`REVISTA_id`) REFERENCES `REVISTA` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `TESIS`
--
ALTER TABLE `TESIS`
  ADD CONSTRAINT `fk_TESIS_ALUMNO1` FOREIGN KEY (`ALUMNO_id`) REFERENCES `ALUMNO` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `TIENE`
--
ALTER TABLE `TIENE`
  ADD CONSTRAINT `fk_TIENE_ALUMNO1` FOREIGN KEY (`id`) REFERENCES `ALUMNO` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_TIENE_TRABAJO1` FOREIGN KEY (`TRABAJO_id`) REFERENCES `TRABAJO` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `VISITANTE`
--
ALTER TABLE `VISITANTE`
  ADD CONSTRAINT `fk_VISITANTES_PROFESOR1` FOREIGN KEY (`id`) REFERENCES `PROFESOR` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
