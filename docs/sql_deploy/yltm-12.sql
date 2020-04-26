-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 26, 2020 at 04:23 PM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE `addresses` (
  `line1` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `line2` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `zipcode` int(5) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`line1`, `line2`, `city`, `state`, `zipcode`, `user_ID`, `ID`) VALUES
('13kjh', 'jhhgj', 'jhgjhg', 'Alabama', 60093, 12, 1),
('145 Evergreen Ln', '', 'Winnetka', 'Illinois', 60093, 8, 2),
('145 Evergreen Ln', '', 'Winnetka', 'Illinois', 60093, 14, 3),
('18767', '765', '765', 'Idaho', 60093, 13, 4),
('test1', 'test2', 'testcity', 'teststate', 10101, 23, 5),
('18767', '765', '765', 'Idaho', 60093, 15, 6),
('177 Gingy Lane', '', 'Winnetks', 'Illinois', 60333, 27, 7),
('11896 Carlton Rd', '', 'Cleveland', 'Ohio', 44106, 28, 8);

-- --------------------------------------------------------

--
-- Table structure for table `borrows`
--

CREATE TABLE `borrows` (
  `user_ID` int(11) NOT NULL,
  `item_ID` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `borrows`
--

INSERT INTO `borrows` (`user_ID`, `item_ID`, `start_date`, `end_date`) VALUES
(8, '04f3ef7378', '2020-04-23', '2020-04-23'),
(8, '04f3ef7378', '2020-04-28', '2020-04-30'),
(8, '04f3ef7378', '2020-05-11', '2020-05-12'),
(8, '1ecf4aff5f', '2020-05-06', '2020-05-07'),
(8, '1ecf4aff5f', '2020-05-20', '2020-05-25'),
(8, '8ca02cfb24', '2020-04-01', '2020-04-02'),
(8, 'd82831300b', '2020-06-09', '2020-06-18'),
(15, '04f3ef7378', '2020-05-14', '2020-05-15'),
(15, '2f8f8ea688', '2020-04-26', '2020-04-28'),
(15, '34a31bf1bf', '2020-04-24', '2020-04-27'),
(15, '3af4ec8713', '2020-04-25', '2020-04-25'),
(15, '3af4ec8713', '2020-05-03', '2020-05-07'),
(23, 'f6f6f6f6f6', '2020-05-15', '2020-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `name` char(50) COLLATE utf8_unicode_ci NOT NULL,
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

CREATE TABLE `credit_cards` (
  `number` char(19) COLLATE utf8_unicode_ci NOT NULL,
  `exp_month` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `exp_year` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `cvv` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `user_ID` int(11) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `credit_cards`
--

INSERT INTO `credit_cards` (`number`, `exp_month`, `exp_year`, `cvv`, `user_ID`, `ID`) VALUES
('1234567890123456', '1', '2024', '123', 23, 4),
('1234567890123455', '1', '2024', '123', 8, 5),
('1234567890654321', '1', '2024', '123', 15, 6);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `filename` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `item_ID` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`filename`, `item_ID`, `ID`) VALUES
('444569f7e01bc3fff208fc6fb9c7277abccc6bf232fae1a65506a62b85611922.jpg', '935e245384', 9),
('0db39bd212d5a0c8656f77efdcd54e098612ec521d995ca15972d047bad6da87.jpg', 'aac67e833b', 10),
('f6220522c64586aa515a4733820ec892ba09d4be6875ebf3e2234549bb24a33b.jpg', '1ecf4aff5f', 11),
('419e41f132fa2e738b303d5c64eb8d6e6d3f5f51ae1a727310872d8e57d3b785.jpg', 'f248dd583d', 12),
('525df4db09c49f80453ebbb185a5179fe105e4c6b0b8b8fa41ac97440f10e492.jpeg', 'bc6704c83c', 13),
('f3a67f65e5e7fc8c0739c7c0d16ec611b712fedec50c1fd99bf6eabe8c570ea1.jpg', 'e1b5d19b27', 14),
('a33c311d454645b59745e12140a1760e5c1b4bcbb0d8b59ef4ffb9c1fdac1b72.jpeg', 'c4d830930e', 15),
('7589404f301ec6441835b4679bbcc37bbe8071c9f531a03ae870d9fc4ac426a2.jpg', 'd6f0649b13', 18),
('cd4f5653c4c994680d487f014dec43933800a601e345be77a756afdf5b03f7cc.jpg', '5026dd8b76', 19),
('1355af1eb35d8f866b7055712ca596d5089907b679c969c78778b60780ee6ed6.jpeg', '72eb2060bb', 20),
('0ed4dddc6207623c9a729b0614175e085707d38560dc33921b37de61cb411d1b.jpg', '34a31bf1bf', 21),
('c4954ea61b8eb8f9521e7e7fb78bddf72e1c164e4b749cb4af098db27b1d0a69.png', 'a8d2afba6a', 22),
('8066f63d2c24048fcb7e87b787c12b5205af6b94118350fd18afd468079e77a2.jpeg', 'e69eafdc80', 23),
('thisisatestimage', 'f6f6f6f6f6', 24),
('3ddca61af1e08f10b56f629f9ff33f4a1f4e49bc2ceb6a6946ad567627160404.png', '8ca02cfb24', 25),
('433849088cb6ba88283c66aa334ded367f39c19e2592b52d563538d79f31e9a2.jpg', '8a05fa8cfd', 26),
('0adf2a4618412a819b632b5b0d15f05dd53fb064376be3fd21a899ad1e06a2d9.jpg', '3af4ec8713', 27),
('141c23c640c788f64b2b4c7cac36eb2f462e3fa1f2a609e009392a872a3847c0.jpg', '04f3ef7378', 28),
('273b9f12f9665db6f794957431a3a1b671ca8caf6c116fddb1a821055db5273c.png', '25335d81ca', 29),
('42a1b46bf62397d33b4486e8eef061a560fcbb1bc4c56e2114277c96d3de4ad1.jpg', 'd4ed9b1634', 30),
('650a16225538aa79a4268595f424cf1f5890d862a4aee56452a92549bc8c3a0d.jpeg', '9a4dfacefb', 31),
('9163889231c871bdf15328eb2d603549c212b22571907a3da09d0dd32559391a.jpg', '1f6ae6798c', 32),
('91d4893b3ae10ac2f421af04c5ae4eb04d6dd087bec50e1b955b56a7d756e41b.jpg', '84837817cd', 33),
('fe3bb8ce2b55b1bb8c2418e8355b79a63ad2fbfc1f9c2a7c237c5f43e0b48e3d.jpg', 'd82831300b', 34),
('02e84425f15ae41a862806f2f5cfd0c7d90f03f8a2b5642745e3b71174c3015b.jpeg', '2f8f8ea688', 35),
('b05fe984ac25b61062e85991d0212be72d9d2ad839c6ba4f2bc1083e0d07a357.jpg', 'db2e04a4fb', 36),
('dbb562597cae5e16262401480e177dded4c9f217294192f3f6f021fc0b59d201.jpeg', 'a07a8116da', 37),
('ec0b9dc332f63725dec43eac74f4d77401745b56b4eb3be90b519c444ef1f8c0.jpg', '8802c8a0bb', 38),
('e8aca2d452c50a05efb5781c4c1545a69c262838fd8881a7070c92531f38b3b9.jpg', '5cc16de23a', 39);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `listed` tinyint(1) NOT NULL DEFAULT '1',
  `borrowed` tinyint(1) NOT NULL DEFAULT '0',
  `location` int(5) NOT NULL,
  `rate` decimal(6,2) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `category` int(11) NOT NULL,
  `owner_ID` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `ID` char(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`title`, `description`, `listed`, `borrowed`, `location`, `rate`, `start_date`, `end_date`, `category`, `owner_ID`, `deleted`, `ID`) VALUES
('Kettle', ' Water Boiling Kettle', 1, 0, 2421, '2.00', '2020-04-21', '2020-05-21', 1, 15, 0, '04f3ef7378'),
('my dog', 'is the best dog     ', 1, 0, 60093, '100.00', '2020-05-05', '2020-06-10', 1, 8, 1, '1ecf4aff5f'),
('Angry Doggo', ' This dog will bite you for no reason     ', 1, 0, 60093, '0.50', '2020-04-01', '2021-03-31', 4, 25, 0, '1f6ae6798c'),
('Chris', 'A big boy ', 1, 0, 60093, '100.00', '2020-04-01', '2020-04-30', 2, 25, 0, '25335d81ca'),
('MacBook Air', 'New Golden Macbook Air ', 1, 0, 44106, '5.00', '2020-04-25', '2020-04-30', 2, 15, 0, '2f8f8ea688'),
('iPhone SE', ' cool phone good condition', 1, 0, 44106, '1.00', '2020-04-01', '2020-05-01', 2, 15, 0, '34a31bf1bf'),
('iPhone', ' fully working iPhone 8 ', 1, 0, 2421, '8.00', '2020-04-25', '2020-05-07', 2, 15, 0, '3af4ec8713'),
('iPhone SE', ' 16gb good condition and working', 1, 0, 44106, '1.00', '2020-04-01', '2020-05-01', 2, 15, 0, '5026dd8b76'),
('Hammer', ' Helps hit nails', 1, 0, 44106, '2.50', '2020-04-24', '2020-05-30', 1, 8, 0, '5cc16de23a'),
('Doggos', 'Two little cute doggos', 1, 0, 11791, '100.00', '2020-06-01', '2020-06-30', 8, 16, 0, '72eb2060bb'),
('Case Western', 'Please rent me   ', 1, 0, 44106, '1800.00', '2020-04-22', '2020-04-30', 6, 25, 0, '84837817cd'),
('OChem Textbook', ' College level Ochem textbook', 1, 0, 44106, '1.00', '2020-04-23', '2020-05-28', 6, 15, 0, '8802c8a0bb'),
('Software Engineering', '*Description*  I have now added something', 1, 0, 60093, '100.00', '2020-03-31', '2020-04-30', 1, 24, 0, '8a05fa8cfd'),
('Coffe', 'Coffee keeps you awake', 1, 0, 60093, '280.00', '2020-03-31', '2020-04-16', 1, 8, 0, '8ca02cfb24'),
('yinger', 'hi            ', 1, 0, 67009, '100.00', '2020-05-05', '2020-10-10', 1, 8, 1, '935e245384'),
('Baby Doggo', 'You want to borrow a puppy? here you go', 1, 0, 33185, '100.00', '2020-04-20', '2020-06-25', 7, 25, 0, '9a4dfacefb'),
('Amplifier', ' Marshall Guitar Amp ', 1, 0, 44106, '5.00', '2020-04-27', '2020-04-30', 5, 15, 0, 'a07a8116da'),
('test', ' a big ol test', 0, 0, 91011, '1.00', '2000-11-11', '2000-12-12', 6, 18, 0, 'a8d2afba6a'),
('yinger', 'hi             ', 1, 0, 67009, '100.00', '2020-05-05', '2020-10-10', 1, 8, 1, 'aac67e833b'),
('ginger', 'is the best dog             ', 1, 0, 60093, '100.00', '2020-05-22', '2020-06-06', 1, 8, 1, 'bc6704c83c'),
('daw', ' add', 1, 0, 60093, '100.00', '2020-03-30', '2020-03-31', 1, 8, 1, 'c4d830930e'),
('White wall', 'You get to rent a plain white wall ', 1, 0, 44106, '15.00', '2020-04-30', '2020-06-10', 9, 25, 0, 'd4ed9b1634'),
('yinn', '        yane    ', 1, 0, 60093, '100.00', '2020-03-09', '2020-03-23', 1, 8, 1, 'd6f0649b13'),
('Trash Can', 'rent me for your parties! 96 gallons ', 1, 0, 32049, '5.00', '2020-06-01', '2020-08-31', 11, 25, 0, 'd82831300b'),
('Tennis Racket', ' Wilson Pro Staff RF97', 1, 0, 44106, '3.00', '2020-04-29', '2020-05-20', 3, 15, 0, 'db2e04a4fb'),
('hi im yinny', '***best*** dog ', 1, 0, 60093, '100.00', '2020-03-02', '2020-03-31', 1, 8, 1, 'e1b5d19b27'),
('Chair', ' Chair with 3/4 legs', 1, 0, 90001, '5000.00', '2020-03-27', '2022-05-06', 9, 19, 0, 'e69eafdc80'),
('ginger', 'is the best dog  ', 1, 0, 60093, '100.00', '2020-05-05', '2020-06-06', 1, 8, 1, 'f248dd583d'),
('test title', 'test description', 1, 1, 10101, '280.00', '2020-05-05', '2020-06-06', 6, 23, 1, 'f6f6f6f6f6');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `selector` char(25) COLLATE utf8_unicode_ci NOT NULL,
  `token` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `expires` bigint(20) NOT NULL,
  `type` int(11) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`selector`, `token`, `expires`, `type`, `ID`) VALUES
('', '0daae978f0c0772a84621127f6dc13e0f751544787a3ca60aea18793a56492adb1edfa34e2de4faadd2bd973747ad30f', 1587530458, 0, 8),
('', '16a5095957cf257bc22221d43acb1566d41bef659491b7e530e93defb9c299b28440825d52a8b2441c5f70862d1c014a', 1587487319, 0, 8),
('', '339d6d56dd8e90ea8cd67b2214e9534e6e8c345fa5f6d33632d19ec961e1fd3d180f2bdbac46e99e76bc7c84884e5a9d', 1587431307, 0, 8),
('', '9caaa2c657ffeb03a6c1357a8129a4f9f7ce10d6d37fb7cc91d885682ebce26d6578ac4115dcf2c66dff7efd8140f25e', 1587683270, 0, 16),
('', 'ad3c79e0eb7347857f0a70ffa772ce617125abe64c00101cdb7edaa41e2d8997ae6db3d119158445c0d9e988e0a7f39c', 1587753412, 0, 19);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `username` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
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
('Ginger', 'Yinger', 'yin@gmail.com', 'yinny', '$2y$10$gEninkvajKK92dSGpQnxp.jDyW6Ss2ZUU8aphk8gxgwAqMAMRHHPW', '8888888888', 14),
('Prithik', 'Karthikeyan', 'prithik2000@gmail.com', 'prithik2000', '$2y$10$PJ7D4N9Nv97BLDKO6oGTee3qLTcd0mnunGDELsBstDX2rwDGxLLjm', '2167780722', 15),
('Chloe', 'Van Dorn', 'chv7@case.edu', 'chloe', '$2y$10$7fRqJS88rQRwodlQ3HI7HuiKKgbesJ9V78bE/4V0bryU3/zOcAYgu', '3479310151', 16),
('orion', 'Follett', 'oxf21@case.edu', 'oxf21', '$2y$10$SGCCM3xrNmEqfPNDm5giKOT9o/ERvBkqBPw6CS/QXgdG8bWVYnxw6', '6263907606', 17),
('o', 'f', 'o@gmail.com', 'orionfollett', '$2y$10$VsSQW7bJVbBeFMbqKvAoX.Mz/il93i5ecOX2MUwQqBbFo..c.xoLy', '1234567890', 18),
('Kate', 'S', 'kxs792@case.edu', 'katesmersfelt', '$2y$10$SnApzQvoxhzz81PYP7INzuMzchokQt5TbUli1M40I5MqhXeMvGlyi', '8189137763', 19),
('Test-First', 'Test-Last', 'test@youlendto.me', 'test', '$2y$10$pYNyNQRW8A6qvXJB6aVkDOvh2O1v8p44Jl4Kp8/yaSrriITTFyzzO', '0000000000', 23),
('Christian', 'Tingle', 'christiantingle@gmail.com', 'cpt22', '$2y$10$7rzj7zMl6lmnJ.IiePKQn.Vgwg0IubnoZR998/0C.FEsyeUNCyx06', '8472743667', 24),
('Chris', 'Ting', 'cpt22@gmail.com', 'ct', '$2y$10$FWaFVa536du1jV3dfatGGutR3Um9ogheElslksmMuhUwqc8wy/Khi', '8472743667', 25),
('Bobby', 'Beanis', 'beanis@gmail.com', 'bobbybeanis', '$2y$10$B.c/I30EoLqN2ndsA0e7e.HxU881DhbAczdXp7AHKLmNtSY31iuaG', '8477777777', 27),
('Christian', 'Tingle', 'christian@gmail.com', 'cpt15', '$2y$10$b5GJy0dQHbm..ao50ZUZpuar5Hk5I1zpXS/9hzZh0nUuHGnnJB.eS', '8482743667', 28);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `borrows`
--
ALTER TABLE `borrows`
  ADD PRIMARY KEY (`user_ID`,`item_ID`,`start_date`,`end_date`),
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
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `credit_cards`
--
ALTER TABLE `credit_cards`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
