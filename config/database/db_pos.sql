-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2025 at 04:47 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=hidden;1=visible;\r\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `description`, `status`) VALUES
(1, 'Soft Drinks', 'Soft Drinks', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `contact`, `email`) VALUES
(1, 'john Doe', '09123456789', 'johndoe@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `track_no` varchar(255) NOT NULL,
  `order_date` date NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `inv_no` varchar(255) NOT NULL,
  `mode` tinyint(4) NOT NULL,
  `total` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `track_no`, `order_date`, `order_status`, `inv_no`, `mode`, `total`, `date`) VALUES
(1, '-1', '18921', '2025-03-27', 'booked', '2772097937', 0, '160', '2025-03-27'),
(2, '-1', '772155', '2025-03-27', 'booked', '4648506020', 0, '160', '2025-03-27'),
(3, '-1', '355454', '2025-03-29', 'booked', '7686781974', 0, '32', '2025-03-29'),
(4, '-1', '386235', '2025-03-29', 'booked', '7686781974', 0, '32', '2025-03-29');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` text NOT NULL,
  `product_id` text NOT NULL,
  `product_qty` text NOT NULL,
  `product_price` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `product_qty`, `product_price`, `date`) VALUES
(1, '1', '2', '2', '32', '2025-03-27'),
(2, '1', '3', '3', '32', '2025-03-27'),
(3, '2', '2', '5', '32', '2025-03-27'),
(4, '1', '1', '3', '32', '2025-03-27'),
(5, '3', '1', '1', '32', '2025-03-29'),
(6, '4', '1', '1', '32', '2025-03-29');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `category_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `description`, `category_id`, `supplier_id`, `created_at`, `image`) VALUES
(1, 'Coke 1L', 'Coke 1L', 1, 1, '2025-03-27', ''),
(2, 'Coke 1.50', 'Coke 1.5', 1, 2, '2025-03-26', ''),
(3, 'Coke 1.5', 'Coke 1.5', 1, 1, '2025-03-27', '');

-- --------------------------------------------------------

--
-- Table structure for table `product_batches`
--

CREATE TABLE `product_batches` (
  `id` int(11) NOT NULL,
  `product_id` varchar(11) NOT NULL,
  `supplier_id` varchar(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `quantity_in_stock` int(11) NOT NULL,
  `barcode` text NOT NULL,
  `batch_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_batches`
--

INSERT INTO `product_batches` (`id`, `product_id`, `supplier_id`, `price`, `quantity_in_stock`, `barcode`, `batch_date`) VALUES
(1, '1', '1', 32, 498, '4801981116072', '2025-03-26'),
(2, '2', '2', 32, 1001, '4801981116072', '2025-03-26'),
(3, '3', '1', 32, 1505, '4801981116072', '2025-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_name`, `contact_person`, `phone`, `email`) VALUES
(1, 'Coca-cola', 'John Doe', '09123456789', 'john@gmail.com'),
(2, 'Test', 'test', '12345678909', 'test@test.com');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `quantity` text NOT NULL,
  `status` varchar(100) NOT NULL COMMENT '0=sold\r\n1=Defective\r\n2=Expire\r\n3=Damaged\r\n''''=in_stock',
  `type` tinyint(4) DEFAULT 0 COMMENT '0=in;1=out\r\n',
  `product_return` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=false,1=true\r\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `product_id`, `date`, `quantity`, `status`, `type`, `product_return`) VALUES
(1, '2', '2025-03-27', '2', '0', 1, 0),
(2, '3', '2025-03-27', '3', '0', 1, 0),
(3, '2', '2025-03-27', '5', '0', 1, 0),
(4, '1', '2025-03-27', '3', '0', 1, 0),
(5, '3', '2025-03-27', '3', '', 0, 0),
(8, '3', '2025-03-27', '1', '', 0, 0),
(9, '2', '2025-03-27', '1', '', 0, 0),
(10, '3', '2025-03-27', '1', '', 0, 0),
(11, '3', '2025-03-27', '1', '', 0, 0),
(15, '1', '2025-03-29', '1', '0', 1, 0),
(16, '1', '2025-03-29', '1', '0', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `position` varchar(255) NOT NULL,
  `reset_token` text DEFAULT NULL,
  `reset_expires` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=inactive; 1=active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `middle_name`, `last_name`, `email`, `password`, `position`, `reset_token`, `reset_expires`, `status`) VALUES
(1, 'Marc Crisald', 'Peru', 'Cancio', 'mcancio1997@gmail.com', '2fa9f590706f4926a7b68debfd9ec92371f12f3c5b8d889818dad57b9b78d3ed', 'admin', '4f3532b83bc8d8aefe5b586bb487dc9eb6f2cccab4e0c0b68b51f7a2d0a31639', '2025-03-31 09:22:09', 1),
(16, 'Jenny', 'Doe', 'Doe', 'jennydoe@gmail.com', 'e57cf03df92dfb670e7331981bf95aa6b5bf9f04311297ea0c18e930b5a9eb06', 'admin', '', '', 1),
(21, 'sad', 'asd', 'asd', 'as@asda', 'b9971dceb2ef21f9a748546fa632e3399774ccbeee563f9324b455c0a29b6812', 'admin', NULL, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_batches`
--
ALTER TABLE `product_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_batches`
--
ALTER TABLE `product_batches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
