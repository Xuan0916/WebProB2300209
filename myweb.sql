-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2024 at 04:02 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_description` text DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `duration` time DEFAULT NULL,
  `event_venue` varchar(255) DEFAULT NULL,
  `organizer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `event_description`, `event_date`, `duration`, `event_venue`, `organizer`) VALUES
(1, 'Recycle National Day', 'Recycle National Day is a good day', '2001-09-05', '21:29:00', 'HLTG 1.7', 'Lucas'),
(2, 'Recycle National Day', 'Recycle National Day is a good day', '2001-09-05', '21:29:00', 'HLTG 1.7', 'Lucas');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `feedback` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `feedback`, `created_at`) VALUES
(1, 'Xuan Wei Goay', 'xwgoay@gmail.com', 'Yes mama', '2024-04-10 13:26:22'),
(2, 'Xuan Wei Goay', 'xwgoay@gmail.com', 'Yes mama', '2024-04-10 13:28:18'),
(3, 'Justin', 'xwgoay@gmail.com', 'no mama', '2024-04-10 13:31:06');

-- --------------------------------------------------------

--
-- Table structure for table `questionnaire_responses`
--

CREATE TABLE `questionnaire_responses` (
  `email` varchar(255) DEFAULT NULL,
  `household_members` int(11) DEFAULT NULL,
  `home_size` varchar(50) DEFAULT NULL,
  `food_choices` varchar(255) DEFAULT NULL,
  `washing_machine_frequency` varchar(255) DEFAULT NULL,
  `household_purchases` varchar(255) DEFAULT NULL,
  `waste_production` varchar(255) DEFAULT NULL,
  `recycling` varchar(255) DEFAULT NULL,
  `personal_vehicle_miles` varchar(255) DEFAULT NULL,
  `public_transportation_miles` varchar(255) DEFAULT NULL,
  `flight_distance` varchar(255) DEFAULT NULL,
  `total_points` int(255) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questionnaire_responses`
--

INSERT INTO `questionnaire_responses` (`email`, `household_members`, `home_size`, `food_choices`, `washing_machine_frequency`, `household_purchases`, `waste_production`, `recycling`, `personal_vehicle_miles`, `public_transportation_miles`, `flight_distance`, `total_points`, `submission_date`, `question_id`) VALUES
('xwgoay@gmail.com', 4, 'large', 'daily_meat', 'more_than_9_times', '2', '3', 'none', '56789', '7890', 'short_distances', 118, '2024-04-02 14:09:23', 6),
('xwgoay@gmail.com', 3, 'large', 'few_times_meat', 'more_than_9_times', '8', '3', 'paper, steel', '456789', '678', 'short_distances', 92, '2024-04-02 18:37:39', 10),
('B2300209@helplive.edu.my', 3, 'small', 'few_times_meat', '4_to_9_times', '6', '2', 'glass, aluminum', '4567', '789', 'short_distances', 65, '2024-04-02 18:39:06', 11),
('xwgoay@gmail.com', 2, 'medium', 'vegeterian', '4_to_9_times', '8', '1', 'aluminum, steel', '3456', '5678', 'short_distances', 54, '2024-04-03 02:52:27', 12),
('xwgoay@gmail.com', 2, 'large', 'vegeterian', '1_to_3_times', '6', '1', 'aluminum, steel', '2345', '3456', 'short_distances', 52, '2024-04-03 03:51:37', 13);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `userPhone` varchar(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `password` varchar(8) NOT NULL,
  `is_admin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `email`, `userPhone`, `username`, `Gender`, `password`, `is_admin`) VALUES
(1, 'xwgoay@gmail.com', '0164069989', 'Goay Xuan Wei', 'male', '0000', 1),
(2, 'B2300209@helplive.edu.my', '0164069989', 'Goay Xuan Wei', 'male', '0000', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questionnaire_responses`
--
ALTER TABLE `questionnaire_responses`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `questionnaire_responses`
--
ALTER TABLE `questionnaire_responses`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
