-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2020 at 10:41 AM
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
(217180385, 'name 2', 16, '4'),
(217180386, 'name 3', 17, '4'),
(217180387, 'name 4', 13, '4'),
(217180388, 'name 5', 21, '4'),
(217180389, 'name 6', 20, '4'),
(217180390, 'name 7', 27, '4'),
(217180391, 'name 8', 35, '4'),
(217180392, 'name 9', 33, '4'),
(217180393, 'name 10', 46, '4'),
(217180394, 'name 11', 40, '4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `temp_mahasiswa`
--
ALTER TABLE `temp_mahasiswa`
  ADD PRIMARY KEY (`nrp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
