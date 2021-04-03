-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2021 at 10:39 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product_catalog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`) VALUES
(1, NULL, 'Category 1'),
(2, NULL, 'Category 2'),
(3, NULL, 'Category 3'),
(4, NULL, 'Category 4'),
(5, NULL, 'Category 5'),
(6, NULL, 'Category 6'),
(7, NULL, 'Category 7'),
(8, NULL, 'Category 8'),
(9, NULL, 'Category 9'),
(10, NULL, 'Category 10'),
(11, 1, 'Category 11'),
(12, 2, 'Category 12'),
(13, 3, 'Category 13'),
(14, 4, 'Category 14'),
(15, 5, 'Category 15'),
(16, 11, 'Category 16'),
(17, 12, 'Category 17'),
(18, 13, 'Category 18'),
(19, 14, 'Category 19'),
(20, 15, 'Category 20'),
(21, 20, 'Category 21');

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `product_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `amount_in_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`product_id`, `warehouse_id`, `amount_in_stock`) VALUES
(2, 1, 12),
(3, 2, 21),
(4, 3, 65),
(5, 5, 6),
(6, 5, 123),
(7, 8, 23),
(8, 3, 10),
(9, 3, 87),
(10, 2, 1),
(11, 10, 1),
(1, 1, 1),
(2, 6, 2),
(3, 7, 1),
(4, 9, 6),
(1, 4, 15);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `category_id`, `created_at`) VALUES
(1, 'product 1', 'description 1', 1200, 1, '2021-04-01 16:16:30'),
(2, 'product 2', 'description 2', 1000, 2, '2021-04-01 16:16:30'),
(3, 'product 3', 'description 3', 1200, 3, '2021-04-01 16:16:30'),
(4, 'product 4', 'description 4', 1600, 4, '2021-04-01 16:16:30'),
(5, 'product 5', 'description 5', 13400, 5, '2021-04-01 16:16:30'),
(6, 'product 6', 'description 6', 232100, 6, '2021-04-01 16:16:30'),
(7, 'product 7', 'description 7', 26100, 7, '2021-04-01 16:16:30'),
(8, 'product 8', 'description 8', 664100, 8, '2021-04-01 16:16:30'),
(9, 'product 9', 'description 9', 234100, 9, '2021-04-01 16:16:30'),
(10, 'product 10', 'description 10', 23100, 10, '2021-04-01 16:16:30'),
(11, 'product 11', 'description 11', 1200, 11, '2021-04-01 16:16:30'),
(12, 'product 12', 'description 12', 1000, 12, '2021-04-01 16:16:30'),
(13, 'product 13', 'description 13', 1200, 13, '2021-04-01 16:16:30'),
(14, 'product 14', 'description 14', 1600, 14, '2021-04-01 16:16:30'),
(15, 'product 15', 'description 15', 13400, 15, '2021-04-01 16:16:30'),
(16, 'product 16', 'description 16', 232100, 16, '2021-04-01 16:16:30'),
(17, 'product 17', 'description 17', 26100, 17, '2021-04-01 16:16:30'),
(18, 'product 18', 'description 18', 664100, 18, '2021-04-01 16:16:30'),
(19, 'product 19', 'description 19', 234100, 19, '2021-04-01 16:16:30'),
(20, 'product 20', 'description 20', 23100, 1, '2021-04-01 16:16:30'),
(21, 'product 21', 'description 21', 1200, 2, '2021-04-01 16:16:30'),
(22, 'product 22', 'description 22', 1000, 3, '2021-04-01 16:16:30'),
(23, 'product 23', 'description 23', 1200, 4, '2021-04-01 16:16:30'),
(24, 'product 24', 'description 24', 1600, 5, '2021-04-01 16:16:30'),
(25, 'product 25', 'description 25', 13400, 21, '2021-04-01 16:16:30'),
(26, 'product 26', 'description 26', 232100, 1, '2021-04-01 16:16:30'),
(27, 'product 27', 'description 27', 26100, 1, '2021-04-01 16:16:30'),
(28, 'product 28', 'description 28', 664100, 1, '2021-04-01 16:16:30'),
(29, 'product 29', 'description 29', 234100, 1, '2021-04-01 16:16:30'),
(30, 'product 30', 'description 30', 23100, 1, '2021-04-01 16:16:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'Roary Villarreal', 'xefaqube@mailinator.com', '$2y$10$ht0px5kKRS7uttVoo9oTpOR9FoUbkSuyi6k9mrX14ZCY8b0h8bb66', '2021-04-01 12:31:05'),
(2, 'Shoshana Nguyen', 'rejebunit@mailinator.com', '$2y$10$H/za9Q9Nvz/cRID/ucbsSeVTUN5QcpOJbQEk36OdptIveLIGH1x/u', '2021-04-01 12:31:30'),
(3, 'Sierra Marquez', 'giqac@mailinator.com', '$2y$10$soZV7bE3udMZVnE00Ukw6OYWl9OjZy5tnlgNtBHxq2M/xQpBfeCcm', '2021-04-01 14:33:19'),
(4, 'Axel Franco', 'bapopoduly@mailinator.com', '$2y$10$MO1JdxaR0yOy3uOYLe3j1O5e1hTkDvmpsTpJrSJjUoTTd7z9m3YKS', '2021-04-01 14:34:07'),
(6, 'lkjkl', 'test@test.com', '$2y$10$S4w1bDeCqJdbjyxSD/52QeLzGlUlIuhc453wfu1fn7ncApPKvg.UW', '2021-04-01 14:37:55'),
(7, 'Eric Wells', 'polexed@mailinator.com', '$2y$10$FQAPmYjKAwOkSk8heXElXudBXiGoMmxyeb3NTcgYTaJVAIBShr1jy', '2021-04-01 15:08:33'),
(8, 'name1', 'example@test.com', '$2y$10$GWzJpn2eHK6mwJoHbh.WReJ8PwbRgccmpD.IrXeK6BpkpRmfpBJSS', '2021-04-03 10:03:09'),
(9, 'new name', 'newtest@test.com', '$2y$10$/05miRdA21GTLNnCYUvFr.tgh5ZzOPoSopw86/KaZW88f1Ru5OFUm', '2021-04-03 10:08:52'),
(10, 'newest user name', 'newest@test.com', '$2y$10$QseFNqzPk.PfuYD/KL0JRuDHmikSgsdE1e8MHsfgmI1PQs0m2ZS0u', '2021-04-03 11:38:21');

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `id` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `address`, `phone`) VALUES
(1, 'address 1', '12345'),
(2, 'address 2', '12345'),
(3, 'address 3', '12345'),
(4, 'address 4', '12345'),
(5, 'address 5', '12345'),
(6, 'address 6', '12345'),
(7, 'address 7', '12345'),
(8, 'address 8', '12345'),
(9, 'address 9', '12345'),
(10, 'address 10', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_name` (`name`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD KEY `warehouse_id` (`warehouse_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_name` (`name`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_email` (`email`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warehouse_phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventories`
--
ALTER TABLE `inventories`
  ADD CONSTRAINT `inventories_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inventories_ibfk_2` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
