-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 30, 2019 at 05:47 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dia-mon_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

DROP TABLE IF EXISTS `admin_login`;
CREATE TABLE IF NOT EXISTS `admin_login` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`ID`, `username`, `password`) VALUES
(1, 'mokshmodi96@gmail.com', 'M2NmMTA4YTRlMGE0OTgzNDdhNWE3NWE3OTJmMjMyMTI=');

-- --------------------------------------------------------

--
-- Table structure for table `ci_re_detail`
--

DROP TABLE IF EXISTS `ci_re_detail`;
CREATE TABLE IF NOT EXISTS `ci_re_detail` (
  `c_r_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_id` int(30) NOT NULL,
  `c_id` int(30) NOT NULL,
  `c_pic` text NOT NULL,
  `c_date` varchar(40) NOT NULL,
  PRIMARY KEY (`c_r_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_info`
--

DROP TABLE IF EXISTS `doctor_info`;
CREATE TABLE IF NOT EXISTS `doctor_info` (
  `d_i_id` int(100) NOT NULL AUTO_INCREMENT,
  `d_id` int(30) NOT NULL,
  `d_firstname` varchar(100) NOT NULL,
  `d_lastname` varchar(100) NOT NULL,
  `d_contact_info` varchar(50) NOT NULL,
  `d_gender` varchar(30) NOT NULL,
  `d_pic` varchar(60) DEFAULT NULL,
  `d_address` text NOT NULL,
  `d_city` varchar(100) NOT NULL,
  `d_pincode` int(20) NOT NULL,
  `d_reg` varchar(100) NOT NULL,
  `d_degree` varchar(100) NOT NULL,
  `d_createddate` date NOT NULL,
  `d_modifydate` date NOT NULL,
  PRIMARY KEY (`d_i_id`),
  UNIQUE KEY `d_contact_info` (`d_contact_info`),
  UNIQUE KEY `d_reg` (`d_reg`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_info`
--

INSERT INTO `doctor_info` (`d_i_id`, `d_id`, `d_firstname`, `d_lastname`, `d_contact_info`, `d_gender`, `d_pic`, `d_address`, `d_city`, `d_pincode`, `d_reg`, `d_degree`, `d_createddate`, `d_modifydate`) VALUES
(5, 5, 'Makhdum', 'Husain', '9586269430', 'Male', NULL, 'Nanpura Surat', 'Surat', 395003, 'Der7890', 'Bhms', '2019-03-24', '2019-03-24'),
(4, 4, 'Moksh', 'Modi', '9724376699', 'Male', NULL, 'Surat', 'Surat', 395001, '245955', 'BSC', '2019-03-24', '2019-03-24'),
(6, 6, 'Demodoc', 'Demoname', '9558709262', 'Male', NULL, 'Hdjdj', 'Hdhdh', 3939, 'Hdhdh', 'Hdhdh', '2019-03-28', '2019-03-28');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_login`
--

DROP TABLE IF EXISTS `doctor_login`;
CREATE TABLE IF NOT EXISTS `doctor_login` (
  `d_id` int(100) NOT NULL AUTO_INCREMENT,
  `d_email` varchar(100) NOT NULL,
  `d_password` varchar(100) NOT NULL,
  `d_status` tinyint(1) NOT NULL,
  `d_created_time` date NOT NULL,
  `d_modify_date` date NOT NULL,
  PRIMARY KEY (`d_id`),
  UNIQUE KEY `d_email` (`d_email`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_login`
--

INSERT INTO `doctor_login` (`d_id`, `d_email`, `d_password`, `d_status`, `d_created_time`, `d_modify_date`) VALUES
(5, 'mnnandoliya@gmail.com', 'ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=', 1, '2019-03-24', '2019-03-24'),
(4, 'mokshmodi96@gmail.com', 'M2NmMTA4YTRlMGE0OTgzNDdhNWE3NWE3OTJmMjMyMTI=', 1, '2019-03-24', '2019-03-24'),
(6, 'mnnandoliya123@gmail.com', 'ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=', 1, '2019-03-28', '2019-03-28');

-- --------------------------------------------------------

--
-- Table structure for table `doc_pre`
--

DROP TABLE IF EXISTS `doc_pre`;
CREATE TABLE IF NOT EXISTS `doc_pre` (
  `do_pr_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_id` int(20) NOT NULL,
  `u_id` int(20) NOT NULL,
  `pre_detail` text NOT NULL,
  `pre_pic` text NOT NULL,
  `pre_date` varchar(40) NOT NULL,
  `c_r_id` int(30) DEFAULT NULL,
  PRIMARY KEY (`do_pr_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doc_pre`
--

INSERT INTO `doc_pre` (`do_pr_id`, `d_id`, `u_id`, `pre_detail`, `pre_pic`, `pre_date`, `c_r_id`) VALUES
(2, 5, 6, 'bdbhdhd', 'upload/sub_ckrxyfo93w2z1ptsz81y.jpg', '2019-03-30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `d_appionment`
--

DROP TABLE IF EXISTS `d_appionment`;
CREATE TABLE IF NOT EXISTS `d_appionment` (
  `d_a_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_id` int(30) NOT NULL,
  `c_id` int(30) NOT NULL,
  `a_status` int(30) NOT NULL,
  `a_date` varchar(60) NOT NULL,
  `a_time` varchar(60) NOT NULL,
  `a_cdate` varchar(50) NOT NULL,
  PRIMARY KEY (`d_a_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `d_appionment`
--

INSERT INTO `d_appionment` (`d_a_id`, `d_id`, `c_id`, `a_status`, `a_date`, `a_time`, `a_cdate`) VALUES
(1, 5, 6, 1, '25-3-2019', '12:20', '2019-03-25'),
(2, 6, 7, 1, '28-3-2019', '14:32', '2019-03-28');

-- --------------------------------------------------------

--
-- Table structure for table `medical_store`
--

DROP TABLE IF EXISTS `medical_store`;
CREATE TABLE IF NOT EXISTS `medical_store` (
  `m_s_id` int(100) NOT NULL AUTO_INCREMENT,
  `m_s_name` varchar(100) DEFAULT NULL,
  `m_s_email` varchar(200) NOT NULL,
  `m_s_address` varchar(100) DEFAULT NULL,
  `m_s_phone_no` varchar(100) NOT NULL,
  `m_s_city` varchar(100) DEFAULT NULL,
  `m_s_pincode` varchar(50) DEFAULT NULL,
  `m_s_regno` varchar(100) DEFAULT NULL,
  `m_s_starttime` varchar(50) DEFAULT NULL,
  `m_s_endtime` varchar(50) DEFAULT NULL,
  `m_s_alltime` varchar(50) DEFAULT NULL,
  `m_s_status` tinyint(1) NOT NULL DEFAULT '0',
  `m_s_createdate` date DEFAULT NULL,
  `m_s_modifydate` date DEFAULT NULL,
  PRIMARY KEY (`m_s_id`),
  UNIQUE KEY `m_s_email` (`m_s_email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medical_store`
--

INSERT INTO `medical_store` (`m_s_id`, `m_s_name`, `m_s_email`, `m_s_address`, `m_s_phone_no`, `m_s_city`, `m_s_pincode`, `m_s_regno`, `m_s_starttime`, `m_s_endtime`, `m_s_alltime`, `m_s_status`, `m_s_createdate`, `m_s_modifydate`) VALUES
(1, 'Moksh Modi', 'mokshmodi96@gmail.com', '19-suflam soc. opp-kadam bhavan hall,nanpura surat', '9724376699', 'Surat', '395001', '7842568565852', '06:30', '03:30', NULL, 1, '2019-03-17', '2019-03-17'),
(2, 'Shiv Medical', 'anujgajjar89@gmail.com', 'Surat\n                            ', '7096000020', 'Surat', '395001', '15156525', '09:30', '09:30', NULL, 1, '2019-03-17', '2019-03-17'),
(3, 'Remedy Medicals', 'pinkymodi46@gmail.com', 'Surat\n                            ', '9825066755', 'Surat', '395001', '7454565125', '09:30', '09:30', NULL, 1, '2019-03-17', '2019-03-17'),
(4, 'Remedy Medicals', 'cmod997@gmail.com', 'Surat\n                            ', '9099066755', 'Surat', '395001', '755325', '09:30', '09:30', NULL, 1, '2019-03-17', '2019-03-17');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_data`
--

DROP TABLE IF EXISTS `medicine_data`;
CREATE TABLE IF NOT EXISTS `medicine_data` (
  `m_id` int(100) NOT NULL AUTO_INCREMENT,
  `m_name` varchar(100) NOT NULL,
  `m_company` varchar(100) NOT NULL,
  `m_price` double NOT NULL,
  `m_drug` varchar(100) NOT NULL,
  `m_drug_type` varchar(100) NOT NULL,
  `createdate` date NOT NULL,
  `modifydate` date NOT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine_data`
--

INSERT INTO `medicine_data` (`m_id`, `m_name`, `m_company`, `m_price`, `m_drug`, `m_drug_type`, `createdate`, `modifydate`) VALUES
(1, 'Gyclomet GP Forte', 'Anuj Medicals', 50.2, 'Gyclomet', 'Diabetes', '2019-03-22', '2019-03-22'),
(2, 'Dispirine', 'Anuj Medicals', 100.85, 'Disprine', 'Fever', '2019-03-22', '2019-03-22'),
(3, 'Vicks Cough Strips', 'Remedy Medicals', 58.66, 'Vicks', 'Fever', '2019-03-22', '2019-03-22');

-- --------------------------------------------------------

--
-- Table structure for table `p_request`
--

DROP TABLE IF EXISTS `p_request`;
CREATE TABLE IF NOT EXISTS `p_request` (
  `p_r_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_id` int(30) NOT NULL,
  `c_id` int(30) NOT NULL,
  `p_r_status` int(30) NOT NULL,
  PRIMARY KEY (`p_r_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_request`
--

INSERT INTO `p_request` (`p_r_id`, `d_id`, `c_id`, `p_r_status`) VALUES
(6, 1, 6, 0),
(7, 5, 6, 1),
(8, 4, 6, 0),
(9, 6, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

DROP TABLE IF EXISTS `user_login`;
CREATE TABLE IF NOT EXISTS `user_login` (
  `u_id` int(100) NOT NULL AUTO_INCREMENT,
  `u_fname` varchar(100) NOT NULL,
  `u_lname` varchar(100) NOT NULL,
  `u_email` varchar(100) NOT NULL,
  `u_password` varchar(200) NOT NULL,
  `u_phone_no` varchar(100) NOT NULL,
  `u_gender` varchar(20) NOT NULL,
  `u_pic` varchar(100) DEFAULT NULL,
  `u_status` int(100) NOT NULL,
  `createdate` date NOT NULL,
  `modifydate` date NOT NULL,
  PRIMARY KEY (`u_id`),
  UNIQUE KEY `u_email` (`u_email`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`u_id`, `u_fname`, `u_lname`, `u_email`, `u_password`, `u_phone_no`, `u_gender`, `u_pic`, `u_status`, `createdate`, `modifydate`) VALUES
(7, 'Anuja', 'Jdjs', 'qmnnandoliya@gmail.com', 'ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=', '9558702926', 'Male', NULL, 1, '2019-03-28', '2019-03-28'),
(6, 'Mobile Demo', 'Mobipe', 'mnnandoliya@gmail.com', 'ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=', '9586269430', 'Male', NULL, 1, '2019-03-24', '2019-03-24');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
