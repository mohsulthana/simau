-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2019 at 01:27 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.0.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simau`
--

-- --------------------------------------------------------

--
-- Table structure for table `berhenti_sewa`
--

CREATE TABLE `berhenti_sewa` (
  `id_berhenti` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `alasan_berhenti` text NOT NULL,
  `tanggal_berhenti` date NOT NULL,
  `status_berhenti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bukti_bayar`
--

CREATE TABLE `bukti_bayar` (
  `id_bukti` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_upload` date NOT NULL,
  `foto_bukti` varchar(500) NOT NULL,
  `id_kamar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bukti_bayar`
--

INSERT INTO `bukti_bayar` (`id_bukti`, `id_user`, `tanggal_upload`, `foto_bukti`, `id_kamar`) VALUES
(6, 26, '2019-12-20', '../assets/foto_bukti/uang 100 ribu.jpg', 19),
(7, 27, '2019-12-21', '../assets/foto_bukti/2 keriting.JPG', 16);

-- --------------------------------------------------------

--
-- Table structure for table `data_pribadi`
--

CREATE TABLE `data_pribadi` (
  `id_pribadi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `mendengkur` tinyint(1) NOT NULL,
  `merokok` tinyint(1) NOT NULL,
  `gelap` tinyint(1) NOT NULL,
  `hewan` tinyint(1) NOT NULL,
  `membaca` tinyint(1) NOT NULL,
  `menulis` tinyint(1) NOT NULL,
  `belajar` tinyint(1) NOT NULL,
  `game` tinyint(1) NOT NULL,
  `makan` tinyint(1) NOT NULL,
  `hangout` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pribadi`
--

INSERT INTO `data_pribadi` (`id_pribadi`, `id_user`, `mendengkur`, `merokok`, `gelap`, `hewan`, `membaca`, `menulis`, `belajar`, `game`, `makan`, `hangout`) VALUES
(19, 26, 1, 0, 1, 1, 1, 0, 1, 1, 1, 1),
(20, 27, 0, 0, 1, 1, 1, 0, 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `fakultas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `fakultas`) VALUES
(1, 'Ekonomi'),
(2, 'Hukum'),
(3, 'Kedokteran'),
(4, 'Teknik'),
(5, 'Pertanian'),
(6, 'Keguruan dan Ilmu Pendidikan'),
(7, 'Ilmu Sosial dan Ilmu Politik'),
(8, 'Matematika dan Ilmu Pengetahuan Alam'),
(9, 'Ilmu Komputer'),
(10, 'Kesehatan Masyarakat');

-- --------------------------------------------------------

--
-- Table structure for table `history_perpanjangan`
--

CREATE TABLE `history_perpanjangan` (
  `id_jejak` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `tanggal_menyewa` date NOT NULL,
  `status_history` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `id_fakultas`, `jurusan`) VALUES
(1, 1, 'Manajemen'),
(2, 1, 'Ekonomi Pembangunan'),
(3, 1, 'Akuntansi'),
(4, 2, 'Ilmu Hukum'),
(5, 3, 'Pendidikan Dokter'),
(6, 3, 'Ilmu Keperawatan'),
(7, 3, 'Kedokteran Gigi'),
(8, 3, 'Psikologi'),
(9, 3, 'Pendidikan Dokter Gigi'),
(10, 4, 'Teknik Sipil'),
(11, 4, 'Teknik Kimia'),
(12, 4, 'Teknik Arsitektur'),
(13, 4, 'Teknik Pertambangan'),
(14, 4, 'Teknik Elektro'),
(15, 4, 'Teknik Mesin'),
(16, 4, 'Teknik Elektro'),
(17, 5, 'Agronomi'),
(18, 5, 'Agribisnis'),
(19, 5, 'Ilmu Hama dan Penyakit Tumbuhan'),
(20, 5, 'Teknik Hasil Pertanian'),
(21, 5, 'Peternakan'),
(22, 5, 'Budidaya Perairan'),
(23, 5, 'Teknologi Hasil Perikanan'),
(24, 5, 'Agroekoteknologi'),
(25, 5, 'Ilmu Tanah'),
(26, 5, 'Teknik Pertanian'),
(27, 6, 'Pendidikan Matematika'),
(28, 6, 'Pendidikan Biologi'),
(29, 6, 'Pendidikan Kimia'),
(30, 6, 'Pendidikan Fisika'),
(31, 6, 'Pendidikan Sejarah'),
(32, 6, 'Pendidikan Guru Paud'),
(33, 6, 'Pendidikan Bahasa dan Sastra Indonesia'),
(34, 6, 'Pendidikan Bahasa Inggris'),
(35, 6, 'Pendidikan Ekonomi'),
(36, 6, 'Pendidikan Pancasila Dan Kewarganegaraan'),
(37, 6, 'Bimbingan dan Konseling'),
(38, 6, 'Pendidikan Guru SD'),
(39, 6, 'Pendidikan Luar Sekolah'),
(40, 6, 'Pendidikan Teknik Mesin'),
(41, 6, 'Pendidikan Jasmani, Kesehatan dan Rekreasi'),
(42, 6, 'Pendidikan Bahasa dan Sastra Indonesia Daerah'),
(43, 7, 'Ilmu Administrasi Negara'),
(44, 7, 'Sosiologi'),
(45, 7, 'Ilmu Komunikasi'),
(46, 7, 'Ilmu Hubungan Internasional'),
(47, 8, 'Kimia'),
(48, 8, 'Ilmu Kelautan'),
(49, 8, 'Matematika'),
(50, 8, 'Fisika'),
(51, 8, 'Biologi'),
(52, 8, 'Farmasi'),
(53, 9, 'Teknik Informatika'),
(54, 9, 'Sistem Komputer'),
(55, 9, 'Sistem Informasi'),
(56, 10, 'Ilmu Kesehatan Masyarakat'),
(57, 10, 'Kesehatan Lingkungan'),
(58, 10, 'Gizi');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(11) NOT NULL,
  `blok` varchar(50) NOT NULL,
  `lantai` int(11) NOT NULL,
  `nomor` int(11) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `blok`, `lantai`, `nomor`, `kapasitas`, `jenis_kelamin`) VALUES
(14, 'A', 1, 1, 2, 'Laki-laki'),
(15, 'A', 1, 2, 2, 'Laki-laki'),
(16, 'A', 1, 3, 1, 'Laki-laki'),
(17, 'A', 1, 4, 2, 'Laki-laki'),
(18, 'A', 1, 5, 2, 'Laki-laki'),
(19, 'A', 1, 6, 1, 'Laki-laki'),
(20, 'A', 1, 7, 2, 'Laki-laki'),
(21, 'A', 1, 8, 2, 'Laki-laki'),
(22, 'B', 1, 1, 2, 'Laki-laki'),
(23, 'B', 1, 2, 2, 'Laki-laki'),
(24, 'B', 1, 3, 2, 'Laki-laki'),
(25, 'B', 1, 4, 2, 'Laki-laki'),
(26, 'B', 1, 5, 2, 'Laki-laki'),
(27, 'B', 1, 6, 2, 'Laki-laki'),
(28, 'B', 1, 7, 2, 'Laki-laki'),
(29, 'B', 1, 8, 2, 'Laki-laki'),
(30, 'C', 1, 1, 2, 'Laki-laki'),
(31, 'C', 1, 2, 2, 'Laki-laki'),
(32, 'C', 1, 3, 2, 'Laki-laki'),
(33, 'C', 1, 4, 2, 'Laki-laki'),
(34, 'C', 1, 5, 2, 'Laki-laki'),
(35, 'C', 1, 6, 2, 'Laki-laki'),
(36, 'C', 1, 7, 2, 'Laki-laki'),
(37, 'C', 1, 8, 2, 'Laki-laki'),
(38, 'A', 2, 1, 2, 'Laki-laki'),
(39, 'A', 2, 2, 2, 'Laki-laki'),
(40, 'A', 2, 3, 2, 'Laki-laki'),
(41, 'A', 2, 4, 2, 'Laki-laki'),
(42, 'A', 2, 5, 2, 'Laki-laki'),
(43, 'A', 2, 6, 2, 'Laki-laki'),
(44, 'A', 2, 7, 2, 'Laki-laki'),
(45, 'A', 2, 8, 2, 'Laki-laki'),
(46, 'B', 2, 1, 2, 'Laki-laki'),
(47, 'B', 2, 2, 2, 'Laki-laki'),
(48, 'B', 2, 3, 2, 'Laki-laki'),
(49, 'B', 2, 4, 2, 'Laki-laki'),
(50, 'B', 2, 5, 2, 'Laki-laki'),
(51, 'B', 2, 6, 2, 'Laki-laki'),
(52, 'B', 2, 7, 2, 'Laki-laki'),
(53, 'B', 2, 8, 2, 'Laki-laki'),
(54, 'C', 2, 1, 2, 'Laki-laki'),
(55, 'C', 2, 2, 2, 'Laki-laki'),
(56, 'C', 2, 3, 2, 'Laki-laki'),
(57, 'C', 2, 4, 2, 'Laki-laki'),
(58, 'C', 2, 5, 2, 'Laki-laki'),
(59, 'C', 2, 6, 2, 'Laki-laki'),
(60, 'C', 2, 7, 2, 'Laki-laki'),
(61, 'C', 2, 8, 2, 'Laki-laki'),
(62, 'A', 3, 1, 2, 'Laki-laki'),
(63, 'A', 3, 2, 2, 'Laki-laki'),
(64, 'A', 3, 3, 2, 'Laki-laki'),
(65, 'A', 3, 4, 2, 'Laki-laki'),
(66, 'A', 3, 5, 2, 'Laki-laki'),
(67, 'A', 3, 6, 2, 'Laki-laki'),
(68, 'A', 3, 7, 2, 'Laki-laki'),
(69, 'A', 3, 8, 2, 'Laki-laki'),
(70, 'B', 3, 1, 2, 'Laki-laki'),
(71, 'B', 3, 2, 2, 'Laki-laki'),
(72, 'B', 3, 3, 2, 'Laki-laki'),
(73, 'B', 3, 4, 2, 'Laki-laki'),
(74, 'B', 3, 5, 2, 'Laki-laki'),
(75, 'B', 3, 6, 2, 'Laki-laki'),
(76, 'B', 3, 7, 2, 'Laki-laki'),
(77, 'B', 3, 8, 2, 'Laki-laki'),
(78, 'C', 3, 1, 2, 'Laki-laki'),
(79, 'C', 3, 2, 2, 'Laki-laki'),
(80, 'C', 3, 3, 2, 'Laki-laki'),
(81, 'C', 3, 4, 2, 'Laki-laki'),
(82, 'C', 3, 5, 2, 'Laki-laki'),
(83, 'C', 3, 6, 2, 'Laki-laki'),
(84, 'C', 3, 7, 2, 'Laki-laki'),
(85, 'C', 3, 8, 2, 'Laki-laki'),
(86, 'A', 4, 1, 2, 'Laki-laki'),
(87, 'A', 4, 2, 2, 'Laki-laki'),
(88, 'A', 4, 3, 2, 'Laki-laki'),
(89, 'A', 4, 4, 2, 'Laki-laki'),
(90, 'A', 4, 5, 2, 'Laki-laki'),
(91, 'A', 4, 6, 2, 'Laki-laki'),
(92, 'A', 4, 7, 2, 'Laki-laki'),
(93, 'A', 4, 8, 2, 'Laki-laki'),
(94, 'B', 4, 1, 2, 'Laki-laki'),
(95, 'B', 4, 2, 2, 'Laki-laki'),
(96, 'B', 4, 3, 2, 'Laki-laki'),
(97, 'B', 4, 4, 2, 'Laki-laki'),
(98, 'B', 4, 5, 2, 'Laki-laki'),
(99, 'B', 4, 6, 2, 'Laki-laki'),
(100, 'B', 4, 7, 2, 'Laki-laki'),
(101, 'B', 4, 8, 2, 'Laki-laki'),
(102, 'C', 4, 1, 2, 'Laki-laki'),
(103, 'C', 4, 2, 2, 'Laki-laki'),
(104, 'C', 4, 3, 2, 'Laki-laki'),
(105, 'C', 4, 4, 2, 'Laki-laki'),
(106, 'C', 4, 5, 2, 'Laki-laki'),
(107, 'C', 4, 6, 2, 'Laki-laki'),
(108, 'C', 4, 7, 2, 'Laki-laki'),
(109, 'C', 4, 8, 2, 'Laki-laki'),
(110, 'A', 5, 1, 2, 'Laki-laki'),
(111, 'A', 5, 2, 2, 'Laki-laki'),
(112, 'A', 5, 3, 2, 'Laki-laki'),
(113, 'A', 5, 4, 2, 'Laki-laki'),
(114, 'A', 5, 5, 2, 'Laki-laki'),
(115, 'A', 5, 6, 2, 'Laki-laki'),
(116, 'A', 5, 7, 2, 'Laki-laki'),
(117, 'A', 5, 8, 2, 'Laki-laki'),
(118, 'B', 5, 1, 2, 'Laki-laki'),
(119, 'B', 5, 2, 2, 'Laki-laki'),
(120, 'B', 5, 3, 2, 'Laki-laki'),
(121, 'B', 5, 4, 2, 'Laki-laki'),
(122, 'B', 5, 5, 2, 'Laki-laki'),
(123, 'B', 5, 6, 2, 'Laki-laki'),
(124, 'B', 5, 7, 2, 'Laki-laki'),
(125, 'B', 5, 8, 2, 'Laki-laki'),
(126, 'C', 5, 1, 2, 'Laki-laki'),
(127, 'C', 5, 2, 2, 'Laki-laki'),
(128, 'C', 5, 3, 2, 'Laki-laki'),
(129, 'C', 5, 4, 2, 'Laki-laki'),
(130, 'C', 5, 5, 2, 'Laki-laki'),
(131, 'C', 5, 6, 2, 'Laki-laki'),
(132, 'C', 5, 7, 2, 'Laki-laki'),
(133, 'C', 5, 8, 2, 'Laki-laki'),
(134, 'A', 1, 1, 2, 'Perempuan'),
(135, 'A', 1, 2, 2, 'Perempuan'),
(136, 'A', 1, 3, 2, 'Perempuan'),
(137, 'A', 1, 4, 2, 'Perempuan'),
(138, 'A', 1, 5, 2, 'Perempuan'),
(139, 'A', 1, 6, 2, 'Perempuan'),
(140, 'A', 1, 7, 2, 'Perempuan'),
(141, 'A', 1, 8, 2, 'Perempuan'),
(142, 'B', 1, 1, 2, 'Perempuan'),
(143, 'B', 1, 2, 2, 'Perempuan'),
(144, 'B', 1, 3, 2, 'Perempuan'),
(145, 'B', 1, 4, 2, 'Perempuan'),
(146, 'B', 1, 5, 2, 'Perempuan'),
(147, 'B', 1, 6, 2, 'Perempuan'),
(148, 'B', 1, 7, 2, 'Perempuan'),
(149, 'B', 1, 8, 2, 'Perempuan'),
(150, 'C', 1, 1, 2, 'Perempuan'),
(151, 'C', 1, 2, 2, 'Perempuan'),
(152, 'C', 1, 3, 2, 'Perempuan'),
(153, 'C', 1, 4, 2, 'Perempuan'),
(154, 'C', 1, 5, 2, 'Perempuan'),
(155, 'C', 1, 6, 2, 'Perempuan'),
(156, 'C', 1, 7, 2, 'Perempuan'),
(157, 'C', 1, 8, 2, 'Perempuan'),
(158, 'A', 2, 1, 2, 'Perempuan'),
(159, 'A', 2, 2, 2, 'Perempuan'),
(160, 'A', 2, 3, 2, 'Perempuan'),
(161, 'A', 2, 4, 2, 'Perempuan'),
(162, 'A', 2, 5, 2, 'Perempuan'),
(163, 'A', 2, 6, 2, 'Perempuan'),
(164, 'A', 2, 7, 2, 'Perempuan'),
(165, 'A', 2, 8, 2, 'Perempuan'),
(166, 'B', 2, 1, 2, 'Perempuan'),
(167, 'B', 2, 2, 2, 'Perempuan'),
(168, 'B', 2, 3, 2, 'Perempuan'),
(169, 'B', 2, 4, 2, 'Perempuan'),
(170, 'B', 2, 5, 2, 'Perempuan'),
(171, 'B', 2, 6, 2, 'Perempuan'),
(172, 'B', 2, 7, 2, 'Perempuan'),
(173, 'B', 2, 8, 2, 'Perempuan'),
(174, 'C', 2, 1, 2, 'Perempuan'),
(175, 'C', 2, 2, 2, 'Perempuan'),
(176, 'C', 2, 3, 2, 'Perempuan'),
(177, 'C', 2, 4, 2, 'Perempuan'),
(178, 'C', 2, 5, 2, 'Perempuan'),
(179, 'C', 2, 6, 2, 'Perempuan'),
(180, 'C', 2, 7, 2, 'Perempuan'),
(181, 'C', 2, 8, 2, 'Perempuan'),
(182, 'A', 3, 1, 2, 'Perempuan'),
(183, 'A', 3, 2, 2, 'Perempuan'),
(184, 'A', 3, 3, 2, 'Perempuan'),
(185, 'A', 3, 4, 2, 'Perempuan'),
(186, 'A', 3, 5, 2, 'Perempuan'),
(187, 'A', 3, 6, 2, 'Perempuan'),
(188, 'A', 3, 7, 2, 'Perempuan'),
(189, 'A', 3, 8, 2, 'Perempuan'),
(190, 'B', 3, 1, 2, 'Perempuan'),
(191, 'B', 3, 2, 2, 'Perempuan'),
(192, 'B', 3, 3, 2, 'Perempuan'),
(193, 'B', 3, 4, 2, 'Perempuan'),
(194, 'B', 3, 5, 2, 'Perempuan'),
(195, 'B', 3, 6, 2, 'Perempuan'),
(196, 'B', 3, 7, 2, 'Perempuan'),
(197, 'B', 3, 8, 2, 'Perempuan'),
(198, 'C', 3, 1, 2, 'Perempuan'),
(199, 'C', 3, 2, 2, 'Perempuan'),
(200, 'C', 3, 3, 2, 'Perempuan'),
(201, 'C', 3, 4, 2, 'Perempuan'),
(202, 'C', 3, 5, 2, 'Perempuan'),
(203, 'C', 3, 6, 2, 'Perempuan'),
(204, 'C', 3, 7, 2, 'Perempuan'),
(205, 'C', 3, 8, 2, 'Perempuan'),
(206, 'A', 4, 1, 2, 'Perempuan'),
(207, 'A', 4, 2, 2, 'Perempuan'),
(208, 'A', 4, 3, 2, 'Perempuan'),
(209, 'A', 4, 4, 2, 'Perempuan'),
(210, 'A', 4, 5, 2, 'Perempuan'),
(211, 'A', 4, 6, 2, 'Perempuan'),
(212, 'A', 4, 7, 2, 'Perempuan'),
(213, 'A', 4, 8, 2, 'Perempuan'),
(214, 'B', 4, 1, 2, 'Perempuan'),
(215, 'B', 4, 2, 2, 'Perempuan'),
(216, 'B', 4, 3, 2, 'Perempuan'),
(217, 'B', 4, 4, 2, 'Perempuan'),
(218, 'B', 4, 5, 2, 'Perempuan'),
(219, 'B', 4, 6, 2, 'Perempuan'),
(220, 'B', 4, 7, 2, 'Perempuan'),
(221, 'B', 4, 8, 2, 'Perempuan'),
(222, 'C', 4, 1, 2, 'Perempuan'),
(223, 'C', 4, 2, 2, 'Perempuan'),
(224, 'C', 4, 3, 2, 'Perempuan'),
(225, 'C', 4, 4, 2, 'Perempuan'),
(226, 'C', 4, 5, 2, 'Perempuan'),
(227, 'C', 4, 6, 2, 'Perempuan'),
(228, 'C', 4, 7, 2, 'Perempuan'),
(229, 'C', 4, 8, 2, 'Perempuan'),
(230, 'A', 5, 1, 2, 'Perempuan'),
(231, 'A', 5, 2, 2, 'Perempuan'),
(232, 'A', 5, 3, 2, 'Perempuan'),
(233, 'A', 5, 4, 2, 'Perempuan'),
(234, 'A', 5, 5, 2, 'Perempuan'),
(235, 'A', 5, 6, 2, 'Perempuan'),
(236, 'A', 5, 7, 2, 'Perempuan'),
(237, 'A', 5, 8, 2, 'Perempuan'),
(238, 'B', 5, 1, 2, 'Perempuan'),
(239, 'B', 5, 2, 2, 'Perempuan'),
(240, 'B', 5, 3, 2, 'Perempuan'),
(241, 'B', 5, 4, 2, 'Perempuan'),
(242, 'B', 5, 5, 2, 'Perempuan'),
(243, 'B', 5, 6, 2, 'Perempuan'),
(244, 'B', 5, 7, 2, 'Perempuan'),
(245, 'B', 5, 8, 2, 'Perempuan'),
(246, 'C', 5, 1, 2, 'Perempuan'),
(247, 'C', 5, 2, 2, 'Perempuan'),
(248, 'C', 5, 3, 2, 'Perempuan'),
(249, 'C', 5, 4, 2, 'Perempuan'),
(250, 'C', 5, 5, 2, 'Perempuan'),
(251, 'C', 5, 6, 2, 'Perempuan'),
(252, 'C', 5, 7, 2, 'Perempuan'),
(253, 'C', 5, 8, 2, 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `kamar_sewa`
--

CREATE TABLE `kamar_sewa` (
  `id_sewa` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_sewa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamar_sewa`
--

INSERT INTO `kamar_sewa` (`id_sewa`, `id_kamar`, `id_user`, `tanggal_sewa`) VALUES
(9, 19, 26, '2019-12-20'),
(10, 16, 27, '2019-12-21');

-- --------------------------------------------------------

--
-- Table structure for table `pelaporan`
--

CREATE TABLE `pelaporan` (
  `id_lapor` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `isi_laporan` text NOT NULL,
  `tanggal_lapor` date NOT NULL,
  `foto_lapor` varchar(500) NOT NULL,
  `status_lapor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `perpanjang_bayar`
--

CREATE TABLE `perpanjang_bayar` (
  `id_perpanjang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `tanggal_upload_panjang` date NOT NULL,
  `foto_bukti_perpanjang` varchar(500) NOT NULL,
  `status_perpanjang` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pindah_kamar`
--

CREATE TABLE `pindah_kamar` (
  `id_pindah` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `id_kamar_pindah` int(11) NOT NULL,
  `alasan` text NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `status_pengajuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temp_kamar_sewa`
--

CREATE TABLE `temp_kamar_sewa` (
  `id_temp` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_tempa` date NOT NULL,
  `status_sewa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nim` text NOT NULL,
  `nama` text NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `email` text NOT NULL,
  `fakultas` text NOT NULL,
  `jurusan` text NOT NULL,
  `password` text NOT NULL,
  `agama` text NOT NULL,
  `alamat` text NOT NULL,
  `gol_dar` text NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `ortu_wali` text NOT NULL,
  `no_hp_ortu` varchar(13) NOT NULL,
  `foto_profil` text NOT NULL,
  `role` text NOT NULL,
  `status` text NOT NULL,
  `tanggal_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nim`, `nama`, `jenis_kelamin`, `email`, `fakultas`, `jurusan`, `password`, `agama`, `alamat`, `gol_dar`, `no_hp`, `ortu_wali`, `no_hp_ortu`, `foto_profil`, `role`, `status`, `tanggal_lahir`) VALUES
(3, '1', 'admin apartemen', '', '', '', '', 'admin', '', '', '', '', '', '', '../assets/foto_user/IMG_20170427_122122.jpg', 'admin', '', '0000-00-00'),
(26, '09031181520019', 'ridwan', 'Laki-laki', 'seasroaring@gmail.com', 'Ilmu Komputer', 'Sistem Informasi', 'ariana', 'islam', 'Jln. Pangeran Antasari no.211 RT.07 RW.02 kelurahan 14 illir', 'AB', '081379835221', 'budi', '082749573829', '../assets/foto_user/defaul.png', 'mahasiswa', 'Penyewa', '1997-11-17'),
(27, '090311627347', 'budi', 'Laki-laki', 'ridwanariana4@gmail.com', 'Keguruan dan Ilmu Pendidikan', 'Pendidikan Pancasila Dan Kewarganegaraan', 'VVWUL7LU', 'islam', 'Jln. Segaran no.321 rt.09 rw.02', 'O', '081274857364', 'tina', '081937483728', '../assets/foto_user/defaul.png', 'mahasiswa', 'Penyewa', '1999-11-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berhenti_sewa`
--
ALTER TABLE `berhenti_sewa`
  ADD PRIMARY KEY (`id_berhenti`);

--
-- Indexes for table `bukti_bayar`
--
ALTER TABLE `bukti_bayar`
  ADD PRIMARY KEY (`id_bukti`);

--
-- Indexes for table `data_pribadi`
--
ALTER TABLE `data_pribadi`
  ADD PRIMARY KEY (`id_pribadi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indexes for table `history_perpanjangan`
--
ALTER TABLE `history_perpanjangan`
  ADD PRIMARY KEY (`id_jejak`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indexes for table `kamar_sewa`
--
ALTER TABLE `kamar_sewa`
  ADD PRIMARY KEY (`id_sewa`);

--
-- Indexes for table `pelaporan`
--
ALTER TABLE `pelaporan`
  ADD PRIMARY KEY (`id_lapor`);

--
-- Indexes for table `perpanjang_bayar`
--
ALTER TABLE `perpanjang_bayar`
  ADD PRIMARY KEY (`id_perpanjang`);

--
-- Indexes for table `pindah_kamar`
--
ALTER TABLE `pindah_kamar`
  ADD PRIMARY KEY (`id_pindah`);

--
-- Indexes for table `temp_kamar_sewa`
--
ALTER TABLE `temp_kamar_sewa`
  ADD PRIMARY KEY (`id_temp`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berhenti_sewa`
--
ALTER TABLE `berhenti_sewa`
  MODIFY `id_berhenti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bukti_bayar`
--
ALTER TABLE `bukti_bayar`
  MODIFY `id_bukti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `data_pribadi`
--
ALTER TABLE `data_pribadi`
  MODIFY `id_pribadi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `history_perpanjangan`
--
ALTER TABLE `history_perpanjangan`
  MODIFY `id_jejak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;

--
-- AUTO_INCREMENT for table `kamar_sewa`
--
ALTER TABLE `kamar_sewa`
  MODIFY `id_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pelaporan`
--
ALTER TABLE `pelaporan`
  MODIFY `id_lapor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `perpanjang_bayar`
--
ALTER TABLE `perpanjang_bayar`
  MODIFY `id_perpanjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pindah_kamar`
--
ALTER TABLE `pindah_kamar`
  MODIFY `id_pindah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `temp_kamar_sewa`
--
ALTER TABLE `temp_kamar_sewa`
  MODIFY `id_temp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_pribadi`
--
ALTER TABLE `data_pribadi`
  ADD CONSTRAINT `data_pribadi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
