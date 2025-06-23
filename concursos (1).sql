-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Jun-2025 às 05:38
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `concursos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comissao_recepcao`
--

CREATE TABLE `comissao_recepcao` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `concurso_id` bigint(20) UNSIGNED NOT NULL,
  `membro_juri_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `comissao_recepcao`
--

INSERT INTO `comissao_recepcao` (`id`, `concurso_id`, `membro_juri_id`, `created_at`, `updated_at`) VALUES
(28, 21, 181, NULL, NULL),
(29, 21, 118, NULL, NULL),
(30, 21, 191, NULL, NULL),
(73, 37, 200, NULL, NULL),
(74, 37, 151, NULL, NULL),
(75, 37, 77, NULL, NULL),
(76, 37, 40, NULL, NULL),
(77, 37, 191, NULL, NULL),
(78, 39, 151, NULL, NULL),
(79, 39, 200, NULL, NULL),
(80, 39, 125, NULL, NULL),
(81, 39, 8, NULL, NULL),
(82, 39, 114, NULL, NULL),
(83, 42, 34, NULL, NULL),
(84, 42, 169, NULL, NULL),
(85, 42, 114, NULL, NULL),
(86, 43, 55, NULL, NULL),
(87, 43, 41, NULL, NULL),
(88, 43, 191, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `competencias`
--

CREATE TABLE `competencias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `competencias`
--

INSERT INTO `competencias` (`id`, `descricao`, `created_at`, `updated_at`) VALUES
(1, 'pharmacist', NULL, NULL),
(2, 'Medical Doctor', NULL, NULL),
(3, 'Nurse', NULL, NULL),
(4, 'HR', NULL, NULL),
(5, 'TB LAB COORDINATOR', NULL, NULL),
(6, 'Head of socio-behavioral unit', NULL, NULL),
(7, 'Lab Tech-PBMC lab', NULL, NULL),
(8, 'CISPOC Director', NULL, NULL),
(9, 'Lab Tech-PBMC lab', NULL, NULL),
(10, 'CISPOC Director', NULL, NULL),
(11, 'Medical officer', NULL, NULL),
(12, 'Study coordinator', NULL, NULL),
(13, 'Biologist', NULL, NULL),
(14, 'General Practitioner', NULL, NULL),
(15, 'Maputo city Delegate', NULL, NULL),
(16, 'Lab Tech', NULL, NULL),
(17, 'Admin Tech', NULL, NULL),
(18, 'Cleaner', NULL, NULL),
(19, 'Lab Quality', NULL, NULL),
(20, 'Commuinication Officer', NULL, NULL),
(21, 'Data Manager', NULL, NULL),
(22, 'Driver', NULL, NULL),
(23, 'CO-PI', NULL, NULL),
(24, 'DAF-INS-DELEGACAO', NULL, NULL),
(25, 'Parasitology lab tech2', NULL, NULL),
(26, 'Lab Tech-Serology Lab', NULL, NULL),
(27, 'Chefe UGEA', NULL, NULL),
(28, 'Accountant', NULL, NULL),
(29, 'Principal Investigator', NULL, NULL),
(30, 'Ginecologista', NULL, NULL),
(31, 'CO-Investigadora', NULL, NULL),
(32, 'Patologista', NULL, NULL),
(33, 'Investigator', NULL, NULL),
(34, 'Patrimonio', NULL, NULL),
(35, 'Data Clerk', NULL, NULL),
(36, 'Interviewers', NULL, NULL),
(37, 'enumarator', NULL, NULL),
(38, 'Health Tech', NULL, NULL),
(39, 'Receptionist', NULL, NULL),
(40, 'Social Activist ', NULL, NULL),
(41, 'Project Manager', NULL, NULL),
(42, 'Quality Manager ', NULL, NULL),
(43, 'Interviewers', NULL, NULL),
(44, 'Research Assistant', NULL, NULL),
(45, 'Procurement ', NULL, NULL),
(46, 'Activist', NULL, NULL),
(47, 'Counsellor', NULL, NULL),
(48, 'Monitor', NULL, NULL),
(49, 'QA/QC', NULL, NULL),
(50, 'Gestor de Projecto', NULL, NULL),
(51, 'Recruiment', NULL, NULL),
(52, 'obras', '2024-07-05 06:34:36', '2024-07-05 06:34:36'),
(54, 'UGEA', '2024-11-12 10:05:07', '2024-11-12 10:05:07');

-- --------------------------------------------------------

--
-- Estrutura da tabela `competencias_concurso`
--

CREATE TABLE `competencias_concurso` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `concurso_id` bigint(20) UNSIGNED NOT NULL,
  `competencia_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `competencias_concurso`
--

INSERT INTO `competencias_concurso` (`id`, `concurso_id`, `competencia_id`, `created_at`, `updated_at`) VALUES
(21, 21, 35, NULL, NULL),
(37, 37, 35, NULL, NULL),
(39, 39, 35, NULL, NULL),
(42, 42, 22, NULL, NULL),
(43, 43, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `competencias_membro`
--

CREATE TABLE `competencias_membro` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `membro_id` bigint(20) UNSIGNED NOT NULL,
  `competencia_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `competencias_membro`
--

INSERT INTO `competencias_membro` (`id`, `membro_id`, `competencia_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 2, NULL, NULL),
(3, 3, 3, NULL, NULL),
(4, 4, 4, NULL, NULL),
(6, 6, 5, NULL, NULL),
(7, 7, 2, NULL, NULL),
(8, 8, 6, NULL, NULL),
(9, 9, 10, NULL, NULL),
(11, 11, 1, NULL, NULL),
(12, 12, 11, NULL, NULL),
(14, 14, 13, NULL, NULL),
(15, 15, 3, NULL, NULL),
(16, 16, 15, NULL, NULL),
(17, 17, 13, NULL, NULL),
(18, 18, 13, NULL, NULL),
(19, 19, 14, NULL, NULL),
(20, 20, 16, NULL, NULL),
(21, 21, 17, NULL, NULL),
(22, 22, 18, NULL, NULL),
(23, 23, 2, NULL, NULL),
(24, 24, 2, NULL, NULL),
(25, 25, 16, NULL, NULL),
(26, 26, 2, NULL, NULL),
(27, 27, 14, NULL, NULL),
(28, 29, 19, NULL, NULL),
(30, 30, 21, NULL, NULL),
(31, 31, 13, NULL, NULL),
(32, 32, 12, NULL, NULL),
(33, 33, 13, NULL, NULL),
(34, 34, 22, NULL, NULL),
(36, 36, 16, NULL, NULL),
(37, 37, 2, NULL, NULL),
(38, 38, 23, NULL, NULL),
(39, 39, 24, NULL, NULL),
(40, 41, 2, NULL, NULL),
(41, 42, 13, NULL, NULL),
(42, 44, 25, NULL, NULL),
(43, 45, 26, NULL, NULL),
(44, 46, 2, NULL, NULL),
(45, 47, 16, NULL, NULL),
(46, 48, 27, NULL, NULL),
(47, 49, 3, NULL, NULL),
(48, 50, 3, NULL, NULL),
(49, 51, 3, NULL, NULL),
(50, 52, 3, NULL, NULL),
(51, 53, 3, NULL, NULL),
(52, 54, 2, NULL, NULL),
(53, 55, 2, NULL, NULL),
(54, 56, 18, NULL, NULL),
(55, 57, 18, NULL, NULL),
(56, 58, 18, NULL, NULL),
(57, 59, 3, NULL, NULL),
(58, 60, 3, NULL, NULL),
(59, 62, 3, NULL, NULL),
(60, 63, 3, NULL, NULL),
(61, 85, 11, NULL, NULL),
(62, 86, 1, NULL, NULL),
(63, 60, 3, NULL, NULL),
(64, 62, 3, NULL, NULL),
(65, 63, 3, NULL, NULL),
(66, 85, 11, NULL, NULL),
(67, 86, 1, NULL, NULL),
(68, 87, 2, NULL, NULL),
(69, 88, 3, NULL, NULL),
(70, 90, 2, NULL, NULL),
(71, 91, 38, NULL, NULL),
(72, 92, 28, NULL, NULL),
(73, 93, 16, NULL, NULL),
(74, 94, 16, NULL, NULL),
(75, 95, 16, NULL, NULL),
(76, 96, 29, NULL, NULL),
(77, 97, 2, NULL, NULL),
(78, 96, 29, NULL, NULL),
(79, 97, 2, NULL, NULL),
(80, 98, 16, NULL, NULL),
(81, 99, 16, NULL, NULL),
(82, 100, 30, NULL, NULL),
(83, 101, 30, NULL, NULL),
(84, 102, 30, NULL, NULL),
(85, 103, 31, NULL, NULL),
(86, 104, 32, NULL, NULL),
(87, 105, 32, NULL, NULL),
(88, 106, 32, NULL, NULL),
(89, 107, 33, NULL, NULL),
(90, 108, 16, NULL, NULL),
(91, 109, 11, NULL, NULL),
(92, 110, 11, NULL, NULL),
(93, 111, 16, NULL, NULL),
(94, 112, 16, NULL, NULL),
(95, 113, 16, NULL, NULL),
(96, 114, 34, NULL, NULL),
(97, 115, 18, NULL, NULL),
(98, 116, 35, NULL, NULL),
(99, 117, 13, NULL, NULL),
(100, 118, 35, NULL, NULL),
(101, 119, 44, NULL, NULL),
(102, 120, 36, NULL, NULL),
(103, 121, 35, NULL, NULL),
(104, 122, 38, NULL, NULL),
(105, 123, 37, NULL, NULL),
(106, 124, 3, NULL, NULL),
(107, 125, 37, NULL, NULL),
(108, 126, 48, NULL, NULL),
(109, 127, 39, NULL, NULL),
(110, 128, 40, NULL, NULL),
(111, 129, 41, NULL, NULL),
(113, 131, 1, NULL, NULL),
(114, 132, 45, NULL, NULL),
(115, 133, 42, NULL, NULL),
(116, 134, 39, NULL, NULL),
(117, 135, 39, NULL, NULL),
(119, 137, 37, NULL, NULL),
(120, 138, 36, NULL, NULL),
(133, 139, 48, NULL, NULL),
(134, 140, 3, NULL, NULL),
(135, 141, 12, NULL, NULL),
(136, 142, 49, NULL, NULL),
(138, 143, 50, NULL, NULL),
(139, 144, 51, NULL, NULL),
(140, 145, 3, NULL, NULL),
(141, 146, 18, NULL, NULL),
(142, 147, 37, NULL, NULL),
(143, 148, 37, NULL, NULL),
(144, 149, 39, NULL, NULL),
(145, 150, 35, NULL, NULL),
(146, 151, 35, NULL, NULL),
(147, 152, 37, NULL, NULL),
(148, 153, 35, NULL, NULL),
(149, 154, 37, NULL, NULL),
(150, 155, 22, NULL, NULL),
(151, 156, 47, NULL, NULL),
(152, 157, 22, NULL, NULL),
(153, 158, 44, NULL, NULL),
(154, 159, 2, NULL, NULL),
(160, 160, 2, NULL, NULL),
(161, 161, 3, NULL, NULL),
(162, 162, 45, NULL, NULL),
(163, 163, 37, NULL, NULL),
(164, 164, 45, NULL, NULL),
(165, 165, 16, NULL, NULL),
(166, 166, 22, NULL, NULL),
(167, 167, 37, NULL, NULL),
(168, 168, 46, NULL, NULL),
(169, 169, 22, NULL, NULL),
(170, 170, 28, NULL, NULL),
(171, 171, 18, NULL, NULL),
(172, 172, 16, NULL, NULL),
(173, 173, 16, NULL, NULL),
(174, 174, 13, NULL, NULL),
(175, 175, 47, NULL, NULL),
(176, 176, 13, NULL, NULL),
(177, 177, 47, NULL, NULL),
(178, 178, 37, NULL, NULL),
(179, 179, 16, NULL, NULL),
(180, 180, 37, NULL, NULL),
(182, 182, 38, NULL, NULL),
(183, 182, 31, NULL, NULL),
(184, 183, 47, NULL, NULL),
(185, 184, 22, NULL, NULL),
(186, 185, 3, NULL, NULL),
(187, 186, 44, NULL, NULL),
(188, 187, 40, NULL, NULL),
(189, 188, 22, NULL, NULL),
(190, 189, 18, NULL, NULL),
(191, 189, 28, NULL, NULL),
(193, 191, 34, NULL, NULL),
(195, 191, 34, NULL, NULL),
(196, 156, 52, '2024-07-05 06:36:43', '2024-07-05 06:36:43'),
(199, 194, 35, NULL, NULL),
(200, 43, 13, NULL, NULL),
(201, 10, 2, NULL, NULL),
(202, 28, 19, NULL, NULL),
(203, 45, 16, NULL, NULL),
(204, 44, 16, NULL, NULL),
(205, 136, 35, NULL, NULL),
(211, 200, 35, NULL, NULL),
(213, 202, 35, NULL, NULL),
(214, 35, 29, NULL, NULL),
(215, 5, 29, NULL, NULL),
(216, 203, 29, NULL, NULL),
(217, 204, 29, NULL, NULL),
(218, 181, 21, NULL, NULL),
(219, 2, 29, NULL, NULL),
(220, 13, 29, NULL, NULL),
(221, 11, 23, NULL, NULL),
(222, 205, 29, NULL, NULL),
(223, 206, 29, NULL, NULL),
(224, 130, 19, NULL, NULL),
(225, 207, 54, NULL, NULL),
(226, 208, 54, NULL, NULL),
(227, 209, 54, NULL, NULL),
(228, 210, 54, NULL, NULL),
(229, 39, 50, NULL, NULL),
(230, 135, 50, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `concursos`
--

CREATE TABLE `concursos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `local` varchar(255) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'a decorrer',
  `projecto_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `concursos`
--

INSERT INTO `concursos` (`id`, `nome`, `descricao`, `local`, `data`, `created_at`, `updated_at`, `status`, `projecto_id`) VALUES
(21, 'aquisicao de laptops', 'public', 'Cispoc', '2024-10-15', '2024-10-10 10:26:26', '2024-10-15 11:22:37', 'aberto', 1),
(37, 'Aquisição de tablets', 'Público', 'Delegação', '2024-11-04', '2024-10-30 07:14:32', '2024-10-30 07:14:32', 'a decorrer', 2),
(39, 'Aquisição de tonners', 'publico', 'Delegação', '2024-11-18', '2024-11-12 06:07:49', '2024-11-12 06:07:49', 'a decorrer', 10),
(42, 'Aquisição de baterias', 'publico', 'Delegação', '2024-11-19', '2024-11-12 11:50:38', '2024-11-12 11:50:38', 'a decorrer', 52),
(43, 'Material clinico', 'publico', 'cispoc', '2024-11-18', '2024-11-14 09:21:07', '2024-11-14 09:21:07', 'a decorrer', 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `concurso_juri`
--

CREATE TABLE `concurso_juri` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `concurso_id` bigint(20) UNSIGNED NOT NULL,
  `membro_juri_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `funcao` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `concurso_juri`
--

INSERT INTO `concurso_juri` (`id`, `concurso_id`, `membro_juri_id`, `created_at`, `updated_at`, `funcao`) VALUES
(72, 21, 116, NULL, NULL, 'Vogal'),
(73, 21, 194, NULL, NULL, 'Presidente'),
(102, 37, 5, NULL, NULL, 'Vogal'),
(103, 37, 121, NULL, NULL, 'Presidente'),
(104, 37, 153, NULL, NULL, 'Presidente'),
(105, 37, 150, NULL, NULL, 'Presidente'),
(106, 39, 13, NULL, NULL, NULL),
(107, 39, 153, NULL, NULL, NULL),
(108, 39, 121, NULL, NULL, NULL),
(109, 39, 194, NULL, NULL, NULL),
(110, 37, 207, NULL, NULL, 'Relator'),
(111, 21, 48, NULL, NULL, 'Relator'),
(112, 42, 169, NULL, NULL, 'Presidente'),
(113, 42, 34, NULL, NULL, 'Vogal'),
(114, 42, 209, NULL, NULL, 'Relator'),
(115, 43, 205, NULL, NULL, NULL),
(116, 43, 2, NULL, NULL, NULL),
(117, 43, 97, NULL, NULL, NULL),
(118, 43, 208, NULL, NULL, 'Relator');

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `membro_juris`
--

CREATE TABLE `membro_juris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `patrimonio` tinyint(1) NOT NULL DEFAULT 0,
  `email` varchar(255) DEFAULT NULL,
  `disponivel` int(5) NOT NULL DEFAULT 0,
  `projecto_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `membro_juris`
--

INSERT INTO `membro_juris` (`id`, `nome`, `patrimonio`, `email`, `disponivel`, `projecto_id`, `tipo`, `created_at`, `updated_at`) VALUES
(1, 'Alcina Zitha', 0, 'alcina.zitha@ins.gov.mz', 0, 1, NULL, NULL, '2024-10-10 08:40:31'),
(2, 'Antonio Machiana', 0, 'antonio.machiana@ins.gov.mz', 0, 7, NULL, NULL, '2024-10-28 07:17:21'),
(3, 'Arlindo Vilanculo', 0, 'arlindo.vilanculo@ins.gov.mz', 0, NULL, NULL, NULL, '2024-07-18 04:21:31'),
(4, 'Atinia Chamo', 0, 'atinia.chamo@ins.gov.mz', 0, NULL, NULL, NULL, '2024-07-18 04:22:38'),
(5, 'Bindiya Meggi', 0, 'bindiya.meggi@ins.gov.mz', 0, 2, NULL, NULL, '2024-10-28 05:43:42'),
(6, 'Carla Madeira', 0, 'carla.madeira@ins.gov.mz', 0, NULL, NULL, NULL, '2024-07-18 04:24:42'),
(7, 'Carina Fernando', 0, 'carina.fernando@ins.gov.mz', 0, NULL, NULL, NULL, '2024-07-18 04:25:27'),
(8, 'Carmelia Massingue', 0, 'carmelia.massingue@ins.gov.mz', 0, NULL, NULL, NULL, '2024-07-10 09:32:28'),
(9, 'Celso Khosa', 0, 'celso.khosa@ins.gov.mz', 0, NULL, NULL, NULL, '2024-09-19 07:33:18'),
(10, 'Cristovao Matusse', 0, 'cristovao.matusse@ins.gov.mz', 0, NULL, NULL, NULL, '2024-07-18 04:27:18'),
(11, 'Cynthia da Silva', 0, 'cynthia.silva@ins.gov.mz', 0, 11, NULL, NULL, '2024-10-28 07:45:45'),
(12, 'Delario Nhumaio', 0, 'delario.nhumaio@ins.gov.mz', 0, NULL, NULL, NULL, '2024-07-18 07:41:48'),
(13, 'Denise Banze', 0, 'denise.banze@ins.gov.mz', 0, 10, NULL, NULL, '2024-10-28 07:34:09'),
(14, 'Dilma Jamal', 0, 'dilma.jamal@ins.gov.mz', 0, NULL, NULL, NULL, '2024-07-11 04:44:25'),
(15, 'Dionisia Balate', 0, 'dionisia.balate@ins.gov.mz', 0, NULL, NULL, NULL, '2024-07-18 07:43:21'),
(16, 'Edna Viegas', 0, 'edna.viegas@ins.gov.mz', 0, NULL, NULL, NULL, '2024-07-18 07:44:44'),
(17, 'Eduardo Namalango', 0, 'eduardo.namalango@ins.gov.mz', 0, NULL, NULL, NULL, '2024-07-18 07:46:01'),
(18, 'Emelva Manhiça', 0, NULL, 0, NULL, NULL, NULL, NULL),
(19, 'Emilia Fumane', 0, 'emilia.fumane@ins.gov.mz', 0, NULL, NULL, NULL, '2024-07-18 07:51:13'),
(20, 'Elly Raquelina', 0, 'elly.raquelina@ins.gov.mz', 0, 2, NULL, NULL, '2024-10-11 09:29:25'),
(21, 'Felismina Fabião', 0, NULL, 0, NULL, NULL, NULL, NULL),
(22, 'Helena Sitoe', 0, 'helena.sitoe@ins.gov.mz', 0, NULL, NULL, NULL, '2024-07-10 09:16:59'),
(23, 'Isabel Timana', 0, 'isabel.timana@ins.gov.mz', 0, NULL, NULL, NULL, '2024-07-18 07:53:30'),
(24, 'Jessica Boque', 0, NULL, 0, NULL, NULL, NULL, NULL),
(25, 'Justina Cambuie', 0, NULL, 0, NULL, NULL, NULL, NULL),
(26, 'kassia Pereira', 0, 'kassia.pereira@ins.gov.mz', 0, NULL, NULL, NULL, '2024-07-18 07:55:38'),
(27, 'Marcia Mutisse', 0, 'marcia.mutisse@ins.gov.mz', 0, NULL, NULL, NULL, '2024-07-11 04:35:51'),
(28, 'Maria Enosse', 0, 'maria.enosse@ins.gov.mz', 0, NULL, NULL, NULL, '2024-07-18 07:57:54'),
(29, 'Marilia Cossa', 0, 'marilia.cossa@ins.gov.mz', 0, NULL, NULL, NULL, '2024-07-18 08:02:34'),
(30, 'Miguel Uanela', 0, 'miguel.uanela@ins.gov.mz', 0, 4, NULL, NULL, '2024-10-28 06:39:03'),
(31, 'Mirna Mutombene', 0, 'mirna.mutombene@ins.gov.mz', 0, NULL, NULL, NULL, '2024-07-10 09:20:05'),
(32, 'Odete Bule', 0, 'odete.bule@ins.gov.mz', 0, NULL, NULL, NULL, '2024-07-18 08:20:46'),
(33, 'Onelia Guiliche', 0, 'onelia.guiliche@ins.gov.mz', 0, NULL, NULL, NULL, '2024-07-18 08:23:30'),
(34, 'Orlando Cossa', 0, 'orlando.cossa@ins.gov.mz', 0, 52, 'Substituto', NULL, '2024-11-12 06:09:39'),
(35, 'Pedroso Nhassengo', 0, 'pedroso.nhassengo@ins.gov.mz', 0, 4, NULL, NULL, '2024-10-28 05:41:55'),
(36, 'Regina Machanhane', 0, NULL, 0, NULL, NULL, NULL, NULL),
(37, 'Rezelda Macuiana', 0, NULL, 0, NULL, NULL, NULL, NULL),
(38, 'Sofia Viegas', 0, NULL, 0, NULL, NULL, NULL, NULL),
(39, 'Suzana Correia', 0, 'suzana.correia@ins.gov.mz', 0, 12, 'Substituto', NULL, '2024-11-14 09:30:55'),
(40, 'Suzana Correia', 0, NULL, 0, NULL, NULL, NULL, NULL),
(41, 'Vanessa Monteiro', 0, 'vania.monteiro@ins.gov.mz', 0, NULL, NULL, NULL, '2024-07-18 08:28:09'),
(42, 'Vania Maposse', 0, 'vania.maposse@ins.gov.mz', 0, NULL, NULL, NULL, '2024-07-18 08:33:39'),
(43, 'Vania Monteiro', 0, 'vania.monteiro@ins.gov.mz', 0, NULL, NULL, NULL, '2024-07-10 09:18:56'),
(44, 'Veronica Casmo', 0, 'veronica.casmo@ins.gov.mz', 0, NULL, NULL, NULL, '2024-07-18 08:32:37'),
(45, 'Victoria Cumbane', 0, 'victoria.cumbane@ins.gov.mz', 0, NULL, NULL, NULL, '2024-07-18 08:30:15'),
(46, 'Yolanda Utui', 0, 'yolanda.utui@ins.gov.mz', 0, NULL, NULL, NULL, '2024-07-18 08:31:06'),
(47, 'Leonel Fernando', 0, NULL, 0, NULL, NULL, NULL, NULL),
(48, 'Sergio Cuinica', 0, 'sergio.cuinica@ins.gov.moz', 0, NULL, 'UGEAMember', NULL, '2024-07-18 08:35:50'),
(49, 'Albertina Matola', 0, NULL, 0, NULL, NULL, NULL, NULL),
(50, 'Mara Nhamcuhue', 0, NULL, 0, NULL, NULL, NULL, NULL),
(51, 'Dorcas Ribeiro', 0, NULL, 0, NULL, NULL, NULL, NULL),
(52, 'Guilhermina Gabriel', 0, NULL, 0, NULL, NULL, NULL, NULL),
(53, 'Helena Massuque', 0, NULL, 0, NULL, NULL, NULL, NULL),
(54, 'Lácia Rufino', 0, NULL, 0, NULL, NULL, NULL, NULL),
(55, 'Saniata Cumbe', 0, NULL, 0, NULL, NULL, NULL, NULL),
(56, 'Alda Mazimba', 0, NULL, 0, NULL, NULL, NULL, NULL),
(57, 'Ciddalia guambe', 0, NULL, 0, NULL, NULL, NULL, NULL),
(58, 'Eulalia buque', 0, NULL, 0, NULL, NULL, NULL, NULL),
(59, 'helia Cossa', 0, NULL, 0, NULL, NULL, NULL, NULL),
(60, 'Carla Titos Chipula', 0, NULL, 0, NULL, NULL, NULL, NULL),
(61, 'Carla Titos Chipula', 0, NULL, 0, NULL, NULL, NULL, NULL),
(62, 'Clesia Vinlanculo', 0, NULL, 0, NULL, NULL, NULL, NULL),
(63, 'Dulcia langa', 0, NULL, 0, NULL, NULL, NULL, NULL),
(64, 'Elda Anapakala', 0, NULL, 0, NULL, NULL, NULL, NULL),
(65, 'Orquidia Mavila', 0, NULL, 0, NULL, NULL, NULL, NULL),
(66, 'Benedita Jose', 0, NULL, 0, NULL, NULL, NULL, NULL),
(67, 'Edson Francisco', 0, NULL, 0, NULL, NULL, NULL, NULL),
(68, 'Sheila Hamido', 0, NULL, 0, NULL, NULL, NULL, NULL),
(69, 'Nercia Nhampulo', 0, NULL, 0, NULL, NULL, NULL, NULL),
(70, 'Ricardina Rangeiro', 0, NULL, 0, NULL, NULL, NULL, NULL),
(71, 'Arlete Mariano', 0, NULL, 0, NULL, NULL, NULL, NULL),
(72, 'Andrea Neves', 0, NULL, 0, NULL, NULL, NULL, NULL),
(73, 'Cesaltina Lorenzoni', 0, NULL, 0, NULL, NULL, NULL, NULL),
(74, 'Carla Carilho', 0, NULL, 0, NULL, NULL, NULL, NULL),
(75, 'Fabiola Fernandes ', 0, NULL, 0, NULL, NULL, NULL, NULL),
(76, 'Eliane Monteiro', 0, NULL, 0, NULL, NULL, NULL, NULL),
(77, 'Nafissa Osman', 0, NULL, 0, NULL, NULL, NULL, NULL),
(78, 'Arsenia Blia', 0, NULL, 0, NULL, NULL, NULL, NULL),
(79, 'Lidia Sebastiao Pessane', 0, NULL, 0, NULL, NULL, NULL, NULL),
(80, 'Ernesto Antonio Joao', 0, NULL, 0, NULL, NULL, NULL, NULL),
(81, 'Sidonio Mondlane', 0, NULL, 0, NULL, NULL, NULL, NULL),
(82, 'Celsia Avelino', 0, NULL, 0, NULL, NULL, NULL, NULL),
(83, 'Dulcilia Matimbe', 0, NULL, 0, NULL, NULL, NULL, NULL),
(85, 'Fabiao Dava', 0, NULL, 0, NULL, NULL, NULL, NULL),
(86, 'Osvaldina Quepico', 0, NULL, 0, NULL, NULL, NULL, NULL),
(87, 'Neiva Banze', 0, NULL, 0, NULL, NULL, NULL, NULL),
(88, 'Katia Cossa', 0, NULL, 0, NULL, NULL, NULL, NULL),
(90, 'Path Guambe', 0, NULL, 0, NULL, NULL, NULL, NULL),
(91, 'Lecticia Massingue ', 0, NULL, 0, NULL, NULL, NULL, NULL),
(92, 'Aires Nhuane', 0, NULL, 0, NULL, NULL, NULL, NULL),
(93, 'Zainabo Langa ', 0, NULL, 0, NULL, NULL, NULL, NULL),
(94, 'Elda Anapakala ', 0, NULL, 0, NULL, NULL, NULL, NULL),
(95, 'Orquidia Mavila', 0, NULL, 0, NULL, NULL, NULL, NULL),
(96, 'Benedita José', 0, 'benedita.jose@ins.gov.mz', 0, 1, NULL, NULL, '2024-10-28 05:37:48'),
(97, 'Edson Francisco', 0, 'edson.mongo@ins.gov.mz', 0, 9, NULL, NULL, '2024-10-28 06:35:35'),
(98, 'Sheila Hamido', 0, NULL, 0, NULL, NULL, NULL, NULL),
(99, 'Nércia Nhampulo ', 0, NULL, 0, NULL, NULL, NULL, NULL),
(100, 'Ricardina Rangeiro', 0, NULL, 0, NULL, NULL, NULL, NULL),
(101, 'Arlete Mariano ', 0, NULL, 0, NULL, NULL, NULL, NULL),
(102, 'Andrea Neves ', 0, NULL, 0, NULL, NULL, NULL, NULL),
(103, 'Cesaltina Lorenzoni', 0, NULL, 0, NULL, NULL, NULL, NULL),
(104, 'Carla Carrilho', 0, NULL, 0, NULL, NULL, NULL, NULL),
(105, 'Fabiola Fernanades ', 0, NULL, 0, NULL, NULL, NULL, NULL),
(106, 'Eliane Monteiro', 0, NULL, 0, NULL, NULL, NULL, NULL),
(107, 'Nafiisa Osman', 0, NULL, 0, NULL, NULL, NULL, NULL),
(108, 'Arsenia Bila ', 0, NULL, 0, NULL, NULL, NULL, NULL),
(109, 'Lidia Sebastiao Pessane', 0, NULL, 0, NULL, NULL, NULL, NULL),
(110, 'Ernesto Antonio Joao', 0, NULL, 0, NULL, NULL, NULL, NULL),
(111, 'Sidonio Mondlate', 0, NULL, 0, NULL, NULL, NULL, NULL),
(112, 'Celsia Avelino ', 0, NULL, 0, NULL, NULL, NULL, NULL),
(113, 'Dulcilia Matimbe', 0, NULL, 0, NULL, NULL, NULL, NULL),
(114, 'Inacio Cumbe', 1, 'inacio.cumbe@ins.gov.mz', 0, NULL, NULL, NULL, '2024-07-16 05:37:59'),
(115, 'Agostinho Djambo', 0, NULL, 0, NULL, NULL, NULL, NULL),
(116, 'Alberto Machaze', 0, 'alberto.machaze@ins.gov.mz', 0, 1, NULL, NULL, '2024-10-10 08:50:56'),
(117, 'Alberto Rogerio', 0, NULL, 0, NULL, NULL, NULL, NULL),
(118, 'Eldo Manjate', 0, 'eldo.manjate@ins.gov.mz', 0, 1, NULL, NULL, '2024-10-23 10:02:36'),
(119, 'Americo Zandamela', 0, NULL, 0, NULL, NULL, NULL, NULL),
(120, 'Antonio Johane ', 0, NULL, 0, NULL, NULL, NULL, NULL),
(121, 'Armando Baciao', 0, 'armando.mutumula@ins.gov.mz', 0, 2, NULL, NULL, '2024-10-28 06:44:12'),
(122, 'Augusta Batista ', 0, NULL, 0, NULL, NULL, NULL, NULL),
(123, 'balbina Penicelo', 0, NULL, 0, NULL, NULL, NULL, NULL),
(124, 'Belito Zavala ', 0, NULL, 0, NULL, NULL, NULL, NULL),
(125, 'Cassamo Bay', 0, NULL, 0, NULL, NULL, NULL, NULL),
(126, 'Catildo Cubai ', 0, NULL, 0, NULL, NULL, NULL, NULL),
(127, 'Celia Machel', 0, NULL, 0, NULL, NULL, NULL, NULL),
(128, 'Celina nhamuave', 0, NULL, 0, NULL, NULL, NULL, NULL),
(129, 'Claudia Bila', 0, NULL, 0, NULL, NULL, NULL, NULL),
(130, 'Claudio Leuane', 0, 'general@general', 0, 52, 'Substituto', NULL, '2024-11-12 06:11:01'),
(131, 'Delcia Macamo', 0, NULL, 0, NULL, NULL, NULL, NULL),
(132, 'Dercio Cumaio ', 0, NULL, 0, NULL, NULL, NULL, NULL),
(133, 'Dimpal Amuscrai ', 0, NULL, 0, NULL, NULL, NULL, NULL),
(134, 'Dionsisia Mendes ', 0, NULL, 0, NULL, NULL, NULL, NULL),
(135, 'Domingas Ferrao', 0, 'domingas.ferrao@ins.gov.mz', 0, 12, 'Substituto', NULL, '2024-11-14 09:32:40'),
(136, 'Epifania Raimundo', 0, 'epifania.raimundo@ins.gov.mz', 0, NULL, NULL, NULL, '2024-07-16 05:32:06'),
(137, 'Ercilio samo', 0, NULL, 0, NULL, NULL, NULL, NULL),
(138, 'Fatima Guirrugo', 0, 'fatima.guirrugo@ins.gov.mz', 0, NULL, NULL, NULL, '2024-07-11 04:41:49'),
(139, 'Felisberto Novela ', 0, NULL, 0, NULL, NULL, NULL, NULL),
(140, 'Fernando Mutsenga ', 0, NULL, 0, NULL, NULL, NULL, NULL),
(141, 'Ferrao Mandlate', 0, 'ferao.mandlate@ins.gov.mz', 0, NULL, NULL, NULL, '2024-07-10 09:26:49'),
(142, 'Filimao Zitha ', 0, NULL, 0, NULL, NULL, NULL, NULL),
(143, 'Francisco pedro ', 0, NULL, 0, NULL, NULL, NULL, NULL),
(144, 'Hamilton Simbine', 0, NULL, 0, NULL, NULL, NULL, NULL),
(145, 'Inocencio Tarmamade', 0, NULL, 0, NULL, NULL, NULL, NULL),
(146, 'Isaura Mbenzane ', 0, NULL, 0, NULL, NULL, NULL, NULL),
(147, 'Ivat Mulungo ', 0, NULL, 0, NULL, NULL, NULL, NULL),
(148, 'jacinto Da Costa ', 0, NULL, 0, NULL, NULL, NULL, NULL),
(149, 'Jackson Muzuzu', 0, 'jackson.mazuze@ins.gov.mz', 0, NULL, NULL, NULL, '2024-07-18 08:42:22'),
(150, 'Jorge Ribeiro', 0, 'jorge.ribeiro@ins.gov.mz', 0, 7, NULL, NULL, '2024-10-28 06:48:07'),
(151, 'Laurinancia Cuinhane', 0, NULL, 0, NULL, NULL, NULL, NULL),
(152, 'leonilde Macamo', 0, NULL, 0, NULL, NULL, NULL, NULL),
(153, 'ligia Chambule', 0, 'ligia.chambule@ins.gov.mz', 0, 10, NULL, NULL, '2024-10-28 06:39:58'),
(154, 'Liria Sambo ', 0, NULL, 0, NULL, NULL, NULL, NULL),
(155, 'Luis Guilherme ', 0, NULL, 0, NULL, NULL, NULL, NULL),
(156, 'Luis Inhambizo', 0, NULL, 0, NULL, NULL, NULL, NULL),
(157, 'Luis Ngovene', 0, 'general@general', 0, 52, 'Substituto', NULL, '2024-11-12 06:12:11'),
(158, 'Lurdes Mauzane ', 0, NULL, 0, NULL, NULL, NULL, NULL),
(159, 'Mahira Amade', 0, 'mahira.amade@ins.gov.mz', 0, NULL, NULL, NULL, '2024-07-16 05:34:57'),
(160, 'Marcia Chiluvane ', 0, NULL, 0, NULL, NULL, NULL, NULL),
(161, 'Marilia Miraze ', 0, NULL, 0, NULL, NULL, NULL, NULL),
(162, 'marta Machai ', 0, NULL, 0, NULL, NULL, NULL, NULL),
(163, 'Miguel Guambe ', 0, NULL, 0, NULL, NULL, NULL, NULL),
(164, 'Monica Matsinhe', 0, NULL, 0, NULL, NULL, NULL, NULL),
(165, 'narciso Macie ', 0, NULL, 0, NULL, NULL, NULL, NULL),
(166, 'Obadias Nhancal', 0, 'general@general', 0, 52, 'Substituto', NULL, '2024-11-12 06:56:13'),
(167, 'Paula Samo', 0, 'paula.samo@ins.gov.mz', 0, NULL, NULL, NULL, '2024-07-10 09:23:51'),
(168, 'Paulo Macamo', 0, NULL, 0, NULL, NULL, NULL, NULL),
(169, 'Pedro Mavone', 0, 'general@general', 0, 52, 'Substituto', NULL, '2024-11-12 07:09:04'),
(170, 'Regina Macaringue ', 0, NULL, 0, NULL, NULL, NULL, NULL),
(171, 'Rosaria Sambo ', 0, NULL, 0, NULL, NULL, NULL, NULL),
(172, 'Salomao Manjate ', 0, NULL, 0, NULL, NULL, NULL, NULL),
(173, 'salvador Machava', 0, NULL, 0, NULL, NULL, NULL, NULL),
(174, 'Samuel Rendicao', 0, NULL, 0, NULL, NULL, NULL, NULL),
(175, 'Sheila Da Costa', 0, NULL, 0, NULL, NULL, NULL, NULL),
(176, 'Sidonia Mahambe ', 0, NULL, 0, NULL, NULL, NULL, NULL),
(177, 'Silvia Lifiano', 0, NULL, 0, NULL, NULL, NULL, NULL),
(178, 'Simiao Chimene', 0, NULL, 0, NULL, NULL, NULL, NULL),
(179, 'Supinho Chinbadje', 0, NULL, 0, NULL, NULL, NULL, NULL),
(180, 'Tania Matuse ', 0, NULL, 0, NULL, NULL, NULL, NULL),
(181, 'Telgidio Matusse', 0, 'telgidio.matusse@ins.gov.mz', 0, 5, NULL, NULL, '2024-10-28 06:44:57'),
(182, 'teodosso Chissambule', 0, NULL, 0, NULL, NULL, NULL, NULL),
(183, 'Teotonia Massingue', 0, NULL, 0, NULL, NULL, NULL, NULL),
(184, 'Tomas Tuzine', 0, 'general@general', 0, 52, 'Substituto', NULL, '2024-11-12 07:09:37'),
(185, 'Valter Chiule ', 0, NULL, 0, NULL, NULL, NULL, NULL),
(186, 'Veronica Macucua ', 0, NULL, 0, NULL, NULL, NULL, NULL),
(187, 'Yolanda Manganhe ', 0, NULL, 0, NULL, NULL, NULL, NULL),
(188, 'Zeferino Mulungo', 0, 'general@general', 0, 52, 'Substituto', NULL, '2024-11-12 07:10:00'),
(189, 'Zelica Omar', 0, NULL, 0, NULL, NULL, NULL, NULL),
(191, 'Norma Mabote', 1, 'norma.mabota@ins.gov.mz', 0, NULL, NULL, '2024-07-01 10:13:28', '2024-07-16 05:34:06'),
(194, 'Eben Matavel', 0, 'eben.matavele@ins.gov.mz', 0, 3, NULL, '2024-07-09 05:19:32', '2024-10-17 10:25:37'),
(200, 'Jorge Eurico', 0, 'jorgebulaisse@outlook.com', 0, NULL, NULL, '2024-09-19 10:32:26', '2024-09-19 10:32:26'),
(202, 'Pablo Eurico', 0, 'jorgeeurico223@outlook.com', 0, NULL, NULL, '2024-10-08 10:10:12', '2024-10-08 10:10:12'),
(203, 'Edna Nhacumle', 0, 'edna.nhamcule@ins.gov.mz', 0, NULL, NULL, '2024-10-28 06:31:45', '2024-10-28 06:31:45'),
(204, 'Raquel Matavel', 0, 'raque.matavel@ins.gov.mz', 0, NULL, NULL, '2024-10-28 06:37:44', '2024-10-28 06:37:44'),
(205, 'Sérgio Chicumbe', 0, 'sergio.chicumbe@ins.gov.mz', 0, 8, 'Substituto', '2024-11-12 05:55:29', '2024-11-12 08:02:13'),
(206, 'Ilesh Jani', 0, 'ilesh.jani@ins.gov.mz', 0, NULL, 'Substituto', '2024-11-12 05:56:49', '2024-11-12 05:56:49'),
(207, 'Monica Matsinhe', 0, 'monica.matsinhe@ins.gov.mz', 0, NULL, 'UGEAMember', '2024-11-12 08:06:27', '2024-11-12 08:06:27'),
(208, 'Dercio Cumaio', 0, 'dercio.cumaio@ins.gov.mz', 0, NULL, 'UGEAMember', '2024-11-12 08:08:21', '2024-11-12 08:08:21'),
(209, 'Marta Machai', 0, 'marta.machai@ins.gov.mz', 0, NULL, 'UGEAMember', '2024-11-12 08:09:46', '2024-11-12 08:09:46'),
(210, 'Vânia Cossa', 0, 'vania.cossa@ins.gov.mz', 0, NULL, 'UGEAMember', '2024-11-12 08:10:27', '2024-11-12 08:10:27');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_06_19_115510_create_concursos_table', 1),
(6, '2024_06_19_115544_create_membros_juri_table', 1),
(7, '2024_06_19_115604_create_competencias_table', 1),
(8, '2024_06_19_115647_create_competencias_membros_table', 1),
(9, '2024_06_19_115701_create_concurso_juris_table', 1),
(10, '2024_06_19_125700_create_comissao_recepcao_table', 1),
(11, '2024_06_27_105125_create_competencias_concurso_table', 1),
(12, '2024_07_01_123539_add_local_and_data_to_concursos_table', 1),
(13, '2024_07_05_084543_add_email_to_membro_juris_table', 1),
(14, '2024_07_24_081308_create_recent_selections_table', 1),
(15, '2024_08_23_061456_add_status_to_concursos_table', 1),
(16, '2024_09_19_094050_add_disponivel_to_membro_juris_table', 1),
(17, '2024_10_04_021137_create_projectos_table', 2),
(18, '2024_10_04_021639_add_projecto_id_to_membro_juris_table', 2),
(19, '2024_10_04_032657_add_descricao_to_projectos_table', 2),
(20, '2024_10_06_031459_add_projecto_id_to_concursos_table', 2),
(21, '2024_10_07_114254_add_projecto_id_to_membro_juris_table', 3),
(22, '2024_10_30_105516_add_tipo_to_membro_juris_table', 4),
(23, '2024_11_11_110942_add_funcao_to_concurso_juri_table', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `projectos`
--

CREATE TABLE `projectos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `projectos`
--

INSERT INTO `projectos` (`id`, `nome`, `descricao`, `created_at`, `updated_at`) VALUES
(1, 'HPV', 'A decorrer', '2024-10-07 05:42:52', '2024-10-07 05:42:52'),
(2, 'Datura', 'A decorrer', '2024-10-07 05:43:08', '2024-10-07 05:43:08'),
(3, 'HDSS', 'A decorrer', '2024-10-17 10:25:15', '2024-10-17 10:25:15'),
(4, 'chest', 'a decorrer', '2024-10-28 05:41:06', '2024-10-28 05:41:06'),
(5, 'Search', 'a decorrer', '2024-10-28 06:32:22', '2024-10-28 06:32:22'),
(6, 'SAFEST', 'A decorrer', '2024-10-28 06:32:54', '2024-10-28 06:32:54'),
(7, 'DRTB', 'A decorrer', '2024-10-28 06:33:15', '2024-10-28 06:33:15'),
(8, 'Gavi-sentinel', 'A decorrer', '2024-10-28 06:33:57', '2024-10-28 06:33:57'),
(9, 'Leucemias', 'A decorrer', '2024-10-28 06:34:23', '2024-10-28 06:34:23'),
(10, 'ADAPT4KIDS', 'A decorrer', '2024-10-28 06:38:25', '2024-10-28 06:38:25'),
(11, 'Sanivac', 'A decorrer', '2024-10-28 07:44:17', '2024-10-28 07:44:17'),
(12, 'OGE', 'A decorrer', '2024-11-12 05:29:10', '2024-11-12 05:29:10'),
(13, 'PITT-MOZ', 'Projecto', '2024-11-12 05:29:52', '2024-11-12 05:29:52'),
(14, 'FOODSAFETY', 'Projecto', '2024-11-12 05:30:23', '2024-11-12 05:30:23'),
(15, 'TIMPANI', 'PROJECTO', '2024-11-12 05:31:00', '2024-11-12 05:31:00'),
(16, 'EHVA', 'PROJECTO', '2024-11-12 05:31:45', '2024-11-12 05:31:45'),
(17, 'IGRA/IPREV', 'Projecto', '2024-11-12 05:32:13', '2024-11-12 05:32:13'),
(18, 'ICOS', 'Projecto', '2024-11-12 05:32:32', '2024-11-12 05:32:32'),
(19, 'Step2c', 'projecto', '2024-11-12 05:32:53', '2024-11-12 05:32:53'),
(20, 'core b', 'estudo', '2024-11-12 05:34:54', '2024-11-12 05:34:54'),
(21, 'MAPSAN', 'estudo', '2024-11-12 05:35:13', '2024-11-12 05:35:13'),
(22, 'OWSD-MORINGA', 'estudo', '2024-11-12 05:35:40', '2024-11-12 05:35:40'),
(23, 'TMC', 'Estudo', '2024-11-12 05:36:28', '2024-11-12 05:36:28'),
(24, 'OPTIRIMOX', 'ESTUDO', '2024-11-12 05:37:21', '2024-11-12 05:37:21'),
(25, 'SMART4TB', 'Estudo', '2024-11-12 05:38:08', '2024-11-12 05:38:08'),
(26, 'XPRIZE - FUNDOS REMANESCENTE', 'Projecto', '2024-11-12 05:41:39', '2024-11-12 05:41:39'),
(27, 'custos Admin', 'projecto', '2024-11-12 05:41:56', '2024-11-12 05:41:56'),
(28, 'Anticov', 'estudos', '2024-11-12 05:42:14', '2024-11-12 05:42:14'),
(29, 'Solidarity', 'estudo', '2024-11-12 05:42:53', '2024-11-12 05:42:53'),
(30, 'PANACEA', 'estudo', '2024-11-12 05:43:25', '2024-11-12 05:43:25'),
(31, 'simplici', 'estudo', '2024-11-12 05:43:38', '2024-11-12 05:43:38'),
(32, 'ecova-02', 'estudo', '2024-11-12 05:44:01', '2024-11-12 05:44:01'),
(33, 'TB-SEQUEL', 'estudo', '2024-11-12 05:44:16', '2024-11-12 05:44:16'),
(34, 'PAN-TB', 'Estudo', '2024-11-12 05:45:09', '2024-11-12 05:45:09'),
(35, 'xact III', 'estudo', '2024-11-12 05:45:28', '2024-11-12 05:45:28'),
(36, 'Erase-tb', 'estudo', '2024-11-12 05:46:05', '2024-11-12 05:46:05'),
(37, 'Sinopharm Cast', 'Estudo', '2024-11-12 05:46:24', '2024-11-12 05:46:24'),
(38, 'Sinopharm SIVCOV', 'Projecto', '2024-11-12 05:46:44', '2024-11-12 05:46:44'),
(39, 'DRTB', 'Estudo', '2024-11-12 05:47:27', '2024-11-12 05:47:27'),
(40, 'CAP-TB', 'Estudo', '2024-11-12 05:48:12', '2024-11-12 05:48:12'),
(41, 'PrepVac', 'estudo', '2024-11-12 05:48:30', '2024-11-12 05:48:30'),
(42, 'global mix', 'estudo', '2024-11-12 05:48:44', '2024-11-12 05:48:44'),
(43, 'global mix Sero', 'estudo', '2024-11-12 05:48:56', '2024-11-12 05:48:56'),
(44, 'CoAg-HDSS', 'projecto', '2024-11-12 05:49:17', '2024-11-12 05:49:17'),
(45, 'TB-SPEED - fundo Remanescente', 'projecto', '2024-11-12 05:49:44', '2024-11-12 05:49:44'),
(46, 'RV456-JNJ - Fundo Remanescente', 'Projecto', '2024-11-12 05:50:44', '2024-11-12 05:50:44'),
(47, 'HVTN705', 'Estudo', '2024-11-12 05:51:42', '2024-11-12 05:51:42'),
(48, 'STRIVE', 'Estudo', '2024-11-12 05:51:56', '2024-11-12 05:51:56'),
(49, 'Fundos remanescentes Chókwe', 'Estudo', '2024-11-12 05:52:29', '2024-11-12 05:52:29'),
(50, 'SAFEST', 'Estudo', '2024-11-12 05:52:45', '2024-11-12 05:52:45'),
(51, 'Tico - Fundos Remanescentes', 'projecto', '2024-11-12 05:53:27', '2024-11-12 05:53:27'),
(52, 'Livre', 'Livre', '2024-11-12 06:06:03', '2024-11-12 06:06:03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `recent_selections`
--

CREATE TABLE `recent_selections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `membro_juri_id` bigint(20) UNSIGNED NOT NULL,
  `concurso_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `is_admin`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jorge Eurico', 'jorgebulaisse@outlook.com', 1, NULL, '$2y$10$rnCUOoNdRTLHgMQG9kYAGuzoegPOQwUHAzXoz/hOXXUqr8fCe//sK', NULL, '2024-06-27 07:50:36', '2024-06-27 07:50:36'),
(2, 'user', 'user@gmail.com', 0, NULL, '$2y$10$cnkjS86ZQVo6y/hDBHXzbe6jcaXzREZxOsPKZ4dqT0XEf.umfNEuK', NULL, '2024-07-09 06:14:44', '2024-09-16 11:19:39'),
(3, 'sergio Cuinica', 'sergio.cuinica@ins.gov.moz', 1, NULL, '$2y$10$xr639Uz1502yT51K3V14AOrBQOq5ogg1gPjub1Xyu3J7vuwwOXKV6', NULL, '2024-08-26 04:30:26', '2024-08-26 04:31:46'),
(4, 'Armando', 'armando.mutumula@ins.gov.mz', 0, NULL, '$2y$10$9sijKcVXq6PqHex2HfRWR.Oqv/4hfatzW3Y9MI4GLJe.gKnEocR4.', NULL, '2024-09-02 07:16:40', '2024-09-02 07:16:40');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `comissao_recepcao`
--
ALTER TABLE `comissao_recepcao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comissao_recepcao_concurso_id_foreign` (`concurso_id`),
  ADD KEY `comissao_recepcao_membro_id_foreign` (`membro_juri_id`);

--
-- Índices para tabela `competencias`
--
ALTER TABLE `competencias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `competencias_concurso`
--
ALTER TABLE `competencias_concurso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `competencias_concurso_concurso_id_foreign` (`concurso_id`),
  ADD KEY `competencias_concurso_competencia_id_foreign` (`competencia_id`);

--
-- Índices para tabela `competencias_membro`
--
ALTER TABLE `competencias_membro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `competencias_membro_membro_id_foreign` (`membro_id`),
  ADD KEY `competencias_membro_competencia_id_foreign` (`competencia_id`);

--
-- Índices para tabela `concursos`
--
ALTER TABLE `concursos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `concursos_projecto_id_foreign` (`projecto_id`);

--
-- Índices para tabela `concurso_juri`
--
ALTER TABLE `concurso_juri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `concurso_juri_concurso_id_foreign` (`concurso_id`),
  ADD KEY `concurso_juri_membro_juri_id_foreign` (`membro_juri_id`);

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices para tabela `membro_juris`
--
ALTER TABLE `membro_juris`
  ADD PRIMARY KEY (`id`),
  ADD KEY `membro_juris_projecto_id_foreign` (`projecto_id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices para tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Índices para tabela `projectos`
--
ALTER TABLE `projectos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `recent_selections`
--
ALTER TABLE `recent_selections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recent_selections_membro_juri_id_foreign` (`membro_juri_id`),
  ADD KEY `recent_selections_concurso_id_foreign` (`concurso_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `comissao_recepcao`
--
ALTER TABLE `comissao_recepcao`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT de tabela `competencias`
--
ALTER TABLE `competencias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de tabela `competencias_concurso`
--
ALTER TABLE `competencias_concurso`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de tabela `competencias_membro`
--
ALTER TABLE `competencias_membro`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;

--
-- AUTO_INCREMENT de tabela `concursos`
--
ALTER TABLE `concursos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de tabela `concurso_juri`
--
ALTER TABLE `concurso_juri`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `membro_juris`
--
ALTER TABLE `membro_juris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `projectos`
--
ALTER TABLE `projectos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de tabela `recent_selections`
--
ALTER TABLE `recent_selections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `comissao_recepcao`
--
ALTER TABLE `comissao_recepcao`
  ADD CONSTRAINT `comissao_recepcao_concurso_id_foreign` FOREIGN KEY (`concurso_id`) REFERENCES `concursos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comissao_recepcao_membro_id_foreign` FOREIGN KEY (`membro_juri_id`) REFERENCES `membro_juris` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `competencias_concurso`
--
ALTER TABLE `competencias_concurso`
  ADD CONSTRAINT `competencias_concurso_competencia_id_foreign` FOREIGN KEY (`competencia_id`) REFERENCES `competencias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `competencias_concurso_concurso_id_foreign` FOREIGN KEY (`concurso_id`) REFERENCES `concursos` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `competencias_membro`
--
ALTER TABLE `competencias_membro`
  ADD CONSTRAINT `competencias_membro_competencia_id_foreign` FOREIGN KEY (`competencia_id`) REFERENCES `competencias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `competencias_membro_membro_id_foreign` FOREIGN KEY (`membro_id`) REFERENCES `membro_juris` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `concursos`
--
ALTER TABLE `concursos`
  ADD CONSTRAINT `concursos_projecto_id_foreign` FOREIGN KEY (`projecto_id`) REFERENCES `projectos` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `concurso_juri`
--
ALTER TABLE `concurso_juri`
  ADD CONSTRAINT `concurso_juri_concurso_id_foreign` FOREIGN KEY (`concurso_id`) REFERENCES `concursos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `concurso_juri_membro_juri_id_foreign` FOREIGN KEY (`membro_juri_id`) REFERENCES `membro_juris` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `membro_juris`
--
ALTER TABLE `membro_juris`
  ADD CONSTRAINT `membro_juris_projecto_id_foreign` FOREIGN KEY (`projecto_id`) REFERENCES `projectos` (`id`) ON DELETE SET NULL;

--
-- Limitadores para a tabela `recent_selections`
--
ALTER TABLE `recent_selections`
  ADD CONSTRAINT `recent_selections_concurso_id_foreign` FOREIGN KEY (`concurso_id`) REFERENCES `concursos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `recent_selections_membro_juri_id_foreign` FOREIGN KEY (`membro_juri_id`) REFERENCES `membro_juris` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
