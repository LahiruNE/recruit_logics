-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2016 at 05:36 PM
-- Server version: 5.6.17-log
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `recruite_logics`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Comment` varchar(1024) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`ID`, `Name`, `Email`, `Comment`) VALUES
(39, 'Lahiru', 'lahiruepa@gmail.com', 'asdfghjkl qwerty!'),
(40, 'Kamal', 'Kamal@gmail.com', 'qweqwgucy xhicuhaisch uashasiu  iuhiauhs '),
(41, 'Navoda', 'navoda@gmail.com', 'aasc wehiuhi hiuhiuwf asdasdadas asds');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `Job_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Job_Name` varchar(25) NOT NULL,
  `Job_category` varchar(25) NOT NULL,
  `Description` varchar(1024) NOT NULL,
  `Company` varchar(50) NOT NULL,
  `Salary` int(11) NOT NULL,
  PRIMARY KEY (`Job_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`Job_ID`, `Job_Name`, `Job_category`, `Description`, `Company`, `Salary`) VALUES
(20, 'Civil Engineer', 'Engineering', 'qwe casc efefe sdcsdc 4fee aasdasd asd 3eec  ascasc qw asc qqsd', 'XYZ pvt. Ltd.', 125000),
(21, 'Electrical Engineer', 'Engineering', 'huhiuh hiuhiuhi  ft yt ytv iuhuhiuhic fctctrc ctrct ct rctrcr ct rcrchb u ', 'DFG pvt. Ltd. ', 78500),
(23, 'Teacher', 'Education', ' hiuhi hiuhaiu cytc  ytcyt ih iuhaisc futcau iugiy ac tuya iyg uac uu v uvay vu', 'Rahula College', 50000),
(24, 'Ass. Lecturer', 'Education', 'g gisu giugiug iugag uig iugaiug iugiuag iuyta yuv yusvuys vuy yusvuy vusyv ysu gws uys ', 'University of Colombo', 90000),
(25, 'Dentist', 'Health', 'sacb buibiu biuabi ub ubiu biu bi ub iub iu b iub bduydvyud vyu vduyv uyd v', 'Nawaloka Hospital', 150000),
(26, 'Nurse', 'Health', 's S 4s biub biubui buac vyt asvgcuy uasuc tafs ufasuv uyfausd', 'POI Hospital', 60000),
(27, 'HR', 'Business', 'asca aser tb dfb seg wrhs fbd sten rhdfbseha e rha rhs her rh rth rdhzzrh r zr stehzdth z', 'Abans', 98000),
(28, 'Chef', 'Hotel', 's sg sdg sadrab asbaetnjrb wg SBRHSFV WRWRHwrhWDADGARG dfg fdzb rgazrhr', 'Galadari ', 56050),
(29, 'QS', 'Engineering', 'sd smi mismd umwud mism i msium isumd iusmd iusm iusmd isumd uhunuhnsdun shudn shnd usn iwmd imwh nis misunr iusnd i', 'ERT pvt. Ltd.', 78000);

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE IF NOT EXISTS `job_applications` (
  `App_ID` int(11) NOT NULL AUTO_INCREMENT,
  `User_ID` int(11) NOT NULL,
  `Job_ID` int(11) NOT NULL,
  PRIMARY KEY (`App_ID`),
  KEY `index1` (`User_ID`),
  KEY `index2` (`Job_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=87 ;

--
-- Dumping data for table `job_applications`
--

INSERT INTO `job_applications` (`App_ID`, `User_ID`, `Job_ID`) VALUES
(82, 16, 27),
(83, 16, 24),
(85, 16, 28),
(86, 16, 21);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `User_Category` varchar(15) NOT NULL DEFAULT 'user',
  `First_Name` varchar(32) NOT NULL,
  `Last_Name` varchar(32) NOT NULL,
  `User_ID` varchar(15) NOT NULL,
  `Password` varchar(15) NOT NULL,
  `Email` varchar(1024) NOT NULL,
  `Telephone` varchar(10) NOT NULL,
  `DOB` date NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Educational_Level` varchar(32) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`ID`, `User_Category`, `First_Name`, `Last_Name`, `User_ID`, `Password`, `Email`, `Telephone`, `DOB`, `Gender`, `Educational_Level`) VALUES
(16, 'user', 'Lahiru', 'Epa', 'lahiru', 'lahirupass', 'lahiruepa@gmail.com', '0716482041', '1994-04-27', 'Male', 'Undergraduate'),
(17, 'admin', 'Lahiru', 'Epa', 'admin', 'adminpass', 'lahiruadds@yahoo.com', '0412228311', '1994-04-27', 'Male', 'Undergraduate');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD CONSTRAINT `job_applications_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user_details` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `job_applications_ibfk_2` FOREIGN KEY (`Job_ID`) REFERENCES `jobs` (`Job_ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
