-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 20, 2024 at 02:09 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pastryshop`
--
CREATE DATABASE IF NOT EXISTS `pastryshop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pastryshop`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `categories`:
--

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Cakes'),
(2, 'Cookies'),
(3, 'Muffins'),
(4, 'Pastries'),
(5, 'Brownies'),
(6, 'Cupcakes'),
(7, 'Pies'),
(8, 'Tarts'),
(9, 'Croissants'),
(10, 'Donuts');


-- --------------------------------------------------------

--
-- Table structure for table `inventory_log`
--

DROP TABLE IF EXISTS `inventory_log`;
CREATE TABLE `inventory_log` (
  `log_id` int(11) NOT NULL,
  `pastry_id` int(11) NOT NULL,
  `change_quantity` int(11) NOT NULL,
  `reason` varchar(50) NOT NULL,
  `time_updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `inventory_log`:
--   `pastry_id`
--       `pastries` -> `pastry_id`
--

--
-- Dumping data for table `inventory_log`
--

INSERT INTO `inventory_log` (`log_id`, `pastry_id`, `change_quantity`, `reason`, `time_updated`) VALUES
(1, 1, -5, 'Sold', '2024-11-07 05:10:16'),
(2, 2, -3, 'Sold', '2024-11-07 05:10:16'),
(3, 3, -2, 'Sold', '2024-11-07 05:10:16'),
(4, 4, -1, 'Sold', '2024-11-07 05:10:16'),
(5, 5, -1, 'Sold', '2024-11-07 05:10:16'),
(6, 6, 10, 'New stock', '2024-11-07 05:10:16'),
(7, 7, 15, 'New stock', '2024-11-07 05:10:16'),
(8, 8, -5, 'Sold', '2024-11-07 05:10:16'),
(9, 9, -10, 'Sold', '2024-11-07 05:10:16'),
(10, 10, 20, 'New stock', '2024-11-07 05:10:16');

-- --------------------------------------------------------

--
-- Table structure for table `pastries`
--

DROP TABLE IF EXISTS `pastries`;
CREATE TABLE `pastries` (
  `pastry_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `in_menu` tinyint(1) DEFAULT 1,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `pastries`:
--   `category_id`
--       `categories` -> `category_id`
--

--
-- Dumping data for table `pastries`
--

INSERT INTO `pastries` (`pastry_id`, `name`, `description`, `price`, `category_id`, `in_menu`, `image_path`) VALUES
(1, 'Chocolate Cake', 'A rich and moist chocolate cake.', 15.00, 1, 1, 'chocolate_cake.jpg'),
(2, 'Sugar Cookies', 'Sweet vanilla cookies with sugar sprinkles.', 5.00, 2, 1, 'sugar_cookies.jpg'),
(3, 'Blueberry Muffin', 'Soft and fluffy muffins with fresh blueberries.', 4.50, 3, 1, 'blueberry_muffin.jpg'),
(4, 'Cheese Danish', 'Flaky pastry filled with cream cheese.', 3.50, 4, 1, 'cheese_danish.jpg'),
(5, 'Brownie', 'Chocolate brownie with a fudge center.', 6.00, 5, 1, 'brownie.jpg'),
(6, 'Chocolate Cupcake', 'Fluffy chocolate cupcake with buttercream frosting.', 3.50, 6, 1, 'chocolate_cupcake.jpg'),
(7, 'Apple Pie', 'Classic apple pie with a flaky crust.', 8.00, 7, 1, 'apple_pie.jpg'),
(8, 'Lemon Tart', 'Tart with a smooth lemon filling.', 3.50, 8, 1, 'lemon_tart.jpg'),
(9, 'Butter Croissant', 'Golden-brown croissant.', 2.50, 9, 1, 'butter_croissant.jpg'),
(10, 'Glazed Donut', 'Classic donut with a sweet glaze.', 1.50, 10, 1, 'glazed_donut.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` enum('admin','employee','customer') DEFAULT 'customer',
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `users`:
--

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password_hash`, `email`, `role`, `first_name`, `last_name`, `date_created`) VALUES
(1, 'admin_user', 'info211', 'admin@example.com', 'admin', 'Admin', 'User', '2024-11-07 05:10:16'),
(2, 'customer1', 'hashedpassword2', 'customer1@example.com', 'customer', 'John', 'Doe', '2024-11-07 05:10:16'),
(3, 'customer2', 'hashedpassword3', 'customer2@example.com', 'customer', 'Jane', 'Doe', '2024-11-07 05:10:16'),
(4, 'customer3', 'hashedpassword4', 'customer3@example.com', 'customer', 'Michael', 'Smith', '2024-11-07 05:10:16'),
(5, 'customer4', 'hashedpassword5', 'customer4@example.com', 'customer', 'Sarah', 'Johnson', '2024-11-07 05:10:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `inventory_log`
--
ALTER TABLE `inventory_log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `pastry_id` (`pastry_id`);

--
-- Indexes for table `pastries`
--
ALTER TABLE `pastries`
  ADD PRIMARY KEY (`pastry_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `inventory_log`
--
ALTER TABLE `inventory_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pastries`
--
ALTER TABLE `pastries`
  MODIFY `pastry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory_log`
--
ALTER TABLE `inventory_log`
  ADD CONSTRAINT `inventorylog_ibfk_1` FOREIGN KEY (`pastry_id`) REFERENCES `pastries` (`pastry_id`);

--
-- Constraints for table `pastries`
--
ALTER TABLE `pastries`
  ADD CONSTRAINT `pastries_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
