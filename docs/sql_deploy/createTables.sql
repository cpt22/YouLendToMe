-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2020 at 01:21 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yltm`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE `addresses`;
DROP TABLE users;
DROP TABLE borrows;
DROP TABLE items;
DROP TABLE images;
DROP TABLE tokens;
DROP TABLE credit_cards;
SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE `addresses` (
  `line1` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `line2` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `zipcode` int(5) NOT NULL,
  `user_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`line1`, `line2`, `city`, `state`, `zipcode`, `user_ID`) VALUES
('13kjh', 'jhhgj', 'jhgjhg', 'Alabama', 60093, 12),
('145 Evergreen Ln', '', 'Winnetka', 'Illinois', 60093, 8),
('145 Evergreen Ln', '', 'Winnetka', 'Illinois', 60093, 14),
('18767', '765', '765', 'Idaho', 60093, 13);

-- --------------------------------------------------------

--
-- Table structure for table `borrows`
--

CREATE TABLE `borrows` (
  `user_ID` int(11) NOT NULL,
  `item_ID` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `credit_cards`
--

CREATE TABLE `credit_cards` (
  `number` varchar(19) COLLATE utf8_unicode_ci NOT NULL,
  `exp_month` int(11) NOT NULL,
  `exp_year` int(11) NOT NULL,
  `cvv` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `filename` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `item_ID` int(11) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `listed` tinyint(1) NOT NULL DEFAULT '0',
  `borrowed` tinyint(1) NOT NULL DEFAULT '0',
  `location` int(5) NOT NULL,
  `rate` decimal(4,2) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `owner_ID` int(11) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `expires` bigint(20) NOT NULL,
  `type` int(11) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`token`, `expires`, `type`, `ID`) VALUES
('339d6d56dd8e90ea8cd67b2214e9534e6e8c345fa5f6d33632d19ec961e1fd3d180f2bdbac46e99e76bc7c84884e5a9d', 1587431307, 0, 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`first_name`, `last_name`, `email`, `username`, `password`, `phone_number`, `ID`) VALUES
('Christian', 'Tingle', 'ctingle18@gmail.com', 'ctingle18', '$2y$10$8JfFlHQhfsjE1KlmaAFrb.y5X0mVATrg997.awyLYNjTZYvKs1mG6', '8472743667', 8),
('Jerry', 'Jerry', 'cpt15@case.edu', 'jerry', '$2y$10$kjib.2Soz6TE90zfN8QCAOMDWrq8R5oVzmR7u/ifEpMXbbVQSyrG2', '8472743667', 12),
('Crhkjsh', 'kjhfjk', 'cpt@gmail.com', 'acting', '$2y$10$2TJQ4Anz0YDOLunLlYVn8.9yXtJbXUQbjwGhUQnHNuRQc6C4z8RGy', '8766', 13),
('Ginger', 'Yinger', 'yin@gmail.com', 'yinny', '$2y$10$gEninkvajKK92dSGpQnxp.jDyW6Ss2ZUU8aphk8gxgwAqMAMRHHPW', '8888888888', 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`line1`,`city`,`state`,`zipcode`,`user_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `borrows`
--
ALTER TABLE `borrows`
  ADD KEY `user_ID` (`user_ID`),
  ADD KEY `item_ID` (`item_ID`);

--
-- Indexes for table `credit_cards`
--
ALTER TABLE `credit_cards`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `item_ID` (`item_ID`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `owner_ID` (`owner_ID`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`token`),
  ADD KEY `user_ID` (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `credit_cards`
--
ALTER TABLE `credit_cards`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `users` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `borrows`
--
ALTER TABLE `borrows`
  ADD CONSTRAINT `borrows_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `borrows_ibfk_2` FOREIGN KEY (`item_ID`) REFERENCES `items` (`ID`);

--
-- Constraints for table `credit_cards`
--
ALTER TABLE `credit_cards`
  ADD CONSTRAINT `credit_cards_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `users` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`item_ID`) REFERENCES `items` (`ID`);

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`owner_ID`) REFERENCES `users` (`ID`);

--
-- Constraints for table `tokens`
--
ALTER TABLE `tokens`
  ADD CONSTRAINT `tokens_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `users` (`ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
