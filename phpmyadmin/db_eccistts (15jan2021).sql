-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2021 at 02:48 PM
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
(17, 1, '1', 'A', 'Senin', '06:30', '08:00', 30, 'agus', 1, 21),
(17, 2, '2', 'A', 'Selasa', '06:30', '08:00', 30, 'agus', 1, 15),
(17, 3, '2', 'B', 'Rabu', '06:30', '08:00', 30, 'endang', 1, 15),
(17, 5, '3', 'A', 'Senin', '06:30', '08:00', 30, 'kevin', 1, 16),
(17, 6, '3', 'B', 'Selasa', '06:30', '08:00', 30, 'kevin', 1, 16),
(17, 7, '3', 'C', 'Rabu', '06:30', '08:00', 30, 'kevin', 1, 16),
(17, 8, '3', 'D', 'Jumat', '06:30', '08:00', 30, 'kevin', 1, 16),
(17, 9, '4', 'A', 'Senin', '06:30', '08:00', 30, 'agus', 1, 19),
(17, 10, '4', 'B', 'Selasa', '06:30', '08:00', 30, 'jeni', 1, 20),
(17, 11, '4', 'C', 'Rabu', '06:30', '08:00', 30, 'jeni', 1, 19),
(17, 12, '2', 'C', 'Kamis', '06:30', '08:00', 30, 'endang', 1, 15),
(17, 13, '2', 'D', 'Jumat', '06:30', '08:00', 30, 'endang', 1, 15),
(17, 14, '4', 'D', 'Kamis', '06:30', '08:00', 30, 'agus', 1, 19),
(17, 15, '4', 'E', 'Jumat', '06:30', '08:00', 30, 'agus', 1, 19);

-- --------------------------------------------------------

--
-- Table structure for table `kelas_mhs`
--

CREATE TABLE `kelas_mhs` (
  `id_klsmhs` int(10) NOT NULL,
  `id_periode` int(10) NOT NULL,
  `nrp` varchar(10) NOT NULL,
  `id_kelas` int(10) NOT NULL,
  `id_kelas_sblm` int(10) NOT NULL,
  `id_nilai` int(10) NOT NULL,
  `status_klsmhs` int(2) NOT NULL,
  `status_kembar` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas_mhs`
--

INSERT INTO `kelas_mhs` (`id_klsmhs`, `id_periode`, `nrp`, `id_kelas`, `id_kelas_sblm`, `id_nilai`, `status_klsmhs`, `status_kembar`) VALUES
(1, 17, '216170333', 9, 0, 1, 1, 0),
(2, 17, '217116607', 6, 0, 2, 1, 0),
(3, 17, '217140071', 9, 0, 3, 1, 0),
(4, 17, '218116687', 3, 0, 4, 1, 0),
(5, 17, '218116705', 9, 0, 5, 1, 0),
(6, 17, '218116756', 7, 0, 6, 1, 0),
(7, 17, '218120681', 1, 0, 7, 1, 0),
(8, 17, '218170422', 9, 0, 8, 1, 0),
(9, 17, '218170423', 9, 0, 9, 1, 0),
(10, 17, '218170435', 9, 0, 10, 1, 0),
(11, 17, '218170451', 9, 0, 11, 1, 0),
(12, 17, '218170452', 9, 0, 12, 1, 0),
(13, 17, '218180418', 9, 0, 13, 1, 0),
(14, 17, '218180426', 8, 0, 14, 1, 0),
(15, 17, '218180442', 5, 0, 15, 1, 0),
(16, 17, '219102600', 13, 0, 16, 1, 0),
(17, 17, '219102603', 13, 0, 17, 1, 0),
(18, 17, '219102606', 13, 0, 18, 1, 0),
(19, 17, '219116779', 9, 0, 19, 1, 0),
(20, 17, '219116786', 12, 0, 20, 1, 0),
(21, 17, '219116789', 5, 0, 21, 1, 0),
(22, 17, '219116790', 9, 0, 22, 1, 0),
(23, 17, '219116792', 6, 0, 23, 1, 0),
(24, 17, '219116793', 7, 0, 24, 1, 0),
(25, 17, '219116799', 5, 0, 25, 1, 0),
(26, 17, '219116802', 9, 0, 26, 1, 0),
(27, 17, '219116803', 7, 0, 27, 1, 0),
(28, 17, '219116809', 8, 0, 28, 1, 0),
(29, 17, '219116822', 9, 0, 29, 1, 0),
(30, 17, '219116842', 9, 0, 30, 1, 0),
(31, 17, '219116847', 9, 0, 31, 1, 0),
(32, 17, '219116849', 6, 0, 32, 1, 0),
(33, 17, '219116857', 9, 0, 33, 1, 0),
(34, 17, '219116860', 9, 0, 34, 1, 0),
(35, 17, '219116861', 6, 0, 35, 1, 0),
(36, 17, '219116862', 9, 0, 36, 1, 0),
(37, 17, '219116864', 9, 0, 37, 1, 0),
(38, 17, '219120694', 12, 0, 38, 1, 0),
(39, 17, '219140089', 9, 0, 39, 1, 0),
(40, 17, '219140099', 1, 0, 40, 1, 0),
(41, 17, '219140100', 1, 0, 41, 1, 0),
(42, 17, '219170481', 12, 0, 42, 1, 0),
(43, 17, '219170492', 13, 0, 43, 1, 0),
(44, 17, '219180446', 3, 0, 44, 1, 0),
(45, 17, '219180449', 3, 0, 45, 1, 0),
(46, 17, '219180456', 5, 0, 46, 1, 0),
(47, 17, '219180457', 2, 0, 47, 1, 0),
(48, 17, '219180459', 12, 0, 48, 1, 0),
(49, 17, '219180463', 1, 0, 49, 1, 0),
(50, 17, '219180465', 2, 0, 50, 1, 0),
(51, 17, '219180468', 3, 0, 51, 1, 0),
(52, 17, '219180478', 2, 0, 52, 1, 0),
(53, 17, '219180480', 2, 0, 53, 1, 0);

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
(16, '217180399', 'Edward Gid', '0'),
(16, '217180878', 'Albert Wijaya', '0'),
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
(16, '219116809', 'Ivan Yudinata Purwanto', '1'),
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
(16, '219180459', 'Jessica Anjani Viliang', '1'),
(16, '219180463', 'M.fierza Eries Erlangga', '1'),
(16, '219180465', 'Michelle Annabelle Surya Atmaj', '1'),
(16, '219180468', 'William Morgen', '1'),
(16, '219180478', 'Ivan Aubrey Adianto', '1'),
(16, '219180480', 'Jestine Siewij', '1');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_mhs`
--

CREATE TABLE `nilai_mhs` (
  `id_nilai` int(10) NOT NULL,
  `id_klsmhs` int(10) NOT NULL,
  `nilai_uts` float NOT NULL,
  `nilai_uas` float NOT NULL,
  `nilai_akhir` float NOT NULL,
  `grade` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_mhs`
--

INSERT INTO `nilai_mhs` (`id_nilai`, `id_klsmhs`, `nilai_uts`, `nilai_uas`, `nilai_akhir`, `grade`) VALUES
(1, 1, 70, 78, 74, 'B'),
(2, 2, 68, 78, 73, 'B'),
(3, 3, 88, 80, 84, 'A'),
(4, 4, 70, 70, 70, 'B'),
(5, 5, 75, 82, 79, 'B+'),
(6, 6, 83.4, 80, 81.7, 'A'),
(7, 7, 80, 89, 85, 'A'),
(8, 8, 91, 85, 88, 'A'),
(9, 9, 50, 78, 64, 'C+'),
(10, 10, 77, 74, 75.5, 'B+'),
(11, 11, 0, 0, 0, '-'),
(12, 12, 0, 0, 0, '-'),
(13, 13, 0, 0, 0, '-'),
(14, 14, 0, 0, 0, '-'),
(15, 15, 0, 0, 0, '-'),
(16, 16, 0, 0, 0, '-'),
(17, 17, 0, 0, 0, '-'),
(18, 18, 0, 0, 0, '-'),
(19, 19, 0, 0, 0, '-'),
(20, 20, 0, 0, 0, '-'),
(21, 21, 0, 0, 0, '-'),
(22, 22, 0, 0, 0, '-'),
(23, 23, 0, 0, 0, '-'),
(24, 24, 0, 0, 0, '-'),
(25, 25, 0, 0, 0, '-'),
(26, 26, 0, 0, 0, '-'),
(27, 27, 0, 0, 0, '-'),
(28, 28, 0, 0, 0, '-'),
(29, 29, 0, 0, 0, '-'),
(30, 30, 0, 0, 0, '-'),
(31, 31, 0, 0, 0, '-'),
(32, 32, 0, 0, 0, '-'),
(33, 33, 0, 0, 0, '-'),
(34, 34, 0, 0, 0, '-'),
(35, 35, 0, 0, 0, '-'),
(36, 36, 0, 0, 0, '-'),
(37, 37, 0, 0, 0, '-'),
(38, 38, 0, 0, 0, '-'),
(39, 39, 0, 0, 0, '-'),
(40, 40, 80, 81, 80, 'A'),
(41, 41, 76, 80, 78, 'B+'),
(42, 42, 0, 0, 0, '-'),
(43, 43, 0, 0, 0, '-'),
(44, 44, 0, 0, 0, '-'),
(45, 45, 0, 0, 0, '-'),
(46, 46, 0, 0, 0, '-'),
(47, 47, 74, 77, 75.5, 'B+'),
(48, 48, 0, 0, 0, '-'),
(49, 49, 77, 80, 79, 'B+'),
(50, 50, 89, 88, 88.5, 'A'),
(51, 51, 0, 0, 0, '-'),
(52, 52, 68, 87, 77.5, 'B+'),
(53, 53, 80, 89, 84.5, 'A');

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
(6, 16, '219180480', 350, 2, 0),
(7, 16, '219180465', 360, 2, 0),
(8, 16, '219180457', 355, 2, 0),
(9, 16, '219180449', 340, 2, 0),
(10, 16, '219180446', 345, 2, 0),
(11, 16, '218116687', 333, 2, 0),
(12, 16, '219180468', 453, 2, 0),
(13, 16, '219170481', 444, 2, 0),
(14, 16, '219120694', 400, 2, 0),
(15, 16, '219180459', 430, 2, 0),
(16, 16, '219116786', 389, 2, 0),
(17, 16, '219102600', 390, 2, 0),
(18, 16, '219102603', 376, 2, 0),
(19, 16, '219102606', 355, 2, 0),
(20, 16, '219170492', 390, 2, 0),
(21, 16, '219180456', 500, 3, 0),
(22, 16, '218180442', 540, 3, 0),
(23, 16, '219116789', 555, 3, 0),
(24, 16, '219116799', 523, 3, 0),
(25, 16, '219116849', 555, 3, 0),
(26, 16, '217116607', 530, 3, 0),
(27, 16, '219116861', 500, 3, 0),
(28, 16, '219116792', 501, 3, 0),
(29, 16, '218116756', 503, 3, 0),
(30, 16, '219116803', 505, 3, 0),
(31, 16, '219116793', 521, 3, 0),
(32, 16, '219116809', 555, 3, 0),
(33, 16, '218180426', 508, 3, 0),
(34, 16, '219116790', 610, 4, 0),
(35, 16, '219116847', 620, 4, 0),
(36, 16, '219116862', 689, 4, 0),
(37, 16, '218116705', 679, 4, 0),
(38, 16, '218170435', 630, 4, 0),
(39, 16, '218170423', 600, 4, 0),
(40, 16, '218170422', 666, 4, 0),
(41, 16, '218170452', 621, 4, 0),
(42, 16, '219116779', 620, 4, 0),
(43, 16, '219116802', 630, 4, 0),
(44, 16, '219116822', 640, 4, 0),
(45, 16, '219116860', 682, 4, 0),
(46, 16, '219116842', 622, 4, 0),
(47, 16, '219116864', 643, 4, 0),
(48, 16, '217140071', 653, 4, 0),
(49, 16, '219116857', 601, 4, 0),
(50, 16, '218170451', 603, 4, 0),
(51, 16, '219140089', 608, 4, 0),
(52, 16, '216170333', 607, 4, 0),
(53, 16, '218180418', 633, 4, 0),
(55, 16, '217180878', 340, 3, 0);

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
(21, 'B-303', 1),
(29, 'L-101', 0),
(30, 'B-304', 1),
(31, 'L-102', 1),
(32, 'L-103', 1),
(33, 'B-305', 1);

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
('agus', '0525885565bb6a150db63f19bf42f11bd2db4702', 'Agus Gunawan', 'dosen', 1),
('arnold', '6f9019a59c51da7447ae804dd2cbe5203f6f90ac', 'Arnold Pramudita', 'dosen', 0),
('endang', 'cc7360a89da4c999d37dfca20bdc8c6e4c56276c', 'Endang Sriwahyuni', 'dosen', 1),
('jeni', 'ce297fa69e21223be2d1b6892ddc7c8167956fd4', 'Jeni Ngo', 'dosen', 1),
('kevin', 'ffb4761cba839470133bee36aeb139f58d7dbaa9', 'Kevin Setiono', 'dosen', 1);

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
-- Indexes for table `nilai_mhs`
--
ALTER TABLE `nilai_mhs`
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
  MODIFY `id_kelas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kelas_mhs`
--
ALTER TABLE `kelas_mhs`
  MODIFY `id_klsmhs` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `nilai_mhs`
--
ALTER TABLE `nilai_mhs`
  MODIFY `id_nilai` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id_periode` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `placement`
--
ALTER TABLE `placement`
  MODIFY `id_ptest` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `ruang_kelas`
--
ALTER TABLE `ruang_kelas`
  MODIFY `id_ruangkelas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
