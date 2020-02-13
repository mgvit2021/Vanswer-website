-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 21, 2019 at 12:24 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
CREATE TABLE IF NOT EXISTS `answers` (
  `aid` int(5) DEFAULT NULL,
  `ansid` varchar(10) DEFAULT NULL,
  `ans` text,
  `unanid` varchar(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`aid`, `ansid`, `ans`, `unanid`) VALUES
(101, '17BCE1083', 'Kabhi Mat jao', '1000'),
(107, '17BCE1110', 'Bhai har slot me ek hi teacher he tumhare pas koi option nehi he gand marao.', '1005'),
(101, '17BCE1083', 'Bilkul Mat jao', '1001'),
(101, '17BCE1083', 'Bakwas he sab', '1002'),
(104, '17BCE1110', 'For super efficiency you can use clique technique followed by normal iteration. Otherwise you can use the k-means algorithm. ', '1003'),
(102, '17BCE1083', ' Nahi, chutiye', '1004'),
(106, '17BCE1110', 'Gand me ghusalo kitab', '1005'),
(108, '17BCE1110', 'Ralph Samuel Thangaraj you can take him.', '1006'),
(101, '17BCL1050', 'Bilkul bakwas he mat jao.', '1007'),
(104, '50015', 'https://towardsdatascience.com/the-5-clustering-algorithms-data-scientists-need-to-know-a36d136ef68 you can refer here.', '1008'),
(108, '17BCE1110', 'Rishabh Kumar is the best teacher. You have to take him.Otherwise you will fail.', '1009'),
(103, '50000', ' W3schools', '1010'),
(107, '17BCE1259', ' Alot of them are there', '1011'),
(106, '17BCE1259', ' Who cares', '1014'),
(110, '17BCE1258', ' NeN club is the best club you will find in VIT-C if you want to develop your entrepreneurial skills.', '1015');

-- --------------------------------------------------------

--
-- Table structure for table `appo`
--

DROP TABLE IF EXISTS `appo`;
CREATE TABLE IF NOT EXISTS `appo` (
  `patid` int(4) DEFAULT NULL,
  `docid` int(4) DEFAULT NULL,
  `appoid` int(4) DEFAULT NULL,
  `stat` varchar(50) DEFAULT NULL,
  `prescrip` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appo`
--

INSERT INTO `appo` (`patid`, `docid`, `appoid`, `stat`, `prescrip`) VALUES
(2001, 1001, 3001, 'OLD', ' MED 10\r\nMED 15\r\nMED 16'),
(2001, 1002, 3002, 'OLD', ' cascacaac'),
(2001, 1001, 3006, 'NEW', NULL),
(2001, 1002, 3007, 'NEW', NULL),
(2002, 1002, 3008, 'NEW', 'DSASD'),
(2002, 1000, 3009, 'OLD', 'MED 1\r\nMED 2\r\nMED 3'),
(2001, 1001, 3010, 'OLD', ' ascascacac'),
(2001, 1000, 3011, 'OLD', 'NEW MED 1\r\nNEW MED 2'),
(2001, 1002, 3012, 'NEW', 'NULL'),
(2003, 1001, 3013, 'NEW', 'NULL'),
(2001, 1000, 3014, 'NEW', 'NULL'),
(2003, 1003, 3015, 'OLD', 'MED 1\r\nMED2\r\nMED 3\r\nMED 4'),
(2003, 1002, 3016, 'NEW', 'NULL');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `ccode` varchar(10) DEFAULT NULL,
  `cname` varchar(50) DEFAULT NULL,
  `credits` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`ccode`, `cname`, `credits`) VALUES
('CSE2003', 'Data Structures and Algorithms', 4),
('CSE2005', 'Micrprocessor and Interfacing', 4),
('CSE1001', 'Problem Solving and Programming', 5),
('CSE1002', 'Problem Solving and Object Oriented Programming', 5),
('CSE3002', 'Internet and Web Programming', 5),
('CSE3024', 'Web Mining', 5),
('CSE1003', 'Digital Logic and Design', 5),
('CSE1004', 'Network and Communication', 5),
('CSE2001', 'Computer Architecture and Organization', 3),
('CSE2002', 'Theory of Computation and Compiler Design', 4),
('CSE2004', 'Database Management Systems', 4);

-- --------------------------------------------------------

--
-- Table structure for table `ffcs`
--

DROP TABLE IF EXISTS `ffcs`;
CREATE TABLE IF NOT EXISTS `ffcs` (
  `username` varchar(10) DEFAULT NULL,
  `pass` varchar(15) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ffcs`
--

INSERT INTO `ffcs` (`username`, `pass`, `name`) VALUES
('17BCE1110', '12345', 'Samudranil Giri');

-- --------------------------------------------------------

--
-- Table structure for table `followques`
--

DROP TABLE IF EXISTS `followques`;
CREATE TABLE IF NOT EXISTS `followques` (
  `qid` varchar(5) DEFAULT NULL,
  `regq` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `followques`
--

INSERT INTO `followques` (`qid`, `regq`) VALUES
('103', '50000'),
('106', '17BEC1050'),
('108', '17BEC1050'),
('110', '17BCE1259'),
('107', '17BCL1050'),
('106', '17BCL1050'),
('100', '17BCE1110'),
('101', '17BCE1110'),
('109', '17BCE1083'),
('109', '17BCE1110'),
('103', '17BCE1083'),
('103', '17BCE1110'),
('103', '50015'),
('107', '17BCE1259'),
('104', '50000'),
('110', '17BCE1083'),
('110', '17BCE1258'),
('110', '17BCE1110'),
('110', '17BEC1050'),
('110', '17BME1264');

-- --------------------------------------------------------

--
-- Table structure for table `info_acc`
--

DROP TABLE IF EXISTS `info_acc`;
CREATE TABLE IF NOT EXISTS `info_acc` (
  `name` varchar(50) DEFAULT NULL,
  `regno` varchar(10) NOT NULL,
  `passw` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `fac` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info_acc`
--

INSERT INTO `info_acc` (`name`, `regno`, `passw`, `email`, `fac`) VALUES
('Rohan Dutta', '17BEC1050', '12345', 'rohandutta@gmail.com', 'NULL'),
('Mridul Gupta', '17BCE1259', 'Qwertyui@1999', 'mridul@gmail.com', 'NULL'),
('Nikhil S Patel', '17BCL1050', '12345', 'nikhilpatel@gmail.com', 'NULL'),
('Nikhil Neogy', '17BCE1083', '12345', 'nikhilneogy@gmail.com', 'NULL'),
('Samudranil Giri', '17BCE1110', '12345', 'samudranil7@gmail.com', 'NULL'),
('Prof. Ranganathan Sridhar', '50015', '12345', 'sridhar.r@vit.ac.in', 'CSE'),
('Prof. Sandhya P', '50000', '12345', 'sandhya.p@vit.ac.in', 'CSE'),
('17bce2345', 'abcdef', '12345', 'prabhav.talukdar007@gmail.com', 'NULL'),
('new12345', '12345', '12345', 'prabhav.talukdar007@gmail.com', 'NULL'),
('Piyush Chutiya', '17bce1285', '12345', 'piyushsunnyst@gmail.com', 'NULL'),
('Prof. Mridul', '10000', '12345', 'mridulgpt820@gmail.com', 'CSE'),
('Mridul', '17BCE1258', '12345', 'mridulgpt820@gmail.com', 'NULL'),
('Prabhav Saraswat', '17bme1264', '12345', 'saraswat.prabhav@gmail.com', 'NULL');

-- --------------------------------------------------------

--
-- Table structure for table `info_fac`
--

DROP TABLE IF EXISTS `info_fac`;
CREATE TABLE IF NOT EXISTS `info_fac` (
  `name` varchar(50) DEFAULT NULL,
  `regno` varchar(10) DEFAULT NULL,
  `passw` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info_fac`
--

INSERT INTO `info_fac` (`name`, `regno`, `passw`, `email`) VALUES
('Prof. Ranganathan Sridhar', '50015', '12345', 'sridhar.r@vit.ac.in'),
('Prof. ', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `patid` int(4) DEFAULT NULL,
  `pname` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `age` int(2) DEFAULT NULL,
  `pass` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patid`, `pname`, `gender`, `age`, `pass`) VALUES
(2001, 'Vincent', 'Male', 40, '12345'),
(2003, 'Samudranil Giri', 'Male', 19, '12345'),
(2002, 'Mridul Gupta', 'Male', 19, '12345');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(5) NOT NULL,
  `askid` varchar(10) DEFAULT NULL,
  `question` text,
  `field` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `askid`, `question`, `field`) VALUES
(100, '17BCE1110', 'How are you different from your class topper?', 'MISC'),
(101, '17BCE1110', 'How is mechanical engineering at VIT Vellore?', 'MECH'),
(102, '17BCE1259', 'Did anyone from VIT go to Stanford, Princeton or Yale?', 'MISC'),
(103, '17bce1110', 'What are some good websites to learn python?', 'CSE'),
(104, '17BCE1259', 'What are some examples of good clustering Algorithms?', 'CSE'),
(106, '17BCL1050', 'What are some good books for water resource management?', 'CIVIL'),
(107, '17BCL1050', 'Some teachers in SMBS who shoul be avoided during course registration?', 'CIVIL'),
(108, '17BEC1050', ' Who are the some good teachers for analog communications?', 'ECE'),
(109, '17BCE1110', ' What are some good books for learning c language?', 'CSE'),
(110, '17BCE1259', 'Which is the best club to help us learn entrepreneurship in VIT ?', 'MISC');

-- --------------------------------------------------------

--
-- Table structure for table `upvoteans`
--

DROP TABLE IF EXISTS `upvoteans`;
CREATE TABLE IF NOT EXISTS `upvoteans` (
  `aid` varchar(5) DEFAULT NULL,
  `reg` varchar(10) DEFAULT NULL,
  `unan` varchar(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upvoteans`
--

INSERT INTO `upvoteans` (`aid`, `reg`, `unan`) VALUES
('108', '17BCL1050', '1006'),
('108', '17BCE1083', '1006'),
('104', '50000', '1003'),
('101', '17BCL1050', '1002'),
('102', '17BCE1110', '1004'),
('104', '50015', '1003'),
('101', '17BCE1110', '1001'),
('101', '17BCE1110', '1002'),
('110', '17BCE1259', '1015'),
('104', '17BCE1259', '1003'),
('104', '17BCE1259', '1008'),
('103', '17BCE1259', '1010'),
('110', '17BCE1083', '1015');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
