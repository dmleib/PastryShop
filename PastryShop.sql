-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 07, 2024 at 01:15 AM
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
-- Database: `PastryShop`
--
CREATE DATABASE IF NOT EXISTS `PastryShop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `PastryShop`;

-- --------------------------------------------------------

--
-- Table structure for table `Categories`
--

CREATE TABLE `Categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Categories`
--

INSERT INTO `Categories` (`category_id`, `category_name`) VALUES
(5, 'Brownies'),
(1, 'Cakes'),
(2, 'Cookies'),
(3, 'Muffins'),
(4, 'Pastries'),
(6, 'Cupcakes'),
(7, 'Pies'),
(8, 'Tarts'),
(9, 'Croissants'),
(10, 'Donuts');

-- --------------------------------------------------------

--
-- Table structure for table `InventoryLog`
--

CREATE TABLE `InventoryLog` (
  `log_id` int(11) NOT NULL,
  `pastry_id` int(11) DEFAULT NULL,
  `change_quantity` int(11) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `InventoryLog`
--

INSERT INTO `InventoryLog` (`log_id`, `pastry_id`, `change_quantity`, `reason`, `date_updated`) VALUES
(1, 1, -5, 'Sold to customer', '2024-11-07 00:10:16'),
(2, 2, -3, 'Sold to customer', '2024-11-07 00:10:16'),
(3, 3, -2, 'Sold to customer', '2024-11-07 00:10:16'),
(4, 4, -1, 'Sold to customer', '2024-11-07 00:10:16'),
(5, 5, -1, 'Sold to customer', '2024-11-07 00:10:16'),
(6, 6, 10, 'New stock', '2024-11-07 00:10:16'),
(7, 7, 15, 'New stock', '2024-11-07 00:10:16'),
(8, 8, -5, 'Sold to customer', '2024-11-07 00:10:16'),
(9, 9, -10, 'Sold to customer', '2024-11-07 00:10:16'),
(10, 10, 20, 'New stock', '2024-11-07 00:10:16');

-- --------------------------------------------------------

--
-- Table structure for table `Pastries`
--

CREATE TABLE `Pastries` (
  `pastry_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `availability` tinyint(1) DEFAULT 1,
  `image_url` varchar(255) DEFAULT NULL,
  `stock_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Pastries`
--

INSERT INTO `Pastries` (`pastry_id`, `name`, `description`, `price`, `category_id`, `availability`, `image_url`, `stock_quantity`) VALUES
(1, 'Chocolate Cake', 'A rich and moist chocolate cake.', 15.00, 1, 1, NULL, 20),
(2, 'Sugar Cookies', 'Sweet vanilla cookies with sugar sprinkles.', 5.00, 2, 1, NULL, 50),
(3, 'Blueberry Muffin', 'Soft and fluffy muffins with fresh blueberries.', 4.50, 3, 1, NULL, 30),
(4, 'Cheese Danish', 'Flaky pastry filled with cream cheese.', 3.50, 4, 1, NULL, 25),
(5, 'Brownie', 'Chocolate brownie with a fudge center.', 6.00, 5, 1, NULL, 10),
(6, 'Chocolate Cupcake', 'Fluppy chocolate cupcake with buttercream frosting.', 3.50, 6, 1, NULL, 50),
(7, 'Apple Pie', 'Classic apple pie with a flaky crust.', 8.00, 7, 1, NULL, 10),
(8, 'Lemon Tart', 'Tart with a smooth lemon filling.', 3.50, 8, 1, NULL, 15),
(9, 'Butter Croissant', 'Golden-brown croissant.', 2.50, 9, 1, NULL, 20),
(10, 'Glazed Donut', 'Classing donut with a sweet glaze.', 1.50, 10, 1, NULL, 30);

-- --------------------------------------------------------

--
-- Table structure for table `ShoppingCart`
--

CREATE TABLE `ShoppingCart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `pastry_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL CHECK (`quantity` > 0),
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ShoppingCart`
--

INSERT INTO `ShoppingCart` (`cart_id`, `user_id`, `pastry_id`, `quantity`, `date_added`) VALUES
(1, 2, 1, 2, '2024-11-07 00:10:16'),
(2, 3, 2, 3, '2024-11-07 00:10:16'),
(3, 4, 3, 1, '2024-11-07 00:10:16'),
(4, 5, 4, 2, '2024-11-07 00:10:16'),
(5, 2, 5, 1, '2024-11-07 00:10:16'),
(6, 6, 6, 2, '2024-11-07 00:10:16'),
(7, 7, 7, 1, '2024-11-07 00:10:16'),
(8, 8, 8, 5, '2024-11-07 00:10:16'),
(9, 9, 9, 4, '2024-11-07 00:10:16'),
(10, 10, 10, 12, '2024-11-07 00:10:16');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` enum('admin','customer') DEFAULT 'customer',
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`user_id`, `username`, `password_hash`, `email`, `role`, `first_name`, `last_name`, `date_created`) VALUES
(1, 'admin_user', 'info211', 'admin@example.com', 'admin', 'Admin', 'User', '2024-11-07 00:10:16'),
(2, 'customer1', 'hashedpassword2', 'customer1@example.com', 'customer', 'John', 'Doe', '2024-11-07 00:10:16'),
(3, 'customer2', 'hashedpassword3', 'customer2@example.com', 'customer', 'Jane', 'Doe', '2024-11-07 00:10:16'),
(4, 'customer3', 'hashedpassword4', 'customer3@example.com', 'customer', 'Michael', 'Smith', '2024-11-07 00:10:16'),
(5, 'customer4', 'hashedpassword5', 'customer4@example.com', 'customer', 'Sarah', 'Johnson', '2024-11-07 00:10:16'),
(6, 'customer5', 'hashedpassword6', 'customer5@example.com', 'customer', 'Kate', 'Smith', '2024-11-07 00:10:16'),
(7, 'customer6', 'hashedpassword7', 'customer6@example.com', 'customer', 'Mario', 'Hernandez', '2024-11-07 00:10:16'),
(8, 'customer7', 'hashedpassword8', 'customer7@example.com', 'customer', 'George', 'Lopez', '2024-11-07 00:10:16'),
(9, 'customer8', 'hashedpassword9', 'customer8@example.com', 'customer', 'Andrew', 'Anderson', '2024-11-07 00:10:16'),
(10, 'customer9', 'hashedpassword10', 'customer9@example.com', 'customer', 'Mark', 'Hall', '2024-11-07 00:10:16');



--
-- Indexes for dumped tables
--

--
-- Indexes for table `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `InventoryLog`
--
ALTER TABLE `InventoryLog`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `pastry_id` (`pastry_id`);

--
-- Indexes for table `Pastries`
--
ALTER TABLE `Pastries`
  ADD PRIMARY KEY (`pastry_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `ShoppingCart`
--
ALTER TABLE `ShoppingCart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `pastry_id` (`pastry_id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Categories`
--
ALTER TABLE `Categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `InventoryLog`
--
ALTER TABLE `InventoryLog`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Pastries`
--
ALTER TABLE `Pastries`
  MODIFY `pastry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ShoppingCart`
--
ALTER TABLE `ShoppingCart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `InventoryLog`
--
ALTER TABLE `InventoryLog`
  ADD CONSTRAINT `inventorylog_ibfk_1` FOREIGN KEY (`pastry_id`) REFERENCES `Pastries` (`pastry_id`);

--
-- Constraints for table `Pastries`
--
ALTER TABLE `Pastries`
  ADD CONSTRAINT `pastries_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `Categories` (`category_id`);

--
-- Constraints for table `ShoppingCart`
--
ALTER TABLE `ShoppingCart`
  ADD CONSTRAINT `shoppingcart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`),
  ADD CONSTRAINT `shoppingcart_ibfk_2` FOREIGN KEY (`pastry_id`) REFERENCES `Pastries` (`pastry_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
