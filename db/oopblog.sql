-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2021 at 03:14 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oopblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `creat_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `category_id`, `title`, `content`, `photo`, `name`, `status`, `creat_time`) VALUES
(1, 0, 'sefsdfadf', 'sdaff asdf asf a df ', '20210313030832.sql', 'Md omar faruk', 1, '2021-03-13 02:08:32'),
(2, 0, 'there ar no more ', 'dfjdjfadjf sdfadfj ksdfj', '20210313031244.sql', 'Md omar faruk', 1, '2021-03-13 02:12:44'),
(3, 0, 'fgdf', 'fgfg', '20210313031450.sql', 'Md omar faruk', 0, '2021-03-13 02:14:50'),
(4, 0, 'fgdf', 'fgfg', '20210313031606.sql', 'Md omar faruk', 0, '2021-03-13 02:16:06'),
(7, 0, '', '', '20210313031700.', 'Md omar faruk', 0, '2021-03-13 02:17:00'),
(8, 0, '', '', '20210313031704.', 'Md omar faruk', 0, '2021-03-13 02:17:04'),
(9, 0, '', '', '20210313031708.', 'Md omar faruk', 0, '2021-03-13 02:17:08'),
(10, 0, '', '', '20210313031731.', 'Md omar faruk', 0, '2021-03-13 02:17:31'),
(11, 6, 'bejoy vai is here', 'there are main content', '20210314054444.jpg', 'Md omar faruk', 0, '2021-03-14 17:24:36'),
(12, 2, 'E-library', 'zfsfgvfsdfsd', '20210315024629.jpg', 'Md omar faruk', 1, '2021-03-15 01:46:30');

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`id`, `category_name`, `status`, `create_time`, `update_time`) VALUES
(1, 'kabila', 0, '2021-03-02 02:08:51', '2021-03-11 01:01:26'),
(2, 'Tasrif', 1, '2021-03-02 02:10:11', '2021-03-11 01:01:30'),
(3, 'talha', 1, '2021-03-02 02:10:20', '2021-03-11 01:01:27'),
(5, 'Babu', 1, '2021-03-09 17:12:18', '2021-03-11 01:01:29'),
(6, 'bejoy', 1, '2021-03-09 17:12:33', '2021-03-11 01:01:32'),
(8, 'talharahman', 0, '2021-03-11 01:01:13', '2021-03-11 01:01:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `photo` varchar(255) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `status`, `photo`, `created_time`, `updated_time`) VALUES
(1, 'Md omar faruk', 'faruk', '202cb962ac59075b964b07152d234b70', 1, '', '2021-02-23 06:48:24', '2021-02-23 07:53:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
