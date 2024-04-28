-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 28, 2024 at 10:16 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `g2gwebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `game_id` int NOT NULL,
  `game_name` varchar(100) NOT NULL,
  `game_price` int NOT NULL,
  `game_rating` int NOT NULL,
  `game_category` varchar(100) NOT NULL,
  `game_stock` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`game_id`, `game_name`, `game_price`, `game_rating`, `game_category`, `game_stock`) VALUES
(1, 'Devil May Cry 5', 40, 87, 'Action Adventure, Hack & Slash', 7),
(2, 'Zelda Tears of the Kingdom', 70, 85, 'Action, Adventure, RPG', 10),
(3, 'Red Dead Redemption 2', 30, 90, 'Action, Adventure', 14),
(4, 'Rayman Legends', 16, 80, 'Adventure, Platform, Side-scrolling', 44),
(5, 'Helldivers 2', 41, 82, 'Action, RPG, Third-person shooter', 50);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int NOT NULL,
  `user_id` int NOT NULL,
  `game_id` int NOT NULL,
  `shipping_address1` varchar(255) NOT NULL,
  `shipping_address2` varchar(255) NOT NULL,
  `card_details` varchar(255) NOT NULL,
  `order_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `game_id`, `shipping_address1`, `shipping_address2`, `card_details`, `order_date`) VALUES
(1, 7528, 1, 'address1', 'address2', '1234 1234 1234 1234', '2024-04-27 20:07:27'),
(2, 7528, 1, 'address12', 'address22', '214141241424214', '2024-04-27 20:32:28'),
(3, 7528, 1, 'address12222', 'address222222', '1241241241411', '2024-04-28 20:20:23'),
(4, 7528, 1, 'address124142414214', 'address244214214142141', '214141241412421', '2024-04-28 20:35:09'),
(5, 7528, 2, 'addresstestzelda', 'addresstestzelda2', '1234 5678 9101 1121', '2024-04-28 20:47:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `age` int NOT NULL,
  `location` varchar(50) NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `email`, `age`, `location`, `date`, `password`) VALUES
(7528, 'Ramazan', 'Iskandarov', 'testemail@gmail.com', 21, 'Dublin', NULL, '$2y$10$tft.C5l1KPdzWKXyuMmynerC8br9tDyNQ8zOTijRzUbvWdMcUcTD6'),
(46026, 'testaccount2', 'testacc2', 'testessmail@gmail.com', 44, 'Meath', NULL, '$2y$10$4VvqVXJxqHwAOsVi2qa1oOuM9uJbLmyGpTlHrzy3Fs8IhqhYgWsRa'),
(86210, 'testfirst1', 'testlast2', 'testgmail@gmail.com', 55, 'Dublin', NULL, '$2y$10$NcIZGpdZhpZKHB9f5Hnnm..80bF0tD7ohbKiV18qp2KCOUVO16Wu.'),
(2484180, 'testaccount2', 'testacc2', 'testessmail@gmail.com', 44, 'Meath', NULL, '$2y$10$m5xixp4u1AzxCx5vuGjwo.rtV1x50lQ5KcBTfHo.aV9HKL5X3gOMe'),
(63240851, 'admin', 'adminacc', 'admin@gmail.com', 50, 'admin', NULL, '$2y$10$ypPXfJL0WGXcaA/bm614AO8p.UQoDjKrlPb3NLg.xSQmFaA2FgUQC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`game_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `game_id` (`game_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `games` (`game_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
