-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2016 at 07:00 AM
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
  `isbn` int(4) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_all_books`
--

INSERT INTO `tbl_all_books` (`book_id`, `isbn`, `status`) VALUES
(1, 1001, 1),
(2, 1001, 1),
(3, 1007, 1),
(4, 1008, 1),
(5, 1008, 1),
(6, 1003, 1),
(7, 1004, 1),
(9, 1006, 1),
(10, 1007, 1),
(11, 1008, 1),
(12, 1009, 1),
(13, 1010, 1),
(14, 1011, 1),
(15, 1012, 1),
(16, 1013, 1),
(17, 1014, 1),
(18, 3005, 1),
(20, 3007, 1);

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
(1003, 200, 1, 'UX publisher', 'Fundamentals', 'Killer UX Design', 'Jodie Moule'),
(1004, 500, 1, 'Marvel Publisher', 'Methods & Process', 'A Project Guide To UX Design', 'Russ Unger '),
(1006, 200, 1, 'VGS Publisher', 'Information Architecture', 'Designing Usable Categories', 'Donna Spencer'),
(1007, 500, 1, 'Baker Book House', 'Interaction', 'Designing for Interaction', 'Dan Saffer	'),
(1008, 300, 1, 'Newnes', 'Methods & Process', 'A Project Guide To UX Design', 'Russ Unger and Carolyn Chandle'),
(1009, 345, 1, 'Cassell', 'Visual Design	', 'The Principles of Beautiful Web Design', '	Jason Beaird'),
(1010, 99, 1, 'Bella Books', 'Usability', 'The Usability Kit	', 'Gerry Gaffney and Daniel Szuc	'),
(1011, 342, 1, 'Open University Press', 'Usability', 'Usability Engineering', 'Jakob Nielsen	'),
(1012, 299, 1, 'Hawthorne Books', 'Usability', 'Don''t Make Me Think', 'Steve Krug	'),
(1013, 999, 1, 'Leaf Books', 'Visual Design	', 'The Non-Designer''s Design Book	', 'Robin Williams	'),
(1014, 600, 1, 'Baen Books', 'Interaction', 'Seductive Interaction Design	', 'Stephen P. Anderson	'),
(3005, 220, 2, 'Yashwanth', 'Usability', 'Clean guide', 'Prabhakar'),
(3007, 220, 1, 'jimmy', 'Usability', 'Undercover User Experience Design', 'prabhakar');

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
(21, '0000-00-00', '2016-02-14', 0, 14, 6, '2016-02-09'),
(22, '0000-00-00', '2016-02-19', 0, 13, 7, '2016-02-09');

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
('bala@uxreactor.org', 'jimmy'),
('jchallagonda@uxreactor.org', 'jyothi'),
('mohan@uxreactor.org', 'mohan'),
('rkasthala@uxreactor.org', 'ravindra'),
('smogullapalli@uxreactor.org', 'sai'),
('valle@uxreactor.org', 'vamsi');

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
(2, 'Mohan', 1234567890, 'mohan@uxreactor.org', '2016-01-07', 'male', 2, '2016-02-02', '2016-08-01', '2/22', 'Ram nagar', 'Hyderabad', 'Telangana', 500069),
(3, 'Bala', 1234567890, 'bala@uxreactor.org', '2016-01-13', 'male', 3, '2016-01-20', '2016-07-19', '1/66', 'Kushaiguda', 'Hyderabad', 'Telangana', 500036),
(6, 'vamsi', 9876454123, 'valle@uxreactor.org', '2016-01-13', 'male', 1, '2016-01-08', '2017-01-07', '2/17', 'Krishnanagar', 'Hyderabad', 'Telangana', 500024),
(8, 'sai mogullapalli', 9876454123, 'smogullapalli@uxreactor.org', '2016-01-13', 'Male', 1, '2016-01-08', '2017-01-07', 'Platinum', '2/17', 'Krishnanagar', 'Telangana', 0),
(9, 'Ravindra', 9876454123, 'rkasthala@uxreactor.org', '2016-01-13', 'male', 1, '2016-01-08', '2017-01-07', '2/17', 'Krishnanagar', 'Hyderabad', 'Telangana', 500024),
(10, 'Jyothirmai', 9876454123, 'jchallagonada@uxreactor.org', '2016-01-13', 'female', 1, '2016-01-08', '2017-01-07', '2/17', 'Krishnanagar', 'Hyderabad', 'Telangana', 500024),
(11, 'Anurag', 9391781447, 'aduddu@uxreactor.com', '2016-01-09', 'male', 3, '2016-02-08', '2016-05-08', '23/2', 'Madhapur', 'Hyderabad', 'Telangana', 500081),
(12, 'Nagalakshmi', 9391781447, 'nyarra@uxreactor.org', '2016-01-16', 'female', 1, '2016-02-09', '2017-02-09', '23/2', 'Yousufguda', 'Hyderabad', 'Telangana', 500034),
(13, 'sai mogullapalli', 9553319032, 'yjilakara@uxreactor.org', '2016-02-17', 'male', 1, '2016-02-09', '2017-02-09', '453', 'Krishnanagar road no.2', 'Telangana state', 'fgdsf', 324424),
(14, 'Vijaya Prabhakar', 9553319032, 'vkonduri@uxreactor.org', '2016-02-07', 'male', 2, '2016-02-09', '2016-08-09', '3-111', 'mohan', 'Telangana state', 'HYD', 500056);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_membership`
--

CREATE TABLE `tbl_membership` (
  `ms_id` int(2) NOT NULL COMMENT 'not null, primary key',
  `ms_type` char(10) COLLATE utf8_bin NOT NULL COMMENT 'type of membership. Gold/Silver/Bronze',
  `ms_validity_period` tinyint(4) NOT NULL COMMENT 'This column stores the validity period of the membership. It is a number field with the value stored in years.',
  `ms_price` int(5) NOT NULL COMMENT 'Has the cost of each membership type',
  `ms_book_limit` int(2) NOT NULL COMMENT 'This column indicates how many books a member can issue at any given point of time.',
  `ms_days_limit` int(2) NOT NULL COMMENT 'This column indicates for how many days a member can keep a book with himself',
  `penalty` decimal(10,0) NOT NULL COMMENT 'This column indicates the per day penalty in case the book is not returned on the due date.  The penalty is in rupees.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_membership`
--

INSERT INTO `tbl_membership` (`ms_id`, `ms_type`, `ms_validity_period`, `ms_price`, `ms_book_limit`, `ms_days_limit`, `penalty`) VALUES
(1, 'Platinum', 5, 1000, 10, 10, '10'),
(2, 'Gold', 3, 500, 5, 5, '10'),
(3, 'Silver', 3, 300, 3, 3, '10');

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
(4, 3, 'Bala');

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
('pradeep', 9494043843, 'pnarvaneni@uxreactor.com', '2016-01-05', 'male', '2', 'Kukatpally', 'Hyderabad', 'Telangana', 507029, 2),
('sai mogullapalli', 9553319032, 'smogullapalli@uxreactor.org', '2016-02-26', 'male', '453', 'Krishnanagar road no.2', 'Telangana state', 'fgdsf', 324424, 1);

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
(2, 'harry potter', 'jon richard', 2),
(3, 'Clean guide', 'prabhakar', 3),
(4, 'Clean guide', 'prabhakar', 6);

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
  MODIFY `book_exten_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_all_books`
--
ALTER TABLE `tbl_all_books`
  MODIFY `book_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tbl_issued_books`
--
ALTER TABLE `tbl_issued_books`
  MODIFY `reurn_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tbl_members`
--
ALTER TABLE `tbl_members`
  MODIFY `mem_id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'not null, primary key', AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_membership`
--
ALTER TABLE `tbl_membership`
  MODIFY `ms_id` int(2) NOT NULL AUTO_INCREMENT COMMENT 'not null, primary key', AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_membership_renewal_request`
--
ALTER TABLE `tbl_membership_renewal_request`
  MODIFY `renewal_req_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_new_book_request`
--
ALTER TABLE `tbl_new_book_request`
  MODIFY `req_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
