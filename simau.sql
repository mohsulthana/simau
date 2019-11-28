-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2019 at 03:16 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.1.29

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
(1, 2, '2019-11-08', '../assets/foto_bukti/Screenshot (18).png', 3),
(2, 4, '2019-11-19', '../assets/foto_bukti/Screenshot (4).png', 1),
(3, 9, '2019-11-26', '../assets/foto_bukti/96769.jpg', 3),
(4, 11, '2019-11-28', '../assets/foto_bukti/96769.jpg', 11);

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

--
-- Dumping data for table `history_perpanjangan`
--

INSERT INTO `history_perpanjangan` (`id_jejak`, `id_user`, `id_kamar`, `tanggal_menyewa`, `status_history`) VALUES
(2, 2, 2, '2019-11-09', 'Lanjut Menyewa'),
(3, 9, 3, '2019-11-26', 'Lanjut Menyewa');

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
(1, 'A', 1, 1, 1, 'Laki-laki'),
(2, 'B', 1, 1, 1, 'Laki-laki'),
(3, 'A', 1, 2, 1, 'Laki-laki'),
(4, 'B', 1, 2, 2, 'Laki-laki'),
(5, 'A', 1, 1, 2, 'Perempuan'),
(6, 'A', 1, 2, 2, 'Perempuan'),
(7, 'B', 1, 1, 2, 'Perempuan'),
(9, 'B', 1, 2, 2, 'Perempuan'),
(10, 'C', 1, 1, 2, ''),
(11, 'C', 1, 1, 1, 'Laki-laki');

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
(3, 2, 2, '2020-11-25'),
(4, 3, 9, '2020-11-26'),
(5, 3, 9, '2019-11-26'),
(6, 11, 11, '2019-11-28'),
(7, 11, 11, '2019-11-28');

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

--
-- Dumping data for table `pelaporan`
--

INSERT INTO `pelaporan` (`id_lapor`, `id_user`, `isi_laporan`, `tanggal_lapor`, `foto_lapor`, `status_lapor`) VALUES
(1, 2, 'keran air mati', '2019-11-09', '../assets/foto_lapor/Screenshot (22).png', 'Telah Ditanggapi'),
(2, 2, 'kasur empuk sekali, nggak nyaman saya disini...  :<', '2019-11-19', '../assets/foto_lapor/Screenshot (46).png', 'Telah Ditanggapi');

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

--
-- Dumping data for table `perpanjang_bayar`
--

INSERT INTO `perpanjang_bayar` (`id_perpanjang`, `id_user`, `id_kamar`, `tanggal_upload_panjang`, `foto_bukti_perpanjang`, `status_perpanjang`) VALUES
(1, 2, 2, '2020-11-03', '../assets/foto_perpanjangan/cara install ms 2013.PNG', 'Telah Diverifikasi'),
(2, 9, 3, '2020-11-20', '../assets/foto_perpanjangan/96769.jpg', 'Telah Diverifikasi');

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

--
-- Dumping data for table `pindah_kamar`
--

INSERT INTO `pindah_kamar` (`id_pindah`, `id_user`, `id_kamar`, `id_kamar_pindah`, `alasan`, `tanggal_pengajuan`, `status_pengajuan`) VALUES
(1, 2, 3, 2, 'karena disini banyak nyamuk(contoh bae ini hehe)...', '2019-11-17', 'Diterima'),
(2, 2, 2, 0, 'gerah', '2020-11-02', '');

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

--
-- Dumping data for table `temp_kamar_sewa`
--

INSERT INTO `temp_kamar_sewa` (`id_temp`, `id_kamar`, `id_user`, `tanggal_tempa`, `status_sewa`) VALUES
(1, 1, 4, '2019-11-19', 'Menempa');

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
(2, '0903127384732', 'gudi', 'Laki-laki', 'seasroaring@gmail.com', 'Ilmu Sosial dan Ilmu Politik', 'Sosiologi', 'bertahan', 'buddha', 'a', 'AB', '3', 'a', '3', '../assets/foto_user/IMG_20170427_122122.jpg', 'mahasiswa', 'Penyewa', '2019-10-08'),
(3, '1', 'admin apartemen', '', '', '', '', 'admin', '', '', '', '', '', '', '../assets/foto_user/IMG_20170427_122122.jpg', 'admin', '', '0000-00-00'),
(4, '090326473827', 'anto koyo', 'Laki-laki', 'seasroaring@gmail.com', 'Ilmu Sosial dan Ilmu Politik', 'Ilmu Komunikasi', 'otna', 'islam', 'jln.pandean', 'A', '081273849372', 'sinta', '089936472635', '../assets/foto_user/IMG_20170427_122122.jpg', 'mahasiswa', 'lengkap', '2019-11-03'),
(5, '090127463827', 'budi', 'Laki-laki', 'budi12@gmail.com', 'Ilmu Sosial dan Ilmu Politik', 'Sosiologi', 'budi', 'islam', 'jln.kuningan', 'B', '08992764536', 'yanto', '081736483927', '../assets/foto_user/IMG_20170427_122122.jpg', 'mahasiswa', 'lengkap', '2019-11-01'),
(6, '1', 'a', 'Laki-laki', 'seasroaring@gmail.com', 'Hukum', 'Ilmu Hukum', '7NOSQTWZ', 'islam', 'vzs', 'B', '08042804', 'dadada', '23525', '../assets/foto_user/defaul.png', 'mahasiswa', 'lengkap', '2019-11-22'),
(7, '09031181520019', 'ridwan', '', 'seasroaring@gmail.com', '', '', 'K7WM69MQ', '', '', '', '', '', '', '../assets/foto_user/defaul.png', 'mahasiswa', 'belum lengkap', '0000-00-00'),
(8, '090312736237', 'rita', 'Perempuan', 'ridwanariana4@gmail.com', 'Keguruan dan Ilmu Pendidikan', 'Pendidikan Sejarah', 'wow', 'islam', 'jln. landrat', 'A', '081374938273', 'sukinem', '081347483927', '../assets/foto_user/defaul.png', 'mahasiswa', 'lengkap', '1997-06-12'),
(9, '09031381520083', 'M. Aziz Kurniawan', 'Laki-laki', 'azizknw97@gmail.com', 'Hukum', 'Ilmu Hukum', 'katakuri', 'islam', 'kjhibi', 'A', '080808', 'ufttycy', 'nhgcghc', '../assets/foto_user/defaul.png', 'mahasiswa', 'Penyewa', '2019-11-30'),
(10, '987654321', 'DERDI KURNIAWAN', '', 'derdi.9798@gmail.com', '', '', '6B6Z1P3V', '', '', '', '', '', '', '../assets/foto_user/defaul.png', 'mahasiswa', 'belum lengkap', '0000-00-00'),
(11, '1', 'hanum', 'Laki-laki', 'azizknw97@gmail.com', 'Hukum', 'Ilmu Hukum', 'K8WEIEN8', 'kong fu chu', 'kebun bunga', 'O', '11', 'desmawan', 'sultana', '../assets/foto_user/defaul.png', 'mahasiswa', 'Penyewa', '2019-11-02'),
(12, '234', 'okky', 'Laki-laki', 'azizknw97@gmail.com', 'Hukum', 'Ilmu Hukum', 'MACLZFEV', 'kristen', 'fafsa', 'A', '43242', 'sgsggdgews', 'fdsgs', '../assets/foto_user/defaul.png', 'mahasiswa', 'lengkap', '2019-11-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bukti_bayar`
--
ALTER TABLE `bukti_bayar`
  ADD PRIMARY KEY (`id_bukti`);

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
-- AUTO_INCREMENT for table `bukti_bayar`
--
ALTER TABLE `bukti_bayar`
  MODIFY `id_bukti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `history_perpanjangan`
--
ALTER TABLE `history_perpanjangan`
  MODIFY `id_jejak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kamar_sewa`
--
ALTER TABLE `kamar_sewa`
  MODIFY `id_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id_temp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
