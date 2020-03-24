-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2020 at 02:44 AM
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

DROP TABLE IF EXISTS `addresses`;
CREATE TABLE `addresses` (
  `line1` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `line2` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
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

DROP TABLE IF EXISTS `borrows`;
CREATE TABLE `borrows` (
  `user_ID` int(11) NOT NULL,
  `item_ID` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`name`, `ID`) VALUES
('General', 1),
('Electronics', 2),
('Sports', 3),
('Fashion', 4),
('Music', 5),
('Education', 6),
('Toys', 7),
('Hobbies', 8),
('Furnishings', 9),
('Books', 10),
('Party Equipment', 11);

-- --------------------------------------------------------

--
-- Table structure for table `credit_cards`
--

DROP TABLE IF EXISTS `credit_cards`;
CREATE TABLE `credit_cards` (
  `number` varchar(19) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
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

DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `filename` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `item_ID` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`filename`, `item_ID`, `ID`) VALUES
('444569f7e01bc3fff208fc6fb9c7277abccc6bf232fae1a65506a62b85611922.jpg', '935e245384', 9),
('0db39bd212d5a0c8656f77efdcd54e098612ec521d995ca15972d047bad6da87.jpg', 'aac67e833b', 10),
('e12a94017e108e8f534d539b362fd775f9d68bf274408a721bff927f45d54e56.jpg', '1ecf4aff5f', 11),
('419e41f132fa2e738b303d5c64eb8d6e6d3f5f51ae1a727310872d8e57d3b785.jpg', 'f248dd583d', 12),
('525df4db09c49f80453ebbb185a5179fe105e4c6b0b8b8fa41ac97440f10e492.jpeg', 'bc6704c83c', 13),
('f3a67f65e5e7fc8c0739c7c0d16ec611b712fedec50c1fd99bf6eabe8c570ea1.jpg', 'e1b5d19b27', 14),
('a33c311d454645b59745e12140a1760e5c1b4bcbb0d8b59ef4ffb9c1fdac1b72.jpeg', 'c4d830930e', 15),
('7589404f301ec6441835b4679bbcc37bbe8071c9f531a03ae870d9fc4ac426a2.jpg', 'd6f0649b13', 18),
('cd4f5653c4c994680d487f014dec43933800a601e345be77a756afdf5b03f7cc.jpg', '5026dd8b76', 19);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(5000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `listed` tinyint(1) NOT NULL DEFAULT '1',
  `borrowed` tinyint(1) NOT NULL DEFAULT '0',
  `location` int(5) NOT NULL,
  `rate` decimal(6,2) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `category` int(11) NOT NULL,
  `owner_ID` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `ID` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`title`, `description`, `listed`, `borrowed`, `location`, `rate`, `start_date`, `end_date`, `category`, `owner_ID`, `deleted`, `ID`) VALUES
('ginger', 'is the best dog ', 0, 0, 60093, '100.00', '2020-05-05', '2020-06-06', 1, 8, 0, '1ecf4aff5f'),
('iPhone SE', ' 16gb good condition and working', 0, 0, 44106, '1.00', '2020-04-01', '2020-05-01', 2, 15, 0, '5026dd8b76'),
('yinger', 'hi            ', 0, 0, 67009, '100.00', '2020-05-05', '2020-10-10', 1, 8, 1, '935e245384'),
('yinger', 'hi             ', 0, 0, 67009, '100.00', '2020-05-05', '2020-10-10', 1, 8, 0, 'aac67e833b'),
('ginger', 'is the best dog             ', 0, 0, 60093, '100.00', '2020-05-22', '2020-06-06', 1, 8, 0, 'bc6704c83c'),
('daw', ' add', 0, 0, 60093, '100.00', '2020-03-30', '2020-03-31', 1, 8, 0, 'c4d830930e'),
('yinn', '        yane    ', 0, 0, 60093, '100.00', '2020-03-09', '2020-03-23', 1, 8, 0, 'd6f0649b13'),
('hi im yinny', '***best*** dog ', 0, 0, 60093, '100.00', '2020-03-02', '2020-03-31', 1, 8, 0, 'e1b5d19b27'),
('ginger', 'is the best dog  ', 0, 0, 60093, '100.00', '2020-05-05', '2020-06-06', 1, 8, 0, 'f248dd583d');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

DROP TABLE IF EXISTS `tokens`;
CREATE TABLE `tokens` (
  `token` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `expires` bigint(20) NOT NULL,
  `type` int(11) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`token`, `expires`, `type`, `ID`) VALUES
('0daae978f0c0772a84621127f6dc13e0f751544787a3ca60aea18793a56492adb1edfa34e2de4faadd2bd973747ad30f', 1587530458, 0, 8),
('16a5095957cf257bc22221d43acb1566d41bef659491b7e530e93defb9c299b28440825d52a8b2441c5f70862d1c014a', 1587487319, 0, 8),
('339d6d56dd8e90ea8cd67b2214e9534e6e8c345fa5f6d33632d19ec961e1fd3d180f2bdbac46e99e76bc7c84884e5a9d', 1587431307, 0, 8),
('dc8a5b70ed75297e51f12d5bb4f328b23a48150fb1040f3f5e9e62a73192d0030a8f0cbc159d4190bb8a5a63bb3aaf22', 1587602334, 0, 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `first_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(400) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`first_name`, `last_name`, `email`, `username`, `password`, `phone_number`, `ID`) VALUES
('Christian', 'Tingle', 'ctingle18@gmail.com', 'ctingle18', '$2y$10$8JfFlHQhfsjE1KlmaAFrb.y5X0mVATrg997.awyLYNjTZYvKs1mG6', '8472743667', 8),
('Jerry', 'Jerry', 'cpt15@case.edu', 'jerry', '$2y$10$kjib.2Soz6TE90zfN8QCAOMDWrq8R5oVzmR7u/ifEpMXbbVQSyrG2', '8472743667', 12),
('Crhkjsh', 'kjhfjk', 'cpt@gmail.com', 'acting', '$2y$10$2TJQ4Anz0YDOLunLlYVn8.9yXtJbXUQbjwGhUQnHNuRQc6C4z8RGy', '8766', 13),
('Ginger', 'Yinger', 'yin@gmail.com', 'yinny', '$2y$10$gEninkvajKK92dSGpQnxp.jDyW6Ss2ZUU8aphk8gxgwAqMAMRHHPW', '8888888888', 14),
('Prithik', 'Karthikeyan', 'prithik2000@gmail.com', 'prithik2000', '$2y$10$PJ7D4N9Nv97BLDKO6oGTee3qLTcd0mnunGDELsBstDX2rwDGxLLjm', '2167780722', 15);

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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`);

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
ALTER TABLE `items` ADD FULLTEXT KEY `searchindex` (`title`,`description`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `credit_cards`
--
ALTER TABLE `credit_cards`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
