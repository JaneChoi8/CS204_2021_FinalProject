-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 10, 2021 at 05:00 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finalproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` float NOT NULL,
  `product_company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantities` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `product_name`, `product_price`, `product_company`, `product_img`, `quantities`, `date_created`) VALUES
(6, 'Tahlia bracelet Round, Multicolored, Rhodium plated', 100.09, 'Swarovski ', 'images/60e91266e608d.jpeg', 5, '2021-07-10 10:22:14'),
(7, 'AtlasÂ® X Closed Narrow Hinged Bangle in Rose Gold with Diamonds', 9800, 'Tiffany&Co', 'images/60e912eca7c57.jpeg', 5, '2021-07-10 10:24:28'),
(4, 'Swarovski Power Collection bracelet Beige', 67.99, 'Swarovski ', 'images/60e8545180085.jpeg', 2, '2021-07-09 20:51:13'),
(5, 'Pandora Moments Heart Clasp Snake Chain Bracelet', 65, 'Pandora', 'images/60e90bc57a1a4.webp', 5, '2021-07-10 09:53:57'),
(8, 'Pandora Moments Family Tree Heart Clasp Snake Chain Bracelet', 75, 'Pandora', 'images/60e913700ea0b.jpeg', 5, '2021-07-10 10:26:40'),
(9, 'Sparkling Wishbone Heart Ring', 55, 'Pandora', 'images/60e913980614e.jpeg', 5, '2021-07-10 10:27:20'),
(10, 'Elevated Heart Ring', 75, 'Pandora', 'images/60e913b7d0991.jpeg', 5, '2021-07-10 10:27:51'),
(11, 'Elevated Heart Necklace', 90, 'Pandora', 'images/60e9140d10428.webp', 5, '2021-07-10 10:29:17'),
(12, 'Murano Glass Sea Turtle Dangle Charm', 55, 'Pandora', 'images/60e9145966569.jpeg', 5, '2021-07-10 10:30:33'),
(13, 'Wavy Dark Blue Murano Glass Ocean Charm', 35, 'Pandora', 'images/60e916670b572.webp', 5, '2021-07-10 10:39:19'),
(14, 'Double Heart Split Dangle Charm', 55, 'Pandora', 'images/60e916b18060e.jpeg', 5, '2021-07-10 10:40:33'),
(15, 'Louison necklace Leaf, Blue, Rhodium plated', 160.5, 'Swarovski ', 'images/60e9171b66add.jpeg', 5, '2021-07-10 10:42:19'),
(16, 'Angelic Rectangular Pierced Earrings Green, Rhodium plated', 74.25, 'Swarovski ', 'images/60e917cb6c78e.jpeg', 5, '2021-07-10 10:45:15'),
(17, 'Stone ring Pink, Rose gold-tone plated', 89, 'Swarovski ', 'images/60e919336e9f3.jpeg', 5, '2021-07-10 10:51:15'),
(18, 'Swarovski Sparkling Dance Dial Up earrings Gray, Rose gold-tone plated', 141.75, 'Swarovski ', 'images/60e9195d56db0.jpeg', 5, '2021-07-10 10:51:57'),
(19, 'Eternal Flower Dragonfly Set Pink, Rose-gold tone plated', 99.95, 'Swarovski ', 'images/60e91a011ca6f.jpeg', 5, '2021-07-10 10:54:41'),
(20, 'Further bracelet Blue, Rhodium plated', 95.61, 'Swarovski ', 'images/60e91a5a6ac13.webp', 5, '2021-07-10 10:56:10'),
(21, 'AtlasÂ® X Closed Wide Hinged Bangle in Rose Gold with PavÃ© Diamonds', 27000, 'Tiffany&Co', 'images/60e91aac4aa8d.jpeg', 5, '2021-07-10 10:57:32'),
(22, 'Tiffany T turquoise wire bracelet in 18k white gold, medium.', 2300, 'Tiffany&Co', 'images/60e91ad24fb14.jpeg', 5, '2021-07-10 10:58:10'),
(23, 'Elsa PerettiÂ® Snake bangle in sterling silver, small.', 850, 'Tiffany&Co', 'images/60e91af796ecc.jpeg', 5, '2021-07-10 10:58:47'),
(24, 'Tiffany T pavÃ© diamond square bracelet in 18k gold, medium.', 13500, 'Tiffany&Co', 'images/60e91b3fc1392.jpeg', 5, '2021-07-10 10:59:59'),
(25, 'Paloma\'s Melody five-band bangle in 18k rose gold with diamonds, medium.', 24000, 'Tiffany&Co', 'images/60e91b6336add.jpeg', 5, '2021-07-10 11:00:35'),
(26, 'Tiffany T True hinged bracelet in 18k rose gold, medium.', 16000, 'Tiffany&Co', 'images/60e91db2cdd66.jpeg', 5, '2021-07-10 11:10:26'),
(27, 'Tiffany Keys modern keys narrow bangle in 18k rose gold, medium.', 5900, 'Tiffany&Co', 'images/60e91dcf85583.jpeg', 5, '2021-07-10 11:10:55'),
(35, 'TRINITY NECKLACE WHITE GOLD, YELLOW GOLD, ROSE GOLD, DIAMOND', 3300, 'Cartier', 'images/60e921d210343.webp', 5, '2021-07-10 11:28:02'),
(34, 'TRINITY EARRINGS WHITE GOLD, YELLOW GOLD, ROSE GOLD', 2440, 'Cartier', 'images/60e92178327ab.webp', 5, '2021-07-10 11:26:32'),
(30, 'LOVE RING YELLOW GOLD', 1820, 'Cartier', 'images/60e920b7cddad.webp', 5, '2021-07-10 11:23:19'),
(31, 'LOVE BRACELET, SM YELLOW GOLD', 4450, 'Cartier', 'images/60e920e34b92a.webp', 5, '2021-07-10 11:24:03'),
(32, 'TRINITY NECKLACE WHITE GOLD, YELLOW GOLD, ROSE GOLD', 1540, 'Cartier', 'images/60e92116aecac.webp', 5, '2021-07-10 11:24:54'),
(36, 'TRINITY NECKLACE WHITE GOLD, CERAMIC, DIAMONDS', 5350, 'Cartier', 'images/60e9220c3d113.webp', 5, '2021-07-10 11:29:00'),
(37, 'DIAMANTS LÃ‰GERS BRACELET XS YELLOW GOLD, DIAMOND', 780, 'Cartier', 'images/60e92331a678c.webp', 5, '2021-07-10 11:33:53'),
(38, 'JUSTE UN CLOU BRACELET YELLOW GOLD, DIAMONDS', 12500, 'Cartier', 'images/60e923b41ef79.webp', 5, '2021-07-10 11:36:04'),
(39, 'HAPPY HEARTS NECKLACE, WHITE GOLD, DIAMONDS, MOTHER-OF-PEARL', 3490.84, 'Chopard', 'images/60e9256745c6a.jpeg', 5, '2021-07-10 11:43:19'),
(40, 'HAPPY HEARTS SAUTOIR NECKLACE, ROSE GOLD, DIAMONDS, MOTHER-OF-PEARL', 9290.66, 'Chopard', 'images/60e9259b2ee39.jpeg', 5, '2021-07-10 11:44:11'),
(41, 'HAPPY DIAMONDS ICONS NECKLACE, ROSE GOLD, DIAMOND', 2002.58, 'Chopard', 'images/60e925cbd56d0.jpeg', 5, '2021-07-10 11:44:59'),
(42, 'HAPPY HEARTS BANGLE, WHITE GOLD, DIAMONDS', 6346.97, 'Chopard', 'images/60e92604ec9f7.jpeg', 5, '2021-07-10 11:45:56'),
(44, 'HW Logo White Gold Diamond Bangle Bracelet', 19600, 'Harrywinston', 'images/60e9278a74ed5.webp', 5, '2021-07-10 11:52:26'),
(45, 'Lily Cluster Platinum Diamond Bracelet', 2361, 'Harrywinston', 'images/60e927bf611f6.webp', 5, '2021-07-10 11:53:19'),
(46, 'Traffic Diamond Bracelet', 35000, 'Harrywinston', 'images/60e928018571f.webp', 5, '2021-07-10 11:54:25'),
(47, 'Sparkling Cluster Diamond Bracelet', 140000, 'Harrywinston', 'images/60e9283f657b4.webp', 2, '2021-07-10 11:55:27');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
