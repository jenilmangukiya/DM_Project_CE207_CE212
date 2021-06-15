-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2021 at 12:56 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `cname` varchar(30) NOT NULL,
  `cphone` varchar(24) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `qty` int(11) NOT NULL,
  `detail` varchar(500) NOT NULL,
  `cost` bigint(20) NOT NULL,
  `dt` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `date`, `cname`, `cphone`, `pname`, `qty`, `detail`, `cost`, `dt`, `created_by`) VALUES
(1, '2021-06-17', 'hello', '8980877302', 'Laptop', 1, 'Nothing', 125000, '2021-06-10 09:47:12', 1),
(15, '2021-06-15', 'Jenish Mungara', '8141841654', 'Laptop', 2, 'Acer Nitro 5', 75000, '2021-06-12 08:19:01', 2),
(16, '2021-06-26', 'Pranav', '8534256752', 'Mouse', 3, 'Logitech mx150', 750, '2021-06-12 10:39:28', 3),
(17, '2021-06-19', 'Jenil', '7523456202', 'Hard Disk', 1, 'Gigabyte', 1500, '2021-06-12 10:40:48', 3),
(18, '2021-06-24', 'Akshay', '8975245320', 'SmartPhone', 5, 'Xiomi A2', 15000, '2021-06-12 10:43:08', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users_info`
--

CREATE TABLE `users_info` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_info`
--

INSERT INTO `users_info` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'preet', '$2y$10$JyQuoIGfFI3H2qgxT.wWeuQq6uZXeBaULiPWbOI8bZOvY2njn5Z6K', '2021-06-10 14:52:53'),
(2, 'test', '$2y$10$UNFEV5sLEoDiT1PHjpSFneebPO20auxirsBkqRysJMjkPWxRaBZIq', '2021-06-10 15:06:11'),
(3, 'pranav', '$2y$10$qAwJGBkEKf.b.G5Sxh3MdeCFC9g5NQHbVvPc8t9KhTSosJb01o3.6', '2021-06-12 16:08:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_info`
--
ALTER TABLE `users_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users_info`
--
ALTER TABLE `users_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
