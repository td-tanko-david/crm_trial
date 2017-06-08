-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 08, 2017 at 12:13 PM
-- Server version: 5.6.36-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm_trial`
--

-- --------------------------------------------------------

--
-- Table structure for table `Comments`
--

CREATE TABLE `Comments` (
  `comment_id` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ReviewText` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `ReviewRating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Comments`
--

INSERT INTO `Comments` (`comment_id`, `UserID`, `ReviewText`, `ReviewRating`) VALUES
(1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis commodo justo ac augue ultrices, id finibus ipsum. Suspendisse sagittis cursus rhoncus. Praesent ultrices luctus quam sed eleifend. Curabitur pharetra efficitur nisl at orci aliquam.', 2),
(2, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris euismod tortor non elementum blandit. Etiam finibus tristique sem, at efficitur felis mattis sed. Phasellus egestas libero in risus.', 5),
(3, 3, 'This review is written on a desktop.', 4),
(4, 5, 'This review is written on a mobile device. Thank you for making it possible.', 4),
(5, 6, 'This is my comment which states I enjoy this page very much.', 5),
(7, 8, 'The best e-shop I\'ve come across in a long time. Nice and easy to navigate. Eye friendly colors. I\'ll recommend this site to my friends and family, and will definitely buy from this e-shop next time I need something.', 5);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(45) NOT NULL,
  `UserRole` varchar(45) NOT NULL DEFAULT 'Guest'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`UserID`, `UserName`, `UserRole`) VALUES
(1, 'testuser', 'Admin'),
(2, 'testuser_two', 'User'),
(3, 'Desktopuser', 'Guest'),
(5, 'Mobiluser', 'Guest'),
(6, 'John Doe', 'Guest'),
(8, 'robikasztar', 'Guest');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Comments`
--
ALTER TABLE `Comments`
  ADD PRIMARY KEY (`comment_id`,`UserID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `UserName_UNIQUE` (`UserName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Comments`
--
ALTER TABLE `Comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Comments`
--
ALTER TABLE `Comments`
  ADD CONSTRAINT `UserID` FOREIGN KEY (`UserID`) REFERENCES `Users` (`UserID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
