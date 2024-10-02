-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 31, 2023 at 11:17 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_uniballot`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL auto_increment,
  `adm_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  PRIMARY KEY  (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `adm_name`, `admin_email`, `admin_password`) VALUES
(7, 'principal', 'principal@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assignelectionteacher`
--

CREATE TABLE `tbl_assignelectionteacher` (
  `assignelectionteacher_id` int(11) NOT NULL auto_increment,
  `teacher_id` int(11) NOT NULL,
  `election_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  PRIMARY KEY  (`assignelectionteacher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `tbl_assignelectionteacher`
--

INSERT INTO `tbl_assignelectionteacher` (`assignelectionteacher_id`, `teacher_id`, `election_id`, `batch_id`) VALUES
(26, 16, 18, 15),
(27, 12, 0, 13),
(28, 14, 19, 14);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_batch`
--

CREATE TABLE `tbl_batch` (
  `department_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL auto_increment,
  `batch_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`batch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tbl_batch`
--

INSERT INTO `tbl_batch` (`department_id`, `batch_id`, `batch_name`) VALUES
(6, 13, '1st year'),
(6, 14, '2nd year'),
(7, 16, '1st year'),
(7, 17, '2nd year');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_candidate`
--

CREATE TABLE `tbl_candidate` (
  `candidate_id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `election_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `candidate_status` varchar(100) NOT NULL,
  `submission_date` date NOT NULL,
  PRIMARY KEY  (`candidate_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `tbl_candidate`
--

INSERT INTO `tbl_candidate` (`candidate_id`, `user_id`, `election_id`, `batch_id`, `candidate_status`, `submission_date`) VALUES
(32, 9, 18, 15, '1', '2023-10-31'),
(33, 8, 18, 15, '1', '2023-10-31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `department_id` int(11) NOT NULL auto_increment,
  `department_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`department_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`department_id`, `department_name`) VALUES
(6, 'bca'),
(8, 'bvoc');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_election`
--

CREATE TABLE `tbl_election` (
  `election_id` int(11) NOT NULL auto_increment,
  `election_details` varchar(100) NOT NULL,
  `election_name` varchar(50) NOT NULL,
  `election_declareddate` date NOT NULL,
  `election_date` date NOT NULL,
  `election_time` time NOT NULL,
  PRIMARY KEY  (`election_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tbl_election`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_electionteacher`
--

CREATE TABLE `tbl_electionteacher` (
  `electionteacher_id` int(11) NOT NULL auto_increment,
  `electionteacher_name` varchar(50) NOT NULL,
  `electionteacher_email` varchar(50) NOT NULL,
  `electionteacher_password` varchar(50) NOT NULL,
  `electionteacher_proof` varchar(50) NOT NULL,
  `electionteacher_photo` varchar(500) NOT NULL,
  `electionteacher_contact` varchar(15) NOT NULL,
  PRIMARY KEY  (`electionteacher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tbl_electionteacher`
--

INSERT INTO `tbl_electionteacher` (`electionteacher_id`, `electionteacher_name`, `electionteacher_email`, `electionteacher_password`, `electionteacher_proof`, `electionteacher_photo`, `electionteacher_contact`) VALUES
(12, 'preethy', 'preethy@gmail.com', '123', 'Screenshot (1).png', 'Screenshot (1).png', '87654545'),
(13, 'elizabeth', 'elizabeth@gmail.com', '123', 'Screenshot (1).png', 'Screenshot (1).png', '87856473'),
(14, 'niby babu', 'niby@gmail.com', '123', 'Screenshot (1).png', 'Screenshot (1).png', '976474937'),
(15, 'arya s nair', 'arya@gmail.com', '123', 'Screenshot (1).png', 'Screenshot (1).png', '87859857'),
(16, 'akhil', 'akhil@gmail.com', '123', 'Screenshot (1).png', 'Screenshot (1).png', '9446872501'),
(17, 'njaan ', 'njaan@gmail.com', '123', 'Screenshot (1).png', 'Screenshot (1).png', '8749998');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_result`
--

CREATE TABLE `tbl_result` (
  `polling_id` int(11) NOT NULL auto_increment,
  `polling_datetime` datetime NOT NULL,
  `polling_status` varchar(100) NOT NULL default '0',
  `candidate_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY  (`polling_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `tbl_result`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL auto_increment,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_admissionno` varchar(50) NOT NULL,
  `batch_id` int(50) NOT NULL,
  `user_photo` varchar(50) NOT NULL,
  `user_rollno` int(11) NOT NULL,
  `user_status` varchar(100) NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_admissionno`, `batch_id`, `user_photo`, `user_rollno`, `user_status`) VALUES
(8, 'rishi', 'rishi@gmail.com', '123', 'd656d', 15, 'Screenshot (1).png', 37, '1'),
(9, 'eappen', 'eappen@gmail.com', '123', 're333', 15, 'Screenshot (1).png', 28, '1'),
(10, 'lamiya', 'lamiya@gmail.com', '123', 'sa4554', 14, 'Screenshot (1).png', 53, '1'),
(11, 'ananya', 'ananya@gmail.com', '123', 'sa4552', 14, 'Screenshot (1).png', 20, '2'),
(12, 'ashkar mujeeb', 'ashkar@gmail.com', '123', 'db656', 14, 'Screenshot (1).png', 1, '2'),
(13, 'abhimanue', 'abhimanue@gmail.com', '123', 'dc6564', 15, 'Screenshot (1).png', 1, '1'),
(14, 'avani', 'avani@gmail.com', '123', 'qw3421', 13, 'Screenshot (1).png', 22, '1'),
(15, 'gauri sri', 'gauri@gmail.com', '123', 'sa2233', 13, 'Screenshot (1).png', 56, ''),
(16, 'lia', 'lia@gmail.com', '123', 'sg3322', 13, 'Screenshot (1).png', 22, ''),
(17, 'Ashin', 'ashin@gmail.com', '123', 'sa3333', 15, 'Screenshot (1).png', 33, '1');
