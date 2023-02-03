-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2022 at 07:00 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php-login`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `aldomgiinnId` int(11) NOT NULL,
  `aldomgiinnN` varchar(128) CHARACTER SET utf8mb4 NOT NULL,
  `aldomgiinnP` varchar(128) CHARACTER SET utf8mb4 NOT NULL,
  `aldomgiinnE` varchar(128) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`aldomgiinnId`, `aldomgiinnN`, `aldomgiinnP`, `aldomgiinnE`) VALUES
(5, 'admin3', '$2y$10$s5Lad5XVBMB3EoASal1bhORohY24T34fteMRgTHYbGczeDXWpKtfG', 'admin3@gmail.com'),
(4, 'admin2', '$2y$10$FCor9.QlxIR3aH/Fcouvt.cpGK9ws89z60c6m6nK6HKznyw9sPPNe', 'admin2@gmail.com'),
(3, 'admin', '$2y$10$FCor9.QlxIR3aH/Fcouvt.cpGK9ws89z60c6m6nK6HKznyw9sPPNe', 'admin@gmail.com'),
(6, 'admin4', '$2y$10$JHo9MYTLEtWf5SPIidBJq.8hJZs5f8eKAp4g4E7KpTocAHYJKHviO', 'admin4@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`aldomgiinnId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `aldomgiinnId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
