-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2017 at 05:23 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mysql`
--

-- --------------------------------------------------------

--
-- Table structure for table `readinglist`
--

CREATE TABLE `readinglist` (
  `ID` int(10) UNSIGNED NOT NULL,
  `theDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(30) NOT NULL,
  `URL` varchar(50) NOT NULL,
  `theDesc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `readinglist`
--

INSERT INTO `readinglist` (`ID`, `theDate`, `name`, `URL`, `theDesc`) VALUES
(9, '2017-04-23 13:27:01', 'Romeo and Juliet', 'www.randj.ie', 'Old love story'),
(16, '2017-04-24 14:42:19', 'Diary Of A Wimpy Kid', 'www.janea.com', 'A funny novel');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `readinglist`
--
ALTER TABLE `readinglist`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `readinglist`
--
ALTER TABLE `readinglist`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
