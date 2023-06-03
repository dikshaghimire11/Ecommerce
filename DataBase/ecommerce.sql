-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2023 at 01:18 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Stand-in structure for view `adminview`
-- (See below for the actual view)
--
CREATE TABLE `adminview` (
`delivery_id` int(11)
,`purchase_date` datetime
,`success_status` tinyint(1)
,`cart_id` int(11)
,`sellerid` int(11)
,`price` int(11)
,`product_id` int(11)
,`product_name` varchar(50)
,`customer_name` varchar(100)
,`order_quantity` int(11)
,`delivery_address` varchar(50)
,`involved_vendors` int(11)
,`ready_vendors` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `order_quantity` int(11) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `delivery_address` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `customer_id`, `seller_id`, `product_id`, `order_date`, `order_quantity`, `total_price`, `delivery_address`, `status`) VALUES
(1, 1, 3, 1, '2023-01-07', 1, 25, 'kathmandu', 1),
(2, 1, 3, 1, '2023-01-07', 1, 25, 'kathmandu', 1),
(3, 1, 3, 4, '2023-01-07', 1, 10, 'kathmandu', 1),
(4, 1, 1, 7, '2023-01-07', 1, 90, 'kathmandu', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(1, 'Grocery'),
(2, 'Clothes'),
(3, 'Electronics'),
(4, 'Dairy Products'),
(5, 'Cosmetic');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `contact_number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `password`, `contact_number`, `email`, `address`, `status`) VALUES
(1, 'Diksha Ghimire', 'Abcd1234', '9845115153', 'diksha@gmail.com', 'kathmandu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` int(11) NOT NULL,
  `payment` int(11) DEFAULT NULL,
  `success_status` tinyint(1) DEFAULT NULL,
  `purchase_date` datetime DEFAULT NULL,
  `involved_vendors` int(11) DEFAULT NULL,
  `ready_vendors` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id`, `payment`, `success_status`, `purchase_date`, `involved_vendors`, `ready_vendors`) VALUES
(1, 25, 1, '2023-01-07 05:30:10', 1, 1),
(2, 125, NULL, '2023-01-07 10:58:30', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `delivery_id` int(11) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `sucess_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `cart_id`, `delivery_id`, `order_date`, `sucess_status`) VALUES
(1, 1, 1, '2023-01-07', NULL),
(2, 2, 2, '2023-01-07', NULL),
(3, 3, 2, '2023-01-07', NULL),
(4, 4, 2, '2023-01-07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `photo` varchar(500) DEFAULT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `tag` varchar(50) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `photo`, `seller_id`, `category_id`, `price`, `tag`, `quantity`, `expiry_date`, `description`, `status`) VALUES
(1, 'wai wai', '	 /ecommerce/seller/itemsphoto/wai-wai.jpg', 3, 1, 25, 'wai wai chau chau', 100, '0000-00-00', 'hamro man ma wai wai', 1),
(3, 'iphone', '/ecommerce/seller/itemsphoto/mobile.jfif', 3, 3, 100000, 'mobile phone iphone', 10, '0000-00-00', 'ramro phone', 1),
(4, 'biscuit', '/ecommerce/seller/itemsphoto/Coconut_Cookies-removebg-preview.png', 3, 1, 10, 'biscuit ', 800, '2023-06-28', 'ekdaimai mitho biscuit', 1),
(5, 'Paneer', '/ecommerce/seller/itemsphoto/paneer.jpg', 3, 4, 800, 'paneer', 200, '2022-12-30', 'Mitho chha paneer', 1),
(6, 'Newlook sun cream', '/ecommerce/seller/itemsphoto/suncream.jpg', 3, 5, 750, 'sun cream', 300, '2024-06-28', 'skin ramro banauchha. chaya dhandhiphor hatauchha.', 1),
(7, 'Milk', '/ecommerce/seller/itemsphoto/milk.jpg', 1, 4, 90, 'dukh milk', 100, '0000-00-00', 'mithodudh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact_number` varchar(10) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`id`, `name`, `email`, `password`, `address`, `contact_number`, `active`, `status`) VALUES
(1, 'Milan Trades', 'milan@gmail.com', 'milan', 'Kathmandu', '9843030742', 1, 1),
(2, 'Diksha', 'diksha11@gmail.com', 'Abcd1234', 'Kathmandu', '9843030742', 1, 1),
(3, 'Sanjeev', 'sanjeev@gmail.com', 'Abcd1234', 'Kathmandu', '9843030742', 1, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `seller1`
-- (See below for the actual view)
--
CREATE TABLE `seller1` (
`delivery_id` int(11)
,`purchase_date` datetime
,`cart_id` int(11)
,`cartstatus` tinyint(1)
,`sellerid` int(11)
,`price` int(11)
,`product_id` int(11)
,`product_name` varchar(50)
,`customer_name` varchar(100)
,`order_quantity` int(11)
,`delivery_address` varchar(50)
,`involved_vendors` int(11)
,`ready_vendors` int(11)
,`success_status` tinyint(1)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `seller3`
-- (See below for the actual view)
--
CREATE TABLE `seller3` (
`delivery_id` int(11)
,`purchase_date` datetime
,`cart_id` int(11)
,`cartstatus` tinyint(1)
,`sellerid` int(11)
,`price` int(11)
,`product_id` int(11)
,`product_name` varchar(50)
,`customer_name` varchar(100)
,`order_quantity` int(11)
,`delivery_address` varchar(50)
,`involved_vendors` int(11)
,`ready_vendors` int(11)
,`success_status` tinyint(1)
);

-- --------------------------------------------------------

--
-- Table structure for table `vendorapproval`
--

CREATE TABLE `vendorapproval` (
  `id` int(11) NOT NULL,
  `delivery_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendorapproval`
--

INSERT INTO `vendorapproval` (`id`, `delivery_id`, `vendor_id`) VALUES
(1, 1, 3);

-- --------------------------------------------------------

--
-- Structure for view `adminview`
--
DROP TABLE IF EXISTS `adminview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `adminview`  AS SELECT `delivery`.`id` AS `delivery_id`, `delivery`.`purchase_date` AS `purchase_date`, `delivery`.`success_status` AS `success_status`, `cart`.`id` AS `cart_id`, `cart`.`seller_id` AS `sellerid`, `cart`.`total_price` AS `price`, `product`.`id` AS `product_id`, `product`.`name` AS `product_name`, `customer`.`name` AS `customer_name`, `cart`.`order_quantity` AS `order_quantity`, `cart`.`delivery_address` AS `delivery_address`, `delivery`.`involved_vendors` AS `involved_vendors`, `delivery`.`ready_vendors` AS `ready_vendors` FROM (`customer` left join (`product` left join (`cart` left join (`orders` left join `delivery` on(`delivery`.`id` = `orders`.`delivery_id`)) on(`cart`.`id` = `orders`.`cart_id`)) on(`cart`.`product_id` = `product`.`id`)) on(`cart`.`customer_id` = `customer`.`id`)) WHERE `delivery`.`involved_vendors` = `delivery`.`ready_vendors` ;

-- --------------------------------------------------------

--
-- Structure for view `seller1`
--
DROP TABLE IF EXISTS `seller1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `seller1`  AS SELECT `delivery`.`id` AS `delivery_id`, `delivery`.`purchase_date` AS `purchase_date`, `cart`.`id` AS `cart_id`, `cart`.`status` AS `cartstatus`, `cart`.`seller_id` AS `sellerid`, `cart`.`total_price` AS `price`, `product`.`id` AS `product_id`, `product`.`name` AS `product_name`, `customer`.`name` AS `customer_name`, `cart`.`order_quantity` AS `order_quantity`, `cart`.`delivery_address` AS `delivery_address`, `delivery`.`involved_vendors` AS `involved_vendors`, `delivery`.`ready_vendors` AS `ready_vendors`, `delivery`.`success_status` AS `success_status` FROM (`customer` left join (`product` left join (`cart` left join (`orders` left join `delivery` on(`delivery`.`id` = `orders`.`delivery_id`)) on(`cart`.`id` = `orders`.`cart_id`)) on(`cart`.`product_id` = `product`.`id`)) on(`cart`.`customer_id` = `customer`.`id`)) WHERE `cart`.`seller_id` = 1 ;

-- --------------------------------------------------------

--
-- Structure for view `seller3`
--
DROP TABLE IF EXISTS `seller3`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `seller3`  AS SELECT `delivery`.`id` AS `delivery_id`, `delivery`.`purchase_date` AS `purchase_date`, `cart`.`id` AS `cart_id`, `cart`.`status` AS `cartstatus`, `cart`.`seller_id` AS `sellerid`, `cart`.`total_price` AS `price`, `product`.`id` AS `product_id`, `product`.`name` AS `product_name`, `customer`.`name` AS `customer_name`, `cart`.`order_quantity` AS `order_quantity`, `cart`.`delivery_address` AS `delivery_address`, `delivery`.`involved_vendors` AS `involved_vendors`, `delivery`.`ready_vendors` AS `ready_vendors`, `delivery`.`success_status` AS `success_status` FROM (`customer` left join (`product` left join (`cart` left join (`orders` left join `delivery` on(`delivery`.`id` = `orders`.`delivery_id`)) on(`cart`.`id` = `orders`.`cart_id`)) on(`cart`.`product_id` = `product`.`id`)) on(`cart`.`customer_id` = `customer`.`id`)) WHERE `cart`.`seller_id` = 3 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `seller_id` (`seller_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `delivery_id` (`delivery_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seller_id` (`seller_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendorapproval`
--
ALTER TABLE `vendorapproval`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delivery_id` (`delivery_id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vendorapproval`
--
ALTER TABLE `vendorapproval`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`seller_id`) REFERENCES `seller` (`id`),
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`delivery_id`) REFERENCES `delivery` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `seller` (`id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
