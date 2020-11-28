-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2020 at 06:31 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_eccistts`
--

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_periode` int(10) NOT NULL,
  `id_kelas` int(10) NOT NULL,
  `level_ecc` varchar(10) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam_awal` varchar(10) NOT NULL,
  `jam_akhir` varchar(10) NOT NULL,
  `kuota` int(10) NOT NULL,
  `dosen` varchar(10) NOT NULL,
  `status_kelas` varchar(2) NOT NULL COMMENT '0 - Tidak aktif, 1 - Aktif',
  `id_ruangkelas` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_periode`, `id_kelas`, `level_ecc`, `nama_kelas`, `hari`, `jam_awal`, `jam_akhir`, `kuota`, `dosen`, `status_kelas`, `id_ruangkelas`) VALUES
(15, 632, 'Level 1', 'A', 'Senin', '06:30', '08:00', 25, 'agus', '1', 21),
(15, 633, 'Level 2', 'A', 'Selasa', '06:30', '08:00', 25, 'agus', '1', 15),
(15, 634, 'Level 2', 'B', 'Rabu', '06:30', '08:00', 25, 'endang', '1', 15),
(15, 635, 'Level 2', 'C', 'Kamis', '06:30', '08:00', 25, 'endang', '1', 15),
(15, 636, 'Level 2', 'D', 'Jumat', '06:30', '08:00', 25, 'endang', '1', 15),
(15, 637, 'Level 3', 'A', 'Senin', '06:30', '08:00', 25, 'kevin', '1', 16),
(15, 638, 'Level 3', 'B', 'Selasa', '06:30', '08:00', 25, 'kevin', '1', 16),
(15, 639, 'Level 3', 'C', 'Rabu', '06:30', '08:00', 25, 'kevin', '1', 16),
(15, 640, 'Level 3', 'D', 'Jumat', '06:30', '08:00', 25, 'kevin', '1', 16),
(15, 641, 'Level 4', 'A', 'Senin', '06:30', '08:00', 25, 'jeni', '1', 19),
(15, 642, 'Level 4', 'B', 'Selasa', '06:30', '08:00', 25, 'jeni', '1', 20),
(15, 643, 'Level 4', 'C', 'Rabu', '06:30', '08:00', 25, 'jeni', '1', 19),
(15, 644, 'Level 4', 'D', 'Kamis', '06:30', '08:00', 25, 'jeni', '1', 19),
(15, 645, 'Level 4', 'E', 'Jumat', '06:30', '08:00', 25, 'agus', '1', 19),
(15, 646, 'Level 1', 'B', '', '06:30', '08:00', 0, '-', '0', 0),
(15, 647, 'Level 1', 'C', '', '06:30', '08:00', 0, '-', '0', 0),
(15, 648, 'Level 1', 'D', '', '06:30', '08:00', 0, '-', '0', 0),
(15, 649, 'Level 1', 'E', '', '06:30', '08:00', 0, '-', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kelas_mhs`
--

CREATE TABLE `kelas_mhs` (
  `id_klsmhs` int(10) NOT NULL,
  `id_periode` int(10) NOT NULL,
  `nrp` varchar(10) NOT NULL,
  `id_kelas` int(10) NOT NULL,
  `id_nilai` int(10) NOT NULL,
  `status_klsmhs` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_periode` int(10) NOT NULL,
  `nrp` varchar(9) NOT NULL,
  `nama_mhs` varchar(30) NOT NULL,
  `status_mhs` varchar(2) NOT NULL COMMENT '0 - Mhs nonaktif, 1 - mhs aktif ECC'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_periode`, `nrp`, `nama_mhs`, `status_mhs`) VALUES
(16, '216170333', 'Radwitya Prasidhi Taufik Putra', '0'),
(16, '217116607', 'Ivan', '0'),
(16, '217140071', 'Eric San Fokalie', '0'),
(16, '217180382', 'Alfira Jessica', '0'),
(16, '218116687', 'Gilberto Joshua Ramiro Abdinta', '0'),
(16, '218116705', 'Vincent Verrianto Chang', '0'),
(16, '218116756', 'I Gede Sriwibawa', '0'),
(16, '218120681', 'Siva Wahyu Harijanto', '0'),
(16, '218170422', 'Robert Buwono Kencono', '0'),
(16, '218170423', 'Rozak Lintang Martono', '0'),
(16, '218170435', 'Fandy Gunawan', '0'),
(16, '218170451', 'Wine Novita Mintono', '0'),
(16, '218170452', 'Yen Yen Putri Novena Kohar', '0'),
(16, '218180418', 'Kevin Hongary', '0'),
(16, '218180426', 'Wira Rafi Aji Pranata', '0'),
(16, '218180442', 'Stefanus Sanjaya', '0'),
(16, '219102600', 'Alwin', '0'),
(16, '219102603', 'Johan Stefanus Sanjaya', '0'),
(16, '219102606', 'Laurentius Bima Anggoro', '0'),
(16, '219116779', 'Bryan Andrew Wijaya', '0'),
(16, '219116786', 'Farhan Faisal Zainul Mustaqin', '0'),
(16, '219116789', 'Jonathan Arelio Bevan', '0'),
(16, '219116790', 'Kevin Ericko', '0'),
(16, '219116792', 'M. Abiansyah Putra Perdana A', '0'),
(16, '219116793', 'Maria Andreas Iskandar', '0'),
(16, '219116799', 'Albertus Verrel Rhesa Hardiant', '0'),
(16, '219116802', 'Farel Hansel Taner', '0'),
(16, '219116803', 'Felix Lung Santoso', '0'),
(16, '219116809', 'Ivan Yudinata Purwanto', '0'),
(16, '219116822', 'Bryant Melvern Pirih', '0'),
(16, '219116842', 'Russel Joshua Chandra', '0'),
(16, '219116847', 'Andrian Sugianto Putra', '0'),
(16, '219116849', 'Christian Evan', '0'),
(16, '219116857', 'Nicholas Tjandra', '0'),
(16, '219116860', 'Steven Liem', '0'),
(16, '219116861', 'Valentino Fransiskus Irawan', '0'),
(16, '219116862', 'Vincentius Alexander', '0'),
(16, '219116864', 'Yen Eduardo Nathan', '0'),
(16, '219120694', 'Naufal Bima Saputra', '0'),
(16, '219140089', 'Benedict Michael Maximus', '0'),
(16, '219140099', 'Victor Irviandi Pascalis', '0'),
(16, '219140100', 'Eugenius Ferera Herdany', '0'),
(16, '219170481', 'Jessica Ivana Winata', '0'),
(16, '219170492', 'Samuel Irawan', '0'),
(16, '219180446', 'Albert Wijaya', '0'),
(16, '219180449', 'Ben Auguere', '0'),
(16, '219180456', 'Hans Felix', '0'),
(16, '219180457', 'Hansen Valentino', '0'),
(16, '219180459', 'Jessica Anjani Viliang', '0'),
(16, '219180463', 'M.fierza Eries Erlangga', '0'),
(16, '219180465', 'Michelle Annabelle Surya Atmaj', '0'),
(16, '219180468', 'William Morgen', '0'),
(16, '219180478', 'Ivan Aubrey Adianto', '0'),
(16, '219180480', 'Jestine Siewij', '0');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` varchar(10) NOT NULL,
  `nrp` varchar(10) NOT NULL,
  `nilai_uts` int(10) NOT NULL,
  `nilai_uas` int(10) NOT NULL,
  `nilai_akhir` int(10) NOT NULL,
  `grade` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE `periode` (
  `id_periode` int(10) NOT NULL,
  `semester` varchar(20) NOT NULL COMMENT 'Gasal / Genap',
  `thn_akademik_awal` int(10) NOT NULL COMMENT 'tahun akademik awal YYYY',
  `thn_akademik_akhir` int(10) NOT NULL COMMENT 'tahun akademik akhir/YYYY',
  `status_periode` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`id_periode`, `semester`, `thn_akademik_awal`, `thn_akademik_akhir`, `status_periode`) VALUES
(1, 'Tidak diketahui', 0, 0, 0),
(9, 'Gasal', 2017, 2018, 0),
(10, 'Genap', 2017, 2018, 0),
(11, 'Gasal', 2018, 2019, 0),
(12, 'Genap', 2018, 2019, 0),
(13, 'Gasal', 2019, 2020, 0),
(15, 'Genap', 2019, 2020, 0),
(16, 'Gasal', 2020, 2021, 0),
(17, 'Genap', 2020, 2021, 1);

-- --------------------------------------------------------

--
-- Table structure for table `placement`
--

CREATE TABLE `placement` (
  `id_ptest` int(10) NOT NULL,
  `id_periode` int(10) NOT NULL,
  `nrp` varchar(9) NOT NULL,
  `nilai_ptest` int(10) NOT NULL,
  `ptest_level` int(10) NOT NULL,
  `status_kembar` int(11) NOT NULL COMMENT '0-tdk, 1-ada kembar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `placement`
--

INSERT INTO `placement` (`id_ptest`, `id_periode`, `nrp`, `nilai_ptest`, `ptest_level`, `status_kembar`) VALUES
(1, 16, '219180463', 204, 1, 1),
(2, 16, '219140099', 243, 1, 1),
(3, 16, '218120681', 267, 1, 1),
(4, 16, '219140100', 203, 1, 1),
(5, 16, '219180478', 340, 2, 1),
(6, 16, '219180465', 360, 2, 1),
(7, 16, '219180457', 355, 2, 1),
(8, 16, '219180449', 340, 2, 1),
(10, 16, '218116687', 333, 2, 1),
(11, 16, '219180468', 453, 2, 1),
(12, 16, '219170481', 444, 2, 1),
(13, 16, '219120694', 400, 2, 1),
(14, 16, '219116786', 389, 2, 1),
(16, 16, '219102603', 376, 2, 1),
(17, 16, '219102606', 355, 2, 1),
(18, 16, '219170492', 390, 2, 1),
(19, 16, '219180456', 500, 3, 1),
(20, 16, '218180442', 540, 3, 1),
(21, 16, '219116789', 555, 3, 1),
(22, 16, '219116799', 523, 3, 0),
(23, 16, '219116849', 555, 3, 1),
(24, 16, '217116607', 530, 3, 1),
(25, 16, '219116861', 500, 3, 1),
(26, 16, '219116792', 501, 3, 1),
(27, 16, '218116756', 503, 3, 1),
(28, 16, '219116803', 505, 3, 1),
(29, 16, '219116793', 521, 3, 1),
(30, 16, '218180426', 508, 3, 1),
(31, 16, '219116790', 610, 4, 1),
(32, 16, '219116847', 620, 4, 1),
(33, 16, '219116862', 689, 4, 1),
(34, 16, '218116705', 679, 4, 1),
(35, 16, '218170435', 630, 4, 1),
(36, 16, '218170423', 600, 4, 1),
(37, 16, '218170422', 666, 4, 1),
(38, 16, '218170452', 621, 4, 1),
(39, 16, '219116779', 620, 4, 1),
(40, 16, '219116802', 630, 4, 1),
(41, 16, '219116822', 640, 4, 1),
(42, 16, '219116860', 682, 4, 1),
(43, 16, '219116842', 622, 4, 1),
(44, 16, '219116864', 643, 4, 1),
(45, 16, '217140071', 653, 4, 1),
(46, 16, '219116857', 601, 4, 1),
(47, 16, '218170451', 603, 4, 1),
(48, 16, '219140089', 608, 4, 1),
(49, 16, '216170333', 607, 4, 1),
(50, 16, '218180418', 633, 4, 1),
(51, 16, '219180463', 204, 1, 0),
(52, 16, '219140099', 243, 1, 0),
(53, 16, '218120681', 267, 1, 0),
(54, 16, '219140100', 203, 1, 0),
(55, 16, '219180478', 340, 2, 0),
(56, 16, '219180480', 350, 2, 0),
(57, 16, '219180465', 360, 2, 0),
(58, 16, '219180457', 355, 2, 0),
(59, 16, '219180449', 340, 2, 0),
(60, 16, '219180446', 345, 2, 0),
(61, 16, '218116687', 333, 2, 0),
(62, 16, '219180468', 453, 2, 0),
(63, 16, '219170481', 444, 2, 0),
(64, 16, '219120694', 400, 2, 0),
(65, 16, '219180459', 430, 2, 0),
(66, 16, '219116786', 389, 2, 0),
(67, 16, '219102600', 390, 2, 0),
(68, 16, '219102603', 376, 2, 0),
(69, 16, '219102606', 355, 2, 0),
(70, 16, '219170492', 390, 2, 0),
(71, 16, '219180456', 500, 3, 0),
(72, 16, '218180442', 540, 3, 0),
(73, 16, '219116789', 555, 3, 0),
(75, 16, '219116849', 555, 3, 0),
(76, 16, '217116607', 530, 3, 0),
(77, 16, '219116861', 500, 3, 0),
(78, 16, '219116792', 501, 3, 0),
(79, 16, '218116756', 503, 3, 0),
(80, 16, '219116803', 505, 3, 0),
(81, 16, '219116793', 521, 3, 0),
(82, 16, '219116809', 555, 3, 0),
(83, 16, '218180426', 508, 3, 0),
(84, 16, '219116790', 610, 4, 0),
(85, 16, '219116847', 620, 4, 0),
(86, 16, '219116862', 689, 4, 0),
(87, 16, '218116705', 679, 4, 0),
(88, 16, '218170435', 630, 4, 0),
(89, 16, '218170423', 600, 4, 0),
(90, 16, '218170422', 666, 4, 0),
(91, 16, '218170452', 621, 4, 0),
(92, 16, '219116779', 620, 4, 0),
(93, 16, '219116802', 630, 4, 0),
(94, 16, '219116822', 640, 4, 0),
(95, 16, '219116860', 682, 4, 0),
(96, 16, '219116842', 622, 4, 0),
(97, 16, '219116864', 643, 4, 0),
(98, 16, '217140071', 653, 4, 0),
(99, 16, '219116857', 601, 4, 0),
(100, 16, '218170451', 603, 4, 0),
(101, 16, '219140089', 608, 4, 0),
(102, 16, '216170333', 607, 4, 0),
(103, 16, '218180418', 633, 4, 0),
(104, 16, '217180382', 450, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ruang_kelas`
--

CREATE TABLE `ruang_kelas` (
  `id_ruangkelas` int(10) NOT NULL,
  `nama_ruang` varchar(10) NOT NULL,
  `status_ruang` int(2) NOT NULL COMMENT '(0 - nonaktif) (1 - aktif)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruang_kelas`
--

INSERT INTO `ruang_kelas` (`id_ruangkelas`, `nama_ruang`, `status_ruang`) VALUES
(15, 'B-301', 1),
(16, 'B-302', 1),
(17, 'U-401', 1),
(18, 'U-402', 1),
(19, 'U-303', 1),
(20, 'E-301', 1),
(21, 'B-303', 1);

-- --------------------------------------------------------

--
-- Table structure for table `standard_nilaipt`
--

CREATE TABLE `standard_nilaipt` (
  `id_periode` int(11) NOT NULL,
  `level1` int(11) NOT NULL,
  `level2` int(11) NOT NULL,
  `level3` int(11) NOT NULL,
  `level4` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `standard_nilaipt`
--

INSERT INTO `standard_nilaipt` (`id_periode`, `level1`, `level2`, `level3`, `level4`) VALUES
(15, 200, 300, 400, 500);

-- --------------------------------------------------------

--
-- Table structure for table `tempkelas_mhs`
--

CREATE TABLE `tempkelas_mhs` (
  `id_periode` int(10) NOT NULL,
  `nrp` varchar(9) NOT NULL,
  `nama_mhs` varchar(100) NOT NULL,
  `level_ecc` int(10) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam_mulai` varchar(10) NOT NULL,
  `ruang_kode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `temp_placement`
--

CREATE TABLE `temp_placement` (
  `id_periode` int(10) NOT NULL,
  `nrp` varchar(9) NOT NULL,
  `nama_mhs` varchar(100) NOT NULL,
  `nilai_ptest` int(10) NOT NULL,
  `ptest_level` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `level` varchar(10) NOT NULL COMMENT 'admin - dosen',
  `status` int(2) NOT NULL COMMENT '0 - tdk aktif, 1 - aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `nama`, `level`, `status`) VALUES
('adminbaa', '8a4dffdc024fa2d9d75ffd04b3b2455c94faee8a', 'Admin BAA', 'admin', 1),
('adminecc', 'd794f4282f47ac184454539e111b7c8cf4e5b11e', 'Admin ECC', 'admin', 1),
('agus', '0525885565bb6a150db63f19bf42f11bd2db4702', 'Agus', 'dosen', 1),
('endang', 'cc7360a89da4c999d37dfca20bdc8c6e4c56276c', 'Endang', 'dosen', 1),
('jeni', 'ce297fa69e21223be2d1b6892ddc7c8167956fd4', 'Jeni', 'dosen', 1),
('kevin', 'ffb4761cba839470133bee36aeb139f58d7dbaa9', 'Kevin', 'dosen', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `kelas_mhs`
--
ALTER TABLE `kelas_mhs`
  ADD PRIMARY KEY (`id_klsmhs`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nrp`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indexes for table `placement`
--
ALTER TABLE `placement`
  ADD PRIMARY KEY (`id_ptest`);

--
-- Indexes for table `ruang_kelas`
--
ALTER TABLE `ruang_kelas`
  ADD PRIMARY KEY (`id_ruangkelas`);

--
-- Indexes for table `tempkelas_mhs`
--
ALTER TABLE `tempkelas_mhs`
  ADD PRIMARY KEY (`nrp`);

--
-- Indexes for table `temp_placement`
--
ALTER TABLE `temp_placement`
  ADD PRIMARY KEY (`nrp`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=650;

--
-- AUTO_INCREMENT for table `kelas_mhs`
--
ALTER TABLE `kelas_mhs`
  MODIFY `id_klsmhs` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id_periode` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `placement`
--
ALTER TABLE `placement`
  MODIFY `id_ptest` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `ruang_kelas`
--
ALTER TABLE `ruang_kelas`
  MODIFY `id_ruangkelas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
