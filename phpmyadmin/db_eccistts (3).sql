-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2020 at 09:07 AM
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
  `status_kelas` int(2) NOT NULL COMMENT '0 - Tidak aktif, 1 - Aktif',
  `id_ruangkelas` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_periode`, `id_kelas`, `level_ecc`, `nama_kelas`, `hari`, `jam_awal`, `jam_akhir`, `kuota`, `dosen`, `status_kelas`, `id_ruangkelas`) VALUES
(17, 632, 'Level 1', 'A', 'Senin', '06:30', '08:00', 25, 'agus', 1, 21),
(17, 633, 'Level 2', 'A', 'Selasa', '06:30', '08:00', 25, 'agus', 1, 15),
(17, 634, 'Level 2', 'B', 'Rabu', '06:30', '08:00', 25, 'endang', 1, 15),
(17, 635, 'Level 2', 'C', 'Kamis', '06:30', '08:00', 25, 'endang', 1, 15),
(17, 636, 'Level 2', 'D', 'Jumat', '06:30', '08:00', 25, 'endang', 1, 15),
(17, 637, 'Level 3', 'A', 'Senin', '06:30', '08:00', 25, 'kevin', 1, 16),
(17, 638, 'Level 3', 'B', 'Selasa', '06:30', '08:00', 25, 'kevin', 1, 16),
(17, 639, 'Level 3', 'C', 'Rabu', '06:30', '08:00', 25, 'kevin', 1, 16),
(17, 640, 'Level 3', 'D', 'Jumat', '06:30', '08:00', 25, 'kevin', 1, 16),
(17, 641, 'Level 4', 'A', 'Senin', '06:30', '08:00', 25, 'jeni', 1, 19),
(17, 642, 'Level 4', 'B', 'Selasa', '06:30', '08:00', 25, 'jeni', 1, 20),
(17, 643, 'Level 4', 'C', 'Rabu', '06:30', '08:00', 25, 'jeni', 1, 19),
(17, 644, 'Level 4', 'D', 'Kamis', '06:30', '08:00', 25, 'jeni', 1, 19),
(17, 645, 'Level 4', 'E', 'Jumat', '06:30', '08:00', 25, 'agus', 1, 19),
(17, 646, 'Level 1', 'B', '', '06:30', '08:00', 0, '-', 0, 0),
(17, 647, 'Level 1', 'C', '', '06:30', '08:00', 0, '-', 0, 0),
(17, 648, 'Level 1', 'D', '', '06:30', '08:00', 0, '-', 0, 0),
(17, 649, 'Level 1', 'E', '', '06:30', '08:00', 0, '-', 0, 0);

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
  `status_klsmhs` int(2) NOT NULL,
  `status_kembar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas_mhs`
--

INSERT INTO `kelas_mhs` (`id_klsmhs`, `id_periode`, `nrp`, `id_kelas`, `id_nilai`, `status_klsmhs`, `status_kembar`) VALUES
(1, 17, '216170333', 641, 0, 1, 1),
(2, 17, '217116607', 638, 0, 1, 1),
(3, 17, '217140071', 641, 0, 1, 1),
(4, 17, '218116687', 634, 0, 1, 1),
(5, 17, '218116705', 641, 0, 1, 1),
(6, 17, '218116756', 639, 0, 1, 1),
(7, 17, '218120681', 632, 0, 1, 1),
(8, 17, '218170422', 641, 0, 1, 1),
(9, 17, '218170423', 641, 0, 1, 1),
(10, 17, '218170435', 641, 0, 1, 1),
(11, 17, '218170451', 641, 0, 1, 1),
(12, 17, '218170452', 641, 0, 1, 1),
(13, 17, '218180418', 641, 0, 1, 1),
(14, 17, '218180426', 640, 0, 1, 1),
(15, 17, '218180442', 637, 0, 1, 1),
(17, 17, '219102603', 636, 0, 1, 1),
(18, 17, '219102606', 636, 0, 1, 1),
(19, 17, '219116779', 641, 0, 1, 1),
(20, 17, '219116786', 635, 0, 1, 1),
(21, 17, '219116789', 637, 0, 1, 1),
(22, 17, '219116790', 641, 0, 1, 1),
(23, 17, '219116792', 638, 0, 1, 1),
(24, 17, '219116793', 639, 0, 1, 1),
(26, 17, '219116802', 641, 0, 1, 1),
(27, 17, '219116803', 639, 0, 1, 1),
(28, 17, '219116809', 640, 0, 1, 1),
(29, 17, '219116822', 641, 0, 1, 1),
(30, 17, '219116842', 641, 0, 1, 1),
(32, 17, '219116849', 638, 0, 1, 1),
(33, 17, '219116857', 641, 0, 1, 1),
(34, 17, '219116860', 641, 0, 1, 1),
(35, 17, '219116861', 638, 0, 1, 1),
(36, 17, '219116862', 641, 0, 1, 1),
(37, 17, '219116864', 641, 0, 1, 1),
(38, 17, '219120694', 635, 0, 1, 1),
(39, 17, '219140089', 641, 0, 1, 1),
(40, 17, '219140099', 632, 0, 1, 1),
(41, 17, '219140100', 632, 0, 1, 1),
(42, 17, '219170481', 635, 0, 1, 1),
(43, 17, '219170492', 636, 0, 1, 1),
(45, 17, '219180449', 634, 0, 1, 1),
(46, 17, '219180456', 637, 0, 1, 1),
(47, 17, '219180457', 633, 0, 1, 1),
(48, 17, '219180459', 635, 0, 1, 1),
(49, 17, '219180463', 632, 0, 1, 1),
(50, 17, '219180465', 633, 0, 1, 1),
(51, 17, '219180468', 634, 0, 1, 1),
(52, 17, '219180478', 633, 0, 1, 1),
(53, 17, '219180480', 633, 0, 1, 1),
(54, 17, '216170333', 641, 0, 1, 0),
(55, 17, '217116607', 638, 0, 1, 0),
(56, 17, '217140071', 641, 0, 1, 0),
(57, 17, '218116687', 634, 0, 1, 0),
(58, 17, '218116705', 641, 0, 1, 0),
(59, 17, '218116756', 639, 0, 1, 0),
(60, 17, '218120681', 632, 0, 1, 0),
(61, 17, '218170422', 641, 0, 1, 0),
(62, 17, '218170423', 641, 0, 1, 0),
(63, 17, '218170435', 641, 0, 1, 0),
(64, 17, '218170451', 641, 0, 1, 0),
(65, 17, '218170452', 641, 0, 1, 0),
(66, 17, '218180418', 641, 0, 1, 0),
(67, 17, '218180426', 640, 0, 1, 0),
(68, 17, '218180442', 637, 0, 1, 0),
(69, 17, '219102600', 637, 0, 1, 0),
(70, 17, '219102603', 636, 0, 1, 0),
(71, 17, '219102606', 636, 0, 1, 0),
(72, 17, '219116779', 641, 0, 1, 0),
(73, 17, '219116786', 635, 0, 1, 0),
(74, 17, '219116789', 637, 0, 1, 0),
(75, 17, '219116790', 641, 0, 1, 0),
(76, 17, '219116792', 638, 0, 1, 0),
(77, 17, '219116793', 639, 0, 1, 0),
(78, 17, '219116799', 637, 0, 1, 0),
(79, 17, '219116802', 641, 0, 1, 0),
(80, 17, '219116803', 639, 0, 1, 0),
(81, 17, '219116809', 640, 0, 1, 0),
(82, 17, '219116822', 641, 0, 1, 0),
(83, 17, '219116842', 641, 0, 1, 0),
(84, 17, '219116847', 641, 0, 1, 0),
(85, 17, '219116849', 638, 0, 1, 0),
(86, 17, '219116857', 641, 0, 1, 0),
(87, 17, '219116860', 641, 0, 1, 0),
(88, 17, '219116861', 638, 0, 1, 0),
(89, 17, '219116862', 641, 0, 1, 0),
(90, 17, '219116864', 641, 0, 1, 0),
(91, 17, '219120694', 635, 0, 1, 0),
(92, 17, '219140089', 641, 0, 1, 0),
(93, 17, '219140099', 632, 0, 1, 0),
(94, 17, '219140100', 632, 0, 1, 0),
(95, 17, '219170481', 635, 0, 1, 0),
(96, 17, '219170492', 636, 0, 1, 0),
(97, 17, '219180446', 634, 0, 1, 0),
(98, 17, '219180449', 634, 0, 1, 0),
(99, 17, '219180456', 637, 0, 1, 0),
(100, 17, '219180457', 633, 0, 1, 0),
(101, 17, '219180459', 635, 0, 1, 0),
(102, 17, '219180463', 632, 0, 1, 0),
(103, 17, '219180465', 633, 0, 1, 0),
(104, 17, '219180468', 634, 0, 1, 0),
(105, 17, '219180478', 633, 0, 1, 0),
(106, 17, '219180480', 633, 0, 1, 0);

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
(16, '216170333', 'Radwitya Prasidhi Taufik Putra', '1'),
(16, '217116607', 'Ivan', '1'),
(16, '217140071', 'Eric San Fokalie', '1'),
(16, '218116687', 'Gilberto Joshua Ramiro Abdinta', '1'),
(16, '218116705', 'Vincent Verrianto Chang', '1'),
(16, '218116756', 'I Gede Sriwibawa', '1'),
(16, '218120681', 'Siva Wahyu Harijanto', '1'),
(16, '218170422', 'Robert Buwono Kencono', '1'),
(16, '218170423', 'Rozak Lintang Martono', '1'),
(16, '218170435', 'Fandy Gunawan', '1'),
(16, '218170451', 'Wine Novita Mintono', '1'),
(16, '218170452', 'Yen Yen Putri Novena Kohar', '1'),
(16, '218180418', 'Kevin Hongary', '1'),
(16, '218180426', 'Wira Rafi Aji Pranata', '1'),
(16, '218180442', 'Stefanus Sanjaya', '1'),
(16, '219102600', 'Alwin', '1'),
(16, '219102603', 'Johan Stefanus Sanjaya', '1'),
(16, '219102606', 'Laurentius Bima Anggoro', '1'),
(16, '219116779', 'Bryan Andrew Wijaya', '1'),
(16, '219116786', 'Farhan Faisal Zainul Mustaqin', '1'),
(16, '219116789', 'Jonathan Arelio Bevan', '1'),
(16, '219116790', 'Kevin Ericko', '1'),
(16, '219116792', 'M. Abiansyah Putra Perdana A', '1'),
(16, '219116793', 'Maria Andreas Iskandar', '1'),
(16, '219116799', 'Albertus Verrel Rhesa Hardiant', '1'),
(16, '219116802', 'Farel Hansel Taner', '1'),
(16, '219116803', 'Felix Lung Santoso', '1'),
(1, '219116809', 'Ivan Yudinata Purwanto', '1'),
(16, '219116822', 'Bryant Melvern Pirih', '1'),
(16, '219116842', 'Russel Joshua Chandra', '1'),
(16, '219116847', 'Andrian Sugianto Putra', '1'),
(16, '219116849', 'Christian Evan', '1'),
(16, '219116857', 'Nicholas Tjandra', '1'),
(16, '219116860', 'Steven Liem', '1'),
(16, '219116861', 'Valentino Fransiskus Irawan', '1'),
(16, '219116862', 'Vincentius Alexander', '1'),
(16, '219116864', 'Yen Eduardo Nathan', '1'),
(16, '219120694', 'Naufal Bima Saputra', '1'),
(16, '219140089', 'Benedict Michael Maximus', '1'),
(16, '219140099', 'Victor Irviandi Pascalis', '1'),
(16, '219140100', 'Eugenius Ferera Herdany', '1'),
(16, '219170481', 'Jessica Ivana Winata', '1'),
(16, '219170492', 'Samuel Irawan', '1'),
(16, '219180446', 'Albert Wijaya', '1'),
(16, '219180449', 'Ben Auguere', '1'),
(16, '219180456', 'Hans Felix', '1'),
(16, '219180457', 'Hansen Valentino', '1'),
(1, '219180459', 'Jessica Anjani Viliang', '1'),
(16, '219180463', 'M.fierza Eries Erlangga', '1'),
(16, '219180465', 'Michelle Annabelle Surya Atmaj', '1'),
(16, '219180468', 'William Morgen', '1'),
(16, '219180478', 'Ivan Aubrey Adianto', '1'),
(1, '219180480', 'Jestine Siewij', '1');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` varchar(10) NOT NULL,
  `id_periode` int(10) NOT NULL,
  `nrp` varchar(10) NOT NULL,
  `id_kelas` int(10) NOT NULL,
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
  `status_kembar` int(2) NOT NULL COMMENT '0-tdk, 1-ada kembar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `placement`
--

INSERT INTO `placement` (`id_ptest`, `id_periode`, `nrp`, `nilai_ptest`, `ptest_level`, `status_kembar`) VALUES
(1, 16, '219180463', 204, 1, 0),
(2, 16, '219140099', 243, 1, 0),
(3, 16, '218120681', 267, 1, 0),
(4, 16, '219140100', 203, 1, 0),
(5, 16, '219180478', 340, 2, 0),
(6, 16, '219180465', 360, 2, 0),
(7, 16, '219180457', 355, 2, 0),
(8, 16, '219180449', 340, 2, 0),
(9, 16, '219180446', 345, 2, 0),
(10, 16, '218116687', 333, 2, 0),
(11, 16, '219180468', 453, 2, 0),
(12, 16, '219170481', 444, 2, 0),
(13, 16, '219120694', 400, 2, 0),
(14, 16, '219116786', 389, 2, 0),
(15, 16, '219102600', 390, 2, 0),
(16, 16, '219102603', 376, 2, 0),
(17, 16, '219102606', 355, 2, 0),
(18, 16, '219170492', 390, 2, 0),
(19, 16, '219180456', 500, 3, 0),
(20, 16, '218180442', 540, 3, 0),
(21, 16, '219116789', 555, 3, 0),
(22, 16, '219116799', 523, 3, 0),
(23, 16, '219116849', 555, 3, 0),
(24, 16, '217116607', 530, 3, 0),
(25, 16, '219116861', 500, 3, 0),
(26, 16, '219116792', 501, 3, 0),
(27, 16, '218116756', 503, 3, 0),
(28, 16, '219116803', 505, 3, 0),
(29, 16, '219116793', 521, 3, 0),
(30, 16, '218180426', 508, 3, 0),
(31, 16, '219116790', 610, 4, 0),
(32, 16, '219116847', 620, 4, 0),
(33, 16, '219116862', 689, 4, 0),
(34, 16, '218116705', 679, 4, 0),
(35, 16, '218170435', 630, 4, 0),
(36, 16, '218170423', 600, 4, 0),
(37, 16, '218170422', 666, 4, 0),
(38, 16, '218170452', 621, 4, 0),
(39, 16, '219116779', 620, 4, 0),
(40, 16, '219116802', 630, 4, 0),
(41, 16, '219116822', 640, 4, 0),
(42, 16, '219116860', 682, 4, 0),
(43, 16, '219116842', 622, 4, 0),
(44, 16, '219116864', 643, 4, 0),
(45, 16, '217140071', 653, 4, 0),
(46, 16, '219116857', 601, 4, 0),
(47, 16, '218170451', 603, 4, 0),
(48, 16, '219140089', 608, 4, 0),
(49, 16, '216170333', 607, 4, 0),
(50, 16, '218180418', 633, 4, 0),
(57, 1, '219116809', 0, 0, 0),
(58, 1, '219180459', 0, 0, 0),
(59, 1, '219180480', 0, 0, 0);

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
  MODIFY `id_klsmhs` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id_periode` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `placement`
--
ALTER TABLE `placement`
  MODIFY `id_ptest` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `ruang_kelas`
--
ALTER TABLE `ruang_kelas`
  MODIFY `id_ruangkelas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
