-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2019 at 06:24 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";



--
-- Database: YourDatabaseName
--

-- --------------------------------------------------------

--
-- Table structure for table `useraccount`
--

CREATE TABLE `useraccount` (
  `name` varchar(60) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `address` varchar(60) DEFAULT NULL,
  `postalCode` varchar(10) DEFAULT NULL,
  `province` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `useraccount`
--

INSERT INTO `useraccount` (`name`, `email`, `password`, `phone`, `address`, `postalCode`, `province`) VALUES
('Mohamad', 'Mohamad@gmail.com', '$2y$10$gxcwqsubZcaV6DAUJU6JDu/vouI1Tk0RD5Ua17sHOTJw3zWH2IreC', 1234567890, '155 east 12 St.', 'k2k 2p2', 'ON');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `useraccount`
--
ALTER TABLE `useraccount`
  ADD PRIMARY KEY (`email`);
COMMIT;


