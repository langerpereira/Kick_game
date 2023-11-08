-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2023 at 07:36 AM
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
-- Database: `ecomshoe`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ct_id` int(11) NOT NULL,
  `p_id` int(11) DEFAULT NULL,
  `c_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `c_fname` varchar(50) NOT NULL,
  `c_lname` varchar(50) NOT NULL,
  `c_add` varchar(250) NOT NULL,
  `c_uname` varchar(50) NOT NULL,
  `c_pwd` varchar(20) NOT NULL,
  `c_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `epmloyee`
--

CREATE TABLE `epmloyee` (
  `emp_role` varchar(50) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `epm_name` varchar(100) NOT NULL,
  `sup_id` int(11) DEFAULT NULL,
  `cust_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `od_id` int(11) NOT NULL,
  `pt_id` int(11) DEFAULT NULL,
  `c_id` int(11) DEFAULT NULL,
  `ct_id` int(11) DEFAULT NULL,
  `od_date` date DEFAULT NULL,
  `od_price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pt_id` int(11) NOT NULL,
  `c_id` int(11) DEFAULT NULL,
  `pt_total` float DEFAULT NULL,
  `s_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_price` float NOT NULL,
  `p_desc` varchar(250) NOT NULL,
  `s_id` int(11) DEFAULT NULL,
  `p_pic` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productcart`
--

CREATE TABLE `productcart` (
  `p_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `pt_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `s_id` int(11) NOT NULL,
  `s_fname` varchar(50) NOT NULL,
  `s_lname` varchar(50) NOT NULL,
  `s_add` varchar(250) NOT NULL,
  `s_uname` varchar(50) NOT NULL,
  `s_pwd` varchar(20) NOT NULL,
  `s_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplierorder`
--

CREATE TABLE `supplierorder` (
  `od_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `od_status` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ct_id`),
  ADD KEY `c_id` (`c_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `c_uname` (`c_uname`),
  ADD UNIQUE KEY `c_email` (`c_email`);

--
-- Indexes for table `epmloyee`
--
ALTER TABLE `epmloyee`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `sup_id` (`sup_id`),
  ADD KEY `cust_id` (`cust_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`od_id`),
  ADD KEY `c_id` (`c_id`),
  ADD KEY `pt_id` (`pt_id`),
  ADD KEY `ct_id` (`ct_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pt_id`),
  ADD KEY `c_id` (`c_id`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `productcart`
--
ALTER TABLE `productcart`
  ADD PRIMARY KEY (`p_id`,`c_id`),
  ADD KEY `c_id` (`c_id`),
  ADD KEY `pt_qty` (`pt_qty`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`s_id`),
  ADD UNIQUE KEY `s_uname` (`s_uname`),
  ADD UNIQUE KEY `s_email` (`s_email`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `supplierorder`
--
ALTER TABLE `supplierorder`
  ADD KEY `od_id` (`od_id`),
  ADD KEY `s_id` (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT;

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
-- Constraints for table `epmloyee`
--
ALTER TABLE `epmloyee`
  ADD CONSTRAINT `epmloyee_ibfk_1` FOREIGN KEY (`sup_id`) REFERENCES `supplier` (`s_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `epmloyee_ibfk_2` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`c_id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `customer` (`c_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`pt_id`) REFERENCES `payment` (`pt_id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`ct_id`) REFERENCES `cart` (`ct_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `customer` (`c_id`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`s_id`) REFERENCES `supplier` (`s_id`) ON DELETE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `supplier` (`s_id`) ON DELETE CASCADE;

--
-- Constraints for table `productcart`
--
ALTER TABLE `productcart`
  ADD CONSTRAINT `productcart_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `product` (`p_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `productcart_ibfk_2` FOREIGN KEY (`c_id`) REFERENCES `customer` (`c_id`) ON DELETE CASCADE;

--
-- Constraints for table `supplierorder`
--
ALTER TABLE `supplierorder`
  ADD CONSTRAINT `supplierorder_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `supplier` (`s_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `supplierorder_ibfk_2` FOREIGN KEY (`od_id`) REFERENCES `orders` (`od_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
