-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2022 at 04:09 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehicle_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `app`
--

CREATE TABLE `app` (
  `arduino_signal` int(11) NOT NULL,
  `number_plate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `app`
--

INSERT INTO `app` (`arduino_signal`, `number_plate`) VALUES
(2, '');

-- --------------------------------------------------------

--
-- Table structure for table `dept`
--

CREATE TABLE `dept` (
  `dept_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dept`
--

INSERT INTO `dept` (`dept_name`) VALUES
('MCA'),
('BCA'),
('BCA'),
('BCA');

-- --------------------------------------------------------

--
-- Table structure for table `vehicleinfo`
--

CREATE TABLE `vehicleinfo` (
  `id` int(11) NOT NULL,
  `vehicle_no` varchar(15) NOT NULL,
  `uname` varchar(30) DEFAULT NULL,
  `contact` bigint(11) DEFAULT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `dept` varchar(50) DEFAULT NULL,
  `rollno` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicleinfo`
--

INSERT INTO `vehicleinfo` (`id`, `vehicle_no`, `uname`, `contact`, `designation`, `dept`, `rollno`) VALUES
(2, 'AS012M5804', 'admin', 8398726524, 'Faculty', 'MCA', ''),
(4, 'KL21S8086', 'Ustm', 9898744244, 'Student', 'MCA', '2020/MCA/0009');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vehicleinfo`
--
ALTER TABLE `vehicleinfo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vehicle_no` (`vehicle_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vehicleinfo`
--
ALTER TABLE `vehicleinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
