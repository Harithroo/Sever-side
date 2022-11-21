-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2020 at 06:28 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `w1742291`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prodId` int(4) NOT NULL,
  `prodName` varchar(30) NOT NULL,
  `prodPicNameSmall` varchar(100) NOT NULL,
  `prodPicNameLarge` varchar(100) NOT NULL,
  `prodDescripShort` varchar(1000) DEFAULT NULL,
  `prodDescripLong` varchar(3000) DEFAULT NULL,
  `prodPrice` decimal(6,2) NOT NULL,
  `prodQuantity` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prodId`, `prodName`, `prodPicNameSmall`, `prodPicNameLarge`, `prodDescripShort`, `prodDescripLong`, `prodPrice`, `prodQuantity`) VALUES
(1, 'phone', 'phone.jpg', 'phone.jpg', 'If it\'s innovative, the Galaxy S Series has it in spades. Revolutionary cameras. A battery that wirelessly charges other batteries.¹ An expansive display that clears the way for your creative vision.', 'If it\'s innovative, the Galaxy S Series has it in spades. Revolutionary cameras. A battery that wirelessly charges other batteries.¹ An expansive display that clears the way for your creative vision. Made from Ultra Thin Glass that bends to fit in your pocket, and a Hideaway Hinge that lets you enjoy hands-free selfies and video chats, the new Galaxy Z Flip is a phone that bends all the rules. ', '2000.00', 200),
(2, 'Speaker', 'Speaker.jpg', 'Speaker.jpg', 'If it\'s innovative, the Galaxy S Series has it in spades. Revolutionary cameras. A battery that wirelessly charges other batteries.¹ An expansive display that clears the way for your creative vision.\r\nStarting at: $399.99', 'Made from Ultra Thin Glass that bends to fit in your pocket, and a Hideaway Hinge that lets you enjoy hands-free selfies and video chats, the new Galaxy Z Flip is a phone that bends all the rules.', '3000.00', 300),
(3, 'tv', 'tv.jpg', 'tv.jpg', 'As the centerpiece in your home, Samsung Smart TVs are dedicated to giving you access to a world of content beyond streaming so you can schedule recordings, search and game all while connecting to more devices across your home.', 'As the centerpiece in your home, Samsung Smart TVs are dedicated to giving you access to a world of content beyond streaming so you can schedule recordings, search and game all while connecting to more devices across your home.Discover your favorite movies, shows and music in a whole new way with Universal Guide, bringing your streaming apps all in one place and providing custom recommendations.', '5000.00', 50),
(4, 'watch', 'watch.jpg', 'watch.jpg', 'Get more out of every mile thanks to built-in pace coaching. Advanced sensors keep your pace to help you achieve your run goals.', 'Get more out of every mile thanks to built-in pace coaching. Advanced sensors keep your pace to help you achieve your run goals.\r\n\r\nComfortably sleek The Galaxy Watch Active 2 is light enough to wear anywhere comfortably.', '1500.00', 150);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prodId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prodId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
