-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 05, 2016 at 08:22 AM
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
(783161481, 176, 1, 'Rupa Publications Ind Pvt Ltd', 'Fiction', 'Five Point Someone What Not To Do At IIT', 'Chetan Bhagat'),
(783161482, 215, 1, 'Jaico Books', 'Fable', 'The Monk Who Sold His Ferrari', 'Robin Sharma'),
(783161483, 200, 1, 'Shristi Publication', 'Fiction', 'Life is What You Make it', 'Preeti Shenoy'),
(783161484, 250, 1, 'Harper Collins Publisher', 'Fiction', 'The Alchemist', 'Paulo Coelho'),
(783161485, 158, 1, 'Napoleon Publication', 'Non-fiction', 'Think and Grow Rich', 'Napoleon Hill'),
(783161486, 350, 1, 'Universities Press', 'Biography', 'Wings of Fire: An Autobiography', 'A.P.J. Abdul Kalam'),
(783161487, 200, 1, 'WestLand Books', 'Fiction', 'The Immortals of Meluha (Shiva Trilogy)', 'Amish'),
(783161488, 150, 1, 'Vermilion publisher', 'Non-fiction', 'How to Win Friends and Influence People', 'Dale Carnegie'),
(783161489, 180, 1, 'Arrow Books', 'Fiction', 'The Old Man and the Sea', 'Ernest Hemingway'),
(783161490, 195, 1, 'Harper Collins Publisher', 'Fiction', 'And Then There Were None', 'Agatha Christie');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_book_varities`
--
ALTER TABLE `tbl_book_varities`
  ADD PRIMARY KEY (`isbn`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
