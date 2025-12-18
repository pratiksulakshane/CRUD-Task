-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2025 at 12:58 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud-task`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `category`, `created_at`) VALUES
(1, 'Mixer', 2000.00, 'electronics', '2025-12-18 05:06:36'),
(2, 'One Plus Nord CE', 30000.00, 'phones', '2025-12-18 05:07:07'),
(3, 'AC', 20000.00, 'electronics', '2025-12-18 05:07:40'),
(4, 'Washing Manchine', 10000.00, 'electronics', '2025-12-18 11:23:47'),
(5, 'I phone 17', 70000.00, 'phones', '2025-12-18 11:24:54'),
(6, 'Laptop', 55000.00, 'Electronics', '2025-12-18 11:27:50'),
(7, 'Mobile Phone', 18000.00, 'Electronics', '2025-12-18 11:25:24'),
(8, 'Headphones', 2500.00, 'Electronics', '2025-12-18 11:26:40'),
(12, 'Office Chair', 4500.00, 'Furniture', '2025-12-18 11:27:30'),
(13, 'Study Table', 7000.00, 'Furniture', '2025-12-18 11:27:50'),
(14, 'Pen Pack', 120.00, 'Stationery', '2025-12-18 11:28:10'),
(15, 'Notebook', 90.00, 'Stationery', '2025-12-18 11:28:20'),
(16, 'Water Bottle', 350.00, 'Accessories', '2025-12-18 11:28:59'),
(17, 'Backpack', 1800.00, 'Accessories', '2025-12-18 11:29:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
