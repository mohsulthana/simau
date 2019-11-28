-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2019 at 03:50 AM
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
(2, '0903127384732', 'gudi', 'Laki-laki', 'gudigudi@gmail.com', 'Ilmu Sosial dan Ilmu Politik', 'Sosiologi', 'bertahan', 'buddha', 'a', 'AB', '3', 'a', '3', '../assets/foto_user/IMG_20170427_122122.jpg', 'mahasiswa', '', '2019-10-08'),
(3, '1', 'admin apartemen', '', '', '', '', 'admin', '', '', '', '', '', '', '../assets/foto_user/IMG_20170427_122122.jpg', 'admin', '', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
