-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.62


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema jm
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ jm;
USE jm;

--
-- Table structure for table `jm`.`admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jm`.`admin`
--

/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`username`,`password`) VALUES 
 ('admin','root');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;


--
-- Table structure for table `jm`.`emp`
--

DROP TABLE IF EXISTS `emp`;
CREATE TABLE `emp` (
  `e_id` int(11) NOT NULL,
  `e_name` varchar(50) DEFAULT NULL,
  `e_dob` date DEFAULT NULL,
  `e_desgn` varchar(50) DEFAULT NULL,
  `e_dept` varchar(20) DEFAULT NULL,
  `e_doj` date DEFAULT NULL,
  `e_pan` varchar(15) DEFAULT NULL,
  `e_aadhar` bigint(20) DEFAULT NULL,
  `e_ph` bigint(13) DEFAULT NULL,
  `e_address` varchar(100) DEFAULT NULL,
  `e_city` varchar(20) DEFAULT NULL,
  `e_state` varchar(20) DEFAULT NULL,
  `e_pin` int(6) DEFAULT NULL,
  `e_dor` date DEFAULT NULL,
  `e_dop` date DEFAULT NULL,
  `e_pos` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`e_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jm`.`emp`
--

/*!40000 ALTER TABLE `emp` DISABLE KEYS */;
INSERT INTO `emp` (`e_id`,`e_name`,`e_dob`,`e_desgn`,`e_dept`,`e_doj`,`e_pan`,`e_aadhar`,`e_ph`,`e_address`,`e_city`,`e_state`,`e_pin`,`e_dor`,`e_dop`,`e_pos`) VALUES 
 (12,'gaurab','2022-07-14','Software','saa','2022-07-07','ws',23,7002958113,'C/o Shri Biresh Deb, Netaji Road, Madhya Sripuria, Tinsukia, Assam','Tinsukia','Assam',786125,'2022-07-11','2022-07-12','GM'),
 (1001,'Jintu','2022-07-07','BDO','ssss','2022-07-22','ws',2444,7002958113,'C/o Shri Biresh Deb, Netaji Road, Madhya Sripuria, Tinsukia, Assam','Tinsukia','Assam',786125,'2022-07-15',NULL,NULL);
/*!40000 ALTER TABLE `emp` ENABLE KEYS */;


--
-- Table structure for table `jm`.`job`
--

DROP TABLE IF EXISTS `job`;
CREATE TABLE `job` (
  `j_ID` int(11) NOT NULL,
  `j_title` varchar(30) DEFAULT NULL,
  `j_desc` varchar(200) DEFAULT NULL,
  `j_jobapply` varchar(100) DEFAULT NULL,
  `j_addinfo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`j_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jm`.`job`
--

/*!40000 ALTER TABLE `job` DISABLE KEYS */;
INSERT INTO `job` (`j_ID`,`j_title`,`j_desc`,`j_jobapply`,`j_addinfo`) VALUES 
 (1001,'SD','dsfafasfasfsfds dfasdfasdfadsf adsfsadfsdafadsfsad','asfdsdfads adsfasdfasf dadfasfadsf','fdasfsdf dsffffffffffffffffffffffffffffffffffffffffffffffffff'),
 (1002,'SDE','sadasdasd','rfderafvrarvzdr','fdasfsdf dsffffffffffffffffffffffffffffffffffffffffffffffffff'),
 (1003,'SW','ffffffffffffffffffffffffffffff hhhhhhhhhhhhhhhhhhhhhhhhhhh fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff','fhhhhfhcsfgsfvvbbggvb fdvfdvrsvc  fdvdfsv','fdasfsdf dsffffffffffffffffffffffffffffffffffffffffffffffffff dvssssssssssssssssssss'),
 (1004,'Software Engineer','ajkf,jadsbfh asdkjlfhjadshfljkads adsjfhladshfjklad jkladsfljhkadshfla kjladsfljkadslfhads jklhsladfhkjadsl safadsfasdf','ajfhjadshfjklas asdkjfhkjadshfjhadsjf jkdsfkjadshfjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj','fdasfsdf dsffffffffffffffffffffffffffffffffffffffffffffffffff dvssssssssssssssssssss');
/*!40000 ALTER TABLE `job` ENABLE KEYS */;


--
-- Table structure for table `jm`.`leave_`
--

DROP TABLE IF EXISTS `leave_`;
CREATE TABLE `leave_` (
  `l_id` int(11) NOT NULL,
  `l_emp` int(11) DEFAULT NULL,
  `l_type` varchar(20) DEFAULT NULL,
  `l_from` date DEFAULT NULL,
  `l_status` varchar(20) DEFAULT NULL,
  `l_apply` date DEFAULT NULL,
  `l_dur` int(11) DEFAULT NULL,
  `l_to` date DEFAULT NULL,
  PRIMARY KEY (`l_id`),
  KEY `l_emp` (`l_emp`),
  CONSTRAINT `leave__ibfk_1` FOREIGN KEY (`l_emp`) REFERENCES `emp` (`e_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jm`.`leave_`
--

/*!40000 ALTER TABLE `leave_` DISABLE KEYS */;
INSERT INTO `leave_` (`l_id`,`l_emp`,`l_type`,`l_from`,`l_status`,`l_apply`,`l_dur`,`l_to`) VALUES 
 (1001,12,'dfgg','2022-07-07','nullr',NULL,NULL,NULL);
/*!40000 ALTER TABLE `leave_` ENABLE KEYS */;


--
-- Table structure for table `jm`.`test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `hello` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jm`.`test`
--

/*!40000 ALTER TABLE `test` DISABLE KEYS */;
/*!40000 ALTER TABLE `test` ENABLE KEYS */;


--
-- Table structure for table `jm`.`users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(30) DEFAULT NULL,
  `u_ph` bigint(15) DEFAULT NULL,
  `u_email` varchar(30) DEFAULT NULL,
  `u_address` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jm`.`users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`u_id`,`u_name`,`u_ph`,`u_email`,`u_address`) VALUES 
 (1001,'Demo Name 1',7002958113,'gaurabroy16@gmail.com','C/o Shri Biresh Deb, Netaji Road, Madhya Sripuria, Tinsukia, Assam'),
 (1002,'Demo Name',7002958113,'gaurabroy16@gmail.com','C/o Shri Biresh Deb, Netaji Road, Madhya Sripuria, Tinsukia, Assam');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
