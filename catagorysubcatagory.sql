-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2021 at 04:55 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catagorysubcatagory`
--

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `id` int(11) UNSIGNED NOT NULL,
  `parant_ID` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `Catagory` varchar(253) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`id`, `parant_ID`, `Catagory`) VALUES
(1, 0, 'Canada'),
(3, 0, 'MacBook'),
(17, 3, 'Electronics'),
(21, 0, 'Chaina'),
(23, 1, 'Cloth'),
(25, 23, 'Yellow'),
(26, 23, 'Aronge'),
(30, 0, 'Pakistan'),
(31, 0, 'Afganistan'),
(32, 0, 'Bangladesh'),
(33, 32, 'Electronics');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) UNSIGNED NOT NULL,
  `UserName` varchar(250) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `ContactNumber` int(11) UNSIGNED NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `UserName`, `Email`, `ContactNumber`, `Password`) VALUES
(17, 'Touhid', 'touhid@gmail.com', 163434324, 'c4ca4238a0b923820dcc509a6f75849b');

-- --------------------------------------------------------

--
-- Table structure for table `userinformation`
--

CREATE TABLE `userinformation` (
  `id` int(11) UNSIGNED NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `ContactNumber` int(11) UNSIGNED NOT NULL,
  `Password` varchar(253) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `ColorPicker` varchar(100) NOT NULL,
  `BrithdayDate` date NOT NULL,
  `SkillRange` int(11) NOT NULL,
  `Address` varchar(253) NOT NULL,
  `Catagory` varchar(253) NOT NULL,
  `PartyDate` datetime(6) NOT NULL,
  `AgreeCheck` varchar(50) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `UploadFile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userinformation`
--

INSERT INTO `userinformation` (`id`, `UserName`, `Email`, `ContactNumber`, `Password`, `Gender`, `ColorPicker`, `BrithdayDate`, `SkillRange`, `Address`, `Catagory`, `PartyDate`, `AgreeCheck`, `Image`, `UploadFile`) VALUES
(17, 'Touhid', 'touhid@gmail.com', 123456789, 'c4ca4238a0b923820dcc509a6f75849b', 'Male', '#32bee2', '2021-01-03', 100, 'Dhaka', 'Bangladesh', '2021-01-29 19:17:00.000000', 'Agree', 'pflBoy.jpg', '05.pdf'),
(18, 'Eli Macy', 'EliMacy@gmail.com', 4294967295, 'c4ca4238a0b923820dcc509a6f75849b', 'Female', '#dc7aff', '2021-01-14', 86, 'Canada', 'Canada', '2021-02-05 19:19:00.000000', 'Agree', 'pfl_0.jpg', '05_0.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `userinformation`
--
ALTER TABLE `userinformation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `userinformation`
--
ALTER TABLE `userinformation`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
