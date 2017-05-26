-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 26, 2017 at 10:47 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rewards_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `business_partner`
--

CREATE TABLE `business_partner` (
  `p_id` int(11) NOT NULL,
  `partner_name` varchar(80) NOT NULL,
  `partner_desc` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business_partner`
--

INSERT INTO `business_partner` (`p_id`, `partner_name`, `partner_desc`) VALUES
(0, 'none', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `survey_id` int(11) NOT NULL,
  `survey_name` varchar(80) NOT NULL,
  `survey_url` text NOT NULL,
  `p_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `full_names` varchar(80) NOT NULL,
  `username` varchar(19) NOT NULL,
  `email` varchar(80) NOT NULL,
  `phone_number` varchar(80) NOT NULL,
  `access_level` enum('regular','admin','usr') NOT NULL,
  `p_id` int(11) DEFAULT NULL,
  `pwd` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_survey`
--

CREATE TABLE `user_survey` (
  `uid` int(11) NOT NULL,
  `survey_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business_partner`
--
ALTER TABLE `business_partner`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`survey_id`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `user_survey`
--
ALTER TABLE `user_survey`
  ADD PRIMARY KEY (`uid`,`survey_id`),
  ADD KEY `survey_id` (`survey_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business_partner`
--
ALTER TABLE `business_partner`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `survey_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `survey`
--
ALTER TABLE `survey`
  ADD CONSTRAINT `survey_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`),
  ADD CONSTRAINT `survey_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `business_partner` (`p_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `business_partner` (`p_id`);

--
-- Constraints for table `user_survey`
--
ALTER TABLE `user_survey`
  ADD CONSTRAINT `user_survey_ibfk_2` FOREIGN KEY (`survey_id`) REFERENCES `survey` (`survey_id`),
  ADD CONSTRAINT `user_survey_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
