-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 30, 2018 at 12:25 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sat_2018_bouw002`
--
CREATE DATABASE IF NOT EXISTS `sat_2018_bouw002` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `sat_2018_bouw002`;

-- --------------------------------------------------------

--
-- Table structure for table `supervising_drivers`
--

CREATE TABLE `supervising_drivers` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `license_number` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supervising_drivers`
--

INSERT INTO `supervising_drivers` (`id`, `firstname`, `surname`, `phone`, `license_number`, `user_id`) VALUES
(1, 'Johnny', 'Irwin', '9555555', '43214321', 12345678),
(3, 'Henry', 'Huang', '4444444', '45454545', 112233),
(4, 'Majdina', 'Roberson', '12312312', '32132132', 112233),
(5, 'Test', 'Driver', '98989898', '99009900', 112233),
(7, 'fred', 'jones', '0400576569', '22222', 11111),
(8, 'Luke', 'Bouwmeester', '111111111', '111222', 111222),
(9, 'Driver', 'Dan', '5431235', '808080', 999999),
(11, 'Bobby', 'Smith', '400400', '78684939', 112233),
(13, 'Robert', 'Matthews', '0400123192', '00215030', 88834310);

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sd_id` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `distance` int(11) NOT NULL,
  `date` date NOT NULL,
  `light` varchar(20) NOT NULL,
  `traffic` varchar(20) NOT NULL,
  `weather` varchar(20) NOT NULL,
  `parking` tinyint(1) NOT NULL,
  `road_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `user_id`, `sd_id`, `duration`, `distance`, `date`, `light`, `traffic`, `weather`, `parking`, `road_type`) VALUES
(1, 12345678, 1, 45, 20, '2018-06-02', 'Day', 'Light', 'Dry', 1, 'Local'),
(2, 12345678, 1, 30, 15, '2018-06-04', 'Day', 'Moderate', 'Dry', 0, 'Local'),
(3, 112233, 3, 50, 40, '2018-07-19', 'Day', 'Heavy', 'Dry', 1, 'Local streets'),
(4, 112233, 4, 70, 60, '2018-07-19', 'Night', 'Moderate', 'Wet', 0, 'Main roads'),
(5, 112233, 3, 89, 50, '2018-07-19', 'Day', 'Heavy', 'Dry', 1, 'Local streets'),
(6, 112233, 3, 30, 15, '2018-07-20', 'Day', 'Light', 'Wet', 0, 'Main roads'),
(8, 112233, 5, 20, 5, '2018-07-30', 'dawn_dusk', 'moderate', 'wet', 1, 'freeway'),
(9, 11111, 7, 20, 6419754, '2018-07-30', 'dawn_dusk', 'light', 'dry', 0, 'main-roads'),
(10, 11111, 7, 66, 211, '2018-07-30', 'day', 'light', 'dry', 0, 'local-streets'),
(11, 111222, 8, 42, 0, '2018-07-30', 'night', 'light', 'wet', 0, 'rural-highway'),
(12, 111222, 8, 210, 1, '2018-07-30', 'night', 'heavy', 'wet', 0, 'gravel'),
(13, 111222, 8, 63, 752867, '2018-07-30', 'day', 'moderate', 'dry', 0, 'main-roads'),
(14, 112233, 5, 15, 11111, '2018-08-02', 'day', 'moderate', 'dry', 0, 'main-roads'),
(15, 112233, 5, 39, 3, '2018-08-09', 'day', 'moderate', 'wet', 0, 'freeway'),
(16, 112233, 5, 45, 2, '2018-08-13', 'night', 'light', 'dry', 0, 'local-streets'),
(17, 112233, 5, 8, 1, '2018-08-14', 'day', 'light', 'dry', 0, 'local-streets'),
(18, 112233, 5, 10, 600001, '2018-08-14', 'day', 'moderate', 'dry', 0, 'local-streets'),
(19, 112233, 5, 9, 1, '2018-08-14', 'day', 'light', 'dry', 0, 'inner-city'),
(20, 112233, 5, 6, 1, '2018-08-14', 'night', 'light', 'wet', 0, 'main-roads'),
(21, 112233, 5, 7, 2, '2018-08-16', 'day', 'light', 'dry', 0, 'local-streets'),
(22, 112233, 5, 10, 3, '2018-08-16', 'day', 'moderate', 'dry', 0, 'freeway'),
(23, 112233, 5, 8, 3, '2018-08-20', 'day', 'heavy', 'wet', 0, 'local-streets'),
(24, 112233, 5, 5, 5, '2018-08-20', 'dawn_dusk', 'heavy', 'wet', 0, 'local-streets'),
(25, 112233, 5, 5, 5, '2018-08-20', 'dawn_dusk', 'light', 'wet', 0, 'main-roads'),
(30, 999999, 9, 300, 10, '2018-08-27', 'Day', 'Light', 'Dry', 0, 'local-streets'),
(31, 999999, 9, 3, 2, '2018-08-27', 'day', 'light', 'dry', 0, 'local-streets'),
(32, 999999, 9, 8, 7, '2018-08-27', 'day', 'light', 'dry', 0, 'local-streets'),
(33, 999999, 9, 20, 9, '2018-08-27', 'dawn_dusk', 'light', 'wet', 0, 'main-roads'),
(38, 88834310, 13, 16, 2, '2018-08-28', 'day', 'light', 'dry', 0, 'local-streets');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(14) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `surname`, `password`) VALUES
(11111, 'nicki', 'jonson', '$2y$10$wwWqwGK3Wr6hNPO0koYQOuIii04/zPHCY2KSct4.weJKQl9cU//xW'),
(111111, 'joe', 'jones', '$2y$10$Yb1rQXnrX683sU49EHXU3..zBjkztcpR3kHuGnC5L9w02BuksaqEe'),
(111222, 'Luke', 'Bouwmeester', '$2y$10$AUrXNzIUHa5v8zT8impftueckNvufutsQJMBNib.wwSkKhNguwD/2'),
(112233, 'Test', 'Person', '$2y$10$pubeaHGm3/9rsbFX20QYVeYUrdcdC6vHSf4yMX3rVMOfOtwSNnqDW'),
(321321, 'John', 'Smith', '$2y$10$.a2pePtnp3caRLP8.a3UPucxjXi5T91XGD4FsCBs/qHsYVQYQUYI.'),
(333333, 'kai', 'lindsay', '$2y$10$iZAGFKqMtN30/UnaMoAYDeCX194zsQ0qt7oo9ye57o0k.PeDvHQOm'),
(900900, 'james', 'bouwmeester', '$2y$10$DO28ze8moIe1pkXp9mtlyuFFH.VLpXJ6NhnsYt0y5QAp6E6i.UxKm'),
(999999, 'Test', 'Test', '$2y$10$N7ZsWQZSNpl6dhICDGihAO5v5XIPArLdziT7c/nlUlPvd253et16S'),
(12345678, 'James', 'Bouwmeester', 'password'),
(16473562, 'Joe', 'Surname', '$2y$10$Xyk2DzPBFklLfXLFJVxMUeGBolG0t5v6ou47MnZXiMdYhEElVuAta'),
(87658765, 'Joe', 'Barnes', '$2y$10$/OqYau3PtI2ibQggmVuqx...FUGZzbw9kbcGq/tTZxlX8Vn0355Ki'),
(88834310, 'Steve', 'Stevens', '$2y$10$teLT1JRdsp4rLGgA2HBL7uK4ULyWzbrmiN90Sk5xilwIi2e93iBQ2'),
(90065411, 'John', 'Smith', '$2y$10$2029D1mGSHu15IDpY4xKPOVHK7QdX2UP8wrtxIjZ.KzN5w5OpbA52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `supervising_drivers`
--
ALTER TABLE `supervising_drivers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `sd_id` (`sd_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `supervising_drivers`
--
ALTER TABLE `supervising_drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `supervising_drivers`
--
ALTER TABLE `supervising_drivers`
  ADD CONSTRAINT `supervising_drivers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `trips_ibfk_2` FOREIGN KEY (`sd_id`) REFERENCES `supervising_drivers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trips_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
