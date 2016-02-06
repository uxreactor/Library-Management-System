-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2016 at 03:58 PM
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
(1, 'Jimmy', 11, 'jimmy@uxreactor.org', '1996-02-01', 'Male', 1, '2016-02-18', '2017-02-17', 'Platinum', 'Platinum', 'Platinum', 'Telangana', 0),
(2, 'Mohan', 1234567890, 'mohan@uxreactor.org', '2016-01-07', 'male', 2, '2016-02-02', '2016-08-01', '2/22', 'Ram nagar', 'Hyderabad', 'Telangana', 500069),
(3, 'Bala', 1234567890, 'bala@uxreactor.org', '2016-01-13', 'male', 3, '2016-01-20', '2016-04-19', '1/66', 'Kushaiguda', 'Hyderabad', 'Telangana', 500036),
(4, 'Yaswanth', 9059688702, 'yjilakara@uxreactor.org', '2016-01-13', 'male', 1, '2016-01-08', '2017-01-07', '2/17', 'Krishnanagar', 'Hyderabad', 'Telangana', 500024),
(5, 'Raghava', 9876454123, 'rpasupuleti@uxreactor.com', '2016-01-13', 'male', 1, '2016-01-08', '2017-01-07', '2/17', 'Krishnanagar', 'Hyderabad', 'Telangana', 500024),
(6, 'vamsi', 9876454123, 'valle@uxreactor.org', '2016-01-13', 'male', 1, '2016-01-08', '2017-01-07', '2/17', 'Krishnanagar', 'Hyderabad', 'Telangana', 500024),
(7, 'Vaibhav', 9876454123, 'vvardhan@uxreactor.org', '2016-01-13', 'male', 1, '2016-01-08', '2017-01-07', '2/17', 'Krishnanagar', 'Hyderabad', 'Telangana', 500024),
(8, 'sai', 9876454123, 'smogullapalli@uxreactor.org', '2016-01-13', 'male', 1, '2016-01-08', '2017-01-07', '2/17', 'Krishnanagar', 'Hyderabad', 'Telangana', 500024),
(9, 'Ravindra', 9876454123, 'rkasthala@uxreactor.org', '2016-01-13', 'male', 1, '2016-01-08', '2017-01-07', '2/17', 'Krishnanagar', 'Hyderabad', 'Telangana', 500024),
(10, 'Jyothirmai', 9876454123, 'jchallagonada@uxreactor.org', '2016-01-13', 'female', 1, '2016-01-08', '2017-01-07', '2/17', 'Krishnanagar', 'Hyderabad', 'Telangana', 500024),
(11, 'venkata kalyan', 9059881064, 'kgummadi@uxreactor.org', '1994-04-03', 'male', 1, '2016-02-02', '2017-02-02', '1/21', 'Banjara hills', 'Telangana', 'Hyderbad', 500001),
(12, 'Raghava', 4567891470, 'abcdef@gmail.com', '2016-02-13', 'male', 1, '2016-02-02', '2017-02-02', '1/23', 'Banjara hills', 'Telangana', 'Hyderbad', 500001),
(13, 'Anurag', 9391781447, 'aduddu@uxreactor.com', '2016-01-09', 'male', 3, '2016-02-02', '2016-05-02', '23/2', 'Madhapur', 'Hyderabad', 'Telangana', 500081),
(14, 'Nagalakshmi', 9391781447, 'nyarra@uxreactor.org', '2016-01-16', 'female', 1, '2016-02-02', '2017-02-02', '23/2', 'Yousufguda', 'Hyderabad', 'Telangana', 500034),
(15, 'pradeep', 9494043843, 'pnarvaneni@uxreactor.com', '2016-01-05', 'male', 2, '2016-02-02', '2016-08-02', '2', 'Kukatpally', 'Hyderabad', 'Telangana', 507029),
(16, 'Yaswanth', 9876543210, 'yjilakara@uxreactor.org', '2016-02-20', 'male', 1, '2016-02-02', '2017-02-02', '1/23', 'Banjara hills', 'Telangana', 'Hyderbad', 500001),
(17, 'Bala', 4556665443, 'bala@gmail.com', '2016-02-23', 'male', 1, '2016-02-03', '2017-02-03', '43', '4344', 'rrffg', 'fhhf', 66565);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_members`
--
ALTER TABLE `tbl_members`
  ADD PRIMARY KEY (`mem_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_members`
--
ALTER TABLE `tbl_members`
  MODIFY `mem_id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'not null, primary key', AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
