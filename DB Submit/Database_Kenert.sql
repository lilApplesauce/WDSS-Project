-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.35 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table g2gwebsite.games
CREATE TABLE IF NOT EXISTS `games` (
  `game_id` int NOT NULL,
  `game_name` varchar(100) NOT NULL,
  `game_price` int NOT NULL,
  `game_rating` int NOT NULL DEFAULT '0',
  `game_category` varchar(100) NOT NULL,
  `game_stock` int NOT NULL,
  PRIMARY KEY (`game_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table g2gwebsite.games: ~5 rows (approximately)
INSERT INTO `games` (`game_id`, `game_name`, `game_price`, `game_rating`, `game_category`, `game_stock`) VALUES
	(1, 'Devil May Cry 5', 40, 87, 'Action adventure, Hack & Slash', 7),
	(2, 'The Legend of Zelda: Tears Of The Kingdom', 50, 96, 'Action-adventure', 4),
	(3, 'Red Dead Redemption 2', 45, 97, 'Action-adventure', 2),
	(4, 'Rayman Legends', 20, 92, '2D Platformer', 9),
	(5, 'Helldivers 2', 40, 82, 'Co-op 3rd Person Shooter', 0);

-- Dumping structure for table g2gwebsite.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `order_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `total_amount` decimal(10,2) NOT NULL,
  `shipping_address1` varchar(255) NOT NULL,
  `shipping_address2` varchar(255) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `card_details` varchar(255) NOT NULL,
  `game_id` int NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `user_id` (`user_id`),
  KEY `game_id` (`game_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `games` (`game_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table g2gwebsite.orders: ~0 rows (approximately)

-- Dumping structure for table g2gwebsite.users
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `age` int NOT NULL,
  `location` varchar(50) NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3824 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table g2gwebsite.users: ~1 rows (approximately)
INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `email`, `age`, `location`, `date`, `password`) VALUES
	(3823, 'Kenert', 'Salm', 'test@email.com', 99, 'TU Dublin', NULL, '$2y$10$M6C3XSlm.GMaBY1i6/D2QOnUUq9YR1ASk1M.8CKQuUp2DgpZv0sE6');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
