-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 11, 2021 at 01:55 AM
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
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `blog_user_id` int(11) NOT NULL,
  `blog_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`ID`, `blog_user_id`, `blog_title`, `blog_body`, `blog_img`, `date_created`) VALUES
(1, 2, '123123123', '123123123123', '', '2021-07-09 15:27:28'),
(2, 2, '123123123', '123123123123zzzxczx', 'images/60e808f62f716.jpeg', '2021-07-09 15:29:42');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`ID`, `user_id`, `product_id`, `quantity`, `date_created`) VALUES
(6, 1, 15, 1, '2021-07-10 20:59:41'),
(4, 2, 26, 6, '2021-07-10 17:53:21'),
(9, 4, 15, 1, '2021-07-11 08:53:26');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `comment_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_user` int(11) NOT NULL,
  `comment_product` int(11) NOT NULL,
  `comment_parent` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`ID`, `comment_text`, `comment_user`, `comment_product`, `comment_parent`, `date_created`) VALUES
(1, 'wqe', 2, 0, 0, '2021-07-09 16:06:10'),
(2, '12412', 2, 0, 0, '2021-07-09 16:07:35'),
(3, '123123', 2, 2, 0, '2021-07-09 16:10:11'),
(4, 'erhgergerhg', 2, 1, 0, '2021-07-09 16:12:21');

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
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `quantity` int(11) NOT NULL DEFAULT '5',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `product_name`, `product_price`, `product_company`, `product_img`, `date_created`, `quantity`) VALUES
(6, 'Tahlia bracelet Round, Multicolored, Rhodium plated', 100.09, 'Swarovski ', 'images/60e91266e608d.jpeg', '2021-07-10 10:22:14', 5),
(7, 'AtlasÂ® X Closed Narrow Hinged Bangle in Rose Gold with Diamonds', 9800, 'Tiffany&Co', 'images/60e912eca7c57.jpeg', '2021-07-10 10:24:28', 5),
(4, 'Swarovski Power Collection bracelet Beige', 67.99, 'Swarovski ', 'images/60e8545180085.jpeg', '2021-07-09 20:51:13', 5),
(5, 'Pandora Moments Heart Clasp Snake Chain Bracelet', 65, 'Pandora', 'images/60e90bc57a1a4.webp', '2021-07-10 09:53:57', 5),
(8, 'Pandora Moments Family Tree Heart Clasp Snake Chain Bracelet', 75, 'Pandora', 'images/60e913700ea0b.jpeg', '2021-07-10 10:26:40', 5),
(9, 'Sparkling Wishbone Heart Ring', 55, 'Pandora', 'images/60e913980614e.jpeg', '2021-07-10 10:27:20', 5),
(10, 'Elevated Heart Ring', 75, 'Pandora', 'images/60e913b7d0991.jpeg', '2021-07-10 10:27:51', 5),
(11, 'Elevated Heart Necklace', 90, 'Pandora', 'images/60e9140d10428.webp', '2021-07-10 10:29:17', 5),
(12, 'Murano Glass Sea Turtle Dangle Charm', 55, 'Pandora', 'images/60e9145966569.jpeg', '2021-07-10 10:30:33', 5),
(13, 'Wavy Dark Blue Murano Glass Ocean Charm', 35, 'Pandora', 'images/60e916670b572.webp', '2021-07-10 10:39:19', 5),
(14, 'Double Heart Split Dangle Charm', 55, 'Pandora', 'images/60e916b18060e.jpeg', '2021-07-10 10:40:33', 5),
(15, 'Louison necklace Leaf, Blue, Rhodium plated', 160.5, 'Swarovski ', 'images/60e9171b66add.jpeg', '2021-07-10 10:42:19', 5),
(16, 'Angelic Rectangular Pierced Earrings Green, Rhodium plated', 74.25, 'Swarovski ', 'images/60e917cb6c78e.jpeg', '2021-07-10 10:45:15', 5),
(17, 'Stone ring Pink, Rose gold-tone plated', 89, 'Swarovski ', 'images/60e919336e9f3.jpeg', '2021-07-10 10:51:15', 5),
(18, 'Swarovski Sparkling Dance Dial Up earrings Gray, Rose gold-tone plated', 141.75, 'Swarovski ', 'images/60e9195d56db0.jpeg', '2021-07-10 10:51:57', 5),
(19, 'Eternal Flower Dragonfly Set Pink, Rose-gold tone plated', 99.95, 'Swarovski ', 'images/60e91a011ca6f.jpeg', '2021-07-10 10:54:41', 5),
(20, 'Further bracelet Blue, Rhodium plated', 95.61, 'Swarovski ', 'images/60e91a5a6ac13.webp', '2021-07-10 10:56:10', 5),
(21, 'AtlasÂ® X Closed Wide Hinged Bangle in Rose Gold with PavÃ© Diamonds', 27000, 'Tiffany&Co', 'images/60e91aac4aa8d.jpeg', '2021-07-10 10:57:32', 5),
(22, 'Tiffany T turquoise wire bracelet in 18k white gold, medium.', 2300, 'Tiffany&Co', 'images/60e91ad24fb14.jpeg', '2021-07-10 10:58:10', 5),
(23, 'Elsa PerettiÂ® Snake bangle in sterling silver, small.', 850, 'Tiffany&Co', 'images/60e91af796ecc.jpeg', '2021-07-10 10:58:47', 5),
(24, 'Tiffany T pavÃ© diamond square bracelet in 18k gold, medium.', 13500, 'Tiffany&Co', 'images/60e91b3fc1392.jpeg', '2021-07-10 10:59:59', 5),
(25, 'Paloma\'s Melody five-band bangle in 18k rose gold with diamonds, medium.', 24000, 'Tiffany&Co', 'images/60e91b6336add.jpeg', '2021-07-10 11:00:35', 5),
(26, 'Tiffany T True hinged bracelet in 18k rose gold, medium.', 16000, 'Tiffany&Co', 'images/60e91db2cdd66.jpeg', '2021-07-10 11:10:26', 5),
(27, 'Tiffany Keys modern keys narrow bangle in 18k rose gold, medium.', 5900, 'Tiffany&Co', 'images/60e91dcf85583.jpeg', '2021-07-10 11:10:55', 5),
(35, 'TRINITY NECKLACE WHITE GOLD, YELLOW GOLD, ROSE GOLD, DIAMOND', 3300, 'Cartier', 'images/60e921d210343.webp', '2021-07-10 11:28:02', 5),
(34, 'TRINITY EARRINGS WHITE GOLD, YELLOW GOLD, ROSE GOLD', 2440, 'Cartier', 'images/60e92178327ab.webp', '2021-07-10 11:26:32', 5),
(30, 'LOVE RING YELLOW GOLD', 1820, 'Cartier', 'images/60e920b7cddad.webp', '2021-07-10 11:23:19', 5),
(31, 'LOVE BRACELET, SM YELLOW GOLD', 4450, 'Cartier', 'images/60e920e34b92a.webp', '2021-07-10 11:24:03', 5),
(32, 'TRINITY NECKLACE WHITE GOLD, YELLOW GOLD, ROSE GOLD', 1540, 'Cartier', 'images/60e92116aecac.webp', '2021-07-10 11:24:54', 5),
(36, 'TRINITY NECKLACE WHITE GOLD, CERAMIC, DIAMONDS', 5350, 'Cartier', 'images/60e9220c3d113.webp', '2021-07-10 11:29:00', 5),
(37, 'DIAMANTS LÃ‰GERS BRACELET XS YELLOW GOLD, DIAMOND', 780, 'Cartier', 'images/60e92331a678c.webp', '2021-07-10 11:33:53', 5),
(38, 'JUSTE UN CLOU BRACELET YELLOW GOLD, DIAMONDS', 12500, 'Cartier', 'images/60e923b41ef79.webp', '2021-07-10 11:36:04', 5),
(39, 'HAPPY HEARTS NECKLACE, WHITE GOLD, DIAMONDS, MOTHER-OF-PEARL', 3490.84, 'Chopard', 'images/60e9256745c6a.jpeg', '2021-07-10 11:43:19', 5),
(40, 'HAPPY HEARTS SAUTOIR NECKLACE, ROSE GOLD, DIAMONDS, MOTHER-OF-PEARL', 9290.66, 'Chopard', 'images/60e9259b2ee39.jpeg', '2021-07-10 11:44:11', 5),
(41, 'HAPPY DIAMONDS ICONS NECKLACE, ROSE GOLD, DIAMOND', 2002.58, 'Chopard', 'images/60e925cbd56d0.jpeg', '2021-07-10 11:44:59', 5),
(42, 'HAPPY HEARTS BANGLE, WHITE GOLD, DIAMONDS', 6346.97, 'Chopard', 'images/60e92604ec9f7.jpeg', '2021-07-10 11:45:56', 5),
(44, 'HW Logo White Gold Diamond Bangle Bracelet', 19600, 'Harrywinston', 'images/60e9278a74ed5.webp', '2021-07-10 11:52:26', 5),
(45, 'Lily Cluster Platinum Diamond Bracelet', 2361, 'Harrywinston', 'images/60e927bf611f6.webp', '2021-07-10 11:53:19', 5),
(46, 'Traffic Diamond Bracelet', 35000, 'Harrywinston', 'images/60e928018571f.webp', '2021-07-10 11:54:25', 5),
(47, 'Sparkling Cluster Diamond Bracelet', 140000, 'Harrywinston', 'images/60e9283f657b4.webp', '2021-07-10 11:55:27', 5),
(48, 'Swarovski', 50, 'Swarovski ', 'images/60ea4f1329c41.webp', '2021-07-11 08:53:23', 5);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `review_value` int(11) NOT NULL,
  `review_user` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `review_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'heart',
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_hash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_role` int(11) NOT NULL DEFAULT '2',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `user_name`, `user_email`, `user_hash`, `user_role`, `date_created`) VALUES
(1, '123', '123@123.c', '$2y$10$FL9juM49Hn/LVL3MMt6KfuQgyp3RXbQ0GBl6QFvrV0qfBclyqCCWy', 2, '2021-07-05 16:43:13'),
(2, '123123', '321@gmail.c', '$2y$10$CG8MbFyGF3jbXVf6rjd3uOIZqgu8Rx7f1eV6b2f9COjYQQYdoWoce', 2, '2021-07-05 16:44:33'),
(3, 'sam', 'sam@gmail.com', '$2y$10$InRlkgGebBazi5dKirdZue7dFvxiIwb9nP17R7DsKzcOh0yiO64Ja', 2, '2021-07-11 08:30:44'),
(4, 'admin', 'admin@gmail.com', '$2y$10$pynJjGVMgf.GumWpD1DxCOGCWC5JVISLC0LPjd5h/J0hxxCVymO0S', 1, '2021-07-11 08:45:43');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
