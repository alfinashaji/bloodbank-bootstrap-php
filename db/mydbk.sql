-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 17, 2024 at 09:52 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydbk`
--

-- --------------------------------------------------------

--
-- Table structure for table `finddonortable`
--

DROP TABLE IF EXISTS `finddonortable`;
CREATE TABLE IF NOT EXISTS `finddonortable` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `phonenumber` varchar(30) NOT NULL,
  `locationfind` varchar(50) DEFAULT NULL,
  `bloodselect` varchar(50) DEFAULT NULL,
  `reg_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `finddonortable`
--

INSERT INTO `finddonortable` (`id`, `phonenumber`, `locationfind`, `bloodselect`, `reg_date`) VALUES
(1, 'alfina shaji', 'alfina1417', 'B+', '2024-11-26 06:42:22'),
(2, 'ameer beeran', 'alfina1417', 'B-', '2024-11-27 08:38:59'),
(3, '9562659609', 'vadattupara', 'B+', '2024-11-27 08:42:25'),
(4, '9847746813', 'muvattupuzha', 'O+', '2024-11-27 09:17:57'),
(5, 'egfxbig', 'hfjsgodyuif', 'A+', '2024-11-28 10:34:36'),
(6, 'alfina shaji', 'alfina1417', 'O+', '2024-12-03 05:07:32');

-- --------------------------------------------------------

--
-- Table structure for table `myguests`
--

DROP TABLE IF EXISTS `myguests`;
CREATE TABLE IF NOT EXISTS `myguests` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `fullname` varchar(30) NOT NULL,
  `phoneno` varchar(30) NOT NULL,
  `datebirth` varchar(50) DEFAULT NULL,
  `locations` varchar(50) DEFAULT NULL,
  `blood` varchar(50) DEFAULT NULL,
  `actions` varchar(30) DEFAULT 'active',
  `reg_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `myguests`
--

INSERT INTO `myguests` (`id`, `fullname`, `phoneno`, `datebirth`, `locations`, `blood`, `actions`, `reg_date`) VALUES
(1, 'alfina shaji', 'alfina1417', '2024-11-07', 'r5g5', 'O+', 'inactive', '2024-11-26 06:59:46'),
(2, 'alfina shaji', 'alfina1417', '2024-11-29', 'udumb', 'O+', 'inactive', '2024-11-26 07:02:12'),
(3, 'ameer', 'alfina1417', '2024-11-29', 'qxs2x', 'B+', 'inactive', '2024-11-26 07:04:10'),
(4, 'swathy', 'alfina1417', '2024-11-21', 'ecd3rc', 'A-', 'inactive', '2024-11-26 07:04:10'),
(5, 'alfina shaji', 'alfina1417', '2024-11-29', 'jynkui', 'B-', 'inactive', '2024-11-26 08:04:31'),
(6, 'alfina shaji', 'alfina1417', '2024-11-29', 'jynkui', 'B-', 'inactive', '2024-11-28 10:33:41'),
(7, 'ghjik', '6543557869278', '2024-11-28', 'sdewd', 'B+', 'inactive', '2024-12-16 06:27:46'),
(8, 'Rose Mary Joseph', '7902262772', '2005-12-14', 'vadattupara', 'B+', 'active', '2024-12-16 06:27:46');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
