-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 05, 2016 at 08:21 AM
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
(31, 783161481),
(32, 783161481),
(33, 783161481),
(34, 783161481),
(35, 783161481),
(36, 783161481),
(37, 783161481),
(38, 783161481),
(39, 783161481),
(40, 783161481),
(41, 783161482),
(42, 783161482),
(43, 783161482),
(44, 783161482),
(45, 783161482),
(46, 783161482),
(47, 783161482),
(48, 783161482),
(49, 783161482),
(50, 783161482),
(51, 783161483),
(52, 783161483),
(53, 783161483),
(54, 783161483),
(55, 783161483),
(56, 783161483),
(57, 783161483),
(58, 783161483),
(59, 783161483),
(60, 783161483),
(61, 783161484),
(62, 783161484),
(63, 783161484),
(64, 783161484),
(65, 783161484),
(66, 783161484),
(67, 783161484),
(68, 783161484),
(69, 783161484),
(70, 783161484),
(71, 783161485),
(72, 783161485),
(73, 783161485),
(74, 783161485),
(75, 783161485),
(76, 783161485),
(77, 783161485),
(78, 783161485),
(79, 783161485),
(80, 783161485),
(81, 783161486),
(82, 783161486),
(83, 783161486),
(84, 783161486),
(85, 783161486),
(86, 783161486),
(87, 783161486),
(88, 783161486),
(89, 783161486),
(90, 783161486),
(91, 783161487),
(92, 783161487),
(93, 783161487),
(94, 783161487),
(95, 783161487),
(96, 783161487),
(97, 783161487),
(98, 783161487),
(99, 783161487),
(100, 783161487),
(101, 783161488),
(102, 783161488),
(103, 783161488),
(104, 783161488),
(105, 783161488),
(106, 783161488),
(107, 783161488),
(108, 783161488),
(109, 783161488),
(110, 783161488),
(111, 783161489),
(112, 783161489),
(113, 783161489),
(114, 783161489),
(115, 783161489),
(116, 783161489),
(117, 783161489),
(118, 783161489),
(119, 783161489),
(120, 783161489),
(121, 783161490),
(122, 783161490),
(123, 783161490),
(124, 783161490),
(125, 783161490),
(126, 783161490),
(127, 783161490),
(128, 783161490),
(129, 783161490),
(130, 783161490);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_all_books`
--
ALTER TABLE `tbl_all_books`
  ADD PRIMARY KEY (`book_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_all_books`
--
ALTER TABLE `tbl_all_books`
  MODIFY `book_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
