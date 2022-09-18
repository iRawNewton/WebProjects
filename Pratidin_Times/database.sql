-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2022 at 08:21 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee_mgt`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `emp_id` int(11) NOT NULL,
  `a_status` varchar(30) NOT NULL,
  `a_date` varchar(30) NOT NULL,
  `month` varchar(30) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`emp_id`, `a_status`, `a_date`, `month`, `year`) VALUES
(5412, 'Present', '2022-06-25', 'June', 2022),
(5412, 'Present', '2022-07-01', 'July', 2022),
(5413, 'Present', '2022-07-01', 'July', 2022),
(5414, 'Present', '2022-07-01', 'July', 2022),
(5412, 'Present', '2022-07-18', 'July', 2022);

-- --------------------------------------------------------

--
-- Table structure for table `duty_allocation`
--

CREATE TABLE `duty_allocation` (
  `allocation_no` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL,
  `duty_days` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `duty_allocation`
--

INSERT INTO `duty_allocation` (`allocation_no`, `emp_id`, `shift_id`, `duty_days`, `location`) VALUES
(1551, 5412, 1, ' Monday Wednesday Saturday', 'Main Office');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `e_name` varchar(30) NOT NULL,
  `e_address` varchar(40) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `b_salary` decimal(10,2) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `e_name`, `e_address`, `phone`, `email`, `designation`, `b_salary`, `photo`, `password`) VALUES
(5412, 'Rajnish', 'Guwahati, Assam', 2122345678, 'rajnish@gmail.com', 'Assistant Manager', '35000.00', '99229-download.jpg', 'rajnish@gmail.com'),
(5413, 'Puja Bhaat', 'Guwahati, Assam', 6756765432, 'puja@gmail.com', 'Mgr', '30000.00', '77823-e2.jpg', 'puja@gmail.com'),
(5414, 'Harkishan', 'Guwahati, Assam', 5467876543, 'harkishan@gmail.com', 'Software Engineer', '40000.00', '44847-e3.jpg', 'harkishan@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `leave_details`
--

CREATE TABLE `leave_details` (
  `leave_no` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `leave_type` varchar(50) NOT NULL,
  `f_date` varchar(30) NOT NULL,
  `t_date` varchar(30) NOT NULL,
  `days` int(11) NOT NULL,
  `month` varchar(30) NOT NULL,
  `year` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leave_details`
--

INSERT INTO `leave_details` (`leave_no`, `emp_id`, `leave_type`, `f_date`, `t_date`, `days`, `month`, `year`, `status`) VALUES
(2223, 5414, 'Casual Leave', '2022-07-08', '2022-07-08', 4, 'July', 2022, 'Accepted'),
(2224, 5412, 'Casual Leave', '2022-07-04', '2022-07-05', 2, 'July', 2022, 'Rejected'),
(2225, 5414, 'Paid Leave', '2022-07-11', '2022-07-13', 3, 'July', 2022, 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `leave_master`
--

CREATE TABLE `leave_master` (
  `leave_id` int(11) NOT NULL,
  `l_type` varchar(30) NOT NULL,
  `l_days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leave_master`
--

INSERT INTO `leave_master` (`leave_id`, `l_type`, `l_days`) VALUES
(5511, 'Sick Leave', 12),
(5512, 'Casual', 12),
(5513, 'Earned Leave/PL', 32);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `salary_no` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `b_salary` decimal(10,2) NOT NULL,
  `deduction` decimal(10,2) NOT NULL,
  `allowance` decimal(10,2) NOT NULL,
  `net_salary` decimal(10,2) NOT NULL,
  `month` varchar(30) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`salary_no`, `emp_id`, `b_salary`, `deduction`, `allowance`, `net_salary`, `month`, `year`) VALUES
(1445, 5412, '35000.00', '1166.67', '200.00', '34034.00', 'July', 2022);

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE `shift` (
  `shift_id` int(11) NOT NULL,
  `shift_name` varchar(30) NOT NULL,
  `timing` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shift`
--

INSERT INTO `shift` (`shift_id`, `shift_name`, `timing`) VALUES
(1, 'Morning Shift', '7 To 12'),
(2, 'Day Shift', '12 To 5');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('admin', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `duty_allocation`
--
ALTER TABLE `duty_allocation`
  ADD PRIMARY KEY (`allocation_no`),
  ADD KEY `eid` (`emp_id`),
  ADD KEY `sid` (`shift_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `leave_details`
--
ALTER TABLE `leave_details`
  ADD PRIMARY KEY (`leave_no`);

--
-- Indexes for table `leave_master`
--
ALTER TABLE `leave_master`
  ADD PRIMARY KEY (`leave_id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`salary_no`),
  ADD KEY `empid` (`emp_id`);

--
-- Indexes for table `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`shift_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `duty_allocation`
--
ALTER TABLE `duty_allocation`
  ADD CONSTRAINT `eid` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sid` FOREIGN KEY (`shift_id`) REFERENCES `shift` (`shift_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `empid` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
