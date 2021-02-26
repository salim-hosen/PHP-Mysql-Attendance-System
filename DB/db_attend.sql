-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2021 at 07:35 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_attend`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendance`
--

CREATE TABLE `tbl_attendance` (
  `attId` int(11) NOT NULL,
  `stuRoll` int(11) NOT NULL,
  `attend` varchar(255) DEFAULT NULL,
  `att_time` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_attendance`
--

INSERT INTO `tbl_attendance` (`attId`, `stuRoll`, `attend`, `att_time`) VALUES
(20, 12, 'present', '2018-02-04'),
(19, 11, 'present', '2018-02-04'),
(18, 1, 'present', '2018-02-04'),
(17, 15, 'absent', '2018-02-03'),
(16, 14, 'present', '2018-02-03'),
(15, 13, 'present', '2018-02-03'),
(14, 12, 'present', '2018-02-03'),
(13, 11, 'present', '2018-02-03'),
(12, 1, 'present', '2018-02-03'),
(21, 13, 'present', '2018-02-04'),
(22, 14, 'present', '2018-02-04'),
(23, 15, 'present', '2018-02-04'),
(24, 1, 'present', '2018-02-11'),
(25, 11, 'present', '2018-02-11'),
(26, 12, 'absent', '2018-02-11'),
(27, 13, 'absent', '2018-02-11'),
(28, 14, 'present', '2018-02-11'),
(29, 15, 'present', '2018-02-11'),
(30, 1, 'present', '2021-02-21'),
(31, 11, 'present', '2021-02-21'),
(32, 12, 'present', '2021-02-21'),
(33, 13, 'absent', '2021-02-21'),
(34, 14, 'present', '2021-02-21'),
(35, 15, 'present', '2021-02-21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `stuId` int(11) NOT NULL,
  `stuName` varchar(255) DEFAULT NULL,
  `stuRoll` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`stuId`, `stuName`, `stuRoll`) VALUES
(1, 'Salim Hosen', 11),
(2, 'Rakib Hasan', 12),
(3, 'Buniwad Hasan', 13),
(4, 'Hasan Haider', 14),
(5, 'Rifat Rahman', 15),
(6, 'salim', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  ADD PRIMARY KEY (`attId`),
  ADD KEY `stuRoll` (`stuRoll`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`stuId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  MODIFY `attId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `stuId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
