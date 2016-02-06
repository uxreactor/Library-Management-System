-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 06, 2016 at 11:32 AM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_membership`
--
ALTER TABLE `tbl_membership`
  ADD PRIMARY KEY (`ms_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_membership`
--
ALTER TABLE `tbl_membership`
  MODIFY `ms_id` int(2) NOT NULL AUTO_INCREMENT COMMENT 'not null, primary key', AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
