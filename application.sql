-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2019 at 06:23 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";



--
-- Database: `YourDatabaseName`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `email` varchar(100) NOT NULL,
  `program` varchar(60) DEFAULT NULL,
  `school` varchar(60) DEFAULT NULL,
  `workLength` varchar(60) DEFAULT NULL,
  `experince` varchar(40) DEFAULT NULL,
  `required` varchar(30) DEFAULT NULL,
  `resume` varchar(60) DEFAULT NULL,
  `startingDate` date DEFAULT NULL,
  `heard` varchar(60) DEFAULT NULL,
  `applicationDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`email`, `program`, `school`, `workLength`, `experince`, `required`, `resume`, `startingDate`, `heard`, `applicationDate`) VALUES
('Mohamad@gmail.com', 'Software Development', 'Mohawk College', '8 Months', '1-2 YEARS', 'Yes', '120-Resume - Mohamad Albazeai.pdf', '2020-01-01', 'Student Resources', '2019-12-05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`email`);
COMMIT;


