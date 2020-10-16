-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2020 at 11:00 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

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
  `id_kelas` varchar(10) NOT NULL,
  `level_ecc` varchar(10) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam` varchar(10) NOT NULL,
  `kuota` int(10) NOT NULL,
  `dosen` varchar(30) NOT NULL,
  `status_kelas` varchar(2) NOT NULL COMMENT '0 - Tidak aktif, 1 - Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_periode`, `id_kelas`, `level_ecc`, `nama_kelas`, `hari`, `jam`, `kuota`, `dosen`, `status_kelas`) VALUES
(1, 'idcoba1', 'Level 1', 'Kelas A', 'Senin', '06.30', 30, 'aaaa', '1');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_mhs`
--

CREATE TABLE `kelas_mhs` (
  `id_kelas` varchar(10) NOT NULL,
  `nrp` varchar(10) NOT NULL,
  `id_nilai` varchar(10) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nrp` varchar(10) NOT NULL,
  `nama_mhs` varchar(30) NOT NULL,
  `current_level` varchar(10) NOT NULL,
  `nilai_placement` int(10) NOT NULL,
  `status_mhs` varchar(2) NOT NULL COMMENT '0 - Mhs nonaktif, 1 - mhs aktif ECC',
  `id_periode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nrp`, `nama_mhs`, `current_level`, `nilai_placement`, `status_mhs`, `id_periode`) VALUES
('217180384', 'name 1', 'IV', 45, '1', 1),
('217180385', 'name 2', 'IV', 46, '1', 1),
('217180386', 'name 3', 'II', 24, '1', 1),
('217180387', 'name 4', 'IV', 56, '1', 1),
('217180388', 'name 5', 'III', 34, '1', 1),
('217180389', 'name 6', 'IV', 73, '1', 1),
('217180390', 'name 7', 'IV', 74, '1', 1),
('217180391', 'name 8', 'III', 34, '1', 1),
('217180392', 'name 9', 'IV', 57, '1', 1),
('217180393', 'name 10', 'II', 24, '1', 1),
('217180394', 'name 11', 'IV', 72, '1', 1);

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
  `semester` varchar(10) NOT NULL COMMENT 'Gasal / Genap',
  `thn_akademik_awal` int(10) NOT NULL COMMENT 'tahun akademik awal YYYY',
  `thn_akademik_akhir` int(10) NOT NULL COMMENT 'tahun akademik akhir/YYYY'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`id_periode`, `semester`, `thn_akademik_awal`, `thn_akademik_akhir`) VALUES
(1, 'Genap', 2021, 2022),
(5, 'Gasal', 2021, 2022),
(6, 'Genap', 2022, 2023);

-- --------------------------------------------------------

--
-- Table structure for table `temp_mahasiswa`
--

CREATE TABLE `temp_mahasiswa` (
  `nrp` int(11) NOT NULL,
  `nama_mahasiswa` text NOT NULL,
  `nilai_placement` int(11) NOT NULL,
  `level` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `temp_nilaiplacement`
--

CREATE TABLE `temp_nilaiplacement` (
  `level1` int(11) NOT NULL,
  `level2` int(11) NOT NULL,
  `level3` int(11) NOT NULL,
  `level4` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `temp_nilaiplacement`
--

INSERT INTO `temp_nilaiplacement` (`level1`, `level2`, `level3`, `level4`) VALUES
(20, 30, 40, 50);

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
('217180345', 'kevin', 'kevin', 'dosen', 1),
('217180382', '64ec997f263a63e35d3737e47799ebc53f406bcb', 'alfira', 'admin', 1),
('alfira1', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Fira', 'dosen', 1),
('Arnold1', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Arnold', 'admin', 1),
('arnold2', 'arnold2', 'test', 'dosen', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_periode`);

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
-- Indexes for table `temp_mahasiswa`
--
ALTER TABLE `temp_mahasiswa`
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
  MODIFY `id_periode` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id_periode` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
