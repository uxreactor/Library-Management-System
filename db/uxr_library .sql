-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2016 at 07:33 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uxr_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `due_date_extension`
--

CREATE TABLE `due_date_extension` (
  `book_exten_id` int(4) NOT NULL,
  `extension_days` int(4) NOT NULL,
  `mem_id` int(4) NOT NULL,
  `book_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `due_date_extension`
--

INSERT INTO `due_date_extension` (`book_exten_id`, `extension_days`, `mem_id`, `book_id`) VALUES
(1, 30, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_login`
--

CREATE TABLE `tbl_admin_login` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_login`
--

INSERT INTO `tbl_admin_login` (`username`, `password`) VALUES
('prabhakar@gmail.com', 'jimmy'),
('anurag', 'jimmy'),
('anurag@gmail.com', 'jimmy');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_all_books`
--

CREATE TABLE `tbl_all_books` (
  `book_id` int(5) NOT NULL,
  `isbn` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_all_books`
--

INSERT INTO `tbl_all_books` (`book_id`, `isbn`) VALUES
(1, 1001),
(2, 1001),
(3, 1002),
(4, 1002),
(5, 1002),
(6, 1003),
(7, 1004),
(8, 1005),
(9, 1006),
(10, 1007),
(11, 1008),
(12, 1009),
(13, 1010),
(14, 1011),
(15, 1012),
(16, 1013),
(17, 1014);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book_varities`
--

CREATE TABLE `tbl_book_varities` (
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
(1001, 250, 1, 'UX Publisher', 'Fundamentals', 'Undercover User Experience Design', 'Cennydd Bowles & James Box'),
(1002, 200, 2, 'Kiran', 'Careers', 'Everyday UX ', 'Luke Chambers & Matthew Magain'),
(1003, 200, 1, 'UX publisher', 'Fundamentals', 'Killer UX Design', 'Jodie Moule'),
(1004, 500, 1, 'Marvel Publisher', 'Methods & Process', 'A Project Guide To UX Design', 'Russ Unger '),
(1005, 350, 1, 'UX publisher', 'Fundamentals', 'The Elements of User Experience', 'Jesse James Garrett'),
(1006, 200, 1, 'VGS Publisher', 'Information Architecture', 'Designing Usable Categories', 'Donna Spencer'),
(1007, 500, 1, 'Baker Book House', 'Interaction', 'Designing for Interaction', 'Dan Saffer	'),
(1008, 300, 1, 'Newnes', 'Methods & Process', 'A Project Guide To UX Design', 'Russ Unger and Carolyn Chandle'),
(1009, 345, 1, 'Cassell', 'Visual Design	', 'The Principles of Beautiful Web Design', '	Jason Beaird'),
(1010, 99, 1, 'Bella Books', 'Usability', 'The Usability Kit	', 'Gerry Gaffney and Daniel Szuc	'),
(1011, 342, 1, 'Open University Press', 'Usability', 'Usability Engineering', 'Jakob Nielsen	'),
(1012, 299, 1, 'Hawthorne Books', 'Usability', 'Don''t Make Me Think', 'Steve Krug	'),
(1013, 999, 1, 'Leaf Books', 'Visual Design	', 'The Non-Designer''s Design Book	', 'Robin Williams	'),
(1014, 600, 1, 'Baen Books', 'Interaction', 'Seductive Interaction Design	', 'Stephen P. Anderson	');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_issued_books`
--

CREATE TABLE `tbl_issued_books` (
  `reurn_id` int(5) NOT NULL,
  `return_actual` date NOT NULL,
  `return_expected` date NOT NULL,
  `penality` int(4) NOT NULL,
  `mem_id` int(4) NOT NULL,
  `book_id` int(5) NOT NULL,
  `issue_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_issued_books`
--

INSERT INTO `tbl_issued_books` (`reurn_id`, `return_actual`, `return_expected`, `penality`, `mem_id`, `book_id`, `issue_date`) VALUES
(1, '2016-02-17', '2016-02-09', 0, 1, 1, '2016-01-29'),
(2, '2016-02-26', '2016-01-23', 0, 2, 2, '2016-01-16'),
(3, '2016-02-26', '2016-01-23', 0, 3, 3, '2016-01-16'),
(4, '2016-02-26', '2016-01-23', 0, 5, 4, '2016-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `username` varchar(30) COLLATE utf8_bin NOT NULL,
  `password` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`username`, `password`) VALUES
('bala@uxreactor.org', 'bala'),
('jchallagonda@uxreactor.org', 'jyothi'),
('jimmy@uxreactor.org', 'jimmy'),
('mohan@uxreactor.org', 'mohan'),
('rkasthala@uxreactor.org', 'ravindra'),
('rpasupuleti@uxreactor.org', 'raghava'),
('smogullapalli@uxreactor.org', 'sai'),
('valle@uxreactor.org', 'vamsi'),
('vvardhan@uxreactor.org', 'vaibhav'),
('yjilakara@uxreactor.org', 'yaswanth');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_members`
--

CREATE TABLE `tbl_members` (
  `mem_id` int(4) UNSIGNED NOT NULL COMMENT 'not null, primary key',
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_members`
--

INSERT INTO `tbl_members` (`mem_id`, `mem_name`, `mem_moblieno`, `mem_email`, `mem_dob`, `mem_gender`, `ms_id`, `membership_on`, `expiry_on`, `addr_hno`, `addr_street`, `addr_city`, `addr_state`, `addr_pincode`) VALUES
(1, 'Jimmy', 1234567890, 'jimmy@uxreactor.org', '1996-02-01', 'male', 1, '2016-02-18', '2017-02-17', '1/25', 'Krishnanagar', 'Hyderabad', 'Telangana', 500036),
(2, 'Mohan', 1234567890, 'mohan@uxreactor.org', '2016-01-07', 'male', 2, '2016-02-02', '2016-08-01', '2/22', 'Ram nagar', 'Hyderabad', 'Telangana', 500069),
(3, 'Bala', 1234567890, 'bala@uxreactor.org', '2016-01-13', 'male', 3, '2016-01-20', '2016-04-19', '1/66', 'Kushaiguda', 'Hyderabad', 'Telangana', 500036),
(4, 'Yaswanth', 9059688702, 'yjilakara@uxreactor.org', '2016-01-13', 'male', 1, '2016-01-08', '2017-01-07', '2/17', 'Krishnanagar', 'Hyderabad', 'Telangana', 500024),
(5, 'Raghava', 9876454123, 'rpasupuleti@uxreactor.com', '2016-01-13', 'male', 1, '2016-01-08', '2017-01-07', '2/17', 'Krishnanagar', 'Hyderabad', 'Telangana', 500024),
(6, 'vamsi', 9876454123, 'valle@uxreactor.org', '2016-01-13', 'male', 1, '2016-01-08', '2017-01-07', '2/17', 'Krishnanagar', 'Hyderabad', 'Telangana', 500024),
(7, 'Vaibhav', 9876454123, 'vvardhan@uxreactor.org', '2016-01-13', 'male', 1, '2016-01-08', '2017-01-07', '2/17', 'Krishnanagar', 'Hyderabad', 'Telangana', 500024),
(8, 'sai', 9876454123, 'smogullapalli@uxreactor.org', '2016-01-13', 'male', 1, '2016-01-08', '2017-01-07', '2/17', 'Krishnanagar', 'Hyderabad', 'Telangana', 500024),
(9, 'Ravindra', 9876454123, 'rkasthala@uxreactor.org', '2016-01-13', 'male', 1, '2016-01-08', '2017-01-07', '2/17', 'Krishnanagar', 'Hyderabad', 'Telangana', 500024),
(10, 'Jyothirmai', 9876454123, 'jchallagonada@uxreactor.org', '2016-01-13', 'female', 1, '2016-01-08', '2017-01-07', '2/17', 'Krishnanagar', 'Hyderabad', 'Telangana', 500024);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_membership`
--

CREATE TABLE `tbl_membership` (
  `ms_id` int(2) NOT NULL COMMENT 'not null, primary key',
  `ms_type` char(10) COLLATE utf8_bin NOT NULL COMMENT 'type of membership. Gold/Silver/Bronze',
  `ms_validity` int(2) NOT NULL COMMENT 'Gives the date until which a membership is valid',
  `ms_price` int(5) NOT NULL COMMENT 'Has the cost of each membership type',
  `ms_due_duration` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_membership`
--

INSERT INTO `tbl_membership` (`ms_id`, `ms_type`, `ms_validity`, `ms_price`, `ms_due_duration`) VALUES
(1, 'Platinum', 1, 300, 7),
(2, 'Gold', 6, 200, 5),
(3, 'Silver', 3, 100, 2),
(4, 'Platinum', 1, 300, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_membership_renewal_request`
--

CREATE TABLE `tbl_membership_renewal_request` (
  `renewal_req_id` int(4) NOT NULL,
  `mem_id` int(4) NOT NULL,
  `mem_name` varchar(40) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_membership_renewal_request`
--

INSERT INTO `tbl_membership_renewal_request` (`renewal_req_id`, `mem_id`, `mem_name`) VALUES
(1, 1, 'Jimmy'),
(2, 2, 'Mohan'),
(3, 3, 'Bala');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mem_request`
--

CREATE TABLE `tbl_mem_request` (
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
('Anurag', 9391781447, 'aduddu@uxreactor.com', '2016-01-09', 'male', '23/2', 'Madhapur', 'Hyderabad', 'Telangana', 500081, 3),
('Nagalakshmi', 9391781447, 'nyarra@uxreactor.org', '2016-01-16', 'female', '23/2', 'Yousufguda', 'Hyderabad', 'Telangana', 500034, 1),
('pradeep', 9494043843, 'pnarvaneni@uxreactor.com', '2016-01-05', 'male', '2', 'Kukatpally', 'Hyderabad', 'Telangana', 507029, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_new_book_request`
--

CREATE TABLE `tbl_new_book_request` (
  `req_id` int(4) NOT NULL,
  `book_name` varchar(40) COLLATE utf8_bin NOT NULL,
  `author_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `mem_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_new_book_request`
--

INSERT INTO `tbl_new_book_request` (`req_id`, `book_name`, `author_name`, `mem_id`) VALUES
(1, 'harry potter', 'jon richard', 1),
(2, 'harry potter', 'jon richard', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `due_date_extension`
--
ALTER TABLE `due_date_extension`
  ADD PRIMARY KEY (`book_exten_id`);

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
  MODIFY `book_exten_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_all_books`
--
ALTER TABLE `tbl_all_books`
  MODIFY `book_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tbl_issued_books`
--
ALTER TABLE `tbl_issued_books`
  MODIFY `reurn_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_members`
--
ALTER TABLE `tbl_members`
  MODIFY `mem_id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'not null, primary key', AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_membership`
--
ALTER TABLE `tbl_membership`
  MODIFY `ms_id` int(2) NOT NULL AUTO_INCREMENT COMMENT 'not null, primary key', AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_membership_renewal_request`
--
ALTER TABLE `tbl_membership_renewal_request`
  MODIFY `renewal_req_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_new_book_request`
--
ALTER TABLE `tbl_new_book_request`
  MODIFY `req_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
