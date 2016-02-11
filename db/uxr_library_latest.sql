-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2016 at 11:48 AM
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
('vkonduri@uxreactor.org', 'jimmy'),
('yjilakara@uxreactor.org', 'yashwanth'),
('mgoud@uxreactor.org', 'mohan'),
('btanneeru@uxreactor.org', 'bala'),
('nyarra@uxreactor.org', 'nagalakshmi'),
('aduddu@uxreactor.com', 'anurag'),
('pnarvaneni@uxreactor.com', 'pradeep');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_all_books`
--

CREATE TABLE `tbl_all_books` (
  `book_id` int(5) NOT NULL,
  `isbn` bigint(13) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_all_books`
--

INSERT INTO `tbl_all_books` (`book_id`, `isbn`, `status`) VALUES
(1, 1001, 0),
(2, 1001, 1),
(6, 1004, 1),
(7, 1004, 1),
(8, 1004, 0),
(9, 1004, 1),
(10, 1004, 1),
(12, 1006, 1),
(13, 1006, 1),
(14, 1006, 1),
(15, 1006, 1),
(16, 1007, 1),
(17, 1007, 1),
(18, 1007, 1),
(19, 1007, 1),
(20, 1007, 1),
(21, 1008, 1),
(22, 1008, 1),
(23, 1008, 1),
(24, 1008, 1),
(25, 1008, 1),
(26, 1008, 1),
(27, 1009, 1),
(28, 1009, 1),
(29, 1010, 1),
(30, 1010, 1),
(31, 1011, 1),
(32, 1011, 1),
(33, 1011, 1),
(34, 2324, 1),
(35, 2324, 1),
(36, 2324, 1),
(47, 1005, 1),
(48, 1005, 1),
(49, 1005, 1),
(50, 1005, 1),
(65, 1003, 1),
(66, 1003, 1),
(67, 1003, 1),
(68, 1003, 1),
(69, 1003, 1),
(170, 1002, 1),
(171, 43, 1),
(172, 43, 1),
(173, 43, 1),
(180, 67898, 1),
(181, 67898, 1),
(182, 67898, 1),
(183, 67898, 1),
(184, 67898, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book_varities`
--

CREATE TABLE `tbl_book_varities` (
  `isbn` bigint(13) NOT NULL COMMENT 'not null, primary key',
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
(1001, 500, 2, 'Melissa Marr', 'Design', 'UX Design', 'Akira Toriyama '),
(1002, 500, 3, 'S.Chand', 'Inspirational', 'Wings of fire', 'A.P.J.Abdul kalam'),
(1003, 250, 2, 'Sir Charles Baskerville', 'Novel', 'The Hound Of Baskerville', 'Arthur Conan Doyle'),
(1004, 400, 2, 'Parvateesam', 'Novel', 'Barrister Parvateesam', 'Mokkapati Narasimha Sastry'),
(1005, 500, 4, 'Dan Moses Schreier', 'Novel', 'The Merchant Of Venice', 'William Shakespeare'),
(1006, 400, 3, 'Martha publishers', 'Novel', 'The Jew of Malta ', 'Christopher Marlowe '),
(1007, 300, 2, 'Thomas Kyd ', 'Comic', 'The Spanish Tragedy ', 'Thomas Kyd '),
(1008, 400, 3, 'Pliot publisher', 'Mystery', 'Murder in the Cathedral ', 'T.S. Eliot '),
(1009, 220, 6, 'Mirjam Pressler ', 'Mystery', 'An Enemy of the People ', ' Henrik Ibsen '),
(1010, 100, 2, 'Nick Bullard', 'Comic', 'The Duchess of Malfi ', 'John Webster ');

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
(10, '0000-00-00', '2016-02-16', 0, 3, 3, '2016-02-11'),
(12, '0000-00-00', '2016-02-21', 0, 8, 8, '2016-02-11'),
(13, '0000-00-00', '2016-02-21', 0, 6, 1, '2016-02-11');

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
('aduddu@uxreactor.com', 'anurag'),
('btanneeru@uxreactor.org', 'bala'),
('jchallagonda@uxreactor.org', 'jyothi'),
('mgoud@uxreactor.org', 'mohan'),
('ntalveen@uxreactor.org', 'nida'),
('nyarra@uxreactor.org', 'nagalakshmi'),
('pnarvaneni@uxreactor.com', 'pradeep'),
('valle@uxreactor.org', 'vamsi'),
('vkonduri@uxreactor.org', 'jimmy'),
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
(1, 'Bala Narsimha rao Tanneeru', 9391781447, 'btanneeru@uxreactor.org', '2016-02-26', 'male', 2, '2016-02-11', '2016-08-11', '3-786', 'Jammigadda', 'ECIL', 'Telangana', 500045),
(2, 'Anurag duddu', 9876876987, 'aduddu@uxreactor.org', '2016-02-19', 'male', 1, '2016-02-11', '2017-02-11', '2-762', 'Jubillee Hills', 'Hyderabad', 'Telangana', 500035),
(3, 'Jyothirmai challagonda', 9666344835, 'jchallagonda@uxreactor.org', '2016-02-27', 'female', 2, '2016-02-11', '2016-08-11', '2-457', 'Kushaiguda', 'Hyderabad', 'Telangana', 500045),
(4, 'Mohan sairam Goud Babburi', 9000987170, 'mgoud@uxreactor.org', '2016-02-27', 'male', 3, '2016-02-11', '2016-05-11', '6-786', 'Jagdevpur', 'Medak', 'Telangana', 522321),
(5, 'Nida Talveen', 8341977334, 'ntalveen@uxreactor.org', '2016-02-19', 'female', 2, '2016-02-11', '2016-08-11', '2-456', 'Janagam', 'Warangal', 'Telangana', 345265),
(6, 'Nagalakshmi Yarra', 8143601039, 'nyarra@uxreactor.org', '2016-02-19', 'female', 1, '2016-02-11', '2017-02-11', '2-453', 'Yousufguda', 'Cheerala', 'Andhrapradesh', 532657),
(7, 'Pradeep Narvaneni', 9876543210, 'pnarvaneni@uxreactor.org', '2016-02-27', 'male', 2, '2016-02-11', '2016-08-11', '3-117', 'Kukat pally', 'Tiruvuru', 'Andhra pradesh', 534280),
(8, 'vamsi alle', 9876543210, 'valle@uxreactor.org', '2016-02-19', 'male', 1, '2016-02-11', '2017-02-11', '9-765', 'Rehmatnagar', 'Hyderabad', 'Telangana', 500067),
(9, 'Vijaya Prabhakar Konduri', 9553319032, 'vkonduri@uxreactor.org', '2016-02-26', 'male', 3, '2016-02-11', '2016-05-11', '3-111', 'Gopalapuram', 'West Godavari', 'Andhrapradesh', 534316),
(10, 'Yashwanth jilakara', 9059688702, 'yjilakara@uxreactor.org', '2016-02-22', 'male', 1, '2016-02-11', '2017-02-11', '4-675', 'Indiranagar', 'Banjarahills', 'Telangana', 500045);

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
(1, 'Platinum', 12, 500, 10, 10, '10'),
(2, 'Gold', 6, 300, 5, 5, '10'),
(3, 'Silver', 3, 200, 3, 3, '10');

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
(1, 1, 'Bala Narsimha rao Tanneeru');

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
('Raghava', 9876543210, 'yjilakara@uxreactor.org', '2016-02-19', 'male', '3-111', 'Krishnanagar road no.2', 'Hyderabad', 'Telangana', 500045, 1);

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
(1, 'Raghava science', 'Raghava', 1);

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
  MODIFY `book_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;
--
-- AUTO_INCREMENT for table `tbl_issued_books`
--
ALTER TABLE `tbl_issued_books`
  MODIFY `reurn_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_members`
--
ALTER TABLE `tbl_members`
  MODIFY `mem_id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'not null, primary key', AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_membership`
--
ALTER TABLE `tbl_membership`
  MODIFY `ms_id` int(2) NOT NULL AUTO_INCREMENT COMMENT 'not null, primary key', AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_membership_renewal_request`
--
ALTER TABLE `tbl_membership_renewal_request`
  MODIFY `renewal_req_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_new_book_request`
--
ALTER TABLE `tbl_new_book_request`
  MODIFY `req_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
