-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2021 at 10:22 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `state_id`, `city_name`) VALUES
(1, 1, 'Panipat'),
(2, 1, 'Karnal'),
(3, 2, 'Mohali'),
(4, 2, 'Amritsar'),
(5, 3, 'Kabul'),
(6, 4, 'Tirin Kot');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `country_name`) VALUES
(1, 'India'),
(2, 'Afghanistan');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `state_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`state_id`, `country_id`, `state_name`) VALUES
(1, 1, 'Haryana'),
(2, 1, 'Chandigarh'),
(3, 2, 'Ashraf Hotak'),
(4, 2, 'Mahmud Hotak');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `stud_name` varchar(50) NOT NULL,
  `stud_email` varchar(50) NOT NULL,
  `stud_phone` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `course` text NOT NULL,
  `country` varchar(250) NOT NULL,
  `state` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `stud_image` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `stud_name`, `stud_email`, `stud_phone`, `gender`, `course`, `country`, `state`, `city`, `stud_image`) VALUES
(1, 'Garima', 'garimach9297@gmail.com', '8708220470', 'Female', 'dance,singing', '', '', '', 'dummy-female.png'),
(4, 'vikas', 'vikas@gmail.com', '9911339566', 'Male', 'dance', '1', '1', '1', '252-2524695_dummy-profile-image-jpg-hd-png-download.png'),
(5, 'pagal', 'pagal@gmail.com', '1234567890', 'Male', 'dance', '1', '2', '4', '252-2524695_dummy-profile-image-jpg-hd-png-download.png'),
(6, 'pppp', 'pppp@gmail.com', '1234567890', 'Male', '', '1', '2', '4', '252-2524695_dummy-profile-image-jpg-hd-png-download.png'),
(8, 'aaaa', 'aaa@gmail.com', '1234567890', 'Male', 'dance,on', '1', '1', '2', '252-2524695_dummy-profile-image-jpg-hd-png-download.png'),
(9, 'garima', 'chauhangarima525@gmail.com', '8708220470', 'Female', 'dance,singing', '1', '2', '4', 'course-3.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
