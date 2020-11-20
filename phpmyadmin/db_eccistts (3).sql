-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2020 at 09:45 AM
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
  `id_ruangkelas` int(11) NOT NULL
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
  `id_periode` int(11) NOT NULL,
  `nrp` varchar(10) NOT NULL,
  `id_kelas` varchar(10) NOT NULL,
  `id_nilai` varchar(10) NOT NULL,
  `status_klsmhs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas_mhs`
--

INSERT INTO `kelas_mhs` (`id_periode`, `nrp`, `id_kelas`, `id_nilai`, `status_klsmhs`) VALUES
(17, '219180463', '0', '0', 1),
(17, '219140099', '0', '0', 1),
(17, '218120681', '0', '0', 1),
(17, '219140100', '0', '0', 1),
(17, '219180478', '0', '0', 1),
(17, '219180480', '0', '0', 1),
(17, '219180465', '0', '0', 1),
(17, '219180457', '0', '0', 1),
(17, '219180449', '0', '0', 1),
(17, '219180446', '0', '0', 1),
(17, '218116687', '0', '0', 1),
(17, '219180468', '0', '0', 1),
(17, '219170481', '0', '0', 1),
(17, '219120694', '0', '0', 1),
(17, '219180456', '0', '0', 1),
(17, '218180442', '0', '0', 1),
(17, '219116789', '0', '0', 1),
(17, '219116799', '0', '0', 1),
(17, '219116849', '0', '0', 1),
(17, '217116607', '0', '0', 1),
(17, '219116861', '0', '0', 1),
(17, '219116792', '0', '0', 1),
(17, '218116756', '0', '0', 1),
(17, '219116803', '0', '0', 1),
(17, '219116793', '0', '0', 1),
(17, '219116809', '0', '0', 1),
(17, '218180426', '0', '0', 1),
(17, '219116790', '0', '0', 1),
(17, '219116847', '0', '0', 1),
(17, '219116862', '0', '0', 1),
(17, '218116705', '0', '0', 1),
(17, '218170435', '0', '0', 1),
(17, '218170423', '0', '0', 1),
(17, '218170422', '0', '0', 1),
(17, '218170452', '0', '0', 1),
(17, '219116779', '0', '0', 1),
(17, '219116802', '0', '0', 1),
(17, '219116822', '0', '0', 1),
(17, '219116860', '0', '0', 1),
(17, '219116842', '0', '0', 1),
(17, '219116864', '0', '0', 1),
(17, '217140071', '0', '0', 1),
(17, '219116857', '0', '0', 1),
(17, '218170451', '0', '0', 1),
(17, '219140089', '0', '0', 1),
(17, '216170333', '0', '0', 1),
(17, '218180418', '0', '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_periode` int(11) NOT NULL,
  `nrp` varchar(10) NOT NULL,
  `nama_mhs` varchar(30) NOT NULL,
  `nilai_placement` int(10) NOT NULL,
  `placement_level` int(11) NOT NULL,
  `now_level` int(11) NOT NULL,
  `status_mhs` varchar(2) NOT NULL COMMENT '0 - Mhs nonaktif, 1 - mhs aktif ECC'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_periode`, `nrp`, `nama_mhs`, `nilai_placement`, `placement_level`, `now_level`, `status_mhs`) VALUES
(1, '216170333', 'Radwitya Prasidhi Taufik Putra', 0, 0, 0, '1'),
(1, '217116607', 'Ivan', 0, 0, 0, '1'),
(1, '217140071', 'Eric San Fokalie', 0, 0, 0, '1'),
(16, '218116687', 'Gilberto Joshua Ramiro Abdinta', 333, 2, 0, '1'),
(16, '218116705', 'Vincent Verrianto Chang', 679, 4, 0, '1'),
(16, '218116756', 'I Gede Sriwibawa', 503, 3, 0, '1'),
(16, '218120681', 'Siva Wahyu Harijanto', 267, 1, 0, '1'),
(16, '218170422', 'Robert Buwono Kencono', 666, 4, 0, '1'),
(16, '218170423', 'Rozak Lintang Martono', 600, 4, 0, '1'),
(16, '218170435', 'Fandy Gunawan', 630, 4, 0, '1'),
(16, '218170451', 'Wine Novita Mintono', 603, 4, 0, '1'),
(16, '218170452', 'Yen Yen Putri Novena Kohar', 621, 4, 0, '1'),
(16, '218180418', 'Kevin Hongary', 633, 4, 0, '1'),
(16, '218180426', 'Wira Rafi Aji Pranata', 508, 3, 0, '1'),
(16, '218180442', 'Stefanus Sanjaya', 540, 3, 0, '1'),
(16, '219102600', 'Alwin', 390, 2, 0, '1'),
(16, '219102603', 'Johan Stefanus Sanjaya', 376, 2, 0, '1'),
(16, '219102606', 'Laurentius Bima Anggoro', 355, 2, 0, '1'),
(16, '219116779', 'Bryan Andrew Wijaya', 620, 4, 0, '1'),
(16, '219116786', 'Farhan Faisal Zainul Mustaqin', 389, 2, 0, '1'),
(16, '219116789', 'Jonathan Arelio Bevan', 555, 3, 0, '1'),
(16, '219116790', 'Kevin Ericko', 610, 4, 0, '1'),
(16, '219116792', 'M. Abiansyah Putra Perdana A', 501, 3, 0, '1'),
(16, '219116793', 'Maria Andreas Iskandar', 521, 3, 0, '1'),
(16, '219116799', 'Albertus Verrel Rhesa Hardiant', 523, 3, 0, '1'),
(16, '219116802', 'Farel Hansel Taner', 630, 4, 0, '1'),
(16, '219116803', 'Felix Lung Santoso', 505, 3, 0, '1'),
(16, '219116809', 'Ivan Yudinata Purwanto', 555, 3, 0, '1'),
(16, '219116822', 'Bryant Melvern Pirih', 640, 4, 0, '1'),
(16, '219116842', 'Russel Joshua Chandra', 622, 4, 0, '1'),
(16, '219116847', 'Andrian Sugianto Putra', 620, 4, 0, '1'),
(1, '219116849', 'Christian Evan', 0, 0, 0, '1'),
(16, '219116857', 'Nicholas Tjandra', 601, 4, 0, '1'),
(16, '219116860', 'Steven Liem', 682, 4, 0, '1'),
(1, '219116861', 'Valentino Fransiskus Irawan', 0, 0, 0, '1'),
(16, '219116862', 'Vincentius Alexander', 689, 4, 0, '1'),
(16, '219116864', 'Yen Eduardo Nathan', 643, 4, 0, '1'),
(16, '219120694', 'Naufal Bima Saputra', 400, 2, 0, '1'),
(1, '219140089', 'Benedict Michael Maximus', 0, 0, 0, '1'),
(1, '219140099', 'Victor Irviandi Pascalis', 0, 0, 0, '1'),
(16, '219140100', 'Eugenius Ferera Herdany', 203, 1, 0, '1'),
(16, '219170481', 'Jessica Ivana Winata', 444, 2, 0, '1'),
(16, '219170492', 'Samuel Irawan', 390, 2, 0, '1'),
(16, '219180446', 'Albert Wijaya', 345, 2, 0, '1'),
(1, '219180449', 'Ben Auguere', 0, 0, 0, '1'),
(16, '219180456', 'Hans Felix', 500, 3, 0, '1'),
(16, '219180457', 'Hansen Valentino', 355, 2, 0, '1'),
(16, '219180459', 'Jessica Anjani Viliang', 430, 2, 0, '1'),
(16, '219180463', 'M.fierza Eries Erlangga', 204, 1, 0, '1'),
(1, '219180465', 'Michelle Annabelle Surya Atmaj', 0, 0, 0, '1'),
(16, '219180468', 'William Morgen', 453, 2, 0, '1'),
(1, '219180478', 'Ivan Aubrey Adianto', 0, 0, 0, '1'),
(16, '219180480', 'Jestine Siewij', 350, 2, 0, '1');

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
  `status_periode` int(11) NOT NULL
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
-- Table structure for table `ruang_kelas`
--

CREATE TABLE `ruang_kelas` (
  `id_ruangkelas` int(11) NOT NULL,
  `nama_ruang` varchar(10) NOT NULL,
  `status_ruang` varchar(2) NOT NULL COMMENT '(0 - nonaktif) (1 - aktif)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruang_kelas`
--

INSERT INTO `ruang_kelas` (`id_ruangkelas`, `nama_ruang`, `status_ruang`) VALUES
(15, 'B-301', '1'),
(16, 'B-302', '1'),
(17, 'U-401', '1'),
(18, 'U-402', '1'),
(19, 'U-303', '1'),
(20, 'E-301', '1'),
(21, 'B-303', '1');

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
  `id_periode` int(11) NOT NULL,
  `nrp` varchar(9) NOT NULL,
  `nama_mhs` varchar(100) NOT NULL,
  `level_ecc` varchar(10) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam_mulai` varchar(10) NOT NULL,
  `ruang_kode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tempkelas_mhs`
--

INSERT INTO `tempkelas_mhs` (`id_periode`, `nrp`, `nama_mhs`, `level_ecc`, `hari`, `jam_mulai`, `ruang_kode`) VALUES
(17, '219180463', 'M.fierza Eries Erlangga', '1', 'Senin', '06:30', 'B-303'),
(17, '219140099', 'Victor Irviandi Pascalis', '1', 'Senin', '06:30', 'B-303'),
(17, '218120681', 'Siva Wahyu Harijanto', '1', 'Senin', '06:30', 'B-303'),
(17, '219140100', 'Eugenius Ferera Herdany', '1', 'Senin', '06:30', 'B-303'),
(17, '219180478', 'Ivan Aubrey Adianto', '2', 'Selasa', '06:30', 'B-301'),
(17, '219180480', 'Jestine Siewij', '2', 'Selasa', '06:30', 'B-301'),
(17, '219180465', 'Michelle Annabelle Surya Atmaja', '2', 'Selasa', '06:30', 'B-301'),
(17, '219180457', 'Hansen Valentino', '2', 'Selasa', '06:30', 'B-301'),
(17, '219180449', 'Ben Auguere', '2', 'Selasa', '06:30', 'B-301'),
(17, '219180446', 'Albert Wijaya', '2', 'Selasa', '06:30', 'B-301'),
(17, '218116687', 'Gilberto Joshua Ramiro Abdintara', '2', 'Selasa', '06:30', 'B-301'),
(17, '219180468', 'William Morgen', '2', 'Selasa', '06:30', 'B-301'),
(17, '219170481', 'Jessica Ivana Winata', '2', 'Selasa', '06:30', 'B-301'),
(17, '219120694', 'Naufal Bima Saputra', '2', 'Selasa', '06:30', 'B-301'),
(17, '219180456', 'Hans Felix', '3', 'Senin', '06:30', 'B-302'),
(17, '218180442', 'Stefanus Sanjaya', '3', 'Senin', '06:30', 'B-302'),
(17, '219116789', 'Jonathan Arelio Bevan', '3', 'Senin', '06:30', 'B-302'),
(17, '219116799', 'Albertus Verrel Rhesa Hardianto', '3', 'Senin', '06:30', 'B-302'),
(17, '219116849', 'Christian Evan', '3', 'Senin', '06:30', 'B-302'),
(17, '217116607', 'Ivan', '3', 'Senin', '06:30', 'B-302'),
(17, '219116861', 'Valentino Fransiskus Irawan', '3', 'Senin', '06:30', 'B-302'),
(17, '219116792', 'M. Abiansyah Putra Perdana A', '3', 'Senin', '06:30', 'B-302'),
(17, '218116756', 'I Gede Sriwibawa', '3', 'Senin', '06:30', 'B-302'),
(17, '219116803', 'Felix Lung Santoso', '3', 'Senin', '06:30', 'B-302'),
(17, '219116793', 'Maria Andreas Iskandar', '3', 'Senin', '06:30', 'B-302'),
(17, '219116809', 'Ivan Yudinata Purwanto', '3', 'Senin', '06:30', 'B-302'),
(17, '218180426', 'Wira Rafi Aji Pranata', '3', 'Senin', '06:30', 'B-302'),
(17, '219116790', 'Kevin Ericko', '4', 'Senin', '06:30', 'U-303'),
(17, '219116847', 'Andrian Sugianto Putra', '4', 'Senin', '06:30', 'U-303'),
(17, '219116862', 'Vincentius Alexander', '4', 'Senin', '06:30', 'U-303'),
(17, '218116705', 'Vincent Verrianto Chang', '4', 'Senin', '06:30', 'U-303'),
(17, '218170435', 'Fandy Gunawan', '4', 'Senin', '06:30', 'U-303'),
(17, '218170423', 'Rozak Lintang Martono', '4', 'Senin', '06:30', 'U-303'),
(17, '218170422', 'Robert Buwono Kencono', '4', 'Senin', '06:30', 'U-303'),
(17, '218170452', 'Yen Yen Putri Novena Kohar', '4', 'Senin', '06:30', 'U-303'),
(17, '219116779', 'Bryan Andrew Wijaya', '4', 'Senin', '06:30', 'U-303'),
(17, '219116802', 'Farel Hansel Taner', '4', 'Senin', '06:30', 'U-303'),
(17, '219116822', 'Bryant Melvern Pirih', '4', 'Senin', '06:30', 'U-303'),
(17, '219116860', 'Steven Liem', '4', 'Senin', '06:30', 'U-303'),
(17, '219116842', 'Russel Joshua Chandra', '4', 'Senin', '06:30', 'U-303'),
(17, '219116864', 'Yen Eduardo Nathan', '4', 'Senin', '06:30', 'U-303'),
(17, '217140071', 'Eric San Fokalie', '4', 'Senin', '06:30', 'U-303'),
(17, '219116857', 'Nicholas Tjandra', '4', 'Senin', '06:30', 'U-303'),
(17, '218170451', 'Wine Novita Mintono', '4', 'Senin', '06:30', 'U-303'),
(17, '219140089', 'Benedict Michael Maximus', '4', 'Senin', '06:30', 'U-303'),
(17, '216170333', 'Radwitya Prasidhi Taufik Putra', '4', 'Senin', '06:30', 'U-303'),
(17, '218180418', 'Kevin Hongary', '4', 'Senin', '06:30', 'U-303');

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
-- Indexes for table `ruang_kelas`
--
ALTER TABLE `ruang_kelas`
  ADD PRIMARY KEY (`id_ruangkelas`);

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
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id_periode` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `ruang_kelas`
--
ALTER TABLE `ruang_kelas`
  MODIFY `id_ruangkelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
