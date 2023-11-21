-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2023 at 07:00 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kick_game`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `b_id` int(11) NOT NULL,
  `b_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`b_id`, `b_name`) VALUES
(1, 'Nike'),
(2, 'Adidas'),
(3, 'Addidas');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `buy_qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `c_id`, `buy_qty`) VALUES
(3, 4, 4),
(4, 4, 2),
(5, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `c_fname` varchar(50) NOT NULL,
  `c_add` varchar(250) NOT NULL,
  `c_uname` varchar(50) NOT NULL,
  `c_pwd` varchar(20) NOT NULL,
  `c_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_fname`, `c_add`, `c_uname`, `c_pwd`, `c_email`) VALUES
(4, 'langer', '1dzdvzdvbz', 'langer', '12345678', 'wwww@gmail.vom');

-- --------------------------------------------------------

--
-- Table structure for table `dealswith`
--

CREATE TABLE `dealswith` (
  `emp_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(100) NOT NULL,
  `emp_role` varchar(100) NOT NULL,
  `emp_uname` varchar(100) NOT NULL,
  `emp_pwd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_name`, `emp_role`, `emp_uname`, `emp_pwd`) VALUES
(1, 'mamulanger', 'ceo', 'lanmamu', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `orderpayment`
--

CREATE TABLE `orderpayment` (
  `od_id` int(11) NOT NULL,
  `pt_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `od_id` int(11) NOT NULL,
  `od_date` date NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pt_id` int(11) NOT NULL,
  `c_id` int(11) DEFAULT NULL,
  `pt_total` float DEFAULT NULL,
  `txn_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `paymentview`
-- (See below for the actual view)
--
CREATE TABLE `paymentview` (
`pt_id` int(11)
,`txn_id` varchar(20)
,`od_id` int(11)
,`pt_total` float
,`c_fname` varchar(50)
,`c_uname` varchar(50)
,`c_email` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `placesorder`
--

CREATE TABLE `placesorder` (
  `emp_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_price` float NOT NULL,
  `s_id` int(11) DEFAULT NULL,
  `p_pic` text NOT NULL,
  `b_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `p_price`, `s_id`, `p_pic`, `b_id`) VALUES
(3, 'Air force 1', 15, 1, 'cab9b853-9d87-4ef3-9db3-2f054c1a654d.webp', 1),
(4, 'aFDw', 15, 1, 'air.png', 1),
(5, 'air force 1 \'1', 17000, 1, 'https://i.postimg.cc/YCMwZBt3/1bb96f3b-ea2b-422c-ab0d-49f06c3c54ef.webp', 1),
(6, 'air force 1 \'1', 17000, 1, 'https://i.postimg.cc/YCMwZBt3/1bb96f3b-ea2b-422c-ab0d-49f06c3c54ef.webp', 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(50) NOT NULL,
  `s_add` varchar(250) NOT NULL,
  `s_uname` varchar(50) NOT NULL,
  `s_pwd` varchar(20) NOT NULL,
  `s_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure for view `paymentview`
--
DROP TABLE IF EXISTS `paymentview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `paymentview`  AS SELECT `p`.`pt_id` AS `pt_id`, `p`.`txn_id` AS `txn_id`, `op`.`od_id` AS `od_id`, `p`.`pt_total` AS `pt_total`, `c`.`c_fname` AS `c_fname`, `c`.`c_uname` AS `c_uname`, `c`.`c_email` AS `c_email` FROM ((`payment` `p` join `orderpayment` `op` on(`p`.`pt_id` = `op`.`pt_id`)) join `customer` `c` on(`c`.`c_id` = `p`.`c_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`,`c_id`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `c_uname` (`c_uname`),
  ADD UNIQUE KEY `c_email` (`c_email`);

--
-- Indexes for table `dealswith`
--
ALTER TABLE `dealswith`
  ADD PRIMARY KEY (`emp_id`,`c_id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `orderpayment`
--
ALTER TABLE `orderpayment`
  ADD PRIMARY KEY (`od_id`,`pt_id`),
  ADD KEY `od_id` (`od_id`),
  ADD KEY `pt_id` (`pt_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`od_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pt_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `placesorder`
--
ALTER TABLE `placesorder`
  ADD PRIMARY KEY (`emp_id`,`s_id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `b_id` (`b_id`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`s_id`),
  ADD UNIQUE KEY `s_uname` (`s_uname`),
  ADD UNIQUE KEY `s_email` (`s_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `od_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `customer` (`c_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `product` (`p_id`);

--
-- Constraints for table `dealswith`
--
ALTER TABLE `dealswith`
  ADD CONSTRAINT `dealswith_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `customer` (`c_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dealswith_ibfk_2` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE;

--
-- Constraints for table `orderpayment`
--
ALTER TABLE `orderpayment`
  ADD CONSTRAINT `orderpayment_ibfk_1` FOREIGN KEY (`od_id`) REFERENCES `orders` (`od_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orderpayment_ibfk_2` FOREIGN KEY (`pt_id`) REFERENCES `payment` (`pt_id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `customer` (`c_id`) ON DELETE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `customer` (`c_id`);

--
-- Constraints for table `placesorder`
--
ALTER TABLE `placesorder`
  ADD CONSTRAINT `placesorder_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `placesorder_ibfk_2` FOREIGN KEY (`s_id`) REFERENCES `supplier` (`s_id`) ON DELETE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `supplier` (`s_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`b_id`) REFERENCES `brand` (`b_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
