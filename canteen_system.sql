-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2022 at 08:01 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `canteen system`
--

-- --------------------------------------------------------

--
-- Table structure for table `canteen`
--

 ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `canteen`
--

INSERT INTO `canteen` (`canteen_id`, `canteen_name`, `location`) VALUES
(1, 'asddcsc', 'wdwedf'),
(2, 'asdsa', 'dasd'),
(3, 'askksdsd', 'asdasd'),
(5, '5', 'adyar'),
(7, 'asdddda', 'sdfsf'),
(8, 'assa', 'asdsa'),
(9, 'aasdada', 'asddasdas');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(20) NOT NULL,
  `customer_name` varchar(20) NOT NULL,
  `address` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `address`, `phone`) VALUES
(1, 'sadsfd', 'asdd', 'asd'),
(3, 'qw', 'qw', 'qw'),
(4, 'sdff', 'hgj', '87999990'),
(5, 'asdasd', 'asdsd', '23'),
(6, 'asdasd', 'asd', '23312'),
(7, 'asddd', 'asd', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(20) NOT NULL,
  `employee_name` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(20) NOT NULL,
  `canteen_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_name`, `phone`, `address`, `canteen_id`) VALUES
(1, 'asd', 'asdsd', 'asd', 2),
(3, 'tyfh', '8787', 'ukhkjj', 5),
(4, 'asdasd', '12213', 'asdsa', 5),
(5, 'adas', '1221', 'asd', 5);

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_name` varchar(20) NOT NULL,
  `food_type` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  `canteen_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_name`, `food_type`, `price`, `canteen_id`) VALUES
('ads', 'asdsd', '150', 1),
('asd', 'asdad', 'sad', 1),
('asdd', 'asd', '184.5', 5),
('asds', 'asdd', 'asd', 1),
('asss', 'asd', 'asd', 1),
('ffgh', 'jbjn', '133.5', 5);

--
-- Triggers `food`
--
DELIMITER $$
CREATE TRIGGER `sample_trigger` BEFORE INSERT ON `food` FOR EACH ROW SET new.price=(new.price*0.5)+new.price
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `customer_id` int(11) NOT NULL,
  `food_name` varchar(20) NOT NULL,
  `quantity` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`customer_id`, `food_name`, `quantity`) VALUES
(5, 'asd', '12'),
(5, 'asss', '12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `canteen`
--
ALTER TABLE `canteen`
  ADD PRIMARY KEY (`canteen_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `canteen_id` (`canteen_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_name`),
  ADD KEY `canteen` (`canteen_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`customer_id`,`food_name`),
  ADD KEY `food_name` (`food_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `canteen`
--
ALTER TABLE `canteen`
  MODIFY `canteen_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `canteen_id` FOREIGN KEY (`canteen_id`) REFERENCES `canteen` (`canteen_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `canteen` FOREIGN KEY (`canteen_id`) REFERENCES `canteen` (`canteen_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`food_name`) REFERENCES `food` (`food_name`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
