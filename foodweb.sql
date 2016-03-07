-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2016 at 04:23 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `foodweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `feedback` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `feedback`) VALUES
(1, 'Anas', 'anas', 'Hi there'),
(2, 'CHeck', 'check', 'Hello there..'),
(3, 'CHeck', 'check', 'Hello there..'),
(4, 'CHec', 'check', 'Hello there..'),
(5, 'CHe', 'check', 'Hello there'),
(6, 'Anas', 'Final', 'Hello'),
(7, 'Anas', 'Final', 'Hello'),
(8, 'Anas', 'Check', 'Yup'),
(9, 'Anas', 'Check', 'Yup'),
(10, '', '', ''),
(11, '', '', ''),
(12, '', '', ''),
(13, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
`item_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `cuisine` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `img` varchar(256) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `restaurant_id`, `cuisine`, `name`, `price`, `img`) VALUES
(2, 3, 'Coffee', 'Cappuchino', 40, ''),
(3, 3, 'Coffee', 'Expresso', 50, ''),
(6, 5, 'Burger', 'Beef Burger', 50, 'public/images/uploads/items/burger.jpg'),
(7, 5, 'Burger', 'Chicken Burger', 200, 'public/images/uploads/items/ch_burger.jpg'),
(10, 3, 'Coffee', 'Americano', 30, ''),
(11, 3, 'Cake', 'Blackberry Cheese Cake', 250, ''),
(12, 3, 'Cake', 'Lemon Cake', 200, ''),
(13, 2, 'Rice', 'Spicy Chicken Fried Rice', 350, ''),
(14, 2, 'Chicken', 'BBQ Chicken', 200, ''),
(15, 2, 'Noodles', 'Schezwan Egg Noodles', 200, ''),
(16, 2, 'Chicken', 'Chicken Manchurian', 175, ''),
(17, 2, 'Juice', 'Orange Juice', 35, ''),
(18, 2, 'Juice', 'Mango Juice', 50, ''),
(20, 5, 'Pizza', 'Chef''s Spicy Pizza', 150, 'public/images/uploads/items/pizza.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `rest_id` int(11) NOT NULL,
  `address` varchar(150) NOT NULL,
  `items` text NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userid`, `rest_id`, `address`, `items`, `status`) VALUES
(10, 1, 2, 'Bangalore, Karnataka', '[{"item_id":13,"name":"Spicy Chicken Fried Rice","price":350,"order":1},{"item_id":14,"name":"BBQ Chicken","price":200,"order":2}]', 'Delivered'),
(13, 1, 2, 'C Hostel\nNIT Calicut', '[{"item_id":13,"name":"Spicy Chicken Fried Rice","price":350,"order":1},{"item_id":15,"name":"Schezwan Egg Noodles","price":200,"order":2}]', 'Processing');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE IF NOT EXISTS `restaurant` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `place` varchar(100) NOT NULL,
  `min_order` int(11) NOT NULL,
  `img` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`id`, `name`, `place`, `min_order`, `img`) VALUES
(2, 'Baskin Robins', 'Bangalore', 150, 'public/images/uploads/restaurants/br.jpg'),
(3, 'Papa John''s', 'Mumbai', 200, 'public/images/uploads/restaurants/papajohns.jpg'),
(5, 'Dominos', 'Calicut', 150, 'public/images/uploads/restaurants/dominos.jpg'),
(11, 'Pizza Hut', 'Calicut', 400, 'public/images/uploads/restaurants/pizzahut.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` longtext NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `address`, `email`, `password`) VALUES
(1, 'Rahul M Menon', '9465212545', 'Koramangla,\r\nBangalore', 'rahul@gmail.com', '1234'),
(2, 'Obi Wan Kenoobi', '9560124587', 'Mance Wille,\r\nPlanet Orbyn,\r\nTyrant Galaxy.', 'obiwan@gmail.com', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
 ADD PRIMARY KEY (`item_id`), ADD KEY `restaurant_id` (`restaurant_id`), ADD KEY `restaurant_id_2` (`restaurant_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`id`), ADD KEY `rest_id` (`rest_id`), ADD KEY `userid` (`userid`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
ADD CONSTRAINT `foreign key` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`rest_id`) REFERENCES `restaurant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
