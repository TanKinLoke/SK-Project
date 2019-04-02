-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 02, 2019 at 08:30 AM
-- Server version: 10.3.12-MariaDB
-- PHP Version: 7.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Sistem_Aset_Bilik_iCreatorZ`
--

-- --------------------------------------------------------

--
-- Table structure for table `Aset_Info`
--

CREATE TABLE `Aset_Info` (
  `Nama_Aset` varchar(30) NOT NULL,
  `Aset_ID` varchar(5) NOT NULL,
  `Jenis_Aset` varchar(20) NOT NULL,
  `Bilangan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Aset_Info`
--

INSERT INTO `Aset_Info` (`Nama_Aset`, `Aset_ID`, `Jenis_Aset`, `Bilangan`) VALUES
('Soldering Iron', '122', 'Electronic', 10),
('Screwdriver', '123', 'Handtools', 13),
('Hammer', '153', 'Handtools', 15);

-- --------------------------------------------------------

--
-- Table structure for table `Aset_Report`
--

CREATE TABLE `Aset_Report` (
  `Aset_ID` varchar(5) NOT NULL,
  `Nama_Aset` varchar(20) NOT NULL,
  `Jenis_Aset` varchar(20) NOT NULL,
  `Bilangan` int(11) NOT NULL,
  `Report` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Aset_Report`
--

INSERT INTO `Aset_Report` (`Aset_ID`, `Nama_Aset`, `Jenis_Aset`, `Bilangan`, `Report`) VALUES
('122', 'Soldering Iron', 'Electronic', 10, 'Tiada masalah'),
('153', 'Hammer', 'Handtools', 15, 'Tiada masalah');

-- --------------------------------------------------------

--
-- Table structure for table `Pengguna`
--

CREATE TABLE `Pengguna` (
  `User_ID` varchar(5) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `User_Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Pengguna`
--

INSERT INTO `Pengguna` (`User_ID`, `Username`, `Email`, `User_Password`) VALUES
('498', 'Bento', 'kinloketan@gmail.com', 'a'),
('500', 'Vento', 'kinloketan@gmail.com', 'a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Aset_Info`
--
ALTER TABLE `Aset_Info`
  ADD PRIMARY KEY (`Aset_ID`);

--
-- Indexes for table `Aset_Report`
--
ALTER TABLE `Aset_Report`
  ADD PRIMARY KEY (`Aset_ID`),
  ADD UNIQUE KEY `Nama_Aset` (`Nama_Aset`);

--
-- Indexes for table `Pengguna`
--
ALTER TABLE `Pengguna`
  ADD PRIMARY KEY (`Username`),
  ADD UNIQUE KEY `User_ID` (`User_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
