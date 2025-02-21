-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 16, 2025 at 04:59 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

DROP TABLE IF EXISTS `admin_table`;
CREATE TABLE IF NOT EXISTS `admin_table` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_username`, `admin_password`) VALUES
(2, 'admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `brand_id` int NOT NULL AUTO_INCREMENT,
  `brand_title` varchar(100) NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(19, 'ASUS'),
(18, 'Samsung'),
(17, 'Apple'),
(16, 'Canon');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

DROP TABLE IF EXISTS `cart_details`;
CREATE TABLE IF NOT EXISTS `cart_details` (
  `product_id` int NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`product_id`, `ip_address`, `quantity`) VALUES
(46, '::1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `category_title` varchar(100) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(17, 'Watch'),
(16, 'Headset'),
(15, 'Cellphone'),
(14, 'Lenses');

-- --------------------------------------------------------

--
-- Table structure for table `orders_pending`
--

DROP TABLE IF EXISTS `orders_pending`;
CREATE TABLE IF NOT EXISTS `orders_pending` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `invoice_number` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `order_status` varchar(255) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders_pending`
--

INSERT INTO `orders_pending` (`order_id`, `user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES
(1, 14, 1110334473, 47, 1, 'pending'),
(2, 15, 1979088751, 46, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `product_title` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keywords` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `category_id` int NOT NULL,
  `brand_id` int NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date` timestamp NOT NULL,
  `product_status` varchar(255) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `product_status`) VALUES
(46, 'Smart Watch for Women', '1.8\"Fitness Watch(Answer/Make Call),Alexa Built-in, [24H Heart Rate Sleep Blood Oxygen Monitor],5ATM Waterproof,100 Sports Modes Step Calorie Women Watches for iOS&Android Phones', 'Watch, Iphone, Smart, Women, Alexa, Bluetooth', 17, 17, 'pink watch.jpg', 'pink watch.jpg', 'pink watch.jpg', '2819', '2023-11-13 08:23:36', 'true'),
(47, 'SAMSUNG Galaxy Fold Cell Phone', 'Factory Unlocked Android Smartphone, 256GB, Big 7.6” Screen for Streaming, Gaming, Dual App View, One-Hand Control, Hands-Free Use, US Version, 2023, Cream', 'Samsung, Phone, Android', 15, 18, 'product 5.jpg', 'product 5.jpg', 'product 5.jpg', '8159', '2023-11-13 08:25:15', 'true'),
(45, 'Canon Telephoto Zoom Lens for Canon SLR Cameras', 'Products with electrical plugs are designed for use in the US. Outlets and voltage differ internationally and this product may require an adapter or converter for use in your destination. Please check compatibility before purchasing.', 'Canon, Lenses, SLR, Zoom', 14, 16, 'camera.jpg', 'camera.jpg', 'camera.jpg', '1999', '2023-11-13 08:12:07', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

DROP TABLE IF EXISTS `user_orders`;
CREATE TABLE IF NOT EXISTS `user_orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `amount_due` int NOT NULL,
  `invoice_number` int NOT NULL,
  `total_products` int NOT NULL,
  `order_date` timestamp NOT NULL,
  `order_status` varchar(255) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(22, 15, 2819, 1979088751, 1, '2023-11-30 07:05:05', 'Complete'),
(21, 14, 8159, 1110334473, 1, '2023-11-30 04:08:48', 'Complete'),
(20, 11, 1999, 1846411107, 1, '2023-11-13 10:54:58', 'Complete'),
(19, 11, 4818, 2109107507, 2, '2023-11-13 10:53:35', 'Complete'),
(18, 11, 2819, 847027131, 1, '2023-11-13 08:33:05', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

DROP TABLE IF EXISTS `user_payments`;
CREATE TABLE IF NOT EXISTS `user_payments` (
  `payment_id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `invoice_number` int NOT NULL,
  `amount` int NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_payments`
--

INSERT INTO `user_payments` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `date`) VALUES
(16, 22, 1979088751, 2819, 'COD', '0000-00-00 00:00:00'),
(15, 21, 1110334473, 8159, 'COD', '0000-00-00 00:00:00'),
(14, 20, 1846411107, 1999, 'COD', '0000-00-00 00:00:00'),
(13, 19, 2109107507, 4818, 'GCASH', '0000-00-00 00:00:00'),
(12, 18, 847027131, 2819, 'GCASH', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

DROP TABLE IF EXISTS `user_table`;
CREATE TABLE IF NOT EXISTS `user_table` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(15, 'user1', 'user@gmail.com', '$2y$10$OD/rmmlivM5Vl5dXYxaJ.e2kc.TLqLQj.N9R76c29plOneNGJSs8y', '', '::1', 'Muntinlupa', '09123456789');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
