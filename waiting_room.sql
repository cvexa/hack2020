-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2020 at 02:38 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `waiting_room`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctor_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `speciality` varchar(100) NOT NULL,
  `biography` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(120) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctor_id`, `first_name`, `last_name`, `speciality`, `biography`, `email`, `password`, `photo`) VALUES
(16, 'Петър', 'Иванов', '', '', 'sjuesju@yahoo.no', '$2y$10$YbFTbv4/JPvk0DDOcZ.8ZupPmNBKzcHbG.Gf7zO1UfFbOF2nN7PAu', ''),
(18, 'Петя', 'Цветкова', '', '', 'ew@gmail.com', '$2y$10$Up/ebeEOR3pCLqwJ3meXd.Bg.19P1XQdHxE8QExcIQSImvDvrXIie', '');

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`place_id`, `place_name`) VALUES
(1, 'Света Ана'),
(2, 'МБАЛ Враца');

-- --------------------------------------------------------

--
-- Table structure for table `queue`
--

CREATE TABLE `queue` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `schedule_hours`
--

CREATE TABLE `schedule_hours` (
  `id_hour` int(11) NOT NULL,
  `schedule_place_id` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `name_patient` varchar(100) NOT NULL,
  `age` varchar(20) DEFAULT NULL,
  `reason` varchar(100) DEFAULT NULL,
  `finished` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schedule_hours`
--

INSERT INTO `schedule_hours` (`id_hour`, `schedule_place_id`, `start_time`, `name_patient`, `age`, `reason`, `finished`) VALUES
(1, 1, '07:00:00', '', NULL, NULL, 0),
(2, 1, '07:15:00', '', NULL, NULL, 0),
(3, 1, '07:30:00', '', NULL, NULL, 0),
(4, 1, '07:45:00', '', '', '', 0),
(6, 1, '08:00:00', '', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `schedule_place`
--

CREATE TABLE `schedule_place` (
  `schedule_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `total_checked` int(11) NOT NULL,
  `total_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schedule_place`
--

INSERT INTO `schedule_place` (`schedule_id`, `start_date`, `end_date`, `doctor_id`, `place_id`, `total_checked`, `total_time`) VALUES
(1, '2020-10-04 07:00:00', '2020-10-04 13:00:00', 16, 1, 0, '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_codes`
--

CREATE TABLE `user_codes` (
  `user_id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `finished` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctor_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `queue`
--
ALTER TABLE `queue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `schedule_hours`
--
ALTER TABLE `schedule_hours`
  ADD PRIMARY KEY (`id_hour`),
  ADD KEY `schedule_place_id` (`schedule_place_id`);

--
-- Indexes for table `schedule_place`
--
ALTER TABLE `schedule_place`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `place_id` (`place_id`);

--
-- Indexes for table `user_codes`
--
ALTER TABLE `user_codes`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `queue`
--
ALTER TABLE `queue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedule_hours`
--
ALTER TABLE `schedule_hours`
  MODIFY `id_hour` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `schedule_place`
--
ALTER TABLE `schedule_place`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_codes`
--
ALTER TABLE `user_codes`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `queue`
--
ALTER TABLE `queue`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user_codes` (`user_id`);

--
-- Constraints for table `schedule_hours`
--
ALTER TABLE `schedule_hours`
  ADD CONSTRAINT `schedule_place_id` FOREIGN KEY (`schedule_place_id`) REFERENCES `schedule_place` (`place_id`);

--
-- Constraints for table `schedule_place`
--
ALTER TABLE `schedule_place`
  ADD CONSTRAINT `doctor_id` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`doctor_id`),
  ADD CONSTRAINT `place_id` FOREIGN KEY (`place_id`) REFERENCES `places` (`place_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
