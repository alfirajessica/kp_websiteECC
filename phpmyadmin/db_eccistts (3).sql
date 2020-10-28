-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2020 at 06:31 AM
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
  `nama_kelas` varchar(10) CHARACTER SET utf8 NOT NULL,
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
(1, 553, 'Level 1', 'A', 'Selasa', '06:30', '08:00', 20, '217180345', '0', 15),
(1, 554, 'Level 1', 'B', 'Selasa', '06:30', '08:00', 10, '217180345', '0', 17),
(1, 555, 'Level 1', 'C', 'Rabu', '06:30', '08:00', -1, 'alfira1', '0', 18),
(1, 557, 'Level 1', 'D', 'Kamis', '06:30', '08:00', -1, 'alfira1', '0', 15),
(1, 558, 'Level 1', 'E', 'Selasa', '06:30', '08:00', 10, '217180345', '0', 15),
(1, 559, 'Level 2', 'A', '', '06:30', '08:00', 0, '-', '0', 0),
(1, 560, 'Level 2', 'B', '', '06:30', '08:00', 0, '-', '0', 0),
(1, 561, 'Level 3', 'A', '', '06:30', '08:00', 0, '-', '0', 0),
(1, 562, 'Level 3', 'B', '', '06:30', '08:00', 0, '-', '0', 0),
(1, 563, 'Level 2', 'C', 'Kamis', '06:30', '08:00', -1, 'alfira1', '0', 18),
(1, 564, 'Level 3', 'C', '', '06:30', '08:00', 0, '-', '0', 0),
(1, 565, 'Level 3', 'D', '', '06:30', '08:00', 0, '-', '0', 0),
(1, 566, 'Level 3', 'E', '', '06:30', '08:00', 0, '-', '0', 0);

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
  `id_periode` int(11) NOT NULL,
  `nrp` varchar(10) NOT NULL,
  `nama_mhs` varchar(30) NOT NULL,
  `current_level` varchar(10) NOT NULL,
  `nilai_placement` int(10) NOT NULL,
  `status_mhs` varchar(2) NOT NULL COMMENT '0 - Mhs nonaktif, 1 - mhs aktif ECC'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_periode`, `nrp`, `nama_mhs`, `current_level`, `nilai_placement`, `status_mhs`) VALUES
(0, '217180382', 'Alfira', 'I', -1, '1'),
(0, '217180384', 'Arnold', 'I', 0, '1');

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
(16, 'B-302', '0'),
(17, 'U-401', '1'),
(18, 'U-402', '1');

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
(217180382, 'Alfira', 250, '2'),
(217180384, 'Arnold', 0, '1');

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
(200, 300, 500, 600);

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
('alfira1', 'ce3eaa938d09504bae9458dffb805f2de7c9da4e', 'Fira', 'dosen', 1);

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
  MODIFY `id_kelas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=567;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id_periode` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ruang_kelas`
--
ALTER TABLE `ruang_kelas`
  MODIFY `id_ruangkelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
