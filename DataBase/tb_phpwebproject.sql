-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2021 at 08:20 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tb_phpwebproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin.users`
--

CREATE TABLE `tb_admin.users` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin.users`
--

INSERT INTO `tb_admin.users` (`id`, `user`, `password`, `img`, `name`, `position`) VALUES
(1, 'Admin', 'Admin', 'download.jfif', 'Gabriel S. Mendes', 2),
(3, 'Tester', 'Tester', '', 'Tester T. Tester', 1),
(6, 'Tester4', 'Tester4', '', 'Tester4 T4. Tester4', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin.users_online`
--

CREATE TABLE `tb_admin.users_online` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `last_action` datetime NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin.users_online`
--

INSERT INTO `tb_admin.users_online` (`id`, `ip`, `last_action`, `token`) VALUES
(13, '::1', '2021-01-21 16:08:26', '6009d12ad2d11'),
(14, '::1', '2021-01-21 16:08:56', '6009d143af841'),
(15, '::1', '2021-01-21 16:09:08', '6009d1547a04e'),
(16, '::1', '2021-01-21 16:09:39', '6009d173c90cb'),
(17, '::1', '2021-01-21 16:09:55', '6009d18347d55');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin.visits`
--

CREATE TABLE `tb_admin.visits` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin.visits`
--

INSERT INTO `tb_admin.visits` (`id`, `ip`, `date`) VALUES
(1, '::1', '2021-01-18'),
(3, '::1', '2021-01-18'),
(4, '::1', '2021-01-17'),
(5, '::1', '2021-01-19'),
(6, '::1', '2021-01-21'),
(7, '::1', '2021-01-21'),
(8, '::1', '2021-01-21'),
(9, '::1', '2021-01-21'),
(10, '::1', '2021-01-21'),
(11, '::1', '2021-01-21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin.users`
--
ALTER TABLE `tb_admin.users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_admin.users_online`
--
ALTER TABLE `tb_admin.users_online`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_admin.visits`
--
ALTER TABLE `tb_admin.visits`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin.users`
--
ALTER TABLE `tb_admin.users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_admin.users_online`
--
ALTER TABLE `tb_admin.users_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_admin.visits`
--
ALTER TABLE `tb_admin.visits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
