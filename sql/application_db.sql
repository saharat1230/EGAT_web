-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2020 at 04:02 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `application_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appdata`
--

CREATE TABLE `appdata` (
  `id` varchar(10) NOT NULL,
  `appname` varchar(255) NOT NULL,
  `contact_point` varchar(100) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `project_start` date NOT NULL,
  `project_end` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `detail_name` varchar(255) NOT NULL,
  `percent` int(10) NOT NULL,
  `date_start` date NOT NULL,
  `date_complete` date NOT NULL,
  `date_end` date NOT NULL,
  `total` int(10) NOT NULL,
  `detail_name_1` varchar(255) NOT NULL,
  `percent_1` int(10) NOT NULL,
  `date_start_1` date NOT NULL,
  `date_complete_1` date NOT NULL,
  `date_end_1` date NOT NULL,
  `total_1` int(10) NOT NULL,
  `detail_name_2` varchar(255) NOT NULL,
  `percent_2` int(10) NOT NULL,
  `date_start_2` date NOT NULL,
  `date_complete_2` date NOT NULL,
  `date_end_2` date NOT NULL,
  `total_2` int(10) NOT NULL,
  `detail_name_3` varchar(255) NOT NULL,
  `percent_3` int(10) NOT NULL,
  `date_start_3` date NOT NULL,
  `date_complete_3` date NOT NULL,
  `date_end_3` date NOT NULL,
  `total_3` int(10) NOT NULL,
  `detail_name_4` varchar(255) NOT NULL,
  `percent_4` int(10) NOT NULL,
  `date_start_4` date NOT NULL,
  `date_complete_4` date NOT NULL,
  `date_end_4` date NOT NULL,
  `total_4` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inventoryapp`
--

CREATE TABLE `inventoryapp` (
  `id` varchar(10) NOT NULL,
  `appname` varchar(255) NOT NULL,
  `contact_point` varchar(100) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `project_start` date NOT NULL,
  `project_end` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `username`, `password`, `name`, `level`) VALUES
(1, '111', '111', 'admindemo', 'ADMIN'),
(2, '222', '222', 'userdemo', 'Member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appdata`
--
ALTER TABLE `appdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventoryapp`
--
ALTER TABLE `inventoryapp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
