-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2020 at 07:18 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mazahir`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(64) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `drug`
--

CREATE TABLE `drug` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `type` varchar(64) NOT NULL,
  `price` float NOT NULL,
  `origin` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(11) NOT NULL,
  `cid` int(11) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `d1` int(11) DEFAULT NULL,
  `q1` int(11) DEFAULT NULL,
  `p1` int(11) DEFAULT NULL,
  `d2` int(11) DEFAULT NULL,
  `q2` int(11) DEFAULT NULL,
  `p2` int(11) DEFAULT NULL,
  `d3` int(11) DEFAULT NULL,
  `q3` int(11) DEFAULT NULL,
  `p3` int(11) DEFAULT NULL,
  `d4` int(11) DEFAULT NULL,
  `q4` int(11) DEFAULT NULL,
  `p4` int(11) DEFAULT NULL,
  `d5` int(11) DEFAULT NULL,
  `q5` int(11) DEFAULT NULL,
  `p5` int(11) DEFAULT NULL,
  `d6` int(11) DEFAULT NULL,
  `q6` int(11) DEFAULT NULL,
  `p6` int(11) DEFAULT NULL,
  `d7` int(11) DEFAULT NULL,
  `q7` int(11) DEFAULT NULL,
  `p7` int(11) DEFAULT NULL,
  `d8` int(11) DEFAULT NULL,
  `q8` int(11) DEFAULT NULL,
  `p8` int(11) DEFAULT NULL,
  `d9` int(11) DEFAULT NULL,
  `q9` int(11) DEFAULT NULL,
  `p9` int(11) DEFAULT NULL,
  `d10` int(11) DEFAULT NULL,
  `q10` int(11) DEFAULT NULL,
  `p10` int(11) DEFAULT NULL,
  `d11` int(11) DEFAULT NULL,
  `q11` int(11) DEFAULT NULL,
  `p11` int(11) DEFAULT NULL,
  `d12` int(11) DEFAULT NULL,
  `q12` int(11) DEFAULT NULL,
  `p12` int(11) DEFAULT NULL,
  `d13` int(11) DEFAULT NULL,
  `q13` int(11) DEFAULT NULL,
  `p13` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `drug_limit` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `username_2` (`username`);

--
-- Indexes for table `drug`
--
ALTER TABLE `drug`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drug`
--
ALTER TABLE `drug`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
