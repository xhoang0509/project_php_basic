-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2022 at 11:26 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abcshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` char(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL,
  `email` char(255) NOT NULL,
  `password` char(255) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `photo`, `address`, `gender`, `email`, `password`, `level`) VALUES
(2, 'super admin', '', '', 0, 'superadmin@gmail.com', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` char(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` char(50) NOT NULL,
  `token` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `password`, `photo`, `address`, `phone`, `token`) VALUES
(1, 'Nguyễn Xuân Hoàng', 'xhoang0509@gmail.com', '1', '1642084851.png', '																																																						tam ***- yên ***- bắc ***\r\n											\r\n											\r\n											\r\n											\r\n											\r\n											\r\n											\r\n											\r\n					', '0857812113', 'user_61e038be47eca2.633353801642084542'),
(11, 'Nguyễn Xuân Hoàng', 'xhoang05091@gmail.com', '1', '1640404667.png', '', '', ''),
(14, '', '', '', '', '', '', ''),
(15, 'Hoang Nguyen Xuan', 'xhoang05092@gmail.com', '1', '', '', '', ''),
(17, 'Tran Huy Tien', 'tien@gmail.com', '1', '1642127195.jpg', 'bac giang								\r\n											\r\n											\r\n						\r\n					', '0123 456 789', 'user_61e0d37d7ccc73.524096891642124157');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` char(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `name`, `photo`, `address`, `phone`) VALUES
(5, 'Apple', '1640517537.png', 'USA new', '0857812113'),
(10, 'Sam Sung', '1640514208.png', 'Hàn quốc', '0857812113');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `name_receiver` text NOT NULL,
  `phone_receiver` text NOT NULL,
  `address_receiver` text NOT NULL,
  `notes` text NOT NULL,
  `status` int(11) NOT NULL,
  `total_price` float NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `name_receiver`, `phone_receiver`, `address_receiver`, `notes`, `status`, `total_price`, `created_at`) VALUES
(3, 17, 'Tran Huy Tien', '0678', '																																																																																																																																																																																																\r\n		bac giang									\r\n											\r\n											\r\n											\r\n', '', 0, 400000, '2022-01-14'),
(4, 17, 'Tran Huy Tien', '0678', '																																																																																																																																																																																																\r\n		bac giang									\r\n											\r\n											\r\n											\r\n', '', 0, 400000, '2022-01-14'),
(5, 17, 'Tran Huy Tien', '0678', '																																																																																																																																																																																																\r\n		bac giang									\r\n											\r\n											\r\n											\r\n', '', 0, 400000, '2022-01-14'),
(6, 17, 'Tran Huy Tien', '0678', '																																																																																																																																																																																																\r\n		bac giang									\r\n											\r\n											\r\n											\r\n', '', 0, 400000, '2022-01-14'),
(7, 17, 'Tran Huy Tien', '0678', '																																																																																																																																																																																																\r\n		bac giang									\r\n											\r\n											\r\n											\r\n', '', 0, 400000, '2022-01-14'),
(8, 17, 'Tran Huy Tien', '0123 456 789', 'bac giang									\r\n											\r\n											\r\n											\r\n						\r\n					', '', 0, 5400000, '2022-01-14');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`order_id`, `product_id`, `quantity`) VALUES
(5, 4, 1),
(6, 4, 1),
(7, 4, 1),
(8, 3, 1),
(8, 4, 1),
(8, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` char(50) NOT NULL,
  `price` float NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `photo`, `price`, `description`, `quantity`, `manufacturer_id`, `type`) VALUES
(3, 'iphone 13 pro max', '1640512498.png', 4000000, 'iphone pro max', 40, 5, 'điện thoại'),
(4, 'sam sung s21 ultra new', '1640512731.jpg', 400000, 'dien thoai', 40, 10, 'dien thoai'),
(6, 'Xiao Mi mi11 5G', '1640830102.png', 1000000, 'Hang trung quoc', 40, 5, 'điện thoại'),
(7, 'Táo thật', '1640830520.jpg', 1000000, '                            \r\n             hoa quả rất ngon       ', 10, 5, 'hoa quả'),
(9, 'Tết 2022', '1642154609.jpg', 40, '                                                                                                                                                                            \r\n       tết sum vầy                                     \r\n                        ', 200, 5, 'Lễ hội'),
(10, 'iphone sx max', '1642151972.jpg', 24.99, '                            \r\n        iphone my            ', 20, 5, 'điện thoại');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manufacturer_id` (`manufacturer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
