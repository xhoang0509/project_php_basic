-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2022 at 05:29 AM
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
(1, 'Nguyễn Xuân Hoàng', 'xhoang0509@gmail.com', '1', '1642813322.jpg', 'khong co dia chi 123																																																																																												', '0857812113', 'user_61ebb9e9398564.017788371642838505'),
(11, 'Nguyễn Xuân Hoàng', 'xhoang05091@gmail.com', '1', '1640404667.png', '', '', ''),
(14, '', '', '', '', '', '', ''),
(15, 'Hoang Nguyen Xuan', 'xhoang05092@gmail.com', '1', '', '', '', ''),
(17, 'Tran Huy Tien', 'tien@gmail.com', '1', '1642127195.jpg', 'bac giang								\r\n											\r\n											\r\n						\r\n					', '0123 456 789', 'user_61e0d37d7ccc73.524096891642124157'),
(18, 'test', 'x@gmail.com', '1', '', 'viet nam', '012', ''),
(20, 'a', 'a', 'a', '', '', 'a', ''),
(21, '1', '1', '1', '', '', '1', ''),
(22, 'Nguyễn Văn Hùng', 'hung@gmail.com', '1', '1643102323.jpg', 'Ứng hòa - Hà Nội', '0123', 'user_61efbe0ad2ba11.083175191643101706'),
(23, 'Tạ Văn Điệu', 'tavandieu@gmail.com', '1', '1643102566.jpg', 'Giao Thủy - Nam Định', '0123', '');

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `name_receiver`, `phone_receiver`, `address_receiver`, `notes`, `status`, `total_price`, `created_at`) VALUES
(3, 17, 'Tran Huy Tien', '0678', '																																																																																																																																																																																																\r\n		bac giang									\r\n											\r\n											\r\n											\r\n', '', 1, 400000, '2022-01-13 17:00:00'),
(4, 17, 'Tran Huy Tien', '0678', '																																																																																																																																																																																																\r\n		bac giang									\r\n											\r\n											\r\n											\r\n', '', 1, 400000, '2022-01-13 17:00:00'),
(5, 17, 'Tran Huy Tien', '0678', '																																																																																																																																																																																																\r\n		bac giang									\r\n											\r\n											\r\n											\r\n', '', 1, 400000, '2022-01-13 17:00:00'),
(6, 17, 'Tran Huy Tien', '0678', '																																																																																																																																																																																																\r\n		bac giang									\r\n											\r\n											\r\n											\r\n', '', 1, 400000, '2022-01-13 17:00:00'),
(7, 17, 'Tran Huy Tien', '0678', '																																																																																																																																																																																																\r\n		bac giang									\r\n											\r\n											\r\n											\r\n', '', -1, 400000, '2022-01-13 17:00:00'),
(8, 17, 'Tran Huy Tien', '0123 456 789', 'bac giang									\r\n											\r\n											\r\n											\r\n						\r\n					', '', -1, 5400000, '2022-01-13 17:00:00'),
(9, 1, 'Nguyễn Xuân Hoàng', '0857812113', '																																																						tam ***- yên ***- bắc ***\n											\n											\n											\n											\n											\n											\n											\n											\n					', 'xuan hoang', -1, 0, '2022-01-21 17:00:00'),
(10, 0, 'Nguyễn Xuân Hoàng', '0857812113', 'khong co dia chi 123																																																																																												', 'aaa', 0, 0, '2022-01-21 17:00:00'),
(11, 0, 'Nguyễn Xuân Hoàng', '0857812113', 'khong co dia chi 123																																																																																												', '', 0, 0, '2022-01-21 17:00:00'),
(12, 0, 'Nguyễn Xuân Hoàng', '0857812113', 'khong co dia chi 123																																																																																												', '', 0, 0, '2022-01-21 17:00:00'),
(13, 1, 'Nguyễn Xuân Hoàng', '0857812113', 'khong co dia chi 123																																																																																												', '', -1, 0, '2022-01-21 17:00:00'),
(14, 1, 'Nguyễn Xuân Hoàng', '0857812113', 'khong co dia chi 123																																																																																												', '', -1, 2000000, '2022-01-21 17:00:00'),
(15, 1, 'Nguyễn Xuân Hoàng', '0857812113', 'khong co dia chi 123																																																																																												', '', -1, 2000000, '2022-01-21 17:00:00'),
(16, 1, 'Nguyễn Xuân Hoàng', '0857812113', 'khong co dia chi 123																																																																																												', '', -1, 1400000, '2022-01-21 17:00:00'),
(17, 18, 'test', '012', 'xuan hoang', '', -1, 1400000, '2022-01-21 17:00:00'),
(19, 18, 'test', '012', 'viet nam', '', -1, 1200000, '2022-01-21 17:00:00'),
(20, 18, 'test', '012', 'viet nam', '', -1, 4400000, '2022-01-21 17:00:00'),
(26, 1, 'Nguyễn Xuân Hoàng', '0857812113', 'khong co dia chi 123																																																																																												', '', -1, 400000, '2022-01-21 17:00:00'),
(27, 1, 'Nguyễn Xuân Hoàng', '0857812113', 'khong co dia chi 123																																																																																												', '', -1, 1400000, '2022-01-21 17:00:00'),
(28, 1, 'Nguyễn Xuân Hoàng', '0857812113', 'khong co dia chi 123																																																																																												', '', -1, 400000, '2022-01-21 17:00:00'),
(29, 1, 'Nguyễn Xuân Hoàng', '0857812113', 'khong co dia chi 123																																																																																												', '', -1, 4000000, '2022-01-21 17:00:00'),
(30, 1, 'Nguyễn Xuân Hoàng', '0857812113', 'khong co dia chi 123																																																																																												', '', -1, 1000000, '2022-01-21 17:00:00'),
(31, 1, 'Nguyễn Xuân Hoàng', '0857812113', 'khong co dia chi 123																																																																																												', '', -1, 400000, '2022-01-21 17:00:00'),
(32, 1, 'Nguyễn Xuân Hoàng', '0857812113', 'khong co dia chi 123																																																																																												', '', 1, 400000, '2022-01-21 17:00:00'),
(33, 1, 'Nguyễn Xuân Hoàng', '0857812113', 'khong co dia chi 123																																																																																												', '', 1, 1000000, '2022-01-21 17:00:00'),
(34, 1, 'Nguyễn Xuân Hoàng', '0857812113', 'khong co dia chi 123																																																																																												', '', 1, 1000000, '2022-01-21 17:00:00'),
(35, 1, 'Nguyễn Xuân Hoàng', '0857812113', 'khong co dia chi 123																																																																																												', '', 0, 10600000, '2022-01-25 08:31:08'),
(36, 23, 'Tạ Văn Điệu', '0123', 'Giao Thủy - Nam Định', '', 1, 6400000, '2022-01-25 09:23:04');

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
(8, 6, 1),
(9, 3, 4),
(10, 4, 6),
(10, 6, 12),
(11, 6, 1),
(11, 7, 1),
(15, 7, 1),
(15, 6, 1),
(16, 6, 1),
(16, 4, 1),
(17, 6, 1),
(17, 4, 1),
(18, 9, 1),
(19, 4, 4),
(20, 4, 1),
(20, 3, 1),
(21, 7, 1),
(22, 3, 1),
(23, 4, 1),
(24, 4, 1),
(25, 4, 1),
(26, 4, 1),
(27, 4, 1),
(27, 6, 1),
(28, 4, 1),
(29, 3, 1),
(30, 6, 1),
(31, 4, 1),
(32, 4, 1),
(33, 7, 1),
(34, 6, 1),
(35, 3, 2),
(35, 4, 4),
(35, 7, 1),
(36, 3, 1),
(36, 4, 1),
(36, 6, 1),
(36, 7, 1);

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
(10, 'iphone sx max', '1642151972.jpg', 24.99, '                            \r\n        iphone my            ', 20, 5, 'điện thoại'),
(11, 'Nokia C2 01', '1643251496.jpg', 2000000, 'Điện thoại có phím bấm                            \r\n                    ', 1000, 10, 'Điện thoại');

-- --------------------------------------------------------

--
-- Table structure for table `product_rating`
--

CREATE TABLE `product_rating` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `rating` float NOT NULL,
  `comment` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_rating`
--

INSERT INTO `product_rating` (`id`, `product_id`, `customer_id`, `rating`, `comment`) VALUES
(1, 4, 1, 3.5, 'good'),
(2, 4, 1, 4.5, 'bad'),
(4, 4, 1, 4.5, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. '),
(5, 7, 1, 3, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accomp'),
(6, 7, 1, 3, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accomp'),
(7, 7, 1, 2.5, 'tét'),
(8, 7, 1, 2.5, 'a'),
(9, 7, 1, 3, 'a'),
(10, 7, 1, 3, 'a'),
(11, 7, 1, 3, 'a'),
(12, 7, 1, 3, 'a'),
(13, 7, 1, 3, 'a'),
(14, 7, 1, 3, 'a'),
(15, 7, 1, 3, 'a'),
(16, 7, 1, 4.5, 'tet'),
(17, 3, 1, 5, 'test tiep'),
(18, 10, 23, 5, 'Sau khi sử dụng sản phẩm được 1 tháng tôi thấy rất hài lòng. Vote cho shop 5 sao vì sự nhiệt tình <3.'),
(19, 7, 23, 5, 'len sao'),
(20, 11, 23, 4.5, 'danh gia xem dc bao nhieu'),
(21, 11, 23, 1, 'test tiep ');

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
-- Indexes for table `product_rating`
--
ALTER TABLE `product_rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_rating`
--
ALTER TABLE `product_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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

--
-- Constraints for table `product_rating`
--
ALTER TABLE `product_rating`
  ADD CONSTRAINT `product_rating_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `product_rating_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
