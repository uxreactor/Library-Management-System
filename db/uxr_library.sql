-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2016 at 06:19 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `uxr_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `due_date_extension`
--

CREATE TABLE IF NOT EXISTS `due_date_extension` (
`book_exten_id` int(4) NOT NULL,
  `extension_days` int(4) NOT NULL,
  `mem_id` int(4) NOT NULL,
  `book_id` int(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `due_date_extension`
--

INSERT INTO `due_date_extension` (`book_exten_id`, `extension_days`, `mem_id`, `book_id`) VALUES
(1, 30, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `students_db`
--

CREATE TABLE IF NOT EXISTS `students_db` (
`ID` int(2) NOT NULL,
  `Name` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `Marks` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_all_books`
--

CREATE TABLE IF NOT EXISTS `tbl_all_books` (
`book_id` int(5) NOT NULL,
  `isbn` int(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_all_books`
--

INSERT INTO `tbl_all_books` (`book_id`, `isbn`) VALUES
(1, 1001),
(2, 1001),
(3, 1001),
(4, 1001),
(5, 1001),
(6, 345),
(7, 345),
(8, 345),
(9, 345),
(10, 345),
(11, 345),
(12, 345),
(13, 345),
(14, 345),
(15, 345),
(16, 345),
(17, 345),
(18, 345),
(19, 345),
(20, 345),
(21, 345),
(22, 345),
(23, 345),
(24, 345),
(25, 345),
(26, 345),
(27, 345),
(28, 345),
(29, 345),
(30, 345);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book_varities`
--

CREATE TABLE IF NOT EXISTS `tbl_book_varities` (
  `isbn` int(13) NOT NULL COMMENT 'not null, primary key',
  `price` float NOT NULL,
  `edition` int(2) NOT NULL,
  `publisher` varchar(30) COLLATE utf8_bin NOT NULL,
  `category` varchar(30) COLLATE utf8_bin NOT NULL,
  `book_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `author_name` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_book_varities`
--

INSERT INTO `tbl_book_varities` (`isbn`, `price`, `edition`, `publisher`, `category`, `book_name`, `author_name`) VALUES
(345, 2, 2, 'dttyghdfhgfh', 'Arts', 'Harry Potter', 'jhjhgijkk'),
(1001, 3000, 1, 'UX Publisher', 'Technology', 'Smashing UX Design', 'Jesmond Allen and James Chudle');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_issued_books`
--

CREATE TABLE IF NOT EXISTS `tbl_issued_books` (
`reurn_id` int(5) NOT NULL,
  `return_actual` date NOT NULL,
  `return_expected` date NOT NULL,
  `penality` int(4) NOT NULL,
  `mem_id` int(4) NOT NULL,
  `book_id` int(5) NOT NULL,
  `issue_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_issued_books`
--

INSERT INTO `tbl_issued_books` (`reurn_id`, `return_actual`, `return_expected`, `penality`, `mem_id`, `book_id`, `issue_date`) VALUES
(1, '0000-00-00', '2016-02-09', 0, 1, 1, '2016-01-29'),
(2, '0000-00-00', '2016-01-23', 0, 101, 2, '2016-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE IF NOT EXISTS `tbl_login` (
  `username` varchar(30) COLLATE utf8_bin NOT NULL,
  `password` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`username`, `password`) VALUES
('pradeepnarvaneni@gmail.com', 'pradeep');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_members`
--

CREATE TABLE IF NOT EXISTS `tbl_members` (
`mem_id` int(4) unsigned NOT NULL COMMENT 'not null, primary key',
  `mem_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `mem_moblieno` bigint(20) NOT NULL,
  `mem_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `mem_dob` date NOT NULL,
  `mem_gender` char(6) COLLATE utf8_bin NOT NULL,
  `ms_id` int(2) NOT NULL,
  `membership_on` date NOT NULL,
  `expiry_on` date NOT NULL,
  `addr_hno` varchar(30) COLLATE utf8_bin NOT NULL,
  `addr_street` char(30) COLLATE utf8_bin NOT NULL,
  `addr_city` char(30) COLLATE utf8_bin NOT NULL,
  `addr_state` char(30) COLLATE utf8_bin NOT NULL,
  `addr_pincode` int(6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_members`
--

INSERT INTO `tbl_members` (`mem_id`, `mem_name`, `mem_moblieno`, `mem_email`, `mem_dob`, `mem_gender`, `ms_id`, `membership_on`, `expiry_on`, `addr_hno`, `addr_street`, `addr_city`, `addr_state`, `addr_pincode`) VALUES
(35, 'dshgdsh', 965684651532, 'kjsdfjsh@bsdjkgf.com', '2016-01-08', 'male', 1, '2016-01-15', '2016-01-16', '234-4', 'fgsdgsdhg', 'dfgdsds', 'dsfdsh', 500062);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_membership`
--

CREATE TABLE IF NOT EXISTS `tbl_membership` (
`ms_id` int(2) NOT NULL COMMENT 'not null, primary key',
  `ms_type` char(10) COLLATE utf8_bin NOT NULL COMMENT 'type of membership. Gold/Silver/Bronze',
  `ms_validity` int(2) NOT NULL COMMENT 'Gives the date until which a membership is valid',
  `ms_price` int(5) NOT NULL COMMENT 'Has the cost of each membership type',
  `ms_due_duration` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_membership_renewal_request`
--

CREATE TABLE IF NOT EXISTS `tbl_membership_renewal_request` (
`renewal_req_id` int(4) NOT NULL,
  `mem_id` int(4) NOT NULL,
  `mem_name` varchar(40) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_membership_renewal_request`
--

INSERT INTO `tbl_membership_renewal_request` (`renewal_req_id`, `mem_id`, `mem_name`) VALUES
(1, 101, 'pradeep'),
(2, 35, 'tsgsg'),
(3, 101, 'ryyegdgh');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mem_request`
--

CREATE TABLE IF NOT EXISTS `tbl_mem_request` (
  `mem_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `mem_mobileno` bigint(20) NOT NULL,
  `mem_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `mem_dob` date NOT NULL,
  `mem_gender` char(6) COLLATE utf8_bin NOT NULL,
  `addr_hno` varchar(30) COLLATE utf8_bin NOT NULL,
  `addr_street` char(30) COLLATE utf8_bin NOT NULL,
  `addr_city` char(30) COLLATE utf8_bin NOT NULL,
  `addr_state` char(30) COLLATE utf8_bin NOT NULL,
  `addr_pincode` int(6) NOT NULL,
  `ms_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_mem_request`
--

INSERT INTO `tbl_mem_request` (`mem_name`, `mem_mobileno`, `mem_email`, `mem_dob`, `mem_gender`, `addr_hno`, `addr_street`, `addr_city`, `addr_state`, `addr_pincode`, `ms_id`) VALUES
('BalaNarsimha Rao', 9032718668, 'btanneeru@uxreactor.org', '2016-01-08', 'option', '262/252', 'Jammigadda', 'TS', 'Hyd', 500062, 1),
('basbsghd', 9391781447, 'jksedbsh@kjdfgbdl.com', '2016-01-09', 'option', '23/2', 'knfkldfdghnfg', 'ts', 'hyd', 0, 3),
('hgfh', 9391781447, 'jsbdvjsb@jdkjls.com', '2016-01-16', 'option', '23/2', 'gfhfg', 'hghg', 'hgfhg', 500034, 1),
('fad', 9494043843, 'pradeep@gmail.com', '2016-01-29', 'male', '2', 'sdg', 'gdgrf', 'dsffs', 500034, 2),
('pradeep', 9494043843, 'pradeepnarvaneni@gmail.com', '2016-01-05', 'option', '2', 'sfdf', 'fsddf', 'dfsff', 507029, 2),
('hgfh', 9874563210, 'slkgrois@kfgsklg.com', '2016-01-09', 'option', '345/2525', 'gfhfg', 'hghg', 'hgfhg', 500034, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_new_book_request`
--

CREATE TABLE IF NOT EXISTS `tbl_new_book_request` (
`req_id` int(4) NOT NULL,
  `book_name` varchar(40) COLLATE utf8_bin NOT NULL,
  `author_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `requests` int(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_new_book_request`
--

INSERT INTO `tbl_new_book_request` (`req_id`, `book_name`, `author_name`, `requests`) VALUES
(1, 'Bala', 'Bala', 3),
(7, 'Bala', 'Joanne Kathleen Rowling', 1),
(8, 'sgshsdhh', 'dfhdshdhs', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `due_date_extension`
--
ALTER TABLE `due_date_extension`
 ADD PRIMARY KEY (`book_exten_id`);

--
-- Indexes for table `students_db`
--
ALTER TABLE `students_db`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_all_books`
--
ALTER TABLE `tbl_all_books`
 ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `tbl_book_varities`
--
ALTER TABLE `tbl_book_varities`
 ADD PRIMARY KEY (`isbn`);

--
-- Indexes for table `tbl_issued_books`
--
ALTER TABLE `tbl_issued_books`
 ADD PRIMARY KEY (`reurn_id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
 ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tbl_members`
--
ALTER TABLE `tbl_members`
 ADD PRIMARY KEY (`mem_id`);

--
-- Indexes for table `tbl_membership`
--
ALTER TABLE `tbl_membership`
 ADD PRIMARY KEY (`ms_id`);

--
-- Indexes for table `tbl_membership_renewal_request`
--
ALTER TABLE `tbl_membership_renewal_request`
 ADD PRIMARY KEY (`renewal_req_id`);

--
-- Indexes for table `tbl_mem_request`
--
ALTER TABLE `tbl_mem_request`
 ADD PRIMARY KEY (`mem_email`);

--
-- Indexes for table `tbl_new_book_request`
--
ALTER TABLE `tbl_new_book_request`
 ADD PRIMARY KEY (`req_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `due_date_extension`
--
ALTER TABLE `due_date_extension`
MODIFY `book_exten_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `students_db`
--
ALTER TABLE `students_db`
MODIFY `ID` int(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_all_books`
--
ALTER TABLE `tbl_all_books`
MODIFY `book_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `tbl_issued_books`
--
ALTER TABLE `tbl_issued_books`
MODIFY `reurn_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_members`
--
ALTER TABLE `tbl_members`
MODIFY `mem_id` int(4) unsigned NOT NULL AUTO_INCREMENT COMMENT 'not null, primary key',AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `tbl_membership`
--
ALTER TABLE `tbl_membership`
MODIFY `ms_id` int(2) NOT NULL AUTO_INCREMENT COMMENT 'not null, primary key';
--
-- AUTO_INCREMENT for table `tbl_membership_renewal_request`
--
ALTER TABLE `tbl_membership_renewal_request`
MODIFY `renewal_req_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_new_book_request`
--
ALTER TABLE `tbl_new_book_request`
MODIFY `req_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
