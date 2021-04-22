-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 03, 2019 at 06:16 PM
-- Server version: 10.1.37-MariaDB-0+deb9u1
-- PHP Version: 7.0.33-0+deb9u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Hospital Managment`
--

-- --------------------------------------------------------

--
-- Table structure for table `Regular`
--

CREATE TABLE `Regular` (
  `USERID` int(11) NOT NULL,
  `Health_CareCard` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Regular`
--

INSERT INTO `Regular` (`USERID`, `Health_CareCard`) VALUES
(27, 1023123),
(28, 0),
(29, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `UserId` int(11) NOT NULL,
  `Role` int(11) NOT NULL DEFAULT '1',
  `Username` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Address` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Province` varchar(255) CHARACTER SET latin1 NOT NULL,
  `City` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Country` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Postal` varchar(255) CHARACTER SET latin1 NOT NULL,
  `verified` int(1) NOT NULL DEFAULT '0',
  `vtoken` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`UserId`, `Role`, `Username`, `password`, `Email`, `Name`, `Address`, `Province`, `City`, `Country`, `Postal`, `verified`, `vtoken`) VALUES
(7, 1, 'darksavage18', '$2y$10$KTjzcPXoWHYGg6NRvYyDou3MbGHJmG1J5GwAGqQPGV/dTA2/HJkEu', 'yushaefraza@gmail.com', 'Yushae', '116 arbour ridge circle', 'ab', 'calgary', 'Canada', 't3g3y9', 0, ''),
(10, 1, 'test', '$2y$10$lm1kr1b9KJn3kSNgUdOBluEug9fD63wfZSN9BgoB.cryzi5G2AuBi', 'yushae.raza@ucalgary.ca', 'yushae', '116 arbour ridge circle', 'ab', 'calgary', 'Canada', 't3g3y9', 0, ''),
(12, 1, '17.raza', '$2y$10$SpBkfwWcz4Bdc7Q/onSh4.HND0xJ.MzOE1VoE6w09GrfWfUQAN7lS', 'yushaefraza@gmail.com', 'Test102', '116 arbour ridge Circle', 'AB', 'Calgary', 'Canada', 'T3G 3Y9', 0, ''),
(13, 1, 'matt_r', '$2y$10$iSopc8eKWCqLVk6Gyr35Z.L.se7LmaBAgYBE7SykUoPeLcKf6Plq.', 'matt@cjrempel.com', 'Matt', '123 Street', 'Alberta', 'Calgary', 'Canada', 'A1B2C3', 0, ''),
(19, 1, 'darksavage', '$2y$10$zATZ5JOIJsIUIzFWW.4K5.u80vXZEoxI0qlmdL0Ss5e1sCNNy.vUm', 'yushaefraza@gmail.com', 'yushae', '116 arbour ridge circle', 'ab', 'calgary', 'Canada', 't3g3y9', 1, ''),
(20, 1, 'yushaeR', '$2y$10$xTPk6Va.uTlG32iDhnpoP.I1adCup.S64IU75uOClY1inhmuyoo/G', 'yushae.raza@ucalgary.ca', 'yushae', '116 arbour ridge Circle', 'AB', 'Calgary', 'Canada', 'T3G 3Y9', 1, ''),
(22, 1, 'dddd', '$2y$10$mXShGYFnCeuL8xfRMunUBeI5ZgmpdWBd.iKTmEFTBA2KwT/YUDscu', 'lukaislightforcats@gmail.com', 'ddd', '1234 data st', 'who cares', 'who knows', 'lala land ', 'h0h0 t2a', 1, ''),
(23, 1, 'data', '$2y$10$6bzjN7vfBXYY3FCzsYLp/u0pDZglPn/Xb7yp54jvJVAML0R8oA1fK', 'lukaislightforcats@gmail.com', 'data', '123 st', '123', '123', '123', '1234', 1, ''),
(24, 1, 'Dodosan', '$2y$10$5OSbEMR8r3EeAbQzBMerwet36BgacrtlddlqaKfGmE4o8nOiDxwOe', 'nanduyo@gmail.com', 'Dodosan', 'Yushaehasanicebulge', 'Hoecity', 'Bangcock', 'Hedonist', '===D', 1, ''),
(25, 1, 'Nielson', '$2y$10$XiGKvMFWyesd1bvaUGrgneuqlvgmDiFXq8Qf.Mkqtmm2sUAELi.K.', 'nielson.h.trung@gmail.com', 'Nielson', '', '', '', '', '', 1, ''),
(26, 1, 'dark', '$2y$10$L5jI07bYmbzuKTBqKnF1Me0O//ga9Zu89/vT/y/55gEBE4CgoGG/q', 'yushaefraza@gmail.com', 'Yushae', '116 arbour ridge circle', 'ab', 'calgary', 'Canada', 't3g3y9', 1, ''),
(27, 1, 'darkS', '$2y$10$zx7g0qgPtC8xONQ1qZ4xq.pg2UMV7IDQ0OrYP6qrRTFbyvv6nqtnS', 'yushae.raza@ucalgary.ca', 'yushaet', '116 arbour ridge circle', 'ab', 'calgary', 'Canada', 't3g3y9', 1, ''),
(28, 1, 'nanduyo', '$2y$10$WUPTaepY8g/K2BDOlIWRN.t7zcCV7aaHUwFcYmnbbzU.jYobiQPIi', 'nanduyo@gmail.com', 'Nanda', '', '', '', '', '', 1, ''),
(29, 1, 'nanduyo3', '$2y$10$giFaRDJbjbVEDLdsFWefButMtjmndnK4Q5eGx3xdMYuLrUixUe.Nm', 'nanduyo3@gmail.com', 'nanduyo3', '', '', '', '', '', 0, 'bba2cdcbce9f3c875cbb640906fd7d45c6c9901505a4de8ad34d7b6ca881ca009ee7cf9ecea46f9aded8e59d5adf445af160dcc781d31c8113dea241230c7884');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Regular`
--
ALTER TABLE `Regular`
  ADD UNIQUE KEY `USERID` (`USERID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD UNIQUE KEY `UserId` (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
