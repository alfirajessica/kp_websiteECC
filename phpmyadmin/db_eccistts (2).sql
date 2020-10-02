-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2020 at 12:09 PM
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
  `nama_kelas` varchar(10) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam` varchar(10) NOT NULL,
  `kuota` int(10) NOT NULL,
  `dosen` varchar(30) NOT NULL,
  `status_kelas` varchar(2) NOT NULL COMMENT '0 - Tidak aktif, 1 - Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `status_mhs` varchar(2) NOT NULL COMMENT '0 - Mhs nonaktif, 1 - mhs aktif ECC'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `thn_akademik` varchar(10) NOT NULL COMMENT 'YYYY/YYYY dst'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`id_periode`, `semester`, `thn_akademik`) VALUES
(1, 'Gasal', '2020/2021');

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

--
-- Dumping data for table `temp_mahasiswa`
--

INSERT INTO `temp_mahasiswa` (`nrp`, `nama_mahasiswa`, `nilai_placement`, `level`) VALUES
(217180385, 'name 2', 12, '1'),
(217180386, 'name 3', 17, '2'),
(217180387, 'name 4', 13, '2'),
(217180388, 'name 5', 5, '1'),
(217180389, 'name 6', 20, '2'),
(217180390, 'name 7', 27, '3'),
(217180391, 'name 8', 35, '4'),
(217180392, 'name 9', 33, '3'),
(217180393, 'name 10', 46, '4'),
(217180394, 'name 11', 40, '4');

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
(12, 20, 34, 50);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `level` varchar(10) NOT NULL COMMENT 'admin - dosen'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `nama`, `level`) VALUES
('217180382', '64ec997f263a63e35d3737e47799ebc53f406bcb', 'alfira', 'admin'),
('alfira1', 'ce3eaa938d09504bae9458dffb805f2de7c9da4e', 'Fira', 'dosen'),
('Arnold1', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'arnold admin', 'admin'),
('Arnold88', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Arnold', 'dosen');

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
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id_periode` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
